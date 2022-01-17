<?php
/**
 * Header Template
 *
 * This template is loaded for displaying header information for the website. Called from every page of the website.
 *
 * @package Agile
 * @subpackage Template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="profile" href="http://gmpg.org/xfn/11"/>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <?php wp_head(); // wp_head  ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php $disable_smooth_page_load = mo_get_theme_option('mo_disable_smooth_page_load'); ?>

<?php if (empty($disable_smooth_page_load)): ?>

    <div id="page-loading"></div>

<?php endif; ?>

<a id="mobile-menu-toggle" href="#"><i class="icon-menu"></i>&nbsp;</a>

<?php get_template_part('menu', 'mobile'); // Loads the menu-mobile.php template. ?>

<div id="container">

    <?php get_template_part('templates/header/masthead'); ?>

    <?php get_template_part('templates/header/title-header'); ?>

    <div id="main" class="site-content">

        <div class="inner">