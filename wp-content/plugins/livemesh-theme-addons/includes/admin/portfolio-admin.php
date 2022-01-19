<?php

/**
 * Portfolio Admin Manager - Handle the custom post types and admin functions for portfolio items
 *
 *
 * @package Livemesh_Framework
 */
class LTA_Portfolio_Admin {


    public function __construct() {

        add_action('add_meta_boxes', array($this, 'add_portfolio_meta_boxes'));

        add_action('save_post', array(&$this, 'save_portfolio'));

        // Provide data for the columns of portfolio custom post type.
        add_action("manage_portfolio_posts_custom_column", array($this, "custom_portfolio_columns"), 10, 2);

        //Manage column headers for columns displayed in the posts overview sceen. Different from above in the
        // sense that this applies to list instead of single custom post edit window.
        add_filter('manage_edit-portfolio_columns', array($this, 'edit_portfolio_columns'));

    }

    public function add_portfolio_meta_boxes() {

        add_meta_box(
            'portfolio_box',
            __('Portfolio Information', 'livemesh-theme-addons'),
            array($this, 'render_portfolio_metabox'),
            'portfolio',
            'normal',
            'high'
        );
    }

    public function render_portfolio_metabox($post) {

        $portfolio_link = get_post_meta($post->ID, '_portfolio_link_field', true);
        $portfolio_author = get_post_meta($post->ID, '_portfolio_author_field', true);
        $portfolio_client = get_post_meta($post->ID, '_portfolio_client_field', true);
        $portfolio_date = get_post_meta($post->ID, '_portfolio_date_field', true);

        $portfolio_info = get_post_meta($post->ID, '_portfolio_info_field', true);
        ?>
        <input type="hidden" name="portfolio_noncename" id="portfolio_noncename"
               value="<?php echo wp_create_nonce('portfolio_' . $post->ID); ?>"/>
        <p>
            <label for="portfolio_link"><?php echo __('Project URL:', 'livemesh-theme-addons'); ?></label><br>
            <input id="portfolio_link" name="portfolio_link" type="text" value="<?php echo esc_url($portfolio_link); ?>"/>
        </p>
        <p>
            <label for="portfolio_author"><?php echo __('Author:', 'livemesh-theme-addons'); ?></label><br>
            <input id="portfolio_author" name="portfolio_author" type="text" value="<?php echo esc_attr($portfolio_author); ?>"/>
        </p>
        <p>
            <label for="portfolio_client"><?php echo __('Client:', 'livemesh-theme-addons'); ?></label><br>
            <input id="portfolio_client" name="portfolio_client" type="text" value="<?php echo esc_attr($portfolio_client); ?>"/>
        </p>
        <p>
            <label for="portfolio_date"><?php echo __('Project Date:', 'livemesh-theme-addons'); ?></label><br>
            <input id="portfolio_date" name="portfolio_date" type="text" value="<?php echo esc_attr($portfolio_date); ?>"/>
        </p>
        <p>
            <label
                    for="portfolio_info"><?php echo __('Additional Project Notes (HTML accepted):', 'livemesh-theme-addons'); ?></label><br>
            <textarea rows="8" cols="85" id="portfolio_info"
                      name="portfolio_info"><?php echo wp_kses_post($portfolio_info); ?></textarea>
        </p>

        <?php
    }

    public function save_portfolio($post_id) {

        if (!isset($_POST['portfolio_noncename'])) {
            return $post_id;
        }

        // verify this came from the our screen and with proper authorization.
        if (!wp_verify_nonce($_POST['portfolio_noncename'], 'portfolio_' . $post_id)) {
            return $post_id;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;


        if (!current_user_can('edit_post', $post_id))
            return $post_id;


        $post = get_post($post_id);
        if ($post->post_type == 'portfolio') {
            //Save the value to a custom field for the post
            update_post_meta($post_id, '_portfolio_link_field', esc_attr($_POST['portfolio_link']));
            update_post_meta($post_id, '_portfolio_author_field', esc_attr($_POST['portfolio_author']));
            update_post_meta($post_id, '_portfolio_client_field', esc_attr($_POST['portfolio_client']));
            update_post_meta($post_id, '_portfolio_date_field', esc_attr($_POST['portfolio_date']));
            update_post_meta($post_id, '_portfolio_info_field', esc_attr($_POST['portfolio_info']));
        }
        return $post_id;
    }

    // Change only the portfolio link attributes, rest like date, title etc. will take the default values
    public function custom_portfolio_columns($column, $post_id) {
        switch ($column) {
            case "portfolio_link":
                $portfolio_link = get_post_meta($post_id, '_portfolio_link_field', true);
                echo esc_url($portfolio_link);
                break;
            case "portfolio_image":
                echo get_the_post_thumbnail($post_id, 'thumbnail', array('alt' => get_the_title()));
                break;
            case "portfolio_client":
                $portfolio_client = get_post_meta($post_id, '_portfolio_client_field', true);
                echo esc_attr($portfolio_client);
                break;
            case "portfolio_author":
                $portfolio_author = get_post_meta($post_id, '_portfolio_author_field', true);
                echo esc_attr($portfolio_author);
                break;
            case "portfolio_date":
                $portfolio_date = get_post_meta($post_id, '_portfolio_date_field', true);
                echo esc_attr($portfolio_date);
                break;
        }
    }

    public function edit_portfolio_columns($columns) {

        $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Portfolio Name', 'livemesh-theme-addons'),
            'portfolio_image' => __('Portfolio Image', 'livemesh-theme-addons'),
            'portfolio_link' => __('Portfolio Link', 'livemesh-theme-addons'),
            'portfolio_client' => __('Portfolio Client', 'livemesh-theme-addons'),
            'portfolio_author' => __('Portfolio Author', 'livemesh-theme-addons')
        );

        $columns = array_merge($new_columns, $columns);

        return $columns;
    }
}

new LTA_Portfolio_Admin();