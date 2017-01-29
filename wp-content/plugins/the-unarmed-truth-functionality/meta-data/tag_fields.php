<?php

/*
 * The Unarmed Truth Functionality
 * Tag Meta Data
 */

/* Add meta data to new tag form */
function utruf_tag_new_meta_options($taxonomy) {
    $all_tags = get_tags(array('hide_empty' => false));
    ?>
    <div class="form-field">
        <label for="utruf_same_tag"><?php _e('This tag is the same as these tags', 'unarmed-truth-func'); ?></label>
        <select class="utruf-select2" name="utruf_same_tag[]" multiple="multiple">
            <?php foreach ($all_tags as $tag) : ?>
                <option value="<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-field">
        <label for="utruf_related_tag"><?php _e('This tag is related to these tags', 'unarmed-truth-func'); ?></label>
        <select class="utruf-select2" name="utruf_related_tag[]" multiple="multiple">
            <?php foreach ($all_tags as $tag) : ?>
                <option value="<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php
}
add_action('post_tag_add_form_fields', 'utruf_tag_new_meta_options');

/* Add meta data to edit tag form */
function utruf_tag_edit_meta_options($term, $taxonomy) {
    $same_tags = get_term_meta($term->term_id, 'utruf_same_tag', true);
    if (empty($same_tags)) $same_tags = array();
    
    $related_tags = get_term_meta($term->term_id, 'utruf_related_tag', true);
    if (empty($related_tags)) $related_tags = array();
    
    $all_tags = get_tags(array(
        'exclude'       => $term->term_id,
        'hide_empty'    => false
    ));
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="utruf_same_tag">
                <?php _e('This tag is the same as these tags', 'unarmed-truth-func'); ?>
            </label>
        </th>
        <td>
            <input type="hidden" name="utruf_same_tag" value="0" />
            <select class="utruf-select2" name="utruf_same_tag[]" multiple="multiple">
                <?php foreach ($all_tags as $tag) : ?>
                    <option value="<?php echo $tag->term_id; ?>"<?php if (in_array($tag->term_id, $same_tags)) echo ' selected'; ?>><?php echo $tag->name; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="utruf_same_tag">
                <?php _e('This tag is related to these tags', 'unarmed-truth-func'); ?>
            </label>
        </th>
        <td>
            <input type="hidden" name="utruf_related_tag" value="0" />
            <select class="utruf-select2" name="utruf_related_tag[]" multiple="multiple">
                <?php foreach ($all_tags as $tag) : ?>
                    <option value="<?php echo $tag->term_id; ?>"<?php if (in_array($tag->term_id, $related_tags)) echo ' selected'; ?>><?php echo $tag->name; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <?php
}
add_action('post_tag_edit_form_fields', 'utruf_tag_edit_meta_options', 10, 2);

/* Save meta data */
function utruf_tag_save_options($term_id, $tt_id) {
    if (isset($_POST['utruf_same_tag'])) {
        $old_same_tags = get_term_meta($term_id, 'utruf_same_tag', true);
        if (empty($old_same_tags)) $old_same_tags = array();
        
        $same_tags = $_POST['utruf_same_tag'];
        if (empty($same_tags)) $same_tags = array();
        
        $removed_tags = array_diff($old_same_tags, $same_tags);
        
        update_term_meta($term_id, 'utruf_same_tag', $same_tags, $old_same_tags);
        
        // For the other equivalent tags, update their same tags
        foreach ($same_tags as $tag_id) {
            $old_same_tags2 = get_term_meta($tag_id, 'utruf_same_tag', true);
            if (empty($old_same_tags2)) $old_same_tags2 = array();
            $same_tags2 = array_diff($same_tags, array($tag_id));
            $same_tags2[] = $term_id;
            
            update_term_meta($tag_id, 'utruf_same_tag', $same_tags2, $old_same_tags2);
        }
        
        // For any tags that were removed from the same tags, update their
        // same tags to no longer have any same tags
        if (!empty($removed_tags)) {
            foreach ($removed_tags as $tag_id) {
                update_term_meta($tag_id, 'utruf_same_tag', 0);
            }
        }
    }
    
    if (isset($_POST['utruf_related_tag'])) {
        $old_related_tags = get_term_meta($term_id, 'utruf_related_tag', true);
        if (empty($old_related_tags)) $old_related_tags = array();
        
        $related_tags = $_POST['utruf_related_tag'];
        if (empty($related_tags)) $related_tags = array();
        
        $removed_tags = array_diff($old_related_tags, $related_tags);
        
        update_term_meta($term_id, 'utruf_related_tag', $related_tags);
        
        // For the other related tags, update their related tags
        foreach ($related_tags as $tag_id) {
            $related_tags2 = get_term_meta($tag_id, 'utruf_related_tag', true);
            if (empty($related_tags2)) $related_tags2 = array();
            
            if (!in_array($term_id, $related_tags2)) {
                $related_tags2[] = $term_id;
                update_term_meta($tag_id, 'utruf_related_tag', $related_tags2);
            }
        }
        
        // For any tags that were removed from the related tags, update their
        // related tags to no longer contain this tag
        if (!empty($removed_tags)) {
            foreach ($removed_tags as $tag_id) {
                $old_related_tags2 = get_term_meta($tag_id, 'utruf_related_tag', true);
                if (empty($old_related_tags2)) $old_related_tags2 = array();
                
                $related_tags2 = array_diff($old_related_tags2, array($term_id));
                update_term_meta($tag_id, 'utruf_related_tag', $related_tags2);
            }
        }
    }
}
add_action('created_post_tag', 'utruf_tag_save_options', 10, 2);
add_action('edited_post_tag', 'utruf_tag_save_options', 10, 2);

?>
