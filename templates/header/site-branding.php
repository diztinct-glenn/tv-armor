<?php

$blog_name = esc_attr(get_bloginfo('name'));

$use_text_logo = mo_get_theme_option('mo_use_text_logo') ? true : false;

$logo_url = mo_get_theme_option('mo_site_logo');

$heading_tag = (is_home() || is_front_page()) ? 'h1' : 'div';

?>

<div class="site-branding <?php echo esc_attr(($use_text_logo || empty ($logo_url)) ? 'logo-text' : 'logo-image'); ?>">

    <<?php echo esc_attr($heading_tag); ?> class="site-title" id="site-logo">

        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_html($blog_name); ?>" rel="home">

            <?php if ($use_text_logo || empty ($logo_url)): ?>

                <span><?php echo esc_html($blog_name); ?></span>

            <?php else: ?>

                <img class="standard-logo" src="<?php echo esc_url($logo_url); ?>"
                     title="<?php echo esc_html($blog_name); ?>"/>

            <?php endif; ?>

        </a>

    </<?php echo esc_attr($heading_tag); ?>>

    <div id="site-description" style="display: none;">

        <?php echo bloginfo('description'); ?>

    </div>

</div>