# Claude Code Implementation Instructions - AZIT V7-RGAA Branch

## MISSION OVERVIEW

You are tasked with implementing RGAA 4.1.2 (French Web Accessibility Guidelines) compliance on the AZIT website. This involves updating the existing V7 codebase with comprehensive accessibility improvements to achieve at least 50% compliance (partial conformity) with the goal of reaching 100% (total conformity).

---

## STEP 1: CREATE BRANCH

```bash
# From the V7 branch
git checkout main  # or the V7 branch
git checkout -b V7-RGAA
```

---

## STEP 2: PROJECT SETUP

### 2.1 Create Directory Structure

```bash
# If not exists
mkdir -p src/pages/accessibility
mkdir -p src/components/accessibility
mkdir -p src/styles/accessibility
```

### 2.2 Add Accessibility Utilities

**Create:** `src/styles/accessibility/a11y-utils.css`

```css
/* Screen Reader Only - Hide visually but keep accessible to screen readers */
.sr-only {
  position: absolute !important;
  width: 1px !important;
  height: 1px !important;
  padding: 0 !important;
  margin: -1px !important;
  overflow: hidden !important;
  clip: rect(0, 0, 0, 0) !important;
  white-space: nowrap !important;
  border-width: 0 !important;
}

.sr-only-focusable:active,
.sr-only-focusable:focus {
  position: static !important;
  width: auto !important;
  height: auto !important;
  overflow: visible !important;
  clip: auto !important;
  white-space: normal !important;
}

/* Skip Link */
.skip-link {
  position: absolute;
  top: -40px;
  left: 0;
  background: #000;
  color: #fff;
  padding: 12px 16px;
  text-decoration: none;
  font-weight: 600;
  z-index: 9999;
  border-radius: 0 0 4px 0;
}

.skip-link:focus {
  top: 0;
}

/* Enhanced Focus Styles */
*:focus {
  outline: 3px solid #0e7490;
  outline-offset: 2px;
}

*:focus:not(:focus-visible) {
  outline: none;
}

*:focus-visible {
  outline: 3px solid #0e7490;
  outline-offset: 2px;
}

a:focus,
button:focus {
  outline: 3px solid #0e7490;
  outline-offset: 2px;
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}

/* High Contrast Mode Support */
@media (prefers-contrast: high) {
  * {
    border-color: currentColor !important;
  }
}

/* ARIA Live Region for Announcements */
#aria-live-region {
  position: absolute;
  left: -10000px;
  width: 1px;
  height: 1px;
  overflow: hidden;
}
```

---

## STEP 3: UPDATE BASE HTML TEMPLATE

### 3.1 Update HTML Structure

**Location:** Update all HTML files' base structure

