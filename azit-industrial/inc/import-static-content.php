<?php
/**
 * Import Static Site Content to WordPress
 *
 * This script imports content from the original static HTML files
 * into WordPress pages and custom post types.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Extract main content from HTML file
 *
 * @param string $html_path Path to HTML file
 * @return string Extracted content
 */
function azit_extract_html_content($html_path) {
    if (!file_exists($html_path)) {
        return '';
    }

    $html = file_get_contents($html_path);

    // Extract content between <main> tags
    if (preg_match('/<main[^>]*>(.*?)<\/main>/s', $html, $matches)) {
        $content = $matches[1];

        // Remove breadcrumb section
        $content = preg_replace('/<section[^>]*>.*?<nav class="breadcrumb">.*?<\/section>/s', '', $content);

        // Convert relative paths to absolute WordPress paths
        // Home links
        $content = str_replace('href="../index.html"', 'href="' . home_url('/') . '"', $content);
        $content = str_replace('href="../../index.html"', 'href="' . home_url('/') . '"', $content);

        // Page links (from root level)
        $content = str_replace('href="contact.html"', 'href="' . home_url('/contact/') . '"', $content);
        $content = str_replace('href="company.html"', 'href="' . home_url('/company/') . '"', $content);
        $content = str_replace('href="training.html"', 'href="' . home_url('/training/') . '"', $content);
        $content = str_replace('href="blog.html"', 'href="' . home_url('/blog/') . '"', $content);
        $content = str_replace('href="sitemap.html"', 'href="' . home_url('/sitemap/') . '"', $content);
        $content = str_replace('href="accessibilite.html"', 'href="' . home_url('/accessibility/') . '"', $content);

        // Page links (from subdirectory level - products/services)
        $content = str_replace('href="../contact.html"', 'href="' . home_url('/contact/') . '"', $content);
        $content = str_replace('href="../company.html"', 'href="' . home_url('/company/') . '"', $content);
        $content = str_replace('href="../training.html"', 'href="' . home_url('/training/') . '"', $content);
        $content = str_replace('href="../blog.html"', 'href="' . home_url('/blog/') . '"', $content);
        $content = str_replace('href="../sitemap.html"', 'href="' . home_url('/sitemap/') . '"', $content);
        $content = str_replace('href="../accessibilite.html"', 'href="' . home_url('/accessibility/') . '"', $content);

        // Convert product links (from various paths)
        // From root: href="products/fsoe-slave.html"
        $content = preg_replace('/href="products\/([^"]+)\.html"/', 'href="' . home_url('/products/$1/') . '"', $content);
        // From parent: href="../products/fsoe-slave.html"
        $content = preg_replace('/href="\.\.\/products\/([^"]+)\.html"/', 'href="' . home_url('/products/$1/') . '"', $content);
        // Direct product links (from products folder): href="fsoe-slave.html"
        $product_slugs = array(
            'fsoe-slave', 'fsoe-master', 'profisafe-slave', 'profisafe-master',
            'canopen-slave', 'canopen-master', 'canopen-safety-slave', 'canopen-safety-master',
            'j1939', 'protocol-gateway', 'simulation', 'opc-ua', 'opc-ua-fx',
            'communication-stacks', 'tools', 'analyzers', 'cip-safety', 'wireless-safety', 'uds'
        );
        foreach ($product_slugs as $slug) {
            $content = str_replace('href="' . $slug . '.html"', 'href="' . home_url('/products/' . $slug . '/') . '"', $content);
        }

        // Convert services/expertise links
        $content = preg_replace('/href="services\/expertise\.html"/', 'href="' . home_url('/expertise/') . '"', $content);
        $content = preg_replace('/href="\.\.\/services\/expertise\.html"/', 'href="' . home_url('/expertise/') . '"', $content);
        $content = preg_replace('/href="services\/expertise-([^"]+)\.html"/', 'href="' . home_url('/expertise/$1/') . '"', $content);
        $content = preg_replace('/href="\.\.\/services\/expertise-([^"]+)\.html"/', 'href="' . home_url('/expertise/$1/') . '"', $content);

        // Fix image paths (various levels)
        $content = str_replace('src="../assets/', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../../assets/', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../../', 'src="' . get_template_directory_uri() . '/assets/', $content);

        return trim($content);
    }

    return '';
}

