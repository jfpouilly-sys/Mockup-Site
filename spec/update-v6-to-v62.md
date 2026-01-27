# AZIT Website Update: V6.0 → V6.2
## Elite Partners Correction & Claude Code Implementation Instructions

**Version Update:** 6.0 → 6.2  
**Date:** January 2025  
**Impact Level:** MEDIUM - Content structure update + terminology change

---

## EXECUTIVE SUMMARY

### What Changed in V6.2

| Category | Changes | Impact |
|----------|---------|--------|
| **Elite Partners Section** | Expanded to include ALL technology partners (not just Acontis) | MEDIUM - Homepage + all product pages |
| **Layout** | Changed from single card to responsive grid | MEDIUM - CSS updates required |
| **Terminology** | "Technology Partners" → "Elite Partners" | LOW - Global find-replace |

### Quick Stats
- **Pages affected:** Homepage + all 12 product pages (13 total)
- **Sections updated:** Elite Partners (homepage + product pages)
- **CSS changes:** Elite Partners grid layout
- **Terminology replacements:** 1 global find-replace operation

---

## SECTION 1: CONCEPTUAL CHANGE

### 1.1 Elite Partners Definition Correction

**BEFORE (V6.0 - INCORRECT):**
```
Elite Partners = Only Acontis Technologies
(Single strategic partner)
```

**AFTER (V6.2 - CORRECT):**
```
Elite Partners = ALL technology partners
(All strategic technology collaborations that enable AZIT's solutions)

Examples:
- Acontis Technologies (EtherCAT solutions)
- [RTOS vendors]
- [Protocol specialists]
- [Hardware platforms]
- [Certification partners]
- [Other technology collaborators]
```

### 1.2 Partner Categories Clarification

**Two Distinct Categories:**

1. **Elite Partners** (V6.2 definition)
   - Technology partnerships
   - Strategic collaborations
   - Companies that enable AZIT's technical solutions
   - Displayed with: Logo + Name + Description + Optional link
   - Section appears: Homepage + ALL product pages

2. **Trusted By** (unchanged)
   - Customer/client references
   - Companies using AZIT's products
   - WattAlps, Whaller, Diehl Metering, Coval
   - Displayed with: Logo only (grayscale with color on hover)
   - Section appears: Homepage only

### 1.3 Terminology Change

**Replace everywhere:**
- "Technology Partners" → "Elite Partners"

**Note:** This ensures consistent naming across the site and clarifies that "Elite Partners" encompasses all technology partnerships, not just one company.

---

## SECTION 2: LAYOUT CHANGES

### 2.1 Homepage Elite Partners Section

**BEFORE (V6.0):**
```html
<!-- Single centered card for Acontis only -->
<section class="elite-partners">
  <div class="elite-partners-container">
    <h2>Elite Partners</h2>
    <p>We collaborate with industry-leading technology partners...</p>
    
    <div class="elite-partner-card">
      <img src="acontis-logo.png" alt="Acontis Technologies">
      <h3>Acontis Technologies</h3>
      <p>Strategic partner for EtherCAT solutions...</p>
    </div>
  </div>
</section>
```

**AFTER (V6.2):**
```html
<!-- Grid of cards for ALL technology partners -->
<section class="elite-partners">
  <div class="elite-partners-container">
    <h2>Elite Partners</h2>
    <p>We collaborate with industry-leading technology partners...</p>
    
    <div class="elite-partners-grid">
      <!-- Partner 1: Acontis -->
      <div class="elite-partner-card">
        <img src="acontis-logo.png" alt="Acontis Technologies" class="elite-partner-logo">
        <h3>Acontis Technologies</h3>
        <p class="elite-partner-description">
          Strategic partner for EtherCAT solutions and real-time technologies
        </p>
      </div>
      
      <!-- Partner 2: [Add additional technology partners] -->
      <div class="elite-partner-card">
        <img src="partner2-logo.png" alt="Partner Name" class="elite-partner-logo">
        <h3>Partner Name</h3>
        <p class="elite-partner-description">
          Description of partnership and technology focus
        </p>
      </div>
      
      <!-- Partner 3, 4, etc. as needed -->
    </div>
  </div>
</section>
```

