# AZIT Website Update: V6.2 → V6.3
## Product Data Integration & Claude Code Instructions

**Version Update:** 6.2 → 6.3  
**Date:** January 2025  
**Impact Level:** HIGH - Product content updates + Elite Partners expansion

---

## EXECUTIVE SUMMARY

### What Changed in V6.3

| Category | Changes | Impact |
|----------|---------|--------|
| **Product Content** | Added detailed specs from datasheets (CANopen, FSoE, J1939, ISI-GTW) | HIGH - 4 product page rewrites |
| **Elite Partners** | Expanded from placeholder to 8 specific partners | HIGH - Homepage + all product pages |
| **New Product** | Added ISI-GTW Gateway (hardware product) | MEDIUM - New product page |
| **Placeholder Content** | PROFISAFE & OPC-UA marked "Coming soon" | LOW - Placeholder pages |
| **Industries** | Added Heavy-Duty, Agricultural, Marine, Military | LOW - Navigation + industries page |

### Data Sources
- CANopen (Safety) Software Protocol Stack datasheet
- FSoE Software Protocol Stack datasheet
- SAE J1939 Stack datasheet
- ISI-GTW Industrial Gateway datasheet

---

## SECTION 1: PRODUCT CONTENT UPDATES

### 1.1 CANopen (Safety) Stack

**Page:** `/products/canopen-safety.html` (and French version)

**Content to Add:**

```html
<!-- Overview Section -->
<section class="product-overview">
  <h2>Product Overview</h2>
  <p>ISIT's CANopen (Safety) Stack is a software solution deployable on any 
  CAN-capable hardware platform. It integrates both the CANopen protocol 
  and its Safety extension, developed to the same high-quality standards 
  for seamless operation, enhanced reliability, and optimal robustness 
  across the communication stack.</p>
</section>

<!-- Key Benefits Section -->
<section class="key-benefits">
  <h2>Key Benefits</h2>
  <ul>
    <li><strong>IEC 61784-3-12 compliant:</strong> Fully standard and interoperable</li>
    <li><strong>Pre-certified up to SIL 3 (PLe):</strong> Reduces your certification time and cost</li>
    <li><strong>Master/Slave version Certification Pack:</strong> Implement full Safety solution</li>
    <li><strong>Expert support</strong></li>
  </ul>
</section>

<!-- Product Characteristics Table -->
<section class="product-specs">
  <h2>Product Characteristics</h2>
  <table class="spec-table">
    <tr><th>Standard Compliance</th><td>IEC 61784-3-12, EN 50325-5</td></tr>
    <tr><th>Safety Certification</th><td>Pre-certified up to SIL 3 (PLe)</td></tr>
    <tr><th>Certification Body</th><td>Bureau Véritas</td></tr>
    <tr><th>Hardware Dependency</th><td>Low (deployable on any CAN-capable platform)</td></tr>
    <tr><th>OS Dependency</th><td>Low</td></tr>
    <tr><th>Versions Available</th><td>Master Stack, Slave Stack, Safety Master, Safety Slave</td></tr>
    <tr><th>Certification Pack</th><td>Included (Master/Slave versions)</td></tr>
  </table>
</section>
```

**Technology Partners for this product:**
- CiA (CAN in Automation)
- NXP
- QNX
- STMicroelectronics (Authorized Partner)
- Texas Instruments

---

### 1.2 FSoE (Safety over EtherCAT) Stack

**Page:** `/products/fsoe.html` (and French version)

**IMPORTANT:** Update terminology from "Master/Slave" to "MainInstance/SubInstance"

**Content to Add:**

