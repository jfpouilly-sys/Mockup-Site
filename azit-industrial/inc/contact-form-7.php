<?php
/**
 * Contact Form 7 Integration
 *
 * Custom CF7 integration with RGAA 4.1.2 accessibility compliance.
 * Provides accessible form templates and validation.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if Contact Form 7 is active
 *
 * @return bool
 */
function azit_is_cf7_active() {
    return class_exists('WPCF7');
}

/**
 * Add accessibility enhancements to CF7 forms
 */
function azit_cf7_accessibility_enhancements() {
    if (!azit_is_cf7_active()) {
        return;
    }

    // Remove CF7 default styles (we'll use our own)
    add_filter('wpcf7_load_css', '__return_false');

    // Add custom form class
    add_filter('wpcf7_form_class_attr', 'azit_cf7_form_class');

    // Enhance form validation messages
    add_filter('wpcf7_ajax_json_echo', 'azit_cf7_enhance_response', 10, 2);

    // Add ARIA attributes to form elements
    add_filter('wpcf7_form_elements', 'azit_cf7_add_aria_attributes');
}
add_action('init', 'azit_cf7_accessibility_enhancements');

/**
 * Add custom class to CF7 forms
 *
 * @param string $class Existing classes
 * @return string Modified classes
 */
function azit_cf7_form_class($class) {
    return $class . ' azit-form rgaa-form';
}

/**
 * Enhance CF7 response for accessibility
 *
 * @param array $response CF7 response
 * @param array $result CF7 result
 * @return array Modified response
 */
function azit_cf7_enhance_response($response, $result) {
    // Add ARIA live region update
    $response['aria_live'] = true;

    // Add focus target for error state
    if ($response['status'] === 'validation_failed') {
        $response['focus_first_error'] = true;
    }

    return $response;
}

/**
 * Add ARIA attributes to form elements
 *
 * @param string $content Form content
 * @return string Modified content
 */
function azit_cf7_add_aria_attributes($content) {
    // Add aria-required to required fields
    $content = preg_replace(
        '/<input([^>]*)(aria-required="true"|required)([^>]*)>/i',
        '<input$1$2$3 aria-required="true">',
        $content
    );

    // Add aria-invalid="false" initially (JS will update on validation)
    $content = preg_replace(
        '/<input([^>]*)class="wpcf7-form-control([^"]*)"([^>]*)>/i',
        '<input$1class="wpcf7-form-control$2"$3 aria-invalid="false">',
        $content
    );

    $content = preg_replace(
        '/<textarea([^>]*)class="wpcf7-form-control([^"]*)"([^>]*)>/i',
        '<textarea$1class="wpcf7-form-control$2"$3 aria-invalid="false">',
        $content
    );

    $content = preg_replace(
        '/<select([^>]*)class="wpcf7-form-control([^"]*)"([^>]*)>/i',
        '<select$1class="wpcf7-form-control$2"$3 aria-invalid="false">',
        $content
    );

    return $content;
}

/**
 * Custom CF7 form templates
 */
function azit_get_cf7_contact_form_template() {
    return '
<div class="form-row">
    <div class="form-field form-field-half">
        <label for="your-name">' . __('Name', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
        [text* your-name id:your-name class:form-control autocomplete:name]
    </div>

    <div class="form-field form-field-half">
        <label for="your-email">' . __('Email', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
        [email* your-email id:your-email class:form-control autocomplete:email]
    </div>
</div>

<div class="form-row">
    <div class="form-field form-field-half">
        <label for="your-company">' . __('Company', 'azit-industrial') . '</label>
        [text your-company id:your-company class:form-control autocomplete:organization]
    </div>

    <div class="form-field form-field-half">
        <label for="your-phone">' . __('Phone', 'azit-industrial') . '</label>
        [tel your-phone id:your-phone class:form-control autocomplete:tel]
    </div>
</div>

<div class="form-field">
    <label for="your-subject">' . __('Subject', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
    [select* your-subject id:your-subject class:form-control include_blank "' . __('Please select...', 'azit-industrial') . '" "' . __('General Inquiry', 'azit-industrial') . '" "' . __('Technical Support', 'azit-industrial') . '" "' . __('Sales', 'azit-industrial') . '" "' . __('Training', 'azit-industrial') . '" "' . __('Partnership', 'azit-industrial') . '"]
</div>

<div class="form-field">
    <label for="your-message">' . __('Message', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
    [textarea* your-message id:your-message class:form-control rows:6]
</div>

<div class="form-field form-field-checkbox">
    [acceptance your-consent class:form-checkbox] ' . sprintf(
        __('I agree to the %s and consent to being contacted.', 'azit-industrial'),
        '<a href="' . home_url('/politique-confidentialite/') . '">' . __('privacy policy', 'azit-industrial') . '</a>'
    ) . ' <span class="required" aria-hidden="true">*</span> [/acceptance]
