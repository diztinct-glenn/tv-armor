<?php

add_filter('mo_sidebar_names', 'mo_init_woocommerce_sidebar', 10, 1);

add_filter('mo_sidebar_descriptions', 'mo_init_woocommerce_sidebar_description', 10, 1);

add_filter('mo_sidebar_id', 'mo_check_for_woocommerce_sidebar', 10, 1);


if (!function_exists('mo_check_for_woocommerce_sidebar')) {
    function mo_check_for_woocommerce_sidebar($sidebar_id) {
        //If woocommerce template
        if (class_exists('woocommerce')) {
            if (is_singular('product')) {
                $sidebar_id = 'primary-product';
            }
            elseif (is_woocommerce() || is_checkout() || is_cart() || is_order_received_page()) {
                $sidebar_id = 'primary-shop';
            }
        }

        return $sidebar_id;
    }
}

if (!function_exists('mo_init_woocommerce_sidebar')) {
    function mo_init_woocommerce_sidebar($sidebar_names) {

        $sidebar_names['primary-shop'] = esc_html__('Primary WooCommerce Shop Sidebar', 'agile');

        $sidebar_names['primary-product'] = esc_html__('Primary WooCommerce Product Sidebar', 'agile');

        return $sidebar_names;
    }
}

if (!function_exists('mo_init_woocommerce_sidebar_description')) {
    function mo_init_woocommerce_sidebar_description($sidebar_descriptions) {

        $sidebar_descriptions['primary-shop'] = esc_html__('Primary Sidebar displayed for WooCommerce templates', 'agile');

        $sidebar_descriptions['primary-product'] = esc_html__('Primary Sidebar displayed for WooCommerce Single Product', 'agile');

        return $sidebar_descriptions;
    }
}