/**
 * Extract title from HTML file
 *
 * @param string $html_path Path to HTML file
 * @return string Extracted title
 */
function azit_extract_html_title($html_path) {
    if (!file_exists($html_path)) {
        return '';
    }

    $html = file_get_contents($html_path);

    // Try to get h1 title first
    if (preg_match('/<h1[^>]*class="[^"]*title[^"]*"[^>]*>([^<]+)<\/h1>/s', $html, $matches)) {
        return trim(strip_tags($matches[1]));
    }

    // Fallback to page title
    if (preg_match('/<title>([^<]+)<\/title>/', $html, $matches)) {
        $title = trim($matches[1]);
        // Remove " - AZIT" suffix
        $title = preg_replace('/\s*-\s*AZIT\s*$/', '', $title);
        return $title;
    }

    return '';
}

/**
 * Import pages from static HTML files
 */
function azit_import_static_pages() {
    // Base path to static pages (bundled with theme)
    $static_path = get_template_directory() . '/static-content/';

    // Pages to import
    $pages = array(
        'contact.html' => array('slug' => 'contact', 'title' => 'Contact Us'),
        'company.html' => array('slug' => 'company', 'title' => 'Company'),
        'training.html' => array('slug' => 'training', 'title' => 'Training'),
        'blog.html' => array('slug' => 'blog', 'title' => 'Blog'),
        'sitemap.html' => array('slug' => 'sitemap', 'title' => 'Sitemap'),
        'accessibilite.html' => array('slug' => 'accessibility', 'title' => 'Accessibility'),
    );

    $imported = 0;

    foreach ($pages as $file => $info) {
        $file_path = $static_path . $file;

        // Check if page already exists
        $existing = get_page_by_path($info['slug']);
        if ($existing) {
            continue;
        }

        // Extract content
        $content = azit_extract_html_content($file_path);
        $title = azit_extract_html_title($file_path);

        if (empty($title)) {
            $title = $info['title'];
        }

        if (!empty($content)) {
            wp_insert_post(array(
                'post_title'   => $title,
                'post_name'    => $info['slug'],
                'post_content' => $content,
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ));
            $imported++;
        }
    }

    return $imported;
}

/**
 * Import products from static HTML files
 */
function azit_import_static_products() {
    // Base path to static product pages (bundled with theme)
    $static_path = get_template_directory() . '/static-content/products/';

    // Products to import
    $products = array(
        'fsoe-slave.html',
        'fsoe-master.html',
        'profisafe-slave.html',
        'profisafe-master.html',
        'canopen-slave.html',
        'canopen-master.html',
        'canopen-safety-slave.html',
        'canopen-safety-master.html',
        'j1939.html',
        'protocol-gateway.html',
        'simulation.html',
        'opc-ua.html',
        'communication-stacks.html',
        'tools.html',
        'analyzers.html',
        'cip-safety.html',
        'wireless-safety.html',
        'opc-ua-fx.html',
        'uds.html',
    );

    $imported = 0;

    foreach ($products as $file) {
        $file_path = $static_path . $file;
        $slug = str_replace('.html', '', $file);

        // Check if product already exists
        $existing = get_posts(array(
            'name'        => $slug,
            'post_type'   => 'product',
            'post_status' => 'any',
            'numberposts' => 1,
        ));

        if (!empty($existing)) {
            continue;
        }

        // Extract content
        $content = azit_extract_html_content($file_path);
        $title = azit_extract_html_title($file_path);

        if (empty($title)) {
            // Generate title from filename
            $title = ucwords(str_replace('-', ' ', $slug));
        }

        if (!empty($content)) {
            wp_insert_post(array(
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_content' => $content,
                'post_status'  => 'publish',
                'post_type'    => 'product',
            ));
            $imported++;
        }
    }

    return $imported;
}

