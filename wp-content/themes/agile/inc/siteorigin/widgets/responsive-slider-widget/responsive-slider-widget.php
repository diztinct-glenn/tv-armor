<?php

/*
Widget Name: Responsive Slider
Description: Create a touch friendly responsive slider of a collection of HTML content.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Responsive_Slider_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-responsive-slider",
            __("Responsive Slider", "agile"),
            array(
                "description" => __("Create a touch friendly responsive slider of a collection of HTML content.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),
                "id" => array(
                    "type" => "text",
                    "description" => __("The element id to be set for the slider container DIV element. (optional).", "agile"),
                    "label" => __("Id", "agile"),
                ),

                "style" => array(
                    "type" => "text",
                    "description" => __(" The inline CSS applied to the slider container DIV element.(optional)", "agile"),
                    "label" => __("Style", "agile"),
                    "default" => "",
                ),
                "type" => array(
                    "type" => "text",
                    "description" => __("Constructs and sets a unique CSS class for the slider. (optional).", "agile"),
                    "label" => __("Type", "agile"),
                    "default" => "flex",
                ),

                'elements' => array(
                    'type' => 'repeater',
                    'label' => __('HTML Elements', 'agile'),
                    'item_name' => __('HTML Element', 'agile'),
                    'item_label' => array(
                        'selector' => "[id*='elements-name']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'name' => array(
                            'type' => 'text',
                            'label' => __('Name', 'agile'),
                            'description' => __('The title to identify the HTML element', 'agile'),
                        ),

                        'text' => array(
                            'type' => 'tinymce',
                            'label' => __('HTML element', 'agile'),
                            'description' => __('The HTML content for the slider item.', 'agile'),
                        ),
                    )
                ),


                'settings' => array(
                    'type' => 'section',
                    'label' => __('Slider Settings', 'agile'),
                    'fields' => array(

                        "animation" => array(
                            "type" => "select",
                            "description" => __("Select your animation type.", "agile"),
                            "label" => __("Animation", "agile"),
                            "options" => array(
                                "slide" => __("Slide", "agile"),
                                "fade" => __("Fade", "agile"),
                            ),
                            "default" => "slide",
                        ),
                        "control_nav" => array(
                            "type" => "checkbox",
                            "description" => __("Create navigation for paging control of each slide?", "agile"),
                            "label" => __("Control navigation?", "agile"),
                            "default" => true,
                        ),
                        "direction_nav" => array(
                            "type" => "checkbox",
                            "description" => __("Create navigation for previous/next navigation?", "agile"),
                            "label" => __("Direction navigation?", "agile"),
                            "default" => false,
                        ),
                        "pause_on_hover" => array(
                            "type" => "checkbox",
                            "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering.", "agile"),
                            "label" => __("Pause on hover?", "agile"),
                            "default" => true,
                        ),
                        "pause_on_action" => array(
                            "type" => "checkbox",
                            "description" => __("Pause the slideshow when interacting with control elements.", "agile"),
                            "label" => __("Pause on action?", "agile"),
                            "default" => true,
                        ),
                        "loop" => array(
                            "type" => "checkbox",
                            "description" => __("Should the animation loop?", "agile"),
                            "label" => __("Loop", "agile"),
                            "default" => true,
                        ),
                        "slideshow" => array(
                            "type" => "checkbox",
                            "description" => __("Animate slider automatically without user intervention?", "agile"),
                            "label" => __("Slideshow", "agile"),
                            "default" => true,
                        ),
                        "slideshow_speed" => array(
                            "type" => "number",
                            "description" => __("Set the speed of the slideshow cycling, in milliseconds", "agile"),
                            "label" => __("Slideshow speed", "agile"),
                            "default" => 5000,
                        ),
                        "animation_speed" => array(
                            "type" => "number",
                            "description" => __("Set the speed of animations, in milliseconds.", "agile"),
                            "label" => __("Animation speed", "agile"),
                            "default" => 600,
                        ),
                    )
                )
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "id" => $instance["id"],
            "style" => $instance["style"],
            "type" => $instance["type"],

            "animation" => $instance["settings"]["animation"],
            "control_nav" => $instance["settings"]["control_nav"],
            "direction_nav" => $instance["settings"]["direction_nav"],
            "pause_on_hover" => $instance["settings"]["pause_on_hover"],
            "pause_on_action" => $instance["settings"]["pause_on_action"],
            "loop" => $instance["settings"]["loop"],
            "slideshow" => $instance["settings"]["slideshow"],
            "slideshow_speed" => $instance["settings"]["slideshow_speed"],
            "animation_speed" => $instance["settings"]["animation_speed"],


            'elements' => !empty($instance['elements']) ? $instance['elements'] : array(),
        );
    }

}

siteorigin_widget_register("mo-responsive-slider", __FILE__, "MO_Responsive_Slider_Widget");

