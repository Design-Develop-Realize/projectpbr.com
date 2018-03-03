<?php
Kirki::add_config( 'unicons', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );


Kirki::add_field( 'unicons', array(
    'type'        => 'toggle',
    'settings'    => 'unicons_body_launiconst',
    'label'       => esc_attr__( 'Make website box layout', 'unicons' ),
    'section'     => 'launiconst_front_page',
    'default'     => '0',
    'priority'    => 10,
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'dimension',
	'settings'    => 'unicons_body_dimension',
	'label'       => __( 'Dimension Control', 'unicons' ),
	'section'     => 'launiconst_front_page',
	'default'     => '75rem',
	'priority'    => 10,
	'output' => array(
        array(
            'element'  => 'body',
            'property' => 'width',
            'units'    => '',
        ),),
				'active_callback'    => array(
				array(
					'setting'  => 'unicons_body_launiconst',
					'operator' => '==',
					'value'    => true,
				),
			),
) );





/* header & title */
Kirki::add_field( 'unicons', array(
	'type'        => 'toggle',
	'settings'    => 'disable_sticky_menu',
	'label'       => __( 'Disable sticky menu', 'unicons' ),
	'section'     => 'unicons_headtitle_settings',
	'default'     => '1',
	'priority'    => 10,
) );


Kirki::add_field( 'unicons', array(
	'type'        => 'color',
	'settings'    => 'uniconsh2_transbgtop_color',
	'label'       => __( 'Transparent Header background color', 'unicons' ),
	'section'     => 'unicons_headtitle_settings',
	'default'     => 'rgba(33,33,33,0)',
	'priority'    => 10,
	'transport' => 'auto',
	'alpha'       => true,

	'output' => array(
        array(
            'element'  => '.navbar-fixed-top',

            'property' => 'background-color',
            'units'    => '',
        ),),

) );



Kirki::add_field( 'unicons', array(
	'type'        => 'color',
	'settings'    => 'unicons_head2_menubg',
	'label'       => __( 'menu  or sticky menu background color', 'unicons' ),
	'section'     => 'unicons_headtitle_settings',
	'default'     => 'rgba(33,33,33,0.8)',
	'priority'    => 10,
	'transport' => 'auto',
	'alpha'       => true,
	'output' => array(
        array(
            'element'  => '.head-bottom-area,#navmenu ul li ul li,.top-nav-collapse,.single .branding ,.archive .branding,.blog .branding,.category #head2-fixed .top-nav-collapse,.error404  .branding,.blog .branding',

            'property' => 'background',
            'units'    => '',
        ),
				array(
						'element'  => '.category .head2-fixed .top-nav-collapse,.author .head2-fixed .top-nav-collapse',

						'property' => 'background-color',
						'units'    => '!important',
				),

			),

) );

Kirki::add_field( 'unicons', array(
	'type'        => 'color',
	'settings'    => 'unicons_head2_stmenutext',
	'label'       => __( 'sticky menu background text color', 'unicons' ),
	'section'     => 'unicons_headtitle_settings',
	'default'     => '#ffffff',
	'priority'    => 10,
	'transport' => 'auto',
	'alpha'       => true,
	'output' => array(
        array(
            'element'  => ' .top-nav-collapse #navmenu li a,.top-nav-collapse #navmenu ul li ul li a,.home .top-nav-collapse #navmenu ul li.current-menu-item > a',

            'property' => 'color',
            'units'    => '',
        ),),

) );




/*  menu typography */
Kirki::add_field( 'unicons', array(
	'type'        => 'typography',
	'settings'    => 'menus_typography',
	'label'       => esc_attr__( 'Site menu Typography', 'unicons' ),
	'section'     => 'unicons_headtitle_settings',
	'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'Bold 700',
		'font-size'      => '14px',
		'line-height'    => '1',
		'letter-spacing' => '0.5px',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#fff',
		'text-transform' => 'uppercase ',
		'text-align'     => 'left'

	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '#navmenu li a,#navmenu ul li ul li a,.home #navmenu ul li.current-menu-item > a',
		),
	),
) );


/*  title typography */

Kirki::add_field( 'unicons', array(
	'type'        => 'typography',
	'settings'    => 'title_typography',
	'label'       => esc_attr__( 'Site title Typography', 'unicons' ),
	'section'     => 'unicons_headtitle_settings',
	'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '48px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#fff',
		'text-transform' => 'none',

	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '#site-title .site-title,#site-title a',
		),
	),
) );


Kirki::add_field( 'unicons', array(
	'type'        => 'typography',
	'settings'    => 'sitedescription_typography',
	'label'       => esc_attr__( 'Site description Typography', 'unicons' ),
	'section'     => 'unicons_headtitle_settings',
	'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '12px',
		'line-height'    => '0',
		'letter-spacing' => '2px',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#fff',
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '#site-title .site-description',
		),
	),

) );
/*Subtitle setting */

Kirki::add_field( 'unicons', array(
	'type'        => 'color',
	'settings'    => 'unicons_subheadtitle_bg',
	'label'       => __( 'Sub heading background color', 'unicons' ),
	'section'     => 'unicons_subheadtitle_settings',
	'default'     => '#CCC',
	'priority'    => 10,
	'transport' => 'auto',
	'alpha'       => true,
	'output' => array(
        array(
            'element'  => ' #sub_banner',

            'property' => 'background-color',
            'units'    => '',
        ),),

) );
Kirki::add_field( 'unicons', array(
'type'        => 'color',
'settings'    => 'subheadtitle_overlay_color',
'label'       => __( 'Section Overlay color ', 'unicons' ),
'section'     => 'unicons_subheadtitle_settings',
'default'     => 'rgba(33, 33, 33, 0.58)',
'priority'    => 10,
'transport' => 'auto',
'choices'     => array(
	'alpha' => true,
),
'output' => array(
			array(
					'element'  => '#sub_banner .overlay',

					'property' => 'background-color',
					'units'    => '',
			),
		),
) );
Kirki::add_field( 'unicons', array(
	'type'        => 'slider',
	'settings'    => 'unicons_subhead_paddingtop',
	'label'       => esc_attr__( 'Sub head padding top', 'unicons' ),
	'section'     => 'unicons_subheadtitle_settings',
	'default'     => 60,
	'choices'     => array(
		'min'  => '0',
		'max'  => '200',
		'step' => '1',
	),
	'transport' => 'auto',
	'output' => array(
				array(
						'element'  => '#sub_banner h1',

						'property' => 'padding-top',
						'units'    => 'px',
				),

			),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'slider',
	'settings'    => 'unicons_subhead_paddingbottom',
	'label'       => esc_attr__( 'Sub head padding bottom', 'unicons' ),
	'section'     => 'unicons_subheadtitle_settings',
	'default'     => 60,
	'choices'     => array(
		'min'  => '0',
		'max'  => '200',
		'step' => '1',
	),
	'transport' => 'auto',
	'output' => array(

				array(
						'element'  => '#sub_banner h1',

						'property' => 'padding-bottom',
						'units'    => 'px',
				),
			),
) );
Kirki::add_field( 'unicons', array(
	'type'        => 'typography',
	'settings'    => 'subheadtitle_typography',
	'label'       => esc_attr__( ' Text Typography', 'unicons' ),
	'section'     => 'unicons_subheadtitle_settings',
	'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '42px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#fff',
		'text-transform' => 'none',

	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '#sub_banner h1,.postsearch',
		),
	),

) );
/*color and reorder */
Kirki::add_field( 'unicons', array(
    'type'        => 'sortable',
    'settings'    => 'home_sort_id',
    'label'       => esc_attr__( 'Reorder font page section', 'unicons' ),
    'help' => esc_attr__( 'You can enable/disable the font page section that interest you below and reorder them to your liking.', 'unicons' ),
    'section'     => 'unicons_color_settings',
    'default'     => array(
      'service',
			'layout',
			'team',
			'client',
			'contact',

    ),
    'choices'     => array(
		'service' => esc_attr__( 'Service-block', 'unicons' ),
		'layout'=> esc_attr__( 'Latest post', 'unicons' ),
		'team'=> esc_attr__( 'Team section', 'unicons' ),
		'client'=> esc_attr__( 'Client section', 'unicons' ),
		'contact'=> esc_attr__( 'Contact section', 'unicons' ),

            ),
    'priority'    => 10,
) );

