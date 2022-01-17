<?php

$column_count = 3;
$post_count = 3;
if (get_post_meta(get_the_ID(), 'mo_current_post_layout', true) == 'layout-1c' || mo_get_theme_option('mo_post_layout') == 'layout-1c'){
    $column_count = 4;
    $post_count = 4;
}
$args = array(
    'taxonomy' => 'category',
    'header_text' => esc_html__('Related Posts', 'agile'),
    'display_summary' => true,
    'post_count' => $post_count,
    'number_of_columns' => $column_count
);

mo_get_template_part('templates/singular/related-posts/loop', null, array('post_args' => $args));

?>