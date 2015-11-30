<?php
/**
 *  portfolio posts
 *
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">
			<article>
				<?php get_template_part( 'content-portfolio', get_post_format() ); ?>
				<header class="page-header clr">
						<h1 class="page-header-title"><?php the_title(); ?></h1>
					<?php
					// Display post meta
					// See functions/commons.php
					pg_post_meta(); ?>
				</header><!-- .page-header -->
				<div class="entry clr">
					<?php the_content(); ?>
				</div><!-- .entry -->
				<footer class="entry-footer">
					<?php edit_post_link( __( 'Edit Post', 'pg' ), '<span class="edit-link clr">', '</span>' ); ?>
				</footer><!-- .entry-footer -->
			</article>
			<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			<?php
			/**
				Related Posts
			**/
			if ( get_theme_mod( 'pg_portfolio_related', '1' ) == '1' ) {
				$pg_portfolio_more_count = get_theme_mod( 'portfolio_more_count', '4' );
				$pg_query = new WP_Query(
					array(
						'post_type'			=> 'portfolio',
						'posts_per_page'	=> $pg_portfolio_more_count,
						'orderby'			=> 'rand',
						'no_found_rows'		=> true,
					)
				);
				if ( $pg_query->posts ) { ?>
					<div class="clear"></div>
					<div id="single-portfolio-related" class="clr">
						<h3 class="heading"><span><?php _e( 'Recent Work', 'pg' ); ?></span></h3>
						<?php $pg_count=0; ?>
						<?php foreach( $pg_query->posts as $post ) : setup_postdata($post); ?>
							<?php $pg_count++; ?>
							<?php get_template_part( 'content', 'portfolio' ); ?>
							<?php if ( $pg_count == '4' ) { ?>
								<?php $pg_count = 0; ?>
							<?php } ?>
						<?php endforeach; ?>
					</div><!-- /single-portfolio-related -->
				<?php } ?>
				<?php wp_reset_postdata(); ?>
			<?php  } ?>
			<?php
			// Comments
			if ( get_theme_mod( 'pg_portfolio_comments') ) {
				comments_template();
			} ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php endwhile; ?>
<?php get_footer(); ?>