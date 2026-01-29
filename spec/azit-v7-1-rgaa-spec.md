# AZIT Website - Complete Specification V7.1-RGAA

**Version:** 7.1-RGAA  
**Date:** January 2025  
**Purpose:** RGAA 4.1.2 Accessibility Compliance Implementation  
**Based on:** V7.0 + RGAA 4.1.2 Requirements

---

## DOCUMENT OVERVIEW

This specification updates V7.0 to achieve maximum compliance with RGAA 4.1.2 (Référentiel Général d'Amélioration de l'Accessibilité). The RGAA is based on WCAG 2.1 levels A and AA, adapted for French public sector requirements.

**Compliance Target:** Partial Compliance (≥50% of 106 RGAA criteria)  
**Ultimate Goal:** Total Compliance (100% of applicable criteria)

---

## 1. MANDATORY RGAA PAGES & DECLARATIONS

### 1.1 Accessibility Statement Page

**New Page Required:** `/accessibilite` (EN: `/accessibility`)

**Content Requirements:**
- Compliance status (Conformité totale/partielle/non-conforme)
- Audit date and methodology
- Non-accessible content list with reasons
- Feedback mechanism and complaint procedures
- Link to multi-year accessibility plan (schéma pluriannuel)
- Link to annual action plan

**Footer Link:** Accessible from ALL pages

### 1.2 Homepage Accessibility Badge

**Position:** Footer of homepage  
**Text Options:**
- "Accessibilité : totalement conforme" (100% criteria met)
- "Accessibilité : partiellement conforme" (≥50% criteria met)
- "Accessibilité : non conforme" (<50% criteria met)

**Link:** Badge links to `/accessibilite` page

---

## 2. IMAGES - RGAA THEME 1 (Critères 1.1-1.9)

### 2.1 Alternative Text Requirements

**All informative images MUST have:**
- `alt` attribute with meaningful description
- For decorative images: `alt=""` or `role="presentation"`
- For SVG images: `role="img"` + `<title>` or `aria-label`

**Implementation:**
```html
<!-- Informative image -->
<img src="safety-compliance.svg" alt="Safety compliance certification process diagram showing IEC 61508 and ISO 26262 standards" />

<!-- Decorative image -->
<img src="decorative-pattern.svg" alt="" role="presentation" />

<!-- SVG with accessibility -->
<svg role="img" aria-labelledby="svg-title">
  <title id="svg-title">Industrial network topology with CAN and EtherCAT nodes</title>
  <!-- SVG content -->
</svg>
```

### 2.2 Complex Images - Long Descriptions

For technical diagrams in expertise pages:

```html
<figure>
  <img src="protocol-stack.svg" alt="Protocol development stack overview" aria-describedby="protocol-desc" />
  <figcaption id="protocol-desc">
    Detailed description: This diagram shows the protocol development stack with three layers: 
    Application Layer (top) handling user requests, Protocol Layer (middle) managing CAN/EtherCAT 
    communication, and Hardware Interface Layer (bottom) connecting to physical devices.
  </figcaption>
</figure>
```

### 2.3 Image Buttons

All image-only buttons need accessible names:

```html
<button type="submit" aria-label="Search the website">
  <img src="search-icon.svg" alt="" />
</button>
```

---

## 3. COLOR & CONTRAST - RGAA THEME 3 (Critères 3.1-3.3)

### 3.1 Information Not Conveyed by Color Alone

**Rule:** Never use color as the ONLY way to convey information

**Current Issue Example:**
- Menu item showing "active" state only with color change

**Compliant Implementation:**
```html
<nav aria-label="Main navigation">
  <a href="/expertise" class="nav-link active" aria-current="page">
    Expertise
  </a>
</nav>
```

```css
.nav-link.active {
  color: #0891b2;
  font-weight: 700; /* Additional visual indicator */
  border-bottom: 3px solid #0891b2; /* Shape indicator */
}
```

### 3.2 Text Contrast Requirements

**Minimum Contrast Ratios:**
- Normal text (<24px or <18.5px bold): **4.5:1**
- Large text (≥24px or ≥18.5px bold): **3:1**

