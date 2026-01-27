# AZIT Website Update: V6.4 → V7.0
## Expertise Section Redesign & Menu Simplification

**Version Update:** 6.4 → 7.0  
**Date:** January 2025  
**Impact Level:** HIGH - Navigation restructure + New page design pattern

---

## EXECUTIVE SUMMARY

### What Changed in V7.0

| Category | Changes | Impact |
|----------|---------|--------|
| **Menu Rename** | "Services" → "Expertise" | MEDIUM - Navigation update |
| **Menu Behavior** | Expertise is now clickable link (not dropdown) | MEDIUM - Navigation change |
| **Pages Deleted** | Integration, Porting, Support, Maintenance | HIGH - Remove 8 pages |
| **Pages Created** | Expertise overview + 4 detail pages | HIGH - Create 10 pages |
| **Design Pattern** | New split-layout card design | HIGH - New CSS + HTML |

---

## SECTION 1: MENU CHANGES

### 1.1 Rename Services to Expertise

**BEFORE (V6.4):**
```html
<nav class="main-navigation">
  <ul>
    <li><a href="/products">Products</a></li>
    <li><a href="/solutions">Solutions</a></li>
    <li><a href="/industries">Industries</a></li>
    <li class="dropdown">
      <a href="#">Services</a>
      <ul class="dropdown-menu">
        <li><a href="/services/integration">Integration</a></li>
        <li><a href="/services/porting">Porting Activity</a></li>
        <li><a href="/services/support">Support</a></li>
        <li><a href="/services/maintenance">Maintenance</a></li>
        <!-- more items -->
      </ul>
    </li>
    <li><a href="/training">Training</a></li>
  </ul>
</nav>
```

**AFTER (V7.0):**
```html
<nav class="main-navigation">
  <ul>
    <li><a href="/products">Products</a></li>
    <li><a href="/solutions">Solutions</a></li>
    <li><a href="/industries">Industries</a></li>
    <li><a href="/expertise">Expertise</a></li>  <!-- Direct link, NOT dropdown -->
    <li><a href="/training">Training</a></li>
  </ul>
</nav>
```

### 1.2 French Navigation

```html
<!-- French version -->
<li><a href="/fr/expertise">Expertise</a></li>
```

---

## SECTION 2: PAGES TO DELETE

### 2.1 English Pages to DELETE

```
DELETE: /services/integration.html
DELETE: /services/porting.html
DELETE: /services/support.html
DELETE: /services/maintenance.html
DELETE: /services/index.html (if exists)
```

### 2.2 French Pages to DELETE

```
DELETE: /fr/services/integration.html
DELETE: /fr/services/portage.html
DELETE: /fr/services/support.html
DELETE: /fr/services/maintenance.html
DELETE: /fr/services/index.html (if exists)
```

### 2.3 Remove All References

**Search and remove links to deleted pages from:**
- Navigation menus
- Footer links
- Sitemap
- Internal page links
- Any "Related Services" sections

---

## SECTION 3: CREATE EXPERTISE OVERVIEW PAGE

### 3.1 English Version: /expertise/index.html

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Our Expertise - AZIT</title>
  <meta name="description" content="AZIT expertise in safety compliance, protocol development, testing & validation, and industrial networks.">
