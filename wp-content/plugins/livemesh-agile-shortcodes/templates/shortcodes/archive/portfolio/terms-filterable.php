<?php

/* Set the default arguments. */
$defaults = array(
    'taxonomy' => 'portfolio_category',
    'post_type' => 'portfolio'
);

/* Merge the input arguments and the defaults. */
if (!empty($term_args))
    $args = wp_parse_args($term_args, $defaults);
else
    $args = $defaults;

extract($args);

if (!taxonomy_exists($taxonomy))
    return;

$terms = get_terms($taxonomy);

if (!empty($terms)) : ?>


    <ul class="showcase-filter">

        <li class="segment-0">

            <a class="active" data-value="*" href="#">

                <?php echo esc_html__('All', 'livemesh-agile-shortcodes'); ?>

            </a>

        </li>


        <?php $segment_count = 1; ?>

        <?php foreach ($terms as $term) : ?>

            <li class="segment-<?php echo intval($segment_count); ?>">

                <a class="" href="#"
                   data-value=".term-<?php echo intval($term->term_id); ?>"
                   title="<?php echo esc_html__('View all items filed under ', 'livemesh-agile-shortcodes') . esc_attr($term->name); ?>"><?php echo esc_html($term->name); ?></a>
            </li>

            <?php $segment_count++;; ?>

        <?php endforeach; ?>

    </ul>

<?php endif; ?>