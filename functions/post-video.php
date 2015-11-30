<?php
/**
 * Outputs the post video
 * Based on the pg_post_video custom field
 *
 * 
 * 
 * 
 */


if ( ! function_exists( 'pg_post_video' ) ) {

	function pg_post_video() {

		global $post;
		$post_id = $post->ID;
		$video_url = get_post_meta( $post_id, 'pg_post_video', true );
		if ( $video_url == '' ) return;
		$embed_code = wp_oembed_get( $video_url );
		if ( $video_url !== '' && !is_wp_error($embed_code) ) {
			echo '<div class="post-video pg-video-embed clr">'. $embed_code .'</div>';
		}

	}

}