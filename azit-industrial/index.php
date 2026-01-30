<?php
/**
 * Main Template File
 *
 * This is the most generic template file in a WordPress theme.
 * It is used to display a page when nothing more specific matches.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main-content" role="main" tabindex="-1">

    <?php
    // Breadcrumb navigation
    echo azit_breadcrumb();
    ?>

    <?php if (have_posts()) : ?>

        <?php if (is_home() && !is_front_page()) : ?>
            <header class="page-header">
                <div class="container">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </div>
            </header>
        <?php endif; ?>

        <div class="content-area">
            <div class="container">

                <?php if (is_archive()) : ?>
                    <header class="archive-header">
                        <?php
                        the_archive_title('<h1 class="archive-title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header>
                <?php endif; ?>

                <div class="posts-grid">
                    <?php
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_type());

                    endwhile;
                    ?>
                </div>

                <?php
                // Accessible pagination
                the_posts_pagination(array(
                    'mid_size'           => 2,
                    'prev_text'          => sprintf(
                        '<span class="sr-only">%s</span><span aria-hidden="true">&larr;</span> %s',
                        __('Previous page', 'azit-industrial'),
                        __('Previous', 'azit-industrial')
                    ),
                    'next_text'          => sprintf(
                        '%s <span aria-hidden="true">&rarr;</span><span class="sr-only">%s</span>',
                        __('Next', 'azit-industrial'),
                        __('Next page', 'azit-industrial')
                    ),
                    'before_page_number' => '<span class="sr-only">' . __('Page', 'azit-industrial') . ' </span>',
                    'aria_label'         => __('Posts navigation', 'azit-industrial'),
                ));
                ?>

            </div>
        </div>

    <?php else : ?>

        <div class="no-results">
            <div class="container">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Nothing Found', 'azit-industrial'); ?></h1>
                </header>

                <div class="page-content">
                    <?php if (is_search()) : ?>
                        <p><?php esc_html_e('Sorry, no results were found for your search. Please try again with different keywords.', 'azit-industrial'); ?></p>
                        <?php get_search_form(); ?>
                    <?php else : ?>
                        <p><?php esc_html_e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'azit-industrial'); ?></p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endif; ?>

</main>

<?php
get_footer();
