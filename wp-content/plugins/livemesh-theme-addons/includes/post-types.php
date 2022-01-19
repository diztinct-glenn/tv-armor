<?php

/**
 * Register Post Types - Register the custom post types required by the theme
 *
 *
 * @package Livemesh_Framework
 */
class LTA_Register_Post_Types {

    public function __construct() {

        add_action('init', array($this, 'register_custom_post_types'));

    }

    public function register_custom_post_types() {

        $this->register_portfolio_type();

        $this->register_gallery_type();

        if (current_theme_supports('single-page-site') || current_theme_supports('composite-page'))
            $this->register_page_section_type();

        $this->register_testimonials_post_type();

        $this->register_pricing_post_type();

        if (current_theme_supports('education-press')) {

            $this->register_department_post_type();

            $this->register_staff_profile_post_type();

            $this->register_course_post_type();

            $this->register_news_post_type();

        }
        elseif (current_theme_supports('fitness-press')) {

            $this->register_fitness_taxonomy();

            $this->register_features_post_type();

            $this->register_fitness_class_post_type();

            $this->register_trainer_profile_post_type();
        }
        else {
            $this->register_team_profile_post_type();
        }

    }

    public function register_portfolio_type() {

        $labels = array(
            'name' => _x('Portfolio', 'portfolio name', 'livemesh-theme-addons'),
            'singular_name' => _x('Portfolio Entry', 'portfolio type singular name', 'livemesh-theme-addons'),
            'menu_name' => _x('Portfolio', 'portfolio type menu name', 'livemesh-theme-addons'),
            'add_new' => _x('Add New', 'portfolio item', 'livemesh-theme-addons'),
            'add_new_item' => __('Add New Portfolio Entry', 'livemesh-theme-addons'),
            'edit_item' => __('Edit Portfolio Entry', 'livemesh-theme-addons'),
            'new_item' => __('New Portfolio Entry', 'livemesh-theme-addons'),
            'view_item' => __('View Portfolio Entry', 'livemesh-theme-addons'),
            'search_items' => __('Search Portfolio Entries', 'livemesh-theme-addons'),
            'not_found' => __('No Portfolio Entries Found', 'livemesh-theme-addons'),
            'not_found_in_trash' => __('No Portfolio Entries Found in Trash', 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        register_post_type('portfolio', array('labels' => $labels,

                                              'public' => true,
                                              'show_ui' => true,
                                              'show_in_menu' => true,
                                              'capability_type' => 'post',
                                              'has_archive' => true,
                                              'hierarchical' => false,
                                              'publicly_queryable' => true,
                                              'query_var' => true,
                                              'exclude_from_search' => false,
                                              'rewrite' => array('slug' => 'portfolio'),
                                              'taxonomies' => array('portfolio_category'),
                                              'show_in_nav_menus' => false,
                                              'menu_position' => 10,
                                              'menu_icon' => 'dashicons-portfolio',
                                              'supports' => array('title', 'editor', 'thumbnail', 'comments', 'excerpt', 'custom-fields')
            )
        );

        register_taxonomy('portfolio_category', array('portfolio'), array('hierarchical' => true,
                                                                          'label' => __('Portfolio Categories', 'livemesh-theme-addons'),
                                                                          'singular_label' => __('Portfolio Category', 'livemesh-theme-addons'),
                                                                          'rewrite' => true,
                                                                          'query_var' => true
        ));
    }

    public function register_gallery_type() {

        $labels = array(
            'name' => _x('Gallery', 'gallery name', 'livemesh-theme-addons'),
            'singular_name' => _x('Gallery Entry', 'gallery type singular name', 'livemesh-theme-addons'),
            'menu_name' => _x('Gallery', 'gallery type menu name', 'livemesh-theme-addons'),
            'add_new' => _x('Add New', 'gallery', 'livemesh-theme-addons'),
            'add_new_item' => __('Add New Gallery Entry', 'livemesh-theme-addons'),
            'edit_item' => __('Edit Gallery Entry', 'livemesh-theme-addons'),
            'new_item' => __('New Gallery Entry', 'livemesh-theme-addons'),
            'view_item' => __('View Gallery Entry', 'livemesh-theme-addons'),
            'search_items' => __('Search Gallery Entries', 'livemesh-theme-addons'),
            'not_found' => __('No Gallery Entries Found', 'livemesh-theme-addons'),
            'not_found_in_trash' => __('No Gallery Entries Found in Trash', 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        register_post_type('gallery_item', array('labels' => $labels,

                                                 'public' => false,
                                                 'show_ui' => true,
                                                 'show_in_menu' => true,
                                                 'capability_type' => 'post',
                                                 'has_archive' => true,
                                                 'hierarchical' => false,
                                                 'publicly_queryable' => true,
                                                 'query_var' => true,
                                                 'exclude_from_search' => false,
                                                 'rewrite' => array('slug' => 'gallery'),
                                                 'taxonomies' => array('gallery_category'),
                                                 'show_in_nav_menus' => false,
                                                 'menu_position' => 10,
                                                 'menu_icon' => 'dashicons-format-gallery',
                                                 'supports' => array('title', 'thumbnail', 'excerpt')
            )
        );

        register_taxonomy('gallery_category', array('gallery_item'), array('hierarchical' => true,
                                                                           'label' => __('Gallery Categories', 'livemesh-theme-addons'),
                                                                           'singular_label' => __('Gallery Category', 'livemesh-theme-addons'),
                                                                           'rewrite' => true,
                                                                           'query_var' => true
        ));
    }

    public function register_page_section_type() {

        $labels = array(
            'name' => _x('Page Section', 'page section general name', 'livemesh-theme-addons'),
            'singular_name' => _x('Page Section', 'page section singular name', 'livemesh-theme-addons'),
            'menu_name' => _x('Page Sections', 'post type menu name', 'livemesh-theme-addons'),
            'add_new' => _x('Add New', 'page ', 'livemesh-theme-addons'),
            'add_new_item' => __('Add New Page Section', 'livemesh-theme-addons'),
            'edit_item' => __('Edit Page Section', 'livemesh-theme-addons'),
            'new_item' => __('New Page Section', 'livemesh-theme-addons'),
            'view_item' => __('View Page Section', 'livemesh-theme-addons'),
            'search_items' => __('Search Page Sections', 'livemesh-theme-addons'),
            'not_found' => __('No Page Sections Found', 'livemesh-theme-addons'),
            'not_found_in_trash' => __('No Page Sections Found in Trash', 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        register_post_type('page_section', array('labels' => $labels,
                                                 'description' => __('A custom post type which represents a section like about, work, services, team etc. part of a typical single page site. Can be made up of one or more segments.', 'livemesh-theme-addons'),
                                                 'public' => true,
                                                 'show_ui' => true,
                                                 'show_in_menu' => true,
                                                 'capability_type' => 'page',
                                                 'hierarchical' => false,
                                                 'publicly_queryable' => true,
                                                 'query_var' => true,
                                                 'exclude_from_search' => true,
                                                 'show_in_nav_menus' => false,
                                                 'menu_position' => 20,
                                                 'menu_icon' => 'dashicons-text-page',
                                                 'rewrite' => array('slug' => 'page-section'),
                                                 'supports' => array('title', 'editor', 'page-attributes', 'revisions')
            )
        );

    }

    public function register_testimonials_post_type() {
        $labels = array(
            'name' => _x('Testimonials', 'post type general name', 'livemesh-theme-addons'),
            'singular_name' => _x('Testimonial', 'post type singular name', 'livemesh-theme-addons'),
            'menu_name' => _x('Testimonials', 'post type menu name', 'livemesh-theme-addons'),
            'add_new' => _x("Add New", "testimonial item", 'livemesh-theme-addons'),
            'add_new_item' => __('Add New Testimonial', 'livemesh-theme-addons'),
            'edit_item' => __('Edit Testimonial', 'livemesh-theme-addons'),
            'new_item' => __('New Testimonial', 'livemesh-theme-addons'),
            'view_item' => __('View Testimonial', 'livemesh-theme-addons'),
            'search_items' => __('Search Testimonials', 'livemesh-theme-addons'),
            'not_found' => __('No Testimonials found', 'livemesh-theme-addons'),
            'not_found_in_trash' => __('No Testimonials in the trash', 'livemesh-theme-addons'),
            'parent_item_colon' => '',
        );

        register_post_type('testimonials', array(
            'labels' => $labels,
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true,
            'exclude_from_search' => true,
            'query_var' => true,
            'rewrite' => false,
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => 25,
            'menu_icon' => 'dashicons-testimonial',
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
        ));
    }

    public function register_pricing_post_type() {
        $labels = array(
            'name' => _x('Pricing Plans', 'post type general name', 'livemesh-theme-addons'),
            'singular_name' => _x('Pricing Plan', 'post type singular name', 'livemesh-theme-addons'),
            'menu_name' => _x('Pricing Plan', 'post type menu name', 'livemesh-theme-addons'),
            'add_new' => _x('Add New', 'pricing plan item', 'livemesh-theme-addons'),
            'add_new_item' => __('Add New Pricing Plan', 'livemesh-theme-addons'),
            'edit_item' => __('Edit Pricing Plan', 'livemesh-theme-addons'),
            'new_item' => __('New Pricing Plan', 'livemesh-theme-addons'),
            'view_item' => __('View Pricing Plan', 'livemesh-theme-addons'),
            'search_items' => __('Search Pricing Plans', 'livemesh-theme-addons'),
            'not_found' => __('No Pricing Plans found', 'livemesh-theme-addons'),
            'not_found_in_trash' => __('No Pricing Plans in the trash', 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        register_post_type('pricing', array(
            'labels' => $labels,
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true,
            'exclude_from_search' => true,
            'query_var' => true,
            'rewrite' => false,
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => 25,
            'menu_icon' => 'dashicons-editor-table',
            'supports' => array('title', 'editor', 'page-attributes')
        ));
    }

    public function register_team_profile_post_type() {
        // Labels
        $labels = array(
            'name' => _x("Team", "post type general name", 'livemesh-theme-addons'),
            'singular_name' => _x("Team", "post type singular name", 'livemesh-theme-addons'),
            'menu_name' => _x('Team Profiles', 'post type menu name', 'livemesh-theme-addons'),
            'add_new' => _x("Add New", "team item", 'livemesh-theme-addons'),
            'add_new_item' => __("Add New Profile", 'livemesh-theme-addons'),
            'edit_item' => __("Edit Profile", 'livemesh-theme-addons'),
            'new_item' => __("New Profile", 'livemesh-theme-addons'),
            'view_item' => __("View Profile", 'livemesh-theme-addons'),
            'search_items' => __("Search Profiles", 'livemesh-theme-addons'),
            'not_found' => __("No Profiles Found", 'livemesh-theme-addons'),
            'not_found_in_trash' => __("No Profiles Found in Trash", 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        // Register post type
        register_post_type('team', array(
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'hierarchical' => false,
            'publicly_queryable' => false,
            'query_var' => true,
            'exclude_from_search' => true,
            'show_in_nav_menus' => false,
            'menu_position' => 25,
            'has_archive' => false,
            'menu_icon' => 'dashicons-admin-users',
            'rewrite' => false,
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
        ));

        // Labels
        $labels = array(
            'name' => _x('Departments', "taxonomy general name", 'livemesh-theme-addons'),
            'singular_name' => _x('Department', "taxonomy singular name", 'livemesh-theme-addons'),
            'search_items' => __("Search Department", 'livemesh-theme-addons'),
            'all_items' => __("All Departments", 'livemesh-theme-addons'),
            'parent_item' => __("Parent Department", 'livemesh-theme-addons'),
            'parent_item_colon' => __("Parent Department:", 'livemesh-theme-addons'),
            'edit_item' => __("Edit Department", 'livemesh-theme-addons'),
            'update_item' => __("Update Department", 'livemesh-theme-addons'),
            'add_new_item' => __("Add New Department", 'livemesh-theme-addons'),
            'new_item_name' => __("New Department Name", 'livemesh-theme-addons'),
        );

        // Register and attach to 'team' post type
        register_taxonomy('department', 'team', array(
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => false,
            'labels' => $labels
        ));
    }

    public function register_course_post_type() {

        $labels = array(
            'name' => _x("Courses", 'post type general name', 'livemesh-theme-addons'),
            'singular_name' => _x("Course", "post type singular name", 'livemesh-theme-addons'),
            'menu_name' => _x('Courses', 'post type menu name', 'livemesh-theme-addons'),
            'add_new' => _x("Add New", "course item", 'livemesh-theme-addons'),
            'add_new_item' => __("Add New Course", 'livemesh-theme-addons'),
            'edit_item' => __("Edit Course", 'livemesh-theme-addons'),
            'new_item' => __("New Course", 'livemesh-theme-addons'),
            'view_item' => __("View Course", 'livemesh-theme-addons'),
            'search_items' => __("Search Courses", 'livemesh-theme-addons'),
            'not_found' => __("No Courses Found", 'livemesh-theme-addons'),
            'not_found_in_trash' => __("No Courses Found in Trash", 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        register_post_type('course', array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'exclude_from_search' => false,
            'query_var' => true,
            'rewrite' => array('slug' => 'course'),
            'capability_type' => 'post',
            'taxonomies' => array('course_category'),
            'has_archive' => false,
            'hierarchical' => false,
            'menu_icon' => 'dashicons-welcome-learn-more',
            'menu_position' => 20,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'page-attributes'
            )
        ));

        register_taxonomy('course_category', 'course', array(
            'hierarchical' => true,
            'label' => __('Course Categories', 'livemesh-theme-addons'),
            'singular_label' => __('Course Category', 'livemesh-theme-addons'),
            'rewrite' => array('slug' => 'our-courses'),
            'query_var' => true,
            'show_ui' => true,
            'public' => true,
            'show_admin_column' => true
        ));

    }

    public function register_news_post_type() {

        $labels = array(
            'name' => _x("News", "post type general name", 'livemesh-theme-addons'),
            'singular_name' => _x("News", "post type singular name", 'livemesh-theme-addons'),
            'menu_name' => _x('News', 'post type menu name', 'livemesh-theme-addons'),
            'add_new' => _x("Add New", "news item", 'livemesh-theme-addons'),
            'add_new_item' => __("Add New News", 'livemesh-theme-addons'),
            'edit_item' => __("Edit News", 'livemesh-theme-addons'),
            'new_item' => __("New News", 'livemesh-theme-addons'),
            'view_item' => __("View News", 'livemesh-theme-addons'),
            'search_items' => __("Search News", 'livemesh-theme-addons'),
            'not_found' => __("No News Found", 'livemesh-theme-addons'),
            'not_found_in_trash' => __("No News Found in Trash", 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        register_post_type('news', array(
            'labels' => $labels,


            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'publicly_queryable' => true,
            'query_var' => true,
            'exclude_from_search' => false,
            'rewrite' => array('slug' => 'news'),
            'taxonomies' => array('news_category'),
            'show_in_nav_menus' => false,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-welcome-widgets-menus',
            'supports' => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'page-attributes'
            )
        ));

        register_taxonomy('news_category', 'news', array(
            'hierarchical' => true,
            'label' => __('News Categories', 'livemesh-theme-addons'),
            'singular_label' => __('News Category', 'livemesh-theme-addons'),
            'rewrite' => array('slug' => 'news-category'),
            'query_var' => true,
            'show_ui' => true,
            'public' => true,
            'show_admin_column' => true
        ));
    }

    public function register_department_post_type() {
        // Labels
        $labels = array(
            'name' => _x("Department", "post type general name", 'livemesh-theme-addons'),
            'singular_name' => _x("Department", "post type singular name", 'livemesh-theme-addons'),
            'menu_name' => _x('Departments', 'post type menu name', 'livemesh-theme-addons'),
            'add_new' => _x("Add New", "department item", 'livemesh-theme-addons'),
            'add_new_item' => __("Add New Department", 'livemesh-theme-addons'),
            'edit_item' => __("Edit Department", 'livemesh-theme-addons'),
            'new_item' => __("New Department", 'livemesh-theme-addons'),
            'view_item' => __("View Department", 'livemesh-theme-addons'),
            'search_items' => __("Search Departments", 'livemesh-theme-addons'),
            'not_found' => __("No Departments Found", 'livemesh-theme-addons'),
            'not_found_in_trash' => __("No Departments Found in Trash", 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        // Register post type
        register_post_type('department', array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'hierarchical' => false,
            'publicly_queryable' => true,
            'query_var' => true,
            'exclude_from_search' => false,
            'show_in_nav_menus' => false,
            'has_archive' => false,
            'menu_icon' => 'dashicons-building',
            'menu_position' => 20,
            'rewrite' => array('slug' => 'department'),
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes')
        ));

    }

    public function register_staff_profile_post_type() {
        // Labels
        $labels = array(
            'name' => _x("Staff", "post type general name", 'livemesh-theme-addons'),
            'singular_name' => _x("Staff", "post type singular name", 'livemesh-theme-addons'),
            'menu_name' => _x('Staff Profiles', 'post type menu name', 'livemesh-theme-addons'),
            'add_new' => _x("Add New", "staff item", 'livemesh-theme-addons'),
            'add_new_item' => __("Add New Profile", 'livemesh-theme-addons'),
            'edit_item' => __("Edit Profile", 'livemesh-theme-addons'),
            'new_item' => __("New Profile", 'livemesh-theme-addons'),
            'view_item' => __("View Profile", 'livemesh-theme-addons'),
            'search_items' => __("Search Profiles", 'livemesh-theme-addons'),
            'not_found' => __("No Profiles Found", 'livemesh-theme-addons'),
            'not_found_in_trash' => __("No Profiles Found in Trash", 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        // Register post type
        register_post_type('staff', array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'hierarchical' => false,
            'publicly_queryable' => true,
            'query_var' => true,
            'taxonomies' => array('specialization'),
            'exclude_from_search' => false,
            'show_in_nav_menus' => false,
            'menu_icon' => 'dashicons-businesswoman',
            'menu_position' => 20,
            'has_archive' => false,
            'rewrite' => array('slug' => 'faculty'),
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes')
        ));

        register_taxonomy('specialization', 'staff', array(
            'hierarchical' => true,
            'label' => __('Specializations', 'livemesh-theme-addons'),
            'singular_label' => __('Specialization', 'livemesh-theme-addons'),
            'rewrite' => array('slug' => 'specialization'),
            'query_var' => true,
            'show_ui' => true,
            'public' => true,
            'show_admin_column' => true
        ));


    }

    function register_fitness_taxonomy() {
        register_taxonomy('fitness_category', array(), array('hierarchical' => true,
                                                             'label' => __('Fitness Category', 'livemesh-theme-addons'),
                                                             'singular_label' => __('Fitness Category', 'livemesh-theme-addons'),
                                                             'rewrite' => true,
                                                             'query_var' => true
        ));
    }

    function register_fitness_class_post_type() {
        $labels = array(
            'name' => 'Classes',
            'singular_name' => 'Class',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Class',
            'edit_item' => 'Edit Class',
            'new_item' => 'New Class',
            'view_item' => 'View Class',
            'search_items' => 'Search Classes',
            'not_found' => 'No Classes found',
            'not_found_in_trash' => 'No Classes in the trash',
            'parent_item_colon' => '',
        );

        register_post_type('fitness_class', array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'exclude_from_search' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'fitness-class'),
            'capability_type' => 'post',
            'taxonomies' => array('fitness_category'),
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => 10,
            'menu_icon' => 'dashicons-building',
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields')
        ));

        register_taxonomy_for_object_type('fitness_class', 'fitness_category');

    }

    function register_features_post_type() {
        $labels = array(
            'name' => 'Features',
            'singular_name' => 'Feature',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Feature',
            'edit_item' => 'Edit Feature',
            'new_item' => 'New Feature',
            'view_item' => 'View Feature',
            'search_items' => 'Search Features',
            'not_found' => 'No Features found',
            'not_found_in_trash' => 'No Features in the trash',
            'parent_item_colon' => '',
        );

        register_post_type('feature', array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'exclude_from_search' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'taxonomies' => array('fitness_category'),
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => 10,
            'menu_icon' => 'dashicons-text-page',
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields')
        ));

        register_taxonomy_for_object_type('feature', 'fitness_category');
    }

    function register_trainer_profile_post_type() {
        // Labels
        $labels = array(
            'name' => _x("Trainers", "post type general name", 'livemesh-theme-addons'),
            'singular_name' => _x("Trainer Profile", "post type singular name", 'livemesh-theme-addons'),
            'menu_name' => 'Trainer Profiles',
            'add_new' => _x("Add New", "trainer item", 'livemesh-theme-addons'),
            'add_new_item' => __("Add New Trainer Profile", 'livemesh-theme-addons'),
            'edit_item' => __("Edit Trainer Profile", 'livemesh-theme-addons'),
            'new_item' => __("New Trainer Profile", 'livemesh-theme-addons'),
            'view_item' => __("View Profile", 'livemesh-theme-addons'),
            'search_items' => __("Search Trainer Profiles", 'livemesh-theme-addons'),
            'not_found' => __("No Trainer Profiles Found", 'livemesh-theme-addons'),
            'not_found_in_trash' => __("No Trainer Profiles Found in Trash", 'livemesh-theme-addons'),
            'parent_item_colon' => ''
        );

        // Register post type
        register_post_type('trainer', array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'hierarchical' => false,
            'publicly_queryable' => true,
            'query_var' => true,
            'exclude_from_search' => false,
            'taxonomies' => array('fitness_category'),
            'show_in_nav_menus' => false,
            'menu_position' => 20,
            'has_archive' => false,
            'menu_icon' => 'dashicons-groups',
            'rewrite' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields')
        ));

        register_taxonomy_for_object_type('trainer', 'fitness_category');
    }

}

new LTA_Register_Post_Types();