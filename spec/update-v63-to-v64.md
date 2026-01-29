# AZIT Website Update: V6.3 → V6.4
## Training Courses, Pricing & Company Timeline Update

**Version Update:** 6.3 → 6.4  
**Date:** January 2025  
**Impact Level:** MEDIUM - Training section + Company page timeline

---

## EXECUTIVE SUMMARY

### What Changed in V6.4

| Category | Changes | Impact |
|----------|---------|--------|
| **Training Courses** | Added complete catalog with pricing | HIGH - New Training pages |
| **Pricing Structure** | Inter-Enterprise + Private Company pricing | MEDIUM - Training pages |
| **Labels Removed** | Beginner/Intermediate → "Up to 6 participants" | LOW - All training cards |
| **Company Timeline** | AZIT creation year = 2026 | LOW - Company/About page |

### Data Sources
- ISIT Formations page: https://www.isit.fr/fr/formations/formations.php
- ISIT Industrial Networks Training page
- ISIT Software Quality Training page

---

## SECTION 1: TRAINING COURSES & PRICING

### 1.1 Complete Training Catalog

**Industrial Networks Training:**

| Course | Duration | Inter-Enterprise | Private Company |
|--------|----------|------------------|-----------------|
| CAN Training | 2 days | 1 390 € | On request |
| CANopen Training | 2 days | 1 390 € | On request |
| J1939 Training | 2 days | 1 390 € | On request |
| EtherCAT Training | 2 days | 1 390 € | On request |
| Industrial Ethernet Training | 2 days | 1 390 € | On request |
| Ethernet/IP - CIP Training | 2 days | 1 590 € | On request |
| PROFINET Training | 2 days | 1 000 € | On request |
| Industrial Ethernet Troubleshooting | 1 day | 790 € | On request |

**Safety Standards Training:**

| Course | Duration | Inter-Enterprise | Private Company |
|--------|----------|------------------|-----------------|
| IEC 61508 | 3 days | 2 450 € | On request |
| ISO 26262 (Automotive) | 3 days | 2 450 € | On request |
| ISO 21434 (Automotive Cybersecurity) | 3 days | 2 450 € | On request |
| IEC 62304 (Medical) | 2 days | 1 750 € | On request |
| DO-178C (Aeronautics) | 3 days | 2 450 € | On request |
| EN 50716 (Railway) | 2 days | 1 750 € | On request |
| ISO 13849 (Machinery) | 2 days | 1 750 € | On request |
| ISO 25119 (Agricultural) | 2 days | 1 750 € | On request |

**Cybersecurity & Real-Time Training:**

| Course | Duration | Inter-Enterprise | Private Company |
|--------|----------|------------------|-----------------|
| Embedded Systems Cybersecurity | 2 days | 1 390 € | On request |
| Medical Device Cybersecurity | 1 day | 960 € | On request |
| FreeRTOS Implementation | 2 days | 1 490 € | On request |
| MISRA C:2025 | 2 days | 1 000 € | On request |

### 1.2 Pricing Rules Applied

1. **Inter-Enterprise prices** from ISIT website (exact values)
2. **Private Company (Intra)** = "On request" (requires quote)
3. **Default price** for missing data = 1 000 €
4. All prices are **per session, up to 6 participants**

---

## SECTION 2: LABEL CHANGES

### 2.1 Labels to Remove

**FIND and REMOVE all instances:**

```
"Beginner" / "Débutant"
"Intermediate" / "Intermédiaire"  
"Advanced" / "Avancé"
"Level 1" / "Niveau 1"
"Level 2" / "Niveau 2"
"Level 3" / "Niveau 3"
"skill-level" classes
"difficulty-badge" classes
```

### 2.2 Replace With

**New Capacity Badge:**

```html
<!-- BEFORE -->
<span class="skill-level beginner">Beginner</span>
<span class="difficulty-badge">Intermediate</span>

<!-- AFTER -->
<span class="capacity-badge">
  <Users size={16} />
  Up to 6 participants
</span>
```

**French Version:**
```html
<span class="capacity-badge">
  <Users size={16} />
  Jusqu'à 6 participants
</span>
```

