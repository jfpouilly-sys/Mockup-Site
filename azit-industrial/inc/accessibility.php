<?php
/**
 * Accessibility Functions
 *
 * Additional accessibility features for RGAA 4.1.2 compliance:
 * - Image alt text validation
 * - Link context improvements
 * - Form field enhancements
 * - Table accessibility
 * - Document structure validation
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
 * IMAGE ACCESSIBILITY
 * =============================================================================
 */

/**
 * Ensure all images have alt attributes
 * RGAA Criterion 1.1, 1.2
 */
function azit_filter_image_attributes($attr, $attachment, $size) {
    // If alt is empty, use the attachment title or filename
    if (empty($attr['alt'])) {
        $attr['alt'] = get_the_title($attachment->ID);

        // If title is also empty, use filename without extension
        if (empty($attr['alt'])) {
            $attr['alt'] = pathinfo(get_attached_file($attachment->ID), PATHINFO_FILENAME);
            $attr['alt'] = str_replace(array('-', '_'), ' ', $attr['alt']);
            $attr['alt'] = ucfirst($attr['alt']);
        }
    }

    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'azit_filter_image_attributes', 10, 3);

/**
 * Add decorative image handling
 * For images that should be hidden from screen readers
 */
function azit_decorative_image($image_url, $classes = '') {
    return sprintf(
        '<img src="%s" alt="" role="presentation" aria-hidden="true" class="%s" />',
        esc_url($image_url),
        esc_attr($classes)
    );
}

/**
 * =============================================================================
 * LINK ACCESSIBILITY
 * =============================================================================
 */

/**
 * Add title attribute to links opening in new window
 * RGAA Criterion 13.2
 */
function azit_external_link_attributes($content) {
    // Find links with target="_blank"
    $pattern = '/<a([^>]*?)target\s*=\s*["\']_blank["\']([^>]*?)>/i';

    $content = preg_replace_callback($pattern, function($matches) {
        $link = $matches[0];

        // Check if link already has aria-label or title
        if (strpos($link, 'aria-label') === false && strpos($link, 'title') === false) {
            // Add indication that link opens in new window
            $link = str_replace(
                '>',
                ' aria-label="' . esc_attr__('(opens in new window)', 'azit-industrial') . '">',
                $link
            );
        }

        // Add rel="noopener noreferrer" for security
        if (strpos($link, 'rel=') === false) {
            $link = str_replace('>', ' rel="noopener noreferrer">', $link);
        }

        return $link;
    }, $content);

    return $content;
}
add_filter('the_content', 'azit_external_link_attributes', 20);

/**
 * Generate accessible "read more" link
 * RGAA Criterion 6.1
 */
function azit_read_more_link($link_text, $post = null) {
    if (!$post) {
        $post = get_post();
    }

    return sprintf(
        '<a href="%s" class="read-more-link" aria-label="%s">%s<span class="sr-only"> %s</span></a>',
        esc_url(get_permalink($post)),
        esc_attr(sprintf(__('Read more about %s', 'azit-industrial'), get_the_title($post))),
        esc_html($link_text),
        esc_html(sprintf(__('about %s', 'azit-industrial'), get_the_title($post)))
    );
}

/**
 * =============================================================================
 * FORM ACCESSIBILITY
 * =============================================================================
 */

/**
 * Add required field indicator explanation
 */
function azit_required_field_notice() {
    return '<p class="required-notice" role="note">' .
           '<span aria-hidden="true">*</span> ' .
           esc_html__('indicates a required field', 'azit-industrial') .
           '</p>';
}

/**
 * Generate accessible form field
 *
 * @param array $args Field arguments
 * @return string HTML field
 */
