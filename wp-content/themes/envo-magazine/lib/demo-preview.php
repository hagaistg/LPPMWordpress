<?php

// Preview Check
function envo_magazine_is_preview() {
	$theme			 = wp_get_theme();
	$theme_name		 = $theme->get( 'TextDomain' );
	$active_theme	 = envo_magazine_get_raw_option( 'stylesheet' );
	// return apply_filters( 'envo_magazine_is_preview', ( $active_theme != strtolower( $theme_name ) && ! is_child_theme() ) ); 
	return apply_filters( 'envo_magazine_is_preview', ( $active_theme != strtolower( $theme_name ) ) );
}

// Get Raw Options
function envo_magazine_get_raw_option( $opt_name ) {
	$alloptions	 = wp_cache_get( 'alloptions', 'options' );
	$alloptions	 = maybe_unserialize( $alloptions );
	return isset( $alloptions[ $opt_name ] ) ? maybe_unserialize( $alloptions[ $opt_name ] ) : false;
}

// Random Images
function envo_magazine_get_preview_img_src( $i = 0 ) {
	// prevent infinite loop
	if ( 6 == $i ) {
		return '';
	}

	$path = get_template_directory() . '/img/demo/';

	// Build or re-build the global dem img array
	if ( !isset( $GLOBALS[ 'envo_magazine_preview_images' ] ) || empty( $GLOBALS[ 'envo_magazine_preview_images' ] ) ) {
		$imgs		 = array( 'image_1.jpg', 'image_2.jpg', 'image_3.jpg', 'image_4.jpg', 'image_5.jpg', 'image_6.jpg' );
		$candidates	 = array();

		foreach ( $imgs as $img ) {
			$candidates[] = $img;
		}
		$GLOBALS[ 'envo_magazine_preview_images' ] = $candidates;
	}
	$candidates	 = $GLOBALS[ 'envo_magazine_preview_images' ];
	// get a random image name
	$rand_key	 = array_rand( $candidates );
	$img_name	 = $candidates[ $rand_key ];

	// if file does not exists, reset the global and recursively call it again
	if ( !file_exists( $path . $img_name ) ) {
		unset( $GLOBALS[ 'envo_magazine_preview_images' ] );
		$i++;
		return envo_magazine_get_preview_img_src( $i );
	}

	// unset all sizes of the img found and update the global
	$new_candidates = $candidates;
	foreach ( $candidates as $_key => $_img ) {
		if ( substr( $_img, 0, strlen( "{$img_name}" ) ) === "{$img_name}" ) {
			unset( $new_candidates[ $_key ] );
		}
	}
	$GLOBALS[ 'envo_magazine_preview_images' ] = $new_candidates;
	return get_template_directory_uri() . '/img/demo/' . $img_name;
}

// Featured Images
function envo_magazine_preview_thumbnail( $input ) {
	if ( empty( $input ) && envo_magazine_is_preview() ) {
		$placeholder = envo_magazine_get_preview_img_src();
		return '<img src="' . esc_url( $placeholder ) . '" class="attachment wp-post-image">';
	}
	return $input;
}

add_filter( 'post_thumbnail_html', 'envo_magazine_preview_thumbnail' );

