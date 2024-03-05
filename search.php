<?php 
get_header(); 
?>
<div class="content">
    <div id="main-content">
        <div class="search-info">
            <?php 
                $search_query = new WP_Query('s='.$s.'&showpost=-1');
                $search_keyword = _wp_specialchars($s,1);
                $search_count = $search_query->post_count;
                printf(__('We found %1$s article for your search','cuongtheme'), $search_count);
            ?>
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
        <?php get_sidebar()?>
    </div>
</div>
<?php 
get_footer(); 
?>
