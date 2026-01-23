# AZIT Website Update: V5.1 → V6.0
## Complete Change Documentation & Claude Code Implementation Instructions

**Version Update:** 5.1 → 6.0  
**Date:** January 2025  
**Impact Level:** MAJOR - Navigation restructure + terminology updates + content reorganization

---

## EXECUTIVE SUMMARY

### What Changed in V6.0

| Category | Changes | Impact |
|----------|---------|--------|
| **Navigation** | Added dual-level menu structure | HIGH - Structural change |
| **Certification** | TÜV → Bureau Véritas | HIGH - All pages affected |
| **Partners** | Created Elite Partners section, moved Acontis | MEDIUM - New section |
| **Terminology** | Updated hardware/OS dependency terms | MEDIUM - All pages affected |
| **Content Removal** | Removed "Full source code" references | MEDIUM - Multiple pages |

### Quick Stats
- **Pages affected:** ALL
- **New sections:** 2 (Top menu, Elite Partners)
- **Terminology replacements:** 6 global find-replace operations
- **Removed content:** 2 types of references

---

## SECTION 1: NAVIGATION CHANGES

### 1.1 Top Menu Addition (NEW STRUCTURE)

**BEFORE (V5.1):**
```
[Main Navigation Menu]
Products | Solutions | Industries | Services | Company | Blog
                                                    [EN/FR switcher]
```

**AFTER (V6.0):**
```
[Top Menu]
Company | Blog & News                                    [EN/FR switcher]

[Main Navigation Menu]
Products | Solutions | Industries | Services
```

### 1.2 Implementation Instructions

#### STEP 1: Create Top Menu HTML Structure

```html
<!-- ADD THIS BEFORE EXISTING MAIN NAVIGATION -->
<div class="top-menu">
  <div class="top-menu-container">
    <nav class="top-menu-nav">
      <!-- Company Dropdown -->
      <div class="top-menu-item dropdown">
        <button class="top-menu-link dropdown-toggle">
          Company
          <ChevronDown size={16} />
        </button>
        <div class="dropdown-menu">
          <a href="/about">About AZIT</a>
          <a href="/about-isit">About ISIT</a>
          <a href="/team">Team</a>
          <a href="/careers">Careers</a>
          <a href="/contact">Contact</a>
        </div>
      </div>

      <!-- Blog & News Link -->
      <a href="/blog" class="top-menu-link">Blog & News</a>
    </nav>

    <!-- Language Switcher (moved from main nav) -->
    <div class="language-switcher">
      <button class="language-button active" data-lang="en">EN</button>
      <span class="language-separator">|</span>
      <button class="language-button" data-lang="fr">FR</button>
    </div>
  </div>
</div>

<!-- EXISTING MAIN NAVIGATION CONTINUES HERE -->
<nav class="main-navigation">
  <!-- Products, Solutions, Industries, Services -->
  <!-- Remove Company and Blog from here -->
  <!-- Remove language switcher from here -->
</nav>
```

#### STEP 2: Add Top Menu CSS

