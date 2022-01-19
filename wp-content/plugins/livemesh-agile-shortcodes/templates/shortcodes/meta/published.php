<?php

$format = "F d, Y";

?>

<span class="published">

    <?php echo esc_html__('On: ', 'livemesh-agile-shortcodes'); ?>

    <a href="<?php echo get_day_link(get_the_time(esc_html__('Y', 'livemesh-agile-shortcodes')), get_the_time(esc_html__('m', 'livemesh-agile-shortcodes')), get_the_time(esc_html__('d', 'livemesh-agile-shortcodes'))); ?>"
       title="<?php echo sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'livemesh-agile-shortcodes'))); ?>">

        <span class="updated">
            <?php echo get_the_time($format); ?>
        </span>

    </a>

</span>

