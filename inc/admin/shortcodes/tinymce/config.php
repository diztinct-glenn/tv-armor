<?php


$livemesh_shortcodes['columns'] = array(
    'params' => array(),
    'shortcode' => '{{child_shortcode}}',
    // as there is no wrapper shortcode
    'popup_title' => __('Insert Columns Shortcode', 'agile'),
    'no_preview' => true,

    // child shortcode is clonable & sortable
    'child_shortcode' => array(
        'params' => array(
            'column' => array(
                'type' => 'select',
                'label' => __('Column Type', 'agile'),
                'desc' => __('Select the type, i.e., width of the column.', 'agile'),
                'options' => array(
                    'one_third' => __('One Third', 'agile'),
                    'one_third_last' => __('One Third Last', 'agile'),
                    'two_third' => __('Two Thirds', 'agile'),
                    'two_third_last' => __('Two Thirds Last', 'agile'),
                    'one_half' => __('One Half', 'agile'),
                    'one_half_last' => __('One Half Last', 'agile'),
                    'one_fourth' => __('One Fourth', 'agile'),
                    'one_fourth_last' => __('One Fourth Last', 'agile'),
                    'three_fourth' => __('Three Fourth', 'agile'),
                    'three_fourth_last' => __('Three Fourth Last', 'agile'),
                    'one_sixth' => __('One Sixth', 'agile'),
                    'one_sixth_last' => __('One Sixth Last', 'agile'),
                    'one_col' => __('One Column', 'agile'),
                    'one_col_last' => __('One Column Last', 'agile'),
                    'two_col' => __('Two Columns', 'agile'),
                    'two_col_last' => __('Two Columns Last', 'agile'),
                    'three_col' => __('Three Columns', 'agile'),
                    'three_col_last' => __('Three Columns Last', 'agile'),
                    'four_col' => __('Four Columns', 'agile'),
                    'four_col_last' => __('Four Columns Last', 'agile'),
                    'five_col' => __('Five Columns', 'agile'),
                    'five_col_last' => __('five Columns Last', 'agile'),
                    'six_col' => __('Six Columns', 'agile'),
                    'six_col_last' => __('Six Columns Last', 'agile'),
                    'seven_col' => __('Seven Columns', 'agile'),
                    'seven_col_last' => __('Seven Columns Last', 'agile'),
                    'eight_col' => __('Eight Columns', 'agile'),
                    'eight_col_last' => __('Eight Columns Last', 'agile'),
                    'nine_col' => __('Nine Columns', 'agile'),
                    'nine_col_last' => __('Nine Columns Last', 'agile'),
                    'ten_col' => __('Ten Columns', 'agile'),
                    'ten_col_last' => __('Ten Columns Last', 'agile'),
                    'eleven_col' => __('Eleven Columns', 'agile'),
                    'eleven_col_last' => __('Eleven Columns Last', 'agile')
                )
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('Column Content', 'agile'),
                'desc' => __('Add the column content.', 'agile'),
            )
        ),
        'shortcode' => '[{{column}}]{{content}}[/{{column}}] ',
        'clone_button' => __('Add Column', 'agile')
    )
);


/*veena edited*/


$livemesh_shortcodes['contact_form'] = array(
    'no_preview' => true,
    'params' => array(
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'agile'),
            'desc' => __('Custom CSS class name to be set for the DIV element created (optional)', 'agile')
        ),
        'mail_to' => array(
            'std' => 'recipient@mydomain.com',
            'type' => 'text',
            'label' => __('Recipient Email', 'agile'),
            'desc' => __(' A string field specifying the recipient email where all form submissions will be received.', 'agile')
        ),
        'web_url' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Web URL', 'agile'),
            'desc' => __('Specify if the user should be requested for Web URL via an input field.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
        'phone' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Phone Field', 'agile'),
            'desc' => __('Specify if the users should be requested for their phone number. A phone field is displayed if the value is set to true.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
        'subject' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Subject Field', 'agile'),
            'desc' => __('A form subject field is displayed if the value is set to true.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
        'button_color' => array(
            'std' => 'default',
            'type' => 'select',
            'label' => __('Button Color', 'agile'),
            'desc' => __('Color of the submit button.', 'agile'),
            'options' => array(
                'black' => __('Black', 'agile'),
                'blue' => __('Blue', 'agile'),
                'cyan' => __('Cyan', 'agile'),
                'green' => __('Green', 'agile'),
                'orange' => __('Orange', 'agile'),
                'pink' => __('Pink', 'agile'),
                'red' => __('Red', 'agile'),
                'teal' => __('Teal', 'agile'),
                'theme' => __('Theme', 'agile'),
                'trans' => __('Trans', 'agile')
            )
        ),
    ),

    'shortcode' => '[contact_form mail_to="{{mail_to}}" phone="{{phone}}" web_url="{{web_url}}" subject="{{subject}}" button_color="{{button_color}}"]',
    'popup_title' => __('Insert contact_form  Shortcode', 'agile')
);

$livemesh_shortcodes['pullquote'] = array(
    'no_preview' => true,
    'params' => array(
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'agile'),
            'desc' => __('Choose Pullquote Alignment (optional)', 'agile'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'agile'),
                'left' => __('Left', 'agile'),
                'center' => __('Center', 'agile'),
                'right' => __('Right', 'agile')
            )
        ),
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Pullquote Content', 'agile'),
            'desc' => __('The actual quotation text for the pullquote element.', 'agile'),

        )

    ),
    'shortcode' => '[pullquote align="{{align}}"]{{content}}[/pullquote]',
    'popup_title' => __('Insert Pullquote Shortcode', 'agile')
);


$livemesh_shortcodes['blockquote'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'agile'),
            'desc' => __('The element id to be set for the blockquote element created', 'agile')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Blockquote Class', 'agile'),
            'desc' => __('Custom CSS class name to be set for the blockquote element created ', 'agile')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Blockquote Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the blockquote element created ', 'agile')
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'agile'),
            'desc' => __('Choose blockquote Alignment', 'agile'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'agile'),
                'left' => __('Left', 'agile'),
                'center' => __('Center', 'agile'),
                'right' => __('Right', 'agile')
            )
        ),
        'author' => array(
            'type' => 'text',
            'label' => __('Author', 'agile'),
            'desc' => __('Author Information.', 'agile'),
            'std' => ''
        ),
        'affiliation' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Affiliation', 'agile'),
            'desc' => __('The entity/organization to which the author of the quote belongs to.', 'agile'),

        ),
        'affiliation_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Affiliation URL', 'agile'),
            'desc' => __('The URL of the entity/organization to which this quote is attributed to', 'agile'),

        ),
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Blockquote Content', 'agile'),
            'desc' => __('The actual quotation text for the blockquote element.', 'agile'),

        )
    ),
    'shortcode' => '[blockquote id="{{id}}" class="{{class}}" style="{{style}}" align="{{align}}" author="{{author}}" affiliation="{{affiliation}}" affiliation_url="{{affiliation_url}}"]{{content}}[/blockquote]',
    'popup_title' => __('Insert Blockquote Shortcode', 'agile')
);


$livemesh_shortcodes['segment'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Segment Id', 'agile'),
            'desc' => __('The id of the wrapper HTML element created by the segment shortcode (optional).', 'agile')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Segment Class', 'agile'),
            'desc' => __('The CSS class of the HTML element wrapping the content(optional).', 'agile')
        ),

        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Segment Style', 'agile'),
            'desc' => __('Any optional inline styling you would like to apply to the segment.eg.padding:50px 0; ', 'agile')
        ),
        'background_image' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('URL', 'agile'),
            'desc' => __('Provide the URL of the background image.eg.http://example.com/background3.jpg (optional)', 'agile')
        ),
        'parallax_background' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Parallax Background ', 'agile'),
            'desc' => __('Specify if this needs to be a parallax background image.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
        'background_speed' => array(
            'type' => 'text',
            'label' => __('Background Speed', 'agile'),
            'desc' => __('Speed of parallax animation - the speed at which the parallax background moves with user scrolling the page. Specify a value between 0 and 1. ', 'agile'),
            'std' => '0.6'
        ),
        'background_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Background Pattern', 'agile'),
            'desc' => __('As an alternative to Background Image option above, you can provide the URL of the background image which acts like a pattern background.', 'agile')

        ),
        'background_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Background Color', 'agile'),
            'desc' => __('The background color to be applied to the segment that spans the entire browser width.', 'agile')
        )
    ),
    'shortcode' => '[segment id="{{id}}" class="{{class}}" background_color="{{background_color}}" style="{{style}}" background_image="{{background_image}}" parallax_background="{{parallax_background}}" background_speed="{{background_speed}}" background_pattern="{{background_pattern}}"]REPLACE ME[/segment]',
    'popup_title' => __('Insert Segment Shortcode', 'agile')
);


