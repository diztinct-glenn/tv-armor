<?php

$custom_heading = get_post_meta(get_the_ID(), 'mo_custom_heading_content', true);

?>

    <header id="custom-title-area">

        <?php $wide_heading_layout = get_post_meta(get_queried_object_id(), 'mo_wide_heading_layout', true); ?>

        <div class="<?php echo (empty($wide_heading_layout)) ? 'inner' : 'wide'; ?>">

            <?php echo do_shortcode($custom_heading); ?>

        </div>

    </header><!-- custom-title-area -->