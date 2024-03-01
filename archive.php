<?php
get_header();
?>
<div class="content">
    <div class="main-content">
        <div class="archive-title">
            <?php
            if (is_tag()) :
                printf(__('Posts tagged: %1$s', 'cuongtheme'), single_tag_title(' ', false));
            elseif (is_category()) :
                printf(__('Posts categorized: %1$s', 'cuongtheme'), single_cat_title(' ', false));
            elseif (is_day()) :
                printf(__('Daily archives: %1$s', 'cuongtheme'), get_the_time('l, F j, Y'));
            elseif (is_month()) :
                printf(__('Monthly archives: %1$s', 'cuongtheme'), get_the_time('F Y'));
            elseif (is_month()) :
                printf(__('Yearly archives: %1$s', 'cuongtheme'), get_the_time('Y'));
            endif
            ?>
        </div>
        <?php if(is_tag() || is_category()):?>
            <div class="archive-description">
                <?php echo term_description(); ?>
            </div>
        <?php endif ?>
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('content', get_post_format());
            endwhile;
            cuong_theme_pagination();
        else :
            get_template_part('content', 'none');
        endif;
        ?>
    </div>
    <div id="sidebar">
        <?php get_sidebar() ?>
    </div>
</div>
<?php
get_footer();
?>