### 2.2 Product Pages Elite Partners Section

**Same change applies to ALL 12 product pages:**
- Change from single card to grid layout
- Include ALL technology partners (same as homepage)
- Maintain position before "Related Products" section

---

## SECTION 3: CSS UPDATES

### 3.1 Elite Partners Grid Layout

**BEFORE (V6.0) - Single Card CSS:**
```css
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
```

**AFTER (V6.2) - Grid Layout CSS:**
```css
.elite-partners-container {
  max-width: 1200px; /* Wider to accommodate grid */
  margin: 0 auto;
  text-align: center;
}

/* NEW: Grid container for multiple partners */
.elite-partners-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
}

.elite-partner-card {
  background: white;
  border-radius: 12px;
  padding: 2rem;
  box-shadow: 0 4px 20px rgba(0,0,0,0.08);
  transition: transform 0.3s, box-shadow 0.3s;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.elite-partner-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.elite-partner-logo {
  max-width: 200px; /* Smaller for grid layout */
  height: auto;
  margin: 0 auto 1.5rem;
  display: block;
}

.elite-partner-card h3 {
  font-size: 1.3rem;
  color: #333;
  margin-bottom: 1rem;
}

.elite-partner-description {
  color: #666;
  line-height: 1.6;
  font-size: 0.95rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .elite-partners-grid {
    grid-template-columns: 1fr; /* Single column on mobile */
  }
  
  .elite-partner-card {
    padding: 1.5rem;
  }
  
  .elite-partner-logo {
    max-width: 150px;
  }
}
```

---

## SECTION 4: IMPLEMENTATION INSTRUCTIONS

### STEP 1: Update Elite Partners Section on Homepage

**File:** `index.html` (English) and `fr/index.html` (French)

**Action:** Replace entire Elite Partners section

**English Version:**
```html
<section class="elite-partners">
  <div class="container">
    <div class="elite-partners-container">
      <h2 class="section-title">Elite Partners</h2>
      <p class="section-subtitle">
        We collaborate with industry-leading technology partners 
        to deliver comprehensive solutions
      </p>
      
      <div class="elite-partners-grid">
        <!-- Partner 1: Acontis Technologies -->
        <div class="elite-partner-card">
          <img 
            src="/assets/partners/acontis-logo.png" 
            alt="Acontis Technologies"
            class="elite-partner-logo"
          >
          <h3>Acontis Technologies</h3>
          <p class="elite-partner-description">
            Strategic partner for EtherCAT solutions and real-time technologies. 
            Together, we deliver cutting-edge industrial communication stacks 
            for safety-critical applications.
          </p>
        </div>
        
        <!-- ADD ADDITIONAL TECHNOLOGY PARTNERS HERE -->
        <!-- Example structure for Partner 2: -->
        <!--
        <div class="elite-partner-card">
          <img 
            src="/assets/partners/partner2-logo.png" 
            alt="Partner Name"
            class="elite-partner-logo"
          >
          <h3>Partner Name</h3>
          <p class="elite-partner-description">
            Description of partnership focus and collaboration
          </p>
        </div>
        -->
      </div>
    </div>
  </div>
</section>
```

**French Version:**
```html
<section class="elite-partners">
  <div class="container">
    <div class="elite-partners-container">
      <h2 class="section-title">Partenaires Elite</h2>
      <p class="section-subtitle">
        Nous collaborons avec des partenaires technologiques leaders 
        pour fournir des solutions complètes
      </p>
      
      <div class="elite-partners-grid">
        <!-- Partenaire 1: Acontis Technologies -->
        <div class="elite-partner-card">
          <img 
            src="/assets/partners/acontis-logo.png" 
            alt="Acontis Technologies"
            class="elite-partner-logo"
          >
          <h3>Acontis Technologies</h3>
          <p class="elite-partner-description">
            Partenaire stratégique pour les solutions EtherCAT et les technologies 
            temps réel. Ensemble, nous proposons des piles de communication 
            industrielles de pointe pour les applications critiques.
          </p>
        </div>
        
        <!-- AJOUTER DES PARTENAIRES TECHNOLOGIQUES SUPPLÉMENTAIRES ICI -->
      </div>
    </div>
  </div>
</section>
```

