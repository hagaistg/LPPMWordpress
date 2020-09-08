<?php
/**
 * The sidebar containing the main widget area in home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RT_Magazine
 */

if ( ! is_active_sidebar( 'home-sidebar-section' ) ) {
	return;
}
?>

<div id="secondary" class="custom-col-4"><!-- secondary starting from here -->

		<?php dynamic_sidebar( 'home-sidebar-section' ); ?>
		
</div><!-- #secondary -->

