<?php

/*
Widget Name: Custom Posts
Description: Display posts or custom post type instances based on user selection criteria.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Custom_Posts_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-custom-posts",
            __("Custom Posts", "agile"),
            array(
                "description" => __("Display blog posts or custom post type instances based on user selection criteria.", "agile"),
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
                "hide_thumbnail" => array(
                    "type" => "checkbox",
                    "description" => __("Display thumbnail or hide the same.", "agile"),
                    "label" => __("Hide thumbnail", "agile"),
                    "default" => false,
                ),
                "show_meta" => array(
                    "type" => "checkbox",
                    "description" => __("Display meta information like the author, date of publishing and number of comments.", "agile"),
                    "label" => __("Show meta", "agile"),
                    "default" => false,
                ),
                "excerpt_count" => array(
                    "type" => "number",
                    "description" => __("The total number of characters of excerpt to display.", "agile"),
                    "label" => __("Excerpt count", "agile"),
                    "default" => 70,
                ),
                "image_size" => array(
                    "type" => "select",
                    "description" => __("The size of the image displayed for posts list.", "agile"),
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
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "posts_query" => $instance["posts_query"],
            "hide_thumbnail" => $instance["hide_thumbnail"],
            "show_meta" => $instance["show_meta"],
            "excerpt_count" => $instance["excerpt_count"],
            "image_size" => $instance["image_size"],
        );
    }

}
siteorigin_widget_register("mo-custom-posts", __FILE__, "MO_Custom_Posts_Widget");