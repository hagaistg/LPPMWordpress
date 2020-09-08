<?php 
/**
 * Basic Theme Function
 * 
 * @package RT_Magazine
 */

if ( ! function_exists( 'rt_magazine_fonts_url' ) ) :

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Font URL.
     */
    function rt_magazine_fonts_url() {

    $fonts_url = '';

    /**
     * Translators: If there are characters in your language that are not
     * supported by Libre Franklin, translate this to 'off'. Do not translate
     * into your own language.
     */
    $barlow = _x( 'on', 'Barlow Condensed font: on or off', 'rt-magazine' );

    if ( 'off' !== $barlow ) {
        $font_families = array();

        $font_families[] = 'Barlow Condensed:200,300,400,500,600,700,800,900';

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
            );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}

endif;

if ( ! function_exists( 'rt_magazine_navigation' ) ) :

    /**
     * Posts navigation.
     *
     * @since 1.0.0
     */
    function rt_magazine_navigation() {

        $pagination_option = rt_magazine_get_option( 'pagination_option' );

        if ( 'default' == $pagination_option) {

            the_posts_navigation(); 

        } else{

            the_posts_pagination( array(
                'mid_size' => 5,
                'prev_text' => __( 'PREV', 'rt-magazine' ),
                'next_text' => __( 'NEXT', 'rt-magazine' ),
            ) );
        }

    }
endif;

add_action( 'rt_magazine_action_navigation', 'rt_magazine_navigation' );
