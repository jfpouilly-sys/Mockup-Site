# Claude Code - V7 to V7.1-RGAA Implementation

**Mission:** Transform the AZIT website from V7 to V7.1-RGAA with full RGAA 4.1.2 accessibility compliance.

**Current Status:** V7 has ~27% RGAA compliance (non-compliant)  
**Target:** V7.1-RGAA with 65-75% compliance (partial compliance ✅)

---

## QUICK START

```bash

# 2. Create directories
mkdir -p src/styles/accessibility
mkdir -p src/js/accessibility
mkdir -p src/pages/accessibilite
mkdir -p src/pages/sitemap

# 3. Follow the delta instructions document step-by-step
```

---

## IMPLEMENTATION PHASES

### ✅ **Phase 1: Foundation** (Critical - Do First)
1. Create `src/styles/accessibility/a11y-utils.css` - All accessibility CSS
2. Create `src/js/accessibility/keyboard-nav.js` - Keyboard navigation
3. Update all HTML files: Add `lang` attribute to `<html>`
4. Update all HTML files: Add skip link as first element
5. Update all HTML files: Add ARIA live region

**Checkpoint:** Skip link should appear on Tab, pressing Enter scrolls to main content

---

### ✅ **Phase 2: HTML Structure** (Critical)
1. Update all HTML: Add ARIA landmarks (`role="banner"`, `role="main"`, `role="contentinfo"`)
2. Update navigation: Add ARIA labels and keyboard support
3. Update dropdowns: Make keyboard accessible with ARIA states
4. Update all pages: Add unique, descriptive `<title>` tags
5. Link accessibility CSS and JS in all pages

**Checkpoint:** Tab through site - all menus accessible via keyboard

---

### ✅ **Phase 3: Expertise Page** (High Priority)
1. Update `/expertise/index.html` with full accessibility:
   - Proper heading hierarchy (H1 → H2)
   - `<article>` and `<section>` semantic elements
   - Accessible links with context
   - Decorative images marked with `aria-hidden="true"`

**Checkpoint:** Expertise page passes axe DevTools with 0 critical issues

---

### ✅ **Phase 4: New Pages** (Required)
1. Create `/accessibilite/index.html` - Accessibility statement (mandatory)
2. Create `/sitemap/index.html` - Site map
3. Update footer: Add accessibility badge and links to new pages

**Checkpoint:** Both new pages accessible from footer, validate HTML

---

### ✅ **Phase 5: CSS Updates** (High Priority)
1. Update `src/styles/main.css`:
   - Link color: `#0891b2` → `#0e7490` (better contrast)
   - Secondary text: `#64748b` → `#475569` (better contrast)
   - Add focus styles (3px outline)
   - Add `:focus-visible` support

**Checkpoint:** Run contrast checker - all text meets 4.5:1 ratio

---

### ✅ **Phase 6: Images** (Medium Priority)
1. Add `alt` text to all images
2. Mark decorative images: `alt=""` + `role="presentation"`
3. Add `width` and `height` to all images
4. Wrap decorative illustrations in `aria-hidden="true"` parent

**Checkpoint:** No missing alt attributes in axe DevTools

---

### ✅ **Phase 7: Testing** (Final)
1. Run HTML validator on all pages
2. Run axe DevTools - 0 critical issues
3. Test keyboard navigation
4. Verify color contrast
5. Test screen reader (if possible)

**Checkpoint:** All tests pass, ready for review

---

## KEY FILES TO CREATE

### 1. Accessibility Utilities CSS
**File:** `src/styles/accessibility/a11y-utils.css`  
**Size:** ~200 lines  
**Contains:** Skip links, focus styles, screen reader utilities, reduced motion

### 2. Keyboard Navigation JavaScript  
**File:** `src/js/accessibility/keyboard-nav.js`  
**Size:** ~400 lines  
**Contains:** Dropdown keyboard nav, ARIA live announcements, form validation, focus management

### 3. Accessibility Statement
**File:** `src/pages/accessibilite/index.html`  
**Size:** ~200 lines  
**Contains:** RGAA compliance statement, audit results, contact info, remediation

