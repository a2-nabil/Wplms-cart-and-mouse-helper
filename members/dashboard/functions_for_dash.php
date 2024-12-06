<?php

//Function code for dashboard

function dashboard_enqueue_scriptStyle()
{
    //enqueue for dashboard
    $url = $_SERVER['REQUEST_URI'];
    if ((strpos($url, "members/") !== false && is_user_logged_in() && userPermission()) || (is_page(418407) && userPermission())) {

        wp_enqueue_style('dash-next-style', get_stylesheet_directory_uri() . '/assets/dash/css/style.css', true, time());
        wp_enqueue_style('dash-next-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', true, "1.0.1");

        // wp_enqueue_style('dash-tx-style', get_stylesheet_directory_uri() . '/assets/dash/css/styles.css', true, time());

        wp_enqueue_script('dash-next-srcipt', get_stylesheet_directory_uri() . '/assets/dash/js/app.js', array('jquery'), true, time());
        wp_enqueue_script('dash-next-icons', 'https://kit.fontawesome.com/0793d75093.js', array('jquery'), true, '6.0.0');


        add_action('wp_enqueue_scripts', 'remove_wplms_style', 100);
        function remove_wplms_style()
        {
            wp_dequeue_style('wplms-style');
            wp_deregister_style('wplms-style');

            // dequeue only for custom-test-profile-with-header-footer
            // if (is_page(418407)) {

            //     global $wp_styles;
            //     global $wp_scripts;

            //     $allowed_styles = [
            //         'elementor-frontend',  
            //         'elementor-post-123',  
            //         'elementor-icons',     
            //         'gforms_css',          
            //         'dash-next-style',     
            //         'dash-next-fonts',
            //         'dash-tx-style',
            //         'dash-tx-style'
            //     ];

            //     $allowed_scripts = [
            //         'elementor-frontend',  
            //         'gforms_js',           
            //         'dash-next-srcipt',    
            //         'dash-tx-srcipt',
            //         'dash-next-icons'
            //     ];

            //     foreach ($wp_styles->queue as $style) {
            //         if (!in_array($style, $allowed_styles)) {
            //             wp_dequeue_style($style);
            //             wp_deregister_style($style);
            //         }
            //     }

            //     foreach ($wp_scripts->queue as $script) {
            //         if (!in_array($script, $allowed_scripts)) {
            //             wp_dequeue_script($script);
            //             wp_deregister_script($script);
            //         }
            //     }
            // }
        }
    }
}
add_action("wp_enqueue_scripts", "dashboard_enqueue_scriptStyle");

function ajax_course_search()
{
    $search_term = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

    $args = array(
        'post_type'      => 'course',
        'posts_per_page' => 10,
    );

    if (!empty($search_term)) {
        $args['s'] = $search_term;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        ob_start(); // Start buffering the output
        while ($query->have_posts()) {
            $query->the_post();
            $img_src = get_the_post_thumbnail_url(get_the_ID());
            $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
            $image = $img_src ? $img_src : $img_default;

            $average_rating = get_post_meta(get_the_ID(), 'average_rating', true);
            $reviews_count = get_post_meta(get_the_ID(), 'rating_count', true);

            $progress = bp_course_get_user_progress($user_id, get_the_ID());

            $product_ID = get_post_meta(get_the_ID(), 'vibe_product', true);
?>
            <!-- HTML output for each course -->
            <div class="a2n-course__card">
                <div class="a2n-course__thumbnail">
                    <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
                        <img src="<?php echo $image; ?>" alt="" />
                    </a>
                </div>
                <div class="a2n-course__content">
                    <span class="a2n-course__tip">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'course-cat');
                        if (!empty($terms)) {
                            $iterated = false;
                            foreach ($terms as $term) {
                                if (!$iterated) {
                                    echo '<a href="' . get_term_link($term) . '" rel="tag">' . $term->name . '</a>';
                                    $iterated = true;
                                }
                            }
                        }
                        ?>
                    </span>
                    <h3 class="a2n-course__title">
                        <a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
                    </h3>
                    <div class="a2n-course__meta a2n-course__details">
                        <span class="a2n-course__count-ratings"> <?php echo $average_rating; ?> </span>
                        <span class="course-review">
                            <div class="star-ratings">
                                <div class="fill-ratings" style="width: <?php echo ($average_rating * 20); ?>%">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                        </span>
                        <span class="a2n-course__count-reviews">
                            (<?php echo $reviews_count; ?>)
                        </span>
                    </div>
                    <div class="a2n-course__action">
                        <div class="btn-div">
                            <a href="<?php the_permalink(); ?>" class="view-btn">View Course</a>
                            <a href="<?php echo home_url(); ?>/cart/?add-to-cart=<?php echo $product_ID; ?>" class="add-cart-ctm add-to-cart-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        $output = ob_get_clean(); // Get the buffered content and end buffering
        wp_send_json_success($output);
    } else {
        wp_send_json_error('No courses found');
    }

    wp_die(); // Always call wp_die() at the end of an AJAX function
}
add_action('wp_ajax_course_search', 'ajax_course_search');
add_action('wp_ajax_nopriv_course_search', 'ajax_course_search');




