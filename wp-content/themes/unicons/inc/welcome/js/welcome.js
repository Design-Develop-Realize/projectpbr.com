jQuery(document).ready(function() {

  var counter = jQuery('#counter-count').data('counter');
  if ( counter != '0')  {  
    jQuery('li.unicons-w-red-tab a').append('<span class="unicons-actions-count">' + counter + '</span>');
  } else {
    jQuery('.unicons-tab').removeClass( 'unicons-w-red-tab' );
  }
	/* Tabs in welcome page */
	function unicons_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".unicons-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var unicons_actions_anchor = location.hash;

	if( (typeof unicons_actions_anchor !== 'undefined') && (unicons_actions_anchor != '') ) {
		unicons_welcome_page_tabs('a[href="'+ unicons_actions_anchor +'"]');
	}

    jQuery(".unicons-nav-tabs a").click(function(event) {
        event.preventDefault();
		unicons_welcome_page_tabs(this);
    });

 /* Tab Content height matches admin menu height for scrolling purpouses */
		$tab = jQuery('.unicons-tab-content > div');
		$admin_menu_height = jQuery('#adminmenu').height();
    if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
  {
		$newheight = $admin_menu_height - 180;
		$tab.css('min-height',$newheight);
  }
});
