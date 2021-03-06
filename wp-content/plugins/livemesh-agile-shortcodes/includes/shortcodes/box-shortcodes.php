<?php

/* Box Shortcodes -

Usage:

[success title = 'Congrats!']Your success message[/success]

[success]Your success message without title[/success]

[info]Your info message without title[/info]

[attention]An attention message without title[/attention]

[warning]Your warning message without title[/warning]

[tip]Your tip message without title[/tip]

[info]Your info message without title[/info]

Parameters -

style - Inline CSS styling (optional)
title - Title displayed above the text in bold.

*/
if (!function_exists('lags_box_shortcode')) {

    function lags_box_shortcode($atts, $content = null, $shortcode_name = "") {

        extract(shortcode_atts(array(
            'title' => null
        ), $atts));

        $icon_mapping = array('info' => 'icon-info', 'warning' => 'icon-warning', 'note' => 'icon-pencil');

        if ($title) {
            $title = '<div class="title" > ' . $title . '</div> ';
        }
        return '<div class="message-box ' . $shortcode_name . '">' . $title . '<div class="contents">' . do_shortcode($content) . '<a href="#" class="close"><i class="icon-cross"></i></a></div></div > ';
    }
}

/* Box Frame Shortcode -

Usage:

[box_frame style="background: #FFF;" width="275px" class="pricing-box" align="center" title="Pet Care" inner_style="padding:20px;"]
Any HTML content goes here - images, lists, text paragraphs, even sliders.
[/box_frame]

Parameters -

style - Inline CSS styling (optional)
class - Class name to be assigned for the box div element. Useful for custom styling.
align - Can be aligned left, right or centered.
title - Title for the box in bold.
width - Custom width of the box. Include px suffix.
inner_style - Inline CSS styling for the inner box (optional)

*/

if (!function_exists('lags_box_frame_shortcode')) {
    function lags_box_frame_shortcode($atts, $content = null, $shortcode_name = "") {
        extract(shortcode_atts(array(
            'align' => 'center',
            'title' => null,
            'style' => null,
            'class' => null,
            'width' => null,
            'inner_style' => null
        ), $atts));

        $class = $class ? ' ' . $class : '';
        $output = '<div class="' . str_replace('_', '-', $shortcode_name) . ' align' . $align . $class . '"';
        if (isset($style) || isset($width)) {
            $output .= ' style = "';
            $output .= $width ? 'width:' . $width . ';' : '';
            $output .= $style;
            $output .= '"';
        }
        $output .= '> ';
        if ($title)
            $output .= '<div class="box-header" > ' . $title . '</div > ';
        $output .= '<div class="box-contents"';
        $output .= $inner_style ? ' style = "' . $inner_style . '"' : '';
        $output .= ' > ';
        $output .= do_shortcode($content);
        $output .= '</div ></div > ';
        return $output;
    }
}


add_shortcode('info', 'lags_box_shortcode');
add_shortcode('note', 'lags_box_shortcode');
add_shortcode('attention', 'lags_box_shortcode');
add_shortcode('success', 'lags_box_shortcode');
add_shortcode('warning', 'lags_box_shortcode');
add_shortcode('tip', 'lags_box_shortcode');
add_shortcode('errors', 'lags_box_shortcode');

add_shortcode('box_frame', 'lags_box_frame_shortcode');

