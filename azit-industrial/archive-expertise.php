<?php
/**
 * The template for displaying Expertise archive
 *
 * Displays a grid of all expertise posts.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="archive-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <header class="archive-header">
            <h1 id="archive-title" class="archive-title">
                <?php esc_html_e('Our Expertise', 'azit-industrial'); ?>
            </h1>

            <div class="archive-description">
                <p>
                    <?php esc_html_e('AZIT provides comprehensive industrial communication solutions backed by decades of expertise in safety, protocol development, testing, and industrial networks.', 'azit-industrial'); ?>
                </p>
            </div>
        </header>

        <?php if (have_posts()) : ?>

            <div class="expertise-grid" role="list" aria-label="<?php esc_attr_e('List of expertise areas', 'azit-industrial'); ?>">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <div role="listitem">
                        <?php echo azit_get_expertise_card(); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php azit_pagination(); ?>

        <?php else : ?>

            <section class="no-results">
                <h2><?php esc_html_e('No expertise found', 'azit-industrial'); ?></h2>
                <p><?php esc_html_e('We are currently updating our expertise areas. Please check back soon.', 'azit-industrial'); ?></p>
            </section>

        <?php endif; ?>

        <!-- CTA Section -->
        <section class="archive-cta" aria-labelledby="cta-heading">
            <h2 id="cta-heading" class="cta-title">
                <?php esc_html_e('Looking for a specific solution?', 'azit-industrial'); ?>
            </h2>
            <p class="cta-text">
                <?php esc_html_e('Our team of experts is ready to help you find the right solution for your industrial communication needs.', 'azit-industrial'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                <?php esc_html_e('Contact Our Experts', 'azit-industrial'); ?>
            </a>
        </section>

    </div>

</main>

<?php
get_footer();
