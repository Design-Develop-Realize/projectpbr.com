<?php
/**
 * Core theme functions
 *
 * @package Septera
 */

 /**
  * Calculates the correct content_width value depending on site with and configured layout
  */
if ( ! function_exists( 'septera_content_width' ) ) :
function septera_content_width() {
   global $content_width;
   $deviation = 0.80;

   $septeras = cryout_get_option( array(
       'septera_sitelayout', 'septera_landingpage', 'septera_magazinelayout', 'septera_sitewidth', 'septera_primarysidebar', 'septera_secondarysidebar',
   ) );

   $content_width = 0.98 * (int)$septeras['septera_sitewidth'];

   switch( $septeras['septera_sitelayout'] ) {
       case '2cSl': case '3cSl': case '3cSr': case '3cSs': $content_width -= (int)$septeras['septera_primarysidebar']; // primary sidebar
       case '2cSr': case '3cSl': case '3cSr': case '3cSs': $content_width -= (int)$septeras['septera_secondarysidebar']; break; // secondary sidebar
   }

   if ( is_front_page() && $septeras['septera_landingpage'] ) {
       // landing page could be a special case;
   }

   if ( ! is_singular() ) {
       switch ( $septeras['septera_magazinelayout'] ):
           case 2: $content_width = floor($content_width*0.98/2); break; // magazine-two
           case 3: $content_width = floor($content_width*0.96/3); break; // magazine-three
       endswitch;
   };

   $content_width = floor($content_width*$deviation);

} // septera_content_width()
endif;

 /**
  * Calculates the correct featured image width depending on site with and configured layout
  * Used by septera_setup()
  */
if ( ! function_exists( 'septera_featured_width' ) ) :
function septera_featured_width() {

   $septeras = cryout_get_option( array(
       'septera_sitelayout', 'septera_landingpage', 'septera_magazinelayout', 'septera_sitewidth', 'septera_primarysidebar', 'septera_secondarysidebar',
       'septera_lplayout',
   ) );

   $width = (int)$septeras['septera_sitewidth'];

   $deviation = 0.02 * $width; // content to sidebar(s) margin

   switch( $septeras['septera_sitelayout'] ) {
       case '2cSl': case '3cSl': case '3cSr': case '3cSs': $width -= (int)$septeras['septera_primarysidebar'] + $deviation; // primary sidebar
       case '2cSr': case '3cSl': case '3cSr': case '3cSs': $width -= (int)$septeras['septera_secondarysidebar'] + $deviation; break; // secondary sidebar
   }

   if ( is_front_page() && $septeras['septera_landingpage'] ) {
       // landing page is a special case
       $width = ceil( (int)$septeras['septera_sitewidth'] / (int)$septeras['septera_magazinelayout'] );
   }

   if ( ! is_singular() ) {
       switch ( $septeras['septera_magazinelayout'] ):
           case 2: $width = ceil($width*0.94/2); break; // magazine-two
           case 3: $width = ceil($width*0.88/3); break; // magazine-three
       endswitch;
   };

   return ceil($width);

} // septera_featured_width()
endif;


 /**
  * Check if a header image is being used
  * Returns the URL of the image or FALSE
  */
if ( ! function_exists( 'septera_header_image_url' ) ) :
function septera_header_image_url() {
   $limit = 0.75;
   $septera_fheader = cryout_get_option( 'septera_fheader' );
   $septera_headerh = floor( cryout_get_option( 'septera_headerheight' ) * $limit );
   $septera_headerw = floor( cryout_get_option( 'septera_sitewidth' ) * $limit );

   // Check if this is a post or page, if it has a thumbnail, and if it's a big one
   global $post;
   $header_image = FALSE;
   if ( get_header_image() != '' ) { $header_image = get_header_image(); }
   if ( is_singular() && has_post_thumbnail( $post->ID ) && $septera_fheader &&
       ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'septera-header' ) )
        ) :
           if ( ( absint($image[1]) >= $septera_headerw ) && ( absint($image[2]) >= $septera_headerh ) ) {
               // 'header' image is large enough
               $header_image = $image[0];
           } else {
               // 'header' image too small, try 'full' image instead
               $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
               if ( ( absint($image[1]) >= $septera_headerw ) && ( absint($image[2]) >= $septera_headerh ) ) {
                   // 'full' image is large enough
                   $header_image = $image[0];
               } else {
                   // even 'full' image is too small, don't return an image
                   //$header_image = false;
               }
           }
   endif;

   return $header_image;
} //septera_header_image_url()
endif;

/**
 * Header image handler
 * Both as normal img and background image
 */
