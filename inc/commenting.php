<?php
/**
 * Comment Template
 *
 */


if (!function_exists('mo_comments_callback')) {

    function mo_comments_callback($comment, $args, $depth) {

        ?>

    <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>

        <div class="comment-wrap clearfix">

            <?php if (($comment->comment_type !== 'pingback') && ($comment->comment_type !== 'trackback') && get_option('show_avatars')) : ?>

                <?php
                $author = get_comment_author($comment->comment_ID);
                $url = get_comment_author_url($comment->comment_ID);

                $avatar = get_avatar($comment, $args['avatar_size']);

                ?>

                <div class="avatar-wrap">

                    <?php if (!empty($url) && !empty($avatar)) : ?>

                        <a href="<?php echo esc_url($url); ?>"
                           title="<?php echo esc_attr($author); ?>"
                           rel="external nofollow">

                            <?php echo wp_kses_post($avatar); ?>

                        </a>

                    <?php else: ?>

                        <?php echo wp_kses_post($avatar); ?>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

            <div class="comment-arrow"></div>

            <div class="comment-box-wrap">

                <div class="comment-meta-section">

                    <div class="comment-meta">

                            <span class="comment-author vcard">

                                <?php $author = get_comment_author($comment->comment_ID); ?>
                                <?php $author_url = get_comment_author_url($comment->comment_ID); ?>

                                <?php if ($author_url): ?>

                                    <cite class="fn" title="<?php echo esc_attr($author); ?>">

                                        <a
                                                href="<?php echo esc_url($author_url); ?>"
                                                title="<?php echo esc_attr($author); ?>"
                                                class="url"
                                                rel="external nofollow">

                                            <?php echo esc_html($author); ?>

                                        </a>

                                    </cite>

                                <?php else : ?>

                                    <cite class="fn">

                                    <?php echo esc_html($author); ?>

                                    </cite>

                                <?php endif; ?>


                            </span><!-- .comment-author .vcard -->

                        <div class="comment-byline">

                            <span class="published">

                                <?php echo sprintf(esc_html__('%1$s at %2$s', 'agile'), '<abbr class="comment-date" title="' . get_comment_date(esc_html__('l, F jS, Y, g:i a', 'agile')) . '">' . get_comment_date() . '</abbr>', '<abbr class="comment-time" title="' . get_comment_date(esc_html__('l, F jS, Y, g:i a', 'agile')) . '">' . get_comment_time() . '</abbr>'); ?>

                            </span>

                            <?php

                            $edit_link = get_edit_comment_link($comment->comment_ID);

                            if ($edit_link) : ?>

                                <a
                                        class="comment-edit-link"
                                        href="<?php echo esc_url($edit_link); ?>"
                                        title="<?php echo sprintf(esc_html__('Edit %1$s', 'agile'), $comment->comment_type); ?>">

                                    <span class="edit">

                                        <?php echo esc_html__('Edit', 'agile'); ?>

                                    </span>

                                </a>


                            <?php endif; ?>

                            <?php echo get_comment_reply_link(array('depth' => $depth, 'max_depth' => get_option('thread_comments_depth'),)); ?>

                        </div>

                    </div>

                </div>

                <div class="comment-text-wrap">

                    <div class="entry-content comment-text">

                        <?php if ($comment->comment_approved == '0') : ?>

                            <p class="alert moderation">

                                <?php echo esc_html__('Your comment is awaiting moderation.', 'agile'); ?>

                            </p>

                        <?php endif; ?>

                        <?php comment_text($comment->comment_ID); ?>

                    </div>

                </div>

            </div><!-- comment-box-wrap -->

        </div><!-- .comment-wrap -->

        <?php /* No closing </li> is needed.  WordPress will know where to add it. */

    }
}