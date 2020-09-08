<?php
/**
 * Default theme options.
 *
 * @package RT_Magazine
 */

if ( ! function_exists( 'rt_magazine_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function rt_magazine_get_default_theme_options() {

	$defaults = array();

	$defaults['site_identity']						= 'title-text';
	$defaults['header_layout']						= 'layout-1';
	$defaults['menu_layout']						= 'center';
	$defaults['enable_top_header']					= true;
	$defaults['top_header_left']					= 'current-date';
	$defaults['top_header_right']					= 'menu';
	$defaults['header_address']						= '';
	$defaults['header_email']						= '';
	$defaults['header_number']						= '';	
	$defaults['enable_social_icon']					= true;
	$defaults['enable_home_icon']					= true;
	$defaults['enable_search_icon']					= true;

	/*********************** General Setting *****************************************/
	$defaults['body_layout']						= 'full-width';	
	$defaults['layout_options']						= 'right';	
	$defaults['enable_home_sidebar']				= true;
	$defaults['enable_posted_on']					= true;
	$defaults['enable_author']						= true;
	$defaults['pagination_option']					= 'default';

	/*********************** Archive Page Setting *****************************************/
	$defaults['enable_popular_section']				= true;
	$defaults['archive_layout']						= 'default';

	
	/*********************** Categories Color Setting *****************************************/
	$categories = get_terms( 'category' ); // Get all Categories
	$wp_category_list = array();

	foreach ( $categories as $category_list ) {
		$defaults['rt_magazine_category_color_'.esc_html( strtolower($category_list->name) ).''] = '#0DBA7F';

	}

	// Pass through filter.
	$defaults = apply_filters( 'rt_magazine_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'rt_magazine_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function rt_magazine_get_option( $key ) {

		$default_options = rt_magazine_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;