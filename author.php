<?php
get_header();
?>
<div class="content">
    <div id="main-content">
        <div class="author-box">
            <?php get_template_part('author-bio'); ?>
        </div>
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