<?php

if (!function_exists('mo_register_sidebars')) {
    function mo_register_sidebars() {

        $sidebar_names = array(
            'primary-post' => esc_html__('Post Sidebar', 'agile'),
            'primary-blog' => esc_html__('Blog Sidebar', 'agile'),
            'primary-page' => esc_html__('Page Sidebar', 'agile'),
            'primary-portfolio' => esc_html__('Portfolio Sidebar', 'agile'),
            'primary-gallery' => esc_html__('Gallery Sidebar', 'agile'),
            'after-singular-post' => esc_html__('After Singular Post', 'agile'),
            'header' => esc_html__('Header Area', 'agile')
        );

        // Allow others to enhance sidebars
        $sidebar_names = apply_filters('mo_sidebar_names', $sidebar_names);

        $sidebar_descriptions = array(
            'primary-post' => esc_html__('Sidebar displayed in single post', 'agile'),
            'primary-blog' => esc_html__('Sidebar displayed in post archive pages', 'agile'),
            'primary-page' => esc_html__('Sidebar displayed in pages', 'agile'),
            'primary-portfolio' => esc_html__('Sidebar displayed in the Portfolio archive pages', 'agile'),
            'primary-gallery' => esc_html__('Sidebar displayed in the Gallery pages', 'agile'),
            'after-singular-post' => esc_html__('Widgets placed after the single post content', 'agile'),
            'header' => esc_html__('Widget content in the Header area. Typically custom HTML, buttons, social icons etc.', 'agile')
        );

        $sidebar_descriptions = apply_filters('mo_sidebar_descriptions', $sidebar_descriptions);

        //register sidebars
        foreach ($sidebar_names as $id => $name) {
            mo_register_sidebar($id, $name, $sidebar_descriptions[$id]);
        }
    }
}

add_action('widgets_init', 'mo_register_sidebars');

if (!function_exists('mo_register_footer_sidebars')) {
    function mo_register_footer_sidebars() {

        $sidebar_names = array(
            'footer1' => esc_html__('Footer Widget Area One', 'agile'),
            'footer2' => esc_html__('Footer Widget Area Two', 'agile'),
            'footer3' => esc_html__('Footer Widget Area Three', 'agile'),
            'footer4' => esc_html__('Footer Widget Area Four', 'agile'),
            'footer5' => esc_html__('Footer Widget Area Five', 'agile'),
            'footer6' => esc_html__('Footer Widget Area Six', 'agile')
        );

        // Allow others to enhance sidebars
        $sidebar_names = apply_filters('mo_footer_sidebar_names', $sidebar_names);

        $sidebar_descriptions = array(
            'footer1' => esc_html__('Column 1 of Footer Widget Area', 'agile'),
            'footer2' => esc_html__('Column 2 of Footer Widget Area', 'agile'),
            'footer3' => esc_html__('Column 3 of Footer Widget Area', 'agile'),
            'footer4' => esc_html__('Column 4 of Footer Widget Area', 'agile'),
            'footer5' => esc_html__('Column 5 of Footer Widget Area', 'agile'),
            'footer6' => esc_html__('Column 6 of Footer Widget Area', 'agile')
        );

        $sidebar_descriptions = apply_filters('mo_footer_sidebar_descriptions', $sidebar_descriptions);

        //register footer sidebars
        foreach ($sidebar_names as $id => $name) {
            mo_register_sidebar($id, $name, $sidebar_descriptions[$id]);
        }
    }
}

add_action('widgets_init', 'mo_register_footer_sidebars');

if (!function_exists('mo_register_custom_sidebars')) {
    function mo_register_custom_sidebars() {

        // Get the custom sidebars defined by the users
        $sidebar_list = mo_get_theme_option('mo_sidebar_list');
        if (!empty($sidebar_list)) {
            foreach ($sidebar_list as $sidebar_item) {
                mo_register_sidebar($sidebar_item['id'], $sidebar_item['title']);
            }
        }
    }
}

add_action('widgets_init', 'mo_register_custom_sidebars');


if (!function_exists('mo_register_sidebar')) {
    function mo_register_sidebar($id, $name, $desc = '') {

        if (!empty($id)) {
            register_sidebar(array(
                'id' => $id,
                'name' => $name,
                'description' => $desc,
                'before_widget' => '<aside id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-wrap widget-inside">',
                'after_widget' => '</div></aside>',
                'before_title' => '<h3 class="widget-title"><span>',
                'after_title' => '</span></h3>'
            ));
        }

    }
}

/* Check if any one of the six footer sidebars is active */
if (!function_exists('mo_is_footer_sidebar_active')) {
    function mo_is_footer_sidebar_active() {
        $sidebar_active = false;
        $count = 1;
        while (!$sidebar_active && $count <= 6) {
            $sidebar_active = is_active_sidebar('footer' . $count++);
        }
        return $sidebar_active;
    }
}

if (!function_exists('mo_display_sidebar')) {
    function mo_display_sidebar($sidebar_id, $style_class = '') {

        if (is_active_sidebar($sidebar_id)) : ?>

            <div id="sidebar-<?php echo esc_attr($sidebar_id); ?>"
                 class="sidebar <?php echo esc_attr($style_class); ?>">

                <?php dynamic_sidebar($sidebar_id); ?>

            </div>

        <?php endif;
    }
}