```html
<!DOCTYPE html>
<html lang="fr"> <!-- Change to "en" for English pages -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Unique page title -->
  <title>Page Name - Section - AZIT</title>
  
  <!-- Meta description -->
  <meta name="description" content="Page specific description">
  
  <!-- Link to accessibility CSS -->
  <link rel="stylesheet" href="/styles/accessibility/a11y-utils.css">
  
  <!-- Other stylesheets -->
  <link rel="stylesheet" href="/styles/main.css">
</head>
<body>
  <!-- Skip Link - MUST BE FIRST -->
  <a href="#main-content" class="skip-link">
    Skip to main content
  </a>
  
  <!-- ARIA Live Region for Announcements -->
  <div id="aria-live-region" aria-live="polite" aria-atomic="true"></div>
  
  <!-- Top Navigation -->
  <nav aria-label="Company information and settings" class="top-nav">
    <ul>
      <li>
        <button aria-expanded="false" 
                aria-controls="company-menu"
                aria-haspopup="true"
                id="company-btn">
          Company
        </button>
        <ul id="company-menu" hidden>
          <li><a href="/company/about-azit">About AZIT</a></li>
          <li><a href="/company/about-isit">About ISIT</a></li>
          <li><a href="/company/team">Team</a></li>
          <li><a href="/company/careers">Careers</a></li>
          <li><a href="/company/contact">Contact</a></li>
        </ul>
      </li>
      <li><a href="/blog">Blog & News</a></li>
      <li>
        <!-- Language Switcher -->
        <button aria-label="Language selection. Current language: French"
                aria-expanded="false"
                aria-controls="lang-menu"
                id="lang-btn">
          <span aria-hidden="true">🌐</span>
          <span class="sr-only">Change language</span>
        </button>
        <ul id="lang-menu" hidden>
          <li><a href="/" lang="en" hreflang="en">English</a></li>
          <li><a href="/fr/" lang="fr" hreflang="fr" aria-current="page">Français</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  
  <!-- Header -->
  <header role="banner">
    <div class="header-container">
      <!-- Logo -->
      <a href="/" aria-label="AZIT Homepage">
        <img src="/images/logo.svg" alt="AZIT" width="120" height="40" />
      </a>
      
      <!-- Main Navigation -->
      <nav aria-label="Main navigation">
        <ul>
          <li>
            <button aria-expanded="false" 
                    aria-controls="products-menu"
                    aria-haspopup="true">
              Products
            </button>
            <ul id="products-menu" hidden>
              <li><a href="/products/stacks">Protocol Stacks</a></li>
              <li><a href="/products/tools">Development Tools</a></li>
              <!-- More items -->
            </ul>
          </li>
          <li>
            <button aria-expanded="false" 
                    aria-controls="solutions-menu"
                    aria-haspopup="true">
              Solutions
            </button>
            <ul id="solutions-menu" hidden>
              <!-- Solution items -->
            </ul>
          </li>
          <li>
            <button aria-expanded="false" 
                    aria-controls="industries-menu"
                    aria-haspopup="true">
              Industries
            </button>
            <ul id="industries-menu" hidden>
              <!-- Industry items -->
            </ul>
          </li>
          <li>
            <a href="/expertise" aria-current="page">Expertise</a>
          </li>
          <li>
            <a href="/training">Training</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  
  <!-- Main Content -->
  <main id="main-content" role="main" tabindex="-1">
    <h1>Page Title Here</h1>
    
    <!-- Page content -->
    
  </main>
  
  <!-- Footer -->
  <footer role="contentinfo">
    <div class="footer-container">
      <!-- Footer content -->
      
      <!-- Footer Navigation -->
      <nav aria-label="Footer links">
        <ul>
          <li><a href="/legal">Legal Mentions</a></li>
          <li><a href="/privacy">Privacy Policy</a></li>
          <li><a href="/sitemap">Site Map</a></li>
          <li><a href="/accessibilite">Accessibility</a></li>
        </ul>
      </nav>
      
      <!-- Accessibility Badge -->
      <p>
        <a href="/accessibilite">
          Accessibilité : partiellement conforme
        </a>
      </p>
    </div>
  </footer>
  
  <!-- JavaScript -->
  <script src="/js/accessibility.js"></script>
  <script src="/js/main.js"></script>
</body>
</html>
```

---

## STEP 4: CREATE ACCESSIBILITY JAVASCRIPT

**Create:** `src/js/accessibility.js`

