<?php
/**
 * Registers the Features Custom Post Type
 */

if ( ! class_exists( 'WPEX_Features_Post_Type' ) ) {
	class WPEX_Features_Post_Type {

		function __construct() {

			// Adds the features post type and taxonomies
			add_action( 'init', array( &$this, 'features_init' ), 0 );

			// Thumbnail support for features posts
			add_theme_support( 'post-thumbnails', array( 'features' ) );

			// Adds columns in the admin view for thumbnail and taxonomies
			add_filter( 'manage_edit-features_columns', array( &$this, 'features_edit_columns' ) );
			add_action( 'manage_posts_custom_column', array( &$this, 'features_column_display' ), 10, 2 );
			
		}
		

		function features_init() {

			/**
			 * Enable the Features custom post type
			 * http://codex.wordpress.org/Function_Reference/register_post_type
			 */
			
			$labels = array(
				'name'					=> __( 'Features', 'pg' ),
				'menu_name'				=> __( 'Home Features', 'pg' ),
				'singular_name'			=> __( 'Features Item', 'pg' ),
				'add_new'				=> __( 'Add New Item', 'pg' ),
				'add_new_item'			=> __( 'Add New Features Item', 'pg' ),
				'edit_item'				=> __( 'Edit Features Item', 'pg' ),
				'new_item'				=> __( 'Add New Features Item', 'pg' ),
				'view_item'				=> __( 'View Item', 'pg' ),
				'search_items'			=> __( 'Search Features', 'pg' ),
				'not_found'				=> __( 'No features items found', 'pg' ),
				'not_found_in_trash'	=> __( 'No features items found in trash', 'pg' )
			);
			
			$args = array(
				'labels'				=> $labels,
				'public'				=> true,
				'supports'				=> array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
				'capability_type'		=> 'post',
				'rewrite'				=> array("slug" => "features"), // Permalinks format
				'has_archive'			=> false,
				'menu_icon'				=> 'dashicons-star-filled',
				'exclude_from_search'	=> true,
			); 
			
			$args = apply_filters('pg_features_args', $args);
			
			register_post_type( 'features', $args );
		}

		/**
		 * Add Columns to Features Edit Screen
		 * http://wptheming.com/2010/07/column-edit-pages/
		 */

		function features_edit_columns( $features_columns ) {
			$features_columns = array(
				"cb"					=> "<input type=\"checkbox\" />",
				"title"					=> __('Title', 'column name'),
				"features_thumbnail"	=> __('Thumbnail', 'pg')
			);
			return $features_columns;
		}

		function features_column_display( $features_columns, $post_id ) {

			// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview

			switch ( $features_columns ) {

				// Display the thumbnail in the column view
				case "features_thumbnail":
					$width = (int) 80;
					$height = (int) 80;
					$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

					// Display the featured image in the column view if possible
					if ( $thumbnail_id ) {
						$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
					}
					if ( isset( $thumb ) ) {
						echo $thumb;
					} else {
						echo __('None', 'pg');
					}
					break;
				
			}
		}

	}
}
new WPEX_Features_Post_Type;