<?php

/**
 * Post Types Admin - Handle the custom fields of various custom post types
 *
 *
 * @package Livemesh_Framework
 */
class LTA_Post_Types_Admin {

    public function __construct() {

        /* Manage Page Section Columns */
        add_filter('manage_edit-page_section_columns', array($this, 'page_section_type_edit_columns'));
        add_action('manage_posts_custom_column', array($this, 'page_section_type_custom_columns'));

        add_filter('manage_edit-gallery_item_columns', array($this, 'gallery_item_type_edit_columns'));
        add_action('manage_posts_custom_column', array($this, 'gallery_item_type_custom_columns'));


        /* Manage Testimonials Columns */
        add_filter('manage_edit-testimonials_columns', array($this, 'testimonials_edit_columns'));
        add_action('manage_posts_custom_column', array($this, 'testimonials_columns'));

        /* Manage Team Columns */
        add_filter('manage_edit-team_columns', array($this, 'team_edit_columns'));
        add_action('manage_posts_custom_column', array($this, 'team_columns'));

        add_filter('manage_edit-pricing_columns', array($this, 'pricing_edit_columns'));
        add_action('manage_posts_custom_column', array($this, 'pricing_columns'));

        if (current_theme_supports('education-press')) {

            add_filter('manage_edit-course_columns', array($this, 'courses_edit_columns'));
            add_action('manage_posts_custom_column', array($this, 'courses_columns'));

            add_filter('manage_edit-department_columns', array($this, 'department_edit_columns'));
            add_action('manage_posts_custom_column', array($this, 'department_columns'));

            add_filter('manage_edit-news_columns', array($this, 'news_edit_columns'));
            add_action('manage_posts_custom_column', array($this, 'news_columns'));

            /* Manage Staff Columns */
            add_filter('manage_edit-staff_columns', array($this, 'staff_profiles_edit_columns'));
            add_action('manage_posts_custom_column', array($this, 'staff_profiles_columns'));
        }
        elseif (current_theme_supports('fitness-press')) {

            add_filter('manage_edit-fitness_class_columns', array($this, 'fitness_classes_edit_columns'));
            add_action('manage_posts_custom_column', array($this, 'fitness_classes_columns'));

            /* Manage Testimonials Columns */
            add_filter('manage_edit-feature_columns', array($this, 'features_edit_columns'));
            add_action('manage_posts_custom_column', array($this, 'features_columns'));

            /* Manage Trainer Columns */
            add_filter('manage_edit-trainer_columns', array($this, 'trainer_profiles_edit_columns'));
            add_action('manage_posts_custom_column', array($this, 'trainer_profiles_columns'));
        }

    }


    public function page_section_type_edit_columns($columns) {

        $new_columns = array(

            'page_section_order' => __('Order', 'livemesh-theme-addons')
        );

        $columns = array_merge($columns, $new_columns);

        return $columns;
    }


    public function page_section_type_custom_columns($column) {
        global $post;
        switch ($column) {
            case 'page_section_order':
                echo esc_html($post->menu_order);
                break;
        }
    }


    public function gallery_item_type_edit_columns($columns) {

        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Gallery Title', 'livemesh-theme-addons'),
            'gallery_thumbnail' => __('Thumbnail', 'livemesh-theme-addons'),
            'gallery_category' => __('Category', 'livemesh-theme-addons')
        );

