<?php
/**
 * Custom Meta Boxes using Option Tree framework
 * @package Livemesh_Framework
 */

/**
 * Initialize the meta boxes.
 */

add_action('admin_init', 'mo_custom_meta_boxes');

if (!function_exists('mo_custom_meta_boxes')) {


    function mo_custom_meta_boxes() {

        // Cannot add metaboxes if OptionTree framework is not activated
        if (!function_exists('ot_register_meta_box'))
            return;

        mo_build_advanced_page_meta_boxes();

        mo_build_layout_option_meta_Boxes();

        mo_build_entry_header_metaboxes();

        mo_build_blog_meta_boxes();

    }
}

if (!function_exists('mo_build_layout_option_meta_Boxes')) {

    function mo_build_layout_option_meta_Boxes() {

        $post_layouts = array(
            array(
                'value' => 'layout-default',
                'label' => __('Theme Default', 'agile'),
                'src' => ''
            ),
            array(
                'value' => 'layout-2c-l',
                'label' => __('Two Columns - Right Sidebar', 'agile'),
                'src' => ''
            ),
            array(
                'value' => 'layout-2c-r',
                'label' => __('Two Columns - Left Sidebar', 'agile'),
                'src' => ''
            ),
            array(
                'value' => 'layout-1c',
                'label' => __('Full Width', 'agile'),
                'src' => ''
            )
        );

        $layout_meta_box = array(
            'id' => 'mo_post_layout',
            'title' => __('Post Layout', 'agile'),
            'desc' => '',
            'pages' => array('post'),
            'context' => 'side',
            'priority' => 'default',
            'fields' => array(
                array(
                    'id' => 'mo_current_post_layout',
                    'label' => __('Current Post Layout', 'agile'),
                    'desc' => __('Choose the layout for the current post.', 'agile'),
                    'std' => '',
                    'type' => 'select',
                    'rows' => '',
                    'post_type' => '',
                    'taxonomy' => '',
                    'class' => '',
                    'choices' => $post_layouts
                )
            )
        );

        ot_register_meta_box($layout_meta_box);

        $my_sidebars = array(
            array(
                'label' => __('Default', 'agile'),
                'value' => 'default'
            )
        );

        $sidebar_list = mo_get_theme_option('mo_sidebar_list');

        if (!empty($sidebar_list)) {
            foreach ($sidebar_list as $sidebar_item) {
                $sidebar = array('label' => $sidebar_item['title'], 'value' => $sidebar_item['id']);
                $my_sidebars [] = $sidebar;
            }
        }

        $sidebar_meta_box = array(
            'id' => 'mo_sidebar_options',
            'title' => __('Choose Custom Sidebar', 'agile'),
            'desc' => '',
            'pages' => array('post', 'page'),
            'context' => 'side',
            'priority' => 'default',
            'fields' => array(
                array(
                    'id' => 'mo_primary_sidebar_choice',
                    'label' => __('Custom Sidebar Choice', 'agile'),
                    'desc' => __('Custom sidebar for the post/page. <i>Useful if the post/page is not designated as full width.</i>', 'agile'),
                    'std' => '',
                    'type' => 'select',
                    'rows' => '',
                    'post_type' => '',
                    'taxonomy' => '',
                    'class' => '',
                    'choices' => $my_sidebars
                )
            )
        );

        ot_register_meta_box($sidebar_meta_box);
    }
}

