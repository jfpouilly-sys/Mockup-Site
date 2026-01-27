# AZIT Website Update Instructions
## Delta Update Guide for Claude Code

**Purpose:** This document provides step-by-step instructions to update an existing AZIT website mockup (generated from specification v1.0) to include the new Protocol Gateway (ISI-GTW) product page.

**Scope:** Add Protocol Gateway product to Products menu and create product detail page.

---

## 1. Summary of Changes

| Change Type | Description |
|-------------|-------------|
| New Page | `pages/products/protocol-gateway.html` |
| Navigation | Add "Protocol Gateway" to Products menu |
| Footer | Add "Gateway" to Products column |
| Homepage | Add Gateway card to Products section |
| Assets | New images for gateway product |

---

## 2. File Changes Required

### 2.1 Create New File: `pages/products/protocol-gateway.html`

Create a new product page for the Protocol Gateway with the following structure:

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ISI-GTW Multi-Protocol Gateway | AZIT - Industrial Protocol Stacks</title>
  <meta name="description" content="Custom multi-protocol gateway for serial, CAN and Ethernet industrial networks. Fully programmable C/C++ gateway solution by AZIT.">
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
      <span>Protocol Gateway</span>
    </nav>

    <!-- Product Hero Section -->
    <section class="product-hero product-hero--gateway">
      <div class="product-hero__gallery">
        <img src="../../assets/images/products/isi-gtw-hero.jpg" 
             alt="ISI-GTW Multi-Protocol Gateway" 
             class="product-hero__main-image">
        <div class="product-hero__thumbnails">
          <img src="../../assets/images/products/isi-gtw-pcb.jpg" alt="ISI-GTW PCB">
          <img src="../../assets/images/products/isi-gtw-case.jpg" alt="ISI-GTW Enclosure">
          <img src="../../assets/images/products/isi-gtw-ports.png" alt="ISI-GTW Ports">
        </div>
      </div>
      <div class="product-hero__info">
        <h1>ISI-GTW</h1>
        <p class="product-hero__subtitle">Multi-Protocol Gateway</p>
        <p class="product-hero__description">
          Custom protocol conversion for serial, CAN & Ethernet industrial networks.
        </p>
        <div class="product-hero__badges">
          <span class="badge badge--primary">Custom Development</span>
          <span class="badge badge--secondary">Made in France</span>
          <span class="badge badge--partner">ST Partner</span>
        </div>
        <div class="product-hero__actions">
          <a href="/pages/contact.html?product=gateway" class="btn btn--primary">Request Quote</a>
          <a href="/assets/docs/isi-gtw-brochure.pdf" class="btn btn--outline" download>
            Download Brochure
          </a>
        </div>
      </div>
    </section>

    <!-- Value Proposition -->
    <section class="section value-proposition">
      <div class="container">
        <blockquote class="highlight-box">
          <h2>A True Electronic Translator for Your Equipment</h2>
          <p>
            ISI-GTW is an intelligent, versatile, and fully programmable communication 
            gateway for product designers and integrators. It enables communication 
            between heterogeneous equipment with serial, CAN, or Ethernet interfaces 
            using different and often incompatible protocols.
          </p>
        </blockquote>
      </div>
    </section>

    <!-- Protocol Diagram -->
    <section class="section protocol-diagram">
      <div class="container">
        <h2>Supported Protocols</h2>
        <div class="gateway-diagram">
          <!-- SVG diagram showing gateway with protocol connections -->
          <img src="../../assets/images/diagrams/gateway-protocol-diagram.svg" 
               alt="ISI-GTW Protocol Connections Diagram">
        </div>
      </div>
    </section>

    <!-- Tabbed Content -->
    <section class="section product-tabs">
      <div class="container">
        <div class="tabs">
          <button class="tab-btn active" data-tab="features">Features</button>
          <button class="tab-btn" data-tab="form-factors">Form Factors</button>
          <button class="tab-btn" data-tab="custom-dev">Custom Development</button>
          <button class="tab-btn" data-tab="specs">Specifications</button>
        </div>

        <!-- Features Tab -->
        <div class="tab-content active" id="features">
          <div class="features-grid">
            <div class="feature-card">
              <div class="feature-card__icon">
                <svg><!-- Programmable icon --></svg>
              </div>
              <h3>Fully Programmable</h3>
              <p>C/C++ programming in multitasking environment. Full access to process your data.</p>
            </div>
            <div class="feature-card">
              <div class="feature-card__icon">
                <svg><!-- Multi-protocol icon --></svg>
              </div>
              <h3>Multi-Protocol Support</h3>
              <p>CAN, CANopen, J1939, Ethernet, EtherNet/IP, Modbus RTU/TCP, Serial RS232/485</p>
            </div>
            <div class="feature-card">
              <div class="feature-card__icon">
                <svg><!-- Turnkey icon --></svg>
              </div>
              <h3>Turnkey Solution</h3>
              <p>AZIT handles development, production, and packaging.</p>
            </div>
            <div class="feature-card">
              <div class="feature-card__icon">
                <svg><!-- Expandable icon --></svg>
              </div>
              <h3>Expandable I/O</h3>
              <p>USB port, SD card slot, DIP switches, protected I/Os, JTAG access.</p>
            </div>
          </div>
          <div class="differentiator-box">
            <p>
              <strong>What sets ISI-GTW apart:</strong> Unlike standard market gateways, 
              ISI-GTW offers complete C/C++ programmability in a multitasking environment — 
              giving you full control over data processing that off-the-shelf solutions cannot match.
            </p>
          </div>
        </div>

        <!-- Form Factors Tab -->
        <div class="tab-content" id="form-factors">
          <h3>Two Integration Options</h3>
          <div class="form-factors-grid">
            <div class="form-factor-card">
              <img src="../../assets/images/products/isi-gtw-pcb.jpg" alt="ISI-GTW PCB Format">
              <h4>PCB Format</h4>
              <p class="ref">Ref: ISI-GTW-PCB</p>
              <ul>
                <li>Bare board for custom enclosure</li>
                <li>4 mounting holes for standoffs</li>
                <li>Terminal block connectors</li>
              </ul>
              <a href="/pages/contact.html?product=gateway-pcb" class="btn btn--outline">
                Request PCB Quote
              </a>
            </div>
            <div class="form-factor-card">
              <img src="../../assets/images/products/isi-gtw-case.jpg" alt="ISI-GTW Enclosure Format">
              <h4>Enclosure Format</h4>
              <p class="ref">Ref: ISI-GTW-CASE</p>
              <ul>
                <li>Aluminum enclosure</li>
                <li>DIN rail mounting</li>
                <li>Mechanical & EMC protection</li>
                <li>DB9 connectors for secure connections</li>
                <li>Industrial cabinet ready</li>
              </ul>
              <a href="/pages/contact.html?product=gateway-case" class="btn btn--outline">
                Request Case Quote
              </a>
            </div>
          </div>
        </div>

        <!-- Custom Development Tab -->
        <div class="tab-content" id="custom-dev">
          <h3>Tailored to Your Requirements</h3>
          <p>
            Leveraging our expertise in industrial networks and embedded systems, 
            AZIT can study your specifications and propose a custom solution based on ISI-GTW.
          </p>
          <div class="process-steps">
            <div class="step">
              <span class="step-number">1</span>
              <span class="step-label">Requirements</span>
            </div>
            <div class="step">
              <span class="step-number">2</span>
              <span class="step-label">Design</span>
            </div>
            <div class="step">
              <span class="step-number">3</span>
              <span class="step-label">Development</span>
            </div>
            <div class="step">
              <span class="step-number">4</span>
              <span class="step-label">Testing</span>
            </div>
            <div class="step">
              <span class="step-number">5</span>
              <span class="step-label">Production</span>
            </div>
            <div class="step">
              <span class="step-number">6</span>
              <span class="step-label">Delivery</span>
            </div>
          </div>
          <h4>What We Offer</h4>
          <ul class="check-list">
            <li>Custom firmware development</li>
            <li>Pre-loaded application software</li>
            <li>Any quantity — from prototype to volume</li>
            <li>Flexible delivery scheduling</li>
            <li>Ongoing firmware updates via JTAG</li>
            <li>Long-term maintenance support</li>
          </ul>
          <a href="/pages/contact.html?product=gateway-custom" class="btn btn--primary">
            Request Custom Development Quote
          </a>
        </div>

        <!-- Specifications Tab -->
        <div class="tab-content" id="specs">
          <h3>Hardware Specifications</h3>
          <table class="specs-table">
            <thead>
              <tr><th>Interface</th><th>Details</th></tr>
            </thead>
            <tbody>
              <tr><td>Ethernet</td><td>10/100 Mbps</td></tr>
              <tr><td>CAN</td><td>2x CAN 2.0B / CAN FD</td></tr>
              <tr><td>Serial</td><td>RS232, RS485</td></tr>
              <tr><td>USB</td><td>Device/Host</td></tr>
              <tr><td>Storage</td><td>SD Card slot</td></tr>
              <tr><td>Debug</td><td>JTAG interface</td></tr>
              <tr><td>I/O</td><td>Protected digital I/O</td></tr>
              <tr><td>Config</td><td>DIP switches</td></tr>
            </tbody>
          </table>

          <h3>Supported Protocols</h3>
          <table class="specs-table">
            <thead>
              <tr><th>Category</th><th>Protocols</th></tr>
            </thead>
            <tbody>
              <tr><td>Ethernet</td><td>TCP/IP, EtherNet/IP, Modbus TCP, EtherCAT</td></tr>
              <tr><td>CAN</td><td>CAN 2.0, CAN FD, CANopen, J1939, DeviceNet</td></tr>
              <tr><td>Serial</td><td>Modbus RTU, Custom</td></tr>
            </tbody>
          </table>

          <h3>Port Diagram</h3>
          <img src="../../assets/images/products/isi-gtw-ports.png" 
               alt="ISI-GTW Port Diagram" 
               class="port-diagram">
        </div>
      </div>
    </section>

    <!-- Related Products -->
    <section class="section related-products">
      <div class="container">
        <h2>Complete Your Solution</h2>
        <div class="product-cards">
          <a href="/pages/products/canopen-slave.html" class="product-card">
            <h3>CANopen Stack</h3>
            <p>Protocol stack for your gateway firmware</p>
          </a>
          <a href="/pages/products/j1939.html" class="product-card">
            <h3>J1939 Stack</h3>
            <p>Automotive protocol support</p>
          </a>
          <a href="/pages/services/expertise-networks.html" class="product-card">
            <h3>Gateway Dev Services</h3>
            <p>Custom development support</p>
          </a>
        </div>
      </div>
    </section>

    <!-- Related Training -->
    <section class="section related-training">
      <div class="container">
        <h2>Build Your Protocol Expertise</h2>
        <div class="training-cards">
          <div class="training-card">
            <h3>CAN Training</h3>
            <p>2 days</p>
            <a href="/pages/training.html#can">View Details</a>
          </div>
          <div class="training-card">
            <h3>CANopen Training</h3>
            <p>2 days</p>
            <a href="/pages/training.html#canopen">View Details</a>
          </div>
          <div class="training-card">
            <h3>J1939 Training</h3>
            <p>2 days</p>
            <a href="/pages/training.html#j1939">View Details</a>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="section cta-section">
      <div class="container">
        <h2>Need a Custom Gateway Solution?</h2>
        <p>
          Tell us about your protocol conversion requirements and our experts 
          will propose a tailored solution.
        </p>
        <div class="cta-buttons">
          <a href="/pages/contact.html?product=gateway" class="btn btn--primary">Request Custom Quote</a>
          <a href="/assets/docs/isi-gtw-brochure.pdf" class="btn btn--outline" download>Download Brochure</a>
          <a href="/pages/contact.html" class="btn btn--text">Contact Expert</a>
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

