# AZIT Website Update Instructions (V2 → V3)
## Delta Update Guide for Claude Code

**Purpose:** This document provides step-by-step instructions to update an existing AZIT website mockup (generated from specification V2) to V3, which removes the Documentation menu and adds the Simulation product page.

**Scope:** 
1. Remove "Docs" from top navigation menu
2. Add "Simulation" product under Products menu
3. Create Simulation product detail page
4. Update footer accordingly

---

## 1. Summary of Changes

| Change Type | Description |
|-------------|-------------|
| Removed | "Docs" link from main navigation header |
| Removed | `pages/documentation.html` (if exists) |
| New Page | `pages/products/simulation.html` |
| Navigation | Add "Simulation" to Products mega-menu under "Software" |
| Footer | Replace "Documentation" with "Simulation" |
| Homepage | Add Simulation card to Products section |

---

## 2. File Changes Required

### 2.1 Remove Documentation from Header Navigation

**Files to modify:** `index.html` and all page files (or shared header component)

**Find this in the header:**
```html
<nav class="main-nav">
  <a href="/pages/products/...">Products</a>
  <a href="/pages/services/...">Services</a>
  <a href="/pages/documentation.html">Docs</a>  <!-- REMOVE THIS LINE -->
  <a href="/pages/training.html">Training</a>
  <a href="/pages/blog.html">Blog</a>
  <a href="/pages/company.html">Company</a>
  <a href="/pages/contact.html">Contact</a>
</nav>
```

**Replace with:**
```html
<nav class="main-nav">
  <a href="/pages/products/...">Products</a>
  <a href="/pages/services/...">Services</a>
  <a href="/pages/training.html">Training</a>
  <a href="/pages/blog.html">Blog</a>
  <a href="/pages/company.html">Company</a>
  <a href="/pages/contact.html">Contact</a>
</nav>
```

---

### 2.2 Update Products Mega-Menu

**Files to modify:** Header component or all pages with navigation

**Find the Products mega-menu and add SOFTWARE column with Simulation:**

```html
<div class="mega-menu" id="products-menu">
  <div class="mega-menu__container">
    
    <!-- Existing: Hardware Column -->
    <div class="mega-menu__column">
      <h4 class="mega-menu__heading">Hardware</h4>
      <ul class="mega-menu__list">
        <li><a href="/pages/products/protocol-gateway.html">Protocol Gateway (ISI-GTW)</a></li>
      </ul>
    </div>
    
    <!-- Existing: Communication Stacks Column -->
    <div class="mega-menu__column">
      <h4 class="mega-menu__heading">Communication Stacks</h4>
      <!-- existing stack links -->
    </div>
    
    <!-- NEW: Software Column -->
    <div class="mega-menu__column">
      <h4 class="mega-menu__heading">Software</h4>
      <ul class="mega-menu__list">
        <li>
          <a href="/pages/products/simulation.html">
            <span class="mega-menu__icon">🔄</span>
            Network Simulation (AZIT-SIM)
          </a>
        </li>
      </ul>
      
      <h4 class="mega-menu__heading">Tools</h4>
      <ul class="mega-menu__list">
        <li><a href="/pages/products/analyzers.html">Analyzers</a></li>
      </ul>
    </div>
    
  </div>
</div>
```

---

### 2.3 Update Footer

**Files to modify:** All pages with footer (or shared footer component)

**Find the footer Products column and update:**

**Change from:**
```html
<div class="footer__column">
  <h4>Products</h4>
  <ul>
    <li><a href="...">Gateway</a></li>
    <li><a href="...">FSoE</a></li>
    <!-- ... -->
  </ul>
</div>
<div class="footer__column">
  <h4>Resources</h4>
  <ul>
    <li><a href="/pages/documentation.html">Documentation</a></li>
    <li><a href="/pages/training.html">Training</a></li>
    <!-- ... -->
  </ul>
</div>
```

