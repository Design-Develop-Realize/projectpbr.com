<?php

/**
 * The configuration options for Kirki.
 * Change the assets URL for kirki so the customizer styles & scripts are properly loaded.
 */
function unicons_customizer_config( $args ) {

	$args['url_path'] = get_template_directory_uri() . '/inc/kirki/';

	return $args;

}
add_filter( 'kirki/config', 'unicons_customizer_config' );

add_filter( 'kirki/unicons_config/l10n', function( $l10n ) {
	$l10n['background-color']      = esc_attr__( 'Background Color', 'unicons' );
	$l10n['background-image']      = esc_attr__( 'Background Image', 'unicons' );
	$l10n['no-repeat']             = esc_attr__( 'No Repeat', 'unicons' );
	$l10n['repeat-all']            = esc_attr__( 'Repeat All', 'unicons' );
	$l10n['repeat-x']              = esc_attr__( 'Repeat Horizontally', 'unicons' );
	$l10n['repeat-y']              = esc_attr__( 'Repeat Vertically', 'unicons' );
	$l10n['inherit']               = esc_attr__( 'Inherit', 'unicons' );
	$l10n['background-repeat']     = esc_attr__( 'Background Repeat', 'unicons' );
	$l10n['cover']                 = esc_attr__( 'Cover', 'unicons' );
	$l10n['contain']               = esc_attr__( 'Contain', 'unicons' );
	$l10n['background-size']       = esc_attr__( 'Background Size', 'unicons' );
	$l10n['fixed']                 = esc_attr__( 'Fixed', 'unicons' );
	$l10n['scroll']                = esc_attr__( 'Scroll', 'unicons' );
	$l10n['background-attachment'] = esc_attr__( 'Background Attachment', 'unicons' );
	$l10n['left-top']              = esc_attr__( 'Left Top', 'unicons' );
	$l10n['left-center']           = esc_attr__( 'Left Center', 'unicons' );
	$l10n['left-bottom']           = esc_attr__( 'Left Bottom', 'unicons' );
	$l10n['right-top']             = esc_attr__( 'Right Top', 'unicons' );
	$l10n['right-center']          = esc_attr__( 'Right Center', 'unicons' );
	$l10n['right-bottom']          = esc_attr__( 'Right Bottom', 'unicons' );
	$l10n['center-top']            = esc_attr__( 'Center Top', 'unicons' );
	$l10n['center-center']         = esc_attr__( 'Center Center', 'unicons' );
	$l10n['center-bottom']         = esc_attr__( 'Center Bottom', 'unicons' );
	$l10n['background-position']   = esc_attr__( 'Background Position', 'unicons' );
	$l10n['background-opacity']    = esc_attr__( 'Background Opacity', 'unicons' );
	$l10n['on']                    = esc_attr__( 'ON', 'unicons' );
	$l10n['off']                   = esc_attr__( 'OFF', 'unicons' );
	$l10n['all']                   = esc_attr__( 'All', 'unicons' );
	$l10n['cyrillic']              = esc_attr__( 'Cyrillic', 'unicons' );
	$l10n['cyrillic-ext']          = esc_attr__( 'Cyrillic Extended', 'unicons' );
	$l10n['devanagari']            = esc_attr__( 'Devanagari', 'unicons' );
	$l10n['greek']                 = esc_attr__( 'Greek', 'unicons' );
	$l10n['greek-ext']             = esc_attr__( 'Greek Extended', 'unicons' );
	$l10n['khmer']                 = esc_attr__( 'Khmer', 'unicons' );
	$l10n['latin']                 = esc_attr__( 'Latin', 'unicons' );
	$l10n['latin-ext']             = esc_attr__( 'Latin Extended', 'unicons' );
	$l10n['vietnamese']            = esc_attr__( 'Vietnamese', 'unicons' );
	$l10n['hebrew']                = esc_attr__( 'Hebrew', 'unicons' );
	$l10n['arabic']                = esc_attr__( 'Arabic', 'unicons' );
	$l10n['bengali']               = esc_attr__( 'Bengali', 'unicons' );
	$l10n['gujarati']              = esc_attr__( 'Gujarati', 'unicons' );
	$l10n['tamil']                 = esc_attr__( 'Tamil', 'unicons' );
	$l10n['telugu']                = esc_attr__( 'Telugu', 'unicons' );
	$l10n['thai']                  = esc_attr__( 'Thai', 'unicons' );
	$l10n['serif']                 = _x( 'Serif', 'font style', 'unicons' );
	$l10n['sans-serif']            = _x( 'Sans Serif', 'font style', 'unicons' );
	$l10n['monospace']             = _x( 'Monospace', 'font style', 'unicons' );
	$l10n['font-family']           = esc_attr__( 'Font Family', 'unicons' );
	$l10n['font-size']             = esc_attr__( 'Font Size', 'unicons' );
	$l10n['font-weight']           = esc_attr__( 'Font Weight', 'unicons' );
	$l10n['line-height']           = esc_attr__( 'Line Height', 'unicons' );
	$l10n['font-style']            = esc_attr__( 'Font Style', 'unicons' );
	$l10n['letter-spacing']        = esc_attr__( 'Letter Spacing', 'unicons' );
	$l10n['top']                   = esc_attr__( 'Top', 'unicons' );
	$l10n['bottom']                = esc_attr__( 'Bottom', 'unicons' );
	$l10n['left']                  = esc_attr__( 'Left', 'unicons' );
	$l10n['right']                 = esc_attr__( 'Right', 'unicons' );
	$l10n['color']                 = esc_attr__( 'Color', 'unicons' );
	$l10n['add-image']             = esc_attr__( 'Add Image', 'unicons' );
	$l10n['change-image']          = esc_attr__( 'Change Image', 'unicons' );
	$l10n['remove']                = esc_attr__( 'Remove', 'unicons' );
	$l10n['no-image-selected']     = esc_attr__( 'No Image Selected', 'unicons' );
	$l10n['select-font-family']    = esc_attr__( 'Select a font-family', 'unicons' );
	$l10n['variant']               = esc_attr__( 'Variant', 'unicons' );
	$l10n['subsets']               = esc_attr__( 'Subset', 'unicons' );
	$l10n['size']                  = esc_attr__( 'Size', 'unicons' );
	$l10n['height']                = esc_attr__( 'Height', 'unicons' );
	$l10n['spacing']               = esc_attr__( 'Spacing', 'unicons' );
	$l10n['ultra-light']           = esc_attr__( 'Ultra-Light 100', 'unicons' );
	$l10n['ultra-light-italic']    = esc_attr__( 'Ultra-Light 100 Italic', 'unicons' );
	$l10n['light']                 = esc_attr__( 'Light 200', 'unicons' );
	$l10n['light-italic']          = esc_attr__( 'Light 200 Italic', 'unicons' );
	$l10n['book']                  = esc_attr__( 'Book 300', 'unicons' );
	$l10n['book-italic']           = esc_attr__( 'Book 300 Italic', 'unicons' );
	$l10n['regular']               = esc_attr__( 'Normal 400', 'unicons' );
	$l10n['italic']                = esc_attr__( 'Normal 400 Italic', 'unicons' );
	$l10n['medium']                = esc_attr__( 'Medium 500', 'unicons' );
	$l10n['medium-italic']         = esc_attr__( 'Medium 500 Italic', 'unicons' );
	$l10n['semi-bold']             = esc_attr__( 'Semi-Bold 600', 'unicons' );
	$l10n['semi-bold-italic']      = esc_attr__( 'Semi-Bold 600 Italic', 'unicons' );
	$l10n['bold']                  = esc_attr__( 'Bold 700', 'unicons' );
	$l10n['bold-italic']           = esc_attr__( 'Bold 700 Italic', 'unicons' );
	$l10n['extra-bold']            = esc_attr__( 'Extra-Bold 800', 'unicons' );
	$l10n['extra-bold-italic']     = esc_attr__( 'Extra-Bold 800 Italic', 'unicons' );
	$l10n['ultra-bold']            = esc_attr__( 'Ultra-Bold 900', 'unicons' );
	$l10n['ultra-bold-italic']     = esc_attr__( 'Ultra-Bold 900 Italic', 'unicons' );
	$l10n['invalid-value']         = esc_attr__( 'Invalid Value', 'unicons' );

	return $l10n;

} );
