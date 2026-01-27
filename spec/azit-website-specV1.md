# AZIT Website Mockup Specification
## Technical Specification for Claude Code Implementation

**Version:** 1.0  
**Date:** January 2025  
**Project:** AZIT Industrial Protocol Stacks Website  
**Parent Company:** ISIT (isit.fr)

---

## 1. Project Overview

### 1.1 Purpose
Create a responsive HTML/CSS/JS mockup website for AZIT, a sub-brand of ISIT dedicated to industrial communication protocol stacks. The website targets embedded software developers and technical decision-makers in automotive, aerospace, and industrial automation sectors.

### 1.2 Design Philosophy
- **Developer-focused**: Clean, technical, code-snippet friendly (inspired by RT-Labs)
- **Professional credibility**: Emphasize 30+ years ISIT expertise
- **Conversion-oriented**: Clear CTAs for quote requests and contact

### 1.3 Languages
- Primary: French (FR)
- Secondary: English (EN)
- Implementation: Language switcher in header; use data attributes or separate HTML files

---

## 2. Technical Requirements

### 2.1 Technology Stack
```
- HTML5 semantic markup
- CSS3 with CSS Variables for theming
- Vanilla JavaScript (no framework required for mockup)
- Responsive design (mobile-first)
- Font: Inter or Source Sans Pro (technical feel)
- Icons: Lucide Icons or Heroicons
```

### 2.2 Responsive Breakpoints
```css
/* Mobile */ max-width: 767px
/* Tablet */ 768px - 1023px
/* Desktop */ 1024px - 1439px
/* Large Desktop */ 1440px+
```

### 2.3 Color Palette
```css
:root {
  /* Primary - Technical Blue */
  --color-primary: #0066CC;
  --color-primary-dark: #004C99;
  --color-primary-light: #E6F0FA;
  
  /* Secondary - Industrial Orange (Safety accent) */
  --color-secondary: #FF6B00;
  --color-secondary-light: #FFF0E6;
  
  /* Neutrals */
  --color-dark: #1A1A2E;
  --color-gray-800: #2D2D44;
  --color-gray-600: #4A4A68;
  --color-gray-400: #8888A0;
  --color-gray-200: #E0E0E8;
  --color-light: #F8F9FC;
  --color-white: #FFFFFF;
  
  /* Semantic */
  --color-success: #22C55E;
  --color-warning: #F59E0B;
  --color-error: #EF4444;
  
  /* Code blocks */
  --color-code-bg: #1E1E2E;
  --color-code-text: #CDD6F4;
}
```

---

## 3. Site Architecture

### 3.1 Navigation Structure

```
AZIT
├── Home
├── Products
│   ├── Communication Stacks
│   │   ├── FSoE Slave
│   │   ├── FSoE Master
│   │   ├── CANopen Slave
│   │   ├── CANopen Master
│   │   ├── CANopen Safety Slave
│   │   ├── CANopen Safety Master
│   │   ├── J1939 / J1939 Safety
│   │   ├── OPC-UA [Coming Soon]
│   │   ├── OPC-UA FX [Coming Soon]
│   │   ├── CIP Safety [Coming Soon]
│   │   ├── UDS [Coming Soon]
│   │   └── Wireless Safety [Coming Soon]
│   ├── Tools
│   │   └── [Placeholder page]
│   └── Analyzers
│       └── [Placeholder page]
├── Services
│   ├── Porting Activities
│   ├── Maintenance Support
│   └── Expertise
│       ├── Safety Compliance
│       │   ├── Consulting
│       │   ├── Pre-Audits
│       │   └── Standards Training
│       ├── Protocol Development
│       ├── Testing & Validation
│       └── Industrial Networks
│           ├── Network Training
│           ├── Diagnostics & Analysis
│           └── Protocol Gateways
├── Documentation
│   ├── Technical Resources
│   ├── Datasheets
│   ├── Integration Guides
│   └── API References
├── Training
├── Blog / News
├── Company
│   ├── About AZIT
│   ├── ISIT Heritage
│   └── Partners
└── Contact Us
    └── Request Quote
```

### 3.2 File Structure
```
azit-website/
├── index.html
├── css/
│   ├── variables.css
│   ├── base.css
│   ├── components.css
│   ├── layout.css
│   └── pages.css
├── js/
│   ├── main.js
│   ├── navigation.js
│   └── language-switcher.js
├── assets/
│   ├── images/
│   │   ├── logos/
│   │   ├── products/
│   │   ├── partners/
│   │   ├── diagrams/
│   │   └── icons/
│   └── fonts/
├── pages/
│   ├── products/
│   │   ├── communication-stacks.html
│   │   ├── fsoe-slave.html
│   │   ├── fsoe-master.html
│   │   ├── canopen-slave.html
│   │   ├── canopen-master.html
│   │   ├── canopen-safety-slave.html
│   │   ├── canopen-safety-master.html
│   │   ├── j1939.html
│   │   ├── opc-ua.html (coming soon)
│   │   ├── opc-ua-fx.html (coming soon)
│   │   ├── cip-safety.html (coming soon)
│   │   ├── uds.html (coming soon)
│   │   ├── wireless-safety.html (coming soon)
│   │   ├── tools.html
│   │   └── analyzers.html
│   ├── services/
│   │   ├── porting.html
│   │   ├── maintenance.html
│   │   ├── expertise.html
│   │   ├── expertise-compliance.html
│   │   ├── expertise-development.html
│   │   ├── expertise-testing.html
│   │   └── expertise-networks.html
│   ├── documentation.html
│   ├── training.html
│   ├── blog.html
│   ├── company.html
│   └── contact.html
└── fr/
    └── [mirrored French pages]
```

---

## 4. Page Specifications

### 4.1 Global Components

#### 4.1.1 Header
```
┌─────────────────────────────────────────────────────────────────┐
│ [AZIT Logo]  Products ▼  Services ▼  Docs  Training  Blog      │
│                                         Company  Contact  [FR|EN] │
└─────────────────────────────────────────────────────────────────┘
```

**Requirements:**
- Sticky header on scroll (with reduced height)
- Mega-menu dropdown for Products and Services
- Mobile: Hamburger menu with slide-out navigation
- Language switcher: Flag icons + text (FR/EN)
- CTA button "Request Quote" (secondary color)

**Services Mega-Menu Structure:**
```
┌─────────────────────────────────────────────────────────────────┐
│  SERVICES                                                       │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  INTEGRATION          EXPERTISE              SUPPORT            │
│  ─────────────        ─────────────          ─────────────      │
│  Porting Activities   Safety Compliance      Maintenance        │
│                       • Consulting           Support            │
│                       • Pre-Audits                              │
│                       • Standards Training                      │
│                                                                 │
│                       Protocol Development                      │
│                                                                 │
│                       Testing & Validation                      │
│                                                                 │
│                       Industrial Networks                       │
│                       • Network Training                        │
│                       • Diagnostics                             │
│                       • Gateway Development                     │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

#### 4.1.2 Footer
```
┌─────────────────────────────────────────────────────────────────┐
│  AZIT                Products      Services       Resources     │
│  A brand of ISIT     FSoE          Porting        Documentation │
│  [Logo]              CANopen       Maintenance    Training      │
│                      CANopen Safety Expertise     Blog          │
│  30+ years expertise J1939         • Compliance                 │
│  in embedded systems Tools         • Development  Company       │
│                      Analyzers     • Testing      About         │
│                                    • Networks     Contact       │
│                                                   Partners      │
├─────────────────────────────────────────────────────────────────┤
│  © 2025 AZIT - ISIT     Privacy  Terms  LinkedIn  GitHub        │
└─────────────────────────────────────────────────────────────────┘
```

#### 4.1.3 Reusable Components

**Product Card**
```html
<div class="product-card">
  <div class="product-card__icon">[Protocol Icon]</div>
  <span class="product-card__badge">Safety Certified</span>
  <h3 class="product-card__title">FSoE Slave Stack</h3>
  <p class="product-card__description">IEC 61784-3 compliant...</p>
  <ul class="product-card__features">
    <li>SIL3 / PLe certified</li>
    <li>No third-party dependencies</li>
  </ul>
  <a href="#" class="product-card__cta">Learn More →</a>
</div>
```

**Code Snippet Block**
```html
<div class="code-block">
  <div class="code-block__header">
    <span class="code-block__language">C</span>
    <button class="code-block__copy">Copy</button>
  </div>
  <pre><code>/* FSoE initialization example */
fsoe_slave_init(&config);
fsoe_slave_start();</code></pre>
</div>
```

**CTA Section**
```html
<section class="cta-section">
  <h2>Ready to integrate industrial protocols?</h2>
  <p>Get a customized quote for your project</p>
  <a href="/contact" class="btn btn--primary">Request Quote</a>
  <a href="/documentation" class="btn btn--outline">View Documentation</a>
