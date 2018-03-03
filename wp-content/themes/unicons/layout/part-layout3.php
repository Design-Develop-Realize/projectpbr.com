

 <?php

  $unicons_num_post =  esc_attr(get_theme_mod ('unicons_num_post'));
 $category_show = get_theme_mod( 'category_show');

 $post_order_by = get_theme_mod( 'post_order_by', array( 'none', 'date','ID','author','title','rand' ) );

    $unicons_args=array(
             'post_type' => 'post',
             'posts_per_page'=>$unicons_num_post,
			 'cat' => $category_show,
			 'orderby' => $post_order_by,
			 'order'=>'ASC',

         );
    $wp_query = new WP_Query($unicons_args);

			?>

      <div id="unicons-portfolio" class="mb5">
      <?php if ( $wp_query->have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                  <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                                  <div class="large-3 medium-6 small-6  columns float-left wow fadeInLeft  ">
                                <div class="portfolio-box">
                                <!--CALL TO POST IMAGE-->

                                    <?php  if ( get_the_post_thumbnail() != '' ) {
                                the_post_thumbnail();
                                    };?>
                                  <!--end POST IMAGE-->


                                  <div class="portfolio-details">
                          <header class="article-title portfolio-title">

                                        <?php the_title( sprintf( '<h4 class="heading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                              <p class="category"><span>
                        <?php if( has_category() ) { ?><?php $categories = get_the_category();
                                                             $separator = ' ';
                                 $output = '';
                          if ( ! empty( $categories ) ) {
                                foreach( $categories as $category ) {
                                    $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr(sprintf( __( 'View all posts in %s','unicons' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;			}
                                   echo trim( $output, $separator );
                                } ?><?php } ?>
                                              </span></p>
                              </header>
                            <div class="portfolio-link">
                              <a class="link " href="<?php echo esc_url(get_permalink());?>"><i class="fa fa-link"></i></a>
                              <?php $promote_image_large = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
                              <a class="link magnific-popup " href="<?php if ( has_post_thumbnail() ) : ?> <?php echo esc_url($promote_image_large[0]) ?><?php endif; ?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a>

                                </div>
                    </div>
                  </div>
                              </div>

                          <?php endwhile; ?>


            <?php else : ?>

           <?php wp_reset_postdata(); ?>

        <?php endif; ?>

      </div>
