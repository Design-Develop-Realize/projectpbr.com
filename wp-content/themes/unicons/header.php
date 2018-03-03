<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>

<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset');?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' );?>" />
<?php endif; ?>
	<?php wp_head();?>

</head>

<body <?php body_class();?> id="top" >

<div id="wrapper" class="head2-fixed" >


			<?php get_template_part('header/part','header2'); ?>
