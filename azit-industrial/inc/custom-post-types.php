<?php
/**
 * Custom Post Types Registration
 *
 * Registers custom post types for:
 * - Expertise
 * - Products
 * - Training
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
 * EXPERTISE POST TYPE
 * =============================================================================
 */

/**
 * Register Expertise Custom Post Type
 */
function azit_register_expertise_post_type() {
    $labels = array(
        'name'                  => _x('Expertise', 'Post type general name', 'azit-industrial'),
        'singular_name'         => _x('Expertise', 'Post type singular name', 'azit-industrial'),
        'menu_name'             => _x('Expertise', 'Admin Menu text', 'azit-industrial'),
        'name_admin_bar'        => _x('Expertise', 'Add New on Toolbar', 'azit-industrial'),
        'add_new'               => __('Add New', 'azit-industrial'),
        'add_new_item'          => __('Add New Expertise', 'azit-industrial'),
        'new_item'              => __('New Expertise', 'azit-industrial'),
        'edit_item'             => __('Edit Expertise', 'azit-industrial'),
        'view_item'             => __('View Expertise', 'azit-industrial'),
        'all_items'             => __('All Expertise', 'azit-industrial'),
        'search_items'          => __('Search Expertise', 'azit-industrial'),
        'parent_item_colon'     => __('Parent Expertise:', 'azit-industrial'),
        'not_found'             => __('No expertise found.', 'azit-industrial'),
        'not_found_in_trash'    => __('No expertise found in Trash.', 'azit-industrial'),
        'featured_image'        => _x('Expertise Image', 'Overrides the "Featured Image" phrase', 'azit-industrial'),
        'set_featured_image'    => _x('Set expertise image', 'Overrides the "Set featured image" phrase', 'azit-industrial'),
        'remove_featured_image' => _x('Remove expertise image', 'Overrides the "Remove featured image" phrase', 'azit-industrial'),
        'use_featured_image'    => _x('Use as expertise image', 'Overrides the "Use as featured image" phrase', 'azit-industrial'),
        'archives'              => _x('Expertise Archives', 'The post type archive label', 'azit-industrial'),
        'insert_into_item'      => _x('Insert into expertise', 'Overrides the "Insert into post" phrase', 'azit-industrial'),
        'uploaded_to_this_item' => _x('Uploaded to this expertise', 'Overrides the "Uploaded to this post" phrase', 'azit-industrial'),
        'filter_items_list'     => _x('Filter expertise list', 'Screen reader text', 'azit-industrial'),
        'items_list_navigation' => _x('Expertise list navigation', 'Screen reader text', 'azit-industrial'),
        'items_list'            => _x('Expertise list', 'Screen reader text', 'azit-industrial'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true, // Enable Gutenberg editor
        'query_var'           => true,
        'rewrite'             => array(
            'slug'       => 'expertise',
            'with_front' => false,
        ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-awards',
        'supports'            => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions',
            'page-attributes',
            'custom-fields',
        ),
    );

    register_post_type('expertise', $args);
}
add_action('init', 'azit_register_expertise_post_type');

/**
 * =============================================================================
 * PRODUCTS POST TYPE
 * =============================================================================
 */

/**
 * Register Products Custom Post Type
 */
function azit_register_products_post_type() {
    $labels = array(
        'name'                  => _x('Products', 'Post type general name', 'azit-industrial'),
        'singular_name'         => _x('Product', 'Post type singular name', 'azit-industrial'),
        'menu_name'             => _x('Products', 'Admin Menu text', 'azit-industrial'),
        'name_admin_bar'        => _x('Product', 'Add New on Toolbar', 'azit-industrial'),
        'add_new'               => __('Add New', 'azit-industrial'),
        'add_new_item'          => __('Add New Product', 'azit-industrial'),
        'new_item'              => __('New Product', 'azit-industrial'),
        'edit_item'             => __('Edit Product', 'azit-industrial'),
        'view_item'             => __('View Product', 'azit-industrial'),
        'all_items'             => __('All Products', 'azit-industrial'),
        'search_items'          => __('Search Products', 'azit-industrial'),
        'parent_item_colon'     => __('Parent Product:', 'azit-industrial'),
        'not_found'             => __('No products found.', 'azit-industrial'),
        'not_found_in_trash'    => __('No products found in Trash.', 'azit-industrial'),
        'featured_image'        => _x('Product Image', 'Overrides the "Featured Image" phrase', 'azit-industrial'),
        'set_featured_image'    => _x('Set product image', 'Overrides the "Set featured image" phrase', 'azit-industrial'),
        'remove_featured_image' => _x('Remove product image', 'Overrides the "Remove featured image" phrase', 'azit-industrial'),
        'use_featured_image'    => _x('Use as product image', 'Overrides the "Use as featured image" phrase', 'azit-industrial'),
        'archives'              => _x('Product Archives', 'The post type archive label', 'azit-industrial'),
        'insert_into_item'      => _x('Insert into product', 'Overrides the "Insert into post" phrase', 'azit-industrial'),
        'uploaded_to_this_item' => _x('Uploaded to this product', 'Overrides the "Uploaded to this post" phrase', 'azit-industrial'),
        'filter_items_list'     => _x('Filter products list', 'Screen reader text', 'azit-industrial'),
        'items_list_navigation' => _x('Products list navigation', 'Screen reader text', 'azit-industrial'),
        'items_list'            => _x('Products list', 'Screen reader text', 'azit-industrial'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'query_var'           => true,
        'rewrite'             => array(
            'slug'       => 'products',
            'with_front' => false,
        ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-products',
        'supports'            => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions',
            'page-attributes',
            'custom-fields',
        ),
        'taxonomies'          => array('product_category'),
    );

    register_post_type('product', $args);
}
add_action('init', 'azit_register_products_post_type');

/**
 * Register Product Category Taxonomy
 */
function azit_register_product_taxonomy() {
    $labels = array(
        'name'                       => _x('Product Categories', 'Taxonomy general name', 'azit-industrial'),
        'singular_name'              => _x('Product Category', 'Taxonomy singular name', 'azit-industrial'),
        'search_items'               => __('Search Product Categories', 'azit-industrial'),
        'popular_items'              => __('Popular Product Categories', 'azit-industrial'),
        'all_items'                  => __('All Product Categories', 'azit-industrial'),
        'parent_item'                => __('Parent Product Category', 'azit-industrial'),
        'parent_item_colon'          => __('Parent Product Category:', 'azit-industrial'),
        'edit_item'                  => __('Edit Product Category', 'azit-industrial'),
        'update_item'                => __('Update Product Category', 'azit-industrial'),
        'add_new_item'               => __('Add New Product Category', 'azit-industrial'),
        'new_item_name'              => __('New Product Category Name', 'azit-industrial'),
        'separate_items_with_commas' => __('Separate categories with commas', 'azit-industrial'),
        'add_or_remove_items'        => __('Add or remove categories', 'azit-industrial'),
        'choose_from_most_used'      => __('Choose from the most used categories', 'azit-industrial'),
        'not_found'                  => __('No product categories found.', 'azit-industrial'),
        'menu_name'                  => __('Categories', 'azit-industrial'),
        'back_to_items'              => __('&larr; Back to Product Categories', 'azit-industrial'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array(
            'slug'         => 'product-category',
            'with_front'   => false,
            'hierarchical' => true,
        ),
    );

    register_taxonomy('product_category', array('product'), $args);
}
add_action('init', 'azit_register_product_taxonomy', 0);

/**
 * =============================================================================
 * TRAINING POST TYPE
 * =============================================================================
 */

/**
 * Register Training Custom Post Type
 */
function azit_register_training_post_type() {
    $labels = array(
        'name'                  => _x('Training', 'Post type general name', 'azit-industrial'),
        'singular_name'         => _x('Training', 'Post type singular name', 'azit-industrial'),
        'menu_name'             => _x('Training', 'Admin Menu text', 'azit-industrial'),
        'name_admin_bar'        => _x('Training', 'Add New on Toolbar', 'azit-industrial'),
        'add_new'               => __('Add New', 'azit-industrial'),
        'add_new_item'          => __('Add New Training', 'azit-industrial'),
        'new_item'              => __('New Training', 'azit-industrial'),
        'edit_item'             => __('Edit Training', 'azit-industrial'),
        'view_item'             => __('View Training', 'azit-industrial'),
        'all_items'             => __('All Training', 'azit-industrial'),
        'search_items'          => __('Search Training', 'azit-industrial'),
        'parent_item_colon'     => __('Parent Training:', 'azit-industrial'),
        'not_found'             => __('No training found.', 'azit-industrial'),
        'not_found_in_trash'    => __('No training found in Trash.', 'azit-industrial'),
        'featured_image'        => _x('Training Image', 'Overrides the "Featured Image" phrase', 'azit-industrial'),
        'set_featured_image'    => _x('Set training image', 'Overrides the "Set featured image" phrase', 'azit-industrial'),
        'remove_featured_image' => _x('Remove training image', 'Overrides the "Remove featured image" phrase', 'azit-industrial'),
        'use_featured_image'    => _x('Use as training image', 'Overrides the "Use as featured image" phrase', 'azit-industrial'),
        'archives'              => _x('Training Archives', 'The post type archive label', 'azit-industrial'),
        'insert_into_item'      => _x('Insert into training', 'Overrides the "Insert into post" phrase', 'azit-industrial'),
        'uploaded_to_this_item' => _x('Uploaded to this training', 'Overrides the "Uploaded to this post" phrase', 'azit-industrial'),
        'filter_items_list'     => _x('Filter training list', 'Screen reader text', 'azit-industrial'),
        'items_list_navigation' => _x('Training list navigation', 'Screen reader text', 'azit-industrial'),
        'items_list'            => _x('Training list', 'Screen reader text', 'azit-industrial'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'query_var'           => true,
        'rewrite'             => array(
            'slug'       => 'training',
            'with_front' => false,
        ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-welcome-learn-more',
        'supports'            => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions',
            'page-attributes',
            'custom-fields',
        ),
    );

    register_post_type('training', $args);
}
add_action('init', 'azit_register_training_post_type');

/**
 * Register Training Level Taxonomy
 */
function azit_register_training_level_taxonomy() {
    $labels = array(
        'name'                       => _x('Training Levels', 'Taxonomy general name', 'azit-industrial'),
        'singular_name'              => _x('Training Level', 'Taxonomy singular name', 'azit-industrial'),
        'search_items'               => __('Search Training Levels', 'azit-industrial'),
        'all_items'                  => __('All Training Levels', 'azit-industrial'),
        'edit_item'                  => __('Edit Training Level', 'azit-industrial'),
        'update_item'                => __('Update Training Level', 'azit-industrial'),
        'add_new_item'               => __('Add New Training Level', 'azit-industrial'),
        'new_item_name'              => __('New Training Level Name', 'azit-industrial'),
        'menu_name'                  => __('Levels', 'azit-industrial'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array(
            'slug'       => 'training-level',
            'with_front' => false,
        ),
    );

    register_taxonomy('training_level', array('training'), $args);
}
add_action('init', 'azit_register_training_level_taxonomy', 0);

/**
 * =============================================================================
 * FLUSH REWRITE RULES ON ACTIVATION
 * =============================================================================
 */

/**
 * Flush rewrite rules on theme activation
 */
function azit_rewrite_flush() {
    azit_register_expertise_post_type();
    azit_register_products_post_type();
    azit_register_product_taxonomy();
    azit_register_training_post_type();
    azit_register_training_level_taxonomy();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'azit_rewrite_flush');

/**
 * =============================================================================
 * ADMIN COLUMNS
 * =============================================================================
 */

/**
 * Add custom columns to Expertise admin list
 */
function azit_expertise_admin_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['expertise_icon'] = __('Icon', 'azit-industrial');
        }
    }
    return $new_columns;
}
add_filter('manage_expertise_posts_columns', 'azit_expertise_admin_columns');

/**
 * Populate custom columns for Expertise
 */
function azit_expertise_admin_column_content($column, $post_id) {
    if ($column === 'expertise_icon') {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, array(50, 50));
        } else {
            echo '&mdash;';
        }
    }
}
add_action('manage_expertise_posts_custom_column', 'azit_expertise_admin_column_content', 10, 2);

