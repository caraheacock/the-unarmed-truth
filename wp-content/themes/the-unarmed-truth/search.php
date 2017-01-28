<?php
get_header();

get_template_part_pass_vars(
    'theme/partials/blog-layout',
    array(
        'title'             => sprintf(__('Search: %s', 'unarmed-truth'), get_search_query()),
        'subtitle'          => pluralize(
                                    $wp_query->found_posts,
                                    _x('result', 'noun', 'unarmed-truth'),
                                    _x('results', 'plural noun', 'unarmed-truth')
                                ),
        'no_results_msg'    => sprintf(
                                    _x('Sorry, no posts found for %s.', 'search query', 'unarmed-truth'),
                                    '&ldquo;' . get_search_query() . '&rdquo;'
                                )
    )
);

get_footer();
?>