Kirki::add_field( 'unicons', array(
    'type'        => 'color',
    'settings'    => 'unicons_flavour_color',
    'label'       => esc_attr__( 'Flavour color', 'unicons' ),
    'section'     => 'unicons_color_settings',
    'default'     => '#73baae',
    'priority'    => 10,
		'output' => array(
        array(
            'element'  => '.typed-cursor,#footer .widgets .widgettitle,a,#commentform a,#sidebar .widget_archive ul li a:before, #sidebar .widget_categories ul li a:before, #sidebar .widget_pages ul li a:before, #sidebar .widget_nav_menu ul li a:before, #sidebar .widget_portfolio_category ul li a:before',

            'property' => 'color',
            'units'    => '',
        ),
        array(
            'element'  => '.button-wrapper .bttn,.portfolio-box::before,.blog-btn,#submit,.colored-line,#navmenu .search-form .search-submit,.search-form .search-submit,#navmenu .search-form .search-submit,.search-form .search-submit,.search-box-wrapper,#loading-center-absolute .object,#slider .hero_btn_full',
            'property' => 'background-color',
            'units'    => '',
        ),
		 array(
            'element'  => '.h-line,.nivo-caption .h-line,.btn-slider-unicons,#slider .hero_btn_full,.unicons_nav .current,.feature .feature__icon .iconcontent',
            'property' => 'border-color',
            'units'    => '',
        ),

		 array(
            'element'  => '.pagination .current,.overlay-search,.unicons-search .search-form,.unicons-search .search-form .search-submit,.blog-content-section .left-column .wrap-blog-post .post-body-title:after,#counter .team_bt1,#unicons-slider .owl-dots .owl-dot.active',
            'property' => 'background',
            'units'    => '',
        ),
    )
) );

Kirki::add_field( 'unicons', array(
    'type'        => 'color',
    'settings'    => 'unicons_hover_color',
    'label'       => esc_attr__( 'Hover color', 'unicons' ),
    'section'     => 'unicons_color_settings',
    'default'     => '#fd3635',
    'priority'    => 10,

	'output' => array(
        array(
            'element'  => '#navmenu li a:hover,.post_info a:hover,.comment-author vcard:hover,.slider-bnt:hover,a:hover,#navmenu ul li.current-menu-item > a',

            'property' => 'color',
            'units'    => '',
        ),
        array(
            'element'  => '#navmenu ul li ul a:hover,#navmenu ul li ul li:hover,#navmenu ul > li ul li:hover,btn-slider-unicons:hover,btn-border-light:hover,#submit:hover, #searchsubmit:hover,#navmenu ul > li::after,.branding-single--clone #navmenu ul li ul:hover,#slider .hero_btn:hover,.btn-lines .line-top,
.btn-lines .line-bottom,.btn-lines .line-left,.btn-lines .line-right,.actionbox-controls-two .hero_btn:hover,#slider  .hero_btn_full:hover,.read_more:hover,.search-form .search-submit:hover,#ribbon  .hvr-shutter-out-vertical:before,.button-wrapper .hvr-shutter-out-vertical:before',
            'property' => 'background-color',
            'units'    => '',
        ),

		  array(
            'element'  => '#slider .hero_btn:hover,#slider  .hero_btn_full:hover,.read_more:hover,#navmenu ul li ul li:hover',
            'property' => 'border-color',
            'units'    => '',
        ),

	  )
) );


/* Slider settings */

Kirki::add_field( 'unicons', array(
    'type'        => 'switch',
    'settings'    => 'unicons_slider_enabel',
    'label'       => esc_attr__( 'Enable/disabel Static image', 'unicons' ),
    'section'     => 'slider_setup',
    'default'     => '1',
    'priority'    => 1,
    'choices'     => array(
        'off' => esc_attr__( 'off', 'unicons' ),
				'on'  =>esc_attr__ ( 'on', 'unicons' ),
    ),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'select',
	'settings'    => 'slider_select',
	'label'       => __( 'Select slider', 'unicons' ),
	'section'     => 'slider_setup',
	'default'     => 'textanimation',
	'priority'    => 1,
	'multiple'    => 1,
	'choices'     => array(
		'slider' => esc_attr__( 'Slider', 'unicons' ),
		'textanimation'=>esc_attr__( 'Text Animation ', 'unicons' ),
	),
) );
Kirki::add_field( 'unicons', array(
	'type'        => 'select',
	'settings'    => 'slider_bgposition_select',
	'label'       => __( 'Slider/Static image position', 'unicons' ),
	'section'     => 'slider_setup',
	'default'     => 'center center',
	'transport' => 'auto',
	'priority'    => 1,
	'multiple'    => 1,
	'choices'     => array(
		'center center' => esc_attr__( 'center center', 'unicons' ),
		'left bottom' => esc_attr__( 'left bottom', 'unicons' ),
		'right top' => esc_attr__( 'right top', 'unicons' ),
		'center top' => esc_attr__( 'center top', 'unicons' ),
		'center bottom' => esc_attr__( 'center bottom', 'unicons' ),
	),
	'output' => array(
			array(
					'element'  => '.slider-img,.masthead',

					'property' => 'background-position',
					'units'    => '!important',
			),
	),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'select',
	'settings'    => 'slider_bgsize_select',
	'label'       => __( 'Slider/Static image Size', 'unicons' ),
	'section'     => 'slider_setup',
	'default'     => 'Cover',
	'transport' => 'auto',
	'priority'    => 1,
	'multiple'    => 1,
	'choices'     => array(
		'cover' => esc_attr__( 'Cover', 'unicons' ),
		'auto' => esc_attr__( 'Auto', 'unicons' ),
		'contain' => esc_attr__( 'Contain', 'unicons' ),
		'initial' => esc_attr__( 'initial', 'unicons' ),

	),
	'output' => array(
			array(
					'element'  => '.slider-img,.masthead',

					'property' => 'background-size',
					'units'    => '!important',
			),
	),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'repeater',
	'label'       => esc_attr__( 'Add slider(minimum 2 slider)', 'unicons' ),
	'description' => esc_attr__( 'Add at least two slider', 'unicons' ),
	'section'     => 'slider_setup',
	'choices' => array(
    'limit' => 3
),
	'priority'    => 10,
	'row_label' => array(
		'type'  => 'field',
		'value' => esc_attr__('Slider', 'unicons' ),
		'field' => 'link_text',
	),
	'settings'    => 'slider_rep_image',

	'fields' => array(
		'dropdown_pages' => array(
			'type'        => 'dropdown-pages',
			'label'       => esc_attr__( 'Select page for slider content', 'unicons' ),
			'description' => esc_attr__( 'Select page for slider content', 'unicons' ),
			'default'     => '',
		),
		'slider_image' => array(
			'type'        => 'image',
			'label'       => esc_attr__( 'uplod image', 'unicons' ),
		),
		'button_text1st' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'button 1st ', 'unicons' ),
			'default'     => esc_attr__( 'Know More', 'unicons' ),
		),

		'button_text2nd' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'button 2nd', 'unicons' ),
			'default'     => esc_attr__( 'Try Now !', 'unicons' ),
		),

		'link_url1' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'Link URL 1', 'unicons' ),
			'default'     => '',
		),

		'link_url2' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'Link URL 2', 'unicons' ),
			'default'     => '',
		),
	),
	'active_callback'    => array(
	array(
			'setting'  => 'slider_select',
			'operator' => '==',
			'value'    => 'slider',
		),
),
) );
/* static image settings */

Kirki::add_field( 'unicons', array(
        'type'     => 'image',
        'settings'  => 'unicons_staticslider_image',
        'label'    => esc_attr__( 'Upload static image  ', 'unicons' ),
        'section'  => 'slider_setup',
				'default'     => get_template_directory_uri() . '/images/slider.jpg',
        'priority' => 1,

		'active_callback'    => array(
	array(
			'setting'  => 'slider_select',
			'operator' => '==',
			'value'    => 'textanimation',
			),
),
	));
	Kirki::add_field( 'unicons', array(
		'type'     => 'text',
		'settings' => 'slider_textanimation_title',
		'label'    => __( 'Hero Title', 'unicons' ),
		'section'  => 'slider_setup',
		'default'  => esc_attr__( 'This is a Hero Title', 'unicons' ),
		'priority' => 10,

				'active_callback'    => array(
			array(
					'setting'  => 'slider_select',
					'operator' => '==',
					'value'    => 'textanimation',
					),
			),
	) );

