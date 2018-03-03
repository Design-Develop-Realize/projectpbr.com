<?php
/**
 * Adds random images to the demo preview
 *
 * @package Septera
 */
 
// pseudo randomness array
$septera_demo_randomness = array( 6, 8, 1, 5, 2, 9, 7, 3, 4, 10 );
// current element index
$septera_demo_index = 0;

// Return URL of a random demo image 
function septera_demo_image_src(){
	global $septera_demo_randomness;
	global $septera_demo_index;

	if ( $septera_demo_index >= count($septera_demo_randomness) ) $septera_demo_index=0; // reset when randomness array used up

	$filename = "{$septera_demo_randomness[$septera_demo_index]}.jpg";
	
	$septera_demo_index++;
	
	return get_template_directory_uri() . '/resources/images/demo/' . $filename;
} // septera_demo_image_src()

// Filter thumbnail image and return sample image if no thumbnail exists
function septera_demo_thumbnail( $input ) {
	if ( empty( $input ) ) {
		return septera_demo_image_src();
	}
	return $input;
} // septera_demo_thumbnail()

// Check if running on the demo
function septera_is_demo() {
	$current_theme = wp_get_theme();
	$theme_name = $current_theme->get('TextDomain');
	$active_theme = septera_get_wp_option('template');

	return apply_filters( 'septera_is_demo', ( $active_theme != strtolower( $theme_name ) && ! is_child_theme() ) );
} // septera_is_demo()

// Read WordPress options
function septera_get_wp_option( $opt_name ) {
	$alloptions = wp_cache_get( 'alloptions', 'options' );
	$alloptions = maybe_unserialize( $alloptions );
	return isset( $alloptions[ $opt_name ] ) ? maybe_unserialize( $alloptions[ $opt_name ] ) : false;
} // septera_get_wp_option()

// Apply the filter
if ( septera_is_demo() ) { add_filter( 'septera_preview_img_src', 'septera_demo_thumbnail' ); }

// FIN