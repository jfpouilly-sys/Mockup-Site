<?php
/**
 * WPML Integration
 *
 * Multilingual support for AZIT Industrial theme.
 * Provides language switcher, translation helpers, and WPML compatibility.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if WPML is active
 *
 * @return bool
 */
function azit_is_wpml_active() {
    return defined('ICL_SITEPRESS_VERSION') && class_exists('SitePress');
}

/**
 * Check if Polylang is active (alternative to WPML)
 *
 * @return bool
 */
function azit_is_polylang_active() {
    return function_exists('pll_current_language');
}

/**
 * Get current language code
 *
 * @return string Language code (e.g., 'fr', 'en')
 */
function azit_get_language() {
    // WPML
    if (azit_is_wpml_active()) {
        return ICL_LANGUAGE_CODE;
    }

    // Polylang
    if (azit_is_polylang_active()) {
        return pll_current_language();
    }

    // Fallback to WordPress locale
    return substr(get_locale(), 0, 2);
}

/**
 * Get all available languages
 *
 * @return array Array of languages with code, name, and current status
 */
function azit_get_languages() {
    $languages = array();

    // WPML
    if (azit_is_wpml_active()) {
        $wpml_languages = apply_filters('wpml_active_languages', null, array(
            'skip_missing' => 0,
        ));

        if ($wpml_languages) {
            foreach ($wpml_languages as $lang) {
                $languages[] = array(
                    'code'       => $lang['code'],
                    'name'       => $lang['native_name'],
                    'english'    => $lang['english_name'],
                    'url'        => $lang['url'],
                    'is_current' => $lang['active'],
                    'flag'       => isset($lang['country_flag_url']) ? $lang['country_flag_url'] : '',
                );
            }
        }

        return $languages;
    }

    // Polylang
    if (azit_is_polylang_active()) {
        $pll_languages = pll_the_languages(array(
            'raw'           => 1,
            'hide_current'  => 0,
            'hide_if_empty' => 0,
        ));

        if ($pll_languages) {
            foreach ($pll_languages as $lang) {
                $languages[] = array(
                    'code'       => $lang['slug'],
                    'name'       => $lang['name'],
                    'english'    => $lang['name'],
                    'url'        => $lang['url'],
                    'is_current' => $lang['current_lang'],
                    'flag'       => isset($lang['flag']) ? $lang['flag'] : '',
                );
            }
        }

        return $languages;
    }

    // Fallback - single language
    $current_lang = substr(get_locale(), 0, 2);
    $languages[] = array(
        'code'       => $current_lang,
        'name'       => $current_lang === 'fr' ? 'Français' : 'English',
        'english'    => $current_lang === 'fr' ? 'French' : 'English',
        'url'        => home_url('/'),
        'is_current' => true,
        'flag'       => '',
    );

    return $languages;
}

/**
 * Display accessible language switcher
 *
 * @param array $args Display arguments
 */
function azit_language_switcher($args = array()) {
    $defaults = array(
        'style'        => 'dropdown', // dropdown, list, inline
        'show_flags'   => false,
        'show_names'   => true,
        'show_current' => true,
    );

    $args = wp_parse_args($args, $defaults);
    $languages = azit_get_languages();

    if (count($languages) <= 1) {
        return; // No switcher needed for single language
    }

    $current_lang = null;
    foreach ($languages as $lang) {
        if ($lang['is_current']) {
            $current_lang = $lang;
            break;
        }
    }

    if (!$current_lang) {
        $current_lang = $languages[0];
    }

    // Generate unique ID for accessibility
    $switcher_id = 'lang-switcher-' . wp_unique_id();

    switch ($args['style']) {
        case 'dropdown':
            azit_language_switcher_dropdown($languages, $current_lang, $switcher_id, $args);
            break;
        case 'list':
            azit_language_switcher_list($languages, $current_lang, $args);
            break;
        case 'inline':
            azit_language_switcher_inline($languages, $current_lang, $args);
            break;
    }
}

/**
 * Dropdown style language switcher
 */
function azit_language_switcher_dropdown($languages, $current_lang, $switcher_id, $args) {
    ?>
    <div class="language-switcher language-switcher-dropdown">
        <button type="button"
                class="language-toggle"
                aria-expanded="false"
                aria-controls="<?php echo esc_attr($switcher_id); ?>"
                aria-haspopup="listbox"
                aria-label="<?php esc_attr_e('Select language', 'azit-industrial'); ?>">
            <?php if ($args['show_flags'] && $current_lang['flag']) : ?>
                <img src="<?php echo esc_url($current_lang['flag']); ?>"
                     alt=""
                     class="language-flag"
                     width="20"
                     height="15" />
            <?php endif; ?>
            <span class="language-current">
                <?php echo esc_html(strtoupper($current_lang['code'])); ?>
            </span>
            <span class="dropdown-arrow" aria-hidden="true">&#9662;</span>
        </button>

        <ul id="<?php echo esc_attr($switcher_id); ?>"
            class="language-list"
            role="listbox"
            aria-label="<?php esc_attr_e('Available languages', 'azit-industrial'); ?>"
            hidden>
            <?php foreach ($languages as $lang) : ?>
                <li role="option"
                    <?php echo $lang['is_current'] ? 'aria-selected="true"' : ''; ?>>
                    <a href="<?php echo esc_url($lang['url']); ?>"
                       lang="<?php echo esc_attr($lang['code']); ?>"
                       hreflang="<?php echo esc_attr($lang['code']); ?>"
                       <?php echo $lang['is_current'] ? 'aria-current="page"' : ''; ?>>
                        <?php if ($args['show_flags'] && $lang['flag']) : ?>
                            <img src="<?php echo esc_url($lang['flag']); ?>"
                                 alt=""
                                 class="language-flag"
                                 width="20"
                                 height="15" />
                        <?php endif; ?>
                        <?php if ($args['show_names']) : ?>
                            <span class="language-name"><?php echo esc_html($lang['name']); ?></span>
                        <?php else : ?>
                            <span class="language-code"><?php echo esc_html(strtoupper($lang['code'])); ?></span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
}

