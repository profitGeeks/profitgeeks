<?php
/**
 * Define sidebars for use in this theme
 *
 * 
 * 
 * .0
 */

// Sidebar
register_sidebar( array(
	'name'			=> __( 'Sidebar', 'pg' ),
	'id'			=> 'sidebar',
	'description'	=> __( 'Widgets in this area are used in the sidebar region.', 'pg' ),
	'before_widget'	=> '<div class="sidebar-widget %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h5 class="widget-title">',
	'after_title'	=> '</h5>',
) );

// Footer 1
register_sidebar( array(
	'name'			=> __( 'Footer 1', 'pg' ),
	'id'			=> 'footer-one',
	'description'	=> __( 'Widgets in this area are used in the first footer region.', 'pg' ),
	'before_widget'	=> '<div class="footer-widget %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h6 class="widget-title">',
	'after_title'	=> '</h6>',
) );

// Footer 2
register_sidebar( array(
	'name'			=> __( 'Footer 2', 'pg' ),
	'id'			=> 'footer-two',
	'description'	=> __( 'Widgets in this area are used in the second footer region.', 'pg' ),
	'before_widget'	=> '<div class="footer-widget %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h6 class="widget-title">',
	'after_title'	=> '</h6>',
) );

// Footer 3
register_sidebar( array(
	'name'			=> __( 'Footer 3', 'pg' ),
	'id'			=> 'footer-three',
	'description'	=> __( 'Widgets in this area are used in the third footer region.', 'pg' ),
	'before_widget'	=> '<div class="footer-widget %2$s clr">',
	'after_widget'	=> '</div>',
	'before_title'	=> '<h6 class="widget-title">',
	'after_title'	=> '</h6>',
) );