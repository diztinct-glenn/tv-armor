<?php

$slider_shortcode = get_post_meta(get_the_ID(), 'mo_slider_shortcode', true);
// backward compatibility for revolution slider chosen
$slider_choice = get_post_meta(get_the_ID(), 'mo_slider_choice', true);
$rev_slider = get_post_meta(get_the_ID(), 'mo_revolution_slider_choice', true);

$remove_title_header = get_post_meta(get_the_ID(), 'mo_remove_title_header', true);
$custom_heading = get_post_meta(get_the_ID(), 'mo_custom_heading_content', true);

if (!empty($slider_shortcode) || ($slider_choice === 'Revolution' && !empty($rev_slider) && $rev_slider !== 'none')) {

    get_template_part('templates/header/slider-header');
}
elseif (!empty($remove_title_header)) {

}
elseif (!empty($custom_heading) && is_singular(array('post', 'page', 'portfolio'))) {

    get_template_part('templates/header/custom-title-header');
}
elseif (is_home() && is_front_page()) {
    // Neither posts page not a static front page has been set explicitly and we are displaying auto-generated home page of wordpress
    // See - https://developer.wordpress.org/reference/functions/is_home/ and https://codex.wordpress.org/Option_Reference
}
else {
    ?>

    <?php if( !is_front_page() ) { ?>
    <header id="title-area" class="clearfix">

        <div class="inner">

            <?php

            if ($done = apply_filters('mo_show_page_title', null)) :
                // do nothing since others would have already shown the tagline
            elseif (is_attachment()) :

                echo '<h2>' . esc_html__('Media', 'agile') . '</h2>';

            elseif (is_404()) :
                echo '<h1>' . esc_html__('404 Not Found', 'agile') . '<h1>';


            elseif (is_singular('post')) :

                /* Default tagline for blog */
                $tagline = mo_get_theme_option('mo_blog_tagline', __('Blog', 'agile'));

                echo '<h2 class="tagline">' . $tagline . '</h2>';

            elseif (is_archive() || is_search()) :

                get_template_part('templates/header/title-loop');

            else :

                the_title('<h1 class="' . get_post_type() . '-title entry-title">', '</h1>');

            endif;

            ?>

            <?php get_template_part('templates/header/description'); ?>

        </div>

    </header> <!-- title-area -->
    <?php } ?>

    <?php

} ?>
