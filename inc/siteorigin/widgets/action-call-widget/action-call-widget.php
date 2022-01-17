<?php

/*
Widget Name: Action Call
Description: Create action call sections that display text with button urging the user to take action.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Action_Call_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-action-call",
            __("Action Call", "agile"),
            array(
                "description" => __("Create action call sections that display text with button urging the user to take action.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(

                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),

                "text" => array(
                    "type" => "text",
                    "description" => __("The text shown as part of action call. ", "agile"),
                    "label" => __("Action Text", "agile"),
                    "default" => __("Ready to get started <strong>on your project</strong>?", "agile"),
                ),
                "button_url" => array(
                    "type" => "link",
                    "description" => __("The URL to which the button links to. The user navigates to this URL when the button is clicked.", "agile"),
                    "label" => __("Button url", "agile"),
                    "default" => __("http://example.com", "agile"),
                ),
                "button_color" => array(
                    "type" => "select",
                    "description" => __("Color of the button. ", "agile"),
                    "label" => __("Button Color", "agile"),
                    "options" => array(
                        "default" => __("Default", "agile"),
                        "theme" => __("Theme", "agile"),
                        "black" => __("Black", "agile"),
                        "blue" => __("Blue", "agile"),
                        "cyan" => __("Cyan", "agile"),
                        "green" => __("Green", "agile"),
                        "orange" => __("Orange", "agile"),
                        "pink" => __("Pink", "agile"),
                        "red" => __("Red", "agile"),
                        "teal" => __("Teal", "agile"),
                        "trans" => __("Trans", "agile"),
                    ),
                    "default" => "default"
                ),
                "button_text" => array(
                    "type" => "text",
                    "description" => __("The title for the button shown as part of call for action. ", "agile"),
                    "label" => __("Button text", "agile"),
                    "default" => __("Purchase Now", "agile"),
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "text" => $instance["text"],
            "button_url" => (!empty($instance['button_url'])) ? sow_esc_url($instance['button_url']) : '',
            "button_color" => $instance["button_color"],
            "button_text" => $instance["button_text"],
        );
    }

}
siteorigin_widget_register("mo-action-call", __FILE__, "MO_Action_Call_Widget");

