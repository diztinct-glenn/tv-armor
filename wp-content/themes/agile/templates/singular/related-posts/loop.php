<?php

global $post;

/** Default config options */
$defaults = array(
    'header_text' => esc_html__("Related Posts", 'agile'),
    'taxonomy' => 'category',
    'show_meta' => false,
    'post_count' => 4,
    'number_of_columns' => 4,
    'image_size' => 'medium-thumb',
    'display_summary' => false
);

/** Parse default options with caller provided options and extract them */
if (!empty($post_args))
    $args = wp_parse_args($post_args, $defaults);
else
    $args = $defaults;

extract($args);

$style_class = mo_get_column_style($number_of_columns);

$terms = wp_get_object_terms($post->ID, $taxonomy);

//Pluck out the IDs to get an array of IDS
$term_ids = wp_list_pluck($terms, 'term_id');

//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
//Choose 'AND' if you want to query for posts with all terms
$args = wp_parse_args($args, array(
    'post_type' => get_post_type($post->ID),
    'tax_query' => array(
        array(
            'taxonomy' => $taxonomy,
            'field' => 'id',
            'terms' => $term_ids,
            'operator' => 'IN'
            //Or 'AND' or 'NOT IN'
        )
    ),
    'ignore_sticky_posts' => 1,
    'orderby' => 'rand',
    'post__not_in' => array($post->ID),
    'posts_per_page' => $post_count
));

$posts = get_posts($args);

if (!empty($posts)):

    $post_count = 0;

    $first_row = true;
    $last_column = false;

    ?>

    <div class="related-posts post-snippets">

        <h4 class="subheading"><?php echo esc_html($header_text); ?></h4>

        <?php

        foreach ($posts as $post) :

            setup_postdata($post);

            $post_id = $post->ID;

            if ($last_column) {
                echo '<div class="clear"></div>';
                $first_row = false;
            }

            if (++$post_count % $number_of_columns == 0)
                $last_column = true;
            else
                $last_column = false;

            ?>

            <div class="<?php echo esc_attr($style_class) . ' clearfix' . ($last_column ? ' last' : ''); ?>">

                <article class="<?php echo join(' ', get_post_class()) . ($first_row ? ' first' : ''); ?>">

                    <?php

                    $thumbnail_args = array('image_size' => $image_size, 'taxonomy' => null);

                    mo_get_template_part('templates/archive/content-featured-image', null, array('thumbnail_args' => $thumbnail_args));

                    ?>

                    <div class="entry-text-wrap">

                        <?php get_template_part('templates/archive/content-entry-title'); ?>

                        <?php if ($show_meta): ?>

                            <div class="byline">

                                <?php get_template_part('templates/meta/published'); ?>
                                <?php get_template_part('templates/meta/comments-number'); ?>

                            </div>

                        <?php endif; ?>

                        <?php if ($display_summary): ?>

                            <div class="entry-summary">

                                <?php echo mo_truncate_string(get_the_excerpt(), 80);; ?>

                            </div><!-- .entry-summary -->

                        <?php endif; ?>

                    </div><!-- entry-text-wrap -->

                </article><!-- .hentry -->

            </div> <!-- .column-class -->

        <?php endforeach; ?>

    </div> <!-- .related-posts -->

    <div class="clear"></div>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>