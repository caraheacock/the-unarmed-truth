<?php
get_header();
$tag_title = single_tag_title('', false);

get_template_part_pass_vars(
    'theme/partials/blog-layout',
    array(
        'title'             => sprintf(__('Tag: %s', 'unarmed-truth'), $tag_title),
        'subtitle'          => sprintf(
                                    _x('%1$s tagged as %2$s', '# posts tagged as Tag Title', 'unarmed-truth'),
                                    pluralize(
                                        $wp_query->found_posts,
                                        _x('post', 'noun', 'unarmed-truth'),
                                        _x('posts', 'plural noun', 'unarmed-truth')
                                    ),
                                    $tag_title
                                ),
        'no_results_msg'    => sprintf(_x('Sorry, no posts tagged as %s.', 'tag title', 'unarmed-truth'), $tag_title)
    )
);

get_footer();
?>