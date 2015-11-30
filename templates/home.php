<?php
/**
 * Template Name: Homepage
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="homepage-wrap clr">
					<?php
					/**
						Slider
					**/
					$pg_query = new WP_Query(
						array(
							'post_type'			=> 'slides',
							'posts_per_page'	=> '-1',
							'no_found_rows'		=> true,
						)
					);
					if ( $pg_query->posts ) { ?>
						<div id="homepage-slider-wrap" class="clr flexslider-container">
							<div id="homepage-slider" class="flexslider">
								<ul class="slides clr">
									<?php
										$i = 1;
									foreach( $pg_query->posts as $post ) : setup_postdata($post); $content = get_the_content(); ?>
										<li>
										<?php if( $post->post_content !="" ) { ?>
										<div class="slide-txt-<?php echo $i; $i++; ?>"><?php the_content();?></div>
										<?php } ?>
											<?php if ( '' != get_post_meta( get_the_ID(), 'pg_slide_url', true ) ) { ?>
												<a href="<?php echo get_post_meta( get_the_ID(), 'pg_slide_url', true ); ?>" title="<?php the_title(); ?>">
											<?php } ?>
											<img src="<?php echo pg_get_featured_img_url(); ?>" alt="<?php the_title(); ?>" />
											<?php if ( '' != get_post_meta( get_the_ID(), 'pg_slide_url', true ) ) { echo '</a>'; } ?>
										</li>
									<?php endforeach; ?>
								</ul><!-- .slides -->
							</div><!-- .flexslider -->
						</div><!-- #homepage-slider" -->
					<?php } ?>
					<?php wp_reset_postdata(); ?>
					<?php
					/**
						Post Content
					**/ ?>
					<?php if ( get_the_content() !== '' ) { ?>
						<div id="homepage-content" class="entry clr">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					<?php } ?>
					<?php
					/**
						Features
					**/
					$pg_query = new WP_Query(
						array(
							'order'				=> 'ASC',
							'orderby'			=> 'menu_order',
							'post_type'			=> 'features',
							'posts_per_page'	=> '-1',
							'no_found_rows'		=> true,
						)
					);
					if ( $pg_query->posts ) { ?>
						<div id="homepage-features" class="clr">
							<?php $pg_count=0; ?>
							<?php foreach( $pg_query->posts as $post ) : setup_postdata( $post ); ?>
								<?php $pg_count++; ?>
									<?php get_template_part( 'content-features', get_post_format() ); ?>
								<?php if ( $pg_count == '3' ) { ?>
									<?php $pg_count=0; ?>
								<?php } ?>
							<?php endforeach; ?>
						</div><!-- #homepage-features -->
					<?php } ?>
					<?php wp_reset_postdata(); ?>
					<?php
					/**
						Portfolio
					**/
					$display_count = get_theme_mod('pg_home_portfolio_count', '4');
					$pg_query = new WP_Query(
						array(
							'post_type'			=> 'portfolio',
							'posts_per_page'	=> $display_count,
							'no_found_rows'		=> true,
						)
					);
					if ( $pg_query->posts ) { ?>
						<div id="homepage-portfolio" class="clr">
							<h2 class="heading"><?php _e( 'Recent Work', 'pg' ); ?></h2>
							<?php $pg_count=0; ?>
							<?php foreach( $pg_query->posts as $post ) : setup_postdata( $post ); ?>
								<?php $pg_count++; ?>
									<?php get_template_part( 'content-portfolio', get_post_format() ); ?>
								<?php if ( $pg_count == '4' ) { ?>
									<?php $pg_count=0; ?>
								<?php } ?>
							<?php endforeach; ?>
						</div><!-- #homepage-portfolio -->
					<?php } ?>
					<?php wp_reset_postdata(); ?>
				</article><!-- #post -->
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>