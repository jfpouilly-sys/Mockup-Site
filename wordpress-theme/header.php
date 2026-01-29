<?php
/**
 * The Header Template
 *
 * Displays all of the <head> section and header including:
 * - Skip link (RGAA Criterion 12.7)
 * - ARIA landmarks
 * - Top navigation
 * - Primary navigation with accessible dropdown menus
 * - Mobile menu toggle
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
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Skip link is added via wp_body_open hook in functions.php
// ARIA live regions are added via wp_body_open hook in functions.php
?>

<!-- Top Navigation Bar -->
<nav aria-label="<?php esc_attr_e('Company information and settings', 'azit-industrial'); ?>"
     class="top-nav"
     id="top-navigation">
    <div class="container">
        <div class="top-nav-content">

            <?php
            // Top menu (Company, Blog & News)
            if (has_nav_menu('top-menu')) :
                wp_nav_menu(array(
                    'theme_location' => 'top-menu',
                    'container'      => false,
                    'menu_class'     => 'top-menu-list',
                    'menu_id'        => 'top-menu',
                    'walker'         => new AZIT_Walker_Nav_Menu(),
                    'depth'          => 2,
                    'fallback_cb'    => false,
                ));
            endif;
            ?>

            <!-- Language Switcher (WPML Compatible) -->
            <?php if (function_exists('icl_get_languages')) : ?>
                <?php
                $languages = icl_get_languages('skip_missing=0');
                if (!empty($languages)) :
                    $current_lang = ICL_LANGUAGE_CODE;
                    $current_lang_name = isset($languages[$current_lang]) ? $languages[$current_lang]['native_name'] : '';
                ?>
                <div class="language-switcher">
                    <button type="button"
                            aria-label="<?php echo esc_attr(sprintf(
                                /* translators: %s: current language name */
                                __('Language selection. Current language: %s', 'azit-industrial'),
                                $current_lang_name
                            )); ?>"
                            aria-expanded="false"
                            aria-controls="language-menu"
                            id="language-toggle"
                            class="language-toggle">
                        <span aria-hidden="true">&#127760;</span>
                        <span class="current-lang"><?php echo esc_html(strtoupper($current_lang)); ?></span>
                        <span class="sr-only"><?php esc_html_e('Change language', 'azit-industrial'); ?></span>
                    </button>
                    <ul id="language-menu" class="language-menu" role="menu" hidden>
                        <?php foreach ($languages as $lang) : ?>
                        <li role="none">
                            <a href="<?php echo esc_url($lang['url']); ?>"
                               role="menuitem"
                               lang="<?php echo esc_attr($lang['language_code']); ?>"
                               hreflang="<?php echo esc_attr($lang['language_code']); ?>"
                               <?php if ($lang['active']) : ?>aria-current="page"<?php endif; ?>>
                                <?php echo esc_html($lang['native_name']); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            <?php else : ?>
                <!-- Fallback language links when WPML not active -->
                <div class="language-switcher language-links">
                    <span class="sr-only"><?php esc_html_e('Language:', 'azit-industrial'); ?></span>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       lang="fr"
                       hreflang="fr"
                       <?php if (get_locale() === 'fr_FR') : ?>aria-current="page"<?php endif; ?>>
                        FR
                    </a>
                    <span aria-hidden="true">|</span>
                    <a href="<?php echo esc_url(home_url('/en/')); ?>"
                       lang="en"
                       hreflang="en"
                       <?php if (strpos(get_locale(), 'en') === 0) : ?>aria-current="page"<?php endif; ?>>
                        EN
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</nav>

