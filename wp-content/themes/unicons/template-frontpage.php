

 <!--Slider-->

<?php if (  is_front_page() || is_home() ) { ?>
  			<?php $unicons_slider_enabel = get_theme_mod('unicons_slider_enabel',1);?>
    			<?php if( isset($unicons_slider_enabel) && $unicons_slider_enabel == 1 ):?>

 				 <?php if( get_theme_mod( 'slider_select' )){ ?>

						<?php $template_slider_unicons = get_theme_mod( 'slider_select', array( 'slider','textanimation' ) );
        					get_template_part('parts/part',''.$template_slider_unicons .''); ?>

  								<?php }else{ ?>

						 			<?php get_template_part('parts/part','textanimation'); ?>
       							<?php } ?>

		<?php endif?>
	<?php } ?>
<!--/Slider-->

<!--reorder -->
<?php $template_parts = get_theme_mod( 'home_sort_id', array( 'service','layout','team','client','contact') );

  if ( ! empty( $template_parts ) && is_array( $template_parts ) ) {
    foreach ( $template_parts as $part ) {
      get_template_part( 'parts/part-' . $part );
    }
  }?>
  <!--/reorder -->
