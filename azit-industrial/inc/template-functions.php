<?php
/**
 * Template Functions and Helpers
 *
 * Custom template tags and helper functions for the theme.
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
 * POST/PAGE HELPERS
 * =============================================================================
 */

/**
 * Display post thumbnail with accessibility support
 *
 * @param string $size Image size
 * @param array $attr Additional attributes
 */
function azit_post_thumbnail($size = 'post-thumbnail', $attr = array()) {
    if (!has_post_thumbnail()) {
        return;
    }

    $default_attr = array(
        'class' => 'post-thumbnail',
        'alt'   => get_the_title(),
    );

    $attr = wp_parse_args($attr, $default_attr);

    echo '<figure class="post-thumbnail-wrapper">';
    the_post_thumbnail($size, $attr);
    echo '</figure>';
}

/**
 * Get the excerpt with custom length
 *
 * @param int $length Number of words
 * @param string $more Text to append
 * @return string Excerpt
 */
function azit_excerpt($length = 30, $more = '...') {
    $excerpt = get_the_excerpt();

    if (empty($excerpt)) {
        $excerpt = get_the_content();
    }

    $excerpt = wp_strip_all_tags($excerpt);
    $words = explode(' ', $excerpt);

    if (count($words) > $length) {
        $words = array_slice($words, 0, $length);
        $excerpt = implode(' ', $words) . $more;
    }

    return $excerpt;
}

/**
 * Display post meta information
 *
 * @param bool $show_author Whether to show author
 * @param bool $show_date Whether to show date
 * @param bool $show_categories Whether to show categories
 */
function azit_entry_meta($show_author = true, $show_date = true, $show_categories = false) {
    echo '<div class="entry-meta">';

    if ($show_date) {
        echo '<time datetime="' . esc_attr(get_the_date('c')) . '" class="entry-date">';
        echo esc_html(get_the_date());
        echo '</time>';
    }

    if ($show_author) {
        echo '<span class="entry-author">';
        /* translators: %s: author name */
        printf(esc_html__('by %s', 'azit-industrial'), '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>');
        echo '</span>';
    }

    if ($show_categories) {
        $categories = get_the_category();
        if (!empty($categories)) {
            echo '<span class="entry-categories">';
            echo '<span class="sr-only">' . esc_html__('Categories:', 'azit-industrial') . '</span>';
            foreach ($categories as $index => $category) {
                if ($index > 0) {
                    echo ', ';
                }
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
            }
            echo '</span>';
        }
    }

    echo '</div>';
}

/**
 * =============================================================================
 * EXPERTISE HELPERS
 * =============================================================================
 */

/**
 * Get expertise card HTML
 *
 * @param WP_Post $post Expertise post
 * @return string HTML
 */
function azit_get_expertise_card($post = null) {
    if (!$post) {
        $post = get_post();
    }

    // Get custom fields
    $short_desc = '';
    $icon = null;

    // Try ACF first, then fallback to post meta
    if (function_exists('get_field')) {
        $short_desc = get_field('expertise_short_description', $post->ID);
        $icon = get_field('expertise_icon', $post->ID);
    } else {
        $short_desc = get_post_meta($post->ID, 'expertise_short_description', true);
    }

    // Fallback to excerpt if no short description
    if (empty($short_desc)) {
        $short_desc = azit_excerpt(25, '...');
    }

    ob_start();
    ?>
    <article class="expertise-card" aria-labelledby="expertise-<?php echo esc_attr($post->ID); ?>">
        <div class="expertise-card-inner">

            <?php if ($icon && is_array($icon)) : ?>
            <div class="expertise-icon" aria-hidden="true">
                <img src="<?php echo esc_url($icon['url']); ?>"
                     alt=""
                     role="presentation"
                     width="100"
                     height="100" />
            </div>
            <?php elseif (has_post_thumbnail($post->ID)) : ?>
            <div class="expertise-icon" aria-hidden="true">
                <?php echo get_the_post_thumbnail($post->ID, 'azit-card', array('alt' => '', 'role' => 'presentation')); ?>
            </div>
            <?php endif; ?>

            <div class="expertise-content">
                <h2 id="expertise-<?php echo esc_attr($post->ID); ?>" class="expertise-title">
                    <?php echo esc_html($post->post_title); ?>
                </h2>

                <p class="expertise-description">
                    <?php echo esc_html($short_desc); ?>
                </p>

                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"
                   class="expertise-link"
                   aria-describedby="expertise-<?php echo esc_attr($post->ID); ?>">
                    <?php esc_html_e('Learn more', 'azit-industrial'); ?>
                    <span aria-hidden="true"> &rarr;</span>
                    <span class="sr-only">
                        <?php echo esc_html(sprintf(__('about %s', 'azit-industrial'), $post->post_title)); ?>
                    </span>
                </a>
            </div>

        </div>
    </article>
    <?php
    return ob_get_clean();
}

/**
 * Display expertise cards grid
 *
 * @param int $count Number of expertise to show (-1 for all)
 */
