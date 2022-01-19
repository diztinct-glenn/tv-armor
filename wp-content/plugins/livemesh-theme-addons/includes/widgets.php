<?php


include_once LTA_DIR . '/includes/widgets/advertisement-125-widget.php';

include_once LTA_DIR . '/includes/widgets/popular-posts-widget.php';
include_once LTA_DIR . '/includes/widgets/recent-posts-widget.php';
include_once LTA_DIR . '/includes/widgets/author-widget.php';
include_once LTA_DIR . '/includes/widgets/flickr-widget.php';
include_once LTA_DIR . '/includes/widgets/featured-posts-widget.php';
include_once LTA_DIR . '/includes/widgets/related-posts-widget.php';
include_once LTA_DIR . '/includes/widgets/social-networks-widget.php';
include_once LTA_DIR . '/includes/widgets/contact-info-widget.php';


/**
 * Registers new widgets for the theme.
 *
 */
if (!function_exists('lta_register_widgets')) {
    function lta_register_widgets() {

        register_widget('MO_Popular_Posts_Widget');
        register_widget('MO_Recent_Posts_Widget');
        register_widget('MO_Author_Widget');
        register_widget('MO_Featured_Posts_Widget');
        register_widget('MO_Contact_Info_Widget');

        register_widget('MO_Related_Posts_Widget');

        register_widget('MO_Social_Networks_Widget');
        register_widget('MO_Advertisement_125_Widget');
        register_widget('MO_Flickr_Widget');
    }
}

add_action('widgets_init', 'lta_register_widgets');