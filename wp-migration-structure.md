# AZIT Website - Before/After Migration Structure

## BEFORE: V7.1-RGAA Static Structure

```
azit-website/
├── src/
│   ├── pages/
│   │   ├── index.html                 → Homepage
│   │   ├── expertise/
│   │   │   ├── index.html            → Expertise overview
│   │   │   ├── safety-compliance.html
│   │   │   ├── protocol-development.html
│   │   │   ├── testing-validation.html
│   │   │   └── industrial-networks.html
│   │   ├── products/
│   │   │   └── index.html
│   │   ├── training/
│   │   │   └── index.html
│   │   ├── contact/
│   │   │   └── index.html
│   │   ├── accessibilite/
│   │   │   └── index.html            → Accessibility statement
│   │   └── sitemap/
│   │       └── index.html
│   ├── styles/
│   │   ├── main.css
│   │   └── accessibility/
│   │       └── a11y-utils.css       → Skip links, focus styles
│   ├── js/
│   │   ├── main.js
│   │   └── accessibility/
│   │       └── keyboard-nav.js      → Dropdown navigation
│   └── images/
│       ├── logo.svg
│       └── expertise/
│           ├── safety-compliance.svg
│           └── [other illustrations]
```

**Management:** Manual HTML editing  
**Bilingual:** Separate HTML files per language  
**Updates:** Developer required

---

## AFTER: WordPress Structure

```
wordpress/
├── wp-content/
│   ├── themes/
│   │   └── azit-industrial/                    ← CUSTOM THEME
│   │       ├── style.css                       ← Theme header
│   │       ├── functions.php                   ← Core functionality
│   │       ├── index.php                       ← Main template
│   │       ├── header.php                      ← Header (skip links)
│   │       ├── footer.php                      ← Footer (badge)
│   │       ├── page.php                        ← Page template
│   │       ├── single.php                      ← Single post
│   │       ├── single-expertise.php            ← Expertise detail
│   │       ├── archive-expertise.php           ← Expertise archive
│   │       ├── archive-product.php             ← Product archive
│   │       │
│   │       ├── assets/
│   │       │   ├── css/
│   │       │   │   ├── main.css               ← Same from V7
│   │       │   │   └── accessibility/
│   │       │   │       └── a11y-utils.css     ← Same from V7
│   │       │   ├── js/
│   │       │   │   ├── main.js                ← Same from V7
│   │       │   │   └── accessibility/
│   │       │   │       └── keyboard-nav.js    ← Same from V7
│   │       │   └── images/
│   │       │       └── logo.svg
│   │       │
│   │       ├── page-templates/
│   │       │   ├── template-expertise.php     ← Expertise overview
│   │       │   ├── template-contact.php       ← Contact page
│   │       │   └── template-accessibility.php ← Accessibility statement
│   │       │
│   │       ├── template-parts/
│   │       │   ├── content-page.php
│   │       │   ├── content-expertise.php
│   │       │   └── content-product.php
│   │       │
│   │       └── inc/
│   │           ├── custom-post-types.php      ← Expertise, Products, Training
│   │           ├── custom-fields.php          ← ACF configuration
│   │           ├── accessibility.php          ← A11y functions
│   │           └── template-functions.php     ← Helper functions
│   │
│   ├── plugins/
│   │   ├── advanced-custom-fields/            ← Custom fields
│   │   ├── wpml/                              ← Multilingual
│   │   ├── contact-form-7/                    ← Forms
│   │   ├── wp-accessibility/                  ← Extra A11y features
│   │   ├── wordpress-seo/                     ← SEO
│   │   └── wordfence/                         ← Security
│   │
│   └── uploads/
│       └── [year]/[month]/                    ← Media library
│           ├── safety-compliance.svg
│           ├── protocol-development.svg
│           └── [all images]
│
├── wp-admin/                                   ← WordPress admin
├── wp-includes/                                ← WordPress core
└── wp-config.php                               ← Configuration
```

**Management:** WordPress admin interface (no coding)  
**Bilingual:** WPML plugin (translate in admin)  
**Updates:** Non-technical users can edit content

---

## CONTENT MAPPING

### Static Pages → WordPress Pages

| V7.1-RGAA Static File | WordPress Page | Template |
|----------------------|----------------|----------|
| `/index.html` | Home | Default (set as front page) |
| `/expertise/index.html` | Expertise | `template-expertise.php` |
| `/contact/index.html` | Contact | `template-contact.php` |
| `/accessibilite/index.html` | Accessibility | `template-accessibility.php` |
| `/sitemap/index.html` | Site Map | Default page |
| `/company/about-azit.html` | About AZIT | Default page |
| `/company/team.html` | Team | Default page |
| `/legal.html` | Legal Mentions | Default page |