$livemesh_shortcodes['code'] = array(
    'no_preview' => true,
    'params' => array(
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Code Content', 'agile'),
            'desc' => __('Add the code content.', 'agile'),
        )
    ),
    'shortcode' => '[code]{{content}}[/code]',
    'popup_title' => __('Insert Code Shortcode', 'agile')
);


$livemesh_shortcodes['wrap'] = array(
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Parent Wrap Id', 'agile'),
            'desc' => __('The element id to be set for the parent DIV element created (optional).', 'agile')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Parent Wrap Class', 'agile'),
            'desc' => __(' Custom CSS class name to be set for the parent DIV element created (optional)', 'agile')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Parent Wrap Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the parent DIV element created (optional) ', 'agile')
        ),
    ),
    'shortcode' => '[parent_wrap id="{{id}}" class="{{class}}" style="{{style}}"]{{child_shortcode}}[/parent_wrap]',
    'popup_title' => __('Insert wrap Shortcode', 'agile'),
    'no_preview' => true,

    // child shortcode is clonable & sortable
    'child_shortcode' => array(
        'params' => array(
            'id' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Wrap Id', 'agile'),
                'desc' => __('The element id to be set for the child DIV element created (optional).', 'agile')
            ),
            'class' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Wrap Class', 'agile'),
                'desc' => __(' Custom CSS class name to be set for the child DIV element created (optional)', 'agile')
            ),
            'style' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Wrap Style', 'agile'),
                'desc' => __('Inline CSS styling applied for the child DIV element created (optional) ', 'agile')
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('Wrap Content', 'agile'),
                'desc' => __('Add the code content for the child DIV element.', 'agile'),
            )
        ),
        'shortcode' => '[wrap id="{{id}}" class="{{class}}" style="{{style}}"]{{content}}[/wrap] ',
        'clone_button' => __('Add new Wrap', 'agile')
    )
);

$livemesh_shortcodes['highlight1'] = array(
    'no_preview' => true,
    'params' => array(
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Highlighted Content', 'agile'),
            'desc' => __('Specify the content to be highlighted', 'agile'),
        )
    ),
    'shortcode' => '[highlight1]{{content}}[/highlight1]',
    'popup_title' => __('Insert Highlight1 Shortcode', 'agile')
);

$livemesh_shortcodes['highlight2'] = array(
    'no_preview' => true,
    'params' => array(
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Highlighted Content', 'agile'),
            'desc' => __('Specify the content to be highlighted.', 'agile'),
        )
    ),
    'shortcode' => '[highlight2]{{content}}[/highlight2]',
    'popup_title' => __('Insert Highlight2 Shortcode', 'agile')
);

$livemesh_shortcodes['list'] = array(
    'no_preview' => true,
    'params' => array(
        'style' => array(
            'type' => 'text',
            'label' => __('List Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the UL element created (optional).', 'agile'),
            'std' => ''
        ),
        'type' => array(
            'type' => 'select',
            'label' => __('Type', 'agile'),
            'desc' => __('Custom CSS class name to be set for the UL element created (optional).', 'agile'),
            'std' => 'list1',
            'options' => array(
                'list1' => __('list1', 'agile'),
                'list2' => __('list2', 'agile'),
                'list3' => __('list3', 'agile'),
                'list4' => __('list4', 'agile'),
                'list5' => __('list5', 'agile'),
                'list6' => __('list6', 'agile'),
                'list7' => __('list7', 'agile'),
                'list8' => __('list8', 'agile'),
                'list9' => __('list9', 'agile'),
                'list10' => __('list10', 'agile')
            )
        )

    ),
    'shortcode' => '[list type="{{type}}" style="{{style}}"]REPLACE ME WITH A LIST[/list]',
    'popup_title' => __('Insert List Shortcode', 'agile')
);

$livemesh_shortcodes['heading'] = array(
    'no_preview' => true,
    'params' => array(
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Heading Class', 'agile'),
            'desc' => __(' Custom CSS class name to be set for the heading div element created (optional)', 'agile')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Heading Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the div element created (optional)', 'agile')
        ),
        'title' => array(
            'type' => 'text',
            'label' => __('Title', 'agile'),
            'desc' => __('A string value indicating the title of the heading.', 'agile'),
            'std' => ''
        ),
        'pitch_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Pitch Text', 'agile'),
            'desc' => __('The text displayed below the heading title.', 'agile'),
        )
    ),
    'shortcode' => '[heading2 class="{{class}}" style="{{style}}" title="{{title}}" pitch_text="{{pitch_text}}"]',
    'popup_title' => __('Insert Heading Shortcode', 'agile')
);


$livemesh_shortcodes['icon'] = array(
    'no_preview' => true,
    'params' => array(

        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Icon Class', 'agile'),
            'desc' => __('Custom CSS class name to be set for the icon element created. The class names are listed at https://www.livemeshthemes.com/support/faqs/how-to-use-1500-icons-bundled-with-the-agile-theme/', 'agile')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Icon Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the icon element created (optional). Useful if you want to specify font-size, color etc. for the icon inline.', 'agile')
        )
    ),
    'shortcode' => '[icon class="{{class}}" style="{{style}}"]',
    'popup_title' => __('Insert Icon Shortcode', 'agile')
);


$livemesh_shortcodes['action_call'] = array(
    'no_preview' => true,
    'params' => array(
        'text' => array(
            'std' => 'Call us now for a project quote.',
            'type' => 'text',
            'label' => __('Text', 'agile'),
            'desc' => __('Text to be displayed urging for an action call.', 'agile')
        ),
        'button_text' => array(
            'std' => 'Contact Us',
            'type' => 'text',
            'label' => __('Button Text', 'agile'),
            'desc' => __('The title to be displayed for the button.', 'agile')
        ),
        'button_color' => array(
            'std' => 'theme',
            'type' => 'select',
            'label' => __('Button Color Options', 'agile'),
            'desc' => __('The color of the button.', 'agile'),
            'options' => array(
                'black' => __('Black', 'agile'),
                'blue' => __('Blue', 'agile'),
                'cyan' => __('Cyan', 'agile'),
                'green' => __('Green', 'agile'),
                'orange' => __('Orange', 'agile'),
                'pink' => __('Pink', 'agile'),
                'red' => __('Red', 'agile'),
                'teal' => __('Teal', 'agile'),
                'theme' => __('Theme', 'agile'),
                'trans' => __('Trans', 'agile')
            )
        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'agile'),
            'desc' => __('The URL to which the button links to.', 'agile'),
        )
    ),
    'shortcode' => '[action_call text="{{text}}" button_url="{{button_url}}" button_text="{{button_text}}" button_color="{{button_color}}"]',
    'popup_title' => __('Insert Action Call Shortcode', 'agile')
);


$livemesh_shortcodes['button'] = array(
    'no_preview' => true,
    'params' => array(

        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'agile'),
            'desc' => __('The element id to be set for the button element created (optional)', 'agile')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the button element created eg.padding: 10px 20px; (optional)', 'agile')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Class', 'agile'),
            'desc' => __('Custom CSS class name to be set for the button element created (optional)', 'agile')
        ),
        'color' => array(
            'std' => 'theme',
            'type' => 'select',
            'label' => __('Color', 'agile'),
            'desc' => __('The color of the button.', 'agile'),
            'options' => array(
                'theme' => __('Theme', 'agile'),
                'black' => __('Black', 'agile'),
                'blue' => __('Blue', 'agile'),
                'cyan' => __('Cyan', 'agile'),
                'green' => __('Green', 'agile'),
                'orange' => __('Orange', 'agile'),
                'pink' => __('Pink', 'agile'),
                'red' => __('Red', 'agile'),
                'teal' => __('Teal', 'agile'),
                'trans' => __('Trans', 'agile')
            )

        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'agile'),
            'desc' => __(' Alignment of the button and text alignment of the button title displayed.', 'agile'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'agile'),
                'left' => __('Left', 'agile'),
                'center' => __('Center', 'agile'),
                'right' => __('Right', 'agile')
            )
        ),
        'type' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Type', 'agile'),
            'desc' => __('Can be large, small or rounded.', 'agile'),
            'options' => array(
                'large' => __('Large', 'agile'),
                'small' => __('Small', 'agile'),
                'rounded' => __('Rounded', 'agile'),
            )

        ),
        'href' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('URL', 'agile'),
            'desc' => __('The URL to which button should point to. The user is taken to this destination when the button is clicked.eg.http://targeturl.com', 'agile'),

        ),
        'target' => array(
            'type' => 'select',
            'label' => __('Button Target', 'agile'),
            'desc' => __('_self = open in same window. _blank = open in new window', 'agile'),
            'std' => '_self',
            'options' => array(
                '_self' => __('_self', 'agile'),
                '_blank' => __('_blank', 'agile')
            )
        ),
        'content' => array(
            'std' => 'Contact Us',
            'type' => 'text',
            'label' => __('Button Title', 'agile'),
            'desc' => __('Specify the title of the button.', 'agile'),
        )

    ),
    'shortcode' => '[button id="{{id}}" style="{{style}}" color="{{color}}" type="{{type}}" size="large" href="http://targeturl.com" align="{{align}}" target="{{target}}"]{{content}}[/button]',
    'popup_title' => __('Insert Button Shortcode', 'agile')
);


