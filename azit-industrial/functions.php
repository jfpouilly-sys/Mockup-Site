<?php
/**
 * AZIT Industrial Theme Functions
 *
 * Theme functions and definitions for the AZIT Industrial WordPress theme.
 * Migrated from V7.1-RGAA static site maintaining full accessibility compliance.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme version constant
define('AZIT_VERSION', '7.1-RGAA-WP');

// Theme directory path
define('AZIT_THEME_DIR', get_template_directory());

// Theme directory URI
define('AZIT_THEME_URI', get_template_directory_uri());

/**
 * =============================================================================
 * THEME SETUP
 * =============================================================================
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function azit_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add custom image sizes
    add_image_size('azit-card', 400, 300, true);
    add_image_size('azit-hero', 1920, 600, true);
    add_image_size('azit-expertise', 600, 400, true);

    // Enable HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ));

    // Add theme support for Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for wide and full alignment (Gutenberg)
    add_theme_support('align-wide');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Register navigation menus
    register_nav_menus(array(
        'top-menu' => __('Top Menu (Company, Language)', 'azit-industrial'),
        'primary'  => __('Primary Menu', 'azit-industrial'),
        'footer'   => __('Footer Menu', 'azit-industrial'),
        'mobile'   => __('Mobile Menu', 'azit-industrial'),
    ));

    // Load text domain for translations
    load_theme_textdomain('azit-industrial', AZIT_THEME_DIR . '/languages');

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'azit_theme_setup');

/**
 * =============================================================================
 * SCRIPTS AND STYLES
 * =============================================================================
 */

/**
 * Enqueue scripts and styles.
 *
 * Loads all CSS and JS from V7.1-RGAA static site in correct order.
 */
function azit_enqueue_scripts() {
    // ==========================================================================
    // CSS FILES - V7.1-RGAA MIGRATION
    // Load order: variables → base → layout → components → pages → a11y → main → style.css
    // ==========================================================================

    // 1. CSS Variables (design tokens)
    wp_enqueue_style(
        'azit-variables',
        AZIT_THEME_URI . '/assets/css/variables.css',
        array(),
        AZIT_VERSION,
        'all'
    );

    // 2. Base styles (reset, typography)
    wp_enqueue_style(
        'azit-base',
        AZIT_THEME_URI . '/assets/css/base.css',
        array('azit-variables'),
        AZIT_VERSION,
        'all'
    );

    // 3. Layout styles (grid, containers)
    wp_enqueue_style(
        'azit-layout',
        AZIT_THEME_URI . '/assets/css/layout.css',
        array('azit-base'),
        AZIT_VERSION,
        'all'
    );

    // 4. Component styles (buttons, cards, forms)
    wp_enqueue_style(
        'azit-components',
        AZIT_THEME_URI . '/assets/css/components.css',
        array('azit-layout'),
        AZIT_VERSION,
        'all'
    );

    // 5. Page-specific styles
    wp_enqueue_style(
        'azit-pages',
        AZIT_THEME_URI . '/assets/css/pages.css',
        array('azit-components'),
        AZIT_VERSION,
        'all'
    );

    // 6. Accessibility utilities (skip links, focus styles) - RGAA critical
    wp_enqueue_style(
        'azit-accessibility',
        AZIT_THEME_URI . '/assets/css/a11y-utils.css',
        array('azit-pages'),
        AZIT_VERSION,
        'all'
    );

    // 7. Main stylesheet (WordPress theme additions - if exists)
    if (file_exists(AZIT_THEME_DIR . '/assets/css/main.css')) {
        wp_enqueue_style(
            'azit-main-style',
            AZIT_THEME_URI . '/assets/css/main.css',
            array('azit-accessibility'),
            AZIT_VERSION,
            'all'
        );
    }

    // 8. Theme stylesheet (style.css - theme header & overrides)
    wp_enqueue_style(
        'azit-style',
        get_stylesheet_uri(),
        array('azit-main-style'),
        AZIT_VERSION
    );

    // ==========================================================================
    // JAVASCRIPT FILES - V7.1-RGAA MIGRATION
    // Load order: main → navigation → language-switcher → accessibility
    // ==========================================================================

    // 1. Main JavaScript (general functionality)
    wp_enqueue_script(
        'azit-main-js',
        AZIT_THEME_URI . '/assets/js/main.js',
        array(),
        AZIT_VERSION,
        true
    );

    // 2. Navigation component (dropdown menus, mobile menu)
    wp_enqueue_script(
        'azit-navigation',
        AZIT_THEME_URI . '/assets/js/navigation.js',
        array('azit-main-js'),
        AZIT_VERSION,
        true
    );

    // 3. Language switcher (FR/EN toggle)
    wp_enqueue_script(
        'azit-language-switcher',
        AZIT_THEME_URI . '/assets/js/language-switcher.js',
        array('azit-navigation'),
        AZIT_VERSION,
        true
    );

    // 4. Tabs JavaScript - For tab-based navigation on pages
    wp_enqueue_script(
        'azit-tabs-js',
        AZIT_THEME_URI . '/assets/js/tabs.js',
        array('azit-language-switcher'),
        AZIT_VERSION,
        true
    );

    // 5. Accessibility JavaScript - Core a11y features
    wp_enqueue_script(
        'azit-accessibility-js',
        AZIT_THEME_URI . '/assets/js/accessibility.js',
        array('azit-tabs-js'),
        AZIT_VERSION,
        true
    );

    // Localize script for AJAX and i18n
    wp_localize_script('azit-main-js', 'azit_vars', array(
        'ajax_url'    => admin_url('admin-ajax.php'),
        'nonce'       => wp_create_nonce('azit_nonce'),
        'home_url'    => home_url('/'),
        'theme_uri'   => AZIT_THEME_URI,
        'current_lang' => azit_get_current_language(),
        'i18n'        => array(
            'menu_open'   => __('Open menu', 'azit-industrial'),
            'menu_close'  => __('Close menu', 'azit-industrial'),
            'loading'     => __('Loading...', 'azit-industrial'),
            'error'       => __('An error occurred', 'azit-industrial'),
            'skip_to_content' => __('Skip to main content', 'azit-industrial'),
        ),
    ));

    // Comment reply script (only on single posts with comments)
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'azit_enqueue_scripts');

