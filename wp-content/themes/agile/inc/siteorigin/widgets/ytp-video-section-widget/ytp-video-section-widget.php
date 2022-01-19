<?php

/*
  Widget Name: YouTube Video Section
  Description: Displays a section with YouTube video background. Controls for play pause mute are provided to the bottom right.
  Author: LiveMesh
  Author URI: https://www.livemeshthemes.com
 */

class MO_YTP_Video_Section_Widget extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            "mo-ytp-video-section", __("YouTube Video Section", "agile"), array(
            "description" => __("Displays a section with YouTube video background. Controls for play/pause/mute are provided to the bottom right.", "agile"),
            "panels_icon" => "dashicons dashicons-minus",
        ), array(), array(
                "id" => array(
                    "type" => "text",
                    "description" => __("The id of the DIV element created to wrap the YouTube video", "agile"),
                    "label" => __("Id", "agile"),
                    "default" => __("video-intro", "agile"),
                ),
                "class" => array(
                    "type" => "text",
                    "description" => __("The CSS class of the DIV element created to wrap the YouTube video", "agile"),
                    "label" => __("Class", "agile"),
                    "default" => "",
                ),
                'video_url' => array(
                    'type' => 'text',
                    'description' => __("The YouTube URL of the video.", "agile"),
                    'label' => __("Video url", "agile"),
                    "default" => "http://www.youtube.com/watch?v=RdIh8GiVR9I",
                ),
                "placeholder_url" => array(
                    'type' => 'media',
                    'library' => 'image',
                    'fallback' => true,
                    "description" => __("The placeholder image to be displayed instead of YouTube video in mobile devices.", "agile"),
                    "label" => __("Placeholder Image", "agile"),
                ),
                "text" => array(
                    "type" => "text",
                    "description" => __("The title text displayed on top of the video.", "agile"),
                    "label" => __("Text", "agile"),
                    "default" => "",
                ),
                "button_text" => array(
                    "type" => "text",
                    "description" => __("Text of the button shown to the user on top of the video.", "agile"),
                    "label" => __("Button text", "agile"),
                    "default" => __("Purchase Now »", "agile"),
                ),
                "button_url" => array(
                    "type" => "link",
                    "description" => __("The URL to which the button needs to point to.", "agile"),
                    "label" => __("Button url", "agile"),
                    "default" => __("http://example.com", "agile"),
                ),


                'overlay_settings' => array(
                    'type' => 'section',
                    'label' => __('Overlay Settings', 'agile'),
                    'fields' => array(
                        "overlay_color" => array(
                            "type" => "color",
                            "description" => __("The color of the overlay to be applied on the video.", "agile"),
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
                            'fallback' => true,
                            "description" => __("The image which can act as a pattern displayed on top of the video.", "agile"),
                            "label" => __("Overlay pattern", "agile"),
                        ),
                    )
                ),

                'settings' => array(
                    'type' => 'section',
                    'label' => __('Settings', 'agile'),
                    'fields' => array(
                        "containment" => array(
                            "type" => "select",
                            "description" => __("The CSS selector of the DOM element where you want the video background; if not specified it takes the “body”; if set to “self” the player will be instanced on that element.", "agile"),
                            "label" => __("Containment", "agile"),
                            "default" => __("self", "agile"),
                            "options" => array(
                                "self" => __("self", "agile"),
                                "body" => __("body", "agile"),
                            )
                        ),
                        "loop" => array(
                            "type" => "checkbox",
                            "description" => __("Specify if you need to loop the video", "agile"),
                            "label" => __("Loop", "agile"),
                            "default" => true,
                        ),
                        "mute" => array(
                            "type" => "checkbox",
                            "description" => __("A boolean value indicating if the video needs to be started muted. The user can unmute/mute during video play if required with the help of mute/unmute button", "agile"),
                            "label" => __("Mute", "agile"),
                            "default" => true,
                        ),
                        "quality" => array(
                            "type" => "select",
                            "label" => __("Video Quality.", "agile"),
                            "options" => array(
                                "default" => __("Default", "agile"),
                                "medium" => __("Medium", "agile"),
                                "large" => __("Large", "agile"),
                                "hd720" => __("hd720", "agile"),
                                "hd1080" => __("hd1080", "agile"),
                                "highres" => __("highres", "agile"),
                            ),
                            "default" => "default"
                        ),
                        "opacity" => array(
                            "type" => "slider",
                            "label" => __("Video opacity", "agile"),
                            'min' => 0,
                            'max' => 100,
                            'integer' => true,
                            'default' => 100
                        ),
                        "vol" => array(
                            'type' => 'slider',
                            "description" => __("Set the volume level of the video.", "agile"),
                            "label" => __("Volume", "agile"),
                            'min' => 1,
                            'max' => 100,
                            'integer' => true,
                            'default' => 50,
                        ),
                        "ratio" => array(
                            "type" => "select",
                            "label" => __("Aspect Ratio", "agile"),
                            "default" => "16/9",
                            "options" => array(
                                "4/3" => __("4/3", "agile"),
                                "16/9" => __("16/9", "agile"),
                            )
                        ),
                        "autoplay" => array(
                            "type" => "checkbox",
                            "description" => __("Specify if the video should autoplay once the video once ready.", "agile"),
                            "label" => __("Autoplay", "agile"),
                            "default" => true,
                        ),
                        "optimize_display" => array(
                            "type" => "checkbox",
                            "description" => __("Will fit the video size into the window size optimizing the view.", "agile"),
                            "label" => __("Optimize Display", "agile"),
                            "default" => true,
                        ),
                        "start_at" => array(
                            "type" => "number",
                            "description" => __("Set the seconds the video should start at", "agile"),
                            "label" => __("Start At ", "agile"),
                            "default" => 0,
                        ),
                        "stop_at" => array(
                            "type" => "text",
                            "description" => __("Set the seconds the video should stop at. If 0, the value is ignored.", "agile"),
                            "label" => __("Stop At", "agile"),
                            "default" => 0,
                        ),
                        "show_controls" => array(
                            "type" => "checkbox",
                            "description" => __("Show or hide the controls bar at the bottom of the page.", "agile"),
                            "label" => __("Show Controls", "agile"),
                            "default" => false,
                        ),

                    )
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(

            "id" => $instance["id"],
            "class" => $instance["class"],
            "video_url" => $instance["video_url"],
            "placeholder_url" => $instance["placeholder_url"],
            "placeholder_url_fallback" => $instance["placeholder_url_fallback"],
            "text" => $instance["text"],
            "button_text" => $instance["button_text"],
            "button_url" => (!empty($instance['button_url'])) ? sow_esc_url($instance['button_url']) : '',

            "overlay_color" => (isset($instance["overlay_settings"]["overlay_color"]) ? $instance["overlay_settings"]["overlay_color"] : ''),
            "overlay_opacity" => (isset($instance["overlay_settings"]["overlay_opacity"]) ? $instance["overlay_settings"]["overlay_opacity"] : 40),
            "overlay_pattern" => (isset($instance["overlay_settings"]["overlay_pattern"]) ? $instance["overlay_settings"]["overlay_pattern"] : ''),
            "overlay_pattern_fallback" => (isset($instance["overlay_settings"]["overlay_pattern_fallback"]) ? $instance["overlay_settings"]["overlay_pattern_fallback"] : ''),


            'settings' => $instance['settings']
        );
    }

}

siteorigin_widget_register("mo-ytp-video-section", __FILE__, "MO_YTP_Video_Section_Widget");


