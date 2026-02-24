<?php
/**
 * The template for displaying single Expertise posts
 *
 * Custom template for the Expertise custom post type.
 * Displays expertise details with custom fields.
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

            <article id="post-<?php the_ID(); ?>" <?php post_class('single-expertise'); ?>>

                <header class="expertise-header">
                    <?php
                    // Get custom fields
                    $icon = null;
                    $subtitle = '';
                    if (function_exists('get_field')) {
                        $icon = get_field('expertise_icon');
                        $subtitle = get_field('expertise_subtitle');
                    } else {
                        $subtitle = get_post_meta(get_the_ID(), 'expertise_subtitle', true);
                    }
                    ?>

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
                </header>

                <?php if (has_post_thumbnail()) : ?>
                <figure class="expertise-hero">
                    <?php
                    the_post_thumbnail('azit-hero', array(
                        'alt' => get_the_title(),
                        'class' => 'expertise-featured-image',
                    ));
                    ?>
                </figure>
                <?php endif; ?>

                <div class="expertise-content">

                    <!-- Main Content -->
                    <section class="expertise-description" aria-labelledby="description-heading">
                        <h2 id="description-heading" class="section-title">
                            <?php esc_html_e('Overview', 'azit-industrial'); ?>
                        </h2>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </section>

                    <?php
                    // Services Section (ACF Repeater or fallback)
                    $services = array();
                    if (function_exists('get_field')) {
                        $services = get_field('expertise_services');
                    }

                    if ($services && is_array($services)) :
                    ?>
                    <section class="expertise-services" aria-labelledby="services-heading">
                        <h2 id="services-heading" class="section-title">
                            <?php esc_html_e('Our Services', 'azit-industrial'); ?>
                        </h2>

                        <ul class="services-list" role="list">
                            <?php foreach ($services as $index => $service) : ?>
                            <li class="service-item">
                                <h3 class="service-name">
                                    <?php echo esc_html($service['service_name'] ?? ''); ?>
                                </h3>
                                <?php if (!empty($service['service_description'])) : ?>
                                <p class="service-description">
                                    <?php echo esc_html($service['service_description']); ?>
                                </p>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                    <?php endif; ?>

                    <?php
                    // Key Features (ACF Repeater or fallback)
                    $features = array();
                    if (function_exists('get_field')) {
                        $features = get_field('expertise_features');
                    }

                    if ($features && is_array($features)) :
                    ?>
                    <section class="expertise-features" aria-labelledby="features-heading">
                        <h2 id="features-heading" class="section-title">
                            <?php esc_html_e('Key Features', 'azit-industrial'); ?>
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

                    <?php
                    // Case Studies / Projects
                    $case_studies = array();
                    if (function_exists('get_field')) {
                        $case_studies = get_field('expertise_case_studies');
                    }

                    if ($case_studies && is_array($case_studies)) :
                    ?>
                    <section class="expertise-case-studies" aria-labelledby="case-studies-heading">
                        <h2 id="case-studies-heading" class="section-title">
                            <?php esc_html_e('Case Studies', 'azit-industrial'); ?>
                        </h2>

                        <div class="case-studies-grid">
                            <?php foreach ($case_studies as $study) : ?>
                            <article class="case-study-card">
                                <h3 class="case-study-title">
                                    <?php echo esc_html($study['case_title'] ?? ''); ?>
                                </h3>
                                <p class="case-study-summary">
                                    <?php echo esc_html($study['case_summary'] ?? ''); ?>
                                </p>
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

                <!-- CTA Section -->
                <section class="expertise-cta" aria-labelledby="cta-heading">
                    <h2 id="cta-heading" class="cta-title">
                        <?php esc_html_e('Need our expertise?', 'azit-industrial'); ?>
                    </h2>
                    <p class="cta-text">
                        <?php esc_html_e('Contact us to discuss your project requirements.', 'azit-industrial'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('Contact Us', 'azit-industrial'); ?>
                    </a>
                </section>

                <!-- Related Expertise -->
                <?php
                $related = new WP_Query(array(
                    'post_type'      => 'expertise',
                    'posts_per_page' => 3,
                    'post__not_in'   => array(get_the_ID()),
                    'orderby'        => 'rand',
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

                <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
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

        <?php endwhile; ?>

    </div>

</main>

<?php
get_footer();
