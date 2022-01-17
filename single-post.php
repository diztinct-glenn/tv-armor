<?php

/**
 * Post Template
 *
 * This template is loaded when browsing a WordPress post.
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

                    <?php get_template_part('templates/singular/content', 'post'); ?>

                    <?php get_sidebar('after-singular'); ?>

                    <?php comments_template('/comments.php', true); // Loads the comments.php template.   ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div><!-- .hfeed -->

        <?php  get_template_part('templates/singular/related-posts/posts'); ?>

        <?php get_template_part('templates/singular/post-nav'); ?>

    </div><!-- #content -->

<?php get_sidebar('post'); ?>

<?php get_footer(); ?>