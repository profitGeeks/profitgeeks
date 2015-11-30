<?php
/**
 *  video post format content.
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Single Posts
if ( is_singular() && is_main_query() ) { ?>

	<?php
	// Display post video
	// See functions/commons.php
	pg_post_video(); ?>

<?php }

// Entries
else { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		// Display post video
		// See functions/commons.php
		pg_post_video(); ?>
		<div class="loop-entry-text clr">
			<header>
			<h2 class="loop-entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
			<?php
			// Display post meta details
			pg_post_meta() ;?>
			</header>
			<div class="loop-entry-content entry clr">
				<?php if ( get_theme_mod( 'pg_entry_content_excerpt','excerpt' ) == 'content' ) {
					the_content();
				} else {
					$pg_readmore = get_theme_mod('pg_blog_readmore','1') == '1' ? true : false;
					pg_excerpt( 93, $pg_readmore );
				} ?>
			</div><!-- .loop-entry-content -->
		</div><!-- .loop-entry-text -->
	</article><!-- .loop-entry -->

<?php } ?>