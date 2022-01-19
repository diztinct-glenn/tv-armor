<?php
/**
 * Search Template
 *
 * This template is loaded when viewing search results and replaces the default template.
 * 
 * @package Agile
 * @subpackage Template
 */



get_header();

get_template_part('templates/loop');

get_sidebar('blog');

get_footer();


?>