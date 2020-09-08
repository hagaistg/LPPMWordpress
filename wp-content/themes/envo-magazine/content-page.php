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
					<div class="main-content-page">
						<header>                              
							<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
							<time class="posted-on published" datetime="<?php the_time( 'Y-m-d' ); ?>"></time>                                                        
						</header>                            
						<div class="entry-content">                              
							<?php do_action( 'envo_magazine_before_content' ); ?>
							<?php the_content(); ?>
							<?php do_action( 'envo_magazine_after_content' ); ?>
						</div>                               
						<?php wp_link_pages(); ?>                                                                                     
						<?php comments_template(); ?>
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