function viewLearnerProfile()
{
    ob_start();
    // $LinkProfile = bp_core_get_userlink(bp_loggedin_user_id(), $no_anchor = false, $just_link = true);
    $LinkProfile = home_url('/custom-test-profile');
    echo '<a style="
    border: 1px solid green;
    padding: 15px;
    border-radius: 5px;
" href="' . $LinkProfile . '">View Dashboard Profile</a>';
    return ob_get_clean();
}
add_shortcode('view_profile', 'viewLearnerProfile');


function userPermission()
{
    global $current_user;
    $user = get_userdata($current_user->ID);
    // $roles = array(
    //     'developer',
    //     'student',
    //     'administrator',
    //     'admin'
    // );
    // $allowed_emails = array(
    //     'hasanarif@staffasia.org',
    //     'muhiburnabil@staffasia.org',
    //     'm96rahman.bd@gmail.com',
    //     'sakib@staffasia.org',
    //     'fahimhabibi@staffasia.org',
    //     'shamsuddin@staffasia.org'
    // );


    // if (!in_array(strtolower($user->user_email), $allowed_emails)) {
    //     return false;
    // }
    return true;
}
// ajax for user profile data update
function profile_update_process_form_data()
{
    require_once get_stylesheet_directory() . '/members/dashboard/classes/UserProfile.php';

    $profile_object = new UserProfile();
    $result = $profile_object->updateUserData($_POST);
    wp_send_json($result);
}

add_action('wp_ajax_profile_update_process_form_data', 'profile_update_process_form_data');
add_action('wp_ajax_nopriv_profile_update_process_form_data', 'profile_update_process_form_data');

function pass_update_process_form_data()
{
    require_once get_stylesheet_directory() . '/members/dashboard/classes/UserProfile.php';

    $pass_object = new UserProfile();
    $result = $pass_object->updateUserPassData($_POST);
    wp_send_json($result);
}

add_action('wp_ajax_pass_update_process_form_data', 'pass_update_process_form_data');
add_action('wp_ajax_nopriv_pass_update_process_form_data', 'pass_update_process_form_data');


function update_user_meta_bulk_ajax()
{
    require_once get_stylesheet_directory() . '/members/dashboard/classes/UserProfile.php';

    $notification_object = new UserProfile();
    $result = $notification_object->updateUserEmailNotification($_POST['data']);

    if ($result['success']) {
        wp_send_json_success($result['message']);
    } else {
        wp_send_json_error($result['message']);
    }
}
add_action('wp_ajax_update_user_meta_bulk', 'update_user_meta_bulk_ajax');
add_action('wp_ajax_nopriv_update_user_meta_bulk', 'update_user_meta_bulk_ajax');


