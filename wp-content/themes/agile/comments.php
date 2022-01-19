<?php
/**
 * Comments Template
 *
 * Lists comments and calls the comment form.  Individual comments have their own templates.  The
 * hierarchy for these templates is $comment_type.php, comment.php.
 *
 * @package Agile
 * @subpackage Template
 */

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/* If a post password is required or no comments are given and comments/pings are closed, return. */
if (post_password_required() || (!have_comments() && !comments_open() && !pings_open()))
    return;
?>

    <div id="comments-template">

        <div class="comments-wrap">

            <?php if (have_comments()) : ?>

                <div id="comments">

                    <h3 id="comments-number" class="comments-header">

                        <?php comments_number(esc_html__('No&nbsp;Comments', 'agile'), '<span class="number">1</span>&nbsp;' . esc_html__('Comment', 'agile'), '<span class="number">%</span>&nbsp;' . esc_html__('Comments', 'agile')); ?>

                    </h3>

                    <ol class="comment-list">

                        <?php wp_list_comments(array(
                            'style' => 'ol',
                            'avatar_size' => 90,
                            'callback' => 'mo_comments_callback',
                        )); ?>

                    </ol><!-- .comment-list -->

                    <?php if (get_option('page_comments')) : ?>

                        <div class="comment-navigation comment-pagination">

                            <?php paginate_comments_links(); ?>

                        </div><!-- .comment-navigation -->

                    <?php endif; ?>

                </div><!-- #comments -->

            <?php else : ?>

                <?php if (pings_open() && !comments_open()) : ?>

                    <p class="comments-closed pings-open">

                        <?php echo esc_html__('Comments are closed, but trackbacks and pingbacks are open.', 'agile'); ?>

                    </p><!-- .comments-closed .pings-open -->

                <?php elseif (!comments_open()) : ?>

                    <p class="comments-closed">

                        <?php esc_html_e('Comments are closed.', 'agile'); ?>

                    </p><!-- .comments-closed -->

                <?php endif; ?>

            <?php endif; ?>

            <?php comment_form(array(
                'title_reply' => esc_html__('Leave a Comment', 'agile'),
                'title_reply_to' => esc_html__('Leave a Comment to %s', 'agile'),
                'cancel_reply_link' => esc_html__('Cancel comment', 'agile')
            )); // Loads the comment form.  ?>

        </div><!-- .comments-wrap -->

    </div><!-- #comments-template -->

<?php
