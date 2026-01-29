<?php
/**
 * The Search Results Template
 *
 * Displays search results with accessible markup.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="search-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <header class="search-header">
            <h1 id="search-title" class="search-title">
                <?php
                printf(
                    /* translators: %s: search query */
                    esc_html__('Search Results for: %s', 'azit-industrial'),
                    '<span class="search-query">' . esc_html(get_search_query()) . '</span>'
                );
                ?>
            </h1>

            <!-- Search Form -->
            <div class="search-form-container">
                <?php get_search_form(); ?>
            </div>

            <?php if (have_posts()) : ?>
            <p class="search-results-count" aria-live="polite">
                <?php
                global $wp_query;
                printf(
                    /* translators: %d: number of results */
                    esc_html(_n('%d result found', '%d results found', $wp_query->found_posts, 'azit-industrial')),
                    number_format_i18n($wp_query->found_posts)
                );
                ?>
            </p>
            <?php endif; ?>
        </header>

        <?php if (have_posts()) : ?>

            <div class="search-results" role="list" aria-label="<?php esc_attr_e('Search results', 'azit-industrial'); ?>">
                <?php while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?> role="listitem">
                        <header class="result-header">
                            <?php
                            // Post type label
                            $post_type = get_post_type();
                            $post_type_obj = get_post_type_object($post_type);
                            $post_type_label = $post_type_obj ? $post_type_obj->labels->singular_name : __('Post', 'azit-industrial');
                            ?>
                            <span class="result-type"><?php echo esc_html($post_type_label); ?></span>

                            <h2 class="result-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="result-meta">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </div>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                        <div class="result-thumbnail">
                            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                <?php the_post_thumbnail('thumbnail', array('alt' => '')); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <div class="result-excerpt">
                            <?php
                            // Highlight search terms in excerpt
                            $excerpt = get_the_excerpt();
                            $search_query = get_search_query();
                            if ($search_query) {
                                $excerpt = preg_replace(
                                    '/(' . preg_quote($search_query, '/') . ')/i',
                                    '<mark>$1</mark>',
                                    $excerpt
                                );
                            }
                            echo wp_kses_post($excerpt);
                            ?>
                        </div>

                        <footer class="result-footer">
                            <a href="<?php the_permalink(); ?>" class="result-link">
                                <?php esc_html_e('Read more', 'azit-industrial'); ?>
                                <span class="sr-only">
                                    <?php echo esc_html(sprintf(__('about %s', 'azit-industrial'), get_the_title())); ?>
                                </span>
                            </a>
                        </footer>
                    </article>

                <?php endwhile; ?>
            </div>

            <?php azit_pagination(); ?>

        <?php else : ?>

            <section class="no-results" aria-labelledby="no-results-heading">
                <h2 id="no-results-heading"><?php esc_html_e('No results found', 'azit-industrial'); ?></h2>

                <p>
                    <?php esc_html_e('Sorry, no results were found for your search. Please try different keywords or browse our content below.', 'azit-industrial'); ?>
                </p>

                <div class="search-suggestions">
                    <h3><?php esc_html_e('Suggestions:', 'azit-industrial'); ?></h3>
                    <ul>
                        <li><?php esc_html_e('Check your spelling', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Try more general keywords', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Try different keywords', 'azit-industrial'); ?></li>
                    </ul>
                </div>

                <div class="search-alternatives">
                    <h3><?php esc_html_e('Browse our content:', 'azit-industrial'); ?></h3>
                    <ul class="alternatives-list">
                        <li>
                            <a href="<?php echo esc_url(get_post_type_archive_link('expertise')); ?>">
                                <?php esc_html_e('Expertise', 'azit-industrial'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>">
                                <?php esc_html_e('Products', 'azit-industrial'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(get_post_type_archive_link('training')); ?>">
                                <?php esc_html_e('Training', 'azit-industrial'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                                <?php esc_html_e('Contact Us', 'azit-industrial'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

        <?php endif; ?>

    </div>

</main>

<?php
get_footer();