</section>
```

---

### 4.2 Homepage

#### Layout Structure
```
┌─────────────────────────────────────────────────────────────────┐
│                         [HEADER]                                │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  HERO SECTION                                                   │
│  ─────────────────────────────────────────────────────────────  │
│  "Industrial Protocol Stacks                                    │
│   Built for Safety-Critical Systems"                            │
│                                                                 │
│  Subtitle: 30+ years of embedded expertise. No third-party      │
│  code. Full control over your safety certification.             │
│                                                                 │
│  [Request Quote]  [View Products]                               │
│                                                                 │
│  [HERO IMAGE: Abstract industrial network visualization         │
│   showing connected nodes with EtherCAT/CAN bus styling]        │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PROTOCOL LOGOS BAR (horizontal scroll on mobile)               │
│  ─────────────────────────────────────────────────────────────  │
│  [CANopen] [IO-Link] [CC-Link] [EtherNet/IP] [Modbus]          │
│  [EtherCAT] [PROFINET] [FSoE] [J1939]                          │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  KEY ADVANTAGES SECTION                                         │
│  ─────────────────────────────────────────────────────────────  │
│  "Why Choose AZIT Stacks?"                                      │
│                                                                 │
│  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐            │
│  │ [Icon]       │ │ [Icon]       │ │ [Icon]       │            │
│  │ No Third     │ │ Safety       │ │ Hardware     │            │
│  │ Party Code   │ │ Certified    │ │ Freedom      │            │
│  │              │ │              │ │              │            │
│  │ 100% in-house│ │ SIL3/PLe     │ │ Any MCU,     │            │
│  │ development  │ │ TÜV certified│ │ any RTOS     │            │
│  └──────────────┘ └──────────────┘ └──────────────┘            │
│                                                                 │
│  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐            │
│  │ [Icon]       │ │ [Icon]       │ │ [Icon]       │            │
│  │ White Channel│ │ Expert       │ │ Full Source  │            │
│  │ Architecture │ │ Support      │ │ Code Access  │            │
│  └──────────────┘ └──────────────┘ └──────────────┘            │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PRODUCTS OVERVIEW SECTION                                      │
│  ─────────────────────────────────────────────────────────────  │
│  "Protocol Stacks for Every Industrial Need"                    │
│                                                                 │
│  [Tab: Safety Protocols] [Tab: Fieldbus] [Tab: Automotive]      │
│                                                                 │
│  Grid of Product Cards (filtered by tab):                       │
│  ┌─────────────┐ ┌─────────────┐ ┌─────────────┐               │
│  │ FSoE Slave  │ │ FSoE Master │ │ CANopen     │               │
│  │             │ │             │ │ Safety      │               │
│  └─────────────┘ └─────────────┘ └─────────────┘               │
│                                                                 │
│  [View All Products →]                                          │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CODE EXAMPLE SECTION (Developer-focused)                       │
│  ─────────────────────────────────────────────────────────────  │
│  "Simple Integration, Powerful Results"                         │
│                                                                 │
│  [Left: Code snippet showing FSoE init in C]                    │
│  [Right: Explanation bullet points]                             │
│    • Minimal API footprint                                      │
│    • Well-documented interfaces                                 │
│    • Example projects included                                  │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ARCHITECTURE DIAGRAM SECTION                                   │
│  ─────────────────────────────────────────────────────────────  │
│  "Full Software Approach with White Channel Architecture"       │
│                                                                 │
│  [DIAGRAM: Placeholder for architecture diagram showing:        │
│   - Application Layer                                           │
│   - AZIT Protocol Stack                                         │
│   - White Channel / Black Channel separation                    │
│   - Hardware Abstraction Layer                                  │
│   - MCU/RTOS]                                                   │
│                                                                 │
│  Caption: "Our white channel architecture ensures complete      │
│  control over safety certification without hardware lock-in"    │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TESTIMONIALS / CASE STUDIES (optional for mockup)              │
│  ─────────────────────────────────────────────────────────────  │
│  "Trusted by Industry Leaders"                                  │
│  [Placeholder for 2-3 testimonial cards]                        │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PARTNERS SECTION                                               │
│  ─────────────────────────────────────────────────────────────  │
│  "Technology Partners"                                          │
│                                                                 │
│  [NXP] [Intel] [Texas Instruments] [STMicroelectronics]        │
│  [Acontis] [QNX] [SYSGO]                                       │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  BLOG/NEWS PREVIEW                                              │
│  ─────────────────────────────────────────────────────────────  │
│  "Latest from AZIT"                                             │
│                                                                 │
│  [Article Card 1] [Article Card 2] [Article Card 3]            │
│  - CRA Compliance  - FSoE Update   - Training Dates            │
│                                                                 │
│  [View All Articles →]                                          │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CTA SECTION                                                    │
│  ─────────────────────────────────────────────────────────────  │
│  "Ready to Start Your Project?"                                 │
│  [Request Quote]  [Contact Sales]                               │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                         [FOOTER]                                │
└─────────────────────────────────────────────────────────────────┘
```

#### Hero Image Specification
**Placeholder Description:**  
Create an abstract visualization of industrial network topology. Show interconnected nodes (representing devices) connected via stylized bus lines. Use the primary blue color palette with subtle orange accents for safety-related nodes. Include subtle grid lines and data flow animations (CSS-based).

**Suggested Dimensions:** 1920x800px (desktop), responsive crop for mobile

---

### 4.3 Communication Stacks Overview Page

#### Content Structure
```
┌─────────────────────────────────────────────────────────────────┐
│  BREADCRUMB: Home > Products > Communication Stacks             │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PAGE HEADER                                                    │
│  ─────────────────────────────────────────────────────────────  │
│  "Industrial Communication Stacks"                              │
│  Subtitle: Production-ready protocol implementations            │
│  for safety-critical embedded systems                           │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  FILTER/CATEGORY TABS                                           │
│  ─────────────────────────────────────────────────────────────  │
│  [All] [Safety Protocols] [Fieldbus] [Automotive] [Coming Soon] │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PRODUCT GRID                                                   │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  SAFETY PROTOCOLS                                        │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐   │   │
│  │  │ FSoE     │ │ FSoE     │ │ CANopen  │ │ CANopen  │   │   │
│  │  │ Slave    │ │ Master   │ │ Safety   │ │ Safety   │   │   │
│  │  │ [SIL3]   │ │ [SIL3]   │ │ Slave    │ │ Master   │   │   │
│  │  └──────────┘ └──────────┘ └──────────┘ └──────────┘   │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  FIELDBUS PROTOCOLS                                      │   │
│  │  ┌──────────┐ ┌──────────┐                               │   │
│  │  │ CANopen  │ │ CANopen  │                               │   │
│  │  │ Slave    │ │ Master   │                               │   │
│  │  └──────────┘ └──────────┘                               │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  AUTOMOTIVE                                              │   │
│  │  ┌──────────┐                                            │   │
│  │  │ J1939    │                                            │   │
│  │  │ (+Safety)│                                            │   │
│  │  └──────────┘                                            │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  COMING SOON (grayed out, with notification signup)      │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐   │   │
│  │  │ OPC-UA   │ │ OPC-UA   │ │ CIP      │ │ UDS      │   │   │
│  │  │          │ │ FX       │ │ Safety   │ │          │   │   │
│  │  └──────────┘ └──────────┘ └──────────┘ └──────────┘   │   │
│  │  ┌──────────┐                                            │   │
│  │  │ Wireless │                                            │   │
│  │  │ Safety   │                                            │   │
│  │  └──────────┘                                            │   │
│  │  [Notify me when available]                              │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  COMPARISON TABLE                                               │
│  ─────────────────────────────────────────────────────────────  │
│  "Compare Our Stacks"                                           │
│                                                                 │
│  | Feature          | FSoE | CANopen Safety | J1939 |          │
│  |------------------|------|----------------|-------|          │
│  | Safety Level     | SIL3 | SIL3           | SIL2  |          │
│  | Certification    | TÜV  | TÜV            | TÜV   |          │
│  | Source Code      | Yes  | Yes            | Yes   |          │
│  | RTOS Support     | Any  | Any            | Any   |          │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  CTA + FOOTER                                                   │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.4 Product Detail Page Template (FSoE Slave Example)

