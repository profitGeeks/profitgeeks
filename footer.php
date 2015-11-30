<?php
/**
 * the footer.
 *
 */
?>
<?php if ( get_theme_mod( 'pg_footer_show', '1' ) ) { ?>
    
    <?php if (get_theme_mod( 'pg_site_wide') === true) { ?>
    </div></div>
    <div id="site-footer1-wide">
    <div class="wrap clr container">
    <?php } ?>
    

	<div id="footer-wrap" class="site-footer clr">
		<div id="footer" class="clr">
			<div id="footer-widgets" class="clr">
				<div class="footer-box span_1_of_3 col col-1">
					<?php dynamic_sidebar( 'footer-one' ); ?>
				</div><!-- .footer-box -->
				<div class="footer-box span_1_of_3 col col-2">
					<?php dynamic_sidebar( 'footer-two' ); ?>
				</div><!-- .footer-box -->
				<div class="footer-box span_1_of_3 col col-3">
					<?php dynamic_sidebar( 'footer-three' ); ?>
				</div><!-- .footer-box -->
			</div><!-- #footer-widgets -->
		</div><!-- #footer -->
	</div><!-- #footer-wrap -->
	
<?php }  ?>
	
	<?php if (get_theme_mod( 'pg_site_wide') === true ) {	?>
	</div> <!-- container -->
    </div><!-- site-footer1-wide -->
	<?php 	
		
	}  else { ?>
    <?php } ?>
	
	<?php if (get_theme_mod( 'pg_site_wide') === true) { ?>
    <div id="site-footer2-wide">
    <div class="wrap clr container">
    <?php } ?>
	
	<footer id="copyright-wrap" class="clear">
		<div id="copyright" role="contentinfo" class="clr">
			<?php
			// Displays copyright info
			// See functions/copyright.php
			pg_copyright(); ?>
		</div><!-- #copyright -->
	</footer><!-- #footer-wrap -->
	
	<?php if (get_theme_mod( 'pg_site_wide') === true) { 
		?>
		</div> <!-- container -->
		</div><!-- site-footer2-wide -->
		<?php 
		
	} else {  ?>
	</div>	
    </div><!-- #wrap -->
	<?php } ?>
<?php wp_footer(); ?>
<div><?php // echo get_theme_mod( 'pg_site_wide', '0' ); ?></div>
</body>
</html>