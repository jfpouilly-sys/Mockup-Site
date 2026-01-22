# AZIT Website - V3 to V4 Update Documentation

**Document Version:** 1.0  
**Date:** January 2025  
**Update Type:** Major revision  

---

## Executive Summary

Version 4.0 introduces significant changes to the AZIT website product lineup and navigation structure. Key updates include:
- Product portfolio changes (removed 3 products, added 3 new products)
- Navigation restructuring for improved UX
- Homepage simplification
- Enhanced protocol categorization

---

## 1. Product Portfolio Changes

### 1.1 Products REMOVED (V3 → V4)
The following products have been removed from all pages and navigation:
1. **IO-Link** (Slave & Master)
2. **CC-Link** (Slave & Master)
3. **Modbus** (TCP/RTU variants)

### 1.2 Products ADDED (V3 → V4)
The following products have been added:
1. **PROFISAFE Slave** (SIL3 certified)
2. **PROFISAFE Master** (SIL3 certified)
3. **OPC-UA** (Coming Soon - Q3 2025)

### 1.3 Products RETAINED
The following products remain unchanged:
- FSoE Slave & Master
- CANopen Slave & Master
- CANopen Safety Slave & Master
- J1939
- ISI-GTW Gateway
- EtherCAT Simulator

---

## 2. Navigation Structure Updates

### 2.1 Products Mega-Menu Restructuring

**V3 Structure:**
```
Column 1: Safety Protocols
Column 2: Standard Protocols
Column 3: Gateways & Tools
Column 4: [Various]
```

**V4 Structure:**
```
Column 1: COMMUNICATION STACKS (clickable title → communication-stacks.html)
  - Safety Protocols (FSoE, PROFISAFE, CANopen Safety)
  - Fieldbus Protocols (CANopen)
  - Automotive (J1939)
  - Industrial IoT (OPC-UA - Coming Soon)
  
Column 2: PROTOCOL GATEWAYS
  - ISI-GTW Gateway Platform
  
Column 3: TOOLS
  - EtherCAT Simulator
  
Column 4: HARDWARE (Last column)
  - Hardware Solutions Overview
  - Custom Development Boards
```

**Key Change:** 
- "COMMUNICATION STACKS" title in Column 1 is now **clickable** and links to `communication-stacks.html`
- Column order enforced: COMMUNICATION STACKS (first) → HARDWARE (last)

### 2.2 Services Mega-Menu Restructuring

**V3 Structure:**
```
Column 1: [Various services]
Column 2: [Various services]
Column 3: [Various services]
```

**V4 Structure:**
```
Column 1: EXPERTISE (First column)
  - Protocol Stack Development
  - Safety System Architecture
  - Compliance Consulting (CRA, NIS2)
  
Column 2: DEVELOPMENT
  - Custom Protocol Development
  - Stack Optimization
  - Testing & Validation
  
Column 3: INTEGRATION and SUPPORT (Last column)
  - Porting Services
  - Maintenance & Updates
  - Technical Support
```

**Key Change:** 
- Column order enforced: EXPERTISE (first) → INTEGRATION and SUPPORT (last)

---

## 3. Homepage (index.html) Changes

### 3.1 Sections REMOVED from V3
The following sections have been completely removed:

1. **"Full Source Code Access" benefit box**
   - Location: Was in Key Benefits section
   - Reason: Simplification of messaging

2. **"White Channel Architecture" benefit box**
   - Location: Was in Key Benefits section
   - Reason: Simplification of messaging

3. **"HARDWARE Solutions" block**
   - Location: Was in middle section
   - Reason: Streamlining homepage focus

4. **"Software" block**
   - Location: Was in middle section
   - Reason: Streamlining homepage focus

### 3.2 Sections RETAINED in V4
The following sections remain on the homepage:
- Hero Section
- Key Benefits (now 3 boxes instead of 5)
  - SIL3 Certified Safety Stacks
  - Hardware Independent
  - Expert Support & Services
- Featured Products (updated product list)
- Industries We Serve
- Trusted By / Partners
- Blog/News Preview
- CTA Section
- Footer

---

## 4. Communication Stacks Page (communication-stacks.html) Updates

### 4.1 Tab Structure Changes

**Safety Protocols Tab - UPDATED:**
```
V3 Content:
- FSoE Slave
- FSoE Master
- CANopen Safety Slave
- CANopen Safety Master

V4 Content:
- FSoE Slave
- FSoE Master
- PROFISAFE Slave (NEW)
- PROFISAFE Master (NEW)
- CANopen Safety Slave
- CANopen Safety Master
```

**Fieldbus Tab - UPDATED:**
```
V3 Content:
- Various fieldbus protocols including removed products

V4 Content:
- Must contain the same information as "Fieldbus protocols" section
- CANopen Slave
- CANopen Master
```

**Automotive Tab - UPDATED:**
```
V3 Content:
- J1939 and other automotive protocols

V4 Content:
- J1939 only
```