add_action ( 'cryout_headerimage_hook', 'septera_header_image', 99 );
if ( ! function_exists( 'septera_header_image' ) ) :
function septera_header_image() {
	$header_image = septera_header_image_url();
	if ( is_front_page() && function_exists( 'the_custom_header_markup' ) && has_header_video() ) {
		the_custom_header_markup();
	} elseif ( ! empty( $header_image ) ) { ?>
			<div class="header-image" <?php echo cryout_echo_bgimage( esc_url( $header_image ) ) ?>></div>
			<img class="header-image" alt="<?php if ( is_single() ) the_title_attribute(); elseif ( is_archive() ) echo strip_tags( get_the_archive_title() ); else echo get_bloginfo( 'name' ) ?>" src="<?php echo esc_url( $header_image ) ?>" />
			<?php cryout_header_widget_hook(); ?>
	<?php };
} // septera_header_image()
endif;


/**
 * Adds title and description to header
 * Used in header.php
*/
if ( ! function_exists( 'septera_title_and_description' ) ) :
function septera_title_and_description() {

	$septeras = cryout_get_option( array( 'septera_logoupload', 'septera_siteheader' ) );

	if ( in_array( $septeras['septera_siteheader'], array( 'logo', 'both' ) ) ) {
		echo septera_logo_helper( $septeras['septera_logoupload'] );
	}
	if ( in_array( $septeras['septera_siteheader'], array( 'title', 'both', 'logo', 'empty' ) ) ) {
		$heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div';
		echo '<div id="site-text">';
		echo '<' . $heading_tag . cryout_schema_microdata( 'site-title', 0 ) . ' id="site-title">';
		echo '<span> <a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> </span>';
		echo '</' . $heading_tag . '>';
		echo '<span id="site-description" ' . cryout_schema_microdata( 'site-description', 0 ) . ' >' . esc_attr( get_bloginfo( 'description' ) ). '</span>';
		echo '</div>';
	}
} // septera_title_and_description()
endif;
add_action ( 'cryout_branding_hook', 'septera_title_and_description' );

