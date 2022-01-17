<?php
/**
 * Template Name: Sitemap
 *
 * A custom page template for displaying sitemap
 *
 * @package Agile
 * @subpackage Template
 */


get_header();

?>
    <div id="content" class="content-area">

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="entry-content clearfix">

                    <?php the_content(); ?>

                    <div class="fourcol">

                        <h2 id="posts"><?php echo esc_html__('Posts by Category', 'agile'); ?></h2>

                        <ul class="list1">

                            <?php
                            // Add categories you'd like to exclude in the exclude here
                            $categories = get_categories('exclude=');

                            foreach ($categories as $cat) : ?>

                                <li>

                                    <a href="<?php echo get_category_link($cat->cat_ID); ?>"
                                       class="category-link">

                                        <?php echo esc_html($cat->cat_name); ?>
                                        <small>(<?php echo esc_html($cat->count); ?>)</small>

                                    </a>

                                    <ul class="list1">

                                        <?php

                                        $loop = new WP_Query(array('posts_per_page' => -1, 'cat' => $cat->cat_ID));

                                        while ($loop->have_posts()) :

                                            $loop->the_post();

                                            $category = get_the_category();

                                            // Only display a post link once, even if it's in multiple categories
                                            if ($category[0]->cat_ID == $cat->cat_ID) : ?>

                                                <li>

                                                    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>

                                                </li>

                                            <?php endif; ?>

                                        <?php endwhile; ?>

                                    </ul>

                                </li>

                                <?php wp_reset_postdata(); ?>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                    <div class="fourcol">

                        <h2 id="pages"><?php echo esc_html__('Pages', 'agile'); ?></h2>

                        <ul class="list1">

                            <?php wp_list_pages(array('exclude' => '', 'title_li' => '')); // Add pages you'd like to exclude in the exclude here ?>

                        </ul>


                    </div>

                    <div class="fourcol last">

                        <h2 id="authors"> <?php echo esc_html__('Authors', 'agile'); ?></h2>

                        <ul class="list1">

                            <?php wp_list_authors(array('exclude_admin' => false)); ?>

                        </ul>

                        <h2 id="portfolio"><?php echo esc_html__('Our Portfolio', 'agile'); ?></h2>


                        <ul class="list1">

                            <?php

                            $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => - 1));

                            while ($loop->have_posts()) : $loop->the_post();

                                ?>

                                <li>

                                    <a href="<?php echo get_permalink(); ?>">

                                        <?php echo get_the_title(); ?>

                                    </a>

                                </li>

                            <?php endwhile; ?>

                            <?php wp_reset_postdata(); ?>

                        </ul>

                    </div>

                </div>
                <!-- .entry-content -->

            </article><!-- .hentry -->

        <?php endwhile; ?>

    </div><!-- #content -->

<?php

get_footer(); // Loads the footer.php template.