```html
<!-- Overview Section -->
<section class="product-overview">
  <h2>Product Overview</h2>
  <p>ISIT's Safety over EtherCAT protocol stack delivers certified functional 
  safety without hardware constraints. As a software solution, it integrates 
  seamlessly with your existing EtherCAT applications. MainInstance (Master) 
  or SubInstance (Slave): reduce integration complexity, accelerate certification 
  and maintain complete control over your hardware choices.</p>
</section>

<!-- Key Benefits Section -->
<section class="key-benefits">
  <h2>Key Benefits</h2>
  <ul>
    <li><strong>IEC 61784-3-12 compliant:</strong> Fully standard and interoperable</li>
    <li><strong>Pre-certified up to SIL 3 (PLe):</strong> Reduces your certification time and cost</li>
    <li><strong>MainInstance / SubInstance versions:</strong> Implement full Safety solution</li>
    <li><strong>Easy API integration:</strong> Short learning curve for your teams</li>
    <li><strong>Interoperability:</strong> Works with most existing EtherCAT stacks</li>
    <li><strong>SiL Ready:</strong> Early safety network simulation powered by Acontis EC-Simulator</li>
    <li><strong>Expert support</strong></li>
  </ul>
</section>

<!-- Product Characteristics Table -->
<section class="product-specs">
  <h2>Product Characteristics</h2>
  <table class="spec-table">
    <tr><th>Standard Compliance</th><td>IEC 61784-3-12</td></tr>
    <tr><th>Safety Certification</th><td>Pre-certified up to SIL 3 (PLe)</td></tr>
    <tr><th>Certification Body</th><td>Bureau Véritas</td></tr>
    <tr><th>Hardware Dependency</th><td>Low</td></tr>
    <tr><th>OS Dependency</th><td>Low</td></tr>
    <tr><th>Versions Available</th><td>MainInstance (Master), SubInstance (Slave)</td></tr>
    <tr><th>EtherCAT Compatibility</th><td>Works with most existing EtherCAT stacks</td></tr>
    <tr><th>Simulation Support</th><td>Acontis EC-Simulator</td></tr>
  </table>
</section>
```

**Technology Partners for this product:**
- Acontis Technologies
- EtherCAT Technology Group
- NXP
- QNX
- STMicroelectronics (Authorized Partner)
- SYSGO
- Texas Instruments

---

### 1.3 SAE J1939 Stack

**Page:** `/products/j1939.html` (and French version)

**Content to Add:**

```html
<!-- Overview Section -->
<section class="product-overview">
  <h2>Product Overview</h2>
  <p>The SAE J1939 protocol is used in many fields implementing industrial-oriented 
  engines and equipment, such as trucks, industrial vehicles (heavy goods vehicles, 
  utility vehicles), agricultural and forestry equipment, navy or even military 
  vehicles or energy production. It is based on the CAN ISO 11898-1/2 standard 
  for the low-level layers and allows the various computers (ECU) of the network 
  to communicate with each other with standardized message contents.</p>
  
  <p>ISIT offers a software-based J1939 protocol stack that conforms to the 
  SAE-J1939 standard. It is available in Mono/Multi-channel CAN versions and 
  allows the implementation of several application controllers (AC) in a single 
  computer (ECU).</p>
</section>

<!-- Key Benefits Section -->
<section class="key-benefits">
  <h2>Key Benefits</h2>
  <ul>
    <li><strong>Mono/Multi-channel CAN versions</strong></li>
    <li><strong>Multi-Application Controllers (AC) in single ECU</strong></li>
    <li><strong>Parallel protocol support:</strong> ISO-TP, UDS, DiagOnCAN, proprietary</li>
    <li><strong>Modular design:</strong> Adaptable to any CPU, memory, network requirements</li>
    <li><strong>Development support available</strong></li>
    <li><strong>J1939 Training available</strong></li>
  </ul>
</section>

<!-- Main Features Section -->
<section class="main-features">
  <h2>Main Features</h2>
  <ul>
    <li>Address Claiming and Name Management</li>
    <li>Transport Protocol (BAM, P2P)</li>
    <li>Periodic and event PGN Tx/Rx</li>
    <li>CAN multi-channels</li>
    <li>Multi-Application Controllers</li>
    <li>Openness to other protocols in parallel (ISO-TP, UDS, DiagOnCAN, proprietary)</li>
  </ul>
</section>

<!-- Product Characteristics Table -->
<section class="product-specs">
  <h2>Product Characteristics</h2>
  <table class="spec-table">
    <tr><th>Standard Compliance</th><td>SAE-J1939, CAN ISO 11898-1/2</td></tr>
    <tr><th>Safety Standards Support</th><td>ISO 26262, IEC 61508, IEC 62304, DO-178C, EN 50716, ECSS</td></tr>
    <tr><th>Hardware Dependency</th><td>Low</td></tr>
    <tr><th>OS Dependency</th><td>Low</td></tr>
    <tr><th>CAN Channels</th><td>Mono or Multi-channel</td></tr>
    <tr><th>Application Controllers</th><td>Multiple AC per ECU supported</td></tr>
    <tr><th>Parallel Protocols</th><td>ISO-TP, UDS, DiagOnCAN, proprietary</td></tr>
  </table>
</section>

<!-- Target Industries Section -->
<section class="target-industries">
  <h2>Target Industries</h2>
  <ul>
    <li>Trucks and heavy goods vehicles</li>
    <li>Industrial/utility vehicles</li>
    <li>Agricultural and forestry equipment</li>
    <li>Marine and navy applications</li>
    <li>Military vehicles</li>
    <li>Energy production systems</li>
  </ul>
</section>

<!-- Services Section -->
<section class="services-available">
  <h2>Services on Demand</h2>
  <ul>
    <li>Development support</li>
    <li>J1939 Training</li>
  </ul>
</section>
```