**Coming Soon Tab - POPULATED:**
```
V3 Status: Empty or minimal content

V4 Status: Fully populated with:
- OPC-UA Stack details
- Expected release: Q3 2025
- Email notification signup form
- Planned features list
- Links to currently available stacks
```

---

## 5. Training Page Updates

### 5.1 Terminology Change

**V3 Training Title:**
```
"Safety Certification Training"
```

**V4 Training Title:**
```
"Safety Standards Training"
```

**Reason:** More accurate description - training covers standards, not the actual certification process.

---

## 6. New Files Required

### 6.1 Product Pages to CREATE
```
/products/profisafe-slave.html      (NEW)
/products/profisafe-master.html     (NEW)
/products/opc-ua.html               (NEW - Coming Soon page)
```

### 6.2 Product Pages to REMOVE/ARCHIVE
```
/products/io-link-slave.html        (REMOVE)
/products/io-link-master.html       (REMOVE)
/products/cc-link-slave.html        (REMOVE)
/products/cc-link-master.html       (REMOVE)
/products/modbus-tcp.html           (REMOVE)
/products/modbus-rtu.html           (REMOVE)
```

---

## 7. Content Update Checklist

### 7.1 Global Text Replacements
Across ALL pages, update references:

**Remove all mentions of:**
- [ ] IO-Link
- [ ] CC-Link
- [ ] Modbus (TCP/RTU)

**Add references to:**
- [ ] PROFISAFE
- [ ] OPC-UA (with "Coming Soon" notation)
- [ ] CANopen Safety (ensure prominence)

### 7.2 Navigation Updates
- [ ] Update Products mega-menu column order and structure
- [ ] Make "COMMUNICATION STACKS" title clickable
- [ ] Update Services mega-menu column order
- [ ] Verify all product links point to correct pages
- [ ] Remove broken links to deleted product pages

### 7.3 Homepage Updates
- [ ] Remove "Full Source Code Access" box
- [ ] Remove "White Channel Architecture" box
- [ ] Remove "HARDWARE Solutions" block
- [ ] Remove "Software" block
- [ ] Update Featured Products grid (add PROFISAFE, remove deleted products)
- [ ] Verify 3-column Key Benefits layout

### 7.4 Communication Stacks Page Updates
- [ ] Update Safety Protocols tab content
- [ ] Update Fieldbus tab content
- [ ] Update Automotive tab content
- [ ] Populate Coming Soon tab with OPC-UA details
- [ ] Add email notification form to Coming Soon tab

### 7.5 Training Page Updates
- [ ] Change "Safety Certification" to "Safety Standards"
- [ ] Update course description if needed

---

## 8. Testing Requirements for V4

After implementing V4 updates, verify:

### 8.1 Navigation Testing
- [ ] "COMMUNICATION STACKS" title in Products menu is clickable
- [ ] Click leads to communication-stacks.html
- [ ] All product links work (no 404 errors)
- [ ] Mega-menu column order correct (COMMUNICATION STACKS first, HARDWARE last)
- [ ] Services menu column order correct (EXPERTISE first, INTEGRATION and SUPPORT last)

### 8.2 Content Testing
- [ ] No mentions of IO-Link, CC-Link, or Modbus anywhere
- [ ] PROFISAFE appears in appropriate locations
- [ ] OPC-UA marked as "Coming Soon"
- [ ] Email form on Coming Soon tab works
- [ ] All product cards link to correct pages

### 8.3 Visual Testing
- [ ] Homepage has 3 Key Benefits boxes (not 5)
- [ ] Homepage missing removed sections (verified clean removal)
- [ ] Tab content displays correctly on communication-stacks.html
- [ ] Product cards display correctly with new products

### 8.4 Functionality Testing
- [ ] Tab switching works on communication-stacks.html
- [ ] All internal links work
- [ ] Forms function correctly
- [ ] Language switcher updates all content

---

## 9. Migration Impact Assessment

### 9.1 High Impact Changes
- Product portfolio shift requires full content audit
- Navigation restructuring affects all pages
- Homepage simplification changes user journey

### 9.2 Medium Impact Changes
- Training page terminology update
- Tab content reorganization

### 9.3 Low Impact Changes
- Minor wording adjustments
- Link updates

---

## 10. Rollback Plan

If issues arise with V4:

1. **Backup V3 files** before making changes
2. **Test V4 on staging** before production deployment
3. **Document any custom modifications** made during implementation
4. **Keep V3 navigation structure** available for quick rollback

---

## 11. Future Considerations

### 11.1 When OPC-UA Launches (Q3 2025)
- Move OPC-UA from "Coming Soon" to active product
- Create full product page with specifications
- Update navigation to reflect active status
- Remove email notification form

### 11.2 Potential Future Products
- Consider how new products will fit into current navigation structure
- Maintain COMMUNICATION STACKS as primary category
- Keep HARDWARE as last column convention

---

*End of Update Documentation*