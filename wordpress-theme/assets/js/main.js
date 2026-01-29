/**
 * AZIT Industrial - Main JavaScript
 *
 * Core functionality for the AZIT Industrial WordPress theme.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

(function($) {
    'use strict';

    /**
     * ==========================================================================
     * GLOBAL VARIABLES
     * ==========================================================================
     */

    const AZIT = {
        ajaxUrl: typeof azit_vars !== 'undefined' ? azit_vars.ajax_url : '/wp-admin/admin-ajax.php',
        nonce: typeof azit_vars !== 'undefined' ? azit_vars.nonce : '',
        i18n: typeof azit_vars !== 'undefined' ? azit_vars.i18n : {}
    };

    /**
     * ==========================================================================
     * UTILITY FUNCTIONS
     * ==========================================================================
     */

    /**
     * Debounce function
     */
    function debounce(func, wait, immediate) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    /**
     * Throttle function
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    /**
     * ==========================================================================
     * SMOOTH SCROLL
     * ==========================================================================
     */

    function initSmoothScroll() {
        // Only for internal anchor links
        $('a[href^="#"]:not([href="#"])').on('click', function(e) {
            const target = $(this.hash);

            if (target.length) {
                e.preventDefault();

                // Check for reduced motion preference
                const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                if (prefersReducedMotion) {
                    target[0].scrollIntoView();
                } else {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 500);
                }

                // Set focus for accessibility
                target.attr('tabindex', '-1').focus();
            }
        });
    }

    /**
     * ==========================================================================
     * HEADER SCROLL BEHAVIOR
     * ==========================================================================
     */

    function initHeaderScroll() {
        const $header = $('.site-header');
        let lastScroll = 0;

        if (!$header.length) return;

        const handleScroll = throttle(function() {
            const currentScroll = $(window).scrollTop();

            // Add scrolled class when not at top
            if (currentScroll > 50) {
                $header.addClass('is-scrolled');
            } else {
                $header.removeClass('is-scrolled');
            }

            // Hide/show header on scroll (optional - uncomment if needed)
            /*
            if (currentScroll > lastScroll && currentScroll > 200) {
                $header.addClass('is-hidden');
            } else {
                $header.removeClass('is-hidden');
            }
            */

            lastScroll = currentScroll;
        }, 100);

        $(window).on('scroll', handleScroll);
    }

    /**
     * ==========================================================================
     * FORM VALIDATION
     * ==========================================================================
     */

    function initFormValidation() {
        const $forms = $('form[data-validate]');

        if (!$forms.length) return;

        $forms.each(function() {
            const $form = $(this);

            $form.on('submit', function(e) {
                let isValid = true;

                // Clear previous errors
                $form.find('.field-error').remove();
                $form.find('.has-error').removeClass('has-error');
                $form.find('[aria-invalid]').removeAttr('aria-invalid');

                // Validate required fields
                $form.find('[required]').each(function() {
                    const $field = $(this);
                    const value = $field.val().trim();

                    if (!value) {
                        isValid = false;
                        showFieldError($field, AZIT.i18n.required || 'This field is required');
                    }
                });

                // Validate email fields
                $form.find('[type="email"]').each(function() {
                    const $field = $(this);
                    const value = $field.val().trim();

                    if (value && !isValidEmail(value)) {
                        isValid = false;
                        showFieldError($field, AZIT.i18n.invalid_email || 'Please enter a valid email address');
                    }
                });

                if (!isValid) {
                    e.preventDefault();

                    // Focus first error field
                    $form.find('.has-error').first().find('input, textarea, select').focus();

                    // Announce to screen readers
                    announceError(AZIT.i18n.form_errors || 'Please correct the errors in the form');
                }
            });

            // Real-time validation on blur
            $form.find('input, textarea, select').on('blur', function() {
                validateField($(this));
            });
        });
    }

    function showFieldError($field, message) {
        const $wrapper = $field.closest('.form-field');
        const fieldId = $field.attr('id');
        const errorId = fieldId + '-error';

        $wrapper.addClass('has-error');
        $field.attr('aria-invalid', 'true');
        $field.attr('aria-describedby', errorId);

        $('<p>', {
            'class': 'field-error',
            'id': errorId,
            'role': 'alert',
            'text': message
        }).insertAfter($field);
    }

    function validateField($field) {
        const $wrapper = $field.closest('.form-field');
        const value = $field.val().trim();

        // Clear previous error
        $wrapper.removeClass('has-error');
        $wrapper.find('.field-error').remove();
        $field.removeAttr('aria-invalid');

        // Check required
        if ($field.prop('required') && !value) {
            showFieldError($field, AZIT.i18n.required || 'This field is required');
            return false;
        }

        // Check email
        if ($field.attr('type') === 'email' && value && !isValidEmail(value)) {
            showFieldError($field, AZIT.i18n.invalid_email || 'Please enter a valid email address');
            return false;
        }

        return true;
    }

    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function announceError(message) {
        const $region = $('#aria-live-assertive');
        if ($region.length) {
            $region.text(message);
            setTimeout(function() {
                $region.text('');
            }, 1000);
        }
    }

    /**
     * ==========================================================================
     * LAZY LOADING IMAGES
     * ==========================================================================
     */

    function initLazyLoading() {
        // Use native lazy loading if supported
        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[data-src]');
            images.forEach(img => {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            });
        } else {
            // Fallback to Intersection Observer
            const lazyImages = document.querySelectorAll('img[data-src]');

            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    });
                }, {
                    rootMargin: '50px 0px'
                });

                lazyImages.forEach(function(img) {
                    imageObserver.observe(img);
                });
            }
        }
    }

    /**
     * ==========================================================================
     * RESPONSIVE TABLES
     * ==========================================================================
     */

    function initResponsiveTables() {
        const $tables = $('.entry-content table');

        if (!$tables.length) return;

        $tables.each(function() {
            const $table = $(this);

            // Wrap table for horizontal scroll
            if (!$table.parent().hasClass('table-responsive')) {
                $table.wrap('<div class="table-responsive" tabindex="0" role="region" aria-label="Scrollable table"></div>');
            }
        });
    }

    /**
     * ==========================================================================
     * EXTERNAL LINKS
     * ==========================================================================
     */

    function initExternalLinks() {
        // Add target="_blank" and rel attributes to external links
        $('a[href^="http"]:not([href*="' + window.location.hostname + '"])').each(function() {
            const $link = $(this);

            // Skip if already has target
            if (!$link.attr('target')) {
                $link.attr('target', '_blank');
            }

            // Add security attributes
            const currentRel = $link.attr('rel') || '';
            if (currentRel.indexOf('noopener') === -1) {
                $link.attr('rel', (currentRel + ' noopener noreferrer').trim());
            }
        });
    }

    /**
     * ==========================================================================
     * PRINT PREPARATION
     * ==========================================================================
     */

    function initPrintPreparation() {
        window.addEventListener('beforeprint', function() {
            // Expand all collapsed content for printing
            $('[aria-expanded="false"]').each(function() {
                $(this).attr('data-was-collapsed', 'true');
                $(this).attr('aria-expanded', 'true');
            });

            $('[hidden]').each(function() {
                $(this).attr('data-was-hidden', 'true');
                $(this).removeAttr('hidden');
            });
        });

        window.addEventListener('afterprint', function() {
            // Restore collapsed state
            $('[data-was-collapsed="true"]').each(function() {
                $(this).attr('aria-expanded', 'false');
                $(this).removeAttr('data-was-collapsed');
            });

            $('[data-was-hidden="true"]').each(function() {
                $(this).attr('hidden', '');
                $(this).removeAttr('data-was-hidden');
            });
        });
    }

    /**
     * ==========================================================================
     * AJAX LOADING INDICATOR
     * ==========================================================================
     */

    function showLoading($element) {
        $element.addClass('is-loading');
        $element.attr('aria-busy', 'true');
    }

    function hideLoading($element) {
        $element.removeClass('is-loading');
        $element.removeAttr('aria-busy');
    }

    /**
     * ==========================================================================
     * INITIALIZATION
     * ==========================================================================
     */

    function init() {
        initSmoothScroll();
        initHeaderScroll();
        initFormValidation();
        initLazyLoading();
        initResponsiveTables();
        initExternalLinks();
        initPrintPreparation();
    }

    // Initialize on document ready
    $(document).ready(function() {
        init();
    });

    // Expose public methods
    window.AZIT = AZIT;

})(jQuery);
