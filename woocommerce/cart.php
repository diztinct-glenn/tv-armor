<?php

add_action('mo_header', 'mo_display_cart', 40);

// Ensure cart contents update when products are added to the cart via AJAX
add_filter('woocommerce_add_to_cart_fragments', 'mo_header_add_to_cart_fragment');

if (!function_exists('mo_header_add_to_cart_fragment')) {
    function mo_header_add_to_cart_fragment($fragments) {

        ob_start();

        mo_display_cart();

        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
}

if (!function_exists('mo_display_cart')) {
    function mo_display_cart() {
        global $woocommerce;
        $output = '<a class="cart-contents" href="' . esc_url(wc_get_cart_url()) . '"';
        $output .= ' title="' . __('View your shopping cart', 'agile') . '">';
        $output .= '<i class="icon-cart"></i>';
        $output .= '<span class="cart-count">' . sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'agile'), $woocommerce->cart->cart_contents_count) . '</span>';
        $output .= '<span class="cart-amount">' . $woocommerce->cart->get_cart_total() . '</span>';
        $output .= '</a>';

        echo wp_kses_post($output);

    }
}