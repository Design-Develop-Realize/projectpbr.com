<?php
/**
 * unicons Theme Customizer
 *
 * @package unicons
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function unicons_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$our_client_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-clients' );
	if ( ! empty( $our_client_section ) ) {
			$our_client_section->panel = 'theme_options';
			$our_client_section->title   = __( 'Client section', 'unicons' );
			$our_client_section->priority = 8;
			}
			$contact_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-contact' );
			if ( ! empty( $contact_section ) ) {
					$contact_section->panel = 'theme_options';
					$contact_section->title   = __( 'Contact section', 'unicons' );
					$contact_section->priority = 8;
					}
	$our_service_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-service' );
			if ( ! empty( $our_service_section ) ) {
					$our_service_section->panel = 'theme_options';
					$our_service_section->title   = __( 'Service section', 'unicons' );
					$our_service_section->priority = 3;
					}
	$counter_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-counter' );
			if ( ! empty( $counter_section ) ) {
					$counter_section->panel = 'theme_options';
					$counter_section->title   = __( 'Counter section', 'unicons' );
					$counter_section->priority = 7;
				}
	$team_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-team' );
			if ( ! empty( $team_section ) ) {
					$team_section->panel = 'theme_options';
					$team_section->title   = __( 'Team section', 'unicons' );
					$team_section->priority = 6;
				}
$teampage_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-teampage' );
						if ( ! empty( $counter_section ) ) {
								$teampage_section->panel = 'theme_options';
								$teampage_section->title   = __( 'Team Page setup', 'unicons' );
								$teampage_section->priority = 6;
							}
				$contact_section = $wp_customize->get_section( 'sidebar-widgets-sidebar-contact' );
						if ( ! empty( $contact_section ) ) {
								$contact_section->panel = 'theme_options';
								$contact_section->title   = __( 'Contact section', 'unicons' );
								$contact_section->priority = 9;
							}
				$background_color_control = $wp_customize->get_control( 'background_color' );
			    if ( $background_color_control ) {
			        $background_color_control->section = 'launiconst_front_page';
			    }

					$unicons_subheadtitle_settings = $wp_customize->get_control( 'header_image' );
						if ( $unicons_subheadtitle_settings ) {
								$unicons_subheadtitle_settings->section = 'unicons_subheadtitle_settings';
						}

}
add_action( 'customize_register', 'unicons_customize_register' );

function unicons_registers() {
	wp_enqueue_style( 'unicons_customizer_style', get_template_directory_uri() . '/css/admin.css','unicons-style', true );

}
add_action( 'customize_controls_enqueue_scripts', 'unicons_registers' );


/**
 * unicons Customizer functionality
 */
 /*  Register Customizer options
 /* ------------------------------------ */
 if ( ! function_exists( 'unicons_customize_register_pro' ) ) {
 	function unicons_customize_register_pro( $wp_customize ) {
		// Register custom sections
		$wp_customize->register_section_type( 'unicons_Section_Link' );

		/**
		 * Custom link/button section.
		 */
		if( ! class_exists( 'unicons_Section_Link' ) ) {
			class unicons_Section_Link extends WP_Customize_Section {

				/**
				 * The type of customize section being rendered.
				 */
				public $type = 'link-button';

				/**
				 * Custom button text to output.
				 */
				public $link_text = '';

				/**
				 * Custom pro button URL.
				 */
				public $link_url = '';

				/**
				 * Add custom parameters to pass to the JS via JSON.
				 */
				public function json() {
					$json = parent::json();

					$json['link_text'] = $this->link_text;
					$json['link_url']  = esc_url( $this->link_url );

					return $json;
				}

				/**
				 * Outputs the Underscore.js template.
				 */
				protected function render_template() { ?>

					<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

						<h3 class="accordion-section-title">
							{{ data.title }}

							<# if ( data.link_text && data.link_url ) { #>
								<a href="{{ data.link_url }}" class="button button-secondary alignright" target="_blank">{{ data.link_text }}</a>
							<# } #>
						</h3>
					</li>
				<?php }
			}
		}

		/**
		 * Button Control
		 */
		if( ! class_exists( 'unicons_Control_Button' ) ) {
			class unicons_Control_Button extends WP_Customize_Control {

				public $type 		= 'button-control';
				public $href, $css_class;

				/**
				 * Render the control.
				 */
				public function render_content() {

					// Begin the output
					if ( isset( $this->label ) && '' !== $this->label ) {
						echo '<a href="' . esc_url( $this->href ) . '" class="button button-primary ' . esc_attr( $this->css_class ) . '">' . sanitize_text_field( $this->label ) . '</a><div class="bx-btn-notice"></div>';
					}
					if ( isset( $this->description ) && '' !== $this->description ) {
						echo '<div class="description">' . wp_kses_post( $this->description ) . '</div>';
					}

				}
			}
		}


 /// Documentation
 $wp_customize->add_section( new unicons_Section_Link( $wp_customize, 'link-button', array(
 	'title'    	=> esc_html__( 'Unicons Pro', 'unicons' ),
 	'link_text' => esc_html__( 'Upgrade To Pro', 'unicons' ),
 	'link_url'  => esc_url('https://themezwp.com/unicons-pro/', 'unicons'  ) ,
 	'priority'	=> 1
 ) ) );
}


}
add_action( 'customize_register', 'unicons_customize_register_pro', 11 );

/*  Button controller
/* ------------------------------------ */
if ( ! function_exists( 'unicons_controller_button' ) ) {
	function unicons_controller_button( $setting_id, $section_id, $label = '', $description = '', $href = '', $css_class = '' ) {
		global $wp_customize;
		$wp_customize->add_setting( $setting_id, array(
	    	'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field',
	    	'capability'		=> 'edit_theme_options',
		) );
		$wp_customize->add_control( new unicons_controller_button( $wp_customize, $setting_id, array(
			'label'    			=> $label,
			'description' 		=> $description,
			'settings' 			=> $setting_id,
			'section'  			=> $section_id,
			'type'     			=> 'button-control',
			'href'				=> $href,
			'css_class'			=> $css_class,
		) ) );
	}
}

/**
 * Sets up the WordPress core custom header .
 *

 *
 * @see advance_header_style()
 */
function unicons_custom_header() {

	/**
	 * Filter the arguments used when adding 'custom-header' support in advance.
	 *
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'unicons_custom_header_args', array(
		'flex-width'    => true,
		'width'                  => 1800,
		'height'                 => 250,
		'wp-head-callback'       => 'unicons_header_style',

	) ) );

}
add_action( 'after_setup_theme', 'unicons_custom_header' );


if ( ! function_exists( 'unicons_header_style' ) ) :
/**
 * Styles the header text displayed on the site.
 *
 * Create uniconsr own unicons_header_style() function to override in a child theme.
 *
 *
 */
function unicons_header_style() {
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
	<style type="text/css" id="unicons-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		#site-title .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php
}
endif; // unicons_header_style



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function unicons_customize_preview_js() {
	wp_enqueue_script( 'unicons_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}
add_action( 'customize_preview_init', 'unicons_customize_preview_js' );


require get_template_directory() . '/inc/customizer/config.php';
require get_template_directory() . '/inc/customizer/panels.php';
require get_template_directory() . '/inc/customizer/sections.php';
require get_template_directory() . '/inc/customizer/fields.php';