/**
 * List style language switcher
 */
function azit_language_switcher_list($languages, $current_lang, $args) {
    ?>
    <nav class="language-switcher language-switcher-list"
         aria-label="<?php esc_attr_e('Language selection', 'azit-industrial'); ?>">
        <ul class="language-list">
            <?php foreach ($languages as $lang) : ?>
                <li>
                    <a href="<?php echo esc_url($lang['url']); ?>"
                       lang="<?php echo esc_attr($lang['code']); ?>"
                       hreflang="<?php echo esc_attr($lang['code']); ?>"
                       <?php echo $lang['is_current'] ? 'aria-current="page"' : ''; ?>>
                        <?php if ($args['show_flags'] && $lang['flag']) : ?>
                            <img src="<?php echo esc_url($lang['flag']); ?>"
                                 alt=""
                                 class="language-flag"
                                 width="20"
                                 height="15" />
                        <?php endif; ?>
                        <span class="language-name"><?php echo esc_html($lang['name']); ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php
}

/**
 * Inline style language switcher
 */
function azit_language_switcher_inline($languages, $current_lang, $args) {
    ?>
    <nav class="language-switcher language-switcher-inline"
         aria-label="<?php esc_attr_e('Language selection', 'azit-industrial'); ?>">
        <?php foreach ($languages as $index => $lang) : ?>
            <?php if ($index > 0) : ?>
                <span class="language-separator" aria-hidden="true">|</span>
            <?php endif; ?>

            <?php if ($lang['is_current'] && !$args['show_current']) : ?>
                <span class="language-current" lang="<?php echo esc_attr($lang['code']); ?>">
                    <?php echo esc_html(strtoupper($lang['code'])); ?>
                </span>
            <?php else : ?>
                <a href="<?php echo esc_url($lang['url']); ?>"
                   lang="<?php echo esc_attr($lang['code']); ?>"
                   hreflang="<?php echo esc_attr($lang['code']); ?>"
                   <?php echo $lang['is_current'] ? 'aria-current="page"' : ''; ?>>
                    <?php echo esc_html(strtoupper($lang['code'])); ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </nav>
    <?php
}

/**
 * Get translated string
 *
 * @param string $string String to translate
 * @param string $context Context for WPML
 * @param string $name Name for WPML registration
 * @return string Translated string
 */
function azit_translate_string($string, $context = 'AZIT Theme', $name = '') {
    if (empty($name)) {
        $name = sanitize_title($string);
    }

    // WPML String Translation
    if (azit_is_wpml_active() && function_exists('icl_t')) {
        return icl_t($context, $name, $string);
    }

    // Polylang
    if (azit_is_polylang_active() && function_exists('pll__')) {
        return pll__($string);
    }

    return $string;
}

/**
 * Register string for translation
 *
 * @param string $string String to register
 * @param string $context Context for WPML
 * @param string $name Name for WPML registration
 */
function azit_register_string($string, $context = 'AZIT Theme', $name = '') {
    if (empty($name)) {
        $name = sanitize_title($string);
    }

    // WPML String Translation
    if (azit_is_wpml_active() && function_exists('icl_register_string')) {
        icl_register_string($context, $name, $string);
    }

    // Polylang
    if (azit_is_polylang_active() && function_exists('pll_register_string')) {
        pll_register_string($name, $string, $context);
    }
}

/**
 * Get URL for specific language
 *
 * @param string $lang_code Language code
 * @param int $post_id Optional post ID
 * @return string URL
 */
function azit_get_language_url($lang_code, $post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    // WPML
    if (azit_is_wpml_active()) {
        $translated_id = apply_filters('wpml_object_id', $post_id, get_post_type($post_id), false, $lang_code);
        if ($translated_id) {
            return get_permalink($translated_id);
        }
    }

    // Polylang
    if (azit_is_polylang_active() && function_exists('pll_get_post')) {
        $translated_id = pll_get_post($post_id, $lang_code);
        if ($translated_id) {
            return get_permalink($translated_id);
        }
    }

    return home_url('/');
}

/**
 * Register theme strings for translation
 */