### STEP 2: Update Elite Partners on ALL Product Pages

**Files to update:**
- `fsoe-master.html` / `fr/fsoe-master.html`
- `fsoe-slave.html` / `fr/fsoe-slave.html`
- `profisafe-controller.html` / `fr/profisafe-controller.html`
- `profisafe-device.html` / `fr/profisafe-device.html`
- `canopen-master.html` / `fr/canopen-master.html`
- `canopen-slave.html` / `fr/canopen-slave.html`
- `canopen-safety-master.html` / `fr/canopen-safety-master.html`
- `canopen-safety-slave.html` / `fr/canopen-safety-slave.html`
- `opcua-server.html` / `fr/opcua-server.html`
- `opcua-client.html` / `fr/opcua-client.html`
- `j1939-ecu.html` / `fr/j1939-ecu.html`
- `j1939-diagnostics.html` / `fr/j1939-diagnostics.html`

**Action:** Replace Elite Partners section on each page with same grid structure as homepage

**Template (same for all product pages):**
```html
<!-- Elite Partners Section - BEFORE Related Products -->
<section class="elite-partners product-page-partners">
  <div class="container">
    <div class="elite-partners-container">
      <h2 class="section-title">Elite Partners</h2>
      
      <div class="elite-partners-grid">
        <!-- Acontis Technologies -->
        <div class="elite-partner-card">
          <img 
            src="/assets/partners/acontis-logo.png" 
            alt="Acontis Technologies"
            class="elite-partner-logo"
          >
          <h3>Acontis Technologies</h3>
          <p class="elite-partner-description">
            Strategic partner for EtherCAT solutions and real-time technologies
          </p>
        </div>
        
        <!-- Additional technology partners (same as homepage) -->
      </div>
    </div>
  </div>
</section>

<!-- Related Products Section (keep as-is) -->
<section class="related-products">
  <!-- ... -->
</section>
```

### STEP 3: Update CSS File

**File:** Main CSS file (e.g., `styles.css` or `main.css`)

**Action:** Replace entire `.elite-partners` CSS block

**Add this CSS:**
```css
/* Elite Partners Section - V6.2 Grid Layout */
.elite-partners {
  padding: 4rem 0;
  background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.elite-partners-container {
  max-width: 1200px;
  margin: 0 auto;
  text-align: center;
}

.section-subtitle {
  color: #666;
  font-size: 1.1rem;
  margin-bottom: 2rem;
  line-height: 1.6;
}

/* Grid layout for multiple partner cards */
.elite-partners-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
}

.elite-partner-card {
  background: white;
  border-radius: 12px;
  padding: 2rem;
  box-shadow: 0 4px 20px rgba(0,0,0,0.08);
  transition: transform 0.3s, box-shadow 0.3s;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.elite-partner-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.elite-partner-logo {
  max-width: 200px;
  height: auto;
  margin: 0 auto 1.5rem;
  display: block;
}

.elite-partner-card h3 {
  font-size: 1.3rem;
  color: #333;
  margin-bottom: 1rem;
}

.elite-partner-description {
  color: #666;
  line-height: 1.6;
  font-size: 0.95rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .elite-partners-grid {
    grid-template-columns: 1fr;
  }
  
  .elite-partner-card {
    padding: 1.5rem;
  }
  
  .elite-partner-logo {
    max-width: 150px;
  }
}
```

### STEP 4: Global Terminology Update

**Find and Replace:**
```
"Technology Partners" → "Elite Partners"
"Partenaires Technologiques" → "Partenaires Elite"
```

**Files to check:**
- All HTML files (English and French)
- Any markdown content files
- Meta descriptions
- Alt text in images

**Search pattern:**
```bash
# Search for any remaining "Technology Partners" references
grep -r "Technology Partners" .
grep -r "Partenaires Technologiques" .
```

**Action:** Replace ALL instances with "Elite Partners" / "Partenaires Elite"

### STEP 5: Add Partner Logo Assets

**Required Assets:**

Create directory structure:
```
/assets/partners/
  ├── acontis-logo.png (existing)
  ├── [partner2-logo].png (add as needed)
  ├── [partner3-logo].png (add as needed)
  └── [etc.]
```

