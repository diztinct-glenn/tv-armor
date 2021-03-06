<?php

/**
 * Plugin Name: Livemesh Framework Related Posts
 * Plugin URI: https://www.livemeshthemes.com/
 * Description: A widget that displays the related posts with thumbnails and excerpts for the user.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
class MO_Related_Posts_Widget extends WP_Widget {

    /**
     * Widget setup.
     */
    public function __construct() {

        /* Widget settings. */
        $widget_ops = array('classname' => 'related-posts-widget',
                            'description' => esc_html__('A widget that displays the related posts with thumbnails.', 'livemesh-theme-addons'));

        /* Widget control settings. */
        $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'mo-related-posts-widget');

        /* Create the widget. */
        parent::__construct('mo-related-posts-widget', esc_html__('Related Posts Widget', 'livemesh-theme-addons'), $widget_ops, $control_ops);
    }

    /**
     * How to display the widget on the screen.
     */
    function widget($args, $instance) {
        extract($args);

        /* Set up some default widget settings. */
        $instance = wp_parse_args((array)$instance, $this->get_widget_defaults());

        /* Show this widget only for single posts. Does not make much sense to show on pages too */
        if (!is_single())
            return;

        /* Our variables from the widget settings. */
        $title = esc_html(apply_filters('widget_title', $instance['title']));
        $post_count = intval($instance['post_count']);


        $match = $instance['match_taxonomy'];

        global $post;

        $categories = get_the_category($post->ID);
        $category_ids = array();
        if ($categories) {
            foreach ($categories as $cat)
                $category_ids[] = $cat->term_id;
        }

        $tags = wp_get_post_tags($post->ID);
        $tag_ids = array();
        if ($tags) {
            foreach ($tags as $tag)
                $tag_ids[] = $tag->term_id;
        }

        if ($match == 'category') {
            if (!$categories)
                return;
            $category_list = implode(", ", $category_ids);
            $query = array('cat' => $category_list);
        }
        elseif ($match == 'tag') {
            if (!$tags)
                return;
            $tag_list = implode(", ", $tag_ids);
            $query = array('tag__in' => $tag_ids);
        }
        elseif ($match == 'both') {
            if (!$categories && !$tags)
                return;
            $query = array('category__in' => $category_ids, 'tag__in' => $tag_ids);
        }

        $query = array_merge($query, array('post__not_in' => array($post->ID), 'posts_per_page' => $post_count, 'ignore_sticky_posts' => 1));

        /* Before widget (defined by themes). */
        echo wp_kses_post($before_widget);

        /* Display the widget title if one was input (before and after defined by themes). */
        if (trim($title) != '')
            echo wp_kses_post($before_title . $title . $after_title);

        $args = array(
            'show_meta' => ($instance['show_meta'] ? true : false),
            'hide_thumbnail' => ($instance['hide_thumbnail'] ? true : false),
            'excerpt_count' => intval($instance['excerpt_count']),
            'query_args' => $query
        );

        lta_get_template_part('templates/widgets/loop-post-list', null, array('args' => $args));

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
        $instance['post_count'] = sanitize_text_field($new_instance['post_count']);
        $instance['excerpt_count'] = sanitize_text_field($new_instance['excerpt_count']);

        // no stripping tags for checkbox content
        $instance['hide_thumbnail'] = !empty($new_instance['hide_thumbnail']) ? 1 : 0;
        $instance['show_meta'] = !empty($new_instance['show_meta']) ? 1 : 0;

        $instance['match_taxonomy'] = $new_instance['match_taxonomy'];

        return $instance;
    }

    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */
    function form($instance) {

        /* Set up some default widget settings. */
        $instance = wp_parse_args((array)$instance, $this->get_widget_defaults());

        $show_meta = isset($instance['show_meta']) ? (bool)$instance['show_meta'] : false;

        $hide_thumbnail = isset($instance['hide_thumbnail']) ? (bool)$instance['hide_thumbnail'] : false;
        ?>

        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Widget Title:', 'livemesh-theme-addons'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                   value="<?php echo esc_attr($instance['title']); ?>"/>
        </p>

        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('post_count')); ?>"><?php esc_html_e('Post Count:', 'livemesh-theme-addons'); ?></label>
            <input type="text" class="smallfat" id="<?php echo esc_attr($this->get_field_id('post_count')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('post_count')); ?>"
                   value="<?php echo esc_attr($instance['post_count']); ?>"/>
        </p>

        <p>
            <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('hide_thumbnail')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('hide_thumbnail')); ?>" <?php checked($hide_thumbnail); ?>/>
            <label
                for="<?php echo esc_attr($this->get_field_id('hide_thumbnail')); ?>"><?php esc_html_e('Hide Thumbnail?', 'livemesh-theme-addons'); ?></label>
        </p>

        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('excerpt_count')); ?>"><?php esc_html_e('Length of Summary:', 'livemesh-theme-addons'); ?></label>
            <input type="text" class="smallfat" id="<?php echo esc_attr($this->get_field_id('excerpt_count')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('excerpt_count')); ?>"
                   value="<?php echo esc_attr($instance['excerpt_count']); ?>"/>
            <small>(0 for no excerpt)</small>
        </p>

        <p>
            <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('show_meta')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('show_meta')); ?>" <?php checked($show_meta); ?>/>
            <label
                for="<?php echo esc_attr($this->get_field_id('show_meta')); ?>"><?php esc_html_e('Show Post Meta?', 'livemesh-theme-addons'); ?></label>
        </p>

        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('match_taxonomy')); ?>"><?php esc_html_e('Match:', 'livemesh-theme-addons'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('match_taxonomy')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('match_taxonomy')); ?>">
                <option value='category' <?php selected($instance['match_taxonomy'], 'category'); ?>>Category</option>
                <option value='tag' <?php selected($instance['match_taxonomy'], 'tag'); ?>>Tag</option>
                <option value='both' <?php selected($instance['match_taxonomy'], 'both'); ?>>Both</option>
            </select>
        </p>

        <?php
    }

    function get_widget_defaults() {
        /* Set up some default widget settings. */
        $defaults = array('title' => esc_html__('Related Posts', 'livemesh-theme-addons'),
                          'post_count' => '5',
                          'excerpt_count' => '100',
                          'hide_thumbnail' => false,
                          'show_meta' => false,
                          'match_taxonomy' => 'category');

        return $defaults;
    }

}

?>