/**
 * Add preload for critical assets
 */
function azit_preload_assets() {
    echo '<link rel="preload" href="' . esc_url(AZIT_THEME_URI . '/assets/css/a11y-utils.css') . '" as="style">' . "\n";
}
add_action('wp_head', 'azit_preload_assets', 1);

/**
 * =============================================================================
 * ACCESSIBILITY FEATURES - RGAA 4.1.2 COMPLIANCE
 * =============================================================================
 */

/**
 * Add skip link to main content - RGAA Criterion 12.7
 */
function azit_add_skip_link() {
    echo '<a href="#main-content" class="skip-link">' .
         esc_html__('Skip to main content', 'azit-industrial') .
         '</a>';
}
add_action('wp_body_open', 'azit_add_skip_link', 5);

/**
 * Add ARIA live region for dynamic content announcements
 */
function azit_add_aria_live_region() {
    echo '<div id="aria-live-region" aria-live="polite" aria-atomic="true" class="sr-only"></div>' . "\n";
    echo '<div id="aria-live-assertive" aria-live="assertive" aria-atomic="true" class="sr-only"></div>' . "\n";
}
add_action('wp_body_open', 'azit_add_aria_live_region', 10);

/**
 * Modify language attributes for proper RGAA compliance
 */
function azit_language_attributes($output) {
    $lang = get_locale();

    // Convert WordPress locale to HTML lang attribute
    $lang_map = array(
        'fr_FR' => 'fr',
        'fr_BE' => 'fr',
        'fr_CA' => 'fr',
        'en_US' => 'en',
        'en_GB' => 'en',
        'en_AU' => 'en',
    );

    $html_lang = isset($lang_map[$lang]) ? $lang_map[$lang] : substr($lang, 0, 2);

    return 'lang="' . esc_attr($html_lang) . '"';
}
add_filter('language_attributes', 'azit_language_attributes');

/**
 * Add body classes for accessibility and styling
 */
function azit_body_classes($classes) {
    // Add RGAA compliance class
    $classes[] = 'rgaa-compliant';

    // Add language class
    $classes[] = 'lang-' . esc_attr(substr(get_locale(), 0, 2));

    // Add class for pages with sidebar
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }

    // Add class for front page
    if (is_front_page()) {
        $classes[] = 'front-page';
    }

    // Add class for single expertise posts
    if (is_singular('expertise')) {
        $classes[] = 'single-expertise-page';
    }

    // Accessibility: Add no-js class (removed by JS if enabled)
    $classes[] = 'no-js';

    return $classes;
}
add_filter('body_class', 'azit_body_classes');

