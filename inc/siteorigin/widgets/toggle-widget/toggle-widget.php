<?php

/*
Widget Name: Toggle
Description: Displays a toggle box that displays content when toggle button is clicked.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Toggle_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-toggle",
            __("Toggle", "agile"),
            array(
                "description" => __("Displays a toggle box with content hidden. The content is shown when the toggle is clicked.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "title" => array(
                    "type" => "text",
                    "description" => __("The title of the toggle.", "agile"),
                    "label" => __("Title", "agile"),
                    "default" => __("Toggle Title", "agile"),
                ),
                "text" => array(
                    "type" => "tinymce",
                    "description" => __("The toggle content.", "agile"),
                    "label" => __("Text", "agile"),
                    "default" => __("Toggle content goes here.", "agile"),
                ),
                "class" => array(
                    "type" => "text",
                    "description" => __("CSS class name to be assigned to the toggle DIV element created.", "agile"),
                    "label" => __("Class", "agile"),
                    "default" => "",
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "class" => $instance["class"],
            "title" => $instance["title"],
            "text" => $instance["text"],
        );
    }

}
siteorigin_widget_register("mo-toggle", __FILE__, "MO_Toggle_Widget");