### 2.2 Update Navigation Header

**File:** `index.html` and all page files (or shared header component)

**Location:** Inside the Products mega-menu

**Add this item** at the TOP of the Products dropdown, before Communication Stacks:

```html
<!-- Add inside Products mega-menu, create new HARDWARE column -->
<div class="mega-menu__column">
  <h4 class="mega-menu__heading">Hardware</h4>
  <ul class="mega-menu__list">
    <li>
      <a href="/pages/products/protocol-gateway.html">
        <span class="mega-menu__icon">🔌</span>
        Protocol Gateway (ISI-GTW)
      </a>
    </li>
  </ul>
</div>
```

**Updated mega-menu structure:**
```html
<div class="mega-menu" id="products-menu">
  <div class="mega-menu__container">
    <!-- NEW: Hardware Column -->
    <div class="mega-menu__column">
      <h4 class="mega-menu__heading">Hardware</h4>
      <ul class="mega-menu__list">
        <li><a href="/pages/products/protocol-gateway.html">Protocol Gateway (ISI-GTW)</a></li>
      </ul>
    </div>
    
    <!-- Existing: Communication Stacks Column -->
    <div class="mega-menu__column">
      <h4 class="mega-menu__heading">Communication Stacks</h4>
      <!-- existing content -->
    </div>
    
    <!-- Existing: Tools Column -->
    <div class="mega-menu__column">
      <h4 class="mega-menu__heading">Tools</h4>
      <!-- existing content -->
    </div>
  </div>
</div>
```

