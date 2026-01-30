/**
 * AZIT Industrial - Keyboard Navigation
 * RGAA 4.1.2 Accessibility JavaScript
 *
 * Handles:
 * - Dropdown menu keyboard navigation
 * - Mobile menu toggle
 * - Language switcher
 * - Focus management
 * - Skip link functionality
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

(function() {
    'use strict';

    /**
     * ==========================================================================
     * UTILITY FUNCTIONS
     * ==========================================================================
     */

    /**
     * Debounce function to limit rate of execution
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func.apply(this, args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Announce message to screen readers
     */
    function announceToScreenReader(message, priority) {
        priority = priority || 'polite';
        const regionId = priority === 'assertive' ? 'aria-live-assertive' : 'aria-live-region';
        const region = document.getElementById(regionId);

        if (region) {
            region.textContent = message;
            setTimeout(() => {
                region.textContent = '';
            }, 1000);
        }
    }

    /**
     * Trap focus within an element
     */
    function trapFocus(element) {
        const focusableElements = element.querySelectorAll(
            'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])'
        );

        if (focusableElements.length === 0) return;

        const firstFocusable = focusableElements[0];
        const lastFocusable = focusableElements[focusableElements.length - 1];

        element.addEventListener('keydown', function(e) {
            if (e.key !== 'Tab') return;

            if (e.shiftKey) {
                if (document.activeElement === firstFocusable) {
                    lastFocusable.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === lastFocusable) {
                    firstFocusable.focus();
                    e.preventDefault();
                }
            }
        });
    }

    /**
     * ==========================================================================
     * DROPDOWN MENU NAVIGATION
     * ==========================================================================
     */

    function initDropdownNavigation() {
        const menuItems = document.querySelectorAll('.menu-item-has-children');

        menuItems.forEach(function(menuItem) {
            const link = menuItem.querySelector('a');
            const submenu = menuItem.querySelector('.sub-menu');

            if (!link || !submenu) return;

            // Set initial ARIA states
            link.setAttribute('aria-expanded', 'false');
            link.setAttribute('aria-haspopup', 'true');
            submenu.setAttribute('hidden', '');

            // Handle click/Enter to toggle dropdown
            link.addEventListener('click', function(e) {
                // Only prevent default if it's a parent menu item
                if (submenu) {
                    e.preventDefault();
                    toggleDropdown(menuItem, link, submenu);
                }
            });

            // Handle keyboard navigation
            link.addEventListener('keydown', function(e) {
                handleDropdownKeydown(e, menuItem, link, submenu);
            });

            // Handle mouse hover (with delay for accessibility)
            let hoverTimeout;

            menuItem.addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout);
                hoverTimeout = setTimeout(function() {
                    openDropdown(link, submenu);
                }, 150);
            });

            menuItem.addEventListener('mouseleave', function() {
                clearTimeout(hoverTimeout);
                hoverTimeout = setTimeout(function() {
                    closeDropdown(link, submenu);
                }, 300);
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.menu-item-has-children')) {
                closeAllDropdowns();
            }
        });

        // Close dropdowns on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAllDropdowns();
            }
        });
    }

    function toggleDropdown(menuItem, link, submenu) {
        const isExpanded = link.getAttribute('aria-expanded') === 'true';

        if (isExpanded) {
            closeDropdown(link, submenu);
        } else {
            // Close other dropdowns first
            closeAllDropdowns();
            openDropdown(link, submenu);
        }
    }

    function openDropdown(link, submenu) {
        link.setAttribute('aria-expanded', 'true');
        submenu.removeAttribute('hidden');
    }

    function closeDropdown(link, submenu) {
        link.setAttribute('aria-expanded', 'false');
        submenu.setAttribute('hidden', '');
    }

    function closeAllDropdowns() {
        const expandedMenus = document.querySelectorAll('[aria-expanded="true"]');
        expandedMenus.forEach(function(link) {
            const submenu = link.nextElementSibling;
            if (submenu && submenu.classList.contains('sub-menu')) {
                closeDropdown(link, submenu);
            }
        });
    }

    function handleDropdownKeydown(e, menuItem, link, submenu) {
        const isExpanded = link.getAttribute('aria-expanded') === 'true';
        const submenuLinks = submenu.querySelectorAll('a');

        switch (e.key) {
            case 'Enter':
            case ' ':
                e.preventDefault();
                toggleDropdown(menuItem, link, submenu);
                if (link.getAttribute('aria-expanded') === 'true' && submenuLinks.length > 0) {
                    submenuLinks[0].focus();
                }
                break;

            case 'ArrowDown':
                e.preventDefault();
                if (!isExpanded) {
                    openDropdown(link, submenu);
                }
                if (submenuLinks.length > 0) {
                    submenuLinks[0].focus();
                }
                break;

            case 'ArrowUp':
                e.preventDefault();
                if (isExpanded && submenuLinks.length > 0) {
                    submenuLinks[submenuLinks.length - 1].focus();
                }
                break;

            case 'Escape':
                if (isExpanded) {
                    closeDropdown(link, submenu);
                    link.focus();
                }
                break;
        }
    }

    /**
     * ==========================================================================
     * MOBILE MENU
     * ==========================================================================
     */

    function initMobileMenu() {
        const toggleButton = document.getElementById('mobile-menu-toggle');
        const mobileNav = document.getElementById('mobile-navigation');

        if (!toggleButton || !mobileNav) return;

        toggleButton.addEventListener('click', function() {
            const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';

            if (isExpanded) {
                closeMobileMenu(toggleButton, mobileNav);
            } else {
                openMobileMenu(toggleButton, mobileNav);
            }
        });

        // Close on Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && toggleButton.getAttribute('aria-expanded') === 'true') {
                closeMobileMenu(toggleButton, mobileNav);
                toggleButton.focus();
            }
        });

        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileNav.contains(e.target) && !toggleButton.contains(e.target)) {
                if (toggleButton.getAttribute('aria-expanded') === 'true') {
                    closeMobileMenu(toggleButton, mobileNav);
                }
            }
        });

        // Handle resize - close mobile menu on desktop
        const handleResize = debounce(function() {
            if (window.innerWidth >= 1024 && toggleButton.getAttribute('aria-expanded') === 'true') {
                closeMobileMenu(toggleButton, mobileNav);
            }
        }, 150);

        window.addEventListener('resize', handleResize);
    }

    function openMobileMenu(button, menu) {
        button.setAttribute('aria-expanded', 'true');
        button.setAttribute('aria-label', azit_vars?.i18n?.menu_close || 'Close menu');
        menu.removeAttribute('hidden');

        // Trap focus within mobile menu
        trapFocus(menu);

        // Focus first menu item
        const firstLink = menu.querySelector('a');
        if (firstLink) {
            firstLink.focus();
        }

        // Announce to screen readers
        announceToScreenReader('Menu opened');
    }

    function closeMobileMenu(button, menu) {
        button.setAttribute('aria-expanded', 'false');
        button.setAttribute('aria-label', azit_vars?.i18n?.menu_open || 'Open menu');
        menu.setAttribute('hidden', '');

        // Announce to screen readers
        announceToScreenReader('Menu closed');
    }

    /**
     * ==========================================================================
     * LANGUAGE SWITCHER
     * ==========================================================================
     */

    function initLanguageSwitcher() {
        const langToggle = document.getElementById('language-toggle');
        const langMenu = document.getElementById('language-menu');

        if (!langToggle || !langMenu) return;

        langToggle.addEventListener('click', function() {
            const isExpanded = langToggle.getAttribute('aria-expanded') === 'true';

            if (isExpanded) {
                closeLanguageMenu(langToggle, langMenu);
            } else {
                openLanguageMenu(langToggle, langMenu);
            }
        });

        // Keyboard navigation
        langToggle.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowDown' || e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openLanguageMenu(langToggle, langMenu);
                const firstItem = langMenu.querySelector('a');
                if (firstItem) firstItem.focus();
            }
        });

        // Navigate within menu
        langMenu.addEventListener('keydown', function(e) {
            const items = langMenu.querySelectorAll('a');
            const currentIndex = Array.from(items).indexOf(document.activeElement);

            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    if (currentIndex < items.length - 1) {
                        items[currentIndex + 1].focus();
                    } else {
                        items[0].focus();
                    }
                    break;

                case 'ArrowUp':
                    e.preventDefault();
                    if (currentIndex > 0) {
                        items[currentIndex - 1].focus();
                    } else {
                        items[items.length - 1].focus();
                    }
                    break;

                case 'Escape':
                    closeLanguageMenu(langToggle, langMenu);
                    langToggle.focus();
                    break;

                case 'Tab':
                    closeLanguageMenu(langToggle, langMenu);
                    break;
            }
        });

        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (!langToggle.contains(e.target) && !langMenu.contains(e.target)) {
                closeLanguageMenu(langToggle, langMenu);
            }
        });
    }

    function openLanguageMenu(button, menu) {
        button.setAttribute('aria-expanded', 'true');
        menu.removeAttribute('hidden');
    }

    function closeLanguageMenu(button, menu) {
        button.setAttribute('aria-expanded', 'false');
        menu.setAttribute('hidden', '');
    }

    /**
     * ==========================================================================
     * SKIP LINK FUNCTIONALITY
     * ==========================================================================
     */

    function initSkipLink() {
        const skipLink = document.querySelector('.skip-link');
        const mainContent = document.getElementById('main-content');

        if (!skipLink || !mainContent) return;

        skipLink.addEventListener('click', function(e) {
            e.preventDefault();

            // Ensure main content is focusable
            if (!mainContent.hasAttribute('tabindex')) {
                mainContent.setAttribute('tabindex', '-1');
            }

            // Focus main content
            mainContent.focus();

            // Scroll into view
            mainContent.scrollIntoView({ behavior: 'smooth', block: 'start' });

            // Announce to screen readers
            announceToScreenReader('Skipped to main content');
        });
    }

    /**
     * ==========================================================================
     * BACK TO TOP BUTTON
     * ==========================================================================
     */

    function initBackToTop() {
        const backToTop = document.getElementById('back-to-top');

        if (!backToTop) return;

        // Show/hide based on scroll position
        const toggleVisibility = debounce(function() {
            if (window.scrollY > 300) {
                backToTop.removeAttribute('hidden');
            } else {
                backToTop.setAttribute('hidden', '');
            }
        }, 100);

        window.addEventListener('scroll', toggleVisibility);

        // Handle click
        backToTop.addEventListener('click', function(e) {
            e.preventDefault();

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Focus skip link or first focusable element
            const skipLink = document.querySelector('.skip-link');
            if (skipLink) {
                skipLink.focus();
            }
        });
    }

    /**
     * ==========================================================================
     * KEYBOARD USER DETECTION
     * ==========================================================================
     */

    function initKeyboardDetection() {
        let isKeyboardUser = false;

        function handleFirstTab(e) {
            if (e.key === 'Tab') {
                isKeyboardUser = true;
                document.body.classList.add('user-is-tabbing');
                window.removeEventListener('keydown', handleFirstTab);
                window.addEventListener('mousedown', handleMouseDown);
            }
        }

        function handleMouseDown() {
            isKeyboardUser = false;
            document.body.classList.remove('user-is-tabbing');
            window.removeEventListener('mousedown', handleMouseDown);
            window.addEventListener('keydown', handleFirstTab);
        }

        window.addEventListener('keydown', handleFirstTab);
    }

    /**
     * ==========================================================================
     * FOCUS MANAGEMENT
     * ==========================================================================
     */

    function initFocusManagement() {
        // Store last focused element before modals/menus
        let lastFocusedElement = null;

        // Global focus management for dialogs/modals
        document.addEventListener('focusin', function(e) {
            // Track focus for restoration
            if (!e.target.closest('[role="dialog"], .mobile-navigation, .language-menu')) {
                lastFocusedElement = e.target;
            }
        });

        // Restore focus when modals close
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && lastFocusedElement) {
                // Let specific handlers close their elements first
                setTimeout(function() {
                    if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
                        lastFocusedElement.focus();
                    }
                }, 100);
            }
        });
    }

    /**
     * ==========================================================================
     * INITIALIZATION
     * ==========================================================================
     */

    function init() {
        initDropdownNavigation();
        initMobileMenu();
        initLanguageSwitcher();
        initSkipLink();
        initBackToTop();
        initKeyboardDetection();
        initFocusManagement();
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
