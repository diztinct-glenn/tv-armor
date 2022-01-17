<?php

/**
 * Post Template
 *
 * This template is loaded when browsing a Wordpress post.
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

                    <?php get_template_part('templates/singular/content'); ?>

                    <?php comments_template('/comments.php', true); // Loads the comments.php template.   ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>
        <!-- .hfeed -->

        <?php get_template_part('templates/singular/post-nav'); ?>

    </div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>