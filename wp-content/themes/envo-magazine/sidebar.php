<?php if ( envo_magazine_is_preview() ) { ?>
	<aside id="sidebar" class="col-md-4">
		<?php envo_magazine_preview_right_sidebar(); ?>
	</aside>
<?php } else if ( is_active_sidebar( 'envo-magazine-right-sidebar' ) ) { ?>
	<aside id="sidebar" class="col-md-4">
		<?php dynamic_sidebar( 'envo-magazine-right-sidebar' ); ?>
	</aside>
<?php } ?>