---

## SECTION 3: COMPANY PAGE TIMELINE UPDATE

### 3.1 Timeline Content

**BEFORE (if exists):**
```html
<div class="timeline-item">
  <span class="year">2024</span>
  <p>AZIT brand created...</p>
</div>
```

**AFTER:**
```html
<div class="timeline">
  <div class="timeline-item">
    <span class="year">1992</span>
    <h4>ISIT Founded</h4>
    <p>ISIT founded in Toulouse, France</p>
  </div>
  
  <div class="timeline-item">
    <span class="year">1995</span>
    <h4>CANopen Development</h4>
    <p>First CANopen protocol stack development</p>
  </div>
  
  <div class="timeline-item">
    <span class="year">2000</span>
    <h4>CiA Partnership</h4>
    <p>Partnership with CAN in Automation</p>
  </div>
  
  <div class="timeline-item">
    <span class="year">2005</span>
    <h4>EtherCAT Expertise</h4>
    <p>EtherCAT expertise development begins</p>
  </div>
  
  <div class="timeline-item">
    <span class="year">2010</span>
    <h4>Safety Protocols</h4>
    <p>Safety protocol development (CANopen Safety)</p>
  </div>
  
  <div class="timeline-item">
    <span class="year">2015</span>
    <h4>FSoE Launch</h4>
    <p>FSoE (Safety over EtherCAT) stack launch</p>
  </div>
  
  <div class="timeline-item">
    <span class="year">2020</span>
    <h4>BV Certification</h4>
    <p>Bureau Véritas certification partnership</p>
  </div>
  
  <div class="timeline-item">
    <span class="year">2024</span>
    <h4>30+ Years Expertise</h4>
    <p>30+ years of embedded software expertise</p>
  </div>
  
  <div class="timeline-item highlight">
    <span class="year">2026</span>
    <h4>AZIT Brand Created</h4>
    <p>Dedicated industrial protocol stacks division of ISIT</p>
  </div>
</div>
```

### 3.2 About AZIT Content Update

```html
<section class="about-azit">
  <h2>About AZIT</h2>
  <p>
    <strong>AZIT</strong>, created in <strong>2026</strong>, is the dedicated 
    industrial communication protocol division of ISIT (Cybersec & Safety Partners). 
    Building on over 30 years of ISIT's expertise in embedded software and fieldbus 
    technologies, AZIT focuses exclusively on delivering pre-certified, production-ready 
    protocol stacks for safety-critical industrial applications.
  </p>
  <p>
    Our mission is to accelerate your time-to-market with BV Approved communication 
    stacks that reduce certification complexity while maintaining the highest safety standards.
  </p>
</section>
```

---

## SECTION 4: HTML TEMPLATES

### 4.1 Training Card Template

```html
<div class="training-card">
  <div class="training-header">
    <h3>CAN Training</h3>
    <span class="capacity-badge">
      <svg><!-- Users icon --></svg>
      Up to 6 participants
    </span>
  </div>
  
  <div class="training-meta">
    <span class="duration">
      <svg><!-- Clock icon --></svg>
      2 days
    </span>
  </div>
  
  <p class="training-description">
    Implementation of the CAN bus. CiA member with over 10 years 
    of experience in CAN/CANopen technologies.
  </p>
  
  <div class="training-pricing">
    <div class="price-row">
      <span class="price-label">Inter-Enterprise:</span>
      <span class="price-value">1 390 €</span>
    </div>
    <div class="price-row">
      <span class="price-label">Private Company:</span>
      <span class="price-value on-request">On request</span>
    </div>
  </div>
  
  <p class="price-note">Per session pricing</p>
  
  <div class="training-actions">
    <a href="/contact?training=can" class="btn btn-primary">Request Information</a>
    <a href="/downloads/can-training-brochure.pdf" class="btn btn-secondary">Download Brochure</a>
  </div>
</div>
```

### 4.2 Training Page Structure

