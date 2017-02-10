<section>
    <?php if (isset($title)) : ?>
        <div class="row">
            <div class="col xs-12">
                <div class="col-inner pageTitle">
                    <?php echo '<h1 class="sectionTitle">' . $title . '</h1>'; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="mainContent col xs-12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-8 mainContent--hasSidebar'; ?>">
            <div class="col-inner">
                <?php
                if (have_posts()) :
                    if (isset($subtitle)) echo '<h4>' . $subtitle . '</h4>';
                    
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/partials/loop');
                    }
                    
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <p><?php
                        if (isset($no_results_msg)) {
                            echo $no_results_msg;
                        } else {
                            _e('Sorry, no posts found.', 'unarmed-truth');
                        }?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
