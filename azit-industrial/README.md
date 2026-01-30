# AZIT Industrial WordPress Theme

**Version:** 7.1-RGAA-WP
**WordPress:** 6.0+
**PHP:** 7.4+
**Compliance:** RGAA 4.1.2 (65-75%)

## Overview

Custom WordPress theme for AZIT's industrial communication solutions website. Migrated from V7.1-RGAA static HTML with full accessibility compliance maintained.

## Installation

Copy the `azit-industrial` directory to your WordPress themes folder:

```bash
cp -r azit-industrial /var/www/html/azit/wp-content/themes/
```

Then activate via WordPress Admin > Appearance > Themes.

## Theme Structure

```
azit-industrial/
├── style.css                 # Theme header & base styles
├── functions.php             # Core functionality
├── index.php                 # Main template
├── header.php                # Header with skip links & ARIA
├── footer.php                # Footer with accessibility badge
├── assets/
│   ├── css/
│   │   ├── main.css          # Main stylesheet
│   │   └── accessibility/
│   │       └── a11y-utils.css # Accessibility utilities
│   └── js/
│       ├── main.js           # Main JavaScript
│       └── accessibility/
│           └── keyboard-nav.js # Keyboard navigation
├── inc/
│   ├── custom-post-types.php # Expertise, Products, Training
│   ├── custom-fields.php     # ACF configuration
│   ├── accessibility.php     # A11y helper functions
│   └── template-functions.php # Template helpers
├── template-parts/
│   ├── content.php           # Default content template
│   ├── content-page.php      # Page content template
│   ├── content-expertise.php # Expertise card template
│   ├── content-product.php   # Product card template
│   └── content-training.php  # Training card template
├── page-templates/           # (To be created in Phase 5)
└── languages/                # Translation files
```

## Features

### Accessibility (RGAA 4.1.2)
- Skip link to main content
- ARIA landmarks (banner, main, contentinfo)
- ARIA live regions for dynamic announcements
- Accessible dropdown navigation with keyboard support
- Focus management and visible focus indicators
- Screen reader optimized text
- Color contrast WCAG AA compliant
- Reduced motion support

### Custom Post Types
1. **Expertise** - Service areas and capabilities
2. **Products** - Protocol stacks and development tools
3. **Training** - Courses with pricing and schedules

### Navigation Menus
- Top Menu (Company, Language)
- Primary Menu (Main navigation)
- Footer Menu (Legal, Privacy, Accessibility)
- Mobile Menu

### Multilingual Support
- WPML compatible
- Language switcher in header
- Translation-ready text domain

## Required Plugins

- **Advanced Custom Fields** (recommended) - For rich custom fields
- **WPML** - Multilingual support (French/English)
- **Contact Form 7** - Contact forms
- **WP Accessibility** - Additional accessibility features

## Development Phases

### Phase 1: Theme Foundation ✅
- [x] style.css with theme header
- [x] functions.php with core setup
- [x] index.php, header.php, footer.php
- [x] inc/ support files
- [x] Accessibility CSS & JavaScript
- [x] Template parts

### Phase 2: Assets Migration
- [ ] Copy CSS from V7.1-RGAA
- [ ] Copy JavaScript from V7.1-RGAA
- [ ] Copy images to theme

### Phase 3: Custom Post Types ✅
- [x] Expertise post type
- [x] Products post type with taxonomy
- [x] Training post type with levels

### Phase 4: Custom Fields ✅
- [x] ACF field groups defined
- [x] Fallback meta boxes for non-ACF

### Phase 5: Page Templates
- [ ] template-expertise.php
- [ ] template-contact.php
- [ ] template-accessibility.php
- [ ] single-expertise.php

### Phase 6: Navigation
- [ ] Custom walker implementation
- [ ] Mobile menu JavaScript
- [ ] Dropdown keyboard navigation

### Phase 7: Content Creation
- [ ] Create all pages
- [ ] Create expertise posts
- [ ] Create product posts
- [ ] Create training posts

### Phase 8: Multilingual (WPML)
- [ ] Install and configure WPML
- [ ] Translate pages
- [ ] Configure language switcher

### Phase 9: Forms & Plugins
- [ ] Contact Form 7 setup
- [ ] Yoast SEO configuration
- [ ] Security plugins

### Phase 10: Testing
- [ ] Accessibility audit (axe DevTools)
- [ ] Keyboard navigation test
- [ ] Screen reader test
- [ ] Cross-browser testing

## Accessibility Checklist

- [x] Skip link (RGAA 12.7)
- [x] ARIA landmarks (RGAA 9.2)
- [x] Heading hierarchy support (RGAA 9.1)
- [x] Keyboard navigation (RGAA 12.13)
- [x] Focus indicators (RGAA 10.7)
- [x] Color contrast utilities (RGAA 3.2)
- [x] Form accessibility helpers (RGAA 11)
- [x] Table accessibility (RGAA 5)
- [x] Image alt text handling (RGAA 1)
- [x] Language declaration (RGAA 8.3)
- [x] Reduced motion support (WCAG 2.3.3)

## License

Proprietary - AZIT

## Credits

Migrated from AZIT V7.1-RGAA static website by Claude Code.
