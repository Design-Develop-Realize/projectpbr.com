<?php
/**
 * Add sections
 */

/* adding launiconst_front_page section*/


Kirki::add_section( 'launiconst_front_page', array(
    'title'          =>esc_attr__( 'General setting', 'unicons' ),
    'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 1,


) );


Kirki::add_section( 'unicons_headtitle_settings', array(
    'title'          =>esc_attr__( 'Header and Title settings', 'unicons' ),
     'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 1,


) );
Kirki::add_section( 'unicons_subheadtitle_settings', array(
    'title'          =>esc_attr__( 'Page Sub Header settings', 'unicons' ),
     'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 1,


) );

Kirki::add_section( 'unicons_color_settings', array(
    'title'          =>esc_attr__( 'Color and Section management', 'unicons' ),
     'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 1,


) );





Kirki::add_section( 'slider_setup', array(
    'title'          => esc_attr__( 'Slider section', 'unicons' ),
    'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 2,


) );


Kirki::add_section( 'unicons_latestsetup', array(
    'title'          =>esc_attr__( 'Latest Post section  ' , 'unicons'),
    'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 5,


) );





Kirki::add_section( 'unicons_typography_setting', array(
    'title'          =>esc_attr__( 'Typography  ' , 'unicons'),
    'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 8,


) );


Kirki::add_section( 'unicons_social', array(
    'title'          => esc_attr__( 'social', 'unicons' ),
    'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 9,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'unicons_blogpost', array(
    'title'          => esc_attr__( 'Blog and Post Setup', 'unicons' ),
    'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );


Kirki::add_section( 'unicons_footer', array(
    'title'          => esc_attr__( 'Footer section', 'unicons' ),
    'panel'          => 'theme_options', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
