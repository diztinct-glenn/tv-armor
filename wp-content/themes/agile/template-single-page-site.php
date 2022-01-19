<?php
/**
 * Template Name: Single Page Site
 *
 * Custom Page template for creating single page site utilizing page sections custom post type instances
 *
 * @package Agile
 * @subpackage Template
 */

$page_section_ids = get_post_meta(get_the_ID(), '_page_section_order_field', true);

$query_args = array('post_type' => 'page_section',
                    'posts_per_page' => -1,
                    'post_status' => 'publish');

if (!empty($page_section_ids))
    $query_args = array_merge($query_args, ['post__in' => explode(',', $page_section_ids), 'orderby' => 'post__in']);


get_header(); // displays slider content if so chosen by user
?>

<div id="content" class="content-area">

    <div class="hfeed">

        <?php $loop = new WP_Query($query_args); ?>

        <?php if ($loop->have_posts()) : ?>

            <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                <?php $slug = get_post()->post_name; ?>

                <article id="<?php echo esc_attr($slug); ?>" class="<?php echo esc_attr(join(' ', get_post_class()) . ' first'); ?>">

                    <?php the_content(); ?>

                    <?php
                    if (current_user_can('edit_post', $post->ID) && $link = esc_url(get_edit_post_link($post->ID)))
                        echo '<a title="' . get_the_title($post->ID) . '" class="button edit-button" href="' . $link . '" target="_blank">' . __('Edit', 'agile') . '</a>';
                    ?>

                </article><!-- .hentry -->

            <?php

            endwhile;
        else :
            get_template_part('loop-error'); // Loads the loop-error.php template.
        endif;

        ?>

    </div><!-- .hfeed -->

</div><!-- #content -->

<?php wp_reset_postdata(); /* Right placement to help not lose context information */ ?>

<?php get_footer(); ?>
