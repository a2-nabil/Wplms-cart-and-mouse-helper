<?php

class UserProfile
{
    public function __construct()
    {
    }
    public function getUserData()
    {
        if (is_user_logged_in()) {

            global $wpdb;
            $current_user_id = get_current_user_id();

            $query = $wpdb->prepare(
                "SELECT u.display_name, m1.meta_value AS first_name, m2.meta_value AS last_name, m4.meta_value AS user_image
                FROM {$wpdb->prefix}users AS u
                LEFT JOIN {$wpdb->prefix}usermeta AS m1 ON u.ID = m1.user_id AND m1.meta_key = 'first_name'
                LEFT JOIN {$wpdb->prefix}usermeta AS m2 ON u.ID = m2.user_id AND m2.meta_key = 'last_name'
                LEFT JOIN {$wpdb->prefix}usermeta AS m4 ON u.ID = m4.user_id AND m4.meta_key = 'user_image'
                WHERE u.ID = %d",
                $current_user_id
            );

            $user_data = $wpdb->get_row($query);
            return $user_data;
        } else {
            wp_redirect(home_url());
            exit;
        }
    }
    public function updateUserData($form_data)
    {
        // Define an array to store validation errors
        $errors = array();

        // Get the current user ID
        $user_id = get_current_user_id();

        if (!empty($_FILES['profile_image']['name'])) {

            $allowed_types = array('image/jpeg', 'image/jpg', 'image/png');
            $file_type = mime_content_type($_FILES['profile_image']['tmp_name']);
            $max_file_size = 1 * 1024 * 1024;

            if (!in_array($file_type, $allowed_types)) {
                $errors['image'] = 'Invalid file type. Please upload a PNG, JPG, or JPEG image.';
            } else if ($_FILES['profile_image']['size'] > $max_file_size) {
                $errors['image'] = 'File size exceeds the maximum limit of 1MB.';
            } else {
                $upload_dir = wp_upload_dir();
                $file_name = sanitize_file_name($_FILES['profile_image']['name']);
                $file_path = $upload_dir['path'] . '/' . $file_name;

                move_uploaded_file($_FILES['profile_image']['tmp_name'], $file_path);

                $file_url = $upload_dir['url'] . '/' . $file_name;
                $previous_image_url = get_user_meta($user_id, 'user_image', true);
                if (!empty($previous_image_url)) {
                    $previous_image_path = str_replace(site_url(), ABSPATH, $previous_image_url);
                    if (file_exists($previous_image_path)) {
                        unlink($previous_image_path);
                    }
                }
                update_user_meta($user_id, 'user_image', $file_url);
            }
        }

        // Validate firstname
        $firstname = isset($form_data['firstname']) ? sanitize_text_field($form_data['firstname']) : '';
        $existing_firstname = get_user_meta($user_id, 'first_name', true);

        if (empty($firstname)) {
            if (!empty($existing_firstname)) {
                $errors['firstname'] = 'First name is required.';
            }
        } elseif (strlen($firstname) < 1) {
            $errors['firstname'] = 'First name should have at least 1 characters';
        } elseif (preg_match('/[^a-zA-Z0-9 ]/', $firstname)) {
            $errors['firstname'] = 'First name should contain only alphanumeric characters.';
        } else {
            update_user_meta($user_id, 'first_name', $firstname);
        }

        // Validate lastname
        $lastname = isset($form_data['lastname']) ? sanitize_text_field($form_data['lastname']) : '';
        $existing_lastname = get_user_meta($user_id, 'last_name', true);

        if (empty($lastname)) {
            if (!empty($existing_lastname)) {
                $errors['lastname'] = 'Last name is required.';
            }
        } elseif (strlen($lastname) < 1) {
            $errors['lastname'] = 'Last name should have at least 1 characters.';
        } elseif (preg_match('/[^a-zA-Z0-9 ]/', $lastname)) {
            $errors['lastname'] = 'Last name should contain only alphanumeric characters.';
        } else {
            update_user_meta($user_id, 'last_name', $lastname);
        }

        // Validate displayname
        $displayname = isset($form_data['displayname']) ? sanitize_text_field($form_data['displayname']) : '';
        $existing_displayname = get_user_by('id', $user_id)->display_name;

        if (empty($displayname)) {
            if (!empty($existing_displayname)) {
                $errors['displayname'] = 'Display name is required.';
            }
        } elseif (strlen($displayname) < 1) {
            $errors['displayname'] = 'Display name should have at least 1 characters.';
        } elseif (preg_match('/[^a-zA-Z0-9 ]/', $displayname)) {
            $errors['displayname'] = 'Display name should should contain only alphanumeric characters.';
        } else {
            wp_update_user(array('ID' => $user_id, 'display_name' => $displayname));
        }


        // Check if there are any validation errors
        if (!empty($errors)) {
            $response = array(
                'status' => 'error',
                'message' => 'Your data cannot be updated.',
                'error' => $errors,
            );

            return $response;
        } else {
            $response = array(
                'status' => 'success',
                'message' => 'Profile updated successfully.',
                'responseData' => [
                    'file_name' => $file_url,
                    'display_name' => $displayname,
                ]
            );

            return $response;
        }
    }

    public function updateUserPassData($form_pass_data)
    {
        // Define an array to store validation errors
        $errors2 = array();

        // Get the current user ID
        $user_id = get_current_user_id();


        // Validate password fields if they are not empty
        $newpassword = isset($form_pass_data['newpassword']) ? sanitize_text_field($form_pass_data['newpassword']) : '';
        $confirmnewpassword = isset($form_pass_data['confirmnewpassword']) ? sanitize_text_field($form_pass_data['confirmnewpassword']) : '';
        $password = isset($form_pass_data['password']) ? sanitize_text_field($form_pass_data['password']) : '';

        // if (!empty($newpassword) || !empty($confirmnewpassword)) {
        if (empty($password)) {
            $errors2['password'] = 'Current password required.';
        } else if ($newpassword !== $confirmnewpassword) {
            $errors2['confirmpassword'] = 'Passwords do not match.';
        } else {
            $current_password = wp_get_current_user()->user_pass;
            if (wp_check_password($password, $current_password, $user_id)) {
                wp_set_password($newpassword, $user_id);
            } else {
                $errors2['password'] = 'Current password is incorrect.';
            }
        }
        // }
        // else {
        //     $errors2['all'] = 'Password all field required.';
        // }

        // Check if there are any validation errors
        if (!empty($errors2)) {
            $response = array(
                'status' => 'error',
                'message' => 'Password all field required.',
                'errors' => $errors2
            );

            return $response;
        } else {
            $response = array(
                'status' => 'success',
                'message' => 'Password updated successfully.',
            );

            return $response;
        }
    }
}
