/**
 * Admin-side JS
 *
 * @package Septera
 */

jQuery(document).ready(function() {
	/* Theme settings save */
	jQuery('#septera-savesettings-button').on('click', function(e) {
		jQuery( "#septera-settings-dialog" ).dialog({
		  modal: true,
		  minWidth: 600,
		  buttons: {
			'Close': function() {
			  jQuery( this ).dialog( "close" );
			}
		  }
		});
		jQuery('#septera-themesettings-textarea').val(jQuery('#septera-export input#septera-themesettings').val());
		jQuery('#septera-settings-dialog strong').hide();
		jQuery('#septera-settings-dialog div.settings-error').remove();
		jQuery('#septera-settings-dialog strong:nth-child(1)').show();
	});

	/* Theme settings load */
	jQuery('#septera-loadsettings-button').on('click', function(e) {
		jQuery( "#septera-settings-dialog" ).dialog({
			modal: true,
			minWidth: 600,
			buttons: {
				'Load Settings': function() {
					theme_settings = encodeURIComponent(jQuery('#septera-themesettings-textarea').val());
					nonce = jQuery('#septera-settings-nonce').val();
					jQuery.post(ajaxurl, {
						action: 'cryout_loadsettings_action',
						septera_settings_nonce: nonce,
						septera_settings: theme_settings,
					}, function(response) {
						if (response=='OK') {
							jQuery('#septera-settings-dialog div.settings-error').remove();
							window.location = '?page=about-septera-theme&settings-loaded=true';
						} else {
							jQuery('#septera-settings-dialog div.settings-error').remove();
							jQuery('#septera-themesettings-textarea').after('<div class="settings-error">' + response + '</div>');
						}
					})
				}
			}
		});
		jQuery('#septera-themesettings-textarea').val('');
		jQuery('#septera-settings-dialog strong').hide();
		jQuery('#septera-settings-dialog strong:nth-child(2)').show();
	});

	/* Latest News Content */
    var data = {
        action: 'cryout_feed_action',
    };
	jQuery.post(ajaxurl, data, function(response) {
		jQuery("#septera-news .inside").html(response);
    });

	/* Confirm modal window on reset to defaults */
	jQuery('#septera_reset_defaults').click (function() {
		if (!confirm(septera_admin_settings.reset_confirmation)) { return false;}
	});

});/* document.ready */

/* FIN */
