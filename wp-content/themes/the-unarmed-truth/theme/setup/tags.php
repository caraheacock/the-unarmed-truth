<?php

/*
 * The Unarmed Truth
 * Additional tags functionality
 */

/* 
 * Query a tag's same tags on the tag page
 */
function utru_add_same_tags($query) {
    if ($query->is_main_query() && $query->is_tag()) {
        $tag_slug = $query->query['tag'];
        $tag_obj = get_term_by('slug', $query->query['tag'], 'post_tag');
        $same_tags = get_term_meta($tag_obj->term_id, 'utruf_same_tag', true);

        if (empty($same_tags)) return;
        
        $same_tags_slugs = array_map(function($t) {
            $t_obj = get_term($t);
            return $t_obj->slug;
        }, $same_tags);

        $tag_and_same_tags = array_merge(array($tag_slug), $same_tags_slugs);
        
        // There are a lot of things to set just to override a tag query...
        
        $query->query['tag'] = implode(',', $tag_and_same_tags);
        $query->set('tag', implode(',', $tag_and_same_tags));
        $query->set('tag_slug__in', $tag_and_same_tags);

        $tax_query = array(
            array(
                'taxonomy'  => 'post_tag',
                'field'     => 'slug',
                'terms'     => $tag_and_same_tags
            )
        );
        $query->set('tax_query', $tax_query);
    }
}
add_action('pre_get_posts', 'utru_add_same_tags');

?>
