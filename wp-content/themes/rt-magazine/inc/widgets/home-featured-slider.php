<?php
/**
 * Register Home Featured Slider Widgets.
 *
 * @package RT_Magazine
 */

function RT_Magazine_Home_Action_Slider() {

  register_widget( 'RT_Magazine_Home_Slider' );
  
}
add_action( 'widgets_init', 'RT_Magazine_Home_Action_Slider' );


/**
* 
*/
class RT_Magazine_Home_Slider extends WP_Widget
{
	
	function __construct()	{
		
		global $control_ops;

		$widget_ops = array(
		  'classname'   => 'home-featured-slider',
		  'description' => esc_html__( 'Displays latest posts or posts from a choosen category.', 'rt-magazine' ),
		);		

		parent::__construct( 'RT_Magazine_Home_Slider',esc_html__( 'RT Magazine: Home Slider', 'rt-magazine' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
        $defaults[ 'show_post_meta' ]   = true;  
        $defaults[ 'type' ]     		= 'post';
         $defaults[ 'category' ]        = '';      
        for ( $i=0; $i<7; $i++ ) {
            $post_id = 'post_id'.$i;           
            $defaults[$post_id]   = '';

        } 

        for ( $i=0; $i<3; $i++ ) {
            $featured_post_id = 'featured_post_id'.$i;           
            $defaults[$featured_post_id]   = '';

        }          		

		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$type 		= isset( $instance['type'] ) ?  $instance['type'] : 'post';
		$category = isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;  
		$show_post_meta = isset( $instance['show_post_meta'] ) ? (bool) $instance['show_post_meta'] : true;
	?>
		<p>
			<input type="radio" <?php checked( $type, 'post' ) ?> id="<?php echo esc_attr($this->get_field_id( 'type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'type' )); ?>" value="post"/><?php esc_html_e( 'Show Posts', 'rt-magazine' ); ?>
			<br/>
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo esc_attr($this->get_field_id( 'type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'type' )); ?>" value="category"/><?php esc_html_e( 'Show posts from a category', 'rt-magazine' ); ?>
			<br/>
		</p>
		<summary><?php echo esc_html__( 'Category Slider Block', 'rt-magazine' );?></summary>
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
		<summary><?php echo esc_html__( 'Posts Slider Block', 'rt-magazine' );?></summary>

		<?php for ( $i=0; $i<7; $i++ ) { 
 			$post_id = 'post_id'.$i;         
            $post_id    = absint( $instance[ $post_id ] );  			
		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_id'.$i ) ); ?>">
					<?php esc_html_e( 'Select Slider Posts:', 'rt-magazine' ); ?>			
				</label>
	            <?php
	                wp_dropdown_posts( array(
	                    'id'               => $this->get_field_id( 'post_id'.$i ),
	                    'class'            => 'widefat',
	                    'select_name'      => $this->get_field_name( 'post_id'.$i ),
	                    'selected'         => $instance[ 'post_id'.$i ],
	                    'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'rt-magazine' ),
	                    )
	                );
	            ?>
				
			</p>	
		<?php   next( $defaults );
		} ?>
		<summary><?php echo esc_html__( 'Posts Featured Block', 'rt-magazine' );?></summary>

		<?php for ( $i=0; $i<3; $i++ ) { 
 			$featured_post_id = 'featured_post_id'.$i;         
            $featured_post_id    = absint( $instance[ $featured_post_id ] );  			
		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'featured_post_id'.$i ) ); ?>">
					<?php esc_html_e( 'Select Featured Posts:', 'rt-magazine' ); ?>			
				</label>
	            <?php
	                wp_dropdown_posts( array(
	                    'id'               => $this->get_field_id( 'featured_post_id'.$i ),
	                    'class'            => 'widefat',
	                    'select_name'      => $this->get_field_name( 'featured_post_id'.$i ),
	                    'selected'         => $instance[ 'featured_post_id'.$i ],
	                    'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'rt-magazine' ),
	                    )
	                );
	            ?>
				
			</p>	
		<?php   next( $defaults );
		} ?>
		<p>
		    <input class="checkbox" type="checkbox"<?php checked( $show_post_meta ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_meta' )); ?>" />
		    <label for="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>">
		    	<?php echo esc_html__( 'Enable Post Meta', 'rt-magazine' ); ?>
		    	
		    </label>
		</p>					
	 

	<?php 
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'type' ]     = $new_instance['type'];  
        $instance['category'] = absint( $new_instance['category'] );
        for( $i=0; $i<7; $i++ ) {
            $post_id = 'post_id'.$i;               
            $instance[ $post_id]   = absint( $new_instance[ $post_id ] );
        }	
        for( $i=0; $i<3; $i++ ) {
            $featured_post_id = 'featured_post_id'.$i;               
            $instance[ $featured_post_id]   = absint( $new_instance[ $featured_post_id ] );
        }	        	
		$instance['show_post_meta'] = (bool) $new_instance['show_post_meta'];  
		  

		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args );

       $post_array = array();

       for( $i=0; $i<7; $i++ ) {

            $post_id = 'post_id'.$i;                 
            $post_id = isset( $instance[ $post_id ] ) ? $instance[ $post_id ] : '';


            if( !empty( $post_id ) ) {
                array_push( $post_array, $post_id );// Push the category id in the array
            }

       }

       $featured_post_array = array();

       for( $i=0; $i<3; $i++ ) {

            $featured_post_id = 'featured_post_id'.$i;                 
            $featured_post_id = isset( $instance[ $featured_post_id ] ) ? $instance[ $featured_post_id ] : '';


            if( !empty( $featured_post_id ) ) {
                array_push( $featured_post_array, $featured_post_id );// Push the category id in the array
            }

       }       

        $show_post_meta = isset( $instance['show_post_meta'] ) ? $instance['show_post_meta'] : true;
        $type     = isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : 'post';  
        $category  = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

        echo $before_widget; ?>
        <div class="container">
            <div class="row">
            	<div class="custom-col-7">
			        <?php
			        if ( $type == 'post' ) { 
				        $slider_args = array(
				            'posts_per_page' => 7,
				            'post_type' => 'post',
				            'post_status' => 'publish',
				            'post__in'    => $post_array,
				           'orderby' => 'post__in',
				            'post__not_in' => get_option( 'sticky_posts' ),      
				        );
			        } else{
				        $slider_args = array(
				            'posts_per_page' => 7,
				            'post_type' => 'post',
				            'post_status' => 'publish',
				            'post__not_in' => get_option( 'sticky_posts' ),      
				        );

				        if ( absint( $category ) > 0 ) {
				          $slider_args['cat'] = absint( $category );
				        }
			        }

			        $the_query = new WP_Query( $slider_args ); 

			        if ($the_query->have_posts()) : ?>
			        	<section class="featured-slider ">
			                <div id="owl-slider-demo" class="owl-carousel owl-theme owl-slider-demo">
			                	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			                		<?php 
									$image_class = '';								
									if( !has_post_thumbnail() ){
										$image_class= 'no-image';
									}

			                		?>
									<div class="slider-content <?php echo esc_attr( $image_class);?>">

										<?php if ( has_post_thumbnail() ): ?>
											<figure class="slider-image">
												<?php the_post_thumbnail( 'rt-magazine-home-slider' );?>
											</figure>
										<?php endif;?>

										<?php $category = '';
											global $post;
											$category_detail=get_the_category( $post->ID );										
											foreach($category_detail as $cd){
												$category = $cd->cat_ID;
											}
										?>

										<div class="slider-text rt-magazine-cat-<?php echo esc_attr( $category );?>">

											<?php rt_magazine_entry_categories(); ?>

											<h3 class="slider-title"> 
												<a href="<?php the_permalink();?>"><?php the_title();?></a> 
											</h3>

											<?php if( true == $show_post_meta ): ?>
												<div class="entry-meta">
													<?php rt_magazine_posted_by(); ?>
													<?php rt_magazine_posted_on(); ?>
												</div>
											<?php endif; ?>

											<?php $excerpt = rt_magazine_the_excerpt(22);
											if ( !empty( $excerpt ) ): ?>
												<div class="entry-content">
				                                    <?php	                                        
				                                        echo wp_kses_post( wpautop( $excerpt ) );
				                                    ?>
												</div>	
											<?php endif;?>
										</div>
									</div> 
								<?php endwhile;
								wp_reset_postdata();?>
							</div>
						</section>
			        <?php endif; ?>
		        </div>
		        <div class="custom-col-5">
                    <div class="news-grid-section default-padding">
	                	<?php $featured_args = array(
				            'posts_per_page' => 3,
				            'post_type' => 'post',
				            'post_status' => 'publish',
				             'post__in'    => $featured_post_array,
				             'orderby' => 'post__in',
				            'post__not_in' => get_option( 'sticky_posts' ),      
				        );

				        $the_query = new WP_Query( $featured_args ); 

				        if ($the_query->have_posts()) : $count= 0; $total_count= $the_query->post_count; ?>

				        	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++;  ?>
				        		<?php if( $count == 2 ) { 
									echo '<div class="news-grid-item-wrapper">';
								} ?>
								<?php 
									$image_size = 'rt-magazine-home-featured-medium';
									if($count==1){
										$image_size = 'rt-magazine-home-featured-medium';
									}else{
										if( $total_count>2){
											$image_size = 'rt-magazine-home-featured-thumb';
										}
									}
								?>

		        		        <div class="post">
										<?php if ( has_post_thumbnail() ): ?>
											<figure class="slider-image">
												<?php the_post_thumbnail( $image_size );?>
											</figure>
										<?php endif;?>
                                    <div class="post-content">
                                        <header class="entry-header">
 											<?php rt_magazine_entry_categories(); ?>
                                            <h3 class="entry-title">
                                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                            </h3>
                                        </header>
										<?php if( true == $show_post_meta ): ?>
											<div class="entry-meta">
												<?php rt_magazine_posted_by(); ?>
												<?php rt_magazine_posted_on(); ?>
											</div>
										<?php endif; ?>
                                    </div>
                                </div>
			        		<?php endwhile;
			        		wp_reset_postdata();?>

		        		<?php endif;?>
                	</div>
            	</div>
	        </div>
        </div>

        <?php echo $after_widget;
    } 		      		
}