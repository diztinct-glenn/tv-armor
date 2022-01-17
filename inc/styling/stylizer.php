<?php

if (!function_exists('mo_get_background')) {

    /* Handy  function to set the background for any element with various background css attributes specified */
    function mo_get_background($background) {
        $output = '';
        if ($background) {
            $color = $background['background-color'];
            $image = $background['background-image'];

            if (!empty ($color)) {
                $output .= 'background-color:' . $color . ';';
                // Allow color to replace existing image unless a new one is specified
                if (empty($image))
                    $output .= 'background-image: none;';
            }
            // Do not allow the background attributes to change if no custom image or color is specified.
            // If desperate to change it, best place to change these attributes alone is in Custom CSS.
            if (!empty($color) || !empty($image)) {
                $repeat = $background['background-repeat'];
                $attachment = $background['background-attachment'];
                $position = $background['background-position'];
                $size = $background['background-size'];
                if (!empty ($repeat))
                    $output .= 'background-repeat:' . $repeat . ';';
                if (!empty ($attachment))
                    $output .= 'background-attachment:' . $attachment . ';';
                if (!empty ($position))
                    $output .= 'background-position:' . $position . ';';
                if (!empty ($size))
                    $output .= 'background-size:' . $size . ';';
                else
                    $output .= 'background-size: cover;'; //assume background is big enough to be stretched across the entire width

            }
            if (!empty ($image)) {
                $output .= 'background-image:url(' . $image . ');';
                // Remove the background color if no background color has been specified. Will help some transparent images to achieve the effect desired
                if (empty($color))
                    $output .= 'background-color: none;';
            }
            return $output;
        }
        return $output;
    }
}

if (!function_exists('mo_get_entry_title_background')) {

    function mo_get_entry_title_background($background, $height) {
        $output = "\n" . '#title-area  {';

        if (!empty ($background)) {
            $output .= $background;
            //$output .= 'background-size:cover;'; //assume background is big enough to be stretched across the entire width
            $output .= 'border: none;'; // remove the existing skin based border and box-shadow
            $output .= 'box-shadow: none;';
        }

        if (!empty($height) && $height > 120) {
            $outside_padding = round(($height - 65) / 2); // Subtract the existing height of single line entry title contents and then derive equal padding on top and bottom
            $output .= 'padding: ' . $outside_padding . 'px 0;';
        }


        $output .= '}';
        return $output;
    }
}

if (!function_exists('mo_stylizer_css_for_entry')) {
    function mo_stylizer_css_for_entry() {

        $output = '';

        $background = get_post_meta(get_queried_object_id(), 'mo_entry_title_background', true);
        $height = intval(get_post_meta(get_queried_object_id(), 'mo_entry_title_height', true));
        $background = mo_get_background($background);
        if (!empty($background)) {
            $output .= mo_get_entry_title_background($background, $height);
        }

        $background = get_post_meta(get_queried_object_id(), 'mo_custom_heading_background', true);
        $background = mo_get_background($background);
        if (!empty($background)) {
            $output .= "\n" . '#custom-title-area  {';
            $output .= $background;
            //$output .= 'background-size:cover;'; //assume background is big enough to be stretched across the entire width
            $output .= '}';
        }

        return $output;

    }
}

