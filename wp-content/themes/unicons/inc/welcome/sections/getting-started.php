<?php
/**
 * Getting started template
 */

?>
<?php $theme = wp_get_theme(); ?>

<div id="getting_started" class="unicons-tab-pane active">

	<div class="unicons-tab-pane-center">

		<h1 class="unicons-welcome-title"><?php printf( esc_html__( 'Welcome to %s!', 'unicons' ), $theme->get( 'Name' ) ); ?></h1>
	<p><?php  esc_html__( 'We want to make sure you have the best experience using unicons and that is why we gathered here all the necessary informations for you. We hope you will enjoy using unicons, as much as we enjoy creating great products.', 'unicons' ) ; ?>

	</div>

	<hr />



	<div class="unicons-tab-pane-center">

		<h1><?php esc_html_e( 'FAQ', 'unicons' ); ?></h1>

	</div>
  <div class="unicons-video-tutorial">
    <div class="unicons-tab-pane-half unicons-tab-pane-first-half">
  		<h2><?php esc_html_e( 'Set a Static Home Page (Front Page)', 'unicons' ); ?></h4>
      <p><?php esc_html_e( 'By default the homepage will look like a blog (this is how WordPress is intended to work). If you want a custom homepage like Unicons demo . then go to customize >Static Front Page and you can define your homepage here.
	On this video you will learn how you setup your website’s front page you like one for Unicons theme demo which you can see here.', 'unicons' ); ?>
	<ul>

	<li>
	  <?php esc_html_e( 'Step 1 : Go to customize', 'unicons' ); ?>
	</li>
	<li>
	  <?php esc_html_e( 'Step 2 : Static Front Page => A static page', 'unicons' ); ?>
	</li>
	<li>
	  <?php esc_html_e( 'Step 3 : Post page => click add new page => blog', 'unicons' ); ?>
	</li>
	<li>
	  <?php esc_html_e( 'Step 4 : Front page => click add new page => Home', 'unicons' ); ?>
	</li>
	<li>
	  <?php esc_html_e( 'Step 5 : Save and published', 'unicons' ); ?>
	</li>
	</ul>  <?php esc_html_e( 'That’s All', 'unicons' ); ?></p>
  	  <p><a href="<?php echo esc_url( 'http://themezwp.com/unicons-demo/blog/2017/04/13/how-to-configure-front-page/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'unicons' ); ?></a></p>
    </div>
    <div class="unicons-tab-pane-half video">
      <p class="youtube">

    			<img src="<?php echo get_template_directory_uri(); ?>/inc/welcome/img/frontpage-min_iehsvn.jpg"  />

  		</p>
    </div>
  </div>



	<div class="unicons-clear"></div>

</div>
