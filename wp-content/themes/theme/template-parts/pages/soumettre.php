<?php
/**
 * Template part : Page "Soumettre un projet" – Processus en 5 étapes
 * Ordre : 1-Porteur, 2-Identification, 3-Problématique, 4-Mise en œuvre, 5-Vérification
 * Conforme au formulaire officiel TGF_Formulaire_Soumission_Projet
 *
 * @package TogoGreenFund
 */

// Récupération de l'étape courante (1-5), par défaut 1
$current_step = isset($_GET['step']) ? intval($_GET['step']) : 1;
if ($current_step < 1 || $current_step > 5) $current_step = 1;

// Données du formulaire stockées en session ou en hidden fields
$form_data = array();
for ($i = 1; $i <= 5; $i++) {
    $step_key = 'step_' . $i . '_data';
    if (isset($_POST[$step_key])) {
        $form_data[$i] = json_decode(stripslashes($_POST[$step_key]), true);
    } elseif (isset($_GET[$step_key])) {
        $form_data[$i] = json_decode(stripslashes($_GET[$step_key]), true);
    }
}

// Traitement du formulaire - chaque étape sauvegarde ses données
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_step'])) {
    $step = intval($_POST['step']);
    $step_data = array();
    
    // Gestion des fichiers uploadés
    $uploaded_files = array();
    $upload_dir = wp_upload_dir();
    $tgf_upload_dir = $upload_dir['basedir'] . '/tgf-soumissions/';
    
    // Créer le répertoire s'il n'existe pas
    if (!file_exists($tgf_upload_dir)) {
        wp_mkdir_p($tgf_upload_dir);
    }
    
    // Fonction pour gérer l'upload de fichier
    function handle_file_upload($file_key, $upload_dir, &$uploaded_files) {
        if (isset($_FILES[$file_key]) && $_FILES[$file_key]['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES[$file_key];
            $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $file_name = sanitize_file_name(pathinfo($file['name'], PATHINFO_FILENAME));
            $new_name = $file_name . '_' . uniqid() . '.' . $file_ext;
            $destination = $upload_dir . $new_name;
            
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $uploaded_files[$file_key] = $new_name;
                return $file['name'];
            }
        }
        return null;
    }
    
    switch($step) {
        case 1: // PORTEUR DE PROJET ET CONTACT
            // Gestion des fichiers
            $file_statuts = handle_file_upload('fichier_statuts', $tgf_upload_dir, $uploaded_files);
            $file_pouvoir = handle_file_upload('fichier_pouvoir', $tgf_upload_dir, $uploaded_files);
            $file_attestations = handle_file_upload('fichier_attestations', $tgf_upload_dir, $uploaded_files);
            $file_autre = handle_file_upload('fichier_autre', $tgf_upload_dir, $uploaded_files);
            
            $step_data = array(
                'type_porteur' => sanitize_text_field($_POST['type_porteur'] ?? ''),
                'presentation_porteur' => sanitize_textarea_field($_POST['presentation_porteur'] ?? ''),
                'nom_responsable' => sanitize_text_field($_POST['nom_responsable'] ?? ''),
                'fonction_responsable' => sanitize_text_field($_POST['fonction_responsable'] ?? ''),
                'adresse' => sanitize_textarea_field($_POST['adresse'] ?? ''),
                'telephone' => sanitize_text_field($_POST['telephone'] ?? ''),
                'email' => sanitize_email($_POST['email'] ?? ''),
                'piece_statuts' => isset($_POST['piece_statuts']) ? 1 : 0,
                'piece_pouvoir' => isset($_POST['piece_pouvoir']) ? 1 : 0,
                'piece_attestations' => isset($_POST['piece_attestations']) ? 1 : 0,
                'piece_autre' => sanitize_text_field($_POST['piece_autre'] ?? ''),
                'fichier_statuts_nom' => $file_statuts,
                'fichier_pouvoir_nom' => $file_pouvoir,
                'fichier_attestations_nom' => $file_attestations,
                'fichier_autre_nom' => $file_autre,
            );
            break;
        case 2: // IDENTIFICATION DU PROJET
            $step_data = array(
                'guichet' => sanitize_text_field($_POST['guichet'] ?? ''),
                'titre_projet' => sanitize_text_field($_POST['titre_projet'] ?? ''),
                'region' => sanitize_text_field($_POST['region'] ?? ''),
                'prefecture' => sanitize_text_field($_POST['prefecture'] ?? ''),
                'commune' => sanitize_text_field($_POST['commune'] ?? ''),
                'resume' => sanitize_textarea_field($_POST['resume'] ?? ''),
            );
            break;
        case 3: // PROBLÉMATIQUE ET OBJECTIFS
            $step_data = array(
                'problematique' => sanitize_textarea_field($_POST['problematique'] ?? ''),
                'objectifs_resultats' => sanitize_textarea_field($_POST['objectifs_resultats'] ?? ''),
                'beneficiaires_directs' => sanitize_text_field($_POST['beneficiaires_directs'] ?? ''),
                'beneficiaires_indirects' => sanitize_text_field($_POST['beneficiaires_indirects'] ?? ''),
                'caracteristiques_cibles' => sanitize_textarea_field($_POST['caracteristiques_cibles'] ?? ''),
                'impacts_attendus' => sanitize_textarea_field($_POST['impacts_attendus'] ?? ''),
            );
            break;
        case 4: // MISE EN ŒUVRE ET FINANCEMENT
            $file_budget = handle_file_upload('fichier_budget', $tgf_upload_dir, $uploaded_files);
            
            $step_data = array(
                'date_demarrage' => sanitize_text_field($_POST['date_demarrage'] ?? ''),
                'duree_mois' => sanitize_text_field($_POST['duree_mois'] ?? ''),
                'cout_global' => sanitize_text_field($_POST['cout_global'] ?? ''),
                'montant_sollicite' => sanitize_text_field($_POST['montant_sollicite'] ?? ''),
                'categorie_financement' => sanitize_text_field($_POST['categorie_financement'] ?? ''),
                'autres_sources' => sanitize_textarea_field($_POST['autres_sources'] ?? ''),
                'fichier_budget_nom' => $file_budget,
            );
            break;
        case 5: // VÉRIFICATION ET SOUMISSION
            // Gestion des multiples fichiers
            $fichiers_step5 = array();
            $file_keys = ['fichier_fiscal', 'fichier_non_faillite', 'fichier_capacite', 'fichier_registre', 'fichier_budget_previsionnel'];
            foreach ($file_keys as $key) {
                $file = handle_file_upload($key, $tgf_upload_dir, $uploaded_files);
                if ($file) {
                    $fichiers_step5[$key . '_nom'] = $file;
                }
            }
            
            $step_data = array(
                'declaration' => isset($_POST['declaration']) ? 1 : 0,
                'fait_a' => sanitize_text_field($_POST['fait_a'] ?? ''),
                'date_signature' => sanitize_text_field($_POST['date_signature'] ?? ''),
                'signature_nom' => sanitize_text_field($_POST['signature_nom'] ?? ''),
                'signature_qualite' => sanitize_text_field($_POST['signature_qualite'] ?? ''),
                'commentaire' => sanitize_textarea_field($_POST['commentaire'] ?? ''),
            );
            $step_data = array_merge($step_data, $fichiers_step5);
            break;
    }
    
    // Sauvegarde des données
    $step_key = 'step_' . $step . '_data';
    $step_data_json = json_encode($step_data);
    
    // Redirection vers l'étape suivante ou soumission finale
    if ($step === 5 && isset($_POST['submit_final'])) {
        // Traitement final de soumission
        $success_ref = 'TGF-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        wp_redirect(add_query_arg('soumission_success', $success_ref, get_permalink()));
        exit;
    } else {
        $next_step = $step + 1;
        $redirect_url = add_query_arg(
            array(
                'step' => $next_step,
                $step_key => $step_data_json
            ),
            get_permalink()
        );
        wp_redirect($redirect_url);
        exit;
    }
}