```javascript
// Dropdown Menu Accessibility
function initDropdownMenus() {
  const dropdownButtons = document.querySelectorAll('[aria-haspopup="true"]');
  
  dropdownButtons.forEach(button => {
    const menuId = button.getAttribute('aria-controls');
    const menu = document.getElementById(menuId);
    
    if (!menu) return;
    
    // Toggle on click
    button.addEventListener('click', (e) => {
      e.stopPropagation();
      const isExpanded = button.getAttribute('aria-expanded') === 'true';
      
      // Close all other menus
      closeAllDropdowns();
      
      if (!isExpanded) {
        button.setAttribute('aria-expanded', 'true');
        menu.hidden = false;
        
        // Focus first link
        const firstLink = menu.querySelector('a');
        if (firstLink) firstLink.focus();
      }
    });
    
    // Keyboard navigation
    button.addEventListener('keydown', (e) => {
      const isExpanded = button.getAttribute('aria-expanded') === 'true';
      
      switch(e.key) {
        case 'Enter':
        case ' ':
          e.preventDefault();
          button.click();
          break;
        case 'Escape':
          if (isExpanded) {
            closeDropdown(button, menu);
          }
          break;
        case 'ArrowDown':
          if (isExpanded) {
            e.preventDefault();
            const firstLink = menu.querySelector('a');
            if (firstLink) firstLink.focus();
          }
          break;
      }
    });
    
    // Menu keyboard navigation
    const menuLinks = menu.querySelectorAll('a');
    menuLinks.forEach((link, index) => {
      link.addEventListener('keydown', (e) => {
        switch(e.key) {
          case 'Escape':
            e.preventDefault();
            closeDropdown(button, menu);
            button.focus();
            break;
          case 'ArrowDown':
            e.preventDefault();
            const nextLink = menuLinks[index + 1];
            if (nextLink) nextLink.focus();
            break;
          case 'ArrowUp':
            e.preventDefault();
            if (index === 0) {
              button.focus();
            } else {
              menuLinks[index - 1].focus();
            }
            break;
        }
      });
    });
  });
  
  // Close dropdowns on outside click
  document.addEventListener('click', (e) => {
    if (!e.target.closest('[aria-haspopup="true"]')) {
      closeAllDropdowns();
    }
  });
  
  function closeDropdown(button, menu) {
    button.setAttribute('aria-expanded', 'false');
    menu.hidden = true;
  }
  
  function closeAllDropdowns() {
    dropdownButtons.forEach(btn => {
      const menuId = btn.getAttribute('aria-controls');
      const menu = document.getElementById(menuId);
      if (menu) {
        closeDropdown(btn, menu);
      }
    });
  }
}

// ARIA Live Announcer
function announce(message, priority = 'polite') {
  const announcer = document.getElementById('aria-live-region');
  if (announcer) {
    announcer.setAttribute('aria-live', priority);
    announcer.textContent = message;
    
    setTimeout(() => {
      announcer.textContent = '';
    }, 1000);
  }
}

// Focus Management
function manageFocus() {
  // Skip link functionality
  const skipLink = document.querySelector('.skip-link');
  const mainContent = document.getElementById('main-content');
  
  if (skipLink && mainContent) {
    skipLink.addEventListener('click', (e) => {
      e.preventDefault();
      mainContent.focus();
      mainContent.scrollIntoView({ behavior: 'smooth' });
    });
  }
  
  // Ensure main content is focusable
  if (mainContent && !mainContent.hasAttribute('tabindex')) {
    mainContent.setAttribute('tabindex', '-1');
  }
}

// Form Validation Announcements
function initFormAccessibility() {
  const forms = document.querySelectorAll('form');
  
  forms.forEach(form => {
    form.addEventListener('submit', (e) => {
      // Check for validation errors
      const invalidFields = form.querySelectorAll('[aria-invalid="true"]');
      
      if (invalidFields.length > 0) {
        e.preventDefault();
        
        // Announce error count
        announce(
          `Form contains ${invalidFields.length} error${invalidFields.length > 1 ? 's' : ''}. Please correct the errors before submitting.`,
          'assertive'
        );
        
        // Focus first invalid field
        invalidFields[0].focus();
      }
    });
    
    // Real-time validation
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
      input.addEventListener('blur', () => {
        validateField(input);
      });
    });
  });
}

function validateField(field) {
  const isValid = field.checkValidity();
  field.setAttribute('aria-invalid', !isValid);
  
  // Get or create error message container
  let errorId = field.getAttribute('aria-describedby');
  let errorContainer = errorId ? document.getElementById(errorId) : null;
  
  if (!isValid) {
    if (!errorContainer) {
      errorId = `${field.id}-error`;
      errorContainer = document.createElement('span');
      errorContainer.id = errorId;
      errorContainer.className = 'error-message';
      errorContainer.setAttribute('role', 'alert');
      field.setAttribute('aria-describedby', errorId);
      field.parentNode.appendChild(errorContainer);
    }
    
    errorContainer.textContent = field.validationMessage;
  } else if (errorContainer) {
    errorContainer.textContent = '';
  }
}

// Initialize all accessibility features
document.addEventListener('DOMContentLoaded', () => {
  initDropdownMenus();
  manageFocus();
  initFormAccessibility();
  
  // Announce page load for dynamic content
  // announce('Page loaded');
});

// Export for use in other scripts
window.a11y = {
  announce,
  validateField
};
```