**V7.1-RGAA Color Palette Adjustments:**

| Element | V7 Color | RGAA Issue | V7.1-RGAA Fix |
|---------|----------|------------|---------------|
| Body text | #4a5568 | Pass (7.6:1) | Keep |
| Headings | #1a365d | Pass (9.2:1) | Keep |
| Links | #0891b2 | Check (3.8:1) | Use #0e7490 (4.6:1) |
| Dark blue bg | #0a1628 | N/A (bg only) | Keep |
| Secondary text | #64748b | Check (3.5:1) | Use #475569 (4.7:1) |

### 3.3 UI Component Contrast

**Minimum:** 3:1 for UI components and graphical elements

**Components to verify:**
- Form field borders
- Button outlines
- Focus indicators
- Menu separators
- Icon colors

```css
/* Form inputs */
.form-control {
  border: 2px solid #475569; /* 4.7:1 ratio */
}

.form-control:focus {
  outline: 3px solid #0e7490; /* 4.6:1 ratio */
  outline-offset: 2px;
}

/* Buttons */
.btn-primary {
  background: #0e7490; /* sufficient contrast on white */
  border: 2px solid #0e7490;
}
```

---

## 4. STRUCTURE - RGAA THEME 9 (Critères 9.1-9.4)

### 4.1 Heading Hierarchy

**Rule:** Logical heading structure with proper hierarchy

**V7.1-RGAA Heading Structure:**

```html
<!-- Homepage -->
<h1>AZIT - Industrial Communication Solutions</h1> <!-- Only one H1 per page -->
  <h2>Our Products</h2>
  <h2>Our Solutions</h2>
  <h2>Our Expertise</h2>
    <h3>Safety Compliance</h3>
    <h3>Protocol Development</h3>

<!-- Expertise page -->
<h1>Our Expertise</h1> <!-- Page title -->
  <h2>Safety Compliance</h2> <!-- Card titles -->
    <h3>Key Services</h3> <!-- Detail page subsections -->
```

**No skipping levels:** h1 → h2 → h3 (not h1 → h3)

### 4.2 Document Structure - HTML5 Landmarks

**Required landmarks:**

```html
<!DOCTYPE html>
<html lang="fr"> <!-- or lang="en" -->
<head>
  <title>Page Title - AZIT</title> <!-- Unique per page -->
</head>
<body>
  <!-- Top navigation -->
  <nav aria-label="Company links">
    <!-- Company, Blog, Language switcher -->
  </nav>
  
  <!-- Header -->
  <header role="banner">
    <a href="/" aria-label="AZIT Homepage">
      <img src="logo.svg" alt="AZIT" />
    </a>
    <nav aria-label="Main navigation">
      <!-- Main menu -->
    </nav>
  </header>
  
  <!-- Main content -->
  <main id="main-content" role="main">
    <!-- Skip to main content target -->
    <h1>Page Title</h1>
    <!-- Page content -->
  </main>
  
  <!-- Footer -->
  <footer role="contentinfo">
    <!-- Footer content -->
  </footer>
</body>
</html>
```

### 4.3 Lists

Use semantic HTML for lists:

```html
<!-- Menu items -->
<nav aria-label="Main navigation">
  <ul>
    <li><a href="/products">Products</a></li>
    <li><a href="/solutions">Solutions</a></li>
    <li><a href="/expertise">Expertise</a></li>
  </ul>
</nav>

<!-- Expertise cards -->
<section aria-labelledby="expertise-heading">
  <h2 id="expertise-heading">Our Expertise Areas</h2>
  <ul class="expertise-cards">
    <li>
      <article>
        <h3>Safety Compliance</h3>
        <!-- Card content -->
      </article>
    </li>
    <!-- More cards -->
  </ul>
</section>
```

---

## 5. LINKS - RGAA THEME 6 (Critères 6.1-6.2)

### 5.1 Link Purpose

**Rule:** Every link must have an accessible name that explains its purpose