```css
/* Top Menu Container */
.top-menu {
  background: #f8f9fa;
  border-bottom: 1px solid #e0e0e0;
  padding: 0.5rem 0;
  font-size: 0.9rem;
  position: sticky;
  top: 0;
  z-index: 1000;
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
  align-items: center;
}

.top-menu-item {
  position: relative;
}

.top-menu-link {
  color: #333;
  text-decoration: none;
  padding: 0.5rem 0;
  display: flex;
  align-items: center;
  gap: 0.25rem;
  transition: color 0.3s;
  background: none;
  border: none;
  cursor: pointer;
  font-size: 0.9rem;
}

.top-menu-link:hover {
  color: var(--color-primary);
}

/* Top Menu Dropdown */
.top-menu-item .dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  background: white;
  border: 1px solid #e0e0e0;
  border-radius: 4px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  min-width: 180px;
  display: none;
  z-index: 1001;
  margin-top: 0.5rem;
}

.top-menu-item:hover .dropdown-menu,
.top-menu-item.active .dropdown-menu {
  display: block;
}

.top-menu-item .dropdown-menu a {
  display: block;
  padding: 0.75rem 1rem;
  color: #333;
  text-decoration: none;
  transition: background 0.3s;
}

.top-menu-item .dropdown-menu a:hover {
  background: #f8f9fa;
  color: var(--color-primary);
}

/* Language Switcher in Top Menu */
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
  color: #666;
  font-size: 0.9rem;
  transition: color 0.3s;
}

.language-button:hover {
  color: #333;
}

.language-button.active {
  color: var(--color-primary);
  font-weight: 600;
}

.language-separator {
  color: #ccc;
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .top-menu-container {
    flex-direction: column;
    gap: 1rem;
  }
  
  .top-menu-nav {
    flex-direction: column;
    gap: 0.5rem;
    width: 100%;
  }
  
  .language-switcher {
    align-self: flex-end;
  }
}
```

#### STEP 3: Update Main Navigation

**REMOVE from main navigation:**
- "Company" menu item and dropdown
- "Blog" menu item
- Language switcher (EN/FR toggle)

**KEEP in main navigation:**
- Products (with all dropdown columns)
- Solutions
- Industries
- Services

#### STEP 4: Update French Translation

```html
<!-- French version of top menu -->
<div class="top-menu">
  <div class="top-menu-container">
    <nav class="top-menu-nav">
      <div class="top-menu-item dropdown">
        <button class="top-menu-link dropdown-toggle">
          Entreprise
          <ChevronDown size={16} />
        </button>
        <div class="dropdown-menu">
          <a href="/fr/a-propos">À propos d'AZIT</a>
          <a href="/fr/a-propos-isit">À propos d'ISIT</a>
          <a href="/fr/equipe">Équipe</a>
          <a href="/fr/carrieres">Carrières</a>
          <a href="/fr/contact">Contact</a>
        </div>
      </div>
      <a href="/fr/blog" class="top-menu-link">Blog & Actualités</a>
    </nav>
    <div class="language-switcher">
      <button class="language-button" data-lang="en">EN</button>
      <span class="language-separator">|</span>
      <button class="language-button active" data-lang="fr">FR</button>
    </div>
  </div>
</div>
```

---

## SECTION 2: CERTIFICATION TERMINOLOGY CHANGES

### 2.1 Global Find-Replace Operations

| OLD TEXT (V5.1) | NEW TEXT (V6.0) | Occurrences |
|-----------------|-----------------|-------------|
| TÜV Approved | BV Approved | ~15-20 |
| TÜV SÜD | Bureau Véritas | ~10-15 |
| TÜV certified | Bureau Véritas certified | ~5-10 |
| TÜV certification | BV certification | ~5-10 |

### 2.2 Implementation Instructions

#### STEP 5: Execute Global Replacements

```bash
# Claude Code command format:
# Search entire codebase and replace:

REPLACE:
  "TÜV Approved" → "BV Approved"
  "TÜV SÜD" → "Bureau Véritas"
  "TÜV certified" → "Bureau Véritas certified"
  "TÜV certification" → "BV certification"

# Files to update:
- All HTML files (*.html)
- All template files (*.jsx, *.tsx if applicable)
- All markdown content files (*.md)
- Homepage (index.html)
- All product pages (fsoe-master.html, profisafe-controller.html, etc.)
- Services pages
- About page
- Footer templates
```

#### STEP 6: Update Certification Badges/Icons

**BEFORE:**
```html
<div class="certification-badge">
  <img src="/assets/badges/tuv-approved.svg" alt="TÜV Approved">
  <span>TÜV Approved</span>
</div>
```

**AFTER:**
```html
<div class="certification-badge">
  <img src="/assets/badges/bv-approved.svg" alt="BV Approved">
  <span>BV Approved</span>
</div>
```

