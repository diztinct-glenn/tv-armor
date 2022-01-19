<?php


/**
 * Manage admin functions for the theme
 *
 *
 * @package Agile
 */
class MO_Admin {

    public function __construct() {

        $this->includes();

        $this->hooks();

    }

    public function includes() {

        if (is_admin()) {

            include_once get_template_directory() . '/inc/admin/shortcodes/livemesh-shortcodes.php';

        }

    }

    public function hooks() {

        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));

        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_styles'));

        add_action('admin_init', array($this, 'add_editor_styles'));

    }

    public function admin_enqueue_scripts($hook) {

    }

    public function admin_enqueue_styles($hook) {

        wp_enqueue_style('mo-admin-css', get_template_directory_uri() . '/css/admin.css');

    }

    public function add_editor_styles() {

        add_editor_style('css/custom-editor-style.css');

    }

}

new MO_Admin();



