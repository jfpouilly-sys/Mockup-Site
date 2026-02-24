/**
 * AZIT Website - Navigation JavaScript
 * Mobile menu and mega menu functionality
 */

(function() {
    'use strict';

    // Mobile menu toggle
    function initMobileMenu() {
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mainNav = document.getElementById('main-nav');

        if (!mobileMenuToggle || !mainNav) return;

        mobileMenuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            mainNav.classList.toggle('mobile-active');

            // Update aria-expanded for accessibility
            const isExpanded = this.classList.contains('active');
            this.setAttribute('aria-expanded', isExpanded);

            // Prevent body scroll when menu is open
            if (isExpanded) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mainNav.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                mobileMenuToggle.classList.remove('active');
                mainNav.classList.remove('mobile-active');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        });

        // Close mobile menu when window is resized to desktop
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 1023) {
                    mobileMenuToggle.classList.remove('active');
                    mainNav.classList.remove('mobile-active');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                    document.body.style.overflow = '';
                }
            }, 250);
        });
    }

    // Mega menu interactions for mobile
    function initMegaMenuMobile() {
        const navItems = document.querySelectorAll('.nav__item');

        navItems.forEach(item => {
            const link = item.querySelector('.nav__link');
            const megaMenu = item.querySelector('.mega-menu');

            if (link && megaMenu && window.innerWidth <= 1023) {
                // Prevent default click on mobile for items with mega menu
                link.addEventListener('click', function(e) {
                    if (window.innerWidth <= 1023) {
                        e.preventDefault();

                        // Toggle mega menu visibility
                        const isVisible = megaMenu.style.display === 'block';

                        // Close all other mega menus
                        document.querySelectorAll('.mega-menu').forEach(menu => {
                            menu.style.display = 'none';
                        });

                        // Toggle current mega menu
                        megaMenu.style.display = isVisible ? 'none' : 'block';

                        // Rotate arrow icon
                        const svg = link.querySelector('svg');
                        if (svg) {
                            svg.style.transform = isVisible ? 'rotate(0deg)' : 'rotate(180deg)';
                        }
                    }
                });
            }
        });

        // Reset mega menus on resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1023) {
                document.querySelectorAll('.mega-menu').forEach(menu => {
                    menu.style.display = '';
                });
                document.querySelectorAll('.nav__link svg').forEach(svg => {
                    svg.style.transform = '';
                });
            }
        });
    }

    // Keyboard navigation for mega menus
    function initKeyboardNavigation() {
        const navItems = document.querySelectorAll('.nav__item');

        navItems.forEach(item => {
            const link = item.querySelector('.nav__link');
            const megaMenu = item.querySelector('.mega-menu');

            if (link && megaMenu) {
                // Show mega menu on focus
                link.addEventListener('focus', function() {
                    if (window.innerWidth > 1023) {
                        item.classList.add('focus');
                    }
                });

                // Hide mega menu when focus leaves the nav item
                item.addEventListener('focusout', function(e) {
                    // Check if the new focus is outside this nav item
                    setTimeout(() => {
                        if (!item.contains(document.activeElement)) {
                            item.classList.remove('focus');
                        }
                    }, 0);
                });

                // Close mega menu on Escape key
                item.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        item.classList.remove('focus');
                        link.focus();
                    }
                });
            }
        });
    }

    // Set active nav item based on current page
    function setActiveNavItem() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav__link');

        navLinks.forEach(link => {
            const href = link.getAttribute('href');

            if (href && currentPath.includes(href) && href !== '#') {
                link.classList.add('active');
            }
        });

        // Also check footer links
        const footerLinks = document.querySelectorAll('.footer__link');
        footerLinks.forEach(link => {
            const href = link.getAttribute('href');

            if (href && currentPath.includes(href)) {
                link.style.color = 'var(--color-white)';
            }
        });
    }

    // Dropdown menu for mobile (simple version)
    function initDropdownMenu() {
        const dropdownToggles = document.querySelectorAll('[data-dropdown-toggle]');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.dataset.dropdownToggle;
                const target = document.getElementById(targetId);

                if (target) {
                    target.classList.toggle('show');
                }
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('[data-dropdown-toggle]')) {
                document.querySelectorAll('[data-dropdown]').forEach(dropdown => {
                    dropdown.classList.remove('show');
                });
            }
        });
    }

    // Top menu dropdown functionality
    function initTopMenuDropdown() {
        const dropdownItems = document.querySelectorAll('.top-menu-item.dropdown');

        dropdownItems.forEach(item => {
            const toggle = item.querySelector('.dropdown-toggle');
            const menu = item.querySelector('.dropdown-menu');

            if (toggle && menu) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Close all other dropdowns
                    document.querySelectorAll('.top-menu-item.dropdown').forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });

                    // Toggle current dropdown
                    item.classList.toggle('active');
                });
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.top-menu-item.dropdown')) {
                document.querySelectorAll('.top-menu-item.dropdown').forEach(item => {
                    item.classList.remove('active');
                });
            }
        });

        // Close dropdown when pressing Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.top-menu-item.dropdown').forEach(item => {
                    item.classList.remove('active');
                });
            }
        });
    }

    // Initialize all navigation functions
    function init() {
        initMobileMenu();
        initMegaMenuMobile();
        initKeyboardNavigation();
        setActiveNavItem();
        initDropdownMenu();
        initTopMenuDropdown();
    }

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
