<?php $news_source = wp_get_post_terms(get_the_ID(), 'utruf_news_source'); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('loop'); ?>>
    <h2><a href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h2>

    <?php if (get_post_type($post) == 'post') : ?>
    <h5><?php the_time(get_option('date_format')); if (!empty($news_source)) echo ' | ' . $news_source[0]->name; ?></h5>
    <?php endif; ?>

    <?php
    if (has_post_thumbnail()) {
        $args = array(
            'class' => 'alignright'
        );
        the_post_thumbnail('small', $args);
    }
    
    the_excerpt();
    ?>
    <a class="button" href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php _e('Read More', 'unarmed-truth'); ?></a>
</div>