**Explicit link text:**
```html
<!-- Good -->
<a href="/expertise/safety-compliance">
  Learn more about Safety Compliance services
</a>

<!-- Acceptable with context -->
<article>
  <h3>Safety Compliance</h3>
  <p>IEC 61508 and ISO 26262 certification support...</p>
  <a href="/expertise/safety-compliance">
    Learn more <span class="sr-only">about Safety Compliance</span>
  </a>
</article>
```

### 5.2 Link Titles

Link titles must match or expand visible text:

```html
<!-- If visible text is not explicit enough -->
<a href="/training" title="View our training courses and certifications">
  Training
</a>

<!-- Image link -->
<a href="/" aria-label="AZIT homepage">
  <img src="logo.svg" alt="AZIT" />
</a>
```

### 5.3 "Learn More" Links Enhancement

**V7 Pattern:** "Learn more →"  
**V7.1-RGAA Enhancement:** Add context

```html
<article aria-labelledby="safety-title">
  <h3 id="safety-title">Safety Compliance</h3>
  <p><!-- Description --></p>
  <a href="/expertise/safety-compliance" aria-labelledby="safety-link safety-title">
    <span id="safety-link">Learn more</span> →
  </a>
</article>
```

---

## 6. FORMS - RGAA THEME 11 (Critères 11.1-11.13)

### 6.1 Form Labels

**All form fields MUST have labels:**

```html
<form>
  <!-- Visible label -->
  <label for="name">Full Name <span aria-label="required">*</span></label>
  <input type="text" id="name" name="name" required aria-required="true" />
  
  <!-- Label with format hint -->
  <label for="email">
    Email Address <span aria-label="required">*</span>
    <span class="hint">(format: you@domain.com)</span>
  </label>
  <input type="email" id="email" name="email" required 
         aria-required="true" 
         aria-describedby="email-hint" />
  <span id="email-hint" class="hint">Enter your professional email</span>
</form>
```

### 6.2 Required Field Indication

Multiple methods to indicate required fields:

```html
<fieldset>
  <legend>Contact Information <span class="required-legend">(* required fields)</span></legend>
  
  <label for="company">
    Company Name <abbr title="required" aria-label="required">*</abbr>
  </label>
  <input type="text" id="company" required aria-required="true" />
</fieldset>
```

### 6.3 Error Messages

```html
<label for="phone">Phone Number <span aria-label="required">*</span></label>
<input type="tel" id="phone" 
       aria-required="true" 
       aria-invalid="true" 
       aria-describedby="phone-error" />
<span id="phone-error" class="error" role="alert">
  Please enter a valid phone number (format: +33 1 23 45 67 89)
</span>
```

### 6.4 Field Grouping

Related fields must be grouped:

```html
<fieldset>
  <legend>Date of Birth</legend>
  <label for="day">Day</label>
  <input type="number" id="day" min="1" max="31" />
  
  <label for="month">Month</label>
  <input type="number" id="month" min="1" max="12" />
  
  <label for="year">Year</label>
  <input type="number" id="year" min="1900" max="2025" />
</fieldset>
```

---

## 7. NAVIGATION - RGAA THEME 12 (Critères 12.1-12.11)

### 7.1 Skip Links

**Must be first focusable element:**

```html
<body>
  <a href="#main-content" class="skip-link">Skip to main content</a>
  
  <!-- Top nav -->
  <nav>...</nav>
  
  <!-- Main content -->
  <main id="main-content" tabindex="-1">
    <h1>Page Title</h1>
    <!-- Content -->
  </main>
</body>
```

```css
.skip-link {
  position: absolute;
  left: -9999px;
  z-index: 999;
  padding: 1em;
  background: #000;
  color: #fff;
  text-decoration: none;
}

.skip-link:focus {
  left: 0;
  top: 0;
}
```

### 7.2 Navigation Menu Aria Labels

```html
<!-- Top navigation -->
<nav aria-label="Company information and settings">
  <ul>
    <li><a href="/company">Company</a></li>
    <li><a href="/blog">Blog & News</a></li>
  </ul>
</nav>

<!-- Main navigation -->
<nav aria-label="Main navigation">
  <ul>
    <li><a href="/products">Products</a></li>
    <li><a href="/solutions">Solutions</a></li>
    <li><a href="/expertise" aria-current="page">Expertise</a></li>
  </ul>
</nav>

<!-- Footer navigation -->
<nav aria-label="Footer links">
  <ul>
    <li><a href="/legal">Legal Mentions</a></li>
    <li><a href="/privacy">Privacy Policy</a></li>
    <li><a href="/accessibilite">Accessibility</a></li>
  </ul>
</nav>
```

