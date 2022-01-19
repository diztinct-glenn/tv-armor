<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme, child themes, and plugins.
 *
 * @package Agile
 * @subpackage Template
 */
?>

</div><!-- #main .inner -->

</div><!-- #main -->

<footer id="footer" class="site-footer">

    <?php if (mo_is_footer_sidebar_active()): ?>

        <div id="footer-top">

            <div class="inner">

                <div id="sidebars-footer" class="sidebars clearfix">

                    <?php get_sidebar('footer'); ?>

                    <a id="go-to-top" href="#" title="<?php echo esc_html__('Back to top', 'agile'); ?>">

                        <i class="icon-arrow-up2"></i>
                    </a>

                </div><!-- #sidebars-footer -->

            </div>

        </div>

    <?php endif; ?>

    <div id="footer-bottom">

        <div class="inner">

          <img id="footer-logo" src="https://www.tv-armor.com/wp-content/uploads/2013/09/TV-Armor-logo-protect-your-tv-footer.png" title="TV Armor"/>

            <?php mo_get_template_part('menu', 'footer'); // Loads the menu-footer.php template.    ?>

            <div id="footer-bottom-text">

                <?php

                $footer_text = mo_get_theme_option('mo_footer_insert');

                if (!empty($footer_text)) :

                    $footer_text = do_shortcode($footer_text);

                else :

                    // Default footer text
                    $site_link = '<a class="site-link" href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home"><span>' . esc_html(get_bloginfo('name')) . '</span></a>';

                    $footer_text = esc_html__('Copyright &#169; ', 'agile') . date(esc_html__('Y', 'agile')) . ' ' . $site_link ;

                endif;

                echo apply_filters('mo_footer_text', $footer_text);

                ?>

            </div>

        </div>

    </div><!-- #footer-bottom -->

</footer><!-- #footer -->

</div><!-- #container -->

<?php wp_footer(); ?>

</body>
</html>
