<?php if ( has_nav_menu( 'top_menu_left' ) || has_nav_menu( 'top_menu_right' ) ) : ?>
	<div class="top-menu" >
		<nav id="top-navigation" class="navbar navbar-inverse bg-dark">     
			<div class="container">   
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-2-collapse">
						<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'envo-magazine' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-2-collapse">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'top_menu_left',
						'depth'			 => 5,
						'menu_class'	 => 'nav navbar-nav navbar-left',
						'fallback_cb'	 => 'wp_bootstrap_navwalker::fallback',
						'walker'		 => new wp_bootstrap_navwalker(),
					) );

					wp_nav_menu( array(
						'theme_location' => 'top_menu_right',
						'depth'			 => 5,
						'menu_class'	 => 'nav navbar-nav navbar-right',
						'fallback_cb'	 => 'wp_bootstrap_navwalker::fallback',
						'walker'		 => new wp_bootstrap_navwalker(),
					) );
					?>
				</div>
			</div>    
		</nav> 
	</div>
<?php endif; ?>
<div class="site-header container-fluid">
	<div class="container" >
		<div class="row" >
			<div class="site-heading <?php if ( is_active_sidebar( 'envo-magazine-header-area' ) || envo_magazine_is_preview() ) { echo 'col-md-4'; } ?>" >
				<div class="site-branding-logo">
					<?php the_custom_logo(); ?>
				</div>
				<div class="site-branding-text">
					<?php if ( is_front_page() ) : ?>
						<h1 padding="100px" class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title" style="font-size:300%;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description">
							<?php echo $description; ?>
						</p>
					<?php endif; ?>
				</div><!-- .site-branding-text -->
			</div>
			<?php if ( is_active_sidebar( 'envo-magazine-header-area' ) || envo_magazine_is_preview() ) { ?>
				<div class="site-heading-sidebar col-md-8" >
					<div id="content-header-section" class="text-right">
						<?php
						if ( envo_magazine_is_preview() ) {
							envo_magazine_preview_top_sidebar();
						} else {
							dynamic_sidebar( 'envo-magazine-header-area' );
						}
						?>	
					</div>
				</div>
			<?php } ?>	
		</div>
	</div>
</div>
<?php do_action( 'envo_magazine_before_menu' ); ?> 
<div class="main-menu">
	<nav id="site-navigation" class="navbar navbar-default">     
		<div class="container">   
			<div class="navbar-header">
				<?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('main_menu') ) : ?>
				<?php elseif ( has_nav_menu( 'main_menu' ) ) : ?>
					<div id="main-menu-panel" class="open-panel" data-panel="main-menu-panel">
						<span></span>
						<span></span>
						<span></span>
					</div>
				<?php endif; ?>
			</div> 
			<?php
			if ( is_front_page() ) {
				$home_icon_class = 'home-icon front_page_on';
			} else {
				$home_icon_class = 'home-icon';
			}
			?>
			<ul class="nav navbar-nav search-icon navbar-left hidden-xs">
				<li class="<?php echo $home_icon_class; ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
			</ul>
			<?php
			?>
			<?php
			if ( envo_magazine_is_preview() ) {
				echo '<div class="menu-container"><ul id="main-menu" class="nav navbar-nav navbar-left">';
				envo_magazine_preview_navigation();
				echo '</ul></div>';
			} else {
				wp_nav_menu( array(
					'theme_location'	 => 'main_menu',
					'depth'				 => 5,
					'container'			 => 'div',
					'container_class'	 => 'menu-container',
					'menu_class'		 => 'nav navbar-nav navbar-left',
					'fallback_cb'		 => 'wp_bootstrap_navwalker::fallback',
					'walker'			 => new wp_bootstrap_navwalker(),
				) );
			}
			?>
			<ul class="nav navbar-nav search-icon navbar-right hidden-xs">
				<li class="top-search-icon">
					<a href="#">
						<i class="fa fa-search"></i>
					</a>
				</li>
				<div class="top-search-box">
					<?php get_search_form(); ?>
				</div>
			</ul>
		</div>
		<?php do_action( 'envo_magazine_menu' ); ?>
	</nav> 
</div>
<?php do_action( 'envo_magazine_after_menu' ); ?>