---

## STEP 5: UPDATE EXPERTISE PAGE

**File:** `src/pages/expertise/index.html` (or equivalent)

```html
<main id="main-content" role="main" tabindex="-1">
  <!-- Page Header -->
  <section class="expertise-header" aria-labelledby="expertise-title">
    <h1 id="expertise-title">Our Expertise</h1>
    <p class="subtitle">
      Leveraging 30+ years of industrial communication experience to deliver 
      comprehensive solutions
    </p>
  </section>
  
  <!-- Expertise Cards -->
  <section class="expertise-cards" aria-label="Expertise areas">
    
    <!-- Card 1: Safety Compliance -->
    <article class="expertise-card" aria-labelledby="safety-title">
      <div class="expertise-content">
        <h2 id="safety-title">Safety Compliance</h2>
        <p>
          AZIT provides comprehensive safety compliance consulting to help you 
          navigate complex certification requirements. From gap analysis to 
          documentation support, we guide you through IEC 61508, ISO 26262, 
          and other functional safety standards.
        </p>
        <a href="/expertise/safety-compliance" 
           aria-labelledby="safety-link safety-title">
          <span id="safety-link">Learn more</span>
          <span aria-hidden="true"> →</span>
          <span class="sr-only"> about Safety Compliance services</span>
        </a>
      </div>
      <div class="expertise-illustration" aria-hidden="true">
        <img src="/images/expertise/safety-compliance.svg" 
             alt="" 
             role="presentation" />
      </div>
    </article>
    
    <!-- Card 2: Protocol Development -->
    <article class="expertise-card" aria-labelledby="protocol-title">
      <div class="expertise-content">
        <h2 id="protocol-title">Protocol Development</h2>
        <p>
          Our expert team develops custom protocol implementations tailored to 
          your specific requirements. Whether you need modifications to existing 
          stacks or entirely new protocol solutions, we deliver production-ready, 
          certifiable code.
        </p>
        <a href="/expertise/protocol-development" 
           aria-labelledby="protocol-link protocol-title">
          <span id="protocol-link">Learn more</span>
          <span aria-hidden="true"> →</span>
          <span class="sr-only"> about Protocol Development services</span>
        </a>
      </div>
      <div class="expertise-illustration" aria-hidden="true">
        <img src="/images/expertise/protocol-development.svg" 
             alt="" 
             role="presentation" />
      </div>
    </article>
    
    <!-- Card 3: Testing & Validation -->
    <article class="expertise-card" aria-labelledby="testing-title">
      <div class="expertise-content">
        <h2 id="testing-title">Testing & Validation</h2>
        <p>
          Ensure your implementations meet the highest quality standards with our 
          comprehensive testing and validation services. We provide conformance 
          testing, interoperability validation, and performance analysis for 
          industrial communication protocols.
        </p>
        <a href="/expertise/testing-validation" 
           aria-labelledby="testing-link testing-title">
          <span id="testing-link">Learn more</span>
          <span aria-hidden="true"> →</span>
          <span class="sr-only"> about Testing & Validation services</span>
        </a>
      </div>
      <div class="expertise-illustration" aria-hidden="true">
        <img src="/images/expertise/testing-validation.svg" 
             alt="" 
             role="presentation" />
      </div>
    </article>
    
    <!-- Card 4: Industrial Networks -->
    <article class="expertise-card" aria-labelledby="networks-title">
      <div class="expertise-content">
        <h2 id="networks-title">Industrial Networks</h2>
        <p>
          AZIT brings you tailored solutions based on field communication protocols. 
          With 30+ years of expertise in CAN, CANopen, EtherCAT, and other industrial 
          networks, we help you design, implement, and optimize your communication 
          architecture.
        </p>
        <a href="/expertise/industrial-networks" 
           aria-labelledby="networks-link networks-title">
          <span id="networks-link">Learn more</span>
          <span aria-hidden="true"> →</span>
          <span class="sr-only"> about Industrial Networks solutions</span>
        </a>
      </div>
      <div class="expertise-illustration" aria-hidden="true">
        <img src="/images/expertise/industrial-networks.svg" 
             alt="" 
             role="presentation" />
      </div>
    </article>
    
  </section>
</main>
```

