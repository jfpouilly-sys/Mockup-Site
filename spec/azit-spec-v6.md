# AZIT Website - Complete Specification V6.0

**Version:** 6.0  
**Date:** January 2025  
**Purpose:** Complete website specification with dual-level navigation, updated certification references, and Elite Partners section

---

## 1. NAVIGATION STRUCTURE

### 1.1 Top-Level Menu (New in V6)

**Position:** Above main navigation menu  
**Background:** Lighter shade or subtle background to differentiate from main menu  
**Items (Left to Right):**

1. **Company** (Dropdown)
   - About AZIT
   - About ISIT (parent company)
   - Team
   - Careers
   - Contact

2. **Blog & News** (Link)
   - Direct link to blog/news listing page

3. **Language Switcher** (Right-aligned)
   - EN | FR toggle button
   - Current language highlighted
   - Smooth transition between languages

**Mobile Behavior:**
- Top menu collapses into hamburger menu on mobile
- Language switcher remains visible in collapsed state

### 1.2 Main Navigation Menu

**Products Column:**
- **FSoE (Safety over EtherCAT)**
  - Master Stack
  - Slave Stack
- **PROFISAFE**
  - Controller Stack
  - Device Stack
- **CANopen**
  - Master Stack
  - Slave Stack
- **CANopen Safety**
  - Safety Master
  - Safety Slave
- **OPC-UA**
  - Server Stack
  - Client Stack
- **J1939**
  - ECU Stack
  - Diagnostics

**Solutions Column:**
- Communication Stacks Overview
- Protocol Gateway Solutions
- Custom Development
- Integration Services

**Industries Column:**
- Automotive
- Aerospace
- Industrial Automation
- Medical Devices
- Energy Systems

**Services Column:**
- Training & Workshops
- Technical Support
- Consulting
- Certification Assistance

---

## 2. IMAGE SOURCES & SPECIFICATIONS

### 2.1 ISIT.fr Images

**Main Communication Stack Illustration:**
- URL: `https://isit.fr/uploads/images/thematique/piles-de-communication_illustration-seule-1.png`
- Usage: Homepage hero, Communication stacks page header
- Alt text: "Industrial protocol communication stacks architecture"

**30 Years Experience:**
- URL: `https://isit.fr/photos/services/2083/30_ans_d_experience_en_logiciels_embarques.png`
- Usage: Homepage About section, About page hero
- Alt text: "30 years of embedded software expertise"

**Support/After-Sales:**
- URL: `https://isit.fr/photos/services/2083/isit_sav.jpg`
- Usage: Services pages, Support section
- Alt text: "ISIT technical support and after-sales service"

### 2.2 Partner Logos (Standard Partners)

**WattAlps:** `https://isit.fr/photos/ecoles-partenaires-clients/2076/wattalps-logo.png`  
**Whaller:** `https://isit.fr/photos/2023/2139/whaller_logo_horizontal-couleur.png`  
**Diehl Metering:** `https://isit.fr/photos/ecoles-partenaires-clients/2076/diehl_metering.png`  
**Coval:** `https://isit.fr/photos/ecoles-partenaires-clients/2076/coval.png`

### 2.3 Elite Partners (New Section in V6)

**Acontis Logo:**
- Source: To be obtained from Acontis or public resources
- Usage: Elite Partners section (homepage and all product pages)
- Description: Strategic technology partner for EtherCAT solutions

### 2.4 Unsplash Images

**Product Headers:**
- EtherCAT Products: `https://images.unsplash.com/photo-1558494949-ef010cbdcc31`
- CANopen Products: `https://images.unsplash.com/photo-1486262715619-67b85e0b08d3`
- J1939 Products: `https://images.unsplash.com/photo-1619642751034-765dfdf7c58e`

**Industry Sections:**
- Automotive: `https://images.unsplash.com/photo-1492144534655-ae79c964c9d7`
- Aerospace: `https://images.unsplash.com/photo-1436491865332-7a61a109cc05`
- Industrial Automation: `https://images.unsplash.com/photo-1581091226825-a6a2a5aee158`
- Medical Devices: `https://images.unsplash.com/photo-1631815589968-fdb09a223b1e`
- Energy Systems: `https://images.unsplash.com/photo-1473341304170-971dccb5ac1e`

### 2.5 Lucide Icons

**Navigation:** ChevronDown, Menu, X, Search  
**Benefits:** Shield, Code, Wrench, Zap, Lock, CheckCircle  
**Products:** Network, Cpu, GitBranch, Settings

---

## 3. HOMEPAGE STRUCTURE

### 3.1 Hero Section

**Headline:** "Industrial-Grade Communication Stacks for Safety-Critical Systems"

**Subheadline:** "BV Approved safety protocol implementations with low hardware dependency and expert support"

**CTA Buttons:**
- "Explore Products" (Primary)
- "Contact Sales" (Secondary)

**Hero Image:** Communication stacks illustration from ISIT.fr

### 3.2 Key Benefits Section

**Grid Layout (3 columns):**

1. **BV Approved Safety Stacks** (Shield icon)
   - Bureau Véritas certified for functional safety
   - SIL3 compliant implementations
   - Comprehensive safety documentation

