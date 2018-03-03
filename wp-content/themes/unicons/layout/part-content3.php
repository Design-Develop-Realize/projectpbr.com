
<div class="matchhe  large-6 medium-6 small-12 columns float-left wow fadeInLeft page-delay mb50 ">
    <div class="blog-three">
        <?php the_title( sprintf( '<h4 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
        <div class="blog-three-attrib">
          <?php if ( true == get_theme_mod( 'latest_post_date', true ) ) : ?>
          <span class="icon-calendar"></span><?php the_time( get_option('date_format') ); ?> |
          <?php endif; ?>
            <?php if ( true == get_theme_mod( 'latest_post_cat', true ) ) : ?>
              <span class=" icon-pencil"></span>
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
            <?php endif; ?>
        </div>
        <?php  if ( get_the_post_thumbnail() != '' ):?>
        <a  href="<?php echo esc_url(get_permalink());?>">
          <div class="mb25">
          <?php the_post_thumbnail(); ?>
        </div>
        </a>
        <?php endif; ?>
      <?php the_excerpt(); ?>
        <a href="<?php echo esc_url(get_permalink());?>" class="button secondary"><?php echo esc_attr__('Read more','unicons');?> <i class="fa fa-long-arrow-right"></i></a>
    </div>
</div>