/**
 * Add custom columns to Product admin list
 */
function azit_product_admin_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['product_image'] = __('Image', 'azit-industrial');
            $new_columns['product_price'] = __('Price', 'azit-industrial');
        }
    }
    return $new_columns;
}
add_filter('manage_product_posts_columns', 'azit_product_admin_columns');

/**
 * Populate custom columns for Products
 */
function azit_product_admin_column_content($column, $post_id) {
    switch ($column) {
        case 'product_image':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            } else {
                echo '&mdash;';
            }
            break;
        case 'product_price':
            $price = get_post_meta($post_id, 'product_price', true);
            echo $price ? esc_html($price) : '&mdash;';
            break;
    }
}
add_action('manage_product_posts_custom_column', 'azit_product_admin_column_content', 10, 2);

/**
 * Add custom columns to Training admin list
 */
function azit_training_admin_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['training_duration'] = __('Duration', 'azit-industrial');
            $new_columns['training_price'] = __('Price', 'azit-industrial');
        }
    }
    return $new_columns;
}
add_filter('manage_training_posts_columns', 'azit_training_admin_columns');

/**
 * Populate custom columns for Training
 */
function azit_training_admin_column_content($column, $post_id) {
    switch ($column) {
        case 'training_duration':
            $duration = get_post_meta($post_id, 'training_duration', true);
            echo $duration ? esc_html($duration) : '&mdash;';
            break;
        case 'training_price':
            $price = get_post_meta($post_id, 'training_price', true);
            echo $price ? esc_html($price) : '&mdash;';
            break;
    }
}
add_action('manage_training_posts_custom_column', 'azit_training_admin_column_content', 10, 2);