---

### 2.3 Update Footer

**File:** All pages with footer (or shared footer component)

**Location:** Footer Products column

**Change from:**
```html
<div class="footer__column">
  <h4>Products</h4>
  <ul>
    <li><a href="#">FSoE</a></li>
    <li><a href="#">CANopen</a></li>
    ...
  </ul>
</div>
```

**Change to:**
```html
<div class="footer__column">
  <h4>Products</h4>
  <ul>
    <li><a href="/pages/products/protocol-gateway.html">Gateway</a></li>
    <li><a href="/pages/products/fsoe-slave.html">FSoE</a></li>
    <li><a href="/pages/products/canopen-slave.html">CANopen</a></li>
    ...
  </ul>
</div>
```

---

### 2.4 Update Homepage Products Section

**File:** `index.html`

**Location:** Products Overview Section (around line with "Protocol Stacks for Every Industrial Need")

**Add Gateway Card** at the beginning of the products grid or in a separate "Hardware" category:

```html
<!-- Add before the protocol stacks grid -->
<div class="products-category">
  <h3>Hardware Solutions</h3>
  <div class="product-cards product-cards--hardware">
    <a href="/pages/products/protocol-gateway.html" class="product-card product-card--featured">
      <div class="product-card__image">
        <img src="assets/images/products/isi-gtw-thumb.jpg" alt="ISI-GTW Gateway">
      </div>
      <div class="product-card__content">
        <span class="product-card__badge">Hardware</span>
        <h3 class="product-card__title">ISI-GTW Protocol Gateway</h3>
        <p class="product-card__description">
          Custom multi-protocol conversion for serial, CAN & Ethernet networks
        </p>
        <ul class="product-card__features">
          <li>Fully programmable C/C++</li>
          <li>CAN, Ethernet, Serial</li>
          <li>Turnkey solution</li>
        </ul>
        <span class="product-card__cta">Learn More →</span>
      </div>
    </a>
  </div>
</div>
```

