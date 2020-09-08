<?php
/**
 * magazine-newspaper Theme Customizer
 *
 * @package magazine-newspaper
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function magazine_newspaper_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
  $wp_customize->get_section('static_front_page')->priority = 15;
}
add_action( 'customize_register', 'magazine_newspaper_customize_register' );


function magazine_newspaper_customize_register_color( $wp_customize ) {

  $wp_customize->get_section('colors')->title = esc_attr__( 'Colors and Fonts', 'magazine-newspaper' );
  
  $wp_customize->remove_control('header_textcolor');

  class Pro_Features_Info extends WP_Customize_Control {
        public $type = 'customtext';
        public $extra = ''; // we add this for the extra description
        public function render_content() {
        ?>
        <label>            
            <a href="<?php echo esc_url( 'https://thebootstrapthemes.com/downloads/magazine-newspaper-pro/' ); ?>" target='_blank'><?php echo esc_html( $this->label ); ?></a>
            <span><?php echo esc_html( $this->extra ); ?></span>         
        </label>
        <?php
        }
    }
        
    $wp_customize->add_setting('pro_features_info', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Pro_Features_Info( $wp_customize, 'pro_features_info', array(
        'label' => esc_attr__( 'Upgrade to Pro', 'magazine-newspaper' ),
        'section' => 'colors',
        'settings' => 'pro_features_info',
        'extra' => esc_attr__( ' for more color and font options', 'magazine-newspaper' )
        ) ) 
    );
}
add_action( 'customize_register', 'magazine_newspaper_customize_register_color' );





function magazine_newspaper_customizer_register( $wp_customize )
{
  // Do stuff with $wp_customize, the WP_Customize_Manager object.

  $wp_customize->get_section('header_image')->title = esc_attr__( 'Header / Banner', 'magazine-newspaper' );

  $wp_customize->add_panel( 'theme_option', array(
    'priority' => 10,
    'title' => esc_attr__( 'Magazine Newspaper Options', 'magazine-newspaper' ),
    'description' => esc_attr__( 'Magazine Newspaper Options', 'magazine-newspaper' )
  ) );

  $wp_customize->get_section( 'header_image' )->panel = 'theme_option';
  $wp_customize->get_section( 'header_image' )->priority = 20;
  $wp_customize->get_section( 'background_image' )->panel = 'theme_option';
  $wp_customize->get_section( 'background_image' )->priority = 20;


  /**********************************************/
  /*************** BREAKING NEWS SECTION ****************/
  /**********************************************/

  $wp_customize->add_section( 'breaking_news_section', array(
    'priority' => 1,
    'title' => esc_attr__( 'Breaking News ','magazine-newspaper' ),
    'description' => esc_attr__( 'Select the Category for Breaking News','magazine-newspaper' ),
    'panel' => 'theme_option'
  ) );

  $wp_customize->add_setting( 'breaking_news_display', array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_checkbox',
    'default' => true
  ) );

  $wp_customize->add_control( 'breaking_news_display', array(
    'label' => esc_attr__( 'Display?','magazine-newspaper' ),
    'section' => 'breaking_news_section',
    'settings' => 'breaking_news_display',
    'type' => 'checkbox',
    'priority' => 1
  ) ); 

  $wp_customize->add_setting( 'breaking_news_section_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => esc_attr__( 'Breaking News', 'magazine-newspaper' ),      
  ) );

  $wp_customize->add_control( 'breaking_news_section_title', array(
    'label' => esc_attr__( 'Title','magazine-newspaper' ),
    'section' => 'breaking_news_section',
    'settings' => 'breaking_news_section_title',
    'type' => 'text'
  ) );

  $wp_customize->add_setting( 'breaking_news_category',array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_category',
    'default' => ''
  ) );

  $wp_customize->add_control( new Magazine_Newspaper_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'breaking_news_category', array(
    'label' => esc_attr__('Choose category','magazine-newspaper'),
    'section' => 'breaking_news_section',
    'settings' => 'breaking_news_category',
    'type'=> 'dropdown-taxonomies'
    )  
  ) );

  /**********************************************/
  /*************** TOP NEWS SECTION ****************/
  /**********************************************/

  $wp_customize->add_section( 'top_news_section', array(
    'priority' => 1,
    'title' => esc_attr__( 'Top News ','magazine-newspaper' ),
    'description' => esc_attr__( 'Select the Category for Top News','magazine-newspaper' ),
    'panel' => 'theme_option'
  ) );

  $wp_customize->add_setting( 'top_news_display', array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_checkbox',
    'default' => true
  ) );

  $wp_customize->add_control( 'top_news_display', array(
    'label' => esc_attr__( 'Display?','magazine-newspaper' ),
    'section' => 'top_news_section',
    'settings' => 'top_news_display',
    'type' => 'checkbox',
    'priority' => 1
  ) ); 

  $wp_customize->add_setting( 'top_news_section_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => ''          
  ) );

  $wp_customize->add_control( 'top_news_section_title', array(
    'label' => esc_attr__( 'Title','magazine-newspaper' ),
    'section' => 'top_news_section',
    'settings' => 'top_news_section_title',
    'type' => 'text'
  ) );

  $wp_customize->add_setting( 'top_news_category',array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_category',
    'default' => ''
  ) );

  $wp_customize->add_control( new Magazine_Newspaper_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'top_news_category', array(
    'label' => esc_attr__('Choose category','magazine-newspaper'),
    'section' => 'top_news_section',
    'settings' => 'top_news_category',
    'type'=> 'dropdown-taxonomies'
    )  
  ) );

  /**********************************************/
  /*************** BANNER NEWS SECTION ****************/
  /**********************************************/      

  $wp_customize->add_section( 'banner_news_section', array(
    'priority' => 2,
    'title' => esc_attr__( 'Slider / Banner News ', 'magazine-newspaper' ),
    'description' => esc_attr__( 'Select the Category for Banner News', 'magazine-newspaper' ),
    'panel' => 'theme_option'
  ) );

  $wp_customize->add_setting( 'banner_news_display', array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_checkbox',
    'default' => true
  ) );

  $wp_customize->add_control( 'banner_news_display', array(
    'label' => esc_attr__( 'Display?','magazine-newspaper' ),
    'section' => 'banner_news_section',
    'settings' => 'banner_news_display',
    'type' => 'checkbox',
    'priority' => 1
  ) ); 

  $wp_customize->add_setting( 'banner_news_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => ''
  ) );
  $wp_customize->add_control( 'banner_news_title', array(
    'label' => esc_attr__( 'Title', 'magazine-newspaper' ),
    'section' => 'banner_news_section',
    'settings' => 'banner_news_title',
    'type' => 'text'
  ) );

 $wp_customize->add_setting( 'banner_news_category', array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_category',
    'default' => ""
  ) );

  $wp_customize->add_control( new Magazine_Newspaper_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'banner_news_category', array(
    'label' => esc_attr__( 'Choose Category', 'magazine-newspaper' ),
    'section' => 'banner_news_section',
    'settings' => 'banner_news_category',
    'type'=> 'dropdown-taxonomies',
  ) ) );


  /*******************************************/
  /*************** RECENT NEWS SECTION ****************/
  /**********************************************/      

  $wp_customize->add_section( 'recent_news_section', array(
    'priority' => 3,
    'title' => esc_attr__( 'Recent News ', 'magazine-newspaper' ),
    'description' => esc_attr__( 'Select the Category for Recent News', 'magazine-newspaper' ),
    'panel' => 'theme_option'
  ) );

  $wp_customize->add_setting( 'recent_news_display', array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_checkbox',
    'default' => true
  ) );

  $wp_customize->add_control( 'recent_news_display', array(
    'label' => esc_attr__( 'Display?','magazine-newspaper' ),
    'section' => 'recent_news_section',
    'settings' => 'recent_news_display',
    'type' => 'checkbox',
    'priority' => 1
  ) ); 

  $wp_customize->add_setting( 'recent_news_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => ''
  ) );

  $wp_customize->add_control( 'recent_news_title', array(
    'label' => esc_attr__( 'Title', 'magazine-newspaper' ),
    'section' => 'recent_news_section',
    'settings' => 'recent_news_title',
    'type' => 'text'
  ) );

  $wp_customize->add_setting( 'recent_news_category', array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_category',
    'default' => ''
  ) );

  $wp_customize->add_control( new Magazine_Newspaper_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'recent_news_category',array(
    'label' => esc_attr__( 'Choose Category', 'magazine-newspaper' ),
    'section' => 'recent_news_section',
    'settings' => 'recent_news_category',
    'type'=> 'dropdown-taxonomies'
  ) ) );


  /*******************************************/
  /*************** CATEGROIES NEWS SECTION ****************/
  /**********************************************/      

  $wp_customize->add_section( 'categories_news_section', array(
    'priority' => 4,
    'title' => esc_attr__( 'Category News', 'magazine-newspaper' ),
    'description' => esc_attr__( 'Select the Category for Recent News', 'magazine-newspaper' ),
    'panel' => 'theme_option'
  ) );

  $wp_customize->add_setting( 'categories_news_display', array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_checkbox',
    'default' => true
  ) );

  $wp_customize->add_control( 'categories_news_display', array(
    'label' => esc_attr__( 'Display?','magazine-newspaper' ),
    'section' => 'categories_news_section',
    'settings' => 'categories_news_display',
    'type' => 'checkbox',
    'priority' => 1
  ) ); 


  for( $i = 1; $i <= 2; $i++ ) {
    $wp_customize->add_setting( 'category_title_' . $i, array(
      'sanitize_callback' => 'sanitize_text_field',
      'default' => ''
    ) );

    $wp_customize->add_control( 'category_title_' . $i, array(
      'label' => esc_attr__( 'Category Title', 'magazine-newspaper' ) . ' ' . $i,
      'section' => 'categories_news_section',
      'settings' => 'category_title_' . $i,
      'type' => 'text'
    ) );

    $wp_customize->add_setting( 'category_news_'.$i, array(
      'sanitize_callback' => 'magazine_newspaper_sanitize_category',
      'default' => ''
    ) );

    $wp_customize->add_control( new Magazine_Newspaper_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'category_news_'.$i,array(
      'label' => esc_attr__( 'Choose Category', 'magazine-newspaper' ) . ' ' . $i,
      'section' => 'categories_news_section',
      'settings' => 'category_news_'.$i,
      'type'=> 'dropdown-taxonomies'
    ) ) );
  }
  


  /**********************************************/
  /*************** ARCHIVE NEWS SECTION ****************/
  /**********************************************/

  $wp_customize->add_section( 'archive_news_section', array(
    'priority' => 10,
    'title' => esc_attr__( 'Archive News ','magazine-newspaper' ),
    'description' => esc_attr__( 'Select the Category for Archive News','magazine-newspaper' ),
    'panel' => 'theme_option'
  ) );

  $wp_customize->add_setting( 'archive_news_display', array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_checkbox',
    'default' => true
  ) );

  $wp_customize->add_control( 'archive_news_display', array(
    'label' => esc_attr__( 'Display?','magazine-newspaper' ),
    'section' => 'archive_news_section',
    'settings' => 'archive_news_display',
    'type' => 'checkbox',
    'priority' => 1
  ) ); 

  $wp_customize->add_setting( 'archive_news_section_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => ''          
  ) );

  $wp_customize->add_control( 'archive_news_section_title', array(
    'label' => esc_attr__( 'Title','magazine-newspaper' ),
    'section' => 'archive_news_section',
    'settings' => 'archive_news_section_title',
    'type' => 'text'
  ) );

  $wp_customize->add_setting( 'archive_news_category',array(
    'sanitize_callback' => 'magazine_newspaper_sanitize_category',
    'default' => ''
  ) );

  $wp_customize->add_control( new Magazine_Newspaper_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'archive_news_category', array(
    'label' => esc_attr__('Choose category','magazine-newspaper'),
    'section' => 'archive_news_section',
    'settings' => 'archive_news_category',
    'type'=> 'dropdown-taxonomies'
    )  
  ) );

  

  /**********************************************/
  /*************** REORDER NEWS SECTION ****************/
  /**********************************************/

  $wp_customize->add_section( 'reorder_news_section', array(
    'priority' => 10,
    'title' => esc_attr__( 'Reorder Sections','magazine-newspaper' ),
    'description' => esc_attr__( 'Reorder Sections','magazine-newspaper' ),
    'panel' => 'theme_option'
  ) );

  $reorder_upgrade_info = '<span class="sticky_info_row"><label class="row-element">' . __( 'This feature is available in ', 'magazine-newspaper' ) . '</label><a href="' . esc_url( 'https://thebootstrapthemes.com/downloads/magazine-newspaper-pro/' ) . '" target="_blank">' . __( 'Pro Version', 'magazine-newspaper' ) . '</a></span><br />';

  $wp_customize->add_setting( 'reorder_upgrade_info', array(
    'default' => '',
    'sanitize_callback' => 'wp_kses_post',
  ) );

  $wp_customize->add_control( new Magazine_Newspaper_Theme_Info( $wp_customize ,'reorder_upgrade_info',array(
    'section' => 'reorder_news_section',
    'description' => $reorder_upgrade_info
  ) ) );

      

	/**********************************************/
	/*************** SOCIAL SECTION ***************/
	/**********************************************/

	$social = array( esc_attr__('facebook', 'magazine-newspaper'), esc_attr__('twitter', 'magazine-newspaper'), esc_attr__('googleplus','magazine-newspaper'), esc_attr__('youtube', 'magazine-newspaper'), esc_attr__('linkedin', 'magazine-newspaper'), esc_attr__('pinterest', 'magazine-newspaper'), esc_attr__('instagram', 'magazine-newspaper') ); 

	$wp_customize->add_section( 'social_section', array(
	  'priority' => 80,
	  'title' => esc_attr__( 'Social Media', 'magazine-newspaper' ),
	  'description' => 'Customize your Social Info',
	  'capability' => 'edit_theme_options',
	) );

	foreach ( $social as $key => $value ) {
		$wp_customize->add_setting( $value . '_textbox', array(
		  'sanitize_callback' => 'esc_url_raw',
		  'default' => ''
		) );

		$wp_customize->add_control( $value . '_textbox', array(
		  'label' => ucwords( $value ),
		  'section' => 'social_section',
		  'settings' => $value . '_textbox',
		  'type' => 'text',
		  'default' =>''
		) );
	}



	/**********************************************/
	/*************** POSt OPTIONS SECTION ***************/
	/**********************************************/


	$wp_customize->add_section( 'post_options_section', array(
	  'priority' => 81,
	  'title' => esc_attr__( 'Post Options', 'magazine-newspaper' ),
	  'description' => 'Show/Hide Author Block in the Post',
	  'capability' => 'edit_theme_options',
	) );

  
    $wp_customize->add_setting( 'show_author', array(
      'sanitize_callback' => 'magazine_newspaper_sanitize_checkbox',
      'default' => true
    ) );

    $wp_customize->add_control( 'show_author', array(
      'label' => esc_attr__( 'Show Author', 'magazine-newspaper' ),
      'section' => 'post_options_section',
      'settings' => 'show_author',
      'type' => 'checkbox',      
    ) );


     
}

add_action( 'customize_register', 'magazine_newspaper_customizer_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magazine_newspaper_customize_preview_js() {
  wp_enqueue_script( 'magazine-newspaper-customizer-preview', esc_url( get_template_directory_uri() ) . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'magazine_newspaper_customize_preview_js' );


function magazine_newspaper_sanitize_category( $input ){
  $output = intval( $input );
  return $output;

}

function magazine_newspaper_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

//checkbox sanitization function
function magazine_newspaper_sanitize_checkbox( $input ){       
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

//file input sanitization function
function magazine_newspaper_sanitize_file( $file, $setting ) {
 
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
     
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
     
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}