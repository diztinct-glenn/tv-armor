<?php

$format = "F d, Y";

?>

<span class="published">

    <?php echo esc_html__('On: ', 'agile'); ?>

    <a href="<?php echo get_day_link(get_the_time(esc_html__('Y', 'agile')), get_the_time(esc_html__('m', 'agile')), get_the_time(esc_html__('d', 'agile'))); ?>"
       title="<?php echo sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'agile'))); ?>">

        <span class="updated">
            <?php echo get_the_time($format); ?>
        </span>

    </a>

</span>

