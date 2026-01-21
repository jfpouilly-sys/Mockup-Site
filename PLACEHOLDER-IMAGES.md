# Placeholder Images Required for AZIT Website

This document lists all images needed to complete the AZIT website mockup.

## Logo & Branding

### Main Logo
- **File**: `assets/images/logos/azit-logo.svg`
- **Dimensions**: Scalable SVG
- **Description**: AZIT main logo for header and footer
- **Usage**: Header, Footer, Favicons

### ISIT Logo
- **File**: `assets/images/logos/isit-logo.svg`
- **Dimensions**: Scalable SVG
- **Description**: Parent company logo
- **Usage**: Footer, Company page

### Favicon Set
- **Files**:
  - `favicon.ico` (16x16, 32x32)
  - `favicon-16x16.png`
  - `favicon-32x32.png`
  - `apple-touch-icon.png` (180x180)
  - `android-chrome-192x192.png`
  - `android-chrome-512x512.png`

## Homepage

### Hero Section
- **File**: `assets/images/hero-industrial-network.svg` or `.png`
- **Dimensions**: 1920x800px (desktop), responsive crop for mobile
- **Description**: Abstract industrial network topology visualization
- **Details**: Interconnected nodes, EtherCAT/CAN bus styling, blue color palette with orange safety accents

### Architecture Diagram
- **File**: `assets/images/diagrams/white-channel-architecture.svg`
- **Dimensions**: 1200x800px (SVG preferred)
- **Description**: White channel architecture diagram showing software layers
- **Layers to show**:
  - Application Layer
  - AZIT Protocol Stack (White Channel)
  - Black Channel (EtherCAT/CANopen Stack)
  - Hardware Abstraction Layer (HAL/BSP)
  - MCU/RTOS

## Product Pages

### Protocol Icons (Individual Product Pages)
All icons should be SVG format, single color, 64x64px minimum

- **File**: `assets/images/icons/fsoe-icon.svg`
  - **Description**: FSoE (lightning bolt or safety shield)

- **File**: `assets/images/icons/canopen-icon.svg`
  - **Description**: CANopen (CAN plug or bus icon)

- **File**: `assets/images/icons/canopen-safety-icon.svg`
  - **Description**: CANopen Safety (CAN + shield)

- **File**: `assets/images/icons/j1939-icon.svg`
  - **Description**: J1939 (vehicle/automotive icon)

- **File**: `assets/images/icons/opc-ua-icon.svg`
  - **Description**: OPC-UA (network nodes or server icon)

- **File**: `assets/images/icons/cip-safety-icon.svg`
  - **Description**: CIP Safety (industrial network + shield)

- **File**: `assets/images/icons/wireless-safety-icon.svg`
  - **Description**: Wireless Safety (wireless signal + shield)

- **File**: `assets/images/icons/tools-icon.svg`
  - **Description**: Development tools (wrench or toolbox)

- **File**: `assets/images/icons/analyzer-icon.svg`
  - **Description**: Protocol analyzer (oscilloscope or chart)

### FSoE Product Diagrams
- **File**: `assets/images/diagrams/fsoe-architecture.svg`
- **Dimensions**: 900x600px
- **Description**: FSoE slave/master communication model
- **Details**: Show master-slave interaction with safety data exchange

### CANopen Product Diagrams
- **File**: `assets/images/diagrams/canopen-network.svg`
- **Dimensions**: 900x600px
- **Description**: CANopen network topology

## Services Pages

### Service Icons
- **File**: `assets/images/icons/porting-icon.svg`
  - **Description**: Code transfer or migration icon

- **File**: `assets/images/icons/maintenance-icon.svg`
  - **Description**: Support or wrench icon

- **File**: `assets/images/icons/compliance-icon.svg`
  - **Description**: Shield or certification badge

- **File**: `assets/images/icons/development-icon.svg`
  - **Description**: Code brackets or development icon

- **File**: `assets/images/icons/testing-icon.svg`
  - **Description**: Checkmark or testing icon

- **File**: `assets/images/icons/networks-icon.svg`
  - **Description**: Network nodes icon

