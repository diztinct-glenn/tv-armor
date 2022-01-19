<?php
/**
 * A slider header for a page or a post
 *
 * A reusable page template part for displaying a slider header
 *
 * @package Agile
 * @subpackage Template
 */
?>

<?php $slider_shortcode = get_post_meta(get_the_ID(), 'mo_slider_shortcode', true); ?>

<?php
// Backward compatibility with previous versions of the theme
$slider_choice = get_post_meta(get_the_ID(), 'mo_slider_choice', true);
$rev_slider = get_post_meta(get_the_ID(), 'mo_revolution_slider_choice', true);
?>

<?php if (!empty($slider_shortcode)): ?>

    <div id="slider-area">

        <?php echo do_shortcode($slider_shortcode); ?>

    </div><!-- #slider-area -->

<?php elseif ($slider_choice === 'Revolution' && !empty($rev_slider) && $rev_slider !== 'none') : // backward compatibility with earlier versions of theme ?>

    <div id="slider-area">

        <?php $shortcode = '[rev_slider ' . $rev_slider . ']'; ?>

        <?php echo do_shortcode($shortcode); ?>

    </div><!-- #slider-area -->

<?php endif; ?>

