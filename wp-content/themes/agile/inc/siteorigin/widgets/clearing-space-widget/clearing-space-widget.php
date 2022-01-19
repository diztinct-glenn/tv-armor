<?php

/*
Widget Name: Clearing space
Description: Create a DIV element aimed at having a space of fixed height between elements.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Clearing_Space_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-clearing-space",
            __("Clearing space", "agile"),
            array(
                "description" => __("Create a DIV element aimed at having a space of fixed height between elements.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "height" => array(
                    "type" => "number",
                    "description" => __("Specify height of the space in pixel units (without the px suffix).", "agile"),
                    "label" => __("Height", "agile"),
                    "default" => 30,
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "height" => $instance["height"],
        );
    }

}
siteorigin_widget_register("mo-clearing-space", __FILE__, "MO_Clearing_Space_Widget");