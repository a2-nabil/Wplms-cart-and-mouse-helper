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



				<? php // do_action( 'woocommerce_checkout_before_order_review' ); 
				?>

				<!-- <div id="order_review" class="woocommerce-checkout-review-order">


		</div> -->

				<?php do_action('woocommerce_checkout_after_order_review'); ?>

			</form>
		</div>
		<div class="col-md-4">
			<div class="chk_cart_items_desktop">
				<h3 id="order_review_heading"><?php esc_html_e('Order Summary', 'woocommerce'); ?></h3>
				<?php do_action('woocommerce_checkout_order_review'); ?>
			</div>
			<hr>
			<?php dynamic_sidebar('checkout'); ?>

			<?php echo do_shortcode("[elementor-template id='176315']"); ?>

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
							<strong>for only £36<sup></sup></strong>
						</h3>
						<p>Get a full year of access to all of our courses for £36 .</br>
							Why take one course when you can take them all?</br>
							This pricing includes the course(s) you had in your basket.</br>
						</p>
						<button><a href="<?php echo get_bloginfo('url'); ?>/checkout/?add-to-cart=393651">ADD OFFER TO CART</a></button>
						<p>No more than 50 active courses at any one time. Membership renews after 12 months. Cancel anytime from your account. Certain courses are not included. Can't be used in conjunction with any other offer.</p>
					</div>
					<div class="upgrade-image">
						<img src="https://www.janets.org.uk/wp-content/uploads/2021/10/Janets-All-Course-Access-11.10.2021.png" alt="">
					</div>
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

</div>
<?php do_action('woocommerce_after_checkout_form', $checkout); ?>