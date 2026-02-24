# WordPress Update Instructions: Product Datasheets

These instructions explain how to deploy the product datasheet changes to your live WordPress instance.

---

## 1. Upload Datasheet PDF Files

### Via WordPress Admin (Media Library)

1. Log in to your WordPress admin panel (`https://your-site.com/wp-admin/`)
2. Go to **Media > Add New**
3. Upload the following PDF files:
   - `isit-custom-multi-protocol-gateway_fp-isigtw-en-20221102.pdf` (Protocol Gateway datasheet)
   - `isit-j1939-stack_isit-j1939-stack-en.pdf` (J1939 Stack datasheet)
4. After upload, note the **attachment URLs** for each file (you'll need them in step 3)

### Via FTP/SFTP (Alternative)

1. Connect to your server via FTP/SFTP
2. Navigate to `wp-content/uploads/` (or a custom datasheets directory)
3. Create a `datasheets/` subdirectory if desired
4. Upload both PDF files

---

## 2. Update the WordPress Theme

### Option A: Copy Updated Theme Files

Copy the updated theme files from this repository to your WordPress installation:

```bash
# From your server, navigate to the theme directory
cd /path/to/wordpress/wp-content/themes/azit-industrial/

# Copy the updated single-product.php
# (This file now includes the "Download Datasheet" button in the product actions area)
```

The key change is in `single-product.php` which now reads the `product_datasheet` ACF field and renders a download button when a datasheet PDF is attached.

### Option B: Manual Edit

If you prefer to manually edit the theme on the server, add this code in `single-product.php` inside the `<div class="product-actions">` section, after the "Request Quote" button:

```php
<?php
$datasheet = null;
if (function_exists('get_field')) {
    $datasheet = get_field('product_datasheet');
}
if ($datasheet && !empty($datasheet['url'])) :
?>
<a href="<?php echo esc_url($datasheet['url']); ?>"
   class="btn btn-secondary"
   download
   aria-label="<?php echo esc_attr(sprintf(__('Download %s datasheet (PDF)', 'azit-industrial'), get_the_title())); ?>">
    <?php esc_html_e('Download Datasheet', 'azit-industrial'); ?>
</a>
<?php endif; ?>
```

---

## 3. Attach Datasheets to Products

### With ACF (Advanced Custom Fields) Installed

1. Go to **Products > All Products**
2. Edit the **ISI-GTW Multi-Protocol Gateway** product
3. Scroll down to the **Product Details** section
4. In the **Datasheet** field, click "Add File" and select `isit-custom-multi-protocol-gateway_fp-isigtw-en-20221102.pdf` from the Media Library
5. Click **Update** to save
6. Repeat for the **J1939 Protocol Stack** product:
   - Edit the J1939 product
   - In the **Datasheet** field, select `isit-j1939-stack_isit-j1939-stack-en.pdf`
   - Click **Update**

### Without ACF (Fallback Meta Box)

If ACF is not installed, you can set the datasheet via WP-CLI or custom code:

```bash
# Find the product post IDs
wp post list --post_type=product --fields=ID,post_title

# Assuming Protocol Gateway has ID 42 and J1939 has ID 55:
# First, get the attachment IDs of the uploaded PDFs
wp post list --post_type=attachment --post_mime_type=application/pdf --fields=ID,post_title

# Then attach the datasheet to the product
wp post meta update 42 product_datasheet <attachment_id_of_gateway_pdf>
wp post meta update 55 product_datasheet <attachment_id_of_j1939_pdf>
```

---

## 4. Verify the Changes

1. Visit the **Protocol Gateway** product page on your live site
2. Confirm the "Download Datasheet" button appears and downloads the correct PDF
3. Visit the **J1939** product page
4. Confirm the "Download Datasheet" button appears and downloads the correct PDF
5. Test in both **English** and **French** (if WPML is configured)

---

## 5. WPML / Multilingual Considerations

If you're using WPML for translations:

1. The datasheet files are language-neutral (EN versions serve both languages for now)
2. If you later have French-specific datasheets, create separate media entries and attach them to the French translations of each product
3. The `product_datasheet` ACF field is automatically synced by WPML if configured in **WPML > Settings > Custom Fields**

---

## Summary of Changed Files

| File | Change |
|------|--------|
| `assets/docs/datasheets/` | New directory for product datasheets |
| `pages/products/protocol-gateway.html` | Added "Download Datasheet" button (EN) |
| `pages/products/j1939.html` | Fixed "Download Datasheet" link (EN) |
| `fr/pages/products/protocol-gateway.html` | Added "Telecharger la Fiche Technique" button (FR) |
| `fr/pages/products/j1939.html` | Fixed "Telecharger la Fiche Technique" link (FR) |
| `azit-industrial/single-product.php` | Added datasheet download button from ACF field |

## PDF Files to Place in `assets/docs/datasheets/`

| Filename | Product |
|----------|---------|
| `isit-custom-multi-protocol-gateway_fp-isigtw-en-20221102.pdf` | ISI-GTW Protocol Gateway |
| `isit-j1939-stack_isit-j1939-stack-en.pdf` | J1939 Protocol Stack |
