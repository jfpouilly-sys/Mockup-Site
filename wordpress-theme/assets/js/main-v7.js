/**
 * AZIT Website - Main JavaScript
 * General functionality and interactions
 */

(function() {
    'use strict';

    // Sticky header on scroll
    function initStickyHeader() {
        const header = document.getElementById('header');
        if (!header) return;

        let lastScrollTop = 0;
        const scrollThreshold = 100;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScrollTop = scrollTop;
        });
    }

    // Tab functionality
    function initTabs() {
        const tabButtons = document.querySelectorAll('.tabs__button');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabName = this.dataset.tab;

                // Remove active class from all buttons and contents
                document.querySelectorAll('.tabs__button').forEach(btn => {
                    btn.classList.remove('active');
                });
                document.querySelectorAll('.tabs__content').forEach(content => {
                    content.classList.remove('active');
                });

                // Add active class to clicked button
                this.classList.add('active');

                // Show corresponding content
                const activeContent = document.getElementById(`${tabName}-tab`);
                if (activeContent) {
                    activeContent.classList.add('active');
                }
            });
        });
    }

    // Code copy functionality
    function initCodeCopy() {
        const copyButtons = document.querySelectorAll('.code-block__copy');

        copyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const codeBlock = this.closest('.code-block');
                const code = codeBlock.querySelector('code');

                if (code) {
                    const text = code.textContent;

                    // Copy to clipboard
                    navigator.clipboard.writeText(text).then(() => {
                        // Visual feedback
                        const originalText = this.textContent;
                        this.textContent = 'Copied!';

                        setTimeout(() => {
                            this.textContent = originalText;
                        }, 2000);
                    }).catch(err => {
                        console.error('Failed to copy code: ', err);
                    });
                }
            });
        });
    }

    // Form validation
    function initFormValidation() {
        const forms = document.querySelectorAll('form');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const requiredFields = this.querySelectorAll('[required]');

                // Clear previous errors
                this.querySelectorAll('.form-error').forEach(error => {
                    error.remove();
                });

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;

                        // Add error message
                        const errorMsg = document.createElement('span');
                        errorMsg.className = 'form-error';
                        errorMsg.textContent = 'This field is required';

                        field.parentNode.appendChild(errorMsg);
                        field.classList.add('error');
                    } else {
                        field.classList.remove('error');
                    }
                });

                // Email validation
                const emailFields = this.querySelectorAll('[type="email"]');
                emailFields.forEach(field => {
                    if (field.value && !isValidEmail(field.value)) {
                        isValid = false;

                        const errorMsg = document.createElement('span');
                        errorMsg.className = 'form-error';
                        errorMsg.textContent = 'Please enter a valid email address';

                        field.parentNode.appendChild(errorMsg);
                        field.classList.add('error');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    }

    // Email validation helper
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Smooth scroll for anchor links
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                if (href === '#') return;

                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();

                    const headerHeight = document.getElementById('header')?.offsetHeight || 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Notification signup (for coming soon pages)
    function initNotificationSignup() {
        const notifyForms = document.querySelectorAll('.coming-soon__notify');

        notifyForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const emailInput = this.querySelector('.form-input');
                const button = this.querySelector('.btn');

                if (emailInput && button) {
                    // Simulate API call
                    button.textContent = 'Subscribing...';
                    button.disabled = true;

                    setTimeout(() => {
                        button.textContent = 'Subscribed!';
                        button.classList.add('btn--success');
                        emailInput.disabled = true;

                        // Show success message
                        const successMsg = document.createElement('p');
                        successMsg.textContent = 'Thank you! We\'ll notify you when this product is available.';
                        successMsg.style.color = 'var(--color-success)';
                        successMsg.style.marginTop = 'var(--spacing-md)';
                        this.parentNode.appendChild(successMsg);
                    }, 1000);
                }
            });
        });
    }

    // Lazy load images (if implemented)
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        const src = img.dataset.src;

                        if (src) {
                            img.src = src;
                            img.removeAttribute('data-src');
                            observer.unobserve(img);
                        }
                    }
                });
            });

            const lazyImages = document.querySelectorAll('img[data-src]');
            lazyImages.forEach(img => imageObserver.observe(img));
        }
    }

    // Initialize all functions when DOM is ready
    function init() {
        initStickyHeader();
        initTabs();
        initCodeCopy();
        initFormValidation();
        initSmoothScroll();
        initNotificationSignup();
        initLazyLoad();
    }

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
