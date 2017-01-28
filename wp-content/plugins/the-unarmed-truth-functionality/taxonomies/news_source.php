<?php

/*
 * The Unarmed Truth Functionality
 * News Source
 */

/* Register taxonomy */
function utruf_register_news_source_taxonomy() {
    $labels = array(
        'name'                          => __('News Sources', 'unarmed-truth-func'),
        'singular_name'                 => __('News Source', 'unarmed-truth-func'),
        'menu_name'                     => __('News Sources', 'unarmed-truth-func'),
        'all_items'                     => __('All News Sources', 'unarmed-truth-func'),
        'edit_item'                     => __('Edit News Source', 'unarmed-truth-func'),
        'view_item'                     => __('View News Source', 'unarmed-truth-func'),
        'update_item'                   => __('Update News Source', 'unarmed-truth-func'),
        'add_new_item'                  => __('Add New News Source', 'unarmed-truth-func'),
        'new_item_name'                 => __('New News Source Name', 'unarmed-truth-func'),
        'parent_item'                   => null,
        'parent_item_colon'             => null,
        'search_items'                  => __('Search News Sources', 'unarmed-truth-func'),
        'popular_items'                 => null,
        'separate_items_with_commas'    => null,
        'add_or_remove_items'           => null,
        'choose_from_most_used'         => null,
        'not_found'                     => __('No News Sources Found', 'unarmed-truth-func')
    );
    
    $args = array(
        'labels'                => $labels,
        'description'           => __('News sources for articles', 'unarmed-truth-func'),
        'show_ui'               => true,
        'hierarchical'          => false,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array(
            'slug'              => 'source'
        ),
        'meta_box_cb'           => 'utruf_news_source_meta_box'
    );
    
    register_taxonomy('utruf_news_source', 'post', $args);
}
add_action('init', 'utruf_register_news_source_taxonomy');

/* Display a dropdown of books */
function utruf_news_source_meta_box($post, $box) {
    $defaults = array('taxonomy' => 'category');
    if (!isset($box['args']) || !is_array($box['args'])) {
        $args = array();
    } else {
        $args = $box['args'];
    }
    
    extract(wp_parse_args($args, $defaults), EXTR_SKIP);
    
    $tax = get_taxonomy($taxonomy);
    $name = 'tax_input[' . $taxonomy . ']';
    $term_obj = wp_get_object_terms($post->ID, $taxonomy);
    
    $args = array(
        'name'              => $name . '[]',
        'show_option_none'  => __('Select a news source', 'unarmed-truth-func'),
        'option_none_value' => '',
        'hide_empty'        => false,
        'selected'          => (!empty($term_obj[0]) ? $term_obj[0]->name : 0),
        'taxonomy'          => 'utruf_news_source',
        'value_field'       => 'name'
    );
    ?>
    
    <div id="taxonomy-<?php echo $taxonomy; ?>">
        <input type="hidden" name="<?php echo $name; ?>[]" value="0" />
        <?php wp_dropdown_categories($args); ?>
    </div>
    
    <?php
}

?>