<div id="my_dashboard" class="a2n_dash_tabs a2n_active_tab">

    <div class="a2n-welcome__wrapper">
        <h2>Welcome to <span class="welcome_title"><?php bloginfo( 'name' ); ?>!</span></h2>
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
        <div class="a2n_dash_card a2n_dash_card-4">
            <div class="count_start">
                <h3>Certificate Claimed</h3>
                <h2> <?php echo $countCertifiedCourse ? $countCertifiedCourse : "0"; ?> </h2>
            </div>
            <div class="count_end">
                <a class="a2n_new_tab" href="#my_certificates">Share your achievements <svg
                        xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.164376 1.21855C-0.0943812 0.895102 -0.0419401 0.423133 0.281506 0.164376C0.604953 -0.0943811 1.07692 -0.0419401 1.33568 0.281506L5.33568 5.28151C5.55481 5.55542 5.55481 5.94464 5.33568 6.21855L1.33568 11.2185C1.07692 11.542 0.604952 11.5944 0.281506 11.3357C-0.0419406 11.0769 -0.0943816 10.605 0.164376 10.2815L3.78956 5.75003L0.164376 1.21855ZM6.16438 1.21855C5.90562 0.895103 5.95806 0.423133 6.28151 0.164376C6.60495 -0.0943808 7.07692 -0.0419398 7.33568 0.281507L11.3357 5.28151C11.5548 5.55542 11.5548 5.94464 11.3357 6.21855L7.33568 11.2185C7.07692 11.542 6.60495 11.5944 6.28151 11.3357C5.95806 11.0769 5.90562 10.605 6.16437 10.2815L9.78956 5.75003L6.16438 1.21855Z"
                            fill="#33B294" />
                    </svg></a>
            </div>
        </div>


    </div>

</div>