</div>

<div class="form-field form-submit">
    [submit class:btn class:btn-primary "' . __('Send Message', 'azit-industrial') . '"]
</div>

<p class="form-note">
    <span class="required" aria-hidden="true">*</span> ' . __('Required fields', 'azit-industrial') . '
</p>';
}

/**
 * Training inquiry form template
 */
function azit_get_cf7_training_form_template() {
    return '
<div class="form-row">
    <div class="form-field form-field-half">
        <label for="attendee-name">' . __('Name', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
        [text* attendee-name id:attendee-name class:form-control autocomplete:name]
    </div>

    <div class="form-field form-field-half">
        <label for="attendee-email">' . __('Email', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
        [email* attendee-email id:attendee-email class:form-control autocomplete:email]
    </div>
</div>

<div class="form-row">
    <div class="form-field form-field-half">
        <label for="attendee-company">' . __('Company', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
        [text* attendee-company id:attendee-company class:form-control autocomplete:organization]
    </div>

    <div class="form-field form-field-half">
        <label for="attendee-role">' . __('Job Title', 'azit-industrial') . '</label>
        [text attendee-role id:attendee-role class:form-control autocomplete:organization-title]
    </div>
</div>

<div class="form-field">
    <label for="training-course">' . __('Training Course', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
    [select* training-course id:training-course class:form-control include_blank "' . __('Select a course...', 'azit-industrial') . '" "PROFINET Fundamentals" "IEC 61508 Functional Safety" "EtherCAT Advanced" "Custom Training"]
</div>

<div class="form-row">
    <div class="form-field form-field-half">
        <label for="preferred-date">' . __('Preferred Date', 'azit-industrial') . '</label>
        [date preferred-date id:preferred-date class:form-control min:today]
    </div>

    <div class="form-field form-field-half">
        <label for="attendee-count">' . __('Number of Attendees', 'azit-industrial') . '</label>
        [number attendee-count id:attendee-count class:form-control min:1 max:20]
    </div>
</div>

<div class="form-field">
    <label for="training-comments">' . __('Additional Comments', 'azit-industrial') . '</label>
    [textarea training-comments id:training-comments class:form-control rows:4]
</div>

<div class="form-field form-submit">
    [submit class:btn class:btn-primary "' . __('Request Training', 'azit-industrial') . '"]
</div>';
}

/**
 * Quote request form template
 */
function azit_get_cf7_quote_form_template() {
    return '
<div class="form-row">
    <div class="form-field form-field-half">
        <label for="quote-name">' . __('Name', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
        [text* quote-name id:quote-name class:form-control autocomplete:name]
    </div>

    <div class="form-field form-field-half">
        <label for="quote-email">' . __('Email', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
        [email* quote-email id:quote-email class:form-control autocomplete:email]
    </div>
</div>

<div class="form-row">
    <div class="form-field form-field-half">
        <label for="quote-company">' . __('Company', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
        [text* quote-company id:quote-company class:form-control autocomplete:organization]
    </div>

    <div class="form-field form-field-half">
        <label for="quote-phone">' . __('Phone', 'azit-industrial') . '</label>
        [tel quote-phone id:quote-phone class:form-control autocomplete:tel]
    </div>
</div>

<div class="form-field">
    <label for="quote-product">' . __('Product/Service', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
    [select* quote-product id:quote-product class:form-control include_blank "' . __('Select...', 'azit-industrial') . '" "ISI Gateway" "Protocol Stack" "Simulator" "Consulting Services" "Custom Development" "Other"]
</div>

<div class="form-field">
    <label for="quote-requirements">' . __('Project Requirements', 'azit-industrial') . ' <span class="required" aria-hidden="true">*</span></label>
    [textarea* quote-requirements id:quote-requirements class:form-control rows:6 placeholder:"' . __('Please describe your project requirements, timeline, and any specific needs...', 'azit-industrial') . '"]
</div>

<div class="form-field">
    <label for="quote-budget">' . __('Budget Range', 'azit-industrial') . '</label>
    [select quote-budget id:quote-budget class:form-control include_blank "' . __('Prefer not to say', 'azit-industrial') . '" "< €5,000" "€5,000 - €20,000" "€20,000 - €50,000" "€50,000 - €100,000" "> €100,000"]
</div>

<div class="form-field form-submit">
    [submit class:btn class:btn-primary "' . __('Request Quote', 'azit-industrial') . '"]
</div>';
}