/* textanimation text */

Kirki::add_field( 'unicons', array(
	'type'        => 'repeater',
	'label'       => esc_attr__( 'Add text for textanimation', 'unicons' ),
	'section'     => 'slider_setup',
	'priority'    => 10,
	'choices' => array(
    'limit' => 2
),
	'row_label' => array(
		'type'  => 'field',
		'value' => esc_attr__('Text', 'unicons' ),
		'field' => 'link_text',
	),
	'settings'    => 'slider_rep_textanimation',
	'default'     => array(
			array(
				'text_animation' => esc_attr__( 'Welcome to Unicons', 'unicons' ),
			),
		),

	'fields' => array(
			'text_animation' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'Text', 'unicons' ),
			'default'     => '',
		),

	),
	'active_callback'    => array(
	array(
			'setting'  => 'slider_select',
			'operator' => '==',
			'value'    => 'textanimation',
		),
),
) );



Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'unicons_staticslider_uri1',
        'label'    => esc_attr__( 'static slider link 1', 'unicons' ),
        'section'  => 'slider_setup',
        'priority' => 10,
		'active_callback'    => array(
			array(
					'setting'  => 'slider_select',
					'operator' => '!=',
					'value'    => 'slider',
				),
),
    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'unicons_staticslider_uri2',
        'label'    => esc_attr__( 'static slider link 2', 'unicons' ),
        'section'  => 'slider_setup',
        'priority' => 10,
			'active_callback'    => array(
				array(
						'setting'  => 'slider_select',
						'operator' => '!=',
						'value'    => 'slider',
					),
),
    ));


/* image slider settings */

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'unicons_link_name1',
        'label'    => esc_attr__( ' button 1st', 'unicons' ),
        'section'  => 'slider_setup',
        'default'  => esc_attr__( 'Know More', 'unicons' ),
        'priority' => 10,
					'active_callback'    => array(
						array(
								'setting'  => 'slider_select',
								'operator' => '!=',
								'value'    => 'slider',
							),
				),

    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'unicons_link_name2',
        'label'    => esc_attr__( ' button 2nd', 'unicons' ),
        'section'  => 'slider_setup',
        'default'  => esc_attr__( 'Try Now !', 'unicons' ),
        'priority' => 10,
				'active_callback'    => array(
					array(
							'setting'  => 'slider_select',
							'operator' => '!=',
							'value'    => 'slider',
						),
				),
    ));

		Kirki::add_field( 'unicons', array(
		    'type'        => 'multicolor',
		    'settings'    => 'sliderbutton_color',
		    'label'       => esc_attr__( '1st Button Color ', 'unicons' ),
		    'section'     => 'slider_setup',
		    'priority'    => 10,
				'transport' => 'auto',
				'choices'     => array(
						'text'   => esc_attr__( 'Text color', 'unicons' ),
						'hover'  => esc_attr__( 'Hover', 'unicons' ),
						'background'  => esc_attr__( 'background', 'unicons' ),
				),
				'default'     => array(
						'text'   => '#fff',
						'hover'  => '#73baae',
						'background'=>'#686CB6',
				),
				'output'    => array(
			array(
				'choice'   => 'text',
				'element'  => '#unicons-slider .slider-bnt2,#staticslider .sl-button .slider-bnt2,#youtub-bg .slider-bnt2',
				'property' => 'color',
			),
			array(
				'choice'   => 'hover',
				'element'  => '#unicons-slider  .hvr-shutter-out-vertical:before,#staticslider .sl-button  .hvr-shutter-out-vertical:before,#youtub-bg .hvr-shutter-out-vertical:before',
				'property' => 'background',
			),
			array(
				'choice'   => 'background',
				'element'  => '#unicons-slider .slider-bnt2,#staticslider .slider-bnt2,#youtub-bg .slider-bnt2',
				'property' => 'background',
			),
				),
			) );
			Kirki::add_field( 'unicons', array(
				'type'        => 'slider',
				'settings'    => 'sliderbutton_text',
				'label'       => esc_attr__( '1st Button Font size', 'unicons' ),
				'section'     => 'slider_setup',
				'transport' => 'auto',
				'default'     => 16,
				'choices'     => array(
					'min'  => '2',
					'max'  => '100',
					'step' => '1',
				),
				'output' => array(
			        array(
			            'element'  => '#unicons-slider .slider-bnt2,#staticslider .slider-bnt2,#youtub-bg .slider-bnt2',

			            'property' => 'font-size',
			            'units'    => 'px',
			        ),
						),
			) );
			Kirki::add_field( 'unicons', array(
					'type'        => 'multicolor',
					'settings'    => 'sliderbutton2_color',
					'label'       => esc_attr__( '2nd Button Color ', 'unicons' ),
					'section'     => 'slider_setup',
					'priority'    => 10,
					'transport' => 'auto',
					'choices'     => array(
							'text'   => esc_attr__( 'Text color', 'unicons' ),
							'hover'  => esc_attr__( 'Hover', 'unicons' ),
							'background'  => esc_attr__( 'Border', 'unicons' ),
					),
					'default'     => array(
							'text'   => '#fff',
							'hover'  => '#ff6699',
							'background'=>'#73baae',
					),
					'output'    => array(
				array(
					'choice'   => 'text',
					'element'  => '#unicons-slider .slider-bnt,#staticslider .slider-bnt,#youtub-bg .slider-bnt',
					'property' => 'color',
				),
				array(
					'choice'   => 'hover',
					'element'  => '#unicons-slider .btn-4:hover,#staticslider .btn-4:hover,#youtub-bg .btn-4:hover',
					'property' => 'border-color',
				),
				array(
					'choice'   => 'background',
					'element'  => '#unicons-slider .btn-4,#staticslider .btn-4,#youtub-bg .btn-4',
					'property' => 'border-color',
				),
					),
				) );
				Kirki::add_field( 'unicons', array(
					'type'        => 'slider',
					'settings'    => 'sliderbutton2_text',
					'label'       => esc_attr__( '2nd Button Font size', 'unicons' ),
					'section'     => 'slider_setup',
					'transport' => 'auto',
					'default'     => 16,
					'choices'     => array(
						'min'  => '2',
						'max'  => '100',
						'step' => '1',
					),
					'output' => array(
								array(
										'element'  => '#unicons-slider .slider-bnt,#staticslider .slider-bnt,#youtub-bg .slider-bnt',

										'property' => 'font-size',
										'units'    => 'px',
								),
							),
				) );





Kirki::add_field( 'unicons', array(
    'type'        => 'multicolor',
    'settings'    => 'slidertitlesub_color',
    'label'       => esc_attr__( 'Color', 'unicons' ),
    'section'     => 'slider_setup',
    'priority'    => 10,
		'transport' => 'auto',
    'choices'     => array(
        'title'   => esc_attr__( 'Title', 'unicons' ),
        'sub'  => esc_attr__( 'Content', 'unicons' ),
    ),
    'default'     => array(
        'title'   => '#fff',
        'sub'  => '#cccccc',
    ),
		'output'    => array(
  array(
    'choice'   => 'title',
    'element'  => '.slider-text h3,.masthead h1,#youtub-bg .brand-heading,.stat-content .brand-heading strong',
    'property' => 'color',
  ),
  array(
    'choice'   => 'sub',
    'element'  => '.slider-text p,.masthead .masthead-dsc p,#youtub-bg .intro-text,.stat-content .brand-heading span',
    'property' => 'color',
  ),
		),
	) );

	Kirki::add_field( 'unicons', array(
		'type'        => 'typography',
		'settings'    => 'slider_title_typography',
		'label'       => esc_attr__( 'Slider/Static title typography', 'unicons' ),
		'section'     => 'slider_setup',
		'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '40px',
		'line-height'    => '1.5',
		'letter-spacing' => '1px',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'uppercase',

	),
		'transport' => 'auto',
		'output' => array(
        array(
            'element'  => '.slider-text h3,.stat-content .brand-heading,.stat-content .brand-heading strong',
        ),
    ),


	) );

	Kirki::add_field( 'unicons', array(
		'type'        => 'typography',
		'settings'    => 'slider_subtitle_typography',
		'label'       => esc_attr__( 'Slider/Static Content typography', 'unicons' ),
		'section'     => 'slider_setup',
		'transport' => 'auto',
		'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '18px',
		'line-height'    => '1.5',
		'letter-spacing' => '1px',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'uppercase',

	),
		'output' => array(
        array(
            'element'  => '.slider-text p,.masthead .masthead-dsc p,.stat-content .brand-heading span',

        ),
    	),

	) );