**Technology Partners for this product:**
- STMicroelectronics (Authorized Partner)

---

### 1.4 ISI-GTW Industrial Gateway (NEW PRODUCT PAGE)

**Page:** `/products/isi-gtw.html` (CREATE NEW - and French version)

**Full Page Content:**

```html
<!-- Hero Section -->
<section class="product-hero">
  <h1>ISI-GTW Industrial Protocol Gateway</h1>
  <p class="tagline">Industrial protocol conversion gateway for CAN and Ethernet buses</p>
</section>

<!-- Overview Section -->
<section class="product-overview">
  <h2>Product Overview</h2>
  <p>ISI-GTW is an intelligent communication gateway, intended for product designers 
  and integrators. It meets the need to make heterogeneous equipment, equipped with 
  a CAN or Ethernet interface, whose protocols are different and often incompatible, 
  communicate with each other.</p>
  
  <p>ISI-GTW allows communication on both sides according to standardized or proprietary 
  protocols, and to read, interpret, process, manipulate and write data in order to 
  ensure communication between two devices that do not speak the same language.</p>
</section>

<!-- Key Points Section -->
<section class="key-points">
  <h2>Key Points</h2>
  <ul>
    <li><strong>Supported protocols:</strong> CAN, CANopen, CANopen Safety, SAE J1939, 
        TCP/IP networks, EtherNet/IP, ModbusTCP, Modbus RTU</li>
    <li><strong>2 formats:</strong> Board (ISI-GTW-PCB) or Box on DIN rail (ISI-GTW-CASE)</li>
    <li><strong>Totally programmable</strong> (C/C++ in multi-tasking environment)</li>
    <li><strong>Turnkey solution available</strong> according to specifications</li>
  </ul>
</section>

<!-- Supported Protocols Section -->
<section class="supported-protocols">
  <h2>Supported Protocols</h2>
  <div class="protocol-grid">
    <span class="protocol-tag">CAN</span>
    <span class="protocol-tag">CANopen</span>
    <span class="protocol-tag">CANopen Safety</span>
    <span class="protocol-tag">SAE J1939</span>
    <span class="protocol-tag">TCP/IP</span>
    <span class="protocol-tag">EtherNet/IP</span>
    <span class="protocol-tag">ModbusTCP</span>
    <span class="protocol-tag">Modbus RTU</span>
  </div>
</section>

<!-- Technical Specifications Table -->
<section class="technical-specs">
  <h2>Technical Specifications</h2>
  <table class="spec-table">
    <thead>
      <tr><th colspan="2">Input/Output</th></tr>
    </thead>
    <tbody>
      <tr><th>CAN</th><td>2 ports galvanically isolated, DB9 or screw terminal</td></tr>
      <tr><th>Ethernet</th><td>1 RJ45 or M12 port</td></tr>
      <tr><th>Serial port</th><td>RS 232/422/485, DB9 or screw terminal</td></tr>
      <tr><th>Digital Inputs*</th><td>4</td></tr>
      <tr><th>Digital Output*</th><td>1</td></tr>
    </tbody>
    <thead>
      <tr><th colspan="2">Environmental Specifications</th></tr>
    </thead>
    <tbody>
      <tr><th>Size</th><td>100 (L) x 70 (W) x 40 (H) mm</td></tr>
      <tr><th>Ambient temperature</th><td>-40°C to +80°C</td></tr>
    </tbody>
    <thead>
      <tr><th colspan="2">System</th></tr>
    </thead>
    <tbody>
      <tr><th>Processor</th><td>STM32F207 (Cortex ARM M4)</td></tr>
      <tr><th>Operating System</th><td>FreeRTOS real-time OS</td></tr>
      <tr><th>PC link</th><td>USB 2.0 / Serial RS / Ethernet</td></tr>
      <tr><th>SD card memory</th><td>Datalogger function</td></tr>
      <tr><th>Power Supply</th><td>9-60VDC 3 VA</td></tr>
    </tbody>
  </table>
  <p class="spec-note">*Digital I/O not available on Case version</p>
</section>

<!-- Product Formats Section -->
<section class="product-formats">
  <h2>Product Formats</h2>
  
  <div class="format-card">
    <h3>ISI-GTW-PCB (Board Format)</h3>
    <p>Board for cabinet or rack insertion. 4 holes provided for fixing by struts. 
    Screw terminal connectors recommended for wiring.</p>
  </div>
  
  <div class="format-card">
    <h3>ISI-GTW-CASE (Box Format)</h3>
    <p>Aluminum case offering mechanical and electrical protection for electrical 
    cabinet integration. DIN rail clip mounting. DB9 type connectors for simplified 
    and secure links.</p>
  </div>
</section>

<!-- Software Environment Section -->
<section class="software-environment">
  <h2>Software Environment</h2>
  <ul>
    <li>FreeRTOS real-time OS</li>
    <li>Low-level drivers for peripherals and I/O</li>
    <li>Communication stacks included</li>
    <li>C/C++ programmable in multi-tasking environment</li>
    <li>JTAG interface for firmware modification</li>
  </ul>
  <p><strong>Note:</strong> ISIT CANopen Safety stack is available for ISI-GTW gateway.</p>
</section>
```

