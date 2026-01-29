# AZIT Website Mockup Specification
## Technical Specification for Claude Code Implementation

**Version:** 4.0  
**Date:** January 2025  
**Project:** AZIT Industrial Protocol Stacks Website  
**Parent Company:** ISIT (isit.fr)

**Change Log:**
- V4.0: Updated product lineup (PROFISAFE, OPC-UA, CANopen Safety), restructured navigation, removed certain homepage sections
- V3.0: Removed Documentation from top menu, added Simulation product page
- V2.0: Added Protocol Gateway (ISI-GTW) product, Expertise section
- V1.0: Initial specification

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

## 3. Site Structure & Navigation

### 3.1 Primary Navigation (Header)
```
AZIT Logo | Products ▼ | Services ▼ | About | Training | Blog | Contact | [FR/EN] | [Request Quote]
```

### 3.2 Products Mega-Menu Structure (UPDATED V4)
**First Column: COMMUNICATION STACKS** (clickable title linking to communication-stacks.html)

**Safety Protocols:**
- FSoE Slave (SIL3)
- FSoE Master (SIL3)
- PROFISAFE Slave (SIL3) [NEW in V4]
- PROFISAFE Master (SIL3) [NEW in V4]
- CANopen Safety Slave (SIL3)
- CANopen Safety Master (SIL3)

**Fieldbus Protocols:**
- CANopen Slave
- CANopen Master

**Automotive:**
- J1939

**Industrial IoT:**
- OPC-UA (Coming Soon) [NEW in V4 - replaces IO-Link]

**Column 2: PROTOCOL GATEWAYS**
- ISI-GTW Gateway Platform

**Column 3: TOOLS**
- EtherCAT Simulator

**Last Column: HARDWARE**
- Hardware Solutions Overview
- Custom Development Boards

### 3.3 Services Mega-Menu Structure (UPDATED V4)
**First Column: EXPERTISE** [UPDATED in V4]
- Protocol Stack Development
- Safety System Architecture
- Compliance Consulting (CRA, NIS2)

**Column 2: DEVELOPMENT**
- Custom Protocol Development
- Stack Optimization
- Testing & Validation

**Last Column: INTEGRATION and SUPPORT** [UPDATED in V4]
- Porting Services
- Maintenance & Updates
- Technical Support

### 3.4 File Structure
```
/
├── index.html                    # Homepage
├── communication-stacks.html     # Protocol stacks overview (with tabs)
├── products/
│   ├── fsoe-slave.html
│   ├── fsoe-master.html
│   ├── profisafe-slave.html      # NEW in V4
│   ├── profisafe-master.html     # NEW in V4
│   ├── canopen-slave.html
│   ├── canopen-master.html
│   ├── canopen-safety-slave.html
│   ├── canopen-safety-master.html
│   ├── j1939.html
│   ├── opc-ua.html               # NEW in V4 (coming soon page)
│   ├── isi-gtw.html              # Gateway
│   └── ethercat-simulator.html
├── services/
│   ├── porting.html
│   ├── maintenance.html
│   └── expertise.html
├── about.html
├── training.html
├── blog.html
├── contact.html
├── assets/
│   ├── css/
│   │   └── styles.css
│   ├── js/
│   │   └── main.js
│   └── images/
│       └── [placeholder images]
└── README.md
```

---

## 4. Page Specifications

### 4.1 Homepage (index.html) - UPDATED V4

