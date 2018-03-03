

        <div class="matchhe  large-4 medium-6 small-12 columns float-left wow fadeInLeft page-delay mb50  ">
        <div class="blog-one ">
          <!--CALL TO POST IMAGE-->
          <div class="blog-one-header">
            <a href="<?php echo esc_url(get_permalink());?>">
              <?php the_post_thumbnail('large'); ?>
            </a>
          </div>
          <!--end POST IMAGE-->
          <!--CALL TO POST info-->
          <div class="blog-one-attrib">
              <?php if ( true == get_theme_mod( 'latest_post_cat', true ) ) : ?>
                <span class="blog-author-name">
                  <?php $categories = get_the_category();
                    $separator = ', ';
                    $output = '';
                    if ( ! empty( $categories ) ) {
                      foreach( $categories as $category ) {
                                $output .=
                                '<a href="' . esc_url( get_category_link( $category->term_id ) ) .
                                '" alt="' . esc_attr(sprintf( __( 'View all posts in %s','unicons' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                }
                      echo trim( $output, $separator );
                      } ?>
                </span>
              <?php endif; ?>
            <?php if ( true == get_theme_mod( 'latest_post_date', true ) ) : ?>
              <span class="blog-date"><?php the_time( get_option('date_format') ); ?></span>
            <?php endif; ?>
          </div>
          <!--end POST info-->
          <div class="blog-one-body">
            <?php the_title( sprintf( '<h2 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <?php the_excerpt(); ?>
          </div>
          <div class="blog-one-footer">
            <a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_attr__('Read more','unicons');?></a>
            <?php if ( true == get_theme_mod( 'latest_post_comment', true ) ) : ?>
              <i class="fa fa-comments"></i><?php comments_popup_link( __('0 Comment', 'unicons'), __('1 Comment', 'unicons'), __('% Comments', 'unicons'), '', __('off' , 'unicons')); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>

  <!-- layout -->
