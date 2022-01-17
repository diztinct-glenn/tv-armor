<?php

if (!function_exists('mo_get_menu_admin_url')) {
    function mo_get_menu_admin_url() {
        $menu_admin_url = esc_url(home_url('/')) . 'wp-admin/nav-menus.php';

        $menu_admin_url = '<a href="' . esc_url($menu_admin_url) . '" title="' . esc_html__('Appearances Menu Screen',
                'agile') . '">' . esc_html__('Appearances Menu Screen', 'agile') . '</a>';

        return $menu_admin_url;
    }
}

if (!function_exists('mo_get_column_style')) {
    /* Return the css class name to help achieve the number of columns specified */

    function mo_get_column_style($column_count = 3, $no_margin = false) {

        $no_margin = mo_to_boolean($no_margin); // make sure it is not string

        $style_class = 'threecol';
        switch ($column_count) {
            case 1:
                $style_class = "twelvecol";
                break;
            case 2:
                $style_class = "sixcol";
                break;
            case 3:
                $style_class = "fourcol";
                break;
            case 4;
                $style_class = "threecol";
                break;
            case 5:
                $style_class = "threecol"; /* Theme does not support 5 columns due to 12 column  grid */
                break;
            case 6;
                $style_class = "twocol";
                break;
        }
        $style_class = $no_margin ? ($style_class . ' zero-margin') : $style_class;

        return $style_class;
    }
}

if (!function_exists('mo_get_column_class')) {
    /* Return the css class name to help achieve the number of columns specified */

    function mo_get_column_class($column_size = 3, $no_margin = false) {

        $no_margin = mo_to_boolean($no_margin); // make sure it is not string

        $style_class = 'threecol';
        switch ($column_size) {
            case 1:
                $style_class = "onecol";
                break;
            case 2:
                $style_class = "twocol";
                break;
            case 3:
                $style_class = "threecol";
                break;
            case 4;
                $style_class = "fourcol";
                break;
            case 5:
                $style_class = "fivecol";
                break;
            case 6;
                $style_class = "sixcol";
                break;
            case 7:
                $style_class = "sevencol";
                break;
            case 8:
                $style_class = "eightcol";
                break;
            case 9;
                $style_class = "ninecol";
                break;
            case 10:
                $style_class = "tencol";
                break;
            case 11;
                $style_class = "elevencol";
                break;
            case 11;
                $style_class = "twelevecol";
                break;
        }
        $style_class = $no_margin ? ($style_class . ' zero-margin') : $style_class;

        return $style_class;
    }
}


/**
 * Helper get_template_part function to help pass arguments to the get_template_part()
 **/
if (!function_exists('mo_get_template_part')) {
    function mo_get_template_part($slug, $name = null, $var = null, $return = false) {

        $templates = array();
        $name = (string)$name;
        if ('' !== $name)
            $templates[] = "{$slug}-{$name}.php";

        $templates[] = "{$slug}.php";

        $located = locate_template($templates, false, false);

        if ($var && is_array($var)) {
            extract($var);
        }

        if ($return) {
            ob_start();
        }

        // include file located
        if (file_exists($located)) {
            include($located);
        }

        if ($return) {
            return ob_get_clean();
        }
    }
}


if (!function_exists('mo_display_plugin_error')) {
    function mo_display_plugin_error($message = '') {
        if (empty($message))
            $message = esc_html__('Custom Post Types critical for this theme function are not loaded.', 'agile');
        $error = new WP_Error('plugin_deactivated', $message . esc_html__(' Pls install and activate the Livemesh Tools plugin from Appearance->Install Plugins page in WordPress admin.', 'agile'));
        mo_display_error($error);
    }
}