### 7.3 Breadcrumb

```html
<nav aria-label="Breadcrumb">
  <ol>
    <li><a href="/">Home</a></li>
    <li><a href="/expertise">Expertise</a></li>
    <li aria-current="page">Safety Compliance</li>
  </ol>
</nav>
```

### 7.4 Site Map

**New page required:** `/sitemap` or `/plan-du-site`

**Accessible from:** Footer on all pages

---

## 8. SCRIPTS & INTERACTIVE COMPONENTS - RGAA THEME 7

### 8.1 Dropdown Menus

```html
<li>
  <button aria-expanded="false" 
          aria-controls="products-menu"
          aria-haspopup="true">
    Products
  </button>
  <ul id="products-menu" hidden>
    <li><a href="/products/stacks">Protocol Stacks</a></li>
    <li><a href="/products/tools">Development Tools</a></li>
  </ul>
</li>
```

```javascript
// Keyboard navigation
button.addEventListener('click', () => {
  const expanded = button.getAttribute('aria-expanded') === 'true';
  button.setAttribute('aria-expanded', !expanded);
  menu.hidden = expanded;
});

button.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    button.setAttribute('aria-expanded', 'false');
    menu.hidden = true;
    button.focus();
  }
});
```

### 8.2 Language Switcher

```html
<div role="group" aria-label="Language selection">
  <button aria-label="Current language: English. Click to change language"
          aria-expanded="false"
          aria-controls="lang-menu">
    <span aria-hidden="true">🌐</span>
    <span class="sr-only">Language</span>
  </button>
  <ul id="lang-menu" hidden>
    <li><a href="/fr/" lang="fr" hreflang="fr">Français</a></li>
    <li><a href="/" lang="en" hreflang="en" aria-current="true">English</a></li>
  </ul>
</div>
```

### 8.3 Modal Dialogs

```html
<div role="dialog" 
     aria-modal="true" 
     aria-labelledby="modal-title"
     hidden>
  <h2 id="modal-title">Contact Form</h2>
  <button aria-label="Close dialog">×</button>
  <!-- Modal content -->
</div>
```

---

## 9. MANDATORY ELEMENTS - RGAA THEME 8

### 9.1 Language Declaration

```html
<html lang="fr"> <!-- French pages -->
<html lang="en"> <!-- English pages -->
```

### 9.2 Page Titles

**Format:** `[Page Name] - [Section] - AZIT`

**Examples:**
- `Safety Compliance - Expertise - AZIT`
- `Our Expertise - AZIT`
- `Homepage - AZIT`

```html
<head>
  <title>Safety Compliance - Expertise - AZIT</title>
  <meta name="description" content="Comprehensive safety compliance consulting for IEC 61508, ISO 26262 and other functional safety standards." />
</head>
```

### 9.3 Language Changes in Content

```html
<p>
  AZIT utilizes <span lang="en">Real-Time Operating Systems</span> (RTOS) 
  for industrial applications.
</p>
```

---

## 10. KEYBOARD NAVIGATION

### 10.1 Focus Management

**All interactive elements must be keyboard accessible:**

```css
/* Visible focus indicator */
a:focus,
button:focus,
input:focus,
select:focus,
textarea:focus {
  outline: 3px solid #0e7490;
  outline-offset: 2px;
}

/* Focus visible for keyboard users only */
a:focus-visible,
button:focus-visible,
input:focus-visible {
  outline: 3px solid #0e7490;
  outline-offset: 2px;
}

/* Remove focus for mouse users */
a:focus:not(:focus-visible) {
  outline: none;
}
```

### 10.2 Tab Order

Logical tab order following visual layout:

