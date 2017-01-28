<?php

/*
 * The Unarmed Truth
 * Menus
 */

/* Register menus */
function utru_menus() {
    register_nav_menus( array(
        'primary'   => __('Primary Menu', 'unarmed-truth')
    ));
}
add_action('after_setup_theme', 'utru_menus');

?>
