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
        $content = str_replace('href="../index.html"', 'href="' . home_url('/') . '"', $content);
        $content = str_replace('href="contact.html"', 'href="' . home_url('/contact/') . '"', $content);
        $content = str_replace('href="company.html"', 'href="' . home_url('/company/') . '"', $content);
        $content = str_replace('href="training.html"', 'href="' . home_url('/training/') . '"', $content);
        $content = str_replace('href="blog.html"', 'href="' . home_url('/blog/') . '"', $content);
        $content = str_replace('href="sitemap.html"', 'href="' . home_url('/sitemap/') . '"', $content);
        $content = str_replace('href="accessibilite.html"', 'href="' . home_url('/accessibility/') . '"', $content);

        // Convert product links
        $content = preg_replace('/href="products\/([^"]+)\.html"/', 'href="' . home_url('/products/$1/') . '"', $content);

        // Convert services/expertise links
        $content = preg_replace('/href="services\/expertise\.html"/', 'href="' . home_url('/expertise/') . '"', $content);
        $content = preg_replace('/href="services\/expertise-([^"]+)\.html"/', 'href="' . home_url('/expertise/$1/') . '"', $content);

        // Fix image paths
        $content = str_replace('src="../', 'src="' . get_template_directory_uri() . '/assets/', $content);

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
    // Base path to static pages
    $static_path = get_template_directory() . '/../pages/';

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
    // Base path to static product pages
    $static_path = get_template_directory() . '/../pages/products/';

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
    // Base path to static expertise pages
    $static_path = get_template_directory() . '/../pages/services/';

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
 * Import all static content
 */
function azit_import_all_static_content() {
    $results = array(
        'pages'     => azit_import_static_pages(),
        'products'  => azit_import_static_products(),
        'expertise' => azit_import_static_expertise(),
    );

    return $results;
}
