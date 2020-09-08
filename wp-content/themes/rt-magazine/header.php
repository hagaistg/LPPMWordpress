<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RT_Magazine
 */

?><?php
	/**
	 * Hook - rt_magazine_action_doctype.
	 *
	 * @hooked rt_magazine_doctype -  10
	 */
	do_action( 'rt_magazine_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - rt_magazine_action_head.
	 *
	 * @hooked rt_magazine_head -  10
	 */
	do_action( 'rt_magazine_action_head' );
	?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php
		/**
		 * Hook - rt_magazine_action_before.
		 *
		 * @hooked rt_magazine_page_start - 10
		 * @hooked rt_magazine_skip_to_content - 15
		 */
		do_action( 'rt_magazine_action_before' );
	?>
	<?php 
		/**
		 * Hook - rt_magazine_action_before_header
		 *
		 * @hooked rt_magazine_header_start -10
		 *
		 */
		do_action( 'rt_magazine_action_before_header' );
	?>
	<?php 
		/**
		 * Hook - rt_magazine_action_header
		 *
		 * @hooked rt_magazine_header -10
		 *
		 */
		do_action( 'rt_magazine_action_header' );
	?>

	<?php 
	 /**
	  * Hook - rt_magazine_action_after_header
	  *
	  * @hooked rt_magazine_header_end -10
	  *
	  */
	do_action( 'rt_magazine_action_after_header' ); 
	?> 

	<?php
		/**
		 * Hook - rt_magazine_action_before_content.
		 *
		 * @hooked rt_magazine_content_start - 10
		 */
		do_action( 'rt_magazine_action_before_content' );
	?>
