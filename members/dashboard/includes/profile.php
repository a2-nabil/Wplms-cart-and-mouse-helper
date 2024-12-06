<style>
    .a2n-p_tab {
        position: relative;
    }

    .label_of_notify {
        display: flex;
        gap: 60px;
    }

    .label_of_notify label {
        display: flex !important;
        align-items: center;
        gap: 10px;
    }

    /* Toast styles */
    .toast {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 9999;
        display: none;
    }

    .toast.success {
        background-color: #4caf50;
    }

    .toast.error {
        background-color: #f44336;
    }


    input#email {
        background: #e3e3e3;
    }

    #loader {
        position: absolute;
        top: 0;
        left: 0;
        background-color: #e8f0fec2;
        padding: 20px;
        border-radius: 8px;
        z-index: 9999;
        text-align: center;
        width: 100%;
        height: 100%;
    }

    #loader::after {
        content: '';
        display: block;
        border: 3px solid #777777;
        border-top: 3px solid #70479b;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        margin: 20px auto;
        animation: spin 1s linear infinite;
        position: relative;
        top: 40%;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .foy-toast {
        position: fixed;
        bottom: 16px;
        right: 16px;
        color: #fff;
        padding: 16px;
        border-radius: 5px;
        display: none;
        z-index: 1000;
        max-width: 300px;
        width: 100%;
        height: 50px;
    }

    .foy-toast.success {
        background-color: #7ba631;
    }

    .foy-toast.error {
        background-color: red;
    }

    .foy-error-message {
        color: red;
    }
</style>