</head>
<body>
  <!-- Top Menu + Main Navigation (include from template) -->
  
  <main class="expertise-page">
    <!-- Page Header -->
    <header class="expertise-page-header">
      <div class="container">
        <h1>Our Expertise</h1>
        <p class="subtitle">
          Leveraging 30+ years of industrial communication experience 
          to deliver comprehensive solutions
        </p>
      </div>
    </header>
    
    <!-- Expertise Cards -->
    <section class="expertise-cards">
      <div class="container">
        
        <!-- Expertise 1: Safety Compliance -->
        <article class="expertise-card">
          <div class="expertise-content">
            <h2>Safety Compliance</h2>
            <p>
              AZIT provides comprehensive safety compliance consulting to help you 
              navigate complex certification requirements. From gap analysis to 
              documentation support, we guide you through IEC 61508, ISO 26262, 
              and other functional safety standards.
            </p>
            <a href="/expertise/safety-compliance" class="expertise-link">
              Learn more <span class="arrow">→</span>
            </a>
          </div>
          <div class="expertise-illustration">
            <img src="/assets/illustrations/safety-compliance.svg" 
                 alt="Safety Compliance illustration">
          </div>
        </article>
        
        <!-- Expertise 2: Protocol Development -->
        <article class="expertise-card">
          <div class="expertise-content">
            <h2>Protocol Development</h2>
            <p>
              Our expert team develops custom protocol implementations tailored 
              to your specific requirements. Whether you need modifications to 
              existing stacks or entirely new protocol solutions, we deliver 
              production-ready, certifiable code.
            </p>
            <a href="/expertise/protocol-development" class="expertise-link">
              Learn more <span class="arrow">→</span>
            </a>
          </div>
          <div class="expertise-illustration">
            <img src="/assets/illustrations/protocol-development.svg" 
                 alt="Protocol Development illustration">
          </div>
        </article>
        
        <!-- Expertise 3: Testing & Validation -->
        <article class="expertise-card">
          <div class="expertise-content">
            <h2>Testing & Validation</h2>
            <p>
              Ensure your implementations meet the highest quality standards with 
              our comprehensive testing and validation services. We provide 
              conformance testing, interoperability validation, and performance 
              analysis for industrial communication protocols.
            </p>
            <a href="/expertise/testing-validation" class="expertise-link">
              Learn more <span class="arrow">→</span>
            </a>
          </div>
          <div class="expertise-illustration">
            <img src="/assets/illustrations/testing-validation.svg" 
                 alt="Testing & Validation illustration">
          </div>
        </article>
        
        <!-- Expertise 4: Industrial Networks -->
        <article class="expertise-card">
          <div class="expertise-content">
            <h2>Industrial Networks</h2>
            <p>
              AZIT brings you tailored solutions based on field communication 
              protocols. With 30+ years of expertise in CAN, CANopen, EtherCAT, 
              and other industrial networks, we help you design, implement, and 
              optimize your communication architecture.
            </p>
            <a href="/expertise/industrial-networks" class="expertise-link">
              Learn more <span class="arrow">→</span>
            </a>
          </div>
          <div class="expertise-illustration">
            <img src="/assets/illustrations/industrial-networks.svg" 
                 alt="Industrial Networks illustration">
          </div>
        </article>
        
      </div>
    </section>
    
    <!-- CTA Section -->
    <section class="expertise-cta">
      <div class="container">
        <h2>Need Expert Guidance?</h2>
        <p>Contact our team to discuss your specific requirements</p>
        <a href="/contact" class="btn btn-primary">Get in Touch</a>
      </div>
    </section>
    
  </main>
  
  <!-- Footer (include from template) -->
</body>
</html>
```

### 3.2 French Version: /fr/expertise/index.html

```html
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Notre Expertise - AZIT</title>
  <meta name="description" content="L'expertise AZIT en conformité sécurité, développement protocole, test & validation, et réseaux industriels.">