```
┌─────────────────────────────────────────────────────────────────┐
│  BREADCRUMB: Home > Products > Communication Stacks > FSoE Slave│
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PRODUCT HERO                                                   │
│  ─────────────────────────────────────────────────────────────  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  [FSoE Icon]                                            │   │
│  │                                                         │   │
│  │  FSoE Slave Stack                                       │   │
│  │  ═══════════════                                        │   │
│  │  IEC 61784-3 compliant Fail-Safe over EtherCAT         │   │
│  │  implementation for safety slave devices                │   │
│  │                                                         │   │
│  │  [Badge: SIL3 Certified] [Badge: TÜV Approved]         │   │
│  │  [Badge: Full Source Code]                              │   │
│  │                                                         │   │
│  │  [Request Quote]  [Download Datasheet]                  │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TAB NAVIGATION                                                 │
│  ─────────────────────────────────────────────────────────────  │
│  [Overview] [Features] [Specifications] [Integration] [Support] │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  OVERVIEW TAB CONTENT                                           │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  Two-column layout:                                             │
│                                                                 │
│  LEFT COLUMN (60%):                                             │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  "What is FSoE?"                                        │   │
│  │                                                         │   │
│  │  FSoE (Fail-Safe over EtherCAT) is the safety protocol │   │
│  │  extension for EtherCAT networks, enabling SIL3/PLe    │   │
│  │  safety communication in industrial automation...       │   │
│  │                                                         │   │
│  │  "AZIT FSoE Slave Stack"                                │   │
│  │                                                         │   │
│  │  Our FSoE Slave implementation provides a complete,     │   │
│  │  certified solution for integrating safety functions    │   │
│  │  into your EtherCAT slave devices...                    │   │
│  │                                                         │   │
│  │  [DIAGRAM: FSoE communication model showing Master      │   │
│  │   and Slave interaction with safety data exchange]      │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  RIGHT COLUMN (40%):                                            │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  KEY BENEFITS BOX                                       │   │
│  │  ─────────────────                                      │   │
│  │  ✓ SIL3 / PLe certified by TÜV                         │   │
│  │  ✓ No third-party dependencies                          │   │
│  │  ✓ White channel architecture                           │   │
│  │  ✓ Full source code provided                            │   │
│  │  ✓ Hardware agnostic                                    │   │
│  │  ✓ RTOS independent                                     │   │
│  │  ✓ Expert technical support                             │   │
│  │                                                         │   │
│  │  QUICK SPECS BOX                                        │   │
│  │  ─────────────────                                      │   │
│  │  Safety Level: SIL3 / PLe                               │   │
│  │  Standard: IEC 61784-3                                  │   │
│  │  Code Size: ~50KB (typical)                             │   │
│  │  RAM: ~8KB (typical)                                    │   │
│  │  Languages: ANSI C                                      │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CODE INTEGRATION EXAMPLE                                       │
│  ─────────────────────────────────────────────────────────────  │
│  "Quick Start Integration"                                      │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │ /* FSoE Slave initialization */                         │   │
│  │ #include "fsoe_slave.h"                                 │   │
│  │                                                         │   │
│  │ FSOE_SLAVE_CONFIG config = {                            │   │
│  │     .connection_id = 0x0001,                            │   │
│  │     .watchdog_time = 100,  /* ms */                     │   │
│  │     .safe_inputs = 8,                                   │   │
│  │     .safe_outputs = 8                                   │   │
│  │ };                                                      │   │
│  │                                                         │   │
│  │ fsoe_slave_init(&config);                               │   │
│  │ fsoe_slave_start();                                     │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ARCHITECTURE DIAGRAM                                           │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  [PLACEHOLDER DIAGRAM: White Channel Architecture               │
│   ┌───────────────────────────────────────────────────────┐    │
│   │           Application Layer (User Code)               │    │
│   ├───────────────────────────────────────────────────────┤    │
│   │    ┌─────────────────┐    ┌────────────────────┐     │    │
│   │    │  AZIT FSoE      │    │  Safety Logic      │     │    │
│   │    │  Slave Stack    │◄──►│  (User)            │     │    │
│   │    │  (White Channel)│    │                    │     │    │
│   │    └────────┬────────┘    └────────────────────┘     │    │
│   ├─────────────┼─────────────────────────────────────────┤    │
│   │    ┌────────▼────────┐                                │    │
│   │    │  EtherCAT Slave │    Black Channel               │    │
│   │    │  Stack          │    (Acontis / Other)           │    │
│   │    └────────┬────────┘                                │    │
│   ├─────────────┼─────────────────────────────────────────┤    │
│   │    ┌────────▼────────┐                                │    │
│   │    │  HAL / BSP      │    Hardware Abstraction        │    │
│   │    └────────┬────────┘                                │    │
│   ├─────────────┼─────────────────────────────────────────┤    │
│   │    ┌────────▼────────┐                                │    │
│   │    │  MCU + RTOS     │    Target Hardware             │    │
│   │    └─────────────────┘                                │    │
│   └───────────────────────────────────────────────────────┘    │
│  ]                                                              │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  RELATED PRODUCTS                                               │
│  ─────────────────────────────────────────────────────────────  │
│  [FSoE Master] [CANopen Safety Slave] [Porting Services]       │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  DOCUMENTATION LINKS                                            │
│  ─────────────────────────────────────────────────────────────  │
│  [Datasheet PDF]  [Integration Guide]  [API Reference]         │
│  [Application Notes]  [Certification Documents]                 │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  CTA: Request Quote + Contact Expert                            │
├─────────────────────────────────────────────────────────────────┤
│                         [FOOTER]                                │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.5 Coming Soon Product Page Template

For OPC-UA, OPC-UA FX, CIP Safety, UDS, Wireless Safety:

```
┌─────────────────────────────────────────────────────────────────┐
│  BREADCRUMB                                                     │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  [Protocol Icon - Grayed]                               │   │
│  │                                                         │   │
│  │  OPC-UA Stack                                           │   │
│  │  ═══════════════                                        │   │
│  │  [COMING SOON Badge]                                    │   │
│  │                                                         │   │
│  │  We're developing an OPC-UA implementation with         │   │
│  │  the same quality standards as our safety stacks.       │   │
│  │                                                         │   │
│  │  Expected: Q3 2025                                      │   │
│  │                                                         │   │
│  │  ┌─────────────────────────────────────────────────┐   │   │
│  │  │  Get notified when available                    │   │   │
│  │  │  [Email input]  [Notify Me]                     │   │   │
│  │  └─────────────────────────────────────────────────┘   │   │
│  │                                                         │   │
│  │  Planned Features:                                      │   │
│  │  • Full OPC-UA stack implementation                    │   │
│  │  • Security profiles support                            │   │
│  │  • Information modeling tools                           │   │
│  │  • Same hardware independence philosophy               │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  Meanwhile, explore our available stacks:                       │
│  [FSoE] [CANopen] [CANopen Safety] [J1939]                     │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.6 Services Page (Porting & Maintenance)

