<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RT_Magazine
 */

?>

  <?php
  /**
   * Hook - rt_magazine_action_after_content.
   *
   * @hooked rt_magazine_content_end - 10
   */
  do_action( 'rt_magazine_action_after_content' );
  ?>

  <?php
  /**
   * Hook - rt_magazine_action_before_footer.
   *
   * @hooked rt_magazine_add_footer_bottom_widget_area - 5
   * @hooked rt_magazine_footer_start - 10
   */
  do_action( 'rt_magazine_action_before_footer' );
  ?> 
  <?php
    /**
     * Hook - rt_magazine_action_footer.
     *
     * @hooked rt_magazine_footer_copyright - 10
     */
    do_action( 'rt_magazine_action_footer' );
  ?>
  <?php
  /**
   * Hook - rt_magazine_action_before_footer.
   *
   * @hooked rt_magazine_add_footer_bottom_widget_area - 5
   * @hooked rt_magazine_footer_start - 10
   */
  do_action( 'rt_magazine_action_after_footer' );
  ?>  

  <?php
  /**
   * Hook - rt_magazine_action_after.
   *
   * @hooked rt_magazine_page_end - 10   * 
   */
  do_action( 'rt_magazine_action_after' );
  ?>
<?php wp_footer(); ?>

</body>
</html>