function azit_expertise_grid($count = -1) {
    $expertise_query = new WP_Query(array(
        'post_type'      => 'expertise',
        'posts_per_page' => $count,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ));

    if (!$expertise_query->have_posts()) {
        return;
    }

    echo '<div class="expertise-grid" role="list">';

    while ($expertise_query->have_posts()) {
        $expertise_query->the_post();
        echo '<div role="listitem">';
        echo azit_get_expertise_card();
        echo '</div>';
    }

    echo '</div>';

    wp_reset_postdata();
}

/**
 * =============================================================================
 * PRODUCT HELPERS
 * =============================================================================
 */

/**
 * Get product card HTML
 *
 * @param WP_Post $post Product post
 * @return string HTML
 */
function azit_get_product_card($post = null) {
    if (!$post) {
        $post = get_post();
    }

    // Get custom fields
    $price = '';
    $image = null;

    if (function_exists('get_field')) {
        $price = get_field('product_price', $post->ID);
        $image = get_field('product_image', $post->ID);
    } else {
        $price = get_post_meta($post->ID, 'product_price', true);
    }

    ob_start();
    ?>
    <article class="product-card" aria-labelledby="product-<?php echo esc_attr($post->ID); ?>">
        <div class="product-card-inner">

            <?php if ($image && is_array($image)) : ?>
            <div class="product-image">
                <img src="<?php echo esc_url($image['url']); ?>"
                     alt="<?php echo esc_attr($image['alt'] ?: $post->post_title); ?>"
                     width="300"
                     height="200" />
            </div>
            <?php elseif (has_post_thumbnail($post->ID)) : ?>
            <div class="product-image">
                <?php echo get_the_post_thumbnail($post->ID, 'azit-card', array('alt' => $post->post_title)); ?>
            </div>
            <?php endif; ?>

            <div class="product-content">
                <h2 id="product-<?php echo esc_attr($post->ID); ?>" class="product-title">
                    <?php echo esc_html($post->post_title); ?>
                </h2>

                <?php if ($price) : ?>
                <p class="product-price">
                    <span class="sr-only"><?php esc_html_e('Price:', 'azit-industrial'); ?></span>
                    <?php echo esc_html($price); ?>
                </p>
                <?php endif; ?>

                <p class="product-excerpt">
                    <?php echo esc_html(azit_excerpt(15, '...')); ?>
                </p>

                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"
                   class="product-link"
                   aria-describedby="product-<?php echo esc_attr($post->ID); ?>">
                    <?php esc_html_e('View Product', 'azit-industrial'); ?>
                    <span class="sr-only">
                        <?php echo esc_html($post->post_title); ?>
                    </span>
                </a>
            </div>

        </div>
    </article>
    <?php
    return ob_get_clean();
}

/**
 * =============================================================================
 * TRAINING HELPERS
 * =============================================================================
 */

/**
 * Get training card HTML
 *
 * @param WP_Post $post Training post
 * @return string HTML
 */
function azit_get_training_card($post = null) {
    if (!$post) {
        $post = get_post();
    }

    // Get custom fields
    $duration = '';
    $price = '';
    $level = '';

    if (function_exists('get_field')) {
        $duration = get_field('training_duration', $post->ID);
        $price = get_field('training_price', $post->ID);
        $level = get_field('training_level', $post->ID);
    } else {
        $duration = get_post_meta($post->ID, 'training_duration', true);
        $price = get_post_meta($post->ID, 'training_price', true);
        $level = get_post_meta($post->ID, 'training_level', true);
    }

    // Level labels
    $level_labels = array(
        'beginner'     => __('Beginner', 'azit-industrial'),
        'intermediate' => __('Intermediate', 'azit-industrial'),
        'advanced'     => __('Advanced', 'azit-industrial'),
        'expert'       => __('Expert', 'azit-industrial'),
    );

    $level_label = isset($level_labels[$level]) ? $level_labels[$level] : '';

    ob_start();
    ?>
    <article class="training-card" aria-labelledby="training-<?php echo esc_attr($post->ID); ?>">
        <div class="training-card-inner">

            <?php if ($level_label) : ?>
            <span class="training-level training-level-<?php echo esc_attr($level); ?>">
                <?php echo esc_html($level_label); ?>
            </span>
            <?php endif; ?>

            <h2 id="training-<?php echo esc_attr($post->ID); ?>" class="training-title">
                <?php echo esc_html($post->post_title); ?>
            </h2>

            <p class="training-excerpt">
                <?php echo esc_html(azit_excerpt(20, '...')); ?>
            </p>

            <dl class="training-meta">
                <?php if ($duration) : ?>
                <div class="training-meta-item">
                    <dt><?php esc_html_e('Duration', 'azit-industrial'); ?></dt>
                    <dd><?php echo esc_html($duration); ?></dd>
                </div>
                <?php endif; ?>

                <?php if ($price) : ?>
                <div class="training-meta-item">
                    <dt><?php esc_html_e('Price', 'azit-industrial'); ?></dt>
                    <dd><?php echo esc_html($price); ?></dd>
                </div>
                <?php endif; ?>
            </dl>

            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"
               class="training-link"
               aria-describedby="training-<?php echo esc_attr($post->ID); ?>">
                <?php esc_html_e('View Training', 'azit-industrial'); ?>
                <span class="sr-only">
                    <?php echo esc_html($post->post_title); ?>
                </span>
            </a>

        </div>
    </article>
    <?php
    return ob_get_clean();
}

