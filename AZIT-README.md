# AZIT Website Mockup

A responsive HTML/CSS/JavaScript mockup website for AZIT, an industrial protocol stacks brand of ISIT.

## Overview

This is a production-ready website mockup featuring:
- Responsive design (mobile-first approach)
- Modern, clean UI with developer-focused aesthetics
- Multi-language support (FR/EN) infrastructure
- Comprehensive product and service pages
- SEO-optimized structure
- Accessibility compliant (WCAG 2.1 AA)

## Technology Stack

- **HTML5**: Semantic markup
- **CSS3**: Modern CSS with CSS Variables for theming
- **JavaScript**: Vanilla JavaScript (ES6+)
- **Fonts**: Inter (via Google Fonts)
- **Icons**: Text-based placeholders (ready for icon library integration)

## Project Structure

```
azit-website/
├── index.html                  # Homepage
├── css/
│   ├── variables.css          # Design tokens (colors, spacing, typography)
│   ├── base.css               # Reset and base styles
│   ├── components.css         # Reusable UI components
│   ├── layout.css             # Layout structures (header, footer, grids)
│   └── pages.css              # Page-specific styles
├── js/
│   ├── main.js                # General functionality
│   ├── navigation.js          # Mobile menu and navigation
│   └── language-switcher.js  # Multi-language support
├── assets/
│   ├── images/                # Image assets (placeholders)
│   │   ├── logos/
│   │   ├── products/
│   │   ├── partners/
│   │   ├── diagrams/
│   │   └── icons/
│   └── fonts/                 # Custom fonts (if any)
├── pages/
│   ├── products/              # Product pages
│   │   ├── communication-stacks.html
│   │   ├── fsoe-slave.html
│   │   ├── fsoe-master.html
│   │   ├── canopen-slave.html
│   │   ├── canopen-master.html
│   │   ├── canopen-safety-slave.html
│   │   ├── canopen-safety-master.html
│   │   ├── j1939.html
│   │   ├── opc-ua.html (coming soon)
│   │   ├── tools.html
│   │   └── analyzers.html
│   ├── services/              # Service pages
│   │   ├── porting.html
│   │   ├── maintenance.html
│   │   ├── expertise.html
│   │   ├── expertise-development.html
│   │   ├── expertise-testing.html
│   │   └── expertise-networks.html
│   ├── documentation.html
│   ├── training.html
│   ├── blog.html
│   ├── company.html
│   └── contact.html
└── README.md
```

## Setup Instructions

### 1. Local Development

No build process required! Simply open `index.html` in a modern web browser.

**Recommended**: Use a local development server for best results:

#### Using Python:
```bash
# Python 3
python -m http.server 8000

# Python 2
python -m SimpleHTTPServer 8000
```

#### Using Node.js (http-server):
```bash
npm install -g http-server
http-server -p 8000
```

#### Using PHP:
```bash
php -S localhost:8000
```

Then open `http://localhost:8000` in your browser.

### 2. Browser Compatibility

The website is compatible with:
- Chrome/Edge (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Mobile browsers (iOS Safari, Chrome Mobile)

**Note**: CSS Grid and Flexbox are used extensively. IE11 is not supported.

## Features

### Responsive Design

The website adapts to different screen sizes:
- **Mobile**: max-width: 767px
- **Tablet**: 768px - 1023px
- **Desktop**: 1024px - 1439px
- **Large Desktop**: 1440px+

### Interactive Components

- Sticky header with scroll behavior
- Mobile hamburger menu
- Mega menus for products and services
- Tabbed content sections
- Code block copy functionality
- Form validation
- Language switcher (FR/EN)

### Accessibility Features

- Semantic HTML5 elements
- ARIA labels and roles
- Keyboard navigation support
- Skip-to-content link
- Focus visible states
- Sufficient color contrast

## Customization

### Colors

All colors are defined in `css/variables.css` using CSS custom properties:

```css
:root {
  --color-primary: #0066CC;
  --color-secondary: #FF6B00;
  /* ... */
}
```

Update these variables to match your brand colors.

### Typography

Fonts can be changed in `css/variables.css`:

```css
:root {
  --font-family-base: 'Inter', sans-serif;
  --font-family-code: 'Fira Code', monospace;
}
```

### Spacing & Layout

Spacing units and layout widths are centralized in `css/variables.css`.

## Content Updates

### Adding New Pages

1. Create a new HTML file in the appropriate directory
2. Copy the structure from an existing page
3. Update the content
4. Add links in the navigation and footer

### Updating Navigation

Edit the `<nav>` section in each page's header. Consider creating a template or using a static site generator for easier maintenance in production.

### Language Support

The current implementation includes:
- Language switcher UI
- Data attribute structure for translations
- LocalStorage for preference saving

To fully implement multi-language support:
1. Create French versions of pages in `/fr/` directory
2. Expand the `translations` object in `js/language-switcher.js`
3. Or use a translation management system

## Integration with Real Images

1. Replace placeholder text with actual images in `/assets/images/`
2. Update references in HTML files
3. See `PLACEHOLDER-IMAGES.md` for a complete list of required images

## Next Steps for Production

1. **Add Real Content**: Replace placeholder text with actual product descriptions
2. **Implement Backend**: Connect forms to email/CRM system
3. **Optimize Images**: Compress and optimize all images
4. **Add Analytics**: Integrate Google Analytics or alternative
5. **SEO Enhancement**: Add structured data (JSON-LD)
6. **Performance**: Implement lazy loading, minification, CDN
7. **Security**: Add CSRF protection, rate limiting for forms
8. **Testing**: Cross-browser testing, accessibility audit
9. **Deployment**: Set up hosting, SSL certificate, CDN

## Technical Notes

### CSS Architecture

The CSS follows a modular approach:
1. **variables.css**: Design tokens
2. **base.css**: Reset and global styles
3. **components.css**: Reusable components (buttons, cards, etc.)
4. **layout.css**: Layout structures (header, footer, grids)
5. **pages.css**: Page-specific styles

### JavaScript Architecture

JavaScript is organized into:
1. **main.js**: General functionality (tabs, forms, etc.)
2. **navigation.js**: Menu and navigation logic
3. **language-switcher.js**: Multi-language support

All scripts use IIFE pattern to avoid global scope pollution.

## Support

For questions about this mockup implementation, refer to the specification document `azit-website-specV1.md`.

## License

© 2025 AZIT - ISIT. All rights reserved.

---

**Version**: 1.0
**Last Updated**: January 2025
**Status**: Mockup/Prototype
