<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">

        <?php get_template_part('templates/singular/content-featured-image'); ?>

        <?php the_content(); ?>

        <?php wp_link_pages(array(
            'link_before' => '<span class="page-number">',
            'link_after' => '</span>',
            'before' => '<p class="page-links">' . esc_html__('Pages:', 'agile'),
            'after' => '</p>'
        )); ?>

    </div><!-- .entry-content -->

</article><!-- .hentry -->