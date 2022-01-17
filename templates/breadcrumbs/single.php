<?php

if (is_singular('portfolio')) {
    $page_id = mo_get_theme_option('mo_default_portfolio_page');
    if (!empty($page_id)) {
        $page_title = get_the_title($page_id);
        echo ' <a href="' . get_permalink($page_id) . '" title="' . esc_attr($page_title) . '">' . wp_specialchars_decode($page_title) . '</a>';
        echo ' ' . $delimiter;
    }

    echo ' ' . wp_specialchars_decode($display_title);
}
else {
    $categories = get_the_category();

    if (!empty($categories)) {
        $count = 0;
        foreach ($categories as $cat) {
            if ($count > 0)
                echo wp_kses_post($separator) . ' ';
            echo get_category_parents($cat, true, ' ');
            $count++;
        }
        echo wp_kses_post($delimiter);
    }

    echo ' ' . wp_specialchars_decode($display_title);
}

?>