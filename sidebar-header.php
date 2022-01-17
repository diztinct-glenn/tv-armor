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

<?php if (is_active_sidebar('header')) : ?>

    <div id="sidebar-header" class="sidebar">

        <?php dynamic_sidebar('header'); ?>

    </div><!-- end sidebar-primary -->

<?php endif; ?>