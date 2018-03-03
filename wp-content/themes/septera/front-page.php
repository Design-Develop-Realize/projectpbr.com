<?php
/**
 * The template for displaying the landing page/blog posts
 * The functions used here can be found in includes/landing-page.php
 *
 * @package Septera
 */

$septera_landingpage = cryout_get_option ('septera_landingpage');

if ( is_page() && ! $septera_landingpage ) {
	include( get_page_template() );
	return true;
}

if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else {

	get_header(); ?>

	<div id="container" class="septera-landing-page one-column">
		<main id="main" role="main" class="main">
		<?php

		if ( $septera_landingpage ) {
			septera_lpslider();
			septera_lpblocks();
			septera_lptext('one');
			septera_lpboxes(1);
			septera_lptext('two');
			septera_lpboxes(2);
			septera_lptext('three');
			septera_lpindex();
			septera_lptext('four');
		} else {
			septera_lpindex();
		}

		?>
		</main><!-- #main -->
		<?php if ( ! $septera_landingpage ) { septera_get_sidebar(); } ?>
	</div><!-- #container -->

	<?php get_footer();

} //else !posts
