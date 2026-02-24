<?php
/**
 * The Comments Template
 *
 * Displays comments and comment form with accessible markup.
 * RGAA 4.1.2 compliant - proper form labels and structure.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<section id="comments" class="comments-area" aria-labelledby="comments-title">

    <?php if (have_comments()) : ?>

        <h2 id="comments-title" class="comments-title">
            <?php
            $comment_count = get_comments_number();
            printf(
                /* translators: 1: number of comments, 2: post title */
                esc_html(_n(
                    '%1$s Comment on &ldquo;%2$s&rdquo;',
                    '%1$s Comments on &ldquo;%2$s&rdquo;',
                    $comment_count,
                    'azit-industrial'
                )),
                number_format_i18n($comment_count),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <ol class="comment-list" aria-label="<?php esc_attr_e('Comments', 'azit-industrial'); ?>">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'callback'    => 'azit_comment_callback',
                'avatar_size' => 60,
            ));
            ?>
        </ol>

        <?php
        // Comment pagination
        $comment_pagination = paginate_comments_links(array(
            'echo'      => false,
            'prev_text' => '<span class="sr-only">' . __('Previous comments', 'azit-industrial') . '</span><span aria-hidden="true">&laquo;</span>',
            'next_text' => '<span class="sr-only">' . __('Next comments', 'azit-industrial') . '</span><span aria-hidden="true">&raquo;</span>',
        ));

        if ($comment_pagination) :
        ?>
        <nav class="comment-navigation" aria-label="<?php esc_attr_e('Comment pagination', 'azit-industrial'); ?>">
            <h3 class="sr-only"><?php esc_html_e('Comment navigation', 'azit-industrial'); ?></h3>
            <div class="nav-links">
                <?php echo $comment_pagination; ?>
            </div>
        </nav>
        <?php endif; ?>

        <?php if (!comments_open()) : ?>
        <p class="no-comments">
            <?php esc_html_e('Comments are closed.', 'azit-industrial'); ?>
        </p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    // Comment Form
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $required_attr = ($req ? ' required aria-required="true"' : '');
    $required_indicator = ($req ? ' <span class="required" aria-hidden="true">*</span>' : '');

    $comment_form_args = array(
        'title_reply'          => __('Leave a Comment', 'azit-industrial'),
        'title_reply_to'       => __('Reply to %s', 'azit-industrial'),
        'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after'    => '</h3>',
        'cancel_reply_before'  => ' <small>',
        'cancel_reply_after'   => '</small>',
        'cancel_reply_link'    => __('Cancel reply', 'azit-industrial'),
        'label_submit'         => __('Post Comment', 'azit-industrial'),
        'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="%3$s btn btn-primary">%4$s</button>',
        'submit_field'         => '<div class="form-submit">%1$s %2$s</div>',
        'comment_notes_before' => '<p class="comment-notes">' .
            sprintf(
                /* translators: %s: privacy policy link */
                __('Your email address will not be published. %s', 'azit-industrial'),
                ($req ? '<span class="required-field-message">' . __('Required fields are marked', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></span>' : '')
            ) . '</p>',
        'comment_notes_after'  => '',
        'class_container'      => 'comment-respond',
        'class_form'           => 'comment-form',
        'format'               => 'html5',
        'fields'               => array(
            'author' => sprintf(
                '<div class="comment-form-author form-field">' .
                '<label for="author">%s%s</label>' .
                '<input id="author" name="author" type="text" value="%s" maxlength="245" autocomplete="name"%s />' .
                '</div>',
                __('Name', 'azit-industrial'),
                $required_indicator,
                esc_attr($commenter['comment_author']),
                $required_attr
            ),
            'email' => sprintf(
                '<div class="comment-form-email form-field">' .
                '<label for="email">%s%s</label>' .
                '<input id="email" name="email" type="email" value="%s" maxlength="100" autocomplete="email" aria-describedby="email-notes"%s />' .
                '<p id="email-notes" class="field-description">%s</p>' .
                '</div>',
                __('Email', 'azit-industrial'),
                $required_indicator,
                esc_attr($commenter['comment_author_email']),
                $required_attr,
                __('Your email address will not be published.', 'azit-industrial')
            ),
            'url' => sprintf(
                '<div class="comment-form-url form-field">' .
                '<label for="url">%s</label>' .
                '<input id="url" name="url" type="url" value="%s" maxlength="200" autocomplete="url" />' .
                '</div>',
                __('Website', 'azit-industrial'),
                esc_attr($commenter['comment_author_url'])
            ),
            'cookies' => sprintf(
                '<div class="comment-form-cookies-consent form-field form-field-checkbox">' .
                '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />' .
                '<label for="wp-comment-cookies-consent">%s</label>' .
                '</div>',
                (empty($commenter['comment_author_email']) ? '' : ' checked="checked"'),
                __('Save my name, email, and website in this browser for the next time I comment.', 'azit-industrial')
            ),
        ),
        'comment_field' => sprintf(
            '<div class="comment-form-comment form-field">' .
            '<label for="comment">%s%s</label>' .
            '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required aria-required="true"></textarea>' .
            '</div>',
            __('Comment', 'azit-industrial'),
            ' <span class="required" aria-hidden="true">*</span>'
        ),
    );

    comment_form($comment_form_args);
    ?>

</section>

<?php
/**
 * Custom comment callback for accessible comment display
 */
if (!function_exists('azit_comment_callback')) :
    function azit_comment_callback($comment, $args, $depth) {
        $tag = ('div' === $args['style']) ? 'div' : 'li';
        $commenter = wp_get_current_commenter();
        $show_pending = (!empty($commenter['comment_author']) && $commenter['comment_author'] === $comment->comment_author);
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($comment->has_children ? 'parent' : '', $comment); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <header class="comment-meta">
                    <div class="comment-author vcard">
                        <?php
                        if (0 != $args['avatar_size']) {
                            echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'avatar'));
                        }
                        ?>
                        <span class="fn">
                            <?php
                            $author_url = get_comment_author_url($comment);
                            if ($author_url) {
                                echo '<a href="' . esc_url($author_url) . '" rel="external nofollow ugc">' . get_comment_author($comment) . '</a>';
                            } else {
                                echo get_comment_author($comment);
                            }
                            ?>
                        </span>
                    </div>

                    <div class="comment-metadata">
                        <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                            <time datetime="<?php comment_time('c'); ?>">
                                <?php
                                printf(
                                    /* translators: 1: date, 2: time */
                                    esc_html__('%1$s at %2$s', 'azit-industrial'),
                                    get_comment_date('', $comment),
                                    get_comment_time()
                                );
                                ?>
                            </time>
                        </a>
                        <?php edit_comment_link(__('Edit', 'azit-industrial'), ' <span class="edit-link">', '</span>'); ?>
                    </div>

                    <?php if ('0' == $comment->comment_approved) : ?>
                    <p class="comment-awaiting-moderation" role="alert">
                        <?php esc_html_e('Your comment is awaiting moderation.', 'azit-industrial'); ?>
                    </p>
                    <?php endif; ?>
                </header>

                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>

                <?php if ('1' == $comment->comment_approved || $show_pending) : ?>
                <footer class="comment-reply">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<span class="reply">',
                        'after'     => '</span>',
                    )));
                    ?>
                </footer>
                <?php endif; ?>
            </article>
        <?php
    }
endif;
