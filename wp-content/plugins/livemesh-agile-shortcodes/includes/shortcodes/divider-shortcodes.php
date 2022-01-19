<?php

/* Divider Shortcodes -

Draws a line or a divider of various kinds depending on the shortcode used.

Usage:

[divider]
[divider_line]
[divider_space]
[divider_fancy]

Parameters -

id - The element id to be set for the div element created (optional).
style - Inline CSS styling applied for the div element created (optional)
class - Custom CSS class name to be set for the div element created (optional)


*/


function lags_divider_shortcode($atts, $content = null, $shortcode_name = "") {
    extract(shortcode_atts(array(
        'style' => null
    ), $atts));

    return '<div class="' . str_replace('_', '-', $shortcode_name) . '"' . ($style ? (' style="' . $style . '"') : '') . '></div>';
}

add_shortcode('divider', 'lags_divider_shortcode');
add_shortcode('divider_space', 'lags_divider_shortcode');
add_shortcode('divider_line', 'lags_divider_shortcode');
add_shortcode('divider_fancy', 'lags_divider_shortcode');

/* Divider Top Shortcode -

Draws a line or a divider with a Back to Top link on the right. The user is smooth scrolled to the top of the page upon clicking the Back to Top link.

Usage:

[divider_top]

Parameters -

None


*/

function lags_divider_top_shortcode($atts, $content = null, $shortcode_name = "") {
    extract(shortcode_atts(array(
        'style' => null
    ), $atts));

    return '<div class="divider top-of-page"' . ($style ? (' style="' . $style . '"') : '') . '><a href="#top" title="' . __("Top of the Page", "agile") . '" class="back-to-top">' . __("Back to Top", "agile") . '</a></div>';
}

add_shortcode('divider_top', 'lags_divider_top_shortcode');

/* Clear Shortcode -

Create a DIV element aimed at clearing the layout. Useful to avoid elements wrapping around when using floats.

Usage:

[clear]

Parameters -

None

*/

function lags_clear_shortcode() {
    return '<div class="clear"></div>';
}

add_shortcode('clear', 'lags_clear_shortcode');

/* Space Shortcode -

Create a DIV element aimed at having a space of fixed height between elements.

Usage:

[space height="30"]

Parameters -

height - Specify height of the space in pixel units

*/

function lags_space_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'height' => false
    ), $atts));

    return '<div style="clear:both; width:100%; height:' . $height . 'px"></div>';
}

add_shortcode('clearing_space', 'lags_space_shortcode');

/* Header Fancy Shortcode -

Draws a nice looking header with a title displayed in the center and with a line dividing the content.

Usage:

[header_fancy id="header1" style="margin-bottom: 20px;" text="Smartphone Section"]

Parameters -

class - The CSS class to be set for the div element created (optional).
style - Inline CSS styling applied for the div element created (optional)
text - The title to be displayed in the center of the header.

*/


function lags_header_shortcode($atts, $content = null, $shortcode_name = "") {
    extract(shortcode_atts(array(
        'class' => '',
        'text' => '',
        'style' => null
    ), $atts));

    return '<div class="' . str_replace('_', '-', $shortcode_name) . ' ' . $class . '"' . ($style ? (' style="' . $style . '"') : '') . '><span>' . $text . '</span></div>';
}

add_shortcode('header_fancy', 'lags_header_shortcode');


