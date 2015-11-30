<?php
/**
 * MCE Editor Tweaks
 *
 * 
 * 
 * 
 */


// Enable font size buttons in the editor
add_filter("mce_buttons_2", "pg_fontsizeselect_mce");
if ( !function_exists( 'pg_fontsizeselect_mce' ) ) {
	function pg_fontsizeselect_mce($buttons) {
		$buttons[] = 'fontsizeselect';
			return $buttons;
	}
}

// Customize mce editor font sizes
add_filter('tiny_mce_before_init', 'pg_customize_text_sizes');
if ( !function_exists( 'pg_customize_text_sizes' ) ) {
	function pg_customize_text_sizes($initArray){
		$initArray['theme_advanced_font_sizes'] = "9px,10px,12px,13px,14px,16px,18px,21px,24px,28px,32px,36px";
		return $initArray;
	}
}

// Add hr to editor
add_filter("mce_buttons_2", "pg_hr_mce");
if ( !function_exists('pg_hr_mce' ) ) {
	function pg_hr_mce($buttons) {
		$buttons[] = 'hr';
		return $buttons;
	}
}