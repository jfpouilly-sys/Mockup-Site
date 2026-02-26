# WordPress Update Instructions: Training Menu, RGAA Fixes, Datasheets & Integration Tab Removal

These instructions explain how to deploy the training mega-menu, RGAA 4.1.2 accessibility fixes, product datasheet, integration tab changes, and the **new fully-manageable ACF field architecture** for Training, Products, and Expertise to your live WordPress instance.

---

## Prerequisites: Required Plugin

### ACF PRO (Advanced Custom Fields PRO) — **Required**

All content management for Training, Products, and Expertise relies on **ACF PRO**. The theme registers all field groups in PHP (`inc/custom-fields.php`), so no JSON import is needed — fields auto-register when ACF PRO is active.

**Why PRO?** Several field groups use **nested repeaters** (e.g., training outline with sub-topics, product feature groups with sub-features, product spec tables with rows), which is a PRO-only feature.

**Without ACF PRO:** Basic fallback meta boxes are provided for price, SKU, duration, and level, but all advanced features (galleries, repeaters, grouped specs, PDF uploads) will be unavailable.

### Other Recommended Plugins

| Plugin | Purpose | Required? |
|--------|---------|-----------|
| **Contact Form 7** | Quote forms on product pages, training registration/request forms, contact forms | Recommended |
| **WPML** or **Polylang** | FR/EN multilingual support | Recommended |
| **Yoast SEO** | SEO meta for all post types | Optional |

**No other plugins are needed.** Galleries, PDF downloads, process steps, spec tables, and badges all use native WordPress features through ACF PRO.

---

## 0. Training Mega-Menu & RGAA 4.1.2 Accessibility Fixes

### Training Mega-Menu

The Training navigation link now includes a dropdown mega-menu with 4 course categories:
- **Protocol Training** (CAN, CANopen, J1939, EtherCAT, etc.)
- **Safety Standards** (IEC 61508, ISO 26262, DO-178C, etc.)
- **Hands-on Workshops** (Troubleshooting, Cybersecurity, FreeRTOS, etc.)
- **Custom Training** (On-request tailored programs)

Each links to the corresponding tab on the training page via URL hash anchors.

**WordPress theme file changed:** `azit-industrial/header.php`
- The Training menu item now has a mega-menu dropdown matching Products and Expertise
- If using WordPress Menus (Appearance > Menus), re-create the Training sub-items manually

### RGAA 4.1.2 Accessibility Fixes Applied

**CSS Changes (deploy updated theme CSS files):**
- `css/base.css`: Root font-size changed from `16px` to `100%` for proper browser zoom support
- `css/layout.css`: Footer link/text color improved to `gray-300` for WCAG AA contrast; added `:focus-within` support for keyboard navigation of mega-menus
- `css/components.css`: Fixed low-contrast colors (`#666`→`#595959`, `#ccc`→`#767676`) to meet WCAG AA 4.5:1 ratio

**JavaScript Changes (deploy updated JS files):**
- `js/tabs.js`: Added ARIA `role="tablist"`, `role="tab"`, `role="tabpanel"`, `aria-selected`, `aria-controls` attributes; added keyboard navigation (Arrow keys, Home/End)

**HTML Changes applied to all pages:**
- Navigation SVG icons: Added `aria-hidden="true"`
- Products link: Fixed `href="#"` → actual page URL
- Breadcrumbs: Added `aria-label="Breadcrumb"` (EN) / `aria-label="Fil d'Ariane"` (FR)
- Skip links: Standardized class to `skip-link` across all pages
- Mobile menu: Added `aria-label` and `aria-expanded="false"` where missing
- Contact forms: Added `aria-required="true"`, `autocomplete` attributes, required field legend
- Product tables: Added `<th scope="row">`, `<caption>` elements
- Download links: Added file type info "(PDF)"

---

## 1. Import Media Files to WordPress Media Library

**Why:** Images, PDFs, and other media files bundled in the theme's `assets/` directory do **not** appear in **Media > Library** by default. WordPress only lists files that were uploaded through its media system (i.e., stored as attachment posts in the database). You must import them so they are visible and manageable from the WordPress admin.

### Option A: One-Click Import (Recommended)

