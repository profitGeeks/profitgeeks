<?php
/**
 * Theme Header 
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="alternate" type="application/atom+xml" title="RSS Feed for Feedly" href="<?php echo site_url('/feed/')?>">
 	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('pg_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('pg_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php pg_icons();  ?>
	<?php wp_head(); ?>
</head>
<?php flush(); ?>
<body <?php body_class(); ?>>

	<div id="wrap" class="wrap clr container">
		
		<?php if ( get_theme_mod( 'pg_nav_below', '1' ) ) { } else { pg_nav(); 	}?>
		
		<?php pg_head(); ?>

		<?php if ( get_theme_mod( 'pg_nav_below', '1' ) ) { pg_nav(); } ?>
		
		<div id="main" class="site-main clr">