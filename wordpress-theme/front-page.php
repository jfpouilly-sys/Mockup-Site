<?php
/**
 * The Front Page Template
 *
 * Displays the homepage with hero section, expertise overview,
 * products preview, and CTA sections.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1">

    <!-- Hero Section -->
    <section class="hero-section" aria-labelledby="hero-heading">
        <div class="container">
            <div class="hero-content">
                <h1 id="hero-heading" class="hero-title">
                    <?php
                    if (function_exists('get_field') && get_field('hero_title')) {
                        echo esc_html(get_field('hero_title'));
                    } else {
                        esc_html_e('Industrial Communication Solutions', 'azit-industrial');
                    }
                    ?>
                </h1>

                <p class="hero-subtitle">
                    <?php
                    if (function_exists('get_field') && get_field('hero_subtitle')) {
                        echo esc_html(get_field('hero_subtitle'));
                    } else {
                        esc_html_e('Expert services in safety compliance, protocol development, and industrial network solutions.', 'azit-industrial');
                    }
                    ?>
                </p>

                <div class="hero-cta">
                    <a href="<?php echo esc_url(get_post_type_archive_link('expertise')); ?>" class="btn btn-primary">
                        <?php esc_html_e('Explore Our Expertise', 'azit-industrial'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary">
                        <?php esc_html_e('Contact Us', 'azit-industrial'); ?>
                    </a>
                </div>
            </div>

            <?php
            $hero_image = null;
            if (function_exists('get_field')) {
                $hero_image = get_field('hero_image');
            }
            if ($hero_image) :
            ?>
            <div class="hero-image">
                <img src="<?php echo esc_url($hero_image['url']); ?>"
                     alt="<?php echo esc_attr($hero_image['alt'] ?: ''); ?>"
                     width="<?php echo esc_attr($hero_image['width']); ?>"
                     height="<?php echo esc_attr($hero_image['height']); ?>" />
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Expertise Section -->
    <section class="home-expertise" aria-labelledby="expertise-heading">
        <div class="container">
            <header class="section-header">
                <h2 id="expertise-heading" class="section-title">
                    <?php esc_html_e('Our Expertise', 'azit-industrial'); ?>
                </h2>
                <p class="section-description">
                    <?php esc_html_e('Comprehensive solutions for industrial communication challenges.', 'azit-industrial'); ?>
                </p>
            </header>

            <?php
            $expertise_query = new WP_Query(array(
                'post_type'      => 'expertise',
                'posts_per_page' => 4,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));

            if ($expertise_query->have_posts()) :
            ?>
            <div class="expertise-grid" role="list">
                <?php
                while ($expertise_query->have_posts()) :
                    $expertise_query->the_post();
                ?>
                <div role="listitem">
                    <?php echo azit_get_expertise_card(); ?>
                </div>
                <?php endwhile; ?>
            </div>
            <?php
            wp_reset_postdata();
            endif;
            ?>

            <div class="section-footer">
                <a href="<?php echo esc_url(get_post_type_archive_link('expertise')); ?>" class="btn btn-outline">
                    <?php esc_html_e('View All Expertise', 'azit-industrial'); ?>
                    <span aria-hidden="true"> &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="home-products" aria-labelledby="products-heading">
        <div class="container">
            <header class="section-header">
                <h2 id="products-heading" class="section-title">
                    <?php esc_html_e('Our Products', 'azit-industrial'); ?>
                </h2>
                <p class="section-description">
                    <?php esc_html_e('Hardware and software solutions for industrial automation.', 'azit-industrial'); ?>
                </p>
            </header>

            <?php
            $products_query = new WP_Query(array(
                'post_type'      => 'product',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($products_query->have_posts()) :
            ?>
            <div class="products-grid" role="list">
                <?php
                while ($products_query->have_posts()) :
                    $products_query->the_post();
                ?>
                <div role="listitem">
                    <?php echo azit_get_product_card(); ?>
                </div>
                <?php endwhile; ?>
            </div>
            <?php
            wp_reset_postdata();
            endif;
            ?>

            <div class="section-footer">
                <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="btn btn-outline">
                    <?php esc_html_e('View All Products', 'azit-industrial'); ?>
                    <span aria-hidden="true"> &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="home-why-us" aria-labelledby="why-heading">
        <div class="container">
            <header class="section-header">
                <h2 id="why-heading" class="section-title">
                    <?php esc_html_e('Why Choose AZIT?', 'azit-industrial'); ?>
                </h2>
            </header>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <span class="icon-expertise"></span>
                    </div>
                    <h3 class="feature-title"><?php esc_html_e('20+ Years Experience', 'azit-industrial'); ?></h3>
                    <p class="feature-description">
                        <?php esc_html_e('Two decades of expertise in industrial communication systems.', 'azit-industrial'); ?>
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <span class="icon-certified"></span>
                    </div>
                    <h3 class="feature-title"><?php esc_html_e('Certified Engineers', 'azit-industrial'); ?></h3>
                    <p class="feature-description">
                        <?php esc_html_e('Our team holds certifications in IEC 61508, ISO 26262, and more.', 'azit-industrial'); ?>
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <span class="icon-global"></span>
                    </div>
                    <h3 class="feature-title"><?php esc_html_e('Global Support', 'azit-industrial'); ?></h3>
                    <p class="feature-description">
                        <?php esc_html_e('Supporting clients across Europe, Asia, and North America.', 'azit-industrial'); ?>
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <span class="icon-quality"></span>
                    </div>
                    <h3 class="feature-title"><?php esc_html_e('ISO Certified', 'azit-industrial'); ?></h3>
                    <p class="feature-description">
                        <?php esc_html_e('Quality management systems certified to ISO 9001 standards.', 'azit-industrial'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Training Section -->
    <section class="home-training" aria-labelledby="training-heading">
        <div class="container">
            <header class="section-header">
                <h2 id="training-heading" class="section-title">
                    <?php esc_html_e('Training Programs', 'azit-industrial'); ?>
                </h2>
                <p class="section-description">
                    <?php esc_html_e('Enhance your team\'s skills with our expert-led training courses.', 'azit-industrial'); ?>
                </p>
            </header>

            <?php
            $training_query = new WP_Query(array(
                'post_type'      => 'training',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($training_query->have_posts()) :
            ?>
            <div class="training-grid" role="list">
                <?php
                while ($training_query->have_posts()) :
                    $training_query->the_post();
                ?>
                <div role="listitem">
                    <?php echo azit_get_training_card(); ?>
                </div>
                <?php endwhile; ?>
            </div>
            <?php
            wp_reset_postdata();
            endif;
            ?>

            <div class="section-footer">
                <a href="<?php echo esc_url(get_post_type_archive_link('training')); ?>" class="btn btn-outline">
                    <?php esc_html_e('View All Training', 'azit-industrial'); ?>
                    <span aria-hidden="true"> &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="home-cta" aria-labelledby="cta-heading">
        <div class="container">
            <div class="cta-content">
                <h2 id="cta-heading" class="cta-title">
                    <?php esc_html_e('Ready to start your project?', 'azit-industrial'); ?>
                </h2>
                <p class="cta-description">
                    <?php esc_html_e('Contact us today to discuss your industrial communication needs.', 'azit-industrial'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-large">
                    <?php esc_html_e('Get in Touch', 'azit-industrial'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest News (if blog posts exist) -->
    <?php
    $news_query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    if ($news_query->have_posts()) :
    ?>
    <section class="home-news" aria-labelledby="news-heading">
        <div class="container">
            <header class="section-header">
                <h2 id="news-heading" class="section-title">
                    <?php esc_html_e('Latest News', 'azit-industrial'); ?>
                </h2>
            </header>

            <div class="news-grid" role="list">
                <?php
                while ($news_query->have_posts()) :
                    $news_query->the_post();
                ?>
                <article class="news-card" role="listitem">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="news-image">
                        <?php the_post_thumbnail('azit-card', array('alt' => get_the_title())); ?>
                    </div>
                    <?php endif; ?>

                    <div class="news-content">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" class="news-date">
                            <?php echo esc_html(get_the_date()); ?>
                        </time>

                        <h3 class="news-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <p class="news-excerpt">
                            <?php echo esc_html(azit_excerpt(15, '...')); ?>
                        </p>

                        <a href="<?php the_permalink(); ?>" class="news-link">
                            <?php esc_html_e('Read more', 'azit-industrial'); ?>
                            <span class="sr-only"><?php echo esc_html(sprintf(__('about %s', 'azit-industrial'), get_the_title())); ?></span>
                        </a>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>

            <div class="section-footer">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline">
                    <?php esc_html_e('View All News', 'azit-industrial'); ?>
                    <span aria-hidden="true"> &rarr;</span>
                </a>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
    endif;
    ?>

</main>

<?php
get_footer();
