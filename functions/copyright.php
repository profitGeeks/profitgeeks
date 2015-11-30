<?php
/**
 * Outputs the footer copyright info
 * 
 * 
 * @since 1.0
 */


if ( ! function_exists( 'pg_copyright' ) ) {

	function pg_copyright() {

		//$copy="";
		$copy = get_theme_mod('pg_copyright', 'Development by <a href="http://www.profitgeeks.org" target="_blank" title="ProfitGeeks">ProfitGeeks</a>' ); ?>

		<?php
		// Display custom copyright
		if ( $copy != "" ) {
			echo do_shortcode( $copy ); ?>
		<?php
		// Copyright fallback
		} else { ?>
			&copy; <?php _e( 'Copyright', 'pg' ); ?> <?php echo date( 'Y' ); ?> &middot; <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
		<?php } ?>

		<?php

	} // end pg_copyright

} // end function_exists 