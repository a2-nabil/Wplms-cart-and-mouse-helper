<?php
// course shortcode function 
function a2n_course_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'id' => '',
        ),
        $atts
    );
    ob_start();

    $a2n_course_id = $atts['id'];
    if (!empty($a2n_course_id)) {
        $a2n_course_ids = $a2n_course_id;
        $a2n_course_ids = (explode(",", $a2n_course_ids));
        $course_id = array();
        if ($a2n_course_ids) {
            foreach ($a2n_course_ids as $a2n_course_id) {
                $course_id[] = $a2n_course_id;
            }
        }
        $args = array(
            'post_type' => 'course',
            'posts_per_page' => 6,
            'post__in' => $course_id,
            'post_status' => 'published',
        );
    }
    $fetch = new WP_Query($args);
    if ($fetch->have_posts()) {
        while ($fetch->have_posts()) {
            $fetch->the_post();
            $course_ID = get_the_ID();
            $course_title = get_the_title($course_ID);
            $course_img = get_the_post_thumbnail_url($course_ID, "large");
            $units = bp_course_get_curriculum_units($course_ID);
            $duration = $total_duration = 0;


            foreach ($units as $unit) {
                $duration = get_post_meta($unit, 'vibe_duration', true);
                if (empty($duration)) {
                    $duration = 0;
                }
                if (get_post_type($unit) == 'unit') {
                    $unit_duration_parameter = apply_filters('vibe_unit_duration_parameter', 60, $unit);
                } elseif (get_post_type($unit) == 'quiz') {
                    $unit_duration_parameter = apply_filters('vibe_quiz_duration_parameter', 60, $unit);
                }
                $total_duration = $total_duration + $duration * $unit_duration_parameter;
            }

            $course_link = get_the_permalink($course_ID);
            $course_students = get_post_meta($course_ID, 'vibe_students', true);
            $product_ID = get_post_meta($course_ID, 'vibe_product', true);
            $regular_price = get_post_meta($product_ID, '_regular_price', true);
            $sale_price = get_post_meta($product_ID, '_sale_price', true);
            // $totalDiscount = (100 - ((100 * $sale_price) / $regular_price));
            $current_currency = get_woocommerce_currency_symbol();

            ?>
            <!-- Course Card start  -->
            <div class="a2n_course-card a2n-new_course-card">
                <div class="a2n_thumbnail">
                    <a href="#" class="pc_thumbnail">
                        <img decoding="async"
                            src="https://masteryonline.org/wp-content/uploads/2024/03/Introduction-learnpress-lms-plugin-4-400x300-1.webp"
                            alt="">
                    </a>
                    <span class="a2n-course__instructor">
                        <span class="a2n-course__instructor__avatar">
                            <img decoding="async"
                                src="https://masteryonline.org/wp-content/uploads/2024/03/e5c6a6fb8aa3864eacaec471611e0470.webp"
                                alt="">
                        </span>
                    </span>
                </div>
                <div class="a2n-course__content">
                    <div class="a2n-course__meta">
                        <span class="a2n-course__price">
                            <?php
                            if (!empty($product_ID)) {
                                if ($sale_price !== "") {
                                    $m_price = '<span>' . $current_currency . $sale_price . '</span>' . ' ' . '<del>' . $current_currency . $regular_price . '</del>';
                                } elseif ($regular_price !== "") {
                                    $m_price = '<span>' . $current_currency . $regular_price . '</span>';
                                } else {
                                    $m_price = '';
                                }
                                echo $m_price;
                            } else {
                                echo "Free";
                            }
                            ?>
                        </span>
                    </div>
                    <h2 class="a2n-course__title">
                        <a href="<?php echo esc_attr($course_link); ?>"> <?php echo $course_title; ?> </a>
                    </h2>
                    <div class="a2n-course__meta a2n-course__details">
                        <span class="a2n-course__count-lesson">
                            <i class="far fa-file-alt"></i><?php echo count($units); ?> lessons
                        </span>
                        <span class="a2n-course__count-student">
                            <i class="fas fa-user-friends"></i><?php echo $course_students ?> students
                        </span>
                    </div>
                    <div class="a2n-course__meta a2n-course__end">
                        <span class="a2n-course__categories">
                            <div class="course-categories">
                                <a href="#">Teaching Online</a>
                            </div>
                        </span>
                        <span class="course-review">
                            <div class="star-ratings">
                                <div class="fill-ratings" style="width: 50%">
                                    <span>★★★★★</span>
                                </div>
                                <div class="empty-ratings">
                                    <span>★★★★★</span>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>

            <div class="a2n-course_card">
                <div class="a2n-course__start">
                    <a href="<?php echo esc_attr($course_link); ?>">
                        <img src="<?php echo $course_img ?>" alt="" />
                    </a>
                    <div class="course_price">
                        <div class="price">
                            <?php
                            bp_course_credits();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="course_contents">
                    <div class="course_title">
                        <h2>
                            <a href="<?php echo esc_attr($course_link); ?>"> <?php echo $course_title; ?> </a>
                        </h2>
                    </div>
                    <div class="course_author">
                        <a href="#">by <?php echo $author_name; ?></a>
                    </div>
                    <div class="a2n-course__end">
                        <div class="a2n-course_meta course_lesson">
                            <i aria-hidden="true" class="fas fa-book"></i>
                            <h6><?php echo count($units); ?> lessons</h6>
                        </div>
                        <div class="a2n-course_meta course_student">
                            <i aria-hidden="true" class="far fa-user"></i>
                            <h6><?php echo $course_students ?> students</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course Card end  -->
            <?php
        }
        wp_reset_query();
    } else {
        echo "no course found";
    }
    return ob_get_clean();
}
add_shortcode('a2n_courses', 'a2n_course_shortcode');