### 4. Site Map
**File:** `src/pages/sitemap/index.html`  
**Size:** ~150 lines  
**Contains:** Full site hierarchy with links to all pages

---

## CRITICAL CHANGES TO ALL HTML FILES

### In `<html>` tag:
```html
<!-- BEFORE -->
<html>

<!-- AFTER -->
<html lang="fr"> <!-- or lang="en" for English pages -->
```

### In `<head>`:
```html
<!-- ADD unique title -->
<title>Page Name - Section - AZIT</title>

<!-- ADD accessibility CSS -->
<link rel="stylesheet" href="/styles/accessibility/a11y-utils.css">
```

### At start of `<body>`:
```html
<!-- ADD as FIRST element -->
<a href="#main-content" class="skip-link">Aller au contenu principal</a>

<!-- ADD ARIA live region -->
<div id="aria-live-region" aria-live="polite" aria-atomic="true" class="sr-only"></div>
```

### Update structure:
```html
<!-- ADD role="banner" -->
<header role="banner">

<!-- ADD role="main" and id -->
<main id="main-content" role="main" tabindex="-1">

<!-- ADD role="contentinfo" -->
<footer role="contentinfo">
```

### At end of `<body>`:
```html
<!-- ADD accessibility JavaScript FIRST -->
<script src="/js/accessibility/keyboard-nav.js"></script>
<script src="/js/main.js"></script>
```

---

## NAVIGATION CHANGES

### Dropdown menus:
```html
<!-- BEFORE -->
<button>Products</button>
<ul class="dropdown">
  <li><a href="/products/stacks">Stacks</a></li>
</ul>

<!-- AFTER -->
<button aria-expanded="false" 
        aria-controls="products-menu"
        aria-haspopup="true"
        type="button">
  Products
</button>
<ul id="products-menu" role="menu" hidden>
  <li role="none"><a href="/products/stacks" role="menuitem">Stacks</a></li>
</ul>
```

### Active navigation:
```html
<!-- ADD aria-current to active page -->
<a href="/expertise" aria-current="page">Expertise</a>
```

### Navigation labels:
```html
<!-- ADD aria-label to distinguish navigations -->
<nav aria-label="Navigation principale">
<nav aria-label="Liens du pied de page">
```

---

## EXPERTISE PAGE CHANGES

### Cards:
```html
<!-- BEFORE -->
<div class="expertise-card">
  <div class="expertise-content">
    <h2>Safety Compliance</h2>
    <p>Description...</p>
    <a href="/expertise/safety-compliance">Learn more →</a>
  </div>
  <div class="expertise-illustration">
    <img src="/images/expertise/safety.svg" />
  </div>
</div>

<!-- AFTER -->
<article class="expertise-card" aria-labelledby="safety-title">
  <div class="expertise-content">
    <h2 id="safety-title">Safety Compliance</h2>
    <p>Description...</p>
    <a href="/expertise/safety-compliance" 
       aria-labelledby="safety-link safety-title"
       class="expertise-link">
      <span id="safety-link">Learn more</span>
      <span aria-hidden="true"> →</span>
      <span class="sr-only"> about Safety Compliance services</span>
    </a>
  </div>
  <div class="expertise-illustration" aria-hidden="true">
    <img src="/images/expertise/safety.svg" alt="" role="presentation" />
  </div>
</article>
```

---

## TESTING COMMANDS

```bash
# HTML validation (manual)
# Visit: https://validator.w3.org/

# Check for skip links
grep -r "skip-link" src/

# Check for lang attributes  
grep -r 'lang=' src/ | grep html

# Check for ARIA landmarks
grep -r 'role="main"' src/
grep -r 'role="banner"' src/

# Check for alt attributes
grep -r '<img' src/ | grep -v 'alt='  # Should return nothing

# Count files changed
git diff --name-only V7 | wc -l
```

---

## SUCCESS CRITERIA

✅ **Phase 1 Complete:**
- Skip link appears on Tab
- ARIA live region exists
- All HTML has `lang` attribute

