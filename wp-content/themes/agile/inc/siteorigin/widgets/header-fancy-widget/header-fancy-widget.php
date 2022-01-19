<?php

/*
Widget Name: Header fancy
Description: Draws a nice looking header with a title displayed in the center and with a line dividing the content.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Header_Fancy_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-header-fancy",
            __("Header fancy", "agile"),
            array(
                "description" => __("Draws a nice looking header with a title displayed in the center and with a line dividing the content.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "class" => array(
                    "type" => "text",
                    "description" => __("The CSS class to be set for the div element created (optional).", "agile"),
                    "label" => __("Class", "agile"),
                    "default" => "",
                ),
                "style" => array(
                    "type" => "text",
                    "description" => __("Inline CSS styling applied for the div element created (optional)", "agile"),
                    "label" => __("Style", "agile"),
                    "default" => "",
                ),
                "title" => array(
                    "type" => "text",
                    "description" => __("The title to be displayed in the center of the header.", "agile"),
                    "label" => __("Title", "agile"),
                    "default" => __("Our Courses", "agile"),
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "class" => $instance["class"],
            "style" => $instance["style"],
            "title" => $instance["title"],
        );
    }

}
siteorigin_widget_register("mo-header-fancy", __FILE__, "MO_Header_Fancy_Widget");