function azit_form_field($args) {
    $defaults = array(
        'type'        => 'text',
        'id'          => '',
        'name'        => '',
        'label'       => '',
        'value'       => '',
        'required'    => false,
        'description' => '',
        'error'       => '',
        'class'       => '',
        'placeholder' => '',
        'options'     => array(), // For select fields
    );

    $args = wp_parse_args($args, $defaults);

    $field_id = esc_attr($args['id'] ?: $args['name']);
    $required_attr = $args['required'] ? 'required aria-required="true"' : '';
    $error_class = $args['error'] ? 'has-error' : '';

    $output = '<div class="form-field ' . esc_attr($error_class) . ' ' . esc_attr($args['class']) . '">';

    // Label
    $output .= '<label for="' . $field_id . '">';
    $output .= esc_html($args['label']);
    if ($args['required']) {
        $output .= ' <span class="required" aria-hidden="true">*</span>';
    }
    $output .= '</label>';

    // Description (if before field)
    $desc_id = $field_id . '-description';
    $described_by = $args['description'] ? 'aria-describedby="' . $desc_id . '"' : '';

    // Error (adds to describedby)
    $error_id = $field_id . '-error';
    if ($args['error']) {
        $described_by = 'aria-describedby="' . $error_id . ($args['description'] ? ' ' . $desc_id : '') . '" aria-invalid="true"';
    }

    // Field
    switch ($args['type']) {
        case 'textarea':
            $output .= '<textarea id="' . $field_id . '" name="' . esc_attr($args['name']) . '" ' .
                       $required_attr . ' ' . $described_by . ' ' .
                       'placeholder="' . esc_attr($args['placeholder']) . '">' .
                       esc_textarea($args['value']) . '</textarea>';
            break;

        case 'select':
            $output .= '<select id="' . $field_id . '" name="' . esc_attr($args['name']) . '" ' .
                       $required_attr . ' ' . $described_by . '>';
            foreach ($args['options'] as $value => $label) {
                $selected = selected($args['value'], $value, false);
                $output .= '<option value="' . esc_attr($value) . '" ' . $selected . '>' .
                           esc_html($label) . '</option>';
            }
            $output .= '</select>';
            break;

        default:
            $output .= '<input type="' . esc_attr($args['type']) . '" ' .
                       'id="' . $field_id . '" ' .
                       'name="' . esc_attr($args['name']) . '" ' .
                       'value="' . esc_attr($args['value']) . '" ' .
                       'placeholder="' . esc_attr($args['placeholder']) . '" ' .
                       $required_attr . ' ' . $described_by . ' />';
            break;
    }

    // Error message
    if ($args['error']) {
        $output .= '<p id="' . $error_id . '" class="field-error" role="alert">' .
                   esc_html($args['error']) . '</p>';
    }

    // Description
    if ($args['description']) {
        $output .= '<p id="' . $desc_id . '" class="field-description">' .
                   esc_html($args['description']) . '</p>';
    }

    $output .= '</div>';

    return $output;
}

/**
 * =============================================================================
 * TABLE ACCESSIBILITY
 * =============================================================================
 */

/**
 * Enhance table accessibility in content
 * RGAA Criterion 5.1, 5.2, 5.3
 */
function azit_enhance_table_accessibility($content) {
    // Add role="table" to tables without it
    $content = preg_replace(
        '/<table(?![^>]*role=)([^>]*)>/i',
        '<table role="table"$1>',
        $content
    );

    // Add scope="col" to th in thead
    $content = preg_replace_callback(
        '/<thead[^>]*>(.*?)<\/thead>/is',
        function($matches) {
            return preg_replace(
                '/<th(?![^>]*scope=)([^>]*)>/i',
                '<th scope="col"$1>',
                $matches[0]
            );
        },
        $content
    );

    return $content;
}
add_filter('the_content', 'azit_enhance_table_accessibility', 15);

/**
 * =============================================================================
 * HEADING STRUCTURE
 * =============================================================================
 */

/**
 * Check heading hierarchy (development helper)
 * RGAA Criterion 9.1
 */
function azit_check_heading_hierarchy($content) {
    if (!WP_DEBUG) {
        return $content;
    }

    // Extract all headings
    preg_match_all('/<h([1-6])[^>]*>/i', $content, $matches);

    if (empty($matches[1])) {
        return $content;
    }

    $headings = array_map('intval', $matches[1]);
    $errors = array();

    // Check for skipped heading levels
    $prev_level = 1;
    foreach ($headings as $index => $level) {
        if ($level > $prev_level + 1) {
            $errors[] = sprintf(
                /* translators: 1: previous heading level, 2: current heading level */
                __('Heading level skipped: h%1$d to h%2$d', 'azit-industrial'),
                $prev_level,
                $level
            );
        }
        $prev_level = $level;
    }

    // Add debug comment if errors found
    if (!empty($errors) && current_user_can('edit_posts')) {
        $content = '<!-- AZIT Accessibility Warning: ' . implode('; ', $errors) . ' -->' . $content;
    }

    return $content;
}
add_filter('the_content', 'azit_check_heading_hierarchy', 5);

/**
 * =============================================================================
 * NAVIGATION ACCESSIBILITY
 * =============================================================================
 */

/**
 * Add landmark roles to navigation
 */
function azit_nav_menu_args($args) {
    // Ensure navigation has proper ARIA label based on location
    if (!isset($args['items_wrap'])) {
        $args['items_wrap'] = '<ul id="%1$s" class="%2$s">%3$s</ul>';
    }

    return $args;
}
add_filter('wp_nav_menu_args', 'azit_nav_menu_args');