**Change to:**
```html
<div class="footer__column">
  <h4>Products</h4>
  <ul>
    <li><a href="/pages/products/protocol-gateway.html">Gateway</a></li>
    <li><a href="/pages/products/simulation.html">Simulation</a></li>
    <li><a href="/pages/products/fsoe-slave.html">FSoE</a></li>
    <!-- ... -->
  </ul>
</div>
<div class="footer__column">
  <h4>Resources</h4>
  <ul>
    <li><a href="/pages/training.html">Training</a></li>
    <li><a href="/pages/blog.html">Blog</a></li>
    <!-- ... -->
  </ul>
</div>
```

---

### 2.4 Create New File: `pages/products/simulation.html`

Create the Simulation product page with the following complete HTML:

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AZIT-SIM Network Simulation | AZIT - Industrial Protocol Stacks</title>
  <meta name="description" content="Real-time industrial network simulation for EtherCAT, CANopen, and FSoE. Develop and test without physical hardware using HiL and SiL simulation.">
  <link rel="stylesheet" href="../../css/variables.css">
  <link rel="stylesheet" href="../../css/base.css">
  <link rel="stylesheet" href="../../css/components.css">
  <link rel="stylesheet" href="../../css/layout.css">
  <link rel="stylesheet" href="../../css/pages.css">
