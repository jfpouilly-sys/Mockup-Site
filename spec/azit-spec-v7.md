# AZIT Website - Complete Specification V7.0

**Version:** 7.0  
**Date:** January 2025  
**Purpose:** Expertise section redesign with simplified menu structure

---

## 1. NAVIGATION STRUCTURE

### 1.1 Top-Level Menu

**Position:** Above main navigation menu  
**Persistence:** Must appear on ALL pages  
**Items:**

1. **Company** (Dropdown - unfolds in foreground, z-index: 2000)
   - About AZIT
   - About ISIT
   - Team
   - Careers
   - Contact

2. **Blog & News** (Link)

3. **Globe Icon (Language Switcher)** (Right-aligned)

### 1.2 Main Navigation Menu (Updated in V7)

| Menu Item | Type | Notes |
|-----------|------|-------|
| **Products** | Dropdown | Unchanged from V6.4 |
| **Solutions** | Dropdown | Unchanged |
| **Industries** | Dropdown | Unchanged |
| **Expertise** | **Clickable Link** | NEW - Renamed from "Services", links to /expertise page |
| **Training** | Link | Unchanged from V6.4 |

### 1.3 Menu Items REMOVED in V7

**The following menu items and pages are DELETED:**

❌ Services (renamed to Expertise)  
❌ Integration  
❌ Porting Activity  
❌ Support  
❌ Maintenance Support  

**Associated pages to DELETE:**
- /services/integration.html
- /services/porting.html
- /services/support.html
- /services/maintenance.html
- /fr/services/integration.html
- /fr/services/porting.html
- /fr/services/support.html
- /fr/services/maintenance.html

---

## 2. EXPERTISE PAGE DESIGN

### 2.1 Page Layout Pattern

**URL:** /expertise (EN) | /fr/expertise (FR)

