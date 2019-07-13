<?php
/**
 * FotoGraphy Theme Customizer
 *
 * @package FotoGraphy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fotography_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*------------------------------------------------------------------------------------*/
	/**
	 * Upgrade to Uncode Pro
	*/
	// Register custom section types.
	$wp_customize->register_section_type( 'Fotography_Customize_Section_Pro' );

	// Register sections.
	$wp_customize->add_section(
	    new Fotography_Customize_Section_Pro(
	        $wp_customize,
	        'fotography-pro',
	        array(
	            'title1'    => esc_html__( 'Free Vs Pro', 'fotography' ),
	            'pro_text1' => esc_html__( 'Compare','fotography' ),
	            'pro_url1'  => admin_url( 'themes.php?page=fotography-welcome&section=free_vs_pro'),
	            'priority' => 1,
	        )
	    )
	);
	$wp_customize->add_setting(
		'fotography_pro_upbuton',
		array(
			'section' => 'fotography-pro',
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control(
		'fotography_pro_upbuton',
		array(
			'section' => 'fotography-pro'
		)
	);

	/** Dynamic Color Options **/
	$wp_customize->add_setting( 'fotography_tpl_color', array( 'default' => '#d28d56', 'sanitize_callback' => 'sanitize_hex_color' ));

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'fotography_tpl_color', 
		array(
			'label'      => esc_html__( 'Template Color', 'fotography' ),
			'section'    => 'colors',
			'settings'   => 'fotography_tpl_color',
		) ) 
	);
}
add_action( 'customize_register', 'fotography_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fotography_customize_preview_js() {
	wp_enqueue_script( 'fotography_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'fotography_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function fotography_custom_customize_enqueue() {
	wp_enqueue_script( 'fotography-custom-customize', get_template_directory_uri() . '/js/theme-customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'fotography_custom_customize_enqueue' );