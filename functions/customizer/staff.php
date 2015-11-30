<?php
/**
 * Staff theme options
 * 
 * 
 * 
 */



add_action( 'customize_register', 'pg_customizer_staff' );

function pg_customizer_staff($wp_customize) {

	// Staff Section
	$wp_customize->add_section( 'pg_staff' , array(
		'title'		=> __( 'Staff', 'pg' ),
		'priority'	=> 202,
	) );
	
	// Enable/Disable Staff
	$wp_customize->add_setting( 'pg_staff', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'pg_staff', array(
		'label'		=> __('Staff Post Type','pg'),
		'section'	=> 'pg_staff',
		'settings'	=> 'pg_staff',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Staff Comments
	$wp_customize->add_setting( 'pg_staff_comments', array(
		'type'		=> 'theme_mod',
		'default'	=> ''
	) );

	$wp_customize->add_control( 'pg_staff_comments', array(
		'label'		=> __('Staff Comments','pg'),
		'section'	=> 'pg_staff',
		'settings'	=> 'pg_staff_comments',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Posts Per Page - Archive
	$wp_customize->add_setting( 'pg_staff_posts_per_page', array(
		'type'		=> 'theme_mod',
		'default'	=> '9',
	) );
	
	$wp_customize->add_control( 'pg_staff_posts_per_page', array(
		'label'		=> __('Archive Posts Per Page','pg'),
		'section'	=> 'pg_staff',
		'settings'	=> 'pg_staff_posts_per_page',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

}