/**
 * Add script to remove no-js class
 */
function azit_no_js_script() {
    echo "<script>document.documentElement.classList.remove('no-js');</script>\n";
}
add_action('wp_head', 'azit_no_js_script', 0);

/**
 * =============================================================================
 * CUSTOM NAVIGATION WALKER - ACCESSIBLE MENUS
 * =============================================================================
 */

/**
 * Custom Walker for Accessible Navigation
 * Adds ARIA attributes for dropdown menus
 */
class AZIT_Walker_Nav_Menu extends Walker_Nav_Menu {

    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes   = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Check if item has children
        $has_children = in_array('menu-item-has-children', $classes, true);

        $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id_attr = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';

        $output .= $indent . '<li' . $id_attr . $class_names . '>';

        $atts           = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        // Add aria-current for current page - RGAA requirement
        if ($item->current) {
            $atts['aria-current'] = 'page';
        }

        // Add aria-haspopup for parent items
        if ($has_children) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (is_scalar($value) && '' !== $value && false !== $value) {
                $value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $item_output  = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . $title . ($args->link_after ?? '');

        // Add dropdown indicator for parent items
        if ($has_children) {
            $item_output .= ' <span class="dropdown-indicator" aria-hidden="true">&#9662;</span>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = str_repeat($t, $depth);

        // Add role="menu" for submenus - ARIA requirement
        $output .= "{$n}{$indent}<ul class=\"sub-menu\" role=\"menu\">{$n}";
    }

    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent  = str_repeat($t, $depth);
        $output .= "{$indent}</ul>{$n}";
    }
}

/**
 * =============================================================================
 * WIDGET AREAS
 * =============================================================================
 */

/**
 * Register widget areas.
 */
