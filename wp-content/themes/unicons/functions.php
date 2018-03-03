<?php

/**
 * unicons functions and definitions
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 */

/*
 * Set up the content width value based on the theme's design.
 *
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function unicons_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'unicons_content_width', 1000 );
}
add_action( 'after_setup_theme', 'unicons_content_width', 0 );



if ( ! function_exists( 'unicons_setup' ) ) :
//**************unicons SETUP******************//
function unicons_setup() {


/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
add_theme_support( 'title-tag' );


// Add default posts and comments RSS feed links to head.
add_theme_support('automatic-feed-links');


// Declare WooCommerce support
add_theme_support( 'woocommerce' );

//Custom Background
add_theme_support( 'custom-background', array(
	'default-color' => 'FFF',

) );

/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
		 * Enable support for custom Header image.
		 *
		 *  @since advance
		 */
	$args = array(
			'flex-width'    => true,
			'flex-height'   => true,
			'default-image' => get_template_directory_uri() . '/images/header.jpg',
			'header-text'            => false,
	);
	add_theme_support( 'custom-header', $args );

//Post Thumbnail
add_theme_support( 'post-thumbnails' );

//Register Menus
register_nav_menus( array(
		'primary' => __( 'Primary Navigation(Header)', 'unicons' ),

	) );

// Enables post and comment RSS feed links to head
add_theme_support('automatic-feed-links');

// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
/*

/*
	 * Enable support for custom logo.
	 *
	 *  @since unicons
	 */


    $defaults = array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );


/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If unicons're building a theme based on unicons, use a find and replace
		 * to change 'unicons' to the name of uniconsr theme in all the template files
		 */

load_theme_textdomain('unicons', get_template_directory() . '/languages');

