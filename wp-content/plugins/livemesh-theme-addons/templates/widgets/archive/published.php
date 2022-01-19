<?php

$format = "F d, Y";

?>

<span class="published">

    <a href="<?php echo get_day_link(get_the_time(esc_html__('Y', 'livemesh-theme-addons')), get_the_time(esc_html__('m', 'livemesh-theme-addons')), get_the_time(esc_html__('d', 'livemesh-theme-addons'))); ?>"
       title="<?php echo sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'livemesh-theme-addons'))); ?>">

        <span class="updated">
            <?php echo get_the_time($format); ?>
        </span>

    </a>

</span>
