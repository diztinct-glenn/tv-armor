<?php
/**
 * Mobile Menu Template
 *
 * Displays the Mobile Menu if it has active menu items.
 *
 * @package Agile
 * @subpackage Template
 */

$custom_page_menu = get_post_meta(get_queried_object_id(), 'mo_custom_primary_navigation_menu', true);

?>

<nav id="mobile-menu" class="menu-container clearfix">

    <div class="menu-header">

        <?php echo esc_html__('Menu', 'agile') ?>

    </div>

    <?php

    if (!empty($custom_page_menu) && $custom_page_menu !== 'default') {

        wp_nav_menu(array(
            'menu' => $custom_page_menu,
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'menu inner',
            'fallback_cb' => false
        ));

    }
    else {
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'menu inner',
            'fallback_cb' => false
        ));

    }
    ?>
</nav><!-- #mobile-menu -->