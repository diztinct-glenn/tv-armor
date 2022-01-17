<?php

$comments_link = '';

$num_of_comments = intval(get_comments_number());
?>

<span class="comments-link">
    
    <?php

    if (0 == $num_of_comments && !comments_open() && !pings_open()) {
        echo sprintf(esc_html__('Comments Disabled', 'agile'), number_format_i18n($num_of_comments));
    }
    elseif (0 == $num_of_comments)
        echo '<a href="' . get_permalink() . '#respond" title="' . sprintf(esc_html__('Comment on %1$s', 'agile'), the_title_attribute('echo=0')) . '">' . sprintf(esc_html__('No Comments', 'agile'), number_format_i18n($num_of_comments)) . '</a>';
    elseif (1 == $num_of_comments)
        echo '<a href="' . get_comments_link() . '" title="' . sprintf(esc_html__('Comment on %1$s', 'agile'), the_title_attribute('echo=0')) . '">' . sprintf(esc_html__('%1$s Comment', 'agile'), number_format_i18n($num_of_comments)) . '</a>';
    elseif (1 < $num_of_comments)
        echo '<a href="' . get_comments_link() . '" title="' . sprintf(esc_html__('Comment on %1$s', 'agile'), the_title_attribute('echo=0')) . '">' . sprintf(esc_html__('%1$s Comments', 'agile'), number_format_i18n($num_of_comments)) . '</a>';

    ?>
</span>
