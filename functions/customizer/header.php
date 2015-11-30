<?php
/**
 * Header theme options
 *
 * 
 * 
 * @since ProfitGeeks 1.0
 */

function pg_customizer_general( $wp_customize ) {

	$wp_customize->add_section( 'pg_header_section' , array(
		'title'		=> __( 'Header', 'pg' ),
		'priority'	=> 200,
	) );
	
	
	$wp_customize->add_setting( 'pg_logo', array(
		'type'	=> 'theme_mod',
		'sanitize_callback' => 'is_bool',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pg_logo', array(
		'label'		=> __('Image Logo','pg'),
		'section'	=> 'pg_header_section',
		'settings'	=> 'pg_logo',
		'priority'	=> 1,
	) ) );

	$wp_customize->add_setting( 'pg_header_search', array(
		'type'		=> 'theme_mod',
		'default'	=> true,
		'sanitize_callback' => 'is_bool',
			
	) );

	$wp_customize->add_control( 'pg_header_search', array(
		'label'		=> __( 'Header Search', 'pg' ),
		'section'	=> 'pg_header_section',
		'settings'	=> 'pg_header_search',
		'priority'	=> 2,
		'type'		=> 'checkbox',
	) );
	
	$wp_customize->add_setting( 'pg_nav_below', array(
			'type'		=> 'theme_mod',
			'default'	=> false,
			'sanitize_callback' => 'is_bool',
	) );
	
	$wp_customize->add_control( 'pg_nav_below', array(
			'label'		=> __( 'Navigation Below Header', 'pg' ),
			'section'	=> 'pg_header_section',
			'settings'	=> 'pg_nav_below',
			'priority'	=> 3,
			'type'		=> 'checkbox',
	) );
	
	
	$wp_customize->add_setting(
			'header-bg-color',
			array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'header-background',
					array(
							'label' => 'Header Background',
							'section' => 'pg_header_section',
							'settings' => 'header-bg-color',
							'priority'	=> 1,
					)
			)
	);
	
	$wp_customize->add_setting(
			'header-txt-color',
			array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'header-txt',
					array(
							'label' => 'Header Text',
							'section' => 'pg_header_section',
							'settings' => 'header-txt-color',
							'priority'	=> 2,
					)
			)
	);
	
	$wp_customize->add_section( 'pg_width_section' , array(
			'title'		=> __( 'Width', 'pg' ),
			'priority'	=> 21,
	) );
	
	
	$wp_customize->add_setting( 'pg_site_wide', array(
			'type'		=> 'theme_mod',
			'default'	=> false,
			'sanitize_callback' => 'is_bool',
	) );
	
	$wp_customize->add_control( 'pg_site_wide', array(
			'label'		=> __( 'Full Width Header & Footer', 'pg' ),
			'section'	=> 'pg_width_section',
			'settings'	=> 'pg_site_wide',
			'priority'	=> 3,
			'type'		=> 'checkbox',
	) );
	
		
}
add_action( 'customize_register', 'pg_customizer_general' );


function pg_customizer_color($wp_customize) {

	/// Colors
	
	$wp_customize->add_setting(
			'nav-background',
			array(
					'default' => '#000',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'nav-background',
					array(
							'label' => 'Navigation Background',
							'section' => 'colors',
							'settings' => 'nav-background',
							'priority'	=> 11,
					)
			)
	);
	
	$wp_customize->add_setting(
			'nav-link-color',
			array(
					'default' => '#000',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'nav-link-color',
					array(
							'label' => 'Navigation Text',
							'section' => 'colors',
							'settings' => 'nav-link-color',
							'priority'	=> 25,
					)
			)
	);
	
	
	$wp_customize->add_setting(
			'nav-txt-hover-color',
			array(
					'default' => '#fff',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'nav-txt-hover-color',
					array(
							'label' => 'Navigation Text Hover',
							'section' => 'colors',
							'settings' => 'nav-txt-hover-color',
							'priority'	=> 30,
					)
			)
	);
	
	
	$wp_customize->add_setting(
			'nav-active-color',
			array(
					'default' => '#02aace',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'nav-active-color',
					array(
							'label' => 'Navigation Active Hover',
							'section' => 'colors',
							'settings' => 'nav-active-color',
							'priority'	=> 28,
					)
			)
	);
	
	$wp_customize->add_setting(
			'header-tags-color',
			array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'header-tags-color',
					array(
							'label' => 'Header Tags (h1-h6)',
							'section' => 'colors',
							'settings' => 'header-tags-color',
							'priority'	=> 10,
					)
			)
	);
	
	$wp_customize->add_section( 'pg_footer_section' , array(
			'title'		=> __( 'Footer', 'pg' ),
			'priority'	=> 201,
	) );
	
	$wp_customize->add_setting( 'pg_footer_show', array(
			'type'		=> 'theme_mod',
			'default'	=> true,
			'sanitize_callback' => 'is_bool',
	) );
	
	$wp_customize->add_control( 'pg_footer_show', array(
			'label'		=> __( 'Show Widget Footer', 'pg' ),
			'section'	=> 'pg_footer_section',
			'settings'	=> 'pg_footer_show',
			'priority'	=> 1,
			'type'		=> 'checkbox',
	) );
	
	$wp_customize->add_setting(
			'footer1-bg-color',
			array(
					'default' => '#02aace',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'footer1-bg-color',
					array(
							'label' => 'Widget Footer Background',
							'section' => 'pg_footer_section',
							'settings' => 'footer1-bg-color'
					)
			)
	);
	
	$wp_customize->add_setting(
			'footer2-bg-color',
			array(
					'default' => '#000',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'footer2-bg-color',
					array(
							'label' => 'Lower Footer Background',
							'section' => 'pg_footer_section',
							'settings' => 'footer2-bg-color'
					)
			)
	);
	
	$wp_customize->add_setting(
			'footer-txt2',
			array(
					'default' => '#fff',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'footer-txt2',
					array(
							'label' => 'Lower Footer Text',
							'section' => 'pg_footer_section',
							'settings' => 'footer-txt2'
					)
			)
	);
	
		
	$wp_customize->add_section( 'pg_link_section' , array(
			'title'		=> __( 'Links', 'pg' ),
			'priority'	=> 30,
	) );
	
	$wp_customize->add_setting(
			'site-link',
			array(
					'default' => '#02aace',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'site-link',
					array(
							'label' => 'Link Color',
							'section' => 'pg_link_section',
							'settings' => 'site-link'
					)
			)
	);
	
	$wp_customize->add_setting(
			'site-hover',
			array(
					'default' => '#000',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport' => 'postMessage',
			)
	);
	
	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'site-hover',
					array(
							'label' => 'Hover Color',
							'section' => 'pg_link_section',
							'settings' => 'site-hover'
					)
			)
	);
	
	

	if ( $wp_customize->is_preview() && ! is_admin() ) {
		add_action( 'wp_footer', 'example_customize_color', 21);
	}

}

