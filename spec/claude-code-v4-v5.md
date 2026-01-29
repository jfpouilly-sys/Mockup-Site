# Claude Code Implementation Instructions
## AZIT Website V4 → V5 Update

**Target:** Claude Code AI  
**Task:** Update existing V4 website to V5 specification  
**Approach:** Global terminology replacement with contextual verification  
**Complexity:** Low - Primarily text replacements  

---

## CRITICAL RULES FOR CLAUDE CODE

1. **This is a TEXT-ONLY update** - No structural changes to HTML, CSS, or JavaScript
2. **Use search-and-replace carefully** - Review each instance before replacing
3. **Maintain context and grammar** - Ensure replacements make sense in context
4. **Update BOTH English and French** versions of all content
5. **Backup V4 files** before making changes (easy rollback if needed)
6. **Test after completion** to verify no layout breaks from text length changes

---

## UPDATE OVERVIEW

**Single Change Type:** Replace all instances of "hardware independent/independence" terminology with "low hardware dependency" terminology throughout the entire website.

**Estimated Instances:** 15-25 across all files  
**Estimated Time:** 15-30 minutes  
**Risk Level:** Low  

---

## PHASE 1: PREPARATION

### Step 1.1: Backup Current V4 State

Create a complete backup of the current V4 website:

```bash
# Create backup directory
mkdir -p backups/v4-backup-$(date +%Y%m%d)

# Copy all files
cp -r . backups/v4-backup-$(date +%Y%m%d)/

# Verify backup
ls -la backups/v4-backup-$(date +%Y%m%d)/
```

### Step 1.2: Identify All Affected Files

Run search to identify files containing the old terminology:

```bash
# Search for "hardware independent" (case-insensitive)
grep -rli "hardware independent" . --exclude-dir=node_modules --exclude-dir=.git

# Search for "hardware independence" (case-insensitive)
grep -rli "hardware independence" . --exclude-dir=node_modules --exclude-dir=.git

# Search for hyphenated version
grep -rli "hardware-independent" . --exclude-dir=node_modules --exclude-dir=.git
```

**Expected files:**
- index.html (EN)
- /fr/index.html (FR)
- communication-stacks.html (EN)
- /fr/communication-stacks.html (FR)
- products/fsoe-slave.html
- products/fsoe-master.html
- products/profisafe-slave.html
- products/profisafe-master.html
- products/canopen-slave.html
- products/canopen-master.html
- products/canopen-safety-slave.html
- products/canopen-safety-master.html
- products/j1939.html
- products/opc-ua.html
- services/porting.html
- services/expertise.html
- about.html (if exists)
- training.html
- (Plus all French /fr/ equivalents)

---

## PHASE 2: ENGLISH CONTENT UPDATES

### Step 2.1: Update Homepage (index.html)

**File:** `index.html`

**Search for:** The Key Benefits section with "Hardware Independent"

**Find this exact section:**
```html
<div class="benefit-card">
  <div class="benefit-icon">
    <svg><!-- Code icon --></svg>
  </div>
  <h3>Hardware Independent</h3>
  <p>Works with any MCU or RTOS. Easy porting via clean HAL.</p>
</div>
```

**Replace with:**
```html
<div class="benefit-card">
  <div class="benefit-icon">
    <svg><!-- Code icon --></svg>
  </div>
  <h3>Low Hardware Dependency</h3>
  <p>Works with any MCU or RTOS. Easy porting via clean HAL.</p>
</div>
```

**Verification:**
- Check that the heading wraps properly on mobile
- Verify the card height remains consistent with other cards

---

### Step 2.2: Update Communication Stacks Page (communication-stacks.html)

**File:** `communication-stacks.html`

**Location:** Coming Soon tab, OPC-UA section, Planned Features list

**Find:**
```html
<ul>
  <li>Full OPC-UA stack implementation</li>
  <li>Security profiles support</li>
  <li>Information modeling tools</li>
  <li>Same hardware independence philosophy</li>
</ul>
```

**Replace with:**
```html
<ul>
  <li>Full OPC-UA stack implementation</li>
  <li>Security profiles support</li>
  <li>Information modeling tools</li>
  <li>Same low hardware dependency approach</li>
</ul>
```

---

### Step 2.3: Update OPC-UA Coming Soon Page (products/opc-ua.html)

**File:** `products/opc-ua.html`

**Location:** Planned Features section

**Find:**
```html
<div class="feature-item">
  <h3>Hardware Independent</h3>
  <p>Same hardware independence philosophy as our other stacks</p>
</div>
```

