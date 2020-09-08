<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RT_Magazine
 */

get_header(); ?>
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

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?> 

	</div>	
</div>
<?php
get_footer();