**NOTE:** Update or create BV (Bureau Véritas) badge assets:
- Create: `/assets/badges/bv-approved.svg`
- Remove: `/assets/badges/tuv-approved.svg` (or archive)

---

## SECTION 3: ELITE PARTNERS SECTION

### 3.1 Conceptual Change

**BEFORE (V5.1):**
```
Homepage has:
- "Trusted By" section with: WattAlps, Whaller, Diehl, Coval

No mention of Acontis or technology partners
```

**AFTER (V6.0):**
```
Homepage has:
- "Elite Partners" section with: Acontis
- "Trusted By" section with: WattAlps, Whaller, Diehl, Coval

All product pages have:
- "Elite Partners" section (before Related Products)
```

### 3.2 Implementation Instructions

#### STEP 7: Create Elite Partners Section on Homepage

**INSERT THIS AFTER Key Benefits section, BEFORE Trusted By section:**

```html
<!-- Elite Partners Section -->
<section class="elite-partners">
  <div class="container">
    <div class="elite-partners-container">
      <h2 class="section-title">Elite Partners</h2>
      <p class="section-subtitle">
        We collaborate with industry-leading technology partners 
        to deliver comprehensive solutions
      </p>
      
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
    </div>
  </div>
</section>

<!-- Trusted By Section (existing, keep as-is) -->
<section class="trusted-by">
  <!-- WattAlps, Whaller, Diehl, Coval logos -->
</section>
```

**French version:**
```html
<section class="elite-partners">
  <div class="container">
    <div class="elite-partners-container">
      <h2 class="section-title">Partenaires Elite</h2>
      <p class="section-subtitle">
        Nous collaborons avec des partenaires technologiques leaders 
        pour fournir des solutions complètes
      </p>
      
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
    </div>
  </div>
</section>
```

#### STEP 8: Add Elite Partners CSS

```css
/* Elite Partners Section */
.elite-partners {
  padding: 4rem 0;
  background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.elite-partners-container {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

.section-subtitle {
  color: #666;
  font-size: 1.1rem;
  margin-bottom: 2rem;
  line-height: 1.6;
}

.elite-partner-card {
  background: white;
  border-radius: 12px;
  padding: 3rem 2rem;
  box-shadow: 0 4px 20px rgba(0,0,0,0.08);
  margin-top: 2rem;
  transition: transform 0.3s, box-shadow 0.3s;
}

.elite-partner-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.elite-partner-logo {
  max-width: 300px;
  height: auto;
  margin: 0 auto 1.5rem;
  display: block;
}

.elite-partner-card h3 {
  font-size: 1.5rem;
  color: #333;
  margin-bottom: 1rem;
}

.elite-partner-description {
  color: #666;
  line-height: 1.8;
  font-size: 1rem;
}

@media (max-width: 768px) {
  .elite-partner-card {
    padding: 2rem 1.5rem;
  }
  
  .elite-partner-logo {
    max-width: 200px;
  }
}
```

#### STEP 9: Add Elite Partners to ALL Product Pages

**LOCATION:** Before "Related Products" section on every product page

**Product pages to update:**
- fsoe-master.html
- fsoe-slave.html
- profisafe-controller.html
- profisafe-device.html
- canopen-master.html
- canopen-slave.html
- canopen-safety-master.html
- canopen-safety-slave.html
- opcua-server.html
- opcua-client.html
- j1939-ecu.html
- j1939-diagnostics.html

**Template to insert:**
```html
<!-- Elite Partners Section (add before Related Products) -->
<section class="elite-partners product-page-partners">
  <div class="container">
    <div class="elite-partners-container">
      <h2 class="section-title">Elite Partners</h2>
      
      <div class="elite-partner-card">
        <img 
          src="/assets/partners/acontis-logo.png" 
          alt="Acontis Technologies"
          class="elite-partner-logo"
        >
        <h3>Acontis Technologies</h3>
        <p class="elite-partner-description">
          Strategic partner for EtherCAT solutions and real-time technologies.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Related Products Section (existing, keep as-is) -->
<section class="related-products">
  <!-- ... -->
</section>
```

