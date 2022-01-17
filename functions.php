<?php

/**
 * The functions file to initialize everything - add features, extensions, override hooks and filters.
 *
 *
 * @package Agile
 * @subpackage Functions
 * @version 1.0
 * @author LiveMesh
 * @copyright Copyright (c) 2012, LiveMesh
 * @link https://www.livemeshthemes.com/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


/**
 * Set the content width
 */
global $content_width;
if (!isset($content_width)) {
    $content_width = 1180; /* pixels */
}

/**
 * Get started with the amazing SiteOrigin page builder and WPBakery Page Builder
 */
require_once get_template_directory() . '/inc/page-builder.php';

/**
 * Setup option tree
 */
require_once get_template_directory() . '/inc/options.php';

/**
 * Init metaboxes for posts, pages and custom post types
 */
require_once get_template_directory() . '/inc/metaboxes.php';

/**
 * Register sidebars defined by the theme
 */
require_once get_template_directory() . '/inc/sidebars.php';

/**
 * Init column layouts and other styling for the pages, posts and custom post types
 */
require_once get_template_directory() . '/inc/styling.php';

require_once get_template_directory() . '/inc/commenting.php';

require_once get_template_directory() . '/inc/extras.php';

require_once get_template_directory() . '/inc/admin.php';

require_once get_template_directory() . '/inc/dependencies.php';

require_once get_template_directory() . '/inc/users.php';

if (class_exists('woocommerce')) {
    require_once get_template_directory() . '/woocommerce/integrations.php';
}


/**
 * Enable Theme Features.
 *
 */
function mo_enable_theme_features() {

    remove_theme_support('custom-background');
    remove_theme_support('custom-header');


    add_theme_support('post-thumbnails');

    add_theme_support('header-social-links');

    add_theme_support('single-page-site');

    add_theme_support('title-tag');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    /* Add support for excerpts and entry-views to the 'page' post type. */
    add_post_type_support('page', array('excerpt'));

    add_theme_support('woocommerce');

    add_editor_style();

    /**
     * Enable HTML5 markup
     */
    add_theme_support('html5', array(
        'comment-list',
        'search-form',
        'comment-form',
        'gallery'
    ));

}

add_action('after_setup_theme', 'mo_enable_theme_features');


if (!function_exists('mo_theme_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Agile 1.0
     */
    function mo_theme_setup() {

        load_theme_textdomain('agile', get_template_directory() . '/languages');

        /**
         * Register Menus
         */
        register_nav_menus(
            array(
                'primary' => esc_html__('Primary Menu', 'agile'),
                'footer' => esc_html__('Footer Menu', 'agile')
            )
        );

        // Portfolio Thumb
        add_image_size('medium-thumb', 550, 400, true);
        add_image_size('square-thumb', 450, 450, true);

    }
}

add_action('after_setup_theme', 'mo_theme_setup');

/* Remove auto-generated default styling for WP galleries */
add_filter('use_default_gallery_style', '__return_false');

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Enqueue Agile's scripts
 *
 * @since Agile 1.0
 */
function mo_enqueue_scripts() {

    wp_enqueue_script( 'jquery-effects-core' );

    wp_enqueue_script('jquery-tools', get_template_directory_uri() . '/js/lib/jquery.tools.min.js', array('jquery'), '1.2.7', true);
    wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/js/lib/jquery.validate.min.js', array('jquery'), '1.9.0', true);
    wp_enqueue_script('drop-downs', get_template_directory_uri() . '/js/lib/drop-downs.js', array('jquery'), '1.4.8', true);
    wp_enqueue_script('jquery-waypoint', get_template_directory_uri() . '/js/lib/waypoints.js', array('jquery'), '2.0.2', true);
    wp_enqueue_script('jquery-plugins-lib', get_template_directory_uri() . '/js/lib/jquery.plugins.lib.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-modernizr', get_template_directory_uri() . '/js/lib/modernizr.js', array('jquery'), '2.7.1', true);

    if (is_page())
        wp_enqueue_script('jquery-ytpplayer', get_template_directory_uri() . '/js/lib/jquery.mb.YTPlayer.js', array('jquery'), '1.0', true);
    
    /* Slider packs */
    wp_enqueue_script('jquery-flexslider', get_template_directory_uri() . '/js/lib/jquery.flexslider.js', array('jquery'), '1.2', true);
    wp_enqueue_script('jquery-owl-carousel', get_template_directory_uri() . '/js/lib/owl.carousel.min.js', array('jquery'), '4.1', true);

    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/js/lib/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true);

    // Do not load with handle 'isotope' since that loads an older version of isotope from the visual composer plugin
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/js/lib/isotope.pkgd.js', array('jquery'), '3.0.2', true);
    wp_enqueue_script('images-loaded', get_template_directory_uri() . '/js/lib/imagesloaded.pkgd.min.js', array('jquery'), '4.1.1', true);

    $ajax_portfolio = mo_get_theme_option('mo_ajax_portfolio');
    $ajax_gallery = mo_get_theme_option('mo_ajax_gallery');
    if ((is_page_template('template-portfolio.php') && $ajax_portfolio) || ((is_page_template('template-gallery.php') && $ajax_gallery)) || (is_tax('portfolio_category') && $ajax_portfolio) || (is_tax('gallery_category') && $ajax_gallery))
        wp_enqueue_script('jquery-infinitescroll', get_template_directory_uri() . '/js/lib/jquery.infinitescroll.min.js', array('jquery'), '2.0', true);

    if (is_singular())
        wp_enqueue_script("comment-reply");

    wp_enqueue_script('mo-theme-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'mo_enqueue_scripts');

function mo_localize_scripts() {

    $localized_array = array(
        'options' => array()
    );

    $localized_array['options']['blog_url'] = esc_url(home_url('/'));

    $localized_array['options']['template_dir_url'] = get_template_directory_uri();

    $localized_array['options']['ajax_showcase'] = false;
    if ((is_page_template('template-portfolio.php') || is_page_template('template-portfolio-filterable.php') || is_tax('portfolio_category'))) {
        $localized_array['options']['ajax_showcase'] = (bool)mo_get_theme_option('mo_ajax_portfolio');
    }
    if ((is_page_template('template-gallery.php') || is_page_template('template-gallery-filterable.php') || is_tax('gallery_category'))) {
        $localized_array['options']['ajax_showcase'] = (bool)mo_get_theme_option('mo_ajax_gallery');
    }

    $localized_array['options']['disable_back_to_top'] = (bool)mo_get_theme_option('mo_disable_back_to_top');

    $disable_sticky_menu = mo_get_theme_option('mo_disable_sticky_menu');
    if ($disable_sticky_menu)
        $localized_array['options']['sticky_menu'] = false;
    else
        $localized_array['options']['sticky_menu'] = true;

    $theme_skin = mo_get_theme_skin();
    $localized_array['options']['theme_skin'] = $theme_skin;

    $localized_array['options']['loading_portfolio'] = esc_html__('Loading the next set of posts...', 'agile');
    $localized_array['options']['finished_loading'] = esc_html__('No more items to load...', 'agile');

    $localized_array['options']['disable_smooth_page_load'] = (bool)mo_get_theme_option('mo_disable_smooth_page_load');
    $localized_array['options']['disable_animations_on_page'] = (bool)mo_get_theme_option('mo_disable_animations_on_page');

    $localized_array['messages'] = array(
        'name_required' => __('Please provide your name', 'agile'),
        'name_format' => __('Your name must consist of at least 5 characters', 'agile'),
        'email_required' => __('Please provide a valid email address', 'agile'),
        'url_required' => __('Please provide a valid URL', 'agile'),
        'phone_required' => __('Minimum 5 characters required', 'agile'),
        'human_check_failed' => __('The input the correct value for the equation above', 'agile'),
        'message_required' => __('Please input the message', 'agile'),
        'message_format' => __('Your message must be at least 15 characters long', 'agile'),
        'success_message' => __('Your message has been sent. Thanks!', 'agile')
    );

    /* localized script attached to theme */
    wp_localize_script('mo-theme-js', 'mo_theme', $localized_array);
}

add_action('wp_enqueue_scripts', 'mo_localize_scripts');


/**
 * Enqueue Agile's styles
 *
 * @since Agile 1.0
 */
function mo_enqueue_styles() {

    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), false, 'screen');

    wp_enqueue_style('mo-icon-fonts', get_template_directory_uri() . '/css/icon-fonts.css', array(), false, 'screen');

    /**
     * Main stylesheet
     */
    wp_enqueue_style('mo-style-theme', get_template_directory_uri() . '/style.css', array(), false, 'all');

}

