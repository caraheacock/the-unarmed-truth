<?php
$news_source = wp_get_post_terms(get_the_ID(), 'utruf_news_source');
if (!isset($orientation)) $orientation = 'horizontal';
if (!isset($cat_slug) && get_post_type(get_the_ID()) == 'post') {
    $cat_slug = get_the_category()[0]->slug;
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('loop loop--' . $orientation); ?>>
    
        <div class="loop__featuredImage"<?php if (has_post_thumbnail()) echo ' style="background-image: url(' . get_the_post_thumbnail_url() . ');"'; ?>>
            <?php if (!has_post_thumbnail() && get_post_type(get_the_ID())) : ?>
                <i class="icon icon-<?php echo $cat_slug; ?> loop__featuredIcon" aria-hidden="true"></i>
            <?php endif; ?>
            <a class="fullCoverLink" href="<?php echo get_the_permalink(get_the_ID()); ?>"></a>
        </div>
    
    <div class="loop__content">
        <div class="loop__header">
            <h3><a class="loop__titleLink" href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h3>

            <?php if (get_post_type(get_the_ID()) == 'post') : ?>
            <h5><?php the_time(get_option('date_format')); if (!empty($news_source)) echo ' | ' . $news_source[0]->name; ?></h5>
            <?php endif; ?>
        </div>
        
        <?php the_excerpt(); ?>

        <a class="button" href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php _e('Read More', 'unarmed-truth'); ?></a>
    </div>
</div>
