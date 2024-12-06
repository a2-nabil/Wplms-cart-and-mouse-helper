<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<?php
$current_user = wp_get_current_user();
$user_email = strtolower($current_user->user_email);

$allowed_emails = [
	'shoivehossain@staffasia.org',
	'muhiburnabil@staffasia.org',
	'sakib@staffasia.org',
];

if (is_user_logged_in() && in_array($user_email, $allowed_emails, true)) {
	?>
	<style>
		header.sleek.transparent.fix {
			margin: 0 !important;
		}

		.woocommerce-checkout .woocommerce {
			padding: 60px 0 100px;
		}

		.woocommerce-checkout #content .container {
			max-width: 1388px;
			width: 100% !important;
			margin: 0 auto;
		}

		.woocommerce-checkout section#content {
			background: #F5FAEF !important;
		}

		.woocommerce-checkout .a2n_style {
			border-radius: 10px !important;
			background: #FFF;
			box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.05);
			padding: 24px !important;
		}

		.woocommerce-checkout tr,
		.woocommerce-checkout td,
		.woocommerce-checkout .woocommerce table.shop_table.woocommerce-checkout-review-order-table td {
			border: 0 !important;
		}

		.woocommerce-checkout #content label.coupon_label {
			color: #2B354E;
			font-family: "Roboto";
			font-size: 14px;
			font-style: normal;
			font-weight: 400;
			line-height: normal;
			margin-bottom: 12px;
		}

		.woocommerce-checkout .coupon {
			display: flex;
			width: 100%;
			max-width: 100%;
			height: 48px;
			flex-wrap: nowrap;
		}

		.woocommerce-checkout .coupon input#coupon_code {
			border-radius: 5px 0 0 5px;
			background: #F5FAEF;
			border: 0;
			color: #2B354E;
			font-family: "Roboto";
			font-size: 14px;
			font-style: normal;
			font-weight: 500;
			line-height: normal;
			text-transform: capitalize;
			height: 100%;
			padding: 0 16px;
		}

		.woocommerce-checkout .coupon input#coupon_code::placeholder {
			color: #2B354E;
		}

		.woocommerce-checkout .coupon .button[type="submit"] {
			border-radius: 0px 5px 5px 0px;
			background: #00378B;
			height: 100%;
			padding: 0 28px;
		}

		.woocommerce-checkout form tr .actions {
			padding-bottom: 0;
		}

		.woocommerce-checkout .woocommerce table.shop_table {
			margin: 0;
		}

		.woocommerce-checkout #content .button[name="update_cart"] {
			display: block;
			margin-bottom: 0;
			margin-left: auto;
		}

		.woocommerce-checkout #content h3 {
			margin: 0 0 40px;
			color: #3F3B52;
			font-family: "Roboto", sans-serif;
			font-size: 20px;
			font-weight: 700;
			line-height: normal;
			text-transform: capitalize;
		}

		.woocommerce-checkout #content h3#order_review_heading {
			margin-bottom: 24px;
		}

		tr.woocommerce-cart-form__cart-item.cart_item {
			background: #fff;
			display: table;
			margin-bottom: 15px !important;
		}

		td.product-price del {
			display: none;
		}

		td.product-subtotal {
			display: none;
		}

		td.product-price {
			position: absolute;
		}

		.woocommerce-checkout #content .a2n_style .quantity input {
			height: 28px !important;
			color: #3F3B52;
			text-align: center;
			font-family: "Roboto", sans-serif;
			font-size: 13px;
			font-weight: 400;
		}

		.woocommerce-checkout #content .a2n_style .quantity input[type=number]::-webkit-inner-spin-button {
			opacity: 1;
		}

		.woocommerce-checkout tr.woocommerce-cart-form__cart-item.cart_item {
			padding: 0 8px;
			padding-right: 16px;
			position: relative;
			border: 1px solid #F1F1F1 !important;
			border-radius: 5px;
			width: 100%;
		}

		.woocommerce-checkout tr.woocommerce-cart-form__cart-item.cart_item td {
			padding: 8px 0 !important;
		}

		.woocommerce-checkout tr.cart_item td.product-thumbnail {
			width: 70px;
			height: 66px;
		}

		.woocommerce-checkout tr.cart_item td.product-thumbnail img.attachment-woocommerce_thumbnail.size-woocommerce_thumbnail {
			width: 70px;
			height: 66px;
			object-fit: cover;
			border-radius: 3px;
		}

		.woocommerce-checkout tr.cart_item td.product-name {
			width: 72%;
		}

		.woocommerce-checkout tr.cart_item td.product-name a {
			color: #2B354E;
			font-family: "Roboto";
			font-size: 13px;
			font-style: normal;
			font-weight: 500;
			line-height: 15.6px;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
			margin: 0 10px;
			margin-bottom: 25px;
		}

		.woocommerce-checkout tr.cart_item td.product-remove {
			position: absolute;
			right: 0;
			z-index: 1;
			top: 0;
		}

		.woocommerce-checkout tr.cart_item td.product-price {
			bottom: 7px;
			left: 100px;
			border: 0;
		}

		.woocommerce-checkout tr.cart_item td.product-quantity {
			min-width: 54px;
			padding: 14px 0;
			vertical-align: bottom;
		}

		.woocommerce-checkout tr.cart_item td.product-price .amount {
			color: #1E4399;
			font-family: "Roboto";
			font-size: 13px;
			font-weight: 700;
			line-height: 15.6px;
		}

		.woocommerce-checkout .button[type="submit"] {
			border-radius: 4px;
			background: #7ba631 !important;
			border-color: #7ba631 !important;
			color: #fff !important;
			font-family: "Roboto";
			font-size: 14px;
			font-weight: 600;
			line-height: normal;
			text-transform: capitalize;
		}

		.woocommerce-checkout .cart_totals table tr th {
			padding: 7px 0;
			border: 0;
			color: #3F3B52;
			font-family: "Roboto";
			font-size: 16px;
			font-weight: 400;
			line-height: normal;
			text-transform: capitalize;
		}

		.woocommerce-checkout .cart_totals table tr td {
			padding: 7px 0;
			border: 0;
			color: #3F3B52;
			text-align: right;
			font-family: "Roboto", sans-serif;
			font-size: 16px;
			font-style: normal;
			font-weight: 700;
			line-height: normal;
			text-transform: capitalize;
		}

		.woocommerce-checkout .a2n_sideImg {
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 32px;
			margin-top: 58px;
		}

		.woocommerce-checkout .cart_totals table tr.order-total th,
		.woocommerce-checkout .cart_totals table tr.order-total td {
			border-top: 1px solid #F1F1F1 !important;
		}

		@media (max-width: 767px) {
			.woocommerce-checkout .a2n_sideImg {
				gap: 20px;
				margin-top: 24px;
			}
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<?php
				do_action('woocommerce_before_checkout_form', $checkout);

				// If checkout registration is disabled and not logged in, the user cannot checkout.
				if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
					echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
					return;
				} ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="chk_cart_items_mbl a2n_style">
					<h3 id="order_review_heading"><?php esc_html_e('Order Summary', 'woocommerce'); ?></h3>
					<?php do_action('woocommerce_checkout_order_review'); ?>
					<style>
						.chk_cart_items_mbl {
							display: none;
						}

						@media only screen and (max-width: 991px) {
							.chk_cart_items_mbl {
								display: block;
							}

							.chk_cart_items_desktop {
								display: none;
							}
						}

						.woocommerce-checkout .woocommerce form.checkout.woocommerce-checkout {
							box-shadow: none;
							background: transparent;
							padding: 0;
							margin: 0;
						}
					</style>
				</div>

				<form name="checkout" method="post" class="checkout woocommerce-checkout"
					action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

					<?php if ($checkout->get_checkout_fields()): ?>

						<?php do_action('woocommerce_checkout_before_customer_details'); ?>

						<div class="a2n_style" id="customer_details">
							<?php do_action('woocommerce_checkout_billing'); ?>
							<?php do_action('woocommerce_checkout_shipping'); ?>
						</div>

						<?php do_action('woocommerce_checkout_after_customer_details'); ?>

					<?php endif; ?>


					<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>


					<?php do_action('woocommerce_checkout_after_order_review'); ?>


				</form>
			</div>

			<div class="col-md-5 ">
				<div class="chk_cart_items_desktop a2n_style">
					<h3 id="order_review_heading"><?php esc_html_e('Order Summary', 'woocommerce'); ?></h3>
					<?php do_action('woocommerce_checkout_order_review'); ?>
				</div>

				<div class="a2n_rightSide">
					<?php do_action('woocommerce_cart_totals'); ?>
					<div class="a2n_sideImg a2n_desktop">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cart/money-back.webp"
							alt="money-back">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cart/ssl-trans.webp"
							alt="money-back">
					</div>
				</div>


				<?php
				// $all_ids = array();
				// foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				// 	$all_ids[] = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
				// }
			

				// if (!in_array(465651, $all_ids) or empty($all_ids)) {
				?>
				<!-- <div class="upgrade-box">
					<div class="upgrade-content-box">
						<h3>Early Black Friday Offer </br>
							<strong>60% OFF Lifetime Prime Membership <br>
								For only <del>£399</del> £149
								
							</strong>
						</h3>
						<p>Enjoy unlimited access to 3000+ courses for lifetime</br></p>
						<button><a href="<?php echo site_url(); ?>/checkout/?add-to-cart=465651">ADD OFFER TO
								CART</a></button>
						<p>No more than 30 active courses at any one time. Cancel anytime from your account. Certain courses
							are not included and can't be used in conjunction with any other offer. 14 day money back
							guarantee.</p>
					</div>

				</div> -->
				<?php

				// if (!session_id()) {
				// 	session_start();
				// 	$sa_values_offer = $_SESSION['sa_values_offer'] = $all_ids;
				// }
			
				// $c_data = implode(",", $all_ids);
			
				?>
				<!-- <script>
					localStorage.setItem('removed_id', '<?php echo $c_data; ?>');
					const removed_id = localStorage.getItem('removed_id');
				</script> -->
				<?php
				// } else {
			
				?>
				<!-- <script>
					const removed_id = localStorage.getItem('removed_id');
					let undo_link = '<?php echo site_url(); ?>/checkout/?add-to-cart=' + removed_id;
				</script> -->
				<?php


				//$prev_products =  implode(",",$sa_values_offer);
			
				// if (is_array($sa_values_offer)) {
				// 	$prev_products = implode(",", $sa_values_offer);
				// } else {
				// 	$prev_products = ''; 
				// }
			
				?>
				<!-- <div class="after-upgrade" id="close_sub">
					<i class="fas fa-check-circle"></i>
					<h2>Selected</h2>
					<script>
						document.write('Remove'.link(undo_link));
					</script>
				</div>
				<script>
					if (removed_id === null) {
						document.getElementById("close_sub").style.display = "none";
						var element = document.getElementById("close_sub");
						element.classList.add("mystyle");
					}
				</script> -->
				<?php
				// }
				?>
			</div>
		</div>

	</div>
	<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