---

### 2.5 Add CSS Styles for Gateway Page

**File:** `css/pages.css`

**Add these styles:**

```css
/* ============================================
   Protocol Gateway Page Styles
   ============================================ */

/* Product Hero - Gallery Layout */
.product-hero--gateway {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  padding: 2rem 0;
}

.product-hero__gallery {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.product-hero__main-image {
  width: 100%;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.product-hero__thumbnails {
  display: flex;
  gap: 0.5rem;
}

.product-hero__thumbnails img {
  width: 80px;
  height: 60px;
  object-fit: cover;
  border-radius: 4px;
  cursor: pointer;
  border: 2px solid transparent;
  transition: border-color 0.2s;
}

.product-hero__thumbnails img:hover,
.product-hero__thumbnails img.active {
  border-color: var(--color-primary);
}

/* Form Factors Grid */
.form-factors-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  margin-top: 2rem;
}

.form-factor-card {
  background: var(--color-white);
  border: 1px solid var(--color-gray-200);
  border-radius: 8px;
  padding: 1.5rem;
  text-align: center;
}

.form-factor-card img {
  width: 100%;
  max-width: 300px;
  margin-bottom: 1rem;
}

.form-factor-card h4 {
  margin-bottom: 0.25rem;
}

.form-factor-card .ref {
  color: var(--color-gray-600);
  font-size: 0.875rem;
  margin-bottom: 1rem;
}

.form-factor-card ul {
  text-align: left;
  margin-bottom: 1.5rem;
}

/* Process Steps */
.process-steps {
  display: flex;
  justify-content: space-between;
  margin: 2rem 0;
  position: relative;
}

.process-steps::before {
  content: '';
  position: absolute;
  top: 20px;
  left: 40px;
  right: 40px;
  height: 2px;
  background: var(--color-gray-200);
}

.step {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
  z-index: 1;
}

.step-number {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: var(--color-primary);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.step-label {
  font-size: 0.875rem;
  color: var(--color-gray-600);
}

/* Differentiator Box */
.differentiator-box {
  background: var(--color-primary-light);
  border-left: 4px solid var(--color-primary);
  padding: 1.5rem;
  margin-top: 2rem;
  border-radius: 0 8px 8px 0;
}

/* Gateway Diagram */
.gateway-diagram {
  max-width: 800px;
  margin: 2rem auto;
}

.gateway-diagram img {
  width: 100%;
}

/* Port Diagram */
.port-diagram {
  max-width: 600px;
  margin: 1rem auto;
  display: block;
}

/* Responsive */
@media (max-width: 768px) {
  .product-hero--gateway {
    grid-template-columns: 1fr;
  }
  
  .form-factors-grid {
    grid-template-columns: 1fr;
  }
  
  .process-steps {
    flex-wrap: wrap;
    gap: 1rem;
  }
  
  .process-steps::before {
    display: none;
  }
}
```

