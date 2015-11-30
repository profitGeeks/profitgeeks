<?php
/**
 * This file is used for all excerpt related functions
 *
 * 
 * 
 * 
*/


/**
 * Custom excerpts based on wp_trim_words
 * Created for child-theming purposes
 * 
 * Learn more at http://codex.wordpress.org/Function_Reference/wp_trim_words
 *
 * 
*/
if ( !function_exists( 'pg_excerpt' ) ) {
	function pg_excerpt($length=30, $readmore=false ) {
		global $post;
		$id = $post->ID;
		if ( has_excerpt( $id ) ) {
			$output = $post->post_excerpt;
		} else {
			if ($pos=strpos($post->post_content, '<!--more-->')) {
				$pg_more_tag = apply_filters( 'pg_more_tag', null );
				$output = get_the_content( $pg_more_tag );
			} else {
				$output = wp_trim_words( strip_shortcodes( get_the_content( $id ) ), $length);
				if ( $readmore == true ) {
					$readmore_link = '<br><span class="pg-readmore"><a href="'. get_permalink( $id ) .'" title="'. __('continue reading', 'pg' ) .'" rel="bookmark">'. __('continue reading', 'pg' ) .' &rarr;</a></span>';
					$output .= apply_filters( 'pg_readmore_link', $readmore_link );
				}
			}
		}
		echo $output;
	}
}


/**
 * Change default excerpt read more style
 * 
*/
if ( !function_exists( 'pg_excerpt_more' ) ) :
	function pg_excerpt_more($more) {
		global $post;
		return '...';
	}
	add_filter( 'excerpt_more', 'pg_excerpt_more' );
endif;