</head>
<body>
  <!-- Include header component -->
  
  <main>
    <!-- Breadcrumb -->
    <nav class="breadcrumb">
      <a href="/">Home</a> &gt; 
      <a href="/pages/products/communication-stacks.html">Products</a> &gt; 
      <span>Simulation</span>
    </nav>

    <!-- Hero Section -->
    <section class="product-hero product-hero--simulation">
      <div class="container">
        <div class="product-hero__content">
          <h1>AZIT-SIM</h1>
          <p class="product-hero__subtitle">Real-time Industrial Network Simulation</p>
          <p class="product-hero__description">
            Run your industrial controller with a simulated network. 
            Develop and test without physical hardware.
          </p>
          <p class="product-hero__tagline">
            Virtualize EtherCAT, CANopen, and FSoE networks for development, 
            testing, and commissioning.
          </p>
          <div class="product-hero__actions">
            <a href="/pages/contact.html?product=simulation" class="btn btn--primary">
              Request Evaluation
            </a>
            <a href="/assets/docs/azit-sim-datasheet.pdf" class="btn btn--outline" download>
              Download Datasheet
            </a>
          </div>
        </div>
        <div class="product-hero__image">
          <img src="../../assets/images/products/sim-hero.png" 
               alt="AZIT-SIM Network Simulation Diagram">
        </div>
      </div>
    </section>

    <!-- Value Proposition -->
    <section class="section value-proposition">
      <div class="container">
        <div class="highlight-box highlight-box--large">
          <h2>Virtualize Your Industrial Network</h2>
          <p>
            AZIT-SIM virtualizes industrial networks by simulating slave/subordinate 
            devices, enabling you to run master applications without real hardware.
          </p>
          <ul class="feature-list feature-list--inline">
            <li>Simulate via physical network adapter or virtually</li>
            <li>Configure using your existing ENI/EDS files</li>
            <li>React to Process Data (PDOs)</li>
            <li>Send and receive Service Data (SDOs)</li>
            <li>Interact with device state machines</li>
            <li>Connect to Digital Twin and simulation tools</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Architecture Diagram -->
    <section class="section architecture-section">
      <div class="container">
        <h2>Simulation Architecture</h2>
        <div class="architecture-diagram">
          <img src="../../assets/images/diagrams/sim-architecture.svg" 
               alt="AZIT-SIM Architecture Diagram">
        </div>
      </div>
    </section>

    <!-- Use Cases -->
    <section class="section use-cases-section">
      <div class="container">
        <h2>Accelerate Your Development Workflow</h2>
        <div class="use-cases-grid">
          
          <div class="use-case-card">
            <div class="use-case-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="16 18 22 12 16 6"></polyline>
                <polyline points="8 6 2 12 8 18"></polyline>
              </svg>
            </div>
            <h3>Master Software Development</h3>
            <ul>
              <li>Run master app without hardware</li>
              <li>Test functions for unavailable devices</li>
              <li>Validate with different configurations</li>
              <li>Debug complex topologies</li>
            </ul>
          </div>
          
          <div class="use-case-card">
            <div class="use-case-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 11l3 3L22 4"></path>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
              </svg>
            </div>
            <h3>Automated Testing</h3>
            <ul>
              <li>Replace manual tests with scripts</li>
              <li>Simulate device errors and state changes</li>
              <li>Simulate cable breaks and frame loss</li>
              <li>Test large networks</li>
            </ul>
          </div>
          
          <div class="use-case-card">
            <div class="use-case-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                <line x1="8" y1="21" x2="16" y2="21"></line>
                <line x1="12" y1="17" x2="12" y2="21"></line>
              </svg>
            </div>
            <h3>Virtual Commissioning</h3>
            <ul>
              <li>Develop with Digital Twin</li>
              <li>Start testing before hardware arrives</li>
              <li>Test dangerous scenarios safely</li>
            </ul>
          </div>
          
          <div class="use-case-card">
            <div class="use-case-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                <rect x="9" y="9" width="6" height="6"></rect>
                <line x1="9" y1="1" x2="9" y2="4"></line>
                <line x1="15" y1="1" x2="15" y2="4"></line>
                <line x1="9" y1="20" x2="9" y2="23"></line>
                <line x1="15" y1="20" x2="15" y2="23"></line>
                <line x1="20" y1="9" x2="23" y2="9"></line>
                <line x1="20" y1="14" x2="23" y2="14"></line>
                <line x1="1" y1="9" x2="4" y2="9"></line>
                <line x1="1" y1="14" x2="4" y2="14"></line>
              </svg>
            </div>
            <h3>Device Firmware Development</h3>
            <ul>
              <li>Develop firmware before hardware exists</li>
              <li>Use convenient IDE debugging</li>
              <li>Test with recorded data</li>
              <li>Test FoE, CoE, VoE transfers</li>
            </ul>
          </div>
          
        </div>
      </div>
    </section>

    <!-- Simulation Modes Tabs -->
    <section class="section simulation-modes">
      <div class="container">
        <h2>Simulation Modes</h2>
        
        <div class="tabs">
          <button class="tab-btn active" data-tab="hil">Hardware-in-the-Loop (HiL)</button>
          <button class="tab-btn" data-tab="sil">Software-in-the-Loop (SiL)</button>
        </div>
        
        <!-- HiL Tab -->
        <div class="tab-content active" id="hil">
          <div class="simulation-mode">
            <div class="simulation-mode__content">
              <h3>All Devices Simulated</h3>
              <p>
                The System-Under-Test (SUT) communicates via physical network cable 
                with AZIT-SIM running on external hardware. No special hardware 
                required — standard PC or embedded processor with Ethernet works.
              </p>
              
              <h3>Mixed Real and Simulated Devices</h3>
              <ul class="check-list">
                <li>HiL with multiple ports can connect anywhere in the network</li>
                <li>Mix real devices with simulated ones</li>
                <li>Create Digital Twin step-by-step</li>
                <li>Simulate errors at any network location</li>
              </ul>
            </div>
            <div class="simulation-mode__diagram">
              <img src="../../assets/images/diagrams/sim-hil.svg" 
                   alt="Hardware-in-the-Loop Simulation Diagram">
            </div>
          </div>
        </div>
        
        <!-- SiL Tab -->
        <div class="tab-content" id="sil">
          <div class="simulation-mode">
            <div class="simulation-mode__content">
              <h3>Fully Virtual Simulation</h3>
              <p>
                The network is simulated entirely in software on the same machine 
                as your controller. No separate hardware or physical network 
                interface required!
              </p>
              <p>
                AZIT-SIM replaces the Ethernet controller driver, exchanging 
                frames directly with your application.
              </p>
              
              <h4>Benefits</h4>
              <ul class="check-list">
                <li>No additional hardware required</li>
                <li>Run in VM or cloud environment</li>
                <li>Perfect for CI/CD pipelines</li>
                <li>Deterministic timing for reproducible tests</li>
              </ul>
            </div>
            <div class="simulation-mode__diagram">
              <img src="../../assets/images/diagrams/sim-sil.svg" 
                   alt="Software-in-the-Loop Simulation Diagram">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Supported Protocols -->
    <section class="section protocols-section">
      <div class="container">
        <h2>Supported Protocols</h2>
        <div class="protocols-grid">
          
          <div class="protocol-card">
            <h3>EtherCAT</h3>
            <ul>
              <li>Full network simulation</li>
              <li>Distributed clocks support</li>
              <li>CoE, FoE, VoE, SoE mailbox</li>
              <li>Up to 2000 devices</li>
            </ul>
          </div>
          
          <div class="protocol-card">
            <h3>CANopen</h3>
            <ul>
              <li>NMT states</li>
              <li>PDO/SDO</li>
              <li>EMCY</li>
              <li>Object Dictionary</li>
            </ul>
          </div>
          
          <div class="protocol-card">
            <h3>FSoE</h3>
            <ul>
              <li>Safety simulation</li>
              <li>Fail-safe states</li>
              <li>Error injection</li>
            </ul>
          </div>
          
          <div class="protocol-card">
            <h3>CANopen Safety</h3>
            <ul>
              <li>SRDO simulation</li>
              <li>Safe state testing</li>
            </ul>
          </div>
          
          <div class="protocol-card">
            <h3>J1939</h3>
            <ul>
              <li>Message simulation</li>
              <li>DM messages</li>
              <li>Address claiming</li>
            </ul>
          </div>
          
        </div>
      </div>
    </section>

    <!-- API Section -->
    <section class="section api-section">
      <div class="container">
        <h2>Programming Interface (API)</h2>
        <p class="section-subtitle">Full control via C/C++ or .NET API</p>
        
        <div class="api-features">
          <div class="api-feature">
            <h3>Process Data Handling</h3>
            <ul>
              <li><strong>Default:</strong> Control from process data image</li>
              <li><strong>Sample App:</strong> Built-in CiA 402 drive profile</li>
              <li><strong>Custom:</strong> Implement own device firmware hooks</li>
            </ul>
          </div>
          
          <div class="api-feature">
            <h3>Network Operations</h3>
            <ul>
              <li>Change network topology dynamically</li>
              <li>Disconnect/connect/move devices</li>
              <li>Power down/up devices</li>
              <li>Change device states (PREOP, SAFEOP, OP)</li>
              <li>Simulate lost frames at specific device/port</li>
              <li>Simulate link loss at specific device/port</li>
            </ul>
          </div>
          
          <div class="api-feature">
            <h3>Diagnosis Functions</h3>
            <ul>
              <li>Read/write device registers</li>
              <li>Read/write EEPROM content</li>
              <li>Access object dictionary</li>
              <li>Evaluate network topology</li>
            </ul>
          </div>
        </div>
        
        <div class="code-block">
          <div class="code-block__header">
            <span class="code-block__language">C</span>
            <button class="code-block__copy">Copy</button>
          </div>
          <pre><code>/* Simulate device error */
