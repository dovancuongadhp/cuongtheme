<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" />
<head>
    <meta charset="<?php bloginfo('charset')?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url')?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <div id="container">
        <div id="logo">
            <?php cuong_theme_header() ?>
            <?php cuong_theme_menu('primary-menu') ?>
        </div>