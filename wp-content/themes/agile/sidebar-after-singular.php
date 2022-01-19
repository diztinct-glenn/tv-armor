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

<?php if (is_active_sidebar('after-singular-post')) : ?>

    <div id="sidebar-after-singular" class="sidebar">

        <?php dynamic_sidebar('after-singular-post'); ?>

    </div><!-- end sidebar-after-singular -->

<?php endif; ?>