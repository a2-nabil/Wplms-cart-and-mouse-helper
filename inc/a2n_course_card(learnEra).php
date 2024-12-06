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
            $author_name = get_the_author_meta('display_name');

            ?>
            <!-- Course Card start  -->
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
                        <!-- <a href="#">by <?php echo $author_name; ?></a> -->
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