</head>
<body>
  <main class="expertise-page">
    <header class="expertise-page-header">
      <div class="container">
        <h1>Notre Expertise</h1>
        <p class="subtitle">
          Plus de 30 ans d'expérience en communication industrielle 
          au service de solutions complètes
        </p>
      </div>
    </header>
    
    <section class="expertise-cards">
      <div class="container">
        
        <!-- Expertise 1: Conformité Sécurité -->
        <article class="expertise-card">
          <div class="expertise-content">
            <h2>Conformité Sécurité</h2>
            <p>
              AZIT propose des services complets de conseil en conformité sécurité 
              pour vous aider à naviguer les exigences de certification complexes. 
              De l'analyse des écarts au support documentaire, nous vous guidons 
              à travers les normes IEC 61508, ISO 26262 et autres standards de 
              sécurité fonctionnelle.
            </p>
            <a href="/fr/expertise/conformite-securite" class="expertise-link">
              En savoir plus <span class="arrow">→</span>
            </a>
          </div>
          <div class="expertise-illustration">
            <img src="/assets/illustrations/safety-compliance.svg" 
                 alt="Illustration Conformité Sécurité">
          </div>
        </article>
        
        <!-- Expertise 2: Développement Protocole -->
        <article class="expertise-card">
          <div class="expertise-content">
            <h2>Développement Protocole</h2>
            <p>
              Notre équipe d'experts développe des implémentations de protocoles 
              personnalisées selon vos besoins spécifiques. Que vous ayez besoin 
              de modifications sur des piles existantes ou de solutions protocolaires 
              entièrement nouvelles, nous livrons du code certifiable et prêt pour 
              la production.
            </p>
            <a href="/fr/expertise/developpement-protocole" class="expertise-link">
              En savoir plus <span class="arrow">→</span>
            </a>
          </div>
          <div class="expertise-illustration">
            <img src="/assets/illustrations/protocol-development.svg" 
                 alt="Illustration Développement Protocole">
          </div>
        </article>
        
        <!-- Expertise 3: Test & Validation -->
        <article class="expertise-card">
          <div class="expertise-content">
            <h2>Test & Validation</h2>
            <p>
              Assurez-vous que vos implémentations respectent les plus hauts 
              standards de qualité grâce à nos services complets de test et 
              validation. Nous proposons des tests de conformité, la validation 
              d'interopérabilité et l'analyse de performance pour les protocoles 
              de communication industriels.
            </p>
            <a href="/fr/expertise/test-validation" class="expertise-link">
              En savoir plus <span class="arrow">→</span>
            </a>
          </div>
          <div class="expertise-illustration">
            <img src="/assets/illustrations/testing-validation.svg" 
                 alt="Illustration Test & Validation">
          </div>
        </article>
        
        <!-- Expertise 4: Réseaux Industriels -->
        <article class="expertise-card">
          <div class="expertise-content">
            <h2>Réseaux Industriels</h2>
            <p>
              AZIT vous apporte une solution adaptée à votre besoin en s'appuyant 
              sur des protocoles de communication terrain. Avec plus de 30 ans 
              d'expertise en CAN, CANopen, EtherCAT et autres réseaux industriels, 
              nous vous aidons à concevoir, implémenter et optimiser votre 
              architecture de communication.
            </p>
            <a href="/fr/expertise/reseaux-industriels" class="expertise-link">
              En savoir plus <span class="arrow">→</span>
            </a>
          </div>
          <div class="expertise-illustration">
            <img src="/assets/illustrations/industrial-networks.svg" 
                 alt="Illustration Réseaux Industriels">
          </div>
        </article>
        
      </div>
    </section>
    
    <section class="expertise-cta">
      <div class="container">
        <h2>Besoin d'un accompagnement expert ?</h2>
        <p>Contactez notre équipe pour discuter de vos besoins spécifiques</p>
        <a href="/fr/contact" class="btn btn-primary">Nous contacter</a>
      </div>
    </section>
  </main>
</body>
</html>
```

---

## SECTION 4: CSS FOR EXPERTISE PATTERN

```css
/* ============================================
   EXPERTISE PAGE STYLES
   ============================================ */

/* Page Layout */
.expertise-page {
  padding: 4rem 0;
  background: #f8fafc;
}

.expertise-page-header {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 4rem;
  padding: 0 1rem;
}

.expertise-page-header h1 {
  font-size: 2.5rem;
  font-weight: 700;
  color: #1a365d;
  margin-bottom: 1rem;
}

.expertise-page-header .subtitle {
  font-size: 1.2rem;
  color: #4a5568;
  line-height: 1.6;
}

