<?php
/**
 * Template part for displaying posts
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            azit_entry_meta();
        endif;
        ?>
    </header>

    <?php azit_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();

            wp_link_pages(array(
                'before'      => '<nav class="page-links" aria-label="' . esc_attr__('Page navigation', 'azit-industrial') . '">',
                'after'       => '</nav>',
                'link_before' => '<span class="page-link">',
                'link_after'  => '</span>',
            ));
        else :
            echo '<p>' . esc_html(azit_excerpt(30)) . '</p>';
            echo azit_read_more_link(__('Read More', 'azit-industrial'));
        endif;
        ?>
    </div>

    <?php if (is_singular()) : ?>
    <footer class="entry-footer">
        <?php
        // Tags
        $tags_list = get_the_tag_list('', ', ');
        if ($tags_list) {
            printf(
                '<span class="tags-links"><span class="sr-only">%1$s</span>%2$s</span>',
                esc_html__('Tags:', 'azit-industrial'),
                $tags_list
            );
        }
        ?>
    </footer>
    <?php endif; ?>

</article>
