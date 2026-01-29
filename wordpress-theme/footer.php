<?php
/**
 * The Footer Template
 *
 * Contains the closing of the #content div and all content after.
 * Includes:
 * - Footer widgets
 * - Footer navigation
 * - Accessibility badge (RGAA requirement)
 * - Copyright notice
 * - Back to top link
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Footer -->
<footer role="contentinfo" class="site-footer" id="site-footer">
    <div class="footer-container">

        <!-- Footer Widgets Area -->
        <?php if (is_active_sidebar('footer-widgets')) : ?>
        <div class="footer-widgets">
            <div class="container">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Footer Main Content -->
        <div class="footer-main">
            <div class="container">

                <!-- Company Information -->
                <div class="footer-company">
                    <?php if (has_custom_logo()) : ?>
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        ?>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($custom_logo_id, 'medium')); ?>"
                             alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                             class="footer-logo"
                             width="100"
                             height="33" />
                    <?php else : ?>
                        <span class="footer-site-title"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>

                    <p class="footer-tagline">
                        <?php
                        $tagline = get_bloginfo('description');
                        if ($tagline) {
                            echo esc_html($tagline);
                        } else {
                            esc_html_e('Industrial Communication Solutions', 'azit-industrial');
                        }
                        ?>
                    </p>

                    <!-- Contact Information -->
                    <address class="footer-contact">
                        <p>
                            <strong><?php esc_html_e('Address:', 'azit-industrial'); ?></strong><br>
                            AZIT<br>
                            123 Industrial Avenue<br>
                            75000 Paris, France
                        </p>
                        <p>
                            <strong><?php esc_html_e('Phone:', 'azit-industrial'); ?></strong>
                            <a href="tel:+33123456789">+33 1 23 45 67 89</a>
                        </p>
                        <p>
                            <strong><?php esc_html_e('Email:', 'azit-industrial'); ?></strong>
                            <a href="mailto:contact@azit.com">contact@azit.com</a>
                        </p>
                    </address>
                </div>

                <!-- Footer Navigation -->
                <div class="footer-nav-section">
                    <h2 class="footer-nav-title"><?php esc_html_e('Quick Links', 'azit-industrial'); ?></h2>
                    <nav aria-label="<?php esc_attr_e('Footer navigation', 'azit-industrial'); ?>"
                         class="footer-navigation">
                        <?php
                        if (has_nav_menu('footer')) :
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'container'      => false,
                                'menu_class'     => 'footer-menu',
                                'menu_id'        => 'footer-menu',
                                'depth'          => 1,
                                'fallback_cb'    => false,
                            ));
                        else :
                            // Fallback footer menu
                        ?>
                            <ul class="footer-menu">
                                <li><a href="<?php echo esc_url(home_url('/mentions-legales/')); ?>"><?php esc_html_e('Legal Mentions', 'azit-industrial'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/politique-confidentialite/')); ?>"><?php esc_html_e('Privacy Policy', 'azit-industrial'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/plan-du-site/')); ?>"><?php esc_html_e('Site Map', 'azit-industrial'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/accessibilite/')); ?>"><?php esc_html_e('Accessibility', 'azit-industrial'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </nav>
                </div>

                <!-- Social Links (Optional) -->
                <div class="footer-social">
                    <h2 class="footer-social-title"><?php esc_html_e('Follow Us', 'azit-industrial'); ?></h2>
                    <ul class="social-links" aria-label="<?php esc_attr_e('Social media links', 'azit-industrial'); ?>">
                        <li>
                            <a href="https://www.linkedin.com/company/azit"
                               target="_blank"
                               rel="noopener noreferrer"
                               aria-label="<?php esc_attr_e('LinkedIn (opens in new window)', 'azit-industrial'); ?>">
                                <span aria-hidden="true">in</span>
                                <span class="sr-only">LinkedIn</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/azit_industrial"
                               target="_blank"
                               rel="noopener noreferrer"
                               aria-label="<?php esc_attr_e('Twitter (opens in new window)', 'azit-industrial'); ?>">
                                <span aria-hidden="true">X</span>
                                <span class="sr-only">Twitter</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="footer-bottom">
            <div class="container">

                <!-- Accessibility Badge - RGAA Requirement -->
                <div class="accessibility-badge">
                    <a href="<?php echo esc_url(home_url('/accessibilite/')); ?>"
                       aria-describedby="accessibility-description">
                        <?php esc_html_e('Accessibility: partially compliant', 'azit-industrial'); ?>
                    </a>
                    <span id="accessibility-description" class="sr-only">
                        <?php esc_html_e('View our accessibility statement for more information', 'azit-industrial'); ?>
                    </span>
                </div>

                <!-- Copyright -->
                <div class="site-info">
                    <p>
                        &copy; <?php echo esc_html(date('Y')); ?>
                        <?php bloginfo('name'); ?>.
                        <?php esc_html_e('All rights reserved.', 'azit-industrial'); ?>
                    </p>
                </div>

                <!-- RGAA/WCAG Compliance Badge -->
                <div class="compliance-badges">
                    <span class="compliance-badge" title="<?php esc_attr_e('RGAA 4.1.2 Compliant', 'azit-industrial'); ?>">
                        RGAA 4.1.2
                    </span>
                    <span class="compliance-badge" title="<?php esc_attr_e('WCAG 2.1 Level AA', 'azit-industrial'); ?>">
                        WCAG AA
                    </span>
                </div>

            </div>
        </div>

    </div>
</footer>

<!-- Back to Top Link -->
<a href="#main-content"
   class="back-to-top"
   aria-label="<?php esc_attr_e('Back to top of page', 'azit-industrial'); ?>"
   id="back-to-top"
   hidden>
    <span aria-hidden="true">&uarr;</span>
    <span class="sr-only"><?php esc_html_e('Back to top', 'azit-industrial'); ?></span>
</a>

<?php wp_footer(); ?>

</body>
</html>
