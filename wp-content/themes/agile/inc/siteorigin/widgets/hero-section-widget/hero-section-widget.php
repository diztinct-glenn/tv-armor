<?php

/*
Widget Name: Hero Section
Description: Full width hero section or segment with options to set parallax or video backgrounds.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Hero_Section_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-hero-section",
            __("Hero Section", "agile"),
            array(
                "description" => __("Full width section or segment with options to set parallax or video backgrounds. For best results, choose Full Width Stretched as the layout for any row containing this widget.", "agile"),
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
                    "description" => __("The id of the wrapper HTML element created by the section", "agile"),
                    "label" => __("Id", "agile"),
                ),
                "class" => array(
                    "type" => "text",
                    "description" => __("The CSS class of the HTML element wrapping the content.", "agile"),
                    "label" => __("Class", "agile"),
                    "default" => __("dark-bg", "agile"),
                ),
                "style" => array(
                    "type" => "text",
                    "description" => __("Any inline styling you would like to apply to the section. You may want to override the default top/bottom padding, provide custom markup for backgrounds etc.", "agile"),
                    "label" => __("Style", "agile"),
                ),
                "text" => array(
                    "type" => "tinymce",
                    "description" => __("The hero segment content.", "agile"),
                    "label" => __("Hero section content", "agile"),
                    "default" => __("Hero section content goes here.", "agile"),
                ),
                "background_color" => array(
                    "type" => "color",
                    "description" => __("The background color to be applied to the segment.", "agile"),
                    "label" => __("Background color", "agile"),
                ),
                "background_image" => array(
                    "type" => "media",
                    "library" => "image",
                    "description" => __("Background image for the section. If YouTube video background option is chosen, this image will be used as a placeholder image for the video.", "agile"),
                    "label" => __("Background image", "agile"),
                ),
                "parallax_background" => array(
                    "type" => "checkbox",
                    "description" => __("Specify if the background is a parallax one. On mobile devices and browser window size less than 1100px, the parallax effect is disabled.", "agile"),
                    "label" => __("Parallax background", "agile"),
                    "default" => true,
                    'state_handler' => array(
                        'bg_type[image]' => array('show'),
                        '_else[bg_type]' => array('hide'),
                    ),
                ),
                "background_speed" => array(
                    "type" => "slider",
                    "description" => __("Speed at which the parallax background moves with user scrolling the page. If the value assigned to this property is 0, the background acts like the one whose background-attachment property is set to fixed and hence does not scroll at all. A value of 1 implies the background scrolls with the page in equal increments ( same effect as background-attachment: scroll). To obtain best results, experiment with multiple values to test the parallax effect.", "agile"),
                    "label" => __("Parallax Background speed", "agile"),
                    'min' => 0,
                    'max' => 100,
                    'default' => 40,
                    'state_handler' => array(
                        'bg_type[image]' => array('show'),
                        '_else[bg_type]' => array('hide'),
                    ),
                ),
                "background_pattern" => array(
                    "type" => "media",
                    "library" => "image",
                    "description" => __("As an alternative to background image option above, choose background image which acts like a pattern. This image is repeated horizontally as well as vertically to help occupy the entire segment width.", "agile"),
                    "label" => __("Background pattern", "agile"),
                ),

                'overlay_settings' => array(
                    'type' => 'section',
                    'label' => __('Overlay Settings', 'agile'),
                    'fields' => array(
                        "overlay_color" => array(
                            "type" => "color",
                            "description" => __("The color of the overlay to be applied on the background.", "agile"),
                            "label" => __("Overlay color", "agile"),
                        ),
                        "overlay_opacity" => array(
                            "type" => "slider",
                            "description" => __("The opacity of the overlay color applied on the video.", "agile"),
                            "label" => __("Overlay opacity", "agile"),
                            'min' => 0,
                            'max' => 100,
                            'integer' => true,
                            'default' => 40
                        ),
                        "overlay_pattern" => array(
                            "type" => "media",
                            "library" => "image",
                            "description" => __("The image which can act as a pattern displayed on top of the background.", "agile"),
                            "label" => __("Overlay pattern", "agile"),
                        ),
                    )
                )
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "id" => $instance["id"],
            "class" => $instance["class"],
            "style" => $instance["style"],
            "text" => $instance["text"],
            "background_color" => $instance["background_color"],
            "background_image" => $instance["background_image"],
            "parallax_background" => $instance["parallax_background"],
            "background_speed" => $instance["background_speed"],
            "background_pattern" => $instance["background_pattern"],

            "overlay_color" => (isset($instance["overlay_settings"]["overlay_color"]) ? $instance["overlay_settings"]["overlay_color"] : ''),
            "overlay_opacity" => (isset($instance["overlay_settings"]["overlay_opacity"]) ? $instance["overlay_settings"]["overlay_opacity"] : 60),
            "overlay_pattern" => (isset($instance["overlay_settings"]["overlay_pattern"]) ? $instance["overlay_settings"]["overlay_pattern"] : ''),
        );
    }

}

siteorigin_widget_register("mo-hero-section", __FILE__, "MO_Hero_Section_Widget");

