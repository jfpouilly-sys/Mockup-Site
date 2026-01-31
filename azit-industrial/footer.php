<?php
/**
 * The Footer Template
 *
 * Matches the original static site footer structure.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
    </main>

    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__brand">
                    <div class="footer__logo">AZIT</div>
                    <p class="footer__tagline"><?php esc_html_e('A brand of ISIT', 'azit-industrial'); ?></p>
                    <img src="https://isit.fr/en/assets/img/logo-ISIT-2022-md.svg" alt="ISIT Logo" style="max-width: 120px; margin-top: 1rem;">
                    <p class="footer__tagline"><?php esc_html_e('30+ years expertise in embedded systems', 'azit-industrial'); ?></p>
                </div>

                <div>
                    <h3 class="footer__section-title"><?php esc_html_e('Products', 'azit-industrial'); ?></h3>
                    <ul class="footer__list">
                        <li><a href="<?php echo esc_url(home_url('/products/protocol-gateway/')); ?>" class="footer__link"><?php esc_html_e('Gateway', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/simulation/')); ?>" class="footer__link"><?php esc_html_e('Simulation', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/fsoe-slave/')); ?>" class="footer__link"><?php esc_html_e('FSoE', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/canopen-slave/')); ?>" class="footer__link"><?php esc_html_e('CANopen', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/canopen-safety-slave/')); ?>" class="footer__link"><?php esc_html_e('CANopen Safety', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/j1939/')); ?>" class="footer__link"><?php esc_html_e('J1939', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/tools/')); ?>" class="footer__link"><?php esc_html_e('Tools', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/analyzers/')); ?>" class="footer__link"><?php esc_html_e('Analyzers', 'azit-industrial'); ?></a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer__section-title"><?php esc_html_e('Expertise', 'azit-industrial'); ?></h3>
                    <ul class="footer__list">
                        <li><a href="<?php echo esc_url(home_url('/expertise/')); ?>" class="footer__link"><?php esc_html_e('Our Expertise', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/expertise/safety-compliance/')); ?>" class="footer__link"><?php esc_html_e('Safety Compliance', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/expertise/protocol-development/')); ?>" class="footer__link"><?php esc_html_e('Protocol Development', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/expertise/testing-validation/')); ?>" class="footer__link"><?php esc_html_e('Testing & Validation', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/expertise/industrial-networks/')); ?>" class="footer__link"><?php esc_html_e('Industrial Networks', 'azit-industrial'); ?></a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer__section-title"><?php esc_html_e('Resources', 'azit-industrial'); ?></h3>
                    <ul class="footer__list">
                        <li><a href="<?php echo esc_url(home_url('/training/')); ?>" class="footer__link"><?php esc_html_e('Training', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>" class="footer__link"><?php esc_html_e('Blog', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/company/')); ?>" class="footer__link"><?php esc_html_e('Company', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="footer__link"><?php esc_html_e('About', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="footer__link"><?php esc_html_e('Contact', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/partners/')); ?>" class="footer__link"><?php esc_html_e('Partners', 'azit-industrial'); ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="footer__bottom">
                <p class="footer__copyright">&copy; <?php echo esc_html(date('Y')); ?> AZIT - ISIT. <?php esc_html_e('All rights reserved.', 'azit-industrial'); ?> | Version 7</p>
                <nav aria-label="<?php esc_attr_e('Footer links', 'azit-industrial'); ?>">
                    <ul class="footer__social">
                        <li><a href="<?php echo esc_url(home_url('/privacy/')); ?>" class="footer__social-link"><?php esc_html_e('Privacy', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/terms/')); ?>" class="footer__social-link"><?php esc_html_e('Terms', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/sitemap/')); ?>" class="footer__social-link"><?php esc_html_e('Site Map', 'azit-industrial'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/accessibility/')); ?>" class="footer__social-link"><?php esc_html_e('Accessibility', 'azit-industrial'); ?></a></li>
                    </ul>
                </nav>
            </div>

            <p style="text-align: center; margin-top: 1rem;">
                <a href="<?php echo esc_url(home_url('/accessibility/')); ?>" class="a11y-badge">
                    <?php esc_html_e('Accessibility: Partially Compliant', 'azit-industrial'); ?>
                </a>
            </p>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
