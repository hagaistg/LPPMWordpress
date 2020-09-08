<?php
/**
 * Functions to provide support for the One Click Demo Import plugin (wordpress.org/plugins/one-click-demo-import)
 *
 * @package RT_Magazine
 */
/**
* Remove branding
*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/*Import demo data*/
if ( ! function_exists( 'rt_magazine_demo_import_files' ) ) :
    function rt_magazine_demo_import_files() {
        return array(
            array(
                'import_file_name'             => 'Mag Lite',                
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo-content/rtmagazine.wordpress.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-content/rt-magazine-widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo-content/rt-magazine-export.dat',
                'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.It may take around 6-30 minutes depending upon your hosting.', 'rt-magazine' ),
                 'preview_url'                  => 'https://demo.rigorousthemes.com/rt-magazine/',
            ),
        );  
    }
    add_filter( 'pt-ocdi/import_files', 'rt_magazine_demo_import_files' );
endif;

/**
 * Action that happen after import
 */
if ( ! function_exists( 'rt_magazine_after_demo_import' ) ) :
function rt_magazine_after_demo_import( $selected_import ) {
    
        //Set Menu
        $primary_menu = get_term_by('name', 'Main Menu', 'nav_menu'); 
        $social_menu = get_term_by('name', 'Social Menu', 'nav_menu');   
        $top_menu = get_term_by('name', ' Top Menu', 'nav_menu');

        set_theme_mod( 'nav_menu_locations' , array( 
              'menu-1' => $primary_menu->term_id,
              'top-menu' => $top_menu->term_id,
              'social-media' => $social_menu->term_id, 


             ) 
        );

    // Set Up the Front page
        $front_page = get_page_by_title( 'Sample Page' );      

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page -> ID );        
  
    
}
add_action( 'pt-ocdi/after_import', 'rt_magazine_after_demo_import' );
endif;