---

## STEP 6: CREATE ACCESSIBILITY STATEMENT PAGE

**Create:** `src/pages/accessibilite/index.html`

```html
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Déclaration d'Accessibilité - AZIT</title>
  <link rel="stylesheet" href="/styles/main.css">
  <link rel="stylesheet" href="/styles/accessibility/a11y-utils.css">
</head>
<body>
  <a href="#main-content" class="skip-link">Aller au contenu principal</a>
  
  <!-- Include header -->
  
  <main id="main-content" role="main" tabindex="-1">
    <article class="accessibility-statement">
      <h1>Déclaration d'Accessibilité</h1>
      
      <p>
        AZIT s'engage à rendre son site internet accessible conformément à 
        l'article 47 de la loi n° 2005-102 du 11 février 2005.
      </p>
      
      <p>
        Cette déclaration d'accessibilité s'applique au site 
        <a href="https://www.azit.com">www.azit.com</a>.
      </p>
      
      <h2>État de conformité</h2>
      
      <p>
        Le site <a href="https://www.azit.com">www.azit.com</a> est en 
        <strong>conformité partielle</strong> avec le référentiel général 
        d'amélioration de l'accessibilité (RGAA) version 4.1.2, en raison 
        des non-conformités et des dérogations énumérées ci-dessous.
      </p>
      
      <h2>Résultats des tests</h2>
      
      <p>
        L'audit de conformité réalisé le [date à compléter] révèle que :
      </p>
      
      <ul>
        <li>[XX]% des critères du RGAA version 4.1.2 sont respectés.</li>
        <li>Le taux moyen de conformité du service en ligne est de [XX]%.</li>
      </ul>
      
      <h2>Contenus non accessibles</h2>
      
      <p>
        Les contenus listés ci-dessous ne sont pas accessibles pour les 
        raisons suivantes :
      </p>
      
      <h3>Non-conformités</h3>
      
      <p>[Liste des critères non conformes - à compléter après audit]</p>
      
      <h3>Contenus exemptés</h3>
      
      <p>
        Aucun contenu n'est exempté de l'obligation d'accessibilité.
      </p>
      
      <h3>Dérogations pour charge disproportionnée</h3>
      
      <p>
        Aucune dérogation pour charge disproportionnée n'a été déclarée.
      </p>
      
      <h2>Établissement de cette déclaration d'accessibilité</h2>
      
      <p>
        Cette déclaration a été établie le [date à compléter].
      </p>
      
      <h3>Technologies utilisées</h3>
      
      <ul>
        <li>HTML5</li>
        <li>CSS3</li>
        <li>JavaScript</li>
      </ul>
      
      <h3>Agents utilisateurs et technologies d'assistance</h3>
      
      <p>
        Les tests ont été effectués avec les combinaisons suivantes :
      </p>
      
      <ul>
        <li>NVDA 2023 / Firefox / Windows 11</li>
        <li>JAWS 2023 / Chrome / Windows 11</li>
        <li>VoiceOver / Safari / macOS Sonoma</li>
      </ul>
      
      <h3>Outils pour évaluer l'accessibilité</h3>
      
      <ul>
        <li>WAVE (Web Accessibility Evaluation Tool)</li>
        <li>axe DevTools</li>
        <li>Contrast Checker</li>
        <li>Validateur HTML W3C</li>
      </ul>
      
      <h2>Retour d'information et contact</h2>
      
      <p>
        Si vous n'arrivez pas à accéder à un contenu ou à un service, vous 
        pouvez contacter le responsable du site internet pour être orienté 
        vers une alternative accessible ou obtenir le contenu sous une autre forme.
      </p>
      
      <ul>
        <li>
          Envoyer un message : 
          <a href="mailto:accessibility@azit.com">accessibility@azit.com</a>
        </li>
        <li>
          Contacter AZIT : 
          <a href="/contact">Formulaire de contact</a>
        </li>
      </ul>
      
      <h2>Voies de recours</h2>
      
      <p>
        Cette procédure est à utiliser dans le cas suivant : vous avez signalé 
        au responsable du site internet un défaut d'accessibilité qui vous 
        empêche d'accéder à un contenu ou à un des services du portail et vous 
        n'avez pas obtenu de réponse satisfaisante.
      </p>
      
      <p>Vous pouvez :</p>
      
      <ul>
        <li>
          Écrire un message au 
          <a href="https://formulaire.defenseurdesdroits.fr/">Défenseur des droits</a>
        </li>
        <li>
          Contacter 
          <a href="https://www.defenseurdesdroits.fr/saisir/delegues">
            le délégué du Défenseur des droits dans votre région
          </a>
        </li>
        <li>
          Envoyer un courrier par la poste (gratuit, ne pas mettre de timbre) :<br>
          Défenseur des droits<br>
          Libre réponse 71120<br>
          75342 Paris CEDEX 07
        </li>
      </ul>
      
    </article>
  </main>
  
  <!-- Include footer -->
  
  <script src="/js/accessibility.js"></script>
</body>
</html>
```