---

### 1.5 PROFISAFE Stack (Placeholder)

**Page:** `/products/profisafe.html` (and French version)

```html
<section class="product-overview">
  <h2>Product Overview</h2>
  <p class="coming-soon">Coming soon</p>
</section>

<section class="key-benefits">
  <h2>Key Benefits</h2>
  <p class="coming-soon">Coming soon</p>
</section>

<section class="product-specs">
  <h2>Product Characteristics</h2>
  <table class="spec-table">
    <tr><th>Standard Compliance</th><td class="coming-soon">Coming soon</td></tr>
    <tr><th>Safety Certification</th><td class="coming-soon">Coming soon</td></tr>
    <tr><th>Certification Body</th><td>Bureau Véritas</td></tr>
    <tr><th>Hardware Dependency</th><td>Low</td></tr>
    <tr><th>OS Dependency</th><td>Low</td></tr>
    <tr><th>Versions Available</th><td>Controller Stack, Device Stack</td></tr>
  </table>
</section>
```

---

### 1.6 OPC-UA Stack (Placeholder)

**Page:** `/products/opcua.html` (and French version)

```html
<section class="product-overview">
  <h2>Product Overview</h2>
  <p class="coming-soon">Coming soon</p>
</section>

<section class="key-benefits">
  <h2>Key Benefits</h2>
  <p class="coming-soon">Coming soon</p>
</section>

<section class="product-specs">
  <h2>Product Characteristics</h2>
  <table class="spec-table">
    <tr><th>Standard Compliance</th><td class="coming-soon">Coming soon</td></tr>
    <tr><th>Hardware Dependency</th><td>Low</td></tr>
    <tr><th>OS Dependency</th><td>Low</td></tr>
    <tr><th>Versions Available</th><td>Server Stack, Client Stack</td></tr>
  </table>
</section>
```

---

## SECTION 2: ELITE PARTNERS UPDATE

### 2.1 Expanded Partner List (8 Partners from Datasheets)

