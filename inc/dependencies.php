<?php

require_once get_template_directory(). '/inc/lib/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'mo_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if (!function_exists('mo_register_required_plugins')) {
    function mo_register_required_plugins() {

        /**
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            // This is an example of how to include a plugin pre-packaged with a theme
            array(
                'name' => 'Livemesh Theme Addons',
                'slug' => 'livemesh-theme-addons',
                'source' => get_template_directory() . '/inc/lib/plugins/livemesh-theme-addons.zip',
                'required' => true,
                'version' => '1.0.0',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            // This is an example of how to include a plugin pre-packaged with a theme
            array(
                'name' => 'Livemesh Agile Shortcodes',
                'slug' => 'livemesh-agile-shortcodes',
                'source' => get_template_directory() . '/inc/lib/plugins/livemesh-agile-shortcodes.zip',
                'required' => true,
                'version' => '1.0.0',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => 'Classic Editor',
                'slug' => 'classic-editor',
                'required' => true,
            ),
            array(
                'name' => 'Page Builder by SiteOrigin',
                'slug' => 'siteorigin-panels',
                'required' => true,
            ),
            array(
                'name' => 'SiteOrigin Widgets Bundle',
                'slug' => 'so-widgets-bundle',
                'required' => true,
            ),
            array(
                'name' => 'Livemesh SiteOrigin Widgets',
                'slug' => 'livemesh-siteorigin-widgets',
                'required' => true,
            ),
            array(
                'name' => 'Revolution Slider', // The plugin name
                'slug' => 'revslider', // The plugin slug (typically the folder name)
                'source' => get_template_directory() . '/inc/lib/plugins/revslider.zip', // The plugin source
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => 'Contact Form 7',
                'slug' => 'contact-form-7',
                'required' => false,
            ),
            array(
                'name' => 'WooCommerce',
                'slug' => 'woocommerce',
                'required' => false,
            )

        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           => 'agile',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.

            /*
            'strings'      => array(
                'page_title'                      => __( 'Install Required Plugins', 'agile'),
                'menu_title'                      => __( 'Install Plugins', 'agile'),
                /* translators: %s: plugin name. * /
                'installing'                      => __( 'Installing Plugin: %s', 'agile'),
                /* translators: %s: plugin name. * /
                'updating'                        => __( 'Updating Plugin: %s', 'agile'),
                'oops'                            => __( 'Something went wrong with the plugin API.', 'agile'),
                'notice_can_install_required'     => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'agile'
                ),
                'notice_can_install_recommended'  => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'agile'
                ),
                'notice_ask_to_update'            => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'agile'
                ),
                'notice_ask_to_update_maybe'      => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'agile'
                ),
                'notice_can_activate_required'    => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'agile'
                ),
                'notice_can_activate_recommended' => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'agile'
                ),
                'install_link'                    => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'agile'
                ),
                'update_link' 					  => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'agile'
                ),
                'activate_link'                   => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'agile'
                ),
                'return'                          => __( 'Return to Required Plugins Installer', 'agile'),
                'plugin_activated'                => __( 'Plugin activated successfully.', 'agile'),
                'activated_successfully'          => __( 'The following plugin was activated successfully:', 'agile'),
                /* translators: 1: plugin name. * /
                'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'agile'),
                /* translators: 1: plugin name. * /
                'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'agile'),
                /* translators: 1: dashboard link. * /
                'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'agile'),
                'dismiss'                         => __( 'Dismiss this notice', 'agile'),
                'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'agile'),
                'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'agile'),

                'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
            ),
            */
        );

        tgmpa( $plugins, $config );
    }
}