```
┌─────────────────────────────────────────────────────────────────┐
│                         [HEADER/NAV]                            │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  HERO SECTION                                                   │
│  ─────────────────────────────────────────────────────────────  │
│  H1: "Industrial Protocol Stacks"                               │
│  Subtitle: Production-ready protocol implementations             │
│  for safety-critical embedded systems                           │
│                                                                 │
│  [Request Quote] [Explore Products]                             │
│                                                                 │
│  [Hero Image: Network topology visualization]                  │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  KEY BENEFITS (3-Column Grid) - UPDATED V4                      │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌─────────────────┐ ┌─────────────────┐ ┌─────────────────┐   │
│  │  [Icon: Shield] │ │  [Icon: Code]   │ │ [Icon: Wrench]  │   │
│  │                 │ │                 │ │                 │   │
│  │  SIL3 Certified │ │  Hardware       │ │ Expert Support  │   │
│  │  Safety Stacks  │ │  Independent    │ │ & Services      │   │
│  │                 │ │                 │ │                 │   │
│  │  TÜV-approved   │ │  Works with any │ │ 30+ years ISIT  │   │
│  │  FSoE, CANopen  │ │  MCU or RTOS.   │ │ industrial      │   │
│  │  Safety,        │ │  Easy porting   │ │ expertise.      │   │
│  │  PROFISAFE      │ │  via clean HAL. │ │                 │   │
│  └─────────────────┘ └─────────────────┘ └─────────────────┘   │
│                                                                 │
│  NOTE: Removed "Full Source Code Access" and                    │
│        "White Channel Architecture" boxes from V3               │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  FEATURED PRODUCTS (4-Card Grid) - UPDATED V4                   │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐ ┌────────┐ │
│  │ FSoE Stack   │ │ PROFISAFE    │ │ CANopen      │ │ OPC-UA │ │
│  │ [SIL3]       │ │ [SIL3]       │ │ Safety       │ │ Coming │ │
│  │              │ │              │ │ [SIL3]       │ │ Soon   │ │
│  │ [Learn More] │ │ [Learn More] │ │ [Learn More] │ │ [Info] │ │
│  └──────────────┘ └──────────────┘ └──────────────┘ └────────┘ │
│                                                                 │
│  NOTE: Removed "HARDWARE Solutions" and "Software" blocks       │
│        from V3                                                  │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  INDUSTRIES WE SERVE                                            │
│  ─────────────────────────────────────────────────────────────  │
│  [Automotive] [Aerospace] [Industrial Automation]               │
│  [Medical Devices] [Energy Systems]                             │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  TRUSTED BY / PARTNERS                                          │
│  ─────────────────────────────────────────────────────────────  │
│  [NXP] [Texas Instruments] [STMicroelectronics]                 │
│  [Acontis] [QNX] [SYSGO]                                        │
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

---

### 4.2 Communication Stacks Overview (communication-stacks.html) - UPDATED V4

```
┌─────────────────────────────────────────────────────────────────┐
│  PAGE HEADER                                                    │
│  "Industrial Communication Stacks"                              │
│  Subtitle: Production-ready protocol implementations            │
│  for safety-critical embedded systems                           │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  FILTER/CATEGORY TABS - UPDATED V4                              │
│  ─────────────────────────────────────────────────────────────  │
│  [All] [Safety Protocols] [Fieldbus] [Automotive] [Coming Soon] │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  SAFETY PROTOCOLS TAB CONTENT - UPDATED V4                      │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │  SAFETY PROTOCOLS                                        │  │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐   │  │
│  │  │ FSoE     │ │ FSoE     │ │ PROFISAFE│ │ PROFISAFE│   │  │
│  │  │ Slave    │ │ Master   │ │ Slave    │ │ Master   │   │  │
│  │  │ [SIL3]   │ │ [SIL3]   │ │ [SIL3]   │ │ [SIL3]   │   │  │
│  │  └──────────┘ └──────────┘ └──────────┘ └──────────┘   │  │
│  │                                                          │  │
│  │  ┌──────────┐ ┌──────────┐                             │  │
│  │  │ CANopen  │ │ CANopen  │                             │  │
│  │  │ Safety   │ │ Safety   │                             │  │
│  │  │ Slave    │ │ Master   │                             │  │
│  │  │ [SIL3]   │ │ [SIL3]   │                             │  │
│  │  └──────────┘ └──────────┘                             │  │
│  └──────────────────────────────────────────────────────────┘  │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  FIELDBUS TAB CONTENT - UPDATED V4                              │
│  ─────────────────────────────────────────────────────────────  │
│  (Contains same information as "Fieldbus protocols" section)    │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │  FIELDBUS PROTOCOLS                                      │  │
│  │  ┌──────────┐ ┌──────────┐                             │  │
│  │  │ CANopen  │ │ CANopen  │                             │  │
│  │  │ Slave    │ │ Master   │                             │  │
│  │  │          │ │          │                             │  │
│  │  └──────────┘ └──────────┘                             │  │
│  └──────────────────────────────────────────────────────────┘  │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  AUTOMOTIVE TAB CONTENT - UPDATED V4                            │
│  ─────────────────────────────────────────────────────────────  │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │  AUTOMOTIVE PROTOCOLS                                    │  │
│  │  ┌──────────┐                                           │  │
│  │  │ J1939    │                                           │  │
│  │  │          │                                           │  │
│  │  └──────────┘                                           │  │
│  └──────────────────────────────────────────────────────────┘  │
│                                                                 │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  COMING SOON TAB CONTENT - UPDATED V4                           │
│  ─────────────────────────────────────────────────────────────  │
│  (Populated with content from "Coming Soon section")            │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │  COMING SOON                                             │  │
│  │                                                          │  │
│  │  ┌────────────────────────────────────────────────────┐ │  │
│  │  │  OPC-UA Stack                                      │ │  │
│  │  │  ────────────────────────────────────────────────  │ │  │
│  │  │                                                    │ │  │
│  │  │  Expected: Q3 2025                                 │ │  │
│  │  │                                                    │ │  │
│  │  │  ┌──────────────────────────────────────────────┐ │ │  │
│  │  │  │  Get notified when available                 │ │ │  │
│  │  │  │  [Email input]  [Notify Me]                  │ │ │  │
│  │  │  └──────────────────────────────────────────────┘ │ │  │
│  │  │                                                    │ │  │
│  │  │  Planned Features:                                 │ │  │
│  │  │  • Full OPC-UA stack implementation               │ │  │
│  │  │  • Security profiles support                      │ │  │
│  │  │  • Information modeling tools                     │ │  │
│  │  │  • Same hardware independence philosophy          │ │  │
│  │  └────────────────────────────────────────────────────┘ │  │
│  │                                                          │  │
│  │  Meanwhile, explore our available stacks:                │  │
│  │  [FSoE] [PROFISAFE] [CANopen Safety] [J1939]            │  │
│  └──────────────────────────────────────────────────────────┘  │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

