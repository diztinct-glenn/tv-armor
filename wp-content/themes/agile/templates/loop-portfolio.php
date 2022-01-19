<?php


$column_count = intval(mo_get_theme_option('mo_portfolio_column_count', 3));
$layout_mode = mo_get_theme_option('mo_portfolio_layout_mode', 'fitRows');
if ($layout_mode == 'masonry')
    $image_size = 'large'; // keep the original size for masonry and leave it to the user to upload an appropriate sized image
else
    $image_size = 'medium-thumb';


$args = array(
    'number_of_columns' => $column_count,
    'image_size' => $image_size,
    'layout_mode' => $layout_mode
);


/* Extract the array to allow easy use of variables. */
extract($args);

?>

<div id="content" class="showcase-template content-area">

    <?php get_template_part('templates/breadcrumbs'); ?>

    <div class="hfeed">

        <?php

        if (have_posts()) :

            mo_get_template_part('templates/archive/portfolio/terms', null, array('term_args' => array('post_type' => 'portfolio', 'taxonomy' => 'portfolio_category')));

            ?>

            <ul class="showcase-items image-grid <?php echo esc_attr($layout_mode); ?> js-isotope"
                data-isotope-options='{ "itemSelector": ".showcase-item", "masonry": { "columnWidth": ".grid-sizer" }, "layoutMode": "<?php echo esc_attr($layout_mode); ?>" }'>


                <?php if ($layout_mode == "masonry") : ?>

                    <li class="grid-sizer onecol zero-margin"></li>

                <?php endif; ?>

                <?php

                while (have_posts()) : the_post();

                    if ($layout_mode == "masonry") {
                        $portfolio_column_size = get_post_meta(get_the_ID(), '_masonry_portfolio_column_size', true);

                        if (empty($portfolio_column_size) || $portfolio_column_size == 'default') {
                            $style_class = mo_get_column_style($number_of_columns, true);
                        }
                        else {
                            $style_class = mo_get_column_class($portfolio_column_size, true);
                        }

                        $image_size = null; // do not crop the original image
                    }
                    else {
                        $style_class = mo_get_column_style($number_of_columns);
                    }

                    ?>
                    <li data-id="id-<?php the_ID(); ?>" class="showcase-item <?php echo esc_attr($style_class); ?>">

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <?php

                            $thumbnail_args = array('image_size' => $image_size, 'taxonomy' => 'portfolio_category');

                            mo_get_template_part('templates/archive/portfolio/content-featured-image', null, array('thumbnail_args' => $thumbnail_args));

                            ?>

                            <?php get_template_part('templates/archive/portfolio/entry-text'); ?>

                        </article><!-- .hentry -->

                    </li><!--.showcase-item -->

                <?php endwhile; ?>

            </ul><!-- .showcase-items -->

        <?php else : ?>

            <?php get_template_part('loop-error'); ?>

        <?php endif; ?>

    </div><!-- .hfeed -->

    <?php mo_get_template_part('templates/pagination'); ?>

</div><!-- #content -->