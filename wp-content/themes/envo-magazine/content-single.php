<!-- start content container -->
<div class="row">      
	<?php if ( envo_magazine_is_preview() ) { ?>
		<article class="col-md-8">
	<?php } else { ?>
		<article class="col-md-<?php envo_magazine_main_content_width_columns(); ?>">
	<?php }?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                         
				<div <?php post_class(); ?>>
					<?php envo_magazine_thumb_img( 'envo-magazine-single', '', false ); ?>
					<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
					<?php envo_magazine_widget_date_comments(); ?>
					<span class="author-meta">
						<span class="author-meta-by"><?php esc_html_e( 'By', 'envo-magazine' ); ?></span>
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
							<?php the_author(); ?>
						</a>
					</span>
					<div class="single-content"> 
						<div class="single-entry-summary">
							<?php do_action( 'envo_magazine_before_content' ); ?> 
							<?php the_content(); ?> 
							<?php do_action( 'envo_magazine_after_content' ); ?> 
						</div><!-- .single-entry-summary -->
						<?php wp_link_pages(); ?>
						<?php envo_magazine_entry_footer(); ?>
					</div>
					<div class="single-footer row">
						<div class="col-md-4">
							<?php get_template_part( 'template-parts/template-part', 'postauthor' ); ?>
						</div>
						<div class="col-md-8">
							<?php comments_template(); ?> 
						</div>
					</div>
				</div>        
			<?php endwhile; ?>        
		<?php else : ?>            
			<?php get_template_part( 'content', 'none' ); ?>        
		<?php endif; ?>    
	</article> 
	<?php get_sidebar( 'right' ); ?>
</div>
<!-- end content container -->