// Share CER in Linkedin
function mha_linkedinShareCertificate($courseID)
{
    global $wpdb;
    // global $vibe_options;

    $site_url       = get_bloginfo('url');
    $site_name      = get_bloginfo('name');
    $courseTitle    = get_the_title($courseID);
    $userID         = get_current_user_id();

    // $cer_page       = get_post($vibe_options['certificate_page']);
    // $cer_slug       = $cer_page ? $cer_page->post_name : null;

    $cer_template   = get_post_meta($courseID, 'vibe_certificate_template', true);
    $cer_template   = get_post($cer_template);
    $cer_template_slug = $cer_template ? $cer_template->post_name : null;

    if (!empty($cer_template_slug) && strpos($cer_template_slug, 'certificate') !== false) {
        $site_url = strtolower($site_url . '/certificates' . '/' . $cer_template_slug);
    } else {
        return;
    }


    $course_submission_date = $wpdb->get_var($wpdb->prepare("
        SELECT activity.date_recorded FROM wp_bp_activity AS activity
        WHERE   activity.component  = 'course'
        AND     activity.type   = 'submit_quiz'
        AND     user_id = %d
        AND     item_id = %d
        ORDER BY date_recorded DESC LIMIT 0,1
    ", $userID, $courseID));

    $Course_Complete_Date = date_i18n(get_option('date_format'), strtotime($course_submission_date));

    $timestamp     = strtotime($Course_Complete_Date);
    $monthNumber   = date('n', $timestamp);
    $passingYear   = date('Y', $timestamp);

    $certficateID = get_post_meta($courseID, 'vibe_certificate_template', true);


    $url_path = "https://www.linkedin.com/profile/add?startTask=CERTIFICATION_NAME&name=$courseTitle&organizationName=$site_name&issueYear=$passingYear&issueMonth=$monthNumber&certUrl=$site_url/?c$certficateID-$courseID-$userID&certId=$certficateID-$courseID-$userID";

    //return $url_path;
    echo '<a class="shareCertificate" href="' . $url_path . '" target="_blank"><img src="' . get_stylesheet_directory_uri() . '/assets/dash/images/icons8-linkedin-48.png" />Add to Profile</a>';
}

// Get the current URL
function mha_getCurrentURL()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    return $protocol . $host . $uri;
}
$url = mha_getCurrentURL();
mha_showCertificate($url);

// Check if the URL contains "certificates/certificate-template"
function mha_showCertificate($url)
{
    if (strpos($url, "certificates/certificate-2-3/") !== false) {
        $queryString = parse_url($url, PHP_URL_QUERY);
        $result = ltrim($queryString, 'c');
        $explodedIds = explode('-', $result);
        $certificateID = $explodedIds[0];
        $courseID = $explodedIds[1];
        $userID = $explodedIds[2];

        $sieURL =  get_site_url();
        if (!empty($courseID) and !empty($userID)) {
            $redirectURL = "$sieURL/certificates/certificate-2-3/?c=$courseID&u=$userID";
            header("Location: " . $redirectURL);
            exit();
        }
    }
}


// only working this short in dashboard 
function course_by_ids_or_cat_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'cat_id'     => '',   // Category ID to filter courses
        'course_ids' => '',   // Comma-separated list of course IDs
        'limit'      => 5,    // Limit the number of posts
        'columns'    => 3,    // Number of columns to display
    ), $atts, 'course_by_ids_or_cat');

    return course_by_ids_or_cat_callback($atts);
}
add_shortcode('course_by_ids_or_cat', 'course_by_ids_or_cat_shortcode');

