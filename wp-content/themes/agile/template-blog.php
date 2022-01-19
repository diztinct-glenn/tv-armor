<?php

/**
 * Template Name: Blog
 *
 * This is the blog template. 
 *
 * @package Agile
 * @subpackage Template
 */

get_header();

$query_args = array('posts_per_page' => intval(get_option('posts_per_page')), 'ignore_sticky_posts' => 0);

mo_get_template_part('templates/loop', 'custom', array('query_args' => $query_args));

get_sidebar('blog');

get_footer();

?>