/**
 * =============================================================================
 * PAGINATION
 * =============================================================================
 */

/**
 * Display accessible pagination
 *
 * @param WP_Query $query Optional custom query
 */
function azit_pagination($query = null) {
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }

    $total_pages = $query->max_num_pages;

    if ($total_pages <= 1) {
        return;
    }

    $current_page = max(1, get_query_var('paged'));

    echo '<nav class="pagination" aria-label="' . esc_attr__('Page navigation', 'azit-industrial') . '">';
    echo '<ul class="pagination-list">';

    // Previous link
    if ($current_page > 1) {
        echo '<li class="pagination-item pagination-prev">';
        echo '<a href="' . esc_url(get_pagenum_link($current_page - 1)) . '" aria-label="' . esc_attr__('Previous page', 'azit-industrial') . '">';
        echo '<span aria-hidden="true">&laquo;</span> ' . esc_html__('Previous', 'azit-industrial');
        echo '</a></li>';
    }

    // Page numbers
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i === $current_page) {
            echo '<li class="pagination-item current">';
            echo '<span aria-current="page">';
            echo '<span class="sr-only">' . esc_html__('Current page', 'azit-industrial') . ', </span>';
            echo esc_html($i);
            echo '</span></li>';
        } else {
            echo '<li class="pagination-item">';
            echo '<a href="' . esc_url(get_pagenum_link($i)) . '">';
            echo '<span class="sr-only">' . esc_html__('Page', 'azit-industrial') . ' </span>';
            echo esc_html($i);
            echo '</a></li>';
        }
    }

    // Next link
    if ($current_page < $total_pages) {
        echo '<li class="pagination-item pagination-next">';
        echo '<a href="' . esc_url(get_pagenum_link($current_page + 1)) . '" aria-label="' . esc_attr__('Next page', 'azit-industrial') . '">';
        echo esc_html__('Next', 'azit-industrial') . ' <span aria-hidden="true">&raquo;</span>';
        echo '</a></li>';
    }

    echo '</ul></nav>';
}

/**
 * =============================================================================
 * SOCIAL SHARING
 * =============================================================================
 */

/**
 * Display social sharing buttons with accessibility
 */
function azit_social_share() {
    $url = urlencode(get_permalink());
    $title = urlencode(get_the_title());

    ?>
    <div class="social-share" aria-label="<?php esc_attr_e('Share this page', 'azit-industrial'); ?>">
        <span class="share-label"><?php esc_html_e('Share:', 'azit-industrial'); ?></span>

        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="<?php esc_attr_e('Share on LinkedIn (opens in new window)', 'azit-industrial'); ?>"
           class="share-link share-linkedin">
            LinkedIn
        </a>

        <a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="<?php esc_attr_e('Share on Twitter (opens in new window)', 'azit-industrial'); ?>"
           class="share-link share-twitter">
            Twitter
        </a>

        <a href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $url; ?>"
           aria-label="<?php esc_attr_e('Share via Email', 'azit-industrial'); ?>"
           class="share-link share-email">
            Email
        </a>
    </div>
    <?php
}

/**
 * =============================================================================
 * MISCELLANEOUS HELPERS
 * =============================================================================
 */

/**
 * Get SVG icon
 *
 * @param string $name Icon name
 * @param array $args Additional arguments
 * @return string SVG markup
 */
function azit_get_icon($name, $args = array()) {
    $defaults = array(
        'class'       => '',
        'aria-hidden' => 'true',
        'focusable'   => 'false',
        'width'       => 24,
        'height'      => 24,
    );

    $args = wp_parse_args($args, $defaults);

    $svg_file = AZIT_THEME_DIR . '/assets/images/icons/' . $name . '.svg';

    if (!file_exists($svg_file)) {
        return '';
    }

    $svg = file_get_contents($svg_file);

    // Add attributes
    $svg = preg_replace(
        '/<svg/',
        '<svg class="icon icon-' . esc_attr($name) . ' ' . esc_attr($args['class']) . '" ' .
        'aria-hidden="' . esc_attr($args['aria-hidden']) . '" ' .
        'focusable="' . esc_attr($args['focusable']) . '" ' .
        'width="' . esc_attr($args['width']) . '" ' .
        'height="' . esc_attr($args['height']) . '"',
        $svg,
        1
    );

    return $svg;
}

/**
 * Display icon
 *
 * @param string $name Icon name
 * @param array $args Additional arguments
 */
function azit_icon($name, $args = array()) {
    echo azit_get_icon($name, $args);
}

/**
 * Format phone number for tel: link
 *
 * @param string $phone Phone number
 * @return string Formatted for tel: link
 */
function azit_format_phone_link($phone) {
    // Remove all non-numeric characters except +
    return preg_replace('/[^0-9+]/', '', $phone);
}

/**
 * Check if we're in a development environment
 *
 * @return bool
 */
function azit_is_development() {
    return defined('WP_DEBUG') && WP_DEBUG;
}
