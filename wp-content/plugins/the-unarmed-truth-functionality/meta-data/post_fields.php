<?php

/*
 * The Unarmed Truth Functionality
 * Post Meta Data
 */

/* Add meta box */
function utruf_post_meta_box() {
    add_meta_box('utruf_post_options', 'Article Details', 'utruf_post_meta_options', 'post', 'normal', 'low');
}
add_action('admin_init', 'utruf_post_meta_box');

/* Meta box callback; the contents of the metabox */
function utruf_post_meta_options() {
    global $post;
    $article_meta = get_post_meta($post->ID, '_utruf_article_meta', true); ?>
    <div>
        <label><?php _e('Author', 'digital826-func'); ?></label><br>
        <input name="_utruf_article_meta[author]" placeholder="Jane Doe" type="text" value="<?php if (!empty($article_meta['author'])) echo esc_html($article_meta['author']); ?>" />
    </div>
    <div>
        <label><?php _e('Link to Original Article', 'digital826-func'); ?></label><br>
        <input name="_utruf_article_meta[link]" placeholder="http://..." type="text" value="<?php if (!empty($article_meta['link'])) echo esc_html($article_meta['link']); ?>" />
    </div>
    <?php
}

/* Save postmeta */
function utruf_post_save_options() {
    global $post;
    if ($post && $post->post_type == 'post' && isset($_POST['_utruf_article_meta'])) {
        update_post_meta($post->ID, '_utruf_article_meta', $_POST['_utruf_article_meta']);
    }
}
add_action('save_post', 'utruf_post_save_options');

?>