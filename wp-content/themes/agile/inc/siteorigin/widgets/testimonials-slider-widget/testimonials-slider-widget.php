<?php

/*
Widget Name: Testimonials Slider
Description: Display a slider of testimonial posts created in the Testimonials tab of the WordPress Admin
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Testimonials_Slider_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-testimonials-slider",
            __("Testimonials Slider", "agile"),
            array(
                "description" => __("Display a slider of testimonial posts created in the Testimonials tab of the WordPress Admin. ", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),
                "style" => array(
                    "type" => "select",
                    "description" => __("Select your slider style.", "agile"),
                    "label" => __("Style", "agile"),
                    "options" => array(
                        "style1" => __("Style 1", "agile"),
                        "style2" => __("Style 2", "agile"),
                    ),
                    "default" => "style1",
                ),
                "post_count" => array(
                    "type" => "text",
                    "description" => __("The number of testimonials to be displayed. By default displays all of the custom posts entered as testimonial in the Testimonials tab of the WordPress Admin (optional).", "agile"),
                    "label" => __("Post count", "agile"),
                    "default" => "",
                ),
                "testimonial_ids" => array(
                    "type" => "text",
                    "description" => __("A comma separated post ids of the Testimonial custom post types created in the Testimonials tab of the WordPress Admin. Helps to filter the testimonials for display (optional). Example: 234,235,236", "agile"),
                    "label" => __("Testimonial ids", "agile"),
                    "default" => "",
                ),


                'settings' => array(
                    'type' => 'section',
                    'label' => __('Slider Settings', 'agile'),
                    'fields' => array(
                        "animation" => array(
                            "type" => "select",
                            "description" => __("Select your animation type, fade or slide.", "agile"),
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
            "post_count" => $instance["post_count"],
            "style" => $instance["style"],

            "testimonial_ids" => $instance["testimonial_ids"],

            "animation" => $instance["settings"]["animation"],
            "control_nav" => $instance["settings"]["control_nav"],
            "direction_nav" => $instance["settings"]["direction_nav"],
            "pause_on_hover" => $instance["settings"]["pause_on_hover"],
            "pause_on_action" => $instance["settings"]["pause_on_action"],
            "slideshow_speed" => $instance["settings"]["slideshow_speed"],
            "animation_speed" => $instance["settings"]["animation_speed"],
        );
    }

}

siteorigin_widget_register("mo-testimonials-slider", __FILE__, "MO_Testimonials_Slider_Widget");

