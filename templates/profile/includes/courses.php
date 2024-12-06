<div id="my_courses" class="a2n_dash_tabs">
    <style>
        .button_for_action form input.button {
            font-size: 11px;
            margin-top: 20px;
            display: block;
            cursor: pointer;
            width: 100%;
        }
    </style>
    <div class="a2n-dash_grid">
        <div class="a2n_dash_card a2n_dash_card-1">
            <h2><?php echo $totalCourse; ?></h2>
            <div class="course_count">
                <h5>Enrolled Courses</h5>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/Group.svg" alt="" />
            </div>
        </div>
        <div class="a2n_dash_card a2n_dash_card-2">
            <h2><?php echo $activeCourses; ?></h2>
            <div class="course_count">
                <h5>Ongoing Courses</h5>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/Group 1000004112.svg" alt="" />
            </div>
        </div>
        <div class="a2n_dash_card a2n_dash_card-3">
            <h2><?php echo $completedCourses; ?></h2>
            <div class="course_count">
                <h5>Completed Courses</h5>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/Group 1000004111.svg" alt="" />
            </div>
        </div>
    </div>
    <!-- courses tab container start -->
    <div class="a2n_c-tab_section">
        <!-- course tab menu  -->
        <div class="a2n_c-menu">
            <ul id="a2n_c-nav">
                <li>
                    <a class="a2n_c-active" href="#enrolled_courses">Enrolled Courses</a>
                </li>
                <li><a href="#ongoing_courses">Ongoing Courses</a></li>
                <li><a href="#completed_courses">Completed Courses</a></li>
            </ul>
        </div>
        <div class="a2n_c-tabs__container">
            <!-- Enrolled Courses tab start  -->
            <div id="enrolled_courses" class="a2n-c_tab a2n-c_active-tab">
                <div class="a2n-course__grid">
                    <?php
                    if ($all_Courses) {
                        foreach ($all_Courses as $allCourseId) {
                            setup_postdata($allCourseId);


                            $img_src = get_the_post_thumbnail_url($allCourseId);
                            $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                            $image = $img_src ? $img_src : $img_default;

                            $average_rating = get_post_meta($allCourseId, 'average_rating', true);
                            $reviews_count = get_post_meta($allCourseId, 'rating_count', true);
                    ?>
                            <!-- course #1 start  -->
                            <div class="a2n-course__card">
                                <div class="a2n-course__thumbnail">
                                    <a href="<?php echo get_the_permalink($allCourseId); ?>">
                                        <img src="<?php echo $image; ?>" alt="" />
                                    </a>
                                </div>
                                <div class="a2n-course__content">
                                    <span class="a2n-course__tip">
                                        <?php
                                        // $course_id = get_the_ID();
                                        $terms = get_the_terms($allCourseId, 'course-cat');
                                        if (!empty($terms)) {
                                            $category = array();
                                            $cat = "";
                                            $iterated = false;
                                            foreach ($terms as $term) {
                                                if (!$iterated) {
                                                    echo '<a href="' . get_term_link($term) . '" rel="tag">' . $term->name . '</a>';
                                                    $iterated = true;
                                                }
                                            }

                                            // $course_category = implode(',', $category);
                                        }
                                        ?>
                                    </span>
                                    <h3 class="a2n-course__title">
                                        <a target="_blank" href="<?php echo get_the_permalink($allCourseId); ?>"><?php echo get_the_title($allCourseId); ?> </a>
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
                                    <div class="button_for_action">
                                        <?php the_course_button($allCourseId); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- course #1 end  -->
                    <?php
                        }
                    } else {
                        echo '<h2>No course found</h2>';
                    }
                    ?>
                </div>
            </div>
            <!-- Enrolled Courses tab end   -->
            <!-- Ongoing Courses tab start  -->
            <div id="ongoing_courses" class="a2n-c_tab">
                <div class="a2n-course__grid">
                    <?php
                    if ($active_Courses) {
                        foreach ($active_Courses as $course_id) {
                            setup_postdata($course_id);

                            $img_src = get_the_post_thumbnail_url($course_id);
                            $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                            $image = $img_src ? $img_src : $img_default;

                            $average_rating = get_post_meta($course_id, 'average_rating', true);
                            $reviews_count = get_post_meta($course_id, 'rating_count', true);
                    ?>
                            <!-- course #1 start  -->
                            <div class="a2n-course__card">
                                <div class="a2n-course__thumbnail">
                                    <a href="<?php echo get_the_permalink($course_id); ?>">
                                        <img src="<?php echo $image; ?>" alt="" />
                                    </a>
                                </div>
                                <div class="a2n-course__content">
                                    <span class="a2n-course__tip">
                                        <?php
                                        // $course_id = get_the_ID();
                                        $terms = get_the_terms($course_id, 'course-cat');
                                        if (!empty($terms)) {
                                            $category = array();
                                            $cat = "";
                                            $iterated = false;
                                            foreach ($terms as $term) {
                                                if (!$iterated) {
                                                    echo '<a href="' . get_term_link($term) . '" rel="tag">' . $term->name . '</a>';
                                                    $iterated = true;
                                                }
                                            }

                                            // $course_category = implode(',', $category);
                                        }
                                        ?>
                                    </span>
                                    <h3 class="a2n-course__title">
                                        <a target="_blank" href="<?php echo get_the_permalink($course_id); ?>"><?php echo get_the_title($course_id); ?> </a>
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
                                    <div class="button_for_action">
                                        <?php the_course_button($allCourseId); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- course #1 end  -->
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
                <div class="a2n-course__grid">

                    <?php
                    if ($completed_Courses) {
                        foreach ($completed_Courses as $course_id) {
                            setup_postdata($course_id);

                            $img_src = get_the_post_thumbnail_url($course_id);
                            $img_default = get_stylesheet_directory_uri() . '/assets/dash/images/placeholder.jpg';
                            $image = $img_src ? $img_src : $img_default;

                            $average_rating = get_post_meta($course_id, 'average_rating', true);
                            $reviews_count = get_post_meta($course_id, 'rating_count', true);
                    ?>
                            <!-- course #1 start  -->
                            <div class="a2n-course__card">
                                <div class="a2n-course__thumbnail">
                                    <a href="<?php echo get_the_permalink($course_id); ?>">
                                        <img src="<?php echo $image; ?>" alt="" />
                                    </a>
                                </div>
                                <div class="a2n-course__content">
                                    <span class="a2n-course__tip">
                                        <?php
                                        // $course_id = get_the_ID();
                                        $terms = get_the_terms($course_id, 'course-cat');
                                        if (!empty($terms)) {
                                            $category = array();
                                            $cat = "";
                                            $iterated = false;
                                            foreach ($terms as $term) {
                                                if (!$iterated) {
                                                    echo '<a href="' . get_term_link($term) . '" rel="tag">' . $term->name . '</a>';
                                                    $iterated = true;
                                                }
                                            }

                                            // $course_category = implode(',', $category);
                                        }
                                        ?>
                                    </span>
                                    <h3 class="a2n-course__title">
                                        <a target="_blank" href="<?php echo get_the_permalink($course_id); ?>"><?php echo get_the_title($course_id); ?> </a>
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
                                    <div class="button_for_action">
                                        <?php the_course_button($allCourseId); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- course #1 end  -->
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