        return $columns;
    }


    public function gallery_item_type_custom_columns($column) {
        global $post;
        switch ($column) {
            case 'gallery_category':
                echo get_the_term_list($post->ID, 'gallery_category', '', ', ', '');
                break;
            case 'gallery_thumbnail':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
        }
    }


    public function team_edit_columns($columns) {

        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Team Member Name', 'livemesh-theme-addons'),
            'team_thumbnail' => __('Thumbnail', 'livemesh-theme-addons'),
            'team_position' => __('Position', 'livemesh-theme-addons'),
            'team_category' => __('Department', 'livemesh-theme-addons'),
            'team_order' => __('Team Order', 'livemesh-theme-addons')
        );

        return $columns;
    }


    public function team_columns($column) {
        global $post;
        switch ($column) {
            case 'team_category':
                echo get_the_term_list($post->ID, 'department', '', ', ', '');
                break;
            case 'team_thumbnail':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
            case 'team_position':
                echo get_post_meta($post->ID, 'mo_position', true);
                break;
            case 'team_order':
                echo esc_html($post->menu_order);
                break;
        }
    }

    public function testimonials_edit_columns($columns) {

        if (current_theme_supports('education-press')) {
            $columns = array(
                'cb' => '<input type="checkbox" />',
                'title' => __('Title', 'livemesh-theme-addons'),
                'testimonial' => __('Testimonial', 'livemesh-theme-addons'),
                'testimonial-customer-image' => __('Student\'s Photo', 'livemesh-theme-addons'),
                'testimonial-customer-name' => __('Student\'s Name', 'livemesh-theme-addons'),
                'testimonial-customer-details' => __('Student\'s Details', 'livemesh-theme-addons'),
                'testimonial-order' => __('Testimonial Order', 'livemesh-theme-addons')
            );
        }
        else {
            $columns = array(
                'cb' => '<input type="checkbox" />',
                'title' => __('Title', 'livemesh-theme-addons'),
                'testimonial' => __('Testimonial', 'livemesh-theme-addons'),
                'testimonial-client-image' => __('Client\'s Image', 'livemesh-theme-addons'),
                'testimonial-client-name' => __('Client\'s Name', 'livemesh-theme-addons'),
                'testimonial-client-details' => __('Client Details', 'livemesh-theme-addons'),
                'testimonial-order' => __('Testimonial Order', 'livemesh-theme-addons')
            );
        }

        return $columns;
    }


    /**
     * Customizing the list view columns
     *
     * This functions is attached to the 'manage_posts_custom_column' action hook.
     */

    public function testimonials_columns($column) {
        global $post;

        if (current_theme_supports('education-press')) {
            switch ($column) {
                case 'testimonial':
                    the_excerpt();
                    break;
                case 'testimonial-customer-image':
                    echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                    break;
                case 'testimonial-customer-name':
                    echo get_post_meta($post->ID, 'mo_student_name', true);
                    break;
                case 'testimonial-customer-details':
                    echo get_post_meta($post->ID, 'mo_student_details', true);
                    break;
                case 'testimonial-order':
                    echo esc_html($post->menu_order);
                    break;
            }
        }
        else {
            switch ($column) {
                case 'testimonial':
                    the_excerpt();
                    break;
                case 'testimonial-client-image':
                    echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                    break;
                case 'testimonial-client-name':
                    echo get_post_meta($post->ID, 'mo_client_name', true);
                    break;
                case 'testimonial-client-details':
                    echo get_post_meta($post->ID, 'mo_client_details', true);
                    break;
                case 'testimonial-order':
                    echo esc_html($post->menu_order);
                    break;
            }
        }
    }


    public function pricing_edit_columns($columns) {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Pricing Plan Name', 'livemesh-theme-addons'),
            'pricing-plan-price-tag' => __('Price Tag', 'livemesh-theme-addons'),
            'pricing-tagline' => __('Tagline', 'livemesh-theme-addons'),
            'pricing-image' => __('Image', 'livemesh-theme-addons'),
            'pricing-plan-url' => __('Pricing Plan URL', 'livemesh-theme-addons'),
            'pricing-plan-order' => __('Pricing Plan Order', 'livemesh-theme-addons')
        );

        return $columns;
    }


    /**
     * Customizing the list view columns
     *
     * This functions is attached to the 'manage_posts_custom_column' action hook.
     */

    public function pricing_columns($column) {
        global $post;
        switch ($column) {
            case 'pricing-plan-price-tag':
                echo get_post_meta($post->ID, 'mo_price_tag', true);
                break;
            case 'pricing-plan-url':
                echo get_post_meta($post->ID, 'mo_pricing_url', true);
                break;
            case 'pricing-tagline':
                echo get_post_meta($post->ID, 'mo_pricing_tagline', true);
                break;
            case 'pricing-image':
                $image_url = get_post_meta($post->ID, 'mo_pricing_img', true);
                if (!empty($image_url))
                    echo '<img alt="' . $post->post_title . '" src="' . $image_url . '" /><br>';
                break;
            case 'pricing-plan-order':
                echo esc_html($post->menu_order);
                break;

        }
    }

    public function staff_profiles_edit_columns($columns) {

        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Staff Name', 'livemesh-theme-addons'),
            'staff_thumbnail' => __('Staff Photo', 'livemesh-theme-addons'),
            'staff_title' => __('Title', 'livemesh-theme-addons'),
            'staff_department' => __('Department', 'livemesh-theme-addons'),
            'staff_order' => __('Order', 'livemesh-theme-addons')
        );

        return $columns;
    }

    public function staff_profiles_columns($column) {
        global $post;
        switch ($column) {
            case 'staff_thumbnail':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
            case 'staff_title':
                $staff_title = get_post_meta($post->ID, 'mo_staff_title', true);
                if (!empty($staff_title)) {
                    echo $staff_title;
                }
                break;
            case 'staff_department':
                $department_names = array();
                $department_ids = get_post_meta($post->ID, 'mo_department_for_staff', true);
                if (!empty($department_ids)) {
                    foreach ($department_ids as $department_id) {
                        $department_names[] = get_the_title($department_id);
                    }
                }
                echo implode(', ', $department_names);
                break;
            case 'staff_order':
                echo $post->menu_order;
                break;
        }
    }

    public function courses_edit_columns($columns) {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Course Name', 'livemesh-theme-addons'),
            'course-image' => __('Thumbnail', 'livemesh-theme-addons'),
            'course-description' => __('Description', 'livemesh-theme-addons'),
            'course-staff' => __('Staff/Faculty', 'livemesh-theme-addons'),
            'course-order' => __('Course Order', 'livemesh-theme-addons')
        );

        return $columns;
    }

    /**
     * Customizing the list view columns
     *
     * This functions is attached to the 'manage_posts_custom_column' action hook.
     */
    public function courses_columns($column) {
        global $post;
        switch ($column) {
            case 'course-image':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
            case 'course-description':
                echo wp_trim_words(get_the_excerpt(), 10);
                break;
            case 'course-staff':
                $staff_names = array();
                $staff_ids = get_post_meta($post->ID, 'mo_staff_for_course', true);
                if (!empty($staff_ids)) {
                    foreach ($staff_ids as $staff_id) {
                        $staff_names[] = get_the_title($staff_id);
                    }
                }
                echo implode(', ', $staff_names);
                break;
            case 'course-order':
                echo $post->menu_order;
                break;
        }
    }

    public function department_edit_columns($columns) {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Department Name', 'livemesh-theme-addons'),
            'department-image' => __('Thumbnail', 'livemesh-theme-addons'),
            'department-description' => __('Description', 'livemesh-theme-addons'),
            'department-order' => __('Course Order', 'livemesh-theme-addons')
        );

        return $columns;
    }

    /**
     * Customizing the list view columns
     *
     * This functions is attached to the 'manage_posts_custom_column' action hook.
     */
    public function department_columns($column) {
        global $post;
        switch ($column) {
            case 'department-image':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
            case 'department-description':
                echo wp_trim_words(get_the_excerpt(), 10);
                break;
            case 'department-order':
                echo $post->menu_order;
                break;
        }
    }

    public function news_edit_columns($columns) {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Title', 'livemesh-theme-addons'),
            'news-image' => __('Thumbnail', 'livemesh-theme-addons'),
            'news-description' => __('Description', 'livemesh-theme-addons'),
            'news-order' => __('Order', 'livemesh-theme-addons')
        );

        return $columns;
    }


    /**
     * Customizing the list view columns
     *
     * This functions is attached to the 'manage_posts_custom_column' action hook.
     */

    public function news_columns($column) {
        global $post;
        switch ($column) {
            case 'news-name':
                echo get_the_title();
                break;
            case 'news-description':
                echo wp_trim_words(get_the_excerpt(), 10);
                break;
            case 'news-image':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
            case 'news-order':
                echo $post->menu_order;
                break;
        }
    }

    function trainer_profiles_edit_columns($columns) {

        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Trainer Name', 'livemesh-theme-addons'),
            'trainer_thumbnail' => __('Trainer Photo', 'livemesh-theme-addons'),
            'trainer_certifications' => __('Certifications', 'livemesh-theme-addons'),
            'trainer_order' => __('Order', 'livemesh-theme-addons')
        );

        return $columns;
    }


    function trainer_profiles_columns($column) {
        global $post;
        switch ($column) {
            case 'trainer_thumbnail':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
            case 'trainer_certifications':
                echo get_post_meta($post->ID, 'mo_certifications', true);
                break;
            case 'trainer_order':
                echo $post->menu_order;
                break;
        }
    }

    function fitness_classes_edit_columns($columns) {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Class Name', 'livemesh-theme-addons'),
            'class-image' => __('Thumbnail', 'livemesh-theme-addons'),
            'class-description' => __('Description', 'livemesh-theme-addons'),
            'class-trainers' => __('Trainers', 'livemesh-theme-addons'),
            'class-order' => __('Class Order', 'livemesh-theme-addons')
        );

        return $columns;
    }

    /**
     * Customizing the list view columns
     *
     * This functions is attached to the 'manage_posts_custom_column' action hook.
     */

    function fitness_classes_columns($column) {
        global $post;
        switch ($column) {
            case 'class-image':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
            case 'class-description':
                the_excerpt();
                break;
            case 'class-trainers':
                $trainer_names = array();
                $trainer_ids = get_post_meta($post->ID, 'mo_trainers_for_class', true);
                if (!empty($trainer_ids)) {
                    foreach ($trainer_ids as $trainer_id) {
                        $trainer_names[] = get_the_title($trainer_id);
                    }
                }
                echo implode(', ', $trainer_names);
                break;
            case 'class-order':
                echo $post->menu_order;
                break;
        }
    }


    function features_edit_columns($columns) {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Title', 'livemesh-theme-addons'),
            'feature-image' => __('Thumbnail', 'livemesh-theme-addons'),
            'feature-description' => __('Description', 'livemesh-theme-addons'),
            'feature-order' => __('Order', 'livemesh-theme-addons')
        );

        return $columns;
    }


    /**
     * Customizing the list view columns
     *
     * This functions is attached to the 'manage_posts_custom_column' action hook.
     */
    function features_columns($column) {
        global $post;
        switch ($column) {
            case 'feature-name':
                echo get_the_title();
                break;
            case 'feature-description':
                the_excerpt();
                break;
            case 'feature-image':
                echo get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title()));
                break;
            case 'feature-order':
                echo $post->menu_order;
                break;
        }
    }
}

new LTA_Post_Types_Admin();