Kirki::add_field( 'unicons', array(
	'type'        => 'toggle',
	'settings'    => 'disable_slider_content',
	'label'       => __( 'Disable Slider Content', 'unicons' ),
	'section'     => 'slider_setup',
	'default'     => '1',
	'priority'    => 10,
	'active_callback'    => array(
	array(
			'setting'  => 'slider_select',
			'operator' => '==',
			'value'    => 'slider',
		),
),
) );
/* Service Block  */

Kirki::add_field( 'unicons', array(
    'type'        => 'multicolor',
    'settings'    => 'serviceblock_color',
    'label'       => esc_attr__( 'Color', 'unicons' ),
    'section'     => 'sidebar-widgets-sidebar-service',
    'priority'    => 10,
		'transport' => 'auto',
    'choices'     => array(
        'title'   => esc_attr__( 'Title', 'unicons' ),
        'content'  => esc_attr__( 'Content', 'unicons' ),
    ),
    'default'     => array(
        'title'   => '#222',
        'content'  => '#747474',
    ),
		'output'    => array(
  array(
    'choice'   => 'title',
    'element'  => '.feature .feature__title',
    'property' => 'color',
  ),
  array(
    'choice'   => 'content',
    'element'  => '.feature .feature__content p',
    'property' => 'color',
  ),
		),
	) );

	Kirki::add_field( 'unicons', array(
	'type'        => 'slider',
	'settings'    => 'serviceblock_title_size',
	'label'       => esc_attr__( 'service block title text size', 'unicons' ),
	'section'     => 'sidebar-widgets-sidebar-service',
	'default'     => 18,
	'priority'    => 10,
	'transport' => 'auto',
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
	),
	'output' => array(
        array(
            'element'  => '.feature .feature__title',

            'property' => 'font-size',
            'units'    => 'px',
        ),
			),
) );
Kirki::add_field( 'unicons', array(
'type'        => 'slider',
'settings'    => 'serviceblock_subtitle_size',
'label'       => esc_attr__( 'service block sub title text size', 'unicons' ),
'section'     => 'sidebar-widgets-sidebar-service',
'default'     => 15,
'priority'    => 10,
'transport' => 'auto',
'choices'     => array(
	'min'  => '0',
	'max'  => '100',
	'step' => '1',
),
'output' => array(
			array(
					'element'  => '.feature .feature__content p',

					'property' => 'font-size',
					'units'    => 'px',
			),
		),
) );
Kirki::add_field( 'unicons', array(
    'type'        => 'multicolor',
    'settings'    => 'serviceblock_sectiontitlesubcolor',
    'label'       => esc_attr__( 'section title and sub-title Color', 'unicons' ),
    'section'     => 'sidebar-widgets-sidebar-service',
    'priority'    => 10,
		'transport' => 'auto',
    'choices'     => array(
        'title'   => esc_attr__( 'Title', 'unicons' ),
        'subtitle'  => esc_attr__( 'Sub-title', 'unicons' ),
    ),
    'default'     => array(
        'title'   => '#222',
        'subtitle'  => '#747474',
    ),
		'output'    => array(
  array(
    'choice'   => 'title',
    'element'  => '#service .section-header h1',
    'property' => 'color',
  ),
  array(
    'choice'   => 'subtitle',
    'element'  => '#service .section-description h2',
    'property' => 'color',
  ),
		),
	) );

	Kirki::add_field( 'unicons', array(
	'type'        => 'color',
	'settings'    => 'unicons_servicebg_color',
	'label'       => __( 'Section Background color', 'unicons' ),
	'section'     => 'sidebar-widgets-sidebar-service',
	'default'     => '#e8f1f1',
	'priority'    => 10,
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
				array(
						'element'  => '#service ',

						'property' => 'background-color',
						'units'    => '',
				),
			),
) );


/* Team section  */

Kirki::add_field( 'unicons', array(
    'type'        => 'multicolor',
    'settings'    => 'team_sectiontitlesubcolor',
    'label'       => esc_attr__( 'section title and sub-title Color', 'unicons' ),
    'section'     => 'sidebar-widgets-sidebar-team',
    'priority'    => 10,
		'transport' => 'auto',
    'choices'     => array(
        'title'   => esc_attr__( 'Title', 'unicons' ),
        'subtitle'  => esc_attr__( 'Sub-title', 'unicons' ),
    ),
    'default'     => array(
        'title'   => '#222',
        'subtitle'  => '#747474',
    ),
		'output'    => array(
  array(
    'choice'   => 'title',
    'element'  => '#team1 .section-header h1',
    'property' => 'color',
  ),
  array(
    'choice'   => 'subtitle',
    'element'  => '#team1 .section-description h2',
    'property' => 'color',
  ),
		),
	) );

	Kirki::add_field( 'unicons', array(
	    'type'        => 'multicolor',
	    'settings'    => 'team_sectionnamedescolor',
	    'label'       => esc_attr__( 'Team name ,Designation Color and bar background color', 'unicons' ),
	    'section'     => 'sidebar-widgets-sidebar-team',
	    'priority'    => 10,
			'transport' => 'auto',
	    'choices'     => array(
	        'title'   => esc_attr__( 'Name', 'unicons' ),
	        'subtitle'  => esc_attr__( 'Designation', 'unicons' ),
					'teambar'  => esc_attr__( 'background', 'unicons' ),
	    ),
	    'default'     => array(
	        'title'   => '#222',
	        'subtitle'  => '#747474',
					'teambar'=>'#fff',
	    ),
			'output'    => array(
	  array(
	    'choice'   => 'title',
	    'element'  => '.team-two h5',
	    'property' => 'color',
	  ),
	  array(
	    'choice'   => 'subtitle',
	    'element'  => '#team1 .team-two p',
	    'property' => 'color',
	  ),
		array(
	    'choice'   => 'teambar',
	    'element'  => '.team-two',
	    'property' => 'background',
	  ),
			),
		) );

		Kirki::add_field( 'unicons', array(
		'type'        => 'slider',
		'settings'    => 'team_name_size',
		'label'       => esc_attr__( 'Name text size', 'unicons' ),
		'section'     => 'sidebar-widgets-sidebar-team',
		'default'     => 16,
		'priority'    => 10,
		'transport' => 'auto',
		'choices'     => array(
			'min'  => '0',
			'max'  => '100',
			'step' => '1',
		),
		'output' => array(
					array(
							'element'  => '.team-two h5',

							'property' => 'font-size',
							'units'    => 'px',
					),
				),
		) );
		Kirki::add_field( 'unicons', array(
		'type'        => 'slider',
		'settings'    => 'team_designation_size',
		'label'       => esc_attr__( 'Designation text size', 'unicons' ),
		'section'     => 'sidebar-widgets-sidebar-team',
		'default'     => 13,
		'priority'    => 10,
		'transport' => 'auto',
		'choices'     => array(
			'min'  => '0',
			'max'  => '100',
			'step' => '1',
		),
		'output' => array(
					array(
							'element'  => '#team1 .team-two p',

							'property' => 'font-size',
							'units'    => 'px',
					),
				),
		) );

	Kirki::add_field( 'unicons', array(
	'type'        => 'color',
	'settings'    => 'unicons_teambg_color',
	'label'       => __( 'Section Background color', 'unicons' ),
	'section'     => 'sidebar-widgets-sidebar-team',
	'default'     => '#f5f7f9',
	'priority'    => 10,
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
				array(
						'element'  => '#team1',

						'property' => 'background-color',
						'units'    => '',
				),
			),
) );


/* Latest Post */