---

## SECTION 4: CONTENT REMOVAL

### 4.1 Remove "Full Source Code" References

#### STEP 10: Remove Full Source Code Labels/Badges

**FIND and REMOVE all instances of:**

```html
<!-- Remove these badge/label elements: -->
<span class="badge full-source">FULL SOURCE CODE</span>
<div class="label full-source-label">FULL SOURCE CODE</div>
<span class="tag">FULL SOURCE CODE</span>

<!-- Remove these text references: -->
<li>Full source code provided</li>
<p>Full source code provided for all implementations</p>
"Full source code included"
```

**Files to check:**
- Product pages (all 12 product pages)
- Homepage benefits/features section
- Solutions pages
- Services pages

**Search pattern:**
```bash
# Search for:
- "FULL SOURCE CODE" (uppercase badge text)
- "Full source code" (any capitalization)
- "full source code" (lowercase)
- Class names: "full-source", "source-code-badge"
```

**Action:** DELETE all matching elements and text

---

## SECTION 5: TERMINOLOGY STANDARDIZATION

### 5.1 Hardware & OS Dependency Terms

#### STEP 11: Update Technical Terminology

**Global replacements:**

| OLD TERM (V5.1) | NEW TERM (V6.0) | Context |
|-----------------|-----------------|---------|
| Hardware agnostic | Low hardware dependency | Technical features |
| Hardware independent | Low hardware dependency | Product descriptions |
| Hardware independence | Low hardware dependency | Benefits sections |
| RTOS independent | Low OS dependency | Technical specifications |
| OS independent | Low OS dependency | Feature lists |

**Implementation:**

```bash
# Execute these replacements across all files:

1. "Hardware agnostic" → "Low hardware dependency"
2. "Hardware independent" → "Low hardware dependency"
3. "Hardware independence" → "Low hardware dependency"
4. "RTOS independent" → "Low OS dependency"
5. "OS independent" → "Low OS dependency"

# Files affected:
- Homepage (index.html + fr version)
- All product pages (12 pages × 2 languages = 24 files)
- Solutions pages
- Technical documentation pages
- About/Services pages
```

#### STEP 12: Update Feature Lists

**BEFORE (V5.1):**
```html
<ul class="feature-list">
  <li><strong>Hardware agnostic:</strong> Works across multiple platforms</li>
  <li><strong>RTOS independent:</strong> Compatible with various operating systems</li>
  <li><strong>Full source code provided:</strong> Complete implementation access</li>
</ul>
```

**AFTER (V6.0):**
```html
<ul class="feature-list">
  <li><strong>Low hardware dependency:</strong> Portable across multiple platforms</li>
  <li><strong>Low OS dependency:</strong> Works with various RTOS options</li>
  <li><strong>Comprehensive documentation:</strong> Complete technical guides included</li>
</ul>
```

---

## SECTION 6: FRENCH TRANSLATIONS

### 6.1 New French Terms for V6

| English | French |
|---------|--------|
| Elite Partners | Partenaires Elite |
| Blog & News | Blog & Actualités |
| BV Approved | Approuvé BV |
| Bureau Véritas | Bureau Véritas (same) |
| Low hardware dependency | Faible dépendance matérielle |
| Low OS dependency | Faible dépendance OS |

### 6.2 Navigation French Updates

**Top menu:**
```html
Entreprise | Blog & Actualités | [EN | FR]
```

**Main menu:** (unchanged from V5.1)
```html
Produits | Solutions | Industries | Services
```

---

## SECTION 7: TESTING & VERIFICATION CHECKLIST

### 7.1 Pre-Deployment Checklist

