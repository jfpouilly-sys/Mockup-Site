# AZIT Website - Complete Specification V6.4

**Version:** 6.4  
**Date:** January 2025  
**Purpose:** Complete specification with training courses, pricing, and company timeline update

---

## 1. NAVIGATION STRUCTURE

### 1.1 Top-Level Menu

**Position:** Above main navigation menu  
**Persistence:** Must appear on ALL pages of the website  
**Items:**

1. **Company** (Dropdown - unfolds in foreground, z-index: 2000)
   - About AZIT
   - About ISIT (parent company)
   - Team
   - Careers
   - Contact

2. **Blog & News** (Link)

3. **Globe Icon (Language Switcher)** (Right-aligned)
   - EN | FR toggle

### 1.2 Main Navigation Menu

**Products | Solutions | Industries | Services | Training**

---

## 2. COMPANY PAGE - TIMELINE

### 2.1 Chronological Timeline (Updated in V6.4)

| Year | Event |
|------|-------|
| **1992** | ISIT founded in Toulouse, France |
| **1995** | First CANopen protocol stack development |
| **2000** | Partnership with CiA (CAN in Automation) |
| **2005** | EtherCAT expertise development begins |
| **2010** | Safety protocol development (CANopen Safety) |
| **2015** | FSoE (Safety over EtherCAT) stack launch |
| **2020** | Bureau Véritas certification partnership |
| **2024** | 30+ years of embedded software expertise |
| **2026** | **AZIT brand created** - Dedicated industrial protocol stacks division |

### 2.2 About AZIT Section Content

**Headline:** "AZIT - Industrial Protocol Stacks Excellence"

**Content:**
```
AZIT, created in 2026, is the dedicated industrial communication protocol 
division of ISIT (Cybersec & Safety Partners). Building on over 30 years 
of ISIT's expertise in embedded software and fieldbus technologies, AZIT 
focuses exclusively on delivering pre-certified, production-ready protocol 
stacks for safety-critical industrial applications.

Our mission is to accelerate your time-to-market with BV Approved 
communication stacks that reduce certification complexity while 
maintaining the highest safety standards.
```

---

## 3. TRAINING COURSES & PRICING

### 3.1 Pricing Structure

**All training prices are per session, up to 6 participants.**

**Training Formats:**
- **Inter-Enterprise Training:** Scheduled sessions in Toulouse, Paris region, or remote. Participants from different companies.
- **Private Company Training (Intra):** Dedicated session for one company. Custom dates, on-site or remote. Content can be customized.

### 3.2 Industrial Networks Training

| Course | Duration | Inter-Enterprise Price | Private Company Price |
|--------|----------|------------------------|----------------------|
| **CAN Training** | 2 days | 1 390 € | On request |
| **CANopen Training** | 2 days | 1 390 € | On request |
| **J1939 Training** | 2 days | 1 390 € | On request |
| **EtherCAT Training** | 2 days | 1 390 € | On request |
| **Industrial Ethernet Training** | 2 days | 1 390 € | On request |
| **Ethernet/IP - CIP Training** | 2 days | 1 590 € | On request |
| **PROFINET Training** | 2 days | 1 000 € | On request |
| **Industrial Ethernet Troubleshooting** | 1 day | 790 € | On request |

### 3.3 Safety Standards Training

| Course | Duration | Inter-Enterprise Price | Private Company Price |
|--------|----------|------------------------|----------------------|
| **IEC 61508 (System, Hardware, Software)** | 3 days | 2 450 € | On request |
| **ISO 26262 (Automotive)** | 3 days | 2 450 € | On request |
| **ISO 21434 (Automotive Cybersecurity)** | 3 days | 2 450 € | On request |
| **IEC 62304 (Medical Devices)** | 2 days | 1 750 € | On request |
| **DO-178C (Aeronautics)** | 3 days | 2 450 € | On request |
| **EN 50716 (Railway)** | 2 days | 1 750 € | On request |
| **ISO 13849 (Machinery Safety)** | 2 days | 1 750 € | On request |
| **ISO 25119 (Agricultural)** | 2 days | 1 750 € | On request |

### 3.4 Cybersecurity & Real-Time Training

| Course | Duration | Inter-Enterprise Price | Private Company Price |
|--------|----------|------------------------|----------------------|
| **Embedded Systems Cybersecurity** | 2 days | 1 390 € | On request |
| **Medical Device Cybersecurity** | 1 day | 960 € | On request |
| **FreeRTOS Implementation** | 2 days | 1 490 € | On request |
| **MISRA C:2025** | 2 days | 1 000 € | On request |

### 3.5 Training Page Display Format

**Card Format for Each Course:**

```html
<div class="training-card">
  <h3>[Course Name]</h3>
  <div class="training-meta">
    <span class="duration"><Clock icon> [X] days</span>
    <span class="capacity"><Users icon> Up to 6 participants</span>
  </div>
  <p class="description">[Brief course description]</p>
  <div class="pricing">
    <div class="price-row">
      <span class="price-label">Inter-Enterprise:</span>
      <span class="price-value">[Price] €</span>
    </div>
    <div class="price-row">
      <span class="price-label">Private Company:</span>
      <span class="price-value">On request</span>
    </div>
  </div>
  <div class="training-actions">
    <button class="btn-primary">Request Information</button>
    <button class="btn-secondary">Download Brochure</button>
  </div>
</div>
```