AZIT_SIM_SetDeviceState(
    hSim,
    deviceId,
    AZIT_STATE_SAFEOP  /* Force device to SafeOp */
);

/* Simulate cable break */
AZIT_SIM_SimulateLinkLoss(hSim, deviceId, PORT_A);

/* Inject frame loss */
AZIT_SIM_SetFrameLossRate(hSim, deviceId, 0.01);</code></pre>
        </div>
      </div>
    </section>

    <!-- Digital Twin / FMI -->
    <section class="section fmi-section">
      <div class="container">
        <h2>Digital Twin Integration</h2>
        <p class="section-subtitle">Connect to Your Simulation Environment</p>
        
        <div class="fmi-content">
          <div class="fmi-description">
            <h3>Functional Mock-up Interface (FMI)</h3>
            <ul class="check-list">
              <li>Process data simulation using FMU models</li>
              <li>Compatible with Matlab, Simulink, Dymola, etc.</li>
              <li>AZIT-SIM FMI Library provides all needed APIs</li>
              <li>Use ready-to-run example applications</li>
            </ul>
          </div>
          <div class="fmi-diagram">
            <img src="../../assets/images/diagrams/sim-fmi.svg" 
                 alt="FMI Integration Architecture">
          </div>
        </div>
      </div>
    </section>

    <!-- Specifications -->
    <section class="section specs-section">
      <div class="container">
        <h2>Features & Specifications</h2>
        <table class="specs-table">
          <tbody>
            <tr>
              <td>Max simulated devices</td>
              <td>Up to 2000</td>
            </tr>
            <tr>
              <td>Mailbox protocols</td>
              <td>CoE, VoE, FoE, SoE</td>
            </tr>
            <tr>
              <td>PDO configuration</td>
              <td>Via CoE</td>
            </tr>
            <tr>
              <td>Object dictionary</td>
              <td>Basic OD included</td>
            </tr>
            <tr>
              <td>Distributed clocks</td>
              <td>Supported</td>
            </tr>
            <tr>
              <td>Programming languages</td>
              <td>C/C++, .NET</td>
            </tr>
            <tr>
              <td>Supported OS</td>
              <td>Windows, Linux, QNX, VxWorks, others</td>
            </tr>
            <tr>
              <td>Compatible masters</td>
              <td>AZIT stacks, TwinCAT, CODESYS (add-on)</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Benefits -->
    <section class="section benefits-section">
      <div class="container">
        <div class="benefits-grid">
          <div class="benefit-card">
            <h3>Save Effort & Cost</h3>
            <ul class="check-list">
              <li>Develop independently of hardware availability</li>
              <li>No device shortage for developers</li>
              <li>Save hardware, space, and energy costs</li>
              <li>Quick config switch via different ENI files</li>
            </ul>
          </div>
          <div class="benefit-card">
            <h3>Improve Quality</h3>
            <ul class="check-list">
              <li>Automated regression tests in CI/CD</li>
              <li>Faster iterations</li>
              <li>Test without physical hardware</li>
              <li>Reproduce customer issues in-house</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Related Products -->
    <section class="section related-products">
      <div class="container">
        <h2>Related Products</h2>
        <div class="product-cards">
          <a href="/pages/products/fsoe-slave.html" class="product-card">
            <h3>FSoE Stack</h3>
            <p>Safety protocol for your simulation</p>
          </a>
          <a href="/pages/products/canopen-slave.html" class="product-card">
            <h3>CANopen Stack</h3>
            <p>Fieldbus protocol simulation</p>
          </a>
          <a href="/pages/products/protocol-gateway.html" class="product-card">
            <h3>Protocol Gateway</h3>
            <p>Hardware for your solution</p>
          </a>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="section cta-section">
      <div class="container">
        <h2>Start Simulating Today</h2>
        <p>
          Request a free evaluation license to test AZIT-SIM with your application. 
          Our engineers will help you get started.
        </p>
        <div class="cta-buttons">
          <a href="/pages/contact.html?product=simulation-eval" class="btn btn--primary">
            Request Free Evaluation
          </a>
          <a href="/assets/docs/azit-sim-datasheet.pdf" class="btn btn--outline" download>
            Download Datasheet
          </a>
          <a href="/pages/contact.html" class="btn btn--text">Contact Us</a>
        </div>
      </div>
    </section>
  </main>

  <!-- Include footer component -->
  
  <script src="../../js/main.js"></script>
  <script src="../../js/tabs.js"></script>