```markdown
## Navigation Testing
- [ ] Top menu displays correctly on desktop
- [ ] Top menu collapses properly on mobile
- [ ] Company dropdown works in top menu
- [ ] Blog & News link works in top menu
- [ ] Language switcher functions in top menu
- [ ] Main navigation no longer has Company/Blog items
- [ ] Main navigation no longer has language switcher

## Content Verification
- [ ] NO instances of "TÜV" remain anywhere
- [ ] All certification references say "BV Approved" or "Bureau Véritas"
- [ ] Elite Partners section appears on homepage
- [ ] Elite Partners section appears on all 12 product pages
- [ ] Elite Partners section positioned before Related Products
- [ ] Trusted By section still exists with 4 standard partners
- [ ] NO "Full source code" text remains anywhere
- [ ] NO "FULL SOURCE CODE" badges remain anywhere

## Terminology Verification
- [ ] All "Hardware agnostic" changed to "Low hardware dependency"
- [ ] All "Hardware independent" changed to "Low hardware dependency"
- [ ] All "RTOS independent" changed to "Low OS dependency"
- [ ] Terminology consistent in English version
- [ ] Terminology consistent in French version

## Visual/Design Testing
- [ ] Elite Partners section styling matches spec
- [ ] Top menu styling matches spec
- [ ] Partner logos display correctly
- [ ] Acontis logo displays in Elite Partners section
- [ ] Responsive design works on mobile/tablet/desktop
- [ ] All images load correctly
- [ ] No broken links

## Language Testing
- [ ] English version complete and accurate
- [ ] French version complete and accurate
- [ ] Language switcher correctly toggles between versions
- [ ] All French translations implemented for new sections
```

---

## SECTION 8: IMPLEMENTATION SEQUENCE

### Recommended Order for Claude Code

```markdown
1. PHASE 1 - Navigation (30 minutes)
   ✓ Create top menu HTML structure
   ✓ Add top menu CSS
   ✓ Remove Company/Blog from main nav
   ✓ Remove language switcher from main nav
   ✓ Test navigation on all pages

2. PHASE 2 - Global Text Replacements (20 minutes)
   ✓ Replace all TÜV references → Bureau Véritas/BV
   ✓ Replace hardware/OS terminology
   ✓ Remove "Full source code" references
   ✓ Update certification badges

3. PHASE 3 - Elite Partners Section (40 minutes)
   ✓ Add Elite Partners CSS
   ✓ Create Elite Partners section on homepage
   ✓ Add Elite Partners to all 12 product pages
   ✓ Position before Related Products sections

4. PHASE 4 - French Translation (20 minutes)
   ✓ Translate top menu to French
   ✓ Translate Elite Partners section to French
   ✓ Update French terminology
   ✓ Verify all French pages

5. PHASE 5 - Testing (30 minutes)
   ✓ Run through testing checklist
   ✓ Fix any issues found
   ✓ Final verification
```

**Total estimated time: 2-3 hours**

---

## SECTION 9: ASSET REQUIREMENTS

### New Assets Needed for V6

```markdown
## Images
- [ ] Bureau Véritas logo/badge (bv-approved.svg)
      Replace: /assets/badges/tuv-approved.svg
      
- [ ] Acontis Technologies logo (acontis-logo.png)
      Location: /assets/partners/acontis-logo.png
      Format: PNG or SVG
      Dimensions: ~300px width recommended

## Optional Assets
- [ ] Elite Partners section background image (if not using gradient)
- [ ] Updated certification documentation (PDF) referencing BV instead of TÜV
```

---

## SECTION 10: CLAUDE CODE MASTER COMMAND

### Complete Update Command

