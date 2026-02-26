<?php
/**
 * Advanced Custom Fields Configuration
 *
 * Defines custom field groups for:
 * - Expertise (icon, short description, services)
 * - Products (image, price, features, datasheet)
 * - Training (duration, price, level, objectives)
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
 * ACF FIELD GROUPS REGISTRATION
 * =============================================================================
 */

/**
 * Register ACF Fields when ACF is available
 */
function azit_register_acf_fields() {
    // Only run if ACF is active
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    /**
     * Expertise Field Group
     *
     * Organized in tabs:
     * - General: icon, subtitle, short description, badges
     * - Services: key services repeater
     * - Features & Cases: features list, case studies
     * - Process: process steps, CTA
     */
    acf_add_local_field_group(array(
        'key'      => 'group_azit_expertise',
        'title'    => __('Expertise Details', 'azit-industrial'),
        'fields'   => array(

            // === TAB: General ===
            array(
                'key'   => 'field_expertise_tab_general',
                'label' => __('General', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Icon/Illustration
            array(
                'key'           => 'field_expertise_icon',
                'label'         => __('Icon/Illustration', 'azit-industrial'),
                'name'          => 'expertise_icon',
                'type'          => 'image',
                'instructions'  => __('Upload SVG or PNG illustration for expertise card (recommended: 200x200px)', 'azit-industrial'),
                'required'      => 0,
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'mime_types'    => 'svg,png,jpg,jpeg',
                'wrapper'       => array('width' => '50'),
            ),
            // Subtitle
            array(
                'key'          => 'field_expertise_subtitle',
                'label'        => __('Subtitle', 'azit-industrial'),
                'name'         => 'expertise_subtitle',
                'type'         => 'text',
                'instructions' => __('Subtitle shown below the title (e.g., "IEC 61508, ISO 26262, EN 50129")', 'azit-industrial'),
                'placeholder'  => __('e.g., IEC 61508, ISO 26262, EN 50129', 'azit-industrial'),
                'wrapper'      => array('width' => '50'),
            ),
            // Short Description
            array(
                'key'          => 'field_expertise_short_desc',
                'label'        => __('Short Description', 'azit-industrial'),
                'name'         => 'expertise_short_description',
                'type'         => 'textarea',
                'instructions' => __('Brief description for expertise card (2-3 sentences, max 200 characters)', 'azit-industrial'),
                'required'     => 1,
                'rows'         => 3,
                'maxlength'    => 200,
            ),
            // Badges (certification, competencies)
            array(
                'key'          => 'field_expertise_badges',
                'label'        => __('Badges', 'azit-industrial'),
                'name'         => 'expertise_badges',
                'type'         => 'repeater',
                'instructions' => __('Badge labels shown in the hero (e.g., "SIL3 Expertise", "Bureau Véritas")', 'azit-industrial'),
                'layout'       => 'table',
                'button_label' => __('Add Badge', 'azit-industrial'),
                'min'          => 0,
                'max'          => 6,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_expertise_badge_text',
                        'label'    => __('Badge Label', 'azit-industrial'),
                        'name'     => 'badge_text',
                        'type'     => 'text',
                        'required' => 1,
                    ),
                ),
            ),

            // === TAB: Services ===
            array(
                'key'   => 'field_expertise_tab_services',
                'label' => __('Services', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Key Services (Repeater)
            array(
                'key'          => 'field_expertise_services',
                'label'        => __('Key Services', 'azit-industrial'),
                'name'         => 'expertise_services',
                'type'         => 'repeater',
                'instructions' => __('Service cards displayed in a grid (e.g., "Pre-Audit & Gap Analysis")', 'azit-industrial'),
                'layout'       => 'block',
                'button_label' => __('Add Service', 'azit-industrial'),
                'min'          => 0,
                'max'          => 10,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_service_name',
                        'label'    => __('Service Name', 'azit-industrial'),
                        'name'     => 'service_name',
                        'type'     => 'text',
                        'required' => 1,
                        'wrapper'  => array('width' => '40'),
                    ),
                    array(
                        'key'      => 'field_service_desc',
                        'label'    => __('Service Description', 'azit-industrial'),
                        'name'     => 'service_description',
                        'type'     => 'textarea',
                        'rows'     => 3,
                        'wrapper'  => array('width' => '60'),
                    ),
                ),
            ),

            // === TAB: Features & Cases ===
            array(
                'key'   => 'field_expertise_tab_features',
                'label' => __('Features & Cases', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Key Features
            array(
                'key'          => 'field_expertise_features',
                'label'        => __('Key Features / Why Choose Us', 'azit-industrial'),
                'name'         => 'expertise_features',
                'type'         => 'repeater',
                'instructions' => __('Feature highlights or "Why Choose Us" items displayed as a grid', 'azit-industrial'),
                'layout'       => 'table',
                'button_label' => __('Add Feature', 'azit-industrial'),
                'min'          => 0,
                'max'          => 12,
                'sub_fields'   => array(
                    array(
                        'key'     => 'field_expertise_feature_icon',
                        'label'   => __('Icon/Emoji', 'azit-industrial'),
                        'name'    => 'feature_icon',
                        'type'    => 'text',
                        'instructions' => __('Optional icon or emoji (e.g., "🔒")', 'azit-industrial'),
                        'wrapper' => array('width' => '20'),
                    ),
                    array(
                        'key'      => 'field_expertise_feature_text',
                        'label'    => __('Feature Text', 'azit-industrial'),
                        'name'     => 'feature_text',
                        'type'     => 'text',
                        'required' => 1,
                        'wrapper'  => array('width' => '80'),
                    ),
                ),
            ),
            // Case Studies / Use Cases
            array(
                'key'          => 'field_expertise_case_studies',
                'label'        => __('Case Studies / Use Cases', 'azit-industrial'),
                'name'         => 'expertise_case_studies',
                'type'         => 'repeater',
                'instructions' => __('Example projects or use cases to showcase expertise', 'azit-industrial'),
                'layout'       => 'block',
                'button_label' => __('Add Case Study', 'azit-industrial'),
                'min'          => 0,
                'max'          => 8,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_case_title',
                        'label'    => __('Title', 'azit-industrial'),
                        'name'     => 'case_title',
                        'type'     => 'text',
                        'required' => 1,
                        'wrapper'  => array('width' => '40'),
                    ),
                    array(
                        'key'     => 'field_case_summary',
                        'label'   => __('Summary', 'azit-industrial'),
                        'name'    => 'case_summary',
                        'type'    => 'textarea',
                        'rows'    => 2,
                        'wrapper' => array('width' => '40'),
                    ),
                    array(
                        'key'     => 'field_case_link',
                        'label'   => __('Link', 'azit-industrial'),
                        'name'    => 'case_link',
                        'type'    => 'url',
                        'wrapper' => array('width' => '20'),
                    ),
                ),
            ),

            // === TAB: Process & CTA ===
            array(
                'key'   => 'field_expertise_tab_process',
                'label' => __('Process & CTA', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Process Steps
            array(
                'key'          => 'field_expertise_process',
                'label'        => __('Process Steps', 'azit-industrial'),
                'name'         => 'expertise_process',
                'type'         => 'repeater',
                'instructions' => __('Numbered process steps (e.g., certification workflow, development process)', 'azit-industrial'),
                'layout'       => 'block',
                'button_label' => __('Add Step', 'azit-industrial'),
                'min'          => 0,
                'max'          => 10,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_process_step_title',
                        'label'    => __('Step Title', 'azit-industrial'),
                        'name'     => 'step_title',
                        'type'     => 'text',
                        'required' => 1,
                        'wrapper'  => array('width' => '40'),
                    ),
                    array(
                        'key'     => 'field_process_step_desc',
                        'label'   => __('Step Description', 'azit-industrial'),
                        'name'    => 'step_description',
                        'type'    => 'textarea',
                        'rows'    => 2,
                        'wrapper' => array('width' => '60'),
                    ),
                ),
            ),
            // CTA Button
            array(
                'key'          => 'field_expertise_cta',
                'label'        => __('Call to Action', 'azit-industrial'),
                'name'         => 'expertise_cta',
                'type'         => 'group',
                'instructions' => __('Optional custom call-to-action button (defaults to "Contact Us")', 'azit-industrial'),
                'layout'       => 'block',
                'sub_fields'   => array(
                    array(
                        'key'     => 'field_expertise_cta_text',
                        'label'   => __('Button Text', 'azit-industrial'),
                        'name'    => 'cta_text',
                        'type'    => 'text',
                        'placeholder' => __('e.g., Discuss Your Project', 'azit-industrial'),
                        'wrapper' => array('width' => '50'),
                    ),
                    array(
                        'key'     => 'field_expertise_cta_link',
                        'label'   => __('Button Link', 'azit-industrial'),
                        'name'    => 'cta_link',
                        'type'    => 'url',
                        'wrapper' => array('width' => '50'),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'expertise',
                ),
            ),
        ),
        'menu_order'      => 0,
        'position'        => 'normal',
        'style'           => 'default',
        'label_placement' => 'top',
    ));

    /**
     * Products Field Group
     *
     * Organized in tabs:
     * - General: image, gallery, price, SKU, availability, badges
     * - Features: feature cards organized by category
     * - Specifications: grouped specification tables
     * - Documentation: datasheet, additional downloads
     * - Related: related products
     */
    acf_add_local_field_group(array(
        'key'      => 'group_azit_product',
        'title'    => __('Product Details', 'azit-industrial'),
        'fields'   => array(

            // === TAB: General ===
            array(
                'key'   => 'field_product_tab_general',
                'label' => __('General', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Product Image
            array(
                'key'           => 'field_product_image',
                'label'         => __('Product Image', 'azit-industrial'),
                'name'          => 'product_image',
                'type'          => 'image',
                'instructions'  => __('Main product image (recommended: 600x400px)', 'azit-industrial'),
                'required'      => 0,
                'return_format' => 'array',
                'preview_size'  => 'medium',
            ),
            // Product Gallery
            array(
                'key'           => 'field_product_gallery',
                'label'         => __('Image Gallery', 'azit-industrial'),
                'name'          => 'product_gallery',
                'type'          => 'gallery',
                'instructions'  => __('Additional product images (PCB views, enclosure, ports, etc.)', 'azit-industrial'),
                'return_format' => 'array',
                'preview_size'  => 'thumbnail',
                'library'       => 'all',
            ),
            // Price
            array(
                'key'          => 'field_product_price',
                'label'        => __('Price', 'azit-industrial'),
                'name'         => 'product_price',
                'type'         => 'text',
                'instructions' => __('Product price (e.g., "1 500 EUR", "Contact us", or "License")', 'azit-industrial'),
                'placeholder'  => __('e.g., Contact us', 'azit-industrial'),
                'wrapper'      => array('width' => '33'),
            ),
            // SKU/Reference
            array(
                'key'          => 'field_product_sku',
                'label'        => __('SKU/Reference', 'azit-industrial'),
                'name'         => 'product_sku',
                'type'         => 'text',
                'instructions' => __('Product reference number (e.g., "ISI-GTW-PCB")', 'azit-industrial'),
                'wrapper'      => array('width' => '34'),
            ),
            // Availability
            array(
                'key'          => 'field_product_availability',
                'label'        => __('Availability', 'azit-industrial'),
                'name'         => 'product_availability',
                'type'         => 'select',
                'instructions' => __('Current availability status', 'azit-industrial'),
                'choices'      => array(
                    'in_stock'     => __('In Stock', 'azit-industrial'),
                    'limited'      => __('Limited Availability', 'azit-industrial'),
                    'out_of_stock' => __('Out of Stock', 'azit-industrial'),
                    'pre_order'    => __('Pre-Order', 'azit-industrial'),
                    'contact'      => __('Contact for Availability', 'azit-industrial'),
                ),
                'allow_null'    => 1,
                'wrapper'       => array('width' => '33'),
            ),
            // Badges (certifications)
            array(
                'key'          => 'field_product_badges',
                'label'        => __('Certification Badges', 'azit-industrial'),
                'name'         => 'product_badges',
                'type'         => 'repeater',
                'instructions' => __('Certification or feature badges (e.g., "SIL3", "PLe", "BV Approved", "Made in France")', 'azit-industrial'),
                'layout'       => 'table',
                'button_label' => __('Add Badge', 'azit-industrial'),
                'min'          => 0,
                'max'          => 8,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_product_badge_text',
                        'label'    => __('Badge Label', 'azit-industrial'),
                        'name'     => 'badge_text',
                        'type'     => 'text',
                        'required' => 1,
                    ),
                ),
            ),

            // === TAB: Features ===
            array(
                'key'   => 'field_product_tab_features',
                'label' => __('Features', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Feature Groups (categorized features)
            array(
                'key'          => 'field_product_feature_groups',
                'label'        => __('Feature Groups', 'azit-industrial'),
                'name'         => 'product_feature_groups',
                'type'         => 'repeater',
                'instructions' => __('Organize features into categories (e.g., "Safety Features", "Communication Features"). Each group becomes a card.', 'azit-industrial'),
                'layout'       => 'block',
                'button_label' => __('Add Feature Group', 'azit-industrial'),
                'min'          => 0,
                'max'          => 6,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_feature_group_title',
                        'label'    => __('Group Title', 'azit-industrial'),
                        'name'     => 'group_title',
                        'type'     => 'text',
                        'required' => 1,
                        'instructions' => __('e.g., "Safety Features" or "Communication Features"', 'azit-industrial'),
                    ),
                    array(
                        'key'          => 'field_feature_group_items',
                        'label'        => __('Features', 'azit-industrial'),
                        'name'         => 'features',
                        'type'         => 'repeater',
                        'layout'       => 'table',
                        'button_label' => __('Add Feature', 'azit-industrial'),
                        'sub_fields'   => array(
                            array(
                                'key'      => 'field_feature_group_item',
                                'label'    => __('Feature', 'azit-industrial'),
                                'name'     => 'feature',
                                'type'     => 'text',
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
            ),
            // Simple Features (backward compatible flat list)
            array(
                'key'          => 'field_product_features',
                'label'        => __('Key Features (Simple List)', 'azit-industrial'),
                'name'         => 'product_features',
                'type'         => 'repeater',
                'instructions' => __('Simple flat feature list. Use "Feature Groups" above for categorized features.', 'azit-industrial'),
                'layout'       => 'table',
                'button_label' => __('Add Feature', 'azit-industrial'),
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_feature_name',
                        'label'    => __('Feature', 'azit-industrial'),
                        'name'     => 'feature',
                        'type'     => 'text',
                        'required' => 1,
                    ),
                ),
            ),

            // === TAB: Specifications ===
            array(
                'key'   => 'field_product_tab_specs',
                'label' => __('Specifications', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Specification Tables (grouped)
            array(
                'key'          => 'field_product_spec_tables',
                'label'        => __('Specification Tables', 'azit-industrial'),
                'name'         => 'product_spec_tables',
                'type'         => 'repeater',
                'instructions' => __('Multiple specification tables (e.g., "Safety Certification", "Resource Requirements", "Platform Support"). Each group becomes a separate table.', 'azit-industrial'),
                'layout'       => 'block',
                'button_label' => __('Add Specification Table', 'azit-industrial'),
                'min'          => 0,
                'max'          => 8,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_spec_table_title',
                        'label'    => __('Table Title', 'azit-industrial'),
                        'name'     => 'table_title',
                        'type'     => 'text',
                        'required' => 1,
                        'instructions' => __('e.g., "Safety Certification" or "Resource Requirements"', 'azit-industrial'),
                    ),
                    array(
                        'key'          => 'field_spec_table_rows',
                        'label'        => __('Rows', 'azit-industrial'),
                        'name'         => 'rows',
                        'type'         => 'repeater',
                        'layout'       => 'table',
                        'button_label' => __('Add Row', 'azit-industrial'),
                        'sub_fields'   => array(
                            array(
                                'key'     => 'field_spec_table_param',
                                'label'   => __('Parameter', 'azit-industrial'),
                                'name'    => 'spec_name',
                                'type'    => 'text',
                                'wrapper' => array('width' => '40'),
                            ),
                            array(
                                'key'     => 'field_spec_table_value',
                                'label'   => __('Value', 'azit-industrial'),
                                'name'    => 'spec_value',
                                'type'    => 'text',
                                'wrapper' => array('width' => '60'),
                            ),
                        ),
                    ),
                ),
            ),
            // Simple Specifications (backward compatible flat table)
            array(
                'key'          => 'field_product_specs',
                'label'        => __('Specifications (Simple Table)', 'azit-industrial'),
                'name'         => 'product_specifications',
                'type'         => 'repeater',
                'instructions' => __('Simple flat spec table. Use "Specification Tables" above for grouped tables.', 'azit-industrial'),
                'layout'       => 'table',
                'button_label' => __('Add Specification', 'azit-industrial'),
                'sub_fields'   => array(
                    array(
                        'key'     => 'field_spec_name',
                        'label'   => __('Parameter', 'azit-industrial'),
                        'name'    => 'spec_name',
                        'type'    => 'text',
                        'wrapper' => array('width' => '40'),
                    ),
                    array(
                        'key'     => 'field_spec_value',
                        'label'   => __('Value', 'azit-industrial'),
                        'name'    => 'spec_value',
                        'type'    => 'text',
                        'wrapper' => array('width' => '60'),
                    ),
                ),
            ),

            // === TAB: Documentation ===
            array(
                'key'   => 'field_product_tab_docs',
                'label' => __('Documentation', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Datasheet
            array(
                'key'           => 'field_product_datasheet',
                'label'         => __('Datasheet', 'azit-industrial'),
                'name'          => 'product_datasheet',
                'type'          => 'file',
                'instructions'  => __('Upload product datasheet PDF', 'azit-industrial'),
                'return_format' => 'array',
                'library'       => 'all',
                'mime_types'    => 'pdf',
            ),
            // Additional Downloads
            array(
                'key'          => 'field_product_downloads',
                'label'        => __('Additional Downloads', 'azit-industrial'),
                'name'         => 'product_downloads',
                'type'         => 'repeater',
                'instructions' => __('Additional documentation files (user guides, integration notes, etc.)', 'azit-industrial'),
                'layout'       => 'block',
                'button_label' => __('Add Download', 'azit-industrial'),
                'min'          => 0,
                'max'          => 10,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_download_title',
                        'label'    => __('Title', 'azit-industrial'),
                        'name'     => 'title',
                        'type'     => 'text',
                        'required' => 1,
                        'wrapper'  => array('width' => '50'),
                    ),
                    array(
                        'key'           => 'field_download_file',
                        'label'         => __('File', 'azit-industrial'),
                        'name'          => 'file',
                        'type'          => 'file',
                        'return_format' => 'array',
                        'library'       => 'all',
                        'wrapper'       => array('width' => '50'),
                    ),
                ),
            ),

            // === TAB: Related ===
            array(
                'key'   => 'field_product_tab_related',
                'label' => __('Related', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Related Products
            array(
                'key'           => 'field_related_products',
                'label'         => __('Related Products', 'azit-industrial'),
                'name'          => 'related_products',
                'type'          => 'relationship',
                'instructions'  => __('Select related products to display at the bottom of the page', 'azit-industrial'),
                'post_type'     => array('product'),
                'filters'       => array('search', 'taxonomy'),
                'return_format' => 'object',
                'max'           => 4,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'product',
                ),
            ),
        ),
        'menu_order'      => 0,
        'position'        => 'normal',
        'style'           => 'default',
        'label_placement' => 'top',
    ));

    /**
     * Training Field Group
     *
     * Organized in tabs for better admin UX:
     * - General: core info (duration, price, level, format, participants)
     * - Content: objectives, prerequisites, audience, instructor
     * - Program: course outline with day-by-day modules and topics
     * - Sidebar: benefits, syllabus PDF, certification
     * - Sessions: upcoming scheduled sessions
     */
    acf_add_local_field_group(array(
        'key'      => 'group_azit_training',
        'title'    => __('Training Details', 'azit-industrial'),
        'fields'   => array(

            // === TAB: General ===
            array(
                'key'   => 'field_training_tab_general',
                'label' => __('General', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Duration
            array(
                'key'          => 'field_training_duration',
                'label'        => __('Duration', 'azit-industrial'),
                'name'         => 'training_duration',
                'type'         => 'text',
                'instructions' => __('Training duration (e.g., "2 days (14 hours)")', 'azit-industrial'),
                'required'     => 1,
                'placeholder'  => __('e.g., 3 days (21 hours)', 'azit-industrial'),
                'wrapper'      => array('width' => '50'),
            ),
            // Max Participants
            array(
                'key'          => 'field_training_max_participants',
                'label'        => __('Max Participants', 'azit-industrial'),
                'name'         => 'training_max_participants',
                'type'         => 'text',
                'instructions' => __('Maximum participants per session (e.g., "Up to 6")', 'azit-industrial'),
                'placeholder'  => __('e.g., Up to 6', 'azit-industrial'),
                'wrapper'      => array('width' => '50'),
            ),
            // Level
            array(
                'key'          => 'field_training_level',
                'label'        => __('Level', 'azit-industrial'),
                'name'         => 'training_level',
                'type'         => 'select',
                'instructions' => __('Training difficulty level', 'azit-industrial'),
                'required'     => 1,
                'choices'      => array(
                    'beginner'     => __('Beginner', 'azit-industrial'),
                    'intermediate' => __('Intermediate', 'azit-industrial'),
                    'advanced'     => __('Advanced', 'azit-industrial'),
                    'expert'       => __('Expert', 'azit-industrial'),
                ),
                'default_value' => 'intermediate',
                'wrapper'       => array('width' => '33'),
            ),
            // Format
            array(
                'key'          => 'field_training_format',
                'label'        => __('Format', 'azit-industrial'),
                'name'         => 'training_format',
                'type'         => 'select',
                'instructions' => __('Training delivery format', 'azit-industrial'),
                'choices'      => array(
                    'onsite'  => __('On-site', 'azit-industrial'),
                    'center'  => __('Training Center', 'azit-industrial'),
                    'online'  => __('Online', 'azit-industrial'),
                    'hybrid'  => __('Hybrid (Online + On-site)', 'azit-industrial'),
                ),
                'default_value' => 'onsite',
                'wrapper'       => array('width' => '34'),
            ),
            // Certification
            array(
                'key'          => 'field_training_certification',
                'label'        => __('Certificate Included', 'azit-industrial'),
                'name'         => 'training_certification',
                'type'         => 'true_false',
                'instructions' => __('Does this training include a certificate of completion?', 'azit-industrial'),
                'default_value' => 1,
                'ui'            => 1,
                'wrapper'       => array('width' => '33'),
            ),

            // === TAB: Pricing ===
            array(
                'key'   => 'field_training_tab_pricing',
                'label' => __('Pricing', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Inter-Enterprise Price
            array(
                'key'          => 'field_training_price',
                'label'        => __('Inter-Enterprise Price', 'azit-industrial'),
                'name'         => 'training_price',
                'type'         => 'text',
                'instructions' => __('Price per person for inter-enterprise sessions (e.g., "1 390 €")', 'azit-industrial'),
                'required'     => 1,
                'placeholder'  => __('e.g., 1 390 €', 'azit-industrial'),
                'wrapper'      => array('width' => '50'),
            ),
            // Private/Company Price
            array(
                'key'          => 'field_training_private_price',
                'label'        => __('Private Company Price', 'azit-industrial'),
                'name'         => 'training_private_price',
                'type'         => 'text',
                'instructions' => __('Price for private/in-company sessions (e.g., "On request" or "4 500 €")', 'azit-industrial'),
                'placeholder'  => __('e.g., On request', 'azit-industrial'),
                'default_value' => __('On request', 'azit-industrial'),
                'wrapper'      => array('width' => '50'),
            ),

            // === TAB: Content ===
            array(
                'key'   => 'field_training_tab_content',
                'label' => __('Content', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Pedagogical Objectives (WYSIWYG - imported from ISIT)
            array(
                'key'          => 'field_training_objectives_text',
                'label'        => __('Pedagogical Objectives', 'azit-industrial'),
                'name'         => 'training_objectives_text',
                'type'         => 'wysiwyg',
                'instructions' => __('Free-text objectives imported from ISIT website. Displayed when structured objectives list (below) is empty.', 'azit-industrial'),
                'tabs'         => 'visual',
                'toolbar'      => 'full',
                'media_upload' => 0,
            ),
            // Learning Objectives (repeater for structured list)
            array(
                'key'          => 'field_training_objectives',
                'label'        => __('Learning Objectives', 'azit-industrial'),
                'name'         => 'training_objectives',
                'type'         => 'repeater',
                'instructions' => __('List what participants will be able to do after the training', 'azit-industrial'),
                'layout'       => 'table',
                'button_label' => __('Add Objective', 'azit-industrial'),
                'min'          => 0,
                'max'          => 15,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_objective_text',
                        'label'    => __('Objective', 'azit-industrial'),
                        'name'     => 'objective',
                        'type'     => 'text',
                        'required' => 1,
                    ),
                ),
            ),
            // Prerequisites
            array(
                'key'          => 'field_training_prerequisites',
                'label'        => __('Prerequisites', 'azit-industrial'),
                'name'         => 'training_prerequisites',
                'type'         => 'wysiwyg',
                'instructions' => __('Required knowledge or experience before attending', 'azit-industrial'),
                'tabs'         => 'visual',
                'toolbar'      => 'basic',
                'media_upload' => 0,
            ),
            // Target Audience
            array(
                'key'          => 'field_training_audience',
                'label'        => __('Target Audience', 'azit-industrial'),
                'name'         => 'training_audience',
                'type'         => 'wysiwyg',
                'instructions' => __('Who should attend this training (roles, profiles)', 'azit-industrial'),
                'tabs'         => 'visual',
                'toolbar'      => 'basic',
                'media_upload' => 0,
            ),
            // Instructor
            array(
                'key'          => 'field_training_instructor',
                'label'        => __('Instructor', 'azit-industrial'),
                'name'         => 'training_instructor',
                'type'         => 'textarea',
                'instructions' => __('Brief instructor bio or qualifications', 'azit-industrial'),
                'rows'         => 3,
            ),

            // === TAB: Program ===
            array(
                'key'   => 'field_training_tab_program',
                'label' => __('Program', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Detailed Programme (WYSIWYG - imported from ISIT PDF brochures)
            array(
                'key'          => 'field_training_programme_text',
                'label'        => __('Detailed Programme', 'azit-industrial'),
                'name'         => 'training_programme_text',
                'type'         => 'wysiwyg',
                'instructions' => __('Day-by-day programme imported from ISIT PDF brochures. Displayed when structured outline (below) is empty.', 'azit-industrial'),
                'tabs'         => 'visual',
                'toolbar'      => 'full',
                'media_upload' => 0,
            ),
            // Course Outline (repeater with nested topics)
            array(
                'key'          => 'field_training_outline',
                'label'        => __('Course Outline', 'azit-industrial'),
                'name'         => 'training_outline',
                'type'         => 'repeater',
                'instructions' => __('Day-by-day or module-by-module program (e.g., "Day 1 — CAN Fundamentals")', 'azit-industrial'),
                'layout'       => 'block',
                'button_label' => __('Add Module/Day', 'azit-industrial'),
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_outline_module_title',
                        'label'    => __('Module Title', 'azit-industrial'),
                        'name'     => 'module_title',
                        'type'     => 'text',
                        'required' => 1,
                        'instructions' => __('e.g., "Day 1 — CAN Fundamentals"', 'azit-industrial'),
                    ),
                    array(
                        'key'   => 'field_outline_module_description',
                        'label' => __('Module Description', 'azit-industrial'),
                        'name'  => 'module_description',
                        'type'  => 'textarea',
                        'rows'  => 2,
                        'instructions' => __('Optional short description of this module', 'azit-industrial'),
                    ),
                    array(
                        'key'          => 'field_outline_module_topics',
                        'label'        => __('Topics', 'azit-industrial'),
                        'name'         => 'module_topics',
                        'type'         => 'repeater',
                        'instructions' => __('Individual topics covered in this module', 'azit-industrial'),
                        'layout'       => 'table',
                        'button_label' => __('Add Topic', 'azit-industrial'),
                        'sub_fields'   => array(
                            array(
                                'key'      => 'field_topic_text',
                                'label'    => __('Topic', 'azit-industrial'),
                                'name'     => 'topic',
                                'type'     => 'text',
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
            ),

            // === TAB: Sidebar ===
            array(
                'key'   => 'field_training_tab_sidebar',
                'label' => __('Sidebar', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Key Benefits
            array(
                'key'          => 'field_training_benefits',
                'label'        => __('Key Benefits', 'azit-industrial'),
                'name'         => 'training_benefits',
                'type'         => 'repeater',
                'instructions' => __('Highlight key benefits of this training', 'azit-industrial'),
                'layout'       => 'table',
                'button_label' => __('Add Benefit', 'azit-industrial'),
                'min'          => 0,
                'max'          => 10,
                'sub_fields'   => array(
                    array(
                        'key'      => 'field_benefit_text',
                        'label'    => __('Benefit', 'azit-industrial'),
                        'name'     => 'benefit',
                        'type'     => 'text',
                        'required' => 1,
                    ),
                ),
            ),
            // Syllabus PDF
            array(
                'key'           => 'field_training_syllabus',
                'label'         => __('Syllabus (PDF)', 'azit-industrial'),
                'name'          => 'training_syllabus',
                'type'          => 'file',
                'instructions'  => __('Upload a downloadable PDF syllabus/program. Uses WordPress Media Library.', 'azit-industrial'),
                'return_format' => 'array',
                'library'       => 'all',
                'mime_types'    => 'pdf',
            ),
            // External PDF Brochure URL (ISIT import)
            array(
                'key'          => 'field_training_pdf_url',
                'label'        => __('PDF Brochure URL', 'azit-industrial'),
                'name'         => 'training_pdf_url',
                'type'         => 'url',
                'instructions' => __('External URL to the PDF brochure (e.g., from ISIT website). Used when no uploaded PDF is available.', 'azit-industrial'),
            ),
            // Source URL (ISIT import)
            array(
                'key'          => 'field_training_source_url',
                'label'        => __('Source URL', 'azit-industrial'),
                'name'         => 'training_source_url',
                'type'         => 'url',
                'instructions' => __('Original training page URL on the ISIT website.', 'azit-industrial'),
            ),
            // Language
            array(
                'key'          => 'field_training_language',
                'label'        => __('Language', 'azit-industrial'),
                'name'         => 'training_language',
                'type'         => 'select',
                'instructions' => __('Training delivery language.', 'azit-industrial'),
                'choices'      => array(
                    'fr' => __('French', 'azit-industrial'),
                    'en' => __('English', 'azit-industrial'),
                ),
                'default_value' => 'fr',
                'wrapper'       => array('width' => '50'),
            ),

            // === TAB: Sessions ===
            array(
                'key'   => 'field_training_tab_sessions',
                'label' => __('Sessions', 'azit-industrial'),
                'type'  => 'tab',
            ),
            // Upcoming Sessions
            array(
                'key'          => 'field_training_sessions',
                'label'        => __('Upcoming Sessions', 'azit-industrial'),
                'name'         => 'training_sessions',
                'type'         => 'repeater',
                'instructions' => __('Scheduled training sessions', 'azit-industrial'),
                'layout'       => 'table',
                'button_label' => __('Add Session', 'azit-industrial'),
                'sub_fields'   => array(
                    array(
                        'key'            => 'field_session_date',
                        'label'          => __('Date', 'azit-industrial'),
                        'name'           => 'session_date',
                        'type'           => 'date_picker',
                        'display_format' => 'd/m/Y',
                        'return_format'  => 'd/m/Y',
                    ),
                    array(
                        'key'   => 'field_session_location',
                        'label' => __('Location', 'azit-industrial'),
                        'name'  => 'session_location',
                        'type'  => 'text',
                    ),
                    array(
                        'key'     => 'field_session_status',
                        'label'   => __('Status', 'azit-industrial'),
                        'name'    => 'session_status',
                        'type'    => 'select',
                        'choices' => array(
                            'available' => __('Available', 'azit-industrial'),
                            'limited'   => __('Limited spots', 'azit-industrial'),
                            'full'      => __('Full', 'azit-industrial'),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'training',
                ),
            ),
        ),
        'menu_order'      => 0,
        'position'        => 'normal',
        'style'           => 'default',
        'label_placement' => 'top',
    ));
}
add_action('acf/init', 'azit_register_acf_fields');

/**
 * =============================================================================
 * FALLBACK META BOXES (when ACF is not installed)
 * =============================================================================
 */

/**
 * Add simple meta boxes if ACF is not available
 */
function azit_add_fallback_meta_boxes() {
    // Only add fallback if ACF is not active
    if (function_exists('acf_add_local_field_group')) {
        return;
    }

    // Expertise meta box
    add_meta_box(
        'azit_expertise_details',
        __('Expertise Details', 'azit-industrial'),
        'azit_expertise_meta_box_callback',
        'expertise',
        'normal',
        'high'
    );

    // Product meta box
    add_meta_box(
        'azit_product_details',
        __('Product Details', 'azit-industrial'),
        'azit_product_meta_box_callback',
        'product',
        'normal',
        'high'
    );

    // Training meta box
    add_meta_box(
        'azit_training_details',
        __('Training Details', 'azit-industrial'),
        'azit_training_meta_box_callback',
        'training',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'azit_add_fallback_meta_boxes');

/**
 * Expertise meta box callback
 */
function azit_expertise_meta_box_callback($post) {
    wp_nonce_field('azit_expertise_meta', 'azit_expertise_meta_nonce');

    $short_desc = get_post_meta($post->ID, 'expertise_short_description', true);
    ?>
    <p>
        <label for="expertise_short_description">
            <strong><?php esc_html_e('Short Description:', 'azit-industrial'); ?></strong>
        </label>
    </p>
    <textarea id="expertise_short_description"
              name="expertise_short_description"
              rows="3"
              style="width: 100%;"><?php echo esc_textarea($short_desc); ?></textarea>
    <p class="description">
        <?php esc_html_e('Brief description for expertise card (2-3 sentences)', 'azit-industrial'); ?>
    </p>
    <p>
        <em><?php esc_html_e('For full custom field functionality, please install Advanced Custom Fields plugin.', 'azit-industrial'); ?></em>
    </p>
    <?php
}

/**
 * Product meta box callback
 */
function azit_product_meta_box_callback($post) {
    wp_nonce_field('azit_product_meta', 'azit_product_meta_nonce');

    $price = get_post_meta($post->ID, 'product_price', true);
    $sku   = get_post_meta($post->ID, 'product_sku', true);
    ?>
    <p>
        <label for="product_price">
            <strong><?php esc_html_e('Price:', 'azit-industrial'); ?></strong>
        </label>
        <input type="text"
               id="product_price"
               name="product_price"
               value="<?php echo esc_attr($price); ?>"
               style="width: 100%;" />
    </p>
    <p>
        <label for="product_sku">
            <strong><?php esc_html_e('SKU/Reference:', 'azit-industrial'); ?></strong>
        </label>
        <input type="text"
               id="product_sku"
               name="product_sku"
               value="<?php echo esc_attr($sku); ?>"
               style="width: 100%;" />
    </p>
    <p>
        <em><?php esc_html_e('For full custom field functionality, please install Advanced Custom Fields plugin.', 'azit-industrial'); ?></em>
    </p>
    <?php
}

/**
 * Training meta box callback
 */
function azit_training_meta_box_callback($post) {
    wp_nonce_field('azit_training_meta', 'azit_training_meta_nonce');

    $duration = get_post_meta($post->ID, 'training_duration', true);
    $price    = get_post_meta($post->ID, 'training_price', true);
    $level    = get_post_meta($post->ID, 'training_level', true);
    ?>
    <p>
        <label for="training_duration">
            <strong><?php esc_html_e('Duration:', 'azit-industrial'); ?></strong>
        </label>
        <input type="text"
               id="training_duration"
               name="training_duration"
               value="<?php echo esc_attr($duration); ?>"
               style="width: 100%;"
               placeholder="<?php esc_attr_e('e.g., 3 days', 'azit-industrial'); ?>" />
    </p>
    <p>
        <label for="training_price">
            <strong><?php esc_html_e('Price:', 'azit-industrial'); ?></strong>
        </label>
        <input type="text"
               id="training_price"
               name="training_price"
               value="<?php echo esc_attr($price); ?>"
               style="width: 100%;"
               placeholder="<?php esc_attr_e('e.g., 1 500 EUR', 'azit-industrial'); ?>" />
    </p>
    <p>
        <label for="training_level">
            <strong><?php esc_html_e('Level:', 'azit-industrial'); ?></strong>
        </label>
        <select id="training_level" name="training_level" style="width: 100%;">
            <option value="beginner" <?php selected($level, 'beginner'); ?>><?php esc_html_e('Beginner', 'azit-industrial'); ?></option>
            <option value="intermediate" <?php selected($level, 'intermediate'); ?>><?php esc_html_e('Intermediate', 'azit-industrial'); ?></option>
            <option value="advanced" <?php selected($level, 'advanced'); ?>><?php esc_html_e('Advanced', 'azit-industrial'); ?></option>
            <option value="expert" <?php selected($level, 'expert'); ?>><?php esc_html_e('Expert', 'azit-industrial'); ?></option>
        </select>
    </p>
    <p>
        <em><?php esc_html_e('For full custom field functionality, please install Advanced Custom Fields plugin.', 'azit-industrial'); ?></em>
    </p>
    <?php
}

/**
 * Save fallback meta box data
 */
function azit_save_fallback_meta($post_id) {
    // Expertise
    if (isset($_POST['azit_expertise_meta_nonce']) && wp_verify_nonce($_POST['azit_expertise_meta_nonce'], 'azit_expertise_meta')) {
        if (isset($_POST['expertise_short_description'])) {
            update_post_meta($post_id, 'expertise_short_description', sanitize_textarea_field($_POST['expertise_short_description']));
        }
    }

    // Product
    if (isset($_POST['azit_product_meta_nonce']) && wp_verify_nonce($_POST['azit_product_meta_nonce'], 'azit_product_meta')) {
        if (isset($_POST['product_price'])) {
            update_post_meta($post_id, 'product_price', sanitize_text_field($_POST['product_price']));
        }
        if (isset($_POST['product_sku'])) {
            update_post_meta($post_id, 'product_sku', sanitize_text_field($_POST['product_sku']));
        }
    }

    // Training
    if (isset($_POST['azit_training_meta_nonce']) && wp_verify_nonce($_POST['azit_training_meta_nonce'], 'azit_training_meta')) {
        if (isset($_POST['training_duration'])) {
            update_post_meta($post_id, 'training_duration', sanitize_text_field($_POST['training_duration']));
        }
        if (isset($_POST['training_price'])) {
            update_post_meta($post_id, 'training_price', sanitize_text_field($_POST['training_price']));
        }
        if (isset($_POST['training_level'])) {
            update_post_meta($post_id, 'training_level', sanitize_text_field($_POST['training_level']));
        }
    }
}
add_action('save_post', 'azit_save_fallback_meta');
