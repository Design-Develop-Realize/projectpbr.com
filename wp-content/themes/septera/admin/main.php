<?php
/**
 * Admin theme page
 *
 * @package Septera
 */

// Framework
require_once( get_template_directory() . "/cryout/framework.php" );

// Theme particulars
require_once( get_template_directory() . "/admin/defaults.php" );
require_once( get_template_directory() . "/admin/options.php" );
require_once( get_template_directory() . "/admin/demo.php" );
require_once( get_template_directory() . "/includes/tgmpa.php" );

// Custom CSS Styles for customizer
require_once( get_template_directory() . "/includes/custom-styles.php" );

// Get the theme options and make sure defaults are used if no values are set
function septera_get_theme_options() {
	$optionsSeptera = wp_parse_args(
		get_option( 'septera_settings', array() ),
		septera_get_option_defaults()
	);
	return apply_filters( 'septera_theme_options_array', $optionsSeptera );
} // septera_get_theme_options()

function septera_get_theme_structure() {
	global $septera_big;
	return apply_filters( 'septera_theme_structure_array', $septera_big );
} // septera_get_theme_structure()

// load up theme options
$cryout_theme_settings = apply_filters( 'septera_theme_structure_array', $septera_big );
$cryout_theme_options = septera_get_theme_options();
$cryout_theme_defaults = septera_get_option_defaults();

// Hooks/Filters
add_action( 'admin_menu', 'septera_add_page_fn' );

// Add admin scripts
function septera_admin_scripts( $hook ) {
	global $septera_page;
	if( $septera_page != $hook ) {
        return;
    }

	wp_enqueue_style( 'wp-jquery-ui-dialog' );
	wp_enqueue_style( 'septera-admin-style', get_template_directory_uri() . '/admin/css/admin.css', NULL, _CRYOUT_THEME_VERSION );
	wp_enqueue_script( 'septera-admin-js',get_template_directory_uri() . '/admin/js/admin.js', array('jquery-ui-dialog'), _CRYOUT_THEME_VERSION );
	$js_admin_options = array(
		'reset_confirmation' => esc_html( __( 'Reset Septera Settings to Defaults?', 'septera' ) ),
	);

	wp_localize_script( 'septera-admin-js', 'septera_admin_settings', $js_admin_options );
}

// Create admin subpages
function septera_add_page_fn() {
	global $septera_page;
	$septera_page = add_theme_page( __( 'Septera Theme', 'septera' ), __( 'Septera Theme', 'septera' ), 'edit_theme_options', 'about-septera-theme', 'septera_page_fn' );
	add_action( 'admin_enqueue_scripts', 'septera_admin_scripts' );
} // septera_add_page_fn()

// Display the admin options page

function septera_page_fn() {

	$septeras = cryout_get_option();

	if (!current_user_can('edit_theme_options'))  {
		wp_die( __( 'Sorry, but you do not have sufficient permissions to access this page.', 'septera') );
	}

?>

<div class="wrap" id="main-page"><!-- Admin wrap page -->
	<div id="lefty">
	<?php if( isset($_GET['settings-loaded']) ) { ?>
		<div class="updated fade">
			<p><?php _e('Septera settings loaded successfully.', 'septera') ?></p>
		</div> <?php
	} ?>
	<?php
	// Reset settings to defaults if the reset button has been pressed
	if ( isset( $_POST['septera_reset_defaults'] ) ) {
		delete_option( 'septera_settings' ); ?>
		<div class="updated fade">
			<p><?php _e('Septera settings have been reset successfully.', 'septera') ?></p>
		</div> <?php
	} ?>

		<div id="admin_header">
			<img src="<?php echo get_template_directory_uri() . '/admin/images/logo-about-top.png' ?>" />
			<span class="version">
				<?php _e( 'Septera Theme', 'septera' ) ?> v<?php echo _CRYOUT_THEME_VERSION; ?> by
				<a href="https://www.cryoutcreations.eu" target="_blank">Cryout Creations</a><br>
				<?php do_action( 'cryout_admin_version' ); ?>
			</span>
		</div>

		<div id="admin_links">
			<a href="https://www.cryoutcreations.eu/wordpress-themes/septera" target="_blank"><?php _e( 'Read the Docs', 'septera' ) ?></a>
			<a href="https://www.cryoutcreations.eu/forums/f/wordpress/septera" target="_blank"><?php _e( 'Browse the Forum', 'septera' ) ?></a>
			<a href="https://www.cryoutcreations.eu/priority-support" target="_blank"><?php _e( 'Priority Support', 'septera' ) ?></a>
		</div>


		<br>
		<div id="description">
			<?php
				$theme = wp_get_theme();
			 	echo esc_html( $theme->get( 'Description' ) );
			?>
		</div>
		<br><br>

		<a class="button" href="customize.php" id="customizer"> <?php printf( __( 'Customize %s', 'septera' ), ucwords(_CRYOUT_THEME_NAME) ); ?> </a>

		<div id="septera-export" >
			<div>

			<h3 class="hndle"><?php _e( 'Manage Theme Settings', 'septera' ); ?></h3>

				<form action="" method="post" class="third">
					<input type="hidden" name="septera_reset_defaults" value="true" />
					<input type="submit" class="button" id="septera_reset_defaults" value="<?php _e( 'Reset to Defaults', 'septera' ); ?>" />
				</form>
			</div>
		</div><!-- export -->

	</div><!--lefty -->


	<div id="righty" >
		<div id="septera-donate" class="postbox donate">

			<div class="inside">
				<p>Ever wondered why Septera feels too good to be true? Why after using it, after changing even just a single setting, there's this sweet taste in your mouth that just lingers on?</p>
				<p>	Well, you caught us: Septera was built with nothing but candy stolen directly from the small hands of confused babies. So yes, the great amount of pleasure this theme has given you is built on innocent baby
					 tears and heart-ripping suffering.</p>
				<p>Want us to not be able to sleep at night, thinking about what we've done?</p>

				<div style="display:block;float:none;margin:0 auto;text-align:center;">
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
						<input type="hidden" name="cmd" value="_donations">
						<input type="hidden" name="business" value="KYL26KAN4PJC8">
						<input type="hidden" name="item_name" value="Cryout Creations - Septera Theme">
						<input type="hidden" name="currency_code" value="EUR">
						<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHosted">
						<input type="image" src="<?php echo get_template_directory_uri() . '/admin/images/coffee.png' ?>" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
				</div>

			</div><!-- inside -->

		</div><!-- donate -->

		<div id="septera-news" class="postbox news" >
			<h3 class="hndle"><?php _e( 'Theme Updates', 'septera' ); ?></h3>
			<div class="panel-wrap inside">
			</div><!-- inside -->
		</div><!-- news -->

	</div><!--  righty -->
</div><!--  wrap -->

<?php
} // septera_page_fn()
