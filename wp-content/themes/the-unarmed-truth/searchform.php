<form role="search" method="get" class="searchForm row" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text" for="s"><?php _x('Search for:', 'label', 'unarmed-truth'); ?></label>
    <div class="col xs-fill">
        <input class="searchForm__input" placeholder="<?php _e('Search', 'unarmed-truth'); ?>&hellip;" type="text" value="<?php echo get_search_query(); ?>" name="s" />
    </div>
    <div class="col">
        <button class="searchForm__submit" type="submit">
            <span class="screen-reader-text">
                <?php echo esc_attr_x('Search', 'submit button', 'unarmed-truth'); ?>
            </span>
            <i class="icon icon-search icon--large" aria-hidden="true"></i>
        </button>
    </div>
</form>
