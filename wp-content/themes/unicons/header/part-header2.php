




<nav class="navbar branding   <?php if ( true == get_theme_mod( 'disable_sticky_menu', true ) ) : ?>navbar navbar-fixed-top <?php else : ?>  navbar-standart <?php endif; ?>">

  <div class="valign-middle">
    <div class="large-4 columns">

    	<!--LOGO START-->
        <div id="site-title">
          <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
        	   <?php unicons_the_custom_logo(); ?>
       		<?php else : ?>
   				  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        	    <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                  <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
              <?php endif; ?>
          <?php endif;?>
        </div><!--site-title END-->

    </div>
    <!--LOGO END-->
    <div class="large-8 columns hidden-xs">
      <div id="menu_wrap">
        <!--MENU STARTS-->
        <h3 class="menu-toggle"><?php _e( 'Menu', 'unicons' ); ?></h3>
          <div id="navmenu">
              <?php if ( true == get_theme_mod( 'unicons_search_box', true ) ) : ?>
                <li class="search-icon">
                  <i class="fa fa-search"></i>
                    <div class="unicons-search">
                      <div class="close">&times;</div>
                        <?php get_search_form(); ?>
                      <div class="overlay-search"> </div>
                    </div>
                </li>
              <?php endif; ?>

          <?php if ( has_nav_menu( 'primary' ) ) : ?>
          <?php
          wp_nav_menu( array(

            'container_class' => 'menu-header',
            'theme_location' => 'primary'
            ) );?>
          <?php else : ?>
            <li id="add-menu"><a  href=" <?php echo esc_url(admin_url( 'nav-menus.php' ));?>  "><?php echo __( 'Add a Primary Menu', 'unicons' );?>  </a></li>            
          <?php endif; ?>
          </div><!--navmenu END-->
      </div><!--menu_wrap END-->
    </div><!--row END-->
  </div><!--branding END-->
</nav>
             <!--Header two  END-->