</body>
</html>
```

---

### 2.5 Add CSS Styles for Simulation Page

**File:** `css/pages.css`

**Add these styles:**

```css
/* ============================================
   Simulation Product Page Styles
   ============================================ */

/* Hero Section */
.product-hero--simulation {
  background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-gray-800) 100%);
  color: white;
  padding: 4rem 0;
}

.product-hero--simulation .container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: center;
}

.product-hero--simulation .product-hero__tagline {
  color: var(--color-gray-400);
  font-size: 1.1rem;
  margin-bottom: 2rem;
}

/* Use Cases Grid */
.use-cases-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem;
  margin-top: 2rem;
}

.use-case-card {
  background: var(--color-white);
  border: 1px solid var(--color-gray-200);
  border-radius: 12px;
  padding: 2rem;
  transition: box-shadow 0.3s ease, transform 0.3s ease;
}

.use-case-card:hover {
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
  transform: translateY(-4px);
}

.use-case-card__icon {
  width: 64px;
  height: 64px;
  background: var(--color-primary-light);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1.5rem;
  color: var(--color-primary);
}

.use-case-card h3 {
  margin-bottom: 1rem;
  color: var(--color-dark);
}

.use-case-card ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.use-case-card li {
  padding: 0.5rem 0;
  padding-left: 1.5rem;
  position: relative;
  color: var(--color-gray-600);
}

