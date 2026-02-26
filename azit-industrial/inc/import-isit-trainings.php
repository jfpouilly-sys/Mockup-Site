<?php
/**
 * ISIT Training Data Import Script for WordPress with ACF
 *
 * Imports training data from isit_trainings_data.json into the WordPress
 * 'training' Custom Post Type and populates all ACF field tabs:
 *   - General: duration, participants, level, format, certification
 *   - Pricing: inter-enterprise price
 *   - Content: objectives (WYSIWYG + repeater), prerequisites, audience
 *   - Program: programme (WYSIWYG + structured outline)
 *   - Sidebar: benefits, PDF URL, source URL, language
 *   - Sessions: date/location entries
 *
 * USAGE:
 *   Option 1 (WP-CLI): wp eval-file wordpress_import_trainings.php
 *   Option 2 (Theme):   Place in theme root, add to functions.php temporarily
 *   Option 3 (Admin):   Via Tools > AZIT Setup (if implemented)
 *
 * @package AZIT_Industrial
 * @since   7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main import function: reads JSON and creates/updates training posts with ACF fields.
 *
 * @param string|null $json_path Optional path to JSON file. Defaults to theme data directory.
 * @return array Import summary with counts.
 */
function azit_import_isit_trainings($json_path = null) {

    // Default to theme data directory
    if (!$json_path) {
        $json_path = get_template_directory() . '/data/isit_trainings_data.json';
    }

    // Verify file exists
    if (!file_exists($json_path)) {
        $msg = "Error: JSON file not found at: {$json_path}";
        if (defined('WP_CLI') && WP_CLI) {
            WP_CLI::error($msg);
        }
        echo $msg . "\n";
        return array('error' => $msg);
    }

    // Parse JSON
    $json_content = file_get_contents($json_path);
    $data = json_decode($json_content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        $msg = 'Error: Invalid JSON - ' . json_last_error_msg();
        echo $msg . "\n";
        return array('error' => $msg);
    }

    if (!isset($data['trainings']) || !is_array($data['trainings'])) {
        $msg = 'Error: JSON must contain a "trainings" array.';
        echo $msg . "\n";
        return array('error' => $msg);
    }

    $trainings = $data['trainings'];
    $summary   = array(
        'total'    => count($trainings),
        'created'  => 0,
        'updated'  => 0,
        'skipped'  => 0,
        'errors'   => 0,
        'details'  => array(),
    );

    echo "=== ISIT Training Import ===\n";
    echo "Source: {$json_path}\n";
    echo "Total trainings: {$summary['total']}\n\n";

    foreach ($trainings as $index => $training) {
        $num   = $index + 1;
        $title = $training['title'] ?? 'Untitled';
        $slug  = $training['post_slug'] ?? sanitize_title($title);

        echo "[{$num}/{$summary['total']}] {$title}\n";

        try {
            $post_id = azit_import_single_training($training);

            if (is_wp_error($post_id)) {
                throw new Exception($post_id->get_error_message());
            }

            // Determine if created or updated
            $existing = get_page_by_path($slug, OBJECT, 'training');
            if ($existing && $existing->ID === $post_id) {
                $summary['updated']++;
                echo "  -> Updated (ID: {$post_id})\n";
            } else {
                $summary['created']++;
                echo "  -> Created (ID: {$post_id})\n";
            }

            $summary['details'][] = array(
                'title'   => $title,
                'post_id' => $post_id,
                'status'  => 'success',
            );

        } catch (Exception $e) {
            $summary['errors']++;
            $summary['details'][] = array(
                'title'  => $title,
                'status' => 'error',
                'message' => $e->getMessage(),
            );
            echo "  !! Error: {$e->getMessage()}\n";
        }

        echo "\n";
    }

    // Print summary
    echo str_repeat('=', 60) . "\n";
    echo "IMPORT COMPLETE\n";
    echo str_repeat('=', 60) . "\n";
    echo "Total processed: {$summary['total']}\n";
    echo "Created:         {$summary['created']}\n";
    echo "Updated:         {$summary['updated']}\n";
    echo "Errors:          {$summary['errors']}\n";
    echo str_repeat('=', 60) . "\n";

    return $summary;
}

/**
 * Import a single training record into WordPress.
 *
 * Creates or updates the training post and populates all ACF fields
 * across all tabs (General, Pricing, Content, Program, Sidebar, Sessions).
 *
 * @param array $training Training data from JSON.
 * @return int|WP_Error Post ID on success, WP_Error on failure.
 */
