<?php
/**
 * RT Magazine Load Files
 *
 * @package RT_Magazine
 */
/**
 * Include default theme options.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer/default.php';

/**
 * Load Hooks.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/basic.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/structure.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/custom.php';


/**
 * Implement the Custom Header feature.
 */
require trailingslashit( get_template_directory() ) . '/inc/custom-header.php';

/**
 * Functions Wp_Dropdown Posts WordPress.
 */
require trailingslashit( get_template_directory() ) . '/inc/wp_dropdown_posts.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require trailingslashit( get_template_directory() ) . '/inc/jetpack.php';
}

/**
 * Widget Register
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/widgets.php';

/**
 * One Click Data .
 */
require trailingslashit( get_template_directory() ) . '/inc/demo-content/demo-import-setup.php';


/**
 * Plugin Activation Section.
 */
require trailingslashit( get_template_directory() ) . '/inc/class-tgm-plugin-activation.php';