1. Log in to your WordPress admin panel (`https://your-site.com/wp-admin/`)
2. Go to **Tools > AZIT Setup**
3. Click the **"Import Media to Library"** button
4. This will:
   - Copy all images from `assets/images/products/` and `assets/images/diagrams/` to `wp-content/uploads/`
   - Copy all PDFs from `assets/docs/` and `assets/docs/datasheets/` to `wp-content/uploads/`
   - Register each file as a WordPress attachment (visible in **Media > Library**)
   - Update any existing post content to reference the new Media Library URLs
5. Already-imported files are skipped automatically, so it is safe to run multiple times

### Option B: WP-CLI

```bash
# Import all theme media assets to the WordPress Media Library
wp eval "require get_template_directory() . '/inc/import-static-content.php'; \$r = azit_import_media_only(); echo 'Imported: ' . \$r['imported'] . ', Skipped: ' . \$r['skipped'] . ', Posts updated: ' . \$r['posts_updated'] . PHP_EOL;"
```

### Option C: Manual Upload via Media > Add New

1. Go to **Media > Add New**
2. Upload the following files manually:
   - All images from `assets/images/products/` (JPG, PNG files)
   - All diagrams from `assets/images/diagrams/` (SVG files)
   - All PDFs from `assets/docs/` and `assets/docs/datasheets/`
3. After uploading, you will need to manually update the image/file URLs in your product posts

### Note on Datasheets

The following product datasheets should be placed in `assets/docs/datasheets/` before importing:
   - `isit-custom-multi-protocol-gateway_fp-isigtw-en-20221102.pdf` (Protocol Gateway datasheet)
   - `isit-j1939-stack_isit-j1939-stack-en.pdf` (J1939 Stack datasheet)

If you add new datasheets later, run the media import again (Option A or B) to register them in the Media Library.

---

## 2. Update the WordPress Theme

### Option A: Copy Updated Theme Files

Copy the updated theme files from this repository to your WordPress installation:

```bash
# From your server, navigate to the theme directory
cd /path/to/wordpress/wp-content/themes/azit-industrial/

# Copy the updated single-product.php
# (This file now includes the "Download Datasheet" button in the product actions area)
```

The key change is in `single-product.php` which now reads the `product_datasheet` ACF field and renders a download button when a datasheet PDF is attached.

### Option B: Manual Edit

If you prefer to manually edit the theme on the server, add this code in `single-product.php` inside the `<div class="product-actions">` section, after the "Request Quote" button:

```php
<?php
$datasheet = null;
if (function_exists('get_field')) {
    $datasheet = get_field('product_datasheet');
}
if ($datasheet && !empty($datasheet['url'])) :
?>
<a href="<?php echo esc_url($datasheet['url']); ?>"
   class="btn btn-secondary"
   download
   aria-label="<?php echo esc_attr(sprintf(__('Download %s datasheet (PDF)', 'azit-industrial'), get_the_title())); ?>">
    <?php esc_html_e('Download Datasheet', 'azit-industrial'); ?>
</a>
<?php endif; ?>
```

---

## 3. Attach Datasheets to Products

### With ACF (Advanced Custom Fields) Installed

1. Go to **Products > All Products**
2. Edit the **ISI-GTW Multi-Protocol Gateway** product
3. Scroll down to the **Product Details** section
4. In the **Datasheet** field, click "Add File" and select `isit-custom-multi-protocol-gateway_fp-isigtw-en-20221102.pdf` from the Media Library
5. Click **Update** to save
6. Repeat for the **J1939 Protocol Stack** product:
   - Edit the J1939 product
   - In the **Datasheet** field, select `isit-j1939-stack_isit-j1939-stack-en.pdf`
   - Click **Update**

### Without ACF (Fallback Meta Box)

If ACF is not installed, you can set the datasheet via WP-CLI or custom code:

```bash
# Find the product post IDs
wp post list --post_type=product --fields=ID,post_title

# Assuming Protocol Gateway has ID 42 and J1939 has ID 55:
# First, get the attachment IDs of the uploaded PDFs
wp post list --post_type=attachment --post_mime_type=application/pdf --fields=ID,post_title

# Then attach the datasheet to the product
wp post meta update 42 product_datasheet <attachment_id_of_gateway_pdf>
wp post meta update 55 product_datasheet <attachment_id_of_j1939_pdf>
```

