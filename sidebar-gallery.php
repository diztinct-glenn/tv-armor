<?php
/**
 * Sidebar template
 *
 * Display sidebars for the posts/pages
 *
 * @package Agile
 * @subpackage Template
 */

?>

<?php if (is_active_sidebar('primary-gallery')) : ?>

    <div id="sidebar-primary" class="sidebar">

        <?php dynamic_sidebar('primary-gallery'); ?>

    </div><!-- end sidebar-primary -->

<?php endif; ?>