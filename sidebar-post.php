<?php
/**
 * Sidebar template
 *
 * Display sidebars for the posts/pages
 *
 * @package Agile
 * @subpackage Template
 */

$my_sidebar_id = get_post_meta(get_queried_object_id(), 'mo_primary_sidebar_choice', true);

if (!empty($my_sidebar_id) && $my_sidebar_id !== 'default')
    $sidebar_id = $my_sidebar_id;
else
    $sidebar_id = 'primary-post';

?>

<?php if (is_active_sidebar($sidebar_id)) : ?>

    <div id="sidebar-primary" class="sidebar">

        <?php dynamic_sidebar($sidebar_id); ?>

    </div><!-- end sidebar-primary -->

<?php endif; ?>