<?php

/*
Widget Name: Post Snippets Carousel
Description: Create a touch friendly responsive carousel of a collection of custom posts.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Post_Snippets_Carousel_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-post-snippets-carousel",
            __("Post Snippets Carousel", "agile"),
            array(
                "description" => __("Create a responsive carousel of a collection of custom posts.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),
                "id" => array(
                    "type" => "text",
                    "description" => __("The element id to be set for the wrapper element created. (optional).", "agile"),
                    "label" => __("Id", "agile"),
                ),
                "class" => array(
                    "type" => "text",
                    "description" => __("The element class to be set for the wrapper element created. (optional).", "agile"),
                    "label" => __("Class", "agile"),
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


                'settings' => array(
                    'type' => 'section',
                    'label' => __('Carousel Settings', 'agile'),
                    'fields' => array(

                        "pagination_speed" => array(
                            "type" => "number",
                            "description" => __("Pagination speed in milliseconds", "agile"),
                            "label" => __("Pagination speed", "agile"),
                            "default" => 800,
                        ),
                        "slide_speed" => array(
                            "type" => "number",
                            "description" => __("Slide speed in milliseconds.", "agile"),
                            "label" => __("Slide speed", "agile"),
                            "default" => 200,
                        ),
                        "rewind_speed" => array(
                            "type" => "number",
                            "description" => __("Rewind speed in milliseconds.", "agile"),
                            "label" => __("Rewind speed", "agile"),
                            "default" => 1000,
                        ),
                        "stop_on_hover" => array(
                            "type" => "checkbox",
                            "description" => __("Stop autoplay on mouse hover?", "agile"),
                            "label" => __("Stop on hover?", "agile"),
                            "default" => true,
                        ),
                        "auto_play" => array(
                            "type" => "text",
                            "description" => __("Change to any integer for example autoPlay : 5000 to play every 5 seconds. If you set text true default speed will be 5 seconds. Set to text false to disable autoplay.", "agile"),
                            "label" => __("Auto play", "agile"),
                            "default" => 'true',
                        ),
                        "scroll_per_page" => array(
                            "type" => "checkbox",
                            "description" => __("Scroll per page and not per item. This affect next/prev buttons and mouse/touch dragging.", "agile"),
                            "label" => __("Scroll per page?", "agile"),
                            "default" => false,
                        ),
                        "pagination" => array(
                            "type" => "checkbox",
                            "description" => __("Show pagination?", "agile"),
                            "label" => __("Pagination?", "agile"),
                            "default" => true,
                        ),
                        "navigation" => array(
                            "type" => "checkbox",
                            "description" => __("Display next and prev buttons?", "agile"),
                            "label" => __("Navigation?", "agile"),
                            "default" => false,
                        ),
                    )
                ),


                'responsive_settings' => array(
                    'type' => 'section',
                    'label' => __('Responsive Settings', 'agile'),
                    'fields' => array(
                        "items" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the widest browser width.", "agile"),
                            "label" => __("Items", "agile"),
                            'min' => 1,
                            'max' => 5,
                            'integer' => true,
                            'default' => 3
                        ),
                        "items_desktop" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the desktop browser width (<1200px).", "agile"),
                            "label" => __("Items desktop", "agile"),
                            'min' => 1,
                            'max' => 5,
                            'integer' => true,
                            'default' => 3
                        ),
                        "items_desktop_small" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the smaller desktop browser width(<980px).", "agile"),
                            "label" => __("Items desktop_small", "agile"),
                            'min' => 1,
                            'max' => 5,
                            'integer' => true,
                            'default' => 3
                        ),
                        "items_tablet" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the tablet browser width(<769px).", "agile"),
                            "label" => __("Items tablet", "agile"),
                            'min' => 1,
                            'max' => 4,
                            'integer' => true,
                            'default' => 2
                        ),
                        "items_tablet_small" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the smaller tablet browser width.", "agile"),
                            "label" => __("Items tablet_small", "agile"),
                            'min' => 1,
                            'max' => 3,
                            'integer' => true,
                            'default' => 2
                        ),
                        "items_mobile" => array(
                            "type" => "slider",
                            "description" => __("Maximum amount of items displayed at a time with the smartphone mobile browser width(<480px).", "agile"),
                            "label" => __("Items mobile", "agile"),
                            'min' => 1,
                            'max' => 3,
                            'integer' => true,
                            'default' => 1
                        ),
                    )
                )
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "id" => $instance["id"],
            "posts_query" => $instance["posts_query"],
            "image_size" => $instance["image_size"],
            "hide_thumbnail" => $instance["hide_thumbnail"],
            "display_title" => $instance["display_title"],
            "display_summary" => $instance["display_summary"],
            "show_excerpt" => $instance["show_excerpt"],
            "excerpt_count" => $instance["excerpt_count"],
            "show_meta" => $instance["show_meta"],

            "pagination_speed" => $instance["settings"]["pagination_speed"],
            "slide_speed" => $instance["settings"]["slide_speed"],
            "rewind_speed" => $instance["settings"]["rewind_speed"],
            "stop_on_hover" => $instance["settings"]["stop_on_hover"],
            "auto_play" => $instance["settings"]["auto_play"],
            "scroll_per_page" => $instance["settings"]["scroll_per_page"],
            "pagination" => $instance["settings"]["pagination"],
            "navigation" => $instance["settings"]["navigation"],

            "items" => $instance["responsive_settings"]["items"],
            "items_mobile" => $instance["responsive_settings"]["items_mobile"],
            "items_tablet" => $instance["responsive_settings"]["items_tablet"],
            "items_tablet_small" => $instance["responsive_settings"]["items_tablet_small"],
            "items_desktop_small" => $instance["responsive_settings"]["items_desktop_small"],
            "items_desktop" => $instance["responsive_settings"]["items_desktop"],
        );
    }

}

siteorigin_widget_register("mo-post-snippets-carousel", __FILE__, "MO_Post_Snippets_Carousel_Widget");

