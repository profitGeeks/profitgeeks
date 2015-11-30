<?php
/**
 * Main theme support functions
 * 
 * 
 * @since ProfitGeeks 1.0
 */

add_action( 'after_setup_theme', 'pg_theme_setup' );

if ( !function_exists('pg_theme_setup') ) {

	function pg_theme_setup() {
	
		// Register navigation menus
		register_nav_menus (
			array(
				'main_menu'	=> __( 'Main', 'pg' ),
			)
		);
		
		// Localization support
		load_theme_textdomain( 'pg', get_template_directory() .'/languages' );
		
		// Enable some useful post formats for the blog
		add_theme_support( 'post-formats', array( 'video' ) );
			
		// Add theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header');
		set_post_thumbnail_size( 150, 150 );
		
	
	} // end pg_theme_setup

} // end function_exists


// Alter post formats based on custom post types
add_action( 'load-post.php','pg_adjust_post_formats' );
add_action( 'load-post-new.php','pg_adjust_post_formats' );
if ( !function_exists( 'pg_adjust_post_formats' ) ) {
	function pg_adjust_post_formats() {
		if (isset($_GET['post'])) {
			$post = get_post($_GET['post']);
			if ($post) {
				$post_type = $post->post_type;
			}
		}
		elseif ( !isset($_GET['post_type']) ) {
			$post_type = 'post';
		}
		elseif ( in_array( $_GET['post_type'], get_post_types( array('show_ui' => true ) ) ) ) {
			$post_type = $_GET['post_type'];
		}
		else {
			return; // Page is going to fail anyway
		}
		if ( 'portfolio' == $post_type ) {
			add_theme_support( 'post-formats', array( 'video', 'gallery' ) );
		}
		elseif ( 'post' == $post_type ) {
			add_theme_support( 'post-formats', array( 'video' ) );
		}
	}
}


// Flush rewrite rules for custom post types on theme activation
add_action( 'after_switch_theme', 'pg_flush_rewrite_rules' );
function pg_flush_rewrite_rules() {
	flush_rewrite_rules();
}


/// add editor styles


function pg_theme_add_editor_styles() {
	add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'pg_theme_add_editor_styles' );


/// security functions

function remove_header_info() {
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head',10,0); // for WordPress >= 3.0
}

add_action('init', 'remove_header_info');

add_filter('login_errors',create_function('$a', "return 'Sorry your login info is incorrrect';"));

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*Disable ping back scanner and complete xmlrpc class. */
add_filter( 'wp_xmlrpc_server_class', '__return_false' );
add_filter('xmlrpc_enabled', '__return_false');

/// coments off by default for pages

function default_comments_off( $data ) {
	if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
		$data['comment_status'] = 0;
	}

	return $data;
}
add_filter( 'wp_insert_post_data', 'default_comments_off' );


function disable_wp_emojicons() {

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );



?>