**Update Elite Partners section on ALL pages (homepage + product pages):**

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
        <!-- Partner 1: Acontis -->
        <div class="elite-partner-card">
          <img src="/assets/partners/acontis-logo.png" alt="Acontis Technologies" class="elite-partner-logo">
          <h3>Acontis Technologies</h3>
          <p class="elite-partner-description">EtherCAT solutions and real-time technologies</p>
        </div>
        
        <!-- Partner 2: CiA -->
        <div class="elite-partner-card">
          <img src="/assets/partners/cia-logo.png" alt="CAN in Automation" class="elite-partner-logo">
          <h3>CiA</h3>
          <p class="elite-partner-description">CAN in Automation - CAN-based protocols</p>
        </div>
        
        <!-- Partner 3: EtherCAT Technology Group -->
        <div class="elite-partner-card">
          <img src="/assets/partners/etg-logo.png" alt="EtherCAT Technology Group" class="elite-partner-logo">
          <h3>EtherCAT Technology Group</h3>
          <p class="elite-partner-description">EtherCAT standard organization</p>
        </div>
        
        <!-- Partner 4: NXP -->
        <div class="elite-partner-card">
          <img src="/assets/partners/nxp-logo.png" alt="NXP Semiconductors" class="elite-partner-logo">
          <h3>NXP</h3>
          <p class="elite-partner-description">Semiconductor solutions for embedded systems</p>
        </div>
        
        <!-- Partner 5: QNX -->
        <div class="elite-partner-card">
          <img src="/assets/partners/qnx-logo.png" alt="QNX" class="elite-partner-logo">
          <h3>QNX</h3>
          <p class="elite-partner-description">Real-time operating system</p>
        </div>
        
        <!-- Partner 6: STMicroelectronics -->
        <div class="elite-partner-card">
          <img src="/assets/partners/st-logo.png" alt="STMicroelectronics" class="elite-partner-logo">
          <h3>STMicroelectronics</h3>
          <p class="elite-partner-description">Authorized Partner - Microcontroller solutions</p>
        </div>
        
        <!-- Partner 7: SYSGO -->
        <div class="elite-partner-card">
          <img src="/assets/partners/sysgo-logo.png" alt="SYSGO" class="elite-partner-logo">
          <h3>SYSGO</h3>
          <p class="elite-partner-description">Real-time and safety OS solutions</p>
        </div>
        
        <!-- Partner 8: Texas Instruments -->
        <div class="elite-partner-card">
          <img src="/assets/partners/ti-logo.png" alt="Texas Instruments" class="elite-partner-logo">
          <h3>Texas Instruments</h3>
          <p class="elite-partner-description">Semiconductor and embedded processing</p>
        </div>
      </div>
    </div>
  </div>
</section>
```

### 2.2 Updated CSS for 8-Partner Grid

```css
.elite-partners-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.5rem;
  margin-top: 2rem;
}

