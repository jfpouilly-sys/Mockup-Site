<?php
/**
 * Sample Content Import
 *
 * Creates sample content for AZIT WordPress theme.
 * Run once via WP-CLI or admin to populate site with demo content.
 *
 * Usage: wp eval-file inc/sample-content.php
 * Or add to functions.php temporarily and visit any page
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

// Prevent direct access and multiple runs
if (!defined('ABSPATH')) {
    exit;
}

// Only run if explicitly requested
if (!defined('AZIT_IMPORT_CONTENT') || !AZIT_IMPORT_CONTENT) {
    return;
}

/**
 * Create sample pages
 */
function azit_create_sample_pages() {
    $pages = array(
        array(
            'title'    => 'Accueil',
            'slug'     => 'accueil',
            'content'  => 'Bienvenue sur AZIT - Solutions de Communication Industrielle',
            'template' => '',
            'front'    => true,
        ),
        array(
            'title'    => 'À propos d\'AZIT',
            'slug'     => 'a-propos-azit',
            'content'  => '<h2>Notre Histoire</h2>
<p>Fondée en 2003, AZIT est devenue un leader européen dans les solutions de communication industrielle.</p>

<h2>Notre Mission</h2>
<p>Fournir des solutions de communication industrielle sécurisées et conformes aux normes internationales.</p>

<h2>Nos Valeurs</h2>
<ul>
<li>Excellence technique</li>
<li>Innovation continue</li>
<li>Satisfaction client</li>
<li>Accessibilité pour tous</li>
</ul>',
            'template' => '',
        ),
        array(
            'title'    => 'À propos d\'ISIT',
            'slug'     => 'a-propos-isit',
            'content'  => '<h2>ISIT - Institut pour la Sécurité Industrielle et les Technologies</h2>
<p>ISIT est notre centre de recherche et développement spécialisé dans les protocoles de communication sécurisés.</p>',
            'template' => '',
        ),
        array(
            'title'    => 'Équipe',
            'slug'     => 'equipe',
            'content'  => '<h2>Notre Équipe d\'Experts</h2>
<p>Plus de 50 ingénieurs certifiés en sécurité fonctionnelle et protocoles industriels.</p>',
            'template' => '',
        ),
        array(
            'title'    => 'Carrières',
            'slug'     => 'carrieres',
            'content'  => '<h2>Rejoignez Notre Équipe</h2>
<p>Nous recherchons des talents passionnés par l\'innovation industrielle.</p>

<h3>Postes Ouverts</h3>
<ul>
<li>Ingénieur Protocoles - Paris</li>
<li>Développeur Embarqué - Lyon</li>
<li>Chef de Projet Technique - Paris</li>
</ul>',
            'template' => '',
        ),
        array(
            'title'    => 'Contact',
            'slug'     => 'contact',
            'content'  => '[contact-form-7 id="contact-form" title="Formulaire de Contact"]

<h2>Nos Coordonnées</h2>
<address>
<strong>AZIT</strong><br>
123 Avenue de l\'Industrie<br>
75000 Paris, France<br>
<br>
<strong>Téléphone:</strong> +33 1 23 45 67 89<br>
<strong>Email:</strong> contact@azit.com
</address>',
            'template' => 'page-templates/template-contact.php',
        ),
        array(
            'title'    => 'Expertise',
            'slug'     => 'expertise',
            'content'  => '<p>Découvrez nos domaines d\'expertise en communication industrielle.</p>',
            'template' => 'page-templates/template-expertise.php',
        ),
        array(
            'title'    => 'Mentions Légales',
            'slug'     => 'mentions-legales',
            'content'  => '<h2>Éditeur du Site</h2>
<p>AZIT SAS<br>
Capital social : 100 000 €<br>
RCS Paris B 123 456 789<br>
SIRET : 123 456 789 00001</p>

<h2>Directeur de la Publication</h2>
<p>M. Jean Dupont, Président</p>

<h2>Hébergement</h2>
<p>OVH SAS<br>
2 rue Kellermann<br>
59100 Roubaix, France</p>',
            'template' => '',
        ),
        array(
            'title'    => 'Politique de Confidentialité',
            'slug'     => 'politique-confidentialite',
            'content'  => '<h2>Protection des Données Personnelles</h2>
<p>Conformément au RGPD, nous nous engageons à protéger vos données personnelles.</p>

<h2>Données Collectées</h2>
<ul>
<li>Nom et prénom</li>
<li>Adresse email</li>
<li>Numéro de téléphone (optionnel)</li>
</ul>

<h2>Utilisation des Données</h2>
<p>Vos données sont utilisées uniquement pour répondre à vos demandes de contact.</p>

<h2>Vos Droits</h2>
<p>Vous disposez d\'un droit d\'accès, de rectification et de suppression de vos données.</p>',
            'template' => '',
        ),
        array(
            'title'    => 'Accessibilité',
            'slug'     => 'accessibilite',
            'content'  => '',
            'template' => 'page-templates/template-accessibility.php',
        ),
        array(
            'title'    => 'Plan du Site',
            'slug'     => 'plan-du-site',
            'content'  => '<h2>Pages Principales</h2>
<ul>
<li><a href="/">Accueil</a></li>
<li><a href="/expertise/">Expertise</a></li>
<li><a href="/produits/">Produits</a></li>
<li><a href="/formations/">Formations</a></li>
<li><a href="/contact/">Contact</a></li>
</ul>

<h2>Informations</h2>
<ul>
<li><a href="/a-propos-azit/">À propos d\'AZIT</a></li>
<li><a href="/equipe/">Équipe</a></li>
<li><a href="/carrieres/">Carrières</a></li>
</ul>

<h2>Légal</h2>
<ul>
<li><a href="/mentions-legales/">Mentions Légales</a></li>
<li><a href="/politique-confidentialite/">Politique de Confidentialité</a></li>
<li><a href="/accessibilite/">Accessibilité</a></li>
</ul>',
            'template' => '',
        ),
    );

    foreach ($pages as $page_data) {
        // Check if page exists
        $existing = get_page_by_path($page_data['slug']);
        if ($existing) {
            continue;
        }

        $page_args = array(
            'post_title'   => $page_data['title'],
            'post_name'    => $page_data['slug'],
            'post_content' => $page_data['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_author'  => 1,
        );

        $page_id = wp_insert_post($page_args);

        if ($page_id && !is_wp_error($page_id)) {
            // Set template
            if (!empty($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }

            // Set as front page
            if (!empty($page_data['front'])) {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page_id);
            }

            echo "Created page: {$page_data['title']}\n";
        }
    }
}

/**
 * Create sample expertise posts
 */
function azit_create_sample_expertise() {
    $expertise_posts = array(
        array(
            'title'       => 'Conformité Sécurité',
            'slug'        => 'conformite-securite',
            'content'     => '<p>Notre expertise en conformité sécurité couvre les normes IEC 61508, ISO 26262, EN 50129 et bien plus.</p>

<h2>Services</h2>
<ul>
<li>Analyse de sécurité fonctionnelle</li>
<li>Certification SIL/ASIL</li>
<li>Audit de conformité</li>
<li>Formation aux normes</li>
</ul>

<h2>Normes Couvertes</h2>
<ul>
<li>IEC 61508 - Sécurité fonctionnelle</li>
<li>ISO 26262 - Automobile</li>
<li>EN 50129 - Ferroviaire</li>
<li>IEC 62443 - Cybersécurité industrielle</li>
</ul>',
            'excerpt'     => 'Expertise en conformité aux normes de sécurité fonctionnelle IEC 61508, ISO 26262, EN 50129.',
            'fields'      => array(
                'expertise_subtitle'          => 'Normes IEC 61508, ISO 26262, EN 50129',
                'expertise_short_description' => 'Conformité aux normes de sécurité fonctionnelle pour systèmes critiques.',
            ),
        ),
        array(
            'title'       => 'Développement Protocole',
            'slug'        => 'developpement-protocole',
            'content'     => '<p>Développement et implémentation de protocoles de communication industriels.</p>

<h2>Protocoles Maîtrisés</h2>
<ul>
<li>PROFINET / PROFIBUS</li>
<li>EtherNet/IP</li>
<li>EtherCAT</li>
<li>CANopen / DeviceNet</li>
<li>Modbus TCP/RTU</li>
<li>OPC UA</li>
</ul>

<h2>Services</h2>
<ul>
<li>Implémentation de piles protocolaires</li>
<li>Certification et tests de conformité</li>
<li>Développement de profils d\'application</li>
<li>Intégration multi-protocoles</li>
</ul>',
            'excerpt'     => 'Développement de protocoles industriels: PROFINET, EtherNet/IP, EtherCAT, OPC UA.',
            'fields'      => array(
                'expertise_subtitle'          => 'PROFINET, EtherNet/IP, EtherCAT, OPC UA',
                'expertise_short_description' => 'Implémentation et certification de protocoles de communication industriels.',
            ),
        ),
        array(
            'title'       => 'Test & Validation',
            'slug'        => 'test-validation',
            'content'     => '<p>Services complets de test et validation pour systèmes de communication industriels.</p>

<h2>Types de Tests</h2>
<ul>
<li>Tests de conformité protocolaire</li>
<li>Tests d\'interopérabilité</li>
<li>Tests de performance</li>
<li>Tests de robustesse</li>
<li>Tests de sécurité</li>
</ul>

<h2>Environnements de Test</h2>
<ul>
<li>Laboratoire accrédité</li>
<li>Simulateurs HIL/SIL</li>
<li>Bancs de test automatisés</li>
</ul>',
            'excerpt'     => 'Services de test et validation: conformité, interopérabilité, performance, sécurité.',
            'fields'      => array(
                'expertise_subtitle'          => 'Conformité, Interopérabilité, Performance',
                'expertise_short_description' => 'Tests complets pour systèmes de communication industriels.',
            ),
        ),
        array(
            'title'       => 'Réseaux Industriels',
            'slug'        => 'reseaux-industriels',
            'content'     => '<p>Conception et déploiement de réseaux de communication industriels.</p>

<h2>Services</h2>
<ul>
<li>Architecture réseau</li>
<li>Audit d\'infrastructure</li>
<li>Migration vers Ethernet industriel</li>
<li>Sécurisation des réseaux OT</li>
</ul>

<h2>Technologies</h2>
<ul>
<li>TSN (Time-Sensitive Networking)</li>
<li>Industrial Ethernet</li>
<li>Réseaux déterministes</li>
<li>Redondance et haute disponibilité</li>
</ul>',
            'excerpt'     => 'Architecture et déploiement de réseaux industriels: TSN, Ethernet industriel.',
            'fields'      => array(
                'expertise_subtitle'          => 'TSN, Ethernet Industriel, Sécurité OT',
                'expertise_short_description' => 'Conception et sécurisation de réseaux de communication industriels.',
            ),
        ),
    );

    foreach ($expertise_posts as $index => $post_data) {
        // Check if post exists
        $existing = get_page_by_path($post_data['slug'], OBJECT, 'expertise');
        if ($existing) {
            continue;
        }

        $post_args = array(
            'post_title'   => $post_data['title'],
            'post_name'    => $post_data['slug'],
            'post_content' => $post_data['content'],
            'post_excerpt' => $post_data['excerpt'],
            'post_status'  => 'publish',
            'post_type'    => 'expertise',
            'post_author'  => 1,
            'menu_order'   => $index + 1,
        );

        $post_id = wp_insert_post($post_args);

        if ($post_id && !is_wp_error($post_id)) {
            // Set custom fields
            if (!empty($post_data['fields'])) {
                foreach ($post_data['fields'] as $key => $value) {
                    update_post_meta($post_id, $key, $value);
                }
            }

            echo "Created expertise: {$post_data['title']}\n";
        }
    }
}

/**
 * Create sample products
 */
function azit_create_sample_products() {
    $products = array(
        array(
            'title'   => 'ISI Gateway',
            'slug'    => 'isi-gateway',
            'content' => '<p>Passerelle multi-protocoles pour l\'interconnexion de réseaux industriels.</p>

<h2>Caractéristiques</h2>
<ul>
<li>Support PROFINET, EtherNet/IP, Modbus</li>
<li>Conversion en temps réel</li>
<li>Configuration via interface web</li>
<li>Boîtier industriel IP65</li>
</ul>',
            'excerpt' => 'Passerelle multi-protocoles industrielle pour PROFINET, EtherNet/IP, Modbus.',
            'fields'  => array(
                'product_price'    => 'Sur devis',
                'product_category' => 'Passerelles',
            ),
        ),
        array(
            'title'   => 'Protocol Stack PROFINET',
            'slug'    => 'protocol-stack-profinet',
            'content' => '<p>Pile protocolaire PROFINET certifiée pour intégration dans vos produits.</p>

<h2>Caractéristiques</h2>
<ul>
<li>Conformance Class A, B, C</li>
<li>RT et IRT support</li>
<li>API C portable</li>
<li>Documentation complète</li>
</ul>',
            'excerpt' => 'Pile protocolaire PROFINET certifiée - Classes A, B, C avec support RT/IRT.',
            'fields'  => array(
                'product_price'    => 'Licence annuelle',
                'product_category' => 'Piles Protocolaires',
            ),
        ),
        array(
            'title'   => 'Simulateur Industriel',
            'slug'    => 'simulateur-industriel',
            'content' => '<p>Environnement de simulation complet pour le développement et les tests.</p>

<h2>Caractéristiques</h2>
<ul>
<li>Simulation multi-protocoles</li>
<li>Mode HIL et SIL</li>
<li>Scripting Python</li>
<li>Interface graphique intuitive</li>
</ul>',
            'excerpt' => 'Simulateur multi-protocoles pour développement et validation - HIL/SIL.',
            'fields'  => array(
                'product_price'    => 'À partir de 5000€',
                'product_category' => 'Outils de Développement',
            ),
        ),
    );

    foreach ($products as $post_data) {
        $existing = get_page_by_path($post_data['slug'], OBJECT, 'product');
        if ($existing) {
            continue;
        }

        $post_args = array(
            'post_title'   => $post_data['title'],
            'post_name'    => $post_data['slug'],
            'post_content' => $post_data['content'],
            'post_excerpt' => $post_data['excerpt'],
            'post_status'  => 'publish',
            'post_type'    => 'product',
            'post_author'  => 1,
        );

        $post_id = wp_insert_post($post_args);

        if ($post_id && !is_wp_error($post_id)) {
            if (!empty($post_data['fields'])) {
                foreach ($post_data['fields'] as $key => $value) {
                    update_post_meta($post_id, $key, $value);
                }
            }
            echo "Created product: {$post_data['title']}\n";
        }
    }
}

/**
 * Create sample training
 */
function azit_create_sample_training() {
    $training_courses = array(
        array(
            'title'   => 'Formation PROFINET - Fondamentaux',
            'slug'    => 'formation-profinet-fondamentaux',
            'content' => '<p>Formation complète aux fondamentaux du protocole PROFINET. Membre du PI (PROFINET International), AZIT propose une formation alliant théorie et pratique.</p>',
            'excerpt' => 'Maîtrisez les fondamentaux du protocole PROFINET en 3 jours.',
            'category' => 'Protocol Training',
            'fields'  => array(
                'training_duration'         => '3 jours (21 heures)',
                'training_price'            => '1 500 € HT',
                'training_private_price'    => 'Sur demande',
                'training_level'            => 'beginner',
                'training_format'           => 'onsite',
                'training_certification'    => true,
                'training_max_participants' => 'Jusqu\'à 6',
                'training_instructor'       => 'Ingénieur expert avec 20+ ans d\'expérience en réseaux industriels et systèmes temps réel.',
            ),
        ),
        array(
            'title'   => 'Formation Sécurité Fonctionnelle IEC 61508',
            'slug'    => 'formation-securite-fonctionnelle-iec-61508',
            'content' => '<p>Formation approfondie à la norme IEC 61508 pour la sécurité fonctionnelle des systèmes électriques, électroniques et électroniques programmables.</p>',
            'excerpt' => 'Formation complète IEC 61508 - Sécurité fonctionnelle et niveaux SIL.',
            'category' => 'Safety Standards',
            'fields'  => array(
                'training_duration'         => '4 jours (28 heures)',
                'training_price'            => '2 200 € HT',
                'training_private_price'    => 'Sur demande',
                'training_level'            => 'intermediate',
                'training_format'           => 'onsite',
                'training_certification'    => true,
                'training_max_participants' => 'Jusqu\'à 8',
                'training_instructor'       => 'Expert certifié en sécurité fonctionnelle avec 15+ ans d\'expérience dans l\'industrie.',
            ),
        ),
        array(
            'title'   => 'Formation EtherCAT Avancée',
            'slug'    => 'formation-ethercat-avancee',
            'content' => '<p>Formation avancée pour experts EtherCAT. Développement de slaves, Distributed Clocks, diagnostic et préparation à la certification CTT.</p>',
            'excerpt' => 'Formation avancée EtherCAT - Développement slaves et certification.',
            'category' => 'Protocol Training',
            'fields'  => array(
                'training_duration'         => '5 jours (35 heures)',
                'training_price'            => '3 000 € HT',
                'training_private_price'    => 'Sur demande',
                'training_level'            => 'advanced',
                'training_format'           => 'onsite',
                'training_certification'    => true,
                'training_max_participants' => 'Jusqu\'à 6',
                'training_instructor'       => 'Ingénieur spécialisé EtherCAT avec une expertise approfondie en développement d\'esclaves et certification CTT.',
            ),
        ),
    );

    foreach ($training_courses as $post_data) {
        $existing = get_page_by_path($post_data['slug'], OBJECT, 'training');
        if ($existing) {
            continue;
        }

        $post_args = array(
            'post_title'   => $post_data['title'],
            'post_name'    => $post_data['slug'],
            'post_content' => $post_data['content'],
            'post_excerpt' => $post_data['excerpt'],
            'post_status'  => 'publish',
            'post_type'    => 'training',
            'post_author'  => 1,
        );

        $post_id = wp_insert_post($post_args);

        if ($post_id && !is_wp_error($post_id)) {
            if (!empty($post_data['fields'])) {
                foreach ($post_data['fields'] as $key => $value) {
                    update_post_meta($post_id, $key, $value);
                }
            }

            // Assign training category taxonomy
            if (!empty($post_data['category'])) {
                wp_set_object_terms($post_id, $post_data['category'], 'training_category');
            }

            echo "Created training: {$post_data['title']}\n";
        }
    }
}

/**
 * Create navigation menus
 */
function azit_create_sample_menus() {
    // Create Top Menu
    $top_menu_name = 'Top Menu';
    $top_menu_exists = wp_get_nav_menu_object($top_menu_name);

    if (!$top_menu_exists) {
        $top_menu_id = wp_create_nav_menu($top_menu_name);

        wp_update_nav_menu_item($top_menu_id, 0, array(
            'menu-item-title'  => 'À propos',
            'menu-item-url'    => home_url('/a-propos-azit/'),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($top_menu_id, 0, array(
            'menu-item-title'  => 'Carrières',
            'menu-item-url'    => home_url('/carrieres/'),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($top_menu_id, 0, array(
            'menu-item-title'  => 'Contact',
            'menu-item-url'    => home_url('/contact/'),
            'menu-item-status' => 'publish',
        ));

        // Assign to location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['top-menu'] = $top_menu_id;
        set_theme_mod('nav_menu_locations', $locations);

        echo "Created menu: {$top_menu_name}\n";
    }

    // Create Primary Menu
    $primary_menu_name = 'Primary Menu';
    $primary_menu_exists = wp_get_nav_menu_object($primary_menu_name);

    if (!$primary_menu_exists) {
        $primary_menu_id = wp_create_nav_menu($primary_menu_name);

        wp_update_nav_menu_item($primary_menu_id, 0, array(
            'menu-item-title'  => 'Expertise',
            'menu-item-url'    => home_url('/expertise/'),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($primary_menu_id, 0, array(
            'menu-item-title'  => 'Produits',
            'menu-item-url'    => get_post_type_archive_link('product'),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($primary_menu_id, 0, array(
            'menu-item-title'  => 'Formations',
            'menu-item-url'    => get_post_type_archive_link('training'),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($primary_menu_id, 0, array(
            'menu-item-title'  => 'Contact',
            'menu-item-url'    => home_url('/contact/'),
            'menu-item-status' => 'publish',
        ));

        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $primary_menu_id;
        set_theme_mod('nav_menu_locations', $locations);

        echo "Created menu: {$primary_menu_name}\n";
    }

    // Create Footer Menu
    $footer_menu_name = 'Footer Menu';
    $footer_menu_exists = wp_get_nav_menu_object($footer_menu_name);

    if (!$footer_menu_exists) {
        $footer_menu_id = wp_create_nav_menu($footer_menu_name);

        wp_update_nav_menu_item($footer_menu_id, 0, array(
            'menu-item-title'  => 'Mentions Légales',
            'menu-item-url'    => home_url('/mentions-legales/'),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($footer_menu_id, 0, array(
            'menu-item-title'  => 'Confidentialité',
            'menu-item-url'    => home_url('/politique-confidentialite/'),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($footer_menu_id, 0, array(
            'menu-item-title'  => 'Accessibilité',
            'menu-item-url'    => home_url('/accessibilite/'),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($footer_menu_id, 0, array(
            'menu-item-title'  => 'Plan du Site',
            'menu-item-url'    => home_url('/plan-du-site/'),
            'menu-item-status' => 'publish',
        ));

        $locations = get_theme_mod('nav_menu_locations');
        $locations['footer'] = $footer_menu_id;
        set_theme_mod('nav_menu_locations', $locations);

        echo "Created menu: {$footer_menu_name}\n";
    }
}

/**
 * Run all imports
 */
function azit_import_all_content() {
    echo "Starting AZIT content import...\n\n";

    azit_create_sample_pages();
    azit_create_sample_expertise();
    azit_create_sample_products();
    azit_create_sample_training();
    azit_create_sample_menus();

    // Flush rewrite rules
    flush_rewrite_rules();

    echo "\nContent import complete!\n";
}

// Run import
azit_import_all_content();
