<?php

global $post;

$title = the_title('<h1 class="' . get_post_type() . '-title entry-title">', '</h1>', false);

/* If there's no post title, return a default title */
if (empty($title))
    $title = '<h1 class="entry-title no-entry-title">' . esc_html__('(Untitled)', 'agile') . '</h1>';

echo wp_kses_post($title);

?>