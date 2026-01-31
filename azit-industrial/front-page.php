<?php
/**
 * The Front Page Template
 *
 * Displays the homepage matching the original static site structure.
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container hero__container">
                <div class="hero__content">
                    <h1 class="hero__title"><?php esc_html_e('Industrial Protocol Stacks Built for Safety-Critical Systems', 'azit-industrial'); ?></h1>
                    <p class="hero__subtitle">
                        <?php esc_html_e('30+ years of embedded expertise. No third-party code. Full control over your safety certification.', 'azit-industrial'); ?>
                    </p>
                    <div class="hero__actions">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--large"><?php esc_html_e('Request Quote', 'azit-industrial'); ?></a>
                        <a href="<?php echo esc_url(home_url('/products/communication-stacks/')); ?>" class="btn btn--outline btn--large"><?php esc_html_e('View Products', 'azit-industrial'); ?></a>
                    </div>
                </div>
                <div class="hero__image">
                    <img src="https://isit.fr/uploads/images/thematique/piles-de-communication_illustration-seule-1.png" alt="<?php esc_attr_e('Communication Stacks Architecture', 'azit-industrial'); ?>" class="hero-image">
                </div>
            </div>
        </section>

        <!-- Protocol Logos Bar -->
        <section class="protocol-logos">
            <div class="protocol-logos__item">CANopen</div>
            <div class="protocol-logos__item">PROFISAFE</div>
            <div class="protocol-logos__item">EtherNet/IP</div>
            <div class="protocol-logos__item">EtherCAT</div>
            <div class="protocol-logos__item">PROFINET</div>
            <div class="protocol-logos__item">FSoE</div>
            <div class="protocol-logos__item">J1939</div>
            <div class="protocol-logos__item">OPC-UA</div>
        </section>

        <!-- Key Advantages Section -->
        <section class="section">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title"><?php esc_html_e('Why Choose AZIT Stacks?', 'azit-industrial'); ?></h2>
                </div>

                <div class="advantages-grid">
                    <div class="advantage-card">
                        <div class="advantage-card__icon">&#10003;</div>
                        <h3 class="advantage-card__title"><?php esc_html_e('SIL3 Certified Safety Stacks', 'azit-industrial'); ?></h3>
                        <p class="advantage-card__description">
                            <?php esc_html_e('SIL3/PLe certified by Bureau Veritas with comprehensive documentation for your certification process. Proven safety protocols for critical applications.', 'azit-industrial'); ?>
                        </p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-card__icon">&#9881;</div>
                        <h3 class="advantage-card__title"><?php esc_html_e('Low Hardware Dependency', 'azit-industrial'); ?></h3>
                        <p class="advantage-card__description">
                            <?php esc_html_e('Works with any MCU, any RTOS. No vendor lock-in, no hardware dependencies. Complete freedom in your platform choices.', 'azit-industrial'); ?>
                        </p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-card__icon">&#128104;&#8205;&#128187;</div>
                        <h3 class="advantage-card__title"><?php esc_html_e('Expert Support & Services', 'azit-industrial'); ?></h3>
                        <p class="advantage-card__description">
                            <?php esc_html_e('Direct access to the engineers who built the stacks. 30+ years of embedded expertise with comprehensive integration support.', 'azit-industrial'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Overview Section -->
        <section class="section section--light">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title"><?php esc_html_e('Protocol Stacks for Every Industrial Need', 'azit-industrial'); ?></h2>
                    <p class="section__subtitle"><?php esc_html_e('Production-ready implementations for safety-critical and standard applications', 'azit-industrial'); ?></p>
                </div>

                <div class="tabs">
                    <ul class="tabs__list">
                        <li><button class="tabs__button active" data-tab="safety"><?php esc_html_e('Safety Protocols', 'azit-industrial'); ?></button></li>
                        <li><button class="tabs__button" data-tab="fieldbus"><?php esc_html_e('Fieldbus', 'azit-industrial'); ?></button></li>
                        <li><button class="tabs__button" data-tab="automotive"><?php esc_html_e('Automotive', 'azit-industrial'); ?></button></li>
                    </ul>
                </div>

                <div class="tabs__content active" id="safety-tab">
                    <div class="grid grid--3">
                        <div class="product-card card">
                            <div class="product-card__icon">&#9889;</div>
                            <span class="badge badge--success product-card__badge"><?php esc_html_e('SIL3 Certified', 'azit-industrial'); ?></span>
                            <h3 class="product-card__title"><?php esc_html_e('FSoE Slave Stack', 'azit-industrial'); ?></h3>
                            <p class="product-card__description">
                                <?php esc_html_e('IEC 61784-3 compliant Fail-Safe over EtherCAT implementation for safety slave devices.', 'azit-industrial'); ?>
                            </p>
                            <ul class="product-card__features">
                                <li><?php esc_html_e('SIL3 / PLe certified by Bureau Veritas', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('No third-party dependencies', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('White channel architecture', 'azit-industrial'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/products/fsoe-slave/')); ?>" class="product-card__cta"><?php esc_html_e('Learn More', 'azit-industrial'); ?> &rarr;</a>
                        </div>

                        <div class="product-card card">
                            <div class="product-card__icon">&#9889;</div>
                            <span class="badge badge--success product-card__badge"><?php esc_html_e('SIL3 Certified', 'azit-industrial'); ?></span>
                            <h3 class="product-card__title"><?php esc_html_e('FSoE Master Stack', 'azit-industrial'); ?></h3>
                            <p class="product-card__description">
                                <?php esc_html_e('Complete FSoE master implementation for safety controllers and PLCs.', 'azit-industrial'); ?>
                            </p>
                            <ul class="product-card__features">
                                <li><?php esc_html_e('SIL3 / PLe certified', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Multi-connection support', 'azit-industrial'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/products/fsoe-master/')); ?>" class="product-card__cta"><?php esc_html_e('Learn More', 'azit-industrial'); ?> &rarr;</a>
                        </div>

                        <div class="product-card card">
                            <div class="product-card__icon">&#128737;</div>
                            <span class="badge badge--success product-card__badge"><?php esc_html_e('SIL3 Certified', 'azit-industrial'); ?></span>
                            <h3 class="product-card__title"><?php esc_html_e('PROFISAFE Slave', 'azit-industrial'); ?></h3>
                            <p class="product-card__description">
                                <?php esc_html_e('IEC 61784-3 compliant PROFIsafe slave implementation for PROFINET safety devices.', 'azit-industrial'); ?>
                            </p>
                            <ul class="product-card__features">
                                <li><?php esc_html_e('SIL3 / PLe certified by Bureau Veritas', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('PROFINET integration ready', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Low hardware dependency', 'azit-industrial'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/products/profisafe-slave/')); ?>" class="product-card__cta"><?php esc_html_e('Learn More', 'azit-industrial'); ?> &rarr;</a>
                        </div>

                        <div class="product-card card">
                            <div class="product-card__icon">&#128737;</div>
                            <span class="badge badge--success product-card__badge"><?php esc_html_e('SIL3 Certified', 'azit-industrial'); ?></span>
                            <h3 class="product-card__title"><?php esc_html_e('PROFISAFE Master', 'azit-industrial'); ?></h3>
                            <p class="product-card__description">
                                <?php esc_html_e('Complete PROFIsafe master for safety controllers and PLCs.', 'azit-industrial'); ?>
                            </p>
                            <ul class="product-card__features">
                                <li><?php esc_html_e('SIL3 / PLe certified', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Multi-device support', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Full diagnostics included', 'azit-industrial'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/products/profisafe-master/')); ?>" class="product-card__cta"><?php esc_html_e('Learn More', 'azit-industrial'); ?> &rarr;</a>
                        </div>

                        <div class="product-card card">
                            <div class="product-card__icon">&#128274;</div>
                            <span class="badge badge--success product-card__badge"><?php esc_html_e('SIL3 Certified', 'azit-industrial'); ?></span>
                            <h3 class="product-card__title"><?php esc_html_e('CANopen Safety', 'azit-industrial'); ?></h3>
                            <p class="product-card__description">
                                <?php esc_html_e('CiA 304 compliant safety protocol for CANopen networks.', 'azit-industrial'); ?>
                            </p>
                            <ul class="product-card__features">
                                <li><?php esc_html_e('SIL3 / PLe certification', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('SRDO implementation', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Low hardware dependency', 'azit-industrial'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/products/canopen-safety-slave/')); ?>" class="product-card__cta"><?php esc_html_e('Learn More', 'azit-industrial'); ?> &rarr;</a>
                        </div>
                    </div>
                </div>

                <div class="tabs__content" id="fieldbus-tab">
                    <div class="grid grid--3">
                        <div class="product-card card">
                            <div class="product-card__icon">&#128268;</div>
                            <h3 class="product-card__title"><?php esc_html_e('CANopen Slave', 'azit-industrial'); ?></h3>
                            <p class="product-card__description">
                                <?php esc_html_e('Full-featured CANopen slave stack with CiA 301/302 compliance.', 'azit-industrial'); ?>
                            </p>
                            <ul class="product-card__features">
                                <li><?php esc_html_e('PDO, SDO, EMCY, SYNC', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Object dictionary tools', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('LSS support', 'azit-industrial'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/products/canopen-slave/')); ?>" class="product-card__cta"><?php esc_html_e('Learn More', 'azit-industrial'); ?> &rarr;</a>
                        </div>

                        <div class="product-card card">
                            <div class="product-card__icon">&#128268;</div>
                            <h3 class="product-card__title"><?php esc_html_e('CANopen Master', 'azit-industrial'); ?></h3>
                            <p class="product-card__description">
                                <?php esc_html_e('Complete CANopen master for controllers and gateways.', 'azit-industrial'); ?>
                            </p>
                            <ul class="product-card__features">
                                <li><?php esc_html_e('Network management', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Multi-slave support', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Configuration tools', 'azit-industrial'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/products/canopen-master/')); ?>" class="product-card__cta"><?php esc_html_e('Learn More', 'azit-industrial'); ?> &rarr;</a>
                        </div>
                    </div>
                </div>

                <div class="tabs__content" id="automotive-tab">
                    <div class="grid grid--3">
                        <div class="product-card card">
                            <div class="product-card__icon">&#128663;</div>
                            <span class="badge badge--warning product-card__badge"><?php esc_html_e('SIL2', 'azit-industrial'); ?></span>
                            <h3 class="product-card__title"><?php esc_html_e('J1939 / J1939 Safety', 'azit-industrial'); ?></h3>
                            <p class="product-card__description">
                                <?php esc_html_e('SAE J1939 implementation with optional safety extension.', 'azit-industrial'); ?>
                            </p>
                            <ul class="product-card__features">
                                <li><?php esc_html_e('SAE J1939 compliant', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Transport protocol support', 'azit-industrial'); ?></li>
                                <li><?php esc_html_e('Safety extension available', 'azit-industrial'); ?></li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/products/j1939/')); ?>" class="product-card__cta"><?php esc_html_e('Learn More', 'azit-industrial'); ?> &rarr;</a>
                        </div>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 3rem;">
                    <a href="<?php echo esc_url(home_url('/products/communication-stacks/')); ?>" class="btn btn--outline"><?php esc_html_e('View All Products', 'azit-industrial'); ?> &rarr;</a>
                </div>
            </div>
        </section>

        <!-- Code Example Section -->
        <section class="section">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title"><?php esc_html_e('Simple Integration, Powerful Results', 'azit-industrial'); ?></h2>
                    <p class="section__subtitle"><?php esc_html_e('Clean APIs designed for embedded developers', 'azit-industrial'); ?></p>
                </div>

                <div class="code-example-section">
                    <div class="code-block">
                        <div class="code-block__header">
                            <span class="code-block__language">C</span>
                            <button class="code-block__copy"><?php esc_html_e('Copy', 'azit-industrial'); ?></button>
                        </div>
                        <pre><code>/* FSoE Slave initialization */