if (!function_exists('mo_stylizer_css')) {
    function mo_stylizer_css() {


        $output = '';

        /* -------------------- Font Family Option and Font Import ------------------------------------ */

        $heading_font = mo_get_theme_option('mo_custom_heading_font');
        if (empty($heading_font)) {
            $heading_font = mo_get_theme_option('mo_heading_font', 'Lato');
            $heading_font = str_replace(" *", "", $heading_font);
        }
        $output .= "\n" . 'h1,h2,h3,h4,h5,h6, .heading2 .title, .slogan1, .stats .number, .slogan blockquote .footer cite, .client-testimonials2 .header cite, .testimonials2-slider-container blockquote cite, button, .button, input[type=button], input[type="submit"], input[type="reset"], .post-snippets .hentry .entry-title, ul.member-list li a, .team-slider-profiles .footer .follow-text, .woocommerce a.button, .woocommerce-page a.button{';
        $output .= 'font-family:"' . $heading_font . '";';
        $output .= '}';


        if (!empty($heading_font)) {
            $heading_font_spacing = mo_get_theme_option('mo_heading_font_spacing', '1');
            $output .= "\n" . 'h1,h2,h3,h4,h5,h6, .heading2 .title, .slogan1 {';
            $output .= 'letter-spacing:' . $heading_font_spacing . 'px;';
            $output .= '}';
        }

        $body_font = mo_get_theme_option('mo_custom_body_font');
        if (empty($body_font)) {
            $body_font = mo_get_theme_option('mo_body_font', 'Merriweather');
            $body_font = str_replace(" *", "", $body_font);
        }
        $output .= "\n" . 'body, .client-testimonials2 .header .title, blockquote, .comment-author cite, .entry-meta span a, ul.post-list .published, ul.post-list .byline {';
        $output .= 'font-family:"' . $body_font . '";';
        $output .= '}';

        $use_text_logo = mo_get_theme_option('mo_use_text_logo') ? true : false;
        if ($use_text_logo) {
            $logo_font = mo_get_theme_option('mo_logo_font', 'Lato');

            if (!empty($logo_font)) {
                $logo_font = str_replace(" *", "", $logo_font);
                $output .= "\n" . '#site-logo a {';
                $output .= 'font-family:"' . $logo_font . '";';
                $output .= '}';
            }
        }

        /* -------------------- Body Font Styles ------------------------------------ */

        $body_font_size = mo_get_theme_option('mo_body_font_size', 'Default');

        if (!empty($body_font_size) || !empty($body_font_color)) {
            $output .= "\n" . 'body {';
            if ($body_font_size != 'Default')
                $output .= 'font-size:' . $body_font_size . 'px;';

            $output .= '}'; // end body font
        }

        /* -------------------- Header Styling ------------------------------------ */

        $header_height = mo_get_theme_option('mo_header_height');
        if (!empty ($header_height)) {
            $output .= "\n" . '#header .inner .wrap {';
            $output .= 'height:' . $header_height . 'px !important;';
            $output .= '}';
        }

        $tagline_height = mo_get_theme_option('mo_tagline_height');
        $background = mo_get_theme_option('mo_tagline_background');
        $background = mo_get_background($background);
        if (!empty($background)) {

            $output .= mo_get_entry_title_background($background, $tagline_height);

        }

        /* -------------------- Primary Menu Options ------------------------------------ */


        $primary_menu_font_size = mo_get_theme_option('mo_primary_menu_font_size');
        $primary_menu_font_color = mo_get_theme_option('mo_primary_menu_font_color');
        if (!empty($primary_menu_font_size) || !empty($primary_menu_font_color)) {
            $output .= "\n" . '#primary-menu > ul.menu > li > a {';
            if (!empty($primary_menu_font_size))
                $output .= 'font-size:' . $primary_menu_font_size . 'px !important;';
            if (!empty($primary_menu_font_color))
                $output .= 'color:' . $primary_menu_font_color . ' !important;';
            $output .= '}';
        }

        $primary_menu_hover_font_color = mo_get_theme_option('mo_primary_menu_hover_font_color');
        if (!empty($primary_menu_hover_font_color))
            $output .= "\n" . '#primary-menu ul.menu > li.sfHover > a, #primary-menu > ul.menu > li > a:hover { color:' . $primary_menu_hover_font_color . ' !important; }';

        $primary_menu_hover_background_color = mo_get_theme_option('mo_primary_menu_hover_background_color');
        if (!empty($primary_menu_hover_background_color))
            $output .= "\n" . '#primary-menu > ul.menu > li:hover, #primary-menu > ul.menu > li.sfHover { background:' . $primary_menu_hover_background_color . ' !important; }';

        $menu_background_color = mo_get_theme_option('mo_dropdown_menu_background_color');
        if (!empty($menu_background_color)) {
            $output .= "\n" . '.dropdown-menu-wrap ul.sub-menu { background-color: ' . $menu_background_color . ';}';
            $output .= "\n" . '.dropdown-menu-wrap ul.sub-menu li { border: none;}';
        }

        $dropdown_menu_font_size = mo_get_theme_option('mo_dropdown_menu_font_size');
        $dropdown_menu_font_color = mo_get_theme_option('mo_dropdown_menu_font_color');

        if (!empty($dropdown_menu_font_color) || !empty($dropdown_menu_font_size)) {
            $output .= "\n" . '.dropdown-menu-wrap ul.sub-menu > li a { ';
            if (!empty($dropdown_menu_font_color))
                $output .= 'color:' . $dropdown_menu_font_color . ' !important;';
            if (!empty($dropdown_menu_font_size))
                $output .= 'font-size:' . $dropdown_menu_font_size . 'px !important;';
            $output .= '}';
        }

        $menu_background_color = mo_get_theme_option('mo_dropdown_menu_hover_background_color');
        if (!empty($menu_background_color)) {
            $output .= "\n" . '.dropdown-menu-wrap ul.sub-menu li:hover, .dropdown-menu-wrap ul.sub-menu li.sfHover { background-color: ' . $menu_background_color . '}';
        }

        $dropdown_menu_hover_font_color = mo_get_theme_option('mo_dropdown_menu_hover_font_color');
        if (!empty($dropdown_menu_hover_font_color))
            $output .= "\n" . '.dropdown-menu-wrap ul.sub-menu li:hover a, .dropdown-menu-wrap ul.sub-menu li.sfHover a { color:' . $dropdown_menu_hover_font_color . ' !important;}';

        /* ------------------- SITE LOGO OPTIONS ------------------------------- */

        $use_text_logo = mo_get_theme_option('mo_use_text_logo') ? true : false;
        $logo_text_color = mo_get_theme_option('mo_logo_text_color');
        if ($use_text_logo && $logo_text_color) {
            $output .= "\n" . '#site-logo a {';
            if ($logo_text_color)
                $output .= 'color:' . $logo_text_color . ';';
            $output .= '}';
        }

        /* -------------------- Sidebar Options ------------------------------------ */


        $sidebar_bg = mo_get_theme_option('mo_sidebar_background');
        $sidebar_bg = mo_get_background($sidebar_bg);
        if (!empty($sidebar_bg)) {
            $output .= "\n" . '.layout-2c-l #main .inner #sidebar-primary {';
            $output .= $sidebar_bg;
            $output .= '}';
        }

        $sidebar_bg = mo_get_theme_option('mo_left_sidebar_background');
        $sidebar_bg = mo_get_background($sidebar_bg);
        if (!empty($sidebar_bg)) {
            $output .= "\n" . '.layout-2c-r #main .inner #sidebar-primary {';
            $output .= $sidebar_bg;
            $output .= '}';
        }

        /* -------------------- Background Options and Boxed Layout ------------------------------------ */


        $background = mo_get_theme_option('mo_theme_background');
        $background = mo_get_background($background);
        if (!empty($background))
            $output .= "\n" . '#container, #header {' . $background . '}';

        $background = mo_get_theme_option('mo_header_background');
        $background = mo_get_background($background);
        if (!empty($background)) {
            $output .= "\n" . '#header {';
            if (!empty($background))
                $output .= $background;
            $output .= '}';
        }

        $background = mo_get_theme_option('mo_content_area_background');
        $background = mo_get_background($background);
        if (!empty($background))
            $output .= "\n" . '#main {' . $background . '}';

        $background = mo_get_theme_option('mo_footer_background');
        $background = mo_get_background($background);
        if (!empty($background)) {
            $output .= "\n" . '#footer {';
            $output .= $background;
            $output .= '}';
        }

        $background = mo_get_theme_option('mo_footer_bottom_background');
        $background = mo_get_background($background);
        if (!empty($background)) {
            $output .= "\n" . '#footer-bottom {';
            $output .= $background;
            $output .= '}';
        }

        $boxed_layout = (mo_get_theme_option('mo_theme_layout') == 'Boxed') ? true : false;
        if ($boxed_layout) {
            $output .= "\n" . 'body.boxed {';
            $background = mo_get_theme_option('mo_boxed_layout_background');
            $output .= mo_get_background($background);
            $background_stretched = mo_get_theme_option('mo_stretch_boxed_background') ? true : false;
            if ($background_stretched)
                $output .= 'background-size:cover;';
            $output .= '}';
        }

        if (mo_get_theme_option('mo_add_boxed_margins')) {
            $output .= "\n" . '.boxed #container { ';
            $output .= 'margin: 40px auto;';
            $output .= '}';
        }

        $remove_comments_background = (mo_get_theme_option('mo_remove_comments_background'));
        if ($remove_comments_background) {
            // Make the comment area transparent
            $output .= "\n" . '.comment-text-wrap, .comment-list .avatar-wrap { background: none !important; }';
        }

        $comment_background = mo_get_theme_option('mo_comment_background');
        if (!empty($comment_background)) {
            $output .= "\n" . '.comment-text-wrap, .comment-list li li li .comment-text-wrap { background:' . $comment_background . '; }';
            // Get rid of fancy arrows
            $output .= "\n" . '.comment-list .avatar-wrap, .comment-list li li li .avatar-wrap  { background: none; }';
        }

        $alternate_comment_background = mo_get_theme_option('mo_alternate_comment_background');
        if (!empty($alternate_comment_background)) {
            $output .= "\n" . '.comment-list li li .comment-text-wrap, .comment-list li li li li .comment-text-wrap { background-color:' . $alternate_comment_background . ';}';
            // Get rid of fancy arrows
            $output .= "\n" . '.comment-list li li .avatar-wrap, .comment-list li li li li .avatar-wrap { background: none; }';
        }

        /* -------------- Animations for in page elements -------------------- */


        $disable_animations_on_page = mo_get_theme_option('mo_disable_animations_on_page');
        if (empty($disable_animations_on_page)) {
            $output .= "\n" . '#pricing-action .pointing-arrow img { opacity: 0 }';
        }

        /* -------------------- Stylizer CSS for the current post/page ------------------------------------ */

        $output .= mo_stylizer_css_for_entry();

        return $output;

    }
}
