# WordPress Migration Plan - AZIT Website

## Executive Summary

Migration of the AZIT static HTML website (62 pages, bilingual EN/FR) to WordPress with custom theme development, preserving RGAA 4.1.2 accessibility compliance.

**Estimated Timeline:** 4-6 weeks
**Complexity:** Medium-High
**Pages to Migrate:** 62 (31 EN + 31 FR)

---

## Phase 1: Environment Setup (Week 1)

### 1.1 Local Development Environment (Windows 11)

**Recommended: Local by Flywheel**

1. Download from https://localwp.com/
2. Install and create new site:
   - Site name: `azit-local`
   - Environment: Custom
   - PHP: 8.2+
   - Web Server: nginx
   - Database: MySQL 8.0+
3. WordPress will be installed at `C:\Users\[username]\Local Sites\azit-local\`

**Alternative: Docker Setup**

```yaml
# docker-compose.yml
version: '3.8'
services:
  wordpress:
    image: wordpress:latest
    ports:
      - "8080:80"
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: azit
      WORDPRESS_DB_PASSWORD: azit_password
      WORDPRESS_DB_NAME: azit_db
    volumes:
      - ./wp-content:/var/www/html/wp-content
  db:
    image: mysql:8.0
    environment:
      MYSQL_DATABASE: azit_db
      MYSQL_USER: azit
      MYSQL_PASSWORD: azit_password
      MYSQL_ROOT_PASSWORD: root_password
    volumes:
      - db_data:/var/lib/mysql
  phpmyadmin:
    image: phpmyadmin
    ports:
      - "8081:80"
    environment:
      PMA_HOST: db
volumes:
  db_data:
```

### 1.2 Required Plugins

| Plugin | Purpose | Priority |
|--------|---------|----------|
| **Polylang** | Multilingual (EN/FR) | Required |
| **Advanced Custom Fields Pro** | Custom fields for products | Required |
| **Contact Form 7** or **WPForms** | Contact/Quote forms | Required |
| **Yoast SEO** | SEO management | Required |
| **WP Migrate DB Pro** | Database migration | Recommended |
| **Max Mega Menu** | Complex navigation | Recommended |
| **Safe SVG** | SVG upload support | Recommended |
| **Regenerate Thumbnails** | Image management | Recommended |

### 1.3 Theme Structure Setup

```
wp-content/themes/azit-theme/
├── style.css                 # Theme header + imported styles
├── functions.php             # Theme setup, CPT registration
├── index.php                 # Fallback template
├── front-page.php            # Homepage template
├── header.php                # Global header
├── footer.php                # Global footer
├── sidebar.php               # Sidebar (if needed)
├── 404.php                   # Error page
├── search.php                # Search results
├── screenshot.png            # Theme preview
│
├── /template-parts/          # Reusable components
│   ├── header/
│   │   ├── top-menu.php
│   │   ├── main-nav.php
│   │   └── mobile-menu.php
│   ├── footer/
│   │   ├── footer-grid.php
│   │   └── footer-bottom.php
│   ├── content/
│   │   ├── hero-section.php
│   │   ├── cta-section.php
│   │   └── partners-section.php
│   └── components/
│       ├── breadcrumb.php
│       ├── product-card.php
│       ├── expertise-card.php
│       └── blog-card.php
│
├── /page-templates/          # Custom page templates
│   ├── template-contact.php
│   ├── template-blog.php
│   ├── template-training.php
│   ├── template-company.php
│   ├── template-sitemap.php
│   └── template-accessibility.php
│
├── /single/                  # Single post type templates
│   ├── single-product.php
│   └── single-expertise.php
│
├── /archive/                 # Archive templates
│   ├── archive-product.php
│   └── archive-expertise.php
│
├── /assets/
│   ├── /css/
│   │   ├── variables.css     # Migrate from current
│   │   ├── base.css
│   │   ├── components.css
│   │   ├── layout.css
│   │   ├── pages.css
│   │   └── a11y-utils.css
│   ├── /js/
│   │   ├── main.js
│   │   ├── navigation.js
│   │   └── accessibility.js
│   ├── /images/
│   └── /fonts/
│
├── /inc/                     # PHP includes
│   ├── custom-post-types.php
│   ├── taxonomies.php
│   ├── acf-fields.php
│   ├── enqueue.php
│   ├── widgets.php
│   └── accessibility.php
│
└── /languages/               # Translation files
    ├── azit-theme-fr_FR.po
    └── azit-theme-fr_FR.mo
```

---

## Phase 2: Custom Post Types & Taxonomies (Week 1-2)

### 2.1 Custom Post Type: Products

```php
// inc/custom-post-types.php

