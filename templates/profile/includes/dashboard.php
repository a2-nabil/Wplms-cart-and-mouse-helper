<div id="my_dashboard" class="a2n_dash_tabs a2n_active_tab">

    <div class="a2n-dash_grid">
        <div class="dash_items">
            <div class="a2n_dash_card a2n_dash_card-1">
                <h2><?php echo $totalCourse; ?></h2>
                <div class="course_count">
                    <h5>Enrolled Courses</h5>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/Group.svg" alt="" />
                </div>
            </div>
            <div class="a2n_dash_card a2n_dash_card-2">
                <h2><?php echo $completedCourses; ?></h2>
                <div class="course_count">
                    <h5>Completed Courses</h5>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/Group 1000004111.svg" alt="" />
                </div>
            </div>
        </div>
        <div class="a2n_dash_card-3">
            <!-- <a href="<?php echo home_url('/student-id-card'); ?>" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/paid-ads.png" alt="" />
            </a> -->
        </div>
    </div>
    <div class="a2n-dash_course_container">
        <div class="a2n_course-card">
            <h3>Ongoing Courses</h3>
            <div class="a2n_course_progress">
                <div class="a2n_progress_box">
                    <h2><?php echo $activeCourses; ?>
                        <!-- <span>%</span> -->
                    </h2>
                </div>
                <div class="a2n_progress_svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="234" height="229" viewBox="0 0 234 229" fill="none">
                        <g filter="url(#filter0_d_1401_2148)">
                            <path d="M50.1418 135.798C57.8527 143.567 67.4208 149.224 77.9322 152.227C88.4436 155.231 99.5472 155.481 110.183 152.954C120.818 150.427 130.629 145.207 138.68 137.793C146.731 130.379 152.753 121.018 156.169 110.605C159.586 100.191 160.283 89.0735 158.195 78.3128C156.107 67.5521 151.304 57.508 144.243 49.14" stroke="#80D4E9" stroke-width="28" />
                        </g>
                        <defs>
                            <filter id="filter0_d_1401_2148" x="0.205078" y="0.111664" width="233.168" height="228.569" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dx="10" dy="10" />
                                <feGaussianBlur stdDeviation="25" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0.839216 0 0 0 0 0.862745 0 0 0 0 0.898039 0 0 0 1 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1401_2148" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1401_2148" result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
        <div class="a2n_course-card a2n_completed_course-card">
            <h3>Certificate Achieved</h3>
            <div class="a2n_course_progress">
                <div class="a2n_progress_box">
                    <h2><?php echo $countCertifiedCourse; ?>
                    </h2>
                </div>
                <div class="a2n_progress_svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="234" height="229" viewBox="0 0 234 229" fill="none">
                        <g filter="url(#filter0_d_1401_2156)">
                            <path d="M50.6417 135.798C58.3526 143.567 67.9207 149.224 78.4321 152.227C88.9435 155.231 100.047 155.481 110.682 152.954C121.318 150.427 131.129 145.207 139.18 137.793C147.231 130.379 153.253 121.018 156.669 110.605C160.086 100.191 160.783 89.0735 158.695 78.3128C156.607 67.5521 151.804 57.508 144.743 49.14" stroke="#F8B690" stroke-width="28" />
                        </g>
                        <defs>
                            <filter id="filter0_d_1401_2156" x="0.704956" y="0.111664" width="233.168" height="228.569" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dx="10" dy="10" />
                                <feGaussianBlur stdDeviation="25" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0.929412 0 0 0 0 0.258824 0 0 0 0 0.4 0 0 0 0.2 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1401_2156" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1401_2156" result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
        <div class="a2n_course-card a2n_certificate_course-card">
            <h3>Certificate Pending</h3>
            <div class="a2n_course_progress">
                <div class="a2n_progress_box">
                    <h2><?php echo $pendingCertificate; ?>
                    </h2>
                </div>
                <div class="a2n_progress_svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="234" height="229" viewBox="0 0 234 229" fill="none">
                        <g filter="url(#filter0_d_1401_2164)">
                            <path d="M50.6417 135.798C58.3526 143.567 67.9207 149.224 78.4321 152.227C88.9435 155.231 100.047 155.481 110.682 152.954C121.318 150.427 131.129 145.207 139.18 137.793C147.231 130.379 153.253 121.018 156.669 110.605C160.086 100.191 160.783 89.0735 158.695 78.3128C156.607 67.5521 151.804 57.508 144.743 49.14" stroke="#80CDA7" stroke-width="28" />
                        </g>
                        <defs>
                            <filter id="filter0_d_1401_2164" x="0.704956" y="0.111664" width="233.168" height="228.569" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dx="10" dy="10" />
                                <feGaussianBlur stdDeviation="25" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0.384314 0 0 0 0 0.372549 0 0 0 0 1 0 0 0 0.3 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1401_2164" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1401_2164" result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div>
        <?php // echo do_shortcode('[elementor-template id="538700"]'); ?>
    </div>
    <div>
        <?php // echo do_shortcode('[elementor-template id="538720"]'); ?>
    </div>
</div>