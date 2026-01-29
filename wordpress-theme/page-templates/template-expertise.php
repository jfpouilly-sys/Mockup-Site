<?php
/**
 * Template Name: Expertise Overview
 * Template Post Type: page
 *
 * Custom template for the Expertise overview page.
 * Displays all expertise areas in a grid layout.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="page-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('expertise-overview-page'); ?>>

                <header class="entry-header">
                    <h1 id="page-title" class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                <figure class="entry-hero">
                    <?php
                    the_post_thumbnail('azit-hero', array(
                        'alt' => get_the_title(),
                        'class' => 'hero-image',
                    ));
                    ?>
                </figure>
                <?php endif; ?>

                <!-- Page Introduction -->
                <div class="entry-content expertise-intro">
                    <?php the_content(); ?>
                </div>

                <!-- Expertise Areas Grid -->
                <section class="expertise-areas" aria-labelledby="areas-heading">
                    <h2 id="areas-heading" class="section-title">
                        <?php esc_html_e('Our Areas of Expertise', 'azit-industrial'); ?>
                    </h2>

                    <?php
                    $expertise_query = new WP_Query(array(
                        'post_type'      => 'expertise',
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));

                    if ($expertise_query->have_posts()) :
                    ?>
                    <div class="expertise-grid" role="list" aria-label="<?php esc_attr_e('List of expertise areas', 'azit-industrial'); ?>">
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
                    else :
                    ?>
                    <p><?php esc_html_e('Expertise areas coming soon.', 'azit-industrial'); ?></p>
                    <?php endif; ?>
                </section>

                <!-- Why Choose Us Section -->
                <section class="why-choose-us" aria-labelledby="why-heading">
                    <h2 id="why-heading" class="section-title">
                        <?php esc_html_e('Why Choose AZIT?', 'azit-industrial'); ?>
                    </h2>

                    <div class="features-grid">
                        <div class="feature-item">
                            <h3><?php esc_html_e('Industry Experience', 'azit-industrial'); ?></h3>
                            <p><?php esc_html_e('Over 20 years of experience in industrial communication solutions.', 'azit-industrial'); ?></p>
                        </div>

                        <div class="feature-item">
                            <h3><?php esc_html_e('Expert Team', 'azit-industrial'); ?></h3>
                            <p><?php esc_html_e('Our engineers hold certifications in safety standards and protocol development.', 'azit-industrial'); ?></p>
                        </div>

                        <div class="feature-item">
                            <h3><?php esc_html_e('Quality Assurance', 'azit-industrial'); ?></h3>
                            <p><?php esc_html_e('ISO certified processes ensuring the highest quality deliverables.', 'azit-industrial'); ?></p>
                        </div>

                        <div class="feature-item">
                            <h3><?php esc_html_e('Global Reach', 'azit-industrial'); ?></h3>
                            <p><?php esc_html_e('Supporting clients worldwide with local expertise and support.', 'azit-industrial'); ?></p>
                        </div>
                    </div>
                </section>

                <!-- Industries Section -->
                <section class="industries-served" aria-labelledby="industries-heading">
                    <h2 id="industries-heading" class="section-title">
                        <?php esc_html_e('Industries We Serve', 'azit-industrial'); ?>
                    </h2>

                    <ul class="industries-list" role="list">
                        <li><?php esc_html_e('Automotive', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Aerospace', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Rail Transportation', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Energy & Utilities', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Manufacturing', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Process Industries', 'azit-industrial'); ?></li>
                    </ul>
                </section>

                <!-- CTA Section -->
                <section class="page-cta" aria-labelledby="cta-heading">
                    <h2 id="cta-heading" class="cta-title">
                        <?php esc_html_e('Ready to discuss your project?', 'azit-industrial'); ?>
                    </h2>
                    <p class="cta-text">
                        <?php esc_html_e('Our team of experts is ready to help you find the right solution for your industrial communication needs.', 'azit-industrial'); ?>
                    </p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                            <?php esc_html_e('Contact Us', 'azit-industrial'); ?>
                        </a>
                        <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="btn btn-secondary">
                            <?php esc_html_e('View Products', 'azit-industrial'); ?>
                        </a>
                    </div>
                </section>

            </article>

        <?php endwhile; ?>

    </div>

</main>

<?php
get_footer();
