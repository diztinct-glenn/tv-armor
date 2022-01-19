<?php

/**
 * Extend the user profile page to handle social network information for individual authors
 * Credit - http://wpsplash.com/how-to-create-a-wordpress-authors-page/
 * @param
 * @return
 */

add_action('show_user_profile', 'mo_insert_extra_profile_fields');
add_action('edit_user_profile', 'mo_insert_extra_profile_fields');
add_action('personal_options_update', 'mo_save_extra_profile_fields');
add_action('edit_user_profile_update', 'mo_save_extra_profile_fields');

if (!function_exists('mo_save_extra_profile_fields')) {
    function mo_save_extra_profile_fields($userID) {

        if (!current_user_can('edit_user', $userID)) {
            return false;
        }

        update_user_meta($userID, 'twitter', $_POST['twitter']);
        update_user_meta($userID, 'facebook', $_POST['facebook']);
        update_user_meta($userID, 'linkedin', $_POST['linkedin']);
        update_user_meta($userID, 'googleplus', $_POST['googleplus']);
        update_user_meta($userID, 'flickr', $_POST['flickr']);
    }
}

if (!function_exists('mo_insert_extra_profile_fields')) {
    function mo_insert_extra_profile_fields($user) {
        ?>
        <h3>Connect Information</h3>

        <table class='form-table'>
            <tr>
                <th><label for='twitter'>Twitter</label></th>
                <td>
                    <input type='text' name='twitter' id='twitter'
                           value='<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>'
                           class='input-social regular-text'/>
                    <span
                        class='description'>Please enter your Twitter username. http://www.twitter.com/<strong>username</strong></span>
                </td>
            </tr>
            <tr>
                <th><label for='facebook'>Facebook</label></th>
                <td>
                    <input type='text' name='facebook' id='facebook'
                           value='<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>'
                           class='input-social regular-text'/>
                    <span
                        class='description'>Please enter your Facebook username/alias. http://www.facebook.com/<strong>username</strong></span>
                </td>
            </tr>
            <tr>
                <th><label for='linkedin'>LinkedIn</label></th>
                <td>
                    <input type='text' name='linkedin' id='linkedin'
                           value='<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>'
                           class='input-social regular-text'/>
                    <span
                        class='description'>Please enter your LinkedIn username. http://www.linkedin.com/in/<strong>username</strong></span>
                </td>
            </tr>
            <tr>
                <th><label for='googleplus'>Google Plus</label></th>
                <td>
                    <input type='text' name='googleplus' id='googleplus'
                           value='<?php echo esc_attr(get_the_author_meta('googleplus', $user->ID)); ?>'
                           class='input-social regular-text'/>
                    <span
                        class='description'>Please enter your Google Plus username. http://plus.google.com/<strong>username</strong></span>
                </td>
            </tr>
            <tr>
                <th><label for='flickr'>Flickr</label></th>
                <td>
                    <input type='text' name='flickr' id='flickr'
                           value='<?php echo esc_attr(get_the_author_meta('flickr', $user->ID)); ?>'
                           class='input-social regular-text'/>
                    <span
                        class='description'>Please enter your flickr username. http://www.flickr.com/photos/<strong>username</strong>/</span>
                </td>
            </tr>
        </table>

        <?php
    }
}