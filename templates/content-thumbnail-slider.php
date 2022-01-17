<?php

$slides = get_post_meta(get_the_ID(), 'post_slider', true);

if (!empty($slides)) {

    $output = '[responsive_slider slideshow_speed=3000 control_nav="false" direction_nav="true" type="thumbnail" pause_on_hover="true"]';

    $output .= '<ul>';

    foreach ($slides as $slide) {

        $output .= '<li>';

        $output .= '<img alt="' . esc_attr($slide['title']) . '" class="thumbnail-slide" src="' . esc_url($slide['slider_image']) . '" />';

        $output . '</li>';

    }
    $output .= '</ul>';

    $output .= '[/responsive_slider]';

    echo do_shortcode($output);
}

?>