<?php

/*
Widget Name: Divider top
Description: Draws a line or a divider with a Back to Top link on the right. The user is smooth scrolled to the top of the page upon clicking the Back to Top link.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Divider_Top_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-divider-top",
            __("Divider top", "agile"),
            array(
                "description" => __("Draws a line or a divider with a Back to Top link on the right. The user is smooth scrolled to the top of the page upon clicking the Back to Top link.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(

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
            "style" => $instance["style"],
        );
    }

}
siteorigin_widget_register("mo-divider-top", __FILE__, "MO_Divider_Top_Widget");