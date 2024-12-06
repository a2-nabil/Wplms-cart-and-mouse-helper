<style>
    .custom-order-transcript {
        text-align: center;
        margin-bottom: 20px;
    }

    .custom-order-transcript .order_ts {
        background: #a2d144;
        padding: 15px;
        color: #fff;
        border-radius: 5px;
        text-transform: uppercase;
        font-family: "Poppings", Sans-serif;
        font-size: 23px;
        font-weight: 500;
    }

    /* Table Styles */

    .table-wrapper {
        /* margin: 10px 70px 70px; */
        box-shadow: 0px 35px 50px rgb(189 189 189 / 20%);
    }

    .fl-table {
        border-radius: 5px;
        font-size: 16px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 14px;
    }

    .pending .fl-table thead th {
        color: #000;
        background: #c4c5c2;
    }


    .fl-table thead th {
        color: #ffffff;
        background: #47c0b0;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    /* Responsive */

    @media (max-width: 767px) {
        .fl-table {
            display: block;
            width: 100%;
        }

        .table-wrapper:before {
            content: "Scroll horizontally >";
            display: block;
            text-align: right;
            font-size: 11px;
            color: white;
            padding: 0 0 10px;
        }

        .fl-table thead,
        .fl-table tbody,
        .fl-table thead th {
            display: block;
        }

        .fl-table thead th:last-child {
            border-bottom: none;
        }

        .fl-table thead {
            float: left;
        }

        .fl-table tbody {
            width: auto;
            position: relative;
            overflow-x: auto;
        }

        .fl-table td,
        .fl-table th {
            padding: 20px .625em .625em .625em;
            height: 60px;
            vertical-align: middle;
            box-sizing: border-box;
            overflow-x: hidden;
            overflow-y: auto;
            width: 120px;
            font-size: 13px;
            text-overflow: ellipsis;
        }

        .fl-table thead th {
            text-align: left;
            border-bottom: 1px solid #f7f7f9;
        }

        .fl-table tbody tr {
            display: table-cell;
        }

        .fl-table tbody tr:nth-child(odd) {
            background: none;
        }

        .fl-table tr:nth-child(even) {
            background: transparent;
        }

        .fl-table tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tr td:nth-child(even) {
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tbody td {
            display: block;
            text-align: center;
        }
    }

    .certificate_title_list {
        font-family: "Manrope", Sans-serif;
        margin: 0 0 8px;
        color: #2b354e;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .cert_view_link {
        border: 1px solid;
        padding: 5px 15px;
        border-radius: 5px;
    }

    div.buttonforlink {
        display: inline-block;
        margin: 10px 0;
        margin-left: 8px;
    }

    div.buttonforlink a.shareCertificate {
        background: transparent;
        padding: 6px 10px;
        color: #0a0a0a;
        border-radius: 5px;
        text-align: left;
        display: inline;
        padding-left: 33px;
        position: relative;
        border: 1px solid #000;
    }

    div.buttonforlink a.shareCertificate img {
        height: 27px;
        width: 27px;
        position: absolute;
        left: 5px;
        top: 2px;
    }

    .certifct-btm>tbody>tr>th {
        vertical-align: middle !important;
    }

    .claimed_link_certificate {
        color: #18a496;
        font-weight: bold;
    }
</style>
<?php $claimed_courses = bp_course_get_user_certificates($user_id);
?>
<?php

// Replace with your desired user ID and form ID
// $user_id = get_current_user_id();
// $form_id = 28;

// $search_criteria = array(
//     'status'        => 'active',
//     'field_filters' => array(
//         array(
//             'key'   => 'created_by',
//             'value' => $user_id
//         )
//     )
// );

// // Retrieve entries using GFAPI
// $entries = GFAPI::get_entries($form_id, $search_criteria);

// $claimed_courses = array();
// if (!is_wp_error($entries)) {
//     foreach ($entries as $entry) {

//         $course_id = $entry[73];

//         $get_status = bp_course_get_user_course_status($user_id, $course_id);
//         // Only add unique course IDs with status 4
//         if ($get_status == 4 && !in_array($course_id, $claimed_courses)) {
//             $claimed_courses[] = $course_id;
//         }
//     }
//     $unclaimed_courses = array_diff($all_Courses, $claimed_courses);
// } else {
//     echo 'Error: ' . $entries->get_error_message();
// }

// $form_ids = [28, 3];  // List of form IDs to check
// $claimed_courses = array();

// foreach ($form_ids as $form_id) {
//     $search_criteria = array(
//         'status' => 'active',
//         'field_filters' => array(
//             array(
//                 'key' => 'created_by',
//                 'value' => $user_id
//             )
//         )
//     );

//     // Retrieve entries for each form ID
//     $entries = GFAPI::get_entries($form_id, $search_criteria);

//     if (!is_wp_error($entries)) {
//         foreach ($entries as $entry) {
//             $course_id = ($form_id == 28) ? $entry[73] : $entry[75];
//             $get_status = bp_course_get_user_course_status($user_id, $course_id);
//             if ($get_status == 4 && !in_array($course_id, $claimed_courses)) {
//                 $claimed_courses[] = $course_id;
//             }
//         }
//     } else {
//         echo 'Error retrieving entries for form ID ' . $form_id . ': ' . $entries->get_error_message();
//     }
// }

// Calculate unclaimed courses based on claimed courses
$unclaimed_courses = array_diff($all_Courses, $claimed_courses); ?>
<div id="my_certificates" class="a2n_dash_tabs">
    <div class="a2n-welcome__wrapper">
        <h2>My Certificates</h2>
    </div>


    <!-- certificate tab container start -->
    <div class="a2n_cert-tab_section">
        <!-- certificate tab menu  -->
        <div class="a2n_cert-menu a2n_common_nav">
            <ul id="a2n_cert-nav">
                <li>
                    <a class="a2n_cert-active" href="#available_certificates">Available Certificates
                        <?php echo "(" . count($unclaimed_courses) . ")"; ?> </a>
                </li>
                <li><span>|</span></li>
                <li><a href="#claimed_certificates">Claimed Certificates
                        (<?php echo $countCertifiedCourse ? $countCertifiedCourse : "0"; ?>)</a></li>
            </ul>

        </div>
        <div class="a2n_cert-tabs__container">
            <!-- Available Certificates tab start  -->
            <div id="available_certificates" class="a2n_cert_tabs a2n_cert_active__tab">

                <div class="a2n_cert_wrapper">
                    <?php


                    if (!empty($unclaimed_courses)) {
                        $i = 1;
                        foreach ($unclaimed_courses as $courseIdCertificateExtra) {

                    ?>
                            <div class="a2n_certificate_card">
                                <div class="a2nCert_img__wrapper">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/dashboard/Compliance-Central-Certificate-with-CPD-logo-1.webp"
                                        alt="certificate">
                                    <div class="a2nCert_view">
                                        <a href="https://imperialacademy.org.uk/wp-content/uploads/2023/09/Imperial-Academy-Certificate-2-1-1-726x1024.png" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.9697 16.9697C17.2626 16.6768 17.7374 16.6768 18.0303 16.9697L22.5303 21.4697C22.8232 21.7626 22.8232 22.2374 22.5303 22.5303C22.2374 22.8232 21.7626 22.8232 21.4697 22.5303L16.9697 18.0303C16.6768 17.7374 16.6768 17.2626 16.9697 16.9697Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21ZM11.5 6.75C11.9142 6.75 12.25 7.08579 12.25 7.5V10.75H15.5C15.9142 10.75 16.25 11.0858 16.25 11.5C16.25 11.9142 15.9142 12.25 15.5 12.25H12.25V15.5C12.25 15.9142 11.9142 16.25 11.5 16.25C11.0858 16.25 10.75 15.9142 10.75 15.5V12.25H7.5C7.08579 12.25 6.75 11.9142 6.75 11.5C6.75 11.0858 7.08579 10.75 7.5 10.75H10.75V7.5C10.75 7.08579 11.0858 6.75 11.5 6.75Z"
                                                    fill="white" />
                                            </svg> Demo Certificate</a>
                                    </div>
                                </div>
                                <div class="a2nCert_content">
                                    <h2>
                                        <?php echo get_the_title($courseIdCertificateExtra); ?>
                                    </h2>
                                    <div class="a2nCert__actions">
                                        <a href="<?php echo home_url('/certificate') ?>" class="claim_btn" target="_blank">Claim
                                            Certificate</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p>No pending certificate</p>';
                    }
                    ?>
                </div>
            </div>

            <!-- Available Certificates tab end   -->
            <!-- Claimed Certificates tab start  -->
            <div id="claimed_certificates" class="a2n_cert_tabs">
                <div class="a2n-course__grid a2n_cert_wrapper">
                    <?php
                    if (!empty($claimed_courses)) {
                        $i = 1;
                        foreach ($claimed_courses as $courseIdCertificate) {

                            $upload_dir = wp_upload_dir();
                            $name = $courseIdCertificate . '_' . $user_id . '.pdf';
                            $lms_pdf_path = $upload_dir['url'] . '/' . $name;

                            $courseCertLink = bp_get_course_certificate(array('course_id' => $courseIdCertificate, 'user_id' => $user_id));
                            $gen_pdf_path = home_url() . "/wp-content/uploads/course_certificates/" . $courseIdCertificate . "c" . $user_id . ".pdf";

                            $response = wp_remote_head($gen_pdf_path);

                            if (is_wp_error($response)) {
                                echo "An error occurred.";
                            } else {
                                $status_code = wp_remote_retrieve_response_code($response);
                                if ($status_code == 200) {
                                    $templatepath = $gen_pdf_path;
                                } else {
                                    $templatepath = $lms_pdf_path;
                                }
                            }

                            //debuging code 
                            $target_user_id = 91143;
                            if ($user_id === $target_user_id) {
                                // Display your custom message for this specific user
                                echo $lms_pdf_path . '<br>';
                            }

                    ?>
                            <div class="a2n_certificate_card">
                                <div class="a2nCert_img__wrapper">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/dashboard/Compliance-Central-Certificate-with-CPD-logo-1.webp"
                                        alt="certificate">
                                    <div class="a2nCert_view">
                                        <a href="<?php echo $courseCertLink; ?>" onclick="window.open(this.href, '_blank'); return false;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.9697 16.9697C17.2626 16.6768 17.7374 16.6768 18.0303 16.9697L22.5303 21.4697C22.8232 21.7626 22.8232 22.2374 22.5303 22.5303C22.2374 22.8232 21.7626 22.8232 21.4697 22.5303L16.9697 18.0303C16.6768 17.7374 16.6768 17.2626 16.9697 16.9697Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21ZM11.5 6.75C11.9142 6.75 12.25 7.08579 12.25 7.5V10.75H15.5C15.9142 10.75 16.25 11.0858 16.25 11.5C16.25 11.9142 15.9142 12.25 15.5 12.25H12.25V15.5C12.25 15.9142 11.9142 16.25 11.5 16.25C11.0858 16.25 10.75 15.9142 10.75 15.5V12.25H7.5C7.08579 12.25 6.75 11.9142 6.75 11.5C6.75 11.0858 7.08579 10.75 7.5 10.75H10.75V7.5C10.75 7.08579 11.0858 6.75 11.5 6.75Z"
                                                    fill="white" />
                                            </svg> View Certificate</a>
                                    </div>
                                </div>
                                <div class="a2nCert_content">
                                    <h2>
                                        <?php echo get_the_title($courseIdCertificate); ?>
                                    </h2>
                                    <div class="a2nCert__actions">
                                        <a class="cert_download_link" href="<?php echo $courseCertLink; ?>"
                                            onclick="window.open(this.href, '_blank'); return false;"> View
                                            Certificate</a>
                                        <a href="<?php echo home_url('/certificate') ?>" class="order_cert" target="_blank">Order Hardcopy
                                            Certificate <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                                viewBox="0 0 16 17" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14 2H10C9.72386 2 9.5 2.22386 9.5 2.5C9.5 2.77614 9.72386 3 10 3L12.7929 3L6.31311 9.47978C6.11785 9.67504 6.11785 9.99162 6.31311 10.1869C6.50838 10.3821 6.82496 10.3821 7.02022 10.1869L13.5 3.70711L13.5 6.5C13.5 6.77614 13.7239 7 14 7C14.2761 7 14.5 6.77614 14.5 6.49999L14.5 2.5C14.5 2.22386 14.2761 2 14 2ZM4.66667 3.33333C2.91777 3.33333 1.5 4.7511 1.5 6.5V11.8333C1.5 13.5822 2.91777 15 4.66667 15H10C11.7489 15 13.1667 13.5822 13.1667 11.8333V8.5C13.1667 8.22386 12.9428 8 12.6667 8C12.3905 8 12.1667 8.22386 12.1667 8.5V11.8333C12.1667 13.03 11.1966 14 10 14H4.66667C3.47005 14 2.5 13.03 2.5 11.8333V6.5C2.5 5.30338 3.47005 4.33333 4.66667 4.33333H8C8.27614 4.33333 8.5 4.10948 8.5 3.83333C8.5 3.55719 8.27614 3.33333 8 3.33333H4.66667Z"
                                                    fill="#474D5C" />
                                            </svg></a>
                                        <?php
                                        // echo '<div class="buttonforlink">';
                                        // mha_linkedinShareCertificate($courseIdCertificate);
                                        // echo '</div>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p>No Claimed Certificates</p>';
                    }

                    ?>

                </div>
            </div>
            <!-- Claimed Certificates tab end   -->


        </div>
        <!-- certificate tab container end  -->

    </div>


</div>