add_theme_support( 'starter-content', array(

	'posts' => array(
		'home',
		'blog' ,
	),

		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),


		'nav_menus' => array(
			'primary' => array(
				'name' => __( 'Primary Navigation(Header)', 'unicons' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	) );
}
endif; // unicons_setup
add_action( 'after_setup_theme', 'unicons_setup' );



if ( ! function_exists( 'unicons_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since unicons
 */
function unicons_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function unicons_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'unicons_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function unicons_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'unicons_excerpt_more' );



//Load CSS files

function unicons_scripts() {
wp_enqueue_style( 'unicons-style', get_stylesheet_uri() );
wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/awesome/css/font-awesome.min.css','font_awesome', true );
wp_enqueue_style( 'unicons_core', get_template_directory_uri() . '/css/unicon.css' ,'uniconscore_css', true);
wp_enqueue_style( 'unicons-fonts', unicons_fonts_url(), array(), null );

 }

 add_action( 'wp_enqueue_scripts', 'unicons_scripts' );


/**
 * Google Fonts
 */

function unicons_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in uniconsr language that are not
	* supported by Lato, translate this to 'off'. Do not translate
	* into uniconsr own language.
	*/
	$OpenSans = _x( 'on', 'Open-Sans font: on or off', 'unicons' );

	/* Translators: If there are characters in uniconsr language that are not
	* supported by Noto Serif, translate this to 'off'. Do not translate
	* into uniconsr own language.
	*/
	$Open_sarif = _x( 'on', 'Open-Sans Sans Serif font: on or off', 'unicons' );

	if ( 'off' !== $OpenSans || 'off' !== $Open_sarif ) {
		$font_families = array();

		if ( 'off' !== $OpenSans ) {
			$font_families[] = 'Open Sans:400,400italic,700,700italic';
		}

		if ( 'off' !== $Open_sarif ) {
			$font_families[] = 'Open Sans :400,400italic,700,700italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

//Load Java Scripts
function unicons_head_js() {
if ( !is_admin() ) {
wp_enqueue_script('jquery');
wp_enqueue_script('unicons_js',get_template_directory_uri().'/js/unicon.js' ,array('jquery'), true);
wp_enqueue_script('unicons_other',get_template_directory_uri().'/js/unicon_other.js',array('jquery'), true);

if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}
}
add_action('wp_enqueue_scripts', 'unicons_head_js');


// recommended plugins.
require_once (get_template_directory() . '/inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'unicon_theme_registe_plugins' );
function unicon_theme_registe_plugins() {

		/**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
		$plugins = array(

				 // This is an example of how to include a plugin from a private repo in your theme.
				array(
						'name' => 'one-click-demo-import', // The plugin name.
						'slug' => 'one-click-demo-import', // The plugin slug (typically the folder name).
						'required' => false, // If false, the plugin is only 'recommended' instead of required.
				),
				 // This is an example of how to include a plugin from a private repo in your theme.

				 array(
 						'name' => 'Contact Form 7', // The plugin name.
 						'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
 						'required' => false, // If false, the plugin is only 'recommended' instead of required.
 				),

									// This is an example of how to include a plugin from a private repo in your theme.
								 array(
										 'name' => 'Unicon extensions', // The plugin name.
										 'slug' => 'unicon-extensions', // The plugin slug (typically the folder name).
										 'required' => false, // If false, the plugin is only 'recommended' instead of required.
								 )

		);

/**
* Array of configuration settings. Amend each line as needed.
* If you want the default strings to be available under your own theme domain,
* leave the strings uncommented.
* Some of the strings are added into a sprintf, so see the comments at the
* end of each line for what each argument will be.
*/
	$config = array(
			'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '', // Default absolute path to pre-packaged plugins.
			'menu' => 'tgmpa-install-plugins', // Menu slug.
			'has_notices' => true, // Show admin notices or not.
			'dismissable' => true, // If false, a user cannot dismiss the nag message.
			'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false, // Automatically activate plugins after installation or not.
			'message' => '', // Message to output right before the plugins table.
			'strings' => array(
					'page_title' => __( 'Install Required Plugins', 'unicons' ),
					'menu_title' => __( 'Install Plugins', 'unicons' ),
					'installing' => __( 'Installing Plugin: %s', 'unicons' ), // %s = plugin name.
					'oops' => __( 'Something went wrong with the plugin API.', 'unicons' ),
					'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'unicons' ), // %1$s = plugin name(s).
					'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'unicons' ), // %1$s = plugin name(s).
					'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'unicons' ), // %1$s = plugin name(s).
					'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'unicons' ), // %1$s = plugin name(s).
					'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'unicons' ), // %1$s = plugin name(s).
					'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'unicons' ), // %1$s = plugin name(s).
					'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'unicons' ), // %1$s = plugin name(s).
					'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'unicons' ), // %1$s = plugin name(s).
					'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'unicons' ),
					'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'unicons' ),
					'return' => __( 'Return to Required Plugins Installer', 'unicons' ),
					'plugin_activated' => __( 'Plugin activated successfully.', 'unicons' ),
					'complete' => __( 'All plugins installed and activated successfully. %s', 'unicons' ), // %s = dashboard link.
					'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
	);

	tgmpa( $plugins, $config );

}





/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function unicons_widgets_init(){
	register_sidebar(array(
	'name'          => __('Right Sidebar', 'unicons'),
	'id'            => 'sidebar',
	'description'   => __('Right Sidebar', 'unicons'),
	'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item"><div class="widget_wrap">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h5 class="widget-title">',
	'after_title'   => '</h5>'
	));

	register_sidebar(array(
	'name'          => __('Footer Widgets', 'unicons'),
	'id'            => 'foot_sidebar',
	'description'   => __('Widget Area for the Footer', 'unicons'),
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="medium-3 columns float-center">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	register_sidebar(array(
	'name'          => __('Client Section ', 'unicons'),
	'id'            => 'sidebar-clients',
	'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
		));
	register_sidebar(array(
		'name'          => __('Service Section ', 'unicons'),
		'id'            => 'sidebar-service',
		'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
			));

		register_sidebar(array(
			'name'          => __('Team Section ', 'unicons'),
			'id'            => 'sidebar-team',
			'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>'
									));
		register_sidebar(array(
				'name'          => __('Contact Section ', 'unicons'),
				'id'            => 'sidebar-contact',
				'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>'
																));
		register_sidebar(array(
			'name'          => __('Team Page widget area ', 'unicons'),
			'id'            => 'sidebar-teampage',
			'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>'
		));


}

add_action( 'widgets_init', 'unicons_widgets_init' );



//load widgets ,kirki ,customizer
require_once(get_template_directory() . '/inc/kirki/kirki.php');
require_once(get_template_directory() . '/inc/customizer.php');
require_once(get_template_directory() . '/inc/welcome/welcome-screen.php');
