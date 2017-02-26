<?php
/**
 * tdMacro Theme Customizer
 *
 * @package tdMacro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tdmacro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//Accent Color
	$wp_customize->add_setting( 'tdmacro_accent_color', array(
    	'default'        => '#2980b9',
    	'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tdmacro_accent_color', array(
		'label' => esc_html__( 'Accent Color', 'tdmacro' ),
		'section' => 'colors',
		'settings' => 'tdmacro_accent_color',
		'priority' => 1
    ) ) );

	//Header Background Color
	$wp_customize->add_setting( 'tdmacro_header_bg', array(
    	'default'        => '#2c3e50',
    	'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tdmacro_header_bg', array(
		'label' => esc_html__( 'Header Background Color', 'tdmacro' ),
		'section' => 'colors',
		'settings' => 'tdmacro_header_bg',
		'priority' => 2
    ) ) );

    //Menu Background Color
	$wp_customize->add_setting( 'tdmacro_menu_bg', array(
    	'default'        => '#2980b9',
    	'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tdmacro_menu_bg', array(
		'label' => esc_html__( 'Menu Background Color', 'tdmacro' ),
		'section' => 'colors',
		'settings' => 'tdmacro_menu_bg',
		'priority' => 100
    ) ) );

    //Menu Text Color
	$wp_customize->add_setting( 'tdmacro_menu_textcolor', array(
    	'default'        => '#ffffff',
    	'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tdmacro_menu_textcolor', array(
		'label' => esc_html__( 'Menu Text Color', 'tdmacro' ),
		'section' => 'colors',
		'settings' => 'tdmacro_menu_textcolor',
		'priority' => 101
    ) ) );

    //Footer Background Color
	$wp_customize->add_setting( 'tdmacro_footer_bg', array(
    	'default'        => '#1a2530',
    	'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tdmacro_footer_bg', array(
		'label' => esc_html__( 'Footer Background Color', 'tdmacro' ),
		'section' => 'colors',
		'settings' => 'tdmacro_footer_bg',
		'priority' => 102
    ) ) );

    //Footer Primary Text Color
	$wp_customize->add_setting( 'tdmacro_footer_primary_textcolor', array(
    	'default'        => '#e2e4e4',
    	'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tdmacro_footer_primary_textcolor', array(
		'label' => esc_html__( 'Footer Primary Text Color', 'tdmacro' ),
		'section' => 'colors',
		'settings' => 'tdmacro_footer_primary_textcolor',
		'priority' => 103
    ) ) );

    //Footer Secondary Text Color
	$wp_customize->add_setting( 'tdmacro_footer_secondary_textcolor', array(
    	'default'        => '#c9ced4',
    	'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tdmacro_footer_secondary_textcolor', array(
		'label' => esc_html__( 'Footer Secondary Text Color', 'tdmacro' ),
		'section' => 'colors',
		'settings' => 'tdmacro_footer_secondary_textcolor',
		'priority' => 104
    ) ) );

	/**
	* Blog Settings
 	*/
 	$wp_customize->add_section( 'tdmacro_blog_settings', array(
     	'title'    => esc_html__( 'Theme Options', 'tdmacro' ),
     	'priority' => 2000,
	) );

	/* Hide/show post content when post has a featured image */
	$wp_customize->add_setting( 'tdmacro_is_featured_image_without_content', array(
        'default' => 'hide',
        'sanitize_callback' => 'tdmacro_sanitize_post_content_option'
    ) );

    $wp_customize->add_control( 'tdmacro_is_featured_image_without_content', array(
        'type' => 'radio',
        'label' => esc_html__( 'Post with a Featured Image', 'tdmacro' ),
        'section' => 'tdmacro_blog_settings',
        'choices' => array(
            'show' => esc_html__( 'Show Content', 'tdmacro' ),
            'hide' => esc_html__( 'Hide Content', 'tdmacro' ),
        ),
        'priority' => 2
    ));

    /* Auto Post Summary */
	$wp_customize->add_setting( 'tdmacro_is_auto_post_summary', array(
        'default' => '1',
        'sanitize_callback' => 'tdmacro_sanitize_post_excerpt_option'
    ) );

	$wp_customize->add_control( 'tdmacro_is_auto_post_summary', array(
        'type' => 'radio',
        'label' => esc_html__( 'Post Excerpts', 'tdmacro' ),
        'section' => 'tdmacro_blog_settings',
        'choices' => array(
            '1' => esc_html__( 'Automatic excerpt', 'tdmacro' ),
            '' => esc_html__( 'Manual excerpt', 'tdmacro' ),
        ),
        'priority' => 3,
    ));
}
add_action( 'customize_register', 'tdmacro_customize_register' );

/** 
 * Sanitization: Post with a Featured Image
 */
function tdmacro_sanitize_post_content_option( $value ) {    
    if ( in_array( $value, array( 'show', 'hide' ) ) ) {
        return $value;
    } else {
        return 'hide';
    }
}

/** 
 * Sanitization: Post Excerpts
 */
function tdmacro_sanitize_post_excerpt_option( $value ) {
    if ( '1' == $value ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tdmacro_customize_preview_js() {
	wp_enqueue_script( 'tdmacro_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tdmacro_customize_preview_js' );