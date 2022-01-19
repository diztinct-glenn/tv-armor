<?php

$num_of_comments = intval(get_comments_number());
?>

<span class="comments-number">

    <?php

    if (0 == $num_of_comments && !comments_open() && !pings_open()) {
        echo sprintf(esc_html__('Comments Disabled', 'livemesh-theme-addons'), number_format_i18n($num_of_comments));
    }
    elseif (0 == $num_of_comments)
        echo sprintf(esc_html__('No Comments', 'livemesh-theme-addons'), number_format_i18n($num_of_comments));
    elseif (1 == $num_of_comments)
        echo sprintf(esc_html__('%1$s Comment', 'livemesh-theme-addons'), number_format_i18n($num_of_comments));
    elseif (1 < $num_of_comments)
        echo sprintf(esc_html__('%1$s Comments', 'livemesh-theme-addons'), number_format_i18n($num_of_comments));

    ?>
</span>