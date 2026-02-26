<?php
/**
 * The template for displaying single Expertise posts
 *
 * Displays expertise details with all ACF fields:
 * hero with badges, services cards, features grid,
 * case studies, process steps, and custom CTA.
 *
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="expertise-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php
            // =============================================
            // Retrieve all ACF fields (with post_meta fallback)
            // =============================================
            $has_acf = function_exists('get_field');

            // General
            $icon     = $has_acf ? get_field('expertise_icon') : null;
            $subtitle = $has_acf ? get_field('expertise_subtitle') : get_post_meta(get_the_ID(), 'expertise_subtitle', true);
            $badges   = $has_acf ? get_field('expertise_badges') : array();

            // Services
            $services = $has_acf ? get_field('expertise_services') : array();

            // Features & Cases
            $features     = $has_acf ? get_field('expertise_features') : array();
            $case_studies = $has_acf ? get_field('expertise_case_studies') : array();

            // Process & CTA
            $process = $has_acf ? get_field('expertise_process') : array();
            $cta     = $has_acf ? get_field('expertise_cta') : array();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('single-expertise'); ?>>

                <header class="expertise-header">
                    <?php if ($icon && is_array($icon)) : ?>
                    <div class="expertise-icon" aria-hidden="true">
                        <img src="<?php echo esc_url($icon['url']); ?>"
                             alt=""
                             role="presentation"
                             width="120"
                             height="120" />
                    </div>
                    <?php endif; ?>

                    <h1 id="expertise-title" class="expertise-title"><?php the_title(); ?></h1>

                    <?php if ($subtitle) : ?>
                    <p class="expertise-subtitle"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>

                    <!-- Badges -->
                    <?php if ($badges && is_array($badges)) : ?>
                    <div class="product-hero__badges" style="margin-top: 1rem;">
                        <?php foreach ($badges as $badge) : ?>
                        <span class="badge badge--primary"><?php echo esc_html($badge['badge_text']); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                <figure class="expertise-hero">
                    <?php
                    the_post_thumbnail('azit-hero', array(
                        'alt'   => get_the_title(),
                        'class' => 'expertise-featured-image',
                    ));
                    ?>
                </figure>
                <?php endif; ?>

                <div class="expertise-content">

                    <!-- Main Content (WordPress editor, cleaned) -->
                    <?php
                    $clean_description = azit_get_clean_description('expertise');
                    if ($clean_description) :
                    ?>
                    <section class="expertise-description" aria-labelledby="description-heading">
                        <h2 id="description-heading" class="section-title">
                            <?php esc_html_e('Overview', 'azit-industrial'); ?>
                        </h2>
                        <div class="entry-content">
                            <?php echo apply_filters('the_content', $clean_description); ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <!-- Services Cards -->
                    <?php if ($services && is_array($services)) : ?>
                    <section class="expertise-services" aria-labelledby="services-heading">
                        <h2 id="services-heading" class="section-title">
                            <?php esc_html_e('Our Services', 'azit-industrial'); ?>
                        </h2>

                        <div class="services-grid" role="list">
                            <?php foreach ($services as $service) : ?>
                            <div class="service-card card" role="listitem">
                                <h3 class="card__title">
                                    <?php echo esc_html($service['service_name'] ?? ''); ?>
                                </h3>
                                <?php if (!empty($service['service_description'])) : ?>
                                <p class="service-description">
                                    <?php echo esc_html($service['service_description']); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <!-- Process Steps -->
                    <?php if ($process && is_array($process)) : ?>
                    <section class="expertise-process" aria-labelledby="process-heading">
                        <h2 id="process-heading" class="section-title">
                            <?php esc_html_e('Our Process', 'azit-industrial'); ?>
                        </h2>

                        <ol class="process-steps">
                            <?php foreach ($process as $index => $step) : ?>
                            <li class="process-step">
                                <span class="process-step-number" aria-hidden="true"><?php echo esc_html($index + 1); ?></span>
                                <div class="process-step-content">
                                    <h3 class="process-step-title"><?php echo esc_html($step['step_title']); ?></h3>
                                    <?php if (!empty($step['step_description'])) : ?>
                                    <p class="process-step-desc"><?php echo esc_html($step['step_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ol>
                    </section>
                    <?php endif; ?>

                    <!-- Key Features / Why Choose Us -->
                    <?php if ($features && is_array($features)) : ?>
                    <section class="expertise-features" aria-labelledby="features-heading">
                        <h2 id="features-heading" class="section-title">
                            <?php esc_html_e('Why Choose AZIT', 'azit-industrial'); ?>
                        </h2>

                        <ul class="features-grid" role="list">
                            <?php foreach ($features as $feature) : ?>
                            <li class="feature-item">
                                <?php if (!empty($feature['feature_icon'])) : ?>
                                <span class="feature-icon" aria-hidden="true">
                                    <?php echo esc_html($feature['feature_icon']); ?>
                                </span>
                                <?php endif; ?>
                                <span class="feature-text">
                                    <?php echo esc_html($feature['feature_text'] ?? ''); ?>
                                </span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                    <?php endif; ?>

                    <!-- Case Studies / Use Cases -->
                    <?php if ($case_studies && is_array($case_studies)) : ?>
                    <section class="expertise-case-studies" aria-labelledby="case-studies-heading">
                        <h2 id="case-studies-heading" class="section-title">
                            <?php esc_html_e('Case Studies', 'azit-industrial'); ?>
                        </h2>

                        <div class="case-studies-grid">
                            <?php foreach ($case_studies as $study) : ?>
                            <article class="case-study-card card">
                                <h3 class="card__title">
                                    <?php echo esc_html($study['case_title'] ?? ''); ?>
                                </h3>
                                <?php if (!empty($study['case_summary'])) : ?>
                                <p class="case-study-summary">
                                    <?php echo esc_html($study['case_summary']); ?>
                                </p>
                                <?php endif; ?>
                                <?php if (!empty($study['case_link'])) : ?>
                                <a href="<?php echo esc_url($study['case_link']); ?>" class="case-study-link">
                                    <?php esc_html_e('Read more', 'azit-industrial'); ?>
                                    <span class="sr-only">
                                        <?php echo esc_html(sprintf(__('about %s', 'azit-industrial'), $study['case_title'])); ?>
                                    </span>
                                </a>
                                <?php endif; ?>
                            </article>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <?php endif; ?>

                </div>

                <!-- Contact Form (Contact Form 7) -->
                <section id="expertise-contact-form" class="expertise-cta training-request-form" aria-labelledby="cta-heading" tabindex="-1">
                    <h2 id="cta-heading" class="cta-title">
                        <?php echo esc_html(sprintf(__('Request a %s Consultation', 'azit-industrial'), get_the_title())); ?>
                    </h2>
                    <p class="cta-text">
                        <?php esc_html_e('Fill out the form below and our team will get back to you to discuss your project requirements.', 'azit-industrial'); ?>
                    </p>

                    <?php
                    if (shortcode_exists('contact-form-7')) :
                        // Look for the default contact form
                        $contact_form = get_posts(array(
                            'post_type'   => 'wpcf7_contact_form',
                            'post_status' => 'publish',
                            'name'        => 'contact-form',
                            'numberposts' => 1,
                        ));

                        if (!empty($contact_form)) :
                            echo do_shortcode('[contact-form-7 id="' . intval($contact_form[0]->ID) . '" title="Contact Form"]');
                        else :
                            // Fallback: use any available CF7 form
                            $any_form = get_posts(array(
                                'post_type'   => 'wpcf7_contact_form',
                                'post_status' => 'publish',
                                'numberposts' => 1,
                            ));
                            if (!empty($any_form)) :
                                echo do_shortcode('[contact-form-7 id="' . intval($any_form[0]->ID) . '"]');
                            else :
                            ?>
                            <p><?php esc_html_e('Please create a Contact Form 7 form with slug "contact-form" or go to Tools > AZIT Setup to generate it automatically.', 'azit-industrial'); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <p>
                            <?php esc_html_e('Contact us to discuss your project:', 'azit-industrial'); ?>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                                <?php esc_html_e('Go to Contact Page', 'azit-industrial'); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </section>

                <!-- Related Expertise -->
                <?php
                $related = new WP_Query(array(
                    'post_type'      => 'expertise',
                    'posts_per_page' => 3,
                    'post__not_in'   => array(get_the_ID()),
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ));

                if ($related->have_posts()) :
                ?>
                <section class="related-expertise" aria-labelledby="related-heading">
                    <h2 id="related-heading" class="section-title">
                        <?php esc_html_e('Related Expertise', 'azit-industrial'); ?>
                    </h2>

                    <div class="expertise-grid">
                        <?php
                        while ($related->have_posts()) :
                            $related->the_post();
                            echo azit_get_expertise_card();
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </section>
                <?php endif; ?>

            </article>

        <?php endwhile; ?>

    </div>

</main>

<?php
get_footer();
