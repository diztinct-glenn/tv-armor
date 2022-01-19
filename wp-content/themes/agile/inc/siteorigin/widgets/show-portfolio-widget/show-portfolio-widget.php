<?php

/*
Widget Name: Show Portfolio
Description: Display portfolio in a multi-column grid, filterable by portfolio categories.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


class MO_Show_Portfolio_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            "mo-show-portfolio",
            __("Show Portfolio", "agile"),
            array(
                "description" => __("Display portfolio in a multi-column grid, filterable by portfolio categories.", "agile"),
                "panels_icon" => "dashicons dashicons-minus",
            ),
            array(),
            array(
                "widget_title" => array(
                    "type" => "text",
                    "label" => __("Title", "agile"),
                ),
                "number_of_columns" => array(
                    "type" => "slider",
                    "description" => __("Number of portfolio items to display per row. ", "agile"),
                    "label" => __("Number of columns", "agile"),
                    "min" => 1,
                    "max" => 5,
                    "integer" => true,
                    "default" => 4,
                ),
                "post_count" => array(
                    "type" => "number",
                    "description" => __("Number of portfolio items to display.", "agile"),
                    "label" => __("Post count", "agile"),
                    "default" => 12,
                ),
                "image_size" => array(
                    "type" => "select",
                    "description" => __("Size of the image to be displayed in the portfolio.", "agile"),
                    "label" => __("Image size", "agile"),
                    "options" => array(
                        "thumbnail" => __("Thumbnail", "agile"),
                        "medium-thumb" => __("Medium Thumbnail", "agile"),
                        "square-thumb" => __("Square Thumbnail", "agile"),
                        "medium" => __("Medium", "agile"),
                        "large" => __("Large", "agile"),
                        "full" => __("Full", "agile"),
                    ),
                    "default" => "medium-thumb"
                ),
                "filterable" => array(
                    "type" => "checkbox",
                    "description" => __("The portfolio items will be filterable based on portfolio categories if checked.", "agile"),
                    "label" => __("Filterable?", "agile"),
                    "default" => true,
                ),
                "no_margin" => array(
                    "type" => "checkbox",
                    "description" => __("If checked, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "agile"),
                    "label" => __("Packed Layout?", "agile"),
                    "default" => false,
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            "number_of_columns" => $instance["number_of_columns"],
            "post_count" => $instance["post_count"],
            "image_size" => $instance["image_size"],
            "filterable" => $instance["filterable"],
            "no_margin" => $instance["no_margin"],
        );
    }

}
siteorigin_widget_register("mo-show-portfolio", __FILE__, "MO_Show_Portfolio_Widget");