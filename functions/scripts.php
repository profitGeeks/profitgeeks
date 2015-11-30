<?php
/**
 * This file loads custom css and js for our theme
 *
 * 
 * 
 * @since		1.0.0
 */

if ( ! function_exists( 'pg_load_scripts' ) ) {
	function pg_load_scripts() {

		// CSS
		$css_dir = get_template_directory_uri() .'/css/';
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style( 'pg-responsive', $css_dir .'responsive.css' );
		wp_enqueue_style( 'pg-font-awesome', $css_dir .'font-awesome.min.css' );
		wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Arvo:400,700', 'style' );

		if ( function_exists( 'wpcf7_enqueue_styles') ) {
			wp_dequeue_style( 'contact-form-7' );
		}

		// jQuery
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script( 'pg-plugins', WPEX_JS_DIR_URI .'/plugins.js', array( 'jquery' ), '1.7.5', true );
		wp_enqueue_script( 'pg-global', WPEX_JS_DIR_URI .'/global.js', array( 'jquery', 'pg-plugins' ), '1.7.5', true );
		
	}
}
add_action( 'wp_enqueue_scripts','pg_load_scripts' );