if (!function_exists('mo_display_error')) {
    function mo_display_error($error) {
        if (is_wp_error($error)) {
            $output = '<div class="wp-error">';
            $output .= '<div class="inner">';
            $output .= '<p><strong>' . esc_html__('Sorry, there has been an error.', 'agile') . '</strong><br />';
            $output .= esc_html($error->get_error_message()) . '</p>';
            $output .= '</div>';
            $output .= '</div>';
            echo wp_kses_post($output);
        }
    }
}

/*
* Converting string to boolean is a big one in PHP
*/
if (!function_exists('mo_to_boolean')) {

    function mo_to_boolean($value) {
        if (!isset($value))
            return false;
        if ($value == 'true' || $value == '1')
            $value = true;
        elseif ($value == 'false' || $value == '0')
            $value = false;
        return (bool)$value; // Make sure you do not touch the value if the value is not a string
    }
}

if (!function_exists('mo_truncate_string')) {
    /* Original PHP code by Chirp Internet: www.chirp.com.au
    http://www.the-art-of-web.com/php/truncate/ */

    function mo_truncate_string($string, $limit, $strip_tags = true, $strip_shortcodes = true, $break = " ", $pad = "...") {
        if ($strip_shortcodes)
            $string = strip_shortcodes($string);

        if ($strip_tags)
            $string = strip_tags($string, '<p>'); // retain the p tag for formatting


        // return with no change if string is shorter than $limit
        if (strlen($string) <= $limit)
            return $string;
        elseif ($limit === 0 || $limit == '0')
            return '';


        // is $break present between $limit and the end of the string?
        if (false !== ($breakpoint = strpos($string, $break, $limit))) {
            if ($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }
}

if (!function_exists('mo_get_theme_option')) {
    function mo_get_theme_option($option, $default = null, $single = true) {
        /* Allow posts to override global options. Quite powerful. Use get_queried_object_id
        since we are interested in only the ID of current post/page being rendered. */
        $option_value = get_post_meta(get_queried_object_id(), $option, $single);

        if (!$option_value) {

            if (function_exists('ot_get_option')) {
                $option_value = ot_get_option($option, $default);
            }
            else {
                $option_value = get_option($option, $default);
            }
        }

        if (isset($option_value))
            return $option_value;

        return $default;
    }
}

if (!function_exists('mo_remove_wpautop')) {
    function mo_remove_wpautop($content) {

        $content = do_shortcode(shortcode_unautop($content));
        $content = preg_replace('#^<\/p>|^<br\s?\/?>|<p>$|<p>\s*(&nbsp;)?\s*<\/p>#', '', $content);
        return $content;
    }
}

if (!function_exists('mo_entry_terms_text')) {

    function mo_entry_terms_text($taxonomy = 'category', $separator = ' , ') {
        global $post;

        $output = '';

        $terms = get_the_terms($post, $taxonomy);
        if (!empty($terms)) {
            foreach ($terms as $term)
                $term_names[] = $term->name;

            $output = implode($separator, $term_names);
        }

        return $output;
    }
}

/* Try to find the custom page for the post type else try to default to auto-generated post type archive */
if (!function_exists('mo_get_post_type_archive_url')) {

    function mo_get_post_type_archive_url($post_type) {

        $page_id = mo_get_post_type_archive_page_id($post_type);

        if (!empty($page_id)) {
            $archive_url = get_permalink($page_id);
        }
        else {
            $archive_url = get_post_type_archive_link($post_type);
        }
        return $archive_url;
    }

}

if (!function_exists('mo_get_post_type_archive_page_id')) {

    function mo_get_post_type_archive_page_id($post_type) {

        $page_id = null;

        $archive_template_map = array(
            'gallery_item' => 'template-gallery.php',
            'portfolio' => 'template-portfolio.php',
            'post' => 'template-blog.php'
        );

        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => $archive_template_map[$post_type]
        ));
        foreach ($pages as $page) {
            $page_id = $page->ID;
        }

        return $page_id;
    }

}

