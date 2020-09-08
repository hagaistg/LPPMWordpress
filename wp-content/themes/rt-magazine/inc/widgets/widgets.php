<?php
/**
 * Register Widgets.
 *
 * @package RT_Magazine
 */

/**
 * Register Slider Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/home-featured-slider.php';

/**
 * Register Top Promo Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/top-promo-section.php';

/**
 * Register Featured Column Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/featured-column.php';

/**
 * Register Two Column Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/two-column.php';

/**
 * Register Mix Column Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/mix-column.php';

/**
 * Register Featured Column List Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/featured-column-list.php';

/**
 * Register Sidebar List Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/sidebar-list.php';

/**
 * Register Social Media Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/social-media.php';

/**
 * Backend Css
 */
function rt_magazine_backend_scripts() {

	wp_enqueue_style( 'rt-magazine-backend', get_template_directory_uri() . '/assest/css/backend.css' );
	
}
add_action( 'admin_enqueue_scripts', 'rt_magazine_backend_scripts', 10 );