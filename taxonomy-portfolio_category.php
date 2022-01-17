<?php
/**
 *
 * Displays portfolio items belonging to specific portfolio categories
 *
 * @package Agile
 * @subpackage Template
 */

get_header();

get_template_part('templates/loop', 'portfolio');

get_sidebar('portfolio');

get_footer();