/**
 * AZIT Website - Language Switcher
 * Multi-language support (FR/EN)
 */

(function() {
    'use strict';

    // Language switcher functionality
    function initLanguageSwitcher() {
        const langButtons = document.querySelectorAll('.lang-switcher__btn');
        const htmlElement = document.documentElement;

        langButtons.forEach(button => {
            button.addEventListener('click', function() {
                const lang = this.dataset.lang;

                if (lang) {
                    // Update active state
                    langButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Update HTML lang attribute
                    htmlElement.setAttribute('lang', lang);
                    htmlElement.dataset.lang = lang;

                    // Save preference to localStorage
                    try {
                        localStorage.setItem('azit-lang', lang);
                    } catch (e) {
                        console.warn('Unable to save language preference:', e);
                    }

                    // Update content
                    updateContent(lang);

                    // Optionally redirect to language-specific page
                    // redirectToLanguagePage(lang);
                }
            });
        });

        // Load saved language preference
        loadLanguagePreference();
    }

    // Load language preference from localStorage
    function loadLanguagePreference() {
        try {
            const savedLang = localStorage.getItem('azit-lang');

            if (savedLang) {
                const button = document.querySelector(`.lang-switcher__btn[data-lang="${savedLang}"]`);

                if (button) {
                    button.click();
                }
            }
        } catch (e) {
            console.warn('Unable to load language preference:', e);
        }
    }

    // Update content based on language
    // This is a simple implementation using data attributes
    // For a production site, you might want to use a more robust solution
    function updateContent(lang) {
        const elements = document.querySelectorAll('[data-i18n]');

        elements.forEach(element => {
            const key = element.dataset.i18n;
            const translation = translations[lang]?.[key];

            if (translation) {
                element.textContent = translation;
            }
        });

        // Update placeholder text
        const placeholders = document.querySelectorAll('[data-i18n-placeholder]');
        placeholders.forEach(element => {
            const key = element.dataset.i18nPlaceholder;
            const translation = translations[lang]?.[key];

            if (translation) {
                element.placeholder = translation;
            }
        });

        // Update title and meta description
        const title = translations[lang]?.pageTitle;
        const description = translations[lang]?.pageDescription;

        if (title) {
            document.title = title;
        }

        if (description) {
            const metaDescription = document.querySelector('meta[name="description"]');
            if (metaDescription) {
                metaDescription.setAttribute('content', description);
            }
        }

        // Dispatch custom event for other scripts to listen to
        document.dispatchEvent(new CustomEvent('languageChanged', {
            detail: { language: lang }
        }));
    }

    // Redirect to language-specific page (optional)
    function redirectToLanguagePage(lang) {
        const currentPath = window.location.pathname;

        // If we're on the default (EN) version and switching to FR
        if (lang === 'fr' && !currentPath.startsWith('/fr/')) {
            const frPath = '/fr' + currentPath;
            // Check if FR page exists (you might want to add actual checking)
            // window.location.href = frPath;
        }

        // If we're on FR version and switching to EN
        if (lang === 'en' && currentPath.startsWith('/fr/')) {
            const enPath = currentPath.replace('/fr', '');
            // window.location.href = enPath || '/';
        }
    }

    // Translations object
    // In a real application, this would be loaded from JSON files
    const translations = {
        en: {
            pageTitle: 'AZIT - Industrial Protocol Stacks for Safety-Critical Systems',
            pageDescription: 'Production-ready industrial communication protocol stacks with SIL3/PLe certification.',
            heroTitle: 'Industrial Protocol Stacks Built for Safety-Critical Systems',
            heroSubtitle: '30+ years of embedded expertise. No third-party code. Full control over your safety certification.',
            requestQuote: 'Request Quote',
            viewProducts: 'View Products',
            learnMore: 'Learn More',
            readMore: 'Read More',
            contactUs: 'Contact Us',
            // Add more translations as needed
        },
        fr: {
            pageTitle: 'AZIT - Piles de Protocoles Industriels pour Systèmes Critiques',
            pageDescription: 'Piles de communication industrielle prêtes pour la production avec certification SIL3/PLe.',
            heroTitle: 'Piles de Protocoles Industriels Conçues pour les Systèmes Critiques',
            heroSubtitle: 'Plus de 30 ans d\'expertise en systèmes embarqués. Aucun code tiers. Contrôle total de votre certification de sécurité.',
            requestQuote: 'Demander un Devis',
            viewProducts: 'Voir les Produits',
            learnMore: 'En Savoir Plus',
            readMore: 'Lire Plus',
            contactUs: 'Nous Contacter',
            // Add more translations as needed
        }
    };

    // Detect browser language and set as default if no preference saved
    function detectBrowserLanguage() {
        try {
            const savedLang = localStorage.getItem('azit-lang');

            if (!savedLang) {
                const browserLang = navigator.language || navigator.userLanguage;
                const lang = browserLang.startsWith('fr') ? 'fr' : 'en';

                const button = document.querySelector(`.lang-switcher__btn[data-lang="${lang}"]`);
                if (button) {
                    button.click();
                }
            }
        } catch (e) {
            console.warn('Unable to detect browser language:', e);
        }
    }

    // Initialize
    function init() {
        initLanguageSwitcher();
        // Uncomment to enable browser language detection
        // detectBrowserLanguage();
    }

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Export translations for other scripts to use
    window.AZIT = window.AZIT || {};
    window.AZIT.translations = translations;

})();
