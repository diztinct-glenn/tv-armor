<?php

/**
 * Helper get_template_part function to help pass arguments to the get_template_part()
 **/
if (!function_exists('lags_get_template_part')) {

    function lags_get_template_part($slug, $name = null, $var = null, $return = false) {

        $templates = array();
        $name = (string)$name;

        if ('' !== $name)
            $templates[] = "{$slug}-{$name}.php";

        $templates[] = "{$slug}.php";

        $located = locate_template($templates, false, false);

        /* Look in the plugin folder if theme does not have the template */
        if ( ! $located ) {
            $located = lags_locate_template($templates);
        }

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

/**
 * Check the plugin templates folder for the template files
 **/
function lags_locate_template($template_names) {

    $located = '';
    foreach ((array)$template_names as $template_name) {
        if (!$template_name)
            continue;
        if (file_exists(LAGS_DIR . $template_name)) {
            $located = LAGS_DIR . $template_name;
            break;
        }
    }

    return $located;
}

if (!function_exists('lags_remove_wpautop')) {
    function lags_remove_wpautop($content) {

        $content = do_shortcode(shortcode_unautop($content));
        $content = preg_replace('#^<\/p>|^<br\s?\/?>|<p>$|<p>\s*(&nbsp;)?\s*<\/p>#', '', $content);
        return $content;
    }
}

/*
* Converting string to boolean is a big one in PHP
*/
if (!function_exists('lags_to_boolean')) {

    function lags_to_boolean($value) {
        if (!isset($value))
            return false;
        if ($value == 'true' || $value == '1')
            $value = true;
        elseif ($value == 'false' || $value == '0')
            $value = false;
        return (bool)$value; // Make sure you do not touch the value if the value is not a string
    }
}


if (!function_exists('lags_truncate_string')) {
    /* Original PHP code by Chirp Internet: www.chirp.com.au
    http://www.the-art-of-web.com/php/truncate/ */

    function lags_truncate_string($string, $limit, $strip_tags = true, $strip_shortcodes = true, $break = " ", $pad = "...") {
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



if (!function_exists('lags_get_column_style')) {
    /* Return the css class name to help achieve the number of columns specified */

    function lags_get_column_style($column_count = 3, $no_margin = false) {

        $no_margin = lags_to_boolean($no_margin); // make sure it is not string

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


if (!function_exists('lags_get_column_class')) {
    /* Return the css class name to help achieve the number of columns specified */

    function lags_get_column_class($column_size = 3, $no_margin = false) {

        $no_margin = lags_to_boolean($no_margin); // make sure it is not string

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

if (!function_exists('lags_get_theme_option')) {
    function lags_get_theme_option($option, $default = null, $single = true) {
        // Just delegate it to the theme
        if (function_exists('mo_get_theme_option')) {
            return mo_get_theme_option($option, $default, $single);
        }
        return get_option($option, $default);
    }
}