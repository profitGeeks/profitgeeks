<?php
/**
 * Creates functions for the front end Image galleries
 *
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2014, Symple Workz LLC
 * @link		http://www.pgplorer.com
 */

/**
 * Retrieve attachment IDs
 *
 * @since	1.0.0
 * @return	bool
 */
if ( ! function_exists ( 'pg_get_gallery_ids' ) ) {
	function pg_get_gallery_ids() {
		$attachment_ids = get_post_meta( get_the_ID(), '_easy_image_gallery', true );
		$attachment_ids = explode( ',', $attachment_ids );
		return array_filter( $attachment_ids );
	}
}

/**
 * Retrieve attachment data
 *
 * @since	1.0.0
 * @return	array
 */
if ( ! function_exists ( 'pg_get_attachment' ) ) {
	function pg_get_attachment( $id ) {
		$attachment = get_post( $id );
		return array(
			'alt'			=> get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			'caption'		=> $attachment->post_excerpt,
			'description'	=> $attachment->post_content,
			'href'			=> get_permalink( $attachment->ID ),
			'src'			=> $attachment->guid,
			'title'			=> $attachment->post_title,
		);
	}
}

/**
 * Return gallery count
 *
 * @since	1.0.0
 * @return	bool
 */
if ( ! function_exists ( 'pg_gallery_count' ) ) {
	function pg_gallery_count() {
		$images = get_post_meta( get_the_ID(), '_easy_image_gallery', true );
		$images = explode( ',', $images );
		return count( $images );
	}
}

/**
 * Check if lightbox is enabled
 *
 * @since	1.0.0
 * @return	bool
 */
if ( ! function_exists ( 'pg_gallery_is_lightbox_enabled' ) ) {
	function pg_gallery_is_lightbox_enabled() {
		if ( 'on' == get_post_meta( get_the_ID(), '_easy_image_gallery_link_images', true ) ) {
			return true;
		}
	}
}