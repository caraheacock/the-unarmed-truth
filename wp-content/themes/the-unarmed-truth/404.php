<?php get_header(); ?>
<section>
    <div class="row">
        <div class="col xs-12">
            <div class="col-inner">
                <h1><?php _e('404', 'unarmed-truth'); ?></h1>
                <h2><?php _e('Page not found!', 'unarmed-truth'); ?></h2>
                <p><?php _e('We are sorry. We couldn\'t find the page you were looking for.', 'unarmed-truth'); ?></p>
                <a class="button" href="<?php echo get_site_url(); ?>"><?php _e('Go Back Home', 'unarmed-truth'); ?></a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
