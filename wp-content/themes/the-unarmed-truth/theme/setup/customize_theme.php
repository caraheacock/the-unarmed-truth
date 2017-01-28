<?php

/*
 * The Unarmed Truth
 * Theme Customizations
 */

/* Register theme customizations */
function utru_customize_register($wp_customize) {
    /* Footer */
    $wp_customize->add_section('puzzle_footer', array(
        'title'      => 'Footer',
        'priority'   => 210,
    ));
    
    $wp_customize->add_setting('footer_content', array(
        'default'           => '',
        'sanitize_callback' => 'esc_html',
        'transport'         => 'refresh'
    ));
    
    $wp_customize->add_control('footer_content', array(
        'label'             => __('Content', 'unarmed-truth'),
        'section'           => 'puzzle_footer',
        'settings'          => 'footer_content',
        'type'              => 'textarea'
    ));
}
add_action('customize_register', 'utru_customize_register');

?>
