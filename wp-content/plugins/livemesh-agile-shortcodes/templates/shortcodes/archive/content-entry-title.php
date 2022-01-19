<?php


$title = the_title('<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '"
                                               rel="bookmark">', '</a></h2>', false);

/* If there's no post title, return a default title */
if (empty($title))
    $title = '<h2 class="entry-title no-entry-title"><a href="' . get_permalink() . '" rel="bookmark">' . esc_html__('(Untitled)',
            'livemesh-agile-shortcodes') . '</a></h2>';

echo wp_kses_post($title);

?>