**Visual Pattern (from reference image):**
```
┌─────────────────────────────────────────────────────────────────┐
│                                                                 │
│  ┌─────────────────────────┬───────────────────────────────┐   │
│  │                         │                               │   │
│  │  [Expertise Title]      │    ┌───────────────────────┐  │   │
│  │                         │    │                       │  │   │
│  │  [Description text      │    │   Dark blue           │  │   │
│  │   explaining the        │    │   technical           │  │   │
│  │   expertise area]       │    │   illustration        │  │   │
│  │                         │    │   (industrial/        │  │   │
│  │  En savoir plus  →      │    │    network style)     │  │   │
│  │                         │    │                       │  │   │
│  │                         │    └───────────────────────┘  │   │
│  └─────────────────────────┴───────────────────────────────┘   │
│                                                                 │
│  [Repeat pattern for each expertise...]                        │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

**Layout Specifications:**
- **Container:** Full-width section with rounded corners
- **Left side (50%):** White/light background with text content
- **Right side (50%):** Dark blue (#0a1628 or similar) with technical illustration
- **Padding:** 3-4rem internal padding
- **Border-radius:** 12-16px on outer container
- **Shadow:** Subtle box-shadow for depth

### 2.2 Four Expertise Areas

#### Expertise 1: Safety Compliance

**EN:**
- **Title:** Safety Compliance
- **Description:** AZIT provides comprehensive safety compliance consulting to help you navigate complex certification requirements. From gap analysis to documentation support, we guide you through IEC 61508, ISO 26262, and other functional safety standards.
- **Link:** "Learn more →" → /expertise/safety-compliance

**FR:**
- **Title:** Conformité Sécurité
- **Description:** AZIT propose des services complets de conseil en conformité sécurité pour vous aider à naviguer les exigences de certification complexes. De l'analyse des écarts au support documentaire, nous vous guidons à travers les normes IEC 61508, ISO 26262 et autres standards de sécurité fonctionnelle.
- **Link:** "En savoir plus →" → /fr/expertise/conformite-securite

**Illustration:** Technical diagram showing safety layers, certification badges, checklist icons

---

#### Expertise 2: Protocol Development

**EN:**
- **Title:** Protocol Development
- **Description:** Our expert team develops custom protocol implementations tailored to your specific requirements. Whether you need modifications to existing stacks or entirely new protocol solutions, we deliver production-ready, certifiable code.
- **Link:** "Learn more →" → /expertise/protocol-development

**FR:**
- **Title:** Développement Protocole
- **Description:** Notre équipe d'experts développe des implémentations de protocoles personnalisées selon vos besoins spécifiques. Que vous ayez besoin de modifications sur des piles existantes ou de solutions protocolaires entièrement nouvelles, nous livrons du code certifiable et prêt pour la production.
- **Link:** "En savoir plus →" → /fr/expertise/developpement-protocole

**Illustration:** Network nodes, data flow arrows, code snippets visualization

---

#### Expertise 3: Testing & Validation

**EN:**
- **Title:** Testing & Validation
- **Description:** Ensure your implementations meet the highest quality standards with our comprehensive testing and validation services. We provide conformance testing, interoperability validation, and performance analysis for industrial communication protocols.
- **Link:** "Learn more →" → /expertise/testing-validation

**FR:**
- **Title:** Test & Validation
- **Description:** Assurez-vous que vos implémentations respectent les plus hauts standards de qualité grâce à nos services complets de test et validation. Nous proposons des tests de conformité, la validation d'interopérabilité et l'analyse de performance pour les protocoles de communication industriels.
- **Link:** "En savoir plus →" → /fr/expertise/test-validation

**Illustration:** Test equipment, checkmarks, measurement graphs, validation flow

---

#### Expertise 4: Industrial Networks

**EN:**
- **Title:** Industrial Networks
- **Description:** AZIT brings you tailored solutions based on field communication protocols. With 30+ years of expertise in CAN, CANopen, EtherCAT, and other industrial networks, we help you design, implement, and optimize your communication architecture.
- **Link:** "Learn more →" → /expertise/industrial-networks

**FR:**
- **Title:** Réseaux Industriels
- **Description:** AZIT vous apporte une solution adaptée à votre besoin en s'appuyant sur des protocoles de communication terrain. Avec plus de 30 ans d'expertise en CAN, CANopen, EtherCAT et autres réseaux industriels, nous vous aidons à concevoir, implémenter et optimiser votre architecture de communication.
- **Link:** "En savoir plus →" → /fr/expertise/reseaux-industriels

**Illustration:** Industrial network topology, connected nodes, EtherCAT/CAN symbols

---

## 3. EXPERTISE DETAIL PAGES

### 3.1 Detail Page Structure

Each expertise area has a dedicated detail page:

**Pages to CREATE:**
- /expertise/safety-compliance.html
- /expertise/protocol-development.html
- /expertise/testing-validation.html
- /expertise/industrial-networks.html
- /fr/expertise/conformite-securite.html
- /fr/expertise/developpement-protocole.html
- /fr/expertise/test-validation.html
- /fr/expertise/reseaux-industriels.html

**Detail Page Template:**
1. Hero section with expertise title and tagline
2. Overview description
3. Key services/capabilities list
4. Related products (if applicable)
5. Related training courses
6. CTA: Contact for consultation

---

## 4. CSS SPECIFICATIONS

### 4.1 Expertise Card Pattern

```css
/* Expertise Section Container */
.expertise-section {
  margin: 2rem 0;
}

/* Expertise Card */
.expertise-card {
  display: flex;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  margin-bottom: 2rem;
  min-height: 300px;
}

/* Left Content Area */
.expertise-content {
  flex: 1;
  padding: 3rem;
  background: #ffffff;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.expertise-content h2 {
  font-size: 1.75rem;
  font-weight: 700;
  color: #1a365d;
  margin-bottom: 1rem;
}

.expertise-content p {
  color: #4a5568;
  line-height: 1.7;
  margin-bottom: 1.5rem;
  font-size: 1rem;
}

.expertise-link {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  color: #0891b2;
  font-weight: 600;
  text-decoration: none;
  transition: gap 0.3s ease;
}

.expertise-link:hover {
  gap: 0.75rem;
  color: #0e7490;
}

.expertise-link svg,
.expertise-link::after {
  content: '→';
  transition: transform 0.3s ease;
}

.expertise-link:hover::after {
  transform: translateX(4px);
}

/* Right Illustration Area */
.expertise-illustration {
  flex: 1;
  background: linear-gradient(135deg, #0a1628 0%, #1a365d 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem;
  position: relative;
  overflow: hidden;
}

.expertise-illustration img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

/* Technical pattern overlay (optional) */
.expertise-illustration::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: 
    radial-gradient(circle at 20% 50%, rgba(255,255,255,0.03) 0%, transparent 50%),
    radial-gradient(circle at 80% 80%, rgba(255,255,255,0.02) 0%, transparent 40%);
  pointer-events: none;
}