function azit_widgets_init() {
    // Footer Widgets
    register_sidebar(array(
        'name'          => __('Footer Widgets', 'azit-industrial'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets to the footer area.', 'azit-industrial'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Sidebar
    register_sidebar(array(
        'name'          => __('Sidebar', 'azit-industrial'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets to the sidebar.', 'azit-industrial'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'azit_widgets_init');

/**
 * =============================================================================
 * UTILITY FUNCTIONS
 * =============================================================================
 */

/**
 * Get the current language code
 *
 * @return string Language code (e.g., 'fr', 'en')
 */
function azit_get_current_language() {
    // Check for WPML
    if (defined('ICL_LANGUAGE_CODE')) {
        return ICL_LANGUAGE_CODE;
    }

    // Check for Polylang
    if (function_exists('pll_current_language')) {
        return pll_current_language();
    }

    // Fallback to WordPress locale
    return substr(get_locale(), 0, 2);
}

/**
 * Get translated string based on current language
 *
 * @param string $fr French text
 * @param string $en English text
 * @return string Translated text
 */
function azit_translate($fr, $en) {
    return (azit_get_current_language() === 'fr') ? $fr : $en;
}

/**
 * Sanitize SVG for safe output
 *
 * @param string $svg SVG content
 * @return string Sanitized SVG
 */
function azit_sanitize_svg($svg) {
    return wp_kses($svg, array(
        'svg'   => array(
            'class'       => true,
            'aria-hidden' => true,
            'role'        => true,
            'viewbox'     => true,
            'xmlns'       => true,
            'width'       => true,
            'height'      => true,
            'fill'        => true,
        ),
        'path'  => array(
            'd'    => true,
            'fill' => true,
        ),
        'g'     => array(
            'fill' => true,
        ),
        'title' => array(),
    ));
}

/**
 * Generate breadcrumb navigation
 *
 * @return string HTML breadcrumb
 */
function azit_breadcrumb() {
    if (is_front_page()) {
        return '';
    }

    $output = '<nav aria-label="' . esc_attr__('Breadcrumb', 'azit-industrial') . '" class="breadcrumb">';
    $output .= '<ol>';
    $output .= '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'azit-industrial') . '</a></li>';

    if (is_singular('expertise')) {
        $output .= '<li><a href="' . esc_url(get_post_type_archive_link('expertise')) . '">' . esc_html__('Expertise', 'azit-industrial') . '</a></li>';
        $output .= '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_singular('product')) {
        $output .= '<li><a href="' . esc_url(get_post_type_archive_link('product')) . '">' . esc_html__('Products', 'azit-industrial') . '</a></li>';
        $output .= '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_singular('training')) {
        $output .= '<li><a href="' . esc_url(get_post_type_archive_link('training')) . '">' . esc_html__('Training', 'azit-industrial') . '</a></li>';
        $output .= '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_page()) {
        $ancestors = get_post_ancestors(get_the_ID());
        $ancestors = array_reverse($ancestors);
        foreach ($ancestors as $ancestor) {
            $output .= '<li><a href="' . esc_url(get_permalink($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a></li>';
        }
        $output .= '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_archive()) {
        $output .= '<li aria-current="page">' . esc_html(get_the_archive_title()) . '</li>';
    } elseif (is_single()) {
        $output .= '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_search()) {
        $output .= '<li aria-current="page">' . esc_html__('Search Results', 'azit-industrial') . '</li>';
    } elseif (is_404()) {
        $output .= '<li aria-current="page">' . esc_html__('Page Not Found', 'azit-industrial') . '</li>';
    }

    $output .= '</ol>';
    $output .= '</nav>';

    return $output;
}

/**
 * =============================================================================
 * INCLUDE ADDITIONAL FUNCTIONALITY
 * =============================================================================
 */

/**
 * Custom Post Types (Expertise, Products, Training)
 */
$custom_post_types_file = AZIT_THEME_DIR . '/inc/custom-post-types.php';
if (file_exists($custom_post_types_file)) {
    require_once $custom_post_types_file;
}

/**
 * Custom Fields (ACF configuration)
 */
$custom_fields_file = AZIT_THEME_DIR . '/inc/custom-fields.php';
if (file_exists($custom_fields_file)) {
    require_once $custom_fields_file;
}

/**
 * Additional Accessibility Functions
 */
$accessibility_file = AZIT_THEME_DIR . '/inc/accessibility.php';
if (file_exists($accessibility_file)) {
    require_once $accessibility_file;
}

/**
 * Template Functions and Helpers
 */
$template_functions_file = AZIT_THEME_DIR . '/inc/template-functions.php';
if (file_exists($template_functions_file)) {
    require_once $template_functions_file;
}

/**
 * WPML Integration (Multilingual)
 */
$wpml_integration_file = AZIT_THEME_DIR . '/inc/wpml-integration.php';
if (file_exists($wpml_integration_file)) {
    require_once $wpml_integration_file;
}

/**
 * Contact Form 7 Integration
 */
$cf7_integration_file = AZIT_THEME_DIR . '/inc/contact-form-7.php';
if (file_exists($cf7_integration_file)) {
    require_once $cf7_integration_file;
}

/**
 * Testing & Optimization Utilities
 */
$testing_optimization_file = AZIT_THEME_DIR . '/inc/testing-optimization.php';
if (file_exists($testing_optimization_file)) {
    require_once $testing_optimization_file;
}

/**
 * Static Content Import
 */
$import_static_content_file = AZIT_THEME_DIR . '/inc/import-static-content.php';
if (file_exists($import_static_content_file)) {
    require_once $import_static_content_file;
}

/**
 * =============================================================================
 * CUSTOM TEMPLATE LOADING
 * =============================================================================
 */

/**
 * Load custom template for specific products with complex tab structures
 */
function azit_load_custom_product_template($template) {
    if (is_singular('product')) {
        global $post;

        // Use custom template for communication-stacks product
        if ($post->post_name === 'communication-stacks') {
            $custom_template = locate_template('single-product-communication-stacks.php');
            if ($custom_template) {
                return $custom_template;
            }
        }
    }
    return $template;
}
add_filter('single_template', 'azit_load_custom_product_template');

/**
 * =============================================================================
 * SECURITY & PERFORMANCE
 * =============================================================================
 */

/**
 * Remove WordPress version from head for security
 */
remove_action('wp_head', 'wp_generator');

/**
 * Disable XML-RPC for security (if not needed)
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Add security headers
 */
function azit_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'azit_security_headers');

/**
 * Defer parsing of JavaScript
 */
function azit_defer_scripts($tag, $handle, $src) {
    // Scripts to defer
    $defer_scripts = array('azit-main-js', 'azit-accessibility-js');

    if (in_array($handle, $defer_scripts, true)) {
        return str_replace(' src', ' defer src', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'azit_defer_scripts', 10, 3);

/**
 * =============================================================================
 * ADMIN CUSTOMIZATIONS
 * =============================================================================
 */

/**
 * Add theme support notice in admin
 */
function azit_admin_notice() {
    // Check if ACF is installed
    if (!class_exists('ACF') && current_user_can('install_plugins')) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p><strong>' . esc_html__('AZIT Industrial Theme', 'azit-industrial') . ':</strong> ';
        echo esc_html__('For full functionality, please install and activate the "Advanced Custom Fields" plugin.', 'azit-industrial');
        echo '</p></div>';
    }
}
add_action('admin_notices', 'azit_admin_notice');

/**
 * Customize admin footer text
 */
function azit_admin_footer_text($text) {
    return sprintf(
        /* translators: %s: theme version */
        __('AZIT Industrial Theme v%s | RGAA 4.1.2 Compliant', 'azit-industrial'),
        AZIT_VERSION
    );
}
add_filter('admin_footer_text', 'azit_admin_footer_text');

/**
 * =============================================================================
 * PERMALINK FLUSH & SETUP
 * =============================================================================
 */

/**
 * Add admin menu item to flush permalinks
 */
function azit_add_flush_permalink_menu() {
    add_management_page(
        __('AZIT Setup', 'azit-industrial'),
        __('AZIT Setup', 'azit-industrial'),
        'manage_options',
        'azit-setup',
        'azit_setup_page'
    );
}
add_action('admin_menu', 'azit_add_flush_permalink_menu');

/**
 * AZIT Setup Page
 */
function azit_setup_page() {
    // Handle actions
    if (isset($_POST['azit_flush_permalinks']) && check_admin_referer('azit_flush_permalinks_nonce')) {
        flush_rewrite_rules(true);
        echo '<div class="notice notice-success"><p>' . esc_html__('Permalinks flushed successfully!', 'azit-industrial') . '</p></div>';
    }

    if (isset($_POST['azit_create_pages']) && check_admin_referer('azit_create_pages_nonce')) {
        $created = azit_create_required_pages();
        echo '<div class="notice notice-success"><p>' . sprintf(esc_html__('%d pages created successfully!', 'azit-industrial'), $created) . '</p></div>';
    }

    if (isset($_POST['azit_create_products']) && check_admin_referer('azit_create_products_nonce')) {
        $created = azit_create_sample_products();
        echo '<div class="notice notice-success"><p>' . sprintf(esc_html__('%d products created successfully!', 'azit-industrial'), $created) . '</p></div>';
    }

    // Import static content from HTML files
    if (isset($_POST['azit_import_static']) && check_admin_referer('azit_import_static_nonce')) {
        if (function_exists('azit_import_all_static_content')) {
            $results = azit_import_all_static_content();
            $total = $results['pages'] + $results['products'] + $results['expertise'];
            echo '<div class="notice notice-success"><p>' . sprintf(
                esc_html__('Imported from static HTML: %d pages, %d products, %d expertise posts. Total: %d items.', 'azit-industrial'),
                $results['pages'],
                $results['products'],
                $results['expertise'],
                $total
            ) . '</p></div>';
        }
    }

    ?>
    <div class="wrap">
        <h1><?php esc_html_e('AZIT Industrial Theme Setup', 'azit-industrial'); ?></h1>

        <div class="card" style="max-width: 800px; padding: 20px; margin-top: 20px; background: linear-gradient(135deg, #e8f5e9 0%, #ffffff 100%); border-left: 4px solid #4caf50;">
            <h2 style="color: #2e7d32;"><?php esc_html_e('⭐ RECOMMENDED: Import from Static Site', 'azit-industrial'); ?></h2>
            <p><?php esc_html_e('Import all content from the original static HTML files (pages/). This preserves the exact content you created.', 'azit-industrial'); ?></p>
            <p><strong><?php esc_html_e('This will import:', 'azit-industrial'); ?></strong></p>
            <ul style="margin-left: 20px; list-style: disc;">
                <li><?php esc_html_e('Pages: Contact, Company, Training, Blog, Sitemap, Accessibility', 'azit-industrial'); ?></li>
                <li><?php esc_html_e('Products: FSoE, PROFISAFE, CANopen, J1939, Protocol Gateway, Simulation, and more', 'azit-industrial'); ?></li>
                <li><?php esc_html_e('Expertise: Safety Compliance, Protocol Development, Testing, Industrial Networks', 'azit-industrial'); ?></li>
            </ul>
            <form method="post" style="margin-top: 15px;">
                <?php wp_nonce_field('azit_import_static_nonce'); ?>
                <input type="submit" name="azit_import_static" class="button button-primary button-hero" value="<?php esc_attr_e('Import Content from Static HTML Files', 'azit-industrial'); ?>">
            </form>
        </div>

        <hr style="margin: 30px 0;">
        <h2><?php esc_html_e('Alternative Setup Options', 'azit-industrial'); ?></h2>

        <div class="card" style="max-width: 800px; padding: 20px; margin-top: 20px;">
            <h2><?php esc_html_e('1. Flush Permalinks', 'azit-industrial'); ?></h2>
            <p><?php esc_html_e('If you see "Page Not Found" errors, flush the permalinks first.', 'azit-industrial'); ?></p>
            <form method="post">
                <?php wp_nonce_field('azit_flush_permalinks_nonce'); ?>
                <input type="submit" name="azit_flush_permalinks" class="button button-primary" value="<?php esc_attr_e('Flush Permalinks', 'azit-industrial'); ?>">
            </form>
        </div>

        <div class="card" style="max-width: 800px; padding: 20px; margin-top: 20px;">
            <h2><?php esc_html_e('2. Create Required Pages', 'azit-industrial'); ?></h2>
            <p><?php esc_html_e('Creates pages: Home, Blog, Contact, Company, About, Training, Expertise, Products, Accessibility, Privacy, Terms, Sitemap.', 'azit-industrial'); ?></p>
            <form method="post">
                <?php wp_nonce_field('azit_create_pages_nonce'); ?>
                <input type="submit" name="azit_create_pages" class="button button-secondary" value="<?php esc_attr_e('Create Pages', 'azit-industrial'); ?>">
            </form>
        </div>

        <div class="card" style="max-width: 800px; padding: 20px; margin-top: 20px;">
            <h2><?php esc_html_e('3. Create Sample Products', 'azit-industrial'); ?></h2>
            <p><?php esc_html_e('Creates sample products: FSoE Slave, FSoE Master, PROFISAFE, CANopen Safety, J1939, Protocol Gateway, etc.', 'azit-industrial'); ?></p>
            <form method="post">
                <?php wp_nonce_field('azit_create_products_nonce'); ?>
                <input type="submit" name="azit_create_products" class="button button-secondary" value="<?php esc_attr_e('Create Products', 'azit-industrial'); ?>">
            </form>
        </div>

        <div class="card" style="max-width: 800px; padding: 20px; margin-top: 20px;">
            <h2><?php esc_html_e('URL Structure', 'azit-industrial'); ?></h2>
            <table class="widefat striped">
                <thead>
                    <tr>
                        <th><?php esc_html_e('URL', 'azit-industrial'); ?></th>
                        <th><?php esc_html_e('Type', 'azit-industrial'); ?></th>
                        <th><?php esc_html_e('Status', 'azit-industrial'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $urls_to_check = array(
                        '/' => array('type' => 'Front Page', 'check' => 'front_page'),
                        '/blog/' => array('type' => 'Page (Posts Page)', 'check' => 'page', 'slug' => 'blog'),
                        '/products/' => array('type' => 'Product Archive', 'check' => 'archive'),
                        '/expertise/' => array('type' => 'Expertise Archive', 'check' => 'archive'),
                        '/training/' => array('type' => 'Page/Archive', 'check' => 'page', 'slug' => 'training'),
                        '/contact/' => array('type' => 'Page', 'check' => 'page', 'slug' => 'contact'),
                        '/company/' => array('type' => 'Page', 'check' => 'page', 'slug' => 'company'),
                    );

                    foreach ($urls_to_check as $url => $info) {
                        $status = '❌ ' . __('Not Found', 'azit-industrial');
                        if ($info['check'] === 'front_page') {
                            $front_page_id = get_option('page_on_front');
                            if ($front_page_id) {
                                $status = '✅ ' . __('OK', 'azit-industrial');
                            }
                        } elseif ($info['check'] === 'page' && isset($info['slug'])) {
                            $page = get_page_by_path($info['slug']);
                            if ($page) {
                                $status = '✅ ' . __('OK', 'azit-industrial');
                            }
                        } elseif ($info['check'] === 'archive') {
                            $status = '✅ ' . __('Auto (CPT)', 'azit-industrial');
                        }
                        ?>
                        <tr>
                            <td><code><?php echo esc_html($url); ?></code></td>
                            <td><?php echo esc_html($info['type']); ?></td>
                            <td><?php echo $status; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}

/**
 * Create required pages
 */
function azit_create_required_pages() {
    $pages = array(
        array('title' => 'Home', 'slug' => 'home', 'content' => ''),
        array('title' => 'Blog', 'slug' => 'blog', 'content' => ''),
        array('title' => 'Contact', 'slug' => 'contact', 'content' => '[contact-form-7 id="contact-form" title="Contact Form"]<p>Contact AZIT for your industrial protocol needs.</p>'),
        array('title' => 'Company', 'slug' => 'company', 'content' => '<h2>About AZIT</h2><p>AZIT is a brand of ISIT with 30+ years of expertise in embedded systems and industrial communication protocols.</p>'),
        array('title' => 'About', 'slug' => 'about', 'content' => '<h2>About Us</h2><p>Learn more about our company and expertise.</p>'),
        array('title' => 'Accessibility', 'slug' => 'accessibility', 'content' => '<h2>Accessibility Statement</h2><p>This website strives to comply with RGAA 4.1.2 accessibility standards.</p>'),
        array('title' => 'Privacy Policy', 'slug' => 'privacy', 'content' => '<h2>Privacy Policy</h2><p>Your privacy is important to us.</p>'),
        array('title' => 'Terms of Service', 'slug' => 'terms', 'content' => '<h2>Terms of Service</h2><p>Terms and conditions for using our services.</p>'),
        array('title' => 'Sitemap', 'slug' => 'sitemap', 'content' => '<h2>Site Map</h2><p>Navigate our website.</p>'),
        array('title' => 'Partners', 'slug' => 'partners', 'content' => '<h2>Our Partners</h2><p>We collaborate with industry-leading technology partners.</p>'),
        // Product category pages
        array('title' => 'Communication Stacks', 'slug' => 'communication-stacks', 'content' => '<h2>Communication Stacks</h2><p>Production-ready industrial communication protocol stacks.</p>', 'parent' => 'products'),
    );

    $created = 0;

    foreach ($pages as $page_data) {
        // Check if page exists
        $existing = get_page_by_path($page_data['slug']);
        if (!$existing) {
            $parent_id = 0;
            if (isset($page_data['parent'])) {
                $parent_page = get_page_by_path($page_data['parent']);
                if ($parent_page) {
                    $parent_id = $parent_page->ID;
                }
            }

            wp_insert_post(array(
                'post_title'   => $page_data['title'],
                'post_name'    => $page_data['slug'],
                'post_content' => $page_data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_parent'  => $parent_id,
            ));
            $created++;
        }
    }

    // Create Products parent page if not exists
    $products_page = get_page_by_path('products');
    if (!$products_page) {
        wp_insert_post(array(
            'post_title'   => 'Products',
            'post_name'    => 'products',
            'post_content' => '<h2>Our Products</h2><p>Explore our industrial protocol stacks and solutions.</p>',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ));
        $created++;
    }

    return $created;
}

/**
 * Create sample products
 */
function azit_create_sample_products() {
    $products = array(
        array(
            'title' => 'FSoE Slave Stack',
            'slug' => 'fsoe-slave',
            'content' => '<h2>FSoE Slave Stack</h2>
<p>IEC 61784-3 compliant Fail-Safe over EtherCAT implementation for safety slave devices.</p>
<h3>Key Features</h3>
<ul>
<li>SIL3 / PLe certified by Bureau Veritas</li>
<li>No third-party dependencies</li>
<li>White channel architecture</li>
<li>Full source code provided</li>
</ul>',
            'excerpt' => 'SIL3 certified FSoE slave implementation for safety-critical EtherCAT devices.',
        ),
        array(
            'title' => 'FSoE Master Stack',
            'slug' => 'fsoe-master',
            'content' => '<h2>FSoE Master Stack</h2>
<p>Complete FSoE master implementation for safety controllers and PLCs.</p>
<h3>Key Features</h3>
<ul>
<li>SIL3 / PLe certified</li>
<li>Multi-connection support</li>
<li>Comprehensive diagnostics</li>
</ul>',
            'excerpt' => 'SIL3 certified FSoE master for safety controllers.',
        ),
        array(
            'title' => 'PROFISAFE Slave',
            'slug' => 'profisafe-slave',
            'content' => '<h2>PROFISAFE Slave Stack</h2>
<p>IEC 61784-3 compliant PROFIsafe slave implementation for PROFINET safety devices.</p>',
            'excerpt' => 'SIL3 certified PROFIsafe slave implementation.',
        ),
        array(
            'title' => 'PROFISAFE Master',
            'slug' => 'profisafe-master',
            'content' => '<h2>PROFISAFE Master Stack</h2>
<p>Complete PROFIsafe master for safety controllers and PLCs.</p>',
            'excerpt' => 'SIL3 certified PROFIsafe master for safety PLCs.',
        ),
        array(
            'title' => 'CANopen Safety Slave',
            'slug' => 'canopen-safety-slave',
            'content' => '<h2>CANopen Safety Slave</h2>
<p>CiA 304 compliant safety protocol for CANopen networks.</p>',
            'excerpt' => 'SIL3 certified CANopen Safety slave implementation.',
        ),
        array(
            'title' => 'CANopen Safety Master',
            'slug' => 'canopen-safety-master',
            'content' => '<h2>CANopen Safety Master</h2>
<p>Complete CANopen Safety master implementation.</p>',
            'excerpt' => 'SIL3 certified CANopen Safety master.',
        ),
        array(
            'title' => 'CANopen Slave',
            'slug' => 'canopen-slave',
            'content' => '<h2>CANopen Slave Stack</h2>
<p>Full-featured CANopen slave stack with CiA 301/302 compliance.</p>',
            'excerpt' => 'Full-featured CANopen slave stack.',
        ),
        array(
            'title' => 'CANopen Master',
            'slug' => 'canopen-master',
            'content' => '<h2>CANopen Master Stack</h2>
<p>Complete CANopen master for controllers and gateways.</p>',
            'excerpt' => 'Complete CANopen master implementation.',
        ),
        array(
            'title' => 'J1939',
            'slug' => 'j1939',
            'content' => '<h2>J1939 Protocol Stack</h2>
<p>SAE J1939 implementation with optional safety extension.</p>',
            'excerpt' => 'SAE J1939 implementation with safety extension.',
        ),
        array(
            'title' => 'ISI-GTW Protocol Gateway',
            'slug' => 'protocol-gateway',
            'content' => '<h2>ISI-GTW Protocol Gateway</h2>
<p>Multi-protocol gateway platform for industrial networks.</p>',
            'excerpt' => 'Multi-protocol gateway for industrial networks.',
        ),
        array(
            'title' => 'EtherCAT Simulator',
            'slug' => 'simulation',
            'content' => '<h2>EtherCAT Simulator</h2>
<p>Simulation tools for EtherCAT network development and testing.</p>',
            'excerpt' => 'EtherCAT simulation and testing tools.',
        ),
        array(
            'title' => 'OPC-UA',
            'slug' => 'opc-ua',
            'content' => '<h2>OPC-UA Stack (Coming Soon)</h2>
<p>Industrial IoT connectivity with OPC-UA protocol support.</p>',
            'excerpt' => 'OPC-UA protocol stack - Coming Soon.',
        ),
    );

    $created = 0;

    foreach ($products as $product_data) {
        // Check if product exists
        $existing = get_posts(array(
            'name' => $product_data['slug'],
            'post_type' => 'product',
            'posts_per_page' => 1,
        ));

        if (empty($existing)) {
            wp_insert_post(array(
                'post_title'   => $product_data['title'],
                'post_name'    => $product_data['slug'],
                'post_content' => $product_data['content'],
                'post_excerpt' => $product_data['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'product',
            ));
            $created++;
        }
    }

    return $created;
}
