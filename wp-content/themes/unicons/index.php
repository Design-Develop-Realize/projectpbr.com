<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unicons
 */

get_header(); ?>


         <section class="blog-content-section">
  		<div class="row">
        <?php if ( false == get_theme_mod( 'sidebar_blog', true ) ) : ?>
          <div class="large-12  left-column sidebar-type-2 columns ">
        <?php else:?>
    		<div class="large-9 medium-8 small-12 left-column sidebar-type-2 columns <?php if ( !is_active_sidebar( 'sidebar' ) ){ ?> nosid <?php }?>">
          <?php endif; ?>
  					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php
								/*
							 	* Include the Post-Format-specific template for the content.
								 * If unicons want to override this in a child theme, then include a file
					 		 	* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 			*/
								get_template_part( 'content', get_post_format() );
								?>

						 <?php endwhile; ?>

			 		<?php get_template_part('pagination'); ?>

				<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
  </div><!--POST END-->

			<?php if ( !is_front_page() && is_home() ) : ?>
        <?php if ( true == get_theme_mod( 'sidebar_blog', true ) ) : ?>
          <div class=" wow fadeIn large-3 medium-4 small-12 columns">
            <?php get_sidebar();?>
          </div><!--sidebar END-->
          <?php endif; ?>
	  	  <?php else : ?>
			    <div class=" wow fadeIn large-3 medium-4 small-12 columns">
   				  <?php get_sidebar();?>
			    </div><!--sidebar END-->
		  <?php endif; ?>
    </div>
	 </div><!--row END-->
</section><!--section END-->


<?php get_footer(); ?>
