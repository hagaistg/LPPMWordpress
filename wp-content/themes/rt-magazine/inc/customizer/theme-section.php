<?php
/**
 * Theme Options 
 * 
 * @package RT_Magazine
 */
$default = rt_magazine_get_default_theme_options();

/****************  Add Pannel   ***********************/
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => esc_html__( 'Theme Options', 'rt-magazine' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/****************  Header Setting Section starts ************/
$wp_customize->add_section('section_header', 
	array(    
	'title'       => esc_html__('Header Setting', 'rt-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);

/************************  Site Identity  ******************/
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
	'default' 			=> $default['site_identity'],
	'sanitize_callback' => 'rt_magazine_sanitize_select'
	)
);
$wp_customize->add_control('theme_options[site_identity]', 
	array(		
	'label' 	=> esc_html__('Choose Option', 'rt-magazine'),
	'section' 	=> 'title_tagline',
	'settings'  => 'theme_options[site_identity]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'logo-only' 	=> esc_html__('Logo Only', 'rt-magazine'),
			'logo-text' 	=> esc_html__('Logo + Tagline', 'rt-magazine'),
			'title-only' 	=> esc_html__('Title Only', 'rt-magazine'),
			'title-text' 	=> esc_html__('Title + Tagline', 'rt-magazine')
		)
	)
);
/********************* Enable Top Header ****************************/
$wp_customize->add_setting( 'theme_options[enable_top_header]',
	array(
		'default'           => $default['enable_top_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'rt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_top_header]',
	array(
		'label'    => esc_html__( 'Enable Top Header', 'rt-magazine' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',		
	)
);
/************************ Header  Layout ******************/
$wp_customize->add_setting('theme_options[header_layout]', 
	array(
	'default' 			=> $default['header_layout'],
	'sanitize_callback' => 'rt_magazine_sanitize_select'
	)
);
$wp_customize->add_control('theme_options[header_layout]', 
	array(		
	'label' 	=> __('Header Layout Option', 'rt-magazine'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[header_layout]',
	'type' 		=> 'select',
	'choices' 	=>  array(
			'layout-1' 	=> esc_html__('Layout 1', 'rt-magazine'),
			'layout-2' 	=> esc_html__('Layout 2', 'rt-magazine'),			
		)
	)
);

/************************  Top Header Left Part  ******************/
$wp_customize->add_setting('theme_options[top_header_left]', 
	array(
	'default' 			=> $default['top_header_left'],
	'sanitize_callback' => 'rt_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[top_header_left]', 
	array(		
	'label' 	=> esc_html__('Top Left Header Option', 'rt-magazine'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[top_header_left]',
	'type' 		=> 'select',
	'choices' 	=>  array(
			'menu' 	=> esc_html__('Menu', 'rt-magazine'),
			'address' 	=> esc_html__('Address', 'rt-magazine'),
			'current-date' 	=> esc_html__('Current Date', 'rt-magazine'),
			'social-media' 	=> esc_html__('Social Media', 'rt-magazine')
		)
	)
);

/************************  Top Header Right Part  ******************/
$wp_customize->add_setting('theme_options[top_header_right]', 
	array(
	'default' 			=> $default['top_header_right'],
	'sanitize_callback' => 'rt_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[top_header_right]', 
	array(		
	'label' 	=> esc_html__('Top Right Header Option', 'rt-magazine'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[top_header_right]',
	'type' 		=> 'select',
	'choices' 	=>  array(
			'menu' 	=> esc_html__('Menu', 'rt-magazine'),
			'address' 	=> esc_html__('Address', 'rt-magazine'),
			'current-date' 	=> esc_html__('Current Date', 'rt-magazine'),
			'social-media' 	=> esc_html__('Social Media', 'rt-magazine')
		)
	)
);

/************************  Header Address  ******************/
$wp_customize->add_setting( 'theme_options[header_address]',
	array(
	'default'           => $default['header_address'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'rt_magazine_sanitize_textarea_content',	
	)
);
$wp_customize->add_control( 'theme_options[header_address]',
	array(
	'label'    => esc_html__( 'Top Header Address', 'rt-magazine' ),
	'section'  => 'section_header',
	'type'     => 'text',
	
	)
);

/************************  Top Header Phone Number  ******************/
$wp_customize->add_setting( 'theme_options[header_number]',
	array(
	'default'           => $default['header_number'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',	
	)
);
$wp_customize->add_control( 'theme_options[header_number]',
	array(
	'label'    => esc_html__( 'Phone Number', 'rt-magazine' ),
	'section'  => 'section_header',
	'type'     => 'text',
	
	)
);

/************************  Top Header Email  ******************/
$wp_customize->add_setting('theme_options[header_email]',  
	array(
	'default'           => $default['header_email'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_email',
	
	)
);

$wp_customize->add_control('theme_options[header_email]', 
	array(
	'label'       => esc_html__('Contact Email', 'rt-magazine'),
	'section'     => 'section_header',   
	'settings'    => 'theme_options[header_email]',		
	'type'        => 'text'
	)
);

/********************* Enable Socail Icon ****************************/
$wp_customize->add_setting( 'theme_options[enable_social_icon]',
	array(
		'default'           => $default['enable_social_icon'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'rt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_social_icon]',
	array(
		'label'    => esc_html__( 'Enable Social Icon', 'rt-magazine' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Home Button ****************************/
$wp_customize->add_setting( 'theme_options[enable_home_icon]',
	array(
		'default'           => $default['enable_home_icon'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'rt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_home_icon]',
	array(
		'label'    => esc_html__( 'Enable Home Icon', 'rt-magazine' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Search ****************************/
$wp_customize->add_setting( 'theme_options[enable_search_icon]',
	array(
		'default'           => $default['enable_search_icon'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'rt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_search_icon]',
	array(
		'label'    => esc_html__( 'Enable Search', 'rt-magazine' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',		
	)
);

/****************  Archive Page Setting ************/
$wp_customize->add_section('section_archive', 
	array(    
	'title'       => esc_html__('Archive Setting', 'rt-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);


/************************  Archive Page Layout ******************/
$wp_customize->add_setting('theme_options[archive_layout]', 
	array(
	'default' 			=> $default['archive_layout'],
	'sanitize_callback' => 'rt_magazine_sanitize_select'
	)
);
$wp_customize->add_control('theme_options[archive_layout]', 
	array(		
	'label' 	=> __('Choose Option', 'rt-magazine'),
	'section' 	=> 'section_archive',
	'settings'  => 'theme_options[archive_layout]',
	'type' 		=> 'select',
	'choices' 	=>  array(
			'default' 		=> esc_html__('Default', 'rt-magazine'),
			'list' 	=> esc_html__('List', 'rt-magazine'),
		)
	)
);
/****************  General Setting Section starts ********************************************/
$wp_customize->add_section('section_general', 
	array(    
	'title'       => esc_html__('General Setting', 'rt-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);

/********************* Enable Home Sidebar ****************************/
$wp_customize->add_setting( 'theme_options[enable_home_sidebar]',
	array(
		'default'           => $default['enable_home_sidebar'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'rt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_home_sidebar]',
	array(
		'label'    => esc_html__( 'Enable Home Sidebar', 'rt-magazine' ),
		'section'  => 'section_general',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Posted On ****************************/
$wp_customize->add_setting( 'theme_options[enable_posted_on]',
	array(
		'default'           => $default['enable_posted_on'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'rt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_posted_on]',
	array(
		'label'    => esc_html__( 'Enable Date', 'rt-magazine' ),
		'section'  => 'section_general',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Author ****************************/
$wp_customize->add_setting( 'theme_options[enable_author]',
	array(
		'default'           => $default['enable_author'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'rt_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_author]',
	array(
		'label'    => esc_html__( 'Enable Author', 'rt-magazine' ),
		'section'  => 'section_general',
		'type'     => 'checkbox',		
	)
);


/**********************  Layout Options *****************************************************/
$wp_customize->add_setting('theme_options[layout_options]', 
	array(
	'default' 			=> $default['layout_options'],
	'sanitize_callback' => 'rt_magazine_sanitize_select',
	)
);
/************************ Body Layout ******************/
$wp_customize->add_setting('theme_options[body_layout]', 
	array(
	'default' 			=> $default['body_layout'],
	'sanitize_callback' => 'rt_magazine_sanitize_select'
	)
);
$wp_customize->add_control('theme_options[body_layout]', 
	array(		
	'label' 	=> esc_html__('Layout Style', 'rt-magazine'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[body_layout]',
	'type' 		=> 'select',
	'choices' 	=>  array(
			'boxed' 	=> esc_html__('Boxed', 'rt-magazine'),
			'full-width' 	=> esc_html__('Full Width', 'rt-magazine'),
						
		)
	)
);

$wp_customize->add_control(new Rt_Magazine_Image_Radio_Control($wp_customize, 'theme_options[layout_options]', 
	array(		
	'label' 	=> esc_html__('Sidebar Layout Options', 'rt-magazine'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left' 			=> get_template_directory_uri() . '/assest/img/left-sidebar.png',							
		'right' 		=> get_template_directory_uri() . '/assest/img/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assest/img/no-sidebar.png',
		),	
	))
);

/********************************** Pagaination Option *********************************/
$wp_customize->add_setting('theme_options[pagination_option]', 
	array(
	'default' 			=> $default['pagination_option'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'rt_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[pagination_option]', 
	array(		
	'label' 	=> esc_html__('Pagaination Options', 'rt-magazine'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[pagination_option]',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'default' 		=> esc_html__('Default', 'rt-magazine'),							
		'numeric' 		=> esc_html__('Numeric', 'rt-magazine'),		
		),	
	)
);

/******************************  Categories Color ********************************************/
$wp_customize->add_section('section_categories_color', 
	array(    
	'title'       => esc_html__('Categories Color Setting', 'rt-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);

	$priority = 3;
	$categories = get_terms( 'category' ); // Get all Categories
	$wp_category_list = array();

	foreach ( $categories as $category_list ) {

		$wp_customize->add_setting('theme_options[rt_magazine_category_color_'.esc_html( strtolower($category_list->name) ).']',
			array(
				'default'              => $default['rt_magazine_category_color_'.esc_html( strtolower($category_list->name) ).''],
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'sanitize_hex_color'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize,'theme_options[rt_magazine_category_color_'.esc_html( strtolower($category_list->name) ).']',
				array(
					/* translators: %s: category namet */
					'label'    => sprintf( esc_html__( ' %s', 'rt-magazine' ), esc_html( $category_list->name ) ),
					'section'  => 'section_categories_color',
					'priority' => absint($priority)
				)
			)
		);
		$priority++;
	}