function wpx_customizer_css() {
	?>
    <style id="customize-styles" type="text/css">
        body a { color: <?php echo get_theme_mod( 'site-link' ); ?>}
        body a:hover { color: <?php echo get_theme_mod( 'site-hover' ); ?>}
        #site-navigation-wrap, #site-navigation-wide { background-color: <?php echo get_theme_mod( 'nav-background' ); ?>}
        #site-navigation .dropdown-menu li a { color: <?php echo get_theme_mod( 'nav-link-color' ); ?>}
        #site-navigation .dropdown-menu li a:hover { color: <?php echo get_theme_mod( 'nav-txt-hover-color' ); ?>}
        #site-navigation .dropdown-menu li a:hover, 
        #site-navigation .dropdown-menu li.sfHover > a, 
        #site-navigation .dropdown-menu .current-menu-item a, 
        #site-navigation .dropdown-menu .current-menu-item a:hover  { background-color: <?php echo get_theme_mod( 'nav-active-color' ); ?>}
        #header, #header a { color: <?php echo get_theme_mod( 'header-txt-color' ); ?>}
        #header-wrap, #site-header-wide { background-color: <?php echo get_theme_mod( 'header-bg-color' ); ?>}
        #footer-wrap , #site-footer1-wide { background-color: <?php echo get_theme_mod( 'footer1-bg-color' ); ?>}
        #copyright-wrap, #site-footer2-wide  { background-color: <?php echo get_theme_mod( 'footer2-bg-color' ); ?>}
        #copyright-wrap{ color: <?php echo get_theme_mod( 'footer-txt2' ); ?>}
        h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6 { color: <?php echo get_theme_mod( 'header-tags-color' ); ?>}
    </style>
    <?php
}
add_action( 'wp_head', 'wpx_customizer_css' );



function example_customize_color() {
	?>
    <script type="text/javascript">
        (function( $ ) {
            wp.customize('nav-background',function( value ) {
                value.bind(function(to) {
                    $('#site-navigation-wrap, #site-navigation-wide').css('background-color', to );
                });
            });
            wp.customize('nav-link-color',function( value ) {
                value.bind(function(to) {
                    $('#site-navigation .dropdown-menu a').css('color', to );
                });
            });
            wp.customize('nav-txt-hover-color',function( value ) {
                value.bind(function(to) {
                    $('#site-navigation .dropdown-menu a:hover').css('color', to );
                });
            });
            wp.customize('nav-txt-hover-color',function( value ) {
                value.bind(function(to) {
                    $('#site-navigation .dropdown-menu .current-menu-item a:hover').css('background-color', to );
                });
            });
            wp.customize('footer1-bg-color',function( value ) {
                value.bind(function(to) {
                    $('#footer-wrap, #site-footer1-wide').css('background-color', to );
                });
            });
            wp.customize('footer2-bg-color,',function( value ) {
                value.bind(function(to) {
                    $('#copyright-wrap, #site-footer2-wide').css('background-color', to );
                });
            });
            wp.customize('footer-txt2',function( value ) {
                value.bind(function(to) {
                    $('#copyright-wrap').css('color', to );
                });
            });
            wp.customize('site-link',function( value ) {
                value.bind(function(to) {
                    $('body a').css('color', to );
                });
            });
            wp.customize('site-hover',function( value ) {
                value.bind(function(to) {
                    $('body a:hover').css('color', to );
                });
            });
            wp.customize('header-tags-color',function( value ) {
                value.bind(function(to) {
                    $('h1, h2 ,h3 ,h4 ,h5 ,h6').css('color', to );
                });
            });            
            wp.customize('header-bg-color',function( value ) {
                value.bind(function(to) {
                    $('#header-wrap, #site-header-wide').css('background-color', to );
                });
            });  
            wp.customize('header-txt-color',function( value ) {
                value.bind(function(to) {
                    $('#header, #header a').css('color', to );
                });
            }); 
            
            
        } )( jQuery )
    </script>
    <?php
}

add_action( 'customize_register', 'pg_customizer_color' );


/// wp_title config

function pg_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	} // end if
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	} // end if
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s', 'pgr' ), max( $paged, $page ) ) . " $sep $title";
	} // end if
	return $title;
} 
add_filter( 'wp_title', 'pg_wp_title', 10, 2 );

?>