/**
 * Enqueue CF7 accessibility JavaScript
 */
function azit_cf7_enqueue_scripts() {
    if (!azit_is_cf7_active()) {
        return;
    }

    wp_add_inline_script('contact-form-7', azit_cf7_accessibility_js());
}
add_action('wp_enqueue_scripts', 'azit_cf7_enqueue_scripts', 20);

/**
 * CF7 Accessibility JavaScript
 */
function azit_cf7_accessibility_js() {
    return "
document.addEventListener('DOMContentLoaded', function() {
    // Handle CF7 form events
    document.addEventListener('wpcf7submit', function(event) {
        var form = event.target;
        var status = event.detail.status;
        var response = form.querySelector('.wpcf7-response-output');

        // Announce to screen readers
        if (response) {
            response.setAttribute('role', 'alert');
            response.setAttribute('aria-live', 'assertive');
        }

        // Handle validation errors
        if (status === 'validation_failed') {
            // Mark invalid fields
            var invalidFields = form.querySelectorAll('.wpcf7-not-valid');
            invalidFields.forEach(function(field) {
                field.setAttribute('aria-invalid', 'true');

                // Find associated error message
                var errorSpan = field.parentNode.querySelector('.wpcf7-not-valid-tip');
                if (errorSpan) {
                    var errorId = field.id + '-error';
                    errorSpan.id = errorId;
                    field.setAttribute('aria-describedby', errorId);
                }
            });

            // Focus first invalid field
            if (invalidFields.length > 0) {
                invalidFields[0].focus();
            }
        }

        // Handle success
        if (status === 'mail_sent') {
            // Reset aria-invalid on all fields
            var allFields = form.querySelectorAll('[aria-invalid]');
            allFields.forEach(function(field) {
                field.setAttribute('aria-invalid', 'false');
                field.removeAttribute('aria-describedby');
            });
        }
    });

    // Real-time validation feedback
    document.querySelectorAll('.wpcf7-form input, .wpcf7-form textarea, .wpcf7-form select').forEach(function(field) {
        field.addEventListener('blur', function() {
            // Remove error state on blur if field has value
            if (this.value.trim() !== '' && this.classList.contains('wpcf7-not-valid')) {
                this.classList.remove('wpcf7-not-valid');
                this.setAttribute('aria-invalid', 'false');

                var tip = this.parentNode.querySelector('.wpcf7-not-valid-tip');
                if (tip) {
                    tip.remove();
                }
            }
        });
    });
});
";
}

/**
 * Custom CF7 form styles
 */
