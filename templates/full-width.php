<?php
/*
	Template Name: Full Width
*/
?>
<?php 
get_header(); 
?>
<div class="content">
    <div id="main-content" class="full-width">
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
</div>
<?php 
get_footer(); 
?>
