<?php

?>

<?php if (has_tag()) : ?>

    <div class="entry-meta">

        <div class="taglist">

            <i class="icon-tags"></i>

            <span class="post_tag">

                <?php echo get_the_term_list(get_the_ID(), 'post_tag', __('Tags: ', 'agile'), ', ', ''); ?>

            </span>

        </div>

    </div>

<?php endif; ?>