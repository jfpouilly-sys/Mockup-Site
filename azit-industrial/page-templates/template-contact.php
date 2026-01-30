<?php
/**
 * Template Name: Contact Page
 * Template Post Type: page
 *
 * Custom template for the Contact page.
 * Includes accessible contact form and contact information.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="page-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('contact-page'); ?>>

                <header class="entry-header">
                    <h1 id="page-title" class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="contact-layout">

                    <!-- Contact Form Section -->
                    <section class="contact-form-section" aria-labelledby="form-heading">
                        <h2 id="form-heading" class="section-title">
                            <?php esc_html_e('Send us a message', 'azit-industrial'); ?>
                        </h2>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        // Check for Contact Form 7
                        if (shortcode_exists('contact-form-7')) :
                            // Get contact form from custom field or use default
                            $form_id = '';
                            if (function_exists('get_field')) {
                                $form_id = get_field('contact_form_id');
                            }
                            if ($form_id) {
                                echo do_shortcode('[contact-form-7 id="' . intval($form_id) . '"]');
                            } else {
                                // Display content which should include the shortcode
                            }
                        else :
                            // Fallback accessible contact form
                        ?>
                        <form id="contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="contact-form" novalidate>
                            <?php wp_nonce_field('azit_contact_form', 'azit_contact_nonce'); ?>
                            <input type="hidden" name="action" value="azit_contact_form">

                            <div class="form-field">
                                <label for="contact-name">
                                    <?php esc_html_e('Full Name', 'azit-industrial'); ?>
                                    <span class="required" aria-hidden="true">*</span>
                                </label>
                                <input type="text"
                                       id="contact-name"
                                       name="contact_name"
                                       required
                                       autocomplete="name"
                                       aria-required="true">
                            </div>

                            <div class="form-field">
                                <label for="contact-email">
                                    <?php esc_html_e('Email Address', 'azit-industrial'); ?>
                                    <span class="required" aria-hidden="true">*</span>
                                </label>
                                <input type="email"
                                       id="contact-email"
                                       name="contact_email"
                                       required
                                       autocomplete="email"
                                       aria-required="true">
                            </div>

                            <div class="form-field">
                                <label for="contact-company">
                                    <?php esc_html_e('Company', 'azit-industrial'); ?>
                                </label>
                                <input type="text"
                                       id="contact-company"
                                       name="contact_company"
                                       autocomplete="organization">
                            </div>

                            <div class="form-field">
                                <label for="contact-phone">
                                    <?php esc_html_e('Phone Number', 'azit-industrial'); ?>
                                </label>
                                <input type="tel"
                                       id="contact-phone"
                                       name="contact_phone"
                                       autocomplete="tel">
                            </div>

                            <div class="form-field">
                                <label for="contact-subject">
                                    <?php esc_html_e('Subject', 'azit-industrial'); ?>
                                    <span class="required" aria-hidden="true">*</span>
                                </label>
                                <select id="contact-subject" name="contact_subject" required aria-required="true">
                                    <option value=""><?php esc_html_e('Please select...', 'azit-industrial'); ?></option>
                                    <option value="expertise"><?php esc_html_e('Expertise Inquiry', 'azit-industrial'); ?></option>
                                    <option value="products"><?php esc_html_e('Product Information', 'azit-industrial'); ?></option>
                                    <option value="training"><?php esc_html_e('Training Programs', 'azit-industrial'); ?></option>
                                    <option value="support"><?php esc_html_e('Technical Support', 'azit-industrial'); ?></option>
                                    <option value="partnership"><?php esc_html_e('Partnership', 'azit-industrial'); ?></option>
                                    <option value="other"><?php esc_html_e('Other', 'azit-industrial'); ?></option>
                                </select>
                            </div>

                            <div class="form-field form-field-full">
                                <label for="contact-message">
                                    <?php esc_html_e('Message', 'azit-industrial'); ?>
                                    <span class="required" aria-hidden="true">*</span>
                                </label>
                                <textarea id="contact-message"
                                          name="contact_message"
                                          rows="6"
                                          required
                                          aria-required="true"></textarea>
                            </div>

                            <div class="form-field form-field-full">
                                <p class="form-required-note">
                                    <span class="required" aria-hidden="true">*</span>
                                    <?php esc_html_e('Required fields', 'azit-industrial'); ?>
                                </p>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <?php esc_html_e('Send Message', 'azit-industrial'); ?>
                                </button>
                            </div>
                        </form>
                        <?php endif; ?>
                    </section>

                    <!-- Contact Information Section -->
                    <aside class="contact-info-section" aria-labelledby="info-heading">
                        <h2 id="info-heading" class="section-title">
                            <?php esc_html_e('Contact Information', 'azit-industrial'); ?>
                        </h2>

                        <address class="contact-details">
                            <div class="contact-item">
                                <h3><?php esc_html_e('Address', 'azit-industrial'); ?></h3>
                                <p>
                                    AZIT<br>
                                    123 Industrial Avenue<br>
                                    75000 Paris, France
                                </p>
                            </div>

                            <div class="contact-item">
                                <h3><?php esc_html_e('Phone', 'azit-industrial'); ?></h3>
                                <p>
                                    <a href="tel:+33123456789">+33 1 23 45 67 89</a>
                                </p>
                            </div>

                            <div class="contact-item">
                                <h3><?php esc_html_e('Email', 'azit-industrial'); ?></h3>
                                <p>
                                    <a href="mailto:contact@azit.com">contact@azit.com</a>
                                </p>
                            </div>

                            <div class="contact-item">
                                <h3><?php esc_html_e('Business Hours', 'azit-industrial'); ?></h3>
                                <p>
                                    <?php esc_html_e('Monday - Friday: 9:00 - 18:00', 'azit-industrial'); ?><br>
                                    <?php esc_html_e('Saturday - Sunday: Closed', 'azit-industrial'); ?>
                                </p>
                            </div>
                        </address>

                        <!-- Map placeholder -->
                        <div class="contact-map">
                            <h3><?php esc_html_e('Our Location', 'azit-industrial'); ?></h3>
                            <div class="map-container" aria-label="<?php esc_attr_e('Map showing AZIT location', 'azit-industrial'); ?>">
                                <?php
                                // Custom field for embedded map
                                if (function_exists('get_field') && get_field('contact_map_embed')) {
                                    echo get_field('contact_map_embed');
                                } else {
                                    echo '<p>' . esc_html__('Interactive map coming soon.', 'azit-industrial') . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </aside>

                </div>

            </article>

        <?php endwhile; ?>

    </div>

</main>

<?php
get_footer();
