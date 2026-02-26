# ISIT Training Data Extraction Guide for WordPress ACF
## Instructions for Claude Code

### Overview
Extract training program data from ISIT website (https://isit.fr) to populate ACF "G Program" tabs in the WordPress mockup site.

---

## Data Structure for Each Training

### Required Fields for ACF "G Program" Tab:
```json
{
  "post_slug": "formation-j1939",
  "language": "fr",  // or "en"
  "title": "Formation J1939",
  "objectives": "...",  // Objectifs pédagogiques / Training Goals
  "programme": "...",   // Programme détaillé / Detailed program
  "duration": "2 jours (14 heures)",
  "price": "1 390,00 €",
  "target_audience": "...",  // Public concerné / Target Audience
  "prerequisites": "...",     // Prérequis / Requirements
  "pdf_brochure_url": "https://isit.fr/uploads/files/produit/..."
}
```

---

## Training URLs to Process

### French Trainings (https://isit.fr/fr/formations/formations.php)
```
1. https://isit.fr/fr/formation/formation-j1939.php
2. https://isit.fr/fr/formation/formation-canopen.php
3. https://isit.fr/fr/formation/formation-norme-avionique-do178c-1.php
4. https://isit.fr/fr/formation/formation-norme-medicale-iec-62304.php
5. https://isit.fr/fr/formation/formation-ethercat.php
6. https://isit.fr/fr/formation/formation-norme-medicale-iec-81001-5-1.php
7. https://isit.fr/fr/formation/formation-ethernet-industriel.php
8. https://isit.fr/fr/formation/formation-ethernet-ip-cip.php
... (continue for all visible on listing page)
```

### English Trainings (https://isit.fr/en/formations/training.php)
```
1. https://isit.fr/en/formation/j1939-training.php
2. https://isit.fr/en/formation/canopen-training.php
3. https://isit.fr/en/formation/ethercat-training.php
4. https://isit.fr/en/formation/iec-81001-5-1-medical-standard-training.php
5. https://isit.fr/en/formation/secure-by-design-training-cybersecurity-software-and-embedded-systems.php
6. https://isit.fr/en/formation/cyber-resilience-act-cra-training.php
7. https://isit.fr/en/formation/can-training.php
8. https://isit.fr/en/formation/misra-c-training.php
... (continue for all visible on listing page)
```

---

## Extraction Strategy

### Step 1: Extract from Web Pages
For each training URL, extract from the HTML:
- **Title**: `<h1>` tag content
- **Objectives**: Text under heading containing "Objectifs" or "Goal"
- **Duration**: Text near "Durée" or "Duration"
- **Price**: Text near "Tarif" or "Prices"
- **Target Audience**: Text under "Public concerné" or "Target Audience"
- **Prerequisites**: Text under "Prérequis" or "Requirements"
- **PDF URL**: Link with text "Téléchargez la plaquette" or "Download the brochure"

### Step 2: Extract Programme from PDF
The detailed **programme** is ONLY available in the PDF brochure. You need to:
1. Download each PDF from the extracted URL
2. Extract text from PDF
3. Look for section titled "Programme" or "Program"
4. Extract the day-by-day breakdown (typically "Jour 1:", "Jour 2:", etc.)

**Example Programme Format:**
```
Jour 1 :
• Introduction au protocole J1939
• Architecture et couches du modèle
• Mécanismes de communication
• Format des trames
• Gestion des priorités

Jour 2 :
• Services applicatifs
• Diagnostic et troubleshooting
• Exemples d'implémentation
• TP pratiques
```

---

## Sample Extraction (Based on fetched data)

### Training 1: Formation J1939 (FR)

```json
{
  "post_slug": "formation-j1939",
  "language": "fr",
  "title": "Formation J1939",
  "url": "https://isit.fr/fr/formation/formation-j1939.php",
  
  "objectives": "Savant mélange entre théorie et pratique, cette formation J1939 a pour objectifs de présenter les principaux mécanismes de communication du protocole J1939 et d'accompagner de manière efficace et concrète nos clients dans l'implémentation d'une pile logicielle, en présentant quelques exemples de messagerie afin de permettre une compréhension et une mise en œuvre rapide de ce protocole.",
  
  "duration": "2 jours (14 heures)",
  
  "price": "1 390,00 €",
  
  "target_audience": "Ce stage s'adresse aux Chefs de projets, ingénieurs et techniciens pouvant être amenés à mettre en œuvre un réseau J1939 ou participer au développement d'applications J1939.",
  
  "prerequisites": "Notions sur les réseaux de terrains et l'informatique industrielle.",
  
  "pdf_brochure_url": "https://isit.fr/uploads/files/produit/formation-j1939_brochure-sae-j1939-20241018-vv.pdf",
  
  "programme": "[TO BE EXTRACTED FROM PDF]"
}
```

### Training 1: J1939 Training (EN)

```json
{
  "post_slug": "j1939-training",
  "language": "en",
  "title": "J1939 Training",
  "url": "https://isit.fr/en/formation/j1939-training.php",
  
  "objectives": "A skilful blend of theory and practice, this J1939 training course aims to present the main communication mechanisms of the J1939 protocol, and to provide our customers with effective, practical support in implementing a software stack, by presenting a few messaging examples to enable rapid understanding and implementation of this protocol.",
  
  "duration": "2 days (14 hours)",
  
  "price": "1 390,00 €",
  
  "target_audience": "This course is aimed at project managers, engineers and technicians who may be required to implement a J1939 network or participate in the development of J1939 applications.",
  
  "prerequisites": "Basic knowledge of field networks and industrial computing.",
  
  "pdf_brochure_url": "https://isit.fr/uploads/files/produit/formation-j1939_brochure-sae-j1939-20241018-vv.pdf",
  
  "programme": "[TO BE EXTRACTED FROM PDF]"
}
```

---

## WordPress ACF Implementation

### ACF Field Group: "Training Program" (G Program Tab)

```php
// ACF Fields Configuration
'program_tab' => [
    'type' => 'tab',
    'label' => 'Program',
    'fields' => [
        'objectives' => [
            'type' => 'wysiwyg',
            'label' => 'Pedagogical Objectives',
            'name' => 'objectives'
        ],
        'programme' => [
            'type' => 'wysiwyg',
            'label' => 'Detailed Program',
            'name' => 'programme'
        ],
        'duration' => [
            'type' => 'text',
            'label' => 'Duration',
            'name' => 'duration'
        ],
        'price' => [
            'type' => 'text',
            'label' => 'Price',
            'name' => 'price'
        ],
        'target_audience' => [
            'type' => 'textarea',
            'label' => 'Target Audience',
            'name' => 'target_audience'
        ],
        'prerequisites' => [
            'type' => 'textarea',
            'label' => 'Prerequisites',
            'name' => 'prerequisites'
        ],
        'pdf_brochure_url' => [
            'type' => 'url',
            'label' => 'PDF Brochure URL',
            'name' => 'pdf_brochure_url'
        ]
    ]
]
```

### Sample PHP Code to Populate ACF Fields

```php
<?php
// Import training data into WordPress with ACF
function import_training_data($training_data) {
    // Create or update post
    $post_id = wp_insert_post([
        'post_title' => $training_data['title'],
        'post_name' => $training_data['post_slug'],
        'post_type' => 'training', // Your custom post type
        'post_status' => 'publish'
    ]);
    
    // Update ACF fields
    update_field('objectives', $training_data['objectives'], $post_id);
    update_field('programme', $training_data['programme'], $post_id);
    update_field('duration', $training_data['duration'], $post_id);
    update_field('price', $training_data['price'], $post_id);
    update_field('target_audience', $training_data['target_audience'], $post_id);
    update_field('prerequisites', $training_data['prerequisites'], $post_id);
    update_field('pdf_brochure_url', $training_data['pdf_brochure_url'], $post_id);
    
    return $post_id;
}
?>
```

---

## Next Steps for Claude Code

### Task 1: Complete URL Collection
1. Visit https://isit.fr/fr/formations/formations.php
2. Extract ALL training card URLs (look for links containing `/formation/`)
3. Do the same for https://isit.fr/en/formations/training.php

### Task 2: Scrape Each Training Page
For each URL:
1. Extract the fields listed above
2. Download the PDF brochure
3. Extract the "Programme" section from PDF

### Task 3: Generate Import Files
Create two files:
1. **isit_trainings_data.json** - Complete structured data
2. **acf_import.php** - WordPress script to populate ACF fields

### Task 4: WordPress Implementation
1. Ensure ACF plugin is installed
2. Create field group "G Program" with fields above
3. Run import script to populate all training posts

---

## Tools Needed for Claude Code

### Python Libraries
```bash
pip install requests beautifulsoup4 PyPDF2 lxml
```

### Sample Scraper Code
See `isit_training_scraper.py` for full implementation.

---

## Validation Checklist

- [ ] All training URLs extracted from both FR and EN listing pages
- [ ] Each training has complete metadata (title, duration, price, etc.)
- [ ] Objectives extracted from web page
- [ ] Programme extracted from PDF brochure
- [ ] Data formatted for ACF import
- [ ] WordPress custom post type "training" created
- [ ] ACF field group configured correctly
- [ ] Import script tested on staging environment
- [ ] All trainings visible in WordPress admin
- [ ] Frontend displays all ACF fields correctly

---

## Contact Information

**For questions about the scraper or data structure:**
- Email: formation@isit.fr
- Phone: 05 61 30 69 00

**ISIT Website:**
- French: https://isit.fr/fr/formations/formations.php
- English: https://isit.fr/en/formations/training.php

---

*Generated by ISIT Training Data Extraction Tool*
*Date: February 2026*
