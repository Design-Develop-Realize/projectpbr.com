
<?php
// Define all Variables.
$bnt_unicons =  get_theme_mod('unicons_link_name1',esc_attr__('Know More','unicons')) ;
$slider_textanimation_title =  get_theme_mod('slider_textanimation_title',esc_attr__('Hero Title','unicons')) ;
$bnt2_unicons = get_theme_mod('unicons_link_name2',esc_attr__('Buy Theme','unicons'));
$unicons_staticslider_uri1 = get_theme_mod('unicons_staticslider_uri1');
$unicons_staticslider_uri2 =  get_theme_mod('unicons_staticslider_uri2') ;
$unicons_staticslider_image =  get_theme_mod('unicons_staticslider_image',esc_url(get_template_directory_uri().'/images/slider.jpg')) ;
             ?>

             <?php $slider_rep_textanimation = get_theme_mod( 'slider_rep_textanimation', array(
             array(
             'text_animation' => 'Welcome to unicons Live Options',
               )
             ) ); ?>
 <section id="staticslider" class="masthead" style="background:url( <?php echo esc_url($unicons_staticslider_image); ?>) no-repeat;" >
   <div class="masthead-overlay"></div>
   <div class="masthead-arrow"></div>

     <div class="masthead-dsc">
       <div class="row warp">
          <div class="large-12 columns">
         <div class="stat-content ">
               <h1 class="brand-heading ">
                <strong><?php echo esc_html ($slider_textanimation_title); ?></strong>
                    <div class="brand-heading-typed-container">
                       <div id="typed-strings">
                         <?php foreach ( $slider_rep_textanimation as $row ) {?>
                           <p><?php echo esc_html( $row['text_animation'] ); ?></p>
                            <?php }?>
                       </div>
                       <span id="typed" ></span>
                   </div>
               </h1>
         </div>

           <div class="sl-button">
             <?php if( !empty($unicons_staticslider_uri1) ):?>
               <a href="<?php echo esc_url($unicons_staticslider_uri1); ?>" class='hvr-shutter-out-vertical slider-bnt2'>  <?php echo esc_html ($bnt_unicons); ?></a>
             <?php endif;?>
             <?php if( !empty($unicons_staticslider_uri2) ):?>
               <a href="<?php echo esc_url($unicons_staticslider_uri2); ?>" class='btn-4 slider-bnt'> <?php echo esc_html ($bnt2_unicons); ?></a>
             <?php endif;?>
           </div>
       </div>
     </div>
</div>
 </section>
