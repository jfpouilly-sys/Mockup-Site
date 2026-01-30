<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * RGAA 4.1.2 compliant with proper landmarks and focus management.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="page-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>

                <header class="entry-header">
                    <h1 id="page-title" class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                <figure class="entry-thumbnail">
                    <?php
                    the_post_thumbnail('large', array(
                        'alt' => get_the_title(),
                        'class' => 'featured-image',
                    ));
                    ?>
                </figure>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<nav class="page-links" aria-label="' . esc_attr__('Page navigation', 'azit-industrial') . '"><span class="page-links-title">' . __('Pages:', 'azit-industrial') . '</span>',
                        'after'  => '</nav>',
                        'link_before' => '<span class="page-link">',
                        'link_after'  => '</span>',
                    ));
                    ?>
                </div>

                <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            /* translators: %s: Name of current post */
                            __('Edit %s', 'azit-industrial'),
                            '<span class="sr-only">' . get_the_title() . '</span>'
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer>
                <?php endif; ?>

            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>

    </div>

</main>

<?php
get_footer();
