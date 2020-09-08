<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package RT_Magazine
 */

if ( ! function_exists( 'rt_magazine_top_header' ) ) :
	/**
	 * Top Heading
 	 *
	 * @since 1.0.0
	 */
function rt_magazine_top_header() {
	?>
	<?php $enable_top_header = rt_magazine_get_option( 'enable_top_header' );
	if ( true == $enable_top_header) : ?>
	<?php $enable_social_icon = rt_magazine_get_option( 'enable_social_icon' ); 
		$top_bar_class = 'topbar';
		if( !has_nav_menu( 'social-media' ) || false == $enable_social_icon ){
			$top_bar_class = 'topbar no-share-icon';
		}		
	?>
		<div class="<?php echo esc_attr( $top_bar_class);?>">
			<div class="container">
				<div class="topbar-wrapper">
		
					<div class="topbar-left">
						<?php $top_header_left = rt_magazine_get_option( 'top_header_left' ); ?>

						<?php if( 'menu' == $top_header_left) :?>
							<div class="tobbar-button">
								<?php wp_nav_menu( array(
									'theme_location'  => 'top-menu',
									'menu_class' => 'top-bar-menu',
									'container'       => false,							
									'depth'           => 1,
									'fallback_cb'     => false,

									) ); 
								?>
							</div>
						<?php endif;?>					

						<?php if( 'social-media' == $top_header_left) :?>
							<div class="social-links-top-bar inline-social-icons social-links">
								<div class="share-icon">
									<?php wp_nav_menu( array(
										'theme_location'  => 'social-media',
										'container'       => false,							
										'depth'           => 1,
										'fallback_cb'     => false,

										) ); 
									?>
								</div>	
							</div>
						<?php endif;?>	

						<?php if( 'address' == $top_header_left) :?>
							<?php $header_address = rt_magazine_get_option('header_address');
							$header_number = rt_magazine_get_option('header_number');
							$header_email = rt_magazine_get_option('header_email');?>
							<div class="top-bar-address">
								<ul class="top-address">
									<?php if(!empty($header_address)):?>
										<li>
											<a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $header_number ) ); ?>"><i class="fa fa-phone"></i><?php echo esc_attr($header_number);?></a>
										</li>
									<?php endif;?>

									<?php if(!empty($header_address)):?>
										<li><i class="fa fa-map-marker"></i><?php echo esc_html( $header_address );?></li>
									<?php endif;?>

									<?php if(!empty($header_email)):?>
										<li>
											<a href="mailto:<?php echo esc_attr($header_email);?>"><i class="fa fa-envelope"></i><?php echo esc_attr( antispambot( $header_email ) ); ?></a>
										</li>
									<?php endif;?>									
								</ul>	
							</div>							
						<?php endif;?>	

						<?php if ( 'current-date' == $top_header_left) :?>
							<div class="date-section">
								<?php echo esc_html( date_i18n( 'l, F d, Y' ) ); ?>
							</div>
						<?php endif;?>
							
					</div>
					<div class="topbar-right">
						<div class="top-menu-toggle_bar_wrapper">
							<div class="top-menu-toggle_trigger">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<div class="top-menu-toggle_body_wrapper hide-menu">
							<?php $top_header_right = rt_magazine_get_option( 'top_header_right' ); ?>

							<?php if( 'menu' == $top_header_right) :?>
								<div class="tobbar-button">
									<?php wp_nav_menu( array(
										'theme_location'  => 'top-menu',
										'menu_class' 	=> 'top-bar-menu',
										'container'       => false,							
										'depth'           => 1,
										'fallback_cb'     => false,

										) ); 
									?>
								</div>
							<?php endif;?>						

							<?php if( 'social-media' == $top_header_right) :?>
								<div class="social-links-top-bar inline-social-icons social-links">
									
										<?php wp_nav_menu( array(
											'theme_location'  => 'social-media',
											'container'       => false,							
											'depth'           => 1,
											'fallback_cb'     => false,

											) ); 
										?>
									
								</div>
							<?php endif;?>	

							<?php if( 'address' == $top_header_right) :?>
								<?php $header_address = rt_magazine_get_option('header_address');
								$header_number = rt_magazine_get_option('header_number');
								$header_email = rt_magazine_get_option('header_email');?>
								<div class="top-bar-address">
									<ul class="top-address">
										<?php if(!empty($header_address)):?>
											<li>
												<a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $header_number ) ); ?>"><i class="fa fa-phone"></i><?php echo esc_attr($header_number);?></a>
											</li>
										<?php endif;?>

										<?php if(!empty($header_address)):?>
											<li><i class="fa fa-map-marker"></i><?php echo esc_html( $header_address );?></li>
										<?php endif;?>

										<?php if(!empty($header_email)):?>
											<li>
												<a href="mailto:<?php echo esc_attr($header_email);?>"><i class="fa fa-envelope"></i><?php echo esc_attr( antispambot( $header_email ) ); ?></a>
											</li>
										<?php endif;?>									
									</ul>
								</div>								
							<?php endif;?>	

							<?php if ( 'current-date' == $top_header_right) :?>
								<div class="date-section">
									<?php echo esc_html( date_i18n( 'l, F d, Y' ) ); ?>
								</div>
							<?php endif;?>
							<?php $enable_social_icon = rt_magazine_get_option( 'enable_social_icon' ); ?>
							<?php if ( true == $enable_social_icon ) : 
								if ( has_nav_menu( 'social-media' ) ) { ?>
									<div class="top-bar-social-links inline-social-icons social-links">
										<div class="share-icon"><i class="fa fa-share-alt"></i></div>
										<?php wp_nav_menu( array(
											'theme_location'  => 'social-media',
											'menu_class'	  => 'share-wrapper', 
											'container'       => false,							
											'depth'           => 1,
											'fallback_cb'     => false,

											) ); 
										?>
									</div>
								<?php }  
							endif;?>									
						</div>
					</div>
				</div>
			</div>
		</div>	
	<?php 
	endif;	
}