```html
<!-- Training Overview Page -->
<section class="training-hero">
  <h1>Training Courses</h1>
  <p class="subtitle">Expert-led training for industrial communication protocols and safety standards</p>
  <p class="pricing-note">
    <strong>All prices are per session, up to 6 participants.</strong>
    Available in Inter-Enterprise (scheduled sessions) or Private Company (custom dates) formats.
  </p>
</section>

<!-- Industrial Networks Section -->
<section class="training-category">
  <h2>Industrial Networks Training</h2>
  <p>CiA member and EtherCAT Technology Group partner with 30+ years of fieldbus expertise.</p>
  
  <div class="training-grid">
    <!-- Training cards here -->
  </div>
</section>

<!-- Safety Standards Section -->
<section class="training-category">
  <h2>Safety Standards Training</h2>
  <p>Comprehensive training on functional safety standards for various industries.</p>
  
  <div class="training-grid">
    <!-- Training cards here -->
  </div>
</section>

<!-- Cybersecurity & Real-Time Section -->
<section class="training-category">
  <h2>Cybersecurity & Real-Time Training</h2>
  <p>Secure by design development and RTOS implementation.</p>
  
  <div class="training-grid">
    <!-- Training cards here -->
  </div>
</section>
```

---

## SECTION 5: CSS ADDITIONS

### 5.1 Training Card CSS

```css
/* Training Card */
.training-card {
  background: white;
  border-radius: 12px;
  padding: 2rem;
  box-shadow: 0 4px 15px rgba(0,0,0,0.08);
  margin-bottom: 1.5rem;
  transition: transform 0.3s, box-shadow 0.3s;
}

.training-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.12);
}

.training-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  gap: 1rem;
  margin-bottom: 1rem;
}

.training-header h3 {
  margin: 0;
  font-size: 1.25rem;
  color: #333;
}

/* Capacity Badge - Replaces skill level labels */
.capacity-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  background: #e8f4fd;
  color: #1a73e8;
  padding: 0.35rem 0.85rem;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 500;
  white-space: nowrap;
}

.capacity-badge svg {
  width: 16px;
  height: 16px;
}

/* Training Meta */
.training-meta {
  display: flex;
  gap: 1.5rem;
  margin: 1rem 0;
  color: #666;
  font-size: 0.9rem;
}

.training-meta span {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.training-description {
  color: #555;
  line-height: 1.6;
  margin-bottom: 1rem;
}

/* Pricing Section */
.training-pricing {
  background: #f8f9fa;
  border-radius: 8px;
  padding: 1rem;
  margin: 1rem 0;
}

.price-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.5rem 0;
}

.price-row:not(:last-child) {
  border-bottom: 1px solid #e0e0e0;
}

.price-label {
  color: #666;
  font-size: 0.9rem;
}

.price-value {
  font-weight: 600;
  color: #333;
  font-size: 1.1rem;
}

.price-value.on-request {
  color: #1a73e8;
  font-style: italic;
  font-weight: 500;
}

.price-note {
  font-size: 0.85rem;
  color: #888;
  margin-top: 0.5rem;
  text-align: center;
}

/* Training Actions */
.training-actions {
  display: flex;
  gap: 1rem;
  margin-top: 1.5rem;
}

.training-actions .btn {
  flex: 1;
  text-align: center;
}

/* Training Grid */
.training-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 1.5rem;
}

/* Responsive */
@media (max-width: 768px) {
  .training-header {
    flex-direction: column;
  }
  
  .training-meta {
    flex-direction: column;
    gap: 0.5rem;
  }
  
  .training-actions {
    flex-direction: column;
  }
  
  .training-grid {
    grid-template-columns: 1fr;
  }
}
```

### 5.2 Timeline CSS

