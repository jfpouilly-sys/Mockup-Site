<?php
/**
 * ISIT Training Data Import Script for WordPress with ACF
 * 
 * This script imports training data into WordPress Custom Post Type
 * and populates ACF (Advanced Custom Fields) for the "G Program" tab
 * 
 * USAGE:
 * 1. Place this file in your WordPress theme folder
 * 2. Update the $json_file_path with the path to your JSON data
 * 3. Run from WordPress admin or via WP-CLI: wp eval-file import_trainings.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Import ISIT Training Data
 */
function import_isit_training_data() {
    
    // Path to JSON data file
    $json_file_path = get_template_directory() . '/data/isit_trainings_data.json';
    
    // Check if file exists
    if (!file_exists($json_file_path)) {
        echo "Error: JSON file not found at: " . $json_file_path . "\n";
        return;
    }
    
    // Load JSON data
    $json_content = file_get_contents($json_file_path);
    $data = json_decode($json_content, true);
    
    if (!$data || !isset($data['trainings'])) {
        echo "Error: Invalid JSON structure\n";
        return;
    }
    
    $trainings = $data['trainings'];
    $imported_count = 0;
    $updated_count = 0;
    $error_count = 0;
    
    echo "Starting import of " . count($trainings) . " trainings...\n\n";
    
    foreach ($trainings as $index => $training) {
        try {
            echo "Processing [" . ($index + 1) . "/" . count($trainings) . "]: " . $training['title'] . "\n";
            
            // Check if post already exists by slug
            $existing_post = get_page_by_path($training['post_slug'], OBJECT, 'training');
            
            $post_data = array(
                'post_title'    => $training['title'],
                'post_name'     => $training['post_slug'],
                'post_type'     => 'training',  // Custom post type - adjust as needed
                'post_status'   => 'publish',
                'post_content'  => '', // Add if needed
            );
            
            // Insert or update post
            if ($existing_post) {
                $post_data['ID'] = $existing_post->ID;
                $post_id = wp_update_post($post_data);
                echo "  → Updated existing post (ID: $post_id)\n";
                $updated_count++;
            } else {
                $post_id = wp_insert_post($post_data);
                echo "  → Created new post (ID: $post_id)\n";
                $imported_count++;
            }
            
            if (is_wp_error($post_id)) {
                throw new Exception($post_id->get_error_message());
            }
            
            // Update ACF fields for "G Program" tab
            $acf_fields = array(
                'objectives'        => $training['objectives'] ?? '',
                'programme'         => $training['programme'] ?? '',
                'duration'          => $training['duration'] ?? '',
                'price'             => $training['price'] ?? '',
                'target_audience'   => $training['target_audience'] ?? '',
                'prerequisites'     => $training['prerequisites'] ?? '',
                'pdf_brochure_url'  => $training['pdf_brochure_url'] ?? '',
                'training_date'     => $training['training_date'] ?? '',
                'location'          => $training['location'] ?? '',
                'language'          => $training['language'] ?? '',
                'training_url'      => $training['url'] ?? '',
            );
            
            // Update each ACF field
            foreach ($acf_fields as $field_name => $field_value) {
                update_field($field_name, $field_value, $post_id);
            }
            
            echo "  ✓ ACF fields updated successfully\n\n";
            
        } catch (Exception $e) {
            echo "  ✗ Error: " . $e->getMessage() . "\n\n";
            $error_count++;
        }
    }
    
    // Summary
    echo str_repeat('=', 60) . "\n";
    echo "IMPORT COMPLETE\n";
    echo str_repeat('=', 60) . "\n";
    echo "Total processed: " . count($trainings) . "\n";
    echo "New imports:     " . $imported_count . "\n";
    echo "Updates:         " . $updated_count . "\n";
    echo "Errors:          " . $error_count . "\n";
    echo str_repeat('=', 60) . "\n";
}

/**
 * Register Custom Post Type: Training
 * Add this to your theme's functions.php
 */
function register_training_post_type() {
    $labels = array(
        'name'               => 'Trainings',
        'singular_name'      => 'Training',
        'menu_name'          => 'Trainings',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Training',
        'edit_item'          => 'Edit Training',
        'new_item'           => 'New Training',
        'view_item'          => 'View Training',
        'search_items'       => 'Search Trainings',
        'not_found'          => 'No trainings found',
        'not_found_in_trash' => 'No trainings found in trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'training'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-learn-more',
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'        => true,
    );

    register_post_type('training', $args);
}
add_action('init', 'register_training_post_type');