$livemesh_shortcodes['image'] = array(
    'no_preview' => true,
    'params' => array(
        'link' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Link URL', 'agile'),
            'desc' => __('Specify a URL to which the link should point to if image should be a link (optional).', 'agile'),
        ),
        'title' => array(
            'type' => 'text',
            'label' => __('Image Title', 'agile'),
            'desc' => __('The title of the link to which image points to.', 'agile'),
            'std' => ''
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Image Class', 'agile'),
            'desc' => __('Custom CSS class name to be set for the IMG element created (optional).', 'agile')
        ),
        'src' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Image URL', 'agile'),
            'desc' => __('Choose your image. An IMG element will be created for this image and the image will be cropped and styled as per the parameters provided', 'agile')
        ),
        'alt' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Alt Text', 'agile'),
            'desc' => __('The alt attribute value for the IMG element.', 'agile')
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'agile'),
            'desc' => __('Choose Image Alignment', 'agile'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'agile'),
                'left' => __('Left', 'agile'),
                'center' => __('Center', 'agile'),
                'right' => __('Right', 'agile')
            )
        ),
        'image_frame' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Image Frame', 'agile'),
            'desc' => __('A boolean value specifying if the image should be wrapped in a border frame and another type of frame as styled by the theme', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'wrapper' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Wrapper', 'agile'),
            'desc' => __('A boolean value indicating if the a wrapper DIV element needs to be created for the image.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'wrapper_class' => array(
            'type' => 'text',
            'label' => __('Wrapper Class', 'agile'),
            'desc' => __('The CSS class for any wrapper DIV element created for the image. (optional)', 'agile'),
            'std' => ''
        ),
        'wrapper_style' => array(
            'type' => 'text',
            'label' => __('Wrapper Style', 'agile'),
            'desc' => __('The inline CSS styling for any wrapper DIV element created for the image. (optional)', 'agile'),
            'std' => ''
        ),
        'width' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Width', 'agile'),
            'desc' => __('Any custom width (in pixel units) specified for the element (optional). The original image (pointed to by the src parameter) will be cropped to this width.', 'agile')
        ),
        'height' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Height', 'agile'),
            'desc' => __('Any custom height (in pixel units) specified for the element (optional). The original image (pointed to by the Image URL parameter) will be cropped to this height.', 'agile')
        ),
        'size' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Size', 'agile'),
            'desc' => __('Takes effect if no custom width or height is specified. The original image (pointed to by the Image URL parameter) is cropped to the size specified.', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        ),

    ),
    'shortcode' => '[image link="{{link}}" class="{{class}}" title="{{title}}" src="{{src}}" alt="{{alt}}" align="{{align}}" image_frame="{{image_frame}}" wrapper="{{wrapper}}" wrapper_class="{{wrapper_class}}" wrapper_style="{{wrapper_style}}" width="{{width}}" height="{{height}}" size="{{size}}"]',
    'popup_title' => __('Insert Image Shortcode', 'agile')
);

$livemesh_shortcodes['ytp_video_showcase'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'agile'),
            'desc' => __('The id of the DIV element created to wrap the YouTube video (optional). Default is video-intro.', 'agile')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Class', 'agile'),
            'desc' => __('The CSS class of the DIV element created to wrap the YouTube video (optional).', 'agile')
        ),
        'video_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video URL', 'agile'),
            'desc' => __('Enter the YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).', 'agile'),
        ),
        'mute' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Mute', 'agile'),
            'desc' => __('Indicate if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'show_controls' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Show Controls', 'agile'),
            'desc' => __('Show or hide the controls bar at the bottom of the page.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'containment' => array(
            'std' => 'self',
            'type' => 'text',
            'label' => __('Containment', 'agile'),
            'desc' => __('The CSS selector of the DOM element where you want the video background; if not specified it takes the “body”; if set to “self” the player will be instanced on that element.', 'agile'),
        ),
        'quality' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Quality', 'agile'),
            'desc' => __('Quality of video', 'agile'),
            'options' => array(
                'small' => __('Mini', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'hd720' => __('hd720', 'agile'),
                'hd1080' => __('hd1080', 'agile'),
                'highres' => __('highres', 'agile'),
            )
        ),
        'optimize_display' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Optimize Display', 'agile'),
            'desc' => __('Will fit the video size into the window size optimizing the view.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'agile'),
            'desc' => __('Whether to loop the movie once ended.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'startAt' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video Starts At', 'agile'),
            'desc' => __('Specify a number which sets the seconds the video should start at(optional). Starts at 0 by default.', 'agile'),
        ),
        'opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Opacity', 'agile'),
            'desc' => __('Define the opacity of the video. Specify a decimal value between 0 and 1.', 'agile'),
        ),
        'vol' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Volume', 'agile'),
            'desc' => __('A numerical value between 1 to 100 - set the volume level of the video.', 'agile'),
        ),
        'ratio' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Aspect Ratio', 'agile'),
            'desc' => __('Set the aspect ratio of the movie', 'agile'),
            'options' => array(
                '4/3' => __('4/3', 'agile'),
                '16/9' => __('16/9', 'agile'),
            )
        ),
        'autoplay' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Autoplay', 'agile'),
            'desc' => __('Specify whether to automatically play the video once ready.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'placeholder_url' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Placeholder URL', 'agile'),
            'desc' => __('URL of the placeholder image to be displayed instead of YouTube video in mobile devices.', 'agile'),
        ),
        'overlay_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Color', 'agile'),
            'desc' => __('The color of the overlay to be applied on the video.', 'agile'),
        ),
        'overlay_opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Opacity', 'agile'),
            'desc' => __('The opacity of the overlay color. Specify a value between 0 and 1.', 'agile'),
        ),
        'overlay_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Overlay Pattern', 'agile'),
            'desc' => __('The URL of the image which can act as a pattern displayed on top of the video.', 'agile'),
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'agile'),
            'desc' => __('The title text displayed on top of the video.', 'agile'),
        ),
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'agile'),
            'desc' => __('The text displayed on top of the video; below the title.', 'agile'),
        ),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'agile'),
            'desc' => __(' The title for the button displayed on top of the video. (optional)', 'agile'),

        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'agile'),
            'desc' => __('The URL pointed to by the button displayed on top of the video. (optional)', 'agile'),

        ),
    ),

    'shortcode' => '[ytp_video_showcase id="{{id}}" class="{{class}}" video_url="{{video_url}}" containment="{{containment}}" placeholder_url="{{placeholder_url}}" title="{{title}}" text="{{text}}" button_text="{{button_text}}" button_url="{{button_url}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}" mute="{{mute}}" show_controls="{{show_controls}}" quality="{{quality}}" optimize_display="{{optimize_display}}" loop="{{loop}}" opacity="{{opacity}}" vol="{{vol}}" ratio="{{ratio}}" autoplay="{{autoplay}}"]',
    'popup_title' => __('Insert YouTube Video Showcase Shortcode', 'agile')
);