2. **Low Hardware Dependency** (Code icon)
   - Portable across multiple platforms
   - Minimal hardware-specific code
   - Easy integration and deployment

3. **Expert Support & Services** (Wrench icon)
   - 30+ years embedded software expertise
   - Training and consulting available
   - Responsive technical support

### 3.3 Elite Partners Section (New in V6)

**Title:** "Elite Partners"

**Description:** "We collaborate with industry-leading technology partners to deliver comprehensive solutions"

**Partners:**
- **Acontis Technologies**
  - Logo display
  - Brief description: "Strategic partner for EtherCAT solutions and real-time technologies"
  - Link to Acontis website (if applicable)

**Layout:** Single prominent partner card with logo, description, and optional link

### 3.4 Trusted By Section (Standard Partners)

**Title:** "Trusted By"

**Partner Logos (Grid):**
- WattAlps
- Whaller
- Diehl Metering
- Coval

**Styling:** Grayscale logos with color on hover

### 3.5 About AZIT/ISIT Section

**Image:** 30 years experience from ISIT.fr

**Content:**
- Sub-brand of ISIT (Cybersec & Safety Partners)
- 30+ years of expertise
- Focus on safety-critical communication protocols
- European-based development and support

### 3.6 Footer

**Sub-brand Statement:**
"A sub-brand of ISIT"
- ISIT logo: `https://isit.fr/en/assets/img/logo-ISIT-2022-md.svg`

**Footer Columns:**
- Products
- Solutions
- Company
- Legal (Privacy Policy, Terms of Service)

---

## 4. PRODUCT PAGES STRUCTURE

### 4.1 Product Page Template

**All product pages follow this structure:**

1. **Hero Section**
   - Product name and tagline
   - Header image (protocol-specific from Unsplash)
   - Key certification badge: "BV Approved"

2. **Overview Section**
   - Product description
   - Key features list
   - Technical highlights

3. **Key Features Section**
   - **Low Hardware Dependency**
     - Portable implementation
     - Minimal platform-specific code
     - Wide hardware compatibility
   
   - **Low OS Dependency**
     - Works with various RTOS platforms
     - Minimal OS-specific requirements
     - Easy RTOS integration

   - **BV Approved Quality**
     - Bureau Véritas certified development process
     - Comprehensive documentation
     - Safety compliance support

4. **Elite Partners Section** (New in V6)
   - **Title:** "Elite Partners"
   - **Content:** Acontis logo and description
   - **Position:** Before "Related Products" section
   - **Note:** Duplicate of homepage Elite Partners section

5. **Related Products Section**
   - Links to complementary products
   - Protocol family products

6. **Technical Documentation Section**
   - Datasheets
   - User guides
   - API documentation
   - Integration examples

7. **Support & Services Section**
   - Training availability
   - Integration support
   - Consulting services
   - Link to contact page

8. **CTA Section**
   - "Request Technical Documentation"
   - "Contact Our Team"

### 4.2 Product-Specific Content

**FSoE Products:**
- Focus on EtherCAT safety protocol
- Safety Master and Safety Slave implementations
- SIL3 certification details

**PROFISAFE Products:**
- PROFINET safety layer
- Controller and Device stacks
- Industrial automation focus

**CANopen Products:**
- CAN-based communication
- Master/Slave architecture
- Automotive and industrial applications

**CANopen Safety:**
- Safety extension for CANopen
- Safety Master and Safety Slave
- Critical system applications

**OPC-UA Products:**
- Industrial IoT connectivity
- Server and Client implementations
- Industry 4.0 integration

**J1939 Products:**
- Heavy-duty vehicle communication
- ECU implementations
- Diagnostics capabilities

---

## 5. TERMINOLOGY STANDARDS (V6 Updates)

### 5.1 Certification & Approval

**ALWAYS USE:**
- "BV Approved" (Bureau Véritas Approved)
- "Bureau Véritas certified"
- "BV certification process"

**NEVER USE:**
- TÜV Approved
- TÜV SÜD
- TÜV certified

### 5.2 Technical Characteristics

**ALWAYS USE:**
- "Low hardware dependency"
- "Low OS dependency"
- "Hardware-portable"
- "OS-portable"

**NEVER USE:**
- Hardware agnostic
- Hardware independent/independence
- RTOS independent
- Full source code provided
- FULL SOURCE CODE (label/badge)

### 5.3 Partner Categories

**Elite Partners:**
- Acontis Technologies
- (Reserved for strategic technology partnerships)

**Trusted By / Standard Partners:**
- WattAlps
- Whaller
- Diehl Metering
- Coval

---

## 6. RESPONSIVE DESIGN SPECIFICATIONS

### 6.1 Breakpoints

- **Desktop:** 1200px and above
- **Tablet:** 768px - 1199px
- **Mobile:** Below 768px

### 6.2 Navigation Behavior

**Desktop:**
- Top menu: Horizontal layout, full width
- Main menu: Horizontal with dropdown columns
- Both menus visible simultaneously

**Tablet:**
- Top menu: Horizontal, potentially stacked items
- Main menu: Hamburger icon, slide-out drawer
- Language switcher remains visible

