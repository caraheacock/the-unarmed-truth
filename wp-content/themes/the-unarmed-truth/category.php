<?php
get_header();
$cat_title = single_cat_title('', false);
$cat_slug = get_queried_object()->slug;

get_template_part_pass_vars(
    'theme/partials/blog-layout',
    array(
        'title'             => '<i class="icon icon-' . $cat_slug . ' icon--large" aria-hidden="true"></i> ' . $cat_title,
        'subtitle'          => sprintf(
                                    _x('%1$s categorized as %2$s', '# categorized as Category', 'unarmed-truth'),
                                    pluralize(
                                        $wp_query->found_posts,
                                        _x('post', 'noun', 'unarmed-truth'),
                                        _x('posts', 'plural noun', 'unarmed-truth')
                                    ),
                                    $cat_title
                                ),
        'no_results_msg'    => sprintf(_x('Sorry, no posts categorized as %s.', 'category title', 'unarmed-truth'), $cat_title)
    )
);

get_footer();
?>
