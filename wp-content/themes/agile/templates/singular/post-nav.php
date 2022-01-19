<?php

?>

<?php if (is_attachment()) : ?>

    <div class="loop-nav">

        <?php previous_post_link('<div class="previous">' . esc_html__('Return to ', 'agile') . '%link</div>'); ?>

    </div><!-- .loop-nav -->


<?php elseif (is_singular('portfolio')) : ?>

    <div class="loop-nav">

        <?php previous_post_link('<div class="previous">' . '&larr; %link' . '</div>', '<span>' . esc_html__('Previous', 'agile') . '</span>'); ?>

        <?php
        $page_id = mo_get_theme_option('mo_default_portfolio_page');
        if (!empty($page_id))
            $page_link = get_permalink($page_id);
        else
            $page_link = mo_get_post_type_archive_url('portfolio');

        ?>

        <div class="post-index">

            <a title="<?php echo esc_html__('All Portfolio Items', 'agile'); ?>"
               href="<?php echo esc_url($page_link); ?>">

                <i class="icon-th"></i>

            </a>

        </div>

        <?php next_post_link('<div class="next">' . '%link &rarr;' . '</div>', '<span>' . esc_html__('Next', 'agile') . '</span>'); ?>

    </div><!-- .loop-nav -->

<?php elseif (is_singular('post')) : ?>

    <div class="loop-nav">

        <?php previous_post_link('<div class="previous">' . wp_kses_post(__('&larr; %link', 'agile')) . '</div>', '%title'); ?>

        <?php $page_link = mo_get_post_type_archive_url('post'); ?>

        <div class="post-index">

            <a title="<?php echo esc_html__('Blog Posts', 'agile'); ?>" href="<?php echo esc_url($page_link); ?>">

                <i class="icon-th"></i>

            </a>

        </div>

        <?php next_post_link('<div class="next">' . wp_kses_post(__('%link &rarr;', 'agile')) . '</div>', '%title'); ?>

    </div><!-- .loop-nav -->

<?php endif; ?>