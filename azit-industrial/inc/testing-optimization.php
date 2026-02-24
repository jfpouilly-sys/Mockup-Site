<?php
/**
 * Testing & Optimization Utilities
 *
 * Tools for testing RGAA compliance, performance optimization,
 * and debugging the AZIT Industrial theme.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * =============================================================================
 * RGAA 4.1.2 ACCESSIBILITY TESTING
 * =============================================================================
 */

/**
 * Run accessibility audit on current page
 * Outputs results to browser console
 */
function azit_accessibility_audit() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (!isset($_GET['a11y_audit'])) {
        return;
    }

    add_action('wp_footer', 'azit_accessibility_audit_script', 999);
}
add_action('wp', 'azit_accessibility_audit');

/**
 * Accessibility audit JavaScript
 */
function azit_accessibility_audit_script() {
    ?>
    <script>
    (function() {
        'use strict';

        console.log('%c=== AZIT RGAA 4.1.2 Accessibility Audit ===', 'font-size: 16px; font-weight: bold; color: #0056b3;');

        var issues = [];
        var warnings = [];
        var passes = [];

        // Test 1: Skip Link (RGAA 12.7)
        var skipLink = document.querySelector('a[href="#main-content"], .skip-link');
        if (skipLink) {
            passes.push('✅ Skip link present');
        } else {
            issues.push('❌ RGAA 12.7: Missing skip link to main content');
        }

        // Test 2: Main Landmark (RGAA 9.2)
        var main = document.querySelector('main, [role="main"]');
        if (main) {
            if (main.id === 'main-content') {
                passes.push('✅ Main landmark with correct ID');
            } else {
                warnings.push('⚠️ Main landmark exists but ID is not "main-content"');
            }
        } else {
            issues.push('❌ RGAA 9.2: Missing main landmark');
        }

        // Test 3: Page Title (RGAA 8.5)
        var title = document.querySelector('title');
        if (title && title.textContent.trim().length > 0) {
            passes.push('✅ Page has title: "' + title.textContent.trim().substring(0, 50) + '..."');
        } else {
            issues.push('❌ RGAA 8.5: Missing or empty page title');
        }

        // Test 4: HTML Language (RGAA 8.3)
        var htmlLang = document.documentElement.getAttribute('lang');
        if (htmlLang) {
            passes.push('✅ HTML lang attribute: ' + htmlLang);
        } else {
            issues.push('❌ RGAA 8.3: Missing lang attribute on HTML element');
        }

        // Test 5: Heading Structure (RGAA 9.1)
        var h1s = document.querySelectorAll('h1');
        if (h1s.length === 1) {
            passes.push('✅ Single H1 heading');
        } else if (h1s.length === 0) {
            issues.push('❌ RGAA 9.1: No H1 heading found');
        } else {
            warnings.push('⚠️ Multiple H1 headings found (' + h1s.length + ')');
        }

        // Check heading hierarchy
        var headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6');
        var lastLevel = 0;
        var hierarchyOk = true;
        headings.forEach(function(h) {
            var level = parseInt(h.tagName.charAt(1));
            if (level > lastLevel + 1 && lastLevel > 0) {
                hierarchyOk = false;
                warnings.push('⚠️ Heading skip: H' + lastLevel + ' to H' + level);
            }
            lastLevel = level;
        });
        if (hierarchyOk && headings.length > 0) {
            passes.push('✅ Heading hierarchy is correct');
        }

        // Test 6: Images Alt Text (RGAA 1.1, 1.2)
        var images = document.querySelectorAll('img');
        var imagesWithoutAlt = [];
        images.forEach(function(img) {
            if (!img.hasAttribute('alt')) {
                imagesWithoutAlt.push(img.src);
            }
        });
        if (imagesWithoutAlt.length === 0) {
            passes.push('✅ All images have alt attributes (' + images.length + ' images)');
        } else {
            issues.push('❌ RGAA 1.1: ' + imagesWithoutAlt.length + ' images missing alt attribute');
            console.log('Images without alt:', imagesWithoutAlt);
        }

        // Test 7: Form Labels (RGAA 11.1)
        var inputs = document.querySelectorAll('input:not([type="hidden"]):not([type="submit"]):not([type="button"]), textarea, select');
        var inputsWithoutLabels = [];
        inputs.forEach(function(input) {
            var id = input.id;
            var hasLabel = false;
            if (id) {
                hasLabel = document.querySelector('label[for="' + id + '"]') !== null;
            }
            if (!hasLabel) {
                hasLabel = input.closest('label') !== null;
            }
            if (!hasLabel) {
                hasLabel = input.hasAttribute('aria-label') || input.hasAttribute('aria-labelledby');
            }
            if (!hasLabel) {
                inputsWithoutLabels.push(input);
            }
        });
        if (inputsWithoutLabels.length === 0 && inputs.length > 0) {
            passes.push('✅ All form inputs have labels (' + inputs.length + ' inputs)');
        } else if (inputsWithoutLabels.length > 0) {
            issues.push('❌ RGAA 11.1: ' + inputsWithoutLabels.length + ' form inputs without labels');
            console.log('Inputs without labels:', inputsWithoutLabels);
        }

        // Test 8: Links with Text (RGAA 6.1)
        var links = document.querySelectorAll('a');
        var emptyLinks = [];
        links.forEach(function(link) {
            var text = link.textContent.trim();
            var ariaLabel = link.getAttribute('aria-label');
            var img = link.querySelector('img[alt]');
            if (!text && !ariaLabel && !img) {
                emptyLinks.push(link);
            }
        });
        if (emptyLinks.length === 0) {
            passes.push('✅ All links have accessible text (' + links.length + ' links)');
        } else {
            issues.push('❌ RGAA 6.1: ' + emptyLinks.length + ' links without accessible text');
            console.log('Empty links:', emptyLinks);
        }

        // Test 9: ARIA Landmarks
        var banner = document.querySelector('header, [role="banner"]');
        var navigation = document.querySelector('nav, [role="navigation"]');
        var contentinfo = document.querySelector('footer, [role="contentinfo"]');

        if (banner && navigation && contentinfo && main) {
            passes.push('✅ All ARIA landmarks present');
        } else {
            if (!banner) warnings.push('⚠️ Missing banner/header landmark');
            if (!navigation) warnings.push('⚠️ Missing navigation landmark');
            if (!contentinfo) warnings.push('⚠️ Missing contentinfo/footer landmark');
        }

        // Test 10: Focus Indicators
        var focusableElements = document.querySelectorAll('a, button, input, textarea, select, [tabindex]');
        passes.push('ℹ️ ' + focusableElements.length + ' focusable elements (manual keyboard test required)');

        // Test 11: Color Contrast (basic check)
        warnings.push('⚠️ Color contrast: Manual verification with browser tools required');

        // Output Results
        console.log('%c\n=== PASSES (' + passes.length + ') ===', 'color: green; font-weight: bold;');
        passes.forEach(function(p) { console.log(p); });

        console.log('%c\n=== WARNINGS (' + warnings.length + ') ===', 'color: orange; font-weight: bold;');
        warnings.forEach(function(w) { console.log(w); });

        console.log('%c\n=== ISSUES (' + issues.length + ') ===', 'color: red; font-weight: bold;');
        issues.forEach(function(i) { console.log(i); });

        // Summary
        console.log('%c\n=== SUMMARY ===', 'font-weight: bold;');
        console.log('Passes: ' + passes.length);
        console.log('Warnings: ' + warnings.length);
        console.log('Issues: ' + issues.length);

        if (issues.length === 0) {
            console.log('%c\n🎉 No critical accessibility issues found!', 'color: green; font-size: 14px;');
        } else {
            console.log('%c\n⚠️ ' + issues.length + ' issues need to be fixed', 'color: red; font-size: 14px;');
        }

        console.log('\nFor complete RGAA 4.1.2 audit, use axe DevTools or WAVE browser extension.');
    })();
    </script>
    <?php
}

