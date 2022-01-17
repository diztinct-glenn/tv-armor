<?php
/**
 * Template Name: Gallery
 *
 * A custom page template for displaying gallery items
 *
 * @package Agile
 * @subpackage Template
 */


get_header();

get_template_part('templates/loop-custom', 'gallery');

get_sidebar('gallery');

get_footer();