// Récupération des données pour l'étape actuelle
$current_data = isset($form_data[$current_step]) ? $form_data[$current_step] : array();

// Navigation - pour savoir quelles étapes sont complétées
$completed_steps = array();
for ($i = 1; $i < $current_step; $i++) {
    if (isset($form_data[$i]) && !empty($form_data[$i])) {
        $completed_steps[] = $i;
    }
}

// Liste des régions du Togo
$regions_togo = array(
    'Maritime', 'Plateaux', 'Centrale', 'Kara', 'Savanes'
);

// Liste des préfectures (exemples)
$prefectures_togo = array(
    'Golfe', 'Lacs', 'Zio', 'Haho', 'Ogou', 'Tchaoudjo', 'Kozah', 'Bassar', 'Tône', 'Oti'
);

// Guichets thématiques
$guichets = array(
    'Agriculture durable',
    'Forêts et biodiversité',
    'Eau et assainissement',
    'Énergies et infrastructures durables',
);

// Types de porteur
$types_porteur = array(
    'Institution / établissement public de l\'État',
    'Collectivité territoriale',
    'Organisation de la société civile / communautaire',
    'Entreprise ou acteur du secteur privé (y compris PME)',
    'Établissement de recherche ou d\'enseignement supérieur',
    'Groupement ou coopérative',
);

// Catégories de financement
$categories_financement = array(
    'Micro-projet (10 000 000 -- 20 000 000 FCFA)',
    'Petit projet (20 000 001 -- 50 000 000 FCFA)',
    'Projet moyen (50 000 001 -- 100 000 000 FCFA)',
    'Grand projet / stratégique (> 100 000 000 FCFA)',
);

$success_ref = isset($_GET['soumission_success']) ? sanitize_text_field($_GET['soumission_success']) : '';
?>

<style>
/* ============================================================
   STYLES MULTI-ÉTAPES - TGF
   ============================================================ */
:root {
    --vert-fvt: #0a6e3e;
    --vert-fvt-fonce: #063d24;
    --jaune-fvt: #FFCE00;
    --rouge-fvt: #D21034;
    --gris-fond: #f6faf7;
    --blanc: #ffffff;
    --gris-texte: #5a6a5f;
}

/* ===== HEADER ===== */
.soumission-header {
    background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 45px;
    border-bottom: 1px solid #e0ebe6;
    text-align: center;
    position: relative;
}
.soumission-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.soumission-header h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--vert-fvt-fonce);
    text-transform: uppercase;
    font-size: 2.8rem;
    margin: 0;
}
.soumission-header .badge {
    display: inline-block;
    background: rgba(10, 110, 62, 0.1);
    color: var(--vert-fvt);
    padding: 4px 20px;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    font-weight: 700;
    margin-bottom: 12px;
}
.title-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--jaune-fvt), var(--vert-fvt));
    margin: 12px auto 0;
    border-radius: 4px;
}

/* ===== BARRE DE PROGRESSION ===== */
.step-progress {
    padding: 30px 0 20px;
    background: #ffffff;
    border-bottom: 1px solid #e7f0ea;
}
.step-progress__track {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 900px;
    margin: 0 auto;
    position: relative;
}
.step-progress__track::before {
    content: '';
    position: absolute;
    top: 18px;
    left: 25px;
    right: 25px;
    height: 3px;
    background: #dce8e0;
    z-index: 0;
}
.step-progress__track .progress-fill {
    position: absolute;
    top: 18px;
    left: 25px;
    height: 3px;
    background: var(--vert-fvt);
    z-index: 1;
    transition: width 0.6s ease;
    width: <?php echo (($current_step - 1) / 4) * 100; ?>%;
}
.step-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
    cursor: pointer;
    text-decoration: none;
}
.step-item__circle {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #dce8e0;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    font-family: 'Kumbh Sans', sans-serif;
    transition: all 0.3s;
    border: 3px solid #fff;
}
.step-item.active .step-item__circle {
    background: var(--vert-fvt);
    box-shadow: 0 0 0 4px rgba(10, 110, 62, 0.2);
}
.step-item.completed .step-item__circle {
    background: var(--vert-fvt);
}
.step-item.completed .step-item__circle::after {
    content: '✓';
    font-size: 16px;
}
.step-item.completed .step-item__circle span {
    display: none;
}
.step-item__label {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 10px;
    font-weight: 600;
    color: #8a9a8f;
    margin-top: 8px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    max-width: 80px;
    line-height: 1.3;
}
.step-item.active .step-item__label {
    color: var(--vert-fvt-fonce);
}
.step-item.completed .step-item__label {
    color: var(--vert-fvt);
}

/* ===== CONTENU ===== */
.soumission-content {
    padding: 40px 0 60px;
    background: #ffffff;
}
.soumission-grid {
    display: grid;
    grid-template-columns: 1fr 2.2fr;
    gap: 50px;
    align-items: start;
}

/* ===== INFO SIDEBAR ===== */
.soumission-info {
    background: var(--gris-fond);
    border: 1px solid #e7f0ea;
    border-radius: 24px;
    padding: 34px 28px;
    position: sticky;
    top: 30px;
}
.soumission-info .info-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}
.soumission-info .info-header i {
    font-size: 28px;
    color: var(--vert-fvt);
}
.soumission-info h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    font-size: 1.4rem;
    margin: 0;
}
.soumission-info .info-sub {
    font-family: 'Kumbh Sans', sans-serif;
    color: var(--gris-texte);
    font-size: 0.95rem;
    margin-bottom: 20px;
}
.soumission-info__step-hint {
    background: #e7f4ec;
    padding: 16px 20px;
    border-radius: 12px;
    margin: 20px 0;
    border-left: 4px solid var(--vert-fvt);
}
.soumission-info__step-hint strong {
    color: var(--vert-fvt-fonce);
    display: block;
    font-family: 'Kumbh Sans', sans-serif;
    margin-bottom: 4px;
}
.soumission-info__step-hint p {
    margin: 0;
    font-size: 0.9rem;
    color: #4d6a59;
}
.soumission-info__contact {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #dce8e0;
}
.soumission-info__contact h3 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    font-size: 1rem;
    color: var(--vert-fvt-fonce);
    margin: 0 0 10px;
}
.soumission-info__contact a {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Kumbh Sans', sans-serif;
    color: var(--vert-fvt);
    text-decoration: none;
    margin-right: 16px;
    transition: color 0.2s;
}
.soumission-info__contact a:hover {
    color: var(--vert-fvt-fonce);
}

/* ===== FORMULAIRE ===== */
.soumission-form {
    background: #fff;
    border: 1px solid #e7f0ea;
    border-radius: 24px;
    padding: 34px 32px;
    box-shadow: 0 8px 24px rgba(6,61,36,0.04);
}
.soumission-form .step-indicator {
    display: inline-block;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.8rem;
    color: var(--vert-fvt);
    font-weight: 700;
    background: rgba(10, 110, 62, 0.1);
    padding: 4px 14px;
    border-radius: 20px;
    margin-bottom: 8px;
}
.soumission-form h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    font-size: 1.6rem;
    margin: 0 0 4px;
}
.soumission-form .step-desc {
    font-family: 'Kumbh Sans', sans-serif;
    color: var(--gris-texte);
    margin-bottom: 24px;
    font-size: 0.95rem;
}
.soumission-form .step-desc em {
    font-style: italic;
    color: #7a8a7f;
}
.required {
    color: var(--rouge-fvt);
    font-weight: 700;
}
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}
.form-group {
    margin-bottom: 20px;
}
.form-group label {
    display: block;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    color: var(--vert-fvt-fonce);
    margin-bottom: 4px;
    font-size: 0.9rem;
}
.form-group label .required {
    margin-left: 2px;
}
.form-group .label-hint {
    display: block;
    font-weight: 400;
    font-size: 0.8rem;
    color: #8a9a8f;
    margin-top: 2px;
}
.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #dce8e0;
    border-radius: 12px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    color: #2c3e34;
    transition: border 0.2s, box-shadow 0.2s;
    background: #fafcfa;
}
.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--vert-fvt);
    outline: none;
    box-shadow: 0 0 0 3px rgba(10, 110, 62, 0.1);
}
.form-group textarea {
    resize: vertical;
    min-height: 80px;
}
.form-group textarea.small {
    min-height: 60px;
}

