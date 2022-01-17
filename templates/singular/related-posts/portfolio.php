<?php

$args = array(
    'taxonomy' => 'portfolio_category',
    'header_text' => esc_html__('Related Portfolio', 'agile'),
    'post_count' => 6,
    'number_of_columns' => 3
);

mo_get_template_part('templates/singular/related-posts/loop', null, array('post_args' => $args));

?>