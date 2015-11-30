<?php
/**
 * Blog theme options
 * 
 * 
 * 
 */


/*
function readmore_sanitize_layout( $value ) {
	if ( ! in_array( $value, array( 'content-sidebar', 'sidebar-content' ) ) )
		$value = '1';

	return $value;
}

*/


add_action( 'customize_register', 'pg_customizer_blog' );

function pg_customizer_blog($wp_customize) {
	
	// Blog Section
	$wp_customize->add_section( 'pg_blog' , array(
		'title'		=> __( 'Blog', 'pg' ),
		'priority'	=> 203,
	) );
	
	// Enable/Disable Readmore
	$wp_customize->add_setting( 'pg_blog_readmore', array(
		'type'		=> 'theme_mod',
		'default'	=> '1',
		'sanitize_callback' => 'prefix_sanitize_layout',
	) );

	$wp_customize->add_control( 'pg_blog_readmore', array(
		'label'		=> __('Read More Link','pg'),
		'section'	=> 'pg_blog',
		'settings'	=> 'pg_blog_readmore',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Featured Images on Entries
	$wp_customize->add_setting( 'pg_blog_entry_thumb', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'pg_blog_entry_thumb', array(
		'label'		=> __('Featured Image on Entries','pg'),
		'section'	=> 'pg_blog',
		'settings'	=> 'pg_blog_entry_thumb',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Featured Images on Posts
	$wp_customize->add_setting( 'pg_blog_post_thumb', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'pg_blog_post_thumb', array(
		'label'		=> __('Featured Image on Posts','pg'),
		'section'	=> 'pg_blog',
		'settings'	=> 'pg_blog_post_thumb',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );
	
}


?>