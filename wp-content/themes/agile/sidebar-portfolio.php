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

<?php if (is_active_sidebar('primary-portfolio')) : ?>

    <div id="sidebar-primary" class="sidebar">

        <?php dynamic_sidebar('primary-portfolio'); ?>

    </div><!-- end sidebar-primary -->

<?php endif; ?>