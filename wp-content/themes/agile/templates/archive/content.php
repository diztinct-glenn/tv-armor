<?php

/* Set the default arguments. */
$defaults = array(
    'image_size' => 'large',
    'taxonomy' => 'category'
);

/* Merge the input arguments and the defaults. */
if (!empty($args))
    $args = wp_parse_args($args, $defaults);
else
    $args = $defaults;

extract($args);

?>

<article id="post-<?php the_ID(); ?>" class="<?php echo join(' ', get_post_class()); ?> clearfix">

    <div class="entry-snippet">

        <?php get_template_part('templates/archive/content-entry-title'); ?>

        <?php get_template_part('templates/meta/entry-meta'); ?>

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

            $thumbnail_args = array('image_size' => $image_size, 'taxonomy' => $taxonomy);

            mo_get_template_part('templates/archive/content-featured-image', null, array('thumbnail_args' => $thumbnail_args));

        }

        ?>

        <?php get_template_part('templates/archive/content-entry-summary'); ?>

        <?php $disable_read_more_button = mo_get_theme_option('mo_disable_read_more_button_in_archives');

        if (!$disable_read_more_button) : ?>

            <?php get_template_part('templates/archive/read-more-link'); ?>

        <?php endif; ?>


    </div>
    <!-- .entry-snippet -->

</article><!-- .hentry -->