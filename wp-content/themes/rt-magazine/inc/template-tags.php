<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package RT_Magazine
 */

if ( ! function_exists( 'rt_magazine_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function rt_magazine_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'rt-magazine' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$enable_posted_on = rt_magazine_get_option( 'enable_posted_on' );

		if ( true == $enable_posted_on) {

			echo '<span class="posted-on"><i class="fa fa-clock-o"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

		}	
	}
endif;

if ( ! function_exists( 'rt_magazine_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function rt_magazine_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'rt-magazine' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		$enable_author = rt_magazine_get_option( 'enable_author' );

		if ( true == $enable_author) {

			echo '<span class="byline"><i class="fa fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.
		}

	}
endif;

if ( ! function_exists( 'rt_magazine_tages' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function rt_magazine_tages() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'rt-magazine' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'rt-magazine' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

	}
endif;

if ( ! function_exists( 'rt_magazine_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function rt_magazine_entry_footer() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'rt-magazine' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'rt-magazine' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'rt_magazine_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function rt_magazine_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		?>
	</a>

	<?php endif; // End is_singular().
}
endif;

if ( ! function_exists( 'rt_magazine_entry_categories' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function rt_magazine_entry_categories() {

		global $post;
		$post_id         = $post->ID;
		$categories_list = get_the_category( $post_id );
		if ( ! empty( $categories_list ) ) {
			?>
			<div class="post-cat-list">
				<?php
				foreach ( $categories_list as $cat_data ) {
					$cat_name = $cat_data->name;
					$cat_id   = $cat_data->term_id;
					$cat_link = get_category_link( $cat_id );
					?>
					<span class="cat-links rt-magazine-cat-<?php echo esc_attr( $cat_id ); ?>">
						<a href="<?php echo esc_url( $cat_link ); ?>"><?php echo esc_html( $cat_name ); ?></a>
					</span>
					<?php
				}
				?>
			</div>
			<?php
		}


	}
endif;
