<?php
/**
 * Contact section
 *
 * @package WordPress
 * @subpackage unicons
 * @since unicons 1.0
 */
 $unicons_contactbg_image = get_theme_mod ('unicons_contactbg_image');
 ?>

 <?php
 if ( is_active_sidebar( 'sidebar-contact' ) ) :?>
 <div id="contact" <?php if( !empty($unicons_contactbg_image) ):?> style="background: url(<?php echo esc_url($unicons_contactbg_image) ;?>) no-repeat center center <?php if(get_theme_mod('unicons_contactfixed_image') == true){ ?>fixed <?php }?>;background-size: cover;" <?php endif ;?>>
    <?php if( !empty($unicons_contactbg_image) ):?>
     <div class="overlay"></div>
    <?php endif;?>
   <div class="contact-2">


     <?php dynamic_sidebar( 'sidebar-contact' );?>

</div>
</div>
  <?php endif;?>
