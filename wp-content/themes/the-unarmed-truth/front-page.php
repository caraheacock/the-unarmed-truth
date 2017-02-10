<?php
get_header();
the_post();
?>
<section>
    <div class="row">
        <div class="col xs-12">
            <div class="col-inner">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</section>
<?php
$categories = get_categories(array(
    'orderby' => 'name',
    'order'   => 'ASC'
));

$already_displayed_posts = array();

foreach($categories as $cat) :
    $args = array(
        'cat'               => $cat->term_id,
        'post__not_in'      => $already_displayed_posts,
        'posts_per_page'    => 3
    );
    $cat_posts = new WP_Query($args);
    
    if ($cat_posts->have_posts()) : ?>
        <section>
            <div class="row">
                <div class="col xs-12">
                    <div class="col-inner">
                        <h2 class="sectionTitle">
                            <i class="icon icon-<?php echo $cat->slug; ?> icon--large" aria-hidden="true"></i>
                            <?php echo $cat->name; ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                while ($cat_posts->have_posts()) :
                    $cat_posts->the_post();
                    $already_displayed_posts[] = get_the_ID();
                    ?>
                    <div class="col xs-12 md-4">
                        <div class="col-inner">
                            <?php
                            get_template_part_pass_vars('theme/partials/loop', array(
                                'orientation'   => 'vertical',
                                'cat_slug'      => $cat->slug
                            ));
                            ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
        <?php
        wp_reset_postdata();
    endif;
endforeach;

get_footer();
?>
