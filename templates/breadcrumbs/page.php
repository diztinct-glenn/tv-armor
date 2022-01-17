<?php

global $post;
//Check if this is a top Level page being displayed.
if (!$post->post_parent) {

    echo get_the_title();
}
//Display breadcrumb trail for multi-level subpages (multi-level submenus)
elseif ($post->post_parent) {
    $post_array = get_post_ancestors($post);

    //Sorts in descending order by key, since the array is from top category to bottom.
    krsort($post_array);

    foreach ($post_array as $key => $post_id) {
        //returns the object $post_ids
        $post_ids = get_post($post_id);
        $title = $post_ids->post_title;
        echo '<a href="' . get_permalink($post_ids) . '">' . esc_html($title) . '</a>' . $delimiter;
    }
    echo get_the_title();
}

?>