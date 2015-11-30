<?php
/**
 * Returns a post featured image URl
 *
 * 
 * 
 * @since 1.0
*/


// Returns the site featured image
if ( ! function_exists( 'pg_get_featured_img_url' ) ) {
	
		function pg_get_featured_img_url( $id = '', $full_image = false ) {
			
			// Post Vars
			global $post,$pg_query;
			$post_id = $post->ID;
			$post_type = get_post_type( $post_id );
			$attachment_id = $id ? $id : get_post_thumbnail_id( $post_id );
			$attachment_url = wp_get_attachment_url( $attachment_id );
			
			// Resizing Vars
			$width = 9999;
			$height = 9999;
			$crop = false;
			
			// Return full image url if set to true
			if ( $full_image ) return $attachment_url;
			
			
			/**
				Pages
			**/
			if ( $post_type == 'page' && is_singular( 'page' ) ) {
				$width = '9999';
				$height = '9999';
			}

			/**
				Standard post
			**/
			if ( $post_type == 'post' ) {
				if ( is_singular() && !$pg_query ) {
					$width = '640';
					$height = '275';
				} else {
					$width = '640';
					$height = '275';
				}
			}

			/**
				Portfolio
			**/
			if ( $post_type == 'portfolio' ) {
				if ( is_singular() && !$pg_query ) {
					$width = '9999';
					$height = '9999';
				} else {
					$width = '400';
					$height = '340';
				}
			}

			/**
				Slides
			**/
			if ( $post_type == 'slides' ) {
				$width = '1060';
				$height = '400';
			}

			/**
				Search retuls
			**/
			if ( is_search() ) {
				$width = '150';
				$height = '150';
			}
		
			// Return Dimensions & crop
			$width = intval($width);
			$width = $width ? $width : '9999';
			$height = intval($height);
			$height = $height ? $height : '9999';
			$width = apply_filters('pg_featured_image_width', $width );
			$height = apply_filters('pg_featured_image_height', $height );
			$crop = ( $height == '9999' ) ? false : true;
			$cropped_image = aq_resize( $attachment_url, $width, $height, $crop );
			$cropped_image = apply_filters( 'pg_get_featured_img_url', $cropped_image );
			return $cropped_image;
			
			
		} // End function
	
} // End if


// add featured image to RSS

function rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '<p>' . get_the_post_thumbnail($post->ID) .
		'</p>' . get_the_content();
	}
	return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');