**Replace with:**
```html
<div class="feature-item">
  <h3>Low Hardware Dependency</h3>
  <p>Same low hardware dependency approach as our other stacks</p>
</div>
```

---

### Step 2.4: Update Individual Product Pages

**Files to update:**
- products/fsoe-slave.html
- products/fsoe-master.html
- products/profisafe-slave.html
- products/profisafe-master.html
- products/canopen-slave.html
- products/canopen-master.html
- products/canopen-safety-slave.html
- products/canopen-safety-master.html
- products/j1939.html

**For EACH product page, perform these replacements:**

#### Replacement Set 1: Feature Lists

**Find variations like:**
```html
<li>Hardware independent implementation</li>
<li>Hardware-independent design</li>
<li>Complete hardware independence</li>
```

**Replace with:**
```html
<li>Low hardware dependency implementation</li>
<li>Design with low hardware dependency</li>
<li>Minimal hardware-specific code</li>
```

#### Replacement Set 2: Description Text

**Find variations like:**
```html
<p>Our stack is completely hardware independent, allowing easy integration...</p>
<p>The hardware-independent architecture enables...</p>
<p>Designed for hardware independence...</p>
```

**Replace with:**
```html
<p>Our stack has minimal hardware dependencies, allowing easy adaptation...</p>
<p>The low hardware dependency architecture enables...</p>
<p>Designed with low hardware dependency...</p>
```

#### Replacement Set 3: Benefits Sections

**Find variations like:**
```html
<div class="benefit">
  <h4>Hardware Independence</h4>
  <p>Works across any platform...</p>
</div>
```

**Replace with:**
```html
<div class="benefit">
  <h4>Low Hardware Dependency</h4>
  <p>Works across any platform...</p>
</div>
```

---

### Step 2.5: Update Services Pages

**File:** `services/porting.html`

**Find:**
```html
<p>Our stacks are designed with hardware independence in mind, making porting straightforward.</p>
```

**Replace with:**
```html
<p>Our stacks are designed with low hardware dependency in mind, making porting straightforward.</p>
```

---

**File:** `services/expertise.html`

**Find similar patterns and replace accordingly**

---

### Step 2.6: Update Training Page (training.html)

**File:** `training.html`

**Find:**
```html
<div class="training-program">
  <h3>Protocol Stack Development</h3>
  <ul class="training-topics">
    <li>Stack architecture</li>
    <li>Hardware-independent design patterns</li>
    <li>Implementation best practices</li>
  </ul>
</div>
```

**Replace with:**
```html
<div class="training-program">
  <h3>Protocol Stack Development</h3>
  <ul class="training-topics">
    <li>Stack architecture</li>
    <li>Low hardware dependency design patterns</li>
    <li>Implementation best practices</li>
  </ul>
</div>
```

---

### Step 2.7: Update About Page (if exists)

**File:** `about.html`

**Search for any mentions of:**
- "hardware independence"
- "hardware independent"
- "hardware-independent"

**Replace with appropriate V5 terminology:**
- "low hardware dependency"
- "minimal hardware dependencies"
- "minimal hardware-specific code"

**Context matters:** Ensure the replacement makes grammatical sense.

---

## PHASE 3: FRENCH CONTENT UPDATES

### Step 3.1: French Terminology Reference

**V4 French Terms:**
- "Indépendant du matériel"
- "Indépendance matérielle"
- "Indépendant matériellement"

**V5 French Terms:**
- "Faible dépendance matérielle"
- "Dépendance matérielle minimale"
- "Peu dépendant du matériel"

### Step 3.2: Update French Homepage (/fr/index.html)

**Find:**
```html
<div class="benefit-card">
  <h3>Indépendant du matériel</h3>
  <p>Fonctionne avec n'importe quel MCU ou RTOS...</p>
</div>
```

**Replace with:**
```html
<div class="benefit-card">
  <h3>Faible dépendance matérielle</h3>
  <p>Fonctionne avec n'importe quel MCU ou RTOS...</p>
</div>
```

### Step 3.3: Update All French Product Pages

