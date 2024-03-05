<?php

/**
 * Khai báo hằng giá trị
 * THEME_URL = lấy đường dẫn thư mục theme
 * CORE = lấy đường dẫn thư mục core
 **/
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");
/**
 * Nhúng file /core/init.php
 **/
require_once(CORE . "/init.php");
/**
 * Thiết lập chiều rộng của nội dung
 **/
if (!isset($contet_width)) {
	$contet_width = 620;
}
/**
 * Khai báo chức năng của theme
 **/
if (!function_exists('cuong_theme_setup')) {
	function cuong_theme_setup()
	{
		/* Thiết lập text domain */
		$language_folder = THEME_URL . "/languages";
		load_theme_textdomain('cuongtheme', $language_folder);
		/* Tự động thêm link RSS lên <head> */
		add_theme_support('automactic-feed-links');
		/* Thêm post thumbnail*/
		add_theme_support('post-thumbnails');
		/* Post format */
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
		));
		/* Thêm title tag */
		add_theme_support('title-tag');
		/* Thêm custom background*/
		$default_background = array(
			'default-color' => "#e8e8e8"
		);
		add_theme_support('custom-background', $default_background);
		/* Theme menu*/
		register_nav_menu('primary-menu', __('Primary Menu', 'cuongtheme'));
		/* Tạo sidebar */
		$sidebar = array(
			'name' => __('Main sidebar', 'cuongtheme'),
			'id' => 'main-sidebar',
			'description' => __('Default sidebar'),
			'class' => 'main-sidebar',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		);
		register_sidebar($sidebar);
	}
	add_action('init', 'cuong_theme_setup');
}
/** TEMPLATE FUNCTION */
if (!function_exists('cuong_theme_header')) {
	function cuong_theme_header()
	{ ?>
		<div class="site-name">
			<?php
			if (is_home()) {
				printf(
					'<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename')
				);
			} else {
				printf(
					'<p><a href="%1$s" title="%2$s">%3$s</a></p>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename')
				);
			}
			?>
		</div>
		<div class="site-description"><?php bloginfo('description') ?></div>
	<?php
	}
}
/* THIET LAP MENU */
if (!function_exists('cuong_theme_menu')) {
	function cuong_theme_menu($menu)
	{
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => $menu
		);
		wp_nav_menu($menu);
	}
}

/* Phân trang */
if (!function_exists('cuong_theme_pagination')) {
	function cuong_theme_pagination()
	{
		if ($GLOBALS['wp_query']->max_num_pages < 2) {
			return '';
		} ?>
		<nav class="pagination" role="navigation">
			<?php if (get_next_posts_link()) : ?>
				<div class="prev"><?php next_posts_link(__('Older Posts', 'cuongtheme')); ?></div>
			<?php endif; ?>
			<?php if (get_previous_posts_link()) : ?>
				<div class="next"><?php previous_posts_link(__('Newest Posts', 'cuongtheme')) ?></div>
			<?php endif; ?>
		</nav>
		<?php }
}

/* Hiển thị thumbnail */
if (!function_exists('cuong_theme_thumbnail')) {
	function cuong_theme_thumbnail($size)
	{
		if (!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) { ?>
			<figure id="post-thumbnail"><?php the_post_thumbnail($size) ?></figure>

		<?php	}
	}
}

/* Hiển thị tiêu đề post */
if (!function_exists('cuong_theme_entry_header')) {
	function cuong_theme_entry_header()
	{ ?>
		<?php if (is_single()) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h1>
		<?php else : ?>
			<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h4>
		<?php endif ?>
	<?php }
}
/* Lấy dữ liệu post */
if (!function_exists('cuong_theme_entry_meta')) {
	function cuong_theme_entry_meta()
	{ ?>
		<?php if (!is_page()) : ?>
			<div class="entry-meta">
				<?php
					printf(__('<span class="author">Posted by %1$s</span>'),
					get_the_author() );

					printf(__('<span class="date-published"> at %1$s</span>'),
					get_the_date()
					);
					printf(__('<span class="category"> in %1$s</span>'),
					get_the_category_list(',')
					);
					echo '</br>';
					if(comments_open()){
						echo '<span class="reply">';
							comments_popup_link(
								__('Leave a comment','cuongtheme'),
								__('One comment','cuongtheme'),
								__('% comments','cuongtheme'),
								__('Read all comments','cuongtheme'),
							);
						echo '</span>';
					}
				?>
			</div>
		<?php endif ?>
<?php
	}
}

/* Hàm hiển thị nội dung của post/page */

if (!function_exists('cuong_theme_entry_content')){
	function cuong_theme_entry_content(){
		if( !is_single() && !is_page()){
			the_excerpt();
		} else {
			the_content();
			/* Phân trang trong single */
			$link_pages = array(
				'before' => __('<p>Page: ', 'cuongtheme'),
				'after' => '</p>',
				'nextpagelink' => __('Next Page', 'cuongtheme'),
				'previouspagelink' => __('Previos Page', 'cuongtheme')
			);
			wp_link_pages($link_pages);
		}
	}
}

function cuong_theme_readmore(){
	return '<a class="read-more" href="'.get_permalink(get_the_ID()).'">'.__('...[Read More]','cuongtheme').'</a>';
}
add_filter('excerpt_more', 'cuong_theme_readmore');

/* Hiển thị tag */
if(!function_exists('cuong_theme_entry_tag')){
	function cuong_theme_entry_tag(){
		if (has_tag()){
			echo '<div class="entry-tag">';
			printf(__('Tagged in %1$s','cuong_theme'), 
			get_the_tag_list('',''),
		);
			echo  '</div>';
		}
	}
}

/* Nhúng file style.css */
function cuong_theme_style(){
	wp_register_style('main-style',get_template_directory_uri()."/style.css",'all');
	wp_enqueue_style('main-style');
}
add_action('wp_enqueue_scripts', 'cuong_theme_style');