---

## STEP 7: CREATE SITE MAP PAGE

**Create:** `src/pages/sitemap/index.html`

```html
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plan du Site - AZIT</title>
  <link rel="stylesheet" href="/styles/main.css">
</head>
<body>
  <a href="#main-content" class="skip-link">Aller au contenu principal</a>
  
  <!-- Include header -->
  
  <main id="main-content" role="main" tabindex="-1">
    <h1>Plan du Site</h1>
    
    <nav aria-label="Plan du site">
      <ul>
        <li>
          <a href="/">Accueil</a>
        </li>
        
        <li>
          <strong>Entreprise</strong>
          <ul>
            <li><a href="/company/about-azit">À propos d'AZIT</a></li>
            <li><a href="/company/about-isit">À propos d'ISIT</a></li>
            <li><a href="/company/team">Équipe</a></li>
            <li><a href="/company/careers">Carrières</a></li>
            <li><a href="/company/contact">Contact</a></li>
          </ul>
        </li>
        
        <li>
          <strong>Produits</strong>
          <ul>
            <li><a href="/products">Vue d'ensemble</a></li>
            <li><a href="/products/stacks">Piles de Protocoles</a></li>
            <li><a href="/products/tools">Outils de Développement</a></li>
          </ul>
        </li>
        
        <li>
          <strong>Solutions</strong>
          <ul>
            <li><a href="/solutions">Vue d'ensemble</a></li>
            <!-- Add solution pages -->
          </ul>
        </li>
        
        <li>
          <strong>Secteurs</strong>
          <ul>
            <li><a href="/industries">Vue d'ensemble</a></li>
            <!-- Add industry pages -->
          </ul>
        </li>
        
        <li>
          <strong>Expertise</strong>
          <ul>
            <li><a href="/expertise">Vue d'ensemble</a></li>
            <li><a href="/expertise/safety-compliance">Conformité Sécurité</a></li>
            <li><a href="/expertise/protocol-development">Développement Protocole</a></li>
            <li><a href="/expertise/testing-validation">Test & Validation</a></li>
            <li><a href="/expertise/industrial-networks">Réseaux Industriels</a></li>
          </ul>
        </li>
        
        <li>
          <a href="/training">Formation</a>
        </li>
        
        <li>
          <a href="/blog">Blog & Actualités</a>
        </li>
        
        <li>
          <strong>Informations Légales</strong>
          <ul>
            <li><a href="/legal">Mentions Légales</a></li>
            <li><a href="/privacy">Politique de Confidentialité</a></li>
            <li><a href="/accessibilite">Accessibilité</a></li>
            <li><a href="/sitemap">Plan du Site</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </main>
  
  <!-- Include footer -->
  
  <script src="/js/accessibility.js"></script>
</body>
</html>
```

---

## STEP 8: UPDATE COLOR CONTRAST IN CSS

**File:** Update `src/styles/main.css` or component stylesheets