/**
 * Import expertise posts from static HTML files
 */
function azit_import_static_expertise() {
    // Base path to static expertise pages (bundled with theme)
    $static_path = get_template_directory() . '/static-content/services/';

    // Expertise pages to import
    $expertise = array(
        'expertise.html' => 'expertise',
        'expertise-compliance.html' => 'safety-compliance',
        'expertise-development.html' => 'protocol-development',
        'expertise-testing.html' => 'testing-validation',
        'expertise-networks.html' => 'industrial-networks',
    );

    $imported = 0;

    foreach ($expertise as $file => $slug) {
        $file_path = $static_path . $file;

        // Check if expertise already exists
        $existing = get_posts(array(
            'name'        => $slug,
            'post_type'   => 'expertise',
            'post_status' => 'any',
            'numberposts' => 1,
        ));

        if (!empty($existing)) {
            continue;
        }

        // Extract content
        $content = azit_extract_html_content($file_path);
        $title = azit_extract_html_title($file_path);

        if (empty($title)) {
            $title = ucwords(str_replace('-', ' ', $slug));
        }

        if (!empty($content)) {
            wp_insert_post(array(
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_content' => $content,
                'post_status'  => 'publish',
                'post_type'    => 'expertise',
            ));
            $imported++;
        }
    }

    return $imported;
}

/**
 * Import training courses from static training page data
 *
 * Creates individual training CPT posts with metadata extracted
 * from the training.html course cards.
 */
