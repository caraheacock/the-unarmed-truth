<nav class="mainNav">
    <div class="row">
        <div class="col">
            <div class="mainNav__logo vectorContainer">
                <a href="<?php echo get_site_url(); ?>">
                    <?php include(TEMPLATEPATH . '/assets/images/logo.svg'); ?>
                </a>
            </div>
        </div>
        
        <?php if (has_nav_menu('primary')) : ?>
            <div class="col xs-fill">
                <?php
                $args = array(
                    'theme_location'  => 'primary',
                    'container_id'    => 'mainNav__desktopMenu',
                    'container_class' => 'mainNav__desktopMenu js-mainNav__desktopMenu'
                );
                wp_nav_menu($args);
            
                $args = array(
                    'theme_location'  => 'primary',
                    'container_id'    => 'dl-menu',
                    'container_class' => 'dl-menuwrapper mainNav__mobileMenu',
                    'items_wrap'      => '<button class="dl-trigger">Open Menu</button><ul class="dl-menu">%3$s</ul>'
                );
                wp_nav_menu($args);
                ?>
            </div>
        <?php endif; ?>
    </div>
</nav>
