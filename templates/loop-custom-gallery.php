<?php

$column_count = intval(mo_get_theme_option('mo_gallery_column_count', 4));
$layout_mode = mo_get_theme_option('mo_gallery_layout_mode', 'fitRows');

if ($layout_mode == 'masonry')
    $image_size = 'large'; // keep the original size for masonry and leave it to the user to upload an appropriate sized image
else
    $image_size = 'medium-thumb';

if (is_page_template('template-gallery-filterable.php')) {
    $filterable = true;
    $post_count = 100;
}
else {
    $filterable = false;
    $post_count = intval(mo_get_theme_option('mo_gallery_post_count', 8));
}

$args = array(
    'number_of_columns' => $column_count,
    'image_size' => $image_size,
    'posts_per_page' => $post_count,
    'filterable' => $filterable,
);


/* Extract the array to allow easy use of variables. */
extract($args);


if (is_front_page()) {
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}
else {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}

$default_query_args = array(
    'post_type' => 'gallery_item',
    'posts_per_page' => $post_count,
    'paged' => $paged,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

if (!empty($query_args)) {
    // Merge the query arguments
    $query_args = wp_parse_args($query_args, $default_query_args);
}
else {
    // else go for default query
    $query_args = $default_query_args;
}

?>

<div id="content" class="showcase-template content-area">

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

        <?php

        $loop = new WP_Query($query_args);

        if ($loop->have_posts()) :

            if ($filterable)
                mo_get_template_part('templates/archive/portfolio/terms', 'filterable', array('term_args' => array('post_type' => 'gallery_item', 'taxonomy' => 'gallery_category')));
            else
                mo_get_template_part('templates/archive/portfolio/terms', null, array('term_args' => array('post_type' => 'gallery_item', 'taxonomy' => 'gallery_category')));

            ?>

            <ul class="showcase-items image-grid <?php echo esc_attr($layout_mode); ?> js-isotope"
                data-isotope-options='{ "itemSelector": ".showcase-item", "layoutMode": "<?php echo esc_attr($layout_mode); ?>" }'>

                <?php

                while ($loop->have_posts()) : $loop->the_post();

                    $style_class = mo_get_column_style($number_of_columns);

                    if ($filterable && taxonomy_exists('gallery_category')) :
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

                            mo_get_template_part('templates/archive/content-featured-image', null, array('thumbnail_args' => $thumbnail_args));

                            ?>

                        </article><!-- .hentry -->

                    </li><!--.showcase-item -->


                <?php endwhile; ?>

            </ul><!-- .showcase-items -->

        <?php else : ?>

            <?php get_template_part('loop-error'); ?>

        <?php endif; ?>

    </div><!-- .hfeed -->

    <?php mo_get_template_part('templates/pagination', null, array('query' => $loop)); ?>

    <?php wp_reset_postdata(); /* Right placement to help not lose context information */ ?>

</div><!-- #content -->