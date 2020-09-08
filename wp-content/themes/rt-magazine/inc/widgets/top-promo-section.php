<?php
/**
 * Register Home Featured Slider Widgets.
 *
 * @package RT_Magazine
 */

function RT_Magazine_Action_Top_Promo_Section() {

  register_widget( 'RT_Magazine_Top_Promo_Section' );
  
}
add_action( 'widgets_init', 'RT_Magazine_Action_Top_Promo_Section' );


/**
* 
*/
class RT_Magazine_Top_Promo_Section extends WP_Widget
{
	
	function __construct()	{
		
		global $control_ops;

		$widget_ops = array(
		  'classname'   => 'top-promo-section',
		  'description' => esc_html__( 'Displays latest posts or posts from a choosen category.', 'rt-magazine' ),
		);		

		parent::__construct( 'RT_Magazine_Top_Promo_Section',esc_html__( 'RT Magazine: Top Promo Section', 'rt-magazine' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
		  'category'         => '',     
		  'number'           => 4, 		  
		) );

		$category = isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;    
		
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Select Category:', 'rt-magazine' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
	                'orderby'         => 'name',
	                'hide_empty'      => 0,
	                'class' 		  => 'widefat',				
					'show_option_none' => '',
					'show_option_all'  => esc_html__('&mdash; Select &mdash;','rt-magazine'),
					'name'             => esc_attr($this->get_field_name( 'category' )),
					'selected'         => absint( $category ),          
				) );
			?>
		</p>	

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number', 'rt-magazine' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="4" />
	    </p>


	<?php 
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['category'] = absint( $new_instance['category'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_post_meta'] = (bool) $new_instance['show_post_meta'];  	   

		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args );
    	
        $category  = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4;           

        echo $before_widget;

	        $promo_args = array(
	            'posts_per_page' => absint( $number ),
	            'post_type' => 'post',
	            'post_status' => 'publish',
	            'post__not_in' => get_option( 'sticky_posts' ),      
	        );

	        if ( absint( $category ) > 0 ) {
	          $promo_args['cat'] = absint( $category );
	        }
	        $the_query = new WP_Query( $promo_args ); 

	        if ($the_query->have_posts()) : $count= 0; ?>
				<div class="featured-news-section">
					<div class="row">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>
							<?php 
								$post_class ='custom-col-7';
								$image_size = 'rt-magazine-top-promo-default';
								if( $count%2 == 0){
									$post_class = 'custom-col-5';
									$image_size = 'rt-magazine-top-promo';
								}
							?>
	                		<?php 
							$image_class = '';								
							if( !has_post_thumbnail() ){
								$image_class= 'no-image';
							}

	                		?>							
							<div class="<?php echo esc_attr( $post_class );?>">
								<div class="post default-padding">

									<div class="<?php echo esc_attr( $image_class);?> image-section">
										<?php if( has_post_thumbnail() ): ?>

											<figure class="featured-image">
												<?php the_post_thumbnail( $image_size); ?>
											</figure>

										<?php endif; ?>

									</div>

									<div class="post-content">

										<header class="entry-header">
											<?php rt_magazine_entry_categories(); ?>
											<h3 class="entry-title">
												<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
											</h3>
										</header>

										
										<div class="entry-meta">
											<?php rt_magazine_posted_by(); ?>
											<?php rt_magazine_posted_on(); ?>
										</div>
										
										
									</div>
								</div>
							</div>							

						<?php endwhile;
						wp_reset_postdata();?>
					</div>
				</div>
				
	        <?php endif;

        echo $after_widget;
    } 		      		
}