function azit_import_static_training() {
    // Training course data extracted from static-content/training.html
    $courses = array(
        // --- Protocol Training (category: protocols) ---
        array(
            'title'       => 'CAN Training',
            'slug'        => 'can-training',
            'description' => 'Implementation of the CAN bus. CiA member with over 10 years of experience in CAN/CANopen technologies.',
            'duration'    => '2 days',
            'price'       => '1 390 €',
            'level'       => 'intermediate',
            'category'    => 'protocols',
        ),
        array(
            'title'       => 'CANopen Training',
            'slug'        => 'canopen-training',
            'description' => 'Complete CANopen protocol training including object dictionary, PDO, SDO, and network management.',
            'duration'    => '2 days',
            'price'       => '1 390 €',
            'level'       => 'intermediate',
            'category'    => 'protocols',
        ),
        array(
            'title'       => 'J1939 Training',
            'slug'        => 'j1939-training',
            'description' => 'SAE J1939 protocol for automotive and off-highway applications including PGNs and transport protocol.',
            'duration'    => '2 days',
            'price'       => '1 390 €',
            'level'       => 'intermediate',
            'category'    => 'protocols',
        ),
        array(
            'title'       => 'EtherCAT Training',
            'slug'        => 'ethercat-training',
            'description' => 'Industrial Ethernet protocol for real-time applications with high-speed communication and distributed clocks.',
            'duration'    => '2 days',
            'price'       => '1 390 €',
            'level'       => 'intermediate',
            'category'    => 'protocols',
        ),
        array(
            'title'       => 'Industrial Ethernet Training',
            'slug'        => 'industrial-ethernet-training',
            'description' => 'Comprehensive overview of industrial Ethernet protocols and network architectures for automation.',
            'duration'    => '2 days',
            'price'       => '1 390 €',
            'level'       => 'intermediate',
            'category'    => 'protocols',
        ),
        array(
            'title'       => 'Ethernet/IP - CIP Training',
            'slug'        => 'ethernet-ip-cip-training',
            'description' => 'Common Industrial Protocol (CIP) and Ethernet/IP implementation for industrial automation systems.',
            'duration'    => '2 days',
            'price'       => '1 590 €',
            'level'       => 'intermediate',
            'category'    => 'protocols',
        ),
        array(
            'title'       => 'PROFINET Training',
            'slug'        => 'profinet-training',
            'description' => 'PROFINET IO protocol fundamentals including device development and network configuration.',
            'duration'    => '2 days',
            'price'       => '1 000 €',
            'level'       => 'intermediate',
            'category'    => 'protocols',
        ),
        // --- Safety Standards (category: safety) ---
        array(
            'title'       => 'IEC 61508',
            'slug'        => 'iec-61508',
            'description' => 'Functional safety standard for electrical/electronic/programmable electronic safety-related systems.',
            'duration'    => '3 days',
            'price'       => '2 450 €',
            'level'       => 'advanced',
            'category'    => 'safety',
        ),
        array(
            'title'       => 'ISO 26262 (Automotive)',
            'slug'        => 'iso-26262',
            'description' => 'Functional safety for road vehicles including ASIL levels and automotive-specific requirements.',
            'duration'    => '3 days',
            'price'       => '2 450 €',
            'level'       => 'advanced',
            'category'    => 'safety',
        ),
        array(
            'title'       => 'ISO 21434 (Automotive Cybersecurity)',
            'slug'        => 'iso-21434',
            'description' => 'Cybersecurity engineering for road vehicles including threat analysis and risk assessment.',
            'duration'    => '3 days',
            'price'       => '2 450 €',
            'level'       => 'advanced',
            'category'    => 'safety',
        ),
        array(
            'title'       => 'IEC 62304 (Medical)',
            'slug'        => 'iec-62304',
            'description' => 'Medical device software lifecycle processes and safety classification requirements.',
            'duration'    => '2 days',
            'price'       => '1 750 €',
            'level'       => 'advanced',
            'category'    => 'safety',
        ),
        array(
            'title'       => 'DO-178C (Aeronautics)',
            'slug'        => 'do-178c',
            'description' => 'Software considerations in airborne systems and equipment certification for aviation.',
            'duration'    => '3 days',
            'price'       => '2 450 €',
            'level'       => 'advanced',
            'category'    => 'safety',
        ),
        array(
            'title'       => 'EN 50716 (Railway)',
            'slug'        => 'en-50716',
            'description' => 'Railway applications software development requirements and safety integrity levels.',
            'duration'    => '2 days',
            'price'       => '1 750 €',
            'level'       => 'advanced',
            'category'    => 'safety',
        ),
        array(
            'title'       => 'ISO 13849 (Machinery)',
            'slug'        => 'iso-13849',
            'description' => 'Safety of machinery control systems and Performance Level (PL) determination.',
            'duration'    => '2 days',
            'price'       => '1 750 €',
            'level'       => 'intermediate',
            'category'    => 'safety',
        ),
        array(
            'title'       => 'ISO 25119 (Agricultural)',
            'slug'        => 'iso-25119',
            'description' => 'Tractors and machinery for agriculture and forestry - safety-related control systems.',
            'duration'    => '2 days',
            'price'       => '1 750 €',
            'level'       => 'intermediate',
            'category'    => 'safety',
        ),
        // --- Hands-on Workshops (category: workshops) ---
        array(
            'title'       => 'Industrial Ethernet Troubleshooting',
            'slug'        => 'industrial-ethernet-troubleshooting',
            'description' => 'Advanced troubleshooting techniques for industrial Ethernet networks using protocol analyzers.',
            'duration'    => '1 day',
            'price'       => '790 €',
            'level'       => 'advanced',
            'category'    => 'workshops',
        ),
        array(
            'title'       => 'Embedded Systems Cybersecurity',
            'slug'        => 'embedded-systems-cybersecurity',
            'description' => 'Security principles for embedded systems including threat modeling and secure coding practices.',
            'duration'    => '2 days',
            'price'       => '1 390 €',
            'level'       => 'intermediate',
            'category'    => 'workshops',
        ),
        array(
            'title'       => 'Medical Device Cybersecurity',
            'slug'        => 'medical-device-cybersecurity',
            'description' => 'Cybersecurity requirements specific to medical devices including FDA and MDR compliance.',
            'duration'    => '1 day',
            'price'       => '960 €',
            'level'       => 'advanced',
            'category'    => 'workshops',
        ),
        array(
            'title'       => 'FreeRTOS Implementation',
            'slug'        => 'freertos-implementation',
            'description' => 'Real-time operating system implementation including task management, synchronization, and best practices.',
            'duration'    => '2 days',
            'price'       => '1 490 €',
            'level'       => 'intermediate',
            'category'    => 'workshops',
        ),
        array(
            'title'       => 'MISRA C:2025',
            'slug'        => 'misra-c-2025',
            'description' => 'Guidelines for the use of C language in critical systems including latest MISRA C:2025 updates.',
            'duration'    => '2 days',
            'price'       => '1 000 €',
            'level'       => 'intermediate',
            'category'    => 'workshops',
        ),
    );

    $imported = 0;

    foreach ($courses as $course) {
        // Check if training already exists
        $existing = get_posts(array(
            'name'        => $course['slug'],
            'post_type'   => 'training',
            'post_status' => 'any',
            'numberposts' => 1,
        ));

        if (!empty($existing)) {
            continue;
        }

        // Build post content with course description only
        // (Duration, capacity, pricing, and contact links are managed by ACF fields
        // and rendered by the single-training.php template sidebar)
        $content = '<p>' . $course['description'] . '</p>';

        $post_id = wp_insert_post(array(
            'post_title'   => $course['title'],
            'post_name'    => $course['slug'],
            'post_content' => $content,
            'post_status'  => 'publish',
            'post_type'    => 'training',
        ));

        if ($post_id && !is_wp_error($post_id)) {
            // Set custom fields (works with or without ACF)
            // These are rendered by single-training.php from ACF/meta — NOT from post_content
            update_post_meta($post_id, 'training_duration', $course['duration']);
            update_post_meta($post_id, 'training_price', $course['price']);
            update_post_meta($post_id, 'training_level', $course['level']);
            update_post_meta($post_id, 'training_format', 'center');
            update_post_meta($post_id, 'training_max_participants', 'Up to 6 participants');
            update_post_meta($post_id, 'training_audience', 'Engineers and developers working with industrial communication protocols and safety systems.');
            update_post_meta($post_id, '_azit_training_category', $course['category']);
            $imported++;
        }
    }

    return $imported;
}

