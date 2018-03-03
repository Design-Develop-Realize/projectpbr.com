<?php

 $unicons_clientsbg_image = get_theme_mod ('unicons_clientsbg_image');
?>


		<div id="unicons-clients" <?php if( !empty($unicons_clientsbg_image) ):?> style="background: url(<?php echo esc_url($unicons_clientsbg_image) ;?>) no-repeat center center <?php if(get_theme_mod('unicons_clientsfixed_image') == true){ ?>fixed <?php }?>;background-size: cover;" <?php endif ;?>>
  <?php if( !empty($unicons_clientsbg_image) ):?> <div class="overlay"></div><?php endif; ?>
					<?php
					if ( is_active_sidebar( 'sidebar-clients' ) ) {

						dynamic_sidebar( 'sidebar-clients' );


											}?>

		</div>