### 3.6 Training Labels

**REMOVED Labels:**
- ❌ "Beginner"
- ❌ "Intermediate"
- ❌ "Advanced"
- ❌ "Level 1/2/3"

**REPLACED With:**
- ✅ "Up to 6 participants" (or "Session for up to 6 participants")
- ✅ "Per session pricing"

**Display Format:**
```
<span class="capacity-badge">
  <Users icon /> Up to 6 participants
</span>
```

---

## 4. PRODUCT SPECIFICATIONS (From V6.3)

### 4.1 CANopen (Safety) Stack
- IEC 61784-3-12, EN 50325-5 compliant
- Pre-certified up to SIL 3 (PLe)
- Bureau Véritas certified
- **Related Training:** CAN Training, CANopen Training

### 4.2 FSoE Stack
- IEC 61784-3-12 compliant
- MainInstance / SubInstance versions
- Acontis EC-Simulator compatible
- **Related Training:** EtherCAT Training

### 4.3 J1939 Stack
- SAE-J1939, CAN ISO 11898-1/2 compliant
- Multi-channel, Multi-AC support
- **Related Training:** J1939 Training

### 4.4 ISI-GTW Gateway
- CAN, CANopen, CANopen Safety, J1939, TCP/IP, EtherNet/IP, ModbusTCP, Modbus RTU
- Board (ISI-GTW-PCB) and Box (ISI-GTW-CASE) formats
- **Related Training:** Industrial Ethernet Training, CAN Training

### 4.5 PROFISAFE Stack
- Coming soon
- **Related Training:** PROFINET Training

### 4.6 OPC-UA Stack
- Coming soon

---

## 5. ELITE PARTNERS (8 Technology Partners)

| Partner | Description |
|---------|-------------|
| Acontis Technologies | EtherCAT solutions and real-time technologies |
| CiA (CAN in Automation) | CAN-based protocols |
| EtherCAT Technology Group | EtherCAT standard organization |
| NXP | Semiconductor solutions |
| QNX | Real-time operating system |
| STMicroelectronics | Authorized Partner - Microcontrollers |
| SYSGO | Real-time and safety OS solutions |
| Texas Instruments | Semiconductor and embedded processing |

---

## 6. CSS FOR TRAINING SECTION

### 6.1 Training Card Styling

```css
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

.capacity-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  background: #e8f4fd;
  color: #1a73e8;
  padding: 0.25rem 0.75rem;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 500;
}

.pricing {
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
}

.training-actions {
  display: flex;
  gap: 1rem;
  margin-top: 1.5rem;
}

/* Responsive */
@media (max-width: 768px) {
  .training-meta {
    flex-direction: column;
    gap: 0.5rem;
  }
  
  .training-actions {
    flex-direction: column;
  }
}
```

### 6.2 Training Grid Layout

```css
.training-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 1.5rem;
}

@media (max-width: 768px) {
  .training-grid {
    grid-template-columns: 1fr;
  }
}
```

---

## 7. BILINGUAL CONTENT

### 7.1 English (EN)

**Training Labels:**
- "Up to 6 participants"
- "Per session"
- "Inter-Enterprise Training"
- "Private Company Training"
- "On request"
- "Request Information"
- "Download Brochure"

**Timeline:**
- "2026 - AZIT brand created"

### 7.2 French (FR)

**Training Labels:**
- "Jusqu'à 6 participants"
- "Par session"
- "Formation Inter-entreprise"
- "Formation Intra-entreprise"
- "Sur demande"
- "Demander des informations"
- "Télécharger la brochure"

**Timeline:**
- "2026 - Création de la marque AZIT"

---

## 8. REMOVED CONTENT IN V6.4

**The following labels must NOT appear on training pages:**

❌ "Beginner" / "Débutant"  
❌ "Intermediate" / "Intermédiaire"  
❌ "Advanced" / "Avancé"  
❌ "Level 1" / "Level 2" / "Level 3"  
❌ "Niveau 1" / "Niveau 2" / "Niveau 3"

**Replaced with:**
✅ "Up to 6 participants" / "Jusqu'à 6 participants"

---

## 9. IMPORTANT NOTES

1. **V6.4 Changes from V6.3:**
   - Added complete training course catalog with pricing
   - Updated Company page timeline with AZIT creation in 2026
   - Removed beginner/intermediate labels from training
   - Added "Up to 6 participants" capacity indicator
   - Added Inter-Enterprise and Private Company pricing structure
   - Added Training section to main navigation

2. **Pricing Rules:**
   - All Inter-Enterprise prices from ISIT website
   - Private Company (Intra) = "On request" (contact for quote)
   - Default price for missing data = 1 000 €
   - All prices are per session, up to 6 participants

3. **Training-Product Links:**
   - CANopen/CANopen Safety products → CAN, CANopen Training
   - FSoE products → EtherCAT Training
   - J1939 products → J1939 Training
   - ISI-GTW → Industrial Ethernet, CAN Training

---

*End of AZIT Website Specification V6.4*