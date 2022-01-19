<?php

/**
 * Plugin Name: Livemesh Theme Addons
 * Plugin URI: https://www.livemeshthemes.com
 * Description: This plugin defines the addons requires by themes released by Livemesh - http://themeforest.net/user/Livemesh
 * Version: 1.2.0
 * Author: Livemesh Themes
 * Author URI: https://www.livemeshthemes.com
 * License: GPL2
 */

/**
 * Main class for the Livemesh theme framework which does the orchestration.
 *
 * @package Livemesh_Framework
 */

class Livemesh_Theme_Addons {


    /* Constructor for the class */

    function __construct() {

        add_action('plugins_loaded', array(
            &$this,
            'define_constants'
        ), 1);

        add_action('plugins_loaded', array(
            &$this,
            'i18n'
        ), 2);

        add_action('plugins_loaded', array(
            &$this,
            'load_files'
        ), 3);

        add_action('wp_enqueue_scripts', array(
            &$this,
            'enqueue_scripts'
        ), 18);
    }

    /**
     * Define framework constants
     */
    function define_constants() {
        /* Set constant path to the plugin directory. */
        define('LTA_DIR', trailingslashit(plugin_dir_path(__FILE__)));

        /* Set the constant path to the plugin directory URI. */
        define('LTA_URI', trailingslashit(plugin_dir_url(__FILE__)));

    }

    function i18n() {

        /* Load the translation of the plugin. */
        load_plugin_textdomain('lta-post-types', false, dirname(plugin_basename(__FILE__)) . '/languages/');

    }

    /**
     * Include all the required functions
     *
     */
    function load_files() {

        /**
         * Required: include OptionTree Framework for managing options.
         */
        include_once LTA_DIR . '/includes/lib/option-tree/ot-loader.php';

        /**
         * Register custom post types defined by the plugin
         */
        require_once LTA_DIR . '/includes/post-types.php';

        /**
         * Init metaboxes for posts, pages and custom post types
         */
        require_once LTA_DIR . '/includes/metaboxes.php';

        /**
         * Register widgets defined by the plugin
         */
        require_once LTA_DIR . '/includes/widgets.php';

        require_once LTA_DIR . '/includes/extras.php';

        require_once LTA_DIR . '/includes/admin.php';

    }

    function enqueue_scripts() {

        /* Slider packs */
        wp_enqueue_script('jquery-flexslider', LTA_URI . 'assets/js/lib/jquery.flexslider.min.js', array('jquery'), '1.2', true);
    }

}

new Livemesh_Theme_Addons();