### Static HTML → Custom Post Types

| V7.1-RGAA Static Content | WordPress Post Type | Archive URL |
|-------------------------|--------------------|--------------------|
| `/expertise/safety-compliance.html` | Expertise post | `/expertise/safety-compliance/` |
| `/expertise/protocol-development.html` | Expertise post | `/expertise/protocol-development/` |
| `/expertise/testing-validation.html` | Expertise post | `/expertise/testing-validation/` |
| `/expertise/industrial-networks.html` | Expertise post | `/expertise/industrial-networks/` |
| `/products/*.html` | Product posts | `/products/[product-name]/` |
| `/training/*.html` | Training posts | `/training/[course-name]/` |

---

## KEY DIFFERENCES

### Before (Static):
```html
<!-- src/pages/expertise/safety-compliance.html -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Safety Compliance - Expertise - AZIT</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>
<body>
    <!-- Full HTML structure here -->
    <header>...</header>
    <main>
        <h1>Safety Compliance</h1>
        <p>Content here...</p>
    </main>
    <footer>...</footer>
</body>
</html>
```

**To update:** Edit HTML file directly, upload via FTP

---

### After (WordPress):
```php
<!-- wp-content/themes/azit-industrial/single-expertise.php -->
<?php get_header(); ?>

<main id="main-content" role="main" tabindex="-1">
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        
        <?php 
        // Custom fields
        $services = get_field('expertise_services');
        if ($services) :
            foreach ($services as $service) :
                echo '<h3>' . esc_html($service['service_name']) . '</h3>';
                echo '<p>' . esc_html($service['service_description']) . '</p>';
            endforeach;
        endif;
        ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
```

**To update:** Log in to WordPress admin, click "Edit", make changes in visual editor

---

## WORKFLOW COMPARISON

### Before (Static) - Updating Content

1. Developer opens HTML file in code editor
2. Developer edits HTML markup
3. Developer saves file
4. Developer uploads via FTP
5. Developer tests live site
6. Repeat for each language version

**Time:** 15-30 minutes per change  
**Who:** Developer only  
**Risk:** Can break layout/functionality

---

### After (WordPress) - Updating Content

1. User logs into WordPress admin
2. User clicks "Edit" on page/post
3. User makes changes in visual editor (like Word)
4. User clicks "Update"
5. Changes live immediately

**Time:** 2-5 minutes per change  
**Who:** Any authorized user  
**Risk:** Layout protected by template

---

## NAVIGATION MANAGEMENT

### Before (Static):
```html
<!-- Hard-coded in every HTML file -->
<nav aria-label="Main navigation">
    <ul>
        <li><a href="/products">Products</a></li>
        <li><a href="/expertise">Expertise</a></li>
        <li><a href="/training">Training</a></li>
    </ul>
</nav>
```

**To add menu item:** Edit every HTML file

---

### After (WordPress):
```php
<!-- In header.php - appears on all pages -->
<nav aria-label="<?php esc_attr_e('Main navigation', 'azit-industrial'); ?>">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'walker'         => new AZIT_Walker_Nav_Menu(),
    ));
    ?>
</nav>
```

**To add menu item:** WordPress admin > Appearance > Menus > Drag & drop

---

## BILINGUAL MANAGEMENT

### Before (Static):
```
/index.html           (French)
/en/index.html        (English)
/expertise/index.html (French)
/en/expertise/index.html (English)
```

**To translate:** Duplicate HTML file, translate all text, maintain both versions

---

### After (WordPress + WPML):
```
/                     (French - automatic)
/en/                  (English - automatic)
/expertise/           (French - automatic)
/en/expertise/        (English - automatic)
```

**To translate:** Click "+" icon next to page, translate in admin interface

---

## ACCESSIBILITY MAINTENANCE

### Both versions maintain:
✅ Skip links  
✅ ARIA landmarks  
✅ Keyboard navigation  
✅ Focus indicators  
✅ Alt text  
✅ Form labels  
✅ Color contrast  
✅ Heading hierarchy  

### WordPress advantages:
✅ WP Accessibility plugin (additional features)  
✅ Accessible admin interface  
✅ Built-in image alt text fields  
✅ Automatic semantic HTML  
✅ Screen reader tested  

---

## DEVELOPMENT PROCESS

### Before (Static):
```bash
# Make change
edit src/pages/expertise/index.html

# Upload
scp index.html user@server:/var/www/html/expertise/

# No rollback, no version control (unless using Git)
```

---

### After (WordPress):
```bash
# Make change in admin
# Click "Update" button

# Automatic features:
- Revisions (can rollback)
- Auto-save
- Preview before publish
- Scheduled publishing
- User roles & permissions
```