$livemesh_shortcodes['ytp_video_section'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'agile'),
            'desc' => __('The id of the DIV element created to wrap the YouTube video (optional). ', 'agile')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Class', 'agile'),
            'desc' => __('The CSS class of the DIV element created to wrap the YouTube video (optional).', 'agile')
        ),
        'video_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video URL', 'agile'),
            'desc' => __('Enter the YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).', 'agile'),
        ),
        'mute' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Mute', 'agile'),
            'desc' => __('Indicate if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'show_controls' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Show Controls', 'agile'),
            'desc' => __('Show or hide the controls bar at the bottom of the page.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'containment' => array(
            'std' => 'self',
            'type' => 'text',
            'label' => __('Containment', 'agile'),
            'desc' => __('The CSS selector of the DOM element where you want the video background; if not specified it takes the “body”; if set to “self” the player will be instanced on that element.', 'agile'),
        ),
        'quality' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Quality', 'agile'),
            'desc' => __('Quality of video (optional)', 'agile'),
            'options' => array(
                'small' => __('Mini', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'hd720' => __('hd720', 'agile'),
                'hd1080' => __('hd1080', 'agile'),
                'highres' => __('highres', 'agile'),
            )
        ),
        'optimize_display' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Optimize Display', 'agile'),
            'desc' => __('Will fit the video size into the window size optimizing the view.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'agile'),
            'desc' => __('Whether to loop the movie once ended.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'startAt' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video Starts At', 'agile'),
            'desc' => __('Set the seconds the video should start at (optional). Starts at 0 by default.', 'agile'),
        ),
        'opacity' => array(
            'std' => '1',
            'type' => 'text',
            'label' => __('Opacity', 'agile'),
            'desc' => __('Define the opacity of the video. Specify a decimal value between 0 and 1.', 'agile'),
        ),
        'vol' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Volume', 'agile'),
            'desc' => __('A value between 1 to 100 - set the volume level of the video.', 'agile'),
        ),
        'ratio' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Aspect Ratio', 'agile'),
            'desc' => __('Set the aspect ratio of the movie', 'agile'),
            'options' => array(
                '4/3' => __('4/3', 'agile'),
                '16/9' => __('16/9', 'agile'),
            )
        ),
        'autoplay' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Autoplay', 'agile'),
            'desc' => __('Specify whether to automatically play the video once ready.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'placeholder_url' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Placeholder URL', 'agile'),
            'desc' => __('URL of the placeholder image to be displayed instead of YouTube video in mobile devices.', 'agile'),
        ),
        'overlay_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Color', 'agile'),
            'desc' => __('The color of the overlay to be applied on the video.', 'agile'),
        ),
        'overlay_opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Opacity', 'agile'),
            'desc' => __('The opacity of the overlay color. Specify a value between 0 and 1.', 'agile'),
        ),
        'overlay_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Overlay Pattern', 'agile'),
            'desc' => __('The URL of the image which can act as a pattern displayed on top of the video.', 'agile'),
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'agile'),
            'desc' => __('The title displayed on top of the video (optional).', 'agile'),
        ),
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'agile'),
            'desc' => __('The text displayed on top of the video, below the title.', 'agile'),
        ),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'agile'),
            'desc' => __(' The title for the button displayed on top of the video.', 'agile'),

        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'agile'),
            'desc' => __('The URL pointed to by the button displayed on top of the video.', 'agile'),

        ),
    ),

    'shortcode' => '[ytp_video_section id="{{id}}" class="{{class}}" video_url="{{video_url}}" containment="{{containment}}" placeholder_url="{{placeholder_url}}" title="{{title}}" text="{{text}}" button_text="{{button_text}}" button_url="{{button_url}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}" mute="{{mute}}" show_controls="{{show_controls}}" quality="{{quality}}" optimize_display="{{optimize_display}}" loop="{{loop}}" opacity="{{opacity}}" vol="{{vol}}" ratio="{{ratio}}" autoplay="{{autoplay}}"]',
    'popup_title' => __('Insert YouTube Video Section Shortcode', 'agile')
);

$livemesh_shortcodes['video_showcase'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'agile'),
            'desc' => __('The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.', 'agile')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Class', 'agile'),
            'desc' => __('The CSS class of the DIV element created to wrap the HTML5 video (optional). Default is video-heading.', 'agile')
        ),
        'video_id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video Id', 'agile'),
            'desc' => __('The id of the VIDEO tag element (optional).', 'agile'),
        ),
        'mp4_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('MP4 URL', 'agile'),
            'desc' => __('The URL of the video uploaded in MP4 format.', 'agile'),
        ),
        'ogg_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('OGG URL', 'agile'),
            'desc' => __('The URL of the video uploaded in OGG format.', 'agile'),
        ),
        'webm_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('WEBM URL', 'agile'),
            'desc' => __('The URL of the video uploaded in WEBM format.', 'agile'),
        ),
        'muted' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Mute/Unmute', 'agile'),
            'desc' => __('Specify if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute after the video starts.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'agile'),
            'desc' => __('Whether to loop the movie once ended.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'placeholder_url' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Placeholder URL', 'agile'),
            'desc' => __('URL of the placeholder image to be displayed instead of YouTube video in mobile devices.', 'agile'),
        ),
        'overlay_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Color', 'agile'),
            'desc' => __('The color of the overlay to be applied on the video.', 'agile'),
        ),
        'overlay_opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Opacity', 'agile'),
            'desc' => __('The opacity of the overlay color. Specify a value between 0 and 1.', 'agile'),
        ),
        'overlay_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Overlay Pattern', 'agile'),
            'desc' => __('The URL of the image which can act as a pattern displayed on top of the video.', 'agile'),
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'agile'),
            'desc' => __('The title text displayed on top of the video.', 'agile'),
        ),
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'agile'),
            'desc' => __('The text displayed on top of the video, below the title.', 'agile'),
        ),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'agile'),
            'desc' => __(' The title for the button displayed on top of the video.', 'agile'),

        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'agile'),
            'desc' => __('The URL pointed to by the button displayed on top of the video.', 'agile'),

        ),
    ),

    'shortcode' => '[video_showcase id="{{id}}" class="{{class}}" mp4_url="{{mp4_url}}" ogg_url="{{ogg_url}}" webm_url="{{webm_url}}" placeholder_url="{{placeholder_url}}" text="{{text}}" button_text="{{button_text}}" button_url="{{button_url}}" muted="{{muted}}" loop="{{loop}}" overlay_pattern="{{overlay_pattern}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}"]',
    'popup_title' => __('Insert HTML5 Video Showcase Shortcode', 'agile')
);

$livemesh_shortcodes['video_section'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'agile'),
            'desc' => __('The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.', 'agile')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Class', 'agile'),
            'desc' => __('The CSS class of the DIV element created to wrap the HTML5 video (optional).', 'agile')
        ),
        'video_id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video Id', 'agile'),
            'desc' => __('The id of the VIDEO tag element. (optional)', 'agile'),
        ),
        'mp4_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('MP4 URL', 'agile'),
            'desc' => __('The URL of the video uploaded in MP4 format.', 'agile'),
        ),
        'ogg_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('OGG URL', 'agile'),
            'desc' => __('The URL of the video uploaded in OGG format.', 'agile'),
        ),
        'webm_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('WEBM URL', 'agile'),
            'desc' => __('The URL of the video uploaded in WEBM format.', 'agile'),
        ),

        'muted' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Mute/Unmute', 'agile'),
            'desc' => __('Specify if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute switch after video starts.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'agile'),
            'desc' => __('Specify whether loop the movie once ended.', 'agile'),
            'options' => array(
                'false' => __('False', 'agile'),
                'true' => __('True', 'agile'),
            )
        ),
        'placeholder_url' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Placeholder URL', 'agile'),
            'desc' => __('URL of the placeholder image to be displayed instead of YouTube video in mobile devices.', 'agile'),
        ),
        'overlay_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Color', 'agile'),
            'desc' => __('The color of the overlay to be applied on the video.', 'agile'),
        ),
        'overlay_opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Opacity', 'agile'),
            'desc' => __('The opacity of the overlay color.', 'agile'),
        ),
        'overlay_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Overlay Pattern', 'agile'),
            'desc' => __('The URL of the image which can act as a pattern displayed on top of the video.', 'agile'),
        ),
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'agile'),
            'desc' => __('The text displayed on top of the video.', 'agile'),
        ),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'agile'),
            'desc' => __(' The title for the button displayed on top of the video, below the text.', 'agile'),

        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'agile'),
            'desc' => __('The URL pointed to by the button displayed on top of the video.', 'agile'),
        ),
    ),
    'shortcode' => '[video_section id="{{id}}" class="{{class}}" mp4_url="{{mp4_url}}" ogg_url="{{ogg_url}}" webm_url="{{webm_url}}" placeholder_url="{{placeholder_url}}" text="{{text}}" button_text="{{button_text}}" button_url="{{button_url}}" muted="{{muted}}" loop="{{loop}}" overlay_pattern="{{overlay_pattern}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}"]',
    'popup_title' => __('Insert HTML5 Video Section Shortcode', 'agile')
);

