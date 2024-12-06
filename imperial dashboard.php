  <!-- courses tab container start -->
  <div class="a2n_c-tab_section">
        <!-- course tab menu  -->
        <div class="a2n_c-menu">
            <ul class="a2n_course__nav" id="a2n-dashC__nav">
                <li>
                    <a class="a2n-dashC__active" href="#enrolled_courses">Enrolled Courses</a>
                </li>
                <li><span>|</span></li>
                <li><a href="#ongoing_courses">Ongoing Courses</a></li>
                <li><span>|</span></li>
                <li><a href="#completed_courses">Completed Courses</a></li>
            </ul>
        </div>
        <div class="a2n_c-tabs__container">
            <!-- Enrolled Courses tab start  -->
            <div id="enrolled_courses" class="a2n-c_tab a2n-c_active-tab">


                <div id="course-container" class="a2n-course__grid">
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
                            ?>
                            <!-- course #1 start  -->
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
                                        <a target="_blank"
                                            href="<?php echo get_the_permalink($allCourseId); ?>"><?php echo get_the_title($allCourseId); ?></a>
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
                            <!-- course #1 end  -->
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
                                    <div class="a2n-course__prgr">
                                        <?php
                                        $progress = bp_course_get_user_progress($user_id, $course_id);
                                        ?>
                                        <progress max="100" value="<?php echo $progress; ?>" class="prog ar-prgwd">
                                        </progress>
                                        <h5 class="a2n-course__cmplt"><b>
                                                <?php
                                                if (empty($progress)) {
                                                    echo '0';
                                                } else {
                                                    echo $progress;
                                                }
                                                ?> % </b> Complete</h5>
                                    </div>
                                    <a href="<?php echo get_the_permalink($course_id); ?>">
                                        <img src="<?php echo $image; ?>" alt="" />
                                    </a>
                                </div>
                                <div class="a2n-course__content">
                                    <span class="a2n-course__tip">
                                        <?php

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
                                        }
                                        ?>
                                    </span>
                                    <h3 class="a2n-course__title">
                                        <a target="_blank"
                                            href="<?php echo get_the_permalink($course_id); ?>"><?php echo get_the_title($course_id); ?>
                                        </a>
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
                                        <?php the_course_button($course_id); ?>
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
                                    <div class="a2n-course__prgr">
                                        <?php
                                        $progress = bp_course_get_user_progress($user_id, $course_id);
                                        ?>
                                        <progress max="100" value="<?php echo $progress; ?>" class="prog ar-prgwd">
                                        </progress>
                                        <h5 class="a2n-course__cmplt"><b>
                                                <?php
                                                if (empty($progress)) {
                                                    echo '0';
                                                } else {
                                                    echo $progress;
                                                }
                                                ?> % </b> Complete</h5>
                                    </div>
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
                                        <a target="_blank"
                                            href="<?php echo get_the_permalink($course_id); ?>"><?php echo get_the_title($course_id); ?>
                                        </a>
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
                                        <?php the_course_button($course_id); ?>
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