```css
/* Timeline */
.timeline {
  position: relative;
  padding-left: 3rem;
  margin: 2rem 0;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 0.75rem;
  top: 0;
  bottom: 0;
  width: 2px;
  background: #e0e0e0;
}

.timeline-item {
  position: relative;
  padding-bottom: 2rem;
}

.timeline-item::before {
  content: '';
  position: absolute;
  left: -2.35rem;
  top: 0.25rem;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #1a73e8;
  border: 2px solid white;
  box-shadow: 0 0 0 2px #1a73e8;
}

.timeline-item .year {
  display: inline-block;
  background: #1a73e8;
  color: white;
  padding: 0.25rem 0.75rem;
  border-radius: 4px;
  font-weight: 600;
  font-size: 0.9rem;
  margin-bottom: 0.5rem;
}

.timeline-item h4 {
  margin: 0.5rem 0;
  color: #333;
  font-size: 1.1rem;
}

.timeline-item p {
  color: #666;
  margin: 0;
  line-height: 1.5;
}

/* Highlight for AZIT creation */
.timeline-item.highlight::before {
  background: #34a853;
  box-shadow: 0 0 0 2px #34a853;
}

.timeline-item.highlight .year {
  background: #34a853;
}
```

---

## SECTION 6: TESTING CHECKLIST

```markdown
## Training Pages
- [ ] All 20 training courses displayed with correct information
- [ ] Inter-Enterprise prices match ISIT website values
- [ ] Private Company shows "On request" for all courses
- [ ] "Up to 6 participants" badge on all training cards
- [ ] No "Beginner/Intermediate/Advanced" labels anywhere
- [ ] Duration shown correctly for each course
- [ ] Training grid responsive on mobile
- [ ] Request Information button links to contact form
- [ ] Download Brochure button functional (or placeholder)

## Pricing Display
- [ ] Prices formatted correctly (X XXX €)
- [ ] "Per session pricing" note visible
- [ ] "On request" styled distinctly (blue, italic)
- [ ] Pricing explanation in hero section

## Company Page
- [ ] Timeline shows all years from 1992 to 2026
- [ ] 2026 marked as AZIT creation year
- [ ] 2026 entry highlighted visually
- [ ] About AZIT section mentions "created in 2026"
- [ ] Timeline responsive on mobile

## Labels
- [ ] NO "Beginner" labels anywhere
- [ ] NO "Intermediate" labels anywhere
- [ ] NO "Advanced" labels anywhere
- [ ] NO "Level 1/2/3" labels anywhere
- [ ] All replaced with "Up to 6 participants"

## Bilingual
- [ ] English: "Up to 6 participants"
- [ ] French: "Jusqu'à 6 participants"
- [ ] English: "On request"
- [ ] French: "Sur demande"
- [ ] All training content in both languages
```

---

## SECTION 7: CLAUDE CODE MASTER COMMAND

