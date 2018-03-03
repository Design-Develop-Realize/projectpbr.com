<?php


$unicons_facebook = get_theme_mod ('fbsoc_text_unicons');
$unicons_twitter =  get_theme_mod ('ttsoc_text_unicons');
$unicons_googleplus = get_theme_mod ('gpsoc_text_unicons');
$unicons_pinterest =  get_theme_mod ('pinsoc_text_unicons');
$unicons_uniconstube =  get_theme_mod ('ytbsoc_text_unicons');
$unicons_linkedin = get_theme_mod ('linsoc_text_unicons');
$unicons_vimeo = get_theme_mod ('vimsoc_text_unicons');
$unicons_flickr = get_theme_mod ('flisoc_text_unicons');
$unicons_rss = get_theme_mod ('rsssoc_text_unicons');
$unicons_instagram =  get_theme_mod ('instagram_text_unicons');

?>

<div class="social-unicons">


				<?php if( !empty($unicons_facebook) ):?>

         <a  href="<?php echo esc_url($unicons_facebook);?>" target="_blank" title="<?php echo esc_attr__('facebook','unicons')?>"><span class="hb hb-xs inv hb-facebook-inv"><i class="fa fa-facebook"></i></span></a><?php endif; ?>

                <?php if( !empty($unicons_twitter) ):?>
               <a  href="<?php echo esc_url($unicons_twitter);?>" target="_blank" title="<?php echo esc_attr__('twitter','unicons')?>"><span class="hb hb-xs inv hb-twitter-inv"><i class="fa fa-twitter"></i></span></a><?php endif; ?>

                 <?php if( !empty($unicons_googleplus) ):?>
                <a href="<?php echo esc_url($unicons_googleplus);?>" title="<?php echo esc_attr__('Google Plus','unicons')?> " target="_blank"> <span class="hb hb-xs inv hb-google-plus-inv"><i class="fa fa-google-plus"></i></span></a><?php endif; ?>

                 <?php if( !empty($unicons_pinterest) ):?>
                <a href="<?php echo esc_url($unicons_pinterest);?>" title="<?php echo esc_attr__('Pinterest','unicons')?> " target="_blank"><span class="hb hb-xs inv hb-pinterest-inv"><i class="fa fa-pinterest-p"></i> </span></a><?php endif; ?>


                 <?php if( !empty($unicons_uniconstube) ):?>
                <a href="<?php echo esc_url($unicons_uniconstube);?>" title="<?php echo esc_attr__('uniconstube','unicons')?> " target="_blank"> <span class="hb hb-xs inv hb-pinterest-inv"><i class="fa fa-youtube"></i></span></a><?php endif; ?>

                <?php if( !empty($unicons_linkedin) ):?>
               <a href="<?php echo esc_url($unicons_linkedin);?>" title="<?php echo esc_attr__('linkedin','unicons')?> " target="_blank"><span class="hb hb-xs inv hb-linkedin-inv"> <i class="fa fa-linkedin"></i></span></a><?php endif; ?>

                <?php if( !empty($unicons_vimeo) ):?>
                <a href="<?php echo esc_url($unicons_vimeo);?>" title=" <?php echo esc_attr__('Vimeo','unicons')?>" target="_blank"><span class="hb hb-xs inv hb-vimeo-inv"> <i class="fa fa-vimeo"></i></span></a><?php endif; ?>
                 <?php if( !empty($unicons_flickr) ):?>
                 <a href="<?php echo esc_url($unicons_flickr);?>" title="<?php echo esc_attr__('flickr','unicons')?> " target="_blank"><span class="hb hb-xs inv hb-flickr-inv"> <i class="fa fa-flickr"></i></span></a><?php endif; ?>

                 <?php if( !empty($unicons_rss) ):?>
                 <a href="<?php echo esc_url($unicons_rss);?>" title="<?php echo esc_attr__('rss','unicons')?>" target="_blank"><span class="hb hb-xs inv hb-rss-inv"> <i class="fa fa-rss"></i></span></a><?php endif; ?>

                <?php if( !empty($unicons_instagram) ):?>
                 <a href="<?php echo esc_url($unicons_instagram);?>" title="<?php echo esc_attr__('instagram','unicons')?>" target="_blank"> <span class="hb hb-xs inv hb-instagram-inv"><i class="fa fa-instagram"></i></span></a><?php endif; ?>


   </div>
