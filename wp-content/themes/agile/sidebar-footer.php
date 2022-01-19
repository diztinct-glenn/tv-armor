<?php
/**
 * Sidebar template
 *
 * Display sidebars for the posts/pages
 *
 * @package Agile
 * @subpackage Template
 */

$sidebar_columns = mo_get_theme_option('mo_footer_columns', 3);
if (is_numeric($sidebar_columns)):
    $style_class = mo_get_column_style($sidebar_columns);

    for ($i = 1; $i <= $sidebar_columns; $i++) {
        if ($i != $sidebar_columns) {
            mo_display_sidebar('footer' . $i, $style_class);
        }
        else {
            mo_display_sidebar('footer' . $i, $style_class . ' last');
        }
    }
else:
    switch ($sidebar_columns):
        case '1 + 2(3c)':
            ?>
            <?php mo_display_sidebar('footer1', 'fourcol'); ?>
            <div class="eightcol last">
                <?php mo_display_sidebar('footer2', 'fourcol'); ?>
                <?php mo_display_sidebar('footer3', 'fourcol'); ?>
                <?php mo_display_sidebar('footer4', 'fourcol last'); ?>
            </div>
            <?php
            break;
        case '2(3c) + 1':
            ?>
            <div class="eightcol">
                <?php mo_display_sidebar('footer1', 'fourcol'); ?>
                <?php mo_display_sidebar('footer2', 'fourcol'); ?>
                <?php mo_display_sidebar('footer3', 'fourcol last'); ?>
            </div>
            <?php mo_display_sidebar('footer4', 'fourcol last'); ?>
            <?php
            break;
        case '1 + 2(4c)':
            ?>
            <?php mo_display_sidebar('footer1', 'fourcol'); ?>
            <div class="eightcol last">
                <?php mo_display_sidebar('footer2', 'threecol'); ?>
                <?php mo_display_sidebar('footer3', 'threecol'); ?>
                <?php mo_display_sidebar('footer4', 'threecol'); ?>
                <?php mo_display_sidebar('footer5', 'threecol last'); ?>
            </div>
            <?php
            break;
        case
        '2(4c) + 1':
            ?>
            <div class="eightcol">
                <?php mo_display_sidebar('footer1', 'threecol'); ?>
                <?php mo_display_sidebar('footer2', 'threecol'); ?>
                <?php mo_display_sidebar('footer3', 'threecol'); ?>
                <?php mo_display_sidebar('footer4', 'threecol last'); ?>
            </div>
            <?php mo_display_sidebar('footer5', 'fourcol last'); ?>
            <?php
            break;
        case '1 + 1(2c)':
            ?>
            <?php mo_display_sidebar('footer1', 'sixcol'); ?>
            <div class="sixcol last">
                <?php mo_display_sidebar('footer2', 'sixcol'); ?>
                <?php mo_display_sidebar('footer3', 'sixcol last'); ?>
            </div>
            <?php
            break;
        case
        '1 + 1(3c)':
            ?>
            <?php mo_display_sidebar('footer1', 'sixcol'); ?>
            <div class="sixcol last">
                <?php mo_display_sidebar('footer2', 'fourcol'); ?>
                <?php mo_display_sidebar('footer3', 'fourcol'); ?>
                <?php mo_display_sidebar('footer4', 'fourcol last'); ?>
            </div>
            <?php
            break;
        case '1(2c) + 1':
            ?>
            <div class="sixcol">
                <?php mo_display_sidebar('footer1', 'sixcol'); ?>
                <?php mo_display_sidebar('footer2', 'sixcol last'); ?>
            </div>
            <?php mo_display_sidebar('footer3', 'sixcol last'); ?>
            <?php
            break;
        case '1(3c) + 1':
            ?>
            <div class="sixcol">
                <?php mo_display_sidebar('footer1', 'fourcol'); ?>
                <?php mo_display_sidebar('footer2', 'fourcol'); ?>
                <?php mo_display_sidebar('footer3', 'fourcol last'); ?>
            </div>
            <?php mo_display_sidebar('footer4', 'sixcol last'); ?>
            <?php
            break;
    endswitch;
endif;