**Mobile:**
- Top menu: Collapsed into hamburger
- Language switcher: Icon-only or compact toggle
- Single combined menu drawer with sections

### 6.3 Image Optimization

**Hero Images:**
- Desktop: Full width, max 1920px
- Tablet: Full width, max 1200px
- Mobile: Full width, max 768px

**Partner Logos:**
- Desktop: Grid 4 columns
- Tablet: Grid 2 columns
- Mobile: Grid 2 columns or stacked

---

## 7. CSS SPECIFICATIONS

### 7.1 Top Menu Styling

```css
.top-menu {
  background: #f8f9fa;
  border-bottom: 1px solid #e0e0e0;
  padding: 0.5rem 0;
  font-size: 0.9rem;
}

.top-menu-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 1rem;
}

.top-menu-nav {
  display: flex;
  gap: 2rem;
}

.top-menu-item {
  position: relative;
}

.language-switcher {
  display: flex;
  gap: 0.5rem;
  align-items: center;
}

.language-button {
  padding: 0.25rem 0.5rem;
  border: none;
  background: transparent;
  cursor: pointer;
  transition: color 0.3s;
}

.language-button.active {
  color: var(--color-primary);
  font-weight: 600;
}
```

### 7.2 Elite Partners Section

```css
.elite-partners {
  padding: 4rem 0;
  background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.elite-partners-container {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

.elite-partner-card {
  background: white;
  border-radius: 8px;
  padding: 2rem;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  margin-top: 2rem;
}

.elite-partner-logo {
  max-width: 300px;
  height: auto;
  margin: 0 auto 1rem;
}

.elite-partner-description {
  color: #666;
  line-height: 1.6;
}
```

### 7.3 Image Styling (From V5.1)

```css
.hero-image,
.header-image,
.product-header-image {
  width: 100%;
  max-width: 1200px;
  height: auto;
  object-fit: contain;
  margin: 0 auto;
}

.partner-logos {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 2rem;
  align-items: center;
  justify-items: center;
  padding: 2rem 0;
}

.partner-logo {
  max-width: 150px;
  height: auto;
  object-fit: contain;
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all 0.3s ease;
}

.partner-logo:hover {
  filter: grayscale(0%);
  opacity: 1;
}

.isit-logo {
  max-width: 200px;
  height: auto;
  margin-top: 0.5rem;
}

.benefit-card svg {
  color: var(--color-primary);
  margin-bottom: 1rem;
}
```

---

## 8. CONTENT REMOVED IN V6

**The following content must NOT appear anywhere on the site:**

❌ "Full source code provided"  
❌ "FULL SOURCE CODE" (as label or badge)  
❌ "TÜV Approved"  
❌ "TÜV SÜD"  
❌ "Hardware agnostic"  
❌ "Hardware independent" / "Hardware independence"  
❌ "RTOS independent"

---

## 9. BILINGUAL REQUIREMENTS

### 9.1 English (EN)

**Navigation:**
- Company
- Blog & News
- Products
- Solutions
- Industries
- Services

**Key Terms:**
- Low hardware dependency
- Low OS dependency
- BV Approved
- Bureau Véritas
- Elite Partners
- Trusted By

### 9.2 French (FR)

**Navigation:**
- Entreprise
- Blog & Actualités
- Produits
- Solutions
- Industries
- Services

**Key Terms:**
- Faible dépendance matérielle
- Faible dépendance OS
- Approuvé BV
- Bureau Véritas
- Partenaires Elite
- Ils nous font confiance

---

## 10. PERFORMANCE & SEO

### 10.1 Image Optimization

- Use WebP format where supported with JPG/PNG fallback
- Implement lazy loading for below-fold images
- Compress all images to < 500KB
- Use responsive srcset for different viewport sizes

### 10.2 Meta Tags

**All pages must include:**
- Title tag (unique per page, < 60 characters)
- Meta description (unique per page, < 160 characters)
- Open Graph tags for social sharing
- Canonical URL
- Language alternate tags (hreflang)

### 10.3 Accessibility

- All images must have descriptive alt text
- Proper heading hierarchy (h1 → h2 → h3)
- Keyboard navigation support
- ARIA labels for interactive elements
- Minimum color contrast ratio: 4.5:1

---

## 11. IMPORTANT NOTES

1. **V6 Changes from V5.1:**
   - Added dual-level navigation (top menu + main menu)
   - Updated certification: TÜV → Bureau Véritas
   - Created Elite Partners section (separate from Trusted By)
   - Moved Acontis to Elite Partners
   - Removed all "Full source code" references
   - Updated terminology: "Hardware agnostic" → "Low hardware dependency"
   - Updated terminology: "RTOS independent" → "Low OS dependency"

2. **Structural Consistency:**
   - Elite Partners section appears on homepage AND all product pages
   - Language switcher moved to top menu
   - Company and Blog & News moved to top menu

3. **Content Standards:**
   - Always use "Bureau Véritas" or "BV Approved"
   - Never mention TÜV certification
   - Emphasize "low dependency" not "independence" or "agnostic"

---

*End of AZIT Website Specification V6.0*