function azit_cf7_custom_styles() {
    if (!azit_is_cf7_active()) {
        return;
    }

    $css = "
/* CF7 Form Styles - RGAA Compliant */
.wpcf7-form {
    max-width: 100%;
}

.wpcf7-form .form-row {
    display: flex;
    gap: var(--spacing-md, 1rem);
    flex-wrap: wrap;
}

.wpcf7-form .form-field {
    margin-bottom: var(--spacing-md, 1rem);
    width: 100%;
}

.wpcf7-form .form-field-half {
    flex: 1 1 calc(50% - var(--spacing-md, 1rem) / 2);
    min-width: 200px;
}

.wpcf7-form label {
    display: block;
    margin-bottom: var(--spacing-xs, 0.25rem);
    font-weight: 500;
}

.wpcf7-form .required {
    color: #dc3545;
}

.wpcf7-form .form-control,
.wpcf7-form .wpcf7-form-control {
    width: 100%;
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border: 2px solid var(--azit-gray-300, #dee2e6);
    border-radius: 4px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.wpcf7-form .form-control:focus,
.wpcf7-form .wpcf7-form-control:focus {
    border-color: var(--azit-primary, #0056b3);
    outline: 3px solid var(--azit-focus-color, #005fcc);
    outline-offset: 2px;
}

/* Validation States */
.wpcf7-form .wpcf7-not-valid {
    border-color: #dc3545 !important;
}

.wpcf7-form .wpcf7-not-valid:focus {
    outline-color: #dc3545;
}

.wpcf7-form .wpcf7-not-valid-tip {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    display: block;
}

/* Response Messages */
.wpcf7-form .wpcf7-response-output {
    margin: var(--spacing-md, 1rem) 0;
    padding: var(--spacing-md, 1rem);
    border-radius: 4px;
    border: 2px solid;
}

.wpcf7-form.sent .wpcf7-response-output {
    border-color: #28a745;
    background-color: #d4edda;
    color: #155724;
}

.wpcf7-form.invalid .wpcf7-response-output,
.wpcf7-form.failed .wpcf7-response-output {
    border-color: #dc3545;
    background-color: #f8d7da;
    color: #721c24;
}

/* Checkbox styling */
.wpcf7-form .form-field-checkbox {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
}

.wpcf7-form .form-field-checkbox .wpcf7-list-item {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
}

.wpcf7-form .form-field-checkbox input[type='checkbox'] {
    width: auto;
    margin-top: 0.25rem;
}

/* Submit button */
.wpcf7-form .wpcf7-submit {
    cursor: pointer;
}

.wpcf7-form .wpcf7-submit:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Spinner */
.wpcf7-form .wpcf7-spinner {
    margin-left: 0.5rem;
}

/* Form note */
.wpcf7-form .form-note {
    font-size: 0.875rem;
    color: var(--azit-gray-600, #6c757d);
    margin-top: var(--spacing-md, 1rem);
}

@media (max-width: 576px) {
    .wpcf7-form .form-field-half {
        flex: 1 1 100%;
    }
}
";

    wp_add_inline_style('azit-style', $css);
}
add_action('wp_enqueue_scripts', 'azit_cf7_custom_styles', 20);

/**
 * Create default contact form on theme activation
 */
function azit_create_default_contact_form() {
    if (!azit_is_cf7_active()) {
        return;
    }

    // Check if form already exists
    $existing = get_posts(array(
        'post_type'   => 'wpcf7_contact_form',
        'post_status' => 'publish',
        'name'        => 'contact-form',
        'numberposts' => 1,
    ));

    if (!empty($existing)) {
        return;
    }

    // Create contact form
    $form_content = azit_get_cf7_contact_form_template();

    $mail_template = '[your-subject]

From: [your-name] <[your-email]>
Company: [your-company]
Phone: [your-phone]

Message:
[your-message]

--
This email was sent from a contact form on ' . get_bloginfo('name') . ' (' . home_url() . ')';

    $form = WPCF7_ContactForm::get_template();
    $form->set_title('Contact Form');
    $form->set_properties(array(
        'form'     => $form_content,
        'mail'     => array(
            'subject'            => '[' . get_bloginfo('name') . '] "[your-subject]"',
            'sender'             => '[your-name] <[your-email]>',
            'recipient'          => get_option('admin_email'),
            'body'               => $mail_template,
            'additional_headers' => 'Reply-To: [your-email]',
            'attachments'        => '',
            'use_html'           => false,
        ),
        'messages' => array(
            'mail_sent_ok'         => __('Thank you for your message. We will contact you shortly.', 'azit-industrial'),
            'mail_sent_ng'         => __('There was an error sending your message. Please try again.', 'azit-industrial'),
            'validation_error'     => __('Please correct the errors below.', 'azit-industrial'),
            'spam'                 => __('Your message appears to be spam.', 'azit-industrial'),
            'accept_terms'         => __('You must accept the terms and conditions.', 'azit-industrial'),
            'invalid_required'     => __('This field is required.', 'azit-industrial'),
            'invalid_email'        => __('Please enter a valid email address.', 'azit-industrial'),
            'invalid_tel'          => __('Please enter a valid phone number.', 'azit-industrial'),
        ),
    ));

    $form->save();
}
add_action('after_switch_theme', 'azit_create_default_contact_form');
