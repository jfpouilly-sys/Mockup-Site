<?php
/**
 * The template for displaying Training archive
 *
 * Displays a grid of all training courses.
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
                <?php esc_html_e('Training Programs', 'azit-industrial'); ?>
            </h1>

            <div class="archive-description">
                <p>
                    <?php esc_html_e('Enhance your skills with our comprehensive training programs covering industrial communication protocols, safety systems, and testing methodologies.', 'azit-industrial'); ?>
                </p>
            </div>
        </header>

        <?php
        // Training Level Filters
        $training_levels = array(
            'beginner'     => __('Beginner', 'azit-industrial'),
            'intermediate' => __('Intermediate', 'azit-industrial'),
            'advanced'     => __('Advanced', 'azit-industrial'),
            'expert'       => __('Expert', 'azit-industrial'),
        );

        $current_level = isset($_GET['level']) ? sanitize_key($_GET['level']) : '';
        ?>
        <nav class="training-filters" aria-label="<?php esc_attr_e('Training level filters', 'azit-industrial'); ?>">
            <h2 class="sr-only"><?php esc_html_e('Filter by level', 'azit-industrial'); ?></h2>
            <ul class="filter-list" role="list">
                <li>
                    <a href="<?php echo esc_url(get_post_type_archive_link('training')); ?>"
                       class="filter-link <?php echo empty($current_level) ? 'active' : ''; ?>"
                       <?php echo empty($current_level) ? 'aria-current="page"' : ''; ?>>
                        <?php esc_html_e('All Levels', 'azit-industrial'); ?>
                    </a>
                </li>
                <?php foreach ($training_levels as $level_key => $level_label) : ?>
                <li>
                    <a href="<?php echo esc_url(add_query_arg('level', $level_key, get_post_type_archive_link('training'))); ?>"
                       class="filter-link <?php echo $current_level === $level_key ? 'active' : ''; ?>"
                       <?php echo $current_level === $level_key ? 'aria-current="page"' : ''; ?>>
                        <?php echo esc_html($level_label); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <?php if (have_posts()) : ?>

            <div class="training-grid" role="list" aria-label="<?php esc_attr_e('List of training courses', 'azit-industrial'); ?>">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <div role="listitem">
                        <?php echo azit_get_training_card(); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php azit_pagination(); ?>

        <?php else : ?>

            <section class="no-results">
                <h2><?php esc_html_e('No training courses found', 'azit-industrial'); ?></h2>
                <p><?php esc_html_e('We are currently updating our training catalog. Please check back soon or contact us for custom training options.', 'azit-industrial'); ?></p>
            </section>

        <?php endif; ?>

        <!-- Training Benefits -->
        <section class="training-benefits" aria-labelledby="benefits-heading">
            <h2 id="benefits-heading" class="section-title">
                <?php esc_html_e('Why Choose AZIT Training?', 'azit-industrial'); ?>
            </h2>

            <ul class="benefits-list" role="list">
                <li class="benefit-item">
                    <strong><?php esc_html_e('Expert Instructors', 'azit-industrial'); ?></strong>
                    <p><?php esc_html_e('Learn from industry professionals with real-world experience.', 'azit-industrial'); ?></p>
                </li>
                <li class="benefit-item">
                    <strong><?php esc_html_e('Hands-On Practice', 'azit-industrial'); ?></strong>
                    <p><?php esc_html_e('Apply your knowledge with practical exercises and lab sessions.', 'azit-industrial'); ?></p>
                </li>
                <li class="benefit-item">
                    <strong><?php esc_html_e('Certification', 'azit-industrial'); ?></strong>
                    <p><?php esc_html_e('Receive industry-recognized certificates upon completion.', 'azit-industrial'); ?></p>
                </li>
                <li class="benefit-item">
                    <strong><?php esc_html_e('Flexible Formats', 'azit-industrial'); ?></strong>
                    <p><?php esc_html_e('Choose from on-site, online, or custom training options.', 'azit-industrial'); ?></p>
                </li>
            </ul>
        </section>

        <!-- CTA Section -->
        <section class="archive-cta" aria-labelledby="cta-heading">
            <h2 id="cta-heading" class="cta-title">
                <?php esc_html_e('Need Custom Training?', 'azit-industrial'); ?>
            </h2>
            <p class="cta-text">
                <?php esc_html_e('We offer tailored training programs designed to meet your specific organizational needs.', 'azit-industrial'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                <?php esc_html_e('Request Custom Training', 'azit-industrial'); ?>
            </a>
        </section>

    </div>

</main>

<?php
get_footer();