```css
/* Update link colors for better contrast */
a {
  color: #0e7490; /* 4.6:1 contrast ratio on white */
  text-decoration: underline;
}

a:hover {
  color: #0c6478;
  text-decoration: none;
}

/* Secondary text color update */
.text-secondary {
  color: #475569; /* 4.7:1 contrast ratio */
}

/* Button styles with sufficient contrast */
.btn-primary {
  background-color: #0e7490;
  color: #ffffff;
  border: 2px solid #0e7490;
  padding: 12px 24px;
  font-weight: 600;
}

.btn-primary:hover {
  background-color: #0c6478;
  border-color: #0c6478;
}

.btn-primary:focus {
  outline: 3px solid #0e7490;
  outline-offset: 2px;
}

/* Form elements */
.form-control {
  border: 2px solid #475569; /* 4.7:1 contrast */
  padding: 10px 12px;
  font-size: 1rem;
}

.form-control:focus {
  border-color: #0e7490;
  outline: 3px solid #0e7490;
  outline-offset: 0;
}

/* Error messages */
.error-message {
  color: #dc2626; /* Sufficient contrast for error text */
  font-size: 0.875rem;
  margin-top: 0.25rem;
  display: block;
}

.form-control[aria-invalid="true"] {
  border-color: #dc2626;
}
```

---

## STEP 9: UPDATE IMAGE ALT TEXTS

**Task:** Go through ALL images and add appropriate alt text

### Homepage Hero Images
```html
<img src="/images/hero.jpg" 
     alt="Industrial automation system with multiple connected devices communicating via CAN and EtherCAT protocols" />
```

### Expertise Illustrations
```html
<!-- Safety Compliance -->
<img src="/images/expertise/safety-compliance.svg" 
     alt="Safety certification process diagram showing IEC 61508 and ISO 26262 compliance layers" />

<!-- Protocol Development -->
<img src="/images/expertise/protocol-development.svg" 
     alt="Protocol stack architecture with application, protocol, and hardware layers" />

<!-- Testing & Validation -->
<img src="/images/expertise/testing-validation.svg" 
     alt="Testing workflow showing conformance testing, validation, and performance analysis stages" />

<!-- Industrial Networks -->
<img src="/images/expertise/industrial-networks.svg" 
     alt="Industrial network topology diagram with CAN, CANopen, and EtherCAT connections" />
```

### Decorative Images
```html
<!-- Background patterns, decorative icons -->
<img src="/images/pattern.svg" alt="" role="presentation" />
```

### Partner Logos
```html
<img src="/images/partners/partner-name.png" 
     alt="Partner Name logo" 
     width="120" 
     height="60" />
```

---

## STEP 10: CREATE FORMS WITH FULL ACCESSIBILITY

**Example Contact Form:**

```html
<form action="/submit-contact" method="POST" novalidate>
  <h2>Contact Us</h2>
  
  <p class="required-legend">
    Fields marked with <abbr title="required" aria-label="required">*</abbr> are required.
  </p>
  
  <div class="form-group">
    <label for="name">
      Full Name <abbr title="required" aria-label="required">*</abbr>
    </label>
    <input type="text" 
           id="name" 
           name="name" 
           required 
           aria-required="true"
           autocomplete="name" />
  </div>
  
  <div class="form-group">
    <label for="email">
      Email Address <abbr title="required" aria-label="required">*</abbr>
      <span class="hint">(format: you@domain.com)</span>
    </label>
    <input type="email" 
           id="email" 
           name="email" 
           required 
           aria-required="true"
           aria-describedby="email-hint"
           autocomplete="email" />
    <span id="email-hint" class="hint">
      We'll never share your email with third parties.
    </span>
  </div>
  
  <div class="form-group">
    <label for="company">
      Company Name
    </label>
    <input type="text" 
           id="company" 
           name="company"
           autocomplete="organization" />
  </div>
  
  <div class="form-group">
    <label for="phone">
      Phone Number
    </label>
    <input type="tel" 
           id="phone" 
           name="phone"
           placeholder="+33 1 23 45 67 89"
           aria-describedby="phone-hint"
           autocomplete="tel" />
    <span id="phone-hint" class="hint">
      Format: +33 1 23 45 67 89
    </span>
  </div>
  
  <fieldset>
    <legend>Subject <abbr title="required" aria-label="required">*</abbr></legend>
    
    <div class="radio-group">
      <input type="radio" 
             id="subject-product" 
             name="subject" 
             value="product" 
             required
             aria-required="true" />
      <label for="subject-product">Product Inquiry</label>
    </div>
    
    <div class="radio-group">
      <input type="radio" 
             id="subject-support" 
             name="subject" 
             value="support" />
      <label for="subject-support">Technical Support</label>
    </div>
    
    <div class="radio-group">
      <input type="radio" 
             id="subject-training" 
             name="subject" 
             value="training" />
      <label for="subject-training">Training Information</label>
    </div>
    
    <div class="radio-group">
      <input type="radio" 
             id="subject-other" 
             name="subject" 
             value="other" />
      <label for="subject-other">Other</label>
    </div>
  </fieldset>
  
  <div class="form-group">
    <label for="message">
      Message <abbr title="required" aria-label="required">*</abbr>
    </label>
    <textarea id="message" 
              name="message" 
              rows="5" 
              required 
              aria-required="true"></textarea>
  </div>
  
  <div class="form-actions">
    <button type="submit" class="btn-primary">
      Send Message
    </button>
    <button type="reset" class="btn-secondary">
      Reset Form
    </button>
  </div>
</form>
```