```html
<nav>
  <a href="/" tabindex="0">Home</a> <!-- Natural order -->
  <a href="/products">Products</a>
  <a href="/solutions">Solutions</a>
</nav>

<!-- Never use positive tabindex values -->
<!-- ❌ <button tabindex="1"> -->
```

### 10.3 Skip to Content

Already covered in Navigation section 7.1

---

## 11. RESPONSIVE & TEXT RESIZE

### 11.1 Text Resize (200%)

Content must be readable when zoomed to 200%:

```css
/* Use relative units */
body {
  font-size: 1rem; /* 16px base */
  line-height: 1.5;
}

h1 {
  font-size: 2.5rem; /* Scales with zoom */
}

/* Flexible layouts */
.container {
  max-width: 1200px;
  padding: 0 1rem;
  margin: 0 auto;
}

/* Responsive breakpoints */
@media (max-width: 768px) {
  .expertise-card {
    flex-direction: column;
  }
}
```

### 11.2 Reflow (Mobile viewport)

Content must reflow without horizontal scrolling at 320px width:

```css
/* Flexible images */
img {
  max-width: 100%;
  height: auto;
}

/* Breakable text */
.card-title {
  word-wrap: break-word;
  overflow-wrap: break-word;
}
```

---

## 12. TABLES (if applicable) - RGAA THEME 5

### 12.1 Data Tables

**If training pricing tables are implemented:**

```html
<table>
  <caption>Training Course Pricing</caption>
  <thead>
    <tr>
      <th scope="col">Course Name</th>
      <th scope="col">Duration</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">CANopen Fundamentals</th>
      <td>3 days</td>
      <td>1,500€</td>
    </tr>
  </tbody>
</table>
```

### 12.2 Layout Tables

**Avoid using tables for layout. If absolutely necessary:**

```html
<table role="presentation">
  <!-- No th, thead, caption elements -->
</table>
```

---

## 13. MULTIMEDIA - RGAA THEME 4

### 13.1 Video Requirements (if added)

**If demo videos are added:**

```html
<video controls>
  <source src="demo.mp4" type="video/mp4" />
  <track kind="captions" src="captions-fr.vtt" srclang="fr" label="Français" />
  <track kind="captions" src="captions-en.vtt" srclang="en" label="English" />
  <track kind="descriptions" src="descriptions.vtt" srclang="fr" />
  <p>Your browser doesn't support HTML5 video. 
     <a href="demo.mp4">Download the video</a>.</p>
</video>
```

---

## 14. SPECIFIC V7.1-RGAA UPDATES

### 14.1 Expertise Page Cards

**Updated HTML structure:**

```html
<article class="expertise-card" aria-labelledby="safety-title">
  <div class="expertise-content">
    <h2 id="safety-title">Safety Compliance</h2>
    <p>
      AZIT provides comprehensive safety compliance consulting to help you 
      navigate complex certification requirements...
    </p>
    <a href="/expertise/safety-compliance" aria-labelledby="safety-link safety-title">
      <span id="safety-link">Learn more</span>
      <span aria-hidden="true"> →</span>
      <span class="sr-only"> about Safety Compliance services</span>
    </a>
  </div>
  <div class="expertise-illustration" aria-hidden="true">
    <img src="safety-compliance-illustration.svg" alt="" role="presentation" />
  </div>
</article>
```

### 14.2 Top Navigation Dropdown

```html
<nav aria-label="Company information">
  <ul>
    <li>
      <button aria-expanded="false" 
              aria-controls="company-menu"
              aria-haspopup="true">
        Company
      </button>
      <ul id="company-menu" hidden>
        <li><a href="/about-azit">About AZIT</a></li>
        <li><a href="/about-isit">About ISIT</a></li>
        <li><a href="/team">Team</a></li>
        <li><a href="/careers">Careers</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </li>
  </ul>
</nav>
```

---

## 15. TESTING & VALIDATION REQUIREMENTS

### 15.1 Automated Testing Tools

**Required validators:**
1. **HTML Validator:** W3C Markup Validation Service
2. **axe DevTools:** Browser extension for automated accessibility testing
3. **WAVE:** Web Accessibility Evaluation Tool
4. **Lighthouse:** Chrome DevTools Accessibility audit

