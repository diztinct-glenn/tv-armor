<?php

add_action('vc_before_init', 'mo_setup_vc_integration');

function mo_setup_vc_integration() {

    $vc_templates_path = get_template_directory() . '/inc/vc-extensions/vc-templates/';

    vc_set_shortcodes_templates_dir($vc_templates_path);

    /**
     * Force Visual Composer to initialize as "built into the theme".
     * This will hide certain tabs under the Settings->Visual Composer page
     */
    vc_set_as_theme($disable_updater = true);

    /**
     * Start defining the VC addons part of this theme
     */
    mo_map_vc_elements();

}

function mo_map_vc_elements() {

    if (class_exists('Vc_Manager')) {

        $add_css_animation = array(
            "type" => "dropdown",
            "heading" => __("CSS Animation", "agile"),
            "param_name" => "css_animation",
            "admin_label" => true,
            "value" => array(
                __("No", "agile") => '',
                __("Top to bottom", "agile") => "top-to-bottom",
                __("Bottom to top", "agile") => "bottom-to-top",
                __("Left to right", "agile") => "left-to-right",
                __("Right to left", "agile") => "right-to-left",
                __("Appear from center", "agile") => "appear"
            ),
            "description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "agile")
        );


        if (function_exists('vc_add_param')) {
            vc_add_param('vc_column_inner', $add_css_animation);
        }

        if (function_exists('vc_map')) {

// Custom Map
            vc_map(array(
                "name" => __("Row", "agile"),
                "base" => "vc_row",
                "is_container" => true,
                "icon" => "icon-wpb-row",
                "show_settings_on_create" => true,
                "category" => __('Content', 'agile'),
                "description" => __('Place content elements inside the row', 'agile'),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "heading" => __("ID", "agile"),
                        "admin_label" => true,
                        "param_name" => "mo_id",
                        "description" => __("If this row pertains to the content of one of your sections, set an ID. You can then use it for smooth navigation from menu. Ex: services, portfolio, work", "agile")
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Class", "agile"),
                        "admin_label" => true,
                        "param_name" => "mo_class",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "agile")
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra inline CSS markup", "agile"),
                        "param_name" => "mo_style",
                        "description" => __("Enter any custom inline CSS for the wrapper element.", "agile")
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => __('Type', 'agile'),
                        "param_name" => "mo_row_type",
                        "description" => __("You can specify whether the row is displayed fullwidth or in container.", "agile"),
                        'save_always' => true,
                        "value" => array(
                            __("In Container", 'agile') => 'in_container',
                            __("Fullwidth", 'agile') => 'fullwidth'
                        )
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => __("Background Image", "agile"),
                        "param_name" => "mo_bg_image",
                        "description" => __("Select backgound image for the row to be used as a parallax background.", "agile")
                    ),
                    array(
                        "type" => "checkbox",
                        "heading" => __("Parallax Background?", "agile"),
                        "param_name" => "mo_parallax_bg",
                        "value" => array(__('Yes, please', 'agile') => 'yes'),
                        "description" => __("Specify if this is a parallax background.", "agile")
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => __('Parallax Speed', 'agile'),
                        'param_name' => 'mo_parallax_speed',
                        'value' => array(
                            __('Normal', 'agile') => '0.5',
                            __('Fast', 'agile') => '0.2',
                            __('Slow', 'agile') => '0.8'
                        ),
                        'description' => __('Specify the speed of the parallax motion of the background', 'agile')
                    ),
                    array(
                        "type" => "colorpicker",
                        "heading" => __('Background Color', 'agile'),
                        "param_name" => "mo_bg_color",
                        "description" => __("You can set a background color", "agile")
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => __('Text Color Scheme', 'agile'),
                        "param_name" => "mo_text_scheme",
                        "description" => __("Pick a color scheme for the content text. 'Light Text' looks good on dark bg images while 'Dark Text' looks good on light images.", "agile"),
                        "value" => array(
                            __("Dark Text", 'agile') => 'lighter-overlay',
                            __("Light Text", 'agile') => 'darker-overlay'
                        )
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => __('Padding', 'agile'),
                        "param_name" => "mo_padding",
                        "description" => __("Specify top and bottom padding to be used for row or remove the padding by choosing None value.", "agile"),
                        "value" => array(
                            __("Default", 'agile') => 'default',
                            __("None", 'agile') => 'none',
                            __("Custom", 'agile') => 'custom'
                        )
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Padding Top", "agile"),
                        "param_name" => "mo_padding_top",
                        "description" => __("Enter a value and it will be used for padding-top(px). As an alternative, use the 'Space' element.", "agile"),
                        'dependency' => array(
                            'element' => 'mo_padding',
                            'value' => array('custom')
                        ),
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Padding Bottom", "agile"),
                        "param_name" => "mo_padding_bottom",
                        "description" => __("Enter a value and it will be used for padding-bottom(px). As an alternative, use the 'Space' element.", "agile"),
                        'dependency' => array(
                            'element' => 'mo_padding',
                            'value' => array('custom')
                        ),
                    )
                ),
                "js_view" => 'VcRowView'
            ));

            vc_map(array(
                "name" => __("Contact Form", "agile"),
                "base" => "contact_form",
                "icon" => "icon-contact-form",
                "class" => "contact_form_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Contact Form", "agile"),
                "params" => array(
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Style", "agile"),
                        "description" => __("Custom CSS class name to be set for the DIV element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "mail_to",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Recipient Email", "agile"),
                        "description" => __(" A string field specifying the recipient email where all form submissions will be received.", "agile")
                    ),
                    array(
                        "param_name" => "web_url",
                        "type" => "dropdown",
                        "heading" => __("Web URL Field", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Specify if the user should be requested for Web URL via an input field.", "agile")
                    ),
                    array(
                        "param_name" => "phone",
                        "type" => "dropdown",
                        "heading" => __("Phone Field", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Specify if the users should be requested for their phone number. A phone field is displayed if the value is set to true.", "agile")
                    ),
                    array(
                        "param_name" => "subject",
                        "type" => "dropdown",
                        "heading" => __("Subject Field", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("A form subject field is displayed if the value is set to true.", "agile")
                    ),
                    array(
                        "param_name" => "button_color",
                        "type" => "dropdown",
                        "heading" => __("Button Color", "agile"),
                        "value" => array(
                            __("Default", "agile") => "default",
                            __("Black", "agile") => "black",
                            __("Blue", "agile") => "blue",
                            __("Cyan", "agile") => "cyan",
                            __("Green", "agile") => "green",
                            __("Orange", "agile") => "orange",
                            __("Pink", "agile") => "pink",
                            __("Red", "agile") => "red",
                            __("Teal", "agile") => "teal",
                            __("Theme", "agile") => "theme",
                            __("Trans", "agile") => "trans"
                        ),
                        "description" => __("Color of the submit button.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Pullquote", "agile"),
                "base" => "pullquote",
                "icon" => "icon-pullquote",
                "class" => "pullquote_extended",
                "category" => __("Typography", "agile"),
                "description" => __("Insert Pullquote Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "align",
                        "type" => "dropdown",
                        "heading" => __("Alignment", "agile"),
                        "value" => array(
                            __("None", "agile") => "none",
                            __("Left", "agile") => "left",
                            __("Center", "agile") => "center",
                            __("Right", "agile") => "right"
                        ),
                        "description" => __("Choose Pullquote Alignment (optional)", "agile")
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "admin_label" => true,
                        "heading" => __("Content", "agile"),
                        "description" => __("The actual quotation text for the pullquote element.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Blockquote", "agile"),
                "base" => "blockquote",
                "icon" => "icon-blockquote",
                "class" => "blockquote_extended",
                "category" => __("Typography", "agile"),
                "description" => __("Insert Blockquote Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "heading" => __("Element Id", "agile"),
                        "description" => __("The element id to be set for the blockquote element created", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Blockquote Class", "agile"),
                        "description" => __("Custom CSS class name to be set for the blockquote element created ", "agile")
                    ),
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Blockquote Style", "agile"),
                        "description" => __("Inline CSS styling applied for the blockquote element created ", "agile")
                    ),
                    array(
                        "param_name" => "align",
                        "type" => "dropdown",
                        "heading" => __("Alignment", "agile"),
                        "value" => array(
                            __("None", "agile") => "none",
                            __("Left", "agile") => "left",
                            __("Center", "agile") => "center",
                            __("Right", "agile") => "right"
                        ),
                        "description" => __("Choose blockquote Alignment", "agile")
                    ),
                    array(
                        "param_name" => "subtitle",
                        "type" => "textfield",
                        "heading" => __("Subtitle", "agile"),
                        "description" => __("A companion div element which goes with the blockquote element created. Can be utilized to enhance the quote in parallax or video backgrounds. (optional)", "agile")
                    ),
                    array(
                        "param_name" => "author",
                        "type" => "textfield",
                        "heading" => __("Author", "agile"),
                        "description" => __("Author Information.", "agile")
                    ),
                    array(
                        "param_name" => "affiliation",
                        "type" => "textfield",
                        "heading" => __("Affiliation", "agile"),
                        "description" => __("The entity/organization to which the author of the quote belongs to.", "agile")
                    ),
                    array(
                        "param_name" => "affiliation_url",
                        "type" => "textfield",
                        "heading" => __("Affiliation URL", "agile"),
                        "description" => __("The URL of the entity/organization to which this quote is attributed to", "agile")
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "admin_label" => true,
                        "heading" => __("Content", "agile"),
                        "description" => __("The actual quotation text for the blockquote element.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            vc_map(array(
                "name" => __("Code", "agile"),
                "base" => "code",
                "icon" => "icon-code",
                "class" => "code_extended",
                "category" => __("Typography", "agile"),
                "description" => __("Insert Code Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "heading" => __("Code Content", "agile"),
                        "description" => __("Add the code content.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            vc_map(array(
                "name" => __("Highlight1", "agile"),
                "base" => "highlight1",
                "icon" => "icon-highlight1",
                "class" => "highlight1_extended",
                "category" => __("Typography", "agile"),
                "description" => __("Insert Highlight1 Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "heading" => __("Highlighted Content", "agile"),
                        "description" => __("Specify the content to be highlighted", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Highlight2", "agile"),
                "base" => "highlight2",
                "icon" => "icon-highlight2",
                "class" => "highlight2_extended",
                "category" => __("Typography", "agile"),
                "description" => __("Insert Highlight2 Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "heading" => __("Highlighted Content", "agile"),
                        "description" => __("Specify the content to be highlighted.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("List", "agile"),
                "base" => "list",
                "icon" => "icon-list",
                "class" => "list_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert List Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("List Style", "agile"),
                        "description" => __("Inline CSS styling applied for the UL element created (optional).", "agile")
                    ),
                    array(
                        "param_name" => "type",
                        "type" => "dropdown",
                        "heading" => __("Type", "agile"),
                        "value" => array(
                            __("List 1", "agile") => "list1",
                            __("List 2", "agile") => "list2",
                            __("List 3", "agile") => "list3",
                            __("List 4", "agile") => "list4",
                            __("List 5", "agile") => "list5",
                            __("List 6", "agile") => "list6",
                            __("List 7", "agile") => "list7",
                            __("List 8", "agile") => "list8",
                            __("List 9", "agile") => "list9",
                            __("List 10", "agile") => "list10"
                        ),
                        "description" => __("Custom CSS class name to be set for the UL element created (optional).", "agile")
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "admin_label" => true,
                        "heading" => __("Content", "agile"),
                        "description" => __("The actual list content with LI elements.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Heading", "agile"),
                "base" => "heading2",
                "icon" => "icon-heading",
                "class" => "heading2_extended",
                "category" => __("Typography", "agile"),
                "description" => __("Insert Heading Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Heading Class", "agile"),
                        "description" => __(" Custom CSS class name to be set for the heading div element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Heading Style", "agile"),
                        "description" => __("Inline CSS styling applied for the div element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Title", "agile"),
                        "description" => __("A string value indicating the title of the heading.", "agile")
                    ),
                    array(
                        "param_name" => "pitch_text",
                        "type" => "textfield",
                        "heading" => __("Pitch Text", "agile"),
                        "description" => __("The text displayed below the heading title.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Icon", "agile"),
                "base" => "icon",
                "icon" => "icon-icon",
                "class" => "icon_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Icon Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Icon Class", "agile"),
                        "description" => __("Custom CSS class name to be set for the icon element created. The class names are listed at https://www.livemeshthemes.com/support/faqs/how-to-use-1500-icons-bundled-with-the-agile-theme/", "agile")
                    ),
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Icon Style", "agile"),
                        "description" => __("Inline CSS styling applied for the icon element created (optional). Useful if you want to specify font-size, color etc. for the icon inline.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Action Call", "agile"),
                "base" => "action_call",
                "icon" => "icon-action-call",
                "class" => "action_call_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Action Call Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "text",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Text", "agile"),
                        "description" => __("Text to be displayed urging for an action call.", "agile")
                    ),
                    array(
                        "param_name" => "button_text",
                        "type" => "textfield",
                        "heading" => __("Button Text", "agile"),
                        "description" => __("The title to be displayed for the button.", "agile")
                    ),
                    array(
                        "param_name" => "button_color",
                        "type" => "dropdown",
                        "heading" => __("Button Color Options", "agile"),
                        "value" => array(
                            __("Default", "agile") => "default",
                            __("Black", "agile") => "black",
                            __("Blue", "agile") => "blue",
                            __("Cyan", "agile") => "cyan",
                            __("Green", "agile") => "green",
                            __("Orange", "agile") => "orange",
                            __("Pink", "agile") => "pink",
                            __("Red", "agile") => "red",
                            __("Teal", "agile") => "teal",
                            __("Theme", "agile") => "theme",
                            __("Trans", "agile") => "trans"
                        ),
                        "description" => __("The color of the button.", "agile")
                    ),
                    array(
                        "param_name" => "button_url",
                        "type" => "textfield",
                        "heading" => __("Button URL", "agile"),
                        "description" => __("The URL to which the button links to.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Button", "agile"),
                "base" => "button",
                "icon" => "icon-button",
                "class" => "button_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Button Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "heading" => __("Element Id", "agile"),
                        "description" => __("The element id to be set for the button element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Button Class", "agile"),
                        "description" => __("Custom CSS class name to be set for the button element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Button Style", "agile"),
                        "description" => __("Inline CSS styling applied for the button element created eg.padding: 10px 20px; (optional)", "agile")
                    ),
                    array(
                        "param_name" => "color",
                        "type" => "dropdown",
                        "heading" => __("Color", "agile"),
                        "value" => array(
                            __("Default", "agile") => "default",
                            __("Theme", "agile") => "theme",
                            __("Black", "agile") => "black",
                            __("Blue", "agile") => "blue",
                            __("Cyan", "agile") => "cyan",
                            __("Green", "agile") => "green",
                            __("Orange", "agile") => "orange",
                            __("Pink", "agile") => "pink",
                            __("Red", "agile") => "red",
                            __("Teal", "agile") => "teal",
                            __("Trans", "agile") => "trans"
                        ),
                        "description" => __("The color of the button.", "agile")
                    ),
                    array(
                        "param_name" => "align",
                        "type" => "dropdown",
                        "heading" => __("Alignment", "agile"),
                        "value" => array(
                            __("None", "agile") => "none",
                            __("Left", "agile") => "left",
                            __("Center", "agile") => "center",
                            __("Right", "agile") => "right"
                        ),
                        "description" => __(" Alignment of the button and text alignment of the button title displayed.", "agile")
                    ),
                    array(
                        "param_name" => "type",
                        "type" => "dropdown",
                        "heading" => __("Type", "agile"),
                        "value" => array(
                            __("Large", "agile") => "large",
                            __("Small", "agile") => "small",
                            __("Rounded", "agile") => "rounded"
                        ),
                        "description" => __("Can be large, small or rounded.", "agile")
                    ),
                    array(
                        "param_name" => "href",
                        "type" => "textfield",
                        "heading" => __("URL", "agile"),
                        "description" => __("The URL to which button should point to. The user is taken to this destination when the button is clicked.eg.http://targeturl.com", "agile")
                    ),
                    array(
                        "param_name" => "target",
                        "type" => "dropdown",
                        "heading" => __("Button Target", "agile"),
                        "value" => array(
                            __("Open link in the same window", "agile") => "_self",
                            __("Open link in new window", "agile") => "_blank"
                        ),
                        "description" => __("_self = open in same window. _blank = open in new window", "agile")
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Title", "agile"),
                        "description" => __("Specify the title of the button.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Image", "agile"),
                "base" => "image",
                "icon" => "icon-image",
                "class" => "image_extended",
                "category" => __("Media", "agile"),
                "description" => __("Insert Image Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Image Class", "agile"),
                        "description" => __("Custom CSS class name to be set for the IMG element created (optional).", "agile")
                    ),
                    array(
                        "param_name" => "image_id",
                        "type" => "attach_image",
                        "heading" => __("Choose Image", "agile"),
                        "description" => __("Choose your image. An IMG element will be created for this image and the image will be cropped and styled as per the parameters provided", "agile")
                    ),
                    array(
                        "param_name" => "align",
                        "type" => "dropdown",
                        "heading" => __("Alignment", "agile"),
                        "value" => array(
                            __("None", "agile") => "none",
                            __("Left", "agile") => "left",
                            __("Center", "agile") => "center",
                            __("Right", "agile") => "right"
                        ),
                        "description" => __("Choose Image Alignment", "agile")
                    ),
                    array(
                        "param_name" => "width",
                        "type" => "textfield",
                        "heading" => __("Width", "agile"),
                        "description" => __("Any custom width (in pixel units) specified for the element (optional). The original image (pointed to by the src parameter) will be cropped to this width.", "agile")
                    ),
                    array(
                        "param_name" => "height",
                        "type" => "textfield",
                        "heading" => __("Height", "agile"),
                        "description" => __("Any custom height (in pixel units) specified for the element (optional). The original image (pointed to by the Image URL parameter) will be cropped to this height.", "agile")
                    ),
                    array(
                        "param_name" => "size",
                        "type" => "dropdown",
                        "heading" => __("Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __("Takes effect if no custom width or height is specified. The original image (pointed to by the Image URL parameter) is cropped to the size specified.", "agile")
                    ),
                    array(
                        "param_name" => "link",
                        "type" => "textfield",
                        "heading" => __("Link URL", "agile"),
                        "description" => __("Specify a URL to which the link should point to if image should be a link (optional).", "agile")
                    ),
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "heading" => __("Image Title", "agile"),
                        "description" => __("The title of the link to which image points to.", "agile")
                    ),
                    array(
                        "param_name" => "alt",
                        "type" => "textfield",
                        "heading" => __("Alt Text", "agile"),
                        "description" => __("The alt attribute value for the IMG element.", "agile")
                    ),
                    array(
                        "param_name" => "image_frame",
                        "type" => "dropdown",
                        "heading" => __("Image Frame", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("A boolean value specifying if the image should be wrapped in a border frame and another type of frame as styled by the theme", "agile")
                    ),
                    array(
                        "param_name" => "wrapper",
                        "type" => "dropdown",
                        "heading" => __("Wrapper", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("A boolean value indicating if the a wrapper DIV element needs to be created for the image.", "agile")
                    ),
                    array(
                        "param_name" => "wrapper_class",
                        "type" => "textfield",
                        "heading" => __("Wrapper Class", "agile"),
                        "description" => __("The CSS class for any wrapper DIV element created for the image. (optional)", "agile")
                    ),
                    array(
                        "param_name" => "wrapper_style",
                        "type" => "textfield",
                        "heading" => __("Wrapper Style", "agile"),
                        "description" => __("The inline CSS styling for any wrapper DIV element created for the image. (optional)", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Ytp Video Showcase", "agile"),
                "base" => "ytp_video_showcase",
                "icon" => "icon-ytp-video-showcase",
                "class" => "ytp_video_showcase_extended",
                "category" => __("Media", "agile"),
                "description" => __("Insert YouTube Video Showcase Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "heading" => __("Element Id", "agile"),
                        "description" => __("The id of the DIV element created to wrap the YouTube video (optional). Default is video-intro.", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Class", "agile"),
                        "description" => __("The CSS class of the DIV element created to wrap the YouTube video (optional).", "agile")
                    ),
                    array(
                        "param_name" => "video_url",
                        "type" => "textfield",
                        "heading" => __("Video URL", "agile"),
                        "admin_label" => true,
                        "description" => __("Enter the YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).", "agile")
                    ),
                    array(
                        "param_name" => "mute",
                        "type" => "dropdown",
                        "heading" => __("Mute", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Indicate if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute", "agile")
                    ),
                    array(
                        "param_name" => "show_controls",
                        "type" => "dropdown",
                        "heading" => __("Show Controls", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Show or hide the controls bar at the bottom of the page.", "agile")
                    ),
                    array(
                        "param_name" => "containment",
                        "type" => "dropdown",
                        "heading" => __("Containment", "agile"),
                        "value" => array(
                            __("Self", "agile") => "self",
                            __("Body", "agile") => "body"
                        ),
                        "description" => __("The CSS selector of the DOM element where you want the video background; if set to “self” the player will be instanced on that element.", "agile")
                    ),
                    array(
                        "param_name" => "quality",
                        "type" => "dropdown",
                        "heading" => __("Quality", "agile"),
                        "value" => array(
                            __("highres", "agile") => "highres",
                            __("hd720", "agile") => "hd720",
                            __("hd1080", "agile") => "hd1080",
                            __("Large", "agile") => "large",
                            __("Medium", "agile") => "medium",
                            __("Small", "agile") => "small"
                        ),
                        "description" => __("Quality of video", "agile")
                    ),
                    array(
                        "param_name" => "optimize_display",
                        "type" => "dropdown",
                        "heading" => __("Optimize Display", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Will fit the video size into the window size optimizing the view.", "agile")
                    ),
                    array(
                        "param_name" => "loop",
                        "type" => "dropdown",
                        "heading" => __("Loop", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Whether to loop the movie once ended.", "agile")
                    ),
                    array(
                        "param_name" => "start_at",
                        "type" => "textfield",
                        "heading" => __("Video Starts At", "agile"),
                        "value" => 0,
                        "description" => __("Specify a number which sets the seconds the video should start at(optional). Starts at 0 by default.", "agile")
                    ),
                    array(
                        "param_name" => "opacity",
                        "type" => "textfield",
                        "heading" => __("Opacity", "agile"),
                        "value" => 1,
                        "description" => __("Define the opacity of the video. Specify a decimal value between 0 and 1.", "agile")
                    ),
                    array(
                        "param_name" => "vol",
                        "type" => "textfield",
                        "heading" => __("Volume", "agile"),
                        "value" => 50,
                        "description" => __("A numerical value between 1 to 100 - set the volume level of the video.", "agile")
                    ),
                    array(
                        "param_name" => "ratio",
                        "type" => "dropdown",
                        "heading" => __("Aspect Ratio", "agile"),
                        "value" => array(
                            __("16/9", "agile") => "16/9",
                            __("4/3", "agile") => "4/3"
                        ),
                        "description" => __("Set the aspect ratio of the movie", "agile")
                    ),
                    array(
                        "param_name" => "autoplay",
                        "type" => "dropdown",
                        "heading" => __("Autoplay", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Specify whether to automatically play the video once ready.", "agile")
                    ),
                    array(
                        "param_name" => "placeholder_image_id",
                        "type" => "attach_image",
                        "heading" => __("Placeholder Image", "agile"),
                        "description" => __("Choose the placeholder image to be displayed instead of YouTube video in mobile devices.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_color",
                        "type" => "colorpicker",
                        "heading" => __("Overlay Color", "agile"),
                        "description" => __("The color of the overlay to be applied on the video.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_opacity",
                        "type" => "textfield",
                        "heading" => __("Overlay Opacity", "agile"),
                        "value" => 0.7,
                        "description" => __("The opacity of the overlay color. Specify a value between 0 and 1.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_pattern_id",
                        "type" => "attach_image",
                        "heading" => __("Overlay Pattern", "agile"),
                        "description" => __("The image which can act as a pattern displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "heading" => __("Title", "agile"),
                        "description" => __("The title text displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "text",
                        "type" => "textfield",
                        "heading" => __("Text", "agile"),
                        "description" => __("The text displayed on top of the video; below the title.", "agile")
                    ),
                    array(
                        "param_name" => "button_text",
                        "type" => "textfield",
                        "heading" => __("Button Text", "agile"),
                        "description" => __(" The title for the button displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "button_url",
                        "type" => "textfield",
                        "heading" => __("Button URL", "agile"),
                        "description" => __("The URL pointed to by the button displayed on top of the video.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Ytp Video Section", "agile"),
                "base" => "ytp_video_section",
                "icon" => "icon-ytp-video-section",
                "class" => "ytp_video_section_extended",
                "category" => __("Media", "agile"),
                "description" => __("Insert YouTube Video Section Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "heading" => __("Element Id", "agile"),
                        "description" => __("The id of the DIV element created to wrap the YouTube video (optional). ", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Class", "agile"),
                        "description" => __("The CSS class of the DIV element created to wrap the YouTube video (optional).", "agile")
                    ),
                    array(
                        "param_name" => "video_url",
                        "type" => "textfield",
                        "heading" => __("Video URL", "agile"),
                        "admin_label" => true,
                        "description" => __("Enter the YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).", "agile")
                    ),
                    array(
                        "param_name" => "mute",
                        "type" => "dropdown",
                        "heading" => __("Mute", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Indicate if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute", "agile")
                    ),
                    array(
                        "param_name" => "show_controls",
                        "type" => "dropdown",
                        "heading" => __("Show Controls", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Show or hide the controls bar at the bottom of the page.", "agile")
                    ),
                    array(
                        "param_name" => "containment",
                        "type" => "dropdown",
                        "heading" => __("Containment", "agile"),
                        "value" => array(
                            __("Self", "agile") => "self",
                            __("Body", "agile") => "body"
                        ),
                        "description" => __("The CSS selector of the DOM element where you want the video background; if set to “self” the player will be instanced on that element.", "agile")
                    ),
                    array(
                        "param_name" => "quality",
                        "type" => "dropdown",
                        "heading" => __("Quality", "agile"),
                        "value" => array(
                            __("highres", "agile") => "highres",
                            __("hd720", "agile") => "hd720",
                            __("hd1080", "agile") => "hd1080",
                            __("Large", "agile") => "large",
                            __("Medium", "agile") => "medium",
                            __("Small", "agile") => "small"
                        ),
                        "description" => __("Quality of video (optional)", "agile")
                    ),
                    array(
                        "param_name" => "optimize_display",
                        "type" => "dropdown",
                        "heading" => __("Optimize Display", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Will fit the video size into the window size optimizing the view.", "agile")
                    ),
                    array(
                        "param_name" => "loop",
                        "type" => "dropdown",
                        "heading" => __("Loop", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Whether to loop the movie once ended.", "agile")
                    ),
                    array(
                        "param_name" => "start_at",
                        "type" => "textfield",
                        "heading" => __("Video Starts At", "agile"),
                        "value" => 0,
                        "description" => __("Set the seconds the video should start at (optional). Starts at 0 by default.", "agile")
                    ),
                    array(
                        "param_name" => "opacity",
                        "type" => "textfield",
                        "heading" => __("Opacity", "agile"),
                        "value" => 1,
                        "description" => __("Define the opacity of the video. Specify a decimal value between 0 and 1.", "agile")
                    ),
                    array(
                        "param_name" => "vol",
                        "type" => "textfield",
                        "heading" => __("Volume", "agile"),
                        "value" => 50,
                        "description" => __("A value between 1 to 100 - set the volume level of the video.", "agile")
                    ),
                    array(
                        "param_name" => "ratio",
                        "type" => "dropdown",
                        "heading" => __("Aspect Ratio", "agile"),
                        "value" => array(
                            __("16/9", "agile") => "16/9",
                            __("4/3", "agile") => "4/3"
                        ),
                        "description" => __("Set the aspect ratio of the movie", "agile")
                    ),
                    array(
                        "param_name" => "autoplay",
                        "type" => "dropdown",
                        "heading" => __("Autoplay", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Specify whether to automatically play the video once ready.", "agile")
                    ),
                    array(
                        "param_name" => "placeholder_image_id",
                        "type" => "attach_image",
                        "heading" => __("Placeholder Image", "agile"),
                        "description" => __("The placeholder image to be displayed instead of YouTube video in mobile devices.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_color",
                        "type" => "colorpicker",
                        "heading" => __("Overlay Color", "agile"),
                        "description" => __("The color of the overlay to be applied on the video.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_opacity",
                        "type" => "textfield",
                        "value" => 0.7,
                        "heading" => __("Overlay Opacity", "agile"),
                        "description" => __("The opacity of the overlay color. Specify a value between 0 and 1.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_pattern_id",
                        "type" => "attach_image",
                        "heading" => __("Overlay Pattern", "agile"),
                        "description" => __("The image which can act as a pattern displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "text",
                        "type" => "textfield",
                        "heading" => __("Text", "agile"),
                        "description" => __("The title text displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "button_text",
                        "type" => "textfield",
                        "heading" => __("Button Text", "agile"),
                        "description" => __(" The title for the button displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "button_url",
                        "type" => "textfield",
                        "heading" => __("Button URL", "agile"),
                        "description" => __("The URL pointed to by the button displayed on top of the video.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Video Showcase", "agile"),
                "base" => "video_showcase",
                "icon" => "icon-video-showcase",
                "class" => "video_showcase_extended",
                "category" => __("Media", "agile"),
                "description" => __("Insert HTML5 Video Showcase Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "value" => "video-intro",
                        "heading" => __("Element Id", "agile"),
                        "description" => __("The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Class", "agile"),
                        "description" => __("The CSS class of the DIV element created to wrap the HTML5 video (optional). Default is video-heading.", "agile")
                    ),
                    array(
                        "param_name" => "video_id",
                        "type" => "textfield",
                        "heading" => __("Video Element Id", "agile"),
                        "description" => __("The id of the VIDEO tag element (optional).", "agile")
                    ),
                    array(
                        "param_name" => "mp4_url",
                        "type" => "textfield",
                        "heading" => __("MP4 URL", "agile"),
                        "admin_label" => true,
                        "description" => __("The URL of the video uploaded in MP4 format.", "agile")
                    ),
                    array(
                        "param_name" => "ogg_url",
                        "type" => "textfield",
                        "heading" => __("OGG URL", "agile"),
                        "admin_label" => true,
                        "description" => __("The URL of the video uploaded in OGG format.", "agile")
                    ),
                    array(
                        "param_name" => "webm_url",
                        "type" => "textfield",
                        "heading" => __("WEBM URL", "agile"),
                        "admin_label" => true,
                        "description" => __("The URL of the video uploaded in WEBM format.", "agile")
                    ),
                    array(
                        "param_name" => "muted",
                        "type" => "dropdown",
                        "heading" => __("Mute/Unmute", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Specify if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute after the video starts.", "agile")
                    ),
                    array(
                        "param_name" => "loop",
                        "type" => "dropdown",
                        "heading" => __("Loop", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Whether to loop the movie once ended.", "agile")
                    ),
                    array(
                        "param_name" => "autoplay",
                        "type" => "dropdown",
                        "heading" => __("Autoplay", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Whether to automatically play the video once ready.", "agile")
                    ),
                    array(
                        "param_name" => "preload",
                        "type" => "dropdown",
                        "heading" => __("Preload Video", "agile"),
                        "value" => array(
                            __("Metadata", "agile") => "metadata",
                            __("Auto", "agile") => "auto",
                            __("None", "agile") => "none"
                        ),
                        "description" => __("Specify if the HTML5 video needs to be preloaded irrespective of whether the user chooses to play or not. Possible values are auto (preloads entire video when the page loads), metadata (load only metadata when page loads) and none (preload nothing on page load).", "agile")
                    ),
                    array(
                        "param_name" => "placeholder_image_id",
                        "type" => "attach_image",
                        "heading" => __("Placeholder Image", "agile"),
                        "description" => __("The placeholder image to be displayed instead of YouTube video in mobile devices.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_color",
                        "type" => "colorpicker",
                        "heading" => __("Overlay Color", "agile"),
                        "description" => __("The color of the overlay to be applied on the video.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_opacity",
                        "type" => "textfield",
                        "value" => 0.7,
                        "heading" => __("Overlay Opacity", "agile"),
                        "description" => __("The opacity of the overlay color. Specify a value between 0 and 1.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_pattern_id",
                        "type" => "attach_image",
                        "heading" => __("Overlay Pattern", "agile"),
                        "description" => __("The image which can act as a pattern displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "heading" => __("Title", "agile"),
                        "description" => __("The title text displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "text",
                        "type" => "textfield",
                        "heading" => __("Text", "agile"),
                        "description" => __("The subtitle displayed on top of the video, below the title.", "agile")
                    ),
                    array(
                        "param_name" => "button_text",
                        "type" => "textfield",
                        "heading" => __("Button Text", "agile"),
                        "description" => __(" The title for the button displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "button_url",
                        "type" => "textfield",
                        "heading" => __("Button URL", "agile"),
                        "description" => __("The URL pointed to by the button displayed on top of the video.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Video Section", "agile"),
                "base" => "video_section",
                "icon" => "icon-video-section",
                "class" => "video_section_extended",
                "category" => __("Media", "agile"),
                "description" => __("Insert HTML5 Video Section Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "value" => "video-intro",
                        "heading" => __("Element Id", "agile"),
                        "description" => __("The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Class", "agile"),
                        "description" => __("The CSS class of the DIV element created to wrap the HTML5 video (optional).", "agile")
                    ),
                    array(
                        "param_name" => "video_id",
                        "type" => "textfield",
                        "heading" => __("Video Id", "agile"),
                        "description" => __("The id of the VIDEO tag element. (optional)", "agile")
                    ),
                    array(
                        "param_name" => "mp4_url",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("MP4 URL", "agile"),
                        "description" => __("The URL of the video uploaded in MP4 format.", "agile")
                    ),
                    array(
                        "param_name" => "ogg_url",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("OGG URL", "agile"),
                        "description" => __("The URL of the video uploaded in OGG format.", "agile")
                    ),
                    array(
                        "param_name" => "webm_url",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("WEBM URL", "agile"),
                        "description" => __("The URL of the video uploaded in WEBM format.", "agile")
                    ),
                    array(
                        "param_name" => "muted",
                        "type" => "dropdown",
                        "heading" => __("Mute/Unmute", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Specify if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute after the video starts.", "agile")
                    ),
                    array(
                        "param_name" => "loop",
                        "type" => "dropdown",
                        "heading" => __("Loop", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Whether to loop the movie once ended.", "agile")
                    ),
                    array(
                        "param_name" => "autoplay",
                        "type" => "dropdown",
                        "heading" => __("Autoplay", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Whether to automatically play the video once ready.", "agile")
                    ),
                    array(
                        "param_name" => "preload",
                        "type" => "dropdown",
                        "heading" => __("Preload Video", "agile"),
                        "value" => array(
                            __("Auto", "agile") => "auto",
                            __("Metadata", "agile") => "metadata",
                            __("None", "agile") => "none"
                        ),
                        "description" => __("Specify if the HTML5 video needs to be preloaded irrespective of whether the user chooses to play or not. Possible values are auto (preloads entire video when the page loads), metadata (load only metadata when page loads) and none (preload nothing on page load).", "agile")
                    ),
                    array(
                        "param_name" => "placeholder_image_id",
                        "type" => "attach_image",
                        "heading" => __("Placeholder Image", "agile"),
                        "description" => __("The placeholder image to be displayed instead of YouTube video in mobile devices.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_color",
                        "type" => "colorpicker",
                        "heading" => __("Overlay Color", "agile"),
                        "description" => __("The color of the overlay to be applied on the video.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_opacity",
                        "type" => "textfield",
                        "value" => 0.7,
                        "heading" => __("Overlay Opacity", "agile"),
                        "description" => __("The opacity of the overlay color.", "agile")
                    ),
                    array(
                        "param_name" => "overlay_pattern_id",
                        "type" => "attach_image",
                        "heading" => __("Overlay Pattern", "agile"),
                        "description" => __("The image which can act as a pattern displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "text",
                        "type" => "textfield",
                        "heading" => __("Text", "agile"),
                        "description" => __("The title text displayed on top of the video.", "agile")
                    ),
                    array(
                        "param_name" => "button_text",
                        "type" => "textfield",
                        "heading" => __("Button Text", "agile"),
                        "description" => __(" The title for the button displayed on top of the video, below the text.", "agile")
                    ),
                    array(
                        "param_name" => "button_url",
                        "type" => "textfield",
                        "heading" => __("Button URL", "agile"),
                        "description" => __("The URL pointed to by the button displayed on top of the video.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Audio", "agile"),
                "base" => "audio",
                "icon" => "icon-audio",
                "class" => "audio_extended",
                "category" => __("Media", "agile"),
                "description" => __("Insert HTML5 Audio Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "ogg_url",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("OGG URL", "agile"),
                        "description" => __("The URL of the audio clip uploaded in OGG format.eg.http://mydomain.com/song.ogg", "agile")
                    ),
                    array(
                        "param_name" => "mp3_url",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("MP4 URL", "agile"),
                        "description" => __("The URL of the audio uploaded in MP3 format.eg.http://mydomain.com/song.mp3", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Show Post Snippets", "agile"),
                "base" => "show_post_snippets",
                "icon" => "icon-show-post-snippets",
                "class" => "show_post_snippets_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Post Snippets", "agile"),
                "params" => array(
                    array(
                        "param_name" => "post_type",
                        "type" => "dropdown",
                        "heading" => __("Post Type", "agile"),
                        "admin_label" => true,
                        "value" => array(
                            __("Post", "agile") => "post",
                            __("Gallery", "agile") => "gallery_item",
                            __("Team", "agile") => "team"
                        ),
                        "description" => __("The custom post type whose posts need to be displayed. Examples include post, gallery, team etc.", "agile")
                    ),
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "heading" => __("Title", "agile"),
                        "description" => __("Display a header title for the post snippets.", "agile")
                    ),
                    array(
                        "param_name" => "layout_class",
                        "type" => "textfield",
                        "heading" => __("Layout Class", "agile"),
                        "description" => __("The CSS class to be set for the list element (UL) displaying the post snippets (optional). Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.", "agile")
                    ),
                    array(
                        "param_name" => "number_of_columns",
                        "type" => "textfield",
                        "heading" => __("Number of Columns", "agile"),
                        "description" => __("The number of columns to display per row of the post snippets", "agile")
                    ),
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "heading" => __("Number of Posts", "agile"),
                        "description" => __("Number of posts to display", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full", "agile")
                    ),
                    array(
                        "param_name" => "no_margin",
                        "type" => "dropdown",
                        "heading" => __("No Margin - Packed Layout", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "agile")
                    ),
                    array(
                        "param_name" => "display_title",
                        "type" => "dropdown",
                        "heading" => __("Display Title", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Specify if the title of the post or custom post type needs to be displayed below the featured image", "agile")
                    ),
                    array(
                        "param_name" => "display_summary",
                        "type" => "dropdown",
                        "heading" => __("Display Summary", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.", "agile")
                    ),
                    array(
                        "param_name" => "show_excerpt",
                        "type" => "dropdown",
                        "heading" => __("Show Excerpt", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Display excerpt for the post/custom post type. Has no effect if Display Summary is set to false.", "agile")
                    ),
                    array(
                        "param_name" => "excerpt_count",
                        "type" => "textfield",
                        "heading" => __("Excerpt Count", "agile"),
                        "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "agile")
                    ),
                    array(
                        "param_name" => "hide_thumbnail",
                        "type" => "dropdown",
                        "heading" => __("Hide Thumbnail", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Specify if the thumbnail needs to be hidden", "agile")
                    ),
                    array(
                        "param_name" => "show_meta",
                        "type" => "dropdown",
                        "heading" => __("Display Meta", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Display meta information like the author, date of publishing and number of comments", "agile")
                    ),
                    array(
                        "param_name" => "taxonomy",
                        "type" => "dropdown",
                        "heading" => __("Taxonomy", "agile"),
                        "value" => array(
                            __("None", "agile") => "",
                            __("Category", "agile") => "category",
                            __("Tag", "agile") => "post_tag",
                            __("Gallery Category", "agile") => "gallery_category",
                            __("Fitness Category", "agile") => "fitness_category",
                            __("Team Department", "agile") => "department"
                        ),
                        "description" => __("Custom taxonomy to be used for filtering the posts/custom post types displayed like category, department etc.", "agile")
                    ),
                    array(
                        "param_name" => "terms",
                        "type" => "exploded_textarea",
                        "heading" => __("Taxonomy Terms", "agile"),
                        "description" => __(" A list of terms of taxonomy specified for which the items needs to be displayed. Divide terms with linebreaks (Enter). <br>Helps filter the results by category/taxonomy, if the these terms are defined for the taxonomy chosen.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Show Portfolio", "agile"),
                "base" => "show_portfolio",
                "icon" => "icon-show-portfolio",
                "class" => "show_portfolio_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Portfolio", "agile"),
                "params" => array(
                    array(
                        "param_name" => "number_of_columns",
                        "type" => "textfield",
                        "heading" => __("Number of Columns", "agile"),
                        "description" => __("The number of columns to display per row of the post snippets", "agile")
                    ),
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "heading" => __("Number of Posts", "agile"),
                        "description" => __(" Total number of portfolio items to display.", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full.", "agile")
                    ),
                    array(
                        "param_name" => "filterable",
                        "type" => "dropdown",
                        "heading" => __("Filterable", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("The portfolio items will be filterable based on portfolio categories if set to true.", "agile")
                    ),
                    array(
                        "param_name" => "no_margin",
                        "type" => "dropdown",
                        "heading" => __("No Margin - Packed Layout", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Show Gallery", "agile"),
                "base" => "show_gallery",
                "icon" => "icon-show-gallery",
                "class" => "show_gallery_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Gallery", "agile"),
                "params" => array(
                    array(
                        "param_name" => "number_of_columns",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Number of Columns", "agile"),
                        "description" => __("The number of columns to display per row of the post snippets", "agile")
                    ),
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Number of Posts", "agile"),
                        "description" => __(" Total number of Gallery items to display", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full", "agile")
                    ),
                    array(
                        "param_name" => "filterable",
                        "type" => "dropdown",
                        "heading" => __("Filterable", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("The Gallery items will be filterable based on gallery categories if set to true.", "agile")
                    ),
                    array(
                        "param_name" => "no_margin",
                        "type" => "dropdown",
                        "heading" => __("No Margin - Packed Layout", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" If set to true, no margins are maintained between the columns.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Recent Posts", "agile"),
                "base" => "recent_posts",
                "icon" => "icon-recent-posts",
                "class" => "recent_posts_extended",
                "category" => __("Blog Posts", "agile"),
                "description" => __("Insert Blog Post Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Number of Posts", "agile"),
                        "description" => __("Number of posts to display", "agile")
                    ),
                    array(
                        "param_name" => "hide_thumbnail",
                        "type" => "dropdown",
                        "heading" => __("Hide Thumbnail", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Display thumbnail image or hide the same", "agile")
                    ),
                    array(
                        "param_name" => "show_meta",
                        "type" => "dropdown",
                        "heading" => __("Display Meta Information", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Display meta information like the author, date of publishing and number of comments", "agile")
                    ),
                    array(
                        "param_name" => "excerpt_count",
                        "type" => "textfield",
                        "heading" => __("Excerpt Count", "agile"),
                        "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Popular Posts", "agile"),
                "base" => "popular_posts",
                "icon" => "icon-popular-posts",
                "class" => "popular_posts_extended",
                "category" => __("Blog Posts", "agile"),
                "description" => __("Insert Popular Posts Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Number Of Posts", "agile"),
                        "description" => __("Number of posts to display", "agile")
                    ),
                    array(
                        "param_name" => "hide_thumbnail",
                        "type" => "dropdown",
                        "heading" => __("Hide Thumbnail", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Display thumbnail image or hide the same", "agile")
                    ),
                    array(
                        "param_name" => "show_meta",
                        "type" => "dropdown",
                        "heading" => __("Display Meta Information", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Display meta information like the author, date of publishing and number of comments", "agile")
                    ),
                    array(
                        "param_name" => "excerpt_count",
                        "type" => "textfield",
                        "heading" => __("Excerpt Count", "agile"),
                        "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Category Posts", "agile"),
                "base" => "category_posts",
                "icon" => "icon-category-posts",
                "class" => "category_posts_extended",
                "category" => __("Blog Posts", "agile"),
                "description" => __("Insert Posts for one or more Categories", "agile"),
                "params" => array(
                    array(
                        "param_name" => "category_slugs",
                        "type" => "exploded_textarea",
                        "admin_label" => true,
                        "heading" => __("Category Slugs", "agile"),
                        "description" => __("The list of posts category slugs. Divide slugs with linebreaks (Enter).", "agile")
                    ),
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Number of Posts", "agile"),
                        "description" => __("Number of posts to display", "agile")
                    ),
                    array(
                        "param_name" => "hide_thumbnail",
                        "type" => "dropdown",
                        "heading" => __("Hide Thumbnail", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Display thumbnail image or hide the same", "agile")
                    ),
                    array(
                        "param_name" => "show_meta",
                        "type" => "dropdown",
                        "heading" => __("Display Meta Information", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Display meta information like the author, date of publishing and number of comments", "agile")
                    ),
                    array(
                        "param_name" => "excerpt_count",
                        "type" => "textfield",
                        "heading" => __("Excerpt Count", "agile"),
                        "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Tag Posts", "agile"),
                "base" => "tag_posts",
                "icon" => "icon-tag-posts",
                "class" => "tag_posts_extended",
                "category" => __("Blog Posts", "agile"),
                "description" => __("Insert Posts of one or more Tags", "agile"),
                "params" => array(
                    array(
                        "param_name" => "tag_slugs",
                        "type" => "exploded_textarea",
                        "admin_label" => true,
                        "heading" => __("Tag Slugs", "agile"),
                        "description" => __("The list of posts tag slugs. Divide slugs with linebreaks (Enter).", "agile")
                    ),
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Number of Posts", "agile"),
                        "description" => __("Number of posts to display", "agile")
                    ),
                    array(
                        "param_name" => "hide_thumbnail",
                        "type" => "dropdown",
                        "heading" => __("Hide Thumbnail", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Display thumbnail image or hide the same", "agile")
                    ),
                    array(
                        "param_name" => "show_meta",
                        "type" => "dropdown",
                        "heading" => __("Display Meta Information", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Display meta information like the author, date of publishing and number of comments", "agile")
                    ),
                    array(
                        "param_name" => "excerpt_count",
                        "type" => "textfield",
                        "heading" => __("Excerpt Count", "agile"),
                        "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Show Custom Post Types", "agile"),
                "base" => "show_custom_post_types",
                "icon" => "icon-show-custom-post-types",
                "class" => "show_custom_post_types_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Custom Post Types", "agile"),
                "params" => array(
                    array(
                        "param_name" => "post_types",
                        "type" => "dropdown",
                        "admin_label" => true,
                        "heading" => __("Post Types", "agile"),
                        "value" => array(
                            __("Post", "agile") => "post",
                            __("Gallery", "agile") => "gallery_item",
                            __("Team", "agile") => "team"
                        ),
                        "description" => __("The post type whose posts need to be displayed.", "agile")
                    ),
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Number of Posts", "agile"),
                        "description" => __("Number of posts to display", "agile")
                    ),
                    array(
                        "param_name" => "hide_thumbnail",
                        "type" => "dropdown",
                        "heading" => __("Hide Thumbnail", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Display thumbnail image or hide the same", "agile")
                    ),
                    array(
                        "param_name" => "show_meta",
                        "type" => "dropdown",
                        "heading" => __("Display Meta Information", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Display meta information like the author, date of publishing and number of comments", "agile")
                    ),
                    array(
                        "param_name" => "excerpt_count",
                        "type" => "textfield",
                        "heading" => __("Excerpt Count", "agile"),
                        "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            $pricing_list = get_posts(array(
                'post_type' => 'pricing',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));

            $pricing_array = array();
            foreach ($pricing_list as $pricing_item) {
                $pricing_array[$pricing_item->post_title] = $pricing_item->ID;
            }

            vc_map(array(
                "name" => __("Pricing Plans", "agile"),
                "base" => "pricing_plans",
                "icon" => "icon-pricing-plans",
                "class" => "pricing_plans_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Pricing Plans", "agile"),
                "params" => array(
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "heading" => __("Number of Pricing Columns", "agile"),
                        "description" => __("The number of pricing columns to be displayed. By default displays all of the custom posts entered as pricing in the Pricing Plan tab of WordPress admin (optional).", "agile")
                    ),
                    array(
                        "param_name" => "pricing_ids",
                        "type" => "checkbox",
                        "heading" => __("Choose Pricing Posts", "agile"),
                        "value" => $pricing_array,
                        "description" => __("Choose the custom posts created in the Pricing tab of the WordPress Admin that you want displayed. Helps to filter the pricing plans for display (optional). ", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            $testimonials_list = get_posts(array(
                'post_type' => 'testimonials',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));

            $testimonials_array = array();
            foreach ($testimonials_list as $testimonial_item) {
                $testimonials_array[$testimonial_item->post_title] = $testimonial_item->ID;
            }

            vc_map(array(
                "name" => __("Testimonials Slider", "agile"),
                "base" => "testimonials_slider",
                "icon" => "icon-testimonials_slider",
                "class" => "testimonials_slider_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Testimonials Slider", "agile"),
                "params" => array(
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "heading" => __("Number of Testimonials", "agile"),
                        "description" => __("The number of testimonials to be displayed.", "agile")
                    ),
                    array(
                        "param_name" => "testimonial_ids",
                        "type" => "checkbox",
                        "heading" => __("Testimonials", "agile"),
                        "value" => $testimonials_array,
                        "description" => __("Choose the custom posts created in the Testimonials tab of the WordPress Admin that you want displayed. Helps to filter the testimonials for display (optional).", "agile")
                    ),
                    array(
                        "param_name" => "type",
                        "type" => "textfield",
                        "heading" => __("Type", "agile"),
                        "description" => __("Constructs and sets a unique CSS class for the slider. (optional).", "agile")
                    ),
                    array(
                        "param_name" => "slideshow_speed",
                        "type" => "textfield",
                        "value" => 5000,
                        "heading" => __("Slideshow Speed", "agile"),
                        "description" => __("Set the speed of the slideshow cycling, in milliseconds", "agile")
                    ),
                    array(
                        "param_name" => "animation_speed",
                        "type" => "textfield",
                        "value" => 600,
                        "heading" => __("Animation Speed", "agile"),
                        "description" => __("Set the speed of animations, in milliseconds.", "agile")
                    ),
                    array(
                        "param_name" => "animation",
                        "type" => "dropdown",
                        "heading" => __("Animation", "agile"),
                        "value" => array(
                            __("Slide", "agile") => "slide",
                            __("Fade", "agile") => "fade"
                        ),
                        "description" => __("Select your animation type, fade or slide.", "agile")
                    ),
                    array(
                        "param_name" => "pause_on_action",
                        "type" => "dropdown",
                        "heading" => __("Pause on Action", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Pause the slideshow when interacting with control elements, highly recommended.", "agile")
                    ),
                    array(
                        "param_name" => "pause_on_hover",
                        "type" => "dropdown",
                        "heading" => __("Pause on Hover", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering. ", "agile")
                    ),
                    array(
                        "param_name" => "direction_nav",
                        "type" => "dropdown",
                        "heading" => __("Direction Navigation", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Create navigation for previous/next navigation.", "agile")
                    ),
                    array(
                        "param_name" => "control_nav",
                        "type" => "dropdown",
                        "heading" => __("Control Navigation", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.", "agile")
                    ),
                    array(
                        "param_name" => "easing",
                        "type" => "textfield",
                        "heading" => __("Easing", "agile"),
                        "description" => __(" Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            vc_map(array(
                "name" => __("Testimonials Slider 2", "agile"),
                "base" => "testimonials_slider2",
                "icon" => "icon-testimonials_slider2",
                "class" => "testimonials_slider2_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Testimonials Slider 2", "agile"),
                "params" => array(
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "heading" => __("Number of Testimonials2", "agile"),
                        "description" => __("The number of testimonials to be displayed.", "agile")
                    ),
                    array(
                        "param_name" => "testimonial_ids",
                        "type" => "checkbox",
                        "heading" => __("Testimonials", "agile"),
                        "value" => $testimonials_array,
                        "description" => __("Choose the custom posts created in the Testimonials tab of the WordPress Admin that you want displayed. Helps to filter the testimonials for display (optional).", "agile")
                    ),
                    array(
                        "param_name" => "type",
                        "type" => "textfield",
                        "heading" => __("Type", "agile"),
                        "description" => __("Constructs and sets a unique CSS class for the slider. (optional).", "agile")
                    ),
                    array(
                        "param_name" => "slideshow_speed",
                        "type" => "textfield",
                        "value" => 5000,
                        "heading" => __("Slideshow Speed", "agile"),
                        "description" => __("Set the speed of the slideshow cycling, in milliseconds", "agile")
                    ),
                    array(
                        "param_name" => "animation_speed",
                        "type" => "textfield",
                        "value" => 600,
                        "heading" => __("Animation Speed", "agile"),
                        "description" => __("Set the speed of animations, in milliseconds.", "agile")
                    ),
                    array(
                        "param_name" => "animation",
                        "type" => "dropdown",
                        "heading" => __("Animation", "agile"),
                        "value" => array(
                            __("Slide", "agile") => "slide",
                            __("Fade", "agile") => "fade"
                        ),
                        "description" => __("Select your animation type, fade or slide.", "agile")
                    ),
                    array(
                        "param_name" => "pause_on_action",
                        "type" => "dropdown",
                        "heading" => __("Pause on Action", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Pause the slideshow when interacting with control elements, highly recommended.", "agile")
                    ),
                    array(
                        "param_name" => "pause_on_hover",
                        "type" => "dropdown",
                        "heading" => __("Pause on Hover", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering. ", "agile")
                    ),
                    array(
                        "param_name" => "direction_nav",
                        "type" => "dropdown",
                        "heading" => __("Direction Navigation", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Create navigation for previous/next navigation.", "agile")
                    ),
                    array(
                        "param_name" => "control_nav",
                        "type" => "dropdown",
                        "heading" => __("Control Navigation", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.", "agile")
                    ),
                    array(
                        "param_name" => "easing",
                        "type" => "textfield",
                        "heading" => __("Easing", "agile"),
                        "description" => __(" Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            $team_members = get_posts(array(
                'post_type' => 'team',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));

            $team_array = array();
            foreach ($team_members as $team_member) {
                $team_array[$team_member->post_title] = $team_member->ID;
            }

            vc_map(array(
                "name" => __("Team", "agile"),
                "base" => "team",
                "icon" => "icon-team",
                "class" => "team_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Team", "agile"),
                "params" => array(
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "heading" => __("Number of Team Members", "agile"),
                        "description" => __("The number of team members to be displayed. By default displays all of the custom posts entered as team member in the Team Profiles tab of the WordPress Admin (optional).", "agile")
                    ),
                    array(
                        "param_name" => "team_member_ids",
                        "type" => "checkbox",
                        "heading" => __("Team Members", "agile"),
                        "value" => $team_array,
                        "description" => __("Choose the custom posts created in the Team Profiles tab of the WordPress Admin that you want displayed. Helps to filter the team members for display (optional).", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));
            vc_map(array(
                "name" => __("Team Slider", "agile"),
                "base" => "team_slider",
                "icon" => "icon-team-slider",
                "class" => "team_slider_extended",
                "category" => __("Custom Posts", "agile"),
                "description" => __("Insert Team Slider", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "heading" => __("The id of the slider", "agile"),
                        "description" => __("The element id of the wrapper element for the slider. Useful if you need to have multiple team sliders in a single page (optional).", "agile")
                    ),
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "heading" => __("Number of Team Members", "agile"),
                        "description" => __("The number of team members to be displayed. By default displays all of the custom posts entered as team member in the Team Profiles tab of the WordPress Admin (optional).", "agile")
                    ),
                    array(
                        "param_name" => "team_member_ids",
                        "type" => "checkbox",
                        "heading" => __("Team Members", "agile"),
                        "value" => $team_array,
                        "description" => __("Choose the custom posts created in the Team Profiles tab of the WordPress Admin that you want displayed. Helps to filter the team members for display (optional).", "agile")
                    ),
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Responsive Slider", "agile"),
                "base" => "responsive_slider",
                "icon" => "icon-responsive-slider",
                "class" => "responsive_slider_extended",
                "category" => __("Sliders", "agile"),
                "description" => __("Insert Slider", "agile"),
                "params" => array(
                    array(
                        "param_name" => "type",
                        "type" => "textfield",
                        "heading" => __("Type", "agile"),
                        "description" => __("Constructs and sets a unique CSS class for the slider. (optional).", "agile")
                    ),
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Style", "agile"),
                        "description" => __("The inline CSS applied to the slider container DIV element.(optional)", "agile")
                    ),
                    array(
                        "param_name" => "slideshow_speed",
                        "type" => "textfield",
                        "value" => 5000,
                        "heading" => __("Slideshow Speed", "agile"),
                        "description" => __("Set the speed of the slideshow cycling, in milliseconds", "agile")
                    ),
                    array(
                        "param_name" => "animation_speed",
                        "type" => "textfield",
                        "value" => 600,
                        "heading" => __("Animation Speed", "agile"),
                        "description" => __("Set the speed of animations, in milliseconds.", "agile")
                    ),
                    array(
                        "param_name" => "animation",
                        "type" => "dropdown",
                        "heading" => __("Animation", "agile"),
                        "value" => array(
                            __("Fade", "agile") => "fade",
                            __("Slide", "agile") => "slide"
                        ),
                        "description" => __("Select your animation type, fade or slide.", "agile")
                    ),
                    array(
                        "param_name" => "pause_on_action",
                        "type" => "dropdown",
                        "heading" => __("Pause on Action", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Pause the slideshow when interacting with control elements, highly recommended.", "agile")
                    ),
                    array(
                        "param_name" => "pause_on_hover",
                        "type" => "dropdown",
                        "heading" => __("Pause on Hover", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering. ", "agile")
                    ),
                    array(
                        "param_name" => "direction_nav",
                        "type" => "dropdown",
                        "heading" => __("Direction Navigation", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __(" Create navigation for previous/next navigation.", "agile")
                    ),
                    array(
                        "param_name" => "control_nav",
                        "type" => "dropdown",
                        "heading" => __("Control Navigation", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.", "agile")
                    ),
                    array(
                        "param_name" => "easing",
                        "type" => "textfield",
                        "value" => "swing",
                        "heading" => __("Easing", "agile"),
                        "description" => __(" Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!", "agile")
                    ),
                    array(
                        "param_name" => "loop",
                        "type" => "dropdown",
                        "heading" => __("Loop", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Should the animation loop?", "agile")
                    ),
                    array(
                        "param_name" => "slideshow",
                        "type" => "dropdown",
                        "heading" => __("Slideshow", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Animate slider automatically without user intervention.", "agile")
                    ),
                    array(
                        "param_name" => "controls_container",
                        "type" => "textfield",
                        "heading" => __("Controls Container", "agile"),
                        "description" => __("Advanced Use only - Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be .flexslider-container. Property is ignored if given element is not found.", "agile")
                    ),
                    array(
                        "param_name" => "manual_controls",
                        "type" => "textfield",
                        "heading" => __("Manual Controls", "agile"),
                        "description" => __("Advanced Use only - Selector: Declare custom control navigation. Examples would be .flex-control-nav li or #tabs-nav li img, etc. The number of elements in your controlNav should match the number of slides/tabs.", "agile")
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "heading" => __("Slider Content", "agile"),
                        "description" => __("Add the list content that will act as slides for the slider.
                    <br>Use this shortcode to create a slider out of any HTML content. All it requires a UL element with children to show as seen below.<br>
&lt;ul&gt;<br>
	&lt;li&gt;Slide 1 content goes here.&lt;/li&gt;<br>
	&lt;li&gt;Slide 2 content goes here.&lt;/li&gt;<br>
	&lt;li&gt;Slide 3 content goes here.&lt;/li&gt;<br>
&lt;/ul&gt;", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            vc_map(array(
                "name" => __("Device Slider", "agile"),
                "base" => "device_slider",
                "icon" => "icon-device-slider",
                "class" => "device_slider_extended",
                "category" => __("Sliders", "agile"),
                "description" => __("Insert Slider Shortcode", "agile"),
                "params" => array(
                    array(
                        "param_name" => "device",
                        "type" => "dropdown",
                        "admin_label" => true,
                        "heading" => __("Select Slider Type", "agile"),
                        "value" => array(
                            __("iPhone", "agile") => "iphone",
                            __("iPhone 7 Black", "agile") => "iphone7black",
                            __("iPhone 7 Jet Black", "agile") => "iphone7jetblack",
                            __("iPhone 7 Silver", "agile") => "iphone7silver",
                            __("iPhone 7 Gold", "agile") => "iphone7gold",
                            __("iPhone 7 Rose Gold", "agile") => "iphone7rosegold",
                            __("Samsung Galaxy S7", "agile") => "galaxys7",
                            __("Nexus 6p", "agile") => "nexus6p",
                            __("Google Pixel Black", "agile") => "googlepixelblack",
                            __("Google Pixel Blue", "agile") => "googlepixelblue",
                            __("Google Pixel Silver", "agile") => "googlepixelsilver",
                            __("Samsung Galaxy S4", "agile") => "galaxys4",
                            __("HTC One", "agile") => "htcone",
                            __("iPad", "agile") => "ipad",
                            __("iMac", "agile") => "imac",
                            __("MacBook", "agile") => "macbook",
                            __("Browser", "agile") => "browser"
                        ),
                        "description" => __("The device type to decide on the type of slider desired.", "agile")
                    ),
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Style", "agile"),
                        "description" => __("The inline CSS applied to the slider container DIV element.", "agile")
                    ),
                    array(
                        "param_name" => "slideshow_speed",
                        "type" => "textfield",
                        "value" => 5000,
                        "heading" => __("Slideshow Speed", "agile"),
                        "description" => __("Set the speed of the slideshow cycling, in milliseconds", "agile")
                    ),
                    array(
                        "param_name" => "animation_speed",
                        "type" => "textfield",
                        "value" => 600,
                        "heading" => __("Animation Speed", "agile"),
                        "description" => __("Set the speed of animations, in milliseconds.", "agile")
                    ),
                    array(
                        "param_name" => "animation",
                        "type" => "dropdown",
                        "heading" => __("Animation", "agile"),
                        "value" => array(
                            __("slide", "agile") => "slide",
                            __("fade", "agile") => "fade"
                        ),
                        "description" => __("Select your animation type, 'fade' or 'slide'.", "agile")
                    ),
                    array(
                        "param_name" => "pause_on_action",
                        "type" => "dropdown",
                        "heading" => __("Pause On Action", "agile"),
                        "value" => array(
                            __("true", "agile") => "true",
                            __("false", "agile") => "false"
                        ),
                        "description" => __("Pause the slideshow when interacting with control elements, highly recommended.", "agile")
                    ),
                    array(
                        "param_name" => "pause_on_hover",
                        "type" => "dropdown",
                        "heading" => __("Pause On Hover", "agile"),
                        "value" => array(
                            __("true", "agile") => "true",
                            __("false", "agile") => "false"
                        ),
                        "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering. ", "agile")
                    ),
                    array(
                        "param_name" => "direction_nav",
                        "type" => "dropdown",
                        "heading" => __("Direction Navigation", "agile"),
                        "value" => array(
                            __("true", "agile") => "true",
                            __("false", "agile") => "false"
                        ),
                        "description" => __(" Create navigation for previous/next navigation?", "agile")
                    ),
                    array(
                        "param_name" => "control_nav",
                        "type" => "dropdown",
                        "heading" => __("Control Navigation", "agile"),
                        "value" => array(
                            __("false", "agile") => "false",
                            __("true", "agile") => "true"
                        ),
                        "description" => __("Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.", "agile")
                    ),
                    array(
                        "param_name" => "easing",
                        "type" => "textfield",
                        "heading" => __("Easing", "agile"),
                        "description" => __(" Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!", "agile")
                    ),
                    array(
                        "param_name" => "loop",
                        "type" => "dropdown",
                        "heading" => __("Loop", "agile"),
                        "value" => array(
                            __("true", "agile") => "true",
                            __("false", "agile") => "false"
                        ),
                        "description" => __("Should the animation loop?", "agile")
                    ),
                    array(
                        "param_name" => "image_urls",
                        "type" => "textfield",
                        "heading" => __("Image URLs", "agile"),
                        "description" => __("Comma separated list of URLs pointing to the images.", "agile")
                    ),
                    array(
                        "param_name" => "image_ids",
                        "type" => "attach_images",
                        "heading" => __("Device Images", "agile"),
                        "description" => __("Choose images for displaying in the device slider.", "agile")
                    ),
                    array(
                        "param_name" => "browser_url",
                        "type" => "textfield",
                        "heading" => __("Browser URL", "agile"),
                        "description" => __("If the device specified is browser or if [browser_slider], provide the URL to be displayed in the address bar of the browser.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            vc_map(array(
                "name" => __("Responsive Carousel", "agile"),
                "base" => "responsive_carousel",
                "icon" => "icon-responsive-carousel",
                "class" => "responsive_carousel_extended",
                "category" => __("Sliders", "agile"),
                "description" => __("Insert Carousel", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "heading" => __("Id", "agile"),
                        "description" => __("The element id to be set for the wrapper element created. (optional).", "agile")
                    ),
                    array(
                        "param_name" => "layout_class",
                        "type" => "textfield",
                        "heading" => __("Layout Class", "agile"),
                        "description" => __("The CSS class to be set for the wrapper div for the carousel. Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.", "agile")
                    ),
                    array(
                        "param_name" => "pagination_speed",
                        "type" => "textfield",
                        "value" => 800,
                        "heading" => __("Pagination Speed", "agile"),
                        "description" => __("Pagination speed in milliseconds. 800 is the default.", "agile")
                    ),
                    array(
                        "param_name" => "slide_speed",
                        "type" => "textfield",
                        "value" => 200,
                        "heading" => __("Slide Speed", "agile"),
                        "description" => __("Slide speed in milliseconds. 200 is the default.", "agile")
                    ),
                    array(
                        "param_name" => "rewind_speed",
                        "type" => "textfield",
                        "value" => 1000,
                        "heading" => __("Rewind Speed", "agile"),
                        "description" => __("Rewind speed in milliseconds. 1000 is the default.", "agile")
                    ),
                    array(
                        "param_name" => "stop_on_hover",
                        "type" => "dropdown",
                        "heading" => __("Stop on Hover", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Stop autoplay on mouse hover.", "agile")
                    ),
                    array(
                        "param_name" => "auto_play",
                        "type" => "dropdown",
                        "heading" => __("Auto Play", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Change to any integer for example autoPlay : 5000 to play every 5 seconds. If you set autoPlay: true default speed will be 5 seconds. ", "agile")
                    ),
                    array(
                        "param_name" => "scroll_per_page",
                        "type" => "dropdown",
                        "heading" => __("Scroll Per Page", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.", "agile")
                    ),
                    array(
                        "param_name" => "navigation",
                        "type" => "dropdown",
                        "heading" => __("Display Navigation", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Display 'next' and 'prev' buttons..", "agile")
                    ),
                    array(
                        "param_name" => "pagination",
                        "type" => "dropdown",
                        "heading" => __("Display Pagination", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Show pagination.", "agile")
                    ),
                    array(
                        "param_name" => "items",
                        "type" => "textfield",
                        "value" => 5,
                        "heading" => __("Number of Items to display", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the widest browser width. 5 is the default.", "agile")
                    ),
                    array(
                        "param_name" => "items_desktop",
                        "type" => "textfield",
                        "heading" => __("Items in Desktop", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the desktop browser width (<1200px).", "agile")
                    ),
                    array(
                        "param_name" => "items_desktop_small",
                        "type" => "textfield",
                        "heading" => __("Number of Items to display in Small Desktop", "agile"),
                        "description" => __(" This variable allows you to set the maximum amount of items displayed at a time with the smaller desktop browser width(<980px).", "agile")
                    ),
                    array(
                        "param_name" => "items_tablet",
                        "type" => "textfield",
                        "heading" => __("Number of Items to display in Tablet", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the tablet browser width(<769px).", "agile")
                    ),
                    array(
                        "param_name" => "items_tablet_small",
                        "type" => "textfield",
                        "heading" => __("Number of Items to display in Small Tablet", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the smaller tablet browser width.", "agile")
                    ),
                    array(
                        "param_name" => "items_mobile",
                        "type" => "textfield",
                        "heading" => __("Number of Items to display in Mobile", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the smartphone mobile browser width(<480px).", "agile")
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "heading" => __("Carousel Content", "agile"),
                        "description" => __("Add the content that will act as slides for the carousel.
                    <br>Use this shortcode to create a carousel out of any HTML content. All it requires a DIV ([wrap] shortcode) element with children to show as seen below.<br>
<br>[wrap]Slide 1 content goes here.[/wrap]<br>

[wrap]Slide 2 content goes here.[/wrap]<br>

[wrap]Slide 3 content goes here.[/wrap]", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Post Snippets Carousel", "agile"),
                "base" => "post_snippets_carousel",
                "icon" => "icon-post-snippets-carousel",
                "class" => "post_snippets_carousel_extended",
                "category" => __("Sliders", "agile"),
                "description" => __("Insert Post Snippets Carousel", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "heading" => __("Id", "agile"),
                        "description" => __("The element id to be set for the wrapper element created. (optional).", "agile")
                    ),
                    array(
                        "param_name" => "layout_class",
                        "type" => "textfield",
                        "heading" => __("Layout Class", "agile"),
                        "description" => __("The CSS class to be set for the wrapper div for the carousel. Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.", "agile")
                    ),
                    array(
                        "param_name" => "post_type",
                        "type" => "dropdown",
                        "heading" => __("Post Type", "agile"),
                        "admin_label" => true,
                        "value" => array(
                            __("Post", "agile") => "post",
                            __("Gallery", "agile") => "gallery_item",
                            __("Team", "agile") => "team"
                        ),
                        "description" => __("The custom post type whose posts need to be displayed. Examples include post, gallery, team etc.", "agile")
                    ),
                    array(
                        "param_name" => "post_count",
                        "type" => "textfield",
                        "value" => 6,
                        "heading" => __("Number of Posts", "agile"),
                        "description" => __("Number of posts to display", "agile")
                    ),
                    array(
                        "param_name" => "pagination_speed",
                        "type" => "textfield",
                        "value" => 800,
                        "heading" => __("Pagination Speed", "agile"),
                        "description" => __("Pagination speed in milliseconds. 800 is the default.", "agile")
                    ),
                    array(
                        "param_name" => "slide_speed",
                        "type" => "textfield",
                        "value" => 200,
                        "heading" => __("Slide Speed", "agile"),
                        "description" => __("Slide speed in milliseconds. 200 is the default.", "agile")
                    ),
                    array(
                        "param_name" => "rewind_speed",
                        "type" => "textfield",
                        "value" => 1000,
                        "heading" => __("Rewind Speed", "agile"),
                        "description" => __("Rewind speed in milliseconds. 1000 is the default.", "agile")
                    ),
                    array(
                        "param_name" => "stop_on_hover",
                        "type" => "dropdown",
                        "heading" => __("Stop on Hover", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Stop autoplay on mouse hover.", "agile")
                    ),
                    array(
                        "param_name" => "auto_play",
                        "type" => "dropdown",
                        "heading" => __("Auto Play", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Change to any integer for example autoPlay : 5000 to play every 5 seconds. If you set autoPlay: true default speed will be 5 seconds. ", "agile")
                    ),
                    array(
                        "param_name" => "scroll_per_page",
                        "type" => "dropdown",
                        "heading" => __("Scroll Per Page", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.", "agile")
                    ),
                    array(
                        "param_name" => "navigation",
                        "type" => "dropdown",
                        "heading" => __("Display Navigation", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Display 'next' and 'prev' buttons..", "agile")
                    ),
                    array(
                        "param_name" => "pagination",
                        "type" => "dropdown",
                        "heading" => __("Display Pagination", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __("Show pagination.", "agile")
                    ),
                    array(
                        "param_name" => "items",
                        "type" => "textfield",
                        "value" => 3,
                        "heading" => __("Number of Items to display", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the widest browser width. 5 is the default.", "agile")
                    ),
                    array(
                        "param_name" => "items_desktop",
                        "type" => "textfield",
                        "value" => 3,
                        "heading" => __("Items in Desktop", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the desktop browser width (<1200px).", "agile")
                    ),
                    array(
                        "param_name" => "items_desktop_small",
                        "type" => "textfield",
                        "value" => 2,
                        "heading" => __("Number of Items to display in Small Desktop", "agile"),
                        "description" => __(" This variable allows you to set the maximum amount of items displayed at a time with the smaller desktop browser width(<980px).", "agile")
                    ),
                    array(
                        "param_name" => "items_tablet",
                        "type" => "textfield",
                        "value" => 2,
                        "heading" => __("Number of Items to display in Tablet", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the tablet browser width(<769px).", "agile")
                    ),
                    array(
                        "param_name" => "items_tablet_small",
                        "type" => "textfield",
                        "value" => 1,
                        "heading" => __("Number of Items to display in Small Tablet", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the smaller tablet browser width.", "agile")
                    ),
                    array(
                        "param_name" => "items_mobile",
                        "type" => "textfield",
                        "value" => 1,
                        "heading" => __("Number of Items to display in Mobile", "agile"),
                        "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the smartphone mobile browser width(<480px).", "agile")
                    ),
                    array(
                        "param_name" => "image_size",
                        "type" => "dropdown",
                        "heading" => __("Image Size", "agile"),
                        "value" => array(
                            __("Thumbnail", "agile") => "thumbnail",
                            __("Medium Thumbnail", "agile") => "medium-thumb",
                            __("Square Thumbnail", "agile") => "square-thumb",
                            __("Medium", "agile") => "medium",
                            __("Large", "agile") => "large",
                            __("Full", "agile") => "full",
                        ),
                        "description" => __(" Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full", "agile")
                    ),
                    array(
                        "param_name" => "display_title",
                        "type" => "dropdown",
                        "heading" => __("Display Title", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Specify if the title of the post or custom post type needs to be displayed below the featured image", "agile")
                    ),
                    array(
                        "param_name" => "display_summary",
                        "type" => "dropdown",
                        "heading" => __("Display Summary", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.", "agile")
                    ),
                    array(
                        "param_name" => "show_excerpt",
                        "type" => "dropdown",
                        "heading" => __("Show Excerpt", "agile"),
                        "value" => array(
                            __("True", "agile") => "true",
                            __("False", "agile") => "false"
                        ),
                        "description" => __(" Display excerpt for the post/custom post type. Has no effect if Display Summary is set to false.", "agile")
                    ),
                    array(
                        "param_name" => "excerpt_count",
                        "type" => "textfield",
                        "value" => 100,
                        "heading" => __("Excerpt Count", "agile"),
                        "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "agile")
                    ),
                    array(
                        "param_name" => "hide_thumbnail",
                        "type" => "dropdown",
                        "heading" => __("Hide Thumbnail", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("Specify if the thumbnail needs to be hidden", "agile")
                    ),
                    array(
                        "param_name" => "show_meta",
                        "type" => "dropdown",
                        "heading" => __("Display Meta", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Display meta information like the author, date of publishing and number of comments", "agile")
                    ),
                    array(
                        "param_name" => "taxonomy",
                        "type" => "dropdown",
                        "heading" => __("Taxonomy", "agile"),
                        "value" => array(
                            __("None", "agile") => "",
                            __("Category", "agile") => "category",
                            __("Tag", "agile") => "post_tag",
                            __("Gallery Category", "agile") => "gallery_category",
                            __("Fitness Category", "agile") => "fitness_category",
                            __("Team Department", "agile") => "department"
                        ),
                        "description" => __("Custom taxonomy to be used for filtering the posts/custom post types displayed like category, department etc.", "agile")
                    ),
                    array(
                        "param_name" => "terms",
                        "type" => "exploded_textarea",
                        "heading" => __("Taxonomy Terms", "agile"),
                        "description" => __(" A list of terms of taxonomy specified for which the items needs to be displayed. Divide terms with linebreaks (Enter). <br>Helps filter the results by category/taxonomy, if the these terms are defined for the taxonomy chosen.", "agile")
                    ),
                    array(
                        "param_name" => "no_margin",
                        "type" => "dropdown",
                        "heading" => __("No Margin - Packed Layout", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Skills Bar", "agile"),
                "base" => "animating_skills_bar",
                "icon" => "icon-skills-bar",
                "class" => "skills_bar_extended",
                "category" => __("Stats", "agile"),
                "description" => __("Add Stats Bar", "agile"),
                "params" => array(
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Title", "agile"),
                        "description" => __("The title indicating the skills bar title", "agile")
                    ),
                    array(
                        "param_name" => "value",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Percentage Value", "agile"),
                        "description" => __("The percentage value for the percentage skills to be displayed", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            vc_map(array(
                "name" => __("Animate Number", "agile"),
                "base" => "animate_number",
                "icon" => "icon-animate-number",
                "class" => "animate_number_extended",
                "category" => __("Stats", "agile"),
                "description" => __("Add Animated Number", "agile"),
                "params" => array(
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Title", "agile"),
                        "description" => __("The title indicating the stats title.", "agile")
                    ),
                    array(
                        "param_name" => "start_value",
                        "type" => "textfield",
                        "heading" => __("Start Value", "agile"),
                        "description" => __("The starting value for the animation which displays a counter that animates to the end value specified here.", "agile")
                    ),
                    array(
                        "param_name" => "end_value",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Value", "agile"),
                        "description" => __("The ending value for the animation which displays a counter that animates from the start value above to the end value specified here.", "agile")
                    ),
                    array(
                        "param_name" => "icon",
                        "type" => "textfield",
                        "heading" => __("Icon", "agile"),
                        "description" => __("The font icon to be displayed for the statistic being displayed. The class names are listed at https://www.livemeshthemes.com/support/faqs/how-to-use-1500-icons-bundled-with-the-agile-theme/", "agile")
                    ),
                    array(
                        "param_name" => "icon_image_id",
                        "type" => "attach_image",
                        "heading" => __("Icon Image", "agile"),
                        "description" => __("Choose a custom icon image for the animating statistic.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            vc_map(array(
                "name" => __("Piechart", "agile"),
                "base" => "piechart",
                "icon" => "icon-piechart",
                "class" => "piechart_extended",
                "category" => __("Stats", "agile"),
                "description" => __("Insert Piechart", "agile"),
                "params" => array(
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Title", "agile"),
                        "description" => __("The title of the Piechart.", "agile")
                    ),
                    array(
                        "param_name" => "percent",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Percentage Value", "agile"),
                        "description" => __("The percentage value for the percentage stats.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Message", "agile"),
                "base" => "message",
                "icon" => "icon-message",
                "class" => "message_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Message", "agile"),
                "params" => array(
                    array(
                        "param_name" => "message_type",
                        "type" => "dropdown",
                        "heading" => __("Message Type", "agile"),
                        "value" => array(
                            __("Success", "agile") => "success",
                            __("Info", "agile") => "info",
                            __("Warning", "agile") => "warning",
                            __("Tip", "agile") => "tip",
                            __("Note", "agile") => "note",
                            __("Error", "agile") => "errors",
                            __("Attention", "agile") => "attention"
                        ),
                        "description" => __("Message Type", "agile")
                    ),
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "heading" => __("Title", "agile"),
                        "description" => __("Title displayed above the text in bold.", "agile")
                    ),
                    array(
                        "param_name" => "message_text",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Message Text", "agile"),
                        "description" => __("The message text to be displayed.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Divider", "agile"),
                "base" => "divider",
                "icon" => "icon-divider",
                "class" => "divider_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Divider", "agile"),
                "params" => array(
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Style", "agile"),
                        "description" => __("Inline CSS styling applied for the DIV element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "divider_type",
                        "type" => "dropdown",
                        "admin_label" => true,
                        "heading" => __("Divider Type", "agile"),
                        "value" => array(
                            __("Divider", "agile") => "divider",
                            __("Divider Line", "agile") => "divider_line",
                            __("Divider Space", "agile") => "divider_space",
                            __("Divider Fancy", "agile") => "divider_fancy",
                            __("Divider with Top Link", "agile") => "divider_top",
                            __("Clear", "agile") => "clear"
                        ),
                        "description" => __("Type of Divider", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Wrap", "agile"),
                "base" => "wrap",
                "icon" => "icon-wrap",
                "class" => "wrap_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Wrap Element", "agile"),
                "params" => array(
                    array(
                        "param_name" => "id",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Id", "agile"),
                        "description" => __("The element id to be set for the DIV element created (optional).", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Class", "agile"),
                        "description" => __(" Custom CSS class name to be set for the DIV element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Wrap Style", "agile"),
                        "description" => __("Inline CSS styling applied for the DIV element created (optional) ", "agile")
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "admin_label" => true,
                        "heading" => __("Content", "agile"),
                        "description" => __("Specify the content for the DIV element created.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));

            vc_map(array(
                "name" => __("Box Frame", "agile"),
                "base" => "box_frame",
                "icon" => "icon-box-frame",
                "class" => "box_frame_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Box Frame", "agile"),
                "params" => array(
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Style", "agile"),
                        "description" => __("Inline CSS styling applied for the div element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Class", "agile"),
                        "description" => __(" Custom CSS class name to be set for the div element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Title", "agile"),
                        "description" => __("Title for the box.", "agile")
                    ),
                    array(
                        "param_name" => "align",
                        "type" => "dropdown",
                        "heading" => __("Alignment", "agile"),
                        "value" => array(
                            __("None", "agile") => "none",
                            __("Left", "agile") => "left",
                            __("Center", "agile") => "center",
                            __("Right", "agile") => "right"
                        ),
                        "description" => __("Choose Alignment", "agile")
                    ),
                    array(
                        "param_name" => "width",
                        "type" => "textfield",
                        "heading" => __("Width", "agile"),
                        "description" => __("Custom width of the box. Do include px suffix or another appropriate suffix for width.", "agile")
                    ),
                    array(
                        "param_name" => "inner_style",
                        "type" => "textfield",
                        "heading" => __("Inner Style", "agile"),
                        "description" => __("Inline CSS styling for the inner box (optional)", "agile")
                    ),
                    array(
                        "param_name" => "content",
                        "type" => "textarea_html",
                        "heading" => __("Box Content", "agile"),
                        "description" => __("Specify the content for the Box Frame.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Clear", "agile"),
                "base" => "clear",
                "icon" => "icon-clear",
                "class" => "clear_extended",
                "category" => __("Elements", "agile"),
                "description" => __("Insert Clear", "agile"),
                "params" => array(),
                "show_settings_on_create" => false
            ));

            vc_map(array(
                "name" => __("Space", "agile"),
                "icon" => "icon-space",
                "base" => "clearing_space",
                "description" => "Add space between elements",
                "class" => "space_extended",
                "category" => __("Typography", "agile"),
                "params" => array(
                    array(
                        "param_name" => "height",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Height of the space(px)", "agile"),
                        "value" => 60,
                        "description" => __("Set height of the space. You can add white space between elements to separate them nicely.", "agile")
                    )
                )
            ));

            vc_map(array(
                "name" => __("Header Fancy", "agile"),
                "base" => "header_fancy",
                "icon" => "icon-header-fancy",
                "class" => "header_fancy_extended",
                "category" => __("Typography", "agile"),
                "description" => __("Insert Header Fancy", "agile"),
                "params" => array(
                    array(
                        "param_name" => "style",
                        "type" => "textfield",
                        "heading" => __("Style", "agile"),
                        "description" => __("Inline CSS styling applied for the DIV element created (optional);", "agile")
                    ),
                    array(
                        "param_name" => "class",
                        "type" => "textfield",
                        "heading" => __("Class", "agile"),
                        "description" => __(" Custom CSS class name to be set for the div element created (optional)", "agile")
                    ),
                    array(
                        "param_name" => "text",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Text", "agile"),
                        "description" => __("The text to be displayed in the center of the header.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Social List", "agile"),
                "base" => "social_list",
                "icon" => "icon-social-list",
                "class" => "social_list_extended",
                "category" => __("Social", "agile"),
                "description" => __("Insert Social List", "agile"),
                "params" => array(
                    array(
                        "param_name" => "email",
                        "type" => "textfield",
                        "heading" => __("Email", "agile"),
                        "description" => __("The email address to be used.", "agile")
                    ),
                    array(
                        "param_name" => "align",
                        "type" => "dropdown",
                        "heading" => __("Alignment", "agile"),
                        "value" => array(
                            __("None", "agile") => "none",
                            __("Left", "agile") => "left",
                            __("Center", "agile") => "center",
                            __("Right", "agile") => "right"
                        ),
                        "description" => __("Choose Alignment", "agile")
                    ),
                    array(
                        "param_name" => "facebook_url",
                        "type" => "textfield",
                        "heading" => __("Facebook URL", "agile"),
                        "description" => __("The URL of the Facebook page.", "agile")
                    ),
                    array(
                        "param_name" => "twitter_url",
                        "type" => "textfield",
                        "heading" => __("Twitter URL", "agile"),
                        "description" => __("The URL of the Twitter page.", "agile")
                    ),
                    array(
                        "param_name" => "flickr_url",
                        "type" => "textfield",
                        "heading" => __("Flickr URL", "agile"),
                        "description" => __("The URL of the Flickr page.", "agile")
                    ),
                    array(
                        "param_name" => "youtube_url",
                        "type" => "textfield",
                        "heading" => __("YouTube URL", "agile"),
                        "description" => __("The URL of the Youtube page.", "agile")
                    ),
                    array(
                        "param_name" => "linkedin_url",
                        "type" => "textfield",
                        "heading" => __("Linkedin URL", "agile"),
                        "description" => __("The URL of the Linkedin page.", "agile")
                    ),
                    array(
                        "param_name" => "googleplus_url",
                        "type" => "textfield",
                        "heading" => __("Googleplus URL", "agile"),
                        "description" => __("The URL of the Googleplus page.", "agile")
                    ),
                    array(
                        "param_name" => "vimeo_url",
                        "type" => "textfield",
                        "heading" => __("Vimeo URL", "agile"),
                        "description" => __("The URL of the Vimeo page.", "agile")
                    ),
                    array(
                        "param_name" => "instagram_url",
                        "type" => "textfield",
                        "heading" => __("Instagram URL", "agile"),
                        "description" => __("The URL of the Instagram page.", "agile")
                    ),
                    array(
                        "param_name" => "behance_url",
                        "type" => "textfield",
                        "heading" => __("Behance URL", "agile"),
                        "description" => __("The URL of the Behance page.", "agile")
                    ),
                    array(
                        "param_name" => "pinterest_url",
                        "type" => "textfield",
                        "heading" => __("Pinterest URL", "agile"),
                        "description" => __("The URL of the Pinterest page.", "agile")
                    ),
                    array(
                        "param_name" => "skype_url",
                        "type" => "textfield",
                        "heading" => __("Skype URL", "agile"),
                        "description" => __("The URL of the Skype page.", "agile")
                    ),
                    array(
                        "param_name" => "dribbble_url",
                        "type" => "textfield",
                        "heading" => __("Dribbble URL", "agile"),
                        "description" => __("The URL of the Dribbble page.", "agile")
                    ),
                    array(
                        "param_name" => "include_rss",
                        "type" => "dropdown",
                        "heading" => __("Include RSS", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __("A boolean value(true/false string) indicating that the link to the RSS feed be included. Default is false.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Donate", "agile"),
                "base" => "donate",
                "icon" => "icon-donate",
                "class" => "donate_extended",
                "category" => __("Social", "agile"),
                "description" => __("Insert Donate Button", "agile"),
                "params" => array(
                    array(
                        "param_name" => "title",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Title", "agile"),
                        "description" => __("The title of the link that displays the Paypal donate button.", "agile")
                    ),
                    array(
                        "param_name" => "account",
                        "type" => "textfield",
                        "heading" => __("Account", "agile"),
                        "description" => __("The Paypal account for which the donate button is being created.", "agile")
                    ),
                    array(
                        "param_name" => "display_card_logos",
                        "type" => "dropdown",
                        "heading" => __("Display Card Logos", "agile"),
                        "value" => array(
                            __("False", "agile") => "false",
                            __("True", "agile") => "true"
                        ),
                        "description" => __(" Specify if you need to display the logo images of the credit cards accepted for Paypal donations", "agile")
                    ),
                    array(
                        "param_name" => "cause",
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => __("Cause", "agile"),
                        "description" => __("The text indicating the purpose for which the donation is being collected.", "agile")
                    )
                ),
                "show_settings_on_create" => true
            ));


            vc_map(array(
                "name" => __("Subscribe Rss", "agile"),
                "base" => "subscribe_rss",
                "icon" => "icon-subscribe-rss",
                "class" => "subscribe_rss_extended",
                "category" => __("Social", "agile"),
                "description" => __("Insert Subscribe RSS Link", "agile"),
                "params" => array(),
                "show_settings_on_create" => true
            ));


        }
    }

}

?>