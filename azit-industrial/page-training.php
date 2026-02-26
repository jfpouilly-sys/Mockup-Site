<?php
/**
 * Template for the Training page
 *
 * This template renders the training page content directly from the static HTML
 * to preserve the complex tab structure that WordPress's the_content() would break.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();

// Get the static content file path
$static_file = get_template_directory() . '/static-content/training.html';
$content = '';

if (file_exists($static_file)) {
    $html = file_get_contents($static_file);

    // Extract content between <main> tags
    if (preg_match('/<main[^>]*>(.*?)<\/main>/s', $html, $matches)) {
        $content = $matches[1];

        // Remove breadcrumb section (we'll use WordPress breadcrumb)
        $content = preg_replace('/<section[^>]*>.*?<nav class="breadcrumb">.*?<\/section>/s', '', $content);

        // Convert relative paths to WordPress URLs
        $content = str_replace('href="../index.html"', 'href="' . home_url('/') . '"', $content);
        $content = str_replace('href="contact.html"', 'href="' . home_url('/contact/') . '"', $content);
        $content = str_replace('href="company.html"', 'href="' . home_url('/company/') . '"', $content);
        $content = str_replace('href="training.html"', 'href="' . home_url('/training/') . '"', $content);
        $content = str_replace('href="blog.html"', 'href="' . home_url('/blog/') . '"', $content);
        $content = str_replace('href="sitemap.html"', 'href="' . home_url('/sitemap/') . '"', $content);
        $content = str_replace('href="accessibilite.html"', 'href="' . home_url('/accessibility/') . '"', $content);

        // Convert product links
        $content = preg_replace('/href="products\/([^"]+)\.html"/', 'href="' . home_url('/products/$1/') . '"', $content);

        // Convert services/expertise links
        $content = preg_replace('/href="services\/expertise\.html"/', 'href="' . home_url('/expertise/') . '"', $content);
        $content = preg_replace('/href="services\/expertise-([^"]+)\.html"/', 'href="' . home_url('/expertise/$1/') . '"', $content);

        // Convert training detail links (static filename → WordPress post slug)
        $training_slug_map = array(
            'can'                   => 'can-training',
            'canopen'               => 'canopen-training',
            'j1939'                 => 'j1939-training',
            'ethercat'              => 'ethercat-training',
            'industrial-ethernet'   => 'industrial-ethernet-training',
            'ethernet-ip'           => 'ethernet-ip-cip-training',
            'profinet'              => 'profinet-training',
            'iec61508'              => 'iec-61508',
            'iso26262'              => 'iso-26262',
            'iso21434'              => 'iso-21434',
            'iec62304'              => 'iec-62304',
            'do178c'                => 'do-178c',
            'en50716'               => 'en-50716',
            'iso13849'              => 'iso-13849',
            'iso25119'              => 'iso-25119',
            'troubleshooting'       => 'industrial-ethernet-troubleshooting',
            'cybersecurity'         => 'embedded-systems-cybersecurity',
            'medical-cybersecurity' => 'medical-device-cybersecurity',
            'freertos'              => 'freertos-implementation',
            'misra'                 => 'misra-c-2025',
        );

        foreach ($training_slug_map as $static_name => $wp_slug) {
            $content = str_replace(
                'href="training/' . $static_name . '.html"',
                'href="' . home_url('/training/' . $wp_slug . '/') . '"',
                $content
            );
        }

        // Fix image paths
        $content = str_replace('src="../assets/', 'src="' . get_template_directory_uri() . '/assets/', $content);
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
