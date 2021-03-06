<?php

/* Button Shortcode -

Usage:

[button id="purchase-button" style="padding: 10px 20px;" color="green" type="rounded" size="large" href="http://targeturl.com" align="left" target="_blank"]Green Button[/button]

Parameters -

id - The element id (optional).
style - Inline CSS styling (optional)
class - Custom CSS class name (optional)
color - Color of the button. Available colors are black, blue, cyan, green, orange, pink, red, teal, theme and trans.
align - Alignment of the button and text alignment of the button title displayed.
type - Can be large, small or rounded.
href - The URL to which button should point to. The user is taken to this destination when the button is clicked.
target - The HTML anchor target. Can be _self (default) or _blank which opens a new window to the URL specified when the button is clicked.

*/

if (!function_exists('lags_button_shortcode')) {

    function lags_button_shortcode($atts, $content = null) {
        extract(shortcode_atts(
            array(
                'style' => null,
                'color' => '',
                'align' => false,
                'id' => false,
                'type' => '',
                'class' => '',
                'href' => '',
                'target' => '_self'),
            $atts));

        $color = ' ' . $color;
        if (!empty($type))
            $type = ' ' . $type;
        $button_text = lags_remove_wpautop($content);
        $id = $id ? ' id ="' . $id . '"' : '';
        $style = $style ? ' style="' . $style . '"' : '';

        $button_content = '<a' . $id . ' class= "button ' . $class . $color . $type . '"' . $style . ' href="' . $href . '" target="' . $target . '">' . $button_text . '</a>';
        if ($align)
            $button_content = '<div style="text-align:' . $align . ';float:' . $align . ';">' . $button_content . '</div>';
        return $button_content;
    }
}

add_shortcode('button', 'lags_button_shortcode');

?>