$livemesh_shortcodes['audio'] = array(
    'no_preview' => true,
    'params' => array(
        'ogg_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('OGG URL', 'agile'),
            'desc' => __('The URL of the audio clip uploaded in OGG format.eg.http://mydomain.com/song.ogg', 'agile'),
        ),
        'mp3_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('MP4 URL', 'agile'),
            'desc' => __('The URL of the audio uploaded in MP3 format.eg.http://mydomain.com/song.mp3', 'agile'),
        )
    ),
    'shortcode' => '[html5_audio ogg_url="{{ogg_url}}" mp3_url="{{mp3_url}}" ]',
    'popup_title' => __('Insert HTML5 Audio Shortcode', 'agile')
);

/*porfolio shortcodes*/

$livemesh_shortcodes['show_post_snippets'] = array(
    'no_preview' => true,
    'params' => array(
        'post_type' => array(
            'std' => 'portfolio',
            'type' => 'select',
            'label' => __('Post Type', 'agile'),
            'desc' => __('The custom post type whose posts need to be displayed. Examples include post, portfolio, team etc.', 'agile'),
            'options' => array(
                'post' => __('Post', 'agile'),
                'portfolio' => __('Portfolio', 'agile'),
                'gallery_item' => __('Gallery', 'agile'),
                'team' => __('Team', 'agile')
            )
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'agile'),
            'desc' => __('Display a header title for the post snippets.', 'agile')
        ),
        'layout_class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Layout Class', 'agile'),
            'desc' => __('The CSS class to be set for the list element (UL) displaying the post snippets (optional). Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.', 'agile')
        ),

        'number_of_columns' => array(
            'std' => '3',
            'type' => 'text',
            'label' => __('Number of Columns', 'agile'),
            'desc' => __('The number of columns to display per row of the post snippets', 'agile')
        ),
        'post_count' => array(
            'std' => '6',
            'type' => 'text',
            'label' => __('Number of Posts', 'agile'),
            'desc' => __('Number of posts to display', 'agile')
        ),
        'image_size' => array(
            'std' => 'medium-thumb',
            'type' => 'select',
            'label' => __('Image Size', 'agile'),
            'desc' => __('Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        ),
        'display_title' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Title', 'agile'),
            'desc' => __('Specify if the title of the post or custom post type needs to be displayed below the featured image', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'display_summary' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Summary', 'agile'),
            'desc' => __('Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'show_excerpt' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Show Excerpt', 'agile'),
            'desc' => __(' Display excerpt for the post/custom post type. Has no effect if Display Summary is set to false.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'agile'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'agile')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'agile'),
            'desc' => __('Specify if the thumbnail needs to be hidden', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta', 'agile'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'taxonomy' => array(
            'std' => 'portfolio_category',
            'type' => 'select',
            'label' => __('Taxonomy', 'agile'),
            'desc' => __('Custom taxonomy to be used for filtering the posts/custom post types displayed like category, department etc.', 'agile'),
            'options' => array(
                'category' => __('Category', 'agile'),
                'post_tag' => __('Tag', 'agile'),
                'portfolio_category' => __('Portfolio Category', 'agile'),
                'gallery_category' => __('Gallery Category', 'agile'),
                'department' => __('Team Department', 'agile')
            )
        ),
        'terms' => array(
            'std' => 'inspiration,technology',
            'type' => 'text',
            'label' => __('Taxonomy Terms', 'agile'),
            'desc' => __(' A comma separated list of terms of taxonomy specified for which the items needs to be displayed. Helps filter the results by category/taxonomy, if the these terms are defined for the taxonomy chosen.', 'agile')
        ),
        'no_margin' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('No Margin - Packed Layout', 'agile'),
            'desc' => __(' If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
    ),
    'shortcode' => '[show_post_snippets layout_class="{{layout_class}}" post_type="{{post_type}}" taxonomy="{{taxonomy}}" terms="{{terms}}" number_of_columns="{{number_of_columns}}" post_count="{{post_count}}" display_title="{{display_title}}" display_summary="{{display_summary}}" show_excerpt="{{show_excerpt}}" excerpt_count="{{excerpt_count}}" show_meta="{{show_meta}}" image_size="{{image_size}}" hide_thumbnail="{{hide_thumbnail}}" title="{{title}}" no_margin="{{no_margin}}"]',
    'popup_title' => __('Insert Portfolio  Shortcode', 'agile')
);

$livemesh_shortcodes['show_portfolio'] = array(
    'no_preview' => true,
    'params' => array(
        'number_of_columns' => array(
            'std' => '3',
            'type' => 'text',
            'label' => __('Number of Columns', 'agile'),
            'desc' => __('The number of columns to display per row of the post snippets', 'agile')
        ),
        'post_count' => array(
            'std' => '9',
            'type' => 'text',
            'label' => __('Number of Posts', 'agile'),
            'desc' => __(' Total number of portfolio items to display.', 'agile')
        ),
        'image_size' => array(
            'std' => 'medium-thumb',
            'type' => 'select',
            'label' => __('Image Size', 'agile'),
            'desc' => __(' Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        ),
        'filterable' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Filterable', 'agile'),
            'desc' => __('The portfolio items will be filterable based on portfolio categories if set to true.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
        'no_margin' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Margin', 'agile'),
            'desc' => __(' If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
    ),
    'shortcode' => '[show_portfolio number_of_columns="{{number_of_columns}}" post_count="{{post_count}}" image_size="{{image_size}}" filterable="{{filterable}}" no_margin="{{no_margin}}"]',
    'popup_title' => __('Insert Portfolio  Shortcode', 'agile')
);

$livemesh_shortcodes['show_gallery'] = array(
    'no_preview' => true,
    'params' => array(
        'number_of_columns' => array(
            'std' => '3',
            'type' => 'text',
            'label' => __('Number of Columns', 'agile'),
            'desc' => __('The number of columns to display per row of the post snippets', 'agile')
        ),
        'post_count' => array(
            'std' => '9',
            'type' => 'text',
            'label' => __('Number of Posts', 'agile'),
            'desc' => __(' Total number of Gallery items to display', 'agile')
        ),
        'image_size' => array(
            'std' => 'medium-thumb',
            'type' => 'select',
            'label' => __('Image Size', 'agile'),
            'desc' => __(' Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        ),
        'filterable' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Filterable', 'agile'),
            'desc' => __('The Gallery items will be filterable based on portfolio categories if set to true.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
        'no_margin' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Margin', 'agile'),
            'desc' => __(' If set to true, no margins are maintained between the columns.', 'agile'),
            'options' => array(
                'true' => __('True', 'agile'),
                'false' => __('False', 'agile')
            )
        ),
    ),
    'shortcode' => '[show_gallery number_of_columns="{{number_of_columns}}" post_count="{{post_count}}" image_size="{{image_size}}" filterable="{{filterable}}" no_margin="{{no_margin}}"]',
    'popup_title' => __('Insert Gallery  Shortcode', 'agile')
);

/*blog posts shortcode*/
$livemesh_shortcodes['recent_posts'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number of Posts', 'agile'),
            'desc' => __('Number of posts to display', 'agile')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'agile'),
            'desc' => __('Display thumbnail image or hide the same', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'agile'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'agile'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'agile')
        ),
        'image_size' => array(
            'std' => 'medium-thumb',
            'type' => 'select',
            'label' => __('Image Size', 'agile'),
            'desc' => __(' Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        )

    ),
    'shortcode' => '[recent_posts post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Blog Post Shortcode', 'agile')
);

$livemesh_shortcodes['popular_posts'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number Of Posts', 'agile'),
            'desc' => __('Number of posts to display', 'agile')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'agile'),
            'desc' => __('Display thumbnail image or hide the same', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'agile'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'agile'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'agile')
        ),
        'image_size' => array(
            'std' => 'medium-thumb',
            'type' => 'select',
            'label' => __('Image Size', 'agile'),
            'desc' => __(' Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        )

    ),
    'shortcode' => '[popular_posts post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Popular Posts Shortcode', 'agile')
);

$livemesh_shortcodes['category_posts'] = array(
    'no_preview' => true,
    'params' => array(
        'category_slugs' => array(
            'std' => 'inspiration,technology',
            'type' => 'text',
            'label' => __('Category Slugs', 'agile'),
            'desc' => __('The comma separated list of posts category slugs.', 'agile')
        ),
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number of Posts', 'agile'),
            'desc' => __('Number of posts to display', 'agile')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'agile'),
            'desc' => __('Display thumbnail image or hide the same', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'agile'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'agile'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'agile')
        ),
        'image_size' => array(
            'std' => 'medium-thumb',
            'type' => 'select',
            'label' => __('Image Size', 'agile'),
            'desc' => __(' Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        )

    ),
    'shortcode' => '[category_posts category_slugs="{{category_slugs}}" post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Posts for one or more Categories', 'agile')
);

$livemesh_shortcodes['tag_posts'] = array(
    'no_preview' => true,
    'params' => array(
        'tag_slugs' => array(
            'std' => 'inspiration,technology',
            'type' => 'text',
            'label' => __('Tag Slugs', 'agile'),
            'desc' => __('The comma separated list of posts tag slugs.', 'agile')
        ),
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number of Posts', 'agile'),
            'desc' => __('Number of posts to display', 'agile')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'agile'),
            'desc' => __('Display thumbnail image or hide the same', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'agile'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'agile'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'agile')
        ),
        'image_size' => array(
            'std' => 'medium-thumb',
            'type' => 'select',
            'label' => __('Image Size', 'agile'),
            'desc' => __(' Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        )
    ),
    'shortcode' => '[tag_posts tag_slugs="{{tag_slugs}}" post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Posts of one or more Tags', 'agile')
);

$livemesh_shortcodes['show_custom_post_types'] = array(
    'no_preview' => true,
    'params' => array(
        'post_types' => array(
            'std' => 'post',
            'type' => 'select',
            'label' => __('Post Types', 'agile'),
            'desc' => __('The comma separated list of post types whose posts need to be displayed.', 'agile'),
            'options' => array(
                'post' => __('Post', 'agile'),
                'portfolio' => __('Portfolio', 'agile'),
                'gallery_item' => __('Gallery', 'agile'),
                'team' => __('Team', 'agile')
            )
        ),
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number of Posts', 'agile'),
            'desc' => __('Number of posts to display', 'agile')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'agile'),
            'desc' => __('Display thumbnail image or hide the same', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'agile'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'agile'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'agile')
        ),
        'image_size' => array(
            'std' => 'medium-thumb',
            'type' => 'select',
            'label' => __('Image Size', 'agile'),
            'desc' => __(' Can be Thumbnail, Medium Thumbnail, Square Thumbnail, Medium, Large, Full', 'agile'),
            'options' => array(
                'thumbnail' => __('Thumbnail', 'agile'),
                'medium-thumb' => __('Medium Thumbnail', 'agile'),
                'square-thumb' => __('Square Thumbnail', 'agile'),
                'medium' => __('Medium', 'agile'),
                'large' => __('Large', 'agile'),
                'full' => __('Full', 'agile'),
            )
        )
    ),
    'shortcode' => '[show_custom_post_types post_types="{{post_types}}" post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Custom Post Types', 'agile')
);
/*custom Post Types*/

