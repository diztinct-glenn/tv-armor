<?php

/*
Widget Name: Device Slider
Description: Create a browser, smartphone, tablet or a desktop slider
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Device_Slider_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-device-slider",
            __("Device Slider", "agile"),
            array(
                "description" => __("Create a image slider part of a container that looks like a browser, smartphone, tablet or a desktop", "agile"),
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
                    "description" => __("The ID for the slider container DIV element. Make sure you provide an ID if you have multiple device sliders on a page.", "agile"),
                    "label" => __("ID", "agile"),
                    "default" => "",
                ),
                "style" => array(
                    "type" => "text",
                    "description" => __("The inline CSS applied to the slider container DIV element", "agile"),
                    "label" => __("Style", "agile"),
                    "default" => "",
                ),
                "device" => array(
                    "type" => "select",
                    "description" => __("The device type for the slider.", "agile"),
                    "label" => __("Device", "agile"),
                    "options" => array(
                        "iphone" => __("iPhone", "agile"),
                        "iphone7gold" => __("iPhone 7 Gold", "agile"),
                        "iphone7rosegold" => __("iPhone 7 Rose Gold", "agile"),
                        "iphone7silver" => __("iPhone 7 Silver", "agile"),
                        "iphone7black" => __("iPhone 7 Black", "agile"),
                        "iphone7jetblack" => __("iPhone 7 Jet Black", "agile"),
                        "googlepixelsilver" => __("Google Pixel Silver", "agile"),
                        "googlepixelblue" => __("Google Pixel Blue", "agile"),
                        "googlepixelblack" => __("Google Pixel Black", "agile"),
                        "nexus6p" => __("Huawei Nexus 6p", "agile"),
                        "galaxys7" => __("Samsung Galaxy S7", "agile"),
                        "galaxys4" => __("Samsung Galaxy S", "agile"),
                        "htcone" => __("HTC One", "agile"),
                        "ipad" => __("iPad", "agile"),
                        "imac" => __("iMac", "agile"),
                        "macbook" => __("MacBook", "agile"),
                        "browser" => __("Web Browser", "agile"),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array('device')
                    ),
                ),
                "browser_url" => array(
                    "type" => "text",
                    "description" => __("If the device specified is browser, this provides the URL to be displayed in the address bar of the browser.", "agile"),
                    "label" => __("Browser url", "agile"),
                    "default" => __("https://www.livemeshthemes.com/", "agile"),
                    'state_handler' => array(
                        'device[browser]' => array('show'),
                        '_else[device]' => array('hide'),
                    ),
                ),

                'slides' => array(
                    'type' => 'repeater',
                    'label' => __('Image Slides', 'agile'),
                    'item_name' => __('Slide', 'agile'),
                    'item_label' => array(
                        'selector' => "[id*='slides-name']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'name' => array(
                            'type' => 'text',
                            'label' => __('Name', 'agile'),
                            'description' => __('The title to identify the image slide.', 'agile'),
                        ),
                        'slider_image' => array(
                            'type' => 'media',
                            'library' => 'image',
                            'label' => __('Slide Image', 'agile'),
                            'fallback' => true,
                        ),
                    ),
                ),

                'settings' => array(
                    'type' => 'section',
                    'label' => __('Slider Settings', 'agile'),
                    'fields' => array(

                        "animation" => array(
                            "type" => "select",
                            "description" => __("Select your animation type", "agile"),
                            "label" => __("Animation", "agile"),
                            "options" => array(
                                "slide" => __("Slide", "agile"),
                                "fade" => __("Fade", "agile"),
                            ),
                            "default" => "slide",
                        ),
                        "direction_nav" => array(
                            "type" => "checkbox",
                            "description" => __("Create navigation for previous/next navigation?", "agile"),
                            "label" => __("Direction navigation?", "agile"),
                            "default" => true,
                        ),
                        "control_nav" => array(
                            "type" => "checkbox",
                            "description" => __("Create navigation for paging control of each slide? ", "agile"),
                            "label" => __("Control navigation?", "agile"),
                            "default" => false,
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
                        "pause_on_action" => array(
                            "type" => "checkbox",
                            "description" => __("Pause the slideshow when interacting with control elements", "agile"),
                            "label" => __("Pause on action?", "agile"),
                            "default" => true,
                        ),
                        "pause_on_hover" => array(
                            "type" => "checkbox",
                            "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering.", "agile"),
                            "label" => __("Pause on hover?", "agile"),
                            "default" => true,
                        ),
                        "easing" => array(
                            "type" => "select",
                            "description" => __("Determines the easing method used in jQuery transitions", "agile"),
                            "label" => __("Easing", "agile"),
                            "options" => array(
                                "swing" => __("Swing", "agile"),
                                "linear" => __("Linear", "agile"),
                            ),
                            "default" => "swing",
                        ),
                    )
                )
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "style" => $instance["style"],
            "id" => $instance["id"],
            "device" => $instance["device"],
            "browser_url" => $instance["browser_url"],

            "animation" => $instance["settings"]["animation"],
            "direction_nav" => $instance["settings"]["direction_nav"],
            "control_nav" => $instance["settings"]["control_nav"],
            "slideshow_speed" => $instance["settings"]["slideshow_speed"],
            "animation_speed" => $instance["settings"]["animation_speed"],
            "pause_on_action" => $instance["settings"]["pause_on_action"],
            "pause_on_hover" => $instance["settings"]["pause_on_hover"],
            "easing" => $instance["settings"]["easing"],

            "slides" => !empty($instance["slides"]) ? $instance["slides"] : array()
        );
    }

}

siteorigin_widget_register("mo-device-slider", __FILE__, "MO_Device_Slider_Widget");