---

## 4. Verify the Changes

1. Visit the **Protocol Gateway** product page on your live site
2. Confirm the "Download Datasheet" button appears and downloads the correct PDF
3. Visit the **J1939** product page
4. Confirm the "Download Datasheet" button appears and downloads the correct PDF
5. Test in both **English** and **French** (if WPML is configured)

---

## 5. WPML / Multilingual Considerations

If you're using WPML for translations:

1. The datasheet files are language-neutral (EN versions serve both languages for now)
2. If you later have French-specific datasheets, create separate media entries and attach them to the French translations of each product
3. The `product_datasheet` ACF field is automatically synced by WPML if configured in **WPML > Settings > Custom Fields**

---

## Summary of Changed Files

| File | Change |
|------|--------|
| `assets/docs/datasheets/` | New directory for product datasheets |
| `azit-industrial/inc/import-static-content.php` | Added media import functions (`azit_import_media_to_library`, `azit_rewrite_content_media_urls`, `azit_import_media_only`) to register theme assets in WP Media Library; Added `azit_import_static_training()` to import 20 training courses as Training CPT posts |
| `azit-industrial/functions.php` | Added "Import Media to Library" button and handler on AZIT Setup page; Updated import UI to mention training courses and show training count in success message |
| `pages/products/protocol-gateway.html` | Added "Download Datasheet" button (EN) |
| `pages/products/j1939.html` | Fixed "Download Datasheet" link (EN) |
| `fr/pages/products/protocol-gateway.html` | Added "Telecharger la Fiche Technique" button (FR) |
| `fr/pages/products/j1939.html` | Fixed "Telecharger la Fiche Technique" link (FR) |
| `azit-industrial/single-product.php` | Added datasheet download button; removed duplicate Related Products section |
| `azit-industrial/header.php` | Added Training mega-menu dropdown; added `aria-hidden="true"` to SVG icons |
| `css/base.css` | Changed root font-size from `16px` to `100%` for RGAA zoom compliance |
| `css/layout.css` | Fixed footer link contrast (gray-300); added `:focus-within` for mega-menu keyboard support |
| `css/components.css` | Fixed color contrast for WCAG AA: replaced `#666`→`#595959`, `#ccc`→`#767676` |
| `js/tabs.js` | Added ARIA roles (tablist/tab/tabpanel), keyboard navigation (Arrow keys, Home/End) |
| `pages/*.html`, `fr/pages/*.html` | Added Training mega-menu to all pages; RGAA fixes (skip links, breadcrumbs, SVG aria-hidden) |
| `pages/contact.html`, `fr/pages/contact.html` | Form RGAA fixes (aria-required, autocomplete, required legend) |
| `pages/products/*.html` | Table RGAA fixes (th scope, caption elements); download link file type info |
| `pages/products/*.html` (9 files) | Removed "Integration" tab from all communication stack product pages (EN) |
| `fr/pages/products/*.html` (9 files) | Removed "Intégration" tab from all communication stack product pages (FR) |
| `azit-industrial/static-content/products/*.html` (9 files) | Removed "Integration" tab from WP static content (EN) |
| `azit-industrial/static-content/fr/pages/products/*.html` (9 files) | Removed "Intégration" tab from WP static content (FR) |

### Products affected by Integration tab removal

- canopen-master
- canopen-slave
- canopen-safety-master
- canopen-safety-slave
- fsoe-master
- fsoe-slave
- j1939
- profisafe-master
- profisafe-slave

## 6. Training Courses Import

The static content importer now includes **20 training courses** as individual Training custom post type entries. These are created automatically when you click "Import Content from Static HTML Files" on the AZIT Setup page.

### Training courses imported:

**Protocol Training (7 courses):** CAN, CANopen, J1939, EtherCAT, Industrial Ethernet, Ethernet/IP - CIP, PROFINET

**Safety Standards (8 courses):** IEC 61508, ISO 26262, ISO 21434, IEC 62304, DO-178C, EN 50716, ISO 13849, ISO 25119

