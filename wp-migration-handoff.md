# Claude Code - WordPress Migration Handoff

**Mission:** Migrate AZIT V7.1-RGAA static website to WordPress-based CMS while maintaining full RGAA 4.1.2 accessibility compliance.

**Source:** V7.1-RGAA (Static HTML/CSS/JS)  
**Target:** WordPress 6.4+ with custom theme  
**Accessibility:** RGAA 4.1.2 compliant (65-75%)  
**Languages:** French (primary) + English (WPML)

---

## QUICK START

```bash
# 1. Ensure WordPress is installed
# Visit: http://yoursite.com/wp-admin

# 2. Create theme directory
cd wp-content/themes/
mkdir azit-industrial
cd azit-industrial

# 3. Follow phases below in order
```

---

## MIGRATION PHASES

### ✅ **Phase 1: Theme Foundation** (Start Here)

**Create these core files first:**

1. `style.css` - Theme header and metadata
2. `functions.php` - Theme functionality
3. `index.php` - Main template
4. `header.php` - Header with skip links & ARIA
5. `footer.php` - Footer with accessibility badge

**Checkpoint:** Theme appears in WordPress > Appearance > Themes

---

### ✅ **Phase 2: Assets Migration**

**Copy from V7.1-RGAA:**

```bash
# Create directories
mkdir -p assets/css/accessibility
mkdir -p assets/js/accessibility
mkdir -p assets/images

# Copy files
cp [V7.1-RGAA]/src/styles/accessibility/a11y-utils.css assets/css/accessibility/
cp [V7.1-RGAA]/src/styles/main.css assets/css/
cp [V7.1-RGAA]/src/js/accessibility/keyboard-nav.js assets/js/accessibility/
cp [V7.1-RGAA]/src/js/main.js assets/js/
cp -r [V7.1-RGAA]/src/images/* assets/images/
```

**Update functions.php to enqueue these assets**

**Checkpoint:** View page source - CSS and JS loading correctly

---

### ✅ **Phase 3: Custom Post Types**

**Create:** `inc/custom-post-types.php`

**Register 3 post types:**
1. **Expertise** - slug: `expertise`
2. **Products** - slug: `products` (with taxonomy: product_category)
3. **Training** - slug: `training`

**Include in functions.php:**
```php
require get_template_directory() . '/inc/custom-post-types.php';
```

**Checkpoint:** WordPress admin shows "Expertise", "Products", "Training" menu items

---

### ✅ **Phase 4: Custom Fields (ACF)**

**Install plugin:** Advanced Custom Fields (free version)

**Create:** `inc/custom-fields.php`

**Define field groups for:**
1. Expertise (icon, short description, services list)
2. Products (image, price, features, datasheet)
3. Training (duration, price, level, objectives)

**Checkpoint:** Edit an Expertise post - custom fields appear

---

### ✅ **Phase 5: Page Templates**

**Create in `page-templates/` directory:**

1. `template-expertise.php` - Expertise overview with cards
2. `template-contact.php` - Contact page
3. `template-accessibility.php` - Accessibility statement

**Create:** `single-expertise.php` - Single expertise post template

**Checkpoint:** Create a page in WordPress, see "Template" dropdown with custom templates

---

### ✅ **Phase 6: Navigation**

**Update header.php with:**
- Top menu (Company dropdown, language switcher)
- Primary menu (Products, Solutions, Industries, Expertise, Training)
- Mobile menu toggle

**Create custom walker:** `AZIT_Walker_Nav_Menu` class in functions.php

**Checkpoint:** WordPress > Appearance > Menus - Create and assign menus

---

### ✅ **Phase 7: Content Creation**

**Create Pages (in WordPress admin):**
1. Home (set as front page)
2. About AZIT
3. About ISIT  
4. Team
5. Careers
6. Contact
7. Expertise (use template-expertise.php)
8. Legal Mentions
9. Privacy Policy
10. Accessibility Statement
11. Site Map

**Create Expertise Posts:**
1. Safety Compliance / Conformité Sécurité
2. Protocol Development / Développement Protocole
3. Testing & Validation / Test & Validation
4. Industrial Networks / Réseaux Industriels

**Checkpoint:** All pages visible on frontend, menus working

---

### ✅ **Phase 8: Multilingual (WPML)**

