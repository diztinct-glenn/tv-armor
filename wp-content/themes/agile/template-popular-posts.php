<?php
/**
 * Template Name: Popular Posts
 *
 *A custom page template for showing the most popular posts based on number of reader comments
 *
 * @package Agile
 * @subpackage Template
 */


get_header();

$query_args = array( 'orderby' => 'comment_count',  'posts_per_page' => get_option( 'posts_per_page' ), 'ignore_sticky_posts' => 1, 'paged' => ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ) );

mo_get_template_part('templates/loop', 'custom', array('query_args' => $query_args));

get_sidebar('blog');

get_footer();