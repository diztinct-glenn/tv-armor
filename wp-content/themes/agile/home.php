<?php
/**
 * Home Template
 *
 * This template is loaded as the home page. Can be overridden by user by specifying a static
 * page as home page in the Wordpress admin panel, under 'Reading' admin page.
 *
 * @package Agile
 * @subpackage Template
 */


get_header();

get_template_part('templates/loop');

get_sidebar('blog');

get_footer();

?>