// The callback function that handles the course display logic
function course_by_ids_or_cat_callback($atts)
{
    ob_start();

    // // Extract shortcode attributes
    // $category_id = $atts['cat_id'];
    // $course_ids = $atts['course_ids'];
    // $limit = intval($atts['limit']);
    // $columns = intval($atts['columns']); 

    // // Convert comma-separated course IDs to array
    // $new_array_numbers = array_map('intval', explode(',', $course_ids));

    // // Define query args based on whether category ID or course IDs are provided
    // $args = array(
    //     'post_type' => 'course',
    //     'posts_per_page' => $limit,
    //     'post_status' => 'publish',
    //     'orderby' => 'meta_value_num',
    //     'order' => 'DESC',
    //     'meta_query' => array(
    //         array(
    //             'key' => 'vibe_students',
    //         ),
    //         array(
    //             'key' => 'vibe_product',
    //             'value' => array(''),
    //             'compare' => 'NOT IN'
    //         )
    //     )
    // );

    // if ($category_id) {
    //     // Query by category ID
    //     $args['tax_query'] = array(
    //         array(
    //             'taxonomy' => 'course-cat',
    //             'field' => 'term_id',
    //             'terms' => $category_id
    //         )
    //     );
    // } elseif ($course_ids) {
    //     // Query by specific course IDs
    //     $args['post__in'] = $new_array_numbers;
    //     $args['orderby'] = 'post__in'; // Maintain order of IDs
    // }


    // Extract shortcode attributes
    $category_id = isset($atts['cat_id']) ? intval($atts['cat_id']) : 0;
    $course_ids = isset($atts['course_ids']) ? $atts['course_ids'] : '';
    $limit = isset($atts['limit']) ? intval($atts['limit']) : 10;
    $columns = isset($atts['columns']) ? intval($atts['columns']) : 3; // Default to 4 columns if not set

    // Convert comma-separated course IDs to array
    $new_array_numbers = array_map('intval', explode(',', $course_ids));

    // Define base query args
    $args = array(
        'post_type' => 'course',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'fields' => 'ids',
    );

    // Meta query conditions (only add if necessary)
    $meta_query = array();

    if (!empty($atts['vibe_students'])) {
        $meta_query[] = array(
            'key' => 'vibe_students',
        );
    }

    if (!empty($atts['vibe_product'])) {
        $meta_query[] = array(
            'key' => 'vibe_product',
            'value' => array(''),
            'compare' => 'NOT IN'
        );
    }

    // Only add meta query if it has conditions
    if (!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }

    // Conditionally add tax query or post__in based on input
    if ($category_id) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'course-cat',
                'field' => 'term_id',
                'terms' => $category_id
            )
        );
    } elseif ($course_ids) {
        $args['post__in'] = $new_array_numbers;
        $args['orderby'] = 'post__in';
    }
    // Execute the query
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        // Output grid structure
        echo '<div class="a2n-course__grid" style="display: grid; grid-template-columns: repeat(' . esc_attr($columns) . ', 1fr); gap: 20px;">';

        while ($query->have_posts()) {
            $query->the_post();
            $allCourseId = get_the_ID();
            $user_id = get_current_user_id();
            $img_src = get_the_post_thumbnail_url($allCourseId);
            $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
            $image = $img_src ? $img_src : $img_default;

            $average_rating = get_post_meta($allCourseId, 'average_rating', true);
            $reviews_count = get_post_meta($allCourseId, 'rating_count', true);

            // Render each course card
        ?>
            <div class="a2n-course__card">
                <div class="a2n-course__thumbnail">
                    <div class="a2n-course__prgr">
                        <?php
                        $progress = bp_course_get_user_progress($user_id, $allCourseId);
                        ?>
                        <progress max="100" value="<?php echo esc_attr($progress); ?>" class="prog ar-prgwd"></progress>
                        <h5 class="a2n-course__cmplt"><b><?php echo esc_html($progress); ?> %</b> Complete</h5>
                    </div>
                    <a href="<?php echo esc_url(get_the_permalink($allCourseId)); ?>">
                        <img src="<?php echo esc_url($image); ?>" alt="" />
                    </a>
                </div>
                <div class="a2n-course__content">
                    <span class="a2n-course__tip">
                        <?php
                        $terms = get_the_terms($allCourseId, 'course-cat');
                        if (!empty($terms)) {
                            echo '<a href="' . esc_url(get_term_link($terms[0])) . '" rel="tag">' . esc_html($terms[0]->name) . '</a>';
                        }
                        ?>
                    </span>
                    <h3 class="a2n-course__title">
                        <a href="<?php echo esc_url(get_the_permalink($allCourseId)); ?>"><?php echo esc_html(get_the_title($allCourseId)); ?></a>
                    </h3>
                    <div class="a2n-course__meta a2n-course__details">
                        <span class="a2n-course__count-ratings"> <?php echo esc_html($average_rating); ?> </span>
                        <span class="course-review">
                            <div class="star-ratings">
                                <div class="fill-ratings" style="width: <?php echo esc_attr($average_rating * 20); ?>%">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                        </span>
                        <span class="a2n-course__count-reviews">
                            (<?php echo esc_html($reviews_count); ?>)
                        </span>
                    </div>
                    <div class="a2n-course__action">
                        <?php the_course_button($allCourseId); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>';

        wp_reset_postdata(); // Reset post data after query
    } else {
        echo "<h3>No course found</h3>";
    }

    return ob_get_clean();
}


