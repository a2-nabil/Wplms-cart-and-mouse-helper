<?php
if (function_exists('get_field')) {
  $selected_option = get_field('bundle_courses_styles');
  if ($selected_option === 'List Style') {
    $bundle_courses_ids = get_field('bundle_courses_ids');
    if ($bundle_courses_ids) {
      $bCourses_Ids = explode(',', $bundle_courses_ids);
      $bCourses_Ids = array_map('trim', $bCourses_Ids);
      ?>
      <ul class="a2n-bundle_courses_list">
        <?php
        $i = 1;
        foreach ($bCourses_Ids as $nxt_id) {
          if (!empty($nxt_id)) {
            $nxt_title = get_the_title($nxt_id);
            $nxt_permalink = get_permalink($nxt_id);
            ?>
            <li><a href="<?php echo esc_url($nxt_permalink); ?>" target="_blank"><strong>Course
                  <?php echo sprintf('%02d', $i); ?>:</strong> <?php echo esc_html($nxt_title); ?></a></li>
            <?php
          }
          $i++;
        }
        ?>
      </ul>
      <?php
    } else {
      echo 'No IDs found.';
    }
  }
}


// for janets tab 2
// [bundle_course_by_cat_id2 course_ids="474747,474653,474725"]
// [elementor-template id="471797"]