**Logo specifications:**
- Format: PNG or SVG preferred
- Recommended width: 200-300px
- Transparent background
- High resolution (2x for retina displays)

---

## SECTION 5: TESTING & VERIFICATION CHECKLIST

### 5.1 Content Verification

```markdown
## Elite Partners Section
- [ ] Homepage displays Elite Partners in grid layout
- [ ] ALL technology partners are included (not just Acontis)
- [ ] Grid responsive: 2-3 columns on desktop, 1 column on mobile
- [ ] All partner logos display correctly
- [ ] All partner descriptions are accurate
- [ ] Hover effects work on partner cards
- [ ] Elite Partners section appears on ALL 12 product pages
- [ ] Product page Elite Partners matches homepage content
- [ ] Elite Partners positioned BEFORE Related Products on product pages

## Terminology Check
- [ ] NO instances of "Technology Partners" remain
- [ ] All references now say "Elite Partners"
- [ ] French translation says "Partenaires Elite"
- [ ] Section titles updated everywhere
- [ ] Meta descriptions updated if applicable

## Trusted By Section
- [ ] Still separate from Elite Partners
- [ ] Contains only customer logos (WattAlps, Whaller, Diehl, Coval)
- [ ] Grayscale effect working
- [ ] Color on hover working

## Layout & Design
- [ ] Grid layout displays correctly on desktop
- [ ] Grid responsive on tablet (2 columns)
- [ ] Grid responsive on mobile (1 column)
- [ ] Card spacing appropriate
- [ ] Card shadows and hover effects working
- [ ] Partner logos sized correctly
- [ ] Text readability good on all devices

## Functionality
- [ ] No broken images
- [ ] All partner cards clickable if links included
- [ ] Section loads properly on all pages
- [ ] No console errors
- [ ] Page performance not degraded
```

---

## SECTION 6: IMPLEMENTATION SEQUENCE

### Recommended Order for Claude Code

```markdown
1. PHASE 1 - CSS Updates (10 minutes)
   ✓ Update Elite Partners CSS to grid layout
   ✓ Add responsive breakpoints
   ✓ Test CSS in isolation

2. PHASE 2 - Homepage Update (15 minutes)
   ✓ Replace Elite Partners section on homepage (EN)
   ✓ Replace Elite Partners section on homepage (FR)
   ✓ Add grid structure
   ✓ Include all technology partners
   ✓ Test homepage rendering

3. PHASE 3 - Product Pages Update (30 minutes)
   ✓ Update Elite Partners on all 12 product pages (EN)
   ✓ Update Elite Partners on all 12 product pages (FR)
   ✓ Verify consistent structure across all pages
   ✓ Test each product page

4. PHASE 4 - Terminology Update (10 minutes)
   ✓ Global find-replace "Technology Partners" → "Elite Partners"
   ✓ Update French terminology
   ✓ Verify no instances remain

5. PHASE 5 - Assets & Testing (15 minutes)
   ✓ Add partner logo files
   ✓ Verify all images loading
   ✓ Run through testing checklist
   ✓ Fix any issues found
```

**Total estimated time: 1.5 hours**

---

## SECTION 7: CLAUDE CODE MASTER COMMAND

### Complete Update Command

