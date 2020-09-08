<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RT_Magazine
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php $sidebar_layout = rt_magazine_get_option('layout_options'); 

if ( 'no-sidebar' !== $sidebar_layout ) { ?>
	<div id="secondary" class="custom-col-4"><!-- secondary starting from here -->

		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
	</div><!-- #secondary -->
<?php } 
