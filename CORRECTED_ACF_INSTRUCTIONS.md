# ISIT Training Data Migration - CORRECTED Instructions

## 📋 OVERVIEW

**Goal**: Extract training program data from https://isit.fr and populate the ACF **"Program" tab** in the WordPress mockup site

**WordPress Setup**:
- Plugin: ACF (Advanced Custom Fields)
- Tab Name: "Program"
- Fields to populate: Objectives and Programme

---

## 🎯 WHAT TO EXTRACT

From each training session on https://isit.fr:

1. **Objectifs pédagogiques** (FR) / **Training Goals** (EN)
   - Found on the web page
   - Section under "Objectifs de la formation" heading

2. **Programme** (FR) / **Program** (EN)
   - **ONLY in PDF brochures** (not on web pages!)
   - Day-by-day breakdown of training content
   - Example:
     ```
     Jour 1 :
     • Introduction au protocole
     • Architecture et couches
     • Mécanismes de communication
     
     Jour 2 :
     • Services applicatifs
     • TP pratiques
     ```

---

## 📝 DATA STRUCTURE FOR ACF

### ACF Tab: "Program"

**Field 1: `objectives`** (WYSIWYG)
```
Content: Pedagogical objectives text from web page
Example: "Savant mélange entre théorie et pratique, cette formation..."
```

**Field 2: `programme`** (WYSIWYG)
```
Content: Day-by-day program from PDF brochure
Example: 
Jour 1 :
• Topic 1
• Topic 2

Jour 2 :
• Topic 3
• Topic 4
```

---

## 🔍 EXTRACTION PROCESS

### Step 1: Get Training URLs

**French trainings**: https://isit.fr/fr/formations/formations.php
**English trainings**: https://isit.fr/en/formations/training.php

Extract all links like:
- `/fr/formation/formation-j1939.php`
- `/en/formation/j1939-training.php`

---

### Step 2: For Each Training Page

Extract from HTML:
- Title
- **Objectives** (section under "Objectifs de la formation" or "Training Goal")
- PDF brochure URL (link "Téléchargez la plaquette" / "Download the brochure")
- Duration, Price, etc. (bonus info)

---

### Step 3: Extract Programme from PDF

**Critical**: The programme is ONLY in the PDF!

1. Download PDF from brochure URL
2. Extract text using PyPDF2 or similar
3. Find "Programme" section
4. Copy the day-by-day content

---

## 💾 OUTPUT FORMAT

```json
{
  "post_slug": "formation-j1939",
  "language": "fr",
  "acf_fields": {
    "objectives": "Text from web page under 'Objectifs de la formation'",
    "programme": "Day-by-day content extracted from PDF brochure"
  }
}
```

---

## 🎨 ACF CONFIGURATION IN WORDPRESS

### Field Group: "Training Details"

```php
'fields' => [
    [
        'key' => 'field_program_tab',
        'label' => 'Program',          // ← TAB NAME
        'name' => '',
        'type' => 'tab',
    ],
    [
        'key' => 'field_objectives',
        'label' => 'Pedagogical Objectives',
        'name' => 'objectives',        // ← FIELD 1
        'type' => 'wysiwyg',
    ],
    [
        'key' => 'field_programme',
        'label' => 'Detailed Program',
        'name' => 'programme',         // ← FIELD 2
        'type' => 'wysiwyg',
    ],
]
```

---

## 📋 SAMPLE DATA

### Training: Formation J1939 (French)

**URL**: https://isit.fr/fr/formation/formation-j1939.php

**ACF Field `objectives`** (from web page):
```
Savant mélange entre théorie et pratique, cette formation J1939 
a pour objectifs de présenter les principaux mécanismes de 
communication du protocole J1939 et d'accompagner de manière 
efficace et concrète nos clients dans l'implémentation d'une 
pile logicielle, en présentant quelques exemples de messagerie 
afin de permettre une compréhension et une mise en œuvre rapide 
de ce protocole.
```

**ACF Field `programme`** (from PDF):
```
[TO BE EXTRACTED FROM: 
https://isit.fr/uploads/files/produit/formation-j1939_brochure-sae-j1939-20241018-vv.pdf]

Expected format:
Jour 1 :
• Présentation générale du protocole SAE J1939
• Architecture et couches du modèle
• Format des trames et adressage
• ...

Jour 2 :
• Services applicatifs J1939
• Diagnostic et maintenance
• Exemples pratiques
• ...
```

---

## ✅ SUCCESS CHECKLIST

For Claude Code to verify:

- [ ] All training URLs collected from listing pages (FR + EN)
- [ ] Each training has `objectives` extracted from web page
- [ ] Each training has `programme` extracted from PDF brochure
- [ ] Data formatted in JSON ready for WordPress import
- [ ] ACF "Program" tab configured in WordPress
- [ ] Import script populates both `objectives` and `programme` fields
- [ ] Frontend displays both fields correctly

---

## 🎯 QUICK REFERENCE

**Plugin**: ACF (Advanced Custom Fields)
**Tab**: "Program"
**Fields to populate**:
1. `objectives` - from web page
2. `programme` - from PDF brochure (CRITICAL!)

**Key URLs**:
- FR listings: https://isit.fr/fr/formations/formations.php
- EN listings: https://isit.fr/en/formations/training.php
- Example training: https://isit.fr/fr/formation/formation-j1939.php
- Example PDF: https://isit.fr/uploads/files/produit/formation-j1939_brochure-sae-j1939-20241018-vv.pdf

---

**Note**: All previous files remain valid - just replace "G Program tab" references with "Program tab"