/**
 * Import all static content
 */
function azit_import_all_static_content() {
    // Import media first so URLs can be rewritten in content
    $media_results = azit_import_media_to_library();

    $results = array(
        'pages'     => azit_import_static_pages(),
        'products'  => azit_import_static_products(),
        'expertise' => azit_import_static_expertise(),
        'training'  => azit_import_static_training(),
        'media'     => $media_results['imported'],
    );

    // Rewrite theme asset URLs in all imported content to use Media Library URLs
    if (!empty($media_results['url_map'])) {
        azit_rewrite_content_media_urls($media_results['url_map']);
    }

    return $results;
}

/**
 * =============================================================================
 * MEDIA LIBRARY IMPORT
 * =============================================================================
 */

/**
 * Import theme asset files (images, PDFs) into the WordPress Media Library.
 *
 * Files served from the theme's assets/ directory are not visible in
 * Media > Library because WordPress only lists attachment posts. This
 * function copies each file to wp-content/uploads/ and creates a proper
 * attachment post so it appears in the Media Library.
 *
 * @return array {
 *     @type int      $imported Number of newly imported files.
 *     @type int      $skipped  Number of files already in the library.
 *     @type string[] $url_map  Old theme URL => new Media Library URL.
 * }
 */
function azit_import_media_to_library() {
    if (!function_exists('wp_crop_image')) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
    }
    if (!function_exists('wp_handle_sideload')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }
    if (!function_exists('media_handle_sideload')) {
        require_once ABSPATH . 'wp-admin/includes/media.php';
    }

    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Directories inside the theme that contain media files
    $media_dirs = array(
        'assets/images/products',
        'assets/images/diagrams',
        'assets/docs',
        'assets/docs/datasheets',
    );

    // Allowed MIME types
    $allowed_types = array(
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'gif'  => 'image/gif',
        'svg'  => 'image/svg+xml',
        'webp' => 'image/webp',
        'pdf'  => 'application/pdf',
    );

    $imported = 0;
    $skipped  = 0;
    $url_map  = array();

    foreach ($media_dirs as $rel_dir) {
        $abs_dir = $theme_dir . '/' . $rel_dir;
        if (!is_dir($abs_dir)) {
            continue;
        }

        $files = scandir($abs_dir);
        if ($files === false) {
            continue;
        }

        foreach ($files as $filename) {
            if ($filename === '.' || $filename === '..' || $filename === '.gitkeep') {
                continue;
            }

            $file_path = $abs_dir . '/' . $filename;
            if (!is_file($file_path)) {
                continue;
            }

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (!isset($allowed_types[$ext])) {
                continue;
            }

            // Check if this file was already imported (by matching filename in attachments)
            $existing = get_posts(array(
                'post_type'   => 'attachment',
                'post_status' => 'inherit',
                'meta_key'    => '_azit_source_file',
                'meta_value'  => $rel_dir . '/' . $filename,
                'numberposts' => 1,
            ));

            $old_url = $theme_uri . '/' . $rel_dir . '/' . $filename;

            if (!empty($existing)) {
                $skipped++;
                $url_map[$old_url] = wp_get_attachment_url($existing[0]->ID);
                continue;
            }

            // Copy file to a temporary location for wp_handle_sideload
            $tmp_file = wp_tempnam($filename);
            if (!copy($file_path, $tmp_file)) {
                continue;
            }

            $file_array = array(
                'name'     => $filename,
                'tmp_name' => $tmp_file,
                'type'     => $allowed_types[$ext],
                'error'    => 0,
                'size'     => filesize($file_path),
            );

            // Generate a human-readable title from the filename
            $title = pathinfo($filename, PATHINFO_FILENAME);
            $title = str_replace(array('-', '_'), ' ', $title);
            $title = ucwords($title);

            // Use media_handle_sideload to create the attachment
            $attachment_id = media_handle_sideload($file_array, 0, $title);

            if (is_wp_error($attachment_id)) {
                @unlink($tmp_file);
                continue;
            }

            // Store the source file path so we can detect duplicates on re-import
            update_post_meta($attachment_id, '_azit_source_file', $rel_dir . '/' . $filename);

            $new_url = wp_get_attachment_url($attachment_id);
            $url_map[$old_url] = $new_url;
            $imported++;
        }
    }

    return array(
        'imported' => $imported,
        'skipped'  => $skipped,
        'url_map'  => $url_map,
    );
}

