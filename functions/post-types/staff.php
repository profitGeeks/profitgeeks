<?php
/**
 * Registers the Staff Custom Post Type
 */

if ( ! class_exists( 'WPEX_Staff_Post_Type' ) ) {
	class WPEX_Staff_Post_Type {

		function __construct() {

			// Adds the staff post type and taxonomies
			add_action( 'init', array( &$this, 'staff_init' ), 0 );

			// Thumbnail support for staff posts
			add_theme_support( 'post-thumbnails', array( 'staff' ) );

			// Adds columns in the admin view for thumbnail and taxonomies
			add_filter( 'manage_edit-staff_columns', array( &$this, 'staff_edit_columns' ) );
			add_action( 'manage_posts_custom_column', array( &$this, 'staff_column_display' ), 10, 2 );

			// Allows filtering of posts by taxonomy in the admin view
			add_action( 'restrict_manage_posts', array( &$this, 'staff_add_taxonomy_filters' ) );

		}
		
		function staff_init() {

			/**
			 * Enable the Staff custom post type
			 * http://codex.wordpress.org/Function_Reference/register_post_type
			 */

			$labels = array(
				'name'					=> __( 'Staff', 'pg' ),
				'singular_name'			=> __( 'Staff Item', 'pg' ),
				'add_new'				=> __( 'Add New Item', 'pg' ),
				'add_new_item'			=> __( 'Add New Staff Item', 'pg' ),
				'edit_item'				=> __( 'Edit Staff Item', 'pg' ),
				'new_item'				=> __( 'Add New Staff Item', 'pg' ),
				'view_item'				=> __( 'View Item', 'pg' ),
				'search_items'			=> __( 'Search Staff', 'pg' ),
				'not_found'				=> __( 'No staff items found', 'pg' ),
				'not_found_in_trash'	=> __( 'No staff items found in trash', 'pg' )
			);
			
			$args = array(
				'labels'			=> $labels,
				'public'			=> true,
				'supports'			=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions' ),
				'capability_type'	=> 'post',
				'rewrite'			=> array("slug" => "staff-member"), // Permalinks format
				'has_archive'		=> false,
				'menu_icon'			=> 'dashicons-groups',
			); 
			
			$args = apply_filters( 'pg_staff_args', $args);
			
			register_post_type( 'staff', $args );


			/**
			 * Register a taxonomy for Staff Categories
			 * http://codex.wordpress.org/Function_Reference/register_taxonomy
			 */

			$taxonomy_staff_category_labels = array(
				'name'							=> __( 'Staff Categories', 'pg' ),
				'singular_name'					=> __( 'Staff Category', 'pg' ),
				'search_items'					=> __( 'Search Staff Categories', 'pg' ),
				'popular_items'					=> __( 'Popular Staff Categories', 'pg' ),
				'all_items'						=> __( 'All Staff Categories', 'pg' ),
				'parent_item'					=> __( 'Parent Staff Category', 'pg' ),
				'parent_item_colon'				=> __( 'Parent Staff Category:', 'pg' ),
				'edit_item'						=> __( 'Edit Staff Category', 'pg' ),
				'update_item'					=> __( 'Update Staff Category', 'pg' ),
				'add_new_item'					=> __( 'Add New Staff Category', 'pg' ),
				'new_item_name'					=> __( 'New Staff Category Name', 'pg' ),
				'separate_items_with_commas'	=> __( 'Separate staff categories with commas', 'pg' ),
				'add_or_remove_items'			=> __( 'Add or remove staff categories', 'pg' ),
				'choose_from_most_used'			=> __( 'Choose from the most used staff categories', 'pg' ),
				'menu_name'						=> __( 'Staff Categories', 'pg' ),
		);

			$taxonomy_staff_category_args = array(
				'labels'			=> $taxonomy_staff_category_labels,
				'public'			=> true,
				'show_in_nav_menus'	=> true,
				'show_ui'			=> true,
				'show_tagcloud'		=> true,
				'hierarchical'		=> true,
				'rewrite'			=> array( 'slug' => 'staff-category' ),
				'query_var'			=> true
			);

			$taxonomy_staff_category_args = apply_filters( 'pg_taxonomy_staff_category_args', $taxonomy_staff_category_args);
			
			register_taxonomy( 'staff_category', array( 'staff' ), $taxonomy_staff_category_args );

		}

		/**
		 * Add Columns to Staff Edit Screen
		 * http://wptheming.com/2010/07/column-edit-pages/
		 */

		function staff_edit_columns( $columns ) {
			$columns['staff_thumbnail']	= __( 'Thumbnail', 'pg' );
			$columns['staff_category']	= __( 'Category', 'pg' );
			return $columns;
		}

		function staff_column_display( $staff_columns, $post_id ) {

			// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview

			switch ( $staff_columns ) {

				// Display the thumbnail in the column view
				case "staff_thumbnail":
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
						echo __( 'None', 'pg' );
					}
					break;	

				// Display the staff tags in the column view
				case "staff_category":

				if ( $category_list = get_the_term_list( $post_id, 'staff_category', '', ', ', '' ) ) {
					echo $category_list;
				} else {
					echo __( 'None', 'pg' );
				}
				break;	
		
			}
		}

		/**
		 * Adds taxonomy filters to the staff admin page
		 * Code artfully lifed from http://pippinsplugins.com
		 */

		function staff_add_taxonomy_filters() {
			global $typenow;

			// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
			$taxonomies = array( 'staff_category' );

			// must set this to the post type you want the filter(s) displayed on
			if ( $typenow == 'staff' ) {

				foreach ( $taxonomies as $tax_slug ) {
					$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
					$tax_obj = get_taxonomy( $tax_slug );
					$tax_name = $tax_obj->labels->name;
					$terms = get_terms($tax_slug);
					if ( count( $terms ) > 0) {
						echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
						echo "<option value=''>$tax_name</option>";
						foreach ( $terms as $term ) {
							echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' ( ' . $term->count .')</option>';
						}
						echo "</select>";
					}
				}
			}
		}

	}
}
new WPEX_Staff_Post_Type;