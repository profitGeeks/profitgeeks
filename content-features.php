<?php
/**
 * displaying features entries
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Vars
$pg_feature_url = get_post_meta( get_the_ID(), 'pg_feature_url', true ); ?>

<article id="id-<?php the_ID(); ?>"  <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="feature-thumbnail">
			<?php if ( $pg_feature_url ) {
				echo '<a href="'. $pg_feature_url .'" title="'. get_the_title() .'" target="_blank">';
			} ?>
			<img src="<?php echo pg_get_featured_img_url(); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" />
			<?php if ( $pg_feature_url ) echo '</a>'; ?>
		</div><!-- .feature-thumbnail -->
	<?php } ?>
	<header class="feature-entry-header clr">
		<h2 class="feature-entry-title">
			<?php if ( get_post_meta( get_the_ID(), 'pg_icon_font', true ) ) { ?>
				<span class="feature-icon-font"><i class="fa fa-<?php echo get_post_meta( get_the_ID(), 'pg_icon_font', true ); ?>"></i></span>
			<?php } ?>
			<?php if ( $pg_feature_url ) {
				echo '<a href="'. $pg_feature_url .'" title="'. get_the_title() .'" target="_blank">'. get_the_title() .'</a>';
			} else {
				the_title();
			} ?>
		</h2>
	</header>
	<div class="feature-entry-content entry clr">
		<?php the_content(); ?>
	</div>
</article>