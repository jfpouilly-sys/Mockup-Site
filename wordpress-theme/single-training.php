<?php
/**
 * The template for displaying single Training posts
 *
 * Custom template for the Training custom post type.
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

            <article id="post-<?php the_ID(); ?>" <?php post_class('single-training'); ?>>

                <header class="training-header">
                    <?php
                    // Get custom fields
                    $duration = '';
                    $price = '';
                    $level = '';
                    $format = '';
                    $certification = false;
                    if (function_exists('get_field')) {
                        $duration = get_field('training_duration');
                        $price = get_field('training_price');
                        $level = get_field('training_level');
                        $format = get_field('training_format');
                        $certification = get_field('training_certification');
                    } else {
                        $duration = get_post_meta(get_the_ID(), 'training_duration', true);
                        $price = get_post_meta(get_the_ID(), 'training_price', true);
                        $level = get_post_meta(get_the_ID(), 'training_level', true);
                    }

                    // Level labels
                    $level_labels = array(
                        'beginner'     => __('Beginner', 'azit-industrial'),
                        'intermediate' => __('Intermediate', 'azit-industrial'),
                        'advanced'     => __('Advanced', 'azit-industrial'),
                        'expert'       => __('Expert', 'azit-industrial'),
                    );
                    ?>

                    <?php if ($level) : ?>
                    <span class="training-level training-level-<?php echo esc_attr($level); ?>">
                        <?php echo esc_html($level_labels[$level] ?? $level); ?>
                    </span>
                    <?php endif; ?>

                    <h1 id="training-title" class="training-title"><?php the_title(); ?></h1>

                    <!-- Training Meta -->
                    <dl class="training-meta">
                        <?php if ($duration) : ?>
                        <div class="meta-item">
                            <dt><?php esc_html_e('Duration', 'azit-industrial'); ?></dt>
                            <dd><?php echo esc_html($duration); ?></dd>
                        </div>
                        <?php endif; ?>

                        <?php if ($price) : ?>
                        <div class="meta-item">
                            <dt><?php esc_html_e('Price', 'azit-industrial'); ?></dt>
                            <dd><?php echo esc_html($price); ?></dd>
                        </div>
                        <?php endif; ?>

                        <?php if ($format) : ?>
                        <div class="meta-item">
                            <dt><?php esc_html_e('Format', 'azit-industrial'); ?></dt>
                            <dd>
                                <?php
                                $format_labels = array(
                                    'onsite'  => __('On-site', 'azit-industrial'),
                                    'online'  => __('Online', 'azit-industrial'),
                                    'hybrid'  => __('Hybrid', 'azit-industrial'),
                                );
                                echo esc_html($format_labels[$format] ?? $format);
                                ?>
                            </dd>
                        </div>
                        <?php endif; ?>

                        <?php if ($certification) : ?>
                        <div class="meta-item">
                            <dt><?php esc_html_e('Certification', 'azit-industrial'); ?></dt>
                            <dd><?php esc_html_e('Certificate included', 'azit-industrial'); ?></dd>
                        </div>
                        <?php endif; ?>
                    </dl>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                <figure class="training-hero">
                    <?php
                    the_post_thumbnail('azit-hero', array(
                        'alt' => get_the_title(),
                        'class' => 'training-featured-image',
                    ));
                    ?>
                </figure>
                <?php endif; ?>

                <div class="training-content">

                    <!-- Description -->
                    <section class="training-description" aria-labelledby="description-heading">
                        <h2 id="description-heading" class="section-title">
                            <?php esc_html_e('Course Description', 'azit-industrial'); ?>
                        </h2>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </section>

                    <!-- Learning Objectives -->
                    <?php
                    $objectives = array();
                    if (function_exists('get_field')) {
                        $objectives = get_field('training_objectives');
                    }

                    if ($objectives && is_array($objectives)) :
                    ?>
                    <section class="training-objectives" aria-labelledby="objectives-heading">
                        <h2 id="objectives-heading" class="section-title">
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

                    <!-- Prerequisites -->
                    <?php
                    $prerequisites = '';
                    if (function_exists('get_field')) {
                        $prerequisites = get_field('training_prerequisites');
                    }

                    if ($prerequisites) :
                    ?>
                    <section class="training-prerequisites" aria-labelledby="prerequisites-heading">
                        <h2 id="prerequisites-heading" class="section-title">
                            <?php esc_html_e('Prerequisites', 'azit-industrial'); ?>
                        </h2>
                        <div class="prerequisites-content">
                            <?php echo wp_kses_post($prerequisites); ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <!-- Course Outline -->
                    <?php
                    $outline = array();
                    if (function_exists('get_field')) {
                        $outline = get_field('training_outline');
                    }

                    if ($outline && is_array($outline)) :
                    ?>
                    <section class="training-outline" aria-labelledby="outline-heading">
                        <h2 id="outline-heading" class="section-title">
                            <?php esc_html_e('Course Outline', 'azit-industrial'); ?>
                        </h2>

                        <ol class="outline-list">
                            <?php foreach ($outline as $index => $module) : ?>
                            <li class="outline-module">
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
                            </li>
                            <?php endforeach; ?>
                        </ol>
                    </section>
                    <?php endif; ?>

                    <!-- Target Audience -->
                    <?php
                    $audience = '';
                    if (function_exists('get_field')) {
                        $audience = get_field('training_audience');
                    }

                    if ($audience) :
                    ?>
                    <section class="training-audience" aria-labelledby="audience-heading">
                        <h2 id="audience-heading" class="section-title">
                            <?php esc_html_e('Who Should Attend', 'azit-industrial'); ?>
                        </h2>
                        <div class="audience-content">
                            <?php echo wp_kses_post($audience); ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <!-- Upcoming Sessions -->
                    <?php
                    $sessions = array();
                    if (function_exists('get_field')) {
                        $sessions = get_field('training_sessions');
                    }

                    if ($sessions && is_array($sessions)) :
                    ?>
                    <section class="training-sessions" aria-labelledby="sessions-heading">
                        <h2 id="sessions-heading" class="section-title">
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
                                    <?php foreach ($sessions as $session) : ?>
                                    <tr>
                                        <td>
                                            <time datetime="<?php echo esc_attr($session['session_date']); ?>">
                                                <?php echo esc_html(date_i18n(get_option('date_format'), strtotime($session['session_date']))); ?>
                                            </time>
                                        </td>
                                        <td><?php echo esc_html($session['session_location']); ?></td>
                                        <td>
                                            <?php
                                            $status_labels = array(
                                                'available' => __('Available', 'azit-industrial'),
                                                'limited'   => __('Limited Seats', 'azit-industrial'),
                                                'full'      => __('Fully Booked', 'azit-industrial'),
                                            );
                                            echo esc_html($status_labels[$session['session_status']] ?? $session['session_status']);
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($session['session_status'] !== 'full') : ?>
                                            <a href="<?php echo esc_url(home_url('/contact/?subject=training&course=' . urlencode(get_the_title()) . '&date=' . urlencode($session['session_date']))); ?>"
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

                <!-- CTA Section -->
                <section class="training-cta" aria-labelledby="cta-heading">
                    <h2 id="cta-heading" class="cta-title">
                        <?php esc_html_e('Ready to enroll?', 'azit-industrial'); ?>
                    </h2>
                    <p class="cta-text">
                        <?php esc_html_e('Contact us to register for this training or request a custom session for your team.', 'azit-industrial'); ?>
                    </p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(home_url('/contact/?subject=training&course=' . urlencode(get_the_title()))); ?>"
                           class="btn btn-primary">
                            <?php esc_html_e('Register Now', 'azit-industrial'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact/?subject=training&custom=true')); ?>"
                           class="btn btn-secondary">
                            <?php esc_html_e('Request Custom Training', 'azit-industrial'); ?>
                        </a>
                    </div>
                </section>

                <!-- Related Training -->
                <?php
                $related = new WP_Query(array(
                    'post_type'      => 'training',
                    'posts_per_page' => 3,
                    'post__not_in'   => array(get_the_ID()),
                    'orderby'        => 'rand',
                ));

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
