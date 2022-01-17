<?php

$display_title = (bool)mo_get_theme_option('mo_show_title_in_portfolio');

$display_text = (bool)mo_get_theme_option('mo_show_details_in_portfolio');

if ($display_text || $display_title) : ?>

    <div class="entry-text-wrap">

        <?php if ($display_title) : ?>

            <?php get_template_part('templates/archive/content-entry-title'); ?>

        <?php endif; ?>

        <?php if ($display_text) : ?>

            <div class="entry-summary">

                <?php echo get_the_excerpt(); ?>

            </div>

        <?php endif; ?>

    </div> <!-- .entry-text-wrap -->

<?php endif; ?>