.elite-partner-card {
  background: white;
  border-radius: 12px;
  padding: 1.5rem;
  box-shadow: 0 4px 15px rgba(0,0,0,0.08);
  transition: transform 0.3s, box-shadow 0.3s;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.elite-partner-logo {
  max-width: 120px;
  height: 60px;
  object-fit: contain;
  margin-bottom: 1rem;
}

.elite-partner-card h3 {
  font-size: 1rem;
  color: #333;
  margin-bottom: 0.5rem;
}

.elite-partner-description {
  color: #666;
  font-size: 0.85rem;
  line-height: 1.4;
}

@media (max-width: 992px) {
  .elite-partners-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 576px) {
  .elite-partners-grid {
    grid-template-columns: 1fr;
  }
}
```

---

## SECTION 3: NAVIGATION UPDATES

### 3.1 Add ISI-GTW to Products Menu

```html
<!-- Add to Products dropdown in main navigation -->
<li class="nav-item">
  <a href="/products/isi-gtw">ISI-GTW Gateway</a>
</li>
```

### 3.2 Add New Industries

```html
<!-- Add to Industries navigation -->
<li><a href="/industries/heavy-duty">Heavy-Duty Vehicles</a></li>
<li><a href="/industries/agricultural">Agricultural & Forestry</a></li>
<li><a href="/industries/marine">Marine & Navy</a></li>
<li><a href="/industries/military">Military & Defense</a></li>
```

---

## SECTION 4: REQUIRED ASSETS

### 4.1 Elite Partner Logos Needed

```
/assets/partners/
├── acontis-logo.png (existing or update)
├── cia-logo.png (NEW)
├── etg-logo.png (NEW - EtherCAT Technology Group)
├── nxp-logo.png (NEW)
├── qnx-logo.png (NEW)
├── st-logo.png (NEW - STMicroelectronics)
├── sysgo-logo.png (NEW)
└── ti-logo.png (NEW - Texas Instruments)
```

### 4.2 Product Images

```
/assets/products/
├── isi-gtw-board.jpg (ISI-GTW-PCB product photo)
├── isi-gtw-case.jpg (ISI-GTW-CASE product photo)
└── isi-gtw-diagram.png (Application diagram)
```

---

## SECTION 5: TESTING CHECKLIST

```markdown
## Product Pages
- [ ] CANopen Safety page has full content from datasheet
- [ ] FSoE page has full content with MainInstance/SubInstance terminology
- [ ] J1939 page has full content including target industries
- [ ] ISI-GTW page created with all technical specifications
- [ ] PROFISAFE page shows "Coming soon" placeholders
- [ ] OPC-UA page shows "Coming soon" placeholders
- [ ] All spec tables display correctly
- [ ] All product characteristics accurate

## Elite Partners
- [ ] Homepage shows all 8 Elite Partners
- [ ] All product pages show all 8 Elite Partners
- [ ] 4-column grid displays correctly on desktop
- [ ] 2-column grid on tablet
- [ ] 1-column grid on mobile
- [ ] All 8 partner logos display correctly
- [ ] Partner descriptions accurate

## Navigation
- [ ] ISI-GTW added to Products menu
- [ ] New industries added to Industries menu
- [ ] All links functional
- [ ] French navigation updated

## Content Accuracy
- [ ] IEC 61784-3-12 mentioned for CANopen & FSoE
- [ ] SIL 3 (PLe) mentioned correctly
- [ ] Bureau Véritas (not TÜV) throughout
- [ ] "Low hardware dependency" (not agnostic)
- [ ] MainInstance/SubInstance (not Master/Slave for FSoE)
```

---

## SECTION 6: CLAUDE CODE MASTER COMMAND

```markdown
Claude Code, please update the AZIT website from V6.2 to V6.3 with product data from datasheets:

PHASE 1 - CANOPEN SAFETY PAGE UPDATE:
1. Update /products/canopen-safety.html with:
   - Overview: Software solution deployable on any CAN-capable hardware
   - Key Benefits: IEC 61784-3-12 compliant, Pre-certified SIL 3 (PLe), Master/Slave Certification Pack, Expert support
   - Spec table: Standard (IEC 61784-3-12, EN 50325-5), Safety (SIL 3 PLe), Cert body (Bureau Véritas), Versions (Master, Slave, Safety Master, Safety Slave)
2. Update French version with same content translated

PHASE 2 - FSOE PAGE UPDATE:
3. Update /products/fsoe.html with:
   - IMPORTANT: Use "MainInstance" and "SubInstance" (NOT Master/Slave)
   - Overview: Safety over EtherCAT, functional safety without hardware constraints
   - Key Benefits: IEC 61784-3-12, SIL 3 (PLe), MainInstance/SubInstance, Easy API, Interoperability, SiL Ready (Acontis EC-Simulator), Expert support
   - Spec table: Add EtherCAT Compatibility and Simulation Support rows
4. Update French version

PHASE 3 - J1939 PAGE UPDATE:
5. Update /products/j1939.html with:
   - Overview: SAE J1939 for trucks, industrial vehicles, agricultural, marine, military, energy
   - Key Benefits: Mono/Multi-channel CAN, Multi-AC per ECU, Parallel protocols, Modular design, Training available
   - Main Features: Address Claiming, Transport Protocol, PGN Tx/Rx, Multi-channels, Multi-AC, Parallel protocols
   - Spec table: SAE-J1939, CAN ISO 11898-1/2, Safety standards (ISO 26262, IEC 61508, IEC 62304, DO-178C, EN 50716, ECSS)
   - Target Industries: Trucks, industrial vehicles, agricultural, marine, military, energy
   - Services: Development support, J1939 Training
6. Update French version

PHASE 4 - ISI-GTW PAGE (NEW):
7. CREATE /products/isi-gtw.html with:
   - Hero: ISI-GTW Industrial Protocol Gateway
   - Overview: Intelligent communication gateway for CAN/Ethernet protocol conversion
   - Key Points: Protocols supported, 2 formats (Board/Case), Programmable, Turnkey option
   - Protocols list: CAN, CANopen, CANopen Safety, J1939, TCP/IP, EtherNet/IP, ModbusTCP, Modbus RTU
   - Full technical specs table (CAN 2 ports, Ethernet 1 port, Serial RS232/422/485, Digital I/O, Size 100x70x40mm, Temp -40°C to +80°C, Processor STM32F207, FreeRTOS, Power 9-60VDC)
   - Product formats: ISI-GTW-PCB (Board), ISI-GTW-CASE (Box with DIN rail)
   - Software environment: FreeRTOS, drivers, C/C++ programmable, JTAG
8. Create French version /fr/products/isi-gtw.html

PHASE 5 - PLACEHOLDER PAGES:
9. Update PROFISAFE pages with "Coming soon" for: Overview, Key Benefits, Standard Compliance, Safety Certification, Technology Partners
10. Update OPC-UA pages with "Coming soon" for same fields
11. Keep: Bureau Véritas, Low hardware dependency, Low OS dependency, Version names

PHASE 6 - ELITE PARTNERS EXPANSION (8 partners):
12. Update homepage Elite Partners section with 8 partner cards:
    - Acontis Technologies (EtherCAT solutions)
    - CiA (CAN in Automation - CAN-based protocols)
    - EtherCAT Technology Group (EtherCAT standard)
    - NXP (Semiconductor solutions)
    - QNX (Real-time OS)
    - STMicroelectronics (Authorized Partner - Microcontrollers)
    - SYSGO (Real-time and safety OS)
    - Texas Instruments (Semiconductor and embedded)
13. Update CSS for 4-column grid (desktop), 2-column (tablet), 1-column (mobile)
14. Apply same 8-partner Elite Partners section to ALL product pages

PHASE 7 - NAVIGATION UPDATES:
15. Add ISI-GTW Gateway to Products menu
16. Add new industries: Heavy-Duty Vehicles, Agricultural & Forestry, Marine & Navy, Military & Defense
17. Update French navigation

PHASE 8 - CSS UPDATES:
18. Add .coming-soon class styling (gray, italic)
19. Update Elite Partners grid for 8 partners (smaller cards)
20. Add spec-table styling
21. Add protocol-tag styling for ISI-GTW

CRITICAL REMINDERS:
- FSoE uses "MainInstance/SubInstance" NOT "Master/Slave"
- All certification = Bureau Véritas (NOT TÜV)
- All hardware references = "Low hardware dependency" (NOT agnostic)
- Elite Partners = 8 total technology partners (update everywhere)
- "Coming soon" for PROFISAFE and OPC-UA details
- ISI-GTW is NEW product page (create from scratch)
- Update BOTH English AND French versions

Please confirm each phase and report any issues.
```

---

## APPENDIX: V6.2 → V6.3 CHANGE SUMMARY

```
✓ Product Content: Added detailed specs from 4 datasheets
✓ CANopen Safety: Full datasheet content (IEC 61784-3-12, SIL 3, EN 50325-5)
✓ FSoE: Full content + MainInstance/SubInstance terminology
✓ J1939: Full content + target industries + training services
✓ ISI-GTW: NEW product page with full technical specs
✓ PROFISAFE: Placeholder with "Coming soon"
✓ OPC-UA: Placeholder with "Coming soon"
✓ Elite Partners: Expanded to 8 partners (Acontis, CiA, ETG, NXP, QNX, ST, SYSGO, TI)
✓ Industries: Added 4 new (Heavy-Duty, Agricultural, Marine, Military)
✓ Navigation: Added ISI-GTW + new industries
```

---

*End of V6.2 → V6.3 Update Documentation*