.use-case-card li::before {
  content: '•';
  position: absolute;
  left: 0;
  color: var(--color-primary);
}

/* Simulation Modes */
.simulation-mode {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: start;
  margin-top: 2rem;
}

.simulation-mode__diagram img {
  width: 100%;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Protocols Grid */
.protocols-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1.5rem;
  margin-top: 2rem;
}

.protocol-card {
  background: var(--color-white);
  border: 1px solid var(--color-gray-200);
  border-radius: 8px;
  padding: 1.5rem;
}

.protocol-card h3 {
  color: var(--color-primary);
  margin-bottom: 1rem;
  font-size: 1.1rem;
}

.protocol-card ul {
  list-style: none;
  padding: 0;
  margin: 0;
  font-size: 0.9rem;
}

.protocol-card li {
  padding: 0.25rem 0;
  color: var(--color-gray-600);
}

/* API Section */
.api-features {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
  margin: 2rem 0;
}

.api-feature h3 {
  font-size: 1rem;
  margin-bottom: 1rem;
  color: var(--color-dark);
}

.api-feature ul {
  font-size: 0.9rem;
}

/* FMI Section */
.fmi-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: center;
  margin-top: 2rem;
}

.fmi-diagram img {
  width: 100%;
  max-width: 500px;
}

/* Benefits Grid */
.benefits-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
}

.benefit-card {
  background: var(--color-light);
  border-radius: 12px;
  padding: 2rem;
}

.benefit-card h3 {
  margin-bottom: 1.5rem;
  color: var(--color-primary);
}

/* Check List */
.check-list {
  list-style: none;
  padding: 0;
}

.check-list li {
  padding: 0.5rem 0;
  padding-left: 2rem;
  position: relative;
}

.check-list li::before {
  content: '✓';
  position: absolute;
  left: 0;
  color: var(--color-success);
  font-weight: bold;
}