add_action('wp_enqueue_scripts', 'mo_enqueue_styles');

function mo_enqueue_plugin_styles() {
    wp_enqueue_style('mo-style-plugins', get_template_directory_uri() . '/css/plugins.css', array('mo-style-theme'), false, 'all');
}

// load possibly after all the plugins styles are loaded
add_action('wp_enqueue_scripts', 'mo_enqueue_plugin_styles', 12);


/* Overcome problems caused by late loading plugin scripts overriding the theme ones and destroying functionality */
function mo_enqueue_additional_scripts() {
    wp_enqueue_script('jquery-waypoints-sticky', get_template_directory_uri() . '/js/lib/waypoints.sticky.min.js', array('jquery'), '2.0.2', true);
}

add_action('wp_enqueue_scripts', 'mo_enqueue_additional_scripts', 99999);


/**
 * Change Posts Per Page for Portfolio/Gallery Archive and Taxonomy pages
 *
 * @param object $query data
 *
 * @link http://www.billerickson.net/customize-the-wordpress-query/
 * @author Bill Erickson
 */
function mo_change_posts_per_page($query) {

    if ($query->is_main_query() && !is_admin()) {

        if (is_post_type_archive('portfolio') || is_tax('portfolio_category')) {
            $query->set('posts_per_page', intval(mo_get_theme_option('mo_portfolio_post_count', 6)));
            $query->set('orderby', 'menu_order');
            $query->set('order', 'ASC');
        }
        elseif (is_post_type_archive('gallery_item') || is_tax('gallery_category')) {
            $query->set('posts_per_page', intval(mo_get_theme_option('mo_gallery_post_count', 6)));
            $query->set('orderby', 'menu_order');
            $query->set('order', 'ASC');
        }
    }
}

add_action('pre_get_posts', 'mo_change_posts_per_page');

/* Prevent the Post Types Order plugin from overriding theme queries */
// remove_filter('posts_orderby', 'CPTOrderPosts', 99, 2);

/* Enable Google Analytics for every post/page */
function mo_enable_google_analytics() {

    $analytics_code = mo_get_theme_option('mo_google_analytics_code');

    if (isset($analytics_code))
        echo '<div class="hidden">' . $analytics_code . '</div>';
}

add_action('wp_footer', 'mo_enable_google_analytics');






?>