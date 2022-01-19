<?php
/**
 * Plugin Name: Livemesh Framework Flickr Widget
 * Plugin URI: https://www.livemeshthemes.com/
 * Description: A widget that displays photos from the flickr.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

class MO_Flickr_Widget extends WP_Widget {


    /**
     * Widget setup.
     */
    public function __construct() {

        /* Widget settings. */
        $widget_ops = array('classname' => 'flickr-widget',
                            'description' => __('A widget that displays the flickr stream.', 'livemesh-theme-addons'));

        /* Widget control settings. */
        $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'mo-flickr-widget');

        /* Create the widget. */
        parent::__construct('mo-flickr-widget', __('Flickr Widget', 'livemesh-theme-addons'), $widget_ops, $control_ops);
    }

    /**
     * How to display the widget on the screen.
     */
    function widget($args, $instance) {
        extract($args);

        /* Set up some default widget settings. */
        $instance = wp_parse_args((array)$instance, $this->get_widget_defaults());

        /* Our variables from the widget settings. */
        $title = esc_html(apply_filters('widget_title', $instance['title']));
        $flickr_id = esc_html($instance['flickr_id']);
        $post_count = intval($instance['post_count']);
        $type = esc_attr($instance['type']);
        $display_mode = esc_attr($instance['display_mode']);


        /* Before widget (defined by themes). */
        echo wp_kses_post($before_widget);

        /* Display the widget title if one was input (before and after defined by themes). */
        if (trim($title) != '')
            echo wp_kses_post($before_title . $title . $after_title);

        ?>

    <div id="flickr-widget" class="clearfix">
        <script type="text/javascript"
                src="https://www.flickr.com/badge_code_v2.gne?count=<?php echo esc_attr($post_count); ?>&amp;display=<?php echo esc_attr($display_mode); ?>&amp;size=s&amp;layout=x&amp;source=<?php echo esc_attr($type); ?>&amp;<?php echo esc_attr($type); ?>=<?php echo esc_attr($flickr_id); ?>"></script>
    </div>

    <?php

        /* After widget (defined by themes). */
        echo wp_kses_post($after_widget);
    }

    /**
     * Update the widget settings.
     */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['flickr_id'] = sanitize_text_field($new_instance['flickr_id']);
        $instance['post_count'] = sanitize_text_field($new_instance['post_count']);

        /* No need to strip tags for source type and display mode. */
        $instance['type'] = $new_instance['type'];
        $instance['display_mode'] = $new_instance['display_mode'];

        return $instance;
    }

    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */
    function form($instance) {

        /* Set up some default widget settings. */
        $instance = wp_parse_args((array)$instance, $this->get_widget_defaults()); ?>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Widget Title:', 'livemesh-theme-addons'); ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
               name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>"><?php esc_html_e('Flickr ID:', 'livemesh-theme-addons'); ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>"
               name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" value="<?php echo esc_attr($instance['flickr_id']); ?>"/>
    </p>

    <p>
        <label
            for="<?php echo esc_attr($this->get_field_id('post_count')); ?>"><?php esc_html_e('Number of Photos:', 'livemesh-theme-addons'); ?></label>
        <input type="text" class="smallfat" id="<?php echo esc_attr($this->get_field_id('post_count')); ?>"
               name="<?php echo esc_attr($this->get_field_name('post_count')); ?>"
               value="<?php echo esc_attr($instance['post_count']); ?>"/>
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php esc_html_e('Source Type:', 'livemesh-theme-addons'); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id('type')); ?>"
                name="<?php echo esc_attr($this->get_field_name('type')); ?>">
            <option <?php if ('user' == $instance['type']) echo 'selected="selected"'; ?>>user</option>
            <option <?php if ('group' == $instance['type']) echo 'selected="selected"'; ?>>group</option>
        </select>
    </p>

    <p>
        <label
            for="<?php echo esc_attr($this->get_field_id('display_mode')); ?>"><?php esc_html_e('Display Mode:', 'livemesh-theme-addons'); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id('display_mode')); ?>"
                name="<?php echo esc_attr($this->get_field_name('display_mode')); ?>">
            <option <?php if ('latest' == $instance['display_mode']) echo 'selected="selected"'; ?>>latest</option>
            <option <?php if ('random' == $instance['display_mode']) echo 'selected="selected"'; ?>>random</option>
        </select>
    </p>


    <?php
    }

    function get_widget_defaults() {
        /* Set up some default widget settings. */
        $defaults = array(
            'title' => esc_html__('My Photos', 'livemesh-theme-addons'),
            'flickr_id' => '56502208@N00',
            'post_count' => '6',
            'type' => 'user',
            'display_mode' => 'latest');
        return $defaults;
    }

}

?>