```
┌─────────────────────────────────────────────────────────────────┐
│  PAGE HEADER                                                    │
│  "Expert Services for Protocol Integration"                     │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TWO SERVICE CARDS SIDE BY SIDE                                 │
│                                                                 │
│  ┌──────────────────────────┐ ┌──────────────────────────┐     │
│  │  PORTING ACTIVITIES      │ │  MAINTENANCE SUPPORT     │     │
│  │  ──────────────────────  │ │  ──────────────────────  │     │
│  │                          │ │                          │     │
│  │  [Icon: Code transfer]   │ │  [Icon: Support]         │     │
│  │                          │ │                          │     │
│  │  We port AZIT stacks to  │ │  Long-term support for   │     │
│  │  your target hardware    │ │  your deployed systems   │     │
│  │  and RTOS environment.   │ │  with updates and fixes. │     │
│  │                          │ │                          │     │
│  │  Includes:               │ │  Includes:               │     │
│  │  • HAL development       │ │  • Bug fixes             │     │
│  │  • BSP integration       │ │  • Security patches      │     │
│  │  • Testing & validation  │ │  • Standard updates      │     │
│  │  • Documentation         │ │  • Priority support      │     │
│  │                          │ │                          │     │
│  │  [Learn More]            │ │  [Learn More]            │     │
│  └──────────────────────────┘ └──────────────────────────┘     │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  SUPPORTED PLATFORMS                                            │
│  ─────────────────────────────────────────────────────────────  │
│  MCU Partners: [NXP] [STMicro] [TI] [Intel]                    │
│  RTOS Partners: [QNX] [SYSGO PikeOS] [FreeRTOS] [Bare-metal]   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  PROCESS DIAGRAM                                                │
│  ─────────────────────────────────────────────────────────────  │
│  [PLACEHOLDER: Service delivery workflow diagram                │
│   1. Requirements → 2. Analysis → 3. Development →             │
│   4. Testing → 5. Delivery → 6. Support]                       │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.6.1 Expertise Overview Page

```
┌─────────────────────────────────────────────────────────────────┐
│  BREADCRUMB: Home > Services > Expertise                        │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PAGE HERO                                                      │
│  ─────────────────────────────────────────────────────────────  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  "Expert Services for Safety-Critical Systems"          │   │
│  │  ═══════════════════════════════════════════════════   │   │
│  │                                                         │   │
│  │  30+ years of embedded software expertise at your       │   │
│  │  service. From compliance consulting to protocol        │   │
│  │  integration, we support your entire project lifecycle. │   │
│  │                                                         │   │
│  │  [Request Consultation]  [View Case Studies]            │   │
│  │                                                         │   │
│  │  [HERO IMAGE: Abstract illustration showing expertise   │   │
│  │   pillars - compliance shield, code brackets,           │   │
│  │   testing checkmark, network nodes]                     │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  KEY STATS BAR                                                  │
│  ─────────────────────────────────────────────────────────────  │
│  ┌────────────┬────────────┬────────────┬────────────┐         │
│  │    30+     │    500+    │    100%    │    SIL3    │         │
│  │   Years    │  Projects  │  In-house  │  Certified │         │
│  │ Experience │ Delivered  │ Development│  Experts   │         │
│  └────────────┴────────────┴────────────┴────────────┘         │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  EXPERTISE AREAS - INTERACTIVE CARDS                            │
│  ─────────────────────────────────────────────────────────────  │
│  "Our Areas of Expertise"                                       │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  ┌─────────────────────┐  ┌─────────────────────┐       │   │
│  │  │  [Shield Icon]      │  │  [Code Icon]        │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  SAFETY COMPLIANCE  │  │  PROTOCOL           │       │   │
│  │  │  ─────────────────  │  │  DEVELOPMENT        │       │   │
│  │  │                     │  │  ─────────────────  │       │   │
│  │  │  Navigate safety    │  │  Custom protocol    │       │   │
│  │  │  standards with     │  │  implementation     │       │   │
│  │  │  confidence:        │  │  and integration:   │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  • IEC 61508        │  │  • Stack porting    │       │   │
│  │  │  • ISO 13849        │  │  • HAL development  │       │   │
│  │  │  • IEC 62443        │  │  • Custom features  │       │   │
│  │  │  • ISO 26262        │  │  • Performance opt. │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  [Explore →]        │  │  [Explore →]        │       │   │
│  │  └─────────────────────┘  └─────────────────────┘       │   │
│  │                                                         │   │
│  │  ┌─────────────────────┐  ┌─────────────────────┐       │   │
│  │  │  [Test Icon]        │  │  [Network Icon]     │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  TESTING &          │  │  INDUSTRIAL         │       │   │
│  │  │  VALIDATION         │  │  NETWORKS           │       │   │
│  │  │  ─────────────────  │  │  ─────────────────  │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  Comprehensive      │  │  Master industrial  │       │   │
│  │  │  verification and   │  │  communication:     │       │   │
│  │  │  validation:        │  │                     │       │   │
│  │  │                     │  │  • Protocol training│       │   │
│  │  │  • Unit testing     │  │  • Network analysis │       │   │
│  │  │  • Integration      │  │  • Diagnostics      │       │   │
│  │  │  • Conformance      │  │  • Gateway dev      │       │   │
│  │  │  • Certification    │  │                     │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  [Explore →]        │  │  [Explore →]        │       │   │
│  │  └─────────────────────┘  └─────────────────────┘       │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  EXPERTISE LIFECYCLE DIAGRAM                                    │
│  ─────────────────────────────────────────────────────────────  │
│  "Full Project Lifecycle Support"                               │
│                                                                 │
│  [DIAGRAM: Circular/linear flow showing:                        │
│   ┌──────────┐    ┌──────────┐    ┌──────────┐                 │
│   │ CONSULT  │───►│ DEVELOP  │───►│  TEST    │                 │
│   │          │    │          │    │          │                 │
│   │ • Gap    │    │ • Design │    │ • Unit   │                 │
│   │   analysis│   │ • Code   │    │ • Integ  │                 │
│   │ • Roadmap│    │ • Review │    │ • System │                 │
│   └──────────┘    └──────────┘    └──────────┘                 │
│        │                               │                        │
│        │         ┌──────────┐          │                        │
│        └────────►│ CERTIFY  │◄─────────┘                        │
│                  │          │                                   │
│                  │ • Pre-audit                                  │
│                  │ • Documentation                              │
│                  │ • TÜV support                                │
│                  └──────────┘                                   │
│  ]                                                              │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CLIENT TESTIMONIALS                                            │
│  ─────────────────────────────────────────────────────────────  │
│  "Trusted by Industry Leaders"                                  │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  [Carousel of 3-4 testimonial cards]                    │   │
│  │                                                         │   │
│  │  ┌───────────────────────────────────────────────────┐ │   │
│  │  │  [Client Logo]                                    │ │   │
│  │  │                                                   │ │   │
│  │  │  "AZIT's expertise in CANopen Safety was         │ │   │
│  │  │   instrumental in achieving our SIL3             │ │   │
│  │  │   certification on schedule."                    │ │   │
│  │  │                                                   │ │   │
│  │  │  — Project Lead, [Company]                       │ │   │
│  │  │  [View Case Study →]                             │ │   │
│  │  └───────────────────────────────────────────────────┘ │   │
│  │                                                         │   │
│  │  [◄ Prev]  [● ○ ○ ○]  [Next ►]                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  STANDARDS & CERTIFICATIONS WE SUPPORT                          │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  [Grid of standard logos/badges with hover tooltips]            │
│                                                                 │
│  ┌────────┐ ┌────────┐ ┌────────┐ ┌────────┐ ┌────────┐       │
│  │IEC     │ │ISO     │ │IEC     │ │ISO     │ │DO-178C │       │
│  │61508   │ │13849   │ │62443   │ │26262   │ │        │       │
│  │SIL1-3  │ │PLa-PLe │ │Cyber   │ │ASIL    │ │DAL A-E │       │
│  └────────┘ └────────┘ └────────┘ └────────┘ └────────┘       │
│                                                                 │
│  ┌────────┐ ┌────────┐ ┌────────┐                              │
│  │IEC     │ │EN      │ │EU CRA  │                              │
│  │61784-3 │ │50128   │ │NIS2    │                              │
│  │FSoE    │ │Rail    │ │Cyber   │                              │
│  └────────┘ └────────┘ └────────┘                              │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CTA SECTION                                                    │
│  ─────────────────────────────────────────────────────────────  │
│  "Let's Discuss Your Project"                                   │
│                                                                 │
│  Schedule a free consultation with our experts to explore       │
│  how AZIT can accelerate your safety-critical development.      │
│                                                                 │
│  [Request Consultation]  [Download Expertise Brochure]          │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                         [FOOTER]                                │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.6.2 Safety Compliance Expertise Page