/* Expertise Cards Container */
.expertise-cards {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

/* Individual Expertise Card */
.expertise-card {
  display: flex;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  margin-bottom: 2.5rem;
  min-height: 320px;
  background: #ffffff;
}

.expertise-card:hover {
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

/* Left Content Area (White Background) */
.expertise-content {
  flex: 1;
  padding: 3rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.expertise-content h2 {
  font-size: 1.75rem;
  font-weight: 700;
  color: #1a365d;
  margin: 0 0 1rem 0;
}

.expertise-content p {
  color: #4a5568;
  line-height: 1.7;
  margin: 0 0 1.5rem 0;
  font-size: 1rem;
}

/* "Learn more" / "En savoir plus" Link */
.expertise-link {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  color: #0891b2;
  font-weight: 600;
  text-decoration: none;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.expertise-link:hover {
  color: #0e7490;
  gap: 0.75rem;
}

.expertise-link .arrow {
  transition: transform 0.3s ease;
}

.expertise-link:hover .arrow {
  transform: translateX(4px);
}

/* Right Illustration Area (Dark Blue Background) */
.expertise-illustration {
  flex: 1;
  background: linear-gradient(135deg, #0a1628 0%, #1e3a5f 50%, #0a1628 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem;
  position: relative;
  overflow: hidden;
}

/* Technical pattern overlay */
.expertise-illustration::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: 
    radial-gradient(circle at 20% 30%, rgba(255,255,255,0.03) 0%, transparent 50%),
    radial-gradient(circle at 80% 70%, rgba(255,255,255,0.02) 0%, transparent 40%),
    linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.01) 50%, transparent 60%);
  pointer-events: none;
}

.expertise-illustration img {
  max-width: 90%;
  max-height: 90%;
  object-fit: contain;
  position: relative;
  z-index: 1;
}

/* CTA Section */
.expertise-cta {
  text-align: center;
  padding: 4rem 1rem;
  margin-top: 2rem;
}

.expertise-cta h2 {
  font-size: 1.75rem;
  color: #1a365d;
  margin-bottom: 0.5rem;
}

.expertise-cta p {
  color: #4a5568;
  margin-bottom: 1.5rem;
}

/* ============================================
   RESPONSIVE STYLES
   ============================================ */

@media (max-width: 992px) {
  .expertise-card {
    flex-direction: column;
  }
  
  .expertise-illustration {
    min-height: 250px;
    order: -1; /* Image on top for mobile */
  }
  
  .expertise-content {
    padding: 2rem;
  }
}

@media (max-width: 576px) {
  .expertise-page-header h1 {
    font-size: 2rem;
  }
  
  .expertise-content h2 {
    font-size: 1.5rem;
  }
  
  .expertise-illustration {
    min-height: 200px;
  }
  
  .expertise-content {
    padding: 1.5rem;
  }
}
```

---

## SECTION 5: ILLUSTRATION ASSETS NEEDED

### 5.1 Create/Obtain 4 Illustrations

```
/assets/illustrations/
├── safety-compliance.svg
├── protocol-development.svg
├── testing-validation.svg
└── industrial-networks.svg
```

**Style Requirements:**
- Dark blue background compatible (#0a1628)
- White/light blue/teal accent colors
- Technical/industrial style (matching reference image)
- SVG format preferred (scalable)
- Dimensions: ~600x400px viewBox

**Alternative if no custom illustrations:**
Use CSS-generated abstract patterns or geometric shapes:

```css
/* Fallback pattern if no image */
.expertise-illustration.pattern-safety {
  background: 
    linear-gradient(135deg, #0a1628 0%, #1e3a5f 100%),
    url("data:image/svg+xml,..."); /* inline SVG pattern */
}
```

---

## SECTION 6: TESTING CHECKLIST

```markdown
## Navigation
- [ ] "Services" renamed to "Expertise" in main menu
- [ ] "Expertise" is a clickable link (NOT dropdown)
- [ ] Clicking "Expertise" goes to /expertise page
- [ ] French navigation shows "Expertise" linking to /fr/expertise
- [ ] No "Integration/Porting/Support/Maintenance" in any menu

## Deleted Pages
- [ ] /services/integration.html deleted (returns 404 or redirect)
- [ ] /services/porting.html deleted
- [ ] /services/support.html deleted
- [ ] /services/maintenance.html deleted
- [ ] French equivalents deleted
- [ ] No broken links pointing to deleted pages

## Expertise Overview Page
- [ ] /expertise loads correctly
- [ ] Page header displays title and subtitle
- [ ] 4 expertise cards display in order:
  1. Safety Compliance
  2. Protocol Development
  3. Testing & Validation
  4. Industrial Networks
- [ ] Each card has:
  - [ ] Title (h2)
  - [ ] Description paragraph
  - [ ] "Learn more →" link
  - [ ] Dark blue illustration area (right side)
- [ ] Cards responsive on mobile (image on top)
- [ ] French version /fr/expertise works correctly

## Expertise Links
- [ ] "Learn more" links work for all 4 expertise areas
- [ ] "En savoir plus" links work for French versions
- [ ] Detail pages load (or show placeholder)

## Visual Design
- [ ] Card pattern matches reference image:
  - [ ] Left side: white background, text
  - [ ] Right side: dark blue with illustration
  - [ ] Rounded corners (16px)
  - [ ] Subtle shadow
- [ ] Link color is teal/cyan (#0891b2)
- [ ] Arrow animates on hover
- [ ] Page background is light gray (#f8fafc)
```

---

## SECTION 7: CLAUDE CODE MASTER COMMAND

```markdown
Claude Code, please update the AZIT website from V6.4 to V7.0 with the Expertise section redesign:

PHASE 1 - NAVIGATION UPDATE:
1. Rename "Services" to "Expertise" in main navigation menu
2. Change "Expertise" from dropdown menu to direct clickable link
3. Set link URL to /expertise (EN) and /fr/expertise (FR)
4. Remove all dropdown items from old Services menu
5. Update both English and French navigation

PHASE 2 - DELETE OLD SERVICE PAGES:
6. DELETE these English pages (and any references to them):
   - /services/integration.html
   - /services/porting.html
   - /services/support.html
   - /services/maintenance.html
7. DELETE these French pages:
   - /fr/services/integration.html
   - /fr/services/portage.html
   - /fr/services/support.html
   - /fr/services/maintenance.html
8. Remove any links to these pages from:
   - Footer
   - Sitemap
   - Internal page links
   - Any "Related Services" sections

PHASE 3 - CREATE EXPERTISE OVERVIEW PAGE (ENGLISH):
9. Create /expertise/index.html with:
   - Page header: "Our Expertise" + subtitle
   - 4 expertise cards using the split-layout pattern:
     - Left side: white background with title, description, "Learn more →" link
     - Right side: dark blue (#0a1628) illustration area
   - Card 1: Safety Compliance
   - Card 2: Protocol Development
   - Card 3: Testing & Validation
   - Card 4: Industrial Networks
   - CTA section at bottom

PHASE 4 - CREATE EXPERTISE OVERVIEW PAGE (FRENCH):
10. Create /fr/expertise/index.html with:
    - Page header: "Notre Expertise" + subtitle
    - 4 expertise cards with French content:
      - Card 1: Conformité Sécurité
      - Card 2: Développement Protocole
      - Card 3: Test & Validation
      - Card 4: Réseaux Industriels
    - Links use "En savoir plus →"
    - CTA section in French

PHASE 5 - ADD EXPERTISE CSS:
11. Add CSS for expertise page layout (see spec):
    - .expertise-page styles
    - .expertise-card with flex layout (50/50 split)
    - .expertise-content (white, left side)
    - .expertise-illustration (dark blue gradient, right side)
    - .expertise-link with arrow animation
    - Responsive styles (stack vertically on mobile, image on top)

PHASE 6 - CREATE EXPERTISE DETAIL PAGES:
12. Create placeholder detail pages (can be basic for now):
    - /expertise/safety-compliance.html
    - /expertise/protocol-development.html
    - /expertise/testing-validation.html
    - /expertise/industrial-networks.html
    - French equivalents:
      - /fr/expertise/conformite-securite.html
      - /fr/expertise/developpement-protocole.html
      - /fr/expertise/test-validation.html
      - /fr/expertise/reseaux-industriels.html

PHASE 7 - ILLUSTRATION ASSETS:
13. Create or add placeholder illustrations:
    - /assets/illustrations/safety-compliance.svg (or .png)
    - /assets/illustrations/protocol-development.svg
    - /assets/illustrations/testing-validation.svg
    - /assets/illustrations/industrial-networks.svg
14. If no illustrations available, use solid dark blue background with subtle gradient

PHASE 8 - VERIFICATION:
15. Test navigation: "Expertise" is clickable link
16. Test deleted pages return 404 or redirect
17. Test expertise overview page loads correctly
18. Test all 4 expertise cards display
19. Test "Learn more" / "En savoir plus" links work
20. Test responsive behavior
21. Test both EN and FR versions

CRITICAL REMINDERS:
- "Expertise" is a DIRECT LINK, not a dropdown menu
- Old service pages must be DELETED completely
- Design pattern: LEFT = white text area, RIGHT = dark blue illustration
- Use teal/cyan color (#0891b2) for "Learn more" links
- Cards have 16px border-radius and subtle shadow
- On mobile: image stacks on TOP of text content
- Page background should be light gray (#f8fafc)

Please confirm each phase and report any issues.
```

---

## APPENDIX: V6.4 → V7.0 CHANGE SUMMARY

```
✓ Navigation: "Services" → "Expertise" (clickable link)
✓ Deleted: Integration, Porting, Support, Maintenance pages
✓ Created: Expertise overview page with 4 cards
✓ Design: Split-layout pattern (white left / dark blue right)
✓ Content: 4 expertise areas (Safety, Protocol, Testing, Networks)
✓ Links: "Learn more" / "En savoir plus" to detail pages
✓ Responsive: Mobile-friendly (stacked layout)
✓ Bilingual: EN + FR versions
```

### Pages Summary

**DELETED (8 pages):**
- 4 English service pages
- 4 French service pages

**CREATED (10 pages):**
- 1 English expertise overview
- 4 English expertise details
- 1 French expertise overview
- 4 French expertise details

---

*End of V6.4 → V7.0 Update Documentation*