<?php
/**
 * Template Name: Filterable Portfolio
 *
 * A custom page template for displaying portfolio items filtered by portfolio category
 *
 * @package Agile
 * @subpackage Template
 */

get_header();

get_template_part('templates/loop-custom', 'portfolio');

get_sidebar('portfolio');

get_footer();