```
┌─────────────────────────────────────────────────────────────────┐
│  BREADCRUMB: Home > Services > Expertise > Safety Compliance    │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PAGE HEADER                                                    │
│  ─────────────────────────────────────────────────────────────  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  [Shield Icon - Large]                                  │   │
│  │                                                         │   │
│  │  "Safety Compliance Expertise"                          │   │
│  │  ═══════════════════════════════                        │   │
│  │                                                         │   │
│  │  Navigate safety standards with confidence. Our         │   │
│  │  certified experts guide you from gap analysis          │   │
│  │  to successful certification.                           │   │
│  │                                                         │   │
│  │  [Request Assessment]  [View Standards We Cover]        │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  THREE SERVICE PILLARS - TAB NAVIGATION                         │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  [Consulting]  [Pre-Audits]  [Standards Training]               │
│       ▼                                                         │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  CONSULTING TAB CONTENT                                 │   │
│  │  ─────────────────────                                  │   │
│  │                                                         │   │
│  │  Two columns:                                           │   │
│  │                                                         │   │
│  │  LEFT (60%):                                            │   │
│  │  "Strategic Safety Consulting"                          │   │
│  │                                                         │   │
│  │  Our safety consultants help you understand and         │   │
│  │  implement the right standards for your application     │   │
│  │  domain. We provide:                                    │   │
│  │                                                         │   │
│  │  • Gap Analysis                                         │   │
│  │    Assess your current state vs. target compliance      │   │
│  │                                                         │   │
│  │  • Roadmap Development                                  │   │
│  │    Create actionable certification pathway              │   │
│  │                                                         │   │
│  │  • Process Definition                                   │   │
│  │    Establish development processes that meet standards  │   │
│  │                                                         │   │
│  │  • Tool Qualification                                   │   │
│  │    Qualify your toolchain for safety development        │   │
│  │                                                         │   │
│  │  • Documentation Review                                 │   │
│  │    Ensure artifacts meet certification requirements     │   │
│  │                                                         │   │
│  │  RIGHT (40%):                                           │   │
│  │  ┌───────────────────────────────────────────────────┐ │   │
│  │  │  TYPICAL ENGAGEMENT                               │ │   │
│  │  │  ─────────────────────                            │ │   │
│  │  │                                                   │ │   │
│  │  │  Duration: 2-8 weeks                              │ │   │
│  │  │  Deliverables:                                    │ │   │
│  │  │  • Gap analysis report                           │ │   │
│  │  │  • Compliance roadmap                            │ │   │
│  │  │  • Process recommendations                       │ │   │
│  │  │  • Cost/timeline estimates                       │ │   │
│  │  │                                                   │ │   │
│  │  │  [Request Consulting Quote]                       │ │   │
│  │  └───────────────────────────────────────────────────┘ │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  PRE-AUDITS TAB CONTENT                                 │   │
│  │  ─────────────────────                                  │   │
│  │                                                         │   │
│  │  "Pre-Audit Assessment Services"                        │   │
│  │                                                         │   │
│  │  Prepare for certification with confidence. Our         │   │
│  │  pre-audit service simulates the actual certification   │   │
│  │  process to identify gaps before the official audit.    │   │
│  │                                                         │   │
│  │  [DIAGRAM: Pre-audit process flow                       │   │
│  │   1. Scope Definition                                   │   │
│  │   2. Documentation Review                               │   │
│  │   3. Technical Assessment                               │   │
│  │   4. Findings Report                                    │   │
│  │   5. Remediation Support                                │   │
│  │   6. Re-assessment (optional)]                          │   │
│  │                                                         │   │
│  │  Benefits:                                              │   │
│  │  ✓ Reduce certification risk and timeline              │   │
│  │  ✓ Identify issues before costly official audit        │   │
│  │  ✓ Get actionable remediation guidance                 │   │
│  │  ✓ Gain confidence in certification readiness          │   │
│  │                                                         │   │
│  │  [Schedule Pre-Audit]                                   │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  STANDARDS TRAINING TAB CONTENT                         │   │
│  │  ─────────────────────                                  │   │
│  │                                                         │   │
│  │  "Standards & Certification Training"                   │   │
│  │                                                         │   │
│  │  Build internal expertise with our comprehensive        │   │
│  │  training programs on safety and cybersecurity          │   │
│  │  standards.                                             │   │
│  │                                                         │   │
│  │  Available Courses:                                     │   │
│  │                                                         │   │
│  │  ┌────────────────┐ ┌────────────────┐                 │   │
│  │  │ IEC 61508      │ │ ISO 26262      │                 │   │
│  │  │ Fundamentals   │ │ Automotive     │                 │   │
│  │  │ 2 days         │ │ 3 days         │                 │   │
│  │  └────────────────┘ └────────────────┘                 │   │
│  │                                                         │   │
│  │  ┌────────────────┐ ┌────────────────┐                 │   │
│  │  │ IEC 62443      │ │ DO-178C        │                 │   │
│  │  │ Cybersecurity  │ │ Avionics       │                 │   │
│  │  │ 2 days         │ │ 3 days         │                 │   │
│  │  └────────────────┘ └────────────────┘                 │   │
│  │                                                         │   │
│  │  ┌────────────────┐ ┌────────────────┐                 │   │
│  │  │ EU CRA / NIS2  │ │ Custom         │                 │   │
│  │  │ Compliance     │ │ Training       │                 │   │
│  │  │ 1 day          │ │ On request     │                 │   │
│  │  └────────────────┘ └────────────────┘                 │   │
│  │                                                         │   │
│  │  [View Training Calendar]  [Request Custom Training]    │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  STANDARDS COVERAGE MATRIX                                      │
│  ─────────────────────────────────────────────────────────────  │
│  "Standards We Support"                                         │
│                                                                 │
│  | Domain       | Standard      | Services Available     |      │
│  |--------------|---------------|------------------------|      │
│  | General      | IEC 61508     | Full support           |      │
│  | Industrial   | IEC 62443     | Full support           |      │
│  | Automotive   | ISO 26262     | Consulting + Training  |      │
│  | Automotive   | ISO 21434     | Consulting + Training  |      │
│  | Avionics     | DO-178C       | Consulting + Training  |      │
│  | Rail         | EN 50128      | Consulting             |      │
│  | Medical      | IEC 62304     | Consulting             |      │
│  | EU Cyber     | CRA / NIS2    | Full support           |      │
│  | Machinery    | ISO 13849     | Full support           |      │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  CTA + RELATED SERVICES + FOOTER                                │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.6.3 Protocol Development Expertise Page

```
┌─────────────────────────────────────────────────────────────────┐
│  BREADCRUMB: Home > Services > Expertise > Protocol Development │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PAGE HEADER                                                    │
│  ─────────────────────────────────────────────────────────────  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  [Code Brackets Icon - Large]                           │   │
│  │                                                         │   │
│  │  "Protocol Development Expertise"                       │   │
│  │  ════════════════════════════════                       │   │
│  │                                                         │   │
│  │  Custom protocol implementation and integration         │   │
│  │  by engineers who understand safety-critical systems.   │   │
│  │                                                         │   │
│  │  [Discuss Your Project]  [View Our Stacks]              │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  DEVELOPMENT SERVICES GRID                                      │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  ┌─────────────────────┐  ┌─────────────────────┐       │   │
│  │  │  STACK PORTING      │  │  HAL DEVELOPMENT    │       │   │
│  │  │  ─────────────────  │  │  ─────────────────  │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  Port AZIT stacks   │  │  Create hardware    │       │   │
│  │  │  to your target     │  │  abstraction layers │       │   │
│  │  │  platform:          │  │  for your MCU:      │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  • MCU adaptation   │  │  • Timer drivers    │       │   │
│  │  │  • RTOS integration │  │  • CAN/Ethernet HAL │       │   │
│  │  │  • BSP development  │  │  • Interrupt config │       │   │
│  │  │  • Memory mapping   │  │  • DMA setup        │       │   │
│  │  │                     │  │                     │       │   │
│  │  └─────────────────────┘  └─────────────────────┘       │   │
│  │                                                         │   │
│  │  ┌─────────────────────┐  ┌─────────────────────┐       │   │
│  │  │  CUSTOM FEATURES    │  │  PERFORMANCE OPT.   │       │   │
│  │  │  ─────────────────  │  │  ─────────────────  │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  Extend stack       │  │  Optimize for your  │       │   │
│  │  │  functionality:     │  │  constraints:       │       │   │
│  │  │                     │  │                     │       │   │
│  │  │  • Custom profiles  │  │  • Code size        │       │   │
│  │  │  • Protocol         │  │  • RAM footprint    │       │   │
│  │  │    extensions       │  │  • Cycle time       │       │   │
│  │  │  • Vendor-specific  │  │  • Latency          │       │   │
│  │  │                     │  │                     │       │   │
│  │  └─────────────────────┘  └─────────────────────┘       │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CODE EXAMPLE - PORTING ABSTRACTION                             │
│  ─────────────────────────────────────────────────────────────  │
│  "Clean Abstraction for Easy Porting"                           │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │ /* Platform abstraction layer example */                │   │
│  │                                                         │   │
│  │ /* You implement these for your target */               │   │
│  │ typedef struct {                                        │   │
│  │     void (*timer_init)(uint32_t period_us);             │   │
│  │     void (*can_send)(uint8_t* data, uint8_t len);       │   │
│  │     void (*enter_critical)(void);                       │   │
│  │     void (*exit_critical)(void);                        │   │
│  │ } AZIT_HAL_t;                                           │   │
│  │                                                         │   │
│  │ /* We help you implement it right */                    │   │
│  │ azit_stack_init(&hal, &config);                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  SUPPORTED PLATFORMS                                            │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  MCUs:                                                          │
│  [STM32] [NXP i.MX] [NXP S32] [TI Sitara] [Infineon]           │
│  [Renesas] [Intel Atom] [Custom]                               │
│                                                                 │
│  RTOS:                                                          │
│  [QNX] [PikeOS] [VxWorks] [FreeRTOS] [Zephyr] [Bare-metal]     │
│                                                                 │
│  EtherCAT Masters:                                              │
│  [Acontis] [CODESYS] [TwinCAT] [Custom]                        │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ENGAGEMENT PROCESS                                             │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  [DIAGRAM: Development process timeline                         │
│   Week 1-2: Requirements & Analysis                            │
│   Week 3-6: Development & Integration                          │
│   Week 7-8: Testing & Validation                               │
│   Week 9+: Delivery & Support]                                 │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  CTA: "Ready to port?" + Related Stacks + FOOTER                │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.6.4 Testing & Validation Expertise Page

