<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package unicons
 */

?>


		<?php if( get_theme_mod( 'unicons_blogpost_style' )){ ?>
	 		<?php $unicons_blogpost_style = get_theme_mod( 'unicons_blogpost_style', array( 'content1', 'content2' ,'content3','content4') );
			get_template_part('layout/part',''.$unicons_blogpost_style .''); ?>
		<?php }else{ ?>
			<?php get_template_part('layout/part','content1'); ?>
		<?php } ?>
