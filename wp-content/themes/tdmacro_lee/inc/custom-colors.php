<?php
/**
 * Custom colors
 *
 * @package tdMacro
 */

function tdmacro_custom_colors() {
	$custom_colors = '';

	// Accent Color
	if( '#2980b9' != ( $tdmacro_accent_color = get_theme_mod( 'tdmacro_accent_color', '#2980b9' ) ) ) {
        $tdmacro_accent_color = esc_attr( $tdmacro_accent_color );
        
		$custom_colors .= "input[type='submit'], a.button { background: " . $tdmacro_accent_color . "; } \n";
		$custom_colors .= " #colophon { border-color: " . $tdmacro_accent_color . "; } \n";
		$custom_colors .= " a:hover { color:" . $tdmacro_accent_color . "; } \n";
	}

	// Header Background Color
	if( '#2c3e50' != ( $tdmacro_header_bg = get_theme_mod( 'tdmacro_header_bg', '#2c3e50' ) ) ) {
		$custom_colors .= "#masthead { background: " . esc_attr( $tdmacro_header_bg ) . "; } \n";
	}

	// Menu Background Color
	if( '#2980b9' != ( $tdmacro_menu_bg = get_theme_mod( 'tdmacro_menu_bg', '#2980b9' ) ) ) {
		$custom_colors .= ".main-navigation, .main-navigation ul ul { background: " . esc_attr( $tdmacro_menu_bg ) . "; } \n";
	}

	// Menu Text Color
	if( '#ffffff' != ( $tdmacro_menu_textcolor = get_theme_mod( 'tdmacro_menu_textcolor', '#ffffff' ) ) ) {
		$custom_colors .= ".main-navigation a, .main-navigation .nav-bar li.menu-item-has-children > a:after, .main-navigation .nav-bar li.page_item_has_children > a:after { color: " . esc_attr( $tdmacro_menu_textcolor ) . "; } \n";
	}

	// Footer Background Color
	if( '#1a2530' != ( $tdmacro_footer_bg = get_theme_mod( 'tdmacro_footer_bg', '#1a2530' ) ) ) {
		$custom_colors .= "#colophon { background: " . esc_attr( $tdmacro_footer_bg ) . "; } \n";
	}

	// Footer Primary Text Color
	if( '#e2e4e4' != ( $tdmacro_footer_primary_textcolor = get_theme_mod( 'tdmacro_footer_primary_textcolor', '#e2e4e4' ) ) ) {
		$custom_colors .= "#footer-widgets .widget a, #colophon .footer-bottom a { color: " . esc_attr( $tdmacro_footer_primary_textcolor ) . "; } \n";
	}

	// Footer Secondary Text Color
	if( '#c9ced4' != ( $tdmacro_footer_secondary_textcolor = get_theme_mod( 'tdmacro_footer_secondary_textcolor', '#c9ced4' ) ) ) {
		$custom_colors .= "#footer-widgets .widget,#footer-widgets .widget .widget-title,#footer-widgets .widget a:hover, #colophon .footer-bottom { color: " . esc_attr( $tdmacro_footer_secondary_textcolor ) . "; } \n";
	}

	if( $custom_colors ) {
		wp_add_inline_style( 'tdmacro-style', $custom_colors );
	}
}
add_action( 'wp_enqueue_scripts', 'tdmacro_custom_colors' );
