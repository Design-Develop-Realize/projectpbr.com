<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package responsiveness
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses responsiveness_header_style()
 */
function responsiveness_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'responsiveness_custom_header_args', array(
		'default-image'          => '%s/images/header-bg.png',
		'default-text-color'     => 'fff',
		'width'                  => 1600,
		'height'                 => 500,
		'flex-height'            => true,
		'flex-width'	         => true,
		'wp-head-callback'       => 'responsiveness_header_style',
	) ) );

	register_default_headers( array(
		'header-bg' => array(
			'url'           => '%s/images/header-bg.png',
			'thumbnail_url' => '%s/images/header-bg_thumbnail.png',
			'description'   => _x( 'Default', 'Default header image', 'responsiveness' )
		),	
	
	) );

}
add_action( 'after_setup_theme', 'responsiveness_custom_header_setup' );

if ( ! function_exists( 'responsiveness_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see responsiveness_custom_header_setup().
 */
function responsiveness_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
        if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // responsiveness_header_style