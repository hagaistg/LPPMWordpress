<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RT_Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_thumbnail() ): ?>
		<figure class="featured-image">
			<?php rt_magazine_post_thumbnail(); ?>
		</figure>
    <?php endif;?>
    <div class="post-content">
        <header class="entry-header">
			<h3 class="entry-title">
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</h3>
			<div class="entry-meta">
				<?php rt_magazine_posted_by(); ?>
				<?php rt_magazine_posted_on(); ?>
			</div>
        </header>
		<div class="entry-content">
			<?php the_excerpt();?>
		</div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
