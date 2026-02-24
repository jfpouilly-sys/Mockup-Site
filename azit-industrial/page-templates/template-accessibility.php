<?php
/**
 * Template Name: Accessibility Statement
 * Template Post Type: page
 *
 * Custom template for the Accessibility Statement page.
 * RGAA 4.1.2 compliant - displays accessibility information.
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

            <article id="post-<?php the_ID(); ?>" <?php post_class('accessibility-page'); ?>>

                <header class="entry-header">
                    <h1 id="page-title" class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content accessibility-content">

                    <!-- Dynamic content from WordPress editor -->
                    <?php the_content(); ?>

                    <!-- Default Accessibility Statement Structure -->
                    <?php if (empty(get_the_content())) : ?>

                    <section aria-labelledby="commitment-heading">
                        <h2 id="commitment-heading"><?php esc_html_e('Accessibility Commitment', 'azit-industrial'); ?></h2>
                        <p>
                            <?php esc_html_e('AZIT is committed to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone and applying the relevant accessibility standards.', 'azit-industrial'); ?>
                        </p>
                    </section>

                    <section aria-labelledby="conformance-heading">
                        <h2 id="conformance-heading"><?php esc_html_e('Conformance Status', 'azit-industrial'); ?></h2>
                        <p>
                            <?php
                            printf(
                                /* translators: %1$s: conformance level, %2$s: standard name */
                                esc_html__('This website is %1$s with %2$s.', 'azit-industrial'),
                                '<strong>' . esc_html__('partially conformant', 'azit-industrial') . '</strong>',
                                '<abbr title="' . esc_attr__('Référentiel Général d\'Amélioration de l\'Accessibilité', 'azit-industrial') . '">RGAA 4.1.2</abbr>'
                            );
                            ?>
                        </p>
                        <p>
                            <?php esc_html_e('Partial conformance means that some parts of the content do not fully conform to the accessibility standard.', 'azit-industrial'); ?>
                        </p>

                        <h3><?php esc_html_e('Compliance Rate', 'azit-industrial'); ?></h3>
                        <p>
                            <strong><?php esc_html_e('Current compliance rate: 65-75%', 'azit-industrial'); ?></strong>
                        </p>
                    </section>

                    <section aria-labelledby="features-heading">
                        <h2 id="features-heading"><?php esc_html_e('Accessibility Features', 'azit-industrial'); ?></h2>
                        <p><?php esc_html_e('This website includes the following accessibility features:', 'azit-industrial'); ?></p>

                        <h3><?php esc_html_e('Navigation', 'azit-industrial'); ?></h3>
                        <ul>
                            <li><?php esc_html_e('Skip link to main content', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Consistent navigation structure', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Breadcrumb navigation', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Keyboard accessible dropdown menus', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Site map available', 'azit-industrial'); ?></li>
                        </ul>

                        <h3><?php esc_html_e('Visual Design', 'azit-industrial'); ?></h3>
                        <ul>
                            <li><?php esc_html_e('WCAG AA compliant color contrast (minimum 4.5:1)', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Visible focus indicators', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Responsive design for all screen sizes', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('No content relies solely on color', 'azit-industrial'); ?></li>
                        </ul>

                        <h3><?php esc_html_e('Content', 'azit-industrial'); ?></h3>
                        <ul>
                            <li><?php esc_html_e('Proper heading hierarchy (H1-H6)', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Descriptive link text', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Alternative text for images', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Clear and simple language', 'azit-industrial'); ?></li>
                        </ul>

                        <h3><?php esc_html_e('Technical', 'azit-industrial'); ?></h3>
                        <ul>
                            <li><?php esc_html_e('Valid HTML5 markup', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('ARIA landmarks and roles', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Reduced motion support', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Form labels and error messages', 'azit-industrial'); ?></li>
                        </ul>
                    </section>

                    <section aria-labelledby="limitations-heading">
                        <h2 id="limitations-heading"><?php esc_html_e('Known Limitations', 'azit-industrial'); ?></h2>
                        <p><?php esc_html_e('Despite our best efforts to ensure accessibility, there may be some limitations:', 'azit-industrial'); ?></p>
                        <ul>
                            <li><?php esc_html_e('Some older PDF documents may not be fully accessible', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Third-party content (embedded videos, maps) may have varying levels of accessibility', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Some complex data tables may require additional context', 'azit-industrial'); ?></li>
                        </ul>
                    </section>

                    <section aria-labelledby="technologies-heading">
                        <h2 id="technologies-heading"><?php esc_html_e('Technologies Used', 'azit-industrial'); ?></h2>
                        <p><?php esc_html_e('This website relies on the following technologies:', 'azit-industrial'); ?></p>
                        <ul>
                            <li>HTML5</li>
                            <li>CSS3</li>
                            <li>JavaScript (ES6+)</li>
                            <li>WAI-ARIA 1.2</li>
                            <li>WordPress 6.4+</li>
                        </ul>
                    </section>

                    <section aria-labelledby="testing-heading">
                        <h2 id="testing-heading"><?php esc_html_e('Assessment Methods', 'azit-industrial'); ?></h2>
                        <p><?php esc_html_e('AZIT assessed the accessibility of this website using the following methods:', 'azit-industrial'); ?></p>
                        <ul>
                            <li><?php esc_html_e('Self-evaluation using RGAA 4.1.2 criteria', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Automated testing with axe-core and WAVE', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Manual testing with screen readers (NVDA, VoiceOver)', 'azit-industrial'); ?></li>
                            <li><?php esc_html_e('Keyboard-only navigation testing', 'azit-industrial'); ?></li>
                        </ul>
                    </section>

                    <section aria-labelledby="feedback-heading">
                        <h2 id="feedback-heading"><?php esc_html_e('Feedback', 'azit-industrial'); ?></h2>
                        <p>
                            <?php esc_html_e('We welcome your feedback on the accessibility of the AZIT website. Please let us know if you encounter accessibility barriers:', 'azit-industrial'); ?>
                        </p>
                        <ul>
                            <li>
                                <?php esc_html_e('Email:', 'azit-industrial'); ?>
                                <a href="mailto:accessibility@azit.com">accessibility@azit.com</a>
                            </li>
                            <li>
                                <?php esc_html_e('Phone:', 'azit-industrial'); ?>
                                <a href="tel:+33123456789">+33 1 23 45 67 89</a>
                            </li>
                            <li>
                                <?php esc_html_e('Contact form:', 'azit-industrial'); ?>
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                                    <?php esc_html_e('Contact page', 'azit-industrial'); ?>
                                </a>
                            </li>
                        </ul>
                        <p>
                            <?php esc_html_e('We try to respond to feedback within 5 business days.', 'azit-industrial'); ?>
                        </p>
                    </section>

                    <section aria-labelledby="enforcement-heading">
                        <h2 id="enforcement-heading"><?php esc_html_e('Enforcement Procedure', 'azit-industrial'); ?></h2>
                        <p>
                            <?php esc_html_e('If you are not satisfied with our response to your accessibility concern, you may contact:', 'azit-industrial'); ?>
                        </p>
                        <p>
                            <strong><?php esc_html_e('Défenseur des droits', 'azit-industrial'); ?></strong><br>
                            <?php esc_html_e('Website:', 'azit-industrial'); ?>
                            <a href="https://www.defenseurdesdroits.fr" target="_blank" rel="noopener noreferrer">
                                www.defenseurdesdroits.fr
                                <span class="sr-only"><?php esc_html_e('(opens in new window)', 'azit-industrial'); ?></span>
                            </a>
                        </p>
                    </section>

                    <?php endif; ?>

                    <!-- Statement metadata -->
                    <section class="statement-metadata" aria-labelledby="metadata-heading">
                        <h2 id="metadata-heading"><?php esc_html_e('Statement Information', 'azit-industrial'); ?></h2>
                        <dl>
                            <dt><?php esc_html_e('Statement created:', 'azit-industrial'); ?></dt>
                            <dd>
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </dd>

                            <dt><?php esc_html_e('Last updated:', 'azit-industrial'); ?></dt>
                            <dd>
                                <time datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                                    <?php echo esc_html(get_the_modified_date()); ?>
                                </time>
                            </dd>

                            <dt><?php esc_html_e('Standard:', 'azit-industrial'); ?></dt>
                            <dd>RGAA 4.1.2 / WCAG 2.1 Level AA</dd>
                        </dl>
                    </section>

                </div>

            </article>

        <?php endwhile; ?>

    </div>

</main>

<?php
get_footer();
