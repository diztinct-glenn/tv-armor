<?php
/**
 * Template Name: Two Column Left Navigation
 *
 * A custom page template for displaying content with left sidebar
 *
 * @package Agile
 * @subpackage Template
 */

get_header(); ?>

<?php mo_get_template_part('templates/page-content'); ?>

<?php get_sidebar('page'); ?>

<?php get_footer(); ?>