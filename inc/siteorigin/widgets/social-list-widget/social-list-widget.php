<?php

/*
Widget Name: Social List
Description: Display a list of social icons with links to various social network pages.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Social_List_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-social-list",
            __("Social List", "agile"),
            array(
                "description" => __("Display a list of social icons with links to various social network pages.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),
                "email" => array(
                    "type" => "text",
                    "description" => __("Email address to be used.", "agile"),
                    "label" => __("Email", "agile"),
                    "default" => "",
                ),
                "googleplus_url" => array(
                    "type" => "text",
                    "description" => __("The URL for the Google Plus page.", "agile"),
                    "label" => __("Googleplus URL", "agile"),
                    "default" => __("http://plus.google.com", "agile"),
                ),
                "facebook_url" => array(
                    "type" => "text",
                    "description" => __("The URL of the Facebook page.", "agile"),
                    "label" => __("Facebook URL", "agile"),
                    "default" => __("http://www.facebook.com", "agile"),
                ),
                "twitter_url" => array(
                    "type" => "text",
                    "description" => __("The URL of the Twitter account.", "agile"),
                    "label" => __("Twitter URL", "agile"),
                    "default" => __("http://www.twitter.com", "agile"),
                ),
                "youtube_url" => array(
                    "type" => "text",
                    "description" => __("The URL for the YouTube channel.", "agile"),
                    "label" => __("YouTube URL", "agile"),
                    "default" => __("http://www.youtube.com/", "agile"),
                ),
                "linkedin_url" => array(
                    "type" => "text",
                    "description" => __("The URL for the LinkedIn profile.", "agile"),
                    "label" => __("LinkedIn URL", "agile"),
                    "default" => __("http://www.linkedin.com", "agile"),
                ),
                "vimeo_url" => array(
                    "type" => "text",
                    "description" => __("The URL for the Vimeo channel.", "agile"),
                    "label" => __("Vimeo URL", "agile"),
                    "default" => __("http://vimeo.com", "agile"),
                ),
                "instagram_url" => array(
                    "type" => "text",
                    "description" => __("The URL to your Instagram account.", "agile"),
                    "label" => __("Instagram URL", "agile"),
                    "default" => __("http://www.instagram.com", "agile"),
                ),
                "dribbble_url" => array(
                    "type" => "text",
                    "description" => __("The URL of the Dribbble page.", "agile"),
                    "label" => __("Dribbble URL", "agile"),
                    "default" => __("http://www.dribbble.com", "agile"),
                ),
                "flickr_url" => array(
                    "type" => "text",
                    "description" => __("The URL of the Flickr page.", "agile"),
                    "label" => __("Flickr URL", "agile"),
                    "default" => __("http://flickr.com", "agile"),
                ),
                "skype_url" => array(
                    "type" => "text",
                    "description" => __("The URL for the Skype id.", "agile"),
                    "label" => __("Skype URL", "agile"),
                    "default" => __("http://www.skype.com/", "agile"),
                ),
                "pinterest_url" => array(
                    "type" => "text",
                    "description" => __("The URL for the Pinterest account.", "agile"),
                    "label" => __("Pinterest URL", "agile"),
                    "default" => __("http://www.pinterest.com", "agile"),
                ),
                "behance_url" => array(
                    "type" => "text",
                    "description" => __("The URL of the Behance page.", "agile"),
                    "label" => __("Behance URL", "agile"),
                    "default" => __("http://www.behance.com", "agile"),
                ),
                "include_rss" => array(
                    "type" => "checkbox",
                    "description" => __("Include RSS feed URL. ", "agile"),
                    "label" => __("Include rss", "agile"),
                    "default" => false,
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "email" => $instance["email"],
            "googleplus_url" => $instance["googleplus_url"],
            "facebook_url" => $instance["facebook_url"],
            "twitter_url" => $instance["twitter_url"],
            "youtube_url" => $instance["youtube_url"],
            "linkedin_url" => $instance["linkedin_url"],
            "vimeo_url" => $instance["vimeo_url"],
            "instagram_url" => $instance["instagram_url"],
            "dribbble_url" => $instance["dribbble_url"],
            "flickr_url" => $instance["flickr_url"],
            "skype_url" => $instance["skype_url"],
            "pinterest_url" => $instance["pinterest_url"],
            "behance_url" => $instance["behance_url"],
            "include_rss" => $instance["include_rss"],
        );
    }

}
siteorigin_widget_register("mo-social-list", __FILE__, "MO_Social_List_Widget");