/**
 * ACF Field Group Configuration
 * Export this from ACF or add via code
 */
function register_training_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_training_program',
            'title' => 'Training Program',
            'fields' => array(
                array(
                    'key' => 'field_program_tab',
                    'label' => 'Program',
                    'name' => 'program_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_objectives',
                    'label' => 'Pedagogical Objectives',
                    'name' => 'objectives',
                    'type' => 'wysiwyg',
                    'required' => 0,
                    'media_upload' => 0,
                ),
                array(
                    'key' => 'field_programme',
                    'label' => 'Detailed Program',
                    'name' => 'programme',
                    'type' => 'wysiwyg',
                    'required' => 0,
                    'media_upload' => 0,
                ),
                array(
                    'key' => 'field_duration',
                    'label' => 'Duration',
                    'name' => 'duration',
                    'type' => 'text',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_price',
                    'label' => 'Price',
                    'name' => 'price',
                    'type' => 'text',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_target_audience',
                    'label' => 'Target Audience',
                    'name' => 'target_audience',
                    'type' => 'textarea',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_prerequisites',
                    'label' => 'Prerequisites',
                    'name' => 'prerequisites',
                    'type' => 'textarea',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_pdf_brochure_url',
                    'label' => 'PDF Brochure URL',
                    'name' => 'pdf_brochure_url',
                    'type' => 'url',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_training_date',
                    'label' => 'Training Date',
                    'name' => 'training_date',
                    'type' => 'text',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_location',
                    'label' => 'Location',
                    'name' => 'location',
                    'type' => 'text',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_language',
                    'label' => 'Language',
                    'name' => 'language',
                    'type' => 'select',
                    'choices' => array(
                        'fr' => 'French',
                        'en' => 'English',
                    ),
                    'required' => 0,
                ),
                array(
                    'key' => 'field_training_url',
                    'label' => 'Original ISIT URL',
                    'name' => 'training_url',
                    'type' => 'url',
                    'required' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'training',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'register_training_acf_fields');

/**
 * Display Training Program on Frontend
 * Add this to your single-training.php template
 */
function display_training_program() {
    if (have_posts()) : while (have_posts()) : the_post();
        
        $objectives = get_field('objectives');
        $programme = get_field('programme');
        $duration = get_field('duration');
        $price = get_field('price');
        $target_audience = get_field('target_audience');
        $prerequisites = get_field('prerequisites');
        $pdf_url = get_field('pdf_brochure_url');
        $training_date = get_field('training_date');
        $location = get_field('location');
        
        ?>
        <article class="training-detail">
            <h1><?php the_title(); ?></h1>
            
            <div class="training-meta">
                <?php if ($duration): ?>
                    <p><strong>Duration:</strong> <?php echo esc_html($duration); ?></p>
                <?php endif; ?>
                
                <?php if ($price): ?>
                    <p><strong>Price:</strong> <?php echo esc_html($price); ?></p>
                <?php endif; ?>
                
                <?php if ($training_date): ?>
                    <p><strong>Date:</strong> <?php echo esc_html($training_date); ?></p>
                <?php endif; ?>
                
                <?php if ($location): ?>
                    <p><strong>Location:</strong> <?php echo esc_html($location); ?></p>
                <?php endif; ?>
            </div>
            
            <?php if ($objectives): ?>
                <section class="training-objectives">
                    <h2>Objectives</h2>
                    <?php echo wp_kses_post($objectives); ?>
                </section>
            <?php endif; ?>
            
            <?php if ($programme): ?>
                <section class="training-programme">
                    <h2>Program</h2>
                    <?php echo wp_kses_post($programme); ?>
                </section>
            <?php endif; ?>
            
            <?php if ($target_audience): ?>
                <section class="training-audience">
                    <h3>Target Audience</h3>
                    <p><?php echo esc_html($target_audience); ?></p>
                </section>
            <?php endif; ?>
            
            <?php if ($prerequisites): ?>
                <section class="training-prerequisites">
                    <h3>Prerequisites</h3>
                    <p><?php echo esc_html($prerequisites); ?></p>
                </section>
            <?php endif; ?>
            
            <?php if ($pdf_url): ?>
                <a href="<?php echo esc_url($pdf_url); ?>" class="btn btn-download" target="_blank">
                    Download PDF Brochure
                </a>
            <?php endif; ?>
        </article>
        <?php
        
    endwhile; endif;
}

// Run the import (comment out after first run)
// import_isit_training_data();

?>
