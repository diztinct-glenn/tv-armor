<?php

/**
 * Theme Options - if file exists, loads the options
 */
include_once get_template_directory() . '/inc/options/theme-options.php';

/**
 * Option Tree Settings
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter('ot_show_pages', '__return_true');
//add_filter('ot_show_pages', '__return_false');

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter('ot_show_new_layout', '__return_true');

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter('ot_theme_mode', '__return_false');

/* Do not show the options import. The settings data import will be shown though. */
add_filter('ot_show_settings_import', '__return_false');

/* Do not show the options export. The settings data export will be shown though. */
add_filter('ot_show_settings_export', '__return_false');

/* Do not show documentation for option tree */
add_filter('ot_show_docs', '__return_false');

/* Do not show the options UI which enables users to define new options */
add_filter('ot_show_options_ui', '__return_false');

/* Make sure the page sections are ordered by menu order instead of title */
add_filter('ot_type_custom_post_type_checkbox_query', 'mo_sort_page_section_selection_list', 10, 2);

function mo_sort_page_section_selection_list($query_params, $field_id) {
    if ($field_id === 'mo_page_section_select_for_one_page') {
        $query_params['orderby'] = 'menu_order';
    }
    return $query_params;
}
