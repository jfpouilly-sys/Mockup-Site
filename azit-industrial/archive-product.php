<?php
/**
 * The template for displaying Product archive
 *
 * Displays a grid of all products.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="archive-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <header class="archive-header">
            <h1 id="archive-title" class="archive-title">
                <?php esc_html_e('Our Products', 'azit-industrial'); ?>
            </h1>

            <div class="archive-description">
                <p>
                    <?php esc_html_e('Discover our range of industrial communication products designed for safety-critical applications and protocol development.', 'azit-industrial'); ?>
                </p>
            </div>
        </header>

        <?php
        // Product Categories/Filters
        $product_categories = get_terms(array(
            'taxonomy'   => 'product_category',
            'hide_empty' => true,
        ));

        if (!is_wp_error($product_categories) && !empty($product_categories)) :
        ?>
        <nav class="product-filters" aria-label="<?php esc_attr_e('Product category filters', 'azit-industrial'); ?>">
            <h2 class="sr-only"><?php esc_html_e('Filter by category', 'azit-industrial'); ?></h2>
            <ul class="filter-list" role="list">
                <li>
                    <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>"
                       class="filter-link <?php echo !is_tax() ? 'active' : ''; ?>"
                       <?php echo !is_tax() ? 'aria-current="page"' : ''; ?>>
                        <?php esc_html_e('All Products', 'azit-industrial'); ?>
                    </a>
                </li>
                <?php foreach ($product_categories as $category) : ?>
                <li>
                    <a href="<?php echo esc_url(get_term_link($category)); ?>"
                       class="filter-link <?php echo is_tax('product_category', $category->term_id) ? 'active' : ''; ?>"
                       <?php echo is_tax('product_category', $category->term_id) ? 'aria-current="page"' : ''; ?>>
                        <?php echo esc_html($category->name); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <?php endif; ?>

        <?php if (have_posts()) : ?>

            <div class="product-grid" role="list" aria-label="<?php esc_attr_e('List of products', 'azit-industrial'); ?>">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <div role="listitem">
                        <?php echo azit_get_product_card(); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php azit_pagination(); ?>

        <?php else : ?>

            <section class="no-results">
                <h2><?php esc_html_e('No products found', 'azit-industrial'); ?></h2>
                <p><?php esc_html_e('We are currently updating our product catalog. Please check back soon.', 'azit-industrial'); ?></p>
            </section>

        <?php endif; ?>

        <!-- CTA Section -->
        <section class="archive-cta" aria-labelledby="cta-heading">
            <h2 id="cta-heading" class="cta-title">
                <?php esc_html_e('Need help choosing?', 'azit-industrial'); ?>
            </h2>
            <p class="cta-text">
                <?php esc_html_e('Our technical team can help you select the right product for your specific requirements.', 'azit-industrial'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                <?php esc_html_e('Request a Consultation', 'azit-industrial'); ?>
            </a>
        </section>

    </div>

</main>

<?php
get_footer();
