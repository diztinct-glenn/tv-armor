<?php
/**
 * Template Name: Portfolio
 *
 * A custom page template for displaying portfolio items
 *
 * @package Agile
 * @subpackage Template
 */


get_header();

get_template_part('templates/loop-custom', 'portfolio');

get_sidebar('portfolio');

get_footer();