Kirki::add_field( 'unicons', array(
	'type'     => 'text',
	'settings' => 'latest_post_title',
	'label'    => __( 'Latest Post title', 'unicons' ),
	'section'  => 'unicons_latestsetup',
	'default'  => esc_attr__( 'Latest News', 'unicons' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => array(
        array(
            'element'  => '#latset-postsaf .section-header h1',
            'function' => 'html',
            'property' => '',
        ),
    ),
) );


Kirki::add_field( 'unicons', array(
	'type'     => 'text',
	'settings' => 'latest_post_subtitle',
	'label'    => __( 'Latest post sub title', 'unicons' ),
	'section'  => 'unicons_latestsetup',
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => array(
        array(
            'element'  => '#latset-postsaf .section-description h2',
            'function' => 'html',
            'property' => '',
        ),
    ),
) );
Kirki::add_field( 'unicons', array(
    'type'        => 'multicolor',
    'settings'    => 'latest_sectioncontentcolor',
    'label'       => esc_attr__( '  title and Subtitle Color', 'unicons' ),
    'section'     => 'unicons_latestsetup',
    'priority'    => 10,
		'transport' => 'auto',
    'choices'     => array(
        'title'   => esc_attr__( 'Title', 'unicons' ),
        'content'  => esc_attr__( 'Subtitle', 'unicons' ),
    ),
    'default'     => array(
        'title'   => '#222',
        'content'  => '#747474',
    ),
		'output'    => array(
  array(
    'choice'   => 'title',
    'element'  => '#latset-postsaf .section-header h1',
    'property' => 'color',
  ),
  array(
    'choice'   => 'content',
    'element'  => '#latset-postsaf .section-description h2',
    'property' => 'color',
  ),
		),
	) );
Kirki::add_field( 'unicons', array(
	'type'        => 'select',
	'settings'    => 'layout_select',
	'label'       => __( 'Select Post layout', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'default'     => 'layout1',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'layout1' => esc_attr__( 'Layout 1', 'unicons' ),
		'layout2' => esc_attr__( 'Layout 2', 'unicons' ),
		'layout3' => esc_attr__( 'Layout 3', 'unicons' ),
	),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'select',
	'settings'    => 'category_show',
	'label'       => esc_attr__( 'Select Category', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'priority'    => 10,
	'multiple'    => 999,
	'choices'     => Kirki_Helper::get_terms( 'category' ),
	'partial_refresh' => array(
		'latest_post_partial_refresh_id7' => array(
			'selector'        => '#latest-ref ',
			'render_callback' => function() { ?>
				<?php if( get_theme_mod( 'layout_select' )){ ?>

				<?php $template_parts_unicons = get_theme_mod( 'layout_select', array( 'layout1', 'layout2' ) );
				        get_template_part('layout/part',''.$template_parts_unicons .''); ?>

				  <?php }else{ ?>

				 <?php get_template_part('layout/part','layout1'); ?>
				        <?php } ?>
			<?php },
		),
	),
) );



Kirki::add_field( 'unicons', array(
	'type'        => 'number',
	'settings'    => 'unicons_num_post',
	'label'       => esc_attr__( 'Number of post show in front page ', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'default'     => 8,
	'priority'    => 10,
	'partial_refresh' => array(
		'latest_post_partial_refresh_id6' => array(
			'selector'        => '#latest-ref ',
			'render_callback' => function() { ?>
				<?php if( get_theme_mod( 'layout_select' )){ ?>

				<?php $template_parts_unicons = get_theme_mod( 'layout_select', array( 'layout1', 'layout2' ) );
				        get_template_part('layout/part',''.$template_parts_unicons .''); ?>

				  <?php }else{ ?>

				 <?php get_template_part('layout/part','layout1'); ?>
				        <?php } ?>
			<?php },
		),
	),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'select',
	'settings'    => 'post_order_by',
	'label'       => __( 'Show post orderby', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'default'     => 'date',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'none' => esc_attr__( 'None', 'unicons' ),
		'date' => esc_attr__( 'Date', 'unicons' ),
		'ID' => esc_attr__( 'ID', 'unicons' ),
		'author' => esc_attr__( 'Author', 'unicons' ),
		'title' => esc_attr__( 'Title', 'unicons' ),
		'rand'=> esc_attr__( 'Random', 'unicons' ),
	),
	'partial_refresh' => array(
		'latest_post_partial_refresh_id5' => array(
			'selector'        => '#latest-ref ',
			'render_callback' => function() { ?>
				<?php if( get_theme_mod( 'layout_select' )){ ?>

				<?php $template_parts_unicons = get_theme_mod( 'layout_select', array( 'layout1', 'layout2' ) );
				        get_template_part('layout/part',''.$template_parts_unicons .''); ?>

				  <?php }else{ ?>

				 <?php get_template_part('layout/part','layout1'); ?>
				        <?php } ?>
			<?php },
		),
	),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'toggle',
	'settings'    => 'latest_post_cat',
	'label'       => __( 'Hide latest post cetagory', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'default'     => '1',
	'priority'    => 10,
	'partial_refresh' => array(
		'latest_post_partial_refresh_id4' => array(
			'selector'        => '#latest-ref ',
			'render_callback' => function() { ?>
				<?php if( get_theme_mod( 'layout_select' )){ ?>

				<?php $template_parts_unicons = get_theme_mod( 'layout_select', array( 'layout1', 'layout2' ) );
				        get_template_part('layout/part',''.$template_parts_unicons .''); ?>

				  <?php }else{ ?>

				 <?php get_template_part('layout/part','layout1'); ?>
				        <?php } ?>
			<?php },
		),
	),
) );
Kirki::add_field( 'unicons', array(
	'type'        => 'toggle',
	'settings'    => 'latest_post_date',
	'label'       => __( 'Hide latest post date', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'default'     => '1',
	'priority'    => 10,
	'partial_refresh' => array(
		'latest_post_partial_refresh_id3' => array(
			'selector'        => '#latest-ref ',
			'render_callback' => function() { ?>
				<?php if( get_theme_mod( 'layout_select' )){ ?>

				<?php $template_parts_unicons = get_theme_mod( 'layout_select', array( 'layout1', 'layout2' ) );
				        get_template_part('layout/part',''.$template_parts_unicons .''); ?>

				  <?php }else{ ?>

				 <?php get_template_part('layout/part','layout1'); ?>
				        <?php } ?>
			<?php },
		),
	),
) );
Kirki::add_field( 'unicons', array(
	'type'        => 'toggle',
	'settings'    => 'latest_post_comment',
	'label'       => __( 'Hide latest post comments', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'default'     => '1',
	'priority'    => 10,
	'partial_refresh' => array(
		'latest_post_partial_refresh_id2' => array(
			'selector'        => '#latest-ref ',
			'render_callback' => function() { ?>
				<?php if( get_theme_mod( 'layout_select' )){ ?>

				<?php $template_parts_unicons = get_theme_mod( 'layout_select', array( 'layout1', 'layout2' ) );
				        get_template_part('layout/part',''.$template_parts_unicons .''); ?>

				  <?php }else{ ?>

				 <?php get_template_part('layout/part','layout1'); ?>
				        <?php } ?>
			<?php },
		),
	),
) );

Kirki::add_field( 'unicons', array(
'type'        => 'color',
'settings'    => 'unicons_latestbg_color',
'label'       => __( 'Section Background color', 'unicons' ),
'section'     => 'unicons_latestsetup',
'default'     => '#FFF',
'priority'    => 10,
'transport' => 'auto',
'choices'     => array(
	'alpha' => true,
),
'output' => array(
			array(
					'element'  => '#latset-postsaf',

					'property' => 'background-color',
					'units'    => '',
			),
		),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'image',
	'settings'    => 'unicons_latestbg_image',
	'label'       => __( 'Add section background image', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'default'     => '',
	'priority'    => 10,

) );

Kirki::add_field( 'unicons', array(
	'type'        => 'checkbox',
	'settings'    => 'unicons_latestfixed_image',
	'label'       => __( 'Disable parallax effect', 'unicons' ),
	'section'     => 'unicons_latestsetup',
	'default'     => '1',
	'priority'    => 10,

) );

/* Client section  */


Kirki::add_field( 'unicons', array(
	'type'     => 'text',
	'settings' => 'client_subtitle',
	'label'    => __( ' Sub title', 'unicons' ),
	'section'  => 'sidebar-widgets-sidebar-clients',
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => array(
        array(
            'element'  => '#unicons-clients .section-description h2',
            'function' => 'html',
            'property' => '',
        ),
    ),
) );

Kirki::add_field( 'unicons', array(
    'type'        => 'multicolor',
    'settings'    => 'client_sectiontitlesubcolor',
    'label'       => esc_attr__( 'section title and sub-title Color', 'unicons' ),
    'section'     => 'sidebar-widgets-sidebar-clients',
    'priority'    => 10,
		'transport' => 'auto',
    'choices'     => array(
        'title'   => esc_attr__( 'Title', 'unicons' ),
        'subtitle'  => esc_attr__( 'Sub-title', 'unicons' ),
    ),
    'default'     => array(
        'title'   => '#222',
        'subtitle'  => '#747474',
    ),
		'output'    => array(
  array(
    'choice'   => 'title',
    'element'  => '#unicons-clients .section-header h1',
    'property' => 'color',
  ),
  array(
    'choice'   => 'subtitle',
    'element'  => '#unicons-clients .section-description h2',
    'property' => 'color',
  ),
		),
	) );

	Kirki::add_field( 'unicons', array(
	'type'        => 'color',
	'settings'    => 'unicons_clientsbg_color',
	'label'       => __( 'Section Background color', 'unicons' ),
	'section'     => 'sidebar-widgets-sidebar-clients',
	'default'     => '#ffffff',
	'priority'    => 10,
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
				array(
						'element'  => '#unicons-clients',

						'property' => 'background-color',
						'units'    => '',
				),
			),
) );

	Kirki::add_field( 'unicons', array(
		'type'        => 'image',
		'settings'    => 'unicons_clientsbg_image',
		'label'       => __( 'Add section background image', 'unicons' ),
		'section'     => 'sidebar-widgets-sidebar-clients',
		'default'     => '',
		'priority'    => 10,
		'partial_refresh' => array(
			'client_bgimage_partial_refresh_id' => array(
				'selector'        => '#unicons-clients',
				'render_callback' => function() {
					get_template_part( 'parts/part-client' );
				},
			),
		),
	) );

	Kirki::add_field( 'unicons', array(
		'type'        => 'checkbox',
		'settings'    => 'unicons_clientsfixed_image',
		'label'       => __( 'Disable parallax effect', 'unicons' ),
		'section'     => 'sidebar-widgets-sidebar-clients',
		'default'     => '1',
		'priority'    => 10,
		'partial_refresh' => array(
			'client_image_partial_refresh_id' => array(
				'selector'        => '#unicons-clients',
				'render_callback' => function() {
					get_template_part( 'parts/part-client' );
				},
			),
		),
	) );

	Kirki::add_field( 'unicons', array(
	'type'        => 'color',
	'settings'    => 'clients_overlay_color',
	'label'       => __( 'Section Overlay color', 'unicons' ),
	'section'     => 'sidebar-widgets-sidebar-clients',
	'default'     => 'rgba(33, 33, 33, 0.58)',
	'priority'    => 10,
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
				array(
						'element'  => '#unicons-clients .overlay',

						'property' => 'background-color',
						'units'    => '',
				),
			),
	) );

/* social icon */

Kirki::add_field( 'unicons', array(
    'type'        => 'toggle',
    'settings'    => 'unicons_search_box',
    'label'       => esc_attr__( 'Disable search Icon in header', 'unicons' ),
    'section'     => 'unicons_social',
    'default'     => '1',
    'priority'    => 1,
) );

Kirki::add_field( 'unicons', array(
    'type'        => 'toggle',
    'settings'    => 'unicons_social_box',
    'label'       => esc_attr__( 'Disable social Icon in header', 'unicons' ),
    'section'     => 'unicons_social',
    'default'     => '0',
    'priority'    => 1,
) );

Kirki::add_field( 'unicons', array(
    'type'        => 'toggle',
    'settings'    => 'unicons_social_boxfoo',
    'label'       => esc_attr__( 'Enable social Icon in footer', 'unicons' ),
    'section'     => 'unicons_social',
    'default'     => '0',
    'priority'    => 1,
) );
Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'fbsoc_text_unicons',
        'label'    => esc_attr__( 'Facebook', 'unicons' ),
        'section'  => 'unicons_social',

        'priority' => 1,
    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'ttsoc_text_unicons',
        'label'    => esc_attr__( 'Twitter', 'unicons' ),
        'section'  => 'unicons_social',
        'priority' => 2,
    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'gpsoc_text_unicons',
        'label'    => esc_attr__( 'Google Plus', 'unicons' ),
        'section'  => 'unicons_social',
        'priority' => 3,
    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'pinsoc_text_unicons',
        'label'    => esc_attr__( 'Pinterest', 'unicons' ),
        'section'  => 'unicons_social',
        'priority' => 4,
    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'ytbsoc_text_unicons',
        'label'    => esc_attr__( 'YouTube', 'unicons' ),
        'section'  => 'unicons_social',
        'priority' => 5,
    ));


Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'linsoc_text_unicons',
        'label'    => __( 'Linkedin', 'unicons' ),
        'section'  => 'unicons_social',
        'priority' => 6,
    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'instagram_text_unicons',
        'label'    => __( 'Instagram', 'unicons' ),
        'section'  => 'unicons_social',
        'priority' => 7,
    ));


Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'flisoc_text_unicons',
        'label'    => esc_attr__( 'Flickr', 'unicons' ),
        'section'  => 'unicons_social',
        'priority' => 8,
    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'vimsoc_text_unicons',
        'label'    => esc_attr__( 'Vimeo', 'unicons' ),
        'section'  => '',
        'priority' => 9,
    ));

