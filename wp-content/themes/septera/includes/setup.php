<?php
/*
 * Theme setup functions. Theme initialization, add_theme_support(), widgets, navigation
 *
 * @package Septera
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
add_action( 'template_redirect', 'septera_content_width' );

/** Tell WordPress to run septera_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'septera_setup' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function septera_setup() {

	add_filter( 'septera_theme_options_array', 'septera_lpbox_width' );

	$septeras = cryout_get_option();

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( 'resources/styles/editor-style.css' );

	// Support title tag since WP 4.1
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Add HTML5 support
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );

	// Add post formats
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'audio', 'video' ) );

	// Make theme available for translation
	load_theme_textdomain( 'septera', get_template_directory() . '/languages' );
	load_textdomain( 'cryout', '' );

	// This theme allows users to set a custom backgrounssd
	add_theme_support( 'custom-background' );

	// This theme supports WordPress 4.5 logos
	add_theme_support( 'custom-logo', array( 'height' => (int) $septeras['septera_headerheight'], 'width' => 240, 'flex-height' => true, 'flex-width'  => true ) );
	add_filter( 'get_custom_logo', 'septera_filter_wp_logo_img' );

	// This theme uses wp_nav_menu() in 3 locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'septera' ),
		'sidebar' => __( 'Left Sidebar', 'septera' ),
		'footer'  => __( 'Footer Navigation', 'septera' ),
		'socials' => __( 'Social Icons', 'septera' ),
	) );

	$falign = explode( ' ', $septeras['septera_falign'] );
	if (!is_array($falign)) $falign = array( 'center', 'center' ); //failsafe

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(
		// default Post Thumbnail dimensions
		apply_filters( 'septera_thumbnail_image_width', septera_featured_width() ),
		apply_filters( 'septera_thumbnail_image_height', $septeras['septera_fheight'] )
	);
	// Custom image size for use with post thumbnails
	add_image_size( 'septera-featured',
		ceil($septeras['septera_sitewidth']), //apply_filters( 'septera_featured_image_width', septera_featured_width() ),
		apply_filters( 'septera_featured_image_height', $septeras['septera_fheight'] ),
		false
	);

	// Additional responsive image sizes
	add_image_size( 'septera-featured-full',
		apply_filters( 'septera_featured_image_full_width', ceil($septeras['septera_sitewidth']) ),
		apply_filters( 'septera_featured_image_full_height', $septeras['septera_fheight'] ),
		$falign
	);
	add_image_size( 'septera-featured-half',
		apply_filters( 'septera_featured_image_half_width', 800 ),
		apply_filters( 'septera_featured_image_falf_height', $septeras['septera_fheight'] ),
		$falign
	);
	add_image_size( 'septera-featured-third',
		apply_filters( 'septera_featured_image_third_width', 512 ),
		apply_filters( 'septera_featured_image_third_height', $septeras['septera_fheight'] ),
		$falign
	);

	// Boxes image sizes
	add_image_size( 'septera-lpbox-1', $septeras['septera_lpboxwidth1'], $septeras['septera_lpboxheight1'], true );
	add_image_size( 'septera-lpbox-2', $septeras['septera_lpboxwidth2'], $septeras['septera_lpboxheight2'], true );

	// Add support for flexible headers
	add_theme_support( 'custom-header', array(
		'flex-height' 	=> true,
		'height'		=> (int) $septeras['septera_headerheight'],
		'flex-width'	=> true,
		'width'			=> 1920,
		'default-image'	=> get_template_directory_uri() . '/resources/images/headers/bike.jpg',
		'video'         => true,
	));

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'bike' => array(
			'url' => '%s/resources/images/headers/bike.jpg',
			'thumbnail_url' => '%s/resources/images/headers/bike.jpg',
			'description' => __( 'Bike', 'septera' )
		),
		'mountain' => array(
			'url' => '%s/resources/images/headers/mountain.jpg',
			'thumbnail_url' => '%s/resources/images/headers/mountain.jpg',
			'description' => __( 'Mountain', 'septera' )
		),
	) );

	// WooCommerce compatibility
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

} // septera_setup()

/*
 * Have two textdomains work with translation systems.
 * https://gist.github.com/justintadlock/7ac29ae26c78d0
 */
function septera_override_load_textdomain( $override, $domain ) {
	// Check if the domain is our framework domain.
	if ( 'cryout' === $domain ) {
		global $l10n;
		// If the theme's textdomain is loaded, assign the theme's translations
		// to the framework's textdomain.
		if ( isset( $l10n[ 'septera' ] ) )
			$l10n[ $domain ] = $l10n[ 'septera' ];
		// Always override.  We only want the theme to handle translations.
		$override = true;
	}
	return $override;
}
add_filter( 'override_load_textdomain', 'septera_override_load_textdomain', 10, 2 );

/*
 * Remove inline logo styling
 */
function septera_filter_wp_logo_img ( $input ) {
	return preg_replace( '/(height=".*?"|width=".*?")/i', '', $input );
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function septera_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'septera_page_menu_args' );

/** Main menu */
function septera_main_menu() { ?>
	<div class="skip-link screen-reader-text">
		<a href="#main" title="<?php esc_attr_e( 'Skip to content', 'septera' ); ?>"> <?php _e( 'Skip to content', 'septera' ); ?> </a>
	</div>
	<?php
	wp_nav_menu( array(
		'container'		=> '',
		'menu_id'		=> 'prime_nav',
		'menu_class'	=> '',
		'theme_location'=> 'primary',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>',
		'items_wrap'	=> '<div><ul id="%s" class="%s">%s</ul></div>'

	) );
} // septera_main_menu()
add_action ( 'cryout_access_hook', 'septera_main_menu' );

