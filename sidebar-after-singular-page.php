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

<?php if (is_active_sidebar('after-singular-page')) : ?>

    <div id="sidebar-after-singular-page" class="sidebar">

        <?php dynamic_sidebar('after-singular-page'); ?>

    </div><!-- end sidebar-after-singular -->

<?php endif; ?>