```markdown
Claude Code, please update the AZIT website from V5.1 to V6.0 with the following changes:

PHASE 1 - NAVIGATION RESTRUCTURE:
1. Create a new top-level menu above the main navigation
2. Move "Company" (with dropdown) and "Blog & News" to top menu
3. Move language switcher (EN/FR) to top menu (right-aligned)
4. Remove Company, Blog, and language switcher from main navigation
5. Apply provided CSS for top menu styling
6. Implement responsive behavior for mobile devices

PHASE 2 - CERTIFICATION UPDATES:
7. Replace ALL "TÜV Approved" → "BV Approved"
8. Replace ALL "TÜV SÜD" → "Bureau Véritas"
9. Replace ALL "TÜV certified" → "Bureau Véritas certified"
10. Update certification badge images (tuv-approved.svg → bv-approved.svg)

PHASE 3 - ELITE PARTNERS SECTION:
11. Create new "Elite Partners" section on homepage
12. Add Acontis Technologies as Elite Partner with logo and description
13. Duplicate Elite Partners section on ALL 12 product pages
14. Position Elite Partners BEFORE "Related Products" on product pages
15. Apply provided Elite Partners CSS styling
16. Keep existing "Trusted By" section separate with 4 standard partners

PHASE 4 - CONTENT REMOVAL:
17. Remove ALL instances of "FULL SOURCE CODE" label/badge
18. Remove ALL text "Full source code provided"
19. Search and delete all full-source-code related HTML elements

PHASE 5 - TERMINOLOGY UPDATES:
20. Replace "Hardware agnostic" → "Low hardware dependency"
21. Replace "Hardware independent" → "Low hardware dependency"
22. Replace "RTOS independent" → "Low OS dependency"

PHASE 6 - FRENCH TRANSLATION:
23. Translate all new content to French:
    - "Elite Partners" → "Partenaires Elite"
    - "Blog & News" → "Blog & Actualités"
    - "Company" → "Entreprise"
    - Technical terms as per French translation table
24. Ensure language switcher works correctly in new top menu

PHASE 7 - VERIFICATION:
25. Run through complete testing checklist
26. Verify no V5.1 terminology remains
27. Test responsive behavior
28. Verify all 12 product pages updated correctly
29. Check both English and French versions

CRITICAL REMINDERS:
- Elite Partners is SEPARATE from "Trusted By"
- NO "TÜV" references should remain anywhere
- NO "Full source code" references should remain anywhere
- Elite Partners section must appear on ALL product pages
- Use "Low hardware dependency" NOT "hardware independent/agnostic"
- Top menu is ABOVE main navigation, not replacing it

Please confirm when each phase is complete.
```

---

## SECTION 11: ROLLBACK PLAN

### If Issues Occur

```markdown
## Rollback to V5.1

If critical issues are discovered after deployment:

1. IMMEDIATE ACTION:
   - Revert to V5.1 codebase from version control
   - Deploy V5.1 to production
   - Document specific issues encountered

2. INVESTIGATION:
   - Review failed elements (navigation, content, styling)
   - Test individual changes in isolated environment
   - Identify root cause of failures

3. INCREMENTAL RE-DEPLOYMENT:
   - Apply V6 changes in phases rather than all at once
   - Test each phase thoroughly before proceeding
   - Start with lowest-risk changes (terminology) first
   - Add structural changes (navigation, sections) last

## Backup Strategy
- Keep V5.1 codebase tagged in version control
- Document all V6 changes in commit messages
- Create automated tests for critical functionality
```

---

## APPENDIX: QUICK REFERENCE

### V5.1 → V6.0 Change Summary

```
✓ Navigation: Added top menu (Company, Blog & News, Language switcher)
✓ Certification: TÜV → Bureau Véritas (BV) globally
✓ Partners: Created Elite Partners section (Acontis)
✓ Partners: Elite Partners on homepage + all product pages
✓ Content: Removed all "Full source code" references
✓ Terminology: "Hardware agnostic" → "Low hardware dependency"
✓ Terminology: "RTOS independent" → "Low OS dependency"
✓ Translation: French versions of all new content
```

### Files Most Impacted

1. **Navigation template** (new top menu structure)
2. **Homepage** (Elite Partners section)
3. **All 12 product pages** (Elite Partners section)
4. **All pages** (terminology replacements)
5. **CSS files** (top menu and Elite Partners styling)

---

*End of V5.1 → V6.0 Update Documentation*