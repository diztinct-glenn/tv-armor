<?php

?>

<?php if (has_category()) : ?>

    <span class="category">

        <?php echo get_the_term_list(get_the_ID(), 'category', '', ', ', ''); ?>

    </span>

<?php endif; ?>