function my_custom_bp_core_get_userlink($link, $user_id)
{
    // Parse the current URL to extract the base URL
    $dom = new DOMDocument();
    $dom->loadHTML($link);
    $anchor = $dom->getElementsByTagName('a')->item(0);
    $url = $anchor->getAttribute('href');

    $new_url = add_query_arg('userid', $user_id, $url);

    $new_link = '<a href="' . esc_url($new_url) . '">' . $anchor->nodeValue . '</a>';

    return $new_link;
}

// Add the custom filter to 'bp_core_get_userlink'
add_filter('bp_core_get_userlink', 'my_custom_bp_core_get_userlink', 10, 2);



// Handle AJAX request for enrolled courses pagination
function load_more_courses()
{
    if (isset($_POST['page'])) {

        $posts_per_page = 12;
        $page = intval($_POST['page']);
        $offset = ($page - 1) * $posts_per_page;
        $user_id = intval($_POST['userId']);

        global $wpdb;
        $paged_courses = $wpdb->get_results(apply_filters('wplms_usermeta_direct_query', $wpdb->prepare("
                        SELECT DISTINCT posts.ID as id
                        FROM {$wpdb->posts} AS posts
                        LEFT JOIN {$wpdb->usermeta} AS course_status ON course_status.meta_key = CONCAT('course_status', posts.ID)
                        AND course_status.user_id = %d
                        WHERE posts.post_type = %s
                        AND posts.post_status = %s
                        AND course_status.meta_value IN ('1', '2', '3', '4')
                        ORDER BY posts.ID ASC
                        LIMIT %d, %d
                    ", $user_id, 'course', 'publish', $offset, $posts_per_page), ARRAY_A));


        if ($paged_courses) {
            foreach ($paged_courses as $allCourseId) {
                $allCourseId = $allCourseId->id;
                setup_postdata($allCourseId);

                $img_src = get_the_post_thumbnail_url($allCourseId);
                $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                $image = $img_src ? $img_src : $img_default;

                $average_rating = get_post_meta($allCourseId, 'average_rating', true);
                $reviews_count = get_post_meta($allCourseId, 'rating_count', true);
            ?>
                <!-- Course Card Template (same as above) -->
                <div class="a2n-course__card">
                    <div class="a2n-course__thumbnail">
                        <div class="a2n-course__prgr">
                            <?php
                            $progress = bp_course_get_user_progress($user_id, $allCourseId);
                            ?>
                            <progress max="100" value="<?php echo $progress; ?>" class="prog ar-prgwd"></progress>
                            <h5 class="a2n-course__cmplt"><b><?php echo $progress ?: '0'; ?> %</b> Complete</h5>
                        </div>
                        <a href="<?php echo get_the_permalink($allCourseId); ?>">
                            <img src="<?php echo $image; ?>" alt="" />
                        </a>
                    </div>
                    <div class="a2n-course__content">
                        <span class="a2n-course__tip">
                            <?php
                            $terms = get_the_terms($allCourseId, 'course-cat');
                            if (!empty($terms)) {
                                echo '<a href="' . get_term_link($terms[0]) . '" rel="tag">' . $terms[0]->name . '</a>';
                            }
                            ?>
                        </span>
                        <h3 class="a2n-course__title">
                            <a target="_blank" href="<?php echo get_the_permalink($allCourseId); ?>"><?php echo get_the_title($allCourseId); ?></a>
                        </h3>
                        <div class="a2n-course__meta a2n-course__details">
                            <span class="a2n-course__count-ratings"> <?php echo $average_rating; ?> </span>
                            <div class="star-ratings">
                                <div class="fill-ratings" style="width: <?php echo ($average_rating * 20); ?>%">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                            <span class="a2n-course__count-reviews">(<?php echo $reviews_count; ?>)</span>
                        </div>
                        <div class="a2n-course__action">
                            <?php the_course_button($allCourseId); ?>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
        wp_die();
    }
}

// Register the AJAX action for logged-in users
add_action('wp_ajax_load_more_courses', 'load_more_courses');
add_action('wp_ajax_nopriv_load_more_courses', 'load_more_courses');


function fetch_customer_orders_ajax()
{
    if (isset($_POST['paged'])) {
        $user_id = (int) $_POST['userId'];
        $paged = (int) $_POST['paged'];
        $posts_per_page = 1;

        $transient_key = 'customer_orders_' . $user_id . '_page_' . $paged;
        $customer_orders = get_transient($transient_key);
        // wp_send_json($user_id);


        if (false === $customer_orders) {
            // Use a lighter query to fetch orders
            $args = array(
                'meta_key' => '_customer_user',
                'meta_value' => $user_id,
                'post_type' => wc_get_order_types('view-orders'),
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'post_status' => array_keys(wc_get_order_statuses('Completed', 'Order status', 'woocommerce')),
                'fields' => 'ids',
            );

            $customer_orders = get_posts($args);

            // Cache the result to avoid querying again
            set_transient($transient_key, $customer_orders, MINUTE_IN_SECONDS);
        }

        if (is_array($customer_orders) && !empty($customer_orders)) {

            $i = 1;

            ob_start(); // Start output buffering

            foreach ($customer_orders as $order_id) {
                $order = wc_get_order($order_id);
                if (!$order) continue;

                $orders_id = $order->get_id();
                $status = $order->get_status();
                $date_created = $order->get_date_created()->date('d/m/Y - H:i');
                $order_total = $order->get_formatted_order_total();
                $items = $order->get_items();

                foreach ($items as $item) {
                    $product_name = $item->get_name();
                    $product = $item->get_product();
                    $product_price = wc_price($item->get_total());

                    // Output HTML for each order item
                    echo '
                        <tr>
                            <th scope="col">' . esc_html($i) . '</th>
                            <th scope="col">' . esc_html($orders_id) . '</th>
                            <th scope="col">' . esc_html($product_name) . '</th>
                            <th scope="col">' . esc_html($date_created) . '</th>
                            <th scope="col"><span class="btnforstatus">' . esc_html($status) . '</span></th>
                            <th scope="col">' . $product_price . '</th>
                        </tr>';
                    $i++;
                }

                // Output order total
                echo '
                    <tr>
                        <th colspan="5" style="text-align:right;">Total Amount (With VAT):</th>
                        <th>' . $order_total . '</th>
                    </tr>';
            }

            $output = ob_get_clean();

            // Check if there are more orders to load
            $total_orders = wc_get_customer_order_count($user_id);

            $total_pages = ceil($total_orders / $posts_per_page);
            $has_more = ($paged < $total_pages);

            wp_send_json_success(array('html' => $output, 'has_more' => $has_more)); // Send the HTML and 'has_more' flag
        } else {
            wp_send_json_error('<tr><td colspan="6">No orders found.</td></tr>');
        }
    }

    wp_die(); // Terminate the script
}
add_action('wp_ajax_fetch_customer_orders', 'fetch_customer_orders_ajax');
add_action('wp_ajax_nopriv_fetch_customer_orders', 'fetch_customer_orders_ajax');


// Handle AJAX request for pagination
function load_more_courses_ongoing()
{
    if (isset($_POST['page'])) {

        $posts_per_page = 12;
        $page = intval($_POST['page']);
        $offset = ($page - 1) * $posts_per_page;
        $user_id = intval($_POST['userId']);

        global $wpdb;
        $paged_courses = $wpdb->get_results(apply_filters('wplms_usermeta_direct_query', $wpdb->prepare("
                        SELECT DISTINCT posts.ID as id
                        FROM {$wpdb->posts} AS posts
                        LEFT JOIN {$wpdb->usermeta} AS course_status ON course_status.meta_key = CONCAT('course_status', posts.ID)
                        AND course_status.user_id = %d
                        WHERE posts.post_type = %s
                        AND posts.post_status = %s
                        AND course_status.meta_value IN ('1', '2')
                        ORDER BY posts.ID ASC
                        LIMIT %d, %d
                    ", $user_id, 'course', 'publish', $offset, $posts_per_page), ARRAY_A));


        if ($paged_courses) {
            foreach ($paged_courses as $allCourseId) {
                $allCourseId = $allCourseId->id;
                setup_postdata($allCourseId);

                $img_src = get_the_post_thumbnail_url($allCourseId);
                $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                $image = $img_src ? $img_src : $img_default;

                $average_rating = get_post_meta($allCourseId, 'average_rating', true);
                $reviews_count = get_post_meta($allCourseId, 'rating_count', true);
            ?>
                <!-- Course Card Template (same as above) -->
                <div class="a2n-course__card">
                    <div class="a2n-course__thumbnail">
                        <div class="a2n-course__prgr">
                            <?php
                            $progress = bp_course_get_user_progress($user_id, $allCourseId);
                            ?>
                            <progress max="100" value="<?php echo $progress; ?>" class="prog ar-prgwd"></progress>
                            <h5 class="a2n-course__cmplt"><b><?php echo $progress ?: '0'; ?> %</b> Complete</h5>
                        </div>
                        <a href="<?php echo get_the_permalink($allCourseId); ?>">
                            <img src="<?php echo $image; ?>" alt="" />
                        </a>
                    </div>
                    <div class="a2n-course__content">
                        <span class="a2n-course__tip">
                            <?php
                            $terms = get_the_terms($allCourseId, 'course-cat');
                            if (!empty($terms)) {
                                echo '<a href="' . get_term_link($terms[0]) . '" rel="tag">' . $terms[0]->name . '</a>';
                            }
                            ?>
                        </span>
                        <h3 class="a2n-course__title">
                            <a target="_blank" href="<?php echo get_the_permalink($allCourseId); ?>"><?php echo get_the_title($allCourseId); ?></a>
                        </h3>
                        <div class="a2n-course__meta a2n-course__details">
                            <span class="a2n-course__count-ratings"> <?php echo $average_rating; ?> </span>
                            <div class="star-ratings">
                                <div class="fill-ratings" style="width: <?php echo ($average_rating * 20); ?>%">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                            <span class="a2n-course__count-reviews">(<?php echo $reviews_count; ?>)</span>
                        </div>
                        <div class="a2n-course__action">
                            <?php the_course_button($allCourseId); ?>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
        wp_die();
    }
}

// Register the AJAX action for logged-in users
add_action('wp_ajax_load_more_courses_ongoing', 'load_more_courses_ongoing');
add_action('wp_ajax_nopriv_load_more_courses_ongoing', 'load_more_courses_ongoing');



// Handle AJAX request for pagination
function load_more_courses_completed()
{
    if (isset($_POST['page'])) {

        $posts_per_page = 12;
        $page = intval($_POST['page']);
        $offset = ($page - 1) * $posts_per_page;
        $user_id = intval($_POST['userId']);

        global $wpdb;
        $paged_courses = $wpdb->get_results(apply_filters('wplms_usermeta_direct_query', $wpdb->prepare("
                        SELECT DISTINCT posts.ID as id
                        FROM {$wpdb->posts} AS posts
                        LEFT JOIN {$wpdb->usermeta} AS course_status ON course_status.meta_key = CONCAT('course_status', posts.ID)
                        AND course_status.user_id = %d
                        WHERE posts.post_type = %s
                        AND posts.post_status = %s
                        AND course_status.meta_value IN ('3', '4')
                        ORDER BY posts.ID ASC
                        LIMIT %d, %d
                    ", $user_id, 'course', 'publish', $offset, $posts_per_page), ARRAY_A));


        if ($paged_courses) {
            foreach ($paged_courses as $allCourseId) {
                $allCourseId = $allCourseId->id;
                setup_postdata($allCourseId);

                $img_src = get_the_post_thumbnail_url($allCourseId);
                $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                $image = $img_src ? $img_src : $img_default;

                $average_rating = get_post_meta($allCourseId, 'average_rating', true);
                $reviews_count = get_post_meta($allCourseId, 'rating_count', true);
            ?>
                <!-- Course Card Template (same as above) -->
                <div class="a2n-course__card">
                    <div class="a2n-course__thumbnail">
                        <div class="a2n-course__prgr">
                            <?php
                            $progress = bp_course_get_user_progress($user_id, $allCourseId);
                            ?>
                            <progress max="100" value="<?php echo $progress; ?>" class="prog ar-prgwd"></progress>
                            <h5 class="a2n-course__cmplt"><b><?php echo $progress ?: '0'; ?> %</b> Complete</h5>
                        </div>
                        <a href="<?php echo get_the_permalink($allCourseId); ?>">
                            <img src="<?php echo $image; ?>" alt="" />
                        </a>
                    </div>
                    <div class="a2n-course__content">
                        <span class="a2n-course__tip">
                            <?php
                            $terms = get_the_terms($allCourseId, 'course-cat');
                            if (!empty($terms)) {
                                echo '<a href="' . get_term_link($terms[0]) . '" rel="tag">' . $terms[0]->name . '</a>';
                            }
                            ?>
                        </span>
                        <h3 class="a2n-course__title">
                            <a target="_blank" href="<?php echo get_the_permalink($allCourseId); ?>"><?php echo get_the_title($allCourseId); ?></a>
                        </h3>
                        <div class="a2n-course__meta a2n-course__details">
                            <span class="a2n-course__count-ratings"> <?php echo $average_rating; ?> </span>
                            <div class="star-ratings">
                                <div class="fill-ratings" style="width: <?php echo ($average_rating * 20); ?>%">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                            <span class="a2n-course__count-reviews">(<?php echo $reviews_count; ?>)</span>
                        </div>
                        <div class="a2n-course__action">
                            <?php the_course_button($allCourseId); ?>
                        </div>
                    </div>
                </div>
<?php
            }
        }
        wp_die();
    }
}

// Register the AJAX action for logged-in users
add_action('wp_ajax_load_more_courses_completed', 'load_more_courses_completed');
add_action('wp_ajax_nopriv_load_more_courses_completed', 'load_more_courses_completed');


// user after login stay
function dash_custom_redirect_after_login($user_login, $user)
{
    if (in_array('business-manager', (array) $user->roles) || in_array('business', (array) $user->roles)) {
        return;
    }
    // Get the logged-in user's ID from the $user object
    $user_id = $user->ID;

    // Custom URL to redirect to after login (including user profile link)
    $LinkProfile = bp_core_get_userlink($user_id, $no_anchor = false, $just_link = true);

    // Append the #my_courses section to the URL
    $custom_redirect_url = $LinkProfile . "/#my_courses";

    // Perform the redirect
    wp_redirect($custom_redirect_url);
    exit();
}
add_action('wp_login', 'dash_custom_redirect_after_login', 10, 2);