Kirki::add_field( 'unicons', array(
        'type'     => 'text',
        'settings'  => 'rsssoc_text_unicons',
        'label'    => esc_attr__( 'RSS', 'unicons' ),
        'section'  => 'unicons_social',
        'priority' => 10,
    ));





/*  section Typography  */

Kirki::add_field( 'unicons', array(
	'type'        => 'typography',
	'settings'    => 'unicons_typography_sechead',
	'label'       => esc_attr__( 'Section Title typography', 'unicons' ),
	'section'     => 'unicons_typography_setting',
	'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '42px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.section-header h1',
		),
	),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'typography',
	'settings'    => 'unicons_typography_secsubhead',
	'label'       => esc_attr__( 'Section Sub Title typography', 'unicons' ),
	'section'     => 'unicons_typography_setting',
	'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '18px',
		'line-height'    => '30px',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'none',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => '.section-description h2',
		),
	),
) );

/*  section contact  */
Kirki::add_field( 'unicons', array(
		'type'        => 'multicolor',
		'settings'    => 'contact_textcolor',
		'label'       => esc_attr__( 'Description and Icon color', 'unicons' ),
		'section'     => 'sidebar-widgets-sidebar-contact',
		'priority'    => 10,
		'transport' => 'auto',
		'choices'     => array(
				'title'   => esc_attr__( 'Title color', 'unicons' ),
				'text'  => esc_attr__( 'Text color', 'unicons' ),
				'icon'  => esc_attr__( 'Icon', 'unicons' ),
		),
		'default'     => array(
				'title'   => '#e5e5e5',
				'text'  => '#ffffff',
				'icon'=>'#ffffff',
		),
		'output'    => array(
	array(
		'choice'   => 'title',
		'element'  => '#contact h1 small,#contact .contact-text h5 strong',
		'property' => 'color',
	),
	array(
		'choice'   => 'text',
		'element'  => '#contact .contact-text p,#contact h1,#contact h5',
		'property' => 'color',
	),
	array(
		'choice'   => 'icon',
		'element'  => '#contact .contact-text i',
		'property' => 'color',
	),
		),
	) );
	Kirki::add_field( 'unicons', array(
			'type'        => 'multicolor',
			'settings'    => 'contact_form_textcolor',
			'label'       => esc_attr__( 'Contact form text color', 'unicons' ),
			'section'     => 'sidebar-widgets-sidebar-contact',
			'priority'    => 10,
			'transport' => 'auto',
			'choices'     => array(
					'title'   => esc_attr__( 'Title ', 'unicons' ),
					'subtitle'  => esc_attr__( 'Sub title ', 'unicons' ),
					'text'  => esc_attr__( 'Content', 'unicons' ),
					'button_text'  => esc_attr__( 'Button ', 'unicons' ),
			),
			'default'     => array(
					'title'   => '#0a0a0a',
					'text'  => '#0a0a0a',
					'subtitle'=>'#cacaca',
					'button_text'=>'#ffffff',
			),
			'output'    => array(
		array(
			'choice'   => 'title',
			'element'  => '#contact .contact-us-one h4,#contact .contact-us-one label',
			'property' => 'color',
		),
		array(
			'choice'   => 'subtitle',
			'element'  => '#contact .contact-us-one h4 small',
			'property' => 'color',
		),
		array(
			'choice'   => 'text',
			'element'  => '#contact .contact-us-one .wpcf7-form-control-wrap .wpcf7-form-control',
			'property' => 'color',
		),
		array(
			'choice'   => 'button_text',
			'element'  => '#contact .wpcf7-submit',
			'property' => 'color',
		),
			),
		) );
		Kirki::add_field( 'unicons', array(
				'type'        => 'multicolor',
				'settings'    => 'contact_form_bgcolor',
				'label'       => esc_attr__( ' section background setup color', 'unicons' ),
				'section'     => 'sidebar-widgets-sidebar-contact',
				'priority'    => 10,
				'transport' => 'auto',
				'choices'     => array(
						'section'   => esc_attr__( 'Section ', 'unicons' ),
						'form'  => esc_attr__( 'Form ', 'unicons' ),
						'form-filed'=> esc_attr__( 'Field', 'unicons' ),
						'button'  => esc_attr__( 'Button', 'unicons' ),

				),
				'default'     => array(
						'section'   => '#94bf6d',
						'form'  => 'rgb(251, 249, 249)',
						'form-filed'  => 'rgb(228, 228, 228)',
						'button'=>'#000000',

				),
				'output'    => array(
			array(
				'choice'   => 'section',
				'element'  => '#contact ',
				'property' => 'background-color',
			),
			array(
				'choice'   => 'form',
				'element'  => '#contact .contact-us-one ',
				'property' => 'background-color',
			),
			array(
				'choice'   => 'form-filed',
				'element'  => '#contact .wpcf7-form .wpcf7-form-control-wrap [type="color"], [type="date"], [type="datetime-local"], [type="datetime"], [type="email"], [type="month"], [type="number"], [type="password"], [type="search"], [type="tel"], [type="text"], [type="time"], [type="url"], [type="week"], textarea,#contact .wpcf7-form .wpcf7-form-control-wrap [type="color"]:focus, [type="date"]:focus, [type="datetime-local"]:focus, [type="datetime"]:focus, [type="email"]:focus, [type="month"]:focus, [type="number"]:focus, [type="password"]:focus, [type="search"]:focus, [type="tel"]:focus, [type="text"]:focus, [type="time"]:focus, [type="url"]:focus, [type="week"]:focus, textarea:focus',
				'property' => 'background-color',
			),
			array(
				'choice'   => 'button',
				'element'  => '#contact .wpcf7-submit',
				'property' => 'background',
			),

				),
			) );
			Kirki::add_field( 'unicons', array(
				'type'        => 'image',
				'settings'    => 'unicons_contactbg_image',
				'label'       => __( 'Add section background image', 'unicons' ),
				'section'     => 'sidebar-widgets-sidebar-contact',
				'default'     => '',
				'priority'    => 10,

			) );

			Kirki::add_field( 'unicons', array(
				'type'        => 'checkbox',
				'settings'    => 'unicons_contactfixed_image',
				'label'       => __( 'Disable parallax effect', 'unicons' ),
				'section'     => 'sidebar-widgets-sidebar-contact',
				'default'     => '1',
				'priority'    => 10,


			) );
			Kirki::add_field( 'unicons', array(
			'type'        => 'color',
			'settings'    => 'contact_overlay_color',
			'label'       => __( 'Section Overlay color', 'unicons' ),
			'section'     => 'sidebar-widgets-sidebar-contact',
			'default'     => 'rgba(33, 33, 33, 0.58)',
			'priority'    => 10,
			'transport' => 'auto',
			'choices'     => array(
				'alpha' => true,
			),
			'output' => array(
						array(
								'element'  => '#contact .overlay',

								'property' => 'background-color',
								'units'    => '',
						),
					),
			) );

						/* Footer section */
						Kirki::add_field( 'unicons', array(
								'type'        => 'multicolor',
								'settings'    => 'footerwidgets_title_textcolor',
								'label'       => esc_attr__( 'Footer widgets Title and Content color', 'unicons' ),
								'section'     => 'unicons_footer',
								'priority'    => 10,
								'transport' => 'auto',
								'choices'     => array(
										'title'   => esc_attr__( 'Title ', 'unicons' ),
										'subtitle'  => esc_attr__( 'Content ', 'unicons' ),


								),
								'default'     => array(
										'title'   => '#686CB6',
										'subtitle'=>'#FFF',

								),
								'output'    => array(
							array(
								'choice'   => 'title',
								'element'  => '#footer .widgets .widgettitle',
								'property' => 'color',
							),
							array(
								'choice'   => 'subtitle',
								'element'  => '#footer .widgets .widget .menu > li,#footer .widgets .widget ul li a,#footer .widgets,#footer .widgets p,#footer .widgets .textwidget,#footer .widgets .widget .menu > li > a',
								'property' => 'color',
							),
								),
							) );

							Kirki::add_field( 'unicons', array(
							'type'        => 'color',
							'settings'    => 'footerwidgets_bg_color',
							'label'       => __( 'Footer widgets Background color', 'unicons' ),
							'section'     => 'unicons_footer',
							'default'     => '#2e313f',
							'priority'    => 10,
							'transport' => 'auto',
							'choices'     => array(
								'alpha' => true,
							),
							'output' => array(
										array(
												'element'  => '#footer .widgets ',

												'property' => 'background-color',
												'units'    => '',
										),
									),
							) );

							Kirki::add_field( 'unicons', array(
								'type'        => 'image',
								'settings'    => 'footerwidgets_bg_image',
								'label'       => __( 'Add section background image for Footer widgets', 'unicons' ),
								'section'     => 'unicons_footer',
								'default'     => '',
								'priority'    => 10,

							) );

							Kirki::add_field( 'unicons', array(
								'type'        => 'checkbox',
								'settings'    => 'footerwidgets_fixed_image',
								'label'       => __( 'Footer widgets Disable parallax effect', 'unicons' ),
								'section'     => 'unicons_footer',
								'default'     => '1',
								'priority'    => 10,


							) );
							Kirki::add_field( 'unicons', array(
							'type'        => 'color',
							'settings'    => 'footerwidgets_overlay_color',
							'label'       => __( 'Section Overlay color for Footer widgets', 'unicons' ),
							'section'     => 'unicons_footer',
							'default'     => 'rgba(33, 33, 33, 0.58)',
							'priority'    => 10,
							'transport' => 'auto',
							'choices'     => array(
								'alpha' => true,
							),
							'output' => array(
										array(
												'element'  => '#footer .widgets .overlay',

												'property' => 'background-color',
												'units'    => '',
										),
									),
							) );

						Kirki::add_field( 'unicons', array(
						    'type'        => 'textarea',
						    'settings'    => 'unicons_footertext',
						    'label'       => esc_attr__( 'Footer copyright text ', 'unicons' ),
						    'section'     => 'unicons_footer',
						    'priority'    => 10,
							'transport' => 'postMessage',
							'js_vars'   => array(
						        array(
						            'element'  => '.copytext',
						            'function' => 'html',
						            'property' => '',

						        ),
						    ),
						) );
						Kirki::add_field( 'unicons', array(
							'type'        => 'typography',
							'settings'    => 'copyright_typography',
							'label'       => esc_attr__( 'Copyright typography ', 'unicons' ),
							'section'     => 'unicons_footer',
							'transport' => 'auto',
							'default'     => array(
								'font-family'    => 'Roboto',
								'variant'        => 'regular',
								'font-size'      => '14px',
								'line-height'    => '1.5',
								'letter-spacing' => '0px',
								'subsets'        => array( 'latin-ext' ),
								'color'          => '#CCC',
								'text-transform' => 'none',
								'text-align'     => 'left'
							),
							'priority'    => 10,
							'output'      => array(
								array(
									'element' => '#footer #copyright .copytext,#footer #copyright .copytext p ',
								),
							),
						) );
						Kirki::add_field( 'unicons', array(
						'type'        => 'color',
						'settings'    => 'footercopyright_bg_color',
						'label'       => __( 'Footer copyright Background color', 'unicons' ),
						'section'     => 'unicons_footer',
						'default'     => '#222533',
						'priority'    => 10,
						'transport' => 'auto',
						'choices'     => array(
							'alpha' => true,
						),
						'output' => array(
									array(
											'element'  => '#footer #copyright ',

											'property' => 'background-color',
											'units'    => '',
									),
								),
						) );

						/*  Portfolio Page setup  */
						Kirki::add_field( 'unicons', array(
						    'type'        => 'switch',
						    'settings'    => 'portfoliopage_titleenabel',
						    'label'       => esc_attr__( 'Enable/disabel Page title', 'unicons' ),
						    'section'     => 'unicons_pageportfolio',
						    'default'     => '1',
						    'priority'    => 1,
						    'choices'     => array(
						        'off' => esc_attr__( 'off', 'unicons' ),
										'on'  =>esc_attr__ ( 'on', 'unicons' ),
						    ),
						) );
						Kirki::add_field( 'unicons', array(
							'type'     => 'text',
							'settings' => 'portfoliopage_title',
							'label'    => __( 'section title', 'unicons' ),
							'section'  => 'unicons_pageportfolio',
							'default'  => esc_attr__( 'Testimonials', 'unicons' ),
							'priority' => 10,
							'transport' => 'postMessage',
							'js_vars'   => array(
										array(
												'element'  => '#unicons-portfolio .section-header h1',
												'function' => 'html',
												'property' => '',
										),
								),
						) );


						Kirki::add_field( 'unicons', array(
							'type'     => 'text',
							'settings' => 'portfoliopage_subtitle',
							'label'    => __( 'section sub title', 'unicons' ),
							'section'  => 'unicons_pageportfolio',
							'priority' => 10,
							'transport' => 'postMessage',
							'js_vars'   => array(
										array(
												'element'  => '#unicons-portfolio .section-description h2',
												'function' => 'html',
												'property' => '',
										),
								),
						) );

						Kirki::add_field( 'unicons', array(
								'type'        => 'multicolor',
								'settings'    => 'portfoliopage_title_textcolor',
								'label'       => esc_attr__( 'Title and subtitle color', 'unicons' ),
								'section'     => 'unicons_pageportfolio',
								'priority'    => 10,
								'transport' => 'auto',
								'choices'     => array(
										'title'   => esc_attr__( 'Title ', 'unicons' ),
										'subtitle'  => esc_attr__( 'Sub title ', 'unicons' ),


								),
								'default'     => array(
										'title'   => '#777',
										'subtitle'=>'#0a0a0a',

								),
								'output'    => array(
							array(
								'choice'   => 'title',
								'element'  => '#unicons-portfoliopage .section-header h1',
								'property' => 'color',
							),
							array(
								'choice'   => 'subtitle',
								'element'  => '#unicons-portfoliopage .section-description h2',
								'property' => 'color',
							),
								),
							) );
							Kirki::add_field( 'unicons', array(
								'type'        => 'select',
								'settings'    => 'portfoliopage_category_show',
								'label'       => esc_attr__( 'Select Category', 'unicons' ),
								'section'     => 'unicons_pageportfolio',
								'priority'    => 10,
								'multiple'    => 999,
								'choices'     => Kirki_Helper::get_terms( 'category' ),

							) );
							Kirki::add_field( 'unicons', array(
							'type'        => 'color',
							'settings'    => 'portfoliopage_bg_color',
							'label'       => __( 'Section Background color', 'unicons' ),
							'section'     => 'unicons_pageportfolio',
							'default'     => '#f6f4f4',
							'priority'    => 10,
							'transport' => 'auto',
							'choices'     => array(
								'alpha' => true,
							),
							'output' => array(
										array(
												'element'  => '#unicons-portfoliopage',

												'property' => 'background-color',
												'units'    => '',
										),
									),
							) );

