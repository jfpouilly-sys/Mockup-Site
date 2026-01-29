<?php
/**
 * The 404 (Page Not Found) Template
 *
 * Displays a helpful error page when content is not found.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="error-title">

    <div class="container">

        <article class="error-404">

            <header class="error-header">
                <p class="error-code" aria-hidden="true">404</p>
                <h1 id="error-title" class="error-title">
                    <?php esc_html_e('Page Not Found', 'azit-industrial'); ?>
                </h1>
            </header>

            <div class="error-content">
                <p class="error-message">
                    <?php esc_html_e('Sorry, the page you are looking for doesn\'t exist or has been moved.', 'azit-industrial'); ?>
                </p>

                <p class="error-suggestion">
                    <?php esc_html_e('You can try searching for what you\'re looking for or use the navigation to find your way.', 'azit-industrial'); ?>
                </p>

                <!-- Search Form -->
                <div class="error-search">
                    <h2 class="sr-only"><?php esc_html_e('Search the site', 'azit-industrial'); ?></h2>
                    <?php get_search_form(); ?>
                </div>

                <!-- Quick Links -->
                <section class="error-links" aria-labelledby="quick-links-heading">
                    <h2 id="quick-links-heading"><?php esc_html_e('Quick Links', 'azit-industrial'); ?></h2>

                    <nav aria-label="<?php esc_attr_e('Helpful links', 'azit-industrial'); ?>">
                        <ul class="links-list">
                            <li>
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php esc_html_e('Home', 'azit-industrial'); ?>
                                </a>
                            </li>
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
                            <li>
                                <a href="<?php echo esc_url(home_url('/plan-du-site/')); ?>">
                                    <?php esc_html_e('Site Map', 'azit-industrial'); ?>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </section>

                <!-- Report Issue -->
                <section class="error-report" aria-labelledby="report-heading">
                    <h2 id="report-heading"><?php esc_html_e('Think this is a mistake?', 'azit-industrial'); ?></h2>
                    <p>
                        <?php
                        printf(
                            /* translators: %s: contact page URL */
                            esc_html__('If you believe this page should exist, please %s and let us know.', 'azit-industrial'),
                            '<a href="' . esc_url(home_url('/contact/')) . '">' . esc_html__('contact us', 'azit-industrial') . '</a>'
                        );
                        ?>
                    </p>
                </section>

            </div>

        </article>

    </div>

</main>

<?php
get_footer();
