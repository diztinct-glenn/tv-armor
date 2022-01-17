<?php

/*
Widget Name: Tabs
Description: Display tabbed content.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Tabs_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-tabs",
            __("Tabs", "agile"),
            array(
                "description" => __("Display tabbed content.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),

            array(
                'title' => array(
                    'type' => 'text',
                    'label' => __('Title', 'agile'),
                ),

                'tabs' => array(
                    'type' => 'repeater',
                    'label' => __('Tabs', 'agile'),
                    'item_name' => __('Tab', 'agile'),
                    'item_label' => array(
                        'selector' => "[id*='tabs-title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(

                        'title' => array(
                            'type' => 'text',
                            'label' => __('Tab Title', 'agile'),
                            'description' => __('The title for the tab navigation.', 'agile'),
                        ),

                        "text" => array(
                            "type" => "tinymce",
                            "description" => __("The tab content.", "agile"),
                            "label" => __("Text", "agile"),
                            "default" => __("Tab content goes here.", "agile"),
                        ),
                    )
                ),

            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "title" => $instance["title"],
            'tabs' => !empty($instance['tabs']) ? $instance['tabs'] : array(),
        );
    }

}
siteorigin_widget_register("mo-tabs", __FILE__, "MO_Tabs_Widget");

