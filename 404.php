<?php
/**
 * 404 Template
 *
 * The 404 template is used when a reader visits an invalid URL on your site. By default, the template will 
 * display a generic message.
 *
 * @package Agile
 * @subpackage Template
 */
@header('HTTP/1.1 404 Not found', true, 404);

get_header();
?>

<div id="content" class="content-area">

    <div class="hfeed">

        <div id="post-0" <?php post_class(); ?>>

            <div class="entry-content clearfix">

                <p>
                    <?php echo esc_html__('The page you requested does not exist. <p>Try using the navigation menu or the search box to locate the page you were looking for.</p>', 'agile'); ?>
                </p>

                <?php get_search_form(); // Loads the searchform.php template. ?>

            </div><!-- .entry-content -->

        </div><!-- .hentry -->

    </div><!-- .hfeed -->

</div><!-- #content -->

<?php get_sidebar(); ?>

<?php
get_footer();  ?>