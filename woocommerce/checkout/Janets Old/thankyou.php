<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */
defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-order">

	<?php
	if ( $order ) :

		echo do_shortcode('[elementor-template id="343581"]');
		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<?php wc_get_template( 'checkout/order-received.php', array( 'order' => $order ) ); ?>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

			<?php
				//Sakib 


				$product_data_array = array();

				$product_data = '';

				// Get items in the order
				$items = $order->get_items();

				// Loop through each item
				foreach ( $items as $item ) {
					// Get the product ID
					$product_id = $item->get_product_id();

					// Get the product type
					$product_type = $item->get_product()->get_type();

					// Get the sale price
					$sale_price = $item->get_subtotal();

					// Add the data to the array
					$product_data_array[] = array(
						//'product_id' => $product_id,
						'product_type' => $product_type,
						'sale_price' => $sale_price
					);
					$product_data .= $product_type.','.$sale_price.','; 
				}

				// Output the array
				$product_data  = rtrim($product_data, ',');




				$cart_value_without_tax = number_format( (float) $order->get_total() - $order->get_total_tax() - $order->get_total_shipping() - $order->get_shipping_tax(), wc_get_price_decimals(), '.', '' );

				$order_total = $order->get_total();
				$currency = get_woocommerce_currency();
				$order_total = $order->get_total();
				$currency = get_woocommerce_currency();
				$order_id = $order->get_id();
				$user_id = get_post_meta( $order_id, '_customer_user', true );
				$customer = new WC_Customer( $user_id );
				$first_name   = $customer->get_first_name();
				$last_name    = $customer->get_last_name();
				$user_email   = $customer->get_email(); 
				$phone = $order->billing_phone;

				//$user_phone   = $customer->get_phone(); 


				$product_data = $product_data;


				//$first_name   = $order->get_first_name();

				echo"<script language='javascript'>
					var cart_value_without_tax = ".$cart_value_without_tax.";
					var price_totoal = ".$order_total.";
					var currency = '".$currency."';
					var order_id = '".$order_id."';
					var user_email = '".$user_email."';
					var phone = '".$phone."';
					var first_name = '".$first_name."';
					var last_name = '".$last_name."';

					var product_data = '".$product_data."';
					
				</script>";
				?>
				<!-- Facebook Pixel Code -->
				<script>
					
					function waitForFbq(callback){
						if(typeof fbq !== 'undefined'){
							callback()
						} else {
							setTimeout(function () {
								waitForFbq(callback)
							}, 200)
						}
					};

					waitForFbq(function() {
						fbq('track', 'Purchase', {value: price_totoal, currency: currency});
					}); 
					
				</script>


				<!-- Global site tag (gtag.js) - Google Ads: 671861325 -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=AW-671861325"></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', 'AW-671861325');
				</script>
				
				<!-- Event snippet for Sale conversion page -->
				<script>
				gtag('event', 'conversion', {
					'send_to': 'AW-671861325/q8hZCOHp0r8BEM2Ur8AC',
					'value': price_totoal,
					'currency': currency,
					'transaction_id': order_id
				});
				</script>
				<script>
				var enhanced_conversion_data = {
					"email": user_email, 
					"phone_number": phone,
					"first_name": first_name,
					"last_name": last_name
				};
				</script>



				<!-- Date 10-11-23 -->
				<!-- <script language="javascript" src="https://scripts.affiliatefuture.com/AFFunctions.js"></script>
				<script language="javascript"> 
					var merchantID = 7483; 
					var orderValue = cart_value_without_tax; 
					var orderRef = order_id; 
					var payoutCodes = product_data; 
					var offlineCode = ''; 
					var voucher = ''; 
					var products = ''; 
					var curr = currency; 
					AFProcessSaleV5(merchantID,orderValue,orderRef,payoutCodes,offlineCode,voucher,products,curr); 
				</script> -->



		
				<script>window.uetq = window.uetq || [];window.uetq.push('event', '', {'revenue_value': price_totoal, 'currency': currency});</script>


		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>
		<h1>Test 2</h1>

		<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>

	<?php endif; ?>

</div>