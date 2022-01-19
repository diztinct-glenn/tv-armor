<?php

$description = get_post_meta(get_queried_object_id(), 'mo_description', true); ?>

<?php if (!empty ($description)): ; ?>

    <div class="post-description">

        <p><?php echo esc_html($description); ?></p>

    </div>

<?php endif; ?>