endif;
add_action( 'rt_magazine_action_header', 'rt_magazine_top_header', 10);

if ( ! function_exists( 'rt_magazine_site_branding' ) ) :
	/**
	 * Site branding 
 	 *
	 * @since 1.0.0
	 */
function rt_magazine_site_branding() {
	?>
	<?php $header_layout = rt_magazine_get_option( 'header_layout' ); ?>
	<div class="hgroup-wrap">
		<div class="container">
			<section class="site-branding"> <!-- site branding starting from here -->
				<?php $site_identity = rt_magazine_get_option( 'site_identity' );				
					$title = get_bloginfo( 'name', 'display' );
					$description    = get_bloginfo( 'description', 'display' );

					if( 'logo-only' == $site_identity){

						if ( has_custom_logo() ) {

							the_custom_logo();

						}
					} elseif( 'logo-text' == $site_identity){

						if ( has_custom_logo() ) {

							the_custom_logo();

						}

						if ( $description ) {
							echo '<p class="site-description">'.esc_attr( $description ).'</p>';
						}

					} elseif( 'title-only' == $site_identity && $title ){ ?>

						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php 

					}elseif( 'title-text' == $site_identity){ 
						
						if( $title ){ ?>

							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php 
						}

						if ( $description ) {

							echo '<p class="site-description">'.esc_attr( $description ).'</p>';

						}
						
				} ?> 				
			</section> <!-- site branding ends here -->

			<?php if( 'layout-2' == $header_layout):
				if( is_active_sidebar( 'header-advertiseent-section' ) ){
					dynamic_sidebar( 'header-advertiseent-section' );
				}	
			endif;?>	
		</div>

		<?php if( 'layout-1' == $header_layout || 'layout-2' == $header_layout ): ?>
			<div id="navbar" class="navbar">  <!-- navbar starting from here -->
				<div class="container">
					<nav id="site-navigation" class="navigation main-navigation">
						<?php $enable_home_icon = rt_magazine_get_option( 'enable_home_icon' ); ?>
						<?php if ( true == $enable_home_icon) : ?>
							<div class="home-icon active-true">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_self"><i class="fa fa-home"></i></a>
							</div>
						<?php endif; ?>
						
						<div class="menu-content-wrapper">						
			        		<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',				
										'container_class' => 'menu-top-menu-container',
			            				'items_wrap' => '<ul>%3$s</ul>',
										'fallback_cb'    => 'wp_page_menu',
										)
									);
							?>						
						</div>
					</nav>
					<?php $enable_search_icon = rt_magazine_get_option( 'enable_search_icon' ); ?>
					<?php if ( true == $enable_search_icon) : ?>
						<div id="left-search" class="search-container">
							<div class="search-toggle-wrapper">
								<div class="search-toggle"> 
								</div>
								<div class="search-section">
									<?php get_search_form();?>                  
									<span class="search-arrow"></span>
								</div>
							</div>	            
						</div>
					<?php endif;?>
				</div>
			</div> <!-- navbar ends here -->	
		<?php endif; ?>	

	</div>		
	<?php 
}
endif;
add_action( 'rt_magazine_action_header', 'rt_magazine_site_branding', 15 );

