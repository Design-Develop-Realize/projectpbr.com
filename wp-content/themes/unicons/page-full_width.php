<?php
/*
Template Name: Page with No sidebar
*/
?>
<?php get_header(); ?>

<div id="sub_banner" <?php if ( get_header_image() ) : ?> style="background:url(<?php header_image(); ?>) 50% no-repeat;" <?php endif;?>>
<?php if ( get_header_image() ) : ?>
 <div class="overlay"></div>
 <?php endif;?>
   <h1>
    <?php the_title(); ?>
  </h1>
</div>

<!--Content-->

	<div id="content">
		<div class="row">
			<div class="large-12 columns ">

                   <?php if(have_posts()): ?>
				   	<?php while(have_posts()): ?>
						<?php the_post();?>
               				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                				<div class="post_content">

                    				<a class="postimg"><?php the_post_thumbnail('medium');?></a>


                   						<div class="metadate">

				   							<?php
												edit_post_link(
												sprintf(
												/* translators: %s: Name of current post */
												__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'unicons' ),
												get_the_title()
												),
												'<span class="edit-link">',
												'</span>'
												);
											?>
                                       </div>
                    			</div>
                    				<div style="clear:both"></div>
                    				<div class="post_info_wrap">
									<?php
										the_content();

										wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'unicons' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'unicons' ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
										) );
									?>

                                    </div>
                    				<div style="clear:both"></div>
             		<?php endwhile ?>

               </div>
				<div class="comments_template">
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					}?>
               </div>
            	<?php endif ;?>
			</div>


    <!--PAGE END-->

	</div>
   </div>

<?php get_footer(); ?>