```
┌─────────────────────────────────────────────────────────────────┐
│  BREADCRUMB: Home > Services > Expertise > Testing & Validation │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PAGE HEADER                                                    │
│  ─────────────────────────────────────────────────────────────  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  [Checkmark/Test Icon - Large]                          │   │
│  │                                                         │   │
│  │  "Testing & Validation Expertise"                       │   │
│  │  ═══════════════════════════════                        │   │
│  │                                                         │   │
│  │  Rigorous verification and validation services          │   │
│  │  for safety-critical embedded systems.                  │   │
│  │                                                         │   │
│  │  [Request Testing Services]  [View Methodologies]       │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TESTING SERVICES OVERVIEW                                      │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  UNIT TESTING                                           │   │
│  │  ─────────────                                          │   │
│  │  • Code-level verification                              │   │
│  │  • MC/DC coverage for safety                            │   │
│  │  • Automated test generation                            │   │
│  │  • Standards: IEC 61508, ISO 26262                      │   │
│  │                                                         │   │
│  │  ─────────────────────────────────────────────────────  │   │
│  │                                                         │   │
│  │  INTEGRATION TESTING                                    │   │
│  │  ─────────────────────                                  │   │
│  │  • Component interaction verification                   │   │
│  │  • Interface testing                                    │   │
│  │  • Timing verification                                  │   │
│  │  • Resource usage validation                            │   │
│  │                                                         │   │
│  │  ─────────────────────────────────────────────────────  │   │
│  │                                                         │   │
│  │  CONFORMANCE TESTING                                    │   │
│  │  ───────────────────                                    │   │
│  │  • Protocol compliance verification                     │   │
│  │  • FSoE conformance testing                            │   │
│  │  • CANopen conformance testing                          │   │
│  │  • Interoperability testing                             │   │
│  │                                                         │   │
│  │  ─────────────────────────────────────────────────────  │   │
│  │                                                         │   │
│  │  INVESTIGATION & ANALYSIS                               │   │
│  │  ────────────────────────                               │   │
│  │  • Problem diagnosis                                    │   │
│  │  • Performance analysis                                 │   │
│  │  • Network troubleshooting                              │   │
│  │  • Root cause analysis                                  │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TEST COVERAGE DIAGRAM                                          │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  [DIAGRAM: V-Model showing test coverage at each level          │
│                                                                 │
│   Requirements ─────────────────────────► System Tests          │
│        │                                      ▲                 │
│        ▼                                      │                 │
│   Architecture ──────────────────────► Integration Tests        │
│        │                                      ▲                 │
│        ▼                                      │                 │
│   Detailed Design ───────────────────► Unit Tests              │
│        │                                      ▲                 │
│        ▼                                      │                 │
│   Implementation ─────────────────────────────┘                │
│                                                                 │
│   AZIT provides testing services at all levels]                │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TOOLS & METHODOLOGIES                                          │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  "Industry-Standard Tools & Proven Methodologies"               │
│                                                                 │
│  Test Frameworks: [VectorCAST] [Tessy] [Custom]                │
│  Analysis Tools: [Polyspace] [PC-lint] [LDRA]                  │
│  Protocol Analyzers: [Wireshark] [CANalyzer] [Custom]          │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  CTA: Request Testing Quote + FOOTER                            │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.6.5 Industrial Networks Expertise Page

```
┌─────────────────────────────────────────────────────────────────┐
│  BREADCRUMB: Home > Services > Expertise > Industrial Networks  │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PAGE HEADER                                                    │
│  ─────────────────────────────────────────────────────────────  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  [Network Nodes Icon - Large]                           │   │
│  │                                                         │   │
│  │  "Master Industrial Networks"                           │   │
│  │  ═════════════════════════════                          │   │
│  │                                                         │   │
│  │  Training, diagnostics, and development services        │   │
│  │  for industrial communication protocols.                │   │
│  │                                                         │   │
│  │  [Contact Network Experts]  [View Training Calendar]    │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  THREE PILLARS - VISUAL CARDS                                   │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  ┌─────────────────┐ ┌─────────────────┐ ┌───────────┐ │   │
│  │  │ [Training Icon] │ │ [Diagnostic     │ │ [Gateway  │ │   │
│  │  │                 │ │  Icon]          │ │  Icon]    │ │   │
│  │  │ PROTOCOL        │ │ NETWORK         │ │ GATEWAY   │ │   │
│  │  │ TRAINING        │ │ DIAGNOSTICS     │ │ DEVELOP.  │ │   │
│  │  │ ───────────     │ │ ─────────────   │ │ ───────── │ │   │
│  │  │                 │ │                 │ │           │ │   │
│  │  │ Master the      │ │ Troubleshoot    │ │ Connect   │ │   │
│  │  │ protocols that  │ │ and optimize    │ │ different │ │   │
│  │  │ power your      │ │ your industrial │ │ protocol  │ │   │
│  │  │ systems.        │ │ networks.       │ │ worlds.   │ │   │
│  │  │                 │ │                 │ │           │ │   │
│  │  │ [Learn More →]  │ │ [Learn More →]  │ │ [More →]  │ │   │
│  │  └─────────────────┘ └─────────────────┘ └───────────┘ │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PROTOCOL TRAINING SECTION                                      │
│  ─────────────────────────────────────────────────────────────  │
│  "Industrial Protocol Training Programs"                        │
│                                                                 │
│  Build deep expertise in the protocols that matter:             │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  AVAILABLE COURSES                                      │   │
│  │                                                         │   │
│  │  ┌───────────────┐ ┌───────────────┐ ┌───────────────┐ │   │
│  │  │ EtherCAT &    │ │ CANopen       │ │ CANopen       │ │   │
│  │  │ FSoE          │ │ Fundamentals  │ │ Safety        │ │   │
│  │  │ ───────────   │ │ ───────────   │ │ ───────────   │ │   │
│  │  │ 3 days        │ │ 2 days        │ │ 2 days        │ │   │
│  │  │ Level: Inter. │ │ Level: Intro  │ │ Level: Adv.   │ │   │
│  │  │               │ │               │ │               │ │   │
│  │  │ [Details]     │ │ [Details]     │ │ [Details]     │ │   │
│  │  └───────────────┘ └───────────────┘ └───────────────┘ │   │
│  │                                                         │   │
│  │  ┌───────────────┐ ┌───────────────┐ ┌───────────────┐ │   │
│  │  │ J1939         │ │ PROFINET /    │ │ Modbus TCP    │ │   │
│  │  │ Automotive    │ │ PROFIsafe     │ │               │ │   │
│  │  │ ───────────   │ │ ───────────   │ │ ───────────   │ │   │
│  │  │ 2 days        │ │ 2 days        │ │ 1 day         │ │   │
│  │  │ Level: Inter. │ │ Level: Inter. │ │ Level: Intro  │ │   │
│  │  │               │ │               │ │               │ │   │
│  │  │ [Details]     │ │ [Details]     │ │ [Details]     │ │   │
│  │  └───────────────┘ └───────────────┘ └───────────────┘ │   │
│  │                                                         │   │
│  │  Training formats: On-site | Remote | Custom            │   │
│  │                                                         │   │
│  │  [View Full Training Catalog]  [Request Custom Training]│   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  NETWORK DIAGNOSTICS SECTION                                    │
│  ─────────────────────────────────────────────────────────────  │
│  "Network Analysis & Diagnostics Services"                      │
│                                                                 │
│  When your industrial network isn't performing as expected,     │
│  our experts diagnose and resolve the issue:                    │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │                                                         │   │
│  │  • Protocol Compliance Analysis                         │   │
│  │    Verify devices conform to protocol specifications    │   │
│  │                                                         │   │
│  │  • Performance Optimization                             │   │
│  │    Identify bottlenecks and optimize cycle times        │   │
│  │                                                         │   │
│  │  • Interoperability Testing                             │   │
│  │    Ensure multi-vendor device compatibility             │   │
│  │                                                         │   │
│  │  • Troubleshooting & Root Cause Analysis                │   │
│  │    Diagnose communication failures and errors           │   │
│  │                                                         │   │
│  │  [PLACEHOLDER: Photo of engineer with protocol analyzer │   │
│  │   connected to industrial network]                      │   │
│  │                                                         │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  Supported Protocols:                                           │
│  [EtherCAT] [CANopen] [PROFINET] [Modbus] [J1939] [EtherNet/IP]│
│                                                                 │
│  [Request Diagnostic Service]                                   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  GATEWAY DEVELOPMENT SECTION                                    │
│  ─────────────────────────────────────────────────────────────  │
│  "Protocol Gateway Development"                                 │
│                                                                 │
│  Connect different protocol worlds with custom gateways:        │
│                                                                 │
│  [DIAGRAM: Gateway architecture showing                         │
│                                                                 │
│   ┌─────────────┐     ┌─────────────┐     ┌─────────────┐      │
│   │  EtherCAT   │     │   GATEWAY   │     │   CANopen   │      │
│   │  Network    │◄───►│   Device    │◄───►│   Network   │      │
│   │             │     │             │     │             │      │
│   └─────────────┘     │  ┌───────┐  │     └─────────────┘      │
│                       │  │ AZIT  │  │                          │
│                       │  │ Stacks│  │                          │
│                       │  └───────┘  │                          │
│                       └─────────────┘                          │
│  ]                                                              │
│                                                                 │
│  Use Cases:                                                     │
│  • Legacy system integration                                    │
│  • Multi-vendor environments                                    │
│  • Protocol migration projects                                  │
│  • Data aggregation and translation                            │
│                                                                 │
│  [Discuss Gateway Project]                                      │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  CTA + RELATED PRODUCTS + FOOTER                                │
└─────────────────────────────────────────────────────────────────┘
```

```
┌─────────────────────────────────────────────────────────────────┐
│  PAGE HEADER                                                    │
│  "Documentation & Resources"                                    │
│  Everything you need to integrate AZIT stacks                   │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  SEARCH BAR                                                     │
│  [Search documentation...]                                      │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CATEGORY CARDS                                                 │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐            │
│  │ [Icon]       │ │ [Icon]       │ │ [Icon]       │            │
│  │ Datasheets   │ │ Integration  │ │ API          │            │
│  │              │ │ Guides       │ │ Reference    │            │
│  │ Product      │ │ Step-by-step │ │ Complete     │            │
│  │ specifications│ │ tutorials   │ │ function docs│            │
│  │ and features │ │              │ │              │            │
│  └──────────────┘ └──────────────┘ └──────────────┘            │
│                                                                 │
│  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐            │
│  │ [Icon]       │ │ [Icon]       │ │ [Icon]       │            │
│  │ Application  │ │ Certificates │ │ Release      │            │
│  │ Notes        │ │              │ │ Notes        │            │
│  │ Technical    │ │ Safety       │ │ Version      │            │
│  │ deep-dives   │ │ certificates │ │ history      │            │
│  └──────────────┘ └──────────────┘ └──────────────┘            │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  PRODUCT-SPECIFIC DOCUMENTATION                                 │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  [Accordion: FSoE]                                              │
│    - FSoE Slave Datasheet (PDF)                                │
│    - FSoE Master Datasheet (PDF)                               │
│    - FSoE Integration Guide                                    │
│    - FSoE API Reference                                        │
│                                                                 │
│  [Accordion: CANopen]                                           │
│    - CANopen Slave Datasheet                                   │
│    - CANopen Master Datasheet                                  │
│    - ...                                                       │
│                                                                 │
│  [Accordion: CANopen Safety]                                    │
│  [Accordion: J1939]                                             │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.8 Training Page

