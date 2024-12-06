<style>
    /* *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
} */

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
        color: #ffffff;
        background: #49873d;
    }


    .fl-table thead th {
        color: #ffffff;
        background: #49873d;
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
</style>
<?php $userCertificates = bp_course_get_user_certificates($user_id); ?>
<div id="my_certificates" class="a2n_dash_tabs">
    <h4 class="certificate_title_list">Achieved Certificates</h4>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Serial no:</th>
                    <th>Course Name</th>
                    <th>Status</th>
                    <th>View Certificate</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($userCertificates)) {
                    $i = 1;
                    foreach ($userCertificates as $courseIdCertificate) {
                        $courseCertLink = bp_get_course_certificate(array('course_id' => $courseIdCertificate, 'user_id' => get_current_user_id()));
                ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo get_the_title($courseIdCertificate); ?></td>
                            <td>Achieved</td>
                            <td><a class="cert_view_link" target="_blank" href="<?php echo $courseCertLink; ?>">View</a></td>
                        </tr>
                <?php

                    }
                } else {
                    echo '<tr>';
                    echo '<th>No Achieved Certificates</th>';
                    echo '</tr>';
                }

                ?>

            <tbody>
        </table>
    </div>
    <br><br>
    <h4 class="certificate_title_list">Pending Certificates</h4>
    <div class="table-wrapper pending">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Serial no:</th>
                    <th>Course Name</th>
                    <th>Status</th>
                    <!-- <th>Order Now</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($all_Courses)) {
                    $all_Courses = [];
                }
                if (empty($userCertificates)) {
                    $userCertificates = [];
                }
                $pendingCertificates = array_diff($all_Courses, $userCertificates);
                if ($pendingCertificates) {
                    $i = 1;
                    foreach ($pendingCertificates as $courseIdCertificateExtra) {

                ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo get_the_title($courseIdCertificateExtra); ?></td>
                            <td>Pending</td>
                            <!-- <td><a class="cert_view_link" target="_blank" href="<?php echo home_url('/certificate'); ?>">Order Now</td> -->
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr>';
                    echo '<th>No pending certificate</th>';
                    echo '</tr>';
                }

                ?>
            <tbody>
        </table>
    </div>


    <div class="forms_part">
        <!-- <a href="<?php echo home_url(); ?>/certificate" target="_blank" class="r-custom-4-button-h" style="text-align:center">
            <div class="koc-buttn">
                <span class="label-up">Order Your CPD Certificate</span>
                <span class="label-up">Order Your CPD Certificate</span>
            </div>
        </a> -->
        <?php //echo do_shortcode('[gravityform id="7" title="false"]'); 
        ?>
    </div>
</div>