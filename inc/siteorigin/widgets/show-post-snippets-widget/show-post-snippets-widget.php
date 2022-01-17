<?php

/*
Widget Name: Show Post Snippets
Description: Displays the post snippets of posts or another custom post types with featured images in a grid layout.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

class MO_Show_Post_Snippets_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-show-post-snippets",
            __("Show Post Snippets", "agile"),
            array(
                "description" => __("Displays the post snippets of blog posts or another custom post types with featured images in a grid layout.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),
                "posts_query" => array(
                    "type" => "posts",
                    "label" => __("Posts Query", "agile")
                ),
                "image_size" => array(
                    "type" => "select",
                    "description" => __("The image size to be used. ", "agile"),
                    "label" => __("Image size", "agile"),
                    "options" => array(
                        "thumbnail" => __("Thumbnail", "agile"),
                        "medium-thumb" => __("Medium Thumbnail", "agile"),
                        "square-thumb" => __("Square Thumbnail", "agile"),
                        "medium" => __("Medium", "agile"),
                        "large" => __("Large", "agile"),
                        "full" => __("Full", "agile"),
                    ),
                    "default" => "medium-thumb"
                ),
                "number_of_columns" => array(
                    "type" => "slider",
                    "description" => __("Number of posts to display per row of post snippets.", "agile"),
                    "label" => __("Number of columns", "agile"),
                    "min" => 1,
                    "max" => 6,
                    "integer" => true,
                    "default" => 3,
                ),
                "no_margin" => array(
                    "type" => "checkbox",
                    "description" => __("If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "agile"),
                    "label" => __("Packed Layout?", "agile"),
                    "default" => false,
                ),
                "hide_thumbnail" => array(
                    "type" => "checkbox",
                    "description" => __("Display thumbnail image or hide the same.", "agile"),
                    "label" => __("Hide thumbnail?", "agile"),
                    "default" => false,
                ),
                "display_title" => array(
                    "type" => "checkbox",
                    "description" => __("Specify if the title of the post or custom post type needs to be displayed below the featured image", "agile"),
                    "label" => __("Display title?", "agile"),
                    "default" => true,
                ),
                "display_summary" => array(
                    "type" => "checkbox",
                    "description" => __("Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.", "agile"),
                    "label" => __("Display summary?", "agile"),
                    "default" => true,
                ),
                "show_excerpt" => array(
                    "type" => "checkbox",
                    "description" => __("Display excerpt for the post/custom post type. Has no effect if display_summary is set to false. If show_excerpt is set to false and display_summary is set to true, the content of the post is displayed truncated by the more WordPress tag. If more tag is not specified, the entire post content is displayed.", "agile"),
                    "label" => __("Show excerpt?", "agile"),
                    "default" => true,
                ),
                "excerpt_count" => array(
                    "type" => "number",
                    "description" => __("Applicable only to excerpts. The excerpt displayed is truncated to the number of characters specified with this parameter.", "agile"),
                    "label" => __("Excerpt count", "agile"),
                    "default" => 100,
                ),
                "show_meta" => array(
                    "type" => "checkbox",
                    "description" => __("Display meta information like the author, date of publishing and number of comments.", "agile"),
                    "label" => __("Show meta?", "agile"),
                    "default" => false,
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "posts_query" => $instance["posts_query"],
            "image_size" => $instance["image_size"],
            "number_of_columns" => $instance["number_of_columns"],
            "no_margin" => $instance["no_margin"],
            "hide_thumbnail" => $instance["hide_thumbnail"],
            "display_title" => $instance["display_title"],
            "display_summary" => $instance["display_summary"],
            "show_excerpt" => $instance["show_excerpt"],
            "excerpt_count" => $instance["excerpt_count"],
            "show_meta" => $instance["show_meta"],
        );
    }

}
siteorigin_widget_register("mo-show-post-snippets", __FILE__, "MO_Show_Post_Snippets_Widget");