**Install plugins:**
1. WPML Multilingual CMS
2. WPML String Translation

**Configure:**
- Languages: French (default), English
- URL format: Different domains or subdirectories
- Translate all pages and posts

**Checkpoint:** Language switcher appears in header, pages available in both languages

---

### ✅ **Phase 9: Forms & Functionality**

**Install plugins:**
1. Contact Form 7 - Contact forms
2. Flamingo - Store submissions
3. Yoast SEO - SEO optimization
4. WP Accessibility - Additional accessibility features

**Create contact form with proper labels and ARIA**

**Checkpoint:** Submit test form, check Flamingo for submission

---

### ✅ **Phase 10: Testing & Optimization**

**Run tests:**
1. HTML validation (W3C)
2. axe DevTools accessibility scan
3. Keyboard navigation test
4. Screen reader test (NVDA/JAWS)
5. Mobile responsiveness
6. Cross-browser testing

**Checkpoint:** All tests pass, 0 critical accessibility issues

---

## CRITICAL WORDPRESS THEME FILES

### Minimum Required Files

1. **style.css** (theme header - required)
2. **index.php** (fallback template - required)
3. **functions.php** (theme functions - critical)
4. **header.php** (header with skip links)
5. **footer.php** (footer with accessibility badge)
6. **single.php** (single post template)
7. **page.php** (page template)
8. **archive.php** (archive template)

### Accessibility-Critical Files

1. **assets/css/accessibility/a11y-utils.css** (skip links, focus styles)
2. **assets/js/accessibility/keyboard-nav.js** (keyboard navigation)
3. **inc/custom-post-types.php** (post types)
4. **inc/custom-fields.php** (ACF configuration)

---

## KEY FUNCTIONS TO ADD

### In functions.php:

```php
// 1. Theme setup
add_action('after_setup_theme', 'azit_theme_setup');

// 2. Enqueue scripts
add_action('wp_enqueue_scripts', 'azit_enqueue_scripts');

// 3. Add skip link
add_action('wp_body_open', 'azit_add_skip_link');

// 4. Add ARIA live region
add_action('wp_body_open', 'azit_add_aria_live_region', 11);

// 5. Register menus
register_nav_menus(array(
    'top-menu' => 'Top Menu',
    'primary'  => 'Primary Menu',
    'footer'   => 'Footer Menu',
));

// 6. Custom walker for accessible navigation
class AZIT_Walker_Nav_Menu extends Walker_Nav_Menu { }
```

---

## WORDPRESS SETTINGS TO CONFIGURE

**Settings > General:**
- Site Title: AZIT - Solutions de Communication Industrielle
- Site Language: Français

**Settings > Reading:**
- Front page: Static page (select "Home")
- Posts page: Select "Blog"

**Settings > Permalinks:**
- Post name: `/%postname%/`

**Appearance > Menus:**
- Create "Top Menu" - assign to Top Menu location
- Create "Primary Menu" - assign to Primary location
- Create "Footer Menu" - assign to Footer location

---

## CONTENT MIGRATION CHECKLIST

### Standard Pages
- [ ] Home (set as front page)
- [ ] About AZIT
- [ ] About ISIT
- [ ] Team
- [ ] Careers
- [ ] Contact (with form)
- [ ] Legal Mentions
- [ ] Privacy Policy
- [ ] Accessibility Statement
- [ ] Site Map

### Expertise Posts (4)
- [ ] Safety Compliance
- [ ] Protocol Development
- [ ] Testing & Validation
- [ ] Industrial Networks

### Products
- [ ] Create product categories
- [ ] Add protocol stacks
- [ ] Add development tools

### Training
- [ ] Create training posts with pricing
- [ ] Add duration and level

### Media
- [ ] Upload all images to Media Library
- [ ] Set featured images for posts
- [ ] Optimize images

---

## ACCESSIBILITY VERIFICATION

**Must maintain from V7.1-RGAA:**

✅ Skip link (first element in body)  
✅ ARIA landmarks (banner, main, contentinfo)  
✅ Proper heading hierarchy (H1 → H2 → H3)  
✅ Keyboard navigation for menus  
✅ ARIA states (aria-expanded, aria-current)  
✅ Form labels and validation  
✅ Color contrast WCAG AA  
✅ Focus indicators  
✅ Alt text for images  
✅ Language declarations  
✅ Accessibility statement page  