$livemesh_shortcodes['pricing_plans'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Number of Pricing Columns', 'agile'),
            'desc' => __('The number of pricing columns to be displayed. By default displays all of the custom posts entered as pricing in the Pricing Plan tab of WordPress admin (optional).', 'agile')
        ),
        'pricing_ids' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Pricing IDs', 'agile'),
            'desc' => __('A comma separated post ids of the pricing custom post types created in the Pricing Plan tab of WordPress admin (optional). Useful for filtering the items displayed. ', 'agile')
        )
    ),
    'shortcode' => '[pricing_plans post_count="{{post_count}}" pricing_ids="{{pricing_ids}}"]',
    'popup_title' => __('Insert Pricing Plans Shortcode', 'agile')
);

$livemesh_shortcodes['testimonials'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Number of Testimonials', 'agile'),
            'desc' => __('The number of testimonials to be displayed.', 'agile')
        ),
        'testimonial_ids' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Testimonials IDs', 'agile'),
            'desc' => __('A comma separated post ids of the Testimonial custom post types created in the Testimonials tab of the WordPress Admin. Helps to filter the testimonials for display (optional).', 'agile')
        )
    ),
    'shortcode' => '[testimonials post_count="{{post_count}}" testimonial_ids="{{testimonial_ids}}"]',
    'popup_title' => __('Insert Testimonials Shortcode', 'agile')
);

$livemesh_shortcodes['testimonials2'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Number of Testimonials2', 'agile'),
            'desc' => __('The number of testimonials to be displayed.', 'agile')
        ),
        'testimonial_ids' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Testimonials IDs', 'agile'),
            'desc' => __('A comma separated post ids of the Testimonial custom post types created in the Testimonials tab of the WordPress Admin. Helps to filter the testimonials for display (optional).', 'agile')
        )
    ),
    'shortcode' => '[testimonials2 post_count="{{post_count}}" testimonial_ids="{{testimonial_ids}}"]',
    'popup_title' => __('Insert Testimonials 2 Shortcode', 'agile')
);

$livemesh_shortcodes['team'] = array(
    'no_preview' => true,
    'params' => array(
        'department' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Department', 'agile'),
            'desc' => __('The comma separated slugs of the department(s) for which the team slider needs to be created. Helps to limit the team members displayed to one or more departments. (optional).', 'agile')
        )
    ),
    'shortcode' => '[team department="{{department}}"]',
    'popup_title' => __('Insert Team Shortcode', 'agile')
);

$livemesh_shortcodes['team_slider'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'agile'),
            'desc' => __('The element id of the wrapper element for the slider. Useful if you need to have multiple team sliders in a single page (optional).', 'agile')
        ),
        'department' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Department', 'agile'),
            'desc' => __('The comma separated slugs of the department(s) for which the team slider needs to be created. Helps to limit the team members displayed to one or more departments. (optional).', 'agile')
        )
    ),
    'shortcode' => '[team_slider id="{{id}}" department="{{department}}"]',
    'popup_title' => __('Insert Team Slider Shortcode', 'agile')
);

/*slider shortcodes*/

$livemesh_shortcodes['responsive_slider'] = array(
    'no_preview' => true,
    'params' => array(
        'type' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Type', 'agile'),
            'desc' => __('Constructs and sets a unique CSS class for the slider. (optional).', 'agile')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'agile'),
            'desc' => __('The inline CSS applied to the slider container DIV element.(optional)', 'agile'),
        ),
        'slideshow_speed' => array(
            'std' => '5000',
            'type' => 'text',
            'label' => __('Slideshow Speed', 'agile'),
            'desc' => __('Set the speed of the slideshow cycling, in milliseconds', 'agile')
        ),
        'animation_speed' => array(
            'std' => '600',
            'type' => 'text',
            'label' => __('Animation Speed', 'agile'),
            'desc' => __('Set the speed of animations, in milliseconds.', 'agile')
        ),

        'animation' => array(
            'std' => 'fade',
            'type' => 'select',
            'label' => __('Animation', 'agile'),
            'desc' => __('Select your animation type, "fade" or "slide".', 'agile'),
            'options' => array(
                'fade' => __('fade', 'agile'),
                'slide' => __('slide', 'agile')
            )
        ),
        'pause_on_action' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Pause on Action', 'agile'),
            'desc' => __('Pause the slideshow when interacting with control elements, highly recommended.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'pause_on_hover' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Pause on Hover', 'agile'),
            'desc' => __('Pause the slideshow when hovering over slider, then resume when no longer hovering.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'direction_nav' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Direction Navigation', 'agile'),
            'desc' => __(' Create navigation for previous/next navigation.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'control_nav' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Control Navigation', 'agile'),
            'desc' => __('Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'easing' => array(
            'std' => 'swing',
            'type' => 'text',
            'label' => __('Easing', 'agile'),
            'desc' => __(' Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!', 'agile')
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'agile'),
            'desc' => __('Should the animation loop?', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'slideshow' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Slideshow', 'agile'),
            'desc' => __('Animate slider automatically without user intervention.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'controls_container' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Controls Container', 'agile'),
            'desc' => __('Advanced Use only - Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be ".flexslider-container". Property is ignored if given element is not found.', 'agile')
        ),
        'manual_controls' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Manual Controls', 'agile'),
            'desc' => __('Advanced Use only - Selector: Declare custom control navigation. Examples would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.', 'agile')
        )
    ),
    'shortcode' => '[responsive_slider type="{{type}}" slideshow_speed="{{slideshow_speed}}" animation_speed="{{animation_speed}}" animation="{{animation}}" control_nav="{{control_nav}}" direction_nav="{{direction_nav}}" pause_on_hover="{{pause_on_hover}}" pause_on_action="{{pause_on_action}}" easing="{{easing}}" loop="{{loop}}" slideshow="{{slideshow}}" controls_container="{{controls_container}}" manualControls="{{manual_controls}}" style="{{style}}"]REPLACE WITH A LIST (ul > li tag) OF IMAGES OR HTML CONTENT[/responsive_slider]',
    'popup_title' => __('Insert Slider  Shortcode', 'agile')

);
/*device slider not completed*/

