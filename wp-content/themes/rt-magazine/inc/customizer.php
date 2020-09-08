<?php
/**
 * RT Magazine Theme Customizer
 *
 * @package RT_Magazine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rt_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Load Theme Option.
	require get_template_directory() . '/inc/customizer/control.php';			

	// Load Customize Sanitize.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/sanitize.php';

	// Load Theme Option.
	require get_template_directory() . '/inc/customizer/theme-section.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'rt_magazine_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'rt_magazine_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'rt_magazine_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rt_magazine_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rt_magazine_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rt_magazine_customize_preview_js() {
	wp_enqueue_script( 'rt-magazine-customizer', get_template_directory_uri() . '/assest/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rt_magazine_customize_preview_js' );

/**
 *  Customizer Control 
 */
function rt_magazine_customize_backend_scripts() {

	wp_enqueue_style( 'rt-magazine-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	
	wp_enqueue_script( 'rt-magazine-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scipt.js', array( ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'rt_magazine_customize_backend_scripts', 10 );
