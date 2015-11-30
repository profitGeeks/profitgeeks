<?php
/**
 * Outputs the site header and nav 
 * 
 * @subpackage ProfitGeeks 1.0
 * @since Blogger 1.0
 */


if ( ! function_exists( 'pg_icons' ) ) {

	function pg_icons() { ?>
	<!-- icons & favicons -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico">
	<!-- For iPad Retina -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php  echo get_template_directory_uri(); ?>/images/icons/icon144.png">
	<!-- For iPhone 4 -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php  echo get_template_directory_uri(); ?>/images/icons/icon114.png">
	<!-- For iPad 1-->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php  echo get_template_directory_uri(); ?>/images/icons/icon72.png">
	<!-- For iPhone 3G, iPod Touch and Android -->
	<link rel="apple-touch-icon-precomposed" href="<?php  echo get_template_directory_uri(); ?>/images/icons/icon72.png">
	<!-- For Nokia -->
	<link rel="shortcut icon" href="<?php  echo get_template_directory_uri(); ?>/images/icons/icon57.png">
	<?php }
}


if ( ! function_exists( 'pg_logo' ) ) {
	
	function pg_logo() {

		// Vars
		$logo_img = get_theme_mod('pg_logo');
		$blog_name = get_bloginfo( 'name' );
		$blog_description = get_bloginfo( 'description' );
		$home_url = home_url(); ?>

		<div id="logo" class="clr">
			<?php if ( $logo_img ) { ?>
				<a href="<?php echo $home_url; ?>" title="<?php echo $blog_name; ?>" rel="home"><img src="<?php echo $logo_img; ?>" alt="<?php echo $blog_name; ?>" /></a>
			<?php } else { ?>
				<div class="site-text-logo clr">
					<a href="<?php echo $home_url; ?>" title="<?php echo $blog_name; ?>" rel="home"><?php echo $blog_name; ?></a>
					<?php if ( $blog_description ) { ?>
						<div class="blog-description"><?php echo $blog_description; ?></div>
					<?php } ?>
				</div>
			<?php } ?>
		</div><!-- #logo -->

		<?php
	} // end pg_copyright

} // end function_exists 



if ( ! function_exists( 'pg_head' ) ) {

	function pg_head() { ?>
	
	<?php if (get_theme_mod( 'pg_site_wide', '1' )) { ?>
    </div>
 <div id="site-header-wide">
    <div class="wrap clr container">
    <?php } ?>

		<div id="header-wrap" class="clr">
		<header id="header" class="site-header clr" role="banner">
		<?php
		// Outputs the site logo
		// See functions/logo.php
		pg_logo();
		if ( get_theme_mod( 'pg_header_search', '1' ) ) { ?>
			<aside id="header-search" class="clr">
				<?php get_search_form(); ?>
			</aside><!-- #header-search -->
			<?php } ?>
		</header><!-- #header -->
		</div><!-- #header-wrap -->
	<?php if (get_theme_mod( 'pg_site_wide', '1' )) { ?>
   	</div>
</div>
    <div class="wrap clr container">
    <?php } 

	} 
} // end function_exists 


if ( ! function_exists( 'pg_nav' ) ) {

	function pg_nav() {

 if ( get_theme_mod( 'pg_nav_below', '1' ) ) { $nt = ""; } else {  $nt = "nav_top"; }
    ?>
    <?php if (get_theme_mod( 'pg_site_wide', '1' )) { ?>
    </div>
    <div id="site-navigation-wide">
    <div class="wrap clr container">
    <?php } ?>
        
		<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>
			<div id="site-navigation-wrap" class="<?php echo $nt; ?>">
			<a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span><?php echo __( 'Menu', 'pg' ); ?></a>
			<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
				<?php
				// Display main menu
				wp_nav_menu( array(
					'theme_location'	=> 'main_menu',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'dropdown-menu sf-menu',
					'fallback_cb'		=> false
				) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- #site-navigation-wrap -->
		
	<?php if (get_theme_mod( 'pg_site_wide', '1' )) { ?>
   	</div>
    </div>
    <div class="wrap clr container">
    <?php } ?>
		

		<?php
	} // end pg_copyright

} // end function_exists 
