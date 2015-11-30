<?php
/**
 * Function used to alter the ammount of posts per page
 *
 * 
 * 
 * 
 */


// Alter portfolio taxonomy posts per page
if ( !function_exists('pg_pre_get_posts') ) {

	function pg_pre_get_posts($query) {

		// Portfolio taxonomy
		if ( is_tax( 'portfolio_category') ) {
			$posts_per_page = get_theme_mod('pg_portfolio_posts_per_page', '12');
			$query->set( 'posts_per_page', $posts_per_page );
		}

	}

}
add_filter( 'pre_get_posts', 'pg_pre_get_posts' );