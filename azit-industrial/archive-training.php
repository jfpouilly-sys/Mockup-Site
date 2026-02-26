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

        <!-- Custom Training Request Form (Contact Form 7) -->
        <section id="custom-training-form" class="archive-cta training-request-form" aria-labelledby="cta-heading" tabindex="-1">
            <h2 id="cta-heading" class="cta-title">
                <?php esc_html_e('Need Custom Training?', 'azit-industrial'); ?>
            </h2>
            <p class="cta-text">
                <?php esc_html_e('We offer tailored training programs designed to meet your specific organizational needs. Fill out the form below and our team will get back to you.', 'azit-industrial'); ?>
            </p>

            <?php
            if (shortcode_exists('contact-form-7')) :
                $training_form = get_posts(array(
                    'post_type'   => 'wpcf7_contact_form',
                    'post_status' => 'publish',
                    'name'        => 'training-request-form',
                    'numberposts' => 1,
                ));

                if (!empty($training_form)) :
                    echo do_shortcode('[contact-form-7 id="' . intval($training_form[0]->ID) . '" title="Training Request"]');
                else :
                    $any_form = get_posts(array(
                        'post_type'   => 'wpcf7_contact_form',
                        'post_status' => 'publish',
                        'numberposts' => 1,
                    ));
                    if (!empty($any_form)) :
                        echo do_shortcode('[contact-form-7 id="' . intval($any_form[0]->ID) . '"]');
                    else :
                    ?>
                    <p><?php esc_html_e('Please create a Contact Form 7 form with slug "training-request-form" or go to Tools > AZIT Setup to generate it automatically.', 'azit-industrial'); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else : ?>
                <p>
                    <?php esc_html_e('Contact us for custom training:', 'azit-industrial'); ?>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('Go to Contact Page', 'azit-industrial'); ?>
                    </a>
                </p>
            <?php endif; ?>
        </section>

    </div>

</main>

<?php
get_footer();