function azit_import_single_training($training) {

    $slug  = $training['post_slug'] ?? sanitize_title($training['title']);
    $title = $training['title'] ?? '';

    // Check for existing post
    $existing = get_page_by_path($slug, OBJECT, 'training');

    // Build post data
    $post_data = array(
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_type'    => 'training',
        'post_status'  => 'publish',
        'post_excerpt' => $training['excerpt'] ?? '',
        'post_content' => '', // Content is stored in ACF fields
    );

    // Insert or update
    if ($existing) {
        $post_data['ID'] = $existing->ID;
        $post_id = wp_update_post($post_data, true);
    } else {
        $post_id = wp_insert_post($post_data, true);
    }

    if (is_wp_error($post_id)) {
        return $post_id;
    }

    // =========================================================================
    // ACF TAB: General
    // =========================================================================
    azit_update_acf_field('training_duration', $training['duration'] ?? '', $post_id);
    azit_update_acf_field('training_max_participants', $training['max_participants'] ?? '', $post_id);
    azit_update_acf_field('training_level', $training['level'] ?? 'intermediate', $post_id);
    azit_update_acf_field('training_format', $training['format'] ?? 'center', $post_id);
    azit_update_acf_field('training_certification', true, $post_id);

    // =========================================================================
    // ACF TAB: Pricing
    // =========================================================================
    azit_update_acf_field('training_price', $training['price'] ?? '', $post_id);
    azit_update_acf_field('training_private_price', __('On request', 'azit-industrial'), $post_id);

    // =========================================================================
    // ACF TAB: Content
    // =========================================================================

    // Pedagogical Objectives - WYSIWYG (free text from ISIT)
    azit_update_acf_field('training_objectives_text', $training['objectives_text'] ?? '', $post_id);

    // Learning Objectives - Repeater (structured list)
    $objectives_list = $training['objectives_list'] ?? array();
    if (!empty($objectives_list)) {
        $repeater_data = array();
        foreach ($objectives_list as $obj_text) {
            $repeater_data[] = array('objective' => $obj_text);
        }
        azit_update_acf_field('training_objectives', $repeater_data, $post_id);
    }

    // Prerequisites - WYSIWYG
    azit_update_acf_field('training_prerequisites', $training['prerequisites'] ?? '', $post_id);

    // Target Audience - WYSIWYG
    azit_update_acf_field('training_audience', $training['target_audience'] ?? '', $post_id);

    // =========================================================================
    // ACF TAB: Program
    // =========================================================================

    // Detailed Programme - WYSIWYG (free text from ISIT PDF)
    azit_update_acf_field('training_programme_text', $training['programme_text'] ?? '', $post_id);

    // Course Outline - Repeater (structured day-by-day)
    // Parse programme_text into structured outline if no explicit outline data
    if (!empty($training['programme_text']) && empty($training['outline'])) {
        $outline_data = azit_parse_programme_to_outline($training['programme_text']);
        if (!empty($outline_data)) {
            azit_update_acf_field('training_outline', $outline_data, $post_id);
        }
    }

    // =========================================================================
    // ACF TAB: Sidebar
    // =========================================================================

    // PDF Brochure URL (external)
    azit_update_acf_field('training_pdf_url', $training['pdf_brochure_url'] ?? '', $post_id);

    // Source URL (ISIT page)
    azit_update_acf_field('training_source_url', $training['url'] ?? '', $post_id);

    // Language
    azit_update_acf_field('training_language', $training['language'] ?? 'fr', $post_id);

    // =========================================================================
    // ACF TAB: Sessions
    // =========================================================================
    if (!empty($training['training_date'])) {
        $session_data = array(
            array(
                'session_date'     => $training['training_date'],
                'session_location' => $training['location'] ?? '',
                'session_status'   => 'available',
            ),
        );
        azit_update_acf_field('training_sessions', $session_data, $post_id);
    }

    // =========================================================================
    // Taxonomy: Training Category
    // =========================================================================
    if (!empty($training['category'])) {
        wp_set_object_terms($post_id, $training['category'], 'training_category');
    }

    return $post_id;
}

/**
 * Update an ACF field with fallback to post_meta.
 *
 * Uses update_field() when ACF is available, otherwise falls back
 * to update_post_meta() for compatibility.
 *
 * @param string $field_name ACF field name.
 * @param mixed  $value      Field value.
 * @param int    $post_id    Post ID.
 */
function azit_update_acf_field($field_name, $value, $post_id) {
    if (function_exists('update_field')) {
        update_field($field_name, $value, $post_id);
    } else {
        update_post_meta($post_id, $field_name, $value);
    }
}

/**
 * Parse HTML programme text into structured outline data for the ACF repeater.
 *
 * Expects HTML with <h3> tags for day headers and <ul><li> for topics.
 * Returns array of modules suitable for the training_outline repeater.
 *
 * @param string $html Programme HTML content.
 * @return array Structured outline data for ACF repeater.
 */
function azit_parse_programme_to_outline($html) {
    if (empty($html) || strpos($html, '[PENDING') !== false) {
        return array();
    }

    $outline = array();

    // Split by h3 tags to find day/module sections
    $parts = preg_split('/<h3[^>]*>(.*?)<\/h3>/is', $html, -1, PREG_SPLIT_DELIM_CAPTURE);

    // Parts alternate: [before_first_h3, title1, content1, title2, content2, ...]
    for ($i = 1; $i < count($parts); $i += 2) {
        $module_title = wp_strip_all_tags(trim($parts[$i]));
        $content      = isset($parts[$i + 1]) ? $parts[$i + 1] : '';

        // Extract list items as topics
        $topics = array();
        if (preg_match_all('/<li>(.*?)<\/li>/is', $content, $matches)) {
            foreach ($matches[1] as $topic_text) {
                $clean_topic = wp_strip_all_tags(trim($topic_text));
                if (!empty($clean_topic)) {
                    $topics[] = array('topic' => $clean_topic);
                }
            }
        }

        $outline[] = array(
            'module_title'       => $module_title,
            'module_description' => '',
            'module_topics'      => $topics,
        );
    }

    return $outline;
}

// Admin UI is integrated into Tools > AZIT Setup (see functions.php).