<div id="my_profile" class="a2n_dash_tabs">
    <div class="a2n-welcome__wrapper">
        <h2>My Profile </h2>
    </div>
    <div class="a2n-section_container">
        <div class="a2n_p-tab_section">
            <div class="a2n_p-menu">
                <ul id="a2n_p-nav">
                    <li>
                        <a class="a2n_p-active" href="#edit_profile"><span><svg width="25" height="25"
                                    viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.0595 4.41277L15.7963 3.66383C16.667 2.77872 18.1823 2.77872 19.053 3.66383L19.6474 4.26808C20.0828 4.71064 20.3256 5.29787 20.3256 5.91915C20.3256 6.54043 20.0828 7.13617 19.6474 7.57021L18.9107 8.31915L15.0595 4.40426V4.41277ZM14.1721 5.31489L6.54512 13.0681C6.30233 13.3149 6.15163 13.6383 6.12651 13.9872L5.90047 16.4809C5.87535 16.7957 5.98419 17.1021 6.20186 17.3319C6.40279 17.5362 6.66233 17.6468 6.9386 17.6468H7.0307L9.48372 17.417C9.82698 17.383 10.1451 17.2298 10.3879 16.983L18.0149 9.22979L14.1637 5.31489H14.1721ZM22 20.3617C22 20.0128 21.7153 19.7234 21.3721 19.7234H4.62791C4.28465 19.7234 4 20.0128 4 20.3617C4 20.7106 4.28465 21 4.62791 21H21.3721C21.7153 21 22 20.7106 22 20.3617Z"
                                        fill="#64748B" fill-opacity="0.5" />
                                </svg>
                                Edit Profile</span> <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 12 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.164376 1.21855C-0.0943812 0.895102 -0.0419401 0.423133 0.281506 0.164376C0.604953 -0.0943811 1.07692 -0.0419401 1.33568 0.281506L5.33568 5.28151C5.55481 5.55542 5.55481 5.94464 5.33568 6.21855L1.33568 11.2185C1.07692 11.542 0.604952 11.5944 0.281506 11.3357C-0.0419406 11.0769 -0.0943816 10.605 0.164376 10.2815L3.78956 5.75003L0.164376 1.21855ZM6.16438 1.21855C5.90562 0.895103 5.95806 0.423133 6.28151 0.164376C6.60495 -0.0943808 7.07692 -0.0419398 7.33568 0.281507L11.3357 5.28151C11.5548 5.55542 11.5548 5.94464 11.3357 6.21855L7.33568 11.2185C7.07692 11.542 6.60495 11.5944 6.28151 11.3357C5.95806 11.0769 5.90562 10.605 6.16437 10.2815L9.78956 5.75003L6.16438 1.21855Z"
                                        fill="#64748B" />
                                </svg></span></a>
                    </li>
                    <li><a href="#password_security"><span><svg xmlns="http://www.w3.org/2000/svg" width="25"
                                    height="25" viewBox="0 0 25 25" fill="none">
                                    <path
                                        d="M20.769 5.65915C20.7348 5.41417 20.5582 5.21267 20.3194 5.14643L12.6668 3.02273C12.5577 2.99242 12.4424 2.99242 12.3332 3.02273L4.6806 5.14643C4.44183 5.21267 4.2652 5.41409 4.23102 5.65915C4.18663 5.97764 3.17405 13.5028 5.77125 17.2464C8.36539 20.9855 12.1923 21.9437 12.3539 21.9827C12.4019 21.9943 12.4509 22 12.5 22C12.5491 22 12.5981 21.9942 12.6461 21.9827C12.8078 21.9437 16.6347 20.9855 19.2287 17.2464C21.8259 13.5029 20.8134 5.97772 20.769 5.65915ZM17.435 10.0524L12.2151 15.2613C12.0936 15.3825 11.9343 15.4432 11.7751 15.4432C11.6159 15.4432 11.4566 15.3826 11.3352 15.2613L8.10778 12.0407C7.99105 11.9243 7.92551 11.7663 7.92551 11.6017C7.92551 11.437 7.99113 11.279 8.10778 11.1626L8.7486 10.5232C8.9916 10.2808 9.3856 10.2807 9.62852 10.5232L11.7751 12.6653L15.9142 8.53483C16.0309 8.41835 16.1892 8.35294 16.3542 8.35294C16.5192 8.35294 16.6775 8.41835 16.7942 8.53483L17.435 9.17429C17.678 9.41678 17.678 9.80995 17.435 10.0524Z"
                                        fill="#64748B" fill-opacity="0.5" />
                                </svg> Password & Security</span> <span><svg xmlns="http://www.w3.org/2000/svg"
                                    width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.164376 1.21855C-0.0943812 0.895102 -0.0419401 0.423133 0.281506 0.164376C0.604953 -0.0943811 1.07692 -0.0419401 1.33568 0.281506L5.33568 5.28151C5.55481 5.55542 5.55481 5.94464 5.33568 6.21855L1.33568 11.2185C1.07692 11.542 0.604952 11.5944 0.281506 11.3357C-0.0419406 11.0769 -0.0943816 10.605 0.164376 10.2815L3.78956 5.75003L0.164376 1.21855ZM6.16438 1.21855C5.90562 0.895103 5.95806 0.423133 6.28151 0.164376C6.60495 -0.0943808 7.07692 -0.0419398 7.33568 0.281507L11.3357 5.28151C11.5548 5.55542 11.5548 5.94464 11.3357 6.21855L7.33568 11.2185C7.07692 11.542 6.60495 11.5944 6.28151 11.3357C5.95806 11.0769 5.90562 10.605 6.16437 10.2815L9.78956 5.75003L6.16438 1.21855Z"
                                        fill="#64748B" />
                                </svg></span></a></li>
                    <li><a href="#notifications"><span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 25 25" fill="none">
                                    <path
                                        d="M14.7369 18.6354C14.7369 19.5309 14.2594 20.2162 13.4841 20.6642C12.709 21.1119 11.7539 21.1119 10.9803 20.6642C10.2047 20.2162 9.72754 19.5309 9.72754 18.6354"
                                        fill="#64748B" fill-opacity="0.5" />
                                    <path
                                        d="M12.2319 3C12.915 3 13.4653 3.4212 13.4653 4.06893C13.4653 4.47662 13.4795 4.78082 13.7357 4.85874C15.9144 5.5166 17.3114 7.0586 17.3114 9.06112V12.4269C17.3114 13.9689 17.9422 14.281 18.7361 14.8709C19.8859 15.7236 19.6234 17.4994 18.3041 17.4982H6.16013C4.84079 17.4994 4.57833 15.7236 5.72807 14.8709C6.52102 14.281 7.15282 13.9689 7.15282 12.4269V9.06112C7.15282 7.0586 8.54983 5.5166 10.7285 4.85874C10.9839 4.78082 10.9989 4.47662 10.9989 4.06893C10.9991 3.4212 11.5496 3 12.2319 3Z"
                                        fill="#64748B" fill-opacity="0.5" />
                                </svg> Email Notifications</span> <span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                    height="12" viewBox="0 0 12 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.164376 1.21855C-0.0943812 0.895102 -0.0419401 0.423133 0.281506 0.164376C0.604953 -0.0943811 1.07692 -0.0419401 1.33568 0.281506L5.33568 5.28151C5.55481 5.55542 5.55481 5.94464 5.33568 6.21855L1.33568 11.2185C1.07692 11.542 0.604952 11.5944 0.281506 11.3357C-0.0419406 11.0769 -0.0943816 10.605 0.164376 10.2815L3.78956 5.75003L0.164376 1.21855ZM6.16438 1.21855C5.90562 0.895103 5.95806 0.423133 6.28151 0.164376C6.60495 -0.0943808 7.07692 -0.0419398 7.33568 0.281507L11.3357 5.28151C11.5548 5.55542 11.5548 5.94464 11.3357 6.21855L7.33568 11.2185C7.07692 11.542 6.60495 11.5944 6.28151 11.3357C5.95806 11.0769 5.90562 10.605 6.16437 10.2815L9.78956 5.75003L6.16438 1.21855Z"
                                        fill="#64748B" />
                                </svg></span></a></li>
                </ul>
            </div>
            <div class="a2n_p-tabs__container">
                <!-- edit profile tab start  -->
                <div id="edit_profile" class="a2n-p_tab a2n-p_active-tab">
                    <div class="form_group a2n-user__container form_group-3">
                        <div class="a2n-img_box">
                            <img class="onLoadProfilePic" src="<?php echo $image_path; ?>" alt="" />
                            <div class="a2n-img_option">
                                <input type="file" name="profile_image" id="profile_image" accept=".png, .jpg, .jpeg" />
                            </div>
                        </div>
                        <div class="user_details">
                            <h4 class="displayName"><?php echo $name; ?></h4>
                            <h6>Your account is ready, you can now apply for advice.</h6>
                        </div>
                        <p class="foy-error-message"></p>
                    </div>
                    <div class="a2n-form_container">
                        <div id="loader" style="display: none;">
                            Loading...
                        </div>
                        <form class="a2n-dash_grid" action="#" id="profileForm">
                            <div class="form_group form_group-3">
                                <label for="profile_image">Profile Picture</label>
                                <input type='file' id="profile_image" name="profile_image" accept=".png, .jpg, .jpeg" />
                                <p class="foy-error-message"></p>
                            </div>

                            <div class="form_group form_group-1">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="first_name"
                                    value="<?php echo $current_user_data->first_name; ?>"
                                    placeholder="Enter Your First Name" />
                                <p class="foy-error-message"></p>
                            </div>
                            <div class="form_group form_group-2">
                                <label for="lastname">Surname</label>
                                <input type="text" name="lastname" id="last_name"
                                    value="<?php echo $current_user_data->last_name; ?>"
                                    placeholder="Enter Your Surname" />
                                <p class="foy-error-message"></p>
                            </div>
                            <div class="form_group form_group-3">
                                <label for="displayname">Display Name</label>
                                <input type="text" name="displayname" id="display_name"
                                    value="<?php echo $current_user_data->display_name; ?>"
                                    placeholder="Enter Your Username" />
                                <p class="foy-error-message"></p>
                            </div>
                            <div class="form_group form_group-4">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email"
                                    value="<?php echo $user_email; ?>"
                                    placeholder="Enter Your Email Address" disabled />
                                <p class="foy-error-message"></p>
                            </div>
                            <div class="form_group form_group-5">
                                <label for="phone">Contact Number</label>

                                <input type="tel" id="phone" name="phone" placeholder="Enter Your Contact Number" id="telephone" value="<?php echo $current_user_data->contact_number; ?>" />
                                <p class="foy-error-message"></p>
                            </div>
                            <div class="form_submit">
                                <input type="submit" id="submitProfileForm" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- edit profile tab end   -->
                <!-- Password & Security tab start  -->
                <div id="password_security" class="a2n-p_tab">
                    <div class="a2n-form_container">
                        <div id="loader" style="display: none;">
                            Loading...
                        </div>
                        <h2 class="form_title">Update Password</h2>
                        <form class="a2n-dash_grid" id="passwordForm" action="" method="POST"
                            enctype="multipart/form-data">
                            <div class="form_group form_group-1">
                                <label for="password">Current Password</label>
                                <div class="form_group_password">
                                    <input id="inputPass" name="password" type="password"
                                        placeholder="Enter current password" autocomplete="off" />
                                    <i id="current_password_toggler" class="fas fa-eye"></i>
                                    <p class="foy-error-message"></p>
                                </div>
                            </div>
                            <div class="form_group form_group-2">
                                <label for="newpassword">New Password</label>
                                <div class="form_group_password">
                                    <input id="inputNewPass" type="password" name="newpassword"
                                        placeholder="New password" />
                                    <i id="new_password_toggler" class="fas fa-eye"></i>
                                    <p class="foy-error-message"></p>
                                </div>
                                <!-- <p class="a2n_error">*Please enter a new password</p> -->
                            </div>
                            <div class="form_group form_group-3">
                                <label for="confirm_password">Confirm Password</label>
                                <div class="form_group_password">
                                    <input id="inputConfirmPass" type="password" name="confirmnewpassword"
                                        placeholder="Confirm password" />
                                    <i id="confirm_password_toggler" class="fas fa-eye"></i>
                                </div>
                            </div>
                            <div class="form_submit">
                                <input type="submit" id="submitpasswordForm" value="Save" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Password & Security tab end   -->
                <!-- Preferences & 2FA tab start  -->
                <div id="notifications" class="a2n-p_tab">
                    <div class="a2n-form_container">
                        <h2 class="form_title">Notifications</h2>
                        <form class="a2n-dash_grid" action="#" method="post">
                            <div class="form_group">
                                <h3 class="a2n_notification">
                                    Receive Email notifications...
                                </h3>
                                <div class="label_of_notify">
                                    <label>
                                        <input type="radio" name="update_all_meta" value="yes" <?php echo $current_user_meta === 'yes' ? 'checked' : ''; ?>>
                                        Yes
                                    </label>

                                    <label>
                                        <input type="radio" name="update_all_meta" value="no" <?php echo $current_user_meta === 'no' ? 'checked' : ''; ?>>
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="form_submit">
                                <input type="submit" value="Save" />

                            </div>
                        </form>
                    </div>
                </div>
                <!-- Preferences & 2FA tab end   -->
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script>
    $(document).ready(function() {
        $("#submitProfileForm").click(function() {
            $(this).prop("disabled", true);

            $(document).ajaxStart(function() {
                $('#loader').show();
            }).ajaxStop(function() {
                $('#loader').hide();
            });

            // var formData = $("#profileForm").serialize();
            var formData = new FormData($("#profileForm")[0]);
            formData.append('action', 'profile_update_process_form_data');
            $.ajax({
                type: 'POST',
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#profile_image').siblings('.foy-error-message').text('');
                    $('#first_name').siblings('.foy-error-message').text('');
                    $('#last_name').siblings('.foy-error-message').text('');
                    $('#display_name').siblings('.foy-error-message').text('');

                    // Re-enable the submit button
                    $("#submitProfileForm").prop("disabled", false);
                    if (response.status === 'success') {
                        // console.log(response.responseData);
                        var statusClass = 'success';
                        if (response.responseData.file_name != null) {
                            updateProfileImg(response.responseData.file_name);
                        }
                        updateProfileName(response.responseData.display_name);

                    } else {
                        var statusClass = 'error';
                        showErrorMessage(response.error);
                    }
                    showSuccessToast(response.message, statusClass);
                },
            });
        });


        function updateProfileImg(userImage) {
            console.log(userImage);
            $('.onLoadProfilePic').attr('src', userImage);
        }

        function updateProfileName(userName) {
            $('.displayName').text(userName);
        }

        function showErrorMessage(errors) {
            if (errors.image) {
                $('#profile_image').siblings('.foy-error-message').text(errors.image);
            }
            if (errors.firstname) {
                $('#first_name').siblings('.foy-error-message').text(errors.firstname);
            }
            if (errors.lastname) {
                $('#last_name').siblings('.foy-error-message').text(errors.lastname);
            }
            if (errors.displayname) {
                $('#display_name').siblings('.foy-error-message').text(errors.displayname);
            }
        }

        function showSuccessToast(message, statusClass) {
            // Create the toast element
            var toast = document.createElement('div');
            toast.classList.add('foy-toast', statusClass);
            toast.innerText = message;
            document.body.appendChild(toast);
            toast.style.display = 'block';
            setTimeout(function() {
                toast.style.display = 'none';
                document.body.removeChild(toast);
            }, 3000);
        }
    });

    jQuery(document).ready(function() {
        jQuery("#submitpasswordForm").click(function() {
            jQuery(this).prop("disabled", true);
            // Attach a function to the AJAX complete event
            jQuery(document).ajaxStart(function() {
                jQuery('#loader').show();
            }).ajaxStop(function() {
                jQuery('#loader').hide();
            });
            // var formData = $("#passwordForm").serialize();
            var formDatapass = new FormData($("#passwordForm")[0]);
            formDatapass.append('action', 'pass_update_process_form_data');
            // Send AJAX request
            jQuery.ajax({
                type: 'POST',
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: formDatapass,
                contentType: false,
                processData: false,
                success: function(response) {
                    //console.log(response);
                    jQuery('#inputPass').siblings('.foy-error-message').text('');
                    jQuery('#inputNewPass').siblings('.foy-error-message').text('');

                    // Re-enable the submit button
                    jQuery("#submitpasswordForm").prop("disabled", false);
                    // Show the success toast
                    if (response.status === 'success') {
                        var statusClass = 'success';
                        showSuccessToast(response.message, statusClass);
                    } else {
                        var statusClass = 'error';
                        showErrorMessage(response.errors);
                        showSuccessToast(response.message, statusClass);
                    }

                },
            });
        });

        function showErrorMessage(errors) {
            console.log(errors);
            if (errors.password) {
                jQuery('#inputPass').siblings('.foy-error-message').text(errors.password);
            }
            if (errors.confirmpassword) {
                jQuery('#inputNewPass').siblings('.foy-error-message').text(errors.confirmpassword);
            }
        }

        function showSuccessToast(message, statusClass) {
            // Create the toast element
            var toast = document.createElement('div');
            toast.classList.add('foy-toast', statusClass);
            toast.innerText = message;
            document.body.appendChild(toast);
            toast.style.display = 'block';
            setTimeout(function() {
                toast.style.display = 'none';
                document.body.removeChild(toast);
            }, 3000);
        }
    });





    jQuery(document).ready(function($) {
        // Function to show toast
        function showToast(message, type = 'success') {
            const toast = $('<div class="toast"></div>').text(message);
            toast.addClass(type); // Add class based on the type (success or error)
            $('body').append(toast);

            // Show toast and remove it after 3 seconds
            toast.fadeIn(400).delay(3000).fadeOut(400, function() {
                $(this).remove();
            });
        }

        $('.a2n-dash_grid').on('submit', function(e) {
            e.preventDefault();

            // Serialize the form data into a key-value pair object
            const formData = $(this).serialize();

            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: 'POST',
                data: {
                    action: 'update_user_meta_bulk',
                    data: formData,
                },
                success: function(response) {
                    if (response.success) {
                        showToast('Settings saved successfully!', 'success');
                    } else {
                        showToast('Error: ' + response.data, 'error');
                    }
                },
                error: function() {
                    showToast('An unexpected error occurred.', 'error');
                },
            });
        });
    });
</script>