<?php

global $post;

?>

<article id="post-<?php echo esc_attr($post->ID); ?>" <?php post_class(); ?>>

    <?php get_template_part('templates/singular/content-entry-title'); ?>

    <?php get_template_part('templates/meta/entry-meta'); ?>

    <div class="entry-content">

        <?php

        $post_id = get_the_ID();

        $use_video_thumbnail = get_post_meta($post_id, 'mo_use_video_thumbnail', true);
        $use_slider_thumbnail = get_post_meta($post_id, 'mo_use_slider_thumbnail', true);

        if ($use_video_thumbnail) {

            get_template_part('templates/content-thumbnail-video');

        }
        elseif ($use_slider_thumbnail) {

            get_template_part('templates/content-thumbnail-slider');

        }
        else {

            get_template_part('templates/singular/content-featured-image');

        }

        ?>

        <?php the_content(); ?>

        <?php wp_link_pages(array(
            'link_before' => '<span class="page-number">',
            'link_after' => '</span>',
            'before' => '<p class="page-links">' . esc_html__('Pages:', 'agile'),
            'after' => '</p>'
        )); ?>

    </div><!-- .entry-content -->

    <?php get_template_part('templates/meta/tags'); ?>

</article><!-- .hentry -->