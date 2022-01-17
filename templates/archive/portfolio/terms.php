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

$portfolio_categories = get_terms($taxonomy);

if (!empty($portfolio_categories)) : ?>

    <ul id="showcase-links">

        <?php $archive_url = mo_get_post_type_archive_url($post_type); ?>

        <li class="portfolio-archive">

            <a class="showcase-link" href="<?php echo esc_url($archive_url); ?>">

                <?php echo esc_html__('All', 'agile'); ?>

            </a>

        </li>

        <?php foreach ($portfolio_categories as $term) :

            $category_url = get_term_link($term);

            if (is_wp_error($category_url))
                continue;

            $current = is_tax($taxonomy, $term->term_id);
            ?>

            <li class="category-archive">

                <a class="category-link <?php echo esc_attr(($current ? 'active' : '')); ?>"
                   href="<?php echo esc_url($category_url); ?>"
                   title="<?php echo esc_html__('View all items filed under ', 'agile') . esc_attr($term->name); ?>">

                    <?php echo esc_html($term->name); ?>

                </a>

            </li>

        <?php endforeach; ?>

    </ul>

<?php endif; ?>


