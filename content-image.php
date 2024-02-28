<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <div style="background-color: bisque; margin: 10px; padding: 20px">
        <div class="entry-thumbnail">
            <?php cuong_theme_thumbnail('medium') ?>
        </div>
        <div class="entry-header">
            <?php cuong_theme_entry_header() ?>
            <?php 
                $attachment = get_children(array('post_parent' => $post->ID));
                $attachment_number = count($attachment);
                printf(__('This image post contains %1$s photos', 'cuongtheme'), $attachment_number)
            ?>
        </div>
        <div class="entry-content">
            <?php cuong_theme_entry_content() ?>
            <?php (is_single()) ? cuong_theme_entry_tag() : '' ?>
        </div>
    </div>
    <div class="entry-content"></div>
</article>