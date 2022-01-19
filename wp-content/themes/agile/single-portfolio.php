<?php

/**
 * Post Template
 *
 * This template is loaded when browsing a Wordpress post.
 *
 * @package Agile
 * @subpackage Template
 */

get_header(); ?>

    <div id="content">

        <?php get_template_part('templates/breadcrumbs'); ?>

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="entry-content ninecol">

                        <?php get_template_part('templates/singular/content-featured-image'); ?>

                        <?php the_content(); /* No thumbnail support for this. Everything user has to input - videos, audio, slider etc. */ ?>

                        <?php wp_link_pages(array(
                            'before' => '<p class="page-links">' . esc_html__('Pages:', 'agile'),
                            'after' => '</p>'
                        )); ?>

                    </div><!-- .entry-content -->

                    <aside class="portfolio-sidebar threecol last">

                        <?php

                        echo '<div class="portfolio-info" ><h2>' . __('Project Details: ', 'agile') . '</h2></div > ';

                        $project_author = get_post_meta($post->ID, '_portfolio_author_field', true);
                        if (!empty($project_author)) {
                            echo '<p>' . wp_specialchars_decode($project_author) . '</p>';
                            echo '<div class="portfolio-label" >' . __('Credit ', 'agile') . ' </div > ';
                        }

                        $project_client = get_post_meta($post->ID, '_portfolio_client_field', true);
                        if (!empty($project_client)) {
                            echo '<p>' . wp_specialchars_decode($project_client) . '</p>';
                            echo '<div class="portfolio-label" >' . __('Client ', 'agile') . ' </div > ';
                        }

                        $project_date = get_post_meta($post->ID, '_portfolio_date_field', true);
                        if (!empty($project_date)) {
                            echo '<p>' . wp_specialchars_decode($project_date) . '</p>';
                            echo '<div class="portfolio-label" >' . __('Date ', 'agile') . ' </div > ';
                        }

                        echo '<p>' . mo_entry_terms_text('portfolio_category') . '</p>';
                        echo '<div class="portfolio-label" >' . __('Category ', 'agile') . ' </div > ';

                        echo '<div class="clear" ></div>';

                        $project_info = get_post_meta($post->ID, '_portfolio_info_field', true);
                        if (!empty($project_info)) {
                            echo '<div class="portfolio-description">' . wp_specialchars_decode($project_info);
                            echo '<div class="portfolio-label" >' . __('Description ', 'agile') . ' </div>';
                            echo '</div>';
                        }

                        $project_url = get_post_meta($post->ID, '_portfolio_link_field', true);
                        if (!empty($project_url)) {
                            echo '<div class="portfolio-link" ><a href = "' . $project_url . '" class="button default">' . __('Visit Website', 'agile') . '</a></div > ';
                        }

                        ?>

                        <?php  get_template_part('loop-nav'); // Loads the loop-nav.php template.   ?>

                    </aside>

                </article><!-- .hentry -->

                <?php

                if (mo_get_theme_option('mo_enable_portfolio_comments'))
                    comments_template('/comments.php', true); // Loads the comments.php template.
                ?>

            <?php endwhile; ?>

        <?php endif; ?>

        <?php get_template_part('templates/singular/related-posts/portfolio'); ?>

        <nav class="portfolio-nav">

            <?php get_template_part('templates/singular/post-nav'); ?>

        </nav>

    </div><!-- #content -->

<?php get_footer(); ?>