/* ===== STYLES UPLOAD AMÉLIORÉS ===== */
.upload-item {
    background: #fafcfa;
    border: 1px solid #e7f0ea;
    border-radius: 12px;
    padding: 14px 18px;
    transition: all 0.3s ease;
    cursor: default;
}
.upload-item:hover {
    border-color: var(--vert-fvt) !important;
    box-shadow: 0 2px 8px rgba(10, 110, 62, 0.08);
}
.upload-item input[type="file"] {
    width: 100%;
    padding: 8px 12px;
    border: 1px dashed #dce8e0;
    border-radius: 8px;
    background: #ffffff;
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.3s ease;
}
.upload-item input[type="file"]:hover {
    border-color: var(--vert-fvt);
    background: #f0f7f3;
}
.upload-item input[type="file"]:focus {
    outline: none;
    border-color: var(--vert-fvt);
    box-shadow: 0 0 0 3px rgba(10, 110, 62, 0.15);
}
.upload-item input[type="file"]::file-selector-button {
    background: var(--vert-fvt);
    color: white;
    border: none;
    padding: 6px 16px;
    border-radius: 6px;
    cursor: pointer;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    font-size: 0.8rem;
    transition: background 0.3s;
    margin-right: 12px;
}
.upload-item input[type="file"]::file-selector-button:hover {
    background: var(--vert-fvt-fonce);
}
.file-name-display {
    display: block;
    font-size: 0.75rem;
    color: #8a9a8f;
    margin-top: 4px;
    transition: all 0.3s;
}
.file-name-display.has-file {
    color: var(--vert-fvt);
}
.file-name-display i {
    margin-right: 4px;
}
.upload-item .helper {
    font-size: 0.7rem;
    color: #8a9a8f;
    display: block;
    margin-top: 4px;
}
.upload-item .helper i {
    margin-right: 4px;
}
.upload-item .file-uploaded {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    color: var(--vert-fvt);
}
.upload-item .file-uploaded i {
    color: var(--vert-fvt);
}
.upload-item.has-file {
    border-color: var(--vert-fvt);
    background: #f0f7f3;
}
.upload-item.has-file input[type="file"] {
    border-color: var(--vert-fvt);
}

/* ===== CHECKBOX GRID ===== */
.checkbox-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}
.checkbox-grid .form-check {
    margin: 0;
    padding: 12px 16px;
    background: #fafcfa;
    border: 1px solid #e7f0ea;
}
.checkbox-grid .form-check input[type="checkbox"] {
    width: 18px;
    height: 18px;
}
.checkbox-grid .form-check label {
    font-size: 0.85rem;
}

/* ===== RADIO GRID ===== */
.radio-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}
.radio-grid .form-radio {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    background: #fafcfa;
    border: 1px solid #e7f0ea;
    border-radius: 12px;
    transition: all 0.2s;
}
.radio-grid .form-radio:hover {
    background: #e7f4ec;
    border-color: var(--vert-fvt);
}
.radio-grid .form-radio input[type="radio"] {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
    accent-color: var(--vert-fvt);
}
.radio-grid .form-radio label {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    color: #2c3e34;
    cursor: pointer;
}

/* ===== BOUTONS ===== */
.step-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e7f0ea;
    gap: 16px;
    flex-wrap: wrap;
}
.step-actions .btn-group {
    display: flex;
    gap: 12px;
}
.btn-step {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 28px;
    border: none;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
}
.btn-step--primary {
    background: var(--vert-fvt);
    color: #fff;
}
.btn-step--primary:hover {
    background: var(--vert-fvt-fonce);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(10, 110, 62, 0.25);
}
.btn-step--secondary {
    background: transparent;
    color: var(--vert-fvt);
    border: 2px solid var(--vert-fvt);
}
.btn-step--secondary:hover {
    background: var(--vert-fvt);
    color: #fff;
}
.btn-step--outline {
    background: transparent;
    color: #8a9a8f;
    border: 2px solid #dce8e0;
}
.btn-step--outline:hover {
    border-color: var(--vert-fvt);
    color: var(--vert-fvt);
}
.btn-step:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
}

/* ===== RÉSUMÉ FINAL ===== */
.summary-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin: 20px 0;
}
.summary-card {
    background: var(--gris-fond);
    border-radius: 12px;
    padding: 18px 20px;
    border: 1px solid #e7f0ea;
}
.summary-card h4 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 0 0 10px;
    padding-bottom: 8px;
    border-bottom: 2px solid var(--jaune-fvt);
}
.summary-card p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #2c3e34;
    margin: 0 0 4px;
    font-size: 0.9rem;
    line-height: 1.5;
}
.summary-card .label {
    font-weight: 600;
    color: var(--vert-fvt);
    font-size: 0.75rem;
    display: block;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
.summary-card .value {
    display: block;
    margin-bottom: 8px;
}

/* ===== SUCCÈS ===== */
#soumission-success {
    text-align: center;
    padding: 40px 20px;
    max-width: 700px;
    margin: 0 auto;
}
#soumission-success .success-icon {
    font-size: 64px;
    color: var(--vert-fvt);
    margin-bottom: 16px;
}
#soumission-success h3 {
    font-family: 'Playfair Display', serif;
    color: var(--vert-fvt-fonce);
    font-size: 1.8rem;
    margin: 0 0 10px;
}
#soumission-success .ref-number {
    background: #e7f4ec;
    padding: 12px 24px;
    border-radius: 12px;
    display: inline-block;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 12px 0;
}
#soumission-success p {
    font-family: 'Kumbh Sans', sans-serif;
    color: var(--gris-texte);
    font-size: 1rem;
    margin-bottom: 20px;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 992px) {
    .soumission-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    .soumission-info {
        order: 2;
        position: static;
    }
    .soumission-form {
        order: 1;
    }
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
    .summary-grid {
        grid-template-columns: 1fr;
    }
    .checkbox-grid,
    .radio-grid {
        grid-template-columns: 1fr;
    }
}
@media (max-width: 768px) {
    .soumission-header h1 {
        font-size: 2rem;
    }
    .step-progress__track {
        flex-wrap: nowrap;
        gap: 0;
        padding: 0 10px;
    }
    .step-item__label {
        font-size: 8px;
        max-width: 50px;
    }
    .step-item__circle {
        width: 32px;
        height: 32px;
        font-size: 11px;
    }
    .soumission-form {
        padding: 20px 16px;
    }
    .soumission-info {
        padding: 20px 16px;
    }
    .step-actions {
        flex-direction: column;
        align-items: stretch;
    }
    .step-actions .btn-group {
        flex-direction: column;
    }
    .btn-step {
        justify-content: center;
    }
    .checkbox-grid {
        grid-template-columns: 1fr;
    }
    .radio-grid {
        grid-template-columns: 1fr;
    }
    .upload-item {
        padding: 12px 14px;
    }
    .upload-item div[style*="flex-wrap"] {
        flex-direction: column;
        align-items: stretch !important;
    }
    .upload-item div[style*="min-width:200px"] {
        min-width: 100% !important;
    }
}
@media (max-width: 576px) {
    .soumission-header h1 {
        font-size: 1.6rem;
    }
    .step-item__label {
        font-size: 7px;
        max-width: 40px;
    }
    .step-item__circle {
        width: 28px;
        height: 28px;
        font-size: 10px;
    }
}
</style>

<!-- ============================================================
     HEADER
     ============================================================ -->
