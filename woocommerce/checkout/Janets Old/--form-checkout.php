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

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}
?>

<style>
	.woocommerce button[name="update_cart"],
	.woocommerce input[name="update_cart"] {
		display: none;
	}

	.cart-checkout-products tr td.product-thumbnail img {
		max-width: 70px;
		height: 50px;
		border-radius: 10px;
		object-fit: cover;
	}

	.cart-checkout-products-total-section {
		background: rgba(123, 166, 49, 0.2);
		border-radius: 20px;
		padding: 50px 30px;
		padding-top: 30px;
	}

	.cart-checkout-total {
		display: flex;
		justify-content: space-between;
		align-items: end;
	}

	.cart-checkout-total .cart-checkout-total-left,
	.cart-checkout-total .cart-checkout-total-right {
		width: 50%;
	}

	.cart_totals table {
		margin-bottom: 0 !important;
	}

	.cart_totals {
		background: #fff;
		border-radius: 15px;
		padding: 25px 0;
	}

	.cart_totals table tr th {
		padding-left: 35px !important;
	}

	.cart_totals table tr.cart-subtotal td {
		font-weight: bold;
	}

	.allready-loggedin h3 {
		font-size: 18px !important;
		margin-bottom: 25px;
	}

	.checkout-shopping a,
	.allready-loggedin a {
		display: inline-block;
		border: 2px solid #7BA631;
		border-radius: 50px;
		padding: 15px 30px;
		color: #282828;
		font-weight: bold;
		text-decoration: none;
	}

	.checkout-shopping a:hover,
	.allready-loggedin a:hover {
		background: #7BA631;
		color: #fff;
	}

	.cart-checkout-coupon-login {
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		grid-template-rows: 1fr;
		grid-column-gap: 30px;
		margin-top: 30px;
		margin-bottom: 30px;
	}

	.cart-checkout-coupon {
		grid-area: 1 / 1 / 2 / 2;
	}

	.cart-checkout-login {
		grid-area: 1 / 2 / 2 / 3;
	}

	.cart-checkout-coupon,
	.cart-checkout-login {
		background: rgba(123, 166, 49, 0.2);
		border-radius: 20px;
		padding: 35px;
	}

	.cart-checkout-coupon .coupon-form {
		margin: 0 !important;
	}

	.cart-checkout-coupon p:first-child,
	.woocommerce-form-login-toggle p {
		color: #282828;
		font-weight: bold;
		font-size: 16px;
		margin-bottom: 15px;
	}

	.woocommerce-form-login-toggle a {
		background: #7BA631;
		border-radius: 10px;
		color: #fff;
		border: 2px solid #7BA631;
		padding: 15px 30px;
		display: inline-block;
		font-size: 16px;
		font-weight: 600;
	}

	.cart-checkout-coupon p.form-row.form-row-first {
		width: calc(100% - 150px);
		display: inline-block;
		float: left;
	}

	.cart-checkout-coupon p.form-row.form-row-last {
		width: 150px;
		display: inline-block;
	}

	.cart-checkout-coupon p.form-row.form-row-first input {
		height: 50px;
		border-radius: 8px 0 0 8px !important;
		padding: 10px 25px !important;
		border: none;
		outline: none;
		text-transform: uppercase;
		font-weight: bold;
		font-size: 12px;
	}

	.cart-checkout-coupon p.form-row.form-row-last button {
		background: #7BA631 !important;
		border-radius: 0px 8px 8px 0px !important;
		color: #fff !important;
		height: 50px;
		width: 100%;
		border: 2px solid #7BA631 !important;
		padding: 10px !important;
		font-size: 12px;
	}

	.cart-checkout-coupon p.form-row.form-row-last button:hover {
		background: #fff !important;
		color: #7BA631 !important;
	}

	.checkout-cart-login-form .woocommerce-form-login input {
		background: #fff;
		border-radius: 8px;
		height: 50px;
		padding: 10px 20px;
	}

	.woocommerce-billing-fields .woocommerce-billing-fields__field-wrapper p {
		width: 49%;
	}

	.woocommerce-billing-fields .woocommerce-billing-fields__field-wrapper {
		display: flex;
		justify-content: space-between;
		flex-flow: row wrap;
	}

	.woocommerce-billing-fields__field-wrapper p#billing_address_1_field,
	.woocommerce-billing-fields__field-wrapper p#billing_address_2_field,
	.woocommerce-billing-fields__field-wrapper p#billing_email_field {
		width: 100%;
	}

	.woocommerce-billing-fields__field-wrapper p .input-text,
	input#account_password {
		background: #e5e5e5 !important;
		border-radius: 5px !important;
		border: none !important;
		outline: none !important;
		padding: 15px 20px !important;
		font-size: 16px !important;
		font-weight: 500;
		height: 48px !important;
	}


	.woocommerce-billing-fields__field-wrapper p span#select2-billing_country-container {
		background: #e5e5e5 !important;
		border: none !important;
		border-radius: 5px !important;
		padding: 9px 20px !important;
	}

	span.select2-selection.select2-selection--single {
		border: none;
	}

	.woocommerce-checkout #payment {
		border: none;
	}

	div#order_review {
		background: #F6F7F9;
		border-radius: 10px;
		padding: 20px;
	}

	.woocommerce-billing-fields h3,
	h3.payment-method-title,
	.order-summary-title {
		color: #282828;
		font-size: 36px;
		font-weight: 600;
	}

	h3.payment-method-title,
	.order-summary-title {
		margin-bottom: 25px;
	}

	button#place_order, .second-place-order-btn {
		background: #7BA631;
		border-radius: 8px;
		padding: 20px 35px;
		margin: 0;
		margin-top: 10px;
		width: 100%;
		font-size: 18px;
	}

	.second-place-order-btn{
		font-weight: 700;
		border: none;
	}

	ul.wc_payment_methods .input-radio {
		position: relative;
	}

	ul.wc_payment_methods .input-radio::before {
		content: "";
		position: absolute;
		width: 14px;
		height: 14px;
		border: 4px solid #646F79;
		left: 0;
		top: 0;
		border-radius: 50%;
		background: #fff;
	}

	ul.wc_payment_methods .input-radio:checked::before {
		border-color: #3C88FD;
	}

	ul.wc_payment_methods li label {
		font-size: 16px;
	}

	.woocommerce table.shop_table .woocommerce-cart-form__cart-item td {
		border: none;
	}

	form.woocommerce-cart-form table tr {
		display: flex;
		justify-content: space-around;
		align-items: center;
	}

	tr.woocommerce-cart-form__cart-item.cart_item {
		background: #fff;
		margin-bottom: 15px;
		border-radius: 15px;
		font-weight: bold;
	}

	tr.woocommerce-cart-form__cart-item.cart_item a {
		font-weight: bold;
		color: #282828;
		text-decoration: none;
	}

	tr.woocommerce-cart-form__cart-item.cart_item {
		background: #fff;
		margin-bottom: 15px;
		border-radius: 15px;
		font-weight: bold;
		font-size: 16px;
	}

	form.woocommerce-cart-form table tr.woocommerce-cart-form__cart-item.cart_item td.product-remove a {
		display: inline-block;
		line-height: .8;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-remove,
	form.woocommerce-cart-form table tr th.product-remove {
		width: 5%;
		text-align: center;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-thumbnail,
	form.woocommerce-cart-form table tr th.product-thumbnail {
		width: 10%;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-name,
	form.woocommerce-cart-form table tr th.product-name {
		width: 45%;
		padding-left: 9px;
		padding-right: 9px;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-price,
	form.woocommerce-cart-form table tr th.product-price {
		width: 15%;
		text-align: left;
		padding: 9px 12px;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-subtotal,
	form.woocommerce-cart-form table tr th.product-subtotal {
		width: 15%;
		text-align: center;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-quantity,
	form.woocommerce-cart-form table tr th.product-quantity {
		width: 15%;
		text-align: center;
	}

	form.woocommerce-cart-form table thead tr th {
		font-size: 18px;
	}

	span.cart-qty-minus,
	span.cart-qty-plus {
		width: 25px;
		height: 25px;
		border: 1px solid #000;
		display: inline-block;
		border-radius: 50%;
		cursor: pointer;
		line-height: 1.2;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-quantity {
		display: flex;
		justify-content: space-around;
		align-items: center;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-quantity span.cart-qty-plus {
		order: 3;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-quantity .quantity input {
		-moz-appearance: textfield;
		width: 35px;
		border-color: #000;
		color: #000;
	}

	form.woocommerce-cart-form table tr.cart_item td.product-quantity .quantity input::-webkit-outer-spin-button,
	form.woocommerce-cart-form table tr.cart_item td.product-quantity .quantity input::-webkit-inner-spin-button {
		-webkit-appearance: none;
	}

	form.checkout.woocommerce-checkout .col-1 {
		width: 100%;
	}

	form.checkout.woocommerce-checkout {
		margin-top: 30px !important;
	}

	.cart-checkout-products-total-section .customadd_cart {
		display: none;
	}

	#customer_details .col-2 {
		width: 100%;
	}

	h3.payment-method-title {
		display: none;
	}

	#order_review.woocommerce-checkout-review-order {
		display: none;
	}

	.woocommerce-checkout .woocommerce form.checkout.woocommerce-checkout span.select2-selection.select2-selection--single {
		border: none !important;
		padding: 0 !important;
		height: 48px !important;
	}

	#checkout-sidebar img {
		margin-bottom: 20px;
		/* max-width: 250px; */
	}


	.woocommerce-checkout .woocommerce form.checkout.woocommerce-checkout {
		padding: 0;
	}
	.checkout-custom-sidebar {
		margin-top: 118px !important;
	}

	.duplicate-order-btn {
		margin-bottom: 30px;
	}

	@media (max-width: 1200px) {
		.cart-checkout-products tr td.product-thumbnail img {
			max-width: 60px;
			height: 50px;
		}

		form.woocommerce-cart-form table tr {
			padding: 0;
		}

		form.woocommerce-cart-form table tr.cart_item td.product-name,
		form.woocommerce-cart-form table tr th.product-name {
			width: 25%;
			font-size: 15px;
		}

		form.woocommerce-cart-form table tr.cart_item td.product-quantity,
		form.woocommerce-cart-form table tr th.product-quantity {
			width: 20%;
			text-align: center;
		}

		form.woocommerce-cart-form table thead tr th {
			font-size: 15px;
		}
	}

	@media (max-width: 1199px) {
		.cart-checkout-coupon-login {
			display: unset;
		}

		.cart-checkout-coupon-login div {
			margin-top: 20px;
			text-align: center;
		}

		.cart-checkout-coupon .coupon-form {
			max-width: 400px;
			margin: auto !important;
			margin-top: 20px !important;
		}

		.allready-loggedin a {
			margin-bottom: 30px;
		}

		.cart_totals table tr th {
			padding-left: 20px !important;
		}

		.cart_totals table tr td {
			padding-right: 20px !important;
		}

	}

	@media (min-width: 768px) and (max-width: 991px) {

		form.woocommerce-cart-form table tr.cart_item td.product-thumbnail,
		form.woocommerce-cart-form table tr th.product-thumbnail {
			width: 0;
			display: none;
		}
	}

	@media (max-width: 991px) {

		.cart-checkout-coupon,
		.cart-checkout-login {
			padding: 20px;
		}

		.cart-checkout-total {
			flex-flow: row wrap;
		}

		.cart-checkout-total .cart-checkout-total-left,
		.cart-checkout-total .cart-checkout-total-right {
			width: 100%;
		}

		.cart-checkout-total .cart-checkout-total-left {
			order: 2;
			margin-top: 20px;
			text-align: center;
		}
	}

	@media (max-width: 767px) {
		.woocommerce-billing-fields .woocommerce-billing-fields__field-wrapper p {
			width: 100%;
		}

		.woocommerce-billing-fields .woocommerce-billing-fields__field-wrapper p#billing_country_field {
			margin-bottom: 35px;
		}

		form.woocommerce-cart-form table tr.cart_item td.product-thumbnail,
		form.woocommerce-cart-form table tr th.product-thumbnail {
			width: 15%;
		}

		tr.woocommerce-cart-form__cart-item.cart_item {
			font-size: 14px;
			padding: 0 5px !important;
		}

		.cart-checkout-products-total-section {
			padding: 25px 20px;
		}

		form.woocommerce-cart-form table tr th {
			font-size: 14px !important;
		}

		.cart-checkout-coupon p.form-row.form-row-last {
			width: 120px;
		}

		.cart-checkout-coupon p.form-row.form-row-last button {
			font-size: 12px;
		}

		.cart-checkout-coupon p.form-row.form-row-first {
			width: calc(100% - 120px);
		}


		.woocommerce-billing-fields h3,
		h3.payment-method-title,
		.order-summary-title {
			font-size: 25px;
		}

		#checkout-sidebar {
			margin-top: 30px;
		}
		.checkout-custom-sidebar {
			margin-top: 15px !important;
		}
	}
</style>
<script>
	function cart_update() {
		jQuery(function($) {
			$('.woocommerce').on('change', 'input.qty', function() {
				$("[name='update_cart']").trigger("click");
			});

		});
	}

	cart_update();

	jQuery(document).ready(function() {

		jQuery('form.woocommerce-cart-form table tr.cart_item td.product-quantity span.cart-qty-plus').on('click', function(e) {

			$oldValue = jQuery(this).siblings().children('input').val();

			$newValue = parseInt($oldValue) + 1;
			console.log(parseInt($newValue));
			jQuery(this).siblings().children('input').val($newValue);
			jQuery("[name='update_cart']").trigger("click");
		});
		jQuery('form.woocommerce-cart-form table tr.cart_item td.product-quantity span.cart-qty-minus').on('click', function(e) {
			$oldValue = jQuery(this).siblings().children('input').val();

			if (!($oldValue <= 1)) {
				$newValue = parseInt($oldValue) - 1;
				console.log(parseInt($newValue));
				jQuery(this).siblings().children('input').val($newValue);
				jQuery("[name='update_cart']").trigger("click");
			}

		});

		jQuery('form.woocommerce-cart-form table tr.cart_item td.product-quantity .quantity input').attr('readonly', true);

	});

	
	jQuery(document).ready(function() {
		jQuery(document.body).on('applied_coupon_in_checkout removed_coupon_in_checkout', function() {
			location.reload();
		});

		jQuery(".second-place-order-btn").click(function(){
			jQuery("#place_order").trigger("click");
		});
	});

	

</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<div class="container">
	<div class="row">
		<div class="<?php echo (is_active_sidebar('checkout') ? 'col-md-8' : 'col-md-12'); ?>">

			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

				<?php if ($checkout->get_checkout_fields()) : ?>

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

				<h3 class="payment-method-title">Payment Method</h3>
				<?php do_action('woocommerce_checkout_before_order_review'); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action('woocommerce_checkout_order_review'); ?>
				</div>

				<?php do_action('woocommerce_checkout_after_order_review'); ?>

			</form>
			<div class="cart-checkout-products-total-section">
				<h3 class="order-summary-title">Order Summary</h3>
				<div class="cart-checkout-products">
					<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
						<?php do_action('woocommerce_before_cart_table'); ?>

						<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
							<thead>
								<tr>
									<th class="product-remove">&nbsp;</th>
									<th class="product-thumbnail">&nbsp;</th>
									<th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
									<th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
									<th class="product-quantity"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
									<th class="product-subtotal"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php do_action('woocommerce_before_cart_contents'); ?>

								<?php
								foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
									$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
									$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

									if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
										$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key); ?>
										<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

											<td class="product-remove">
												<?php
												echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
													'woocommerce_cart_item_remove_link',
													sprintf(
														'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
														esc_url(wc_get_cart_remove_url($cart_item_key)),
														esc_html__('Remove this item', 'woocommerce'),
														esc_attr($product_id),
														esc_attr($_product->get_sku())
													),
													$cart_item_key
												);
												?>
											</td>

											<td class="product-thumbnail">
												<?php
												$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

												if (!$product_permalink) {
													echo $thumbnail; // PHPCS: XSS ok.
												} else {
													printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
												}
												?>
											</td>

											<td class="product-name" data-title="<?php esc_attr_e('Product Name', 'woocommerce'); ?>">
												<?php
												if (!$product_permalink) {
													echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
												} else {
													echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
												}

												do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

												// Meta data.
												echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

												// Backorder notification.
												if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
													echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
												}
												?>
											</td>

											<td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
												<?php
												echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
												?>
											</td>

											<td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
												<?php
												if ($_product->is_sold_individually()) {
													$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
												} else {
												?><span class="cart-qty-minus">-</span><?php
																						$product_quantity = woocommerce_quantity_input(
																							array(
																								'input_name'   => "cart[{$cart_item_key}][qty]",
																								'input_value'  => $cart_item['quantity'],
																								'max_value'    => $_product->get_max_purchase_quantity(),
																								'min_value'    => '0',
																								'product_name' => $_product->get_name(),
																							),
																							$_product,
																							false
																						);
																						?><span class="cart-qty-plus">+</span><?php

																															}

																															echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.

																																?>
											</td>

											<td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
												<?php
												echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
												?>
											</td>
										</tr>
								<?php
									}
								}
								?>

								<?php do_action('woocommerce_cart_contents'); ?>
								<tr>
									<td colspan="6" class="actions">


										<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

										<?php do_action('woocommerce_cart_actions'); ?>

										<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
									</td>
								</tr>

								<?php do_action('woocommerce_after_cart_contents'); ?>
							</tbody>
						</table>
						<?php do_action('woocommerce_after_cart_table'); ?>
					</form>

					<?php do_action('woocommerce_before_cart_collaterals'); ?>
				

					<div class="cart-collaterals">
						<?php
						/**
						 * Cart collaterals hook.
						 *
						 * @hooked woocommerce_cross_sell_display
						 * @hooked woocommerce_cart_totals - 10
						 */
						do_action('woocommerce_cart_collaterals');
						?>
					</div>

					<?php do_action('woocommerce_after_cart'); ?>
				</div>

				<div class="cart-checkout-total">
					<div class="cart-checkout-total-left">
						<div class="checkout-shopping">
							<!-- <a href="/all-courses"><i class="fa-solid fa-arrow-left-long"></i> Continue Shopping</a> -->
						</div>
					</div>
					<div class="cart-checkout-total-right">
						<div class="cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

							<?php do_action('woocommerce_before_cart_totals'); ?>

							<table cellspacing="0" class="shop_table shop_table_responsive">

								<tr class="cart-subtotal">
									<th><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
									<td data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
								</tr>

								<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
									<tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
										<th><?php wc_cart_totals_coupon_label($coupon); ?></th>
										<td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></td>
									</tr>
								<?php endforeach; ?>

								<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

									<?php do_action('woocommerce_cart_totals_before_shipping'); ?>

									<?php wc_cart_totals_shipping_html(); ?>

									<?php do_action('woocommerce_cart_totals_after_shipping'); ?>

								<?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) : ?>

									<tr class="shipping">
										<th><?php esc_html_e('Shipping', 'woocommerce'); ?></th>
										<td data-title="<?php esc_attr_e('Shipping', 'woocommerce'); ?>"><?php woocommerce_shipping_calculator(); ?></td>
									</tr>

								<?php endif; ?>

								<?php foreach (WC()->cart->get_fees() as $fee) : ?>
									<tr class="fee">
										<th><?php echo esc_html($fee->name); ?></th>
										<td data-title="<?php echo esc_attr($fee->name); ?>"><?php wc_cart_totals_fee_html($fee); ?></td>
									</tr>
								<?php endforeach; ?>

								<?php
								if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) {
									$taxable_address = WC()->customer->get_taxable_address();
									$estimated_text  = '';

									if (WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()) {
										/* translators: %s location. */
										$estimated_text = sprintf(' <small>' . esc_html__('(estimated for %s)', 'woocommerce') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]]);
									}

									if ('itemized' === get_option('woocommerce_tax_total_display')) {
										foreach (WC()->cart->get_tax_totals() as $code => $tax) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
								?>
											<tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
												<th><?php echo esc_html($tax->label) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													?></th>
												<td data-title="<?php echo esc_attr($tax->label); ?>"><?php echo wp_kses_post($tax->formatted_amount); ?></td>
											</tr>
										<?php
										}
									} else {
										?>
										<tr class="tax-total">
											<th><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></th>
											<td data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
										</tr>
								<?php
									}
								}
								?>

								<?php do_action('woocommerce_cart_totals_before_order_total'); ?>

								<tr class="order-total">
									<th><?php esc_html_e('Total', 'woocommerce'); ?></th>
									<td data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
								</tr>

								<?php do_action('woocommerce_cart_totals_after_order_total'); ?>

							</table>


							<?php do_action('woocommerce_after_cart_totals'); ?>

						</div>
					</div>
				</div>
			</div>

			<div class="cart-checkout-coupon-login">
				<div class="cart-checkout-coupon">
					<?php do_action('cart_checkout_coupon'); ?>
				</div>

				<div class="cart-checkout-login">
					<div class="checkout-cart-login-form">
						<?php

						if (!is_user_logged_in()) { ?>

							<div class="woocommerce-form-login-toggle">

								<p><?php esc_html_e('Returning customer?', 'woocommerce'); ?></p>
								<a href="#" class="showlogin">Click here to login</a>
							</div>

						<?php
						} else { ?>

							<div class="allready-loggedin">
								<h3>You have already logged in!</h3>
								<!-- <a href="/all-courses"><i class="fa-solid fa-arrow-left-long"></i> Continue Shopping</a> -->
							</div>

						<?php
						}

						?>
						<form class="woocommerce-form woocommerce-form-login login" method="post" style="display:none;">

							<?php do_action('woocommerce_login_form_start'); ?>

							<?php echo ($message) ? wpautop(wptexturize($message)) : ''; // @codingStandardsIgnoreLine 
							?>

							<p class="form-row form-row-first">
								<label for="username"><?php esc_html_e('Username or email', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								<input type="text" class="input-text" name="username" id="username" autocomplete="username" />
							</p>
							<p class="form-row form-row-last">
								<label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								<input class="input-text" type="password" name="password" id="password" autocomplete="current-password" />
							</p>
							<div class="clear"></div>

							<?php do_action('woocommerce_login_form'); ?>

							<p class="form-row">
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
									<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
								</label>
								<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
								<input type="hidden" name="redirect" value="<?php echo esc_url($redirect); ?>" />
								<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>"><?php esc_html_e('Login', 'woocommerce'); ?></button>
							</p>
							<p class="lost_password">
								<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
							</p>

							<div class="clear"></div>

							<?php do_action('woocommerce_login_form_end'); ?>

						</form>
					</div>
				</div>
			</div>
			<div class="duplicate-order-btn">
				<button class="second-place-order-btn">Place Order</button>
			</div>

			<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
		</div>
		<?php if (is_active_sidebar('checkout')) { ?>
		<div class="col-md-4 checkout-custom-sidebar">
			<div id="checkout-sidebar">
				<!-- <img src="https://www.janets.org.uk/wp-content/uploads/2022/09/review.png" alt=""> -->
				<!-- <img src="https://www.janets.org.uk/wp-content/uploads/2022/09/money-backg.png" alt=""> -->
				<img src="https://www.janets.org.uk/wp-content/uploads/2022/08/Group-14187-1.png" alt="">
				<img src="https://www.janets.org.uk/wp-content/uploads/2022/09/Screenshot.png" alt="">
				<?php
				dynamic_sidebar('checkout');
				?>


				<div class="side-cart-offer">
					<?php
					$all_ids = array();
					foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
						$all_ids[] = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
					}

					/* if (!session_id()) {
						session_start();
					}
					$sa_values_offer = $_SESSION['sa_values_offer'] = $all_ids; */

					//echo do_shortcode('[elementor-template id="311356"]');

					if (!in_array(393651, $all_ids) or empty($all_ids)) {
					?>
						<div class="upgrade-box" style="">
							<div class="upgrade-content-box">
								<h3>Upgrade to get UNLIMITED ACCESS to ALL COURSES</br>
								With 6 Month Free Access 
									<strong>for £49 only!<sup></sup></strong>
								</h3>

								
								<p>Pay for 6 months and get access to all courses for 1 year only for £49.</br>Why take one course when you can take them all?</p>
								<button><a href="<?php echo get_bloginfo('url'); ?>/checkout/?add-to-cart=393651">ADD OFFER TO CART</a></button>
								<p>No more than 50 active courses at any one time. Membership renews after 12 months. Cancel anytime from your account. Certain courses are not included. Can't be used in conjunction with any other offer.</p>
							</div>
							<!-- <div class="upgrade-image">
								<img src="https://www.janets.org.uk/wp-content/uploads/2021/10/Janets-All-Course-Access-11.10.2021.png" alt="">
							</div> -->
						</div>
						<?php

						if (!session_id()) {
							session_start();
							$sa_values_offer = $_SESSION['sa_values_offer'] = $all_ids;
						}

						$c_data = implode(",", $all_ids);

						?>
						<script>
							localStorage.setItem('removed_id', '<?php echo $c_data; ?>');
							const removed_id = localStorage.getItem('removed_id');
							console.log(removed_id);
						</script>
					<?php
					} elseif ((in_array(393651, $all_ids) or empty($all_ids)) and (in_array(417282, $all_ids) or empty($all_ids))) {
					?>
						<script>
							//const removed_id = localStorage.getItem('removed_id');
							//console.log('Storage data: '+ removed_id);
							//let undo_link = 'https://www.janets.org.uk/checkout/?add-to-cart='+removed_id;
							//console.log(undo_link);
						</script>
						<?php
						//$prev_products =  implode(",",$sa_values_offer);// Use of implode function  
						?>

						<!-- <div class="after-upgrade" id="close_sub">
							<i class="fas fa-check-circle"></i> 
							<h2>Selected</h2>
							<script>
								document.write('Remove'.link(undo_link));
							</script>
						</div> -->
						<script>
							// if(removed_id === null){
							// 	document.getElementById("close_sub").style.display = "none";
							// 	var element = document.getElementById("close_sub");
							// 	element.classList.add("mystyle");
							// }
						</script>
					<?php
					} else {

					?>
						<div class="upgrade-box" style="">
							<div class="upgrade-content-box">
								<h3>Unlimited Certificate & Transcript ( Special Gift)</h3>
								<button><a href="https://www.janets.org.uk/checkout/?add-to-cart=417282">Add to cart</a></button>
							</div>
						</div>

						<script>
							// const removed_id = localStorage.getItem('removed_id');
							// console.log('Storage data: '+ removed_id);
							// let undo_link = 'https://www.janets.org.uk/checkout/?add-to-cart='+removed_id;
							// console.log(undo_link);
						</script>
						<?php
						//$prev_products =  implode(",",$sa_values_offer);// Use of implode function  
						?>

						<!-- <div class="after-upgrade" id="close_sub">
							<i class="fas fa-check-circle"></i> 
							<h2>Selected</h2>
							<script>
								//document.write('Remove'.link(undo_link));
							</script>
						</div> -->
						<script>
							// if(removed_id === null){
							// 	document.getElementById("close_sub").style.display = "none";
							// 	var element = document.getElementById("close_sub");
							// 	element.classList.add("mystyle");
							// }
						</script>
					<?php
					}
					?>
				</div>

			</div>
		</div> <?php } ?>
	</div>
</div>