---

## BACKUP & SECURITY

### Before (Static):
- Manual file backups
- Basic server security
- Manual SSL setup
- No automatic updates

---

### After (WordPress):
- Automated backup plugins
- Wordfence security scanning
- One-click SSL (Let's Encrypt)
- Automatic WordPress updates
- Security audit logs
- Two-factor authentication

---

## PERFORMANCE

### Before (Static):
✅ Fast (static HTML)  
✅ No database queries  
❌ No caching layer needed  
❌ Manual optimization

---

### After (WordPress):
✅ Caching plugins (WP Super Cache)  
✅ CDN integration  
✅ Image optimization plugins  
✅ Lazy loading  
✅ Minification (Autoptimize)  
⚠️ Database queries (optimized)

---

## SEO MANAGEMENT

### Before (Static):
```html
<!-- Manual in each file -->
<title>Page Title - AZIT</title>
<meta name="description" content="...">
<meta property="og:title" content="...">
<meta property="og:description" content="...">
```

---

### After (WordPress + Yoast SEO):
- Visual SEO editor in admin
- Automatic XML sitemap
- Social media previews
- Focus keyword analysis
- Readability score
- Schema markup
- Breadcrumbs

---

## FORMS

### Before (Static):
```html
<!-- Custom PHP processing -->
<form action="/process-contact.php" method="post">
    <!-- Form fields -->
</form>
```

**Storage:** Custom database or email only

---

### After (WordPress + CF7):
```
<!-- Admin interface to create forms -->
[contact-form-7 id="123"]
```

**Storage:** Flamingo plugin stores all submissions

---

## USER ROLES

### Before (Static):
- Developers only (FTP access)
- No content editors

---

### After (WordPress):
- **Administrator:** Full access
- **Editor:** Edit all content
- **Author:** Create/edit own posts
- **Contributor:** Submit for review
- **Subscriber:** Read-only

---

## COST COMPARISON

### Before (Static):
- **Development:** High (developer for every change)
- **Hosting:** Low ($5-20/month)
- **Maintenance:** High (developer hours)

---

### After (WordPress):
- **Development:** High initially (theme creation)
- **Hosting:** Medium ($15-50/month)
- **Maintenance:** Low (internal team can manage)
- **Plugins:** $0-300/year (WPML license)

**ROI:** Break-even after 6-12 months (saved developer time)

---

## MIGRATION BENEFITS

### ✅ Content Management
- Non-technical users can update content
- Visual editor (WYSIWYG)
- Media library
- Version control

### ✅ Multilingual
- WPML integrated translation
- Language switcher automatic
- No duplicate files

### ✅ Scalability
- Easy to add new pages/posts
- Custom post types for structured content
- Taxonomies for organization

### ✅ Maintenance
- Automatic WordPress updates
- Plugin ecosystem
- Community support
- Documentation

### ✅ Features
- Contact forms
- SEO optimization
- Analytics integration
- Social media sharing
- Newsletter integration

---

## MIGRATION MAINTAINS

✅ **All V7.1-RGAA accessibility features**  
✅ **Same design and layout**  
✅ **Same URL structure (permalinks)**  
✅ **All existing content**  
✅ **Bilingual support (FR/EN)**  
✅ **RGAA 4.1.2 compliance (65-75%)**

---

## MIGRATION IMPROVES

✅ **Content management** (no developer needed)  
✅ **Update speed** (2 minutes vs 30 minutes)  
✅ **Translation workflow** (integrated WPML)  
✅ **User permissions** (role-based access)  
✅ **SEO capabilities** (Yoast SEO)  
✅ **Form handling** (Contact Form 7)  
✅ **Security** (Wordfence, automated updates)  
✅ **Backup** (automated)  
✅ **Version control** (built-in revisions)

---

## SUMMARY

| Aspect | Static V7.1-RGAA | WordPress |
|--------|------------------|-----------|
| **Content Updates** | Developer required | Self-service |
| **Update Time** | 15-30 min | 2-5 min |
| **Bilingual** | Duplicate files | WPML plugin |
| **Accessibility** | Manual maintenance | Maintained + plugins |
| **SEO** | Manual | Automated (Yoast) |
| **Forms** | Custom code | Plugin |
| **Security** | Basic | Advanced |
| **Backup** | Manual | Automated |
| **User Roles** | None | 5 levels |
| **Learning Curve** | HTML/CSS needed | User-friendly admin |

**Recommendation:** Migrate to WordPress for long-term maintainability and cost savings.

---

**Ready to migrate?** Follow the "Claude Code - WordPress Migration Handoff" document step by step.