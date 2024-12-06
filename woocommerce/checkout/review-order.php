<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
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
	<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>"  method="post">

		<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents " cellspacing="0">
			<!-- <thead>
									<tr>
										<th class="product-remove">&nbsp;</th>
										<th class="product-thumbnail">&nbsp;</th>
										<th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
										<th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
										<th class="product-quantity"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
										<th class="product-subtotal"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
									</tr>
								</thead> -->
			<tbody>
				<?php do_action('woocommerce_before_cart_contents'); ?>

				<?php
				foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
					$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
					$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

					if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
						$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
						?>
						<tr
							class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

							<td class="product-remove">
								<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url(wc_get_cart_remove_url($cart_item_key)),
										/* translators: %s is the product name */
										esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
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
									?> 				<?php
													 $product_quantity = woocommerce_quantity_input(
													 	array(
													 		'input_name' => "cart[{$cart_item_key}][qty]",
													 		'input_value' => $cart_item['quantity'],
													 		'max_value' => $_product->get_max_purchase_quantity(),
													 		'min_value' => '0',
													 		'product_name' => $_product->get_name(),
													 	),
													 	$_product,
													 	false
													 );
													 ?> 				<?php

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
					<td>
						<?php if (wc_coupons_enabled()) { ?>
							<label class="coupon_label"
								for="coupon_code"><?php esc_html_e('If you have a coupon code, please apply it below.', 'woocommerce'); ?></label>
							<div class="coupon checkout_coupon">
								<input type="text" name="coupon_code" class="input-text"
									placeholder="<?php esc_attr_e('Coupon Code', 'woocommerce'); ?>" id="coupon_code"
									value="" />
								<button type="submit"
									class="button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
									name="apply_coupon"
									value="<?php esc_attr_e('Apply Code', 'woocommerce'); ?>"><?php esc_html_e('Apply Code', 'woocommerce'); ?></button>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td>
						<div
							class="cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

							<?php do_action('woocommerce_before_cart_totals'); ?>

							<table cellspacing="0" class="shop_table shop_table_responsive">

								<tr class="cart-subtotal">
									<th><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
									<td data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
										<?php wc_cart_totals_subtotal_html(); ?>
									</td>
								</tr>

								<?php foreach (WC()->cart->get_coupons() as $code => $coupon): ?>
									<tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
										<th><?php wc_cart_totals_coupon_label($coupon); ?></th>
										<td><?php wc_cart_totals_coupon_html($coupon); ?></td>
									</tr>
								<?php endforeach; ?>

								<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>

									<?php do_action('woocommerce_cart_totals_before_shipping'); ?>

									<?php wc_cart_totals_shipping_html(); ?>

									<?php do_action('woocommerce_cart_totals_after_shipping'); ?>

								<?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')): ?>

									<tr class="shipping">
										<th><?php esc_html_e('Shipping', 'woocommerce'); ?></th>
										<td data-title="<?php esc_attr_e('Shipping', 'woocommerce'); ?>">
											<?php woocommerce_shipping_calculator(); ?>
										</td>
									</tr>

								<?php endif; ?>

								<?php foreach (WC()->cart->get_fees() as $fee): ?>
									<tr class="fee">
										<th><?php echo esc_html($fee->name); ?></th>
										<td data-title="<?php echo esc_attr($fee->name); ?>">
											<?php wc_cart_totals_fee_html($fee); ?>
										</td>
									</tr>
								<?php endforeach; ?>

								<?php
								if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) {
									$taxable_address = WC()->customer->get_taxable_address();
									$estimated_text = '';

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
												<td data-title="<?php echo esc_attr($tax->label); ?>">
													<?php echo wp_kses_post($tax->formatted_amount); ?>
												</td>
											</tr>
											<?php
										}
									} else {
										?>
										<tr class="tax-total">
											<th><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
														?></th>
											<td data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>">
												<?php wc_cart_totals_taxes_total_html(); ?>
											</td>
										</tr>
										<?php
									}
								}
								?>

								<?php do_action('woocommerce_cart_totals_before_order_total'); ?>

								<tr class="order-total">
									<th><strong><?php esc_html_e('Total', 'woocommerce'); ?></strong></th>
									<td data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>">
										<?php wc_cart_totals_order_total_html(); ?>
									</td>
								</tr>

								<?php do_action('woocommerce_cart_totals_after_order_total'); ?>

							</table>


							<?php do_action('woocommerce_after_cart_totals'); ?>

						</div>
					</td>
				</tr>
				<tr>
					<td colspan="6" class="actions">
						<button type="submit" class="button" name="update_cart"
							value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

						<?php do_action('woocommerce_cart_actions'); ?>

						<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
					</td>
				</tr>

				<?php do_action('woocommerce_after_cart_contents');
				?>
			</tbody>
		</table>
	</form>
	<?php
} else {
	?>
	<table class="shop_table woocommerce-checkout-review-order-table">
		<thead>
		</thead>
		<tbody>
			<?php
			do_action('woocommerce_review_order_before_cart_contents');

			foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

				if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
					?>
					<tr
						class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
						<td class="product-thumb">
							<?php $thumb = get_the_post_thumbnail_url($_product->id, 'shop_catalog'); ?>
							<?php
							if (!empty($thumb)) {
								echo "<img src='{$thumb}' width='80px' height='100px'/>";
							}
							?>
						</td>
						<td class="product-name">
							<?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
							<?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</td>
						<td class="product-total">
							<?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</td>
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
					</tr>
					<?php
				}
			}

			do_action('woocommerce_review_order_after_cart_contents');
			?>
		</tbody>
		<tfoot style="width:100%">

			<?php foreach (WC()->cart->get_coupons() as $code => $coupon): ?>
				<tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
					<th><?php wc_cart_totals_coupon_label($coupon); ?></th>
					<th></th>
					<td><?php wc_cart_totals_coupon_html($coupon); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>

				<?php do_action('woocommerce_review_order_before_shipping'); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action('woocommerce_review_order_after_shipping'); ?>

			<?php endif; ?>

			<?php foreach (WC()->cart->get_fees() as $fee): ?>
				<tr class="fee">
					<th><?php echo esc_html($fee->name); ?></th>
					<th></th>
					<td><?php wc_cart_totals_fee_html($fee); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()): ?>
				<?php if ('itemized' === get_option('woocommerce_tax_total_display')): ?>
					<?php foreach (WC()->cart->get_tax_totals() as $code => $tax): // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
						<tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
							<th><?php echo esc_html($tax->label); ?></th>
							<th></th>
							<td><?php echo wp_kses_post($tax->formatted_amount); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr class="tax-total">
						<th><?php echo esc_html(WC()->countries->tax_or_vat()); ?></th>
						<th></th>
						<td><?php wc_cart_totals_taxes_total_html(); ?></td>
					</tr>
				<?php endif; ?>
			<?php endif; ?>

			<?php do_action('woocommerce_review_order_before_order_total'); ?>

			<tr class="order-total">
				<th><?php esc_html_e('Total', 'woocommerce'); ?></th>
				<th></th>
				<td><?php wc_cart_totals_order_total_html(); ?></td>
			</tr>

			<?php do_action('woocommerce_review_order_after_order_total'); ?>

		</tfoot>
	</table>
	<?php
}
?>