---

### 2.6 Add Tab JavaScript (if not exists)

**File:** `js/tabs.js`

```javascript
// Tab functionality for product pages
document.addEventListener('DOMContentLoaded', function() {
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');
  
  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      const tabId = button.dataset.tab;
      
      // Remove active from all
      tabButtons.forEach(btn => btn.classList.remove('active'));
      tabContents.forEach(content => content.classList.remove('active'));
      
      // Add active to clicked
      button.classList.add('active');
      document.getElementById(tabId).classList.add('active');
    });
  });
});
```

---

## 3. New Image Assets Required

Create placeholder images in `assets/images/products/`:

| Filename | Dimensions | Description |
|----------|------------|-------------|
| `isi-gtw-hero.jpg` | 600x600 | Main product shot - gateway in aluminum enclosure |
| `isi-gtw-pcb.jpg` | 400x300 | PCB board view showing components |
| `isi-gtw-case.jpg` | 400x300 | Aluminum enclosure with visible DIN rail mount |
| `isi-gtw-ports.png` | 800x400 | Technical diagram with labeled ports |
| `isi-gtw-thumb.jpg` | 400x250 | Thumbnail for homepage card |

Create in `assets/images/diagrams/`:

| Filename | Dimensions | Description |
|----------|------------|-------------|
| `gateway-protocol-diagram.svg` | 1000x600 | SVG showing gateway with Serial/CAN/Ethernet connections |

**Placeholder image style:** Use a solid color (#E0E0E8) with centered text describing what the image should be.

---

## 4. French Language Version

Create `fr/pages/products/protocol-gateway.html` with these translations:

| English | French |
|---------|--------|
| Multi-Protocol Gateway | Passerelle multi-protocoles |
| Custom protocol conversion | Conversion de protocoles sur mesure |
| Request Quote | Demande de devis |
| Download Brochure | Télécharger la plaquette |
| Features | Caractéristiques |
| Form Factors | Formats disponibles |
| Custom Development | Développement sur mesure |
| Specifications | Spécifications |
| Fully Programmable | Entièrement programmable |
| Turnkey Solution | Solution clé en main |
| PCB Format | Format carte |
| Enclosure Format | Format boîtier |

---

## 5. Verification Checklist

After making changes, verify:

- [ ] Protocol Gateway appears in Products mega-menu under "Hardware"
- [ ] Footer includes "Gateway" link in Products column
- [ ] Homepage shows Gateway card in products section
- [ ] Gateway page loads without errors
- [ ] All 4 tabs work correctly (Features, Form Factors, Custom Dev, Specs)
- [ ] Images display (or show placeholders)
- [ ] Breadcrumb navigation works
- [ ] "Request Quote" buttons link to contact page with product parameter
- [ ] Page is responsive on mobile
- [ ] French version exists at `/fr/pages/products/protocol-gateway.html`

---

## 6. Quick Reference: Files to Modify

```
azit-website/
├── index.html                          ← Add gateway to products section
├── css/
│   └── pages.css                       ← Add gateway-specific styles
├── js/
│   └── tabs.js                         ← Add if not exists
├── assets/
│   └── images/
│       ├── products/
│       │   ├── isi-gtw-hero.jpg       ← NEW
│       │   ├── isi-gtw-pcb.jpg        ← NEW
│       │   ├── isi-gtw-case.jpg       ← NEW
│       │   ├── isi-gtw-ports.png      ← NEW
│       │   └── isi-gtw-thumb.jpg      ← NEW
│       └── diagrams/
│           └── gateway-protocol-diagram.svg  ← NEW
├── pages/
│   └── products/
│       └── protocol-gateway.html       ← NEW FILE
└── fr/
    └── pages/
        └── products/
            └── protocol-gateway.html   ← NEW FILE (French)
```

---

*End of Update Instructions*