if (!function_exists('mo_build_advanced_page_meta_boxes')) {

    function mo_build_advanced_page_meta_boxes() {

        /* Get all menus configured in this site */
        $menu_options = array(array('value' => 'default',
                                    'label' => __('Default', 'agile'),
                                    'src' => ''
                              ));

        $menu_items = get_terms('nav_menu', array('hide_empty' => true));
        foreach ($menu_items as $wp_menu) {
            $menu_options[] = array('value' => $wp_menu->slug,
                                    'label' => $wp_menu->name,
                                    'src' => ''
            );
        };

        $advanced_page_meta_box = array(
            'id' => 'mo_advanced_entry_options',
            'title' => __('Advanced Entry Options', 'agile'),
            'desc' => '',
            'pages' => array(
                'post',
                'page',
                'portfolio'
            ),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_slider_shortcode',
                    'label' => __('Display Slider Shortcode and Remove Title Header', 'agile'),
                    'desc' => __('Provide a shortcode capturing a slider to be shown in the top section of the page, replacing the default page/post title header for this page. The shortcode for the slider is often derived by configuring a slider instance using one of the popular slider plugins like the Revolution Slider bundled with this theme or one of the free slider plugins like the <a href="https://wordpress.org/plugins/smart-slider-3/" title="Smart Slider 3" target="_blank">Smart Slider</a> or the <a href="https://wordpress.org/plugins/ml-slider/" title="Meta Slider" target="_blank">Meta Slider</a>.<br>This option is often used with full width page templates like Home Page or Full Width Page, although one can choose to display sliders in any page.', 'agile'),
                    'std' => '',
                    'type' => 'textarea',
                    'section' => 'general_default',
                    'rows' => '2',
                    'post_type' => 'page,post,portfolio',
                    'taxonomy' => '',
                    'class' => '',
                ),
                array(
                    'id' => 'mo_remove_title_header',
                    'label' => __('Remove Title Header', 'agile'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'checkbox',
                    'post_type' => 'page',
                    'desc' => __('Do not display normal title headers for this entry (disables both custom or default headers specified in heading options below). Useful if normal headers with page/post title and description (or custom HTML) need to be replaced with custom content for a entry as is often the case for pages that use Composite Page template or Home Page template.', 'agile'),
                    'choices' => array(
                        array(
                            'value' => 'Yes',
                            'label' => __('Yes', 'agile'),
                            'src' => ''
                        )
                    )
                ),
                array(
                    'id' => 'mo_custom_primary_navigation_menu',
                    'label' => __('Choose Custom Primary Navigation Menu', 'agile'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'select',
                    'desc' => __('Choose the page specific header navigation menu created using tools in ', 'agile') . mo_get_menu_admin_url() . __('. Useful for one page/single page templates with multiple internal navigation links. Users can choose to any of the custom menu designed in that screen for this page. <br/>Leave "Default" selected to display any global WordPress Menu set by you in ', 'agile') . mo_get_menu_admin_url() . '.',
                    'choices' => $menu_options
                )

            )
        );

        ot_register_meta_box($advanced_page_meta_box);
    }
}

if (!function_exists('mo_build_blog_meta_boxes')) {

    function mo_build_blog_meta_boxes() {
        $post_meta_box = array(
            'id' => 'mo_post_thumbnail_detail',
            'title' => __('Post Thumbnail Options', 'agile'),
            'desc' => '',
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(

                array(
                    'label' => __('Use Video as Thumbnail', 'agile'),
                    'id' => 'mo_use_video_thumbnail',
                    'type' => 'checkbox',
                    'desc' => __('Specify if video will be used as a thumbnail instead of a featured image.', 'agile'),
                    'choices' => array(
                        array(
                            'label' => __('Yes', 'agile'),
                            'value' => 'Yes'
                        )
                    ),
                    'std' => '',
                    'rows' => '',
                    'class' => ''
                ),

                array(
                    'label' => __('Video URL', 'agile'),
                    'id' => 'mo_video_thumbnail_url',
                    'type' => 'text',
                    'desc' => __('Specify the URL of the video (Youtube or Vimeo only).', 'agile'),
                    'std' => '',
                    'rows' => '',
                    'class' => ''
                ),

                array(
                    'label' => __('Use Slider as Thumbnail', 'agile'),
                    'id' => 'mo_use_slider_thumbnail',
                    'type' => 'checkbox',
                    'desc' => __('Specify if slider will be used as a thumbnail instead of a featured image or a video.', 'agile'),
                    'choices' => array(
                        array(
                            'label' => __('Yes', 'agile'),
                            'value' => 'Yes'
                        )
                    ),
                    'std' => '',
                    'rows' => '',
                    'class' => ''
                ),

                array(
                    'label' => __('Images for thumbnail slider', 'agile'),
                    'id' => 'post_slider',
                    'desc' => __('Specify the images to be used a slider thumbnails for the post', 'agile'),
                    'type' => 'list-item',
                    'class' => '',
                    'settings' => array(
                        array(
                            'id' => 'slider_image',
                            'label' => __('Image', 'agile'),
                            'desc' => '',
                            'std' => '',
                            'type' => 'upload',
                            'class' => '',
                            'choices' => array()
                        )
                    )
                )

            )
        );

        ot_register_meta_box($post_meta_box);
    }
}


