/**
 * AZIT Website - Tabs Enhancement
 * Additional tab functionality for product pages
 * RGAA 4.1.2 compliant (Criterion 7 - Scripts)
 */

(function() {
    'use strict';

    // Enhanced tab functionality with URL hash support and ARIA
    function initEnhancedTabs() {
        const tabLists = document.querySelectorAll('.tabs__list');

        tabLists.forEach(function(tabList) {
            // Add ARIA role to tab list
            tabList.setAttribute('role', 'tablist');

            const tabButtons = tabList.querySelectorAll('.tabs__button, .tab-btn');
            const tabContainer = tabList.closest('.tabs');
            if (!tabContainer) return;

            const tabContents = tabContainer.querySelectorAll('.tabs__content, .tab-content');

            tabButtons.forEach(function(button, index) {
                var tabId = button.dataset.tab;

                // Add ARIA attributes to tab buttons
                button.setAttribute('role', 'tab');
                button.setAttribute('aria-selected', button.classList.contains('active') ? 'true' : 'false');
                button.setAttribute('tabindex', button.classList.contains('active') ? '0' : '-1');

                // Find corresponding panel
                var panel = document.getElementById(tabId) || document.getElementById(tabId + '-tab');
                if (panel) {
                    var panelId = panel.id;
                    var buttonId = 'tab-' + tabId;
                    button.id = buttonId;
                    button.setAttribute('aria-controls', panelId);

                    // Add ARIA attributes to tab panel
                    panel.setAttribute('role', 'tabpanel');
                    panel.setAttribute('aria-labelledby', buttonId);
                    panel.setAttribute('tabindex', '0');
                }

                // Handle tab button clicks
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    activateTab(button, tabButtons, tabContents);
                });

                // Keyboard navigation
                button.addEventListener('keydown', function(e) {
                    var targetButton = null;

                    switch (e.key) {
                        case 'ArrowRight':
                        case 'ArrowDown':
                            e.preventDefault();
                            targetButton = tabButtons[(index + 1) % tabButtons.length];
                            break;
                        case 'ArrowLeft':
                        case 'ArrowUp':
                            e.preventDefault();
                            targetButton = tabButtons[(index - 1 + tabButtons.length) % tabButtons.length];
                            break;
                        case 'Home':
                            e.preventDefault();
                            targetButton = tabButtons[0];
                            break;
                        case 'End':
                            e.preventDefault();
                            targetButton = tabButtons[tabButtons.length - 1];
                            break;
                    }

                    if (targetButton) {
                        activateTab(targetButton, tabButtons, tabContents);
                        targetButton.focus();
                    }
                });
            });
        });

        // Activate a specific tab
        function activateTab(button, tabButtons, tabContents) {
            var tabId = button.dataset.tab;

            // Deactivate all tabs
            tabButtons.forEach(function(btn) {
                btn.classList.remove('active');
                btn.setAttribute('aria-selected', 'false');
                btn.setAttribute('tabindex', '-1');
            });
            tabContents.forEach(function(content) {
                content.classList.remove('active');
            });

            // Activate clicked tab
            button.classList.add('active');
            button.setAttribute('aria-selected', 'true');
            button.setAttribute('tabindex', '0');

            // Show corresponding content (try both ID formats)
            var activeContent = document.getElementById(tabId);
            if (!activeContent) {
                activeContent = document.getElementById(tabId + '-tab');
            }
            if (activeContent) {
                activeContent.classList.add('active');
            }

            // Announce tab change to screen readers
            if (window.a11y && window.a11y.announce) {
                window.a11y.announce(button.textContent.trim() + ' tab selected');
            }

            // Update URL hash without scrolling
            if (history.replaceState) {
                history.replaceState(null, null, '#' + tabId);
            }
        }

        // Check for hash on page load
        var hash = window.location.hash.slice(1);
        if (hash) {
            var targetButton = document.querySelector('[data-tab="' + hash + '"]');
            if (targetButton) {
                targetButton.click();
            }
        }
    }

    // Image gallery/thumbnail functionality
    function initImageGallery() {
        var thumbnails = document.querySelectorAll('.product-hero__thumbnails img');
        var mainImage = document.querySelector('.product-hero__main-image');

        if (!thumbnails.length || !mainImage) return;

        thumbnails.forEach(function(thumb) {
            thumb.addEventListener('click', function() {
                // Update active state
                thumbnails.forEach(function(t) { t.classList.remove('active'); });
                this.classList.add('active');

                // Update main image
                mainImage.src = this.src.replace('-thumb', '-hero').replace('-pcb', '-hero').replace('-case', '-hero').replace('-ports', '-hero');
                mainImage.alt = this.alt;
            });
        });
    }

    // Initialize when DOM is ready
    function init() {
        initEnhancedTabs();
        initImageGallery();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
