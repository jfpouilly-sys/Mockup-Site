<?php
/**
 * Template part for displaying page content
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
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>

    <?php azit_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(array(
            'before'      => '<nav class="page-links" aria-label="' . esc_attr__('Page navigation', 'azit-industrial') . '">',
            'after'       => '</nav>',
            'link_before' => '<span class="page-link">',
            'link_after'  => '</span>',
        ));
        ?>
    </div>

</article>