<?php
} else {
	do_action('woocommerce_before_checkout_form', $checkout);


	if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
		echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
		return;
	}
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="chk_cart_items_mbl">
					<h3 id="order_review_heading"><?php esc_html_e('Order Summary', 'woocommerce'); ?></h3>
					<?php do_action('woocommerce_checkout_order_review'); ?>
					<style>
						.chk_cart_items_mbl {
							display: none;
						}

						@media only screen and (max-width: 991px) {
							.chk_cart_items_mbl {
								display: block;
							}

							.chk_cart_items_desktop {
								display: none;
							}
						}
					</style>
				</div>

				<form name="checkout" method="post" class="checkout woocommerce-checkout"
					action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

					<?php if ($checkout->get_checkout_fields()): ?>

						<?php do_action('woocommerce_checkout_before_customer_details'); ?>

						<div class="col2-set" id="customer_details">
							<div class="col-1">
								<?php do_action('woocommerce_checkout_billing'); ?>
							</div>

							<div class="col-2">
								<?php do_action('woocommerce_checkout_shipping'); ?>
							</div>
						</div>

						<?php do_action('woocommerce_checkout_after_customer_details'); ?>

					<?php endif; ?>

					<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>


					<?php do_action('woocommerce_checkout_after_order_review'); ?>

				</form>
			</div>

			<div class="col-md-4">
				<div class="chk_cart_items_desktop">
					<h3 id="order_review_heading"><?php esc_html_e('Order Summary', 'woocommerce'); ?></h3>
					<?php do_action('woocommerce_checkout_order_review'); ?>
				</div>

				<?php echo do_shortcode("[elementor-template id='176315']"); ?>
				<img src="https://www.janets.org.uk/wp-content/uploads/2022/11/checkout-img.jpg" alt="checkout">
				<br>
				<br>


				<?php
				// $all_ids = array();
				// foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				// 	$all_ids[] = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
				// }
			

				// if (!in_array(465651, $all_ids) or empty($all_ids)) {
				?>
				<!-- <div class="upgrade-box">
					<div class="upgrade-content-box">
						<h3>Early Black Friday Offer </br>
							<strong>60% OFF Lifetime Prime Membership <br>
								For only <del>£399</del> £149
								
							</strong>
						</h3>
						<p>Enjoy unlimited access to 3000+ courses for lifetime</br></p>
						<button><a href="<?php echo site_url(); ?>/checkout/?add-to-cart=465651">ADD OFFER TO
								CART</a></button>
						<p>No more than 30 active courses at any one time. Cancel anytime from your account. Certain courses
							are not included and can't be used in conjunction with any other offer. 14 day money back
							guarantee.</p>
					</div>

				</div> -->
				<?php

				// if (!session_id()) {
				// 	session_start();
				// 	$sa_values_offer = $_SESSION['sa_values_offer'] = $all_ids;
				// }
			
				// $c_data = implode(",", $all_ids);
			
				?>
				<!-- <script>
					localStorage.setItem('removed_id', '<?php echo $c_data; ?>');
					const removed_id = localStorage.getItem('removed_id');
				</script> -->
				<?php
				// } else {
			
				?>
				<!-- <script>
					const removed_id = localStorage.getItem('removed_id');
					let undo_link = '<?php echo site_url(); ?>/checkout/?add-to-cart=' + removed_id;
				</script> -->
				<?php


				//$prev_products =  implode(",",$sa_values_offer);
			
				// if (is_array($sa_values_offer)) {
				// 	$prev_products = implode(",", $sa_values_offer);
				// } else {
				// 	$prev_products = ''; 
				// }
			
				?>
				<!-- <div class="after-upgrade" id="close_sub">
					<i class="fas fa-check-circle"></i>
					<h2>Selected</h2>
					<script>
						document.write('Remove'.link(undo_link));
					</script>
				</div>
				<script>
					if (removed_id === null) {
						document.getElementById("close_sub").style.display = "none";
						var element = document.getElementById("close_sub");
						element.classList.add("mystyle");
					}
				</script> -->
				<?php
				// }
				?>
			</div>
		</div>

	</div>
	<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
<?php
}
?>