/* Responsive */
@media (max-width: 1024px) {
  .use-cases-grid {
    grid-template-columns: 1fr;
  }
  
  .api-features {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .product-hero--simulation .container {
    grid-template-columns: 1fr;
  }
  
  .simulation-mode {
    grid-template-columns: 1fr;
  }
  
  .fmi-content {
    grid-template-columns: 1fr;
  }
  
  .benefits-grid {
    grid-template-columns: 1fr;
  }
}
```

---

### 2.6 Update Homepage Products Section

**File:** `index.html`

**Add Simulation card to the Products section, in the "Software" or new category:**

```html
<!-- In Products Overview Section, add after Hardware category -->
<div class="products-category">
  <h3>Software</h3>
  <div class="product-cards">
    <a href="/pages/products/simulation.html" class="product-card product-card--featured">
      <div class="product-card__image">
        <img src="assets/images/products/sim-thumb.png" alt="AZIT-SIM Simulation">
      </div>
      <div class="product-card__content">
        <span class="product-card__badge">Software</span>
        <h3 class="product-card__title">AZIT-SIM Network Simulation</h3>
        <p class="product-card__description">
          Run your controller with a simulated network. HiL and SiL support.
        </p>
        <ul class="product-card__features">
          <li>EtherCAT, CANopen, FSoE</li>
          <li>Up to 2000 devices</li>
          <li>Digital Twin ready</li>
        </ul>
        <span class="product-card__cta">Learn More →</span>
      </div>
    </a>
  </div>
</div>
```

---

### 2.7 Delete Documentation Page (if exists)

**File to delete:** `pages/documentation.html`

If this file exists from a previous version, delete it as Documentation is no longer in the main navigation.

---

## 3. New Image Assets Required

Create placeholder images in `assets/images/products/`:

| Filename | Dimensions | Description |
|----------|------------|-------------|
| `sim-hero.png` | 1200x600 | Split view: code IDE + simulated network topology |
| `sim-thumb.png` | 400x250 | Thumbnail for homepage card |

Create in `assets/images/diagrams/`:

| Filename | Dimensions | Description |
|----------|------------|-------------|
| `sim-architecture.svg` | 1000x600 | High-level simulation architecture |
| `sim-hil.svg` | 800x400 | Hardware-in-the-loop diagram showing physical connection |
| `sim-sil.svg` | 800x400 | Software-in-the-loop diagram showing virtual connection |
| `sim-fmi.svg` | 600x400 | FMI integration with Matlab/Simulink |

**Placeholder image style:** Use a solid color (#E0E0E8) with centered text describing what the image should be.

---

## 4. French Language Version

Create `fr/pages/products/simulation.html` with these translations:

| English | French |
|---------|--------|
| Network Simulation | Simulation de réseau |
| Real-time Industrial Network Simulation | Simulation de réseau industriel temps réel |
| Request Evaluation | Demande d'évaluation |
| Download Datasheet | Télécharger la fiche technique |
| Hardware-in-the-Loop | Matériel dans la boucle (HiL) |
| Software-in-the-Loop | Logiciel dans la boucle (SiL) |
| Virtual Commissioning | Mise en service virtuelle |
| Digital Twin | Jumeau numérique |
| Master Software Development | Développement logiciel maître |
| Automated Testing | Tests automatisés |
| Device Firmware Development | Développement firmware équipement |
| Supported Protocols | Protocoles supportés |
| Programming Interface | Interface de programmation |
| Features & Specifications | Caractéristiques et spécifications |

---

## 5. Verification Checklist

After making changes, verify:

- [ ] "Docs" link is removed from main navigation header
- [ ] Simulation appears in Products mega-menu under "Software"
- [ ] Footer shows "Simulation" instead of "Documentation"
- [ ] Homepage shows Simulation card in products section
- [ ] Simulation page (`/pages/products/simulation.html`) loads without errors
- [ ] Both tabs (HiL/SiL) work correctly
- [ ] All images display (or show placeholders)
- [ ] Breadcrumb navigation works
- [ ] "Request Evaluation" buttons link to contact page
- [ ] Page is responsive on mobile
- [ ] French version exists at `/fr/pages/products/simulation.html`
- [ ] `pages/documentation.html` is deleted (if existed)

---

## 6. Quick Reference: Files Modified/Created

```
azit-website/
├── index.html                          ← Remove Docs link, add Simulation card
├── css/
│   └── pages.css                       ← Add simulation-specific styles
├── assets/
│   └── images/
│       ├── products/
│       │   ├── sim-hero.png           ← NEW
│       │   └── sim-thumb.png          ← NEW
│       └── diagrams/
│           ├── sim-architecture.svg   ← NEW
│           ├── sim-hil.svg            ← NEW
│           ├── sim-sil.svg            ← NEW
│           └── sim-fmi.svg            ← NEW
├── pages/
│   ├── documentation.html              ← DELETE (if exists)
│   └── products/
│       └── simulation.html             ← NEW FILE
└── fr/
    └── pages/
        └── products/
            └── simulation.html         ← NEW FILE (French)
```

---

*End of V2 → V3 Update Instructions*
