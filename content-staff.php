<?php
/**
 * for displaying staff content.
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Single Posts
global $pg_query;
if ( is_singular( 'staff' ) && ! $pg_query ) {

	// 

// Entries
} else { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if( has_post_thumbnail() ) { ?>
			<div class="staff-entry-media clr">
				<img src="<?php echo pg_get_featured_img_url(); ?>" alt="<?php the_title(); ?>" class="staff-entry-img" />
			</div><!-- .staff-entry-media -->
		<?php } ?>
		<header class="staff-entry-header">
			<h2 class="staff-entry-title"><?php the_title(); ?></h2>
		</header><!-- .staff-entry-header -->
		<div class="staff-entry-content clr entry">
			<?php the_content(); ?>
		</div><!-- staff-entry-content -->
	</article><!-- .staff-entry -->

<?php } ?>