/** Mobile menu */
function septera_mobile_menu() {
	wp_nav_menu( array(
		'container'		=> '',
		'menu_id'		=> 'mobile-nav',
		'menu_class'	=> '',
		'theme_location'=> 'primary',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>',
		'items_wrap'	=> '<div><ul id="%s" class="%s">%s</ul></div>'
	) );
} // septera_mobile_menu()
add_action ( 'cryout_mobilemenu_hook', 'septera_mobile_menu' );

/** Left sidebar menu */
function septera_sidebar_menu() {
	if ( has_nav_menu( 'sidebar' ) )
		wp_nav_menu( array(
			'container'			=> 'nav',
			'container_class'	=> 'sidebarmenu',
			'theme_location'	=> 'sidebar',
			'depth'				=> 1
		) );
} // septera_sidebar_menu()
add_action ( 'cryout_before_primary_widgets_hook', 'septera_sidebar_menu' , 10 );

/** Footer menu */
function septera_footer_menu() {
	if ( has_nav_menu( 'footer' ) )
		wp_nav_menu( array(
			'container' 		=> 'nav',
			'container_class'	=> 'footermenu',
			'theme_location'	=> 'footer',
			'after'				=> '<span class="sep">-</span>',
			'depth'				=> 1
		) );
} // septera_footer_menu()
add_action ( 'cryout_footer_hook', 'septera_footer_menu' , 10 );

/** SOCIALS MENU */
function septera_socials_menu( $location ) {
	if ( has_nav_menu( 'socials' ) )
		echo strip_tags(
			wp_nav_menu( array(
				'container' => 'nav',
				'container_class' => 'socials',
				'container_id' => $location,
				'theme_location' => 'socials',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'depth' => 0,
				'items_wrap' => '%3$s',
				'walker' => new Cryout_Social_Menu_Walker(),
				'echo' => false,
			) ),
		'<a><div><span><nav>'
		);
} //septera_socials_menu()
function septera_socials_menu_header() { septera_socials_menu( 'sheader' ); }
function septera_socials_menu_footer() { septera_socials_menu( 'sfooter' ); }
function septera_socials_menu_left()   { septera_socials_menu( 'sleft' );   }
function septera_socials_menu_right()  { septera_socials_menu( 'sright' );  }

/* Socials hooks moved to master hook in core.php */

/**
 * Register widgetized areas defined by theme options.
 * Uses cryout_widgets_init() from cryout/widget-areas.php
 */
function cryout_widgets_init() {
	$areas = cryout_get_theme_structure( 'widget-areas' );
	if ( ! empty( $areas ) ):
		foreach ( $areas as $aid => $area ):
			register_sidebar( array(
				'name' 			=> $area['name'],
				'id' 			=> $aid,
				'description' 	=> ( isset( $area['description'] ) ? $area['description'] : '' ),
				'before_widget' => $area['before_widget'],
				'after_widget' 	=> $area['after_widget'],
				'before_title' 	=> $area['before_title'],
				'after_title' 	=> $area['after_title'],
			) );
		endforeach;
	endif;
} // cryout_widgets_init()
add_action( 'widgets_init', 'cryout_widgets_init' );

/**
 * Creates different class names for footer widgets depending on their number.
 * This way they can fit the footer area.
 */
function septera_footer_colophon_class() {
	$opts = cryout_get_option( array( 'septera_footercols', 'septera_footeralign' ) );
	$class = '';
	switch ( $opts['septera_footercols'] ) {
		case '0': 	$class = 'all';		break;
		case '1':	$class = 'one';		break;
		case '2':	$class = 'two';		break;
		case '3':	$class = 'three';	break;
		case '4':	$class = 'four';	break;
	}
	if ( !empty($class) ) echo 'class="footer-' . $class . ' ' . ( $opts['septera_footeralign'] ? 'footer-center' : '' ) . '"';
} // septera_footer_colophon_class()

/**
 * Set up widget areas
 */
function septera_widget_header() {
	if ( is_active_sidebar( 'widget-area-header' ) ) { ?>
		<aside id="header-widget-area" <?php cryout_schema_microdata( 'sidebar' );?>>
			<?php dynamic_sidebar( 'widget-area-header' ); ?>
		</aside><?php
	}
} // septera_widget_header()

function septera_widget_before() {
	if ( is_active_sidebar( 'content-widget-area-before' ) ) { ?>
		<aside class="content-widget content-widget-before" <?php cryout_schema_microdata( 'sidebar' );?>>
			<?php dynamic_sidebar( 'content-widget-area-before' ); ?>
		</aside><!--content-widget--><?php
	}
} //septera_widget_before()

function septera_widget_after() {
	if ( is_active_sidebar( 'content-widget-area-after' ) ) { ?>
		<aside class="content-widget content-widget-after" <?php cryout_schema_microdata( 'sidebar' );?>>
			<?php dynamic_sidebar( 'content-widget-area-after' ); ?>
		</aside><!--content-widget--><?php
	}
} //septera_widget_after()
add_action ('cryout_header_widget_hook',  'septera_widget_header');
add_action ('cryout_before_content_hook', 'septera_widget_before');
add_action ('cryout_after_content_hook',  'septera_widget_after');

/* ajax frontpage read more button hooks */
/* if (  'posts' == get_option( 'show_on_front' )) add_action('pre_get_posts', 'cryout_query_offset', 1 );
if (  'posts' == get_option( 'show_on_front' )) add_action('template_redirect', 'cryout_ajax_init'); */

/* FIN */
