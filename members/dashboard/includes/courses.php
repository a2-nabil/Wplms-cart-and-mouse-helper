<div id="my_courses" class="a2n_dash_tabs">
    <div class="a2n-welcome__wrapper">
        <h2>My Courses</h2>
    </div>

    <div class="a2n-dash_grid a2n_courseCount__wrapper">
        <div class="a2n_dash_card a2n_dash_card-1">
            <div class="count_start">
                <h3>Enrolled Courses</h3>
                <h2><?php echo $totalCourse ? $totalCourse : "0"; ?></h2>
            </div>
            <div class="count_end">
                <a class="a2n_new_tab" href="#enrolled_courses">Go to My Courses <svg xmlns="http://www.w3.org/2000/svg"
                        width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.164376 1.21855C-0.0943812 0.895102 -0.0419401 0.423133 0.281506 0.164376C0.604953 -0.0943811 1.07692 -0.0419401 1.33568 0.281506L5.33568 5.28151C5.55481 5.55542 5.55481 5.94464 5.33568 6.21855L1.33568 11.2185C1.07692 11.542 0.604952 11.5944 0.281506 11.3357C-0.0419406 11.0769 -0.0943816 10.605 0.164376 10.2815L3.78956 5.75003L0.164376 1.21855ZM6.16438 1.21855C5.90562 0.895103 5.95806 0.423133 6.28151 0.164376C6.60495 -0.0943808 7.07692 -0.0419398 7.33568 0.281507L11.3357 5.28151C11.5548 5.55542 11.5548 5.94464 11.3357 6.21855L7.33568 11.2185C7.07692 11.542 6.60495 11.5944 6.28151 11.3357C5.95806 11.0769 5.90562 10.605 6.16437 10.2815L9.78956 5.75003L6.16438 1.21855Z"
                            fill="#33B294" />
                    </svg></a>
            </div>
        </div>
        <div class="a2n_dash_card a2n_dash_card-2">
            <div class="count_start">
                <h3>Active Courses</h3>
                <h2><?php echo $activeCourses ? $activeCourses : "0"; ?></h2>
            </div>
            <div class="count_end">
                <a class="a2n_new_tab" href="#ongoing_courses">Complete the course <svg
                        xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.164376 1.21855C-0.0943812 0.895102 -0.0419401 0.423133 0.281506 0.164376C0.604953 -0.0943811 1.07692 -0.0419401 1.33568 0.281506L5.33568 5.28151C5.55481 5.55542 5.55481 5.94464 5.33568 6.21855L1.33568 11.2185C1.07692 11.542 0.604952 11.5944 0.281506 11.3357C-0.0419406 11.0769 -0.0943816 10.605 0.164376 10.2815L3.78956 5.75003L0.164376 1.21855ZM6.16438 1.21855C5.90562 0.895103 5.95806 0.423133 6.28151 0.164376C6.60495 -0.0943808 7.07692 -0.0419398 7.33568 0.281507L11.3357 5.28151C11.5548 5.55542 11.5548 5.94464 11.3357 6.21855L7.33568 11.2185C7.07692 11.542 6.60495 11.5944 6.28151 11.3357C5.95806 11.0769 5.90562 10.605 6.16437 10.2815L9.78956 5.75003L6.16438 1.21855Z"
                            fill="#33B294" />
                    </svg></a>
            </div>
        </div>
        <div class="a2n_dash_card a2n_dash_card-3">
            <div class="count_start">
                <h3>Completed Courses</h3>
                <h2><?php echo $completedCourses ? $completedCourses : "0"; ?> </h2>
            </div>
            <div class="count_end">
                <a class="a2n_new_tab" href="#completed_courses">Claim Certificate <svg
                        xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.164376 1.21855C-0.0943812 0.895102 -0.0419401 0.423133 0.281506 0.164376C0.604953 -0.0943811 1.07692 -0.0419401 1.33568 0.281506L5.33568 5.28151C5.55481 5.55542 5.55481 5.94464 5.33568 6.21855L1.33568 11.2185C1.07692 11.542 0.604952 11.5944 0.281506 11.3357C-0.0419406 11.0769 -0.0943816 10.605 0.164376 10.2815L3.78956 5.75003L0.164376 1.21855ZM6.16438 1.21855C5.90562 0.895103 5.95806 0.423133 6.28151 0.164376C6.60495 -0.0943808 7.07692 -0.0419398 7.33568 0.281507L11.3357 5.28151C11.5548 5.55542 11.5548 5.94464 11.3357 6.21855L7.33568 11.2185C7.07692 11.542 6.60495 11.5944 6.28151 11.3357C5.95806 11.0769 5.90562 10.605 6.16437 10.2815L9.78956 5.75003L6.16438 1.21855Z"
                            fill="#33B294" />
                    </svg></a>
            </div>
        </div>
    </div>

    <!-- <input type="text" class="nxt_input_field"> -->
    <!-- <div class="search-container" style="margin-top:40px">
        <input type="text" class="nxt_input_field" placeholder="Filter the Courses...">
        <i class="fa fa-search"></i>
    </div> -->
    <style>
        .nxt_input_field {
            width: 100%;
            padding: 15px 20px;
            padding-right: 50px;
            border-radius: 50px;
            border: 1px solid #ccc;
            font-size: 16px;
            outline: none;
            box-sizing: border-box;
        }

        #load-more {
            color: #fff !important;
            display: block;
            background: #48bcaf !important;
            padding: 14px 30px;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-size: 16px;
            border: none;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>

    <!-- courses tab container start -->
    <div class="a2n_c-tab_section">
        <!-- course tab menu  -->
        <div class="a2n_c-menu a2n_common_nav a2n_coursesHead">
            <ul class="a2n_course__nav" id="a2n_c-nav">
                <li>
                    <a class="a2n_c-active" href="#enrolled_courses">Enrolled Courses</a>
                </li>
                <li><span>|</span></li>
                <li><a href="#ongoing_courses">Active Courses</a></li>
                <li><span>|</span></li>
                <li><a href="#completed_courses">Completed Courses</a></li>
            </ul>
            <div class="a2n_courses__filter">
                <div id="a2n_order-select" class="a2n_filter">
                    <label for="a2n_order-by">Sort By:</label>
                    <select id="a2n_order-by">
                        <option value>Select</option>
                        <option value="alphabetical">Alphabetical</option>
                        <option value="start_date">Start Date</option>
                    </select>
                </div>
                <div class="a2n-grid_list_wrapper">
                    <a id="a2n-toggle_button" href="javascript:void(0)"><i class="fa fa-th-large"></i></a>
                </div>

            </div>
        </div>
        <div class="a2n_c-tabs__container">
            <!-- Enrolled Courses tab start  -->
            <div id="enrolled_courses" class="a2n-c_tab a2n-c_active-tab">


                <div id="course-container" class="a2n-course__grid a2n_courses">
                    <?php
                    // $posts_per_page = 12;
                    // $total_courses = count($all_Courses);
                    // $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

                    // $offset = ($paged - 1) * $posts_per_page;
                    // $paged_courses = array_slice($all_Courses, $offset, $posts_per_page);


                    // $posts_per_page = 12;
                    // $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
                    // $offset = ($paged - 1) * $posts_per_page;

                    // // Fetch all courses assigned to the user with specified status
                    // $paged_courses = $wpdb->get_results(apply_filters('wplms_usermeta_direct_query', $wpdb->prepare("
                    //     SELECT DISTINCT posts.ID as id
                    //     FROM {$wpdb->posts} AS posts
                    //     LEFT JOIN {$wpdb->usermeta} AS course_status ON course_status.meta_key = CONCAT('course_status', posts.ID)
                    //     AND course_status.user_id = %d
                    //     WHERE posts.post_type = %s
                    //     AND posts.post_status = %s
                    //     AND course_status.meta_value IN ('1', '2', '3', '4')
                    //     ORDER BY posts.ID ASC
                    //     LIMIT %d, %d
                    // ", $user_id, 'course', 'publish', $offset, $posts_per_page), ARRAY_A));



                    if ($all_Courses) {
                        foreach ($all_Courses as $allCourseId) {
                            // $allCourseId = $allCourseId->id;
                            setup_postdata($allCourseId);

                            $img_src = get_the_post_thumbnail_url($allCourseId);
                            $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                            $image = $img_src ? $img_src : $img_default;

                            $average_rating = get_post_meta($allCourseId, 'average_rating', true);
                            $reviews_count = get_post_meta($allCourseId, 'rating_count', true);
                            $student_count = get_post_meta($allCourseId, 'vibe_students', true);

                            $courseTitle = get_the_title($allCourseId);


                            // $courseDate = get_the_date('Y-m-d', $allCourseId);
                            $results = $wpdb->get_results(
                                $wpdb->prepare(
                                    "
                                    SELECT MAX(date_recorded) as date_recorded 
                                    FROM {$wpdb->prefix}bp_activity 
                                    WHERE item_id = %d and user_id = %d and type = 'subscribe_course'
                                    ",
                                    $allCourseId,
                                    $user_id
                                )
                            );
                            foreach ($results as $result) {
                                $courseDate = date('Y-m-d', strtotime($result->date_recorded));
                            }
                    ?>
                            <!-- course start  -->
                            <div class="a2n-course__card" data-date="<?php echo $courseDate; ?>"
                                data-name="<?php echo $courseTitle; ?>">
                                <div class="a2n_course__start">
                                    <div class="a2n-course__thumbnail">
                                        <a href="<?php echo get_the_permalink($allCourseId); ?>">
                                            <img src="<?php echo $image; ?>" alt="" />
                                        </a>
                                        <div class="star-ratings a2n_list_stars">
                                            <div class="fill-ratings" style="width: <?php echo ($average_rating * 20); ?>%">
                                                <span>★★★★★</span>
                                            </div>
                                            <div class="empty-ratings">
                                                <span>★★★★★</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="a2n-course__content">
                                        <h3 class="a2n-course__title">
                                            <a target="_blank"
                                                href="<?php echo get_the_permalink($allCourseId); ?>"><?php echo $courseTitle; ?></a>
                                        </h3>
                                        <div class="a2n_desktop">
                                            <div class="a2n-course__meta a2n-course__details">
                                                <span class="a2n-course__count-ratings"> <?php echo $average_rating; ?> </span>
                                                <div class="star-ratings">
                                                    <div class="fill-ratings"
                                                        style="width: <?php echo ($average_rating * 20); ?>%">
                                                        <span>★★★★★</span>
                                                    </div>
                                                    <div class="empty-ratings">
                                                        <span>★★★★★</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="a2n_list__metaDetails">
                                                <div class="a2n-course__meta">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23"
                                                        viewBox="0 0 25 23" fill="none">
                                                        <path
                                                            d="M16.67 8.71597C17.636 8.71597 18.42 9.49997 18.42 10.466V17.215C18.42 18.6739 17.8404 20.0731 16.8088 21.1048C15.7772 22.1364 14.378 22.716 12.919 22.716C11.4601 22.716 10.0609 22.1364 9.02922 21.1048C7.99758 20.0731 7.41802 18.6739 7.41802 17.215V10.466C7.41802 9.49997 8.20102 8.71597 9.16802 8.71597H16.67ZM2.66602 8.71597L7.04802 8.71397C6.68767 9.14819 6.47072 9.6834 6.42702 10.246L6.41702 10.466V17.215C6.41702 18.348 6.70802 19.414 7.21702 20.342C6.53195 20.6412 5.78314 20.765 5.03822 20.7022C4.29331 20.6394 3.57577 20.3921 2.95042 19.9825C2.32506 19.5729 1.8116 19.014 1.45641 18.3562C1.10122 17.6984 0.915499 16.9625 0.916017 16.215V10.466C0.916017 10.2361 0.961315 10.0084 1.04932 9.79605C1.13733 9.58366 1.26632 9.3907 1.42893 9.22818C1.59154 9.06567 1.78458 8.93678 1.99701 8.8489C2.20945 8.76101 2.43612 8.71584 2.66602 8.71597ZM18.791 8.71397L23.166 8.71597C24.132 8.71597 24.916 9.49997 24.916 10.466V16.216C24.9163 16.9631 24.7306 17.6986 24.3755 18.356C24.0205 19.0135 23.5074 19.5721 22.8824 19.9817C22.2575 20.3912 21.5404 20.6386 20.7959 20.7017C20.0514 20.7648 19.3029 20.6415 18.618 20.343L18.674 20.241C19.103 19.428 19.364 18.512 19.412 17.541L19.42 17.215V10.466C19.42 9.79997 19.184 9.18997 18.791 8.71397ZM12.916 0.715973C13.3756 0.715973 13.8308 0.806503 14.2554 0.982394C14.68 1.15829 15.0659 1.41609 15.3909 1.7411C15.7159 2.0661 15.9737 2.45194 16.1496 2.87658C16.3255 3.30122 16.416 3.75635 16.416 4.21597C16.416 4.6756 16.3255 5.13073 16.1496 5.55537C15.9737 5.98 15.7159 6.36584 15.3909 6.69085C15.0659 7.01585 14.68 7.27366 14.2554 7.44955C13.8308 7.62544 13.3756 7.71597 12.916 7.71597C11.9878 7.71597 11.0975 7.34722 10.4411 6.69085C9.78477 6.03447 9.41602 5.14423 9.41602 4.21597C9.41602 3.28772 9.78477 2.39748 10.4411 1.7411C11.0975 1.08472 11.9878 0.715973 12.916 0.715973ZM20.919 1.71597C21.313 1.71597 21.7031 1.79357 22.0671 1.94433C22.431 2.0951 22.7618 2.31608 23.0403 2.59465C23.3189 2.87323 23.5399 3.20395 23.6907 3.56792C23.8414 3.9319 23.919 4.32201 23.919 4.71597C23.919 5.10994 23.8414 5.50005 23.6907 5.86402C23.5399 6.228 23.3189 6.55872 23.0403 6.83729C22.7618 7.11587 22.431 7.33685 22.0671 7.48761C21.7031 7.63838 21.313 7.71597 20.919 7.71597C20.1234 7.71597 19.3603 7.3999 18.7977 6.83729C18.2351 6.27468 17.919 5.51162 17.919 4.71597C17.919 3.92032 18.2351 3.15726 18.7977 2.59465C19.3603 2.03204 20.1234 1.71597 20.919 1.71597ZM4.91302 1.71597C5.30698 1.71597 5.69709 1.79357 6.06107 1.94433C6.42504 2.0951 6.75576 2.31608 7.03434 2.59465C7.31291 2.87323 7.53389 3.20395 7.68466 3.56792C7.83542 3.9319 7.91302 4.32201 7.91302 4.71597C7.91302 5.10994 7.83542 5.50005 7.68466 5.86402C7.53389 6.228 7.31291 6.55872 7.03434 6.83729C6.75576 7.11587 6.42504 7.33685 6.06107 7.48761C5.69709 7.63838 5.30698 7.71597 4.91302 7.71597C4.11737 7.71597 3.35431 7.3999 2.7917 6.83729C2.22909 6.27468 1.91302 5.51162 1.91302 4.71597C1.91302 3.92032 2.22909 3.15726 2.7917 2.59465C3.35431 2.03204 4.11737 1.71597 4.91302 1.71597Z"
                                                            fill="#FFD600" />
                                                    </svg>
                                                    <span class="a2n-course__count-students"> <?php echo $student_count; ?>
                                                        Enrolled
                                                        Students</span>
                                                </div>
                                                <p> <?php echo the_excerpt(); ?></p>
                                            </div>
                                            <div class="a2n-course__prgr">
                                                <?php
                                                $progress = bp_course_get_user_progress($user_id, $allCourseId);
                                                ?>
                                                <h5 class="a2n-course__cmplt"><span><?php echo $progress ?: '0'; ?> %</span>
                                                    Completed</h5>
                                                <progress max="100" value="<?php echo $progress; ?>"
                                                    class="prog ar-prgwd"></progress>
                                            </div>
                                        </div>
                                        <div class="a2n-course__action a2n_mobile">
                                            <?php the_course_button($allCourseId); ?>
                                            <a target="_blank" href="<?php echo get_the_permalink($allCourseId); ?>"
                                                class="a2n_list-info__btn"> More Info </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="a2n-course__action a2n_desktop">
                                    <?php the_course_button($allCourseId); ?>
                                    <a target="_blank" href="<?php echo get_the_permalink($allCourseId); ?>"
                                        class="a2n_list-info__btn"> More Info </a>
                                </div>
                            </div>
                            <!-- course end  -->
                    <?php
                        }
                    } else {
                        echo '<h2>No courses found</h2>';
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <!-- <div id="pagination">
                    <?php if ($totalCourse > $posts_per_page): ?>
                        <button id="load-more" data-page="1">Load More Courses</button>
                    <?php endif; ?>
                </div> -->



                <script type="text/javascript">
                    // jQuery(document).ready(function($) {
                    //     var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
                    //     var page = 1;
                    //     var postsPerPage = 12;
                    //     var totalCourses = <?php echo $totalCourse; ?>;
                    //     var loadedCourses = postsPerPage;
                    //     var userId = <?php echo $user_id; ?>
                    //     $('#load-more').on('click', function() {
                    //         page++;
                    //         var loadMoreBtn = $('#load-more');
                    //         var originalText = loadMoreBtn.text();
                    //         loadMoreBtn.text('Course loading.....');

                    //         var data = {
                    //             'action': 'load_more_courses',
                    //             'page': page,
                    //             'userId': userId
                    //         };

                    //         $.post(ajaxurl, data, function(response) {
                    //             loadMoreBtn.text(originalText);
                    //             if (response) {
                    //                 $('#course-container').append(response);
                    //                 $('#load-more').data('page', page);

                    //                 loadedCourses += postsPerPage;

                    //                 if (loadedCourses >= totalCourses) {
                    //                     $('#load-more').hide();
                    //                 }
                    //             } else {
                    //                 $('#load-more').hide();
                    //             }
                    //         });
                    //     });
                    // });
                </script>




            </div>
            <!-- Enrolled Courses tab end   -->
            <!-- Ongoing Courses tab start  -->
            <div id="ongoing_courses" class="a2n-c_tab">
                <div class="a2n-course__grid a2n_courses">
                    <?php

                    if ($active_Courses) {
                        foreach ($active_Courses as $course_id) {
                            setup_postdata($course_id);

                            $img_src = get_the_post_thumbnail_url($course_id);
                            $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                            $image = $img_src ? $img_src : $img_default;

                            $average_rating = get_post_meta($course_id, 'average_rating', true);
                            $reviews_count = get_post_meta($course_id, 'rating_count', true);
                            $student_count = get_post_meta($course_id, 'vibe_students', true);

                            $courseTitle = get_the_title($course_id);
                            // $courseDate = get_the_date('Y-m-d', $course_id);
                            $results = $wpdb->get_results(
                                $wpdb->prepare(
                                    "
                                    SELECT MAX(date_recorded) as date_recorded 
                                    FROM {$wpdb->prefix}bp_activity 
                                    WHERE item_id = %d and user_id = %d and type = 'subscribe_course'
                                    ",
                                    $course_id,
                                    $user_id
                                )
                            );
                            foreach ($results as $result) {
                                $courseDate = date('Y-m-d', strtotime($result->date_recorded));
                            }
                    ?>
                            <!-- course start  -->
                            <div class="a2n-course__card" data-date="<?php echo $courseDate; ?>"
                                data-name="<?php echo $courseTitle; ?>">
                                <div class="a2n_course__start">
                                    <div class="a2n-course__thumbnail">
                                        <a href="<?php echo get_the_permalink($course_id); ?>">
                                            <img src="<?php echo $image; ?>" alt="" />
                                        </a>
                                        <div class="star-ratings a2n_list_stars">
                                            <div class="fill-ratings" style="width: <?php echo ($average_rating * 20); ?>%">
                                                <span>★★★★★</span>
                                            </div>
                                            <div class="empty-ratings">
                                                <span>★★★★★</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="a2n-course__content">
                                        <h3 class="a2n-course__title">
                                            <a target="_blank"
                                                href="<?php echo get_the_permalink($course_id); ?>"><?php echo $courseTitle; ?></a>
                                        </h3>
                                        <div class="a2n_desktop">
                                            <div class="a2n-course__meta a2n-course__details">
                                                <span class="a2n-course__count-ratings"> <?php echo $average_rating; ?> </span>
                                                <div class="star-ratings">
                                                    <div class="fill-ratings"
                                                        style="width: <?php echo ($average_rating * 20); ?>%">
                                                        <span>★★★★★</span>
                                                    </div>
                                                    <div class="empty-ratings">
                                                        <span>★★★★★</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="a2n_list__metaDetails">
                                                <div class="a2n-course__meta">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23"
                                                        viewBox="0 0 25 23" fill="none">
                                                        <path
                                                            d="M16.67 8.71597C17.636 8.71597 18.42 9.49997 18.42 10.466V17.215C18.42 18.6739 17.8404 20.0731 16.8088 21.1048C15.7772 22.1364 14.378 22.716 12.919 22.716C11.4601 22.716 10.0609 22.1364 9.02922 21.1048C7.99758 20.0731 7.41802 18.6739 7.41802 17.215V10.466C7.41802 9.49997 8.20102 8.71597 9.16802 8.71597H16.67ZM2.66602 8.71597L7.04802 8.71397C6.68767 9.14819 6.47072 9.6834 6.42702 10.246L6.41702 10.466V17.215C6.41702 18.348 6.70802 19.414 7.21702 20.342C6.53195 20.6412 5.78314 20.765 5.03822 20.7022C4.29331 20.6394 3.57577 20.3921 2.95042 19.9825C2.32506 19.5729 1.8116 19.014 1.45641 18.3562C1.10122 17.6984 0.915499 16.9625 0.916017 16.215V10.466C0.916017 10.2361 0.961315 10.0084 1.04932 9.79605C1.13733 9.58366 1.26632 9.3907 1.42893 9.22818C1.59154 9.06567 1.78458 8.93678 1.99701 8.8489C2.20945 8.76101 2.43612 8.71584 2.66602 8.71597ZM18.791 8.71397L23.166 8.71597C24.132 8.71597 24.916 9.49997 24.916 10.466V16.216C24.9163 16.9631 24.7306 17.6986 24.3755 18.356C24.0205 19.0135 23.5074 19.5721 22.8824 19.9817C22.2575 20.3912 21.5404 20.6386 20.7959 20.7017C20.0514 20.7648 19.3029 20.6415 18.618 20.343L18.674 20.241C19.103 19.428 19.364 18.512 19.412 17.541L19.42 17.215V10.466C19.42 9.79997 19.184 9.18997 18.791 8.71397ZM12.916 0.715973C13.3756 0.715973 13.8308 0.806503 14.2554 0.982394C14.68 1.15829 15.0659 1.41609 15.3909 1.7411C15.7159 2.0661 15.9737 2.45194 16.1496 2.87658C16.3255 3.30122 16.416 3.75635 16.416 4.21597C16.416 4.6756 16.3255 5.13073 16.1496 5.55537C15.9737 5.98 15.7159 6.36584 15.3909 6.69085C15.0659 7.01585 14.68 7.27366 14.2554 7.44955C13.8308 7.62544 13.3756 7.71597 12.916 7.71597C11.9878 7.71597 11.0975 7.34722 10.4411 6.69085C9.78477 6.03447 9.41602 5.14423 9.41602 4.21597C9.41602 3.28772 9.78477 2.39748 10.4411 1.7411C11.0975 1.08472 11.9878 0.715973 12.916 0.715973ZM20.919 1.71597C21.313 1.71597 21.7031 1.79357 22.0671 1.94433C22.431 2.0951 22.7618 2.31608 23.0403 2.59465C23.3189 2.87323 23.5399 3.20395 23.6907 3.56792C23.8414 3.9319 23.919 4.32201 23.919 4.71597C23.919 5.10994 23.8414 5.50005 23.6907 5.86402C23.5399 6.228 23.3189 6.55872 23.0403 6.83729C22.7618 7.11587 22.431 7.33685 22.0671 7.48761C21.7031 7.63838 21.313 7.71597 20.919 7.71597C20.1234 7.71597 19.3603 7.3999 18.7977 6.83729C18.2351 6.27468 17.919 5.51162 17.919 4.71597C17.919 3.92032 18.2351 3.15726 18.7977 2.59465C19.3603 2.03204 20.1234 1.71597 20.919 1.71597ZM4.91302 1.71597C5.30698 1.71597 5.69709 1.79357 6.06107 1.94433C6.42504 2.0951 6.75576 2.31608 7.03434 2.59465C7.31291 2.87323 7.53389 3.20395 7.68466 3.56792C7.83542 3.9319 7.91302 4.32201 7.91302 4.71597C7.91302 5.10994 7.83542 5.50005 7.68466 5.86402C7.53389 6.228 7.31291 6.55872 7.03434 6.83729C6.75576 7.11587 6.42504 7.33685 6.06107 7.48761C5.69709 7.63838 5.30698 7.71597 4.91302 7.71597C4.11737 7.71597 3.35431 7.3999 2.7917 6.83729C2.22909 6.27468 1.91302 5.51162 1.91302 4.71597C1.91302 3.92032 2.22909 3.15726 2.7917 2.59465C3.35431 2.03204 4.11737 1.71597 4.91302 1.71597Z"
                                                            fill="#FFD600" />
                                                    </svg>
                                                    <span class="a2n-course__count-students"> <?php echo $student_count; ?>
                                                        Enrolled
                                                        Students</span>
                                                </div>
                                                <p> <?php echo the_excerpt(); ?></p>
                                            </div>
                                            <div class="a2n-course__prgr">
                                                <?php
                                                $progress = bp_course_get_user_progress($user_id, $course_id);
                                                ?>
                                                <h5 class="a2n-course__cmplt"><span><?php echo $progress ?: '0'; ?> %</span>
                                                    Completed</h5>
                                                <progress max="100" value="<?php echo $progress; ?>"
                                                    class="prog ar-prgwd"></progress>
                                            </div>
                                        </div>
                                        <div class="a2n-course__action a2n_mobile">
                                            <?php the_course_button($course_id); ?>
                                            <a target="_blank" href="<?php echo get_the_permalink($course_id); ?>"
                                                class="a2n_list-info__btn"> More Info </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="a2n-course__action a2n_desktop">
                                    <?php the_course_button($course_id); ?>
                                    <a target="_blank" href="<?php echo get_the_permalink($course_id); ?>"
                                        class="a2n_list-info__btn"> More Info </a>
                                </div>
                            </div>
                            <!-- course end  -->
                    <?php
                        }
                    } else {
                        echo '<h2>No course found</h2>';
                    }
                    ?>

                </div>
            </div>
            <!-- Ongoing Courses tab end   -->
            <!-- Completed Courses tab start  -->
            <div id="completed_courses" class="a2n-c_tab">
                <div class="a2n-course__grid a2n_courses">

                    <?php
                    if ($completed_Courses) {
                        foreach ($completed_Courses as $course_id) {
                            setup_postdata($course_id);

                            $img_src = get_the_post_thumbnail_url($course_id);
                            $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                            $image = $img_src ? $img_src : $img_default;

                            $average_rating = get_post_meta($course_id, 'average_rating', true);
                            $reviews_count = get_post_meta($course_id, 'rating_count', true);
                            $student_count = get_post_meta($course_id, 'vibe_students', true);

                            $courseTitle = get_the_title($course_id);
                            // $courseDate = get_the_date('Y-m-d', $course_id);
                            $results = $wpdb->get_results(
                                $wpdb->prepare(
                                    "
                                    SELECT MAX(date_recorded) as date_recorded 
                                    FROM {$wpdb->prefix}bp_activity 
                                    WHERE item_id = %d and user_id = %d and type = 'subscribe_course'
                                    ",
                                    $course_id,
                                    $user_id
                                )
                            );
                            foreach ($results as $result) {
                                $courseDate = date('Y-m-d', strtotime($result->date_recorded));
                            }
                    ?>
                            <!-- course start  -->
                            <div class="a2n-course__card" data-date="<?php echo $courseDate; ?>"
                                data-name="<?php echo $courseTitle; ?>">
                                <div class="a2n_course__start">
                                    <div class="a2n-course__thumbnail">
                                        <a href="<?php echo get_the_permalink($course_id); ?>">
                                            <img src="<?php echo $image; ?>" alt="" />
                                        </a>
                                        <div class="star-ratings a2n_list_stars">
                                            <div class="fill-ratings" style="width: <?php echo ($average_rating * 20); ?>%">
                                                <span>★★★★★</span>
                                            </div>
                                            <div class="empty-ratings">
                                                <span>★★★★★</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="a2n-course__content">
                                        <h3 class="a2n-course__title">
                                            <a target="_blank"
                                                href="<?php echo get_the_permalink($course_id); ?>"><?php echo $courseTitle; ?></a>
                                        </h3>
                                        <div class="a2n_desktop">
                                            <div class="a2n-course__meta a2n-course__details">
                                                <span class="a2n-course__count-ratings"> <?php echo $average_rating; ?> </span>
                                                <div class="star-ratings">
                                                    <div class="fill-ratings"
                                                        style="width: <?php echo ($average_rating * 20); ?>%">
                                                        <span>★★★★★</span>
                                                    </div>
                                                    <div class="empty-ratings">
                                                        <span>★★★★★</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="a2n_list__metaDetails">
                                                <div class="a2n-course__meta">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="23"
                                                        viewBox="0 0 25 23" fill="none">
                                                        <path
                                                            d="M16.67 8.71597C17.636 8.71597 18.42 9.49997 18.42 10.466V17.215C18.42 18.6739 17.8404 20.0731 16.8088 21.1048C15.7772 22.1364 14.378 22.716 12.919 22.716C11.4601 22.716 10.0609 22.1364 9.02922 21.1048C7.99758 20.0731 7.41802 18.6739 7.41802 17.215V10.466C7.41802 9.49997 8.20102 8.71597 9.16802 8.71597H16.67ZM2.66602 8.71597L7.04802 8.71397C6.68767 9.14819 6.47072 9.6834 6.42702 10.246L6.41702 10.466V17.215C6.41702 18.348 6.70802 19.414 7.21702 20.342C6.53195 20.6412 5.78314 20.765 5.03822 20.7022C4.29331 20.6394 3.57577 20.3921 2.95042 19.9825C2.32506 19.5729 1.8116 19.014 1.45641 18.3562C1.10122 17.6984 0.915499 16.9625 0.916017 16.215V10.466C0.916017 10.2361 0.961315 10.0084 1.04932 9.79605C1.13733 9.58366 1.26632 9.3907 1.42893 9.22818C1.59154 9.06567 1.78458 8.93678 1.99701 8.8489C2.20945 8.76101 2.43612 8.71584 2.66602 8.71597ZM18.791 8.71397L23.166 8.71597C24.132 8.71597 24.916 9.49997 24.916 10.466V16.216C24.9163 16.9631 24.7306 17.6986 24.3755 18.356C24.0205 19.0135 23.5074 19.5721 22.8824 19.9817C22.2575 20.3912 21.5404 20.6386 20.7959 20.7017C20.0514 20.7648 19.3029 20.6415 18.618 20.343L18.674 20.241C19.103 19.428 19.364 18.512 19.412 17.541L19.42 17.215V10.466C19.42 9.79997 19.184 9.18997 18.791 8.71397ZM12.916 0.715973C13.3756 0.715973 13.8308 0.806503 14.2554 0.982394C14.68 1.15829 15.0659 1.41609 15.3909 1.7411C15.7159 2.0661 15.9737 2.45194 16.1496 2.87658C16.3255 3.30122 16.416 3.75635 16.416 4.21597C16.416 4.6756 16.3255 5.13073 16.1496 5.55537C15.9737 5.98 15.7159 6.36584 15.3909 6.69085C15.0659 7.01585 14.68 7.27366 14.2554 7.44955C13.8308 7.62544 13.3756 7.71597 12.916 7.71597C11.9878 7.71597 11.0975 7.34722 10.4411 6.69085C9.78477 6.03447 9.41602 5.14423 9.41602 4.21597C9.41602 3.28772 9.78477 2.39748 10.4411 1.7411C11.0975 1.08472 11.9878 0.715973 12.916 0.715973ZM20.919 1.71597C21.313 1.71597 21.7031 1.79357 22.0671 1.94433C22.431 2.0951 22.7618 2.31608 23.0403 2.59465C23.3189 2.87323 23.5399 3.20395 23.6907 3.56792C23.8414 3.9319 23.919 4.32201 23.919 4.71597C23.919 5.10994 23.8414 5.50005 23.6907 5.86402C23.5399 6.228 23.3189 6.55872 23.0403 6.83729C22.7618 7.11587 22.431 7.33685 22.0671 7.48761C21.7031 7.63838 21.313 7.71597 20.919 7.71597C20.1234 7.71597 19.3603 7.3999 18.7977 6.83729C18.2351 6.27468 17.919 5.51162 17.919 4.71597C17.919 3.92032 18.2351 3.15726 18.7977 2.59465C19.3603 2.03204 20.1234 1.71597 20.919 1.71597ZM4.91302 1.71597C5.30698 1.71597 5.69709 1.79357 6.06107 1.94433C6.42504 2.0951 6.75576 2.31608 7.03434 2.59465C7.31291 2.87323 7.53389 3.20395 7.68466 3.56792C7.83542 3.9319 7.91302 4.32201 7.91302 4.71597C7.91302 5.10994 7.83542 5.50005 7.68466 5.86402C7.53389 6.228 7.31291 6.55872 7.03434 6.83729C6.75576 7.11587 6.42504 7.33685 6.06107 7.48761C5.69709 7.63838 5.30698 7.71597 4.91302 7.71597C4.11737 7.71597 3.35431 7.3999 2.7917 6.83729C2.22909 6.27468 1.91302 5.51162 1.91302 4.71597C1.91302 3.92032 2.22909 3.15726 2.7917 2.59465C3.35431 2.03204 4.11737 1.71597 4.91302 1.71597Z"
                                                            fill="#FFD600" />
                                                    </svg>
                                                    <span class="a2n-course__count-students"> <?php echo $student_count; ?>
                                                        Enrolled
                                                        Students</span>
                                                </div>
                                                <p> <?php echo the_excerpt(); ?></p>
                                            </div>
                                            <div class="a2n-course__prgr">
                                                <?php
                                                $progress = bp_course_get_user_progress($user_id, $course_id);
                                                ?>
                                                <h5 class="a2n-course__cmplt"><span><?php echo $progress ?: '0'; ?> %</span>
                                                    Completed</h5>
                                                <progress max="100" value="<?php echo $progress; ?>"
                                                    class="prog ar-prgwd"></progress>
                                            </div>
                                        </div>
                                        <div class="a2n-course__action a2n_mobile">
                                            <?php the_course_button($course_id); ?>
                                            <a target="_blank" href="<?php echo get_the_permalink($course_id); ?>"
                                                class="a2n_list-info__btn"> More Info </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="a2n-course__action a2n_desktop">
                                    <?php the_course_button($course_id); ?>
                                    <a target="_blank" href="<?php echo get_the_permalink($course_id); ?>"
                                        class="a2n_list-info__btn"> More Info </a>
                                </div>
                            </div>
                            <!-- course end  -->
                    <?php
                        }
                    } else {
                        echo '<h2>No course found</h2>';
                    }
                    ?>

                </div>
            </div>
            <!-- Completed Courses tab end   -->
        </div>
    </div>
    <!-- courses tab container end  -->
</div>

<script>
    // my course search
    // filterCards(".nxt_input_field", ".a2n-course__card", ".a2n-course__title a");
</script>