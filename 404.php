<?php 
get_header(); 
?>
<div class="content">
    <div id="main-content">
    <?php 
        _e('<h2>404 NOT FOUND</h2>','cuongtheme');
        _e('<p>The article you were looking for was not found, but maybe try looking again</p>','cuongtheme');
        get_search_form();
        _e('<h3>Content categories: </h3>');
        echo '<div class="404-cat-list">';
            wp_list_categories(array(
                'title_li' => '',
            ));
        echo '</div>';
        _e('Tag Cloud','cuongtheme');
        wp_tag_cloud();
    ?>
    </div>
    <div id="sidebar">
        <?php get_sidebar()?>
    </div>
</div>
<?php 
get_footer(); 
?>
