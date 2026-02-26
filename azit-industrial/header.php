<?php
/**
 * The Header Template
 *
 * Displays all of the <head> section and header matching
 * the original static site structure exactly.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-lang="<?php echo esc_attr(substr(get_locale(), 0, 2)); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Skip to content for accessibility -->
    <a href="#main-content" class="skip-link"><?php esc_html_e('Skip to main content', 'azit-industrial'); ?></a>

    <!-- ARIA Live Region for Announcements -->
    <div id="aria-live-region" aria-live="polite" aria-atomic="true"></div>

    <!-- Top Menu -->
    <div class="top-menu">
        <div class="top-menu-container">
            <nav class="top-menu-nav" aria-label="<?php esc_attr_e('Company information and settings', 'azit-industrial'); ?>">
                <!-- Company Link -->
                <a href="<?php echo esc_url(home_url('/company/')); ?>" class="top-menu-link"><?php esc_html_e('Company', 'azit-industrial'); ?></a>

                <!-- Blog & News Link -->
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="top-menu-link"><?php esc_html_e('Blog & News', 'azit-industrial'); ?></a>
            </nav>

            <!-- Language Switcher -->
            <div class="language-switcher" aria-label="<?php esc_attr_e('Language selection', 'azit-industrial'); ?>">
                <?php if (function_exists('azit_is_wpml_active') && azit_is_wpml_active()) : ?>
                    <?php
                    $languages = azit_get_languages();
                    foreach ($languages as $lang) :
                    ?>
                    <a href="<?php echo esc_url($lang['url']); ?>"
                       class="language-button <?php echo $lang['is_current'] ? 'active' : ''; ?>"
                       data-lang="<?php echo esc_attr($lang['code']); ?>"
                       lang="<?php echo esc_attr($lang['code']); ?>"
                       hreflang="<?php echo esc_attr($lang['code']); ?>">
                        <?php echo esc_html(strtoupper($lang['code'])); ?>
                    </a>
                    <?php if ($lang !== end($languages)) : ?>
                        <span class="language-separator" aria-hidden="true">|</span>
                    <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="language-button active" data-lang="en" lang="en" hreflang="en">EN</a>
                    <span class="language-separator" aria-hidden="true">|</span>
                    <a href="<?php echo esc_url(home_url('/fr/')); ?>" class="language-button" data-lang="fr" lang="fr" hreflang="fr">FR</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header" id="header" role="banner">
        <div class="container header__container">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo" aria-label="<?php esc_attr_e('AZIT Homepage', 'azit-industrial'); ?>">
                <?php if (has_custom_logo()) : ?>
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    echo wp_get_attachment_image($custom_logo_id, 'full', false, array(
                        'class' => 'custom-logo',
                        'alt'   => get_bloginfo('name'),
                    ));
                    ?>
                <?php else : ?>
                    <span>AZIT</span>
                <?php endif; ?>
            </a>

            <nav class="header__nav" id="main-nav" aria-label="<?php esc_attr_e('Main navigation', 'azit-industrial'); ?>">
                <ul class="nav__list">
                    <!-- Products Mega Menu -->
                    <li class="nav__item">
                        <a href="<?php echo esc_url(home_url('/products/')); ?>" class="nav__link">
                            <?php esc_html_e('Products', 'azit-industrial'); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="mega-menu">
                            <div class="mega-menu__grid">
                                <div class="mega-menu__section">
                                    <a href="<?php echo esc_url(home_url('/products/communication-stacks/')); ?>" class="mega-menu__title" style="cursor: pointer; text-decoration: none; color: inherit;"><?php esc_html_e('COMMUNICATION STACKS', 'azit-industrial'); ?></a>
                                    <ul class="mega-menu__list">
                                        <li style="font-weight: 600; margin-top: 0.5rem; margin-bottom: 0.25rem; color: var(--color-gray-700);"><?php esc_html_e('Safety Protocols', 'azit-industrial'); ?></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/fsoe-slave/')); ?>" class="mega-menu__link"><?php esc_html_e('FSoE Slave', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/fsoe-master/')); ?>" class="mega-menu__link"><?php esc_html_e('FSoE Master', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/profisafe-slave/')); ?>" class="mega-menu__link"><?php esc_html_e('PROFISAFE Slave', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/profisafe-master/')); ?>" class="mega-menu__link"><?php esc_html_e('PROFISAFE Master', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/canopen-safety-slave/')); ?>" class="mega-menu__link"><?php esc_html_e('CANopen Safety Slave', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/canopen-safety-master/')); ?>" class="mega-menu__link"><?php esc_html_e('CANopen Safety Master', 'azit-industrial'); ?></a></li>
                                        <li style="font-weight: 600; margin-top: 0.5rem; margin-bottom: 0.25rem; color: var(--color-gray-700);"><?php esc_html_e('Fieldbus Protocols', 'azit-industrial'); ?></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/canopen-slave/')); ?>" class="mega-menu__link"><?php esc_html_e('CANopen Slave', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/canopen-master/')); ?>" class="mega-menu__link"><?php esc_html_e('CANopen Master', 'azit-industrial'); ?></a></li>
                                        <li style="font-weight: 600; margin-top: 0.5rem; margin-bottom: 0.25rem; color: var(--color-gray-700);"><?php esc_html_e('Automotive', 'azit-industrial'); ?></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/j1939/')); ?>" class="mega-menu__link"><?php esc_html_e('J1939', 'azit-industrial'); ?></a></li>
                                        <li style="font-weight: 600; margin-top: 0.5rem; margin-bottom: 0.25rem; color: var(--color-gray-700);"><?php esc_html_e('Industrial IoT', 'azit-industrial'); ?></li>
                                        <li><a href="<?php echo esc_url(home_url('/products/opc-ua/')); ?>" class="mega-menu__link"><?php esc_html_e('OPC-UA (Coming Soon)', 'azit-industrial'); ?></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu__section">
                                    <div class="mega-menu__title"><?php esc_html_e('PROTOCOL GATEWAYS', 'azit-industrial'); ?></div>
                                    <ul class="mega-menu__list">
                                        <li><a href="<?php echo esc_url(home_url('/products/protocol-gateway/')); ?>" class="mega-menu__link"><?php esc_html_e('ISI-GTW Gateway Platform', 'azit-industrial'); ?></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu__section">
                                    <div class="mega-menu__title"><?php esc_html_e('TOOLS', 'azit-industrial'); ?></div>
                                    <ul class="mega-menu__list">
                                        <li><a href="<?php echo esc_url(home_url('/products/simulation/')); ?>" class="mega-menu__link"><?php esc_html_e('EtherCAT Simulator', 'azit-industrial'); ?></a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu__section">
                                    <div class="mega-menu__title"><?php esc_html_e('HARDWARE', 'azit-industrial'); ?></div>
                                    <ul class="mega-menu__list">
                                        <li><a href="<?php echo esc_url(home_url('/products/protocol-gateway/')); ?>" class="mega-menu__link"><?php esc_html_e('Hardware Solutions Overview', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mega-menu__link"><?php esc_html_e('Custom Development Boards', 'azit-industrial'); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Expertise Mega Menu -->
                    <li class="nav__item">
                        <a href="<?php echo esc_url(home_url('/expertise/')); ?>" class="nav__link">
                            <?php esc_html_e('Expertise', 'azit-industrial'); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="mega-menu">
                            <div class="mega-menu__grid">
                                <div class="mega-menu__section">
                                    <a href="<?php echo esc_url(home_url('/expertise/')); ?>" class="mega-menu__title" style="cursor: pointer; text-decoration: none; color: inherit;"><?php esc_html_e('OUR EXPERTISE', 'azit-industrial'); ?></a>
                                    <ul class="mega-menu__list">
                                        <li><a href="<?php echo esc_url(home_url('/expertise/safety-compliance/')); ?>" class="mega-menu__link"><?php esc_html_e('Safety Compliance', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/expertise/protocol-development/')); ?>" class="mega-menu__link"><?php esc_html_e('Protocol Development', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/expertise/testing-validation/')); ?>" class="mega-menu__link"><?php esc_html_e('Testing & Validation', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/expertise/industrial-networks/')); ?>" class="mega-menu__link"><?php esc_html_e('Industrial Networks', 'azit-industrial'); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Training Mega Menu -->
                    <li class="nav__item">
                        <a href="<?php echo esc_url(home_url('/training/')); ?>" class="nav__link">
                            <?php esc_html_e('Training', 'azit-industrial'); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="mega-menu">
                            <div class="mega-menu__grid">
                                <div class="mega-menu__section">
                                    <a href="<?php echo esc_url(home_url('/training/')); ?>" class="mega-menu__title" style="cursor: pointer; text-decoration: none; color: inherit;"><?php esc_html_e('TRAINING COURSES', 'azit-industrial'); ?></a>
                                    <ul class="mega-menu__list">
                                        <li><a href="<?php echo esc_url(home_url('/training/#protocols')); ?>" class="mega-menu__link"><?php esc_html_e('Protocol Training', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/training/#safety')); ?>" class="mega-menu__link"><?php esc_html_e('Safety Standards', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/training/#workshops')); ?>" class="mega-menu__link"><?php esc_html_e('Hands-on Workshops', 'azit-industrial'); ?></a></li>
                                        <li><a href="<?php echo esc_url(home_url('/training/#custom')); ?>" class="mega-menu__link"><?php esc_html_e('Custom Training', 'azit-industrial'); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Request Quote Button -->
                    <li class="nav__item">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--secondary btn--small"><?php esc_html_e('Request Quote', 'azit-industrial'); ?></a>
                    </li>
                </ul>
            </nav>

            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="<?php esc_attr_e('Toggle mobile menu', 'azit-industrial'); ?>" aria-expanded="false">
                <span class="mobile-menu-toggle__line"></span>
                <span class="mobile-menu-toggle__line"></span>
                <span class="mobile-menu-toggle__line"></span>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main-content" role="main" tabindex="-1">
