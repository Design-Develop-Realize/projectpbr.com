<?php
/**
 * Customizer settings and other theme related settings (fonts arrays, widget areas)
 *
 * @package Septera
 */

/* active_callback for controls that depend on other controls' values */
function septera_conditionals( $control ) {

	$conditionals = array(
		array(
			'id'	=> 'septera_lpsliderimage',
			'parent'=> 'septera_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'septera_lpslidertitle',
			'parent'=> 'septera_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'septera_lpslidertext',
			'parent'=> 'septera_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'septera_lpslidershortcode',
			'parent'=> 'septera_lpslider',
			'value'	=> 2,
		),
		array(
			'id'	=> 'septera_lpsliderserious',
			'parent'=> 'septera_lpslider',
			'value' => 4,
		),
		array(
			'id'	=> 'septera_lpposts',
			'parent'=> 'septera_landingpage',
			'value' => 1,
		),
		array(
			'id'	=> 'septera_lpposts_more',
			'parent'=> 'septera_lpposts',
			'value' => 1,
		),
	);

	foreach ($conditionals as $elem) {
		if ( $control->id == 'septera_settings['.$elem['id'].']' && $control->manager->get_setting('septera_settings['.$elem['parent'].']')->value() == $elem['value'] ) return true;
	};

	if ( ($control->id == "septera_settings[septera_landingpage_notice]") && ('posts' == get_option('show_on_front')) ) return true;

    return false;

} // septera_conditionals()

