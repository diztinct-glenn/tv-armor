<?php

/**
 * Attachment Template
 *
 * This template is loaded when browsing a Wordpress attachment.
 *
 * @package Agile
 * @subpackage Template
 */

get_header();

?>
    <div id="content" class="content-area">

        <div class="hfeed">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php get_template_part('templates/singular/content-entry-title'); ?>

                        <div class="entry-content">

                            <?php the_attachment_link(get_the_ID(), true) ?>

                            <?php the_content(); ?>

                            <?php wp_link_pages(array('link_before' => '<span class="page-number">', 'link_after' => '</span>', 'before' => '<p class="page-links">' . esc_html__('Pages:', 'agile'), 'after' => '</p>')); ?>

                        </div>
                        <!-- .entry-content -->

                    </article><!-- .hentry -->

                <?php endwhile; ?>

            <?php endif; ?>

        </div>
        <!-- .hfeed -->

        <?php get_template_part('templates/singular/post-nav'); ?>

    </div><!-- #content -->

<?php get_footer(); ?>