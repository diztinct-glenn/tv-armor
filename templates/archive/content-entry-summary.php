<?php
?>

<div class="entry-text-wrap">

    <div class="entry-summary">

        <?php
        $show_content = mo_get_theme_option('mo_show_content_in_archives');

        if ($show_content) {

            global $more;

            /* Set to display content up to the more tag. If more tag is missing, entire content is displayed.
            Set to value 1 if you need entire content to be displayed all the time ignoring more tag */
            $more = 0;

            the_content('');
        }
        else {
            echo get_the_excerpt();
        }

        wp_link_pages(array(
            'before' => '<p class="page-links">' . esc_html__('Pages:', 'agile'),
            'after' => '</p>'
        ));

        ?>

    </div><!-- .entry-summary -->

</div>