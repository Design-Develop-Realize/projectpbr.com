<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Imonthemes
 * @subpackage unicons
 *
 */
get_header(); ?>
	<div class="row">
		<div class="large-12">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'unicons' ); ?></h1>
				</header><!-- .page-header -->
					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'unicons' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</div>
<?php get_footer(); ?>