// Widgets
function envo_magazine_preview_right_sidebar() {
	the_widget( 'envo_magazine_Extended_Recent_Posts', 'title=' . esc_html__( 'Recent Posts', 'envo-magazine' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries">&after_widget=</div>' );
	the_widget( 'WP_Widget_Search', 'title=' . esc_html__( 'Search', 'envo-magazine' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_search">&after_widget=</div>' );
	the_widget( 'WP_Widget_Archives', 'title=' . esc_html__( 'Archives', 'envo-magazine' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_archive">&after_widget=</div>' );
	the_widget( 'WP_Widget_Categories', 'title=' . esc_html__( 'Categories', 'envo-magazine' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_categories">&after_widget=</div>' );
}

function envo_magazine_preview_top_sidebar() {
	the_widget( 'WP_Widget_Text', 'text=<img src="' . get_template_directory_uri() . '/img/demo/banner-728x90.jpg" class="attachment wp-post-image" >', 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="widget text-center widget_text">&after_widget=</div>' );
}

// Main Menu
function envo_magazine_preview_navigation() {
	$pages	 = get_pages();
	$i		 = 0;
	foreach ( $pages as $page ) {
		if ( ++$i > 6 )
			break;
		$menu_name	 = esc_html( $page->post_title );
		$menu_link	 = get_page_link( $page->ID );

		if ( get_the_ID() == $page->ID ) {
			$current_class = "current_page_item current-menu-item";
		} else {
			$current_class = '';
		}

		$menu_class = "page-item-" . $page->ID;
		echo "<li class='page_item " . esc_attr( $menu_class ) . " $current_class'><a href='" . esc_url( $menu_link ) . "'>" . esc_html( $menu_name ) . "</a></li>";
	}
}

function envo_magazine_home_widgets() {
	$number = 5;
	$categories	 = get_categories();
	$view_all_text = esc_html__( 'View All', 'envo-magazine' );
	if ( $number > count( $categories ) )
		$number	= count( $categories );

	// If no categories are available or none were requested, return an empty array
	if ( $number === 0 ) 
		return array();
	shuffle( $categories );
	foreach ( $categories as $key ) {
		$cat[]	 = $key->term_id;
		$name[]	 = $key->name;
	}
	$number_cat = $number - 1;
	$random_cat1 = rand(0, $number_cat);
	$random_cat2 = rand(0, $number_cat);
	$random_cat3 = rand(0, $number_cat);
	if ( (!is_active_sidebar( 'envo-magazine-homepage-area' ) && !is_active_sidebar( 'envo-magazine-homepage-area-2' ) && !is_active_sidebar( 'envo-magazine-homepage-area-2-sidebar' ) && !is_active_sidebar( 'envo-magazine-homepage-area-3' ) && !is_active_sidebar( 'envo-magazine-homepage-area-4' ) && !is_active_sidebar( 'envo-magazine-homepage-area-4-sidebar' ) && !is_active_sidebar( 'envo-magazine-homepage-area-5' ) ) || envo_magazine_is_preview() ) {
		?>
		<div class="homepage-main-content-page">
			<div class="homepage-area"> 
				<?php
				the_widget( 'envo_magazine_split_images_News', 'title=', 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries">&after_widget=</div>' );
				?>
			</div>
			<div class="row">
				<div class="homepage-area-2 col-md-8">
					<?php
					the_widget( 'envo_magazine_Featured_Column_News', 'view_all_text=' . $view_all_text . '&mix_category=' . $cat[absint($random_cat1)] . '&title=' . $name[absint($random_cat1)], '&before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries">&after_widget=</div>' );
					?>
				</div>	
				<div class="homepage-area-2-sidebar col-md-4">	
					<?php
					the_widget( 'envo_magazine_Extended_Recent_Posts', 'title=' . esc_html__( 'Recent Posts', 'envo-magazine' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries">&after_widget=</div>' );
					?>
				</div>
			</div>
			<div class="homepage-area-3">
				<?php
				the_widget( 'envo_magazine_Three_Column_News', 'view_all_text=' . $view_all_text . '&mix_category='.$cat[absint($random_cat2)].'&title=' . $name[absint($random_cat2)], 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries">&after_widget=</div>' );
				?>
			</div>
			<div class="row">
				<div class="homepage-area-area-4 col-md-8">
					<?php
					the_widget( 'envo_magazine_Mix_Column_News', 'view_all_text=' . $view_all_text . '&mix_category='.$cat[absint($random_cat3)].'&title=' . $name[absint($random_cat3)], 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries">&after_widget=</div>' );
					?>
				</div>	
				<div class="homepage-area-area-4-sidebar col-md-4">
					<?php
					the_widget( 'envo_magazine_Popular_Posts', 'title=' . esc_html__( 'Popular posts', 'envo-magazine' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries">&after_widget=</div>' );
					?>
				</div>
			</div>
		</div> 
		<?php
	} else {
		get_template_part( 'template-parts/homepage', 'widgets' );
	}
}
