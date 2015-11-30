<?php
/**
 * Outputs the post slider
 *
 * 
 * 
 * 
 */

if ( ! function_exists( 'pg_post_slider' ) ) {

	function pg_post_slider() {

		// Get gallery image ids
		$imgs				= pg_get_gallery_ids();
		$lightbox_enabled	= pg_gallery_is_lightbox_enabled();

		// Post vars
		global $post;
		$post_id = $post->ID;

		// No attachments, so do nothing
		if ( ! $imgs ) {
			return;
		} ?>

			<div id="post-slider-wrap-<?php echo $post_id; ?>" class="post-slider-wrap clr flexslider-container">
				<div id="post-slider-<?php echo $post_id; ?>" class="post-slider flexslider">
					<ul class="slides clr pg-lightbox-gallery">
						<?php
						// Loop through each attachment ID
						foreach ( $imgs as $img ) :
							// Get image alt tag
							$img_url = wp_get_attachment_url( $img );
							$cropped_img_url = pg_get_featured_img_url( $img );
							$img_alt = strip_tags( get_post_meta( $img, '_wp_attachment_image_alt', true ) ); ?>
							<li>
								<?php
								// Display image with lightbox
								if ( $lightbox_enabled == 'on' ) { ?>
								<a href="<?php echo $img_url; ?>" title="<?php echo $img_alt; ?>" class="pg-lightbox-item">
									<img src="<?php echo $cropped_img_url; ?>" alt="<?php echo $img_alt; ?>" />
								</a>
								<?php } else {
									// Lightbox is disabled, only show image ?>
									<img src="<?php echo $cropped_img_url; ?>" alt="<?php echo $img_alt; ?>" />
								<?php } ?>
							</li>
						<?php endforeach; ?>
					</ul><!-- .slides -->
				</div><!-- #post-slider .flexslider -->
			</div><!-- #post-slider-wrap -->

	<?php } // End function

} // End if