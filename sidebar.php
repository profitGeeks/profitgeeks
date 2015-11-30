<?php
/**
 * main widget area.
 *
 */

if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<aside id="secondary" class="sidebar-container" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
		</div>
	</aside><!-- #secondary -->
<?php endif; ?>