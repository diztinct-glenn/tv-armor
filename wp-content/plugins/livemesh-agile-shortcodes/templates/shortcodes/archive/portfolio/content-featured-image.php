<?php


$post_id = get_the_ID();

$post_title = get_the_title($post_id);
$post_link = get_permalink($post_id);
$post_type = get_post_type($post_id);

$defaults = array(
    'image_size' => 'large',
    'taxonomy' => 'portfolio_category',
    'context' => 'archive',
);
if (!empty($thumbnail_args))
    $args = wp_parse_args($thumbnail_args, $defaults);
else
    $args = $defaults;

extract($args);

$thumbnail_url = get_the_post_thumbnail_url(null, 'full');

?>

<?php if (has_post_thumbnail($post_id)) : ?>

    <div class="image-area">
        <span class="image-info-buttons">
            <a class="lightbox-link" data-gal="<?php echo esc_attr($context); ?>"
               title="<?php echo esc_attr($post_title); ?>"
               href="<?php echo esc_url($thumbnail_url); ?>"><i
                        class="lightbox icon-expand"></i>
            </a>
        </span>
        <a title="<?php echo esc_attr($post_title); ?>"
           href="<?php echo esc_url($post_link); ?>">

            <?php $image_url = get_post_meta($post_id, '_masonry_portfolio_thumbnail', true); ?>

            <?php
            // Get the custom sized image stored for portfolio archives/templates, if available.
            // For masonry layouts, no specific image size is specified.
            ?>
            <?php if (empty($image_size) && !empty($image_url)) : ?>

                <img alt="<?php echo esc_attr($post_title); ?>" class="thumbnail"
                     src="<?php echo esc_url($image_url); ?>"/>

            <?php else : ?>

                <?php
                $atts = array(
                    'class' => 'thumbnail',
                    'alt' => $post_title,
                    'title' => $post_title
                );
                echo get_the_post_thumbnail($post_id, $image_size, $atts);
                ?>

            <?php endif; ?>

        </a>
        <div class="image-info">
            <div class="entry-info">
                <h3 class="post-title">
                    <a title="<?php echo esc_attr($post_title); ?>"
                       href="<?php echo esc_url($post_link); ?>">
                        <?php echo esc_attr($post_title); ?>
                    </a>
                </h3>
                <div class="terms">
                    <?php
                    if (taxonomy_exists($taxonomy))
                        echo get_the_term_list(get_the_ID(), $taxonomy, '', ',', '');
                    ?>
                </div>
            </div>
        </div>
        <div class="image-overlay"></div>
    </div>

<?php endif; ?>