```
┌─────────────────────────────────────────────────────────────────┐
│  PAGE HEADER                                                    │
│  "Training Programs"                                            │
│  Master industrial protocols with expert-led courses            │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TRAINING FORMAT OPTIONS                                        │
│  ─────────────────────────────────────────────────────────────  │
│  [Tab: On-site] [Tab: Remote] [Tab: Custom]                    │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  COURSE CATALOG                                                 │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  FSoE FUNDAMENTALS                                      │   │
│  │  ─────────────────                                      │   │
│  │  Duration: 2 days                                       │   │
│  │  Level: Intermediate                                    │   │
│  │  Prerequisites: EtherCAT basics                         │   │
│  │                                                         │   │
│  │  Learn to implement and certify FSoE-based safety       │   │
│  │  functions in industrial automation systems.            │   │
│  │                                                         │   │
│  │  Topics:                                                │   │
│  │  • FSoE protocol architecture                           │   │
│  │  • Safety communication concepts                        │   │
│  │  • Implementation with AZIT stack                       │   │
│  │  • Testing and certification                            │   │
│  │                                                         │   │
│  │  [Request Training]  [Download Syllabus]                │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  [Similar cards for: CANopen, CANopen Safety, J1939]           │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CUSTOM TRAINING                                                │
│  ─────────────────────────────────────────────────────────────  │
│  "Tailored to Your Needs"                                       │
│                                                                 │
│  We design custom training programs based on your:              │
│  • Specific hardware platform                                   │
│  • Team skill level                                            │
│  • Project requirements                                        │
│                                                                 │
│  [Request Custom Training]                                      │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│  UPCOMING SESSIONS (Calendar view or list)                      │
│  ─────────────────────────────────────────────────────────────  │
│  [Placeholder: 3-4 upcoming training dates]                    │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.9 Blog / News Page

```
┌─────────────────────────────────────────────────────────────────┐
│  PAGE HEADER                                                    │
│  "Blog & News"                                                  │
│  Industry insights and AZIT updates                             │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CATEGORY FILTER                                                │
│  [All] [Product Updates] [Industry] [Compliance] [Events]       │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  FEATURED ARTICLE                                               │
│  ─────────────────────────────────────────────────────────────  │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  [Large Image Placeholder]                              │   │
│  │                                                         │   │
│  │  COMPLIANCE                                             │   │
│  │  "How the EU Cyber Resilience Act Impacts Industrial    │   │
│  │   Protocol Stack Selection"                             │   │
│  │                                                         │   │
│  │  Understanding CRA requirements for embedded software   │   │
│  │  in safety-critical industrial applications...          │   │
│  │                                                         │   │
│  │  January 2025 • 8 min read                              │   │
│  │  [Read Article →]                                       │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ARTICLE GRID                                                   │
│  ─────────────────────────────────────────────────────────────  │
│  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐            │
│  │ [Image]      │ │ [Image]      │ │ [Image]      │            │
│  │ PRODUCT      │ │ INDUSTRY     │ │ COMPLIANCE   │            │
│  │ FSoE Stack   │ │ EtherCAT     │ │ NIS2 and     │            │
│  │ v2.5 Release │ │ Trends 2025  │ │ Industrial   │            │
│  │              │ │              │ │ Systems      │            │
│  │ Dec 2024     │ │ Nov 2024     │ │ Oct 2024     │            │
│  └──────────────┘ └──────────────┘ └──────────────┘            │
│                                                                 │
│  [Load More Articles]                                           │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  NEWSLETTER SIGNUP                                              │
│  ─────────────────────────────────────────────────────────────  │
│  "Stay Updated"                                                 │
│  Get monthly insights on industrial protocols and compliance    │
│  [Email]  [Subscribe]                                          │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.10 Company Page

```
┌─────────────────────────────────────────────────────────────────┐
│  PAGE HEADER                                                    │
│  "About AZIT"                                                   │
│  Industrial protocol expertise, backed by 30+ years             │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  HERO SECTION                                                   │
│  ─────────────────────────────────────────────────────────────  │
│  "AZIT is a brand of ISIT, the French specialist in            │
│   safety-critical embedded software since 1992."               │
│                                                                 │
│  [PLACEHOLDER IMAGE: Team or office photo]                     │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ISIT HERITAGE                                                  │
│  ─────────────────────────────────────────────────────────────  │
│  "Built on ISIT's Foundation"                                   │
│                                                                 │
│  Two columns:                                                   │
│  [Left: Text about ISIT history and expertise]                 │
│  [Right: Timeline or milestones graphic]                       │
│                                                                 │
│  Key Facts:                                                     │
│  • Founded: 1992                                                │
│  • Expertise: Embedded software, industrial protocols          │
│  • Certifications: ISO 9001, safety-critical processes        │
│  • Partnerships: ST, NXP, QNX, Acontis                         │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  WHY AZIT                                                       │
│  ─────────────────────────────────────────────────────────────  │
│  "What Sets Us Apart"                                           │
│                                                                 │
│  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐            │
│  │ 100%         │ │ Safety-First │ │ Long-Term    │            │
│  │ In-House     │ │ Approach     │ │ Partnership  │            │
│  │ Development  │ │              │ │              │            │
│  └──────────────┘ └──────────────┘ └──────────────┘            │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TECHNOLOGY PARTNERS                                            │
│  ─────────────────────────────────────────────────────────────  │
│  [NXP] [Intel] [TI] [STMicroelectronics] [Acontis]             │
│  [QNX] [SYSGO]                                                  │
│                                                                 │
│  [Become a Partner →]                                           │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  CERTIFICATIONS & STANDARDS                                     │
│  ─────────────────────────────────────────────────────────────  │
│  [TÜV Logo] [IEC 61508] [ISO 13849] [IEC 61784-3]              │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.11 Contact / Request Quote Page

```
┌─────────────────────────────────────────────────────────────────┐
│  PAGE HEADER                                                    │
│  "Contact Us"                                                   │
│  Let's discuss your industrial protocol needs                   │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TWO COLUMN LAYOUT                                              │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  LEFT COLUMN (Contact Form - 60%):                             │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  REQUEST TYPE (Radio buttons)                           │   │
│  │  ○ Request Quote                                        │   │
│  │  ○ Technical Question                                   │   │
│  │  ○ Partnership Inquiry                                  │   │
│  │  ○ Training Request                                     │   │
│  │  ○ Other                                                │   │
│  │                                                         │   │
│  │  CONTACT INFORMATION                                    │   │
│  │  [First Name *]  [Last Name *]                         │   │
│  │  [Email *]       [Phone]                               │   │
│  │  [Company *]     [Job Title]                           │   │
│  │  [Country ▼]                                           │   │
│  │                                                         │   │
│  │  PROJECT DETAILS                                        │   │
│  │  [Products of Interest ▼ Multi-select]                 │   │
│  │    □ FSoE Slave                                        │   │
│  │    □ FSoE Master                                       │   │
│  │    □ CANopen Slave/Master                              │   │
│  │    □ CANopen Safety                                    │   │
│  │    □ J1939                                             │   │
│  │    □ Porting Services                                  │   │
│  │    □ Training                                          │   │
│  │    □ Other                                             │   │
│  │                                                         │   │
│  │  [Target Hardware/MCU]                                 │   │
│  │  [Target RTOS]                                         │   │
│  │  [Project Timeline ▼]                                  │   │
│  │                                                         │   │
│  │  [Message / Additional Details]                        │   │
│  │  ┌─────────────────────────────────────────────────┐   │   │
│  │  │                                                 │   │   │
│  │  │                                                 │   │   │
│  │  └─────────────────────────────────────────────────┘   │   │
│  │                                                         │   │
│  │  □ I agree to the privacy policy                       │   │
│  │  □ Subscribe to newsletter                             │   │
│  │                                                         │   │
│  │  [Submit Request]                                       │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
│  RIGHT COLUMN (Contact Info - 40%):                            │
│  ┌─────────────────────────────────────────────────────────┐   │
│  │  DIRECT CONTACT                                         │   │
│  │  ─────────────────                                      │   │
│  │  Email: contact@azit.fr                                │   │
│  │  Phone: +33 (0)X XX XX XX XX                           │   │
│  │                                                         │   │
│  │  ADDRESS                                                │   │
│  │  ─────────────────                                      │   │
│  │  AZIT - ISIT                                            │   │
│  │  [Address placeholder]                                  │   │
│  │  France                                                 │   │
│  │                                                         │   │
│  │  [MAP PLACEHOLDER]                                      │   │
│  │                                                         │   │
│  │  RESPONSE TIME                                          │   │
│  │  ─────────────────                                      │   │
│  │  We typically respond within 24-48 business hours       │   │
│  │                                                         │   │
│  │  SALES REGIONS                                          │   │
│  │  ─────────────────                                      │   │
│  │  • Europe: Direct                                       │   │
│  │  • Americas: [Partner]                                  │   │
│  │  • Asia: [Partner]                                      │   │
│  └─────────────────────────────────────────────────────────┘   │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

