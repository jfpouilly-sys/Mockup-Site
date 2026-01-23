# AZIT Website V5→V5.1 Update - Quick Brief for Claude Code

## WHAT CHANGED
**Version:** V5.0 → V5.1  
**Type:** Image Integration Only  
**Structural Changes:** NONE  
**Content Changes:** NONE (except image replacements)

---

## INSTRUCTION FOR CLAUDE CODE

```
Update the existing AZIT website (V5) by replacing all placeholder images 
with specific URLs from ISIT.fr and Unsplash. Maintain all existing structure, 
navigation, and content from V5 specification.
```

---

## IMAGE REPLACEMENTS

### 1. FROM ISIT.FR (Direct Links)

```html
<!-- HERO SECTION (index.html & communication-stacks.html) -->
src="https://isit.fr/uploads/images/thematique/piles-de-communication_illustration-seule-1.png"

<!-- EXPERTISE/ABOUT SECTION -->
src="https://isit.fr/photos/services/2083/30_ans_d_experience_en_logiciels_embarques.png"

<!-- SUPPORT SECTION -->
src="https://isit.fr/photos/services/2083/isit_sav.jpg"

<!-- PARTNER LOGOS -->
src="https://isit.fr/photos/ecoles-partenaires-clients/2076/wattalps-logo.png"
src="https://isit.fr/photos/2023/2139/whaller_logo_horizontal-couleur.png"
src="https://isit.fr/photos/ecoles-partenaires-clients/2076/diehl_metering.png"
src="https://isit.fr/photos/ecoles-partenaires-clients/2076/coval.png"

<!-- FOOTER - ISIT LOGO -->
src="https://isit.fr/en/assets/img/logo-ISIT-2022-md.svg"
```

### 2. FROM UNSPLASH (Free Copyright)

```html
<!-- PRODUCT PAGES -->
<!-- FSoE/EtherCAT pages -->
src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31"

<!-- CANopen pages -->
src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3"

<!-- J1939 pages -->
src="https://images.unsplash.com/photo-1619642751034-765dfdf7c58e"

<!-- INDUSTRIES SECTION -->
src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7" (Automotive)
src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05" (Aerospace)
src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158" (Industrial)
src="https://images.unsplash.com/photo-1631815589968-fdb09a223b1e" (Medical)
src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e" (Energy)
```

### 3. ICONS (Lucide React)

```javascript
import { 
  Shield,      // SIL3 Safety
  Code,        // Low Hardware Dependency
  Wrench,      // Support/Services
  Network,     // Communication protocols
  ChevronDown, // Dropdowns
  Menu,        // Mobile menu
  X            // Close
} from 'lucide-react';
```

---

## CSS ADDITIONS

Add to `styles.css`:

```css
/* Partner logos with hover effect */
.partner-logos {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 2rem;
  align-items: center;
}

.partner-logo {
  max-width: 150px;
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all 0.3s ease;
}

.partner-logo:hover {
  filter: grayscale(0%);
  opacity: 1;
}

/* Responsive images */
.hero-image,
.header-image,
.product-header-image {
  width: 100%;
  max-width: 1200px;
  height: auto;
  object-fit: contain;
}

/* Icon styling */
.benefit-card svg {
  color: var(--color-primary);
  margin-bottom: 1rem;
}
```

---

## FILES TO UPDATE

```
✓ index.html - Hero, benefits icons, partners, footer
✓ communication-stacks.html - Page header image
✓ products/fsoe-slave.html - Product header
✓ products/fsoe-master.html - Product header
✓ products/profisafe-slave.html - Product header  
✓ products/profisafe-master.html - Product header
✓ products/canopen-slave.html - Product header
✓ products/canopen-master.html - Product header
✓ products/canopen-safety-slave.html - Product header
✓ products/canopen-safety-master.html - Product header
✓ products/j1939.html - Product header
✓ services/expertise.html - Expertise image
✓ about.html - 30 years image
✓ assets/css/styles.css - New image styles
```

---

## VERIFICATION CHECKLIST

Before marking complete:
- [ ] All ISIT.fr images load (7 images)
- [ ] All Unsplash images load (8 images)
- [ ] Lucide icons render correctly
- [ ] Partner logos have grayscale hover effect
- [ ] Images responsive on mobile/tablet/desktop
- [ ] All images have descriptive alt text
- [ ] Footer shows ISIT logo
- [ ] NO "hardware independent" terminology exists
- [ ] Page load time < 3 seconds

---

## SUMMARY

**Total Image Replacements:** ~20 images
**External Dependencies:** 2 (ISIT.fr + Unsplash)
**Icon Library:** Lucide React (already in V5 spec)
**Estimated Time:** 1-2 hours for full implementation

**NO changes to:**
- Navigation structure
- Content/copy
- Page layouts  
- JavaScript functionality
- Color scheme
- Typography

This is purely an **image integration update** from V5.0 to V5.1.

---

*Quick Reference: Full details in "AZIT Website - Image Specification & Delta Update Instructions" artifact*