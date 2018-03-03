<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>
<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
$footerwidgets_bg_imagee = get_theme_mod ('footerwidgets_bg_image');
?>
<!--FOOTER SIDEBAR-->
  <div id="footer">
   	<?php if ( is_active_sidebar( 'foot_sidebar' ) ) { ?>
    	<div class="widgets"<?php if( !empty($footerwidgets_bg_imagee) ):?> style="background: url(<?php echo esc_url($footerwidgets_bg_imagee) ;?>) no-repeat center center <?php if(get_theme_mod('footerwidgets_fixed_image') == true){ ?>fixed <?php }?>;background-size: cover;" <?php endif ;?>>
      <?php if( !empty($footerwidgets_bg_imagee) ):?><div class="overlay"></div><?php endif; ?>
   			<div class="row mb50 mt50 overlay-fix">
     			<?php if ( is_active_sidebar('dynamic_sidebar') || !dynamic_sidebar('foot_sidebar') ) : ?><?php endif; ?>
      </div>
   		</div>
   	<?php } ?>

	  <!--COPYRIGHT TEXT-->
    <div id="copyright">
    	<div class="row valign-middle">
        <div class="<?php if ( true == get_theme_mod( 'unicons_social_boxfoo', false ) ) : ?> large-6 <?php endif;?> small-12 columns">
          <div class="copytext">
           	<?php
					      $unicons_footertext = html_entity_decode(get_theme_mod ('unicons_footertext'));
					      echo $unicons_footertext;
				    ?>
            	<a target="_blank" href="<?php echo esc_url( 'http://themezwp.com/'); ?>"><?php printf( esc_attr__( 'Theme by %s', 'unicons' ), 'Themez WP' ); ?></a>
          </div>
        </div>
        <?php if ( true == get_theme_mod( 'unicons_social_boxfoo', false ) ) : ?>
          <div class="large-6 small-12 columns">
            <?php get_template_part('parts/social','loop'); ?>
          </div>
        <?php endif;?>
 		  </div>
    	<a href="#" class="scrollup" > <i class=" fa fa-angle-up fa-2x"></i></a>
    </div>
  </div>

<?php wp_footer(); ?>
</body>
</html>
