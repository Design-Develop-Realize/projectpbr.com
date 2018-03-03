<?php

/**
 * Add panels
 */


/* adding launiconst panel */


Kirki::add_panel( 'theme_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Theme Options', 'unicons' ),
    'description' => esc_attr__( 'This panel will provide all the options of the Theme.', 'unicons' ),
) );
?>