$livemesh_shortcodes['device_slider'] = array(
    'no_preview' => true,
    'params' => array(
        'device' => array(
            'std' => 'iphone',
            'type' => 'select',
            'label' => __('Select Slider Type', 'agile'),
            'desc' => __('The device type to decide on the type of slider desired.', 'agile'),
            'options' => array(
                'iphone7black' => __('iPhone 7 Black', 'agile'),
                'iphone7jetblack' => __('iPhone 7 Jet Black', 'agile'),
                'iphone7silver' => __('iPhone 7 Silver', 'agile'),
                'iphone7gold' => __('iPhone 7 Gold', 'agile'),
                'iphone7rosegold' => __('iPhone 7 Rose Gold', 'agile'),
                'iphone' => __('iPhone', 'agile'),
                'galaxys7' => __('Samsung Galaxy S7', 'agile'),
                'nexus6p' => __('Nexus 6p', 'agile'),
                'googlepixelblack' => __('Google Pixel Black', 'agile'),
                'googlepixelblue' => __('Google Pixel Blue', 'agile'),
                'googlepixelsilver' => __('Google Pixel Silver', 'agile'),

                'galaxys4' => __('galaxys4', 'agile'),
                'htcone' => __('htcone', 'agile'),
                'ipad' => __('ipad', 'agile'),
                'imac' => __('imac', 'agile'),
                'macbook' => __('macbook', 'agile'),
                'browser' => __('browser', 'agile')
            )
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'agile'),
            'desc' => __('The inline CSS applied to the slider container DIV element.', 'agile'),
        ),
        'slideshow_speed' => array(
            'std' => '5000',
            'type' => 'text',
            'label' => __('Slideshow Speed', 'agile'),
            'desc' => __('Set the speed of the slideshow cycling, in milliseconds', 'agile')
        ),
        'animation_speed' => array(
            'std' => '600',
            'type' => 'text',
            'label' => __('Animation Speed', 'agile'),
            'desc' => __('Set the speed of animations, in milliseconds.', 'agile')
        ),
        'animation' => array(
            'std' => 'fade',
            'type' => 'select',
            'label' => __('Animation', 'agile'),
            'desc' => __('Select your animation type, "fade" or "slide".', 'agile'),
            'options' => array(
                'fade' => __('fade', 'agile'),
                'slide' => __('slide', 'agile')
            )
        ),
        'pause_on_action' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Pause On Action', 'agile'),
            'desc' => __('Pause the slideshow when interacting with control elements, highly recommended.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'pause_on_hover' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Pause On Hover', 'agile'),
            'desc' => __('Pause the slideshow when hovering over slider, then resume when no longer hovering.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'direction_nav' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Direction Navigation', 'agile'),
            'desc' => __(' Create navigation for previous/next navigation?', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'control_nav' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Control Navigation', 'agile'),
            'desc' => __('Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'easing' => array(
            'std' => 'swing',
            'type' => 'text',
            'label' => __('Easing', 'agile'),
            'desc' => __(' Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!', 'agile')
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'agile'),
            'desc' => __('Should the animation loop?', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'image_urls' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Image URLs', 'agile'),
            'desc' => __('Comma separated list of URLs pointing to the images.', 'agile')
        ),
        'browser_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Browser URL', 'agile'),
            'desc' => __('If the device specified is browser or if [browser_slider], provide the URL to be displayed in the address bar of the browser.', 'agile')
        )
    ),
    'shortcode' => '[device_slider device="{{device}}" style="{{style}}" slideshow_speed="{{slideshow_speed}}" animation_speed="{{animation_speed}}" animation="{{animation}}" control_nav="{{control_nav}}" direction_nav="{{direction_nav}}" pause_on_hover="{{pause_on_hover}}" pause_on_action="{{pause_on_action}}" easing="{{easing}}" loop="{{loop}}" image_urls="{{image_urls}}" browser_url="{{browser_url}}"]',
    'popup_title' => __('Insert Slider Shortcode', 'agile')

);

/*tabs shortcode*/

$livemesh_shortcodes['tabgroup'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[tabgroup]{{child_shortcode}}[/tabgroup]',
    'popup_title' => __('Insert Tab Shortcode', 'agile'),
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'agile'),
                'desc' => __('Title of the tab', 'agile'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'agile'),
                'desc' => __('Add the tabs content', 'agile')
            )
        ),
        'shortcode' => '[tab title="{{title}}"]{{content}}[/tab]',
        'clone_button' => __('Add Tab', 'agile')
    )

);

$livemesh_shortcodes['toggle'] = array(
    'no_preview' => true,
    'params' => array(
        'type' => array(
            'type' => 'text',
            'label' => __('Type', 'agile'),
            'desc' => __('CSS class name to be assigned to the toggle DIV element created.', 'agile'),
            'std' => ''
        ),
        'title' => array(
            'type' => 'text',
            'label' => __('Toggle Content Title', 'agile'),
            'desc' => __('The title of the toggle.', 'agile'),
            'std' => 'Title'
        ),
        'content' => array(
            'std' => 'Content',
            'type' => 'textarea',
            'label' => __('Toggle Content', 'agile'),
            'desc' => __('Add the toggle content. Will accept HTML', 'agile'),
        )
    ),
    'shortcode' => '[toggle type="{{type}}" title="{{title}}"]{{content}}[/toggle]',
    'popup_title' => __('Insert Toggle Shortcode', 'agile')
);
/* stats shortcode */
$livemesh_shortcodes['skills'] = array(
    'params' => array(),
    'shortcode' => '[skills]{{child_shortcode}}[/skills]',
    'popup_title' => __('Insert skills Shortcode', 'agile'),
    'no_preview' => true,

    // child shortcode is clonable & sortable
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Web Design',
                'type' => 'text',
                'label' => __('Stats Title', 'agile'),
                'desc' => __('The title indicating the stats bar title', 'agile'),
            ),
            'value' => array(
                'std' => '87',
                'type' => 'text',
                'label' => __('Percentage Value', 'agile'),
                'desc' => __('The percentage value for the percentage stats to be displayed', 'agile'),
            )
        ),
        'shortcode' => '[skill_bar title="{{title}}" value="{{value}}"][/skill_bar] ',
        'clone_button' => __('Add Skill', 'agile')
    )
);

$livemesh_shortcodes['animate_numbers'] = array(
    'params' => array(),
    'shortcode' => '[animate-numbers]{{child_shortcode}}[/animate-numbers]',
    'popup_title' => __('Insert Animate Numbers Shortcode', 'agile'),
    'no_preview' => true,

    // child shortcode is clonable & sortable
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Hours Worked',
                'type' => 'text',
                'label' => __('Stats Title', 'agile'),
                'desc' => __('The title indicating the stats title.', 'agile'),
            ),
            'start_value' => array(
                'std' => '670',
                'type' => 'text',
                'label' => __('Start Value', 'agile'),
                'desc' => __('The starting value for the animation which displays a counter that animates to the end value specified as the content of the [animate-number] shortcode.', 'agile'),
            ),
            'end_value' => array(
                'std' => '23670',
                'type' => 'text',
                'label' => __('End Value', 'agile'),
                'desc' => __('The ending value for the animation which displays a counter that animates from the start value above to the end value specified here as the content of the [animate-number] shortcode.', 'agile'),
            ),
            'icon' => array(
                'std' => 'icon-cog2',
                'type' => 'text',
                'label' => __('Icon', 'agile'),
                'desc' => __('The font icon to be displayed for the statistic being displayed. The class names are listed at https://www.livemeshthemes.com/wp-content/uploads/cosmic-icons/demo.html', 'agile'),
            )
        ),
        'shortcode' => '[animate-number icon="{{icon}}" title="{{title}}" start_value="{{start_value}}"]{{end_value}}[/animate-number] ',
        'clone_button' => __('Add Animated Number', 'agile')
    )
);
$livemesh_shortcodes['piechart'] = array(
    'no_preview' => true,
    'params' => array(
        'title' => array(
            'type' => 'text',
            'label' => __('Piechart Title', 'agile'),
            'desc' => __('The title of the Piechart.', 'agile'),
            'std' => 'Repeat Customers'
        ),
        'value' => array(
            'std' => '83',
            'type' => 'text',
            'label' => __('Percentage Value', 'agile'),
            'desc' => __('The percentage value for the percentage stats.', 'agile'),
        )
    ),
    'shortcode' => '[piechart title="{{title}}" percent="{{value}}"][/piechart]',
    'popup_title' => __('Insert Piechart Shortcode', 'agile')
);