---

## STEP 11: TESTING CHECKLIST

### Automated Testing
- [ ] Run HTML validator on all pages
- [ ] Run axe DevTools on all pages
- [ ] Run WAVE on all pages
- [ ] Check Lighthouse accessibility score

### Manual Testing
- [ ] Tab through entire site (keyboard only)
- [ ] Test all dropdowns with keyboard
- [ ] Test forms with keyboard
- [ ] Verify skip links work
- [ ] Check focus indicators visible
- [ ] Test with NVDA screen reader
- [ ] Test with high contrast mode
- [ ] Test at 200% zoom
- [ ] Test at 320px width

### Color/Contrast
- [ ] Check all text colors meet 4.5:1 ratio
- [ ] Check all UI components meet 3:1 ratio
- [ ] Test in grayscale
- [ ] Test with color blindness simulator

---

## STEP 12: COMMIT AND PUSH

```bash
git add .
git commit -m "feat: implement RGAA 4.1.2 accessibility compliance (V7-RGAA)

Major changes:
- Add accessibility statement page
- Add site map page
- Implement skip links and ARIA landmarks
- Update color contrast ratios
- Add comprehensive keyboard navigation
- Implement dropdown menu accessibility
- Add form validation and error handling
- Update all image alt texts
- Add focus management
- Implement ARIA live regions
- Create accessibility utilities CSS
- Add accessibility JavaScript module

Target: RGAA 4.1.2 partial compliance (≥50% criteria)"

git push origin V7-RGAA
```

---

## PRIORITY ORDER

1. **Critical (Do First)**
   - Skip links
   - Language declarations
   - ARIA landmarks
   - Heading hierarchy
   - Form labels

2. **High Priority**
   - Image alt texts
   - Color contrast
   - Keyboard navigation
   - Focus indicators

3. **Medium Priority**
   - Accessibility statement page
   - Site map
   - Dropdown accessibility
   - Link clarity

4. **Enhancement**
   - Screen reader testing refinements
   - Advanced ARIA patterns
   - Performance optimization

---

## SUCCESS CRITERIA

✓ All HTML validates  
✓ axe DevTools shows 0 critical issues  
✓ WAVE shows no errors  
✓ All pages navigable by keyboard  
✓ Screen reader can access all content  
✓ Color contrast meets WCAG AA  
✓ Forms are fully accessible  
✓ Accessibility statement published  

---

## NOTES

- Test frequently as you implement
- Run automated checks after each section
- Document any issues or blockers
- Keep accessibility top of mind for all new features
- This is an iterative process - start with critical items

---

## RESOURCES

- RGAA 4.1.2 Official: https://accessibilite.numerique.gouv.fr/
- WCAG 2.1: https://www.w3.org/WAI/WCAG21/quickref/
- ARIA Practices: https://www.w3.org/WAI/ARIA/apg/
- WebAIM: https://webaim.org/

---

**END OF IMPLEMENTATION INSTRUCTIONS**