**Hands-on Workshops (5 courses):** Industrial Ethernet Troubleshooting, Embedded Systems Cybersecurity, Medical Device Cybersecurity, FreeRTOS Implementation, MISRA C:2025

Each training post includes:
- Course title and description
- Duration, price, and difficulty level (custom fields)
- Practical information (capacity, pricing format)
- Contact link for enrollment

### To re-import training courses:

```bash
# Delete existing training posts
wp post list --post_type=training --format=ids | xargs wp post delete --force

# Re-import training courses
wp eval "require get_template_directory() . '/inc/import-static-content.php'; echo 'Imported: ' . azit_import_static_training() . ' training courses' . PHP_EOL;"
```

---

## 7. Re-import Static Content (if using static content importer)

If your WordPress site was populated using the static content importer (`inc/import-static-content.php`), you need to re-import the updated product pages to pick up the Integration tab removal:

```bash
# Option A: Delete and re-import affected products via WP-CLI
wp post list --post_type=product --fields=ID,post_name | grep -E '(canopen|fsoe|j1939|profisafe)'

# For each product, delete and let the importer recreate it:
wp post delete <ID> --force

# Then trigger re-import (from theme directory):
wp eval "define('AZIT_IMPORT_CONTENT', true); require get_template_directory() . '/inc/import-static-content.php'; azit_import_static_products();"
```

```bash
# Option B: Manually update each product's content in the WordPress editor
# 1. Go to Products > All Products
# 2. Edit each affected product
# 3. Remove the "Integration" tab button and content from the post editor
# 4. Save/Update
```

---

## PDF Files to Place in `assets/docs/datasheets/`

| Filename | Product |
|----------|---------|
| `isit-custom-multi-protocol-gateway_fp-isigtw-en-20221102.pdf` | ISI-GTW Protocol Gateway |
| `isit-j1939-stack_isit-j1939-stack-en.pdf` | J1939 Protocol Stack |

> **Reminder:** After placing PDF files in this directory, run the media import (see Section 1) to register them in the WordPress Media Library.

---

## 8. Training Pages — Full WordPress Manageability

Training pages are now fully manageable through **Training > Edit** in wp-admin. No code editing needed.

### ACF Field Tabs for Training

All fields are organized in **6 tabs** in the editor:

| Tab | Fields | Description |
|-----|--------|-------------|
| **General** | Duration, Max Participants, Level, Format, Certificate toggle | Core training metadata |
| **Pricing** | Inter-Enterprise Price, Private Company Price | Two-tier pricing |
| **Content** | Learning Objectives (repeater), Prerequisites (WYSIWYG), Target Audience (WYSIWYG), Instructor bio | Rich content sections |
| **Program** | Course Outline (repeater with nested topics) | Day-by-day program, e.g., "Day 1 — CAN Fundamentals" with bullet-point topics |
| **Sidebar** | Key Benefits (repeater), Syllabus PDF (file upload) | Sidebar content blocks |
| **Sessions** | Upcoming Sessions (repeater: date, location, status) | Scheduled session management |

### Taxonomies for Training

| Taxonomy | Purpose | Examples |
|----------|---------|----------|
| **Training Category** (`training_category`) | Classify training by type | Protocol Training, Safety Standards, Hands-on Workshops |
| **Training Level** (`training_level`) | Difficulty level | Beginner, Intermediate, Advanced, Expert |

### Adding a Syllabus PDF

1. Go to **Training > Edit** and open the training post
2. Go to the **Sidebar** tab
3. In the **Syllabus (PDF)** field, click "Add File"
4. Upload or select a PDF from the **WordPress Media Library**
5. Click **Update** to save
6. A "Download PDF" button will automatically appear in the training page sidebar

### Contact Form 7 Integration for Training

The **"Request Information"** button (sidebar), **"Register"** links (session table), and the bottom CTA section all use **Contact Form 7** to embed a training request form directly on the page.

**Automatic form creation:** On theme activation, a CF7 form named `training-request-form` is created with fields for:
- Name, Email, Company, Job Title
- Training Course (dropdown)
- Preferred Date, Number of Attendees
- Additional Comments

**On the training archive page** (`archive-training.php`), the "Need Custom Training?" CTA also embeds this same CF7 form.