/**
 * =============================================================================
 * PERFORMANCE OPTIMIZATION
 * =============================================================================
 */

/**
 * Optimize script loading
 */
function azit_optimize_scripts() {
    // Remove jQuery migrate in production
    if (!defined('WP_DEBUG') || !WP_DEBUG) {
        global $wp_scripts;
        if (isset($wp_scripts->registered['jquery'])) {
            $wp_scripts->registered['jquery']->deps = array_diff(
                $wp_scripts->registered['jquery']->deps,
                array('jquery-migrate')
            );
        }
    }

    // Remove emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // Remove oEmbed
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Remove RSD link
    remove_action('wp_head', 'rsd_link');

    // Remove wlwmanifest link
    remove_action('wp_head', 'wlwmanifest_link');

    // Remove shortlink
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('wp_enqueue_scripts', 'azit_optimize_scripts', 1);

/**
 * Add resource hints for performance
 */
function azit_resource_hints($urls, $relation_type) {
    if ($relation_type === 'dns-prefetch') {
        $urls[] = '//fonts.googleapis.com';
        $urls[] = '//fonts.gstatic.com';
    }

    if ($relation_type === 'preconnect') {
        $urls[] = array(
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => true,
        );
    }

    return $urls;
}
add_filter('wp_resource_hints', 'azit_resource_hints', 10, 2);

/**
 * Lazy load images
 */
function azit_lazy_load_images($content) {
    // Skip if in admin, feed, or already processed
    if (is_admin() || is_feed()) {
        return $content;
    }

    // Add loading="lazy" to images that don't have it
    $content = preg_replace(
        '/<img((?!loading=)[^>]*)>/i',
        '<img$1 loading="lazy">',
        $content
    );

    return $content;
}
add_filter('the_content', 'azit_lazy_load_images');
add_filter('post_thumbnail_html', 'azit_lazy_load_images');

/**
 * Add async/defer to scripts
 */
function azit_async_defer_scripts($tag, $handle, $src) {
    // Scripts to load async
    $async_scripts = array();

    // Scripts to defer (most scripts)
    $defer_scripts = array(
        'azit-main-js',
        'azit-accessibility-core',
        'azit-keyboard-nav',
        'azit-navigation',
        'azit-tabs',
        'azit-language-switcher',
    );

    if (in_array($handle, $async_scripts)) {
        return str_replace(' src', ' async src', $tag);
    }

    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'azit_async_defer_scripts', 10, 3);

/**
 * =============================================================================
 * DEBUG TOOLS
 * =============================================================================
 */

/**
 * Add debug info to admin bar
 */
function azit_admin_bar_debug($wp_admin_bar) {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Main debug menu
    $wp_admin_bar->add_node(array(
        'id'    => 'azit-debug',
        'title' => 'AZIT Debug',
        'href'  => '#',
    ));

    // A11y Audit
    $wp_admin_bar->add_node(array(
        'id'     => 'azit-a11y-audit',
        'parent' => 'azit-debug',
        'title'  => 'Run A11y Audit',
        'href'   => add_query_arg('a11y_audit', '1'),
    ));

    // Template info
    global $template;
    $wp_admin_bar->add_node(array(
        'id'     => 'azit-template',
        'parent' => 'azit-debug',
        'title'  => 'Template: ' . basename($template),
        'href'   => '#',
    ));

    // Query count
    $wp_admin_bar->add_node(array(
        'id'     => 'azit-queries',
        'parent' => 'azit-debug',
        'title'  => 'Queries: ' . get_num_queries(),
        'href'   => '#',
    ));

    // Memory usage
    $memory = round(memory_get_peak_usage() / 1024 / 1024, 2);
    $wp_admin_bar->add_node(array(
        'id'     => 'azit-memory',
        'parent' => 'azit-debug',
        'title'  => 'Memory: ' . $memory . ' MB',
        'href'   => '#',
    ));

    // Page load time
    $wp_admin_bar->add_node(array(
        'id'     => 'azit-time',
        'parent' => 'azit-debug',
        'title'  => 'Time: ' . round(timer_stop(0, 3) * 1000) . ' ms',
        'href'   => '#',
    ));
}
add_action('admin_bar_menu', 'azit_admin_bar_debug', 999);

/**
 * =============================================================================
 * SECURITY HARDENING
 * =============================================================================
 */

/**
 * Remove WordPress version
 */
function azit_remove_version() {
    return '';
}
add_filter('the_generator', 'azit_remove_version');

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove X-Pingback header
 */
function azit_remove_pingback_header($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}
add_filter('wp_headers', 'azit_remove_pingback_header');

/**
 * Add security headers
 */
function azit_add_security_headers() {
    if (is_admin()) {
        return;
    }

    // Prevent clickjacking
    header('X-Frame-Options: SAMEORIGIN');

    // Prevent MIME type sniffing
    header('X-Content-Type-Options: nosniff');

    // XSS Protection
    header('X-XSS-Protection: 1; mode=block');

    // Referrer Policy
    header('Referrer-Policy: strict-origin-when-cross-origin');

    // Permissions Policy
    header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
}
add_action('send_headers', 'azit_add_security_headers');

/**
 * =============================================================================
 * HEALTH CHECK
 * =============================================================================
 */

/**
 * Theme health check
 */
function azit_theme_health_check() {
    $checks = array();

    // Check required files
    $required_files = array(
        'style.css',
        'functions.php',
        'index.php',
        'header.php',
        'footer.php',
        'assets/css/accessibility/a11y-utils.css',
        'assets/js/accessibility/keyboard-nav.js',
    );

    foreach ($required_files as $file) {
        $path = get_template_directory() . '/' . $file;
        $checks['files'][$file] = file_exists($path);
    }

    // Check menus
    $menu_locations = get_nav_menu_locations();
    $checks['menus']['top-menu'] = !empty($menu_locations['top-menu']);
    $checks['menus']['primary'] = !empty($menu_locations['primary']);
    $checks['menus']['footer'] = !empty($menu_locations['footer']);

    // Check custom post types
    $checks['cpts']['expertise'] = post_type_exists('expertise');
    $checks['cpts']['product'] = post_type_exists('product');
    $checks['cpts']['training'] = post_type_exists('training');

    // Check plugins
    $checks['plugins']['acf'] = class_exists('ACF');
    $checks['plugins']['cf7'] = class_exists('WPCF7');
    $checks['plugins']['wpml'] = defined('ICL_SITEPRESS_VERSION');

    // Check settings
    $checks['settings']['front_page'] = get_option('show_on_front') === 'page';
    $checks['settings']['permalinks'] = get_option('permalink_structure') !== '';

    return $checks;
}

/**
 * Display health check in admin
 */
function azit_admin_health_check_page() {
    add_theme_page(
        __('Theme Health Check', 'azit-industrial'),
        __('Health Check', 'azit-industrial'),
        'manage_options',
        'azit-health-check',
        'azit_render_health_check_page'
    );
}
add_action('admin_menu', 'azit_admin_health_check_page');

/**
 * Render health check page
 */
function azit_render_health_check_page() {
    $checks = azit_theme_health_check();
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('AZIT Theme Health Check', 'azit-industrial'); ?></h1>

        <h2><?php esc_html_e('Required Files', 'azit-industrial'); ?></h2>
        <table class="widefat">
            <thead>
                <tr>
                    <th><?php esc_html_e('File', 'azit-industrial'); ?></th>
                    <th><?php esc_html_e('Status', 'azit-industrial'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($checks['files'] as $file => $exists) : ?>
                <tr>
                    <td><code><?php echo esc_html($file); ?></code></td>
                    <td>
                        <?php if ($exists) : ?>
                            <span style="color: green;">✅ <?php esc_html_e('Found', 'azit-industrial'); ?></span>
                        <?php else : ?>
                            <span style="color: red;">❌ <?php esc_html_e('Missing', 'azit-industrial'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2><?php esc_html_e('Navigation Menus', 'azit-industrial'); ?></h2>
        <table class="widefat">
            <tbody>
                <?php foreach ($checks['menus'] as $menu => $assigned) : ?>
                <tr>
                    <td><?php echo esc_html($menu); ?></td>
                    <td>
                        <?php if ($assigned) : ?>
                            <span style="color: green;">✅ <?php esc_html_e('Assigned', 'azit-industrial'); ?></span>
                        <?php else : ?>
                            <span style="color: orange;">⚠️ <?php esc_html_e('Not assigned', 'azit-industrial'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2><?php esc_html_e('Custom Post Types', 'azit-industrial'); ?></h2>
        <table class="widefat">
            <tbody>
                <?php foreach ($checks['cpts'] as $cpt => $registered) : ?>
                <tr>
                    <td><?php echo esc_html($cpt); ?></td>
                    <td>
                        <?php if ($registered) : ?>
                            <span style="color: green;">✅ <?php esc_html_e('Registered', 'azit-industrial'); ?></span>
                        <?php else : ?>
                            <span style="color: red;">❌ <?php esc_html_e('Not registered', 'azit-industrial'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2><?php esc_html_e('Recommended Plugins', 'azit-industrial'); ?></h2>
        <table class="widefat">
            <tbody>
                <?php
                $plugin_names = array(
                    'acf'  => 'Advanced Custom Fields',
                    'cf7'  => 'Contact Form 7',
                    'wpml' => 'WPML',
                );
                foreach ($checks['plugins'] as $plugin => $active) :
                ?>
                <tr>
                    <td><?php echo esc_html($plugin_names[$plugin]); ?></td>
                    <td>
                        <?php if ($active) : ?>
                            <span style="color: green;">✅ <?php esc_html_e('Active', 'azit-industrial'); ?></span>
                        <?php else : ?>
                            <span style="color: orange;">⚠️ <?php esc_html_e('Not installed', 'azit-industrial'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2><?php esc_html_e('WordPress Settings', 'azit-industrial'); ?></h2>
        <table class="widefat">
            <tbody>
                <tr>
                    <td><?php esc_html_e('Static Front Page', 'azit-industrial'); ?></td>
                    <td>
                        <?php if ($checks['settings']['front_page']) : ?>
                            <span style="color: green;">✅ <?php esc_html_e('Configured', 'azit-industrial'); ?></span>
                        <?php else : ?>
                            <span style="color: orange;">⚠️ <?php esc_html_e('Not set', 'azit-industrial'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Pretty Permalinks', 'azit-industrial'); ?></td>
                    <td>
                        <?php if ($checks['settings']['permalinks']) : ?>
                            <span style="color: green;">✅ <?php esc_html_e('Enabled', 'azit-industrial'); ?></span>
                        <?php else : ?>
                            <span style="color: orange;">⚠️ <?php esc_html_e('Using default', 'azit-industrial'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top: 20px;">
            <a href="<?php echo esc_url(home_url('/?a11y_audit=1')); ?>" class="button button-primary" target="_blank">
                <?php esc_html_e('Run Accessibility Audit', 'azit-industrial'); ?>
            </a>
        </p>
    </div>
    <?php
}