function azit_register_theme_strings() {
    $strings = array(
        'Skip to main content',
        'Open menu',
        'Close menu',
        'Search',
        'Search for:',
        'Read more',
        'Continue reading',
        'Previous',
        'Next',
        'Page',
        'of',
        'Contact Us',
        'Learn more',
        'View Product',
        'View Training',
        'Related',
        'Share',
        'Print',
        'Accessibility: partially compliant',
        'All rights reserved',
    );

    foreach ($strings as $string) {
        azit_register_string($string);
    }
}
add_action('after_setup_theme', 'azit_register_theme_strings');

/**
 * Add hreflang tags to head
 */
function azit_add_hreflang_tags() {
    $languages = azit_get_languages();

    if (count($languages) <= 1) {
        return;
    }

    foreach ($languages as $lang) {
        printf(
            '<link rel="alternate" hreflang="%s" href="%s" />' . "\n",
            esc_attr($lang['code']),
            esc_url($lang['url'])
        );
    }

    // Add x-default
    $default_lang = azit_is_wpml_active()
        ? apply_filters('wpml_default_language', null)
        : 'fr';

    foreach ($languages as $lang) {
        if ($lang['code'] === $default_lang) {
            printf(
                '<link rel="alternate" hreflang="x-default" href="%s" />' . "\n",
                esc_url($lang['url'])
            );
            break;
        }
    }
}
add_action('wp_head', 'azit_add_hreflang_tags', 1);

/**
 * Add language to body class
 */
function azit_language_body_class($classes) {
    $lang = azit_get_language();
    $classes[] = 'lang-' . esc_attr($lang);

    return $classes;
}
add_filter('body_class', 'azit_language_body_class');

/**
 * WPML Configuration
 * Add to wpml-config.xml in theme root
 */
function azit_get_wpml_config() {
    return '<?xml version="1.0" encoding="UTF-8"?>
<wpml-config>
    <custom-types>
        <custom-type translate="1">expertise</custom-type>
        <custom-type translate="1">product</custom-type>
        <custom-type translate="1">training</custom-type>
    </custom-types>

    <taxonomies>
        <taxonomy translate="1">product_category</taxonomy>
        <taxonomy translate="1">expertise_category</taxonomy>
        <taxonomy translate="1">training_category</taxonomy>
        <taxonomy translate="1">training_level</taxonomy>
    </taxonomies>

    <custom-fields>
        <!-- Expertise: translatable -->
        <custom-field action="translate">expertise_subtitle</custom-field>
        <custom-field action="translate">expertise_short_description</custom-field>
        <custom-field action="translate">expertise_badges</custom-field>
        <custom-field action="translate">expertise_services</custom-field>
        <custom-field action="translate">expertise_features</custom-field>
        <custom-field action="translate">expertise_case_studies</custom-field>
        <custom-field action="translate">expertise_process</custom-field>
        <custom-field action="translate">expertise_cta</custom-field>
        <!-- Product: translatable -->
        <custom-field action="translate">product_features</custom-field>
        <custom-field action="translate">product_feature_groups</custom-field>
        <custom-field action="translate">product_spec_tables</custom-field>
        <custom-field action="translate">product_specifications</custom-field>
        <custom-field action="translate">product_downloads</custom-field>
        <custom-field action="translate">product_badges</custom-field>
        <!-- Product: copy -->
        <custom-field action="copy">product_price</custom-field>
        <custom-field action="copy">product_sku</custom-field>
        <custom-field action="copy">product_availability</custom-field>
        <custom-field action="copy">product_image</custom-field>
        <custom-field action="copy">product_gallery</custom-field>
        <custom-field action="copy">product_datasheet</custom-field>
        <custom-field action="copy">related_products</custom-field>
        <!-- Training: translatable content -->
        <custom-field action="translate">training_objectives</custom-field>
        <custom-field action="translate">training_prerequisites</custom-field>
        <custom-field action="translate">training_audience</custom-field>
        <custom-field action="translate">training_instructor</custom-field>
        <custom-field action="translate">training_outline</custom-field>
        <custom-field action="translate">training_benefits</custom-field>
        <custom-field action="translate">training_private_price</custom-field>
        <!-- Training: copy (same in both languages) -->
        <custom-field action="copy">training_price</custom-field>
        <custom-field action="copy">training_duration</custom-field>
        <custom-field action="copy">training_level</custom-field>
        <custom-field action="copy">training_format</custom-field>
        <custom-field action="copy">training_certification</custom-field>
        <custom-field action="copy">training_max_participants</custom-field>
        <custom-field action="copy">training_syllabus</custom-field>
        <custom-field action="copy">training_sessions</custom-field>
    </custom-fields>

    <admin-texts>
        <key name="azit_theme_options">
            <key name="contact_email" />
            <key name="contact_phone" />
            <key name="contact_address" />
        </key>
    </admin-texts>
</wpml-config>';
}

/**
 * Create wpml-config.xml file
 */
function azit_create_wpml_config() {
    $config_file = get_template_directory() . '/wpml-config.xml';

    if (!file_exists($config_file)) {
        file_put_contents($config_file, azit_get_wpml_config());
    }
}
add_action('after_switch_theme', 'azit_create_wpml_config');
