<?php
/**
 * Template Name: Portfolio
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">
			<header class="page-header clr">
				<h1 class="page-header-title"><?php the_title(); ?></h1>
			</header><!-- #page-header -->
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				if ( get_the_content() !== '' ) { ?>
				<div class="entry clr">
					<?php the_content(); ?>
				</div><!-- .entry -->
				<?php } ?>
			<?php endwhile; ?>
			<?php
			// Query portfolio posts
			global $post,$paged;
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$display_count = get_theme_mod('pg_portfolio_posts_per_page', '12' );
			$pg_query = new WP_Query(
				array(
					'post_type'			=> 'portfolio',
					'posts_per_page'	=> $display_count,
					'paged'				=> $paged
				)
			);
			// If portfolio posts are found lets loop through them
			if( $pg_query->posts ) { ?>
				<div id="portfolio-wrap" class="clr">
					<?php $pg_count=0; ?>
					<?php foreach( $pg_query->posts as $post ) : setup_postdata( $post ); ?>
						<?php $pg_count++; ?>
							<?php get_template_part( 'content-portfolio', get_post_format() ); ?>
						<?php if ( $pg_count == '4' ) { ?>
							<?php $pg_count=0; ?>
						<?php } ?>
					<?php endforeach; ?>
				</div><!-- #portfolio-wrap -->
				<?php pg_pagination(); ?>
			<?php } ?>
			<?php
			// Reset the query
			wp_reset_postdata(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>