### 15.2 Manual Testing Requirements

**Keyboard navigation:**
- Tab through entire page
- All interactive elements reachable
- Visible focus indicator
- Logical tab order

**Screen reader testing:**
- NVDA (Windows - free)
- JAWS (Windows - paid)
- VoiceOver (Mac - built-in)

**Color/Contrast:**
- Contrast ratio checker
- Grayscale view test
- Color blindness simulator

### 15.3 Audit Sampling

**Minimum pages to audit:**
1. Homepage `/`
2. Accessibility page `/accessibilite`
3. Legal mentions `/mentions-legales`
4. Contact page `/contact`
5. Expertise overview `/expertise`
6. One expertise detail page `/expertise/safety-compliance`
7. Products page `/products`
8. Training page `/training`
9. Blog/News page (if exists)
10. Additional representative pages (10% random sample)

---

## 16. PRIORITY IMPLEMENTATION ROADMAP

### Phase 1 - Critical (Week 1)
✓ Add language declarations  
✓ Create accessibility statement page  
✓ Add skip links  
✓ Fix heading hierarchy  
✓ Add ARIA landmarks  
✓ Add form labels and required indicators  

### Phase 2 - High Priority (Week 2)
✓ Update alt texts for all images  
✓ Fix color contrast issues  
✓ Make dropdown menus keyboard accessible  
✓ Add aria-current to navigation  
✓ Improve link text clarity  

### Phase 3 - Medium Priority (Week 3-4)
✓ Create site map page  
✓ Add breadcrumbs  
✓ Implement focus management  
✓ Add ARIA labels to all navigation  
✓ Test and fix keyboard navigation  

### Phase 4 - Enhancement (Ongoing)
✓ Screen reader testing and refinement  
✓ User testing with assistive technologies  
✓ Performance optimization  
✓ Documentation and training  

---

## 17. COMPLIANCE DOCUMENTATION

### 17.1 Accessibility Statement Template

**To be created at `/accessibilite`:**

```
DÉCLARATION D'ACCESSIBILITÉ

[Nom de l'organisme] s'engage à rendre son site internet accessible conformément 
à l'article 47 de la loi n° 2005-102 du 11 février 2005.

Cette déclaration d'accessibilité s'applique au site [URL].

ÉTAT DE CONFORMITÉ

Le site [URL] est en conformité partielle avec le référentiel général 
d'amélioration de l'accessibilité (RGAA) version 4.1.2, en raison des 
non-conformités énumérées ci-dessous.

RÉSULTATS DES TESTS

L'audit de conformité réalisé le [date] révèle que :
- [XX]% des critères du RGAA version 4.1.2 sont respectés.

CONTENUS NON ACCESSIBLES

Les contenus listés ci-dessous ne sont pas accessibles pour les raisons suivantes :

Non-conformités :
[Liste des critères non conformes]

Contenus exemptés :
[Liste si applicable]

ÉTABLISSEMENT DE CETTE DÉCLARATION D'ACCESSIBILITÉ

Cette déclaration a été établie le [date].

TECHNOLOGIES UTILISÉES

- HTML5
- CSS3
- JavaScript

AGENTS UTILISATEURS ET TECHNOLOGIES D'ASSISTANCE

Les tests ont été effectués avec les combinaisons suivantes :
- NVDA / Firefox / Windows
- JAWS / Chrome / Windows  
- VoiceOver / Safari / macOS

OUTILS POUR ÉVALUER L'ACCESSIBILITÉ

- WAVE
- axe DevTools
- Contrast Checker
- Validateur HTML W3C

RETOUR D'INFORMATION ET CONTACT

Si vous n'arrivez pas à accéder à un contenu ou à un service, vous pouvez 
contacter [nom] pour être orienté vers une alternative accessible ou obtenir 
le contenu sous une autre forme.

- Envoyer un message : [email]
- Contacter [nom du responsable] : [téléphone]

VOIES DE RECOURS

Cette procédure est à utiliser dans le cas suivant : vous avez signalé au 
responsable du site internet un défaut d'accessibilité qui vous empêche d'accéder 
à un contenu ou à un des services du portail et vous n'avez pas obtenu de réponse 
satisfaisante.

Vous pouvez :
- Écrire un message au Défenseur des droits
- Contacter le délégué du Défenseur des droits dans votre région
```