**Fallback behavior:**
- If CF7 is installed but no `training-request-form` exists: the first available CF7 form is used
- If CF7 is not installed: a "Go to Contact Page" link is shown instead

**To customize the training form:**
1. Go to **Contact > Contact Forms** in wp-admin
2. Find the form named **"Training Request"** (slug: `training-request-form`)
3. Edit the form fields, email template, and messages as needed
4. Changes are reflected immediately on all training pages

### Template Files

| File | Purpose |
|------|---------|
| `single-training.php` | Single training detail page (2-column layout: content + sidebar) with CF7 registration form |
| `archive-training.php` | Training listing with level filters and CF7 custom training request form |
| `template-parts/content-training.php` | Reusable training card partial |

---

## 9. Product Pages — Full WordPress Manageability

Product pages are now fully manageable through **Products > Edit** in wp-admin.

### ACF Field Tabs for Products

All fields are organized in **5 tabs**:

| Tab | Fields | Description |
|-----|--------|-------------|
| **General** | Product Image, Image Gallery, Price, SKU/Reference, Availability, Certification Badges | Core product info + multi-image gallery |
| **Features** | Feature Groups (categorized cards), Key Features (simple list) | "Safety Features", "Communication Features" as separate cards with sub-items |
| **Specifications** | Specification Tables (grouped), Specifications (simple table) | Multiple named tables (e.g., "Safety Certification", "Resource Requirements") |
| **Documentation** | Datasheet (PDF), Additional Downloads (repeater: title + file) | All downloadable files |
| **Related** | Related Products (relationship picker, max 4) | Curated related product links |

### How to Add Product Certification Badges

1. Go to **Products > Edit** and open the product post
2. In the **General** tab, find **Certification Badges**
3. Click "Add Badge" and enter labels like `SIL3`, `PLe`, `BV Approved`, `Made in France`
4. These appear as badge pills in the product hero section

### How to Add Grouped Specification Tables

1. Go to the **Specifications** tab
2. Click "Add Specification Table"
3. Enter a table title (e.g., "Safety Certification")
4. Add rows with Parameter/Value pairs (e.g., "Safety Level" / "SIL3")
5. Repeat for additional tables ("Resource Requirements", "Platform Support", etc.)
6. Each group renders as a separate table with its own heading

### How to Add Feature Groups

1. Go to the **Features** tab
2. Click "Add Feature Group"
3. Enter a group title (e.g., "Safety Features")
4. Add individual features as a list
5. Repeat for additional groups ("Communication Features", "Integration Features", etc.)
6. Each group renders as a separate card in a responsive grid

### How to Attach a Datasheet

1. Go to the **Documentation** tab
2. In the **Datasheet** field, click "Add File" and upload/select the PDF
3. A "Download Datasheet" button appears automatically in the product actions area

### How to Add Additional Downloads

1. Still in the **Documentation** tab, scroll to **Additional Downloads**
2. Click "Add Download"
3. Enter a title (e.g., "User Guide", "Integration Notes") and upload the file
4. These appear in a "Documentation" section with file type and size

### How to Set Product Availability

1. In the **General** tab, find **Availability**
2. Select: In Stock, Limited Availability, Out of Stock, Pre-Order, or Contact for Availability
3. The status badge appears on the product page and in the admin list

### Admin Columns for Products

The Products admin list now shows: **Image | SKU | Price | Availability | Category**

### Template Files

| File | Purpose |
|------|---------|
| `single-product.php` | Single product detail page (gallery + info header, then feature groups, spec tables, docs, related) |
| `archive-product.php` | Product listing with category filters |

---

## 10. Expertise Pages — Full WordPress Manageability

Expertise pages are now fully manageable through **Expertise > Edit** in wp-admin.

### ACF Field Tabs for Expertise

All fields are organized in **4 tabs**:

| Tab | Fields | Description |
|-----|--------|-------------|
| **General** | Icon/Illustration, Subtitle, Short Description, Badges | Hero section content |
| **Services** | Key Services (repeater: name + description) | Service cards displayed as a grid |
| **Features & Cases** | Key Features (icon + text), Case Studies (title, summary, link) | Why-choose-us grid and portfolio |
| **Process & CTA** | Process Steps (numbered workflow), Call to Action (custom button text/link) | Certification or development process visualization |

