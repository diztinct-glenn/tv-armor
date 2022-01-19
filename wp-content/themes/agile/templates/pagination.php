<?php

global $wp_query;

// If custom query has been set, let pagination take that into consideration instead of the main query
if (!empty($query)) {
    $temp_query = $wp_query;
    $wp_query = $query;
}
// Previous/next page navigation.
the_posts_pagination(array(
    'prev_text' => '<i class="icon-arrow-left2"></i>',
    'next_text' => '' . '<i class="icon-arrow-right2"></i>',
    'before_page_number' => '',
    'after_page_number' => ''
));

if (isset($temp_query)) {
    $wp_query = $temp_query;
}

?>