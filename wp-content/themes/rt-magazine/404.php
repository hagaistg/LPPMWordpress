<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RT_Magazine
 */

get_header(); ?>
<div class="container">
	<div class="row">

		<div id="primary" class="content-area custom-col-12">
			<main id="main" class="site-main">

				<section class="error-404 not-found">

		          	<figure class="error-icon">
		                <img src="<?php echo esc_url(get_template_directory_uri());?>/assest/img/error-image.png" alt="404 Image">
		            </figure>

					<div class="page-content">
						<p><?php esc_html_e( 'Oops... looks like you lost', 'rt-magazine' ); ?></p>

						<?php
							get_search_form();						
						?>

						<a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html__( 'BACK to Home', 'rt-magazine' );?></a>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->

	</div>

</div>	
<?php
get_footer();