function septera_logo_helper( $septera_logo ) {
	if ( function_exists( 'the_custom_logo' ) ) {
		// WP 4.5+
		$wp_logo = str_replace( 'class="custom-logo-link"', 'id="logo" class="custom-logo-link" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'"', get_custom_logo() );
		if ( ! empty( $wp_logo ) ) return '<div class="identity">' . $wp_logo . '</div>';
	} else {
		// older WP
		if ( ! empty( $septera_logo ) ) :
			$img = wp_get_attachment_image_src( $septera_logo, 'full' );
			return '<div class="identity"><a id="logo" href="' . esc_url( home_url( '/' ) ) . '" ><img title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" src="' . esc_url( $img[0] ) . '" /></a></div>';
		endif;
	}
	return '';
} // septera_logo_helper()

// cryout_schema_publisher() located in cryout/prototypes.php
add_action( 'cryout_after_inner_hook', 'cryout_schema_publisher' );
add_action( 'cryout_singular_after_inner_hook', 'cryout_schema_publisher' );

// cryout_schema_main() located in cryout/prototypes.php
add_action( 'cryout_after_inner_hook', 'cryout_schema_main' );
add_action( 'cryout_singular_after_inner_hook', 'cryout_schema_main' );
/**
 * Septera back to top button
 * Creates div for js
*/

function septera_back_top() {
	echo '<div id="toTop"><i class="icon-back2top"></i> </div>';
} // septera_back_top()
add_action ( 'cryout_after_footer_hook', 'septera_back_top', 99 );


/**
 * Creates pagination for blog pages.
 */
if ( ! function_exists( 'septera_pagination' ) ) :
function septera_pagination( $pages = '', $range = 2, $prefix ='' ) {
	$pagination = cryout_get_option( 'septera_pagination' );
	if ( $pagination && function_exists( 'the_posts_pagination' ) ):
		the_posts_pagination( array(
			'prev_text' => '<i class="icon-pagination-left"></i>',
			'next_text' => '<i class="icon-pagination-right"></i>',
			'mid_size' => $range
		) );
	else:
		//posts_nav_link();
		septera_content_nav( 'nav-old-below' );
	endif;

} // septera_pagination()
endif;

/**
 * Prev/Next page links
 */
if ( ! function_exists( 'septera_nextpage_links' ) ) :
function septera_nextpage_links( $defaults ) {
	$args = array(
		'link_before'      => '<em>',
		'link_after'       => '</em>',
	);
	$r = wp_parse_args( $args, $defaults );
	return $r;
} // septera_nextpage_links()
endif;
add_filter( 'wp_link_pages_args', 'septera_nextpage_links' );


/**
 * Footer Hook
 */
function septera_master_footer() {
	$septera_theme = wp_get_theme();
	cryout_footer_hook();
	echo '<div id="footer-separator"></div>';
	echo '<div id="site-copyright">' . wp_kses_post( cryout_get_option( 'septera_copyright' ) ) . '</div>';
	echo '<div style="display:block;float:right;clear: right;font-size: .85em;font-weight: bold; text-transform: uppercase;">' . __( "Powered by", "septera" ) .
		'<a target="_blank" href="' . esc_html( $septera_theme->get( 'ThemeURI' ) ) . '" title="';
	echo 'Septera WordPress Theme by ' . 'Cryout Creations"> ' . 'Septera' .'</a> &amp; <a target="_blank" href="' . "http://wordpress.org/";
	echo '" title="' . esc_attr__( "Semantic Personal Publishing Platform", "septera") . '"> ' . sprintf( " %s.", "WordPress" ) . '</a></div>';
    cryout_after_footer_hook();
}
add_action( 'cryout_master_footer_hook', 'septera_master_footer' );

/*
 * Sidebar handler
*/
if ( ! function_exists( 'septera_get_sidebar' ) ) :
function septera_get_sidebar() {
	global $post;
	if ( get_post() ) { $septera_meta_layout = get_post_meta( $post->ID, '_septera_layout', true ); }

	if ( isset( $septera_meta_layout ) && $septera_meta_layout ) {
		$septera_sitelayout =  $septera_meta_layout;
	}
	else $septera_sitelayout = cryout_get_option( 'septera_sitelayout' );
	switch( $septera_sitelayout ) {
		case '2cSl':
			get_sidebar( 'left' );
		break;

		case '2cSr':
			get_sidebar( 'right' );
		break;

		case '3cSl' : case '3cSr' : case '3cSs' :
			get_sidebar( 'left' );
			get_sidebar( 'right' );
		break;

		default:
		break;
	}
} // septera_get_sidebar()
endif;

/*
 * General layout class
 */
if ( ! function_exists( 'septera_get_layout_class' ) ) :
function septera_get_layout_class() {
	global $post;
	if ( get_post() ) { $septera_meta_layout = get_post_meta( $post->ID, '_septera_layout', true ); }

	if ( isset( $septera_meta_layout ) && $septera_meta_layout ) {
		$septera_sitelayout =  $septera_meta_layout;
	}
	else $septera_sitelayout = cryout_get_option( 'septera_sitelayout' );

	/*  If not, return the general layout */
	switch( $septera_sitelayout ) {
		case '2cSl': return "two-columns-left"; break;
		case '2cSr': return "two-columns-right"; break;
		case '3cSl': return "three-columns-left"; break;
		case '3cSr' : return "three-columns-right"; break;
		case '3cSs' : return "three-columns-sided"; break;
		case '1c':
		default: return "one-column"; break;
	}
} // septera_get_layout_class()
endif;

/**
* Checks the browser agent string for mobile ids and adds "mobile" class to body if true
* @return array list of classes.
*/
function septera_mobile_body_class( $classes ){
	$browser = ( ! empty( $_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
	$keys = 'mobile|android|mobi|tablet|ipad|opera mini|series 60|s60|blackberry';
	if ( preg_match( "/($keys)/i", $browser ) ) : $classes[] = 'mobile'; endif; // mobile browser detected
	return $classes;
} // septera_mobile_body_class()
add_filter( 'body_class', 'septera_mobile_body_class');


/**
* Creates breadcrumbs with page sublevels and category sublevels.
* Hooked in master hook
*/
if ( ! function_exists( 'septera_breadcrumbs' ) ) :
function septera_breadcrumbs() {
	cryout_breadcrumbs(
		'<i class="icon-bread-arrow"></i>',						// $separator
		'<i class="icon-bread-home"></i>', 						// $home
		1,														// $showCurrent
		'<span class="current">', 								// $before
		'</span>', 												// $after
		'<div id="breadcrumbs-container" class="cryout %1$s"><div id="breadcrumbs-container-inside"><div id="breadcrumbs"> <nav id="breadcrumbs-nav" %2$s>', // $wrapper_pre
		'</nav></div></div></div><!-- breadcrumbs -->', 		// $wrapper_post
		septera_get_layout_class(),								// $layout_class
		__( 'Home', 'septera' ),									// $text_home
		__( 'Archive for category', 'septera' ),					// $text_archive
		__( 'Search results for', 'septera' ), 					// $text_search
		__( 'Posts tagged', 'septera' ), 						// $text_tag
		__( 'Articles posted by', 'septera' ), 					// $text_author
		__( 'Not Found', 'septera' ),							// $text_404
		__( 'Post format', 'septera' ),							// $text_format
		__( 'Page', 'septera' )									// $text_page
	);
} // septera_breadcrumbs()
endif;


/**
 * Adds searchboxes to the appropriate menu location
 * Hooked in master hook
 */
if ( ! function_exists( 'cryout_search_menu' ) ) :
function cryout_search_menu( $items, $args ) {
$options = cryout_get_option( array( 'septera_searchboxmain', 'septera_searchboxfooter' ) );
	if( $args->theme_location == 'primary' && $options['septera_searchboxmain'] ) {
		$container_class = 'menu-main-search';
		$items .= "<li class='" . $container_class . " menu-search-animated'><i class='icon-search'></i>" . get_search_form( false ) . " </li>";
	}
	if( $args->theme_location == 'footer' && $options['septera_searchboxfooter'] ) {
		$container_class = 'menu-footer-search';
		$items .= "<li class='" . $container_class . "'>" . get_search_form( false ) . "</li>";
	}
	return $items;
} // cryout_search_mainmenu()
endif;

/* cryout_schema_microdata() moved to framework in 0.9.9/0.5.6 */

/**
 * Normalizes tags widget font when needed
 */
function septera_normalizetags( $tags_html ) {
	$septera_normalizetags = cryout_get_option( 'septera_normalizetags' );
	if ( $septera_normalizetags ) return preg_replace( '/font-size:.*?;/i', '', $tags_html ); else return $tags_html;
};
add_filter( 'wp_generate_tag_cloud', 'septera_normalizetags' );


/**
* Master hook to bypass customizer options
*/
if ( ! function_exists( 'septera_master_hook' ) ) :
function septera_master_hook() {
	$septera_interim_options = cryout_get_option( array(
		'septera_breadcrumbs',
		'septera_searchboxmain',
		'septera_searchboxfooter',
		'septera_comlabels')
	);
	if ( $septera_interim_options['septera_breadcrumbs'] )  add_action( 'cryout_breadcrumbs_hook', 'septera_breadcrumbs' );
	if ( $septera_interim_options['septera_searchboxmain'] || $septera_interim_options['septera_searchboxfooter'] ) add_filter( 'wp_nav_menu_items', 'cryout_search_menu', 10, 2);

	if ( $septera_interim_options['septera_comlabels'] == 1 ) {
		add_filter( 'comment_form_default_fields', 'septera_comments_form' );
		add_filter( 'comment_form_field_comment', 'septera_comments_form_textarea' );
	}

	if ( cryout_get_option( 'septera_socials_header' ) ) 		add_action( 'cryout_header_socials_hook', 'septera_socials_menu_header', 30 );
	if ( cryout_get_option( 'septera_socials_footer' ) ) 		add_action( 'cryout_footer_hook', 'septera_socials_menu_footer', 17 );
	if ( cryout_get_option( 'septera_socials_left_sidebar' ) ) 	add_action( 'cryout_before_primary_widgets_hook', 'septera_socials_menu_left', 5 );
	if ( cryout_get_option( 'septera_socials_right_sidebar' ) ) 	add_action( 'cryout_before_secondary_widgets_hook', 'septera_socials_menu_right', 5 );
};
endif;
add_action( 'wp', 'septera_master_hook' );


// Boxes image size
function septera_lpbox_width( $options = array() ) {

	if ( $options['septera_lpboxlayout1'] == 1 ) { $totalwidth = 1920; }
	else { $totalwidth = $options['septera_sitewidth']; }
	$options['septera_lpboxwidth1'] = intval ( $totalwidth / $options['septera_lpboxrow1'] );

	if ( $options['septera_lpboxlayout2'] == 1 ) { $totalwidth = 1920; }
	else { $totalwidth = $options['septera_sitewidth']; }
	$options['septera_lpboxwidth2'] = intval ( $totalwidth / $options['septera_lpboxrow2'] );

	return $options;
} // septera_lpbox_width()


// Used for the landing page blocks auto excerpts
function septera_custom_excerpt( $text = '', $length = 35, $more = '...' ) {
	$raw_excerpt = $text;

	//handle the <!--more--> and <!--nextpage--> tags
	$moretag = false;
	if (strpos( $text, '<!--nextpage-->' )) $explodemore = explode('<!--nextpage-->', $text);
	if (strpos( $text, '<!--more-->' )) $explodemore = explode('<!--more-->', $text);
	if (!empty($explodemore[1])) {
		// tag was found
		$text = $explodemore[0];
		$moretag = true;
	}

	if ( '' != $text ) {
		$text = strip_shortcodes( $text );

		$text = str_replace(']]>', ']]&gt;', $text);

		// Filters the number of words in an excerpt. Default 35.
		$excerpt_length = apply_filters( 'septera_custom_excerpt_length', $length );

		if ($excerpt_length == 0) return '';

		// Filters the string in the "more" link displayed after a trimmed excerpt.
		$excerpt_more = apply_filters( 'septera_custom_excerpt_more', $more );

		if (!$moretag) {
			$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
		}
	}
	return apply_filters( 'septera_custom_excerpt', $text, $raw_excerpt );
} // septera_custom_excerpt()

// septera ajax load more button alternative hook
add_action( 'template_redirect', 'cryout_ajax_init' );

/* FIN */
