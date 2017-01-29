<?php

/*
 * The Unarmed Truth Functionality
 * Assets
 */

/* Add admin scripts */
function utruf_admin_scripts() {
    wp_enqueue_media();
    
    // Select2 style
    $utruf_select2_style_location = '/assets/css/lib/select2.min.css';
    wp_enqueue_style(
        'unarmed-truth-functionality-select2-style',
        UTRUF_PLUGIN_URL . $utruf_select2_style_location,
        array(),
        filemtime(UTRUF_PLUGIN_DIR . $utruf_select2_style_location)
    );
    
    // Main style
    $utruf_admin_style_location = '/assets/css/admin-style.css';
    wp_enqueue_style(
        'unarmed-truth-functionality-admin-style',
        UTRUF_PLUGIN_URL . $utruf_admin_style_location,
        array(),
        filemtime(UTRUF_PLUGIN_DIR . $utruf_admin_style_location)
    );
    
    // Select2 script
    $utruf_select2_script_location = 'assets/js/lib/select2.min.js';
    wp_enqueue_script(
        'unarmed-truth-functionality-select2-script',
        UTRUF_PLUGIN_URL . $utruf_select2_script_location,
        array(),
        filemtime(UTRUF_PLUGIN_DIR . $utruf_select2_script_location)
    );
    
    // Main script
    $utruf_admin_script_location = 'assets/js/admin-script.js';
    wp_enqueue_script(
        'unarmed-truth-functionality-admin-script',
        UTRUF_PLUGIN_URL . $utruf_admin_script_location,
        array('jquery', 'jquery-ui-sortable'),
        filemtime(UTRUF_PLUGIN_DIR . $utruf_admin_script_location)
    );
}
add_action('admin_print_scripts', 'utruf_admin_scripts');

?>