## 5. Diagrams & Visual Assets Required

### 5.1 Architecture Diagrams (to create as SVG or placeholder)

| Diagram | Description | Location |
|---------|-------------|----------|
| White Channel Architecture | Shows separation of safety (white) and non-safety (black) channels | Homepage, Product pages |
| FSoE Communication Model | Master-Slave safety data exchange flow | FSoE product pages |
| CANopen Network Topology | CAN bus with master and slave nodes | CANopen product pages |
| Integration Stack | Layers from MCU to Application showing AZIT stack position | All product pages |
| Service Workflow | Porting/maintenance process steps | Services page |
| Expertise Lifecycle | Circular flow: Consult → Develop → Test → Certify | Expertise overview |
| Pre-Audit Process | 6-step pre-audit workflow diagram | Compliance page |
| V-Model Testing | V-Model showing test coverage at each level | Testing page |
| Gateway Architecture | Protocol gateway with dual network connections | Networks page |
| HAL Abstraction | Layered diagram showing HAL interface | Development page |

### 5.2 Placeholder Images Required

| Image | Dimensions | Description |
|-------|------------|-------------|
| Hero Image | 1920x800 | Abstract industrial network visualization |
| Product Icons | 128x128 | Icon for each protocol (FSoE, CANopen, etc.) |
| Partner Logos | 200x80 | NXP, Intel, TI, ST, Acontis, QNX, SYSGO |
| Protocol Logos | 150x50 | CANopen, EtherCAT, PROFINET, Modbus, etc. |
| Team/Office | 800x600 | Company page hero |
| Blog Thumbnails | 400x250 | Article preview images |
| Certification Badges | 100x100 | TÜV, SIL3, PLe badges |
| Expertise Hero | 1200x500 | Abstract expertise pillars illustration |
| Training Photo | 800x500 | Classroom or remote training session |
| Diagnostics Photo | 800x500 | Engineer with protocol analyzer |
| Standards Logos | 150x80 | IEC 61508, ISO 26262, IEC 62443, etc. |

### 5.3 Icon Set Requirements

Use Lucide Icons or similar for:
- Navigation icons (menu, close, arrow, external link)
- Feature icons (check, shield, code, cpu, settings)
- Action icons (download, mail, phone, map-pin)
- Protocol category icons (safety, fieldbus, automotive)

---

## 6. Interaction Specifications

### 6.1 Navigation
- Mega-menu: Dropdown with 300ms delay on hover-out
- Mobile: Full-screen overlay menu with smooth transitions
- Sticky header: Shrinks from 80px to 60px on scroll

### 6.2 Product Cards
- Hover: Subtle elevation shadow + border color change
- Click area: Entire card is clickable
- Badge positioning: Top-right corner

### 6.3 Code Blocks
- Copy button: Click copies code, shows "Copied!" for 2s
- Syntax highlighting: Use Prism.js or highlight.js (C language focus)

### 6.4 Forms
- Real-time validation with inline error messages
- Required field indicators (*)
- Submit button: Loading state during submission
- Success: Show confirmation message, don't navigate away

### 6.5 Language Switcher
- Click toggles between FR/EN
- Stores preference in localStorage
- URL structure: /fr/page or /en/page (or query param for mockup)

---

## 7. SEO & Metadata

### 7.1 Page Titles Format
```
[Page Title] | AZIT - Industrial Protocol Stacks
```

### 7.2 Meta Descriptions
Each page should have unique meta description (150-160 chars) focusing on:
- Primary keyword (protocol name)
- Key benefit (safety certified, no third-party code)
- Call to action

### 7.3 Structured Data
Implement JSON-LD for:
- Organization
- Products
- BreadcrumbList
- FAQPage (on product pages)

---

## 8. Accessibility Requirements

- WCAG 2.1 AA compliance target
- Keyboard navigation for all interactive elements
- ARIA labels for icons and non-text elements
- Color contrast ratio ≥ 4.5:1 for text
- Focus indicators visible
- Skip-to-content link
- Alt text for all images

---

## 9. Performance Guidelines

- Target: Lighthouse score ≥ 90
- Lazy load images below the fold
- Minimize CSS/JS (single bundled files for mockup OK)
- Use system fonts stack as fallback
- Optimize placeholder images (WebP with JPG fallback)

---

## 10. Content Guidelines

### 10.1 Tone of Voice
- Professional but approachable
- Technical accuracy without jargon overload
- Confident (30+ years expertise) but not arrogant
- Solution-focused

### 10.2 French/English Parity
- All content must exist in both languages
- Use professional translation (not literal)
- Technical terms: Keep English acronyms (FSoE, CAN, etc.)

### 10.3 Placeholder Text
For mockup, use realistic placeholder text that matches the final content structure. Avoid Lorem Ipsum for key sections.

---

## 11. Testing Checklist

Before delivery, verify:

- [ ] All pages render correctly on Chrome, Firefox, Safari, Edge
- [ ] Responsive design works at all breakpoints
- [ ] Navigation works on mobile (hamburger menu)
- [ ] Language switcher functions
- [ ] All internal links work
- [ ] Code copy buttons function
- [ ] Forms show validation states
- [ ] Images have alt text
- [ ] No console errors
- [ ] Keyboard navigation works

---

## 12. Delivery Format

Deliver as:
1. Complete HTML/CSS/JS files (as specified in file structure)
2. All assets in organized folders
3. README.md with setup instructions
4. Separate document listing all placeholder images needed

---

## Appendix A: Content for Protocol Pages

### A.1 FSoE (Slave & Master)
**Source:** Adapt from isit.fr FSoE content
**Key points to include:**
- IEC 61784-3 compliance
- SIL3 / PLe certification
- Black channel independence (works with any EtherCAT master/slave stack)
- White channel architecture benefits
- Typical resource requirements
- Supported safety I/O configurations

### A.2 CANopen (Slave & Master)
**Source:** Adapt from isit.fr CANopen content
**Key points:**
- CiA 301/302 compliance
- NMT, PDO, SDO, EMCY, SYNC support
- Object dictionary handling
- Heartbeat/node guarding
- LSS support

### A.3 CANopen Safety (Slave & Master)
**Source:** Adapt from isit.fr CANopen Safety content
**Key points:**
- CiA 304 (Safety) compliance
- SIL3 / PLe certification
- SRDO (Safety-Related Data Objects)
- Safe configuration management
- Integration with standard CANopen

### A.4 J1939 / J1939 Safety
**Source:** Adapt from isit.fr J1939 content
**Key points:**
- SAE J1939 compliance
- Transport protocol (TP)
- Diagnostic messages (DM)
- Address claiming
- Safety extension for functional safety applications

---

## Appendix B: Sample Blog Article Topics

1. "Understanding the EU Cyber Resilience Act: What It Means for Industrial Protocol Stacks"
2. "FSoE vs. CIP Safety: Choosing the Right Safety Protocol for Your Application"
3. "White Channel vs. Black Channel: Demystifying Safety Architecture"
4. "5 Questions to Ask Before Selecting an Industrial Protocol Stack Vendor"
5. "CANopen Safety: Implementation Best Practices"
6. "NIS2 Directive: Compliance Requirements for Industrial Systems"

---

*End of Specification Document*