if (!function_exists('mo_get_animation_atts')) {

    function mo_get_animation_atts($animation) {

        $animate_class = "";
        $animation_attr = "";

        if ($animation != "none") {
            $animate_class = ' mo-animate-on-scroll';
            if (in_array(
                $animation,
                array('bounceIn', 'bounceInUp', 'bounceInDown', 'bounceInLeft', 'bounceInRight',
                      'fadeIn', 'fadeInLeft', 'fadeInRight', 'fadeInUp', 'fadeInDown',
                      'fadeInLeftBig', 'fadeInRightBig', 'fadeInUpBig', 'fadeInDownBig',
                      'flipInX', 'flipInY',
                      'lightSpeedIn',
                      'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight',
                      'slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight',
                      'zoomIn', 'zoomInUp', 'zoomInDown', 'zoomInLeft', 'zoomInRight',
                      'rollIn'
                ))) {
                $animate_class .= ' mo-visible-on-scroll';
            }
            $animation_attr = ' data-animation="' . esc_attr($animation) . '"';
        }

        return array($animate_class, $animation_attr);
    }
}

if (!function_exists('mo_get_animation_options')) {
    function mo_get_animation_options() {
        return array(
            'none' => __('None', 'agile'),
            'bounce' => __('Bounce', 'agile'),
            'flash' => __('Flash', 'agile'),
            'pulse' => __('Pulse', 'agile'),
            'swing' => __('Swing', 'agile'),
            'shake' => __('Shake', 'agile'),
            'tada' => __('Tada', 'agile'),
            'wobble' => __('Wobble', 'agile'),
            'jello' => __('Jello', 'agile'),
            'rubberBand' => __('Rubber Band', 'agile'),
            'bounceIn' => __('Bounce In', 'agile'),
            'bounceInLeft' => __('Bounce In Left', 'agile'),
            'bounceInRight' => __('Bounce In Right', 'agile'),
            'bounceInDown' => __('Bounce In Down', 'agile'),
            'bounceInUp' => __('Bounce In Up', 'agile'),
            'fadeIn' => __('Fade In', 'agile'),
            'fadeInLeft' => __('Fade In Left', 'agile'),
            'fadeInLeftBig' => __('Fade In Left Big', 'agile'),
            'fadeInRight' => __('Fade In Right', 'agile'),
            'fadeInRightBig' => __('Fade In Right Big', 'agile'),
            'fadeInUp' => __('Fade In Up', 'agile'),
            'fadeInUpBig' => __('Fade In Up Big', 'agile'),
            'fadeInDown' => __('Fade In Down', 'agile'),
            'fadeInDownBig' => __('Fade In Down Big', 'agile'),
            'flip' => __('Flip', 'agile'),
            'flipInX' => __('Flip In X', 'agile'),
            'flipInY' => __('Flip In Y', 'agile'),
            'lightSpeedIn' => __('Light Speed In', 'agile'),
            'rotateIn' => __('Rotate In', 'agile'),
            'rotateInUpLeft' => __('Rotate In Up Left', 'agile'),
            'rotateInUpRight' => __('Rotate In Up Right', 'agile'),
            'rotateInDownLeft' => __('Rotate In Down Left', 'agile'),
            'rotateInDownRight' => __('Rotate In Down Right', 'agile'),
            'slideInLeft' => __('Slide In Left', 'agile'),
            'slideInRight' => __('Slide In Right', 'agile'),
            'slideInDown' => __('Slide In Down', 'agile'),
            'slideInUp' => __('Slide In Up', 'agile'),
            'zoomIn' => __('Zoom In', 'agile'),
            'zoomInLeft' => __('Zoom In Left', 'agile'),
            'zoomInRight' => __('Zoom In Right', 'agile'),
            'zoomInDown' => __('Zoom In Down', 'agile'),
            'zoomInUp' => __('Zoom In Up', 'agile'),
            'rollIn' => __('Roll In', 'agile'),
        );
    }
}