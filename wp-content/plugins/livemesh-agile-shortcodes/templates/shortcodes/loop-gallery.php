<?php

$defaults = array(
    'number_of_columns' => 3,
    'image_size' => 'medium-thumb',
    'post_count' => 9,
    'filterable' => true,
    'no_margin' => false,
    'layout_mode' => 'fitRows',
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

$query_args = array(
    'post_type' => 'gallery_item',
    'posts_per_page' => intval($post_count),
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

?>

<div class="showcase-template">

    <div class="hfeed">

        <?php

        $loop = new WP_Query($query_args);

        if ($loop->have_posts()) :

            if ($filterable)
                lags_get_template_part('templates/shortcodes/archive/portfolio/terms', 'filterable', array('term_args' => array('post_type' => 'gallery_item', 'taxonomy' => 'gallery_category')));
            ?>

            <ul class="showcase-items image-grid <?php echo esc_attr($layout_mode); ?> js-isotope"
                data-isotope-options='{ "itemSelector": ".showcase-item", "layoutMode": "<?php echo esc_attr($layout_mode); ?>" }'>

                <?php

                while ($loop->have_posts()) : $loop->the_post();

                    $style_class = lags_get_column_style($number_of_columns, $no_margin);

                    if ($filterable) :
                        $terms = get_the_terms(get_the_ID(), 'gallery_category');
                        if (!empty($terms)) {
                            foreach ($terms as $term) {
                                $style_class .= ' term-' . intval($term->term_id);
                            }
                        }
                    endif;

                    ?>
                    <li data-id="id-<?php the_ID(); ?>" class="showcase-item <?php echo esc_attr($style_class); ?>">

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php

                            $thumbnail_args = array('image_size' => $image_size, 'taxonomy' => 'gallery_category');

                            lags_get_template_part('templates/shortcodes/archive/content-featured-image', null, array('thumbnail_args' => $thumbnail_args));

                            ?>

                        </article><!-- .hentry -->

                    </li><!--.showcase-item -->


                <?php endwhile; ?>

            </ul><!-- .showcase-items -->

        <?php else : ?>

            <?php lags_get_template_part('templates/shortcodes/loop-error'); ?>

        <?php endif; ?>

    </div><!-- .hfeed -->

    <?php wp_reset_postdata(); /* Right placement to help not lose context information */ ?>

</div><!-- .showcase-template -->