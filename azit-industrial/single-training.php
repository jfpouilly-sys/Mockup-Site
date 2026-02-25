<?php
/**
 * The template for displaying single Training posts
 *
 * Two-column layout matching the static training detail pages:
 * - Left: Objectives, Program (day-by-day), Audience, Prerequisites
 * - Right: Info card, Instructor, Benefits, Syllabus PDF, Contact
 *
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="training-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php
            // =============================================
            // Retrieve all ACF fields (with post_meta fallback)
            // =============================================
            $has_acf = function_exists('get_field');

            // General
            $duration         = $has_acf ? get_field('training_duration') : get_post_meta(get_the_ID(), 'training_duration', true);
            $max_participants = $has_acf ? get_field('training_max_participants') : get_post_meta(get_the_ID(), 'training_max_participants', true);
            $level            = $has_acf ? get_field('training_level') : get_post_meta(get_the_ID(), 'training_level', true);
            $format           = $has_acf ? get_field('training_format') : get_post_meta(get_the_ID(), 'training_format', true);
            $certification    = $has_acf ? get_field('training_certification') : get_post_meta(get_the_ID(), 'training_certification', true);

            // Pricing
            $price         = $has_acf ? get_field('training_price') : get_post_meta(get_the_ID(), 'training_price', true);
            $private_price = $has_acf ? get_field('training_private_price') : get_post_meta(get_the_ID(), 'training_private_price', true);

            // Content
            $objectives    = $has_acf ? get_field('training_objectives') : array();
            $prerequisites = $has_acf ? get_field('training_prerequisites') : '';
            $audience      = $has_acf ? get_field('training_audience') : '';
            $instructor    = $has_acf ? get_field('training_instructor') : '';

            // Program
            $outline = $has_acf ? get_field('training_outline') : array();

            // Sidebar
            $benefits = $has_acf ? get_field('training_benefits') : array();
            $syllabus = $has_acf ? get_field('training_syllabus') : null;

            // Sessions
            $sessions = $has_acf ? get_field('training_sessions') : array();

            // Labels
            $level_labels = array(
                'beginner'     => __('Beginner', 'azit-industrial'),
                'intermediate' => __('Intermediate', 'azit-industrial'),
                'advanced'     => __('Advanced', 'azit-industrial'),
                'expert'       => __('Expert', 'azit-industrial'),
            );

            $format_labels = array(
                'onsite' => __('On-site', 'azit-industrial'),
                'center' => __('Training Center', 'azit-industrial'),
                'online' => __('Online', 'azit-industrial'),
                'hybrid' => __('Hybrid', 'azit-industrial'),
            );

            // Get training categories for badges
            $training_cats = get_the_terms(get_the_ID(), 'training_category');
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('single-training'); ?>>

                <!-- Hero Section with badges -->
                <header class="training-header product-hero">
                    <div class="product-hero__badges">
                        <?php if ($training_cats && !is_wp_error($training_cats)) : ?>
                            <?php foreach ($training_cats as $cat) : ?>
                            <span class="badge badge--primary"><?php echo esc_html($cat->name); ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if ($duration) : ?>
                        <span class="badge badge--primary"><?php echo esc_html($duration); ?></span>
                        <?php endif; ?>

                        <?php if ($max_participants) : ?>
                        <span class="badge badge--primary"><?php echo esc_html($max_participants); ?></span>
                        <?php endif; ?>
                    </div>

                    <h1 id="training-title" class="product-hero__title"><?php the_title(); ?></h1>

                    <?php if (has_excerpt()) : ?>
                    <p class="product-hero__description"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                <figure class="training-hero">
                    <?php
                    the_post_thumbnail('azit-hero', array(
                        'alt'   => get_the_title(),
                        'class' => 'training-featured-image',
                    ));
                    ?>
                </figure>
                <?php endif; ?>

                <!-- Two-Column Grid: Content (left) + Sidebar (right) -->
                <div class="training-grid-layout">

                    <!-- ============================================= -->
                    <!-- LEFT COLUMN: Main Content                     -->
                    <!-- ============================================= -->
                    <div class="training-main">

                        <!-- Course Description (WordPress editor content) -->
                        <?php if (get_the_content()) : ?>
                        <section class="training-section card" aria-labelledby="description-heading">
                            <h2 id="description-heading" class="card__title">
                                <?php esc_html_e('Course Description', 'azit-industrial'); ?>
                            </h2>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </section>
                        <?php endif; ?>

                        <!-- Learning Objectives -->
                        <?php if ($objectives && is_array($objectives)) : ?>
                        <section class="training-section card" aria-labelledby="objectives-heading">
                            <h2 id="objectives-heading" class="card__title">
                                <?php esc_html_e('Learning Objectives', 'azit-industrial'); ?>
                            </h2>
                            <p><?php esc_html_e('By the end of this course, participants will be able to:', 'azit-industrial'); ?></p>
                            <ul class="objectives-list">
                                <?php foreach ($objectives as $objective) : ?>
                                <li><?php echo esc_html($objective['objective']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </section>
                        <?php endif; ?>

                        <!-- Course Program / Outline -->
                        <?php if ($outline && is_array($outline)) : ?>
                        <section class="training-section card" aria-labelledby="outline-heading">
                            <h2 id="outline-heading" class="card__title">
                                <?php esc_html_e('Course Program', 'azit-industrial'); ?>
                            </h2>

                            <?php foreach ($outline as $module) : ?>
                            <h3 class="module-title">
                                <?php echo esc_html($module['module_title']); ?>
                            </h3>

                            <?php if (!empty($module['module_description'])) : ?>
                            <p class="module-description">
                                <?php echo esc_html($module['module_description']); ?>
                            </p>
                            <?php endif; ?>

                            <?php if (!empty($module['module_topics']) && is_array($module['module_topics'])) : ?>
                            <ul class="module-topics">
                                <?php foreach ($module['module_topics'] as $topic) : ?>
                                <li><?php echo esc_html($topic['topic']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </section>
                        <?php endif; ?>

                        <!-- Target Audience -->
                        <?php if ($audience) : ?>
                        <section class="training-section card" aria-labelledby="audience-heading">
                            <h2 id="audience-heading" class="card__title">
                                <?php esc_html_e('Target Audience', 'azit-industrial'); ?>
                            </h2>
                            <div class="audience-content">
                                <?php echo wp_kses_post($audience); ?>
                            </div>
                        </section>
                        <?php endif; ?>

                        <!-- Prerequisites -->
                        <?php if ($prerequisites) : ?>
                        <section class="training-section card" aria-labelledby="prerequisites-heading">
                            <h2 id="prerequisites-heading" class="card__title">
                                <?php esc_html_e('Prerequisites', 'azit-industrial'); ?>
                            </h2>
                            <div class="prerequisites-content">
                                <?php echo wp_kses_post($prerequisites); ?>
                            </div>
                        </section>
                        <?php endif; ?>

                        <!-- Upcoming Sessions Table -->
                        <?php if ($sessions && is_array($sessions)) : ?>
                        <section class="training-section card" aria-labelledby="sessions-heading">
                            <h2 id="sessions-heading" class="card__title">
                                <?php esc_html_e('Upcoming Sessions', 'azit-industrial'); ?>
                            </h2>

                            <div class="table-responsive" tabindex="0" role="region" aria-label="<?php esc_attr_e('Training sessions table', 'azit-industrial'); ?>">
                                <table class="sessions-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php esc_html_e('Date', 'azit-industrial'); ?></th>
                                            <th scope="col"><?php esc_html_e('Location', 'azit-industrial'); ?></th>
                                            <th scope="col"><?php esc_html_e('Status', 'azit-industrial'); ?></th>
                                            <th scope="col"><?php esc_html_e('Action', 'azit-industrial'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $status_labels = array(
                                            'available' => __('Available', 'azit-industrial'),
                                            'limited'   => __('Limited Seats', 'azit-industrial'),
                                            'full'      => __('Fully Booked', 'azit-industrial'),
                                        );
                                        foreach ($sessions as $session) :
                                        ?>
                                        <tr>
                                            <td>
                                                <time datetime="<?php echo esc_attr($session['session_date']); ?>">
                                                    <?php echo esc_html(date_i18n(get_option('date_format'), strtotime($session['session_date']))); ?>
                                                </time>
                                            </td>
                                            <td><?php echo esc_html($session['session_location']); ?></td>
                                            <td><?php echo esc_html($status_labels[$session['session_status']] ?? $session['session_status']); ?></td>
                                            <td>
                                                <?php if ($session['session_status'] !== 'full') : ?>
                                                <a href="#training-form"
                                                   class="btn btn-small">
                                                    <?php esc_html_e('Register', 'azit-industrial'); ?>
                                                </a>
                                                <?php else : ?>
                                                <span class="status-full"><?php esc_html_e('Waitlist', 'azit-industrial'); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <?php endif; ?>

                    </div>

                    <!-- ============================================= -->
                    <!-- RIGHT COLUMN: Sidebar                         -->
                    <!-- ============================================= -->
                    <aside class="training-sidebar">

                        <!-- Training Information Card -->
                        <div class="card training-info-card" aria-labelledby="info-heading">
                            <h2 id="info-heading" class="card__title">
                                <?php esc_html_e('Training Information', 'azit-industrial'); ?>
                            </h2>
                            <dl class="training-info-list">
                                <?php if ($duration) : ?>
                                <div class="training-info-row">
                                    <dt><?php esc_html_e('Duration', 'azit-industrial'); ?></dt>
                                    <dd><?php echo esc_html($duration); ?></dd>
                                </div>
                                <?php endif; ?>

                                <?php if ($max_participants) : ?>
                                <div class="training-info-row">
                                    <dt><?php esc_html_e('Participants', 'azit-industrial'); ?></dt>
                                    <dd><?php echo esc_html($max_participants); ?></dd>
                                </div>
                                <?php endif; ?>

                                <?php if ($format) : ?>
                                <div class="training-info-row">
                                    <dt><?php esc_html_e('Format', 'azit-industrial'); ?></dt>
                                    <dd><?php echo esc_html($format_labels[$format] ?? $format); ?></dd>
                                </div>
                                <?php endif; ?>

                                <?php if ($level) : ?>
                                <div class="training-info-row">
                                    <dt><?php esc_html_e('Level', 'azit-industrial'); ?></dt>
                                    <dd><?php echo esc_html($level_labels[$level] ?? $level); ?></dd>
                                </div>
                                <?php endif; ?>

                                <?php if ($certification) : ?>
                                <div class="training-info-row">
                                    <dt><?php esc_html_e('Certificate', 'azit-industrial'); ?></dt>
                                    <dd><?php esc_html_e('Yes, included', 'azit-industrial'); ?></dd>
                                </div>
                                <?php endif; ?>

                                <?php if ($price) : ?>
                                <div class="training-info-row training-info-row--price">
                                    <dt><?php esc_html_e('Inter-Enterprise', 'azit-industrial'); ?></dt>
                                    <dd><?php echo esc_html($price); ?></dd>
                                </div>
                                <?php endif; ?>

                                <?php if ($private_price) : ?>
                                <div class="training-info-row">
                                    <dt><?php esc_html_e('Private Company', 'azit-industrial'); ?></dt>
                                    <dd><?php echo esc_html($private_price); ?></dd>
                                </div>
                                <?php endif; ?>
                            </dl>

                            <a href="#training-form"
                               class="btn btn-primary training-cta-btn">
                                <?php esc_html_e('Request Information', 'azit-industrial'); ?>
                            </a>
                        </div>

                        <!-- Syllabus PDF Download -->
                        <?php if ($syllabus && is_array($syllabus)) : ?>
                        <div class="card" aria-labelledby="syllabus-heading">
                            <h2 id="syllabus-heading" class="card__title">
                                <?php esc_html_e('Syllabus', 'azit-industrial'); ?>
                            </h2>
                            <p><?php esc_html_e('Download the detailed course program:', 'azit-industrial'); ?></p>
                            <a href="<?php echo esc_url($syllabus['url']); ?>"
                               class="btn btn-secondary training-cta-btn"
                               download
                               aria-label="<?php echo esc_attr(sprintf(__('Download syllabus PDF (%s)', 'azit-industrial'), $syllabus['filename'])); ?>">
                                <?php esc_html_e('Download PDF', 'azit-industrial'); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <!-- Instructor -->
                        <?php if ($instructor) : ?>
                        <div class="card" aria-labelledby="instructor-heading">
                            <h2 id="instructor-heading" class="card__title">
                                <?php esc_html_e('Instructor', 'azit-industrial'); ?>
                            </h2>
                            <p><?php echo esc_html($instructor); ?></p>
                        </div>
                        <?php endif; ?>

                        <!-- Key Benefits -->
                        <?php if ($benefits && is_array($benefits)) : ?>
                        <div class="card" aria-labelledby="benefits-heading">
                            <h2 id="benefits-heading" class="card__title">
                                <?php esc_html_e('Key Benefits', 'azit-industrial'); ?>
                            </h2>
                            <ul class="benefits-list">
                                <?php foreach ($benefits as $benefit) : ?>
                                <li><?php echo esc_html($benefit['benefit']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <!-- Contact -->
                        <div class="card" aria-labelledby="contact-heading">
                            <h2 id="contact-heading" class="card__title">
                                <?php esc_html_e('Contact', 'azit-industrial'); ?>
                            </h2>
                            <p>
                                <?php esc_html_e('Training department', 'azit-industrial'); ?><br>
                                <?php
                                $contact_email = get_option('azit_contact_email', 'formation@isit.fr');
                                $contact_phone = get_option('azit_contact_phone', '+33 (0)5 61 30 69 00');
                                ?>
                                <?php esc_html_e('Email:', 'azit-industrial'); ?>
                                <a href="mailto:<?php echo esc_attr($contact_email); ?>">
                                    <?php echo esc_html($contact_email); ?>
                                </a><br>
                                <?php esc_html_e('Tel:', 'azit-industrial'); ?>
                                <a href="tel:<?php echo esc_attr(azit_format_phone_link($contact_phone)); ?>">
                                    <?php echo esc_html($contact_phone); ?>
                                </a>
                            </p>
                        </div>

                    </aside>

                </div>

                <!-- Training Request Form (Contact Form 7) -->
                <section id="training-form" class="training-request-form" aria-labelledby="training-form-heading" tabindex="-1">
                    <h2 id="training-form-heading" class="section-title">
                        <?php echo esc_html(sprintf(__('Register for %s', 'azit-industrial'), get_the_title())); ?>
                    </h2>
                    <p class="form-intro">
                        <?php esc_html_e('Fill out the form below to register for this training or request a custom session for your team.', 'azit-industrial'); ?>
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
                            <?php esc_html_e('Contact us to register:', 'azit-industrial'); ?>
                            <a href="<?php echo esc_url(home_url('/contact/?subject=training&course=' . urlencode(get_the_title()))); ?>" class="btn btn-primary">
                                <?php esc_html_e('Go to Contact Page', 'azit-industrial'); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </section>

                <!-- View All Training -->
                <div class="training-cta-links" style="text-align: center; margin: 2rem 0;">
                    <a href="<?php echo esc_url(get_post_type_archive_link('training')); ?>"
                       class="btn btn-secondary">
                        <?php esc_html_e('View All Training', 'azit-industrial'); ?>
                    </a>
                </div>

                <!-- Related Training -->
                <?php
                // Query related training from same category
                $related_args = array(
                    'post_type'      => 'training',
                    'posts_per_page' => 3,
                    'post__not_in'   => array(get_the_ID()),
                );

                // Prefer same training category
                if ($training_cats && !is_wp_error($training_cats)) {
                    $cat_ids = wp_list_pluck($training_cats, 'term_id');
                    $related_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'training_category',
                            'field'    => 'term_id',
                            'terms'    => $cat_ids,
                        ),
                    );
                }

                $related = new WP_Query($related_args);

                // Fallback to random if not enough related
                if ($related->post_count < 3) {
                    $related = new WP_Query(array(
                        'post_type'      => 'training',
                        'posts_per_page' => 3,
                        'post__not_in'   => array(get_the_ID()),
                        'orderby'        => 'rand',
                    ));
                }

                if ($related->have_posts()) :
                ?>
                <section class="related-training" aria-labelledby="related-heading">
                    <h2 id="related-heading" class="section-title">
                        <?php esc_html_e('Related Training', 'azit-industrial'); ?>
                    </h2>

                    <div class="training-grid">
                        <?php
                        while ($related->have_posts()) :
                            $related->the_post();
                            echo azit_get_training_card();
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