✅ **Phase 2 Complete:**
- All pages have ARIA landmarks
- Navigation keyboard accessible
- Dropdowns work with Enter/Esc/Arrows

✅ **Phase 3 Complete:**
- Expertise page uses semantic HTML
- Links have context
- Images properly marked

✅ **Phase 4 Complete:**
- Accessibility statement exists at `/accessibilite`
- Site map exists at `/sitemap`
- Footer links to both

✅ **Phase 5 Complete:**
- Link color is `#0e7490`
- All focus indicators visible (3px outline)
- Contrast ratios meet WCAG AA

✅ **Phase 6 Complete:**
- All images have alt text
- Decorative images have alt="" 
- No missing alt warnings

✅ **Phase 7 Complete:**
- HTML validates
- axe DevTools: 0 critical issues
- Keyboard navigation works
- Ready for review

---

## COMMIT MESSAGE

```bash
git commit -m "feat: implement RGAA 4.1.2 accessibility compliance (V7.1-RGAA)

MAJOR CHANGES:
- Add accessibility utilities (CSS + JS)
- Implement skip links and ARIA landmarks on all pages
- Update all HTML with proper semantic structure
- Add keyboard navigation for all dropdowns
- Create accessibility statement page (/accessibilite)
- Create site map page (/sitemap)
- Update color contrast ratios for WCAG AA compliance
- Add comprehensive form accessibility
- Implement focus management
- Add ARIA live regions for dynamic content
- Update all navigation with ARIA labels and states

COMPLIANCE:
- Before: ~27% RGAA compliance (non-compliant)
- After: ~65-75% RGAA compliance (partial compliance ✅)

TESTING:
- HTML validation: Pass
- axe DevTools: 0 critical issues
- Keyboard navigation: Fully functional
- Color contrast: WCAG AA compliant

Refs: RGAA 4.1.2, WCAG 2.1 Level AA"
```

---

## IMPORTANT NOTES

1. **Load accessibility CSS FIRST** in all HTML files
2. **Skip link MUST be first** focusable element
3. **Test keyboard navigation** after each phase
4. **Never remove** existing functionality - only enhance
5. **Keep V7 design** - only add accessibility features
6. **French is primary language** - use `lang="fr"` by default

---

## GETTING HELP

If you encounter issues:

1. **JavaScript not working?**
   - Check console for errors
   - Verify script loads after HTML
   - Test in browser DevTools

2. **Skip link not visible?**
   - Check CSS loaded
   - Verify `.skip-link:focus` has `top: 0`

3. **Dropdowns not working?**
   - Check `aria-controls` matches `id`
   - Verify `hidden` attribute present
   - Test keyboard (Enter, Esc, Arrows)

4. **HTML not validating?**
   - Use W3C Validator
   - Fix errors before continuing
   - Common issues: unclosed tags, invalid attributes

---

## PRIORITY ORDER

**Do in this exact order:**

1. Phase 1: Foundation ⭐ **CRITICAL**
2. Phase 2: HTML Structure ⭐ **CRITICAL**  
3. Phase 5: CSS Updates ⭐ **HIGH PRIORITY**
4. Phase 3: Expertise Page ⚠️ **HIGH PRIORITY**
5. Phase 4: New Pages ⚠️ **REQUIRED**
6. Phase 6: Images 📝 **MEDIUM**
7. Phase 7: Testing ✅ **FINAL**

---

## ESTIMATED TIME

- Phase 1: 30-45 minutes
- Phase 2: 1-2 hours  
- Phase 3: 30 minutes
- Phase 4: 45 minutes
- Phase 5: 30 minutes
- Phase 6: 30-45 minutes
- Phase 7: 30 minutes

**Total:** 4-6 hours for full implementation

---

## READY TO START?

Follow the **"V7 to V7.1-RGAA Delta Implementation Instructions"** document step by step.

Start with Phase 1, Checkpoint 1.1: Create Accessibility CSS.

Good luck! 🚀

---

**Questions?** Refer to the full delta instructions document for complete code examples and detailed explanations.