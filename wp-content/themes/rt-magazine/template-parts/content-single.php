<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RT_Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="detail-page-wrapper default-padding">

		<div class="post">
			<figure class="featured-image">
				<?php rt_magazine_post_thumbnail(); ?>
			</figure>
			<div class="post-content">
				<header class="entry-header">
					<h3 class="entry-title">
						<?php the_title();?>
					</h3>
					<div class="entry-meta-wrapper">
						<div class="entry-meta">
							<?php rt_magazine_tages();?>
							<?php rt_magazine_posted_on(); ?>
						</div>
						<div class="entry-meta">
							<?php rt_magazine_entry_footer();?>
						</div>
					</div>
				</header>
				<div class="entry-content">
					<?php
						the_content();
					?>
				</div>
			</div>
		</div>

		

		<?php 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rt-magazine' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