if ( ! function_exists( 'rt_magazine_featured_slider' ) ) :
	/**
	 * Featured Slider
 	 *
	 * @since 1.0.0
	 */
function rt_magazine_featured_slider() {
	?>
	<?php if ( !is_front_page() ) { 
		return;
	} ?>	
	<?php if ( is_active_sidebar( 'featured-slider-section' ) ) : ?>
		<div class="container">
			<?php dynamic_sidebar( 'featured-slider-section' ); ?>
		</div>	
	<?php endif;?>
	<?php 
}
endif;

add_action( 'rt_magazine_action_header', 'rt_magazine_featured_slider', 20 );

if ( ! function_exists( 'rt_magazine_footer_widgets' ) ) :
	/**
	 * Footer Menu
 	 *
	 * @since 1.0.0
	 */
function rt_magazine_footer_widget() {
	?>
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) ) : ?>
	
		<div class="widget-area"> <!-- widget area starting from here -->
			<div class="container">
				<div class="row">
					<?php
					$column_count = 0;
					$class_coloumn =12;
					for ( $i = 1; $i <= 3; $i++ ) {
						if ( is_active_sidebar( 'footer-' . $i ) ) {
							$column_count++;
							$class_coloumn = 12/$column_count;
						}
					} ?>

					<?php $column_class = 'custom-col-' . absint( $class_coloumn );
					for ( $i = 1; $i <= 3 ; $i++ ) {
						if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
							<div class="<?php echo esc_attr( $column_class ); ?>">
								<?php dynamic_sidebar( 'footer-' . $i ); ?>
							</div>
						<?php }
					} ?>
				</div>
			</div>

		</div> <!-- widget area starting from here -->
	<?php endif;?> 	

	<?php 
}
endif;
add_action( 'rt_magazine_action_footer', 'rt_magazine_footer_widget', 10 );


if ( ! function_exists( 'rt_magazine_footer_copyright' ) ) :
	/**
	 * Footer Copyright 	 *
	 * @since 1.0.0
	 */
function rt_magazine_footer_copyright() {
	?>
	<div class="site-generator"> <!-- site-generator starting from here -->
		<div class="container">
				<?php 
				
				// Powered by content.
				$powered_by_text = sprintf( __( 'Theme of %s', 'rt-magazine' ), '<a target="_blank" rel="designer" href="https://rigorousthemes.com/">Rigorous Themes</a>' );  
				?>
				<span class="copy-right"><?php echo wp_kses_post($powered_by_text);?></span>
				
		</div> 
	</div> <!-- site-generator ends here -->       
	<div class="back-to-top">
		<a href="#masthead" title="Go to Top" class="fa-angle-up"></a>       
	</div>
	<?php 
}
endif;
add_action( 'rt_magazine_action_footer', 'rt_magazine_footer_copyright', 15 );
