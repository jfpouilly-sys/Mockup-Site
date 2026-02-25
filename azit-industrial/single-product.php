<?php
/**
 * The template for displaying single Product posts
 *
 * Two-column layout with gallery + info header, then full-width sections
 * for features, specifications, documentation, and related products.
 *
 * All content is manageable via WordPress editor + ACF fields.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="product-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php
            // =============================================
            // Retrieve all ACF fields (with post_meta fallback)
            // =============================================
            $has_acf = function_exists('get_field');

            // General
            $sku          = $has_acf ? get_field('product_sku') : get_post_meta(get_the_ID(), 'product_sku', true);
            $price        = $has_acf ? get_field('product_price') : get_post_meta(get_the_ID(), 'product_price', true);
            $availability = $has_acf ? get_field('product_availability') : '';
            $gallery      = $has_acf ? get_field('product_gallery') : array();
            $badges       = $has_acf ? get_field('product_badges') : array();

            // Features
            $feature_groups = $has_acf ? get_field('product_feature_groups') : array();
            $features       = $has_acf ? get_field('product_features') : array();

            // Specifications
            $spec_tables    = $has_acf ? get_field('product_spec_tables') : array();
            $specifications = $has_acf ? get_field('product_specifications') : array();

            // Documentation
            $datasheet = $has_acf ? get_field('product_datasheet') : null;
            $downloads = $has_acf ? get_field('product_downloads') : array();

            // Related
            $related_products = $has_acf ? get_field('related_products') : array();

            // Labels
            $availability_labels = array(
                'in_stock'     => __('In Stock', 'azit-industrial'),
                'limited'      => __('Limited Availability', 'azit-industrial'),
                'out_of_stock' => __('Out of Stock', 'azit-industrial'),
                'pre_order'    => __('Pre-Order', 'azit-industrial'),
                'contact'      => __('Contact for Availability', 'azit-industrial'),
            );

            // Get product categories
            $product_cats = get_the_terms(get_the_ID(), 'product_category');
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('single-product'); ?>>

                <!-- Badges -->
                <?php if (($badges && is_array($badges)) || ($product_cats && !is_wp_error($product_cats))) : ?>
                <div class="product-hero__badges">
                    <?php if ($product_cats && !is_wp_error($product_cats)) : ?>
                        <?php foreach ($product_cats as $cat) : ?>
                        <span class="badge badge--primary"><?php echo esc_html($cat->name); ?></span>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if ($badges && is_array($badges)) : ?>
                        <?php foreach ($badges as $badge) : ?>
                        <span class="badge badge--primary"><?php echo esc_html($badge['badge_text']); ?></span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="product-layout">

                    <!-- Product Gallery -->
                    <div class="product-gallery">
                        <?php if (has_post_thumbnail()) : ?>
                        <figure class="product-main-image">
                            <?php
                            the_post_thumbnail('large', array(
                                'alt'   => get_the_title(),
                                'class' => 'product-featured-image',
                                'id'    => 'main-product-image',
                            ));
                            ?>
                        </figure>
                        <?php endif; ?>

                        <?php if ($gallery && is_array($gallery)) : ?>
                        <div class="product-thumbnails" role="list" aria-label="<?php esc_attr_e('Product image gallery', 'azit-industrial'); ?>">
                            <?php foreach ($gallery as $index => $image) : ?>
                            <button type="button"
                                    class="thumbnail-button"
                                    data-image-src="<?php echo esc_url($image['sizes']['large']); ?>"
                                    data-image-alt="<?php echo esc_attr($image['alt']); ?>"
                                    aria-label="<?php echo esc_attr(sprintf(__('View image %d', 'azit-industrial'), $index + 1)); ?>">
                                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>"
                                     alt=""
                                     role="presentation"
                                     width="100"
                                     height="100" />
                            </button>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Product Information -->
                    <div class="product-info">

                        <header class="product-header">
                            <h1 id="product-title" class="product-title"><?php the_title(); ?></h1>

                            <?php if ($sku) : ?>
                            <p class="product-sku">
                                <span class="label"><?php esc_html_e('SKU:', 'azit-industrial'); ?></span>
                                <?php echo esc_html($sku); ?>
                            </p>
                            <?php endif; ?>

                            <?php if ($price) : ?>
                            <p class="product-price">
                                <span class="sr-only"><?php esc_html_e('Price:', 'azit-industrial'); ?></span>
                                <?php echo esc_html($price); ?>
                            </p>
                            <?php endif; ?>

                            <?php if ($availability) : ?>
                            <p class="product-availability availability-<?php echo esc_attr($availability); ?>">
                                <?php echo esc_html($availability_labels[$availability] ?? $availability); ?>
                            </p>
                            <?php endif; ?>
                        </header>

                        <!-- Product Description (WordPress editor content) -->
                        <section class="product-description" aria-labelledby="description-heading">
                            <h2 id="description-heading" class="section-title">
                                <?php esc_html_e('Description', 'azit-industrial'); ?>
                            </h2>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </section>

                        <!-- Key Features (simple list) -->
                        <?php if ($features && is_array($features)) : ?>
                        <section class="product-features" aria-labelledby="features-heading">
                            <h2 id="features-heading" class="section-title">
                                <?php esc_html_e('Key Features', 'azit-industrial'); ?>
                            </h2>
                            <ul class="features-list">
                                <?php foreach ($features as $feature) : ?>
                                <li><?php echo esc_html($feature['feature']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </section>
                        <?php endif; ?>

                        <!-- CTA Buttons -->
                        <div class="product-actions">
                            <a href="#quote-form" class="btn btn-primary">
                                <?php esc_html_e('Request Quote', 'azit-industrial'); ?>
                            </a>
                            <?php if ($datasheet && !empty($datasheet['url'])) : ?>
                            <a href="<?php echo esc_url($datasheet['url']); ?>"
                               class="btn btn-secondary"
                               download
                               aria-label="<?php echo esc_attr(sprintf(__('Download %s datasheet (PDF)', 'azit-industrial'), get_the_title())); ?>">
                                <?php esc_html_e('Download Datasheet', 'azit-industrial'); ?>
                            </a>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>

                <!-- Feature Groups (categorized cards) -->
                <?php if ($feature_groups && is_array($feature_groups)) : ?>
                <section class="product-feature-groups" aria-labelledby="feature-groups-heading">
                    <h2 id="feature-groups-heading" class="section-title">
                        <?php esc_html_e('Complete Feature Set', 'azit-industrial'); ?>
                    </h2>

                    <div class="feature-groups-grid">
                        <?php foreach ($feature_groups as $group) : ?>
                        <div class="feature-group card">
                            <h3 class="card__title"><?php echo esc_html($group['group_title']); ?></h3>
                            <?php if (!empty($group['features']) && is_array($group['features'])) : ?>
                            <ul class="feature-group-list">
                                <?php foreach ($group['features'] as $item) : ?>
                                <li><?php echo esc_html($item['feature']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <?php endif; ?>

                <!-- Specification Tables (grouped) -->
                <?php if ($spec_tables && is_array($spec_tables)) : ?>
                <section id="specifications" class="product-specifications" aria-labelledby="specs-heading" tabindex="-1">
                    <h2 id="specs-heading" class="section-title">
                        <?php esc_html_e('Technical Specifications', 'azit-industrial'); ?>
                    </h2>

                    <div class="spec-tables-grid">
                        <?php foreach ($spec_tables as $table) : ?>
                        <div class="spec-table-block">
                            <h3 class="spec-table-title"><?php echo esc_html($table['table_title']); ?></h3>
                            <?php if (!empty($table['rows']) && is_array($table['rows'])) : ?>
                            <div class="table-responsive" tabindex="0" role="region" aria-label="<?php echo esc_attr($table['table_title']); ?>">
                                <table class="specifications-table">
                                    <caption class="sr-only"><?php echo esc_html($table['table_title']); ?></caption>
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php esc_html_e('Parameter', 'azit-industrial'); ?></th>
                                            <th scope="col"><?php esc_html_e('Value', 'azit-industrial'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($table['rows'] as $row) : ?>
                                        <tr>
                                            <th scope="row"><?php echo esc_html($row['spec_name']); ?></th>
                                            <td><?php echo esc_html($row['spec_value']); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <?php elseif ($specifications && is_array($specifications)) : ?>
                <!-- Fallback: Simple flat specification table -->
                <section id="specifications" class="product-specifications" aria-labelledby="specs-heading" tabindex="-1">
                    <h2 id="specs-heading" class="section-title">
                        <?php esc_html_e('Technical Specifications', 'azit-industrial'); ?>
                    </h2>

                    <div class="table-responsive" tabindex="0" role="region" aria-label="<?php esc_attr_e('Specifications table', 'azit-industrial'); ?>">
                        <table class="specifications-table">
                            <caption class="sr-only">
                                <?php echo esc_html(sprintf(__('Technical specifications for %s', 'azit-industrial'), get_the_title())); ?>
                            </caption>
                            <thead>
                                <tr>
                                    <th scope="col"><?php esc_html_e('Parameter', 'azit-industrial'); ?></th>
                                    <th scope="col"><?php esc_html_e('Value', 'azit-industrial'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($specifications as $spec) : ?>
                                <tr>
                                    <th scope="row"><?php echo esc_html($spec['spec_name']); ?></th>
                                    <td><?php echo esc_html($spec['spec_value']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <?php endif; ?>

                <!-- Downloads / Documentation -->
                <?php if ($downloads && is_array($downloads)) : ?>
                <section class="product-downloads" aria-labelledby="downloads-heading">
                    <h2 id="downloads-heading" class="section-title">
                        <?php esc_html_e('Documentation', 'azit-industrial'); ?>
                    </h2>

                    <ul class="downloads-list" role="list">
                        <?php foreach ($downloads as $download) : ?>
                        <?php if (!empty($download['file']['url'])) : ?>
                        <li class="download-item">
                            <a href="<?php echo esc_url($download['file']['url']); ?>"
                               download
                               aria-describedby="download-<?php echo esc_attr($download['file']['id']); ?>">
                                <?php echo esc_html($download['title']); ?>
                            </a>
                            <span id="download-<?php echo esc_attr($download['file']['id']); ?>" class="download-meta">
                                (<?php echo esc_html(strtoupper($download['file']['subtype'])); ?>,
                                <?php echo esc_html(size_format($download['file']['filesize'])); ?>)
                            </span>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </section>
                <?php endif; ?>

                <!-- Related Products -->
                <?php if ($related_products && is_array($related_products)) : ?>
                <section class="related-products" aria-labelledby="related-heading">
                    <h2 id="related-heading" class="section-title">
                        <?php esc_html_e('Related Products', 'azit-industrial'); ?>
                    </h2>

                    <div class="product-grid">
                        <?php foreach ($related_products as $related_post) : ?>
                            <?php
                            // Temporarily set the global post for the card helper
                            setup_postdata($GLOBALS['post'] = $related_post);
                            echo azit_get_product_card($related_post);
                            ?>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </section>
                <?php endif; ?>

                <!-- Quote Request Form (Contact Form 7) -->
                <section id="quote-form" class="product-quote-form" aria-labelledby="quote-heading" tabindex="-1">
                    <h2 id="quote-heading" class="section-title">
                        <?php echo esc_html(sprintf(__('Request a Quote for %s', 'azit-industrial'), get_the_title())); ?>
                    </h2>
                    <p class="quote-intro">
                        <?php esc_html_e('Fill out the form below and our team will get back to you with a customized quote.', 'azit-industrial'); ?>
                    </p>

                    <?php
                    if (shortcode_exists('contact-form-7')) :
                        $quote_form = get_posts(array(
                            'post_type'   => 'wpcf7_contact_form',
                            'post_status' => 'publish',
                            'name'        => 'product-quote-form',
                            'numberposts' => 1,
                        ));

                        if (!empty($quote_form)) :
                            echo do_shortcode('[contact-form-7 id="' . intval($quote_form[0]->ID) . '" title="Product Quote"]');
                        else :
                            $any_form = get_posts(array(
                                'post_type'   => 'wpcf7_contact_form',
                                'post_status' => 'publish',
                                'numberposts' => 1,
                            ));
                            if (!empty($any_form)) :
                                echo do_shortcode('[contact-form-7 id="' . intval($any_form[0]->ID) . '"]');
                            else :
                            ?>
                            <p><?php esc_html_e('Please create a Contact Form 7 form with slug "product-quote-form" or go to Tools > AZIT Setup to generate it automatically.', 'azit-industrial'); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <p>
                            <?php esc_html_e('Contact us for a quote:', 'azit-industrial'); ?>
                            <a href="<?php echo esc_url(home_url('/contact/?subject=products&product=' . urlencode(get_the_title()))); ?>" class="btn btn-primary">
                                <?php esc_html_e('Go to Contact Page', 'azit-industrial'); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </section>

            </article>

        <?php endwhile; ?>

    </div>

</main>

<?php
get_footer();