<section class="soumission-header">
    <div class="container">
        <span class="badge">Togo Green Fund</span>
        <h1>Soumettre un projet</h1>
        <div class="title-underline"></div>
        <p style="font-family:'Kumbh Sans',sans-serif;color:#5a6a5f;margin-top:12px;">
            Note conceptuelle — Fiche de soumission de projet en 5 étapes
        </p>
    </div>
</section>

<!-- ============================================================
     BARRE DE PROGRESSION
     ============================================================ -->
<section class="step-progress">
    <div class="container">
        <div class="step-progress__track">
            <div class="progress-fill"></div>
            <?php 
            $step_labels = array(
                1 => 'Porteur de<br>projet & Contact',
                2 => 'Identification<br>du projet',
                3 => 'Problématique<br>& Objectifs',
                4 => 'Mise en œuvre<br>& Financement',
                5 => 'Vérification<br>& Soumission'
            );
            for ($i = 1; $i <= 5; $i++) :
                $status = '';
                if ($i == $current_step) $status = 'active';
                elseif (in_array($i, $completed_steps)) $status = 'completed';
                $url = add_query_arg('step', $i, get_permalink());
                foreach ($form_data as $step_num => $data) {
                    if ($step_num < $i) {
                        $url = add_query_arg('step_' . $step_num . '_data', json_encode($data), $url);
                    }
                }
            ?>
            <a href="<?php echo esc_url($url); ?>" class="step-item <?php echo $status; ?>" 
               onclick="return <?php echo ($status === 'completed' || $status === 'active') ? 'true' : 'false'; ?>">
                <div class="step-item__circle"><span><?php echo $i; ?></span></div>
                <span class="step-item__label"><?php echo $step_labels[$i]; ?></span>
            </a>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="soumission-content">
    <div class="container">
        <?php if (!empty($success_ref)) : ?>
            <!-- SUCCÈS -->
            <div id="soumission-success">
                <div class="success-icon"><i class="fas fa-check-circle"></i></div>
                <h3>Votre projet a été soumis avec succès !</h3>
                <div class="ref-number">N° dossier : <?php echo esc_html($success_ref); ?></div>
                <p>Un accusé de réception vous a été envoyé par email.<br>
                L'équipe technique examinera votre proposition sous 30 jours ouvrés.</p>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="btn-step btn-step--primary">
                    <i class="fas fa-plus"></i> Soumettre un autre projet
                </a>
            </div>
        <?php else : ?>

        <div class="soumission-grid">
            <!-- SIDEBAR -->
            <aside class="soumission-info">
                <div class="info-header">
                    <i class="fas fa-info-circle"></i>
                    <h2>Informations</h2>
                </div>
                <p class="info-sub">Note conceptuelle — Fiche de soumission de projet</p>

                <div class="soumission-info__step-hint">
                    <strong>
                        <i class="fas fa-lightbulb"></i> 
                        Étape <?php echo $current_step; ?> / 5
                    </strong>
                    <p>
                        <?php 
                        $hints = array(
                            1 => 'Informations sur le porteur du projet (existence légale requise).',
                            2 => 'Guichet, titre, localisation et résumé du projet.',
                            3 => 'Problématique, objectifs et bénéficiaires (critères de pertinence - 40 points).',
                            4 => 'Budget, durée, catégorie de financement et sources de financement.',
                            5 => 'Vérifiez toutes les informations, signez et soumettez votre dossier.'
                        );
                        echo $hints[$current_step] ?? '';
                        ?>
                    </p>
                </div>

                <div class="soumission-info__contact">
                    <h3><i class="fas fa-headset"></i> Besoin d'aide ?</h3>
                    <div style="display:flex;flex-wrap:wrap;gap:8px;">
                        <a href="mailto:projets@togogreenfund.tg"><i class="fas fa-envelope"></i> projets@togogreenfund.tg</a>
                        <a href="tel:+228XXXXXXXX"><i class="fas fa-phone-alt"></i> +228 XX XX XX XX</a>
                    </div>
                </div>
            </aside>

            <!-- FORMULAIRE -->
            <div class="soumission-form">
                <span class="step-indicator">Étape <?php echo $current_step; ?> / 5</span>
                <h2>
                    <?php 
                    $titles = array(
                        1 => '1. Porteur de projet et Contact',
                        2 => '2. Identification du projet',
                        3 => '3. Problématique et Objectifs',
                        4 => '4. Mise en œuvre et Financement',
                        5 => '5. Vérification et Soumission'
                    );
                    echo $titles[$current_step] ?? '';
                    ?>
                </h2>

                <form method="post" enctype="multipart/form-data">
                    <?php wp_nonce_field('fvt_soumission_action', 'fvt_soumission_nonce'); ?>
                    <input type="hidden" name="step" value="<?php echo $current_step; ?>">
                    <input type="hidden" name="save_step" value="1">
                    
                    <?php
                    // Données des étapes précédentes en champs cachés
                    foreach ($form_data as $step_num => $data) {
                        if ($step_num < $current_step) {
                            echo '<input type="hidden" name="step_' . $step_num . '_data" value="' . esc_attr(json_encode($data)) . '">';
                        }
                    }
                    ?>

                    <?php if ($current_step === 1) : ?>
    <!-- ÉTAPE 1 : PORTEUR DE PROJET ET CONTACT -->
    
    <div style="background:#f0f7f3;border-radius:12px;padding:12px 16px;margin-bottom:20px;border-left:4px solid var(--vert-fvt);">
        <p style="font-family:'Kumbh Sans',sans-serif;font-size:0.85rem;color:#5a6a5f;margin:0;">
            <i class="fas fa-building" style="color:var(--vert-fvt);"></i> 
            <strong></strong> Le porteur doit disposer d'une existence légale et de capacités de gestion proportionnées au montant sollicité.
        </p>
    </div>

    <!-- Type de porteur -->
    <div class="form-group">
        <label>Type de porteur de projet <span class="required">*</span></label>
        <div class="radio-grid">
            <?php foreach ($types_porteur as $type) : ?>
            <div class="form-radio">
                <input type="radio" id="porteur_<?php echo sanitize_title($type); ?>" 
                       name="type_porteur" value="<?php echo esc_attr($type); ?>"
                       <?php checked($current_data['type_porteur'] ?? '', $type); ?> required>
                <label for="porteur_<?php echo sanitize_title($type); ?>"><?php echo esc_html($type); ?></label>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group">
        <label for="presentation_porteur">Présentation du porteur de projet <span class="required">*</span></label>
        <textarea id="presentation_porteur" name="presentation_porteur" rows="4" 
                  placeholder="Statut juridique, expérience, partenaires associés..." required><?php echo esc_textarea($current_data['presentation_porteur'] ?? ''); ?></textarea>
        <span class="helper">Statut juridique, expérience, partenaires associés.</span>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="nom_responsable">Nom du responsable du projet <span class="required">*</span></label>
            <input type="text" id="nom_responsable" name="nom_responsable" 
                   placeholder="Nom du responsable" 
                   value="<?php echo esc_attr($current_data['nom_responsable'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="fonction_responsable">Fonction <span class="required">*</span></label>
            <input type="text" id="fonction_responsable" name="fonction_responsable" 
                   placeholder="Fonction du responsable" 
                   value="<?php echo esc_attr($current_data['fonction_responsable'] ?? ''); ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label for="adresse">Adresse <span class="required">*</span></label>
        <textarea id="adresse" name="adresse" rows="2" 
                  placeholder="Adresse complète" required><?php echo esc_textarea($current_data['adresse'] ?? ''); ?></textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="telephone">Téléphone <span class="required">*</span></label>
            <input type="tel" id="telephone" name="telephone" 
                   placeholder="+228 XX XX XX XX" 
                   value="<?php echo esc_attr($current_data['telephone'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Courriel <span class="required">*</span></label>
            <input type="email" id="email" name="email" 
                   placeholder="exemple@domaine.tg" 
                   value="<?php echo esc_attr($current_data['email'] ?? ''); ?>" required>
        </div>
    </div>

    <!-- Pièces jointes avec upload de fichiers - VERSION AMÉLIORÉE -->
    <div class="form-group">
        <label>Pièces jointes fournies <span class="required">*</span></label>
        <span class="label-hint">Veuillez joindre les documents requis ci-dessous</span>
        
        <div style="margin-top:12px;display:flex;flex-direction:column;gap:12px;">
            
            <!-- Statuts / texte de création -->
            <div class="upload-item" id="upload-statuts">
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:12px;">
                    <div style="display:flex;align-items:center;gap:10px;min-width:200px;flex:1;">
                        <input type="checkbox" id="piece_statuts" name="piece_statuts" 
                               style="width:18px;height:18px;accent-color:var(--vert-fvt);"
                               <?php checked($current_data['piece_statuts'] ?? 0, 1); ?>>
                        <label for="piece_statuts" style="margin:0;font-weight:600;font-size:0.9rem;color:var(--vert-fvt-fonce);cursor:pointer;">
                            Statuts / texte de création
                        </label>
                    </div>
                    <div style="flex:2;min-width:200px;">
                        <input type="file" id="fichier_statuts" name="fichier_statuts" 
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                               onchange="updateFileName(this, 'statuts-file-name', 'upload-statuts')">
                        <span id="statuts-file-name" class="file-name-display">
                            <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                        </span>
                        <span class="helper"><i class="fas fa-file-alt"></i> PDF, DOC, DOCX, JPG, PNG — Max 5 Mo</span>
                    </div>
                    <?php if (!empty($current_data['fichier_statuts_nom'])) : ?>
                        <span class="file-uploaded">
                            <i class="fas fa-check-circle"></i> <?php echo esc_html($current_data['fichier_statuts_nom']); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Pouvoir du signataire -->
            <div class="upload-item" id="upload-pouvoir">
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:12px;">
                    <div style="display:flex;align-items:center;gap:10px;min-width:200px;flex:1;">
                        <input type="checkbox" id="piece_pouvoir" name="piece_pouvoir" 
                               style="width:18px;height:18px;accent-color:var(--vert-fvt);"
                               <?php checked($current_data['piece_pouvoir'] ?? 0, 1); ?>>
                        <label for="piece_pouvoir" style="margin:0;font-weight:600;font-size:0.9rem;color:var(--vert-fvt-fonce);cursor:pointer;">
                            Pouvoir du signataire
                        </label>
                    </div>
                    <div style="flex:2;min-width:200px;">
                        <input type="file" id="fichier_pouvoir" name="fichier_pouvoir" 
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                               onchange="updateFileName(this, 'pouvoir-file-name', 'upload-pouvoir')">
                        <span id="pouvoir-file-name" class="file-name-display">
                            <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                        </span>
                        <span class="helper"><i class="fas fa-file-alt"></i> PDF, DOC, DOCX, JPG, PNG — Max 5 Mo</span>
                    </div>
                    <?php if (!empty($current_data['fichier_pouvoir_nom'])) : ?>
                        <span class="file-uploaded">
                            <i class="fas fa-check-circle"></i> <?php echo esc_html($current_data['fichier_pouvoir_nom']); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Attestations fiscales et sociales -->
            <div class="upload-item" id="upload-attestations">
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:12px;">
                    <div style="display:flex;align-items:center;gap:10px;min-width:200px;flex:1;">
                        <input type="checkbox" id="piece_attestations" name="piece_attestations" 
                               style="width:18px;height:18px;accent-color:var(--vert-fvt);"
                               <?php checked($current_data['piece_attestations'] ?? 0, 1); ?>>
                        <label for="piece_attestations" style="margin:0;font-weight:600;font-size:0.9rem;color:var(--vert-fvt-fonce);cursor:pointer;">
                            Attestations fiscales et sociales
                        </label>
                    </div>
                    <div style="flex:2;min-width:200px;">
                        <input type="file" id="fichier_attestations" name="fichier_attestations" 
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                               onchange="updateFileName(this, 'attestations-file-name', 'upload-attestations')">
                        <span id="attestations-file-name" class="file-name-display">
                            <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                        </span>
                        <span class="helper"><i class="fas fa-file-alt"></i> PDF, DOC, DOCX, JPG, PNG — Max 5 Mo</span>
                    </div>
                    <?php if (!empty($current_data['fichier_attestations_nom'])) : ?>
                        <span class="file-uploaded">
                            <i class="fas fa-check-circle"></i> <?php echo esc_html($current_data['fichier_attestations_nom']); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Autre(s) -->
            <div class="upload-item" id="upload-autre">
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:12px;">
                    <div style="display:flex;align-items:center;gap:10px;min-width:200px;flex:1;">
                        <input type="checkbox" id="piece_autre_check" name="piece_autre_check" 
                               style="width:18px;height:18px;accent-color:var(--vert-fvt);"
                               <?php checked(isset($current_data['piece_autre']) && !empty($current_data['piece_autre']), true); ?>
                               onchange="toggleAutreInput(this)">
                        <label for="piece_autre_check" style="margin:0;font-weight:600;font-size:0.9rem;color:var(--vert-fvt-fonce);cursor:pointer;">
                            Autre(s)
                        </label>
                        <input type="text" id="piece_autre" name="piece_autre" 
                               placeholder="Précisez..." 
                               style="flex:1;min-width:120px;padding:6px 12px;border:1px solid #dce8e0;border-radius:6px;font-size:0.85rem;background:#ffffff;transition:all 0.3s;"
                               value="<?php echo esc_attr($current_data['piece_autre'] ?? ''); ?>"
                               <?php echo (isset($current_data['piece_autre']) && !empty($current_data['piece_autre'])) ? '' : 'disabled'; ?>>
                    </div>
                    <div style="flex:2;min-width:200px;">
                        <input type="file" id="fichier_autre" name="fichier_autre" 
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.zip"
                               onchange="updateFileName(this, 'autre-file-name', 'upload-autre')">
                        <span id="autre-file-name" class="file-name-display">
                            <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                        </span>
                        <span class="helper"><i class="fas fa-file-archive"></i> PDF, DOC, DOCX, JPG, PNG, ZIP — Max 10 Mo</span>
                    </div>
                    <?php if (!empty($current_data['fichier_autre_nom'])) : ?>
                        <span class="file-uploaded">
                            <i class="fas fa-check-circle"></i> <?php echo esc_html($current_data['fichier_autre_nom']); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
    
                    <?php elseif ($current_step === 2) : ?>
                        <!-- ÉTAPE 2 : IDENTIFICATION DU PROJET -->
                        
                        <!-- Guichet thématique -->
                        <div class="form-group">
                            <label>Guichet thématique visé <span class="required">*</span></label>
                            <div class="radio-grid">
                                <?php foreach ($guichets as $guichet) : ?>
                                <div class="form-radio">
                                    <input type="radio" id="guichet_<?php echo sanitize_title($guichet); ?>" 
                                           name="guichet" value="<?php echo esc_attr($guichet); ?>"
                                           <?php checked($current_data['guichet'] ?? '', $guichet); ?> required>
                                    <label for="guichet_<?php echo sanitize_title($guichet); ?>"><?php echo esc_html($guichet); ?></label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Titre du projet -->
                        <div class="form-group">
                            <label for="titre_projet">Titre du projet <span class="required">*</span></label>
                            <input type="text" id="titre_projet" name="titre_projet" 
                                   placeholder="Titre du projet" 
                                   value="<?php echo esc_attr($current_data['titre_projet'] ?? ''); ?>" required>
                        </div>

                        <!-- Localisation -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="region">Région <span class="required">*</span></label>
                                <select id="region" name="region" required>
                                    <option value="">Sélectionnez une région</option>
                                    <?php foreach ($regions_togo as $region) : ?>
                                        <option value="<?php echo esc_attr($region); ?>" 
                                            <?php selected($current_data['region'] ?? '', $region); ?>>
                                            <?php echo esc_html($region); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prefecture">Préfecture <span class="required">*</span></label>
                                <select id="prefecture" name="prefecture" required>
                                    <option value="">Sélectionnez une préfecture</option>
                                    <?php foreach ($prefectures_togo as $prefecture) : ?>
                                        <option value="<?php echo esc_attr($prefecture); ?>" 
                                            <?php selected($current_data['prefecture'] ?? '', $prefecture); ?>>
                                            <?php echo esc_html($prefecture); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="commune">Commune / zone d'intervention précise <span class="required">*</span></label>
                            <input type="text" id="commune" name="commune" 
                                   placeholder="Commune ou zone d'intervention" 
                                   value="<?php echo esc_attr($current_data['commune'] ?? ''); ?>" required>
                        </div>

                        <!-- Résumé -->
                        <div class="form-group">
                            <label for="resume">Résumé du projet (250 mots maximum) <span class="required">*</span></label>
                            <textarea id="resume" name="resume" rows="4" 
                                      placeholder="Résumé concis du projet..." 
                                      maxlength="1000" required><?php echo esc_textarea($current_data['resume'] ?? ''); ?></textarea>
                            <div class="word-count">Mots : <span id="resume-word-count">0</span> / 250</div>
                        </div>

                    <?php elseif ($current_step === 3) : ?>
                        <!-- ÉTAPE 3 : PROBLÉMATIQUE ET OBJECTIFS -->
                        
                        <div style="background:#fff8e7;border-radius:12px;padding:12px 16px;margin-bottom:20px;border-left:4px solid var(--jaune-fvt);">
                            <p style="font-family:'Kumbh Sans',sans-serif;font-size:0.85rem;color:#5a6a5f;margin:0;">
                                <i class="fas fa-star" style="color:var(--jaune-fvt);"></i> 
                                <strong>Critères de notation :</strong> Pertinence et cohérence technique — 40 points sur 100 (grille de présélection)
                            </p>
                        </div>

                        <!-- Problématique -->
                        <div class="form-group">
                            <label for="problematique">Problématique et justification <span class="required">*</span></label>
                            <textarea id="problematique" name="problematique" rows="4" 
                                      placeholder="Décrivez la problématique et justifiez le projet..." required><?php echo esc_textarea($current_data['problematique'] ?? ''); ?></textarea>
                        </div>

                        <!-- Objectifs -->
                        <div class="form-group">
                            <label for="objectifs_resultats">Objectifs et résultats attendus <span class="required">*</span></label>
                            <textarea id="objectifs_resultats" name="objectifs_resultats" rows="4" 
                                      placeholder="Objectifs poursuivis et résultats escomptés..." required><?php echo esc_textarea($current_data['objectifs_resultats'] ?? ''); ?></textarea>
                        </div>

                        <!-- Bénéficiaires -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="beneficiaires_directs">Nombre de bénéficiaires directs estimés <span class="required">*</span></label>
                                <input type="number" id="beneficiaires_directs" name="beneficiaires_directs" 
                                       placeholder="Nombre de bénéficiaires directs" 
                                       value="<?php echo esc_attr($current_data['beneficiaires_directs'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="beneficiaires_indirects">Nombre de bénéficiaires indirects estimés <span class="required">*</span></label>
                                <input type="number" id="beneficiaires_indirects" name="beneficiaires_indirects" 
                                       placeholder="Nombre de bénéficiaires indirects" 
                                       value="<?php echo esc_attr($current_data['beneficiaires_indirects'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="caracteristiques_cibles">Caractéristiques des groupes cibles <span class="required">*</span></label>
                            <textarea id="caracteristiques_cibles" name="caracteristiques_cibles" rows="3" 
                                      placeholder="Description des groupes cibles (âge, genre, activité, vulnérabilités...)" required><?php echo esc_textarea($current_data['caracteristiques_cibles'] ?? ''); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="impacts_attendus">Impacts attendus <span class="required">*</span></label>
                            <textarea id="impacts_attendus" name="impacts_attendus" rows="3" 
                                      placeholder="Impact attendus" required><?php echo esc_textarea($current_data['impacts_attendus'] ?? ''); ?></textarea>
                        </div>

                    <?php elseif ($current_step === 4) : ?>
                        <!-- ÉTAPE 4 : MISE EN ŒUVRE ET FINANCEMENT -->
                        
                        <div style="background:#e8f0fe;border-radius:12px;padding:12px 16px;margin-bottom:20px;border-left:4px solid #1a73e8;">
                            <p style="font-family:'Kumbh Sans',sans-serif;font-size:0.85rem;color:#5a6a5f;margin:0;">
                                <i class="fas fa-info-circle" style="color:#1a73e8;"></i> 
                                <strong>Information :</strong> Le montant sollicité détermine la catégorie de financement et le niveau d'instruction applicable.
                            </p>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="date_demarrage">Date de démarrage prévisionnelle <span class="required">*</span></label>
                                <input type="date" id="date_demarrage" name="date_demarrage" 
                                       value="<?php echo esc_attr($current_data['date_demarrage'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="duree_mois">Durée envisagée (en mois) <span class="required">*</span></label>
                                <input type="number" id="duree_mois" name="duree_mois" 
                                       placeholder="Durée en mois" 
                                       value="<?php echo esc_attr($current_data['duree_mois'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="cout_global">Coût global estimatif (FCFA) <span class="required">*</span></label>
                                <input type="number" id="cout_global" name="cout_global" 
                                       placeholder="Coût total du projet en FCFA" 
                                       value="<?php echo esc_attr($current_data['cout_global'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="montant_sollicite">Montant sollicité auprès du TGF (FCFA) <span class="required">*</span></label>
                                <input type="number" id="montant_sollicite" name="montant_sollicite" 
                                       placeholder="Montant demandé au TGF" 
                                       value="<?php echo esc_attr($current_data['montant_sollicite'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <!-- Catégorie de financement -->
                        <div class="form-group">
                            <label>Catégorie de financement</label>
                            <div class="radio-grid">
                                <?php foreach ($categories_financement as $categorie) : ?>
                                <div class="form-radio">
                                    <input type="radio" id="categorie_<?php echo sanitize_title($categorie); ?>" 
                                           name="categorie_financement" value="<?php echo esc_attr($categorie); ?>"
                                           <?php checked($current_data['categorie_financement'] ?? '', $categorie); ?>>
                                    <label for="categorie_<?php echo sanitize_title($categorie); ?>"><?php echo esc_html($categorie); ?></label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Fiche de budget -->
                        <div class="form-group">
                            <label for="fichier_budget">Fiche de budget (préalablement rempli)</label>
                            <div class="upload-item" id="upload-budget">
                                <input type="file" id="fichier_budget" name="fichier_budget" 
                                       accept=".pdf,.doc,.docx,.zip"
                                       onchange="updateFileName(this, 'budget-file-name', 'upload-budget')">
                                <span id="budget-file-name" class="file-name-display">
                                    <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                                </span>
                                <span class="helper"><i class="fas fa-file-archive"></i> PDF, DOC, DOCX, ZIP — Max 10 Mo</span>
                                <?php if (!empty($current_data['fichier_budget_nom'])) : ?>
                                    <span class="file-uploaded">
                                        <i class="fas fa-check-circle"></i> <?php echo esc_html($current_data['fichier_budget_nom']); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="autres_sources">Autres sources de financement envisagées</label>
                            <textarea id="autres_sources" name="autres_sources" rows="2" 
                                      placeholder="Nom du partenaire et montant, le cas échéant."><?php echo esc_textarea($current_data['autres_sources'] ?? ''); ?></textarea>
                            <span class="helper">Nom du partenaire et montant, le cas échéant.</span>
                        </div>

                    <?php elseif ($current_step === 5) : ?>
                        <!-- ÉTAPE 5 : VÉRIFICATION ET SOUMISSION -->
                        
                        <div style="background:#f0f7f3;border-radius:12px;padding:20px;margin-bottom:20px;border:2px solid var(--vert-fvt);">
                            <p style="font-family:'Kumbh Sans',sans-serif;color:var(--vert-fvt-fonce);margin:0;text-align:center;">
                                <i class="fas fa-check-circle" style="color:var(--vert-fvt);font-size:24px;display:block;margin-bottom:8px;"></i>
                                <strong>Vérifiez toutes vos informations avant la validation définitive.</strong>
                            </p>
                        </div>

                        <!-- Résumé des données -->
                        <?php 
                        $all_data = array();
                        for ($i = 1; $i <= 4; $i++) {
                            if (isset($form_data[$i])) {
                                $all_data = array_merge($all_data, $form_data[$i]);
                            }
                        }
                        ?>
                        <div class="summary-grid">
                            <div class="summary-card">
                                <h4>1. Porteur de projet</h4>
                                <p><span class="label">Type</span> <?php echo esc_html($all_data['type_porteur'] ?? 'Non renseigné'); ?></p>
                                <p><span class="label">Responsable</span> <?php echo esc_html($all_data['nom_responsable'] ?? '') . ' (' . esc_html($all_data['fonction_responsable'] ?? '') . ')'; ?></p>
                                <p><span class="label">Contact</span> <?php echo esc_html($all_data['telephone'] ?? '') . ' - ' . esc_html($all_data['email'] ?? ''); ?></p>
                                <p><span class="label">Adresse</span> <?php echo esc_html(substr($all_data['adresse'] ?? '', 0, 50)) . '...'; ?></p>
                            </div>
                            <div class="summary-card">
                                <h4>2. Identification du projet</h4>
                                <p><span class="label">Guichet</span> <?php echo esc_html($all_data['guichet'] ?? 'Non renseigné'); ?></p>
                                <p><span class="label">Titre</span> <?php echo esc_html($all_data['titre_projet'] ?? ''); ?></p>
                                <p><span class="label">Localisation</span> <?php echo esc_html($all_data['region'] ?? '') . ' - ' . esc_html($all_data['prefecture'] ?? '') . ' - ' . esc_html($all_data['commune'] ?? ''); ?></p>
                            </div>
                            <div class="summary-card">
                                <h4>3. Problématique & Objectifs</h4>
                                <p><span class="label">Problématique</span> <?php echo esc_html(substr($all_data['problematique'] ?? '', 0, 60)) . '...'; ?></p>
                                <p><span class="label">Bénéficiaires directs</span> <?php echo esc_html($all_data['beneficiaires_directs'] ?? '0'); ?></p>
                                <p><span class="label">Bénéficiaires indirects</span> <?php echo esc_html($all_data['beneficiaires_indirects'] ?? '0'); ?></p>
                            </div>
                            <div class="summary-card">
                                <h4>4. Mise en œuvre & Financement</h4>
                                <p><span class="label">Coût global</span> <?php echo number_format(intval($all_data['cout_global'] ?? 0), 0, ',', ' ') . ' FCFA'; ?></p>
                                <p><span class="label">Montant sollicité</span> <?php echo number_format(intval($all_data['montant_sollicite'] ?? 0), 0, ',', ' ') . ' FCFA'; ?></p>
                                <p><span class="label">Durée</span> <?php echo esc_html($all_data['duree_mois'] ?? '0') . ' mois'; ?></p>
                                <p><span class="label">Catégorie</span> <?php echo esc_html($all_data['categorie_financement'] ?? 'Non définie'); ?></p>
                            </div>
                        </div>

                        <!-- Commentaire optionnel -->
                        <div class="form-group">
                            <label for="commentaire">Commentaire additionnel</label>
                            <textarea id="commentaire" name="commentaire" rows="2" 
                                      placeholder="Informations complémentaires éventuelles..."><?php echo esc_textarea($current_data['commentaire'] ?? ''); ?></textarea>
                        </div>

                        <!-- Pièces jointes Étape 5 -->
                        <div class="form-group">
                            <label>Pièces jointes complémentaires</label>
                            <div style="display:flex;flex-direction:column;gap:12px;margin-top:8px;">
                                
                                <div class="upload-item" id="upload-fiscal">
                                    <label style="font-weight:500;font-size:0.85rem;display:block;margin-bottom:4px;">Attestation de régularité fiscale</label>
                                    <input type="file" id="fichier_fiscal" name="fichier_fiscal" 
                                           accept=".pdf,.doc,.docx,.zip"
                                           onchange="updateFileName(this, 'fiscal-file-name', 'upload-fiscal')">
                                    <span id="fiscal-file-name" class="file-name-display">
                                        <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                                    </span>
                                    <span class="helper"><i class="fas fa-file-archive"></i> PDF, DOC, DOCX, ZIP — Max 10 Mo</span>
                                </div>

                                <div class="upload-item" id="upload-non-faillite">
                                    <label style="font-weight:500;font-size:0.85rem;display:block;margin-bottom:4px;">Attestation de non-faillite</label>
                                    <input type="file" id="fichier_non_faillite" name="fichier_non_faillite" 
                                           accept=".pdf,.doc,.docx,.zip"
                                           onchange="updateFileName(this, 'non-faillite-file-name', 'upload-non-faillite')">
                                    <span id="non-faillite-file-name" class="file-name-display">
                                        <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                                    </span>
                                    <span class="helper"><i class="fas fa-file-archive"></i> PDF, DOC, DOCX, ZIP — Max 10 Mo</span>
                                </div>

                                <div class="upload-item" id="upload-capacite">
                                    <label style="font-weight:500;font-size:0.85rem;display:block;margin-bottom:4px;">Attestation de capacité financière</label>
                                    <input type="file" id="fichier_capacite" name="fichier_capacite" 
                                           accept=".pdf,.doc,.docx,.zip"
                                           onchange="updateFileName(this, 'capacite-file-name', 'upload-capacite')">
                                    <span id="capacite-file-name" class="file-name-display">
                                        <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                                    </span>
                                    <span class="helper"><i class="fas fa-file-archive"></i> PDF, DOC, DOCX, ZIP — Max 10 Mo</span>
                                </div>

                                <div class="upload-item" id="upload-registre">
                                    <label style="font-weight:500;font-size:0.85rem;display:block;margin-bottom:4px;">Extrait récent du registre du commerce ou document équivalent</label>
                                    <input type="file" id="fichier_registre" name="fichier_registre" 
                                           accept=".pdf,.doc,.docx,.zip"
                                           onchange="updateFileName(this, 'registre-file-name', 'upload-registre')">
                                    <span id="registre-file-name" class="file-name-display">
                                        <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                                    </span>
                                    <span class="helper"><i class="fas fa-file-archive"></i> PDF, DOC, DOCX, ZIP — Max 10 Mo</span>
                                </div>

                                <div class="upload-item" id="upload-budget-previsionnel">
                                    <label style="font-weight:500;font-size:0.85rem;display:block;margin-bottom:4px;">Budget prévisionnel détaillé par composante et/ou activité</label>
                                    <input type="file" id="fichier_budget_previsionnel" name="fichier_budget_previsionnel" 
                                           accept=".pdf,.doc,.docx,.zip"
                                           onchange="updateFileName(this, 'budget-previsionnel-file-name', 'upload-budget-previsionnel')">
                                    <span id="budget-previsionnel-file-name" class="file-name-display">
                                        <i class="fas fa-paperclip"></i> Aucun fichier sélectionné
                                    </span>
                                    <span class="helper"><i class="fas fa-file-archive"></i> PDF, DOC, DOCX, ZIP — Max 10 Mo</span>
                                </div>

                            </div>
                        </div>

                        <!-- Déclaration -->
                        <div class="form-check" style="background:#fff8e7;border-color:var(--jaune-fvt);">
                            <input type="checkbox" id="declaration" name="declaration" required>
                            <label for="declaration">
                                <strong>☐ Je certifie l'exactitude des informations fournies</strong> dans la présente note conceptuelle et déclare que le porteur de projet remplit les conditions générales d'éligibilité prévues au point 7.3 du Manuel de sélection des projets TGF (existence légale, capacités de gestion, absence de mesure d'exclusion en cours). <span class="required">*</span>
                            </label>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="fait_a">Fait à <span class="required">*</span></label>
                                <input type="text" id="fait_a" name="fait_a" 
                                       placeholder="Lieu de signature" 
                                       value="<?php echo esc_attr($current_data['fait_a'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="date_signature">Le (date) <span class="required">*</span></label>
                                <input type="date" id="date_signature" name="date_signature" 
                                       value="<?php echo esc_attr($current_data['date_signature'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="signature_nom">Nom du responsable habilité <span class="required">*</span></label>
                                <input type="text" id="signature_nom" name="signature_nom" 
                                       placeholder="Nom du signataire" 
                                       value="<?php echo esc_attr($current_data['signature_nom'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="signature_qualite">Qualité du signataire <span class="required">*</span></label>
                                <input type="text" id="signature_qualite" name="signature_qualite" 
                                       placeholder="Fonction / qualité" 
                                       value="<?php echo esc_attr($current_data['signature_qualite'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <div style="background:#f0f7f3;border-radius:12px;padding:16px;margin-top:16px;border:1px solid #dce8e0;">
                            <p style="font-family:'Kumbh Sans',sans-serif;font-size:0.85rem;color:#5a6a5f;margin:0;">
                                <i class="fas fa-info-circle" style="color:var(--vert-fvt);"></i>
                                <em>Ce document est déposé selon les modalités précisées par l'appel à projets en cours. Un accusé de réception mentionnant la date de dépôt et un numéro d'identification unique vous sera délivré (point 8 du manuel).</em>
                            </p>
                        </div>

                        <input type="hidden" name="submit_final" value="1">

                    <?php endif; ?>

                    <!-- BOUTONS DE NAVIGATION -->
                    <div class="step-actions">
                        <div class="btn-group">
                            <?php if ($current_step > 1) : ?>
                                <a href="<?php echo esc_url(add_query_arg('step', $current_step - 1, get_permalink())); ?>" 
                                   class="btn-step btn-step--secondary">
                                    <i class="fas fa-arrow-left"></i> Précédent
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="btn-group">
                            <?php if ($current_step < 5) : ?>
                                <button type="submit" class="btn-step btn-step--primary">
                                    Suivant <i class="fas fa-arrow-right"></i>
                                </button>
                            <?php else : ?>
                                <button type="submit" class="btn-step btn-step--primary" id="submit-final">
                                    <i class="fas fa-check"></i> Valider et soumettre
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- ============================================================
     JAVASCRIPT
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour mettre à jour le nom du fichier sélectionné
    window.updateFileName = function(input, spanId, containerId) {
        const span = document.getElementById(spanId);
        const container = document.getElementById(containerId);
        if (span) {
            if (input.files && input.files.length > 0) {
                const file = input.files[0];
                const fileSize = (file.size / 1024 / 1024).toFixed(1);
                const fileIcon = file.type.includes('pdf') ? 'fa-file-pdf' : 
                                 file.type.includes('zip') ? 'fa-file-archive' :
                                 file.type.includes('doc') ? 'fa-file-word' :
                                 file.type.includes('image') ? 'fa-file-image' : 'fa-file';
                span.innerHTML = `<i class="fas ${fileIcon}"></i> ${file.name} (${fileSize} Mo)`;
                span.className = 'file-name-display has-file';
                
                if (container) {
                    container.classList.add('has-file');
                }
            } else {
                span.innerHTML = '<i class="fas fa-paperclip"></i> Aucun fichier sélectionné';
                span.className = 'file-name-display';
                
                if (container) {
                    container.classList.remove('has-file');
                }
            }
        }
    };

    // Fonction pour activer/désactiver le champ "Autre"
    window.toggleAutreInput = function(checkbox) {
        const input = document.getElementById('piece_autre');
        if (input) {
            if (checkbox.checked) {
                input.disabled = false;
                input.focus();
                input.style.borderColor = 'var(--vert-fvt)';
                input.style.boxShadow = '0 0 0 3px rgba(10, 110, 62, 0.1)';
            } else {
                input.disabled = true;
                input.value = '';
                input.style.borderColor = '#dce8e0';
                input.style.boxShadow = 'none';
            }
        }
    };

    // Compteur de mots pour le résumé
    const resumeTextarea = document.getElementById('resume');
    if (resumeTextarea) {
        const wordCountDisplay = document.getElementById('resume-word-count');
        function countWords() {
            const text = resumeTextarea.value.trim();
            const words = text === '' ? 0 : text.split(/\s+/).length;
            if (wordCountDisplay) {
                wordCountDisplay.textContent = words;
                if (words > 150) {
                    wordCountDisplay.style.color = '#D21034';
                } else {
                    wordCountDisplay.style.color = '#8a9a8f';
                }
            }
            if (words > 250) {
                resumeTextarea.style.borderColor = '#D21034';
                resumeTextarea.style.boxShadow = '0 0 0 3px rgba(210,16,52,0.1)';
            } else {
                resumeTextarea.style.borderColor = '';
                resumeTextarea.style.boxShadow = '';
            }
        }
        resumeTextarea.addEventListener('input', countWords);
        countWords();
    }

    // Validation des formulaires multi-étapes
    const form = document.querySelector('form[method="post"]');
    if (form) {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let valid = true;
            let firstError = null;
            
            requiredFields.forEach(function(field) {
                // Pour les champs radio, vérifier qu'au moins un est coché
                if (field.type === 'radio') {
                    const radioName = field.name;
                    const radios = form.querySelectorAll('input[name="' + radioName + '"]');
                    const checked = Array.from(radios).some(r => r.checked);
                    if (!checked) {
                        valid = false;
                        radios.forEach(r => {
                            r.closest('.form-radio').style.borderColor = '#D21034';
                            r.closest('.form-radio').style.boxShadow = '0 0 0 3px rgba(210,16,52,0.1)';
                        });
                        if (!firstError) firstError = radios[0].closest('.form-group') || radios[0].closest('.radio-grid');
                    } else {
                        radios.forEach(r => {
                            if (r.closest('.form-radio')) {
                                r.closest('.form-radio').style.borderColor = '';
                                r.closest('.form-radio').style.boxShadow = '';
                            }
                        });
                    }
                } else if (field.type === 'checkbox') {
                    if (!field.checked && field.hasAttribute('required')) {
                        valid = false;
                        field.style.outline = '2px solid #D21034';
                        field.style.outlineOffset = '2px';
                        if (!firstError) firstError = field.closest('.form-check');
                    } else {
                        field.style.outline = '';
                    }
                } else if (field.value.trim() === '') {
                    valid = false;
                    field.style.borderColor = '#D21034';
                    field.style.boxShadow = '0 0 0 3px rgba(210,16,52,0.1)';
                    if (!firstError) firstError = field;
                } else {
                    field.style.borderColor = '';
                    field.style.boxShadow = '';
                }
            });
            
            if (!valid) {
                e.preventDefault();
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                alert('Veuillez remplir tous les champs obligatoires (marqués d\'un *).');
                return false;
            }
            
            // Désactivation du bouton pour éviter double soumission
            const btn = form.querySelector('button[type="submit"]');
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> En cours...';
            }
        });
    }
    
    // Navigation entre étapes
    const stepItems = document.querySelectorAll('.step-item');
    stepItems.forEach(function(item) {
        item.addEventListener('click', function(e) {
            const isCompleted = this.classList.contains('completed');
            const isActive = this.classList.contains('active');
            if (!isCompleted && !isActive) {
                e.preventDefault();
                alert('Veuillez compléter les étapes précédentes dans l\'ordre.');
            }
        });
    });
});
</script>