if (!function_exists('mo_build_entry_header_metaboxes')) {

    function mo_build_entry_header_metaboxes() {
        $header_meta_box = array(
            'id' => 'mo_entry_header_options',
            'title' => __('Header Options', 'agile'),
            'desc' => '',
            'pages' => array('post', 'page', 'portfolio'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_description',
                    'label' => __('Description', 'agile'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'textarea',
                    'desc' => __('Enter the description of the page/post. Shown under the entry title.', 'agile'),
                    'rows' => '2'
                ),
                array(
                    'id' => 'mo_entry_title_background',
                    'label' => __('Entry Title Background', 'agile'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'background',
                    'desc' => __('Specify a background for your page/post title and description.', 'agile'),
                ),
                array(
                    'id' => 'mo_entry_title_height',
                    'label' => __('Page/Post Title Height', 'agile'),
                    'desc' => __('Specify the approximate height in pixel units that the entry title area for a page/post occupies along with the background. <br><br> Does not apply when custom heading content is specified. ', 'agile'),
                    'type' => 'text',
                    'std' => '',
                    'rows' => '',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_disable_breadcrumbs_for_entry',
                    'label' => __('Disable Breadcrumbs on this Post/Page', 'agile'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'checkbox',
                    'desc' => __('Disable Breadcrumbs on this Post/Page. Breadcrumbs can be a hindrance in many pages that showcase marketing content. Home pages and wide layout pages will have no breadcrumbs displayed.', 'agile'),
                    'choices' => array(
                        array(
                            'value' => 'Yes',
                            'label' => __('Yes', 'agile'),
                            'src' => ''
                        )
                    )
                )
            )
        );

        ot_register_meta_box($header_meta_box);

        $custom_header_meta_box = array(
            'id' => 'mo_custom_entry_header_options',
            'title' => __('Custom Header Options', 'agile'),
            'desc' => '',
            'pages' => array('post', 'page', 'portfolio'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_custom_heading_background',
                    'label' => __('Custom Heading Background', 'agile'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'background',
                    'desc' => __('Specify a background for custom heading content that replaces the regular page/post title area. Spans entire screen width or maximum available width (boxed layout).', 'agile'),
                ),
                array(
                    'id' => 'mo_custom_heading_content',
                    'label' => __('Custom Heading Content', 'agile'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'textarea',
                    'desc' => __('Enter custom heading content HTML markup that replaces the regular page/post title area. This can be any of these - image, a slider, a slogan, purchase/request quote button, an invitation to signup or any plain marketing material.<br><br>Shown under the logo area. Be aware of SEO implications and <strong>use heading tags appropriately</strong>.', 'agile'),
                    'rows' => '8'
                ),
                array(
                    'id' => 'mo_wide_heading_layout',
                    'label' => __('Custom Heading Content spans entire screen width', 'agile'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'checkbox',
                    'desc' => __('Make the heading content span the entire screen width. While the background graphics or color spans entire screen width for custom heading content, the HTML markup consisting of heading text and content is restricted to the 1180px grid in the center of the window. <br>Choosing this option will make the content span the entire screen width or max available width(boxed layout).<br><strong>Choose this option when when you want to go for a custom heading with maps or a wide slider like the revolution slider in the custom heading area</strong>.', 'agile'),
                    'choices' => array(
                        array(
                            'value' => 'Yes',
                            'label' => __('Yes', 'agile'),
                            'src' => ''
                        )
                    )
                )
            )
        );

        ot_register_meta_box($custom_header_meta_box);
    }
}

