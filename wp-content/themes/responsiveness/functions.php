<?php
/**
 * components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package responsiveness
 */

if ( ! function_exists( 'responsiveness_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */



function responsiveness_setup() {
  
    
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'responsiveness' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'responsiveness', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'responsiveness-featured-image', 800, 9999 );
	add_image_size( 'responsiveness-portfolio-featured-image', 800, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'responsiveness' ),
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
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
                'gallery',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'responsiveness_custom_background_args', array(
		'default-color' => 'eeeeee',
		'default-image' => '',
	) ) );
        
        
}
endif;
add_action( 'after_setup_theme', 'responsiveness_setup' );


function responsiveness_logo() {
    add_theme_support('custom-logo', array(
        'size' => 'responsiveness-logo',
        'flex-height'            => true,
        'flex-width'            => true,
        ));
}

add_action('after_setup_theme', 'responsiveness_logo');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function responsiveness_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'responsiveness_content_width', 640 );
}
add_action( 'after_setup_theme', 'responsiveness_content_width', 0 );
add_action( 'customize_controls_print_styles', 'responsiveness_customizer_stylesheet' );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function responsiveness_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'responsiveness' ),
                'description'   => esc_html__( 'Widgets in this sidebar will appear throughout the site. It is the default sidebar if no others are in use.', 'responsiveness' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Top Widget: Full Width', 'responsiveness' ),
        'description'   => esc_html__( 'This widget will appear under the header', 'responsiveness' ),
        'id'            => 'top-widget-fullwidth',
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top Widget: Left Column', 'responsiveness' ),
        'description'   => esc_html__( 'This widget will appear under the full width widget', 'responsiveness' ),
        'id'            => 'top-widget-left',
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top Widget: Middle Column', 'responsiveness' ),
        'description'   => esc_html__( 'This widget will appear under the full width widget', 'responsiveness' ),
        'id'            => 'top-widget-middle',
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Top Widget: Right Column', 'responsiveness' ),
        'description'   => esc_html__( 'This widget will appear under the full width widget', 'responsiveness' ),
        'id'            => 'top-widget-right',
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );


        register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Pages', 'responsiveness' ),
                'description'   => esc_html__( 'Widgets in this sidebar will only appear on Pages. It replaces the standard sidebar.', 'responsiveness' ),
		'id'            => 'sidebar-page',
		'before_widget' => '<div id="%1$s" class="widget %2$s ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Custom Post Types', 'responsiveness' ),
                'description'   => esc_html__( 'Widgets in this sidebar will only appear on JetPack Portfolio or Testimonial Posts. It replaces the standard sidebar.', 'responsiveness' ),
		'id'            => 'sidebar-custom',
		'before_widget' => '<div id="%1$s" class="widget %2$s ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
register_sidebar( array(
    'name'          => esc_html__( 'Footer Widgets', 'responsiveness' ),
    'description'   => esc_html__( 'Widgets appearing above the footer of the site.', 'responsiveness' ),
    'id'            => 'sidebar-footer',
    'before_widget' => '<div id="%1$s" class="widget small-6 medium-4 large-3 columns %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
) );
}
add_action( 'widgets_init', 'responsiveness_widgets_init' );

/**
 * Enqueue Foundation scripts and styles.
 * 
 * @link: http://wordpress.tv/2014/06/11/steve-zehngut-build-a-wordpress-theme-with-foundation-and-underscores/
 * @link: http://wordpress.tv/2014/03/31/steve-zehngut-theme-development-with-foundation-framework/
 * @link: http://www.justinfriebel.com/wordpress-underscores-with-the-foundation-framework-09-23-2014/
 * 
 */
function responsiveness_foundation_enqueue() {
    
        /* Add Foundation 6.2 CSS */
        wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/assets/foundation/css/foundation.min.css' );    // This is the Foundation CSS
        
        /* Add Foundation JS */
        wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/foundation/js/foundation.min.js', array( 'jquery' ), true );
        //wp_enqueue_script( 'foundation-what-input', get_template_directory_uri() . '/assets/foundation/js/what-input.js', array( 'jquery' ), true );
        
        /* Foundation Init JS */
        wp_enqueue_script( 'responsiveness-foundation-init', get_template_directory_uri() . '/foundation.js', array( 'jquery' ), true );   // Small (author) customized JS script to start the Foundation library, sitting freely in the Theme folder
        
        /* Add Custom Fonts */
        wp_enqueue_style( 'responsiveness-local-fonts', get_template_directory_uri() . '/assets/fonts/custom-fonts.css' );
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.css' );  
        
}
add_action( 'wp_enqueue_scripts', 'responsiveness_foundation_enqueue' );

/**
 * Enqueue scripts and styles.
 */
