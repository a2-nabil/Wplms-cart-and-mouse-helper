<?php

if (!defined('VIBE_URL'))
    define('VIBE_URL', get_template_directory_uri());

function a2n_assets()
{
    // Enqueue popular-course stylesheet
    wp_enqueue_style("popular-course", get_stylesheet_directory_uri() . "/assets/css/trending_course.css", null, time());
    // Enqueue top-course stylesheet
    wp_enqueue_style("top-course", get_stylesheet_directory_uri() . "/assets/css/top_course.css", null, time());

    // Enqueue career-bundle stylesheet
    wp_enqueue_style("career-bundle", get_stylesheet_directory_uri() . "/assets/css/career_bundle.css", null, time());

    // Enqueue single-course stylesheet
    wp_enqueue_style("single-course", get_stylesheet_directory_uri() . "/assets/css/singleCourse.css", null, time());

    // Enqueue header stylesheet
    wp_enqueue_style("header", get_stylesheet_directory_uri() . "/assets/css/header.css", null, time());

    // mouse helper css 
    wp_enqueue_style("mouse-helper", get_stylesheet_directory_uri() . "/assets/css/mouse_helper.css", null, time());

    // mouse helper js 
    wp_enqueue_script("mouse-helper", get_stylesheet_directory_uri() . "/assets/js/app.js", array('jquery'), time(), true);

    // single course js 
    wp_enqueue_script("single-course", get_stylesheet_directory_uri() . "/assets/js/singleCourse.js", null, time(), true);

    wp_enqueue_script("main-js", get_stylesheet_directory_uri() . "/assets/js/main.js", array('jquery'), time(), true);




    //enqueue for dashboard
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, "members/") !== false && is_user_logged_in() && userPermission()) {

        wp_enqueue_style('dash-next-style', get_stylesheet_directory_uri() . '/assets/dash/css/style.css', array(), time());
        //wp_enqueue_style('dash-next-fonts', 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', true, time());

        wp_enqueue_script('dash-next-script', get_stylesheet_directory_uri() . '/assets/dash/js/app.js', array('jquery'), time(), true);

        wp_enqueue_script('dash-next-icons', 'https://kit.fontawesome.com/0793d75093.js', array('jquery'), true, time());

        add_action('wp_enqueue_scripts', 'remove_wplms_style', 100);
        function remove_wplms_style()
        {
            wp_dequeue_style('wplms-style');
            wp_deregister_style('wplms-style');
        }
    }
}
add_action('wp_enqueue_scripts', 'a2n_assets');



// include all functions 
include_once get_stylesheet_directory() . '/inc/popular-course_function.php';
include_once get_stylesheet_directory() . '/inc/top-course_function.php';
include_once get_stylesheet_directory() . '/inc/bundle-course_function.php';
include_once get_stylesheet_directory() . '/inc/trending_course.php';
include_once get_stylesheet_directory() . '/inc/a2n_course_card.php';
include_once get_stylesheet_directory() . '/inc/modified_hooks.php';
// include_once get_stylesheet_directory() . '/elementor-widgets/reviews-widget.php';

function register_custom_elementor_widget()
{
    // Include the widget file
    require_once(get_stylesheet_directory() . '/elementor-widgets/reviews-widget.php');

    // Register the widget
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Custom_Elementor_Widget());
}
add_action('elementor/widgets/widgets_registered', 'register_custom_elementor_widget');


/**
 * Change position of "Place order" button Woocommerce Checkout
 * @Hooked at woocommerce_review_order_before_payment
 * 
 * Change the Hook with your anticipated hook(Place)
 */

// function wc_output_payment_button()
// {
//     echo '<div class="terms_con_txt">By completing your purchase you agree to these<a href=""> Terms of Service.</a></div>';

//     $order_button_text = apply_filters('woocommerce_order_button_text', __('Complete Checkout', 'woocommerce'));
//     echo '<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '" />';
//     echo '<span class="money_back_gurantee">30-Day Money-Back Gurantee</span>';
// }
// add_action('woocommerce_checkout_before_order_review_heading', 'wc_output_payment_button');

function wc_remove_woocommerce_order_button_html()
{
    return '';
}
add_filter('woocommerce_order_button_html', 'wc_remove_woocommerce_order_button_html');

function hide_coupon_field_on_cart($enabled)
{
    if (is_checkout()) {
        $enabled = false;
    }
    return $enabled;
}
add_filter('woocommerce_coupons_enabled', 'hide_coupon_field_on_cart');

remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
add_action('woocommerce_checkout_before_customer_details', 'woocommerce_order_review', 20);

add_filter('woocommerce_enable_order_notes_field', '__return_false');

add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields($address_fields)
{
    $address_fields['first_name']['placeholder'] = 'First Name';
    $address_fields['last_name']['placeholder'] = 'Last Name';
    $address_fields['company']['placeholder'] = 'Company Name(Optional)';
    $address_fields['address_1']['placeholder'] = 'House Number and Street Name';
    $address_fields['state']['placeholder'] = 'State';
    $address_fields['postcode']['placeholder'] = 'ZIP Code';
    $address_fields['city']['placeholder'] = 'Town / City';
    return $address_fields;
}
add_filter('woocommerce_checkout_fields', 'override_billing_checkout_fields', 20, 1);
function override_billing_checkout_fields($fields)
{
    $fields['billing']['billing_phone']['placeholder'] = 'Phone';
    $fields['billing']['billing_email']['placeholder'] = 'Email';
    return $fields;
}


add_action('woocommerce_before_quantity_input_field', 'display_quantity_minus');
function display_quantity_minus()
{
    echo '<button type="button" class="minus" >-</button>';
}

add_action('woocommerce_after_quantity_input_field', 'display_quantity_plus');
function display_quantity_plus()
{
    echo '<button type="button" class="plus" >+</button>';
}