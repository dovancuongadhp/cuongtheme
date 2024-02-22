<?php
/**
* Khai bao hang gia tri
	* THEME_URL = lay duong dan thu muc theme
	* CORE = lay duong dan thu muc core
**/
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL."/core");
/**
* Nhung file /core/init.php
**/
require_once(CORE."/init.php");
/**
* Thiet lap chieu rong noi dung
**/
if (!isset($contet_width)) {
	$contet_width = 620;
}
/**
* Khai bao chuc nang cua theme
**/
if (!function_exists('cuong_theme_setup')){
	function cuong_theme_setup(){
		/* Thiết lập text domain */
		$language_folder = THEME_URL."/languages";
		load_theme_textdomain('cuongtheme', $language_folder);
		/* Tu dong them link RSS len <head> */
		add_theme_support('automactic-feed-links');
		/* Them post thumbnail*/
		add_theme_support('post-thumbnails');
		/* Post format */
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
		));
		/* Them title tag */
		add_theme_support('title-tag');
		/* Them custom background*/
		$default_background = array(
			'default-color' => "#e8e8e8"
		);
		add_theme_support('custom-background',$default_background);
		/* Theme menu*/
		register_nav_menu('primary-menu', __('Primary Menu', 'cuongtheme'));
		/* Tao sidebar */
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
