<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <div style="background-color: bisque; margin: 10px; padding: 20px">
        <div class="entry-thumbnail">
            <?php cuong_theme_thumbnail('thumbnail') ?>
        </div>
        <div class="entry-header">
            <?php cuong_theme_entry_header() ?>
            <?php cuong_theme_entry_meta() ?>
        </div>
    </div>
    <div class="entry-content"></div>
</article>