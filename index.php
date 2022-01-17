<?php
/**
 * Index Template
 *
 * This is the default template.  It is used when a more specific template can't be found to display
 * posts.  It is unlikely that this template will ever be used, but there may be rare cases.
 *
 * @package Agile
 * @subpackage Template
 */

get_header();

get_template_part('templates/loop');

get_sidebar('blog');

get_footer();

?>