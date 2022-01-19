<?php

/* Set the default arguments. */
$defaults = array(
    'list_style' => 'default-list',
    'image_size' => 'large',
    'taxonomy' => 'category'
);

/* Merge the input arguments and the defaults. */
if (!empty($args))
    $args = wp_parse_args($args, $defaults);
else
    $args = $defaults;

/* Extract the array to allow easy use of variables. */
extract($args);


?>

<div id="content"
     class="<?php echo esc_attr($list_style); ?> <?php echo implode(' ', apply_filters('mo_content_class', array())); ?>">

    <?php get_template_part('templates/breadcrumbs'); ?>

    <div class="hfeed">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('templates/archive/content'); ?>

            <?php endwhile; ?>

        <?php else : ?>

            <?php mo_get_template_part('loop-error'); // Loads the loop-error.php template.
            ?>

        <?php endif; ?>

    </div><!-- .hfeed -->

    <?php get_template_part('templates/pagination'); ?>

</div><!-- #content -->