---

## 18. CSS ACCESSIBILITY ADDITIONS

### 18.1 Screen Reader Only Class

```css
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

.sr-only-focusable:active,
.sr-only-focusable:focus {
  position: static;
  width: auto;
  height: auto;
  overflow: visible;
  clip: auto;
  white-space: normal;
}
```

### 18.2 Focus Styles

```css
/* High contrast focus */
:focus {
  outline: 3px solid #0e7490;
  outline-offset: 2px;
}

/* Skip link */
.skip-link {
  position: absolute;
  top: -40px;
  left: 0;
  background: #000;
  color: #fff;
  padding: 8px;
  text-decoration: none;
  z-index: 100;
}

.skip-link:focus {
  top: 0;
}

/* Keyboard focus only (not mouse) */
*:focus:not(:focus-visible) {
  outline: none;
}

*:focus-visible {
  outline: 3px solid #0e7490;
  outline-offset: 2px;
}
```

### 18.3 Reduced Motion

```css
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
```

---

## 19. JAVASCRIPT ACCESSIBILITY PATTERNS

### 19.1 Keyboard Trap Prevention

```javascript
// Ensure users can escape from all interactive components
modal.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    closeModal();
    triggerButton.focus();
  }
  
  // Trap focus within modal
  if (e.key === 'Tab') {
    const focusableElements = modal.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );
    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];
    
    if (e.shiftKey && document.activeElement === firstElement) {
      lastElement.focus();
      e.preventDefault();
    } else if (!e.shiftKey && document.activeElement === lastElement) {
      firstElement.focus();
      e.preventDefault();
    }
  }
});
```

### 19.2 Live Regions for Dynamic Content

```javascript
// Announce dynamic changes
const announcer = document.getElementById('aria-live-region');

function announce(message) {
  announcer.textContent = message;
  setTimeout(() => {
    announcer.textContent = '';
  }, 1000);
}

// Usage
form.addEventListener('submit', (e) => {
  e.preventDefault();
  // ... submit logic
  announce('Form submitted successfully');
});
```

```html
<div id="aria-live-region" 
     aria-live="polite" 
     aria-atomic="true" 
     class="sr-only"></div>
```

---

## SUMMARY OF CHANGES FROM V7.0 TO V7.1-RGAA

### New Pages
✓ `/accessibilite` - Accessibility statement (required)  
✓ `/sitemap` - Site map  

### Enhanced HTML
✓ Language declarations on all pages  
✓ ARIA landmarks (header, main, nav, footer)  
✓ ARIA labels for navigation regions  
✓ Proper heading hierarchy  
✓ Skip links  
✓ aria-current for active navigation  

### Enhanced CSS
✓ Improved color contrast ratios  
✓ Visible focus indicators  
✓ Screen reader only utility class  
✓ Reduced motion support  

### Enhanced JavaScript
✓ Keyboard navigation for dropdowns  
✓ Focus management  
✓ ARIA state management (expanded, hidden)  
✓ Keyboard trap prevention  

### Image Updates
✓ All images have meaningful alt text  
✓ Decorative images marked with alt=""  
✓ Complex diagrams with long descriptions  
✓ SVG accessibility attributes  

### Form Improvements
✓ All fields have labels  
✓ Required fields clearly indicated  
✓ Error messages properly associated  
✓ Field grouping with fieldset/legend  

### Navigation Enhancements
✓ Multiple navigation regions with labels  
✓ Breadcrumb trails  
✓ Improved link text clarity  
✓ Footer accessibility links  

---

## MAINTENANCE & MONITORING

### Regular Checks
- Monthly automated scans (axe, WAVE)
- Quarterly manual audits
- Annual comprehensive RGAA audit
- Update accessibility statement after each audit

### Content Guidelines
- All new content must follow RGAA guidelines
- Images require alt text before publication
- Forms must have proper labels
- Links must have clear purpose

---

*End of AZIT Website Specification V7.1-RGAA*