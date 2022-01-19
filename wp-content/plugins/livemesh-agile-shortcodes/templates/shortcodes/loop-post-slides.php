<?php

$defaults = array(

    'post_type' => 'post',
    'post_count' => 4,
    'post_ids' => false,
    'image_size' => 'medium-thumb',
    'title' => null,
    'layout_class' => '',
    'excerpt_count' => 100,
    'number_of_columns' => 4,
    'show_meta' => false,
    'display_title' => false,
    'display_summary' => false,
    'show_excerpt' => true,
    'hide_thumbnail' => false,
    'row_line_break' => true,
    'terms' => '',
    'taxonomy' => 'category',
    'taxonamy' => '', /* For backward compatibility */
    'no_margin' => false,
    'enable_sorting' => false,
);

if (!empty($args)) {
    // Merge the arguments
    $args = wp_parse_args($args, $defaults);
}
else {
    // else go for default options
    $args = $defaults;
}

/* Extract the array to allow easy use of variables. */
extract($args);

if (!empty($posts_query) && function_exists('siteorigin_widget_post_selector_process_query')) {

    $posts_query = str_replace(array('&#91;', '&#93;'), array('[', ']'), htmlspecialchars_decode($posts_query));

    $posts_query = siteorigin_widget_post_selector_process_query($posts_query);

    $loop = new WP_Query($posts_query);

    if (array_key_exists('post_type', $posts_query)) {
        $post_type = $posts_query['post_type'];

        $taxonomies = get_object_taxonomies($post_type);

        $taxonomy = (!empty($taxonomies) ? $taxonomies[0] : '');
    }
}
else {
    if (empty($taxonamy)) {
        $taxonomies = get_object_taxonomies($post_type);

        $taxonomy = (!empty($taxonomies) ? $taxonomies[0] : '');
    }
    else {
        $taxonomy = $taxonamy; /* TODO: Remove later. For backwards compatibility */
    }

    if (empty($post_type))
        $query_args = array(
            'ignore_sticky_posts' => 1,
            'posts_per_page' => $post_count
        );
    elseif (!empty($post_ids))
        $query_args = array(
            'post_type' => $post_type,
            'posts_per_page' => $post_count,
            'post__in' => explode(',', $post_ids)
        );
    elseif (empty($taxonomy) || empty($terms))
        $query_args = array(
            'ignore_sticky_posts' => 1,
            'post_type' => $post_type,
            'posts_per_page' => $post_count
        );
    else
        $query_args = array(
            'post_type' => $post_type,
            'posts_per_page' => $post_count,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => explode(',', $terms)
                )
            )
        );

    if (isset($enable_sorting) && $enable_sorting) {
        $query_args['orderby'] = 'menu_order';
        $query_args['order'] = 'ASC';
    }

    if (!empty($post_parent))
        $query_args['post_parent'] = $post_parent;

    ?>

    <?php

    $loop = new WP_Query($query_args);

}

if ($loop->have_posts()) :

    while ($loop->have_posts()) : $loop->the_post();

        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php

            $thumbnail_args = array('image_size' => $image_size, 'taxonomy' => $taxonomy);

            lags_get_template_part('templates/shortcodes/archive/content-featured-image', null, array('thumbnail_args' => $thumbnail_args));

            ?>

            <?php

            if ($display_title || $display_summary || $show_meta) : ?>

                <div class="entry-text-wrap">

                    <?php if ($display_title) : ?>

                        <?php lags_get_template_part('templates/shortcodes/archive/content-entry-title'); ?>

                    <?php endif; ?>

                    <?php if ($show_meta) : ?>

                        <div class="byline">

                            <?php lags_get_template_part('templates/shortcodes/meta/published'); ?>

                            <?php lags_get_template_part('templates/shortcodes/meta/comments-number'); ?>

                        </div>

                    <?php endif; ?>

                    <?php if ($display_summary) : ?>

                        <div class="entry-summary">

                            <?php

                            if ($show_excerpt && intval($excerpt_count) != 0) {
                                echo lags_truncate_string(get_the_excerpt(), $excerpt_count);
                            }
                            else {
                                global $more;
                                $more = 0;
                                echo get_the_content(__('Read More <span class="meta-nav">&rarr;</span>', 'livemesh-agile-shortcodes'));
                            }

                            ?>

                        </div><!-- entry-summary -->

                    <?php endif; ?>

                </div> <!-- .entry-text-wrap -->

            <?php endif; ?>

        </article><!-- .hentry -->

    <?php endwhile; ?>

<?php else : ?>

    <?php lags_get_template_part('templates/shortcodes/loop-error'); ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>
