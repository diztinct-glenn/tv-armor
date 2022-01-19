<?php

/* Recent Posts Shortcode -

Displays the most recent blog posts sorted by date of posting.

Usage:

[recent_posts post_count=5 hide_thumbnail="false" show_meta="false" excerpt_count=70 image_size="small"]

Parameters -

post_count - 5 (number) - Number of posts to display
hide_thumbnail false (boolean) - Display thumbnail or hide the same.
show_meta - false (boolean) Display meta information like the author, date of publishing and number of comments.
excerpt_count - 50 (number) The total number of characters of excerpt to display.
image_size - thumbnail (string) - Can be thumbnail, medium-thumb, square-thumb, medium, large, full.

*/
function lags_recent_posts_shortcode($atts) {

    $args = shortcode_atts(array(
        'post_count' => '5',
        'hide_thumbnail' => false,
        'show_meta' => false,
        'excerpt_count' => '50',
        'image_size' => 'thumbnail'
    ), $atts);

    extract($args);

    $args['query_args'] = array('posts_per_page' => $post_count, 'ignore_sticky_posts' => 1);

    $output = lags_get_template_part('templates/shortcodes/loop-post-list', null, array('args' => $args), true);

    return $output;
}

add_shortcode('recent_posts', 'lags_recent_posts_shortcode');


/* Popular Posts Shortcode -

Displays the most popular blog posts. Popularity is based on by number of comments posted on the blog post. The higher the number of comments, the more popular the blog post.

Usage:

[popular_posts post_count=5 hide_thumbnail="false" show_meta="false" excerpt_count=70 image_size="small"]

Parameters -

post_count - 5 (number) - Number of posts to display
hide_thumbnail false (boolean) - Display thumbnail or hide the same.
show_meta - false (boolean) Display meta information like the author, date of publishing and number of comments.
excerpt_count - 50 (number) The total number of characters of excerpt to display.
image_size - thumbnail (string) - image_size - thumbnail (string) - Can be thumbnail, medium-thumb, square-thumb, medium, large, full.

*/
function lags_popular_posts_shortcode($atts) {

    $args = shortcode_atts(array(
        'post_count' => '5',
        'hide_thumbnail' => false,
        'show_meta' => false,
        'excerpt_count' => '50',
        'image_size' => 'thumbnail'
    ), $atts);

    extract($args);

    $args['query_args'] = array('orderby' => 'comment_count', 'posts_per_page' => $post_count, 'ignore_sticky_posts' => 1);

    $output = lags_get_template_part('templates/shortcodes/loop-post-list', null, array('args' => $args), true);

    return $output;
}

add_shortcode('popular_posts', 'lags_popular_posts_shortcode');

/* Category Posts Shortcode -

Displays the blog posts belonging to one or more categories.

Usage:

[category_posts category_slugs="nature,lifestyle" post_count=5 hide_thumbnail="false" show_meta="false" excerpt_count=70 image_size="small"]

Parameters -

category_slugs - (string) The comma separated list of category slugs whose posts need to be displayed.
post_count - 5 (number) - Number of posts to display
hide_thumbnail false (boolean) - Display thumbnail or hide the same.
show_meta - false (boolean) Display meta information like the author, date of publishing and number of comments.
excerpt_count - 50 (number) The total number of characters of excerpt to display.
image_size - thumbnail (string) - image_size - thumbnail (string) - Can be thumbnail, medium-thumb, square-thumb, medium, large, full.


*/
function lags_category_posts_shortcode($atts) {

    $args = shortcode_atts(array(
        'category_slugs' => '',
        'post_count' => '5',
        'hide_thumbnail' => false,
        'show_meta' => false,
        'excerpt_count' => '50',
        'image_size' => 'thumbnail'
    ), $atts);

    extract($args);

    $args['query_args'] = array('category_name' => $category_slugs, 'posts_per_page' => $post_count, 'ignore_sticky_posts' => 1);

    $output = lags_get_template_part('templates/shortcodes/loop-post-list', null, array('args' => $args), true);

    return $output;
}

add_shortcode('category_posts', 'lags_category_posts_shortcode');

/* Tag Posts Shortcode -

Displays the blog posts with one or more tags specified as a parameter to the shortcode.

Usage:

[tag_posts tag_slugs="growth,motivation" post_count=5 hide_thumbnail="false" show_meta="false" excerpt_count=70 image_size="small"]

Parameters -

tag_slugs - (string) The comma separated list of tag slugs whose posts need to be displayed.
post_count - 5 (number) - Number of posts to display
hide_thumbnail false (boolean) - Display thumbnail or hide the same.
show_meta - false (boolean) Display meta information like the author, date of publishing and number of comments.
excerpt_count - 50 (number) The total number of characters of excerpt to display.
image_size - thumbnail (string) - image_size - thumbnail (string) - Can be thumbnail, medium-thumb, square-thumb, medium, large, full.


*/
function lags_tag_posts_shortcode($atts) {

    $args = shortcode_atts(array(
        'tag_slugs' => '',
        'post_count' => '5',
        'hide_thumbnail' => false,
        'show_meta' => false,
        'excerpt_count' => '50',
        'image_size' => 'thumbnail'
    ), $atts);

    extract($args);

    $args['query_args'] = array('tag' => $tag_slugs, 'posts_per_page' => $post_count, 'ignore_sticky_posts' => 1);

    $output = lags_get_template_part('templates/shortcodes/loop-post-list', null, array('args' => $args), true);

    return $output;
}

