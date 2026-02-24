<?php
/**
 * Template for the Communication Stacks product page
 *
 * This template renders the communication stacks page content directly from the static HTML
 * to preserve the complex tab structure that WordPress's the_content() would break.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();

// Get the static content file path
$static_file = get_template_directory() . '/static-content/products/communication-stacks.html';
$content = '';

if (file_exists($static_file)) {
    $html = file_get_contents($static_file);

    // Extract content between <main> tags
    if (preg_match('/<main[^>]*>(.*?)<\/main>/s', $html, $matches)) {
        $content = $matches[1];

        // Remove breadcrumb section (we'll use WordPress breadcrumb)
        $content = preg_replace('/<section[^>]*>.*?<nav class="breadcrumb">.*?<\/section>/s', '', $content);

        // Convert relative paths to WordPress URLs
        $content = str_replace('href="../../index.html"', 'href="' . home_url('/') . '"', $content);
        $content = str_replace('href="../index.html"', 'href="' . home_url('/') . '"', $content);

        // Page links from products folder
        $content = str_replace('href="../contact.html"', 'href="' . home_url('/contact/') . '"', $content);
        $content = str_replace('href="../company.html"', 'href="' . home_url('/company/') . '"', $content);
        $content = str_replace('href="../training.html"', 'href="' . home_url('/training/') . '"', $content);
        $content = str_replace('href="../blog.html"', 'href="' . home_url('/blog/') . '"', $content);
        $content = str_replace('href="../sitemap.html"', 'href="' . home_url('/sitemap/') . '"', $content);
        $content = str_replace('href="../accessibilite.html"', 'href="' . home_url('/accessibility/') . '"', $content);

        // Convert product links - direct links from products folder
        $product_slugs = array(
            'fsoe-slave', 'fsoe-master', 'profisafe-slave', 'profisafe-master',
            'canopen-slave', 'canopen-master', 'canopen-safety-slave', 'canopen-safety-master',
            'j1939', 'protocol-gateway', 'simulation', 'opc-ua', 'opc-ua-fx',
            'communication-stacks', 'tools', 'analyzers', 'cip-safety', 'wireless-safety', 'uds'
        );
        foreach ($product_slugs as $slug) {
            $content = str_replace('href="' . $slug . '.html"', 'href="' . home_url('/products/' . $slug . '/') . '"', $content);
        }

        // Convert services/expertise links
        $content = preg_replace('/href="\.\.\/services\/expertise\.html"/', 'href="' . home_url('/expertise/') . '"', $content);
        $content = preg_replace('/href="\.\.\/services\/expertise-([^"]+)\.html"/', 'href="' . home_url('/expertise/$1/') . '"', $content);

        // Fix image paths
        $content = str_replace('src="../../assets/', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../assets/', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../../', 'src="' . get_template_directory_uri() . '/assets/', $content);
        $content = str_replace('src="../', 'src="' . get_template_directory_uri() . '/assets/', $content);
    }
}
?>

<main id="main-content" role="main" tabindex="-1">
    <?php
    // Output the static content directly without WordPress processing
    echo $content;
    ?>
</main>

<?php
get_footer();