function azit_register_product_cpt() {
    $labels = array(
        'name'               => _x('Products', 'post type general name', 'azit-theme'),
        'singular_name'      => _x('Product', 'post type singular name', 'azit-theme'),
        'menu_name'          => _x('Products', 'admin menu', 'azit-theme'),
        'add_new'            => _x('Add New', 'product', 'azit-theme'),
        'add_new_item'       => __('Add New Product', 'azit-theme'),
        'edit_item'          => __('Edit Product', 'azit-theme'),
        'view_item'          => __('View Product', 'azit-theme'),
        'all_items'          => __('All Products', 'azit-theme'),
        'search_items'       => __('Search Products', 'azit-theme'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,  // Gutenberg support
        'query_var'          => true,
        'rewrite'            => array('slug' => 'products'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-products',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('product', $args);
}
add_action('init', 'azit_register_product_cpt');
```

### 2.2 Custom Post Type: Expertise/Services

```php
function azit_register_expertise_cpt() {
    $labels = array(
        'name'               => _x('Expertise', 'post type general name', 'azit-theme'),
        'singular_name'      => _x('Expertise', 'post type singular name', 'azit-theme'),
        'menu_name'          => _x('Expertise', 'admin menu', 'azit-theme'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'rewrite'            => array('slug' => 'services/expertise'),
        'menu_icon'          => 'dashicons-lightbulb',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('expertise', $args);
}
add_action('init', 'azit_register_expertise_cpt');
```

### 2.3 Taxonomies

```php
// inc/taxonomies.php

// Product Categories
function azit_register_product_category() {
    register_taxonomy('product_category', 'product', array(
        'labels' => array(
            'name'          => __('Product Categories', 'azit-theme'),
            'singular_name' => __('Product Category', 'azit-theme'),
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'product-category'),
    ));
}
add_action('init', 'azit_register_product_category');

// Protocol Types (for filtering)
function azit_register_protocol_type() {
    register_taxonomy('protocol_type', 'product', array(
        'labels' => array(
            'name'          => __('Protocol Types', 'azit-theme'),
            'singular_name' => __('Protocol Type', 'azit-theme'),
        ),
        'hierarchical'      => false,
        'show_in_rest'      => true,
    ));
}
add_action('init', 'azit_register_protocol_type');
```

### 2.4 ACF Field Groups

**Product Fields:**
```
Field Group: Product Details
├── Tab: Overview
│   ├── product_subtitle (Text)
│   ├── product_badges (Repeater)
│   │   ├── badge_text
│   │   └── badge_type (select: primary/secondary/success)
│   ├── product_description (Textarea)
│   └── is_coming_soon (True/False)
│
├── Tab: Technical Specifications
│   ├── specifications (Repeater)
│   │   ├── spec_label
│   │   └── spec_value
│   ├── supported_platforms (Checkbox)
│   └── certifications (Repeater)
│       ├── cert_name
│       └── cert_badge
│
├── Tab: Features
│   ├── key_features (Repeater)
│   │   ├── feature_title
│   │   ├── feature_description
│   │   └── feature_icon
│   └── use_cases (Repeater)
│       ├── use_case_title
│       └── use_case_description
│
├── Tab: Media
│   ├── product_gallery (Gallery)
│   ├── architecture_diagram (Image)
│   └── brochure_pdf (File)
│
└── Tab: Related
    ├── related_products (Relationship)
    └── related_expertise (Relationship)
```

**Expertise Fields:**
```
Field Group: Expertise Details
├── expertise_icon (Image)
├── expertise_description (Wysiwyg)
├── key_benefits (Repeater)
│   ├── benefit_title
│   └── benefit_description
├── case_studies (Relationship -> Blog posts)
└── cta_button_text (Text)
```

---

## Phase 3: Theme Development (Week 2-3)

### 3.1 functions.php Setup

```php
<?php
/**
 * AZIT Theme Functions
 */

// Theme Setup
function azit_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');

    // Image sizes
    add_image_size('product-hero', 800, 600, true);
    add_image_size('product-thumb', 400, 300, true);
    add_image_size('blog-card', 600, 400, true);

    // Register menus
    register_nav_menus(array(
        'primary'    => __('Primary Navigation', 'azit-theme'),
        'top-menu'   => __('Top Menu', 'azit-theme'),
        'footer-1'   => __('Footer Products', 'azit-theme'),
        'footer-2'   => __('Footer Expertise', 'azit-theme'),
        'footer-3'   => __('Footer Resources', 'azit-theme'),
        'footer-legal' => __('Footer Legal', 'azit-theme'),
    ));

    // Load text domain for translations
    load_theme_textdomain('azit-theme', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'azit_theme_setup');

// Include files
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/taxonomies.php';
require get_template_directory() . '/inc/accessibility.php';

// ACF fields (if using ACF)
if (function_exists('acf_add_local_field_group')) {
    require get_template_directory() . '/inc/acf-fields.php';
}
```

### 3.2 Asset Enqueuing

```php
// inc/enqueue.php

function azit_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // Styles
    wp_enqueue_style('azit-variables', get_template_directory_uri() . '/assets/css/variables.css', array(), $theme_version);
    wp_enqueue_style('azit-base', get_template_directory_uri() . '/assets/css/base.css', array('azit-variables'), $theme_version);
    wp_enqueue_style('azit-components', get_template_directory_uri() . '/assets/css/components.css', array('azit-base'), $theme_version);
    wp_enqueue_style('azit-layout', get_template_directory_uri() . '/assets/css/layout.css', array('azit-components'), $theme_version);
    wp_enqueue_style('azit-pages', get_template_directory_uri() . '/assets/css/pages.css', array('azit-layout'), $theme_version);
    wp_enqueue_style('azit-a11y', get_template_directory_uri() . '/assets/css/a11y-utils.css', array('azit-pages'), $theme_version);
    wp_enqueue_style('azit-main', get_template_directory_uri() . '/style.css', array('azit-a11y'), $theme_version);

    // Google Fonts
    wp_enqueue_style('google-fonts-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);

    // Scripts
    wp_enqueue_script('azit-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $theme_version, true);
    wp_enqueue_script('azit-main', get_template_directory_uri() . '/assets/js/main.js', array('azit-navigation'), $theme_version, true);
    wp_enqueue_script('azit-accessibility', get_template_directory_uri() . '/assets/js/accessibility.js', array('azit-main'), $theme_version, true);

    // Localize script for AJAX
    wp_localize_script('azit-main', 'azitAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('azit_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'azit_enqueue_assets');
```

### 3.3 Header Template

```php
<?php // header.php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-lang="<?php echo pll_current_language(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip to content for accessibility -->
<a href="#main-content" class="skip-link"><?php esc_html_e('Skip to main content', 'azit-theme'); ?></a>

<!-- ARIA Live Region for Announcements -->
<div id="aria-live-region" aria-live="polite" aria-atomic="true"></div>

<!-- Top Menu -->
<?php get_template_part('template-parts/header/top-menu'); ?>

<!-- Header -->
<header class="header" id="header" role="banner">
    <div class="container header__container">
        <?php the_custom_logo(); ?>

        <nav class="header__nav" id="main-nav" aria-label="<?php esc_attr_e('Main navigation', 'azit-theme'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav__list',
                'walker'         => new AZIT_Mega_Menu_Walker(),
            ));
            ?>
        </nav>

        <button class="mobile-menu-toggle" id="mobile-menu-toggle"
                aria-label="<?php esc_attr_e('Toggle mobile menu', 'azit-theme'); ?>"
                aria-expanded="false">
            <span class="mobile-menu-toggle__line"></span>
            <span class="mobile-menu-toggle__line"></span>
            <span class="mobile-menu-toggle__line"></span>
        </button>
    </div>
</header>

<main id="main-content" role="main" tabindex="-1">
```

### 3.4 Footer Template

```php
<?php // footer.php ?>
</main>

<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__brand">
                <div class="footer__logo"><?php bloginfo('name'); ?></div>
                <p class="footer__tagline"><?php esc_html_e('A brand of ISIT', 'azit-theme'); ?></p>
                <p class="footer__tagline"><?php esc_html_e('30+ years expertise in embedded systems', 'azit-theme'); ?></p>
            </div>

            <div>
                <h3 class="footer__section-title"><?php esc_html_e('Products', 'azit-theme'); ?></h3>
                <?php wp_nav_menu(array('theme_location' => 'footer-1', 'container' => false, 'menu_class' => 'footer__list')); ?>
            </div>

            <div>
                <h3 class="footer__section-title"><?php esc_html_e('Expertise', 'azit-theme'); ?></h3>
                <?php wp_nav_menu(array('theme_location' => 'footer-2', 'container' => false, 'menu_class' => 'footer__list')); ?>
            </div>

            <div>
                <h3 class="footer__section-title"><?php esc_html_e('Resources', 'azit-theme'); ?></h3>
                <?php wp_nav_menu(array('theme_location' => 'footer-3', 'container' => false, 'menu_class' => 'footer__list')); ?>
            </div>
        </div>

        <div class="footer__bottom">
            <p class="footer__copyright">
                © <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - ISIT.
                <?php esc_html_e('All rights reserved.', 'azit-theme'); ?> | Version 7
            </p>
            <nav aria-label="<?php esc_attr_e('Footer links', 'azit-theme'); ?>">
                <?php wp_nav_menu(array('theme_location' => 'footer-legal', 'container' => false, 'menu_class' => 'footer__social')); ?>
            </nav>
        </div>

        <p style="text-align: center; margin-top: 1rem;">
            <a href="<?php echo get_permalink(get_page_by_path('accessibilite')); ?>" class="a11y-badge">
                <?php esc_html_e('Accessibility: Partially Compliant', 'azit-theme'); ?>
            </a>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
```

---

## Phase 4: Content Migration (Week 3-4)

### 4.1 Content Migration Checklist

| Content Type | Count | Source | Destination |
|--------------|-------|--------|-------------|
| Homepage | 2 | index.html, fr/index.html | Front Page |
| Products | 38 | pages/products/*.html | Product CPT |
| Expertise | 10 | pages/services/*.html | Expertise CPT |
| Blog | 2 | pages/blog.html | Blog Archive |
| Contact | 2 | pages/contact.html | Page + CF7 |
| Company | 2 | pages/company.html | Page |
| Training | 2 | pages/training.html | Page |
| Accessibility | 2 | pages/accessibilite.html | Page |
| Sitemap | 2 | pages/sitemap.html | Page (auto-generated) |

### 4.2 Product Migration Script

```php
// tools/migrate-products.php (run once via WP-CLI or admin)

function azit_migrate_products() {
    $products = array(
        array(
            'title'    => 'FSoE Slave Stack',
            'slug'     => 'fsoe-slave',
            'category' => 'Communication Stacks',
            'protocol' => array('FSoE', 'EtherCAT'),
        ),
        array(
            'title'    => 'FSoE Master Stack',
            'slug'     => 'fsoe-master',
            'category' => 'Communication Stacks',
            'protocol' => array('FSoE', 'EtherCAT'),
        ),
        // ... add all 19 products
    );

    foreach ($products as $product) {
        // Check if already exists
        $existing = get_page_by_path($product['slug'], OBJECT, 'product');
        if ($existing) continue;

        // Create product
        $post_id = wp_insert_post(array(
            'post_title'   => $product['title'],
            'post_name'    => $product['slug'],
            'post_type'    => 'product',
            'post_status'  => 'publish',
        ));

        if ($post_id) {
            // Set category
            wp_set_object_terms($post_id, $product['category'], 'product_category');
            // Set protocol types
            wp_set_object_terms($post_id, $product['protocol'], 'protocol_type');
        }
    }
}
```

### 4.3 Polylang Language Setup

1. Install and activate Polylang
2. Create languages:
   - English (en_US) - Default
   - French (fr_FR)
3. Configure:
   - URL format: `/en/` and `/fr/` prefixes
   - Hide default language URL: Yes
   - Detect browser language: Yes
4. Translate:
   - All strings in theme
   - Menu items
   - Widget titles
   - Taxonomy terms

### 4.4 Media Migration

```bash
# Copy assets to WordPress uploads
cp -r /path/to/Mockup-Site/assets/images/* /path/to/wordpress/wp-content/uploads/azit/

# Update image references in database after import
# Use Better Search Replace plugin or WP-CLI
wp search-replace 'https://isit.fr/photos/' 'https://your-domain.com/wp-content/uploads/azit/' --all-tables
```

---

## Phase 5: Forms & Interactivity (Week 4)

### 5.1 Contact Form 7 Setup

```
[text* your-name placeholder "Full Name"]
[email* your-email placeholder "Email Address"]
[text your-company placeholder "Company"]
[tel your-phone placeholder "Phone Number"]

[select* interest "Select your interest"
    "FSoE Stack (Slave/Master)"
    "CANopen Stack"
    "CANopen Safety Stack"
    "J1939 Stack"
    "Porting Services"
    "Maintenance Support"
    "Consulting & Expertise"
    "Training"
    "Other"]

[select* timeline "Estimated Timeline"
    "Immediate (within 1 month)"
    "Short-term (1-3 months)"
    "Medium-term (3-6 months)"
    "Long-term (6+ months)"
    "Research phase"]

[textarea project-description placeholder "Project Description"]

[submit class:btn class:btn--primary class:btn--large "Submit Request"]
```

### 5.2 Newsletter Integration

Options:
- Mailchimp for WordPress
- Newsletter plugin
- Custom AJAX handler

---

## Phase 6: Testing & QA (Week 5)

### 6.1 Testing Checklist

- [ ] **Functional Testing**
  - [ ] All pages load correctly
  - [ ] Navigation works (desktop + mobile)
  - [ ] Language switcher works
  - [ ] Forms submit correctly
  - [ ] Search functionality
  - [ ] 404 page displays

- [ ] **Accessibility Testing (RGAA 4.1.2)**
  - [ ] Skip links functional
  - [ ] Keyboard navigation
  - [ ] Screen reader compatibility
  - [ ] Color contrast (WCAG AA)
  - [ ] Focus indicators visible
  - [ ] ARIA landmarks present
  - [ ] Alt text on images

- [ ] **Cross-Browser Testing**
  - [ ] Chrome (latest)
  - [ ] Firefox (latest)
  - [ ] Safari (latest)
  - [ ] Edge (latest)
  - [ ] Mobile Safari (iOS)
  - [ ] Chrome Mobile (Android)

- [ ] **Performance Testing**
  - [ ] Page load time < 3s
  - [ ] Lighthouse score > 90
  - [ ] Image optimization
  - [ ] CSS/JS minification

- [ ] **SEO Testing**
  - [ ] Meta titles/descriptions
  - [ ] Open Graph tags
  - [ ] Sitemap generation
  - [ ] robots.txt
  - [ ] Canonical URLs
  - [ ] hreflang tags for languages

---

## Phase 7: Deployment (Week 5-6)

### 7.1 Pre-Launch Checklist

- [ ] Backup current site
- [ ] Set up staging environment
- [ ] Configure SSL certificate
- [ ] Set up CDN (optional)
- [ ] Configure caching (WP Super Cache / W3 Total Cache)
- [ ] Set up backup system (UpdraftPlus)
- [ ] Configure security plugin (Wordfence)
- [ ] Set up monitoring (Jetpack / UptimeRobot)

### 7.2 Migration Steps

1. Export database from local
2. Import to production server
3. Update wp-config.php
4. Run search-replace for URLs
5. Upload theme files
6. Upload media files
7. Test all functionality
8. Update DNS records
9. Monitor for 24-48 hours

### 7.3 Post-Launch

- [ ] Submit sitemap to Google Search Console
- [ ] Set up Google Analytics
- [ ] Configure 301 redirects (old URLs to new)
- [ ] Monitor error logs
- [ ] Performance optimization
- [ ] User training for content editors

---

## Resource Requirements

### Development Team
- 1 WordPress Developer (40-60 hours)
- 1 Frontend Developer (20-30 hours)
- 1 QA Tester (10-15 hours)

### Hosting Requirements
- **Minimum**: Shared hosting with PHP 8.0+, MySQL 5.7+
- **Recommended**: VPS or managed WordPress hosting
- **Storage**: 5GB minimum
- **Bandwidth**: 50GB/month minimum

### Recommended Hosting Providers
1. **Kinsta** - Premium managed WordPress
2. **SiteGround** - Good balance of price/performance
3. **WP Engine** - Enterprise-grade
4. **OVH** - European data centers (GDPR)
5. **o2switch** - French hosting (for RGPD compliance)

---

## Cost Estimate

| Item | Cost Range |
|------|------------|
| Polylang Pro (optional) | €99/year |
| ACF Pro | €49/year |
| Max Mega Menu Pro (optional) | €29 |
| Premium Hosting | €15-50/month |
| SSL Certificate | Free (Let's Encrypt) |
| Development Time | 60-100 hours |

**Total Estimated Cost**: €200-500 (excluding development time)

---

## Appendix A: URL Mapping

| Old URL | New WordPress URL |
|---------|-------------------|
| `/index.html` | `/` |
| `/fr/index.html` | `/fr/` |
| `/pages/products/fsoe-slave.html` | `/products/fsoe-slave/` |
| `/fr/pages/products/fsoe-slave.html` | `/fr/products/fsoe-slave/` |
| `/pages/services/expertise.html` | `/services/expertise/` |
| `/pages/contact.html` | `/contact/` |
| `/pages/blog.html` | `/blog/` |

---

## Appendix B: Polylang String Translations

Key strings to translate:
- "Skip to main content" → "Aller au contenu principal"
- "Main navigation" → "Navigation principale"
- "Products" → "Produits"
- "Expertise" → "Expertise"
- "Training" → "Formation"
- "Contact" → "Contact"
- "Request a Quote" → "Demander un devis"
- "Learn more" → "En savoir plus"
- "All rights reserved" → "Tous droits réservés"
- "Accessibility: Partially Compliant" → "Accessibilité : partiellement conforme"

---

*Document Version: 1.0*
*Created: January 2026*
*Last Updated: January 2026*
