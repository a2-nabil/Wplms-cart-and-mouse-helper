<style>
    .a2n-p_tab {
        position: relative;
        padding: 0 20px;
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
        background-color: #70479b;
    }

    .foy-toast.error {
        background-color: red;
    }

    .foy-error-message {
        color: red;
    }
</style>

<div id="my_profile" class="a2n_dash_tabs">
    <div class="a2n-section_container">
        <div class="a2n_p-head">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dash/images/profile tab img/header setting.webp" alt="" />
        </div>
        <div class="a2n-user__container a2n-dash_grid">
            <div class="a2n-img_box">
                <img class="onLoadProfilePic" src="<?php echo $image_path; ?>" alt="" />
                <!-- <div class="a2n-img_option">
                    <input type="file" name="profile_image" id="profile_image" accept="image/*" />
                </div> -->
            </div>
            <div class="user_details">
                <h4 class="displayName"><?php echo $name; ?></h4>
                <h6>Your account is ready, you can now apply for advice.</h6>
            </div>
        </div>
        <div class="a2n_p-tab_section">
            <div class="a2n_p-menu">
                <ul id="a2n_p-nav">
                    <li>
                        <a class="a2n_p-active" href="#edit_profile">Edit Profile</a>
                    </li>
                    <li><a href="#password_security">Password & Security</a></li>
                    <!-- <li><a href="#preferences">Preferences & 2FA</a></li> -->
                </ul>
            </div>
            <div class="a2n_p-tabs__container">
                <!-- edit profile tab start  -->
                <div id="edit_profile" class="a2n-p_tab a2n-p_active-tab">
                    <div class="a2n-form_container">
                        <div id="loader" style="display: none;">
                            Loading...
                        </div>
                        <h2 class="form_title">Edit Profile</h2>
                        <form class="a2n-dash_grid" action="#" id="profileForm">
                            <div class="form_group form_group-3">
                                <label for="profile_image">Profile Picture</label>
                                <input type='file' id="profile_image" name="profile_image" accept=".png, .jpg, .jpeg" />
                                <p class="foy-error-message"></p>

                            </div>

                            <div class="form_group form_group-1">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="first_name" value="<?php echo $current_user_data->first_name; ?>" />
                                <p class="foy-error-message"></p>
                            </div>
                            <div class="form_group form_group-2">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="last_name" value="<?php echo $current_user_data->last_name; ?>" />
                                <p class="foy-error-message"></p>
                            </div>
                            <div class="form_group form_group-3">
                                <label for="displayname">Display Name</label>
                                <input type="text" name="displayname" id="display_name" value="<?php echo $current_user_data->display_name; ?>" />
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
                        <form class="a2n-dash_grid" id="passwordForm" action="" method="POST" enctype="multipart/form-data">
                            <div class="form_group form_group-1">
                                <label for="password">Current Password</label>
                                <div class="form_group_password">
                                    <input id="inputPass" name="password" type="password" placeholder="Enter current password" autocomplete="off" />
                                    <i id="current_password_toggler" class="fa fa-eye"></i>
                                    <p class="foy-error-message"></p>
                                </div>
                            </div>
                            <div class="form_group form_group-2">
                                <label for="newpassword">New Password</label>
                                <div class="form_group_password">
                                    <input id="inputNewPass" type="password" name="newpassword" placeholder="New password" />
                                    <i id="new_password_toggler" class="fa fa-eye"></i>
                                    <p class="foy-error-message"></p>
                                </div>
                                <!-- <p class="a2n_error">*Please enter a new password</p> -->
                            </div>
                            <div class="form_group form_group-3">
                                <label for="confirm_password">Confirm Password</label>
                                <div class="form_group_password">
                                    <input id="inputConfirmPass" type="password" name="confirmnewpassword" placeholder="Confirm password" />
                                    <i id="confirm_password_toggler" class="fa fa-eye"></i>
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
                <!-- <div id="preferences" class="a2n-p_tab">
                    <div class="a2n-form_container">
                        <h2 class="form_title">Preferences & 2FA</h2>
                        <form class="a2n-dash_grid" action="#">
                            <div class="form_group">
                                <h3 class="a2n_notification">
                                    Receive reward notifications...
                                </h3>
                                <input type="checkbox" name="nxt_notification" id="nxt_notification" />
                            </div>
                            <div class="form_group">
                                <h3 class="a2n_notification">
                                    Enable 2FA (Two Factor Authentication) (we will email
                                    you a code when you sign in from a new device)...
                                </h3>
                                <input type="checkbox" name="fa_notification" id="fa_notification" />
                            </div>
                            <div class="form_submit">
                                <input type="submit" value="Save" />
                            </div>
                        </form>
                    </div>
                </div> -->
                <!-- Preferences & 2FA tab end   -->
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
</script>