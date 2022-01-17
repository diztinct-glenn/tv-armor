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

if (is_front_page()) {
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}
else {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}

if (!empty($query_args))
    $query_args ['paged'] = $paged;
else {
    // default query
    $query_args = array('posts_per_page' => intval(get_option('posts_per_page')), 'ignore_sticky_posts' => 0, 'paged' => $paged);
}

/* Extract the array to allow easy use of variables. */
extract($args);


?>

<div id="content"
     class="<?php echo esc_attr($list_style); ?> <?php echo implode(' ', apply_filters('mo_content_class', array())); ?>">

    <?php get_template_part('templates/breadcrumbs'); ?>

    <?php if (is_page()) : // Output page content prior to outputting the portfolio items ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php $the_content = apply_filters('the_content', get_the_content()); ?>

            <?php if (!empty($the_content)): ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="entry-content clearfix">

                        <?php echo wp_kses_post($the_content); ?>

                    </div><!-- .entry-content -->

                </article><!-- .hentry -->

            <?php endif; ?>

        <?php endwhile; ?>

    <?php

    endif;

    ?>

    <div class="hfeed">

        <?php $loop = new WP_Query($query_args); ?>

        <?php if ($loop->have_posts()) : ?>

            <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                <?php get_template_part('templates/archive/content'); ?>

            <?php endwhile; ?>

        <?php else : ?>

            <?php mo_get_template_part('loop-error'); // Loads the loop-error.php template.
            ?>

        <?php endif; ?>

    </div><!-- .hfeed -->

    <?php mo_get_template_part('templates/pagination', null, array('query' => $loop)); ?>

    <?php wp_reset_postdata(); /* Right placement to help not lose context information */ ?>

</div><!-- #content -->

