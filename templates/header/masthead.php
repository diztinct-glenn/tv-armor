<?php

?>

<header id="header" class="site-header" role="banner">

    <div class="inner clearfix">

        <div class="wrap">

            <?php get_template_part('templates/header/site-branding'); ?>

            <div class="header-elements alignright">

                <?php

                get_sidebar('header');

                get_template_part('menu', 'primary'); // Loads the menu-primary.php template.

                if (has_nav_menu('side')) :

                    get_template_part('templates/sidenav');

                endif;

                do_action('mo_header');

                ?>

            </div>

        </div>

    </div>

</header><!-- #header -->

<div id="header-spacer"></div>