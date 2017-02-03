<?php

/*
 * The Unarmed Truth
 * Assets
 */

/* Add styles and scripts */
function utru_scripts() {
    /* Google fonts */
    wp_enqueue_style(
        'unarmed-truth-google-fonts',
        '//fonts.googleapis.com/css?family=Cantata+One|Lato:400,400i,700'
    );
    
    /* Main style */
    $utru_style_location = '/assets/css/main.css';
    wp_enqueue_style(
        'unarmed-truth-style',
        get_template_directory_uri() . $utru_style_location,
        array(),
        filemtime(get_stylesheet_directory() . $utru_style_location)
    );
    
    /* DL Menu Modernizr */
    $dl_menu_modernizr_location = '/assets/js/lib/modernizr.dlmenu.js';
    wp_enqueue_script(
        'dl-menu-modernizr',
        get_template_directory_uri() . $dl_menu_modernizr_location,
        array('jquery'),
        filemtime(get_stylesheet_directory() . $dl_menu_modernizr_location)
    );
    
    /* DL Menu */
    $dl_menu_script_location = '/assets/js/lib/jquery.dlmenu.js';
    wp_enqueue_script(
        'dl-menu-script',
        get_template_directory_uri() . $dl_menu_script_location,
        array('jquery'),
        filemtime(get_stylesheet_directory() . $dl_menu_script_location)
    );
    
    /* Main script */
    $utru_script_location = '/assets/js/main.js';
    wp_enqueue_script(
        'unarmed-truth-script',
        get_template_directory_uri() . $utru_script_location,
        array('jquery'),
        filemtime(get_stylesheet_directory() . $utru_script_location)
    );
}
add_action('wp_enqueue_scripts', 'utru_scripts');

?>
