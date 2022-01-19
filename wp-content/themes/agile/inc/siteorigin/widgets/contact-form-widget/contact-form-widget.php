<?php

/*
Widget Name: Contact Form
Description: Display a simple contact form.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Contact_Form_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-contact-form",
            __("Contact Form", "agile"),
            array(
                "description" => __("Display a simple contact form.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),
                "class" => array(
                    "type" => "text",
                    "description" => __("Custom CSS class name to be set for the div element created (optional)", "agile"),
                    "label" => __("Class", "agile"),
                    "default" => "",
                ),
                "mail_to" => array(
                    "type" => "text",
                    "description" => __("The recipient email where all form submissions will be received.", "agile"),
                    "label" => __("Mail to", "agile"),
                    "default" => __("receipient@mydomain.com", "agile"),
                ),
                "phone" => array(
                    "type" => "checkbox",
                    "description" => __("Request for phone number of the user? A phone number field is displayed.", "agile"),
                    "label" => __("Phone", "agile"),
                    "default" => true,
                ),
                "web_url" => array(
                    "type" => "checkbox",
                    "description" => __("Whether the user should be requested for Web URL via an input field?", "agile"),
                    "label" => __("Web url", "agile"),
                    "default" => true,
                ),
                "subject" => array(
                    "type" => "checkbox",
                    "description" => __("A mail subject field is displayed if the value is checked.", "agile"),
                    "label" => __("Subject", "agile"),
                    "default" => true,
                ),
                "button_color" => array(
                    "type" => "select",
                    "description" => __("Color of the submit button.", "agile"),
                    "label" => __("Button color", "agile"),
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
                    )
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "class" => $instance["class"],
            "mail_to" => $instance["mail_to"],
            "phone" => $instance["phone"],
            "web_url" => $instance["web_url"],
            "subject" => $instance["subject"],
            "button_color" => $instance["button_color"],
        );
    }

}
siteorigin_widget_register("mo-contact-form", __FILE__, "MO_Contact_Form_Widget");

