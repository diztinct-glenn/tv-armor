<?php

/*
Widget Name: Divider
Description: Draws a line or a divider of various kinds depending on the type of divider chosen.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Divider_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-divider",
            __("Divider", "agile"),
            array(
                "description" => __("Draws a line or a divider of various kinds depending on the type of divider chosen.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "type" => array(
                    "type" => "select",
                    "description" => __("Type of the divider to be created.", "agile"),
                    "label" => __("Type", "agile"),
                    "options" => array(
                        "divider" => __("Divider", "agile"),
                        "divider_line" => __("Divider Line", "agile"),
                        "divider_space" => __("Divider Space", "agile"),
                        "divider_fancy" => __("Divider Fancy", "agile"),
                    ),
                    "default" => "divider",
                ),
                "style" => array(
                    "type" => "text",
                    "description" => __("Inline CSS styling applied for the div element created (optional)", "agile"),
                    "label" => __("Style", "agile"),
                    "default" => "",
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "type" => $instance["type"],
            "style" => $instance["style"],
        );
    }

}
siteorigin_widget_register("mo-divider", __FILE__, "MO_Divider_Widget");