function responsiveness_scripts() {
	wp_enqueue_style( 'responsiveness-style', get_stylesheet_uri() );
        
        /* Include Dashicons for the front-end too */
        wp_enqueue_style( 'dashicons' );

	/* Conditional stylesheet only for Front Page Template */
        if ( is_page_template( 'page-templates/frontpage-portfolio.php' ) ) {
            wp_enqueue_script( 'responsiveness-front-scripts', get_stylesheet_directory_uri() . '/assets/js/frontpage-functions.js', array( 'jquery' ), '20160515', true ); 

            /* Slick Carousel */
            wp_enqueue_script( 'slick_carousel', get_stylesheet_directory_uri() . '/assets/js/slick/slick.min.js', array( 'jquery' ), '20160515', true ); 
            wp_enqueue_style( 'slick_style', get_stylesheet_directory_uri() . '/assets/js/slick/slick.css' );
            wp_enqueue_style( 'slick_theme_style', get_stylesheet_directory_uri() . '/assets/js/slick/slick-theme.css' );
        }

        /* Custom navigation script */
	wp_enqueue_script( 'responsiveness-navigation', get_template_directory_uri() . '/assets/js/navigation-custom.js', array(), '20120206', true );
        
        /* Toggle Main Search script */
        wp_enqueue_script( 'responsiveness-toggle-search', get_template_directory_uri() . '/assets/js/toggle-search.js', array( 'jquery' ), '20150925', true );

        /* Masonry for Footer widgets */
        wp_enqueue_script( 'responsiveness-masonry', get_template_directory_uri() . '/assets/js/masonry-settings.js', array( 'masonry' ), '20150925', true );
        
        /* Add dynamic back to top button */
        wp_enqueue_script( 'responsiveness-topbutton', get_template_directory_uri(). '/assets/js/topbutton.js', array( 'jquery' ), '20150926', true );

	wp_enqueue_script( 'responsiveness-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'responsiveness_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file - only if Jetpack is active
 */
if ( class_exists( 'Jetpack') ) {
    require get_template_directory() . '/inc/jetpack.php';
}



/**
*
* Admin styles
*
**/
function responsiveness_load_custom_wp_admin_style( $hook ) {
    if ( 'appearance_page_about-responsiveness' !== $hook ) {
        return;
    }
    wp_enqueue_style( 'responsiveness-custom-admin-css', get_template_directory_uri() . '/assets/stylesheets/admin.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'responsiveness_load_custom_wp_admin_style' );



/**
 * -----------------------------------------------------------------------------
 * responsiveness custom functions below
 * -----------------------------------------------------------------------------
 */
function responsiveness_google_fonts() {
    $query_args = array(

        'family' => 'Roboto:300,400,500,700,900'
        );
    wp_register_style( 'responsivenessgooglefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
    wp_enqueue_style( 'responsivenessgooglefonts');
}

/**
 * Customize The Archive Title output
 */ 
function responsiveness_modify_archive_title( $title ) {
    if( is_page_template( 'archive-jetpack-portfolio.php' ) || is_page_template( 'archive-jetpack-testimonial.php' ) ) {
        return esc_html__( 'All ', 'responsiveness' ) . $title;
    } else {
        return $title;
    }
}
add_filter( 'get_the_archive_title', 'responsiveness_modify_archive_title', 10, 1 );

/*
 * Add Excerpts to Pages
 */
function responsiveness_add_excerpt_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'responsiveness_add_excerpt_to_pages' );

/**
 * Modify Underscores nav menus to work with Foundation
 */
function responsiveness_nav_menu( $menu ) {
    
    $menu = str_replace( 'menu-item-has-children', 'menu-item-has-children has-dropdown', $menu );
    $menu = str_replace( 'sub-menu', 'sub-menu dropdown', $menu );
    return $menu;
    
}
add_filter( 'wp_nav_menu', 'responsiveness_nav_menu' );

/**
 * Walker Menu for Front Page nav
 */
class responsiveness_front_page_walker extends Walker_Nav_Menu {
  
    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
                'sub-menu',
                ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
                ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
                'menu-depth-' . $display_depth
            );
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    // add main/sub classes to li's and links
     function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $li_class_names = esc_attr( implode( ' ', apply_filters( '', array_filter( $classes ), $item ) ) );
        $fa_class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        /*
         * Card Front
         */
        $foundationTouch = 'ontouchstart="this.classList.toggle(\'hover\');"';
        $output .= $indent . '<li ' . $foundationTouch . ' id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . /* $class_names . */ '">';
        $output .= '<div class="large button card-front">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after . '<i class="fa ' . $li_class_names . ' card-icon"></i>',
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        $output .= '</div>';

        /** 
         * Card Back
         */
        $output .= '<div class="panel card-back">';
        $output .= '<i class="fa ' . $fa_class_names . ' card-icon"></i>';
        $output .= '<div class="hub-info">';
        
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->attr_title, $item->ID ),
            $args->link_after,
            $args->after
        );
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
        $output .= '<p>';
        $output .= isset( $item->description ) ? $item->description : '';
        $output .= '</p></div><!-- .hub-info -->';
        $output .= '<small class="clear">';
        $output .= isset( $item->xfn ) ? $item->xfn : ''; 
        $output .= '</small>';
        $output .= '</div><!-- .card-back -->';
    }
}



/*TGA activation*/

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Free Seo Optimized Responsive Theme for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'responsiveness_register_required_plugins' );

function responsiveness_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Autoptimize',
            'slug'      => 'autoptimize',
            'required'  => false,
            ),

        array(
            'name'      => 'WP Super Cache',
            'slug'      => 'wp-super-cache',
            'required'  => false,
            ),
        
        array(
            'name'        => 'WordPress SEO by Yoast',
            'slug'        => 'wordpress-seo',
            'is_callable' => 'wpseo_init',
            ),

        );

    $config = array(
        'id'           => 'responsiveness',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.


        );

    tgmpa( $plugins, $config );
}

