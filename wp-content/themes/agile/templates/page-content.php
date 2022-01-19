<?php
/**
 * A generic page content template part
 *
 * A reusable page template part for displaying contents of a page
 *
 * @package Agile
 * @subpackage Template
 */
?>

<div id="content" class="content-area">

  <?php if( !is_front_page() ) { ?>
    <?php get_template_part('templates/breadcrumbs'); ?>
  <?php } ?>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="entry-content">

                    <?php get_template_part('templates/singular/content-featured-image'); ?>

                    <?php the_content(); ?>

                    <?php wp_link_pages(array('before' => '<p class="page-links">' . esc_html__('Pages:', 'agile'), 'after' => '</p>')); ?>

                </div><!-- .entry-content -->

            </article><!-- .hentry -->

            <?php get_sidebar('after-singular-page'); ?>

        <?php endwhile; ?>

    <?php endif; ?>

</div><!-- #content -->