add_shortcode('tag_posts', 'lags_tag_posts_shortcode');

/* Custom Post Types Shortcode -

Displays the posts of one or more custom post types.

Usage:

[show_custom_post_types post_types="portfolio,post" post_count=5 hide_thumbnail="false" show_meta="false" excerpt_count=70 image_size="small"]

Parameters -

post_types - post (string) The comma separated list of post types whose posts need to be displayed.
post_count - 5 (number) - Number of posts to display
hide_thumbnail false (boolean) - Display thumbnail or hide the same.
show_meta - false (boolean) Display meta information like the author, date of publishing and number of comments.
excerpt_count - 50 (number) The total number of characters of excerpt to display.
image_size - thumbnail (string) - image_size - thumbnail (string) - Can be thumbnail, medium-thumb, square-thumb, medium, large, full.


*/
function lags_show_custom_post_types_shortcode($atts) {
    $args = shortcode_atts(array(
        'post_types' => 'post',
        'post_count' => '5',
        'hide_thumbnail' => false,
        'show_meta' => false,
        'excerpt_count' => '50',
        'image_size' => 'thumbnail'
    ), $atts);

    extract($args);

    $custom_post_types = explode(",", $post_types); // return me an array of post types

    $args['query_args'] = array('post_type' => $custom_post_types, 'posts_per_page' => $post_count, 'ignore_sticky_posts' => 1);

    $output = lags_get_template_part('templates/shortcodes/loop-post-list', null, array('args' => $args), true);

    return $output;
}

add_shortcode('show_custom_post_types', 'lags_show_custom_post_types_shortcode');

/* Post Snippets Shortcode - See https://www.livemeshthemes.com/austin/portfolio-shortcodes/ ‎for examples.

Displays the post snippets of blog posts or another custom post types with featured images. The post snippets are displayed in a grid fashion like a typical portfolio page or grid based blog page.

The number_of_columns parameter helps decide on the number of columns of posts/custom post types to display for each row displayed. Total number of posts displayed is derived from post_count parameter value.

This shortcode is quite powerful when used with custom post types and with filters based on custom taxonomy/terms specified as arguments.

Usage:

[show_post_snippets layout_class="rounded-images" post_type="portfolio" number_of_columns=3 post_count=6 image_size='medium-thumb' excerpt_count=100 display_title="true" display_summary="true" show_excerpt="true" hide_thumbnail="false"]

With taxonomy and terms specified, the portfolio items can be drawn from a specific portfolio category as shown below.

[show_post_snippets number_of_columns=3 post_count=6 image_size='large' terms="inspiration,technology" taxonomy="portfolio_category" post_type="portfolio"]

Parameters -

post_type -  (string) The custom post type whose posts need to be displayed. Examples include post, portfolio, team etc.
post_count - 4 (number) - Number of posts to display
image_size - medium-thumb (string) - image_size - thumbnail (string) - Can be thumbnail, medium-thumb, square-thumb, medium, large, full.
title - (string) Display a header title for the post snippets.
layout_class - (string) The CSS class to be set for the list element (UL) displaying the post snippets. Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.
number_of_columns - 4 (number) - The number of columns to display per row of the post snippets
display_title - false (boolean) - Specify if the title of the post or custom post type needs to be displayed below the featured image
display_summary - false (boolean) - Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.
show_excerpt - true (boolean) - Display excerpt for the post/custom post type. Has no effect if display_summary is set to false. If show_excerpt is set to false and display_summary is set to true, the content of the post is displayed truncated by the WordPress <!--more--> tag. If more tag is not specified, the entire post content is displayed.
excerpt_count - 100 (number) - Applicable only to excerpts. The excerpt displayed is truncated to the number of characters specified with this parameter.
hide_thumbnail false (boolean) - Display thumbnail image or hide the same.
show_meta - false (boolean) Display meta information like the author, date of publishing and number of comments.
excerpt_count - 100 (number) The total number of characters of excerpt to display.
taxonomy - (string) Custom taxonomy to be used for filtering the posts/custom post types displayed.
terms - (string) The terms of taxonomy specified.
no_margin - false (boolean) - If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.
*/