/*  Team Page setup  */


							Kirki::add_field( 'unicons', array(
							    'type'        => 'multicolor',
							    'settings'    => 'teampage_sectiontitlesubcolor',
							    'label'       => esc_attr__( 'section title and sub-title Color', 'unicons' ),
							    'section'     => 'sidebar-widgets-sidebar-teampage',
							    'priority'    => 10,
									'transport' => 'auto',
							    'choices'     => array(
							        'title'   => esc_attr__( 'Title', 'unicons' ),
							        'subtitle'  => esc_attr__( 'Sub-title', 'unicons' ),
							    ),
							    'default'     => array(
							        'title'   => '#222',
							        'subtitle'  => '#747474',
							    ),
									'output'    => array(
							  array(
							    'choice'   => 'title',
							    'element'  => '#team-page .section-header h1',
							    'property' => 'color',
							  ),
							  array(
							    'choice'   => 'subtitle',
							    'element'  => '#team-page .section-description h2',
							    'property' => 'color',
							  ),
									),
								) );

								Kirki::add_field( 'unicons', array(
								    'type'        => 'multicolor',
								    'settings'    => 'teampage_sectionnamedescolor',
								    'label'       => esc_attr__( 'Team name ,Designation Color and bar background color', 'unicons' ),
								    'section'     => 'sidebar-widgets-sidebar-teampage',
								    'priority'    => 10,
										'transport' => 'auto',
								    'choices'     => array(
								        'title'   => esc_attr__( 'Name', 'unicons' ),
								        'subtitle'  => esc_attr__( 'Designation', 'unicons' ),
												'teambar'  => esc_attr__( 'background', 'unicons' ),
								    ),
								    'default'     => array(
								        'title'   => '#222',
								        'subtitle'  => '#747474',
												'teambar'=>'#fff',
								    ),
										'output'    => array(
								  array(
								    'choice'   => 'title',
								    'element'  => '#team-page .team-two h5',
								    'property' => 'color',
								  ),
								  array(
								    'choice'   => 'subtitle',
								    'element'  => '#team-page .team-two p',
								    'property' => 'color',
								  ),
									array(
								    'choice'   => 'teambar',
								    'element'  => '#team-page .team-two',
								    'property' => 'background',
								  ),
										),
									) );

									Kirki::add_field( 'unicons', array(
									'type'        => 'slider',
									'settings'    => 'teampage_name_size',
									'label'       => esc_attr__( 'Name text size', 'unicons' ),
									'section'     => 'sidebar-widgets-sidebar-teampage',
									'default'     => 16,
									'priority'    => 10,
									'transport' => 'auto',
									'choices'     => array(
										'min'  => '0',
										'max'  => '100',
										'step' => '1',
									),
									'output' => array(
												array(
														'element'  => '#team-page .team-two h5',

														'property' => 'font-size',
														'units'    => 'px',
												),
											),
									) );
									Kirki::add_field( 'unicons', array(
									'type'        => 'slider',
									'settings'    => 'teampage_designation_size',
									'label'       => esc_attr__( 'Designation text size', 'unicons' ),
									'section'     => 'sidebar-widgets-sidebar-teampage',
									'default'     => 13,
									'priority'    => 10,
									'transport' => 'auto',
									'choices'     => array(
										'min'  => '0',
										'max'  => '100',
										'step' => '1',
									),
									'output' => array(
												array(
														'element'  => '#team-page .team-two p',

														'property' => 'font-size',
														'units'    => 'px',
												),
											),
									) );


								Kirki::add_field( 'unicons', array(
								'type'        => 'color',
								'settings'    => 'unicons_teampagebg_color',
								'label'       => __( 'Section Background color', 'unicons' ),
								'section'     => 'sidebar-widgets-sidebar-teampage',
								'default'     => '#f5f7f9',
								'priority'    => 10,
								'transport' => 'auto',
								'choices'     => array(
									'alpha' => true,
								),
								'output' => array(
											array(
													'element'  => '#team-page',

													'property' => 'background-color',
													'units'    => '',
											),
										),
							) );
/*  Blog and Post Setup  */

Kirki::add_field( 'unicons', array(
	'type'        => 'select',
	'settings'    => 'unicons_blogpost_style',
	'label'       => __( 'Blog page and other page layout style', 'unicons' ),
	'section'     => 'unicons_blogpost',
	'default'     => 'content1',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'content1' => esc_attr__( 'Layout 1', 'unicons' ),
		'content2' => esc_attr__( 'Layout 2', 'unicons' ),
		'content3' => esc_attr__( 'Layout 3', 'unicons' ),

	),
) );

Kirki::add_field( 'unicons', array(
	'type'        => 'toggle',
	'settings'    => 'sidebar_blog',
	'label'       => __( 'Sidebar disable in Blog page', 'unicons' ),
	'section'     => 'unicons_blogpost',
	'default'     => '1',
	'priority'    => 10,
) );
