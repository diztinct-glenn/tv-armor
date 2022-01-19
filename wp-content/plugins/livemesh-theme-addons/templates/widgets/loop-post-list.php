<?php

/* Set the default arguments. */
$defaults = array(
    'query_args' => null,
    'post_count' => 5,
    'image_size' => 'thumbnail',
    'show_meta' => false,
    'excerpt_count' => 60,
    'hide_thumbnail' => false
);

$output = '';

/* Merge the input arguments and the defaults. */
if (!empty($args))
    $args = wp_parse_args($args, $defaults);
else
    $args = $defaults;

/* Extract the array to allow easy use of variables. */
extract($args);

if (!empty($query_args))
    $query_args = wp_parse_args(array('posts_per_page' => intval($post_count), 'ignore_sticky_posts' => 1), $query_args);
else
    $query_args = array('posts_per_page' => intval($post_count), 'ignore_sticky_posts' => 1);

$loop = new WP_Query($query_args);

if ($loop->have_posts()): ?>

    <ul class="post-list">

        <?php

        $hide_thumbnail = lta_to_boolean($hide_thumbnail);

        $show_meta = lta_to_boolean($show_meta);

        while ($loop->have_posts()) : $loop->the_post(); ?>

            <li>

                <article class="<?php echo join(' ', get_post_class()); ?>">

                    <?php $post_id = get_the_ID(); ?>

                    <?php if (!$hide_thumbnail && has_post_thumbnail($post_id)) : ?>

                        <?php

                        $post_title = get_the_title($post_id);
                        $post_link = get_permalink($post_id);

                        ?>

                        <a title="<?php echo esc_attr($post_title); ?>"
                           href="<?php echo esc_url($post_link); ?>">

                            <?php $atts = array(
                                'class' => 'thumbnail',
                                'alt' => $post_title,
                                'title' => $post_title
                            );

                            echo get_the_post_thumbnail($post_id, $image_size, $atts);
                            ?>
                        </a>

                    <?php endif; ?>

                    <div class="entry-text-wrap">

                        <?php the_title('<h3 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h3>', true); ?>

                        <?php if ($show_meta) : ?>

                            <div class="byline">

                                <?php lta_get_template_part('templates/widgets/archive/published'); ?>

                                <?php lta_get_template_part('templates/widgets/archive/comments-number'); ?>

                            </div>

                        <?php endif; ?>

                        <?php if (intval($excerpt_count) != 0) : ?>

                            <div class="entry-summary">

                                <?php echo lta_truncate_string(get_the_excerpt(), $excerpt_count); ?>

                            </div><!-- entry-summary -->

                        <?php endif; ?>

                    </div><!-- entry-text-wrap -->

                </article><!-- .hentry -->

            </li>

        <?php endwhile ?>

    </ul>

<?php endif; ?>

<?php wp_reset_postdata(); ?>