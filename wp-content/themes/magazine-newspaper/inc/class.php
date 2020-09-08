<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;
/**
 * Customize Control for Taxonomy Select
 */
class Magazine_Newspaper_Customize_Dropdown_Taxonomies_Control extends WP_Customize_Control {

  public $type = 'dropdown-taxonomies';

  public $taxonomy = '';


  public function __construct( $manager, $id, $args = array() ) {

    $magazine_newspaper_taxonomy = 'category';
    if ( isset( $args['taxonomy'] ) ) {
      $taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
      if ( true === $taxonomy_exist ) {
        $our_taxonomy = esc_attr( $args['taxonomy'] );
      }
    }
    $args['taxonomy'] = $magazine_newspaper_taxonomy;
    $this->taxonomy = esc_attr( $magazine_newspaper_taxonomy );

    parent::__construct( $manager, $id, $args );
  }

  public function render_content() {

    $tax_args = array(
      'hierarchical' => 0,
      'taxonomy'     => $this->taxonomy,
    );
    $all_taxonomies = get_categories( $tax_args );

    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
         <select <?php echo esc_url($this->link()); ?>>
            <?php
              printf('<option value="%s" %s>%s</option>', '', selected(esc_attr($this->value()), '', false), esc_attr__( 'Recent Posts', 'magazine-newspaper' ) );
             ?>
            <?php if ( ! empty( $all_taxonomies ) ): ?>
              <?php foreach ( $all_taxonomies as $key => $tax ): ?>
                <?php
                  printf('<option value="%s" %s>%s</option>', esc_attr($tax->term_id), selected( esc_attr($this->value()), esc_attr($tax->term_id), false), esc_html($tax->name) );
                 ?>
              <?php endforeach ?>
           <?php endif ?>
         </select>

    </label>
    <?php
  }

}