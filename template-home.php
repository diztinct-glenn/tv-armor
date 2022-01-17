<?php
/**
 * Template Name: Home Page
 *
 * A page template for home page layout involving sliders, featured stories and categories.
 * @link https://www.livemeshthemes.com/
 *
 * @package Agile
 * @subpackage Template
 */

get_header(); // displays slider content if so chosen by user
?>

<div id="content" class="content-area">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">

                <?php the_content(); ?>

            </div><!-- .entry-content -->

        </article><!-- .hentry -->

    <?php endwhile; ?>

</div><!-- #content -->

<?php get_footer(); ?>
