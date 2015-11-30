<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */

/*-----------------------------------------------------------------------------------*/
/*	- Define Constants & vars
/*-----------------------------------------------------------------------------------*/
define( 'WPEX_JS_DIR_URI', get_template_directory_uri().'/js' );
define( 'WPEX_CSS_DIR_URI', get_template_directory_uri().'/css' );
define( 'WPEX_Premium_Version', false );

$pg_functions_dir = get_template_directory() .'/functions/';

/*-----------------------------------------------------------------------------------*/
/*	- Theme Setup
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}

// Theme setup - menus, theme support, etc
require_once( $pg_functions_dir .'theme-setup.php' );

// Recommend plugins for use with this theme
require_once ( $pg_functions_dir .'recommend-plugins.php' );

/*-----------------------------------------------------------------------------------*/
/*	- Customizer
/*-----------------------------------------------------------------------------------*/
require_once ( $pg_functions_dir .'customizer/header.php' );
require_once ( $pg_functions_dir .'customizer/portfolio.php' );
require_once ( $pg_functions_dir .'customizer/staff.php' );
require_once ( $pg_functions_dir .'customizer/blog.php' );
require_once ( $pg_functions_dir .'customizer/copyright.php' );

/*-----------------------------------------------------------------------------------*/
/*	- Include Theme Functions
/*-----------------------------------------------------------------------------------*/

// Define widget areas
require_once( $pg_functions_dir .'widget-areas.php' );

// Register the features post type
if ( get_theme_mod( 'pg_features', '1' ) == '1' ) {
	require_once( $pg_functions_dir .'post-types/features.php' );
}

// Register the slides post type
if ( get_theme_mod( 'pg_slides', '1' ) == '1' ) {
	require_once( $pg_functions_dir .'post-types/slides.php' );
}

// Register the portfolio post type
if ( get_theme_mod( 'pg_portfolio', '1' ) == '1' ) {
	require_once( $pg_functions_dir .'post-types/portfolio.php' );
}

// Register the staff post type
if ( get_theme_mod( 'pg_staff', '1' ) == '1' ) {
	require_once( $pg_functions_dir .'post-types/staff.php' );
}

// Admin only functions
if ( is_admin() ) {

	// Load the gallery metabox only if the portfolio post type is enabled
	if ( get_theme_mod( 'pg_portfolio', '1' ) == '1' ) {
		require_once( $pg_functions_dir .'meta/gallery-metabox/admin.php' );
	}

	// Default meta options usage
	require_once( $pg_functions_dir .'meta/usage.php' );

	// Post editor tweaks
	require_once( $pg_functions_dir .'mce.php' );

// Non admin functions
} else {

		
	// Displays portfolio gallery images
	require_once( $pg_functions_dir .'meta/gallery-metabox/helpers.php' );

	// Outputs the main header functions
	require_once( $pg_functions_dir .'header.php' );

	// Loads front end css and js
	require_once( $pg_functions_dir .'scripts.php' );

	// Image resizing script
	require_once( $pg_functions_dir .'aq_resizer.php' );

	// Returns the correct image sizes for cropping
	require_once( $pg_functions_dir .'featured-image.php' );

	// Comments output
	require_once( $pg_functions_dir .'comments-callback.php' );

	// Pagination output
	require_once( $pg_functions_dir .'pagination.php' );

	// Custom excerpts
	require_once( $pg_functions_dir .'excerpts.php' );

	// Alter posts per page for various archives
	require_once( $pg_functions_dir .'posts-per-page.php' );

	// Outputs the footer copyright
	require_once( $pg_functions_dir .'copyright.php' );

	// Outputs post meta (date, cat, comment count)
	require_once( $pg_functions_dir .'post-meta.php' );

	// Outputs the post format video
	require_once( $pg_functions_dir .'post-video.php' );

	// Outputs post author bio
	require_once( $pg_functions_dir .'post-author.php' );

	// Outputs post slider
	require_once( $pg_functions_dir .'post-slider.php' );

	// Adds classes to entries
	require_once( $pg_functions_dir .'post-classes.php' );
}
//// social media icons shortcode
	require_once( $pg_functions_dir .'social-media/social-media-icons-widget.php' );
	require_once( $pg_functions_dir .'dashboard-feed.php');
	require_once( $pg_functions_dir .'welcome.php');

