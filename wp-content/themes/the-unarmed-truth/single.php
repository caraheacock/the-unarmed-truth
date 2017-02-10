<?php
get_header();
the_post();

$article_meta = get_post_meta(get_the_ID(), '_utruf_article_meta', true);
$news_source = wp_get_post_terms(get_the_ID(), 'utruf_news_source');
?>
<section>
    <div class="row">
        <div class="col xs-12">
            <div class="col-inner pageTitle">
                <?php the_title('<h2>', '</h2>'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mainContent col xs-12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-8 mainContent--hasSidebar'; ?>">
            <div class="col-inner singlePost">
                <div class="singlePost__meta">
                    <h4>
                        <?php the_time(get_option('date_format')); ?>
                        <?php if (!empty($news_source)) echo ' | ' . $news_source[0]->name; ?>
                    </h4>
                    
                    <?php if (!empty($article_meta['author'])) : ?>
                        <h5><?php printf(_x('Written by %s', 'author name', 'unarmed-truth'), $article_meta['author']); ?></h5>
                    <?php endif; ?>
                    
                    <?php
                    $categories = get_the_category();
                    if (get_the_category()) : ?>
                        <div class="singlePost__categories">
                            <?php the_category(' '); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (has_tag()) : ?>
                        <h6><?php the_tags(); ?></h6>
                    <?php endif; ?>
                </div>
                
                <div class="singlePost__content<?php if (comments_open()) echo ' singlePost__commentsOpen'; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="wp-caption">
                            <?php
                            the_post_thumbnail('large');
                            $image_id = get_post_thumbnail_id(get_the_ID());
                            $image = get_post($image_id);
                            echo '<p class="wp-caption-text">' . $image->post_excerpt . '</p>';
                            ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php the_content(); ?>
                    
                    <?php if (!empty($article_meta['link'])) : ?>
                        <a class="button" href="<?php echo esc_url($article_meta['link']); ?>" target="_blank"><?php _e('View the Original Article', 'unarmed-truth'); ?></a>
                    <?php endif; ?>
                    
                    <?php
                    $args = array(
                        'before'            => '<p class="single-post-page-links">' . __('Pages:', 'unarmed-truth'),
                        'after'             => '</p>',
                        'link_before'       => '<span>',
                        'link_after'        => '</span>'
                    );
                    wp_link_pages($args);
                    ?>
                </div>
                
                <?php if (comments_open()) comments_template(); ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