```markdown
Claude Code, please update the AZIT website from V6.0 to V6.2 with the following changes:

CONTEXT:
In V6.0, "Elite Partners" incorrectly showed only Acontis Technologies as a single partner.
In V6.2, "Elite Partners" correctly represents ALL technology partners in a grid layout.

PHASE 1 - CSS UPDATES:
1. Update Elite Partners CSS to support grid layout for multiple partners
2. Change .elite-partners-container max-width from 800px to 1200px
3. Add new .elite-partners-grid class with CSS grid (repeat(auto-fit, minmax(300px, 1fr)))
4. Update .elite-partner-card to work within grid (flexbox column layout)
5. Reduce .elite-partner-logo max-width from 300px to 200px
6. Add responsive breakpoints (mobile: 1 column, tablet: 2 columns, desktop: auto-fit)
7. Update hover effects and shadows

PHASE 2 - HOMEPAGE UPDATES:
8. Replace Elite Partners section on index.html (English)
   - Change from single card to grid structure (<div class="elite-partners-grid">)
   - Keep Acontis Technologies as first partner
   - Add placeholder comments for additional technology partners
   - Ensure grid structure wraps all partner cards

9. Replace Elite Partners section on fr/index.html (French)
   - Same grid structure as English
   - Use French translations: "Partenaires Elite"

PHASE 3 - PRODUCT PAGES UPDATES:
10. Update Elite Partners section on ALL 12 product pages (English):
    - fsoe-master.html, fsoe-slave.html
    - profisafe-controller.html, profisafe-device.html
    - canopen-master.html, canopen-slave.html
    - canopen-safety-master.html, canopen-safety-slave.html
    - opcua-server.html, opcua-client.html
    - j1939-ecu.html, j1939-diagnostics.html
   - Replace single card with grid structure
   - Same content as homepage Elite Partners
   - Position BEFORE Related Products section

11. Update Elite Partners section on ALL 12 product pages (French)
    - Same changes as English version
    - Use "Partenaires Elite" terminology

PHASE 4 - TERMINOLOGY UPDATES:
12. Global find and replace: "Technology Partners" → "Elite Partners"
13. Global find and replace: "Partenaires Technologiques" → "Partenaires Elite"
14. Search for any remaining instances in:
    - HTML files
    - Comments
    - Alt text
    - Meta descriptions
15. Verify NO instances of old terminology remain

PHASE 5 - VERIFICATION:
16. Test homepage Elite Partners section (EN and FR)
17. Test all 12 product pages Elite Partners section (EN and FR)
18. Verify grid responsive behavior (desktop, tablet, mobile)
19. Check all partner logos display correctly
20. Verify Trusted By section remains separate and unchanged
21. Run through complete testing checklist

CRITICAL REMINDERS:
- Elite Partners = ALL technology partners (not just Acontis)
- Use grid layout (not single centered card)
- Update both English AND French versions
- Apply changes to homepage + ALL 12 product pages (26 pages total)
- "Technology Partners" must be replaced everywhere with "Elite Partners"
- Trusted By section remains separate (customer logos, not technology partners)
- Grid must be responsive: desktop (auto-fit), tablet (2 col), mobile (1 col)

Please confirm when each phase is complete and report any issues.
```

---

## SECTION 8: ROLLBACK PLAN

### If Issues Occur

```markdown
## Rollback to V6.0

If critical issues are discovered after deployment:

1. IMMEDIATE ACTION:
   - Revert to V6.0 codebase from version control
   - Deploy V6.0 to production
   - Document specific issues encountered

2. INVESTIGATION:
   - Review failed elements (grid layout, CSS, partner content)
   - Test changes in isolated environment
   - Identify root cause of failures

3. INCREMENTAL RE-DEPLOYMENT:
   - Apply V6.2 CSS changes first (test thoroughly)
   - Update homepage Elite Partners (test)
   - Update product pages in batches (test each batch)
   - Complete terminology updates last

## Backup Strategy
- Keep V6.0 codebase tagged in version control
- Document all V6.2 changes in commit messages
- Take screenshots of V6.0 Elite Partners for reference
```

---

## APPENDIX: QUICK REFERENCE

### V6.0 → V6.2 Change Summary

```
✓ Elite Partners: Single card (Acontis only) → Grid layout (ALL technology partners)
✓ Layout: Centered single card → Responsive grid (auto-fit, 2-3 columns)
✓ CSS: Updated for grid system with responsive breakpoints
✓ Content: Acontis only → All technology partners included
✓ Terminology: "Technology Partners" → "Elite Partners" (global)
✓ Pages updated: Homepage + all 12 product pages (26 pages with EN/FR)
```

### Files Most Impacted

1. **Main CSS file** (Elite Partners grid layout)
2. **Homepage** (index.html + fr/index.html)
3. **All 12 product pages** × 2 languages = 24 files
4. **Partner assets** (additional partner logos)

### Partner Management Going Forward

**To add new technology partner:**
1. Add partner logo to `/assets/partners/`
2. Add partner card to Elite Partners grid (homepage)
3. Add same partner card to all 12 product pages
4. Update both English and French versions
5. Verify responsive layout still works with new number of partners

---

*End of V6.0 → V6.2 Update Documentation*