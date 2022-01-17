<?php

/*
Widget Name: Heading
Description: Create headings used as introductory titles/text to the page sections.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Heading_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-heading",
            __("Heading", "agile"),
            array(
                "description" => __("Create headings used as introductory titles/text to the page sections.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "class" => array(
                    "type" => "text",
                    "description" => __("Custom CSS class name to be set for the DIV element created (optional)", "agile"),
                    "label" => __("Class", "agile"),
                    "default" => "",
                ),
                "style" => array(
                    "type" => "text",
                    "description" => __("Inline CSS styling applied for the DIV element created (optional)", "agile"),
                    "label" => __("Style", "agile"),
                    "default" => "",
                ),
                'type' => array(
                    'type' => 'select',
                    'label' => __('Choose Heading Type', 'agile'),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array('type')
                    ),
                    'default' => 'heading2',
                    'options' => array(
                        'heading1' => __('Heading 1', 'agile'),
                        'heading2' => __('Heading 2', 'agile')
                    )
                ),
                "title" => array(
                    "type" => "text",
                    "description" => __("The title of the heading.", "agile"),
                    "label" => __("Title", "agile"),
                    "default" => __("Heading Title", "agile"),
                ),

                "pitch_text" => array(
                    "type" => "text",
                    "description" => __("A short description or text shown below the title.", "agile"),
                    "label" => __("Pitch text", "agile"),
                    "default" => "",
                    'state_handler' => array(
                        'type[heading2]' => array('show'),
                        '_else[type]' => array('hide'),
                    ),
                ),

            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "style" => $instance["style"],
            "class" => $instance["class"],
            "title" => $instance["title"],
            "pitch_text" => $instance["pitch_text"],
        );
    }

}

siteorigin_widget_register("mo-heading", __FILE__, "MO_Heading_Widget");