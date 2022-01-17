<?php
/**
 * Sidebar template
 *
 * Display sidebars for the posts/pages
 *
 * @package Agile
 * @subpackage Template
 */


$sidebar_id = apply_filters('mo_sidebar_id', 'primary-post');

?>

<?php if (is_active_sidebar($sidebar_id)) : ?>

    <div id="sidebar-primary" class="sidebar">

        <?php dynamic_sidebar($sidebar_id); ?>

    </div><!-- end sidebar-primary -->

<?php endif; ?>