### 4.3 Individual Product Pages - UPDATED V4

All protocol pages follow the same template structure. New product pages added in V4:
- **profisafe-slave.html**
- **profisafe-master.html**
- **opc-ua.html** (coming soon page)

Template structure remains the same as V3 for individual product pages.

---

### 4.4 Training Page (training.html) - UPDATED V4

```
┌─────────────────────────────────────────────────────────────────┐
│  TRAINING PROGRAMS                                              │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │  Protocol Stack Development (3 days)                     │  │
│  │  • Stack architecture                                    │  │
│  │  • Implementation best practices                         │  │
│  │  • Testing & validation                                  │  │
│  └──────────────────────────────────────────────────────────┘  │
│                                                                 │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │  Safety Standards Training (2 days) - UPDATED V4         │  │
│  │  • IEC 61508 / IEC 61784-3 overview                      │  │
│  │  • Safety lifecycle management                           │  │
│  │  • Documentation requirements                            │  │
│  │  • Practical examples                                    │  │
│  │                                                          │  │
│  │  NOTE: Changed from "Safety Certification" to            │  │
│  │        "Safety Standards" in V4                          │  │
│  └──────────────────────────────────────────────────────────┘  │
│                                                                 │
│  [Request Training Quote]                                       │
└─────────────────────────────────────────────────────────────────┘
```

---

## 5. Components Library

[Components specifications remain the same as V3]

---

## 6. JavaScript Functionality

[JavaScript functionality remains the same as V3]

---

## 7. SEO & Meta Tags

[SEO specifications remain the same as V3]

---

## 8. Accessibility (WCAG 2.1 AA)

[Accessibility requirements remain the same as V3]

---

## 9. Performance Targets

[Performance targets remain the same as V3]

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
- Technical terms: Keep English acronyms (FSoE, CAN, OPC-UA, etc.)

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
- [ ] V4 navigation structure is correctly implemented
- [ ] "Communication Stacks" title is clickable in product menu
- [ ] All product references updated (removed IO-Link, CC-Link, Modbus)
- [ ] All product references updated (added PROFISAFE, OPC-UA, CANopen Safety)

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

### A.2 PROFISAFE (Slave & Master) - NEW in V4
**Source:** Adapt from relevant industry documentation
**Key points to include:**
- IEC 61784-3-3 compliance
- SIL3 / PLe certification
- PROFINET integration
- Safety protocol layer
- Typical resource requirements
- Safety I/O configurations

### A.3 CANopen (Slave & Master)
**Source:** Adapt from isit.fr CANopen content
**Key points:**
- CiA 301/302 compliance
- NMT, PDO, SDO, EMCY, SYNC support
- Object dictionary handling
- Heartbeat/node guarding
- LSS support

### A.4 CANopen Safety (Slave & Master)
**Source:** Adapt from isit.fr CANopen Safety content
**Key points:**
- CiA 304 (Safety) compliance
- SIL3 / PLe certification
- SRDO (Safety-Related Data Objects)
- Safe configuration management
- Integration with standard CANopen

### A.5 J1939 / J1939 Safety
**Source:** Adapt from isit.fr J1939 content
**Key points:**
- SAE J1939 compliance
- Transport protocol (TP)
- Diagnostic messages (DM)
- Address claiming
- Safety extension for functional safety applications

### A.6 OPC-UA - NEW in V4
**Coming Soon Page:**
- Expected release: Q3 2025
- Planned features overview
- Email notification signup
- Links to existing available stacks

---

## Appendix B: Sample Blog Article Topics

1. "Understanding the EU Cyber Resilience Act: What It Means for Industrial Protocol Stacks"
2. "FSoE vs. PROFISAFE vs. CIP Safety: Choosing the Right Safety Protocol for Your Application"
3. "White Channel vs. Black Channel: Demystifying Safety Architecture"
4. "5 Questions to Ask Before Selecting an Industrial Protocol Stack Vendor"
5. "CANopen Safety: Implementation Best Practices"
6. "NIS2 Directive: Compliance Requirements for Industrial Systems"
7. "OPC-UA: The Future of Industrial IoT Communication" - NEW in V4

---

*End of V4 Specification Document*