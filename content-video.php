<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <div style="background-color: bisque; margin: 10px; padding: 20px">
        <div class="entry-header">
            <?php cuong_theme_entry_header() ?>
        </div>
        <div class="entry-content">
            <?php the_content() ?>
            <?php (is_single()) ? cuong_theme_entry_tag() : '' ?>
        </div>
    </div>
</article>