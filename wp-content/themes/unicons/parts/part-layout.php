
<?php
$latest_post_title =  get_theme_mod('latest_post_title',esc_attr__('Latest News ','unicons'));
$latest_post_subtitle =  get_theme_mod('latest_post_subtitle');
$unicons_latestbg_image =  get_theme_mod('unicons_latestbg_image');
?>
<div  id="latset-postsaf" <?php if( !empty($unicons_contactbg_image) ):?>  style="background: url(<?php echo esc_url($unicons_contactbg_image) ;?>) no-repeat center center <?php if(get_theme_mod('unicons_latestfixed_image') == true){ ?>fixed <?php }?>;background-size: cover;" <?php endif ;?>>
<div class="row ">
					<!--section head end-->
            <?php if (!empty($latest_post_title) || !empty($our_team_subtitle)): ?>
				<div class=" row mt50 mb5">
					<div class="section-header wow fadeIn animated " data-wow-duration="1s">
                     <?php if( !empty($latest_post_title) ):?>
 						<h1 class="section-title wow fadeIn"   >
						  <?php echo esc_html( $latest_post_title); ?>
  						</h1>
			          	<div class="colored-line"></div>
                     <?php endif;?>
                     <?php if( !empty($latest_post_subtitle) ):?>
							<div class="section-description">
                                <h2 ><?php echo esc_html( $latest_post_subtitle); ?></h2>
                             </div>
                      <?php endif;?>
        			</div><!--section head end-->
                </div><!--row end-->
		 <?php endif; ?>

<?php if( get_theme_mod( 'layout_select' )){ ?>

<?php $template_parts_unicons = get_theme_mod( 'layout_select', array( 'layout1', 'layout2','layout3' ) );
        get_template_part('layout/part',''.$template_parts_unicons .''); ?>

  <?php }else{ ?>

 <?php get_template_part('layout/part','layout1'); ?>
        <?php } ?>
 </div></div>
