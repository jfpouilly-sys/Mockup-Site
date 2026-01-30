/**
 * AZIT Website - Tabs Enhancement
 * Additional tab functionality for product pages
 */

(function() {
    'use strict';

    // Enhanced tab functionality with URL hash support
    function initEnhancedTabs() {
        const tabButtons = document.querySelectorAll('.tabs__button, .tab-btn');
        const tabContents = document.querySelectorAll('.tabs__content, .tab-content');

        if (tabButtons.length === 0) return;

        // Handle tab button clicks
        tabButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const tabId = this.dataset.tab;

                // Remove active from all buttons and contents
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active to clicked button
                this.classList.add('active');

                // Show corresponding content (try both ID formats)
                let activeContent = document.getElementById(tabId);
                if (!activeContent) {
                    activeContent = document.getElementById(`${tabId}-tab`);
                }
                if (activeContent) {
                    activeContent.classList.add('active');
                }

                // Update URL hash without scrolling
                if (history.replaceState) {
                    history.replaceState(null, null, `#${tabId}`);
                }
            });
        });

        // Check for hash on page load
        const hash = window.location.hash.slice(1);
        if (hash) {
            const targetButton = document.querySelector(`[data-tab="${hash}"]`);
            if (targetButton) {
                targetButton.click();
            }
        }
    }

    // Image gallery/thumbnail functionality
    function initImageGallery() {
        const thumbnails = document.querySelectorAll('.product-hero__thumbnails img');
        const mainImage = document.querySelector('.product-hero__main-image');

        if (!thumbnails.length || !mainImage) return;

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Update active state
                thumbnails.forEach(t => t.classList.remove('active'));
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