<!-- Main Header -->
<header role="banner" class="site-header" id="site-header">
    <div class="header-container">

        <!-- Site Branding / Logo -->
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php
                // Get custom logo with proper accessibility
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_attr = array(
                    'class' => 'custom-logo',
                    'alt'   => get_bloginfo('name') . ' - ' . __('Home', 'azit-industrial'),
                );
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="custom-logo-link"
                   rel="home"
                   aria-label="<?php echo esc_attr(get_bloginfo('name') . ' - ' . __('Return to homepage', 'azit-industrial')); ?>">
                    <?php echo wp_get_attachment_image($custom_logo_id, 'full', false, $logo_attr); ?>
                </a>
            <?php else : ?>
                <!-- Text fallback when no logo is set -->
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="site-title-link"
                   rel="home"
                   aria-label="<?php echo esc_attr(get_bloginfo('name') . ' - ' . __('Return to homepage', 'azit-industrial')); ?>">
                    <?php if (file_exists(AZIT_THEME_DIR . '/assets/images/logo.svg')) : ?>
                        <img src="<?php echo esc_url(AZIT_THEME_URI . '/assets/images/logo.svg'); ?>"
                             alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                             class="site-logo"
                             width="120"
                             height="40" />
                    <?php else : ?>
                        <span class="site-title"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        </div>

        <!-- Primary Navigation -->
        <nav aria-label="<?php esc_attr_e('Main navigation', 'azit-industrial'); ?>"
             class="main-navigation"
             id="primary-navigation">
            <?php
            if (has_nav_menu('primary')) :
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'primary-menu',
                    'menu_id'        => 'primary-menu',
                    'walker'         => new AZIT_Walker_Nav_Menu(),
                    'depth'          => 3,
                    'fallback_cb'    => false,
                ));
            else :
                // Fallback menu for development/testing
            ?>
                <ul class="primary-menu">
                    <li><a href="<?php echo esc_url(home_url('/products/')); ?>"><?php esc_html_e('Products', 'azit-industrial'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/expertise/')); ?>"><?php esc_html_e('Expertise', 'azit-industrial'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/training/')); ?>"><?php esc_html_e('Training', 'azit-industrial'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact', 'azit-industrial'); ?></a></li>
                </ul>
            <?php endif; ?>
        </nav>

        <!-- Mobile Menu Toggle Button -->
        <button type="button"
                class="mobile-menu-toggle"
                aria-expanded="false"
                aria-controls="mobile-navigation"
                aria-label="<?php esc_attr_e('Open mobile menu', 'azit-industrial'); ?>"
                id="mobile-menu-toggle">
            <span class="menu-icon" aria-hidden="true">
                <span class="menu-icon-bar"></span>
                <span class="menu-icon-bar"></span>
                <span class="menu-icon-bar"></span>
            </span>
            <span class="menu-text"><?php esc_html_e('Menu', 'azit-industrial'); ?></span>
        </button>

    </div>
</header>

<!-- Mobile Navigation -->
<nav id="mobile-navigation"
     class="mobile-navigation"
     aria-label="<?php esc_attr_e('Mobile navigation', 'azit-industrial'); ?>"
     hidden>
    <div class="mobile-nav-container">
        <?php
        if (has_nav_menu('mobile')) :
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'container'      => false,
                'menu_class'     => 'mobile-menu-list',
                'menu_id'        => 'mobile-menu',
                'walker'         => new AZIT_Walker_Nav_Menu(),
                'depth'          => 2,
                'fallback_cb'    => false,
            ));
        elseif (has_nav_menu('primary')) :
            // Fallback to primary menu if mobile menu not set
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'mobile-menu-list',
                'menu_id'        => 'mobile-menu',
                'depth'          => 2,
                'fallback_cb'    => false,
            ));
        endif;
        ?>

        <!-- Mobile language switcher -->
        <?php if (function_exists('icl_get_languages')) : ?>
            <?php
            $languages = icl_get_languages('skip_missing=0');
            if (!empty($languages)) :
            ?>
            <div class="mobile-language-switcher">
                <span class="language-label"><?php esc_html_e('Language:', 'azit-industrial'); ?></span>
                <ul class="mobile-language-list">
                    <?php foreach ($languages as $lang) : ?>
                    <li>
                        <a href="<?php echo esc_url($lang['url']); ?>"
                           lang="<?php echo esc_attr($lang['language_code']); ?>"
                           hreflang="<?php echo esc_attr($lang['language_code']); ?>"
                           <?php if ($lang['active']) : ?>aria-current="page" class="current-lang"<?php endif; ?>>
                            <?php echo esc_html($lang['native_name']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</nav>
