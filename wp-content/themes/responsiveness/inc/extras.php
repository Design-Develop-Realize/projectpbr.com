<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package responsiveness
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function responsiveness_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'responsiveness_body_classes' );



/** BACKEND **/

add_action( 'admin_menu', 'responsiveness_register_backend' );
function responsiveness_register_backend() {
  add_theme_page( __('About Responsiveness', 'responsiveness'), __('Responsiveness', 'responsiveness'), 'edit_theme_options', 'about-responsiveness.php', 'responsiveness_backend');
}

function responsiveness_backend(){ ?>
<div class="info-page-wrapper">
  <div class="info-page-top-section">
    <div class="info-page-left">
      <h2><?php echo __( 'Helpdesk & Questions', 'responsiveness' ); ?></h2>
      <p>
        <?php echo __( '
          If you need help with anything theme related, or have pre-sale questions please contact us  
          <a href="http://madeforwriters.com/help-support/" target="_blank">through this form</a> or email us at Help@madeforwriters.com
          we try to respond within 48 hours.
          ', 'responsiveness' ); ?>
        </p>
        <p>
          <?php echo __( '
            If you are having troubles with a plugin or general WordPress functionality we ask you kindly to either go to the <a href="https://wordpress.org/support/" target="_blank">WordPress support forum</a>
            or contact the author of the plugin you are having troubles with.
            ', 'responsiveness' ); ?>
          </p>
        </div>
        <div class="info-page-right">
          <h2><?php echo __( 'Useful Links and Resources', 'responsiveness' ); ?></h2>
          <ul>
            <li><?php echo __( '- <a href="http://madeforwriters.com/help-support/" target="_blank">Contact Responsiveness Author</a>', 'responsiveness' ); ?></li>
            <li><?php echo __( '- <a href="https://wordpress.org/support/" target="_blank">WordPress Support Forum</a>', 'responsiveness' ); ?></li>
            <li><?php echo __( '- <a href="http://madeforwriters.com/responsiveness/" target="_blank">Responsiveness Pro Info</a>', 'responsiveness' ); ?></li>
            <li><?php echo __( '- <a href="https://wordpress.org/plugins/browse/popular/" target="_blank">Popular WordPress Plugins</a>', 'responsiveness' ); ?></li>
          </ul>
        </div>
      </div>

      <div class="divider-border"></div>
      <h2 class="pro-vers-headline">Take Your Website To The Next Level</h2>

      <div class="text-align-center">
        <div class="version-tables">
         <a href="http://madeforwriters.com/responsiveness/" target="_blank" class="p-version">
          <h3>Pro Version</h3>
          <h4><strong>$39</strong> One Time Fee</h4>
          <span class="purchase-btn-wrapper">
            <span class="purchase-btn">Purchase Now</span>
          </span>
          <ul>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Header Text, logo & Colors</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Header Background Image/Color</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Background Color/Image</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Left Sidebar</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Header Height</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Only Show Header On Front Page</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Only Show Top Widgets On Front Page</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Footer Copyright Text</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Top Widgets Colors</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">No Sidebar (Full Width)</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Better SEO Optimization</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Navigation Colors</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Blog Feed Colors</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Sidebar Colors</li>      
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Footer Colors</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Scroll to Top Button Colors</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Custom Post Colors</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Free Updates</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/checkmark.png">Unlimited Customer Support</li>
          </ul>
          <span class="purchase-button">Purchase For $39 </span>
        </a>
      </div>
    </div>

  </div>
  <?php }