### Expertise Page Diagrams
- **File**: `assets/images/diagrams/expertise-lifecycle.svg`
- **Dimensions**: 1000x400px
- **Description**: Project lifecycle flow diagram
- **Phases**: Consult → Develop → Test → Certify

## Partners Section

### Partner Logos (Grayscale/Monochrome preferred)
- **Directory**: `assets/images/partners/`
- **Format**: SVG or PNG
- **Dimensions**: Variable, max height 60px
- **List**:
  - `nxp-logo.svg`
  - `intel-logo.svg`
  - `ti-logo.svg` (Texas Instruments)
  - `st-logo.svg` (STMicroelectronics)
  - `acontis-logo.svg`
  - `qnx-logo.svg`
  - `sysgo-logo.svg`

## Blog/News Section

### Blog Post Placeholder Images
- **Directory**: `assets/images/blog/`
- **Format**: JPG or PNG
- **Dimensions**: 800x450px (16:9 aspect ratio)
- **Quantity**: 3-6 placeholder images
- **Suggested themes**:
  - Industrial automation environment
  - Safety-critical systems
  - Embedded development
  - Network communication
  - Certification process

## Standards & Certifications

### Certification Badges
- **Directory**: `assets/images/certifications/`
- **Format**: PNG or SVG
- **List**:
  - `tuv-sud-logo.png` - TÜV SÜD certification mark
  - `sil3-badge.svg` - SIL3 badge
  - `ple-badge.svg` - PLe badge
  - `iec-61508-badge.svg`
  - `iso-13849-badge.svg`
  - `iec-62443-badge.svg`
  - `iso-26262-badge.svg`

## UI Icons (Optional Enhancement)

### Navigation & Interface Icons
Consider using an icon library like Lucide Icons or Heroicons for:
- Arrow icons (navigation)
- Checkmarks (features lists)
- Menu icons (hamburger menu)
- Download icons
- External link icons
- Social media icons (LinkedIn, GitHub)
- Email, phone, location icons (contact page)

**Recommended Icon Library**:
- Lucide Icons (https://lucide.dev) - MIT License
- Heroicons (https://heroicons.com) - MIT License
- Or use inline SVG icons

## Optional Enhancements

### Background Patterns
- **File**: `assets/images/patterns/grid-pattern.svg`
- **Description**: Subtle grid pattern for section backgrounds

### Testimonial Photos
- **Directory**: `assets/images/testimonials/`
- **Format**: JPG or PNG
- **Dimensions**: 200x200px (circular crop)
- **Quantity**: 3-4 placeholder avatars

### Client/Case Study Logos
- **Directory**: `assets/images/clients/`
- **Format**: SVG or PNG (grayscale)
- **Description**: Anonymized or generic company logos for testimonials

## Image Optimization Guidelines

When adding real images:

1. **Compress all images**: Use tools like TinyPNG, ImageOptim, or Squoosh
2. **Use WebP format**: For modern browsers with fallback to PNG/JPG
3. **Provide multiple resolutions**: Use `srcset` for responsive images
4. **Lazy load**: Implement lazy loading for below-fold images
5. **Alt text**: Add descriptive alt text for accessibility
6. **SVG optimization**: Run SVGs through SVGO

## SVG Icon Requirements

All custom icons should:
- Be single color (monochrome)
- Have viewBox attribute for proper scaling
- Be optimized (remove unnecessary metadata)
- Use currentColor for fill/stroke to inherit text color
- Be accessible with proper title/desc elements

## Priority Order

**Critical (needed for MVP)**:
1. Main AZIT logo
2. Favicon set
3. Hero image/illustration
4. Architecture diagrams
5. Product icons

**Important (enhance credibility)**:
6. Partner logos
7. Certification badges
8. Service icons

**Nice to have (future enhancement)**:
9. Blog post images
10. Testimonial photos
11. Background patterns

---

**Note**: For the mockup/prototype phase, placeholder boxes with text descriptions are acceptable. Replace with actual branded assets before production deployment.

**Status**: Mockup (using text-based placeholders)
**Last Updated**: January 2025
