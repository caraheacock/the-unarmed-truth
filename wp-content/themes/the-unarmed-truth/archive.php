<?php
get_header();
$month = single_month_title(' ', false);

get_template_part_pass_vars(
    'theme/partials/blog-layout',
    array(
        'title'             => sprintf(__('Date: %s', 'unarmed-truth'), $month),
        'subtitle'          => sprintf(
                                    _x('%1$s in %2$s', '# posts in Month', 'unarmed-truth'),
                                    pluralize(
                                        $wp_query->found_posts,
                                        _x('post', 'noun', 'unarmed-truth'),
                                        _x('posts', 'plural noun', 'unarmed-truth')
                                    ),
                                    $month
                                ),
        'no_results_msg'    => sprintf(_x('Sorry, no posts in %s.', 'month', 'unarmed-truth'), $month)
    )
);

get_footer();
?>
