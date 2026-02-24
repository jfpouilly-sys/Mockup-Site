<?php
/**
 * Template for French Language Pages
 *
 * This template renders French content directly from the static HTML files.
 * It handles all French pages, products, and expertise content.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Get query vars
$page = get_query_var('azit_page');
$product = get_query_var('azit_product');
$expertise = get_query_var('azit_expertise');

// Determine which file to load
$static_base = get_template_directory() . '/static-content/fr/';
$static_file = '';

switch ($page) {
    case 'home':
        $static_file = $static_base . 'index.html';
        break;
    case 'training':
        $static_file = $static_base . 'pages/training.html';
        break;
    case 'contact':
        $static_file = $static_base . 'pages/contact.html';
        break;
    case 'company':
        $static_file = $static_base . 'pages/company.html';
        break;
    case 'blog':
        $static_file = $static_base . 'pages/blog.html';
        break;
    case 'sitemap':
        $static_file = $static_base . 'pages/sitemap.html';
        break;
    case 'accessibility':
        $static_file = $static_base . 'pages/accessibilite.html';
        break;
    case 'product':
        if ($product) {
            $static_file = $static_base . 'pages/products/' . sanitize_file_name($product) . '.html';
        }
        break;
    case 'expertise':
        if ($expertise) {
            $static_file = $static_base . 'pages/services/expertise-' . sanitize_file_name($expertise) . '.html';
        } else {
            $static_file = $static_base . 'pages/services/expertise.html';
        }
        break;
}

// Extract and process content
$content = '';
if ($static_file && file_exists($static_file)) {
    $html = file_get_contents($static_file);

    // Extract content between <main> tags
    if (preg_match('/<main[^>]*>(.*?)<\/main>/s', $html, $matches)) {
        $content = $matches[1];

        // Remove breadcrumb section
        $content = preg_replace('/<section[^>]*>.*?<nav class="breadcrumb">.*?<\/section>/s', '', $content);

        // Convert relative paths to WordPress URLs (French versions)
        // Home links
        $content = str_replace('href="../../index.html"', 'href="' . home_url('/') . '"', $content);
        $content = str_replace('href="../index.html"', 'href="' . home_url('/') . '"', $content);
        $content = str_replace('href="index.html"', 'href="' . home_url('/fr/') . '"', $content);

        // French page links stay in French
        $content = str_replace('href="contact.html"', 'href="' . home_url('/fr/pages/contact.html') . '"', $content);
        $content = str_replace('href="company.html"', 'href="' . home_url('/fr/pages/company.html') . '"', $content);
        $content = str_replace('href="training.html"', 'href="' . home_url('/fr/pages/training.html') . '"', $content);
        $content = str_replace('href="blog.html"', 'href="' . home_url('/fr/pages/blog.html') . '"', $content);
        $content = str_replace('href="sitemap.html"', 'href="' . home_url('/fr/pages/sitemap.html') . '"', $content);
        $content = str_replace('href="accessibilite.html"', 'href="' . home_url('/fr/pages/accessibilite.html') . '"', $content);

        // From subdirectory level
        $content = str_replace('href="../contact.html"', 'href="' . home_url('/fr/pages/contact.html') . '"', $content);
        $content = str_replace('href="../company.html"', 'href="' . home_url('/fr/pages/company.html') . '"', $content);
        $content = str_replace('href="../training.html"', 'href="' . home_url('/fr/pages/training.html') . '"', $content);
        $content = str_replace('href="../blog.html"', 'href="' . home_url('/fr/pages/blog.html') . '"', $content);
        $content = str_replace('href="../sitemap.html"', 'href="' . home_url('/fr/pages/sitemap.html') . '"', $content);
        $content = str_replace('href="../accessibilite.html"', 'href="' . home_url('/fr/pages/accessibilite.html') . '"', $content);

        // Product links (French)
        $content = preg_replace('/href="products\/([^"]+)\.html"/', 'href="' . home_url('/fr/pages/products/$1.html') . '"', $content);
        $content = preg_replace('/href="\.\.\/products\/([^"]+)\.html"/', 'href="' . home_url('/fr/pages/products/$1.html') . '"', $content);

        // Direct product links (from products folder)
        $product_slugs = array(
            'fsoe-slave', 'fsoe-master', 'profisafe-slave', 'profisafe-master',
            'canopen-slave', 'canopen-master', 'canopen-safety-slave', 'canopen-safety-master',
            'j1939', 'protocol-gateway', 'simulation', 'opc-ua', 'opc-ua-fx',
            'communication-stacks', 'tools', 'analyzers', 'cip-safety', 'wireless-safety', 'uds'
        );
        foreach ($product_slugs as $slug) {
            $content = str_replace('href="' . $slug . '.html"', 'href="' . home_url('/fr/pages/products/' . $slug . '.html') . '"', $content);
        }

        // Services/expertise links (French)
        $content = preg_replace('/href="services\/expertise\.html"/', 'href="' . home_url('/fr/pages/services/expertise.html') . '"', $content);
        $content = preg_replace('/href="\.\.\/services\/expertise\.html"/', 'href="' . home_url('/fr/pages/services/expertise.html') . '"', $content);
        $content = preg_replace('/href="services\/expertise-([^"]+)\.html"/', 'href="' . home_url('/fr/pages/services/expertise-$1.html') . '"', $content);
        $content = preg_replace('/href="\.\.\/services\/expertise-([^"]+)\.html"/', 'href="' . home_url('/fr/pages/services/expertise-$1.html') . '"', $content);

        // Language switcher: FR to EN links
        $content = str_replace('href="../index.html" class="language-button" data-lang="en"', 'href="' . home_url('/') . '" class="language-button" data-lang="en"', $content);
        $content = str_replace('href="../../index.html" class="language-button" data-lang="en"', 'href="' . home_url('/') . '" class="language-button" data-lang="en"', $content);

        // Fix image paths
        $content = str_replace('src="../../assets/', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../assets/', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../../', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../', 'src="' . get_template_directory_uri() . '/assets/', $content);
    }
}

// If no content found, show 404
if (empty($content)) {
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    get_template_part('404');
    exit;
}

// Output the page with French language attribute
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> lang="fr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('lang-fr'); ?>>
<?php wp_body_open(); ?>

<?php
// Include header with French language context
set_query_var('azit_current_lang', 'fr');
get_header();
?>

<main id="main-content" role="main" tabindex="-1">
    <?php echo $content; ?>
</main>

<?php
get_footer();
wp_footer();
?>
</body>
</html>
