<?php

/* Contact Form Shortcode -

Usage: Pls refer to https://www.livemeshthemes.com/austin/contact-form-shortcode/

[contact_form mail_to="receipient@mydomain.com" phone=true web_url=true subject=true button_color="default"]

Parameters -

class - Custom CSS class name to be set for the div element created (optional)
mail_to - A string field specifying the recipient email where all form submissions will be received.
web_url - Can be true or false. A boolean indicating that the user should be requested for Web URL via an input field.
phone - Can be true or false. Request for phone number of the user. A phone number field is displayed.
subject - Can be true or false. A mail subject field is displayed if the value is set to true.
button_color - Color of the submit button. Available colors are black, blue, cyan, green, orange, pink, red, teal, theme and trans.

*/

if (!function_exists('lags_contact_form_shortcode')) {

    function lags_contact_form_shortcode($atts, $content = null, $code = "") {
        extract(shortcode_atts(array(
            'class' => '',
            'mail_to' => '',
            'web_url' => true,
            'phone' => true,
            'subject' => true,
            'button_color' => 'default'
        ), $atts));

        if (empty($mail_to))
            $mail_to = get_bloginfo('admin_email');

        $mail_script_url = LAGS_URI . '/includes/scripts/sendmail.php';

        $output = '<div class="feedback"></div>';

        $output .= '<form class="contact-form ' . $class . '" action="' . $mail_script_url . '" method="post">';

        $output .= '<fieldset>';

        $output .= '<p><label>' . __('Name *', 'livemesh-agile-shortcodes') . '</label><input type="text" name="contact_name" placeholder="' . __("Name:", 'livemesh-agile-shortcodes') . '" class="text-input" required></p>';

        $output .= '<p><label>' . __('Email *', 'livemesh-agile-shortcodes') . '</label><input type="email" name="contact_email" placeholder="' . __("Email:", 'livemesh-agile-shortcodes') . '" class="text-input" required></p>';

        if (lags_to_boolean($phone))
            $output .= '<p><label>' . __('Phone Number', 'livemesh-agile-shortcodes') . '</label><input type="tel" name="contact_phone" placeholder="' . __("Phone:", 'livemesh-agile-shortcodes') . '"  class="text-input"></p>';

        if (lags_to_boolean($web_url))
            $output .= '<p><label>' . __('Web URL', 'livemesh-agile-shortcodes') . '</label><input type="url" name="contact_url" placeholder="' . __("URL:", 'livemesh-agile-shortcodes') . '" class="text-input"></p>';

        if (lags_to_boolean($subject))
            $output .= '<p class="subject"><label>' . __('Subject', 'livemesh-agile-shortcodes') . '</label><input type="text" name="subject" placeholder="' . __("Subject:", 'livemesh-agile-shortcodes') . '" class="text-input"></p>';

        $output .= '<p class="text-area"><label>' . __('Message *', 'livemesh-agile-shortcodes') . '</label><textarea name="message" placeholder="' . __("Message:", 'livemesh-agile-shortcodes') . '"  rows="6" cols="40"></textarea></p>';

        $output .= '<p class="trap-field"><label for="website">' . __('Leave Empty', 'livemesh-agile-shortcodes') . '</label><input type="text" name="website" placeholder="' . __("Leave Blank:", 'livemesh-agile-shortcodes') . '" class="text-input"></p>';

        $output .= '<button type="submit" class="button large ' . $button_color . '">' . __('Send the message', 'livemesh-agile-shortcodes') . '</button>';

        if (empty($mail_to)) {
            $mail_to = lags_get_theme_option('mo_contact_form_email');
        }

        update_option('mo_cf_email_recipient' , $mail_to);

        $output .= '</fieldset>';

        $output .= '</form>';

        return $output;
    }
}

add_shortcode('contact_form', 'lags_contact_form_shortcode');