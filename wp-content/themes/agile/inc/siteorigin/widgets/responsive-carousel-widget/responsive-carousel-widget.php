<?php

/*
Widget Name: Responsive Carousel
Description: Create a touch friendly responsive carousel of a collection of HTML content.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Responsive_Carousel_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-responsive-carousel",
            __("Responsive Carousel", "agile"),
            array(
                "description" => __("Create a responsive carousel of a collection of HTML content.", "agile"),
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
                    "description" => __("The CSS class to be set for the wrapper div for the carousel. Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items. (optional).", "agile"),
                    "label" => __("Class", "agile"),
                ),

                'elements' => array(
                    'type' => 'repeater',
                    'label' => __('HTML Elements', 'agile'),
                    'item_name' => __('HTML Element', 'agile'),
                    'item_label' => array(
                        'selector' => "[id*='elements-name']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'name' => array(
                            'type' => 'text',
                            'label' => __('Name', 'agile'),
                            'description' => __('The title to identify the HTML element', 'agile'),
                        ),

                        'text' => array(
                            'type' => 'tinymce',
                            'label' => __('HTML element', 'agile'),
                            'description' => __('The HTML content for the carousel item.', 'agile'),
                        ),
                    )
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
            "class" => $instance["class"],

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


            'elements' => !empty($instance['elements']) ? $instance['elements'] : array(),
        );
    }

}

siteorigin_widget_register("mo-responsive-carousel", __FILE__, "MO_Responsive_Carousel_Widget");

