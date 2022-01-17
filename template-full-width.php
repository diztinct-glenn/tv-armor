<?php
/**
 * Template Name: Full Width 
 *
 * A custom page template for displaying full width content with no sidebars, no comments or widgets.
 * This is completely free form with no before content or after content hooks that is generally attached with other page templates.
 * Use [segment] shortcode to create segments which span entire browser width while the content is optionally housed in a 1180px centered grid.
 *
 * @package Agile
 * @subpackage Template
 */

get_header(); ?>

<?php mo_get_template_part('templates/page-content'); ?>

<?php get_footer(); ?>