<?php

/*
Widget Name: Service Item
Description: Displays a service item part of services.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Service_Item_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-service-item",
            __("Service Item", "agile"),
            array(
                "description" => __("Displays a service item part of services.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "title" => array(
                    "type" => "text",
                    "description" => __("The title for the service.", "agile"),
                    "label" => __("Title", "agile"),
                    "default" => __("Web Design", "agile"),
                ),
                "description" => array(
                    "type" => "textarea",
                    "description" => __("A short description of the service.", "agile"),
                    "label" => __("Description", "agile"),
                ),
                'icon' => array(
                    'type' => 'text',
                    'label' => __('Service Icon', 'agile'),
                    'description' => __('The font icon representing the service item being displayed, chosen from the list of icons listed at <a href="https://www.livemeshthemes.com/wp-content/uploads/cosmic-icons/demo.html" target="_blank">https://www.livemeshthemes.com/wp-content/uploads/cosmic-icons/demo.html</a>.', 'agile'),
                    "default" => 'icon-heart-o'
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "icon" => $instance["icon"],
            "title" => $instance["title"],
            "description" => $instance["description"],
        );
    }

}
siteorigin_widget_register("mo-service-item", __FILE__, "MO_Service_Item_Widget");