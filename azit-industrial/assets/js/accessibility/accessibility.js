/**
 * AZIT Accessibility JavaScript Module
 * Implements RGAA 4.1.2 compliance features
 */

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

      switch (e.key) {
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
        switch (e.key) {
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

// Ensure ARIA live region exists
function ensureAriaLiveRegion() {
  if (!document.getElementById('aria-live-region')) {
    const liveRegion = document.createElement('div');
    liveRegion.id = 'aria-live-region';
    liveRegion.setAttribute('aria-live', 'polite');
    liveRegion.setAttribute('aria-atomic', 'true');
    document.body.insertBefore(liveRegion, document.body.firstChild);
  }
}

// Enhance existing navigation with keyboard support
function enhanceNavigation() {
  const navItems = document.querySelectorAll('.nav__item, .mega-menu__item');

  navItems.forEach(item => {
    const link = item.querySelector('a');
    const submenu = item.querySelector('.mega-menu, .dropdown-menu');

    if (link && submenu) {
      // Add ARIA attributes if not present
      if (!link.hasAttribute('aria-expanded')) {
        link.setAttribute('aria-expanded', 'false');
      }

      if (!link.hasAttribute('aria-haspopup')) {
        link.setAttribute('aria-haspopup', 'true');
      }

      // Handle hover/focus states
      item.addEventListener('mouseenter', () => {
        link.setAttribute('aria-expanded', 'true');
      });

      item.addEventListener('mouseleave', () => {
        link.setAttribute('aria-expanded', 'false');
      });

      link.addEventListener('focus', () => {
        link.setAttribute('aria-expanded', 'true');
      });

      // Close on escape
      item.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
          link.setAttribute('aria-expanded', 'false');
          link.focus();
        }
      });
    }
  });
}

// Add language information to language switcher
function enhanceLanguageSwitcher() {
  const langButtons = document.querySelectorAll('[data-lang]');

  langButtons.forEach(button => {
    const lang = button.getAttribute('data-lang');
    if (lang && !button.hasAttribute('hreflang')) {
      button.setAttribute('hreflang', lang);
    }
    if (lang && !button.hasAttribute('lang')) {
      button.setAttribute('lang', lang);
    }
  });

  // Add current language announcement
  const currentLang = document.documentElement.lang || 'en';
  const langName = currentLang === 'fr' ? 'French' : 'English';

  const langSwitcher = document.querySelector('.language-switcher, #language-switcher');
  if (langSwitcher && !langSwitcher.hasAttribute('aria-label')) {
    langSwitcher.setAttribute('aria-label', `Language selection. Current language: ${langName}`);
  }
}

// Initialize all accessibility features
document.addEventListener('DOMContentLoaded', () => {
  ensureAriaLiveRegion();
  initDropdownMenus();
  manageFocus();
  initFormAccessibility();
  enhanceNavigation();
  enhanceLanguageSwitcher();
});

// Export for use in other scripts
window.a11y = {
  announce,
  validateField
};