/**
 * Rewrite theme asset URLs in post content to use Media Library URLs.
 *
 * After media files have been imported into the Media Library, this function
 * searches all posts/pages/products/expertise content and replaces old
 * theme-directory URLs with the new wp-content/uploads/ URLs.
 *
 * @param string[] $url_map Old URL => New URL mapping.
 * @return int Number of posts updated.
 */
function azit_rewrite_content_media_urls($url_map) {
    if (empty($url_map)) {
        return 0;
    }

    $post_types = array('post', 'page', 'product', 'expertise', 'training');
    $updated = 0;

    $posts = get_posts(array(
        'post_type'   => $post_types,
        'post_status' => 'any',
        'numberposts' => -1,
    ));

    foreach ($posts as $post) {
        $content = $post->post_content;
        $new_content = str_replace(
            array_keys($url_map),
            array_values($url_map),
            $content
        );

        if ($new_content !== $content) {
            wp_update_post(array(
                'ID'           => $post->ID,
                'post_content' => $new_content,
            ));
            $updated++;
        }
    }

    return $updated;
}

/**
 * Import only media assets (can be triggered independently from content import).
 *
 * @return array Import results.
 */
function azit_import_media_only() {
    $media_results = azit_import_media_to_library();

    // Also rewrite URLs in existing content
    $posts_updated = 0;
    if (!empty($media_results['url_map'])) {
        $posts_updated = azit_rewrite_content_media_urls($media_results['url_map']);
    }

    $media_results['posts_updated'] = $posts_updated;
    return $media_results;
}
