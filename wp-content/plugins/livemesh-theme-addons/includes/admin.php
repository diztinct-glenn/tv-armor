<?php


/**
 * Manage admin functions for the theme
 *
 *
 * @package Livemesh_Framework
 */
class LTA_Admin {

    public function __construct() {

        $this->includes();

        $this->hooks();

    }

    public function includes() {

        if (is_admin()) {

            include_once LTA_DIR . '/includes/admin/page-admin.php';

            include_once LTA_DIR . '/includes/admin/portfolio-admin.php';

            include_once LTA_DIR . '/includes/admin/post-types-admin.php';

        }

    }

    public function hooks() {

        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));

        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_styles'));

        add_action('wp_ajax_update-page-section-order', array($this, 'save_page_section_order'));

    }

    public function admin_enqueue_scripts($hook) {

        if (($hook == 'post.php') || ($hook == 'post-new.php') || ($hook == 'page.php') || ($hook == 'page-new.php')) {
            wp_enqueue_script('mo-admin-js', LTA_URI . '/assets/js/admin.js', array('jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-droppable'), '1.0', true);
        }

        if ($hook == 'appearance_page_ot-theme-options') {
            wp_enqueue_script('mo-itoggle-js', LTA_URI . '/assets/js/lib/jquery.simplecheckbox.js');
        }

    }

    public function admin_enqueue_styles($hook) {

        wp_enqueue_style('lta-admin-css', LTA_URI . '/assets/css/admin.css');

        wp_enqueue_style('ot-custom-style', LTA_URI . '/assets/css/ot-custom-style.css', array('ot-admin-css'));

    }

    public function add_editor_styles() {

        add_editor_style('css/custom-editor-style.css');

    }

    public function save_page_section_order() {

        $post_id = $_POST['page_id'];

        $nonce = $_POST['security'];
        if (!wp_verify_nonce($nonce, 'page_section_' . $post_id))
            die('-1');

        $order = $_POST['order'];

        $page_sections = "";
        if (!empty($order)) {
            $order = wp_parse_args($order);
            $order = $order['section'];
            $page_sections = implode(',', array_values($order));
        }

        /* Update even if empty to indicate that no page sections were selected to empty the page section bin */
        update_post_meta($post_id, '_page_section_order_field', $page_sections);

    }

}

new LTA_Admin();



