<?php

/*
Widget Name: Animate Numbers
Description: Animate from a starting value to a end number when the user scrolls to this section.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Animate_Numbers_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-animate-numbers",
            __("Animate Numbers", "agile"),
            array(
                "description" => __("Animate from a starting value to a end number when the user scrolls to this section.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),

            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),

                'animate_numbers' => array(
                    'type' => 'repeater',
                    'label' => __('Animating Numbers', 'agile'),
                    'item_name' => __('Animating Number', 'agile'),
                    'item_label' => array(
                        'selector' => "[id*='animate_numbers-stats_title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'stats_title' => array(
                            'type' => 'text',
                            'label' => __('Stats Title', 'agile'),
                            'description' => __('The title for the stats', 'agile'),
                            "default" => __("Hours Worked", "agile"),
                        ),

                        'start_value' => array(
                            'type' => 'number',
                            'label' => __('Start Value', 'agile'),
                            'description' => __('The start value for the stats.', 'agile'),
                            "default" => 87,
                        ),

                        'stop_value' => array(
                            'type' => 'number',
                            'label' => __('Stop Value', 'agile'),
                            'description' => __('The stop value for the stats.', 'agile'),
                            "default" => 2648,
                        ),

                        'icon' => array(
                            'type' => 'text',
                            'label' => __('Stats Icon', 'agile'),
                            'description' => __('The font icon to be displayed for the statistic being displayed, chosen from the list of icons listed at <a href="https://www.livemeshthemes.com/wp-content/uploads/cosmic-icons/demo.html" target="_blank">https://www.livemeshthemes.com/wp-content/uploads/cosmic-icons/demo.html</a>.', 'agile'),
                            "default" => 'icon-hourglass-o'
                        ),
                    )
                ),

            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            'animate_numbers' => !empty($instance['animate_numbers']) ? $instance['animate_numbers'] : array(),
        );
    }

}
siteorigin_widget_register("mo-animate-numbers", __FILE__, "MO_Animate_Numbers_Widget");