$septera_big = array(

/************* general info ***************/

'info_sections' => array(
	'cryoutspecial-about-theme' => array(
		'title' => __( 'About', 'cryout' ) . ' ' . ucwords(_CRYOUT_THEME_NAME),
		'desc' => '<img src=" ' . get_template_directory_uri() . '/admin/images/logo-about-header.png" >',
	),
), // info_sections

'info_settings' => array(
	'support_link_faqs' => array(
		'label' => '',
		'default' => sprintf( '<a href="https://www.cryoutcreations.eu/wordpress-themes/' . _CRYOUT_THEME_NAME . '" target="_blank">%s</a>', __( 'Read the Docs', 'cryout' ) ),
		'desc' =>  '',
		'section' => 'cryoutspecial-about-theme',
	),
	'support_link_forum' => array(
		'label' => '',
		'default' => sprintf( '<a href="https://www.cryoutcreations.eu/forums/f/wordpress/' . cryout_sanitize_tn( _CRYOUT_THEME_NAME ) . '" target="_blank">%s</a>', __( 'Browse the Forum', 'cryout' ) ),
		'desc' => '',
		'section' => 'cryoutspecial-about-theme',
	),
	'premium_support_link' => array(
		'label' => '',
		'default' => sprintf( '<a href="https://www.cryoutcreations.eu/priority-support" target="_blank">%s</a>', __( 'Priority Support', 'cryout' ) ),
		'desc' => '',
		'section' => 'cryoutspecial-about-theme',
	),
	'rating_url' => array(
		'label' => '&nbsp;',
		'default' => sprintf( '<a href="https://wordpress.org/support/view/theme-reviews/'. cryout_sanitize_tn( _CRYOUT_THEME_NAME ).'#postform" target="_blank">%s</a>', sprintf( __( 'Rate %s on WordPress.org', 'cryout' ) , ucwords(_CRYOUT_THEME_NAME) ) ),
		'desc' => '',
		'section' => 'cryoutspecial-about-theme',
	),
	'management' => array(
		'label' => '&nbsp;',
		'default' => sprintf( '<a href="themes.php?page=about-' . cryout_sanitize_tn( _CRYOUT_THEME_NAME ) . '-theme">%s</a>', __('Manage Theme Settings', 'cryout') ),
		'desc' => '',
		'section' => 'cryoutspecial-about-theme',
	),
), // info_settings

'panel_overrides' => array(
	'background' => array(
        'title' => __( 'Background', 'cryout' ),
		'desc' => __( 'Background Settings.', 'cryout' ),
		'priority' => 50,
		'section' => 'cryoutoverride-septera_siteidentity',
		'replaces' => 'background_image',
		'type' => 'section',
	),
	'septera_header_section' => array(
		'title' => __( 'Header Image', 'cryout' ),
		'desc' => __( 'Header Image Settings.', 'cryout' ),
		'priority' => 50,
		'section' => 'cryoutoverride-septera_siteidentity',
		'replaces' => 'header_image',
		'type' => 'section',
	),
	'identity' => array(
		'title' => __( 'Site Identity', 'cryout' ),
		'desc' => '',
		'priority' => 50,
		'section' => 'cryoutoverride-septera_siteidentity',
		'replaces' => 'title_tagline',
		'type' => 'section',
	),
	'colors' => array(
		'section' => 'section',
		'replaces' => 'colors',
		'type' => 'remove',
	),

), // panel_overrides

/************* panels *************/

'panels' => array(

	array('id'=>'septera_siteidentity', 'title'=>__('Site Identity','septera'), 'callback'=>'', 'identifier'=>'cryoutoverride-' ),
	array('id'=>'septera_landingpage', 'title'=>__('Landing Page','septera'), 'callback'=>'' ),
	array('id'=>'septera_general_section', 'title'=>__('General','septera') , 'callback'=>'' ),
	array('id'=>'septera_colors_section', 'title'=>__('Colors','septera'), 'callback'=>'' ),
	array('id'=>'septera_text_section', 'title'=>__('Typography','septera'), 'callback'=>'' ),
	array('id'=>'septera_post_section', 'title'=>__('Post Information','septera') , 'callback'=>'' ),

), // panels

/************* sections *************/

'sections' => array(

	// layout
	array('id'=>'septera_layout', 'title'=>__('Layout', 'septera'), 'callback'=>'', 'sid'=>'', 'priority'=>51 ),
	// header
	array('id'=>'septera_siteheader', 'title'=>__('Header','septera'), 'callback'=>'', 'sid'=> '', 'priority'=>52 ),
	// landing page
	array('id'=>'septera_lpgeneral', 'title'=>__('Settings','septera'), 'callback'=>'', 'sid'=>'septera_landingpage', ),
	array('id'=>'septera_lpslider', 'title'=>__('Slider','septera'), 'callback'=>'', 'sid'=>'septera_landingpage', ),
	array('id'=>'septera_lpblocks', 'title'=>__('Featured Icon Blocks','septera'), 'callback'=>'', 'sid'=>'septera_landingpage', ),
	array('id'=>'septera_lpboxes1', 'title'=>__('Featured Boxes Top','septera'), 'callback'=>'', 'sid'=>'septera_landingpage', ),
	array('id'=>'septera_lpboxes2', 'title'=>__('Featured Boxes Bottom','septera'), 'callback'=>'', 'sid'=>'septera_landingpage', ),
	array('id'=>'septera_lptexts', 'title'=>__('Text Areas','septera'), 'callback'=>'', 'sid'=>'septera_landingpage', ),
	// text
	array('id'=>'septera_fontfamily', 'title'=>__('General Font','septera'), 'callback'=>'', 'sid'=> 'septera_text_section'),
	array('id'=>'septera_fontheader', 'title'=>__('Header Fonts','septera'), 'callback'=>'', 'sid'=> 'septera_text_section'),
	array('id'=>'septera_fontwidget', 'title'=>__('Widget Fonts','septera'), 'callback'=>'', 'sid'=> 'septera_text_section'),
	array('id'=>'septera_fontcontent', 'title'=>__('Content Fonts','septera'), 'callback'=>'', 'sid'=> 'septera_text_section'),
	array('id'=>'septera_textformatting', 'title'=>__('Formatting','septera'), 'callback'=>'', 'sid'=> 'septera_text_section'),
	// general
	array('id'=>'septera_contentstructure', 'title'=>__('Structure','septera'), 'callback'=>'', 'sid'=> 'septera_general_section'),
	array('id'=>'septera_contentgraphics', 'title'=>__('Decorations','septera'), 'callback'=>'', 'sid'=> 'septera_general_section'),
	array('id'=>'septera_postimage', 'title'=>__('Content Images','septera'), 'callback'=>'', 'sid'=> 'septera_general_section'),
	array('id'=>'septera_searchbox', 'title'=>__('Search Box Locations','septera'), 'callback'=>'', 'sid'=> 'septera_general_section'),
	array('id'=>'septera_socials', 'title'=>__('Social Icons','septera'), 'callback'=>'', 'sid'=>'septera_general_section'),
	// colors
	array('id'=>'septera_colors', 'title'=>__('Content','septera'), 'callback'=>'', 'sid'=> 'septera_colors_section'),
	array('id'=>'septera_colors_header', 'title'=>__('Header','septera'), 'callback'=>'', 'sid'=> 'septera_colors_section'),
	array('id'=>'septera_colors_footer', 'title'=>__('Footer','septera'), 'callback'=>'', 'sid'=> 'septera_colors_section'),
	// post info
	array('id'=>'septera_featured', 'title'=>__('Featured Image', 'septera'), 'callback'=>'', 'sid'=>'septera_post_section'),
	array('id'=>'septera_metas', 'title'=>__('Meta Information','septera'), 'callback'=>'', 'sid'=> 'septera_post_section'),
	array('id'=>'septera_excerpts', 'title'=>__('Excerpts','septera'), 'callback'=>'', 'sid'=> 'septera_post_section'),
	array('id'=>'septera_comments', 'title'=>__('Comments','septera'), 'callback'=>'', 'sid'=> 'septera_post_section'),
	// post excerpt
	array('id'=>'septera_excerpthome', 'title'=>__('Home Page','septera'), 'callback'=>'', 'sid'=> 'excerpt_section'),
	array('id'=>'septera_excerptsticky', 'title'=>__('Sticky Posts','septera'), 'callback'=>'', 'sid'=> 'excerpt_section'),
	array('id'=>'septera_excerptarchive', 'title'=>__('Archive and Category Pages','septera'), 'callback'=>'', 'sid'=> 'excerpt_section'),
	array('id'=>'septera_excerptlength', 'title'=>__('Post Excerpt Length ','septera'), 'callback'=>'', 'sid'=> 'excerpt_section'),
	array('id'=>'septera_excerptdots', 'title'=>__('Excerpt suffix','septera'), 'callback'=>'', 'sid'=> 'excerpt_section'),
	array('id'=>'septera_excerptcont', 'title'=>__('Continue reading link text ','septera'), 'callback'=>'', 'sid'=> 'excerpt_section'),
	// misc
	array('id'=>'septera_misc', 'title'=>__('Miscellaneous','septera'), 'callback'=>'', 'sid'=>'', 'priority'=>82 ),

	/*** developer options ***/
	//array('id'=>'septera_developer', 'title'=>__('[ Developer Options ]','septera'), 'callback'=>'', 'sid'=>'', 'priority'=>101 ),

), // sections

/************ clone options *********/
'clones' => array (
	'septera_lpboxes' => 2,
),

/************* settings *************/

'options' => array (
	//////////////////////////////////////////////////// Layout ////////////////////////////////////////////////////
	array(
	'id' => 'septera_sitelayout',
		'type' => 'radioimage',
		'label' => __('Main Layout','septera'),
		'choices' => array(
			'1c' => array(
				'label' => __("One column (no sidebars)","septera"),
				'url'   => '%s/admin/images/1c.png'
			),
			'2cSr' => array(
				'label' => __("Two columns, sidebar on the right","septera"),
				'url'   => '%s/admin/images/2cSr.png'
			),
			'2cSl' => array(
				'label' => __("Two columns, sidebar on the left","septera"),
				'url'   => '%s/admin/images/2cSl.png'
			),
			'3cSr' => array(
				'label' => __("Three columns, sidebars on the right","septera"),
				'url'   => '%s/admin/images/3cSr.png'
			),
			'3cSl' => array(
				'label' => __("Three columns, sidebars on the left","septera"),
				'url'   => '%s/admin/images/3cSl.png'
			),
			'3cSs' => array(
				'label' => __("Three columns, one sidebar on each side","septera"),
				'url'   => '%s/admin/images/3cSs.png'
			),
		),
		'desc' => '',
	'section' => 'septera_layout' ),
	array(
	'id' => 'septera_layoutalign',
		'type' => 'select',
		'label' => __('Theme alignment','septera'),
		'values' => array( 0, 1 ),
		'labels' => array( __('Wide','septera'), __('Boxed','septera') ),
		'desc' => "",
	'section' => 'septera_layout' ),
	array(
	'id' => 'septera_sitewidth',
		'type' => 'slider',
		'label' => 'Site Width',
		'min' => 960, 'max' => 1920, 'step' => 10, 'um' => 'px',
		'desc' => "",
	'section' => 'septera_layout' ),
	array(
	'id' => 'septera_primarysidebar',
		'type' => 'slider',
		'label' => 'Left Sidebar Width',
		'min' => 200, 'max' => 600, 'step' => 10, 'um' => 'px',
		'desc' => "",
	'section' => 'septera_layout' ),
	array(
	'id' => 'septera_secondarysidebar',
		'type' => 'slider',
		'label' => 'Right Sidebar Width',
		'min' => 200, 'max' => 600, 'step' => 10, 'um' => 'px',
		'desc' => "",
	'section' => 'septera_layout' ),

	array(
	'id' => 'septera_magazinelayout',
		'type' => 'radioimage',
		'label' => __('Posts Layout','septera'),
		'choices' => array(
			1 => array(
				'label' => __("One column","septera"),
				'url'   => '%s/admin/images/magazine-1col.png'
			),
			2 => array(
				'label' => __("Two columns","septera"),
				'url'   => '%s/admin/images/magazine-2col.png'
			),
			3 => array(
				'label' => __("Three columns","septera"),
				'url'   => '%s/admin/images/magazine-3col.png'
			),
		),
		'desc' => '',
	'section' => 'septera_layout' ),
	array(
	'id' => 'septera_elementpadding',
		'type' => 'select',
		'label' => __('Post/page padding','septera'),
		'values' => cryout_gen_values( 0, 10, 1, array('um'=>'') ),
		'labels' => cryout_gen_values( 0, 10, 1, array('um'=>'%') ),
		'desc' => '',
	'section' => 'septera_layout' ),

	array(
	'id' => 'septera_footercols',
		'type' => 'select',
		'label' => __("Footer Widgets Columns","septera"),
		'values' => array(0, 1, 2, 3, 4),
		'labels' => array( "All in a row" , "1 Column", "2 Columns" , "3 Columns" , "4 Columns" ),
		'desc' => '',
	'section' => 'septera_layout' ),
	array(
	'id' => 'septera_footeralign',
		'type' => 'select',
		'values' => array( 0 , 1 ),
		'labels' => array( __("Default","septera"), __("Center","septera") ),
		'label' => __('Footer Widgets Alignment','septera'),
		'desc' => "",
	'section' => 'septera_layout' ),

	// Header
	array(
	'id' => 'septera_menuheight',
		'type' => 'number',
		'min' => 45,
		'max' => 200,
		'label' => __('Header/Menu Height','septera'),
		'desc' => "",
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_menustyle',
		'type' => 'select',
		'values' => array( 0, 1 ),
		'labels' => array( __("Disabled","septera"), __("Enabled","septera") ),
		'label' => __('Fixed Menu','septera'),
		'desc' => "",
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_menuposition',
		'type' => 'select',
		'values' => array( 0, 1 ),
		'labels' => array( __("Normal","septera"), __("Over header image","septera") ),
		'label' => __('Menu Position','septera'),
		'desc' => "",
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_menulayout',
		'type' => 'select',
		'values' => array( 0, 1, 2 ),
		'labels' => array( __("Left", "septera"), __("Right","septera"), __("Center","septera") ),
		'label' => __('Menu Layout','septera'),
		'desc' => "",
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_headerheight',
		'type' => 'number',
		'min' => 0,
		'max' => 800,
		'label' => __('Header Image Height (in pixels)','septera'),
		'desc' => "",
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_headerheight_notice',
		'type' => 'notice',
		'label' => '',
		'input_attrs' => array( 'class' => 'warning' ),
		'desc' => __("Changing this value may require to regenerate your thumbnails.","septera"),
		//'active_callback' => 'septera_conditionals',
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_headerresponsive',
		'type' => 'select',
		'values' => array( 0, 1 ),
		'labels' => array( __("Cropped","septera"), __("Responsive","septera") ),
		'label' => __('Header Image Behaviour','septera'),
		'desc' => "",
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_siteheader',
		'type' => 'select',
		'label' => __('Site Header Content','septera'),
		'values' => array( 'title' , 'logo' , 'both' , 'empty' ),
		'labels' => array( __("Site Title","septera"), __("Logo","septera"), __("Logo & Site Title","septera"), __("Empty","septera") ),
		'desc' => '',
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_sitetagline',
		'type' => 'checkbox',
		'label' => __('Show Tagline','septera'),
		'desc' => '',
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_logoupload',
		'type' => 'media-image',
		'label' => __('Logo Image','septera'),
		'desc' => '',
		'disable_if' => 'the_custom_logo',
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_headerwidgetwidth',
		'type' => 'select',
		'label' => __("Header Widget Width","septera"),
		'values' => array( "100%" , "60%" , "50%" , "33%" , "25%" ),
		'desc' => '',
	'section' => 'septera_siteheader' ),
	array(
	'id' => 'septera_headerwidgetalign',
		'type' => 'select',
		'label' => __("Header Widget Alignment","septera"),
		'values' => array( 'left' , 'center' , 'right' ),
		'labels' => array( __("Left","septera"), __("Center","septera"), __("Right","septera") ),
		'desc' => '',
	'section' => 'septera_siteheader' ),

	//////////////////////////////////////////////////// Landing Page ////////////////////////////////////////////////////
	array(
	'id' => 'septera_landingpage',
		'type' => 'select',
		'label' => __('Landing Page','septera'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enabled","septera"), __("Disabled (use WordPress homepage)","septera") ),
		'desc' => "",
	'section' => 'septera_lpgeneral' ),
	array(
	'id' => 'septera_landingpage_notice',
		'type' => 'notice',
		'label' => '',
		'input_attrs' => array( 'class' => 'warning' ),
		'desc' => sprintf( __( "To activate the Landing Page, make sure to set the WordPress <strong>Front Page displays</strong> option to %s","septera" ), "<a data-type='section' data-id='static_front_page' class='cryout-customizer-focus'><strong>" . __("use a static page", "septera") . " &raquo;</strong></a>" ),
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpgeneral' ),
	array(
	'id' => 'septera_lpposts',
		'type' => 'select',
		'label' => __('Featured Content','septera'),
		'values' => array( 2, 1, 0 ),
		'labels' => array( __("Static Page", "septera"), __("Posts", "septera"), __("Disabled", "septera") ),
		'desc' => '',
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpgeneral' ),
	array(
	'id' => 'septera_lpposts_more',
		'type' => 'text',
		'label' => __( 'More Posts Label', 'septera' ),
		'desc' => '',
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpgeneral' ),

	// slider
	array(
	'id' => 'septera_lpslider',
		'type' => 'select',
		'label' => __('Slider','septera'),
		'values' => array( 4, 2, 1, 3, 0 ),
		'labels' => array( __("Serious Slider", "septera"), __("Use Shortcode","septera"), __("Static Image","septera"), __("Header Image","septera"), __("Disabled","septera") ),
		'desc' => sprintf( __("To create an advanced slider, use our <a href='%s' target='_blank'>Serious Slider</a> plugin or any other slider plugin.","septera"), 'https://wordpress.org/plugins/cryout-serious-slider/' ),
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpsliderimage',
		'type' => 'media-image',
		'label' => __('Slider Image','septera'),
		'desc' => __('The default image can be replaced by setting a new static image.', 'septera'),
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpslidertitle',
		'type' => 'text',
		'label' => __('Slider Caption','septera'),
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Title', 'septera') ),
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpslidertext',
		'type' => 'textarea',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Text', 'septera') ),
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpsliderlink',
		'type' => 'url',
		'label' => __('Slider Link','septera'),
		'desc' => '',
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpslidershortcode',
		'type' => 'text',
		'label' => __('Shortcode','septera'),
		'desc' => __('Enter shortcode provided by slider plugin. The plugin will be responsible for the slider\'s appearance.','septera'),
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpsliderserious',
		'type' => 'select',
		'label' => __('Serious Slider','septera'),
		'values' => cryout_serious_slides_for_customizer(1, 0),
		'labels' => cryout_serious_slides_for_customizer(2, __(' - Please install, activate or update Serious Slider plugin - ', 'septera'), __(' - No sliders defined - ', 'septera') ),
		'desc' => __('Select the desired slider from the list. Sliders can be administered in the dashboard.','septera'),
		'active_callback' => 'septera_conditionals',
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpslidercta1text',
		'type' => 'text',
		'label' => __('CTA Button','septera') . ' #1',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Text', 'septera') ),
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpslidercta1link',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Link', 'septera') ),
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpslidercta2text',
		'type' => 'text',
		'label' => __('CTA Button','septera') . ' #2',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Text', 'septera') ),
	'section' => 'septera_lpslider' ),
	array(
	'id' => 'septera_lpslidercta2link',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Link', 'septera') ),
	'section' => 'septera_lpslider' ),

	// blocks
	array(
	'id' => 'septera_lpblockmaintitle',
		'type' => 'text',
		'label' => __('Section Title','septera'),
		'desc' => '',
	'section' => 'septera_lpblocks' ),
	array(
	'id' => 'septera_lpblockmaindesc',
		'type' => 'textarea',
		'label' => __( 'Section Description', 'septera' ),
		'desc' => '',
	'section' => 'septera_lpblocks' ),
	array(
	'id' => 'septera_lpblockoneicon',
		'type' => 'iconselect',
		'label' => sprintf( __('Block %d','septera'), 1),
		'values' => array(),
		'labels' => array(),
		'desc' => '',
	'section' => 'septera_lpblocks' ),
	array(
	'id' => 'septera_lpblockone',
		'type' => 'select',
		'label' => '',
		'values' => cryout_pages_for_customizer(1, sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'labels' => cryout_pages_for_customizer(2, sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'desc' => '&nbsp;',
	'section' => 'septera_lpblocks' ),

	array(
	'id' => 'septera_lpblocktwoicon',
		'type' => 'iconselect',
		'label' => sprintf( __('Block %d','septera'), 2),
		'values' => array(),
		'labels' => array(),
		'desc' => '',
	'section' => 'septera_lpblocks' ),
	array(
	'id' => 'septera_lpblocktwo',
		'type' => 'select',
		'label' => '',
		'values' => cryout_pages_for_customizer(1, sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'labels' => cryout_pages_for_customizer(2, sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'desc' => '&nbsp;',
	'section' => 'septera_lpblocks' ),

	array(
	'id' => 'septera_lpblockthreeicon',
		'type' => 'iconselect',
		'label' => sprintf( __('Block %d','septera'), 3),
		'values' => array(),
		'labels' => array(),
		'desc' => '',
	'section' => 'septera_lpblocks' ),
	array(
	'id' => 'septera_lpblockthree',
		'type' => 'select',
		'label' => '',
		'values' => cryout_pages_for_customizer(1, sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'labels' => cryout_pages_for_customizer(2, sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'desc' => '&nbsp;',
	'section' => 'septera_lpblocks' ),

	array(
	'id' => 'septera_lpblockfouricon',
		'type' => 'iconselect',
		'label' => sprintf( __('Block %d','septera'), 4),
		'values' => array(),
		'labels' => array(),
		'desc' => '',
	'section' => 'septera_lpblocks' ),
	array(
	'id' => 'septera_lpblockfour',
		'type' => 'select',
		'label' => '',
		'values' => cryout_pages_for_customizer(1, sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'labels' => cryout_pages_for_customizer(2, sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'desc' => '&nbsp;',
	'section' => 'septera_lpblocks' ),
	array(
	'id' => 'septera_lpblockscontent',
		'type' => 'select',
		'label' => __('Blocks Content','septera'),
		'values' => array( 0, 1, 2 ),
		'labels' => array( __("Disabled","septera"), __("Excerpt","septera"), __("Full Content","septera") ),
		'desc' => '',
	'section' => 'septera_lpblocks' ),
	array(
	'id' => 'septera_lpblocksclick',
		'type' => 'checkbox',
		'label' => __('Make icons clickable (linking to their respective pages).','septera'),
		'desc' => '',
	'section' => 'septera_lpblocks' ),


	// boxes #cloned#
	array(
	'id' => 'septera_lpboxmaintitle#',
		'type' => 'text',
		'label' => __('Section Title','septera'),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxmaindesc#',
		'type' => 'textarea',
		'label' => __( 'Section Description', 'septera' ),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxcat#',
		'type' => 'select',
		'label' => __('Boxes Content','septera'),
		'values' => cryout_categories_for_customizer(1, __('All Categories', 'septera'), sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'labels' => cryout_categories_for_customizer(2, __('All Categories', 'septera'), sprintf( '- %s -', __('Disabled', 'septera') ) ),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxcount#',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
		),
		'label' => __('Number of Boxes','septera'),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxrow#',
		'type' => 'select',
		'label' => __('Boxes Per Row','septera'),
		'values' => array( 1, 2, 3, 4 ),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxheight#',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 2000,
		),
		'label' => __('Box Height','septera'),
		'desc' => __("In pixels. The width is a percentage dependent on total site width and number of columns per row.","septera"),
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxlayout#',
		'type' => 'select',
		'label' => __('Box Layout','septera'),
		'values' => array( 1, 2 ),
		'labels' => array( __("Full width","septera"), __("Boxed","septera") ),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxmargins#',
		'type' => 'select',
		'label' => __('Box Stacking','septera'),
		'values' => array( 1, 2 ),
		'labels' => array( __("Joined","septera"), __("Apart","septera") ),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxanimation#',
		'type' => 'select',
		'label' => __('Box Appearance','septera'),
		'values' => array( 1, 2 ),
		'labels' => array( __("Animated","septera"), __("Static","septera") ),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxreadmore#',
		'type' => 'text',
		'label' => __('Read More Button','septera'),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),
	array(
	'id' => 'septera_lpboxlength#',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
		),
		'label' => __('Content Length (words)','septera'),
		'desc' => '',
	'section' => 'septera_lpboxes#' ),

	// texts
	array(
	'id' => 'septera_lptextone',
		'type' => 'select',
		'label' => sprintf( __('Text Area %d','septera'), 1),
		'values' => cryout_pages_for_customizer(1, __('Disabled', 'septera') ),
		'labels' => cryout_pages_for_customizer(2, __('Disabled', 'septera') ),
		'desc' => '',
	'section' => 'septera_lptexts' ),
	array(
	'id' => 'septera_lptexttwo',
		'type' => 'select',
		'label' => sprintf( __('Text Area %n','septera'), 2),
		'values' => cryout_pages_for_customizer(1, __('Disabled', 'septera') ),
		'labels' => cryout_pages_for_customizer(2, __('Disabled', 'septera') ),
		'desc' => '',
	'section' => 'septera_lptexts' ),
	array(
	'id' => 'septera_lptextthree',
		'type' => 'select',
		'label' => sprintf( __('Text Area %n','septera'), 3),
		'values' => cryout_pages_for_customizer(1, __('Disabled', 'septera') ),
		'labels' => cryout_pages_for_customizer(2, __('Disabled', 'septera') ),
		'desc' => '',
	'section' => 'septera_lptexts' ),
	array(
	'id' => 'septera_lptextfour',
		'type' => 'select',
		'label' => sprintf( __('Text Area %n','septera'), 4),
		'values' => cryout_pages_for_customizer(1, __('Disabled', 'septera') ),
		'labels' => cryout_pages_for_customizer(2, __('Disabled', 'septera') ),
		'desc' => __("<br><br>Page properties that will be used:<br>- page title as text title<br>- page content as text content<br>- page featured image as text area background image","septera"),
	'section' => 'septera_lptexts' ),


	//////////////////////////////////////////////////// Colors ////////////////////////////////////////////////////

	array(
	'id' => 'septera_sitebackground',
		'type' => 'color',
		'label' => __('Site Background','septera'),
		'desc' => '',
	'section' => 'septera_colors' ),
	array(
	'id' => 'septera_sitetext',
		'type' => 'color',
		'label' => __('Site Text','septera'),
		'desc' => '',
	'section' => 'septera_colors' ),
	array(
	'id' => 'septera_headingstext',
		'type' => 'color',
		'label' => __('Content Headings','septera'),
		'desc' => '',
	'section' => 'septera_colors' ),
	array(
	'id' => 'septera_contentbackground',
		'type' => 'color',
		'label' => __('Content Background','septera'),
		'desc' => '',
	'section' => 'septera_colors' ),
	array(
	'id' => 'septera_primarybackground',
		'type' => 'color',
		'label' => __('Left Sidebar Background','septera'),
		'desc' => '',
	'section' => 'septera_colors' ),
	array(
	'id' => 'septera_secondarybackground',
		'type' => 'color',
		'label' => __('Right Sidebar Background','septera'),
		'desc' => '',
	'section' => 'septera_colors' ),
	array(
	'id' => 'septera_menubackground',
		'type' => 'color',
		'label' => __('Header Background','septera'),
		'desc' => '',
	'section' => 'septera_colors_header' ),
	array(
	'id' => 'septera_headeroverlay',
		'type' => 'color',
		'label' => __('Header Overlay','septera'),
		'desc' => '',
	'section' => 'septera_colors_header' ),
	array(
	'id' => 'septera_headeroverlayopacity',
		'type' => 'slider',
		'label' => 'Header Overlay Opacity',
		'min' => 0, 'max' => 100, 'step' => 5, 'um' => '%',
		'desc' => "",
	'section' => 'septera_colors_header' ),
	array(
	'id' => 'septera_menutext',
		'type' => 'color',
		'label' => __('Menu Text','septera'),
		'desc' => '',
	'section' => 'septera_colors_header' ),
	array(
	'id' => 'septera_menutextoverlay',
		'type' => 'color',
		'label' => __('Text on header overlay','septera'),
		'desc' => '',
	'section' => 'septera_colors_header' ),
	array(
	'id' => 'septera_submenutext',
		'type' => 'color',
		'label' => __('Submenu Text','septera'),
		'desc' => '',
	'section' => 'septera_colors_header' ),
	array(
	'id' => 'septera_submenubackground',
		'type' => 'color',
		'label' => __('Submenu Background','septera'),
		'desc' => '',
	'section' => 'septera_colors_header' ),
	array(
	'id' => 'septera_footerbackground',
		'type' => 'color',
		'label' => __('Footer Background','septera'),
		'desc' => '',
	'section' => 'septera_colors_footer' ),
	array(
	'id' => 'septera_footertext',
		'type' => 'color',
		'label' => __('Footer Text','septera'),
		'desc' => '',
	'section' => 'septera_colors_footer' ),
	array(
	'id' => 'septera_accent1',
		'type' => 'color',
		'label' => __('Primary Accent','septera'),
		'desc' => '',
	'section' => 'septera_colors' ),
	array(
	'id' => 'septera_accent2',
		'type' => 'color',
		'label' => __('Secondary Accent','septera'),
		'desc' => '',
	'section' => 'septera_colors' ),

	//////////////////////////////////////////////////// Fonts ////////////////////////////////////////////////////
	array( // general font
	'id' => 'septera_fgeneralsize',
		'type' => 'select',
		'label' => __('General Font','septera'),
		'values' => cryout_gen_values( 12, 20, 1, array('um'=>'px') ),
		'desc' => '',
	'section' => 'septera_fontfamily' ),
	array(
	'id' => 'septera_fgeneralweight',
		'type' => 'select',
		'label' => '',
		'values' => array('300','400','700','800'),
		'labels' => array( __('300 (ligher)','septera'), __('400 (normal)','septera'), __('700 (bold)','septera'), __('800 (bolder)','septera') ),
		'desc' => '',
	'section' => 'septera_fontfamily' ),
	array(
	'id' => 'septera_fgeneral',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'septera_fontfamily' ),
	array(
	'id' => 'septera_fgeneralgoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => __("The fonts under the <em>Preferred Theme Fonts</em> list are recommended because they have all the font weights used throughout the theme.","septera"),
		'input_attrs' => array( 'placeholder' => __('or enter Google Font Identifier','septera') ),
	'section' => 'septera_fontfamily' ),

	array( // site title font
	'id' => 'septera_fsitetitlesize',
		'type' => 'select',
		'label' => __('Site Title','septera'),
		'values' => cryout_gen_values( 90, 250, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'septera_fontheader' ),
	array(
	'id' => 'septera_fsitetitleweight',
		'type' => 'select',
		'label' => '',
		'values' => array('300','400','700','800'),
		'labels' => array( __('300 (ligher)','septera'), __('400 (normal)','septera'), __('700 (bold)','septera'), __('800 (bolder)','septera') ),
		'desc' => '',
	'section' => 'septera_fontheader' ),
	array(
	'id' => 'septera_fsitetitle',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'septera_fontheader' ),
	array(
	'id' => 'septera_fsitetitlegoogle',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('or enter Google Font Identifier','septera') ),
	'section' => 'septera_fontheader' ),

	array( // menu font
	'id' => 'septera_fmenusize',
		'type' => 'select',
		'label' => __('Main Menu','septera'),
		'values' => cryout_gen_values( 80, 140, 5, array('um'=>'%') ),
		'desc' => '',
	'section' => 'septera_fontheader' ),
	array(
	'id' => 'septera_fmenuweight',
		'type' => 'select',
		'label' => '',
		'values' => array('300','400','700','800'),
		'labels' => array( __('300 (ligher)','septera'), __('400 (normal)','septera'), __('700 (bold)','septera'), __('800 (bolder)','septera') ),
		'desc' => '',
	'section' => 'septera_fontheader' ),
	array(
	'id' => 'septera_fmenu',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'septera_fontheader' ),
	array(
	'id' => 'septera_fmenugoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('or enter Google Font Identifier','septera') ),
	'section' => 'septera_fontheader' ),

	array( // widget fonts
	'id' => 'septera_fwtitlesize',
		'type' => 'select',
		'label' => __('Widget Title','septera'),
		'values' => cryout_gen_values( 80, 120, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'septera_fontwidget' ),
	array(
	'id' => 'septera_fwtitleweight',
		'type' => 'select',
		'label' => '',
		'values' => array('300','400','700','800'),
		'labels' => array( __('300 (ligher)','septera'), __('400 (normal)','septera'), __('700 (bold)','septera'), __('800 (bolder)','septera') ),
		'desc' => '',
	'section' => 'septera_fontwidget' ),
	array(
	'id' => 'septera_fwtitle',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'septera_fontwidget' ),
	array(
	'id' => 'septera_fwtitlegoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('or enter Google Font Identifier','septera') ),
	'section' => 'septera_fontwidget' ),

	array(
	'id' => 'septera_fwcontentsize',
		'type' => 'select',
		'label' => __('Widget Content','septera'),
		'values' => cryout_gen_values( 80, 120, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'septera_fontwidget' ),
	array(
	'id' => 'septera_fwcontentweight',
		'type' => 'select',
		'label' => '',
		'values' => array('300','400','700','800'),
		'labels' => array( __('300 (ligher)','septera'), __('400 (normal)','septera'), __('700 (bold)','septera'), __('800 (bolder)','septera') ),
		'desc' => '',
	'section' => 'septera_fontwidget' ),
	array(
	'id' => 'septera_fwcontent',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'septera_fontwidget' ),
	array(
	'id' => 'septera_fwcontentgoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('or enter Google Font Identifier','septera') ),
	'section' => 'septera_fontwidget' ),

	array( // content fonts
	'id' => 'septera_ftitlessize',
		'type' => 'select',
		'label' => __('Post/Page Titles','septera'),
		'values' => cryout_gen_values( 130, 300, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'septera_fontcontent' ),
	array(
	'id' => 'septera_ftitlesweight',
		'type' => 'select',
		'label' => '',
		'values' => array('300','400','700','800'),
		'labels' => array( __('300 (ligher)','septera'), __('400 (normal)','septera'), __('700 (bold)','septera'), __('800 (bolder)','septera') ),
		'desc' => '',
	'section' => 'septera_fontcontent' ),
	array(
	'id' => 'septera_ftitles',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'septera_fontcontent' ),
	array(
	'id' => 'septera_ftitlesgoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('or enter Google Font Identifier','septera') ),
	'section' => 'septera_fontcontent' ),

	array(
	'id' => 'septera_fheadingssize',
		'type' => 'select',
		'label' => __('Headings','septera'),
		'values' => cryout_gen_values( 100, 150, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'septera_fontcontent' ),
	array(
	'id' => 'septera_fheadingsweight',
		'type' => 'select',
		'label' => '',
		'values' => array('300','400','700','800'),
		'labels' => array( __('300 (ligher)','septera'), __('400 (normal)','septera'), __('700 (bold)','septera'), __('800 (bolder)','septera') ),
		'desc' => '',
	'section' => 'septera_fontcontent' ),
	array(
	'id' => 'septera_fheadings',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'septera_fontcontent' ),
	array(
	'id' => 'septera_fheadingsgoogle',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('or enter Google Font Identifier','septera') ),
	'section' => 'septera_fontcontent' ),

	array( // formatting
	'id' => 'septera_lineheight',
		'type' => 'select',
		'label' => __('Line Height','septera'),
		'values' => cryout_gen_values( 1.0, 2.4, 0.2, array('um'=>'em') ),
		'desc' => '',
	'section' => 'septera_textformatting' ),
	array(
	'id' => 'septera_textalign',
		'type' => 'select',
		'label' => __('Text Alignment','septera'),
		'values' => array( "Default" , "Left" , "Right" , "Justify" , "Center" ),
		'labels' => array( __("Default","septera"), __("Left","septera"), __("Right","septera"), __("Justify","septera"), __("Center","septera") ),
		'desc' => '',
	'section' => 'septera_textformatting' ),
	array(
	'id' => 'septera_paragraphspace',
		'type' => 'select',
		'label' => __('Paragraph Spacing','septera'),
		'values' => cryout_gen_values( 0.5, 1.6, 0.1, array('um'=>'em', 'pre'=>array('0.0em') ) ),
		'desc' => '',
	'section' => 'septera_textformatting' ),
	array(
	'id' => 'septera_parindent',
		'type' => 'select',
		'label' => __('Paragraph Indentation','septera'),
		'values' => cryout_gen_values( 0, 2, 0.5, array('um'=>'em') ),
		'desc' => '',
	'section' => 'septera_textformatting' ),

	//////////////////////////////////////////////////// Structure ////////////////////////////////////////////////////

	array(
	'id' => 'septera_breadcrumbs',
		'type' => 'select',
		'label' => __('Breadcrumbs','septera'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enable","septera"), __("Disable","septera") ),
		'desc' => '',
	'section' => 'septera_contentstructure' ),
	array(
	'id' => 'septera_pagination',
		'type' => 'select',
		'label' => __('Numbered Pagination','septera'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enable","septera"), __("Disable","septera") ),
		'desc' => '',
	'section' => 'septera_contentstructure' ),
	array(
	'id' => 'septera_contenttitles',
		'type' => 'select',
		'label' => __('Page/Category Titles','septera'),
		'values' => array( 1, 2, 3, 0 ),
		'labels' => array( __('Always Visible','septera'), __('Hide on Pages','septera'), __('Hide on Categories','septera'), __('Always Hidden','septera') ),
		'desc' => '',
	'section' => 'septera_contentstructure' ),
	array(
	'id' => 'septera_totop',
		'type' => 'select',
		'label' => __('Back to Top Button','septera'),
		'values' => array( 'septera-totop-normal', 'septera-totop-fixed', 'septera-totop-disabled' ),
		'labels' => array( __("Bottom of page","septera"), __("In footer","septera"), __("Disabled","septera") ),
		'desc' => '',
	'section' => 'septera_contentstructure' ),
	array(
	'id' => 'septera_tables',
		'type' => 'select',
		'label' => __('Tables Style','septera'),
		'values' => array( 'septera-no-table', 'septera-clean-table', 'septera-stripped-table', 'septera-bordered-table' ),
		'labels' => array( __("No border","septera"), __("Clean","septera"), __("Stripped","septera"), __("Bordered","septera") ),
		'desc' => '',
	'section' => 'septera_contentstructure' ),
	array(
	'id' => 'septera_normalizetags',
		'type' => 'select',
		'label' => __('Tags Cloud Appearance','septera'),
		'values' => array( 0, 1 ),
		'labels' => array( __("Size Emphasis","septera"), __("Uniform Boxes","septera") ),
		'desc' => '',
	'section' => 'septera_contentstructure' ),
array(
		'id' => 'septera_copyright',
		'type' => 'textarea',
		'label' => __( 'Custom Footer Text', 'septera' ),
		'desc' => __("Insert custom text or basic HTML code that will appear in your footer. <br /> You can use HTML to insert links, images and special characters.","septera"),
		'section' => 'septera_contentstructure' ),

	//////////////////////////////////////////////////// Graphics ////////////////////////////////////////////////////

	array(
	'id' => 'septera_elementborder',
		'type' => 'checkbox',
		'label' => __('Border','septera'),
		'desc' => '',
	'section' => 'septera_contentgraphics' ),
	array(
	'id' => 'septera_elementshadow',
		'type' => 'checkbox',
		'label' => __('Shadow','septera'),
		'desc' => '',
	'section' => 'septera_contentgraphics' ),
	array(
	'id' => 'septera_elementborderradius',
		'type' => 'checkbox',
		'label' => __('Rounded Corners','septera'),
		'desc' => __('These decorations apply to certain theme elements.','septera'),
	'section' => 'septera_contentgraphics' ),
	array(
	'id' => 'septera_articleanimation',
		'type' => 'select',
		'label' => __('Article Animation on Scroll','septera'),
		'values' => array( 0, 1, 2, 3),
		'labels' => array( __("None","septera"), __("Fade","septera"), __("Slide","septera"), __("Grow","septera") ),
		'desc' => '',
	'section' => 'septera_contentgraphics' ),

	//////////////////////////////////////////////////// Search Box ////////////////////////////////////////////////////

	array(
	'id' => 'septera_searchboxmain',
		'type' => 'checkbox',
		'label' => __('Add Search to Main Menu','septera'),
		'desc' => '',
	'section' => 'septera_searchbox' ),
	array(
	'id' => 'septera_searchboxfooter',
		'type' => 'checkbox',
		'label' => __('Add Search to Footer Menu','septera'),
		'desc' => '',
	'section' => 'septera_searchbox' ),

	//////////////////////////////////////////////////// Content Image ////////////////////////////////////////////////////

	array(
	'id' => 'septera_image_style',
		'type' => 'radioimage',
		'label' => __('Post Images','septera'),
		'choices' => array(
			'septera-image-none' => array(
				'label' => __("No Styling","septera"),
				'url'   => '%s/admin/images/image-style-0.png'
			),
			'septera-image-one' => array(
				'label' => sprintf( __("Style %d","septera"), 1),
				'url'   => '%s/admin/images/image-style-1.png'
			),
			'septera-image-two' => array(
				'label' => sprintf( __("Style %d","septera"), 2),
				'url'   => '%s/admin/images/image-style-2.png'
			),
			'septera-image-three' => array(
				'label' => sprintf( __("Style %d","septera"), 3),
				'url'   => '%s/admin/images/image-style-3.png'
			),
			'septera-image-four' => array(
				'label' => sprintf( __("Style %d","septera"), 4),
				'url'   => '%s/admin/images/image-style-4.png'
			),
			'septera-image-five' => array(
				'label' => sprintf( __("Style %d","septera"), 5),
				'url'   => '%s/admin/images/image-style-5.png'
			),
		),
		'desc' => '',
	'section' => 'septera_postimage' ),
	array(
	'id' => 'septera_caption_style',
		'type' => 'select',
		'label' => __('Post Captions','septera'),
		'values' => array( 'septera-caption-zero', 'septera-caption-one', 'septera-caption-two' ),
		'labels' => array( __('Plain','septera'), __('With Border','septera'), __('With Background','septera') ),
		'desc' => '',
	'section' => 'septera_postimage' ),


	//////////////////////////////////////////////////// Post Information ////////////////////////////////////////////////////

	array( // meta
	'id' => 'septera_meta_author',
		'type' => 'checkbox',
		'label' => __("Display Author","septera"),
		'desc' => '',
	'section' => 'septera_metas' ),
	array(
	'id' => 'septera_meta_date',
		'type' => 'checkbox',
		'label' => __("Display Date","septera"),
		'desc' => '',
	'section' => 'septera_metas' ),
	array(
	'id' => 'septera_meta_time',
		'type' => 'checkbox',
		'label' => __("Display Time","septera"),
		'desc' => '',
	'section' => 'septera_metas' ),
	array(
	'id' => 'septera_meta_category',
		'type' => 'checkbox',
		'label' => __("Display Category","septera"),
		'desc' => '',
	'section' => 'septera_metas' ),
	array(
	'id' => 'septera_meta_tag',
		'type' => 'checkbox',
		'label' => __("Display Tags","septera"),
		'desc' => '',
	'section' => 'septera_metas' ),
	array(
	'id' => 'septera_meta_comment',
		'type' => 'checkbox',
		'label' => __("Display Comments","septera"),
		'desc' => __("Choose meta information to show on posts.","septera"),
	'section' => 'septera_metas' ),

	array( // comments
	'id' => 'septera_comclosed',
		'type' => 'select',
		'label' => __("'Comments Are Closed' Text",'septera'),
		'values' => array( 1, 2, 3, 0 ), // "Show" , "Hide in posts", "Hide in pages", "Hide everywhere"
		'labels' => array( __("Show","septera"), __("Hide in posts","septera"), __("Hide in pages","septera"), __("Hide everywhere","septera") ),
		'desc' => '',
	'section' => 'septera_comments' ),
	array(
	'id' => 'septera_comdate',
		'type' => 'select',
		'label' => __('Comment Date Format','septera'),
		'values' => array( 1, 2 ),
		'labels' => array( __("Specific","septera"), __("Relative","septera") ),
		'desc' => '',
	'section' => 'septera_comments' ),
	array(
	'id' => 'septera_comlabels',
		'type' => 'select',
		'label' => __('Comment Field Label','septera'),
		'values' => array( 1, 2 ),
		'labels' => array( __("Placeholders","septera"), __("Labels","septera") ),
		'desc' => __("Change to labels for better compatibility with comment-related plugins.","septera"),
	'section' => 'septera_comments' ),
	array(
	'id' => 'septera_comformwidth',
		'type' => 'number',
		'label' => __('Comment Form Width (pixels)','septera'),
		'desc' => '',
	'section' => 'septera_comments' ),

	array( // excerpts
	'id' => 'septera_excerpthome',
		'type' => 'select',
		'label' => __( 'Standard Posts On Homepage', 'septera' ),
		'values' => array( 'excerpt', 'full' ),
		'labels' => array( __("Excerpt","septera"), __("Full Post","septera") ),
		'desc' => __("Post formats always display full posts.","septera"),
	'section' => 'septera_excerpts' ),
	array(
	'id' => 'septera_excerptsticky',
		'type' => 'select',
		'label' => __( 'Sticky Posts on Homepage', 'septera' ),
		'values' => array( 'excerpt', 'full' ),
		'labels' => array( __("Inherit","septera"), __("Full Post","septera") ),
		'desc' => '',
	'section' => 'septera_excerpts' ),
	array(
	'id' => 'septera_excerptarchive',
		'type' => 'select',
		'label' => __( 'Standard Posts in Categories/Archives', 'septera' ),
		'values' => array( 'excerpt', 'full' ),
		'labels' => array( __("Excerpt","septera"), __("Full Post","septera") ),
		'desc' => '',
	'section' => 'septera_excerpts' ),
	array(
	'id' => 'septera_excerptlength',
		'type' => 'number',
		'label' => __( 'Excerpt Length (words)' , 'septera' ),
		'desc' => '',
	'section' => 'septera_excerpts' ),
	array(
	'id' => 'septera_excerptdots',
		'type' => 'text',
		'label' => __( 'Excerpt Suffix', 'septera' ),
		'desc' => '',
	'section' => 'septera_excerpts' ),
	array(
	'id' => 'septera_excerptcont',
		'type' => 'text',
		'label' => __( 'Continue Reading Label', 'septera' ),
		'desc' => '',
	'section' => 'septera_excerpts' ),

	//////////////////////////////////////////////////// Featured Images ////////////////////////////////////////////////////
	array(
	'id' => 'septera_fpost',
		'type' => 'select',
		'label' => __( 'Featured Images', 'septera' ),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enabled","septera"), __("Disabled","septera") ),
		'desc' => '',
	'section' => 'septera_featured' ),
	array(
	'id' => 'septera_fauto',
		'type' => 'select',
		'label' => __( 'Auto Select Image From Content', 'septera' ),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enabled","septera"), __("Disabled","septera") ),
		'desc' => '',
	'section' => 'septera_featured' ),
	array(
	'id' => 'septera_fheight',
		'type' => 'number',
		'label' => __( 'Featured Image Height (in pixels)', 'septera' ),
		'desc' => "",
	'section' => 'septera_featured' ),
	array(
	'id' => 'septera_fheight_notice',
		'type' => 'notice',
		'label' => '',
		'input_attrs' => array( 'class' => 'warning' ),
		'desc' => __("Changing this value may require to regenerate your thumbnails.","septera"),
		//'active_callback' => 'septera_conditionals',
	'section' => 'septera_featured' ),
	array(
	'id' => 'septera_fresponsive',
		'type' => 'select',
		'values' => array( 0 , 1 ),
		'labels' => array( __("Cropped","septera"), __("Responsive","septera") ),
		'label' => __('Featured Image Behaviour','septera'),
		'desc' => __("<strong>Responsive</strong> will scale depending on the viewed resolution<br><strong>Cropped</strong> will always have the configured height.","septera"),
	'section' => 'septera_featured' ),
	array(
	'id' => 'septera_falign',
		'type' => 'select',
		'label' => __( 'Featured Image Crop Position', 'septera' ),
		'values' => array( "left top" , "left center", "left bottom", "right top", "right center", "right bottom", "center top", "center center", "center bottom" ),
		'labels' => array( __("Left Top","septera"), __("Left Center","septera"), __("Left Bottom","septera"), __("Right Top","septera"), __("Right Center","septera"), __("Right Bottom","septera"), __("Center Top","septera"), __("Center Center","septera"), __("Center Bottom","septera") ),
		'desc' => "",
	'section' => 'septera_featured' ),

	array(
	'id' => 'septera_falign_notice',
		'type' => 'notice',
		'label' => '',
		'input_attrs' => array( 'class' => 'warning' ),
		'desc' => __("Changing this value may require to regenerate your thumbnails.","septera"),
		//'active_callback' => 'septera_conditionals',
	'section' => 'septera_featured' ),

	array(
	'id' => 'septera_fheader',
		'type' => 'select',
		'label' => __('Use Featured Images in Header','septera'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enable","septera"), __("Disable","septera") ),
		'desc' => '',
	'section' => 'septera_featured' ),

	//////////////////////////////////////////////////// Social Positions ////////////////////////////////////////////////////

	array(
	'id' => 'septera_socials_header',
		'type' => 'checkbox',
		'label' => __( 'Display in Header', 'septera' ),
		'desc' => '',
	'section' => 'septera_socials' ),
	array(
	'id' => 'septera_socials_footer',
		'type' => 'checkbox',
		'label' => __( 'Display in Footer', 'septera' ),
		'desc' => '',
	'section' => 'septera_socials' ),
	array(
	'id' => 'septera_socials_left_sidebar',
		'type' => 'checkbox',
		'label' => __( 'Display in Left Sidebar', 'septera' ),
		'desc' => '',
	'section' => 'septera_socials' ),
	array(
	'id' => 'septera_socials_right_sidebar',
		'type' => 'checkbox',
		'label' => __( 'Display in Right Sidebar', 'septera' ),
		'desc' => sprintf( __( 'Select where social icons should be visible in.<br><br><strong>Social Icons are defined using the <a href="%1$s" target="_blank">social icons menu</a></strong>. Read the <a href="%2$s" target="_blank">theme documentation</a> on how to create a social menu.', 'septera' ), 'nav-menus.php?action=locations', 'http://www.cryoutcreations.eu/wordpress-tutorials/use-new-social-menu' ),
	'section' => 'septera_socials' ),

	//////////////////////////////////////////////////// Miscellaneous ////////////////////////////////////////////////////

	array(
	'id' => 'septera_masonry',
		'type' => 'select',
		'label' => __('Masonry','septera'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enable","septera"), __("Disable","septera") ),
		'desc' => '',
	'section' => 'septera_misc' ),
	array(
	'id' => 'septera_defer',
		'type' => 'select',
		'label' => __('JS Defer loading','septera'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enable","septera"), __("Disable","septera") ),
		'desc' => '',
	'section' => 'septera_misc' ),
	array(
	'id' => 'septera_fitvids',
		'type' => 'select',
		'label' => __('FitVids','septera'),
		'values' => array( 1, 2, 0 ),
		'labels' => array( __("Enable","septera"), __("Enable on mobiles","septera"), __("Disable","septera") ),
		'desc' => '',
	'section' => 'septera_misc' ),
	array(
	'id' => 'septera_autoscroll',
		'type' => 'select',
		'label' => __('Autoscroll','septera'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enable","septera"), __("Disable","septera") ),
		'desc' => '',
	'section' => 'septera_misc' ),
	array(
	'id' => 'septera_editorstyles',
		'type' => 'select',
		'label' => __('Editor Styles','septera'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enable","septera"), __("Disable","septera") ),
		'desc' => __("<br>Only use these options to troubleshoot issues.","septera"),
	'section' => 'septera_misc' ),
	//////////////////////////////////////////////////// !!! DEVELOPER !!! ////////////////////////////////////////////////////
	// nothing for now

), // options

/* option=array(
	type: checkbox, select, textarea, input, function
	id: field_name or custom_function_name
	values: value_0, value_1, value_2 | true/false | number
	labels: __('Label 0','context'), ... | __('Enabled','context')/... |  number/__('Once','context')/...
	desc: html to be displayed at the question mark
	section: section_id

	array(
	'id' => '',
		'type' => '',
		'label' => '',
		'values' => array(  ),
		'labels' => array(  ),
		'desc' => '',
		'input_attrs' => array(  ),
		// conditionals
		'disable_if' => 'function_name',
		'require_fn' => 'function_name',
		'display_width' => '?????',
	'section' => '' ),

*/

/*** fonts ***/
'fonts' => array(

	'Preferred Theme Fonts'=> array(
					"Source Sans Pro/gfont",
					"Ubuntu/gfont",
					"Ubuntu Condensed/gfont",
					"Open Sans/gfont",
					"Open Sans Condensed:300/gfont",
					"Droid Sans/gfont",
					"Oswald/gfont",
					"Yanone Kaffeesatz/gfont",
					),
	'Sans-Serif' => array(
					"Segoe UI, Arial, sans-serif",
					"Verdana, Geneva, sans-serif" ,
					"Geneva, sans-serif",
					"Helvetica Neue, Arial, Helvetica, sans-serif",
					"Helvetica, sans-serif" ,
					"Century Gothic, AppleGothic, sans-serif",
				    "Futura, Century Gothic, AppleGothic, sans-serif",
					"Calibri, Arian, sans-serif",
				    "Myriad Pro, Myriad,Arial, sans-serif",
					"Trebuchet MS, Arial, Helvetica, sans-serif" ,
					"Gill Sans, Calibri, Trebuchet MS, sans-serif",
					"Impact, Haettenschweiler, Arial Narrow Bold, sans-serif",
					"Tahoma, Geneva, sans-serif" ,
					"Arial, Helvetica, sans-serif" ,
					"Arial Black, Gadget, sans-serif",
					"Lucida Sans Unicode, Lucida Grande, sans-serif"
					),
	'Serif' => array(
					"Georgia, Times New Roman, Times, serif",
					"Times New Roman, Times, serif",
					"Cambria, Georgia, Times, Times New Roman, serif",
					"Palatino Linotype, Book Antiqua, Palatino, serif",
					"Book Antiqua, Palatino, serif",
					"Palatino, serif",
				    "Baskerville, Times New Roman, Times, serif",
 					"Bodoni MT, serif",
					"Copperplate Light, Copperplate Gothic Light, serif",
					"Garamond, Times New Roman, Times, serif"
					),
	'MonoSpace' => array(
					"Courier New, Courier, monospace" ,
					"Lucida Console, Monaco, monospace",
					"Consolas, Lucida Console, Monaco, monospace",
					"Monaco, monospace"
					),
	'Cursive' => array(
					"Lucida Casual, Comic Sans MS, cursive",
				    "Brush Script MT, Phyllis, Lucida Handwriting, cursive",
					"Phyllis, Lucida Handwriting, cursive",
					"Lucida Handwriting, cursive",
					"Comic Sans MS, cursive"
					)
	), // fonts

/*** google font option fields ***/
'google-font-enabled-fields' => array(
	'septera_fgeneral',
	'septera_fsitetitle',
	'septera_fmenu',
	'septera_fwtitle',
	'septera_fwcontent',
	'septera_ftitles',
	'septera_fheadings',
	),

/*** landing page blocks icons ***/
'block-icons' => array(
	'no-icon' => '&nbsp;',
	'toggle' => 'e003',
	'layout' => 'e004',
	'lock' => 'e007',
	'unlock' => 'e008',
	'target' => 'e012',
	'disc' => 'e019',
	'microphone' => 'e048',
	'play' => 'e052',
	'cloud2' => 'e065',
	'cloud-upload' => 'e066',
	'cloud-download' => 'e067',
	'plus2' => 'e114',
	'minus2' => 'e115',
	'check2' => 'e116',
	'cross2' => 'e117',
	'users2' => 'e00a',
	'user' => 'e00b',
	'trophy' => 'e00c',
	'speedometer' => 'e00d',
	'screen-tablet' => 'e00f',
	'screen-smartphone' => 'e01a',
	'screen-desktop' => 'e01b',
	'plane' => 'e01c',
	'notebook' => 'e01d',
	'magic-wand' => 'e01e',
	'hourglass2' => 'e01f',
	'graduation' => 'e02a',
	'fire' => 'e02b',
	'eyeglass' => 'e02c',
	'energy' => 'e02d',
	'chemistry' => 'e02e',
	'bell' => 'e02f',
	'badge' => 'e03a',
	'speech' => 'e03b',
	'puzzle' => 'e03c',
	'printer' => 'e03d',
	'present' => 'e03e',
	'pin' => 'e03f',
	'picture2' => 'e04a',
	'map' => 'e04b',
	'layers' => 'e04c',
	'globe' => 'e04d',
	'globe2' => 'e04e',
	'folder' => 'e04f',
	'feed' => 'e05a',
	'drop' => 'e05b',
	'drawar' => 'e05c',
	'docs' => 'e05d',
	'directions' => 'e05e',
	'direction' => 'e05f',
	'cup2' => 'e06b',
	'compass' => 'e06c',
	'calculator' => 'e06d',
	'bubbles' => 'e06e',
	'briefcase' => 'e06f',
	'book-open' => 'e07a',
	'basket' => 'e07b',
	'bag' => 'e07c',
	'wrench' => 'e07f',
	'umbrella' => 'e08a',
	'tag' => 'e08c',
	'support' => 'e08d',
	'share' => 'e08e',
	'share2' => 'e08f',
	'rocket' => 'e09a',
	'question' => 'e09b',
	'pie-chart2' => 'e09c',
	'pencil2' => 'e09d',
	'note' => 'e09e',
	'music-tone-alt' => 'e09f',
	'list2' => 'e0a0',
	'like' => 'e0a1',
	'home2' => 'e0a2',
	'grid' => 'e0a3',
	'graph' => 'e0a4',
	'equalizer' => 'e0a5',
	'dislike' => 'e0a6',
	'calender' => 'e0a7',
	'bulb' => 'e0a8',
	'chart' => 'e0a9',
	'clock' => 'e0af',
	'envolope' => 'e0b1',
	'flag' => 'e0b3',
	'folder2' => 'e0b4',
	'heart2' => 'e0b5',
	'info' => 'e0b6',
	'link' => 'e0b7',
	'refresh' => 'e0bc',
	'reload' => 'e0bd',
	'settings' => 'e0be',
	'arrow-down' => 'e604',
	'arrow-left' => 'e605',
	'arrow-right' => 'e606',
	'arrow-up' => 'e607',
	'paypal' => 'e608',
	'home' => 'e800',
	'apartment' => 'e801',
	'data' => 'e80e',
	'cog' => 'e810',
	'star' => 'e814',
	'star-half' => 'e815',
	'star-empty' => 'e816',
	'paperclip' => 'e819',
	'eye2' => 'e81b',
	'license' => 'e822',
	'picture' => 'e827',
	'book' => 'e828',
	'bookmark' => 'e829',
	'users' => 'e82b',
	'store' => 'e82d',
	'calendar' => 'e836',
	'keyboard' => 'e837',
	'spell-check' => 'e838',
	'screen' => 'e839',
	'smartphone' => 'e83a',
	'tablet' => 'e83b',
	'laptop' => 'e83c',
	'laptop-phone' => 'e83d',
	'construction' => 'e841',
	'pie-chart' => 'e842',
	'gift' => 'e844',
	'diamond' => 'e845',
	'cup3' => 'e848',
	'leaf' => 'e849',
	'earth' => 'e853',
	'bullhorn' => 'e859',
	'hourglass' => 'e85f',
	'undo' => 'e860',
	'redo' => 'e861',
	'sync' => 'e862',
	'history' => 'e863',
	'download' => 'e865',
	'upload' => 'e866',
	'bug' => 'e869',
	'code' => 'e86a',
	'link2' => 'e86b',
	'unlink' => 'e86c',
	'thumbs-up' => 'e86d',
	'thumbs-down' => 'e86e',
	'magnifier' => 'e86f',
	'cross3' => 'e870',
	'menu' => 'e871',
	'list' => 'e872',
	'warning' => 'e87c',
	'question-circle' => 'e87d',
	'check' => 'e87f',
	'cross' => 'e880',
	'plus' => 'e881',
	'minus' => 'e882',
	'layers2' => 'e88e',
	'text-format' => 'e890',
	'text-size' => 'e892',
	'hand' => 'e8a5',
	'pointer-up' => 'e8a6',
	'pointer-right' => 'e8a7',
	'pointer-down' => 'e8a8',
	'pointer-left' => 'e8a9',
	'heart' => 'e930',
	'cloud' => 'e931',
	'trash' => 'e933',
	'user2' => 'e934',
	'key' => 'e935',
	'search' => 'e936',
	'settings2' => 'e937',
	'camera' => 'e938',
	'tag2' => 'e939',
	'bulb2' => 'e93a',
	'pencil' => 'e93b',
	'diamond2' => 'e93c',
	'location' => 'e93e',
	'eye' => 'e93f',
	'bubble' => 'e940',
	'stack' => 'e941',
	'cup' => 'e942',
	'phone' => 'e943',
	'news' => 'e944',
	'mail' => 'e945',
	'news2' => 'e948',
	'paperplane' => 'e949',
	'params2' => 'e94a',
	'data2' => 'e94b',
	'megaphone' => 'e94c',
	'study' => 'e94d',
	'chemistry2' => 'e94e',
	'fire2' => 'e94f',
	'paperclip2' => 'e950',
	'calendar2' => 'e951',
	'wallet' => 'e952',
	),

/*** ajax load more identifiers ***/
'theme_identifiers' => array(
	'load_more_optid' 			=> 'septera_lpposts_more',
	'content_css_selector' 		=> '#lp-posts .lp-posts-inside',
	'pagination_css_selector' 	=> '#lp-posts nav.navigation',
),

/************* widget areas *************/

'widget-areas' => array(
	'sidebar-2' => array(
		'name' => __( 'Sidebar Left', 'septera' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),
	'sidebar-1' => array(
		'name' => __( 'Sidebar Right', 'septera' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),
	'footer-widget-area' => array(
		'name' => __( 'Footer', 'septera' ),
		'description' 	=> __('You can select how many widgets to show per row from Graphics &raquo; Layout.', 'septera'),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s"><div class="footer-widget-inside">',
		'after_widget' => '</div></section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),
	'content-widget-area-before' => array(
		'name' => __( 'Content Before', 'septera' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),
	'content-widget-area-after' => array(
		'name' => __( 'Content After', 'septera' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),
	'widget-area-header' => array(
		'name' => __( 'Header', 'septera' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),
), // widget-areas


); // $septera_big

// FIN
