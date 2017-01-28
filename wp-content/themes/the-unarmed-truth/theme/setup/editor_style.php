<?php

/*
 * The Unarmed Truth
 * Custom Editor Style
 */

/*
 * Add editor stylesheets so the content looks more like it will on the frontend
 * Commas must be HTML encoded as %2C
 */
function utru_add_editor_styles() {
    add_editor_style(array(
        '//fonts.googleapis.com/css?family=Open+Sans:300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i',
        'assets/css/editor-style.css'
    ));
}
add_action('admin_init', 'utru_add_editor_styles');

?>
