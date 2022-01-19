<?php

/*
Widget Name: Stats Bars
Description: Display a set of animated line bars to display percentage stats.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Stats_Bars_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-stats-bars",
            __("Stats Bars", "agile"),
            array(
                "description" => __("Display a set of animated line bars to display percentage stats.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),

            array(
                'title' => array(
                    'type' => 'text',
                    'label' => __('Title', 'agile'),
                ),

                'stats_bars' => array(
                    'type' => 'repeater',
                    'label' => __('Stats Bars', 'agile'),
                    'item_name' => __('Stats Bar', 'agile'),
                    'item_label' => array(
                        'selector' => "[id*='title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(

                        "title" => array(
                            "type" => "text",
                            "description" => __("The title to be displayed above the stats line bar.", "agile"),
                            "label" => __("Stats title", "agile"),
                            "default" => __("Web Design 87%", "agile"),
                        ),
                        "value" => array(
                            "type" => "number",
                            "description" => __("The percentage value for the stats to be displayed.", "agile"),
                            "label" => __("Value", "agile"),
                            "default" => 87,
                        ),
                    )
                ),

            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "title" => $instance["title"],
            'stats_bars' => !empty($instance['stats_bars']) ? $instance['stats_bars'] : array(),
        );
    }

}

siteorigin_widget_register("mo-stats-bars", __FILE__, "MO_Stats_Bars_Widget");