**Files:** /fr/products/*.html

Apply the same pattern of replacements as in English, using the French terminology:

- "indépendant du matériel" → "faible dépendance matérielle"
- "indépendance matérielle" → "dépendance matérielle minimale"
- "conception indépendante du matériel" → "conception avec faible dépendance matérielle"

### Step 3.4: Update All Other French Pages

Apply updates to:
- /fr/communication-stacks.html
- /fr/services/porting.html
- /fr/services/expertise.html
- /fr/training.html
- /fr/about.html (if exists)

---

## PHASE 4: AUTOMATED SEARCH AND REPLACE

### Step 4.1: Use Global Find and Replace

For efficiency, use a text editor or script to perform global replacements:

**Replacement Table (Case-Sensitive):**

| Find | Replace |
|------|---------|
| Hardware Independent | Low Hardware Dependency |
| hardware independent | low hardware dependency |
| Hardware Independence | Low hardware dependency |
| hardware independence | low hardware dependency |
| Hardware-Independent | low hardware dependency |
| hardware-independent | low hardware dependency |

**French Replacements:**

| Find (FR) | Replace (FR) |
|-----------|--------------|
| Indépendant du matériel | Faible dépendance matérielle |
| indépendant du matériel | faible dépendance matérielle |
| Indépendance matérielle | Dépendance matérielle minimale |
| indépendance matérielle | dépendance matérielle minimale |

### Step 4.2: Execute Replacements Carefully

**For each file:**

1. Open the file
2. Search for old terminology
3. Review the context
4. Perform replacement
5. Verify grammar and flow
6. Save file

**Command-line approach (use with caution):**

```bash
# Example using sed (review each file before committing)
# This is just an example - review changes carefully!

find . -name "*.html" -type f -exec sed -i.bak 's/Hardware Independent/Low Hardware Dependency/g' {} \;
find . -name "*.html" -type f -exec sed -i.bak 's/hardware independent/low hardware dependency/g' {} \;
find . -name "*.html" -type f -exec sed -i.bak 's/Hardware Independence/Low hardware dependency/g' {} \;
```

**Important:** Always review changes before committing!

---

## PHASE 5: CONTEXTUAL VERIFICATION

### Step 5.1: Review Each Replacement in Context

For each file that was modified, manually review:

**Check for:**
- ✓ Grammatical correctness
- ✓ Natural flow of sentences
- ✓ Technical accuracy
- ✓ Proper capitalization based on context

**Common issues to watch for:**

**Problem:** "Our low hardware dependency allows you to..."
**Better:** "Our minimal hardware dependencies allow you to..."

**Problem:** "Designed for low hardware dependency..."
**Better:** "Designed with low hardware dependency..."

**Problem:** "Complete low hardware dependency"
**Better:** "Minimal hardware-specific code"

### Step 5.2: Verify Specific Sections

**Homepage Key Benefits:**
- [ ] Title: "Low Hardware Dependency"
- [ ] Description makes sense
- [ ] Card aligns with other benefit cards

**Product Pages:**
- [ ] Feature lists are grammatically correct
- [ ] Overview paragraphs flow naturally
- [ ] Technical descriptions maintain accuracy

**Coming Soon OPC-UA:**
- [ ] "Same low hardware dependency approach" reads naturally
- [ ] Feature card title and description align

---

## PHASE 6: TESTING AND VALIDATION

### Step 6.1: Run Verification Searches

Verify that NO instances of old terminology remain:

```bash
# These searches should return NO results (or only in backup/documentation)
grep -rn "hardware independent" . --exclude-dir=backups --exclude-dir=node_modules
grep -rn "hardware independence" . --exclude-dir=backups --exclude-dir=node_modules
grep -rn "hardware-independent" . --exclude-dir=backups --exclude-dir=node_modules

# French versions
grep -rn "indépendant du matériel" ./fr --exclude-dir=backups
grep -rn "indépendance matérielle" ./fr --exclude-dir=backups
```

**Expected result:** Zero matches (except in backup directories or this documentation)

### Step 6.2: Visual Testing

**Test each modified page:**

1. **Homepage (index.html)**
   - [ ] Open in browser
   - [ ] Check Key Benefits section
   - [ ] Verify "Low Hardware Dependency" displays correctly
   - [ ] Test responsive design (mobile, tablet, desktop)
   - [ ] Ensure card heights are consistent

2. **Communication Stacks (communication-stacks.html)**
   - [ ] Navigate to Coming Soon tab
   - [ ] Verify OPC-UA section shows updated text
   - [ ] Check bullet point alignment

3. **Product Pages**
   - [ ] Spot-check 2-3 product pages
   - [ ] Verify features lists display correctly
   - [ ] Check description paragraphs

4. **OPC-UA Coming Soon Page**
   - [ ] Verify feature card displays correctly
   - [ ] Check heading and description alignment

5. **Services and Training Pages**
   - [ ] Quick visual check for layout issues
   - [ ] Verify text doesn't overflow containers

### Step 6.3: French Version Testing

Repeat visual testing for French versions:
- [ ] /fr/index.html
- [ ] /fr/communication-stacks.html
- [ ] Sample product pages in /fr/products/
- [ ] French services and training pages

### Step 6.4: Cross-Browser Testing

Test on major browsers:
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

**Check specifically:**
- Text wrapping at different viewport widths
- No layout breaks from longer/shorter text
- Heading sizes remain consistent

---

## PHASE 7: FINAL VERIFICATION

### Step 7.1: Complete Checklist

Before considering V5 update complete:

**Content Updates:**
- [ ] All English content updated
- [ ] All French content updated
- [ ] No instances of "hardware independent/independence" found
- [ ] All replacements grammatically correct
- [ ] Technical accuracy maintained

**Visual Verification:**
- [ ] Homepage Key Benefits section correct
- [ ] Communication Stacks page updated
- [ ] All product pages checked
- [ ] OPC-UA coming soon page verified
- [ ] Services pages reviewed
- [ ] Training page confirmed

**Testing:**
- [ ] No layout breaks on desktop
- [ ] No layout breaks on mobile
- [ ] Text wraps properly at all breakpoints
- [ ] French versions display correctly
- [ ] Cross-browser compatibility confirmed

**Documentation:**
- [ ] Changelog updated
- [ ] Version number changed to 5.0
- [ ] Backup of V4 saved

---

## PHASE 8: CLEANUP

### Step 8.1: Remove Backup Files

If you used sed with .bak files:

```bash
# Review .bak files first, then remove
find . -name "*.bak" -type f -delete
```

### Step 8.2: Update Version References

**In any README or documentation files, update:**

```markdown
Current Version: 5.0
Last Updated: January 2025
```

---

## ROLLBACK PROCEDURE

If any issues are discovered after implementation:

### Quick Rollback

**Option 1: Restore from Backup**
```bash
# Copy V4 backup back
cp -r backups/v4-backup-YYYYMMDD/* .
```

**Option 2: Reverse Replacements**
If only minor issues, reverse the search-and-replace:

| Find (V5) | Replace (V4) |
|-----------|--------------|
| Low Hardware Dependency | Hardware Independent |
| low hardware dependency | hardware independent |

French reversals:
| Find (V5) | Replace (V4) |
|-----------|--------------|
| Faible dépendance matérielle | Indépendant du matériel |
| faible dépendance matérielle | indépendant du matériel |

---

## ADVANCED: REGEX PATTERNS

For developers comfortable with regex:

### Step 9.1: Regex Search Patterns

**Pattern 1: Find any variation of "hardware independent"**
```regex
[Hh]ardware[- ]?[Ii]ndependen[ct]e?
```

**Pattern 2: Find in context**
```regex
\b[Hh]ardware[- ]?independent\b
```

### Step 9.2: Context-Aware Replacements

When using regex, consider the surrounding context:

```regex
# Match "hardware independence" in feature lists
<li>.*[Hh]ardware independence.*</li>

# Replace with appropriate phrasing based on context
```

---

## QUALITY ASSURANCE CHECKLIST

### Final QA Review

**Content Quality:**
- [ ] All terminology updated consistently
- [ ] Grammar and spelling correct
- [ ] Technical accuracy maintained
- [ ] Natural reading flow preserved

**Technical Quality:**
- [ ] No broken links
- [ ] No layout issues
- [ ] No console errors
- [ ] Responsive design works

**Localization Quality:**
- [ ] French translations sound natural
- [ ] Terminology consistent within each language
- [ ] No mixed English/French on same page

**SEO/Metadata:**
- [ ] Page titles updated if needed
- [ ] Meta descriptions reviewed
- [ ] Alt text doesn't use old terminology

---

## SUPPORT NOTES FOR CLAUDE CODE

**Key Points:**
- This is the SIMPLEST update so far (V3→V4 was complex, V4→V5 is simple)
- Focus on accuracy and consistency rather than speed
- When in doubt, preserve context and meaning over literal replacement
- French translations should prioritize naturalness
- Test visual rendering due to potential text length differences
- No structural or functional changes needed

**Common Pitfalls to Avoid:**
- Don't replace in code comments unless they affect user-facing content
- Don't replace in URLs or file names (unlikely but check)
- Don't break sentence structure with awkward replacements
- Don't forget to update BOTH languages

---

## COMPLETION CRITERIA

The V4 → V5 update is complete when:

1. ✓ Zero instances of "hardware independent/independence" in content
2. ✓ All replacements verified for context and grammar
3. ✓ Visual testing passed on all major pages
4. ✓ French content updated and verified
5. ✓ No layout or functionality issues introduced
6. ✓ Documentation updated to reflect V5

---

*End of Claude Code Implementation Instructions for V4 → V5*