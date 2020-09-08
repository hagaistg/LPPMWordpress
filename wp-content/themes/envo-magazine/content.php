<article>
	<div <?php post_class(); ?>>                    
		<div class="news-item row">
			<?php envo_magazine_thumb_img( 'envo-magazine-med', 'col-md-6' ); ?>
			<div class="news-text-wrap col-md-6">
				<?php envo_magazine_widget_date_comments(); ?>
				<h2>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<span class="author-meta">
					<span class="author-meta-by"><?php esc_html_e( 'By', 'envo-magazine' ); ?></span>
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
						<?php the_author(); ?>
					</a>
				</span>

				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div><!-- .post-excerpt -->

			</div><!-- .news-text-wrap -->

		</div><!-- .news-item -->
	</div>
</article>