#include "fsoe_slave.h"

FSOE_SLAVE_CONFIG config = {
    .connection_id = 0x0001,
    .watchdog_time = 100,  /* ms */
    .safe_inputs = 8,
    .safe_outputs = 8
};

fsoe_slave_init(&amp;config);
fsoe_slave_start();</code></pre>
                    </div>

                    <ul class="code-example__explanation">
                        <li><?php esc_html_e('Minimal API footprint for fast integration', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Well-documented interfaces with examples', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Example projects for common platforms', 'azit-industrial'); ?></li>
                        <li><?php esc_html_e('Comprehensive testing suites included', 'azit-industrial'); ?></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Architecture Diagram Section -->
        <section class="section section--light">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title"><?php esc_html_e('Full Software Approach with White Channel Architecture', 'azit-industrial'); ?></h2>
                </div>

                <div class="architecture-diagram">
                    <div class="architecture-diagram__placeholder">
                        [<?php esc_html_e('Architecture Diagram Placeholder', 'azit-industrial'); ?>]
                        <br><br>
                        <?php esc_html_e('Application Layer', 'azit-industrial'); ?> &rarr; <?php esc_html_e('AZIT Protocol Stack (White Channel)', 'azit-industrial'); ?> &rarr;
                        <br><?php esc_html_e('Black Channel Stack', 'azit-industrial'); ?> &rarr; <?php esc_html_e('HAL/BSP', 'azit-industrial'); ?> &rarr; <?php esc_html_e('MCU/RTOS', 'azit-industrial'); ?>
                    </div>
                    <p class="architecture-diagram__caption">
                        <?php esc_html_e('Our white channel architecture ensures complete control over safety certification without hardware lock-in', 'azit-industrial'); ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- Elite Partners Section -->
        <section class="elite-partners">
            <div class="container">
                <div class="elite-partners-container">
                    <h2 class="section__title"><?php esc_html_e('Elite Partners', 'azit-industrial'); ?></h2>
                    <p class="section-subtitle">
                        <?php esc_html_e('We collaborate with industry-leading technology partners to deliver comprehensive solutions', 'azit-industrial'); ?>
                    </p>

                    <div class="elite-partners-grid">
                        <div class="elite-partner-card">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/partners/acontis-logo.png" alt="Acontis Technologies" class="elite-partner-logo">
                            <h3>Acontis Technologies</h3>
                            <p class="elite-partner-description"><?php esc_html_e('EtherCAT solutions and real-time technologies', 'azit-industrial'); ?></p>
                        </div>

                        <div class="elite-partner-card">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/partners/cia-logo.png" alt="CAN in Automation" class="elite-partner-logo">
                            <h3>CiA</h3>
                            <p class="elite-partner-description"><?php esc_html_e('CAN in Automation - CAN-based protocols', 'azit-industrial'); ?></p>
                        </div>

                        <div class="elite-partner-card">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/partners/etg-logo.png" alt="EtherCAT Technology Group" class="elite-partner-logo">
                            <h3>EtherCAT Technology Group</h3>
                            <p class="elite-partner-description"><?php esc_html_e('EtherCAT standard organization', 'azit-industrial'); ?></p>
                        </div>

                        <div class="elite-partner-card">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/partners/nxp-logo.png" alt="NXP Semiconductors" class="elite-partner-logo">
                            <h3>NXP</h3>
                            <p class="elite-partner-description"><?php esc_html_e('Semiconductor solutions for embedded systems', 'azit-industrial'); ?></p>
                        </div>

                        <div class="elite-partner-card">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/partners/qnx-logo.png" alt="QNX" class="elite-partner-logo">
                            <h3>QNX</h3>
                            <p class="elite-partner-description"><?php esc_html_e('Real-time operating system', 'azit-industrial'); ?></p>
                        </div>

                        <div class="elite-partner-card">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/partners/st-logo.png" alt="STMicroelectronics" class="elite-partner-logo">
                            <h3>STMicroelectronics</h3>
                            <p class="elite-partner-description"><?php esc_html_e('Authorized Partner - Microcontroller solutions', 'azit-industrial'); ?></p>
                        </div>

                        <div class="elite-partner-card">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/partners/sysgo-logo.png" alt="SYSGO" class="elite-partner-logo">
                            <h3>SYSGO</h3>
                            <p class="elite-partner-description"><?php esc_html_e('Real-time and safety OS solutions', 'azit-industrial'); ?></p>
                        </div>

                        <div class="elite-partner-card">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/partners/ti-logo.png" alt="Texas Instruments" class="elite-partner-logo">
                            <h3>Texas Instruments</h3>
                            <p class="elite-partner-description"><?php esc_html_e('Semiconductor and embedded processing', 'azit-industrial'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trusted By Section -->
        <section class="section">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title"><?php esc_html_e('Trusted By', 'azit-industrial'); ?></h2>
                </div>

                <div class="partner-logos">
                    <img src="https://isit.fr/photos/ecoles-partenaires-clients/2076/wattalps-logo.png" alt="WattAlps" class="partner-logo">
                    <img src="https://isit.fr/photos/2023/2139/whaller_logo_horizontal-couleur.png" alt="Whaller" class="partner-logo">
                    <img src="https://isit.fr/photos/ecoles-partenaires-clients/2076/diehl_metering.png" alt="Diehl Metering" class="partner-logo">
                    <img src="https://isit.fr/photos/ecoles-partenaires-clients/2076/coval.png" alt="Coval" class="partner-logo">
                </div>
            </div>
        </section>

        <!-- Blog/News Preview -->
        <section class="section section--light">
            <div class="container">
                <div class="section__header">
                    <h2 class="section__title"><?php esc_html_e('Latest from AZIT', 'azit-industrial'); ?></h2>
                </div>

                <div class="blog-preview-grid">
                    <?php
                    $news_query = new WP_Query(array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ));

                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) :
                            $news_query->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="blog-card">
                        <div class="blog-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                [<?php esc_html_e('Blog Image Placeholder', 'azit-industrial'); ?>]
                            <?php endif; ?>
                        </div>
                        <div class="blog-card__content">
                            <div class="blog-card__meta">
                                <span><?php echo esc_html(get_the_date()); ?></span>
                                <span>&bull;</span>
                                <span><?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                ?></span>
                            </div>
                            <h3 class="blog-card__title"><?php the_title(); ?></h3>
                            <p class="blog-card__excerpt">
                                <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
                            </p>
                            <span class="blog-card__read-more"><?php esc_html_e('Read More', 'azit-industrial'); ?> &rarr;</span>
                        </div>
                    </a>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                    <!-- Placeholder blog cards when no posts -->
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="blog-card">
                        <div class="blog-card__image">[<?php esc_html_e('Blog Image Placeholder', 'azit-industrial'); ?>]</div>
                        <div class="blog-card__content">
                            <div class="blog-card__meta">
                                <span><?php esc_html_e('January 15, 2025', 'azit-industrial'); ?></span>
                                <span>&bull;</span>
                                <span><?php esc_html_e('Compliance', 'azit-industrial'); ?></span>
                            </div>
                            <h3 class="blog-card__title"><?php esc_html_e('Understanding the EU Cyber Resilience Act', 'azit-industrial'); ?></h3>
                            <p class="blog-card__excerpt">
                                <?php esc_html_e('What the new EU CRA means for industrial protocol stack vendors and integrators.', 'azit-industrial'); ?>
                            </p>
                            <span class="blog-card__read-more"><?php esc_html_e('Read More', 'azit-industrial'); ?> &rarr;</span>
                        </div>
                    </a>

                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="blog-card">
                        <div class="blog-card__image">[<?php esc_html_e('Blog Image Placeholder', 'azit-industrial'); ?>]</div>
                        <div class="blog-card__content">
                            <div class="blog-card__meta">
                                <span><?php esc_html_e('January 10, 2025', 'azit-industrial'); ?></span>
                                <span>&bull;</span>
                                <span><?php esc_html_e('Technical', 'azit-industrial'); ?></span>
                            </div>
                            <h3 class="blog-card__title"><?php esc_html_e('FSoE Stack Update v3.2 Released', 'azit-industrial'); ?></h3>
                            <p class="blog-card__excerpt">
                                <?php esc_html_e('New features and performance improvements in our latest FSoE stack release.', 'azit-industrial'); ?>
                            </p>
                            <span class="blog-card__read-more"><?php esc_html_e('Read More', 'azit-industrial'); ?> &rarr;</span>
                        </div>
                    </a>

                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="blog-card">
                        <div class="blog-card__image">[<?php esc_html_e('Blog Image Placeholder', 'azit-industrial'); ?>]</div>
                        <div class="blog-card__content">
                            <div class="blog-card__meta">
                                <span><?php esc_html_e('January 5, 2025', 'azit-industrial'); ?></span>
                                <span>&bull;</span>
                                <span><?php esc_html_e('Training', 'azit-industrial'); ?></span>
                            </div>
                            <h3 class="blog-card__title"><?php esc_html_e('Q1 2025 Training Schedule', 'azit-industrial'); ?></h3>
                            <p class="blog-card__excerpt">
                                <?php esc_html_e('Join our hands-on workshops for CANopen Safety and FSoE development.', 'azit-industrial'); ?>
                            </p>
                            <span class="blog-card__read-more"><?php esc_html_e('Read More', 'azit-industrial'); ?> &rarr;</span>
                        </div>
                    </a>
                    <?php endif; ?>
                </div>

                <div style="text-align: center; margin-top: 2rem;">
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn--ghost"><?php esc_html_e('View All Articles', 'azit-industrial'); ?> &rarr;</a>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="section">
            <div class="container">
                <div class="cta-section">
                    <h2><?php esc_html_e('Ready to Start Your Project?', 'azit-industrial'); ?></h2>
                    <p><?php esc_html_e('Get a customized quote for your industrial protocol integration needs', 'azit-industrial'); ?></p>
                    <div>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--secondary btn--large"><?php esc_html_e('Request Quote', 'azit-industrial'); ?></a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--outline btn--large" style="background-color: rgba(255,255,255,0.1); border-color: white; color: white;"><?php esc_html_e('Contact Sales', 'azit-industrial'); ?></a>
                    </div>
                </div>
            </div>
        </section>

<?php
get_footer();
