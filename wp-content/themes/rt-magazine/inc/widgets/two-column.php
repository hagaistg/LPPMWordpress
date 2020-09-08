<?php
/**
 * Register Two Column Widgets.
 *
 * @package RT_Magazine
 */

function RT_Magazine_Home_Featured_Action_Two_Column() {

  register_widget( 'RT_Magazine_Home_Two_Column' );
  
}
add_action( 'widgets_init', 'RT_Magazine_Home_Featured_Action_Two_Column' );


/**
* 
*/
class RT_Magazine_Home_Two_Column extends WP_Widget
{
	
	function __construct()	{
		
		global $control_ops;

		$widget_ops = array(
		  'classname'   => 'life-style-blog default-padding',
		  'description' => esc_html__( 'Displays latest posts or posts from a choosen category.', 'rt-magazine' ),
		);		

		parent::__construct( 'RT_Magazine_Home_Two_Column',esc_html__( 'RT Magazine: Two Column', 'rt-magazine' ), $widget_ops, $control_ops );
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
 	   

		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args );
    	
        $category  = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4; 

		$category_title = get_cat_name($category);
		$category_link = get_category_link($category);    

        echo $before_widget;

	        $two_column_args = array(
	            'posts_per_page' => absint( $number ),
	            'post_type' => 'post',
	            'post_status' => 'publish',
	            'post__not_in' => get_option( 'sticky_posts' ),      
	        );

	        if ( absint( $category ) > 0 ) {
	          $two_column_args['cat'] = absint( $category );
	        }
	        $the_query = new WP_Query( $two_column_args ); 

	        if ($the_query->have_posts()) : $count= 0; ?>

	        	<?php $post_count = $the_query->post_count;?>

	        		<?php if( !empty( $category ) ): ?>

						<header class="entry-header heading">
							<h2 class="entry-title"><span><a href="<?php echo esc_url( $category_link);?>"><?php echo esc_html( $category_title );?></a></span></h2>
						</header>

					<?php endif; ?>

					<div class="row">
	                	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++;?>
							<?php 	
								$image_class = '';								
								if( !has_post_thumbnail() ){
									$image_class= 'no-image';
								}
							?>
							<div class="custom-col-6 <?php echo esc_attr( $image_class);?>">
								<div class="post">

									<?php if ( has_post_thumbnail() ): ?>
										<figure class="featured-image">
											<?php the_post_thumbnail( 'rt-magazine-two-column' );?>
										</figure>
									<?php endif;?>

									<div class="post-content">

										<header class="entry-header">
											<h3 class="entry-title">
												<a href="<?php the_permalink();?>"><?php the_title();?></a>
											</h3>
										</header>
										
										<div class="entry-meta">
											<?php rt_magazine_posted_by(); ?>
											<?php rt_magazine_posted_on(); ?>
										</div>
									</div>
								</div>
								<?php if ( $count == $post_count) { ?>
				                  	<div class="load-button-wrap">
				                    	<a href="<?php echo esc_url( $category_link);?>" class="load-button"><?php echo esc_html__( 'More', 'rt-magazine' ); ?></a>
				                  	</div>
          	
								<?php } ?>
							</div>
							 
						<?php endwhile;
						wp_reset_postdata();?>
					</div>

					

				
	        <?php endif;

        echo $after_widget;
    } 		      		
}