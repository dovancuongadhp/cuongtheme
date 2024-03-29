<?php 
get_header(); 
?>
<div class="content">
    <div id="main-content">
        <?php 
        if (have_posts()) : 
            while (have_posts()) : 
                the_post(); 
                get_template_part('content', get_post_format()); 
                //get_template_part('author-bio'); 
                comments_template(); 
            endwhile; 
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
