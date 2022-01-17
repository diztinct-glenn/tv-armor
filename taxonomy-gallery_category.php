<?php
/**
 *
 * Displays gallery items belonging to specific gallery categories
 *
 * @package Agile
 * @subpackage Template
 */

get_header();

get_template_part('templates/loop', 'gallery');

get_sidebar('gallery');

get_footer();