/* Responsive */
@media (max-width: 992px) {
  .expertise-card {
    flex-direction: column;
  }
  
  .expertise-illustration {
    min-height: 250px;
    order: -1; /* Image on top on mobile */
  }
  
  .expertise-content {
    padding: 2rem;
  }
}

@media (max-width: 576px) {
  .expertise-content h2 {
    font-size: 1.5rem;
  }
  
  .expertise-illustration {
    min-height: 200px;
  }
}
```

### 4.2 Expertise Page Layout

```css
/* Expertise Overview Page */
.expertise-page {
  padding: 4rem 0;
}

.expertise-page-header {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 4rem;
}

.expertise-page-header h1 {
  font-size: 2.5rem;
  color: #1a365d;
  margin-bottom: 1rem;
}

.expertise-page-header .subtitle {
  font-size: 1.2rem;
  color: #4a5568;
  line-height: 1.6;
}

/* Expertise cards container */
.expertise-cards {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}
```

---

## 5. IMAGE REQUIREMENTS

### 5.1 Expertise Illustrations

**Style:** Dark blue technical/industrial illustrations matching the reference image

| Expertise | Illustration Elements |
|-----------|----------------------|
| Safety Compliance | Safety layers diagram, certification badges, shield icons, checklist |
| Protocol Development | Network nodes, code brackets, data flow arrows, API symbols |
| Testing & Validation | Oscilloscope, test equipment, checkmarks, performance graphs |
| Industrial Networks | Network topology (star/line), CAN/EtherCAT nodes, connected devices |

**Image Specifications:**
- Format: SVG preferred (for scalability) or high-res PNG
- Background: Transparent (illustration floats on dark blue gradient)
- Colors: White, light blue, teal accents on dark blue background
- Style: Technical/schematic, clean lines, minimal

**Suggested sources:**
- Custom SVG illustrations
- Or: Use ISIT's existing technical illustrations
- Or: Abstract geometric patterns representing each expertise

---

## 6. BILINGUAL CONTENT

### 6.1 Navigation

| English | French |
|---------|--------|
| Expertise | Expertise |
| Learn more | En savoir plus |

### 6.2 Page Header

**EN:**
- **Title:** Our Expertise
- **Subtitle:** Leveraging 30+ years of industrial communication experience to deliver comprehensive solutions

**FR:**
- **Title:** Notre Expertise
- **Subtitle:** Plus de 30 ans d'expérience en communication industrielle au service de solutions complètes

---

## 7. CONTENT FROM V6.4 (Unchanged)

### 7.1 Products
All product specifications unchanged from V6.4.

### 7.2 Training
All training courses and pricing unchanged from V6.4.

### 7.3 Elite Partners
8 technology partners unchanged from V6.4.

### 7.4 Company Timeline
AZIT creation in 2026, unchanged from V6.4.

---

## 8. REMOVED CONTENT IN V7

**Menu items DELETED:**
❌ Services menu (renamed to Expertise - clickable)  
❌ Integration  
❌ Porting Activity  
❌ Support  
❌ Maintenance Support  

**Pages DELETED:**
❌ /services/* (all service subpages)  
❌ /fr/services/* (all French service subpages)  

**REPLACED WITH:**
✅ /expertise (overview page)  
✅ /expertise/safety-compliance  
✅ /expertise/protocol-development  
✅ /expertise/testing-validation  
✅ /expertise/industrial-networks  
✅ (French equivalents)  

---

## 9. IMPORTANT NOTES

1. **V7.0 Changes from V6.4:**
   - Renamed "Services" menu to "Expertise"
   - Made "Expertise" a clickable link (not dropdown)
   - Deleted Integration, Porting, Support, Maintenance pages
   - Created new Expertise overview page with visual pattern
   - Created 4 expertise area cards with illustrations
   - Created 4 expertise detail pages

2. **Design Pattern:**
   - Split layout: left text (white bg) / right illustration (dark blue)
   - Rounded corners on card container
   - "Learn more →" / "En savoir plus →" link styling
   - Technical/industrial illustrations in dark blue area

3. **Navigation Change:**
   - "Expertise" is now a direct link, NOT a dropdown menu
   - Clicking "Expertise" goes to /expertise overview page
   - From there, users click "Learn more" to reach detail pages

---

*End of AZIT Website Specification V7.0*