```markdown
Claude Code, please update the AZIT website from V6.3 to V6.4 with training courses and company timeline:

PHASE 1 - TRAINING SECTION CREATION:
1. Add "Training" to main navigation menu
2. Create Training overview page (/training or /services/training)
3. Create three training category sections:
   - Industrial Networks Training
   - Safety Standards Training
   - Cybersecurity & Real-Time Training

PHASE 2 - INDUSTRIAL NETWORKS TRAINING CARDS:
4. Create training cards for each course with this data:
   - CAN Training: 2 days, Inter: 1 390 €, Private: On request
   - CANopen Training: 2 days, Inter: 1 390 €, Private: On request
   - J1939 Training: 2 days, Inter: 1 390 €, Private: On request
   - EtherCAT Training: 2 days, Inter: 1 390 €, Private: On request
   - Industrial Ethernet Training: 2 days, Inter: 1 390 €, Private: On request
   - Ethernet/IP - CIP Training: 2 days, Inter: 1 590 €, Private: On request
   - PROFINET Training: 2 days, Inter: 1 000 €, Private: On request
   - Industrial Ethernet Troubleshooting: 1 day, Inter: 790 €, Private: On request

PHASE 3 - SAFETY STANDARDS TRAINING CARDS:
5. Create training cards:
   - IEC 61508: 3 days, Inter: 2 450 €, Private: On request
   - ISO 26262 (Automotive): 3 days, Inter: 2 450 €, Private: On request
   - ISO 21434 (Automotive Cybersecurity): 3 days, Inter: 2 450 €, Private: On request
   - IEC 62304 (Medical): 2 days, Inter: 1 750 €, Private: On request
   - DO-178C (Aeronautics): 3 days, Inter: 2 450 €, Private: On request
   - EN 50716 (Railway): 2 days, Inter: 1 750 €, Private: On request
   - ISO 13849 (Machinery): 2 days, Inter: 1 750 €, Private: On request
   - ISO 25119 (Agricultural): 2 days, Inter: 1 750 €, Private: On request

PHASE 4 - CYBERSECURITY & REAL-TIME TRAINING CARDS:
6. Create training cards:
   - Embedded Systems Cybersecurity: 2 days, Inter: 1 390 €, Private: On request
   - Medical Device Cybersecurity: 1 day, Inter: 960 €, Private: On request
   - FreeRTOS Implementation: 2 days, Inter: 1 490 €, Private: On request
   - MISRA C:2025: 2 days, Inter: 1 000 €, Private: On request

PHASE 5 - TRAINING CARD TEMPLATE:
7. Each training card must include:
   - Course name (h3)
   - Capacity badge: "Up to 6 participants" with Users icon
   - Duration with Clock icon
   - Brief description
   - Pricing box with:
     * Inter-Enterprise: [price] €
     * Private Company: On request
   - Note: "Per session pricing"
   - Buttons: "Request Information", "Download Brochure"

PHASE 6 - REMOVE SKILL LEVEL LABELS:
8. Search and REMOVE all instances of:
   - "Beginner" / "Débutant"
   - "Intermediate" / "Intermédiaire"
   - "Advanced" / "Avancé"
   - "Level 1/2/3" / "Niveau 1/2/3"
   - Classes: skill-level, difficulty-badge, level-badge
9. REPLACE all with capacity badge: "Up to 6 participants"

PHASE 7 - COMPANY PAGE TIMELINE:
10. Update Company/About page with chronological timeline:
    - 1992: ISIT founded in Toulouse
    - 1995: First CANopen protocol stack
    - 2000: CiA partnership
    - 2005: EtherCAT expertise begins
    - 2010: Safety protocol development
    - 2015: FSoE stack launch
    - 2020: Bureau Véritas partnership
    - 2024: 30+ years expertise
    - 2026: AZIT brand created (HIGHLIGHT THIS)
11. Update About AZIT text to say "created in 2026"

PHASE 8 - CSS ADDITIONS:
12. Add training card CSS (see spec)
13. Add capacity badge CSS (blue background, pill shape)
14. Add pricing section CSS
15. Add timeline CSS with highlight for 2026

PHASE 9 - FRENCH TRANSLATION:
16. Create French version of training page
17. Translate all training names and descriptions
18. Use French labels:
    - "Jusqu'à 6 participants"
    - "Sur demande"
    - "Formation Inter-entreprise"
    - "Formation Intra-entreprise"
    - "Par session"
19. Update French Company page timeline

PHASE 10 - VERIFICATION:
20. Test all 20 training cards display correctly
21. Verify pricing shows correctly
22. Verify NO skill level labels remain
23. Verify timeline shows 2026 as AZIT creation
24. Test responsive behavior
25. Check both EN and FR versions

CRITICAL REMINDERS:
- All prices are PER SESSION, UP TO 6 PARTICIPANTS
- "Beginner/Intermediate/Advanced" labels MUST be removed everywhere
- Replace ALL skill labels with "Up to 6 participants"
- AZIT creation year is 2026 (NOT 2024 or 2025)
- Private Company pricing = "On request" (NOT a specific price)
- Default price for missing data = 1 000 €
- Training links to product pages where relevant

Please confirm each phase and report any issues.
```

---

## APPENDIX: V6.3 → V6.4 CHANGE SUMMARY

```
✓ Training: Added 20 training courses with pricing
✓ Pricing: Inter-Enterprise (from ISIT) + Private Company (On request)
✓ Labels: Removed Beginner/Intermediate/Advanced
✓ Labels: Added "Up to 6 participants" badge
✓ Timeline: Added chronological history 1992-2026
✓ Timeline: AZIT creation = 2026 (highlighted)
✓ Navigation: Added Training to main menu
✓ CSS: Training cards, pricing, capacity badge, timeline
✓ Bilingual: EN + FR versions
```

---

*End of V6.3 → V6.4 Update Documentation*