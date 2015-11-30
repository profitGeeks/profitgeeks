<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @license	http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'pg_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function pg_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'pg_';

	// Slides
	$meta_boxes[] = array(
		'id'			=> 'pg-slides-meta',
		'title'			=> __( 'Slide Settings', 'pg' ),
		'pages'			=> array( 'slides' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> __( 'URL', 'pg' ),
				'desc'	=>  __( 'Enter a custom URL to link this slide to. Don\'t forget the http// at the front!', 'pg' ),
				'id'	=> $prefix . 'slide_url',
				'type'	=> 'text',
				'std'	=> ''
			),
		),
	);

	// Features
	$meta_boxes[] = array(
		'id'			=> 'pg-features-meta',
		'title'			=> __( 'Feature Settings', 'pg' ),
		'pages'			=> array( 'features' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> __( 'URL', 'pg' ),
				'desc'	=>  __( 'Enter a custom URL to link this feature to. Don\'t forget the http// at the front! This link will be added to the featured image and title.', 'pg' ),
				'id'	=> $prefix . 'feature_url',
				'type'	=> 'text',
				'std'	=> ''
			),
			array(
				'name'	=> __( 'Icon Font Class', 'pg' ),
				'desc'	=>  __( 'Enter the icon font classname (without the fa- part) to display an icon instead of a featured image.', 'pg' ) .' <a href="http://fontawesome.io/icons/" target="_blank">'. __( 'Learn More.', 'pg' ) .'&rarr;</a>',
				'id'	=> $prefix . 'icon_font',
				'type'	=> 'text',
				'std'	=> ''
			),
		),
	);


	// Posts
	$meta_boxes[] = array(
		'id'			=> 'pg-post-meta',
		'title'			=> __( 'Post Settings', 'pg' ),
		'pages'			=> array( 'post' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> __( 'Video URL', 'pg' ),
				'desc'	=> __( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'pg' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __( 'Learn More', 'pg' ),
				'id' 	=> $prefix . 'post_video',
				'type'	=> 'text',
				'std'	=> '',
			),
		),
	);


	// Portfolio
	$meta_boxes[] = array(
		'id'			=> 'pg-portfolio-meta',
		'title'			=> __( 'Post Settings', 'pg' ),
		'pages'			=> array( 'portfolio' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> __( 'Video URL', 'pg' ),
				'desc'	=>  __( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'pg' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __( 'Learn More', 'pg' ),
				'id'	=> $prefix . 'post_video',
				'type'	=> 'text',
				'std'	=> ''
			),
		),
	);


	return $meta_boxes;
}

add_action( 'init', 'cmb_initializepgmeta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initializepgmeta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once( get_template_directory() .'/functions/meta/init.php' );

}