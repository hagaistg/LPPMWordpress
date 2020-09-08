<?php
/**
 * The template for displaying home page.
 * @package RT_Magazine
 */

get_header(); ?>
<?php 
	$home_layout_class ='custom-col-8';
	$enable_home_sidebar = rt_magazine_get_option( 'enable_home_sidebar' );

	if( is_active_sidebar('home-sidebar-section') &&  true == $enable_home_sidebar){
		$home_layout_class = 'custom-col-8';
	}
	else{
		$home_layout_class = 'custom-col-12';
	}	

?>

<?php if ( 'posts' != get_option( 'show_on_front' ) ) { ?>
	
	<?php if ( is_active_sidebar( 'top-promo-section' ) ) : ?>
		<div class="container">
			<?php dynamic_sidebar( 'top-promo-section' ); ?>
		</div>
	<?php endif; ?>

	<div class="container">
		<div class="row">

			<div id="primary" class="content-area <?php echo esc_attr( $home_layout_class);?>">
				<main id="main" class="site-main">

					<?php if ( is_active_sidebar( 'home-widget-section' ) ) : ?>

						<?php dynamic_sidebar( 'home-widget-section' ); ?>

					<?php endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php $enable_home_sidebar = rt_magazine_get_option( 'enable_home_sidebar' );

				if( true == $enable_home_sidebar ):  
					 get_sidebar( 'home' );
			    endif;
			?>

		</div>
	</div>

<?php } else{ ?>
<?php 
	$layout_class ='custom-col-8';
	$sidebar_layout = rt_magazine_get_option('layout_options'); 

	if( is_active_sidebar('sidebar-1') && 'no-sidebar' !==  $sidebar_layout){
		$layout_class = 'custom-col-8';
	}
	else{
		$layout_class = 'custom-col-12';
	}	

?>
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area <?php echo esc_attr( $layout_class);?>">
				<main id="main" class="site-main">
					<?php $archive_layout = rt_magazine_get_option( 'archive_layout' );
					$archive_layout_class = '';
					if ( 'list' == $archive_layout ) {
						$archive_layout_class = 'flexible-post';
					} elseif ( 'grid' == $archive_layout ) {
						$archive_layout_class = 'post-item-has-2';
					}
					?>					
					<div class="post-item-wrapper <?php echo esc_attr( $archive_layout_class );?>">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>

							<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							do_action( 'rt_magazine_action_navigation' );

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</div>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div>
	</div>
<?php } ?>
<?php
get_footer();