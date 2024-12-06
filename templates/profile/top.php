<?php
$header_style =  vibe_get_customizer('header_style');
if($header_style == 'transparent' || $header_style == 'generic'){ 
	echo '<section id="title">';
	do_action('wplms_before_title');
	echo '</section>';
}

echo do_shortcode('[elementor-template id="522548"]');
?>
<section id="content">
	<div id="buddypress">
	    <div class="<?php echo vibe_get_container(); ?>">
			<div class="row">
				<?php echo do_shortcode('[elementor-template id="504237"]'); ?>
			</div>
	        <div class="row">
	            <div class="col-md-3 col-sm-3">
	             <?php do_action( 'bp_before_member_home_content' ); ?>
	                <div class="pagetitle">
						<div id="item-header" class="<?php 
						$image = bp_attachments_get_user_has_cover_image();echo (empty($image)?'':'cover_image')?>" role="complementary">
							<?php locate_template( array( 'members/single/member-header.php' ), true ); ?>

						</div><!-- #item-header -->
					</div>
					<div id="item-nav" class="">
						<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
							<ul>
								<?php
								/* $user_id = get_current_user_id();
								$subscriptions = wcs_get_users_subscriptions( $user_id );
								//echo get_permalink(502649);
								if( $subuscriptions ){
									
								
								}else{
									
								} */
								?>
								<li>
									<a href="<?php echo get_permalink(502649); ?>">Subscription Dashboard</a>
								</li>
								

								<?php bp_get_displayed_user_nav(); ?>

								<?php do_action( 'bp_member_options_nav' ); ?>

							</ul>
						</div>
					</div><!-- #item-nav -->
				</div>	
				<div class="col-md-9 col-sm-9">
					<div class="padder">
						