/**
 * =============================================================================
 * FOCUS MANAGEMENT
 * =============================================================================
 */

/**
 * Add focus outline script for keyboard users
 */
function azit_keyboard_focus_script() {
    ?>
    <script>
    (function() {
        // Add class when user is using keyboard
        function handleFirstTab(e) {
            if (e.keyCode === 9) {
                document.body.classList.add('user-is-tabbing');
                window.removeEventListener('keydown', handleFirstTab);
                window.addEventListener('mousedown', handleMouseDownOnce);
            }
        }

        function handleMouseDownOnce() {
            document.body.classList.remove('user-is-tabbing');
            window.removeEventListener('mousedown', handleMouseDownOnce);
            window.addEventListener('keydown', handleFirstTab);
        }

        window.addEventListener('keydown', handleFirstTab);
    })();
    </script>
    <?php
}
add_action('wp_footer', 'azit_keyboard_focus_script', 100);

/**
 * =============================================================================
 * COLOR CONTRAST HELPERS
 * =============================================================================
 */

/**
 * Check if color contrast meets WCAG AA (4.5:1 for normal text)
 *
 * @param string $foreground Hex color
 * @param string $background Hex color
 * @return bool True if contrast ratio >= 4.5
 */
function azit_check_color_contrast($foreground, $background) {
    $fg_luminance = azit_get_relative_luminance($foreground);
    $bg_luminance = azit_get_relative_luminance($background);

    $lighter = max($fg_luminance, $bg_luminance);
    $darker = min($fg_luminance, $bg_luminance);

    $contrast_ratio = ($lighter + 0.05) / ($darker + 0.05);

    return $contrast_ratio >= 4.5;
}

/**
 * Calculate relative luminance of a color
 *
 * @param string $hex Hex color
 * @return float Relative luminance (0-1)
 */
function azit_get_relative_luminance($hex) {
    $hex = ltrim($hex, '#');

    $r = hexdec(substr($hex, 0, 2)) / 255;
    $g = hexdec(substr($hex, 2, 2)) / 255;
    $b = hexdec(substr($hex, 4, 2)) / 255;

    $r = ($r <= 0.03928) ? $r / 12.92 : pow(($r + 0.055) / 1.055, 2.4);
    $g = ($g <= 0.03928) ? $g / 12.92 : pow(($g + 0.055) / 1.055, 2.4);
    $b = ($b <= 0.03928) ? $b / 12.92 : pow(($b + 0.055) / 1.055, 2.4);

    return 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;
}

/**
 * =============================================================================
 * SCREEN READER HELPERS
 * =============================================================================
 */

/**
 * Output screen reader only text
 *
 * @param string $text Text to output
 * @param bool $echo Whether to echo or return
 * @return string|void
 */
function azit_sr_only($text, $echo = true) {
    $output = '<span class="sr-only">' . esc_html($text) . '</span>';

    if ($echo) {
        echo $output;
    } else {
        return $output;
    }
}

/**
 * Announce content to screen readers via live region
 *
 * @param string $message Message to announce
 * @param string $priority 'polite' or 'assertive'
 */
function azit_announce($message, $priority = 'polite') {
    $region_id = ($priority === 'assertive') ? 'aria-live-assertive' : 'aria-live-region';
    ?>
    <script>
    (function() {
        var region = document.getElementById('<?php echo esc_js($region_id); ?>');
        if (region) {
            region.textContent = '<?php echo esc_js($message); ?>';
            setTimeout(function() {
                region.textContent = '';
            }, 1000);
        }
    })();
    </script>
    <?php
}

/**
 * =============================================================================
 * ADMIN ACCESSIBILITY CHECKS
 * =============================================================================
 */

/**
 * Add accessibility column to media library
 */
function azit_media_columns($columns) {
    $columns['azit_alt_status'] = __('Alt Text', 'azit-industrial');
    return $columns;
}
add_filter('manage_media_columns', 'azit_media_columns');

/**
 * Populate accessibility column in media library
 */
function azit_media_custom_column($column_name, $attachment_id) {
    if ($column_name === 'azit_alt_status') {
        $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        $mime_type = get_post_mime_type($attachment_id);

        // Only check for images
        if (strpos($mime_type, 'image/') === 0) {
            if (empty($alt)) {
                echo '<span style="color: #dc3545;" title="' . esc_attr__('Missing alt text', 'azit-industrial') . '">&#10060;</span>';
            } else {
                echo '<span style="color: #28a745;" title="' . esc_attr__('Has alt text', 'azit-industrial') . '">&#10004;</span>';
            }
        } else {
            echo '&mdash;';
        }
    }
}
add_action('manage_media_custom_column', 'azit_media_custom_column', 10, 2);
