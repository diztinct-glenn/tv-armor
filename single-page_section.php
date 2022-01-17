<?php
/**
 * Displays page section with no sidebars - these page sections are used in single page templates.
 * NOT TO BE PUBLIC (no search, links etc - must be part of another page) but can be opened for
 * testing purposes during development only.
 *
 * @package Agile
 * @subpackage Template
 */

get_header();
?>

    <div id="content" class="content-area">

        <?php get_template_part('templates/breadcrumbs'); ?>

        <div class="hfeed">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('templates/singular/content', 'page_section'); ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div><!-- .hfeed -->

    </div><!-- #content -->

<?php get_footer(); ?>