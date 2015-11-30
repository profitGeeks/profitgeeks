<?php
/**
 * Template Name: Default No Header
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content left-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="page-thumbnail">
						<img src="<?php echo pg_get_featured_img_url(); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" />
					</div><!-- .page-thumbnail -->
				<?php } ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry clr">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit Page', 'pg' ), '<span class="edit-link clr">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post -->
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>