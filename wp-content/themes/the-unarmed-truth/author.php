<?php
get_header();
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

get_template_part_pass_vars(
    'theme/partials/blog-layout',
    array(
        'title'             => sprintf(__('Author: %s', 'unarmed-truth'), $curauth->display_name),
        'subtitle'          => sprintf(
                                    _x('%1$s written by %2$s', '# posts written by Author Name', 'unarmed-truth'),
                                    pluralize(
                                        $wp_query->found_posts,
                                        _x('post', 'noun', 'unarmed-truth'),
                                        _x('posts', 'plural noun', 'unarmed-truth')
                                    ),
                                    $curauth->display_name
                                ),
        'no_results_msg'    => sprintf(_x('Sorry, no posts by %s.', 'author name', 'unarmed-truth'), $curauth->display_name)
    )
);

get_footer();
?>
