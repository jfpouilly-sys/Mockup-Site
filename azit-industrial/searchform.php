<?php
/**
 * Search Form Template
 *
 * Accessible search form with proper labeling.
 * RGAA 4.1.2 compliant - Criterion 11.1 (Form labels).
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Unique ID for accessibility
$unique_id = wp_unique_id('search-form-');
?>

<form role="search"
      method="get"
      class="search-form"
      action="<?php echo esc_url(home_url('/')); ?>"
      aria-label="<?php esc_attr_e('Site search', 'azit-industrial'); ?>">

    <div class="search-form-inner">
        <label for="<?php echo esc_attr($unique_id); ?>" class="search-label">
            <span class="sr-only"><?php esc_html_e('Search for:', 'azit-industrial'); ?></span>
        </label>

        <input type="search"
               id="<?php echo esc_attr($unique_id); ?>"
               class="search-field"
               placeholder="<?php esc_attr_e('Search...', 'azit-industrial'); ?>"
               value="<?php echo get_search_query(); ?>"
               name="s"
               autocomplete="off"
               aria-describedby="<?php echo esc_attr($unique_id); ?>-description" />

        <span id="<?php echo esc_attr($unique_id); ?>-description" class="sr-only">
            <?php esc_html_e('Enter your search terms and press Enter', 'azit-industrial'); ?>
        </span>

        <button type="submit" class="search-submit" aria-label="<?php esc_attr_e('Submit search', 'azit-industrial'); ?>">
            <span class="search-submit-text"><?php esc_html_e('Search', 'azit-industrial'); ?></span>
            <span class="search-submit-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </span>
        </button>
    </div>
</form>