### How to Add Process Steps

1. Go to **Expertise > Edit** and open the expertise post
2. Go to the **Process & CTA** tab
3. Click "Add Step" and enter a step title and description
4. Steps are automatically numbered with circular badges (1, 2, 3...)
5. Example: "Pre-Audit" → "Gap Analysis" → "Implementation" → "Certification"

### How to Set a Custom CTA

1. In the **Process & CTA** tab, scroll to **Call to Action**
2. Enter custom button text (e.g., "Discuss Your Project") and link URL
3. If left empty, defaults to "Contact Us" linking to `/contact/`

### How to Add Badges

1. In the **General** tab, find **Badges**
2. Click "Add Badge" and enter labels like `SIL3 Expertise`, `Bureau Veritas`, `ISO 26262`
3. These appear in the expertise hero section

### How to Add Case Studies

1. Go to the **Features & Cases** tab
2. Scroll to **Case Studies / Use Cases**
3. Click "Add Case Study" and fill in Title, Summary, and optional Link
4. These display as cards in a responsive grid

### Admin Columns for Expertise

The Expertise admin list now shows: **Icon | Subtitle**

### Template Files

| File | Purpose |
|------|---------|
| `single-expertise.php` | Single expertise detail page (overview, services grid, process steps, features, case studies, CTA) |
| `archive-expertise.php` | Expertise listing page |

---

## 11. WPML / Multilingual Field Configuration

All new fields are configured in the WPML config (`inc/wpml-integration.php`):

### Translatable Fields (need separate content per language)

**Expertise:** subtitle, short_description, badges, services, features, case_studies, process, cta

**Product:** features, feature_groups, spec_tables, specifications, downloads, badges

**Training:** objectives, prerequisites, audience, instructor, outline, benefits, private_price

### Copied Fields (same value in both languages)

**Product:** price, sku, availability, image, gallery, datasheet, related_products

**Training:** price, duration, level, format, certification, max_participants, syllabus, sessions

---

## 12. Summary of Changed Files (Latest Update)

| File | Change |
|------|--------|
| `azit-industrial/inc/custom-fields.php` | Complete rewrite: added tabbed UI for all 3 CPTs; added product gallery, availability, badges, feature groups, spec tables, downloads; added expertise subtitle, badges, features, case studies, process steps; added training syllabus PDF, outline with nested topics, objectives as repeater, instructor, benefits, format, certification, participants |
| `azit-industrial/inc/custom-post-types.php` | Added `training_category` taxonomy; updated admin columns for products (SKU, availability), expertise (subtitle) |
| `azit-industrial/single-product.php` | Rewritten with badges, gallery with thumbnails, feature groups grid, grouped spec tables, downloads section, related products, quote form |
| `azit-industrial/single-expertise.php` | Rewritten with badges, services card grid, process steps (numbered), features grid, case studies, wired CTA field with fallback |
| `azit-industrial/single-training.php` | Rewritten with 2-column layout (content left, sidebar right), badges, outline with nested topics, syllabus PDF download, instructor, benefits, sessions table; CTA section replaced with embedded CF7 training request form |
| `azit-industrial/archive-training.php` | "Request Custom Training" CTA replaced with embedded CF7 training request form |
| `azit-industrial/inc/contact-form-7.php` | Added `azit_create_training_request_form()` to auto-create CF7 training form on theme activation |
| `azit-industrial/page-templates/template-contact.php` | Fixed CF7 integration: contact form now properly looks up CF7 form by slug `contact-form`, with fallback chain (ACF field > slug lookup > any form > HTML fallback) |
| `azit-industrial/assets/css/components.css` | Added CSS for: training 2-column layout, product feature groups grid, spec tables grid, downloads list, expertise services grid, process steps with numbered circles, case studies grid, CTA sections |
| `azit-industrial/inc/wpml-integration.php` | Added all new translatable/copyable fields for products, expertise, and training; added training_category and training_level taxonomies |
| `azit-industrial/inc/sample-content.php` | Updated training sample content with new fields (max_participants, private_price, certification, instructor, category) |
