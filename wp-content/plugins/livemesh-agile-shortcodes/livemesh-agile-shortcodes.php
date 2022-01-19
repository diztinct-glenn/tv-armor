<?php
/**
 * Plugin Name: Livemesh Agile Shortcodes
 * Plugin URI: https://www.livemeshthemes.com
 * Description: This plugin captures the shortcodes supported by Agile theme released by Livemesh - http://themeforest.net/user/Livemesh
 * Version: 1.0.0
 * Author: Livemesh Themes
 * Author URI: https://www.livemeshthemes.com
 * License: GPL2
 */

/**
 * Main class for the Livemesh theme framework which does the orchestration.
 *
 * @package Livemesh_Framework
 */


if (!class_exists('Livemesh_Agile_Shortcodes')) :

    class Livemesh_Agile_Shortcodes {

        /* Constructor for the class */

        function __construct() {

            /* Set constant path to the plugin directory. */
            define('LAGS_DIR', trailingslashit(plugin_dir_path(__FILE__)));

            /* Set the constant path to the plugin directory URI. */
            define('LAGS_URI', trailingslashit(plugin_dir_url(__FILE__)));

            /* Load the translation of the plugin. */
            load_plugin_textdomain('livemesh-agile-shortcodes', false, dirname(plugin_basename(__FILE__)) . '/languages/');

            /* Load the utility functions. */

            require_once LAGS_DIR . 'includes/shortcodes.php';
            require_once LAGS_DIR . 'includes/helper-functions.php';

            add_action('wp_enqueue_scripts', array(
                &$this,
                'enqueue_scripts'
            ), 18);

        }

        function enqueue_scripts() {

            /* Slider packs */
            wp_enqueue_script('jquery-flexslider', LAGS_URI . 'assets/js/lib/jquery.flexslider.js', array('jquery'), '1.2', true);
        }

    }

endif; // End if class_exists check

new Livemesh_Agile_Shortcodes();