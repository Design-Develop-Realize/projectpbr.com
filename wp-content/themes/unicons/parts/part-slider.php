<?php
/**
 * Slider template
 *
 * @package unicons
 */

    ?>



        	<?php $slider_rep_image = get_theme_mod( 'slider_rep_image', array(
				array(
			'dropdown_pages' => '',
			'slider_image'=>'',
			'link_url1'  => '',
			'link_url2'  => '',
      'button_text1st'=> esc_attr__( 'Know More', 'unicons' ),
      'button_text2nd'=>esc_attr__( 'Try Now !', 'unicons' ),

				)
			) ); ?>
<?php if( !empty( $slider_rep_image ) ):?>
  <div id="unicons-slider" class="slider-container">
  		<ul class="site-slider">
  			<?php foreach ( $slider_rep_image as $row ) {?>
    			<li>
      				<div class="slider-img " style="background: url(<?php echo esc_url(wp_get_attachment_url( $row['slider_image'] )); ?>) no-repeat;"  >
              </div>
                <?php if ( true == get_theme_mod( 'disable_slider_content', true ) ) : ?>
      					     <?php
						          $dropdown_pages = esc_html( $row['dropdown_pages'] );
							        $args = array(	'post_type' => 'page',
									                    'page_id' => $dropdown_pages,
						    		                  'posts_per_page'=>1,
									                    'order'=>'ASC');

							        $wp_query_unicons = new WP_Query($args);

   								if($wp_query_unicons->have_posts()) {		?>
									<?php  while ($wp_query_unicons->have_posts()) { $wp_query_unicons->the_post();?>
      									<div class="slider-text">
        									<h3 ><?php the_title(); ?></h3>
        										<?php the_excerpt(); ?>
                                                <?php if( !empty( $row['link_url1'] ) ):?>
                                    <a href="<?php echo esc_url( $row['link_url1'] ); ?>" class='hvr-shutter-out-vertical slider-bnt2'>  <?php echo esc_html( $row['button_text1st'] ); ?>  </a>
                                    <?php endif;?>
                                                                         <?php if( !empty($row['link_url2']) ):?>
                                    <a href="<?php echo esc_url( $row['link_url2'] ); ?>" class='btn-4 slider-bnt'> <?php echo esc_html( $row['button_text2nd'] ); ?></a>
                                    <?php endif;?>
      									</div>
      								<?php } ?>
    							<?php } ?>
              <?php endif; ?>
    			</li>
			  <?php }?>
      </ul>
	</div>
<?php endif;?>