---

## PLUGIN REQUIREMENTS

**Essential:**
- Advanced Custom Fields (free)
- WPML Multilingual CMS
- Contact Form 7
- WP Accessibility

**Recommended:**
- Yoast SEO
- Wordfence Security
- WP Super Cache
- Autoptimize

**Install via WP-CLI:**
```bash
wp plugin install advanced-custom-fields --activate
wp plugin install contact-form-7 --activate
wp plugin install wp-accessibility --activate
```

---

## TESTING COMMANDS

```bash
# Check theme files exist
ls -la wp-content/themes/azit-industrial/

# Check custom post types registered
wp post-type list

# Check menus
wp menu list

# Check pages
wp post list --post_type=page

# Check plugins
wp plugin list

# Test theme activation
wp theme activate azit-industrial
```

---

## COMMON ISSUES & SOLUTIONS

**Theme not appearing:**
- Check style.css has proper theme header
- Verify index.php exists
- Check file permissions

**Custom post types not showing:**
- Check inc/custom-post-types.php included
- Flush permalinks: Settings > Permalinks > Save

**Menu not showing:**
- Assign menu to location in Appearance > Menus
- Check wp_nav_menu() in header.php

**JavaScript not working:**
- Check wp_footer() in footer.php
- Verify scripts enqueued correctly
- Check browser console for errors

**Accessibility issues:**
- Verify a11y-utils.css loading first
- Check skip link has correct z-index
- Test keyboard navigation manually

---

## SUCCESS CRITERIA

✅ **Theme Activated:**
- Theme visible in Appearance > Themes
- Can be activated without errors

✅ **Accessibility Maintained:**
- axe DevTools: 0 critical issues
- Skip link appears on Tab
- Keyboard navigation works
- ARIA landmarks present

✅ **Content Manageable:**
- Can create/edit pages via admin
- Can create expertise posts with custom fields
- Can upload/manage images
- Menus editable via admin

✅ **Multilingual Working:**
- Language switcher in header
- Can translate pages/posts
- URL structure correct

✅ **Forms Functional:**
- Contact form submits
- Validation works
- Submissions stored

✅ **Performance:**
- Page load < 3 seconds
- CSS/JS minified
- Images optimized

---

## DEPLOYMENT CHECKLIST

**Pre-Launch:**
- [ ] All pages created
- [ ] All menus configured
- [ ] SSL certificate installed
- [ ] Backup system configured
- [ ] Security plugins active
- [ ] SEO configured
- [ ] Analytics installed
- [ ] Test all forms
- [ ] Test all links
- [ ] Run accessibility audit

**Launch:**
- [ ] Update DNS records
- [ ] Enable caching
- [ ] Submit sitemap to Google
- [ ] Monitor for 24-48 hours

**Post-Launch:**
- [ ] Monitor error logs
- [ ] Check analytics
- [ ] Review user feedback
- [ ] Schedule content updates

---

## ESTIMATED TIME

| Phase | Time |
|-------|------|
| Phase 1: Theme Foundation | 2-3 hours |
| Phase 2: Assets Migration | 1 hour |
| Phase 3: Custom Post Types | 1-2 hours |
| Phase 4: Custom Fields | 1-2 hours |
| Phase 5: Page Templates | 2-3 hours |
| Phase 6: Navigation | 1-2 hours |
| Phase 7: Content Creation | 8-12 hours |
| Phase 8: Multilingual | 2-3 hours |
| Phase 9: Forms & Plugins | 2-3 hours |
| Phase 10: Testing | 3-4 hours |

**Total:** 23-37 hours (3-5 days)

---

## DOCUMENTATION TO REFERENCE

1. **WordPress Migration Guide** (full details)
2. **V7.1-RGAA Specification** (accessibility requirements)
3. **Theme Development Handbook**: https://developer.wordpress.org/themes/

---

## READY TO START?

**Begin with Phase 1:**
1. Create theme directory
2. Create style.css with theme header
3. Create functions.php
4. Create index.php, header.php, footer.php
5. Activate theme in WordPress admin

**Then proceed phase by phase, testing after each checkpoint.**

Good luck! 🚀

---

**Questions?** Refer to the complete "AZIT V7.1-RGAA to WordPress Migration Guide" for detailed code examples and explanations.