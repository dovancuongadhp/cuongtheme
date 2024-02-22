<?php
/**
@ Khai bao hang gia tri
	@ THEME_URL = lay duong dan thu muc theme
	@ CORE = lay duong dan thu muc core
**/
define('THEME_URL', get_stylesheet_direactory());
define('CORE', THEME_URL."/core");
/**
@ Nhung file /core/init.php
**/
require_one(CORE."/init.php");
/**
@ Thiet lap chieu rong noi dung
**/
if (!isset($contet_width)) {
	$contet_width = 620;
}
