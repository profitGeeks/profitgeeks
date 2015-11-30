<?php
/**
 * main template file.
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content left-content clr" role="main">
			<?php if ( have_posts() ) { ?>
				<div id="blog-wrap" class="clr">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
				</div><!-- #post -->
				<?php pg_pagination(); ?>
			<?php } else { ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php } ?>
			</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>