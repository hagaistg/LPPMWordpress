<?php
/**
 * RT Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RT_Magazine
 */


if ( ! function_exists( 'rt_magazine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rt_magazine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RT Magazine, use a find and replace
		 * to change 'rt-magazine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rt-magazine', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'rt-magazine-home-slider', 611, 350, true);
		add_image_size( 'rt-magazine-home-featured-thumb', 201, 168, true);
		add_image_size( 'rt-magazine-home-featured-medium', 415, 168, true);
		add_image_size( 'rt-magazine-top-promo-default', 611, 259, true);
		add_image_size( 'rt-magazine-top-promo', 416, 259, true);
		add_image_size( 'rt-magazine-featured-column-default', 105, 105, true);
		add_image_size( 'rt-magazine-featured-column', 339, 299, true);
		add_image_size( 'rt-magazine-two-column', 339, 231, true);
		add_image_size( 'rt-magazine-featured-column-list', 708, 300, true);
		add_image_size( 'rt-magazine-archve-popular-default', 252, 350, true);
		add_image_size( 'rt-magazine-archve-popular', 534, 350, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' 		=> esc_html__( 'Primary', 'rt-magazine' ),
			'top-menu' 		=> esc_html__( 'Top Menu', 'rt-magazine' ),
			'social-media'  => esc_html__( 'Social Media', 'rt-magazine' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rt_magazine_custom_background_args', array(
			'default-color' => '000000',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support('post-formats', array(
			'image',
			'video'
		) );		
	}
endif;
add_action( 'after_setup_theme', 'rt_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rt_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rt_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'rt_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rt_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rt-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rt-magazine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	$header_layout = rt_magazine_get_option( 'header_layout' );
	if( 'layout-2' ==  $header_layout):
		register_sidebar( array(
			'name'          => esc_html__( 'Header Advertisement', 'rt-magazine' ),
			'id'            => 'header-advertiseent-section',
			'description'   => esc_html__( 'This sidebar will appear above menu section.', 'rt-magazine' ),
			'before_widget' => '<div id="%1$s" class="%2$s ads-section">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	endif;

	register_sidebar( array(
		'name'          => esc_html__( 'Featured Slider', 'rt-magazine' ),
		'id'            => 'featured-slider-section',
		'description'   => esc_html__( 'This sidebar will appear below menu section.', 'rt-magazine' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Promo Section', 'rt-magazine' ),
		'id'            => 'top-promo-section',
		'description'   => esc_html__( 'This sidebar will appear below sldier section.', 'rt-magazine' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Widget Section', 'rt-magazine' ),
		'id'            => 'home-widget-section',
		'description'   => esc_html__( 'This sidebar will appear on home section.', 'rt-magazine' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Siderbar Section', 'rt-magazine' ),
		'id'            => 'home-sidebar-section',
		'description'   => esc_html__( 'This sidebar will appear on home sidebar.', 'rt-magazine' ),
		'before_widget' => '<aside id="%1$s" class="%2$s widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );				

	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'rt-magazine' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</h2></span>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'rt-magazine' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</h2></span>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'rt-magazine' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</h2></span>',
	) );	
}
add_action( 'widgets_init', 'rt_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rt_magazine_scripts() {

	$fonts_url = rt_magazine_fonts_url();	
	
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'rt-magazine-google-fonts', $fonts_url, array(), null );
	}	

	/************************************ Load fontawesome ************************************/
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assest/css/font-awesome.min.css', array(), '4.4.0' );

	/************************************Owl Carousel Assets /************************************/
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assest/css/owl.carousel.css', array(), 'v2.2.0' );	

	/************************************ Owl Theme meanmenu ************************************/
	wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/assest/css/owl.theme.css', array(), 'v2.2.0' );

	/**************************************** meanmenu ****************************************/
	wp_enqueue_style( 'meanmenu', get_template_directory_uri().'/assest/css/meanmenu.css', array(), '2.0.7' );	

	wp_enqueue_style( 'rt-magazine-style', get_stylesheet_uri() );	

	/**************************************** Responsive Css ****************************************/
	wp_enqueue_style( 'rt-magazine-responsive', get_template_directory_uri() . '/assest/css/responsive.css'  );	

	/****************************************Owl Carousel ****************************************/
	wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri() . '/assest/js/owl.carousel.js', array('jquery'), 'v2.2.1', true );

	/**************************************** Resize Sensor Js **************************************/
	wp_enqueue_script( 'resize-sensor-js', get_template_directory_uri() . '/assest/js/ResizeSensor.js', array('jquery'), 'v2.2.1', true );

	/**************************************** Theia Sticky Sidebar ************************************/
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assest/js/theia-sticky-sidebar.js', array('jquery'), 'v2.2.1', true );	

	/**************************************** jquery-meanmenu 	************************************/ 
	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assest/js/jquery.meanmenu.js', array('jquery'), 'v2.0.8', true );	

	wp_enqueue_script( 'rt-magazine-navigation', get_template_directory_uri() . '/assest/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rt-magazine-skip-link-focus-fix', get_template_directory_uri() . '/assest/js/skip-link-focus-fix.js', array(), '2018119', true );

	/**************************************** Custom Js *********************************************/
	wp_enqueue_script( 'rt-magazine-custom', get_template_directory_uri() . '/assest/js/custom.js', array(), '2018119', true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rt_magazine_scripts' );

/**
 * Load init.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/init.php';