/*miscellenous shortcodes*/
$livemesh_shortcodes['message'] = array(
    'no_preview' => true,
    'params' => array(
        'message_type' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Message Type', 'agile'),
            'desc' => __('Message Type', 'agile'),
            'options' => array(
                'success' => __('Success', 'agile'),
                'info' => __('Info', 'agile'),
                'warning' => __('Warning', 'agile'),
                'tip' => __('Tip', 'agile'),
                'note' => __('Note', 'agile'),
                'errors' => __('Error', 'agile'),
                'attention' => __('Attention', 'agile')
            )
        ),
        'title' => array(
            'type' => 'text',
            'label' => __('Title', 'agile'),
            'desc' => __('Title displayed above the text in bold.', 'agile'),
            'std' => ''
        ),
        'message_text' => array(
            'type' => 'text',
            'label' => __('Message Text', 'agile'),
            'desc' => __('The message text to be displayed.', 'agile'),
            'std' => ''
        )
    ),
    'shortcode' => '[{{message_type}} title="{{title}}"]{{message_text}}[/{{message_type}}]',
    'popup_title' => __('Insert Message Shortcode', 'agile')
);

$livemesh_shortcodes['divider'] = array(
    'no_preview' => true,
    'params' => array(
        'divider_type' => array(
            'std' => 'divider',
            'type' => 'select',
            'label' => __('Divider Type', 'agile'),
            'desc' => __('Type of Divider', 'agile'),
            'options' => array(
                'divider' => __('Divider', 'agile'),
                'divider_line' => __('Divider Line', 'agile'),
                'divider_space' => __('Divider Space', 'agile'),
                'divider_fancy' => __('Divider Fancy', 'agile'),
                'divider_top' => __('Divider with Top Link', 'agile'),
                'clear' => __('Clear', 'agile'),
            )
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the DIV element created (optional)', 'agile')
        )
    ),
    'shortcode' => '[{{divider_type}} style="{{style}}"]',
    'popup_title' => __('Insert Divider Shortcode', 'agile')
);


$livemesh_shortcodes['box_frame'] = array(
    'no_preview' => true,
    'params' => array(
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'agile'),
            'desc' => __('Title for the box.', 'agile')
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'agile'),
            'desc' => __('Choose Alignment', 'agile'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'agile'),
                'left' => __('Left', 'agile'),
                'center' => __('Center', 'agile'),
                'right' => __('Right', 'agile')
            )
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the div element created (optional)', 'agile')
        ),
        'class' => array(
            'type' => 'text',
            'label' => __('Class', 'agile'),
            'desc' => __(' Custom CSS class name to be set for the div element created (optional)', 'agile'),
            'std' => ''
        ),
        'width' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Width', 'agile'),
            'desc' => __('Custom width of the box. Do include px suffix or another appropriate suffix for width.', 'agile')
        ),
        'inner_style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Inner Style', 'agile'),
            'desc' => __('Inline CSS styling for the inner box (optional)', 'agile')
        )
    ),
    'shortcode' => '[box_frame style="{{style}}" width="{{width}}" class="{{class}}" align="{{align}}" title="{{title}}" inner_style="{{inner_style}}"]REPLACE WITH CONTENT[/box_frame]',
    'popup_title' => __('Insert Box Frame Shortcode', 'agile')
);


$livemesh_shortcodes['clear'] = array(
    'no_preview' => true,
    'params' => array(),
    'shortcode' => '[clear]',
    'popup_title' => __('Insert Clear Shortcode', 'agile')
);

$livemesh_shortcodes['header_fancy'] = array(
    'no_preview' => true,
    'params' => array(
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'agile'),
            'desc' => __('The text to be displayed in the center of the header.', 'agile')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'agile'),
            'desc' => __('Inline CSS styling applied for the DIV element created (optional);', 'agile')
        ),
        'class' => array(
            'type' => 'text',
            'label' => __('Class', 'agile'),
            'desc' => __(' Custom CSS class name to be set for the div element created (optional)', 'agile'),
            'std' => ''
        )
    ),
    'shortcode' => '[header_fancy class="{{class}}" style="{{style}}" text="{{text}}"]',
    'popup_title' => __('Insert Header Fancy Shortcode', 'agile')
);

/*Social Shortcodes*/

$livemesh_shortcodes['social_list'] = array(
    'no_preview' => true,
    'params' => array(
        'email' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Email', 'agile'),
            'desc' => __('The email address to be used.', 'agile')
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'agile'),
            'desc' => __('Choose Alignment', 'agile'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'agile'),
                'left' => __('Left', 'agile'),
                'center' => __('Center', 'agile'),
                'right' => __('Right', 'agile')
            )
        ),
        'facebook_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Facebook URL', 'agile'),
            'desc' => __('The URL of the Facebook page.', 'agile')
        ),
        'twitter_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Twitter URL', 'agile'),
            'desc' => __('The URL of the Twitter page.', 'agile')
        ),
        'flickr_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Flickr URL', 'agile'),
            'desc' => __('The URL of the Flickr page.', 'agile')
        ),
        'youtube_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('YouTube URL', 'agile'),
            'desc' => __('The URL of the Youtube page.', 'agile')
        ),
        'youtube_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('YouTube URL', 'agile'),
            'desc' => __('The URL of the Youtube page.', 'agile')
        ),
        'linkedin_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Linkedin URL', 'agile'),
            'desc' => __('The URL of the Linkedin page.', 'agile')
        ),
        'googleplus_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Googleplus URL', 'agile'),
            'desc' => __('The URL of the Googleplus page.', 'agile')
        ),
        'vimeo_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Vimeo URL', 'agile'),
            'desc' => __('The URL of the Vimeo page.', 'agile')
        ),
        'instagram_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Instagram URL', 'agile'),
            'desc' => __('The URL of the Instagram page.', 'agile')
        ),
        'behance_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Behance URL', 'agile'),
            'desc' => __('The URL of the Behance page.', 'agile')
        ),
        'pinterest_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Pinterest URL', 'agile'),
            'desc' => __('The URL of the Pinterest page.', 'agile')
        ),
        'skype_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Skype URL', 'agile'),
            'desc' => __('The URL of the Skype page.', 'agile')
        ),
        'dribbble_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Dribbble URL', 'agile'),
            'desc' => __('The URL of the Dribbble page.', 'agile')
        ),
        'include_rss' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Include RSS', 'agile'),
            'desc' => __('A boolean value(true/false string) indicating that the link to the RSS feed be included. Default is false.', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        )
    ),
    'shortcode' => '[social_list googleplus_url="{{googleplus_url}}" facebook_url="{{facebook_url}}" twitter_url="{{twitter_url}}" youtube_url="{{youtube_url}}" linkedin_url="{{linkedin_url}}" vimeo_url="{{vimeo_url}}" instagram_url="{{instagram_url}}" behance_url="{{behance_url}}" pinterest_url="{{pinterest_url}}" skype_url="{{skype_url}}" dribbble_url="{{dribbble_url}}" include_rss="{{include_rss}}"]',
    'popup_title' => __('Insert Social List Shortcode', 'agile')
);


$livemesh_shortcodes['donate'] = array(
    'no_preview' => true,
    'params' => array(
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'agile'),
            'desc' => __('The title of the link that displays the Paypal donate button.', 'agile')
        ),
        'account' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Account', 'agile'),
            'desc' => __('The Paypal account for which the donate button is being created.', 'agile')
        ),
        'display_card_logos' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Display Card Logos', 'agile'),
            'desc' => __(' Specify if you need to display the logo images of the credit cards accepted for Paypal donations', 'agile'),
            'options' => array(
                'false' => __('false', 'agile'),
                'true' => __('true', 'agile')
            )
        ),
        'cause' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Cause', 'agile'),
            'desc' => __('The text indicating the purpose for which the donation is being collected.', 'agile')
        )
    ),
    'shortcode' => '[donate title="{{title}}" account="{{account}}" display_card_logos="{{display_card_logos}}" cause="{{cause}}"]',
    'popup_title' => __('Insert Donate Shortcode', 'agile')
);

$livemesh_shortcodes['subscribe_rss'] = array(
    'no_preview' => true,
    'params' => array(),
    'shortcode' => '[subscribe_rss]',
    'popup_title' => __('Insert Subscribe RSS Shortcode', 'agile')
);












