<?php

/*
 * The Unarmed Truth
 * Sidebar
 */

/* Initialize sidebar */
function utru_sidebar_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'unarmed-truth'),
        'id'            => 'main-sidebar',
        'before_widget' => '<div class="mainSidebar__widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'utru_sidebar_init');

?>
