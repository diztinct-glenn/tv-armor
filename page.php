<?php
/**
 * Page Template
 *
 * This is the default page template.  It is used when a more specific template can't be found to display
 * singular views of pages.
 *
 * @package Agile
 * @subpackage Template
 */

get_header(); ?>

<?php mo_get_template_part( 'templates/page-content' ); // Loads the reusable page-content.php template. ?>

<?php get_sidebar('page'); ?>

<?php get_footer();  ?>