function lags_show_post_snippets_shortcode($atts) {
    $args = shortcode_atts(array(
        'post_type' => 'post',
        'post_count' => 4,
        'post_ids' => false,
        'image_size' => 'medium-thumb',
        'title' => null,
        'layout_class' => '',
        'layout_mode' => 'fitRows',
        'excerpt_count' => 100,
        'number_of_columns' => 4,
        'show_meta' => false,
        'display_title' => false,
        'display_summary' => false,
        'show_excerpt' => true,
        'hide_thumbnail' => false,
        'row_line_break' => true,
        'terms' => '',
        'taxonomy' => 'category',
        'taxonamy' => '', /* For backward compatibility */
        'no_margin' => false,
        'enable_sorting' => false,
        'posts_query' => ''
    ), $atts);

    extract($args);

    $args = array_merge($args, array(
        'number_of_columns' => intval($number_of_columns),
        'post_count' => intval($post_count),
        'excerpt_count' => intval($excerpt_count),
        'no_margin' => lags_to_boolean($no_margin),
        'display_title' => lags_to_boolean($display_title),
        'show_meta' => lags_to_boolean($show_meta),
        'display_summary' => lags_to_boolean($display_summary),
        'show_excerpt' => lags_to_boolean($show_excerpt),
        'hide_thumbnail' => lags_to_boolean($hide_thumbnail),
        'row_line_break' => lags_to_boolean($row_line_break),
        'no_margin' => lags_to_boolean($no_margin),
        'enable_sorting' => lags_to_boolean($enable_sorting),
    ));

    $output = lags_get_template_part('templates/shortcodes/loop', 'posts', array('args' => $args), true);

    return $output;

}

add_shortcode('show_post_snippets', 'lags_show_post_snippets_shortcode');

/* Show Portfolio shortcode -

Helps to display a portfolio page style display of portfolio items with JS powered portfolio category filter. Packed layout option is also available.

Usage:

[show_portfolio number_of_columns=4 post_count=12 image_size='small' filterable=true no_margin=true]

Parameters -

post_count - 9 (number) - Total number of portfolio items to display
number_of_columns - 3 (number) - The number of columns to display per row of the portfolio items
image_size - medium-thumb (string) - image_size - thumbnail (string) - Can be thumbnail, medium-thumb, square-thumb, medium, large, full.
filterable - true (boolean) The portfolio items will be filterable based on portfolio categories if set to true.
no_margin - false (boolean) If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.
*/
function lags_show_portfolio($atts) {

    $args = shortcode_atts(array(
        'number_of_columns' => 3,
        'image_size' => 'medium-thumb',
        'post_count' => 9,
        'filterable' => true,
        'no_margin' => false,
        'layout_mode' => 'fitRows',
        'display_title' => false,
        'display_excerpt' => false
    ), $atts);

    extract($args);

    $args = array(
        'number_of_columns' => intval($number_of_columns),
        'image_size' => $image_size,
        'post_count' => intval($post_count),
        'filterable' => lags_to_boolean($filterable),
        'no_margin' => lags_to_boolean($no_margin),
        'layout_mode' => $layout_mode,
        'display_title' => lags_to_boolean($display_title),
        'display_excerpt' => lags_to_boolean($display_excerpt)
    );
    $output = lags_get_template_part('templates/shortcodes/loop', 'portfolio', array('args' => $args), true);

    return $output;
}

add_shortcode('show_portfolio', 'lags_show_portfolio');

/* Show Gallery shortcode -

Helps to display a gallery page style display of gallery items with JS powered gallery category filter. Packed layout option is also available.

Usage:

[show_gallery number_of_columns=4 post_count=12 image_size='small' filterable=true no_margin=false]

Parameters -

post_count - 9 (number) - Number of gallery items to display
number_of_columns - 4 (number) - The number of columns to display per row of the gallery items
image_size - medium-thumb (string) - image_size - thumbnail (string) - Can be thumbnail, medium-thumb, square-thumb, medium, large, full.
filterable - true (boolean) The gallery items will be filterable based on gallery categories if set to true.
no_margin - false (boolean) If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.
*/
function lags_show_gallery($atts) {

    $args = shortcode_atts(array(
        'number_of_columns' => 3,
        'image_size' => 'medium-thumb',
        'post_count' => 9,
        'filterable' => true,
        'no_margin' => false,
        'layout_mode' => 'fitRows'
    ), $atts);

    extract($args);

    $args = array(
        'number_of_columns' => intval($number_of_columns),
        'image_size' => $image_size,
        'post_count' => intval($post_count),
        'filterable' => lags_to_boolean($filterable),
        'no_margin' => lags_to_boolean($no_margin),
        'layout_mode' => $layout_mode
    );

    $output = lags_get_template_part('templates/shortcodes/loop' , 'gallery', array('args' => $args), true);

    return $output;
}

add_shortcode('show_gallery', 'lags_show_gallery');




