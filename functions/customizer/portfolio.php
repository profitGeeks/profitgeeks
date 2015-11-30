<?php
/**
 * Portfolio theme options
 * 
 * 
 * 
 */



add_action( 'customize_register', 'pg_customizer_portfolio' );

function pg_customizer_portfolio($wp_customize) {

	// Portfolio Section
	$wp_customize->add_section( 'pg_portfolio' , array(
		'title'		=> __( 'Portfolio', 'pg' ),
		'priority'	=> 201,
	) );
	
	// Enable/Disable Portfolio
	$wp_customize->add_setting( 'pg_portfolio', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'pg_portfolio', array(
		'label'		=> __('Portfolio Post Type','pg'),
		'section'	=> 'pg_portfolio',
		'settings'	=> 'pg_portfolio',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Portfolio Comments
	$wp_customize->add_setting( 'pg_portfolio_comments', array(
		'type'		=> 'theme_mod',
		'default'	=> ''
	) );

	$wp_customize->add_control( 'pg_portfolio_comments', array(
		'label'		=> __('Portfolio Comments','pg'),
		'section'	=> 'pg_portfolio',
		'settings'	=> 'pg_portfolio_comments',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Portfolio Related
	$wp_customize->add_setting( 'pg_portfolio_related', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'pg_portfolio_related', array(
		'label'		=> __('Portfolio Related','pg'),
		'section'	=> 'pg_portfolio',
		'settings'	=> 'pg_portfolio_related',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Posts Per Page - Homepage
	$wp_customize->add_setting( 'pg_home_portfolio_count', array(
		'type'		=> 'theme_mod',
		'default'	=> '4',
	) );
	
	$wp_customize->add_control( 'pg_home_portfolio_count', array(
		'label'		=> __('Portfolio Homepage Posts Per Page','pg'),
		'section'	=> 'pg_portfolio',
		'settings'	=> 'pg_home_portfolio_count',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

	// Posts Per Page - Archive
	$wp_customize->add_setting( 'pg_portfolio_posts_per_page', array(
		'type'		=> 'theme_mod',
		'default'	=> '12',
	) );
	
	$wp_customize->add_control( 'pg_portfolio_posts_per_page', array(
		'label'		=> __('Archive Posts Per Page','pg'),
		'section'	=> 'pg_portfolio',
		'settings'	=> 'pg_portfolio_posts_per_page',
		'type'		=> 'text',
		'priority'	=> '2',
	) );

}