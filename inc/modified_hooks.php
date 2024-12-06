<?php
$current_user = wp_get_current_user();
$user_email = strtolower($current_user->user_email);

$allowed_emails = [
    'shoivehossain@staffasia.org',
    'muhiburnabil@staffasia.org',
    'sakib@staffasia.org',
];

if (is_user_logged_in() && in_array($user_email, $allowed_emails, true)) {








}