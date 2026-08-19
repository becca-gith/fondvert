<?php
/**
 * Template part : Administration des soumissions de projets
 * Page réservée aux administrateurs et validateurs
 * Avec menu déroulant Actions
 * 
 * @package TogoGreenFund
 */

// Vérification des droits d'accès
if (!current_user_can('administrator') && !current_user_can('editor')) {
    wp_redirect(home_url());
    exit;
}

// Simulation des données de soumissions (à remplacer par des données réelles de la base de données)
$soumissions = array(
    array(
        'id' => 1,
        'reference' => 'SOU-2025-0042',
        'nom_projet' => 'Agriculture résiliente dans les Savanes',
        'porteur' => 'M. Kodjo AGBEME',
        'email' => 'k.agbeme@email.com',
        'telephone' => '+228 90 12 34 56',
        'montant' => '500 000 000 FCFA',
        'guichet' => 'Agriculture durable',
        'date_soumission' => '15 Janvier 2025',
        'statut' => 'en_attente_etude',
        'etape' => 0,
        'description' => 'Projet visant à renforcer la résilience des communautés agricoles face aux changements climatiques dans la région des Savanes.',
        'documents' => array(
            'Statuts' => 'statuts_agbeme.pdf',
            'Budget' => 'budget_projet_2025.xlsx',
            'Attestation fiscale' => 'attestation_fiscale_2024.pdf'
        )
    ),
    array(
        'id' => 2,
        'reference' => 'SOU-2025-0038',
        'nom_projet' => 'Énergie solaire pour les écoles rurales',
        'porteur' => 'Mme Afi DOSSOU',
        'email' => 'a.dossou@email.com',
        'telephone' => '+228 91 23 45 67',
        'montant' => '250 000 000 FCFA',
        'guichet' => 'Énergies et infrastructures durables',
        'date_soumission' => '10 Janvier 2025',
        'statut' => 'etude_terminee',
        'etape' => 2,
        'description' => 'Installation de panneaux solaires dans 15 écoles primaires de la région Centrale.',
        'documents' => array(
            'Statuts' => 'statuts_dossou.pdf',
            'Budget' => 'budget_solaire_2025.xlsx',
            'Attestation fiscale' => 'attestation_fiscale_dossou.pdf'
        )
    ),
    array(
        'id' => 3,
        'reference' => 'SOU-2025-0035',
        'nom_projet' => 'Protection des forêts communautaires',
        'porteur' => 'ONG Eco-Protect',
        'email' => 'contact@ecoprotect.tg',
        'telephone' => '+228 92 34 56 78',
        'montant' => '350 000 000 FCFA',
        'guichet' => 'Forêts et biodiversité',
        'date_soumission' => '8 Janvier 2025',
        'statut' => 'validation_terminee',
        'etape' => 3,
        'description' => 'Projet de préservation des forêts communautaires dans la région des Plateaux.',
        'documents' => array(
            'Statuts' => 'statuts_ecoprotect.pdf',
            'Budget' => 'budget_foret_2025.xlsx'
        )
    ),
    array(
        'id' => 4,
        'reference' => 'SOU-2025-0030',
        'nom_projet' => 'Adduction d\'eau potable',
        'porteur' => 'Commune de Kara',
        'email' => 'mairie@kara.tg',
        'telephone' => '+228 93 45 67 89',
        'montant' => '750 000 000 FCFA',
        'guichet' => 'Eau et assainissement',
        'date_soumission' => '5 Janvier 2025',
        'statut' => 'mail_envoye',
        'etape' => 4,
        'description' => 'Projet d\'adduction d\'eau potable pour les villages de la région de Kara.',
        'documents' => array(
            'Statuts' => 'statuts_kara.pdf',
            'Budget' => 'budget_eau_2025.xlsx'
        )
    ),
    array(
        'id' => 5,
        'reference' => 'SOU-2025-0025',
        'nom_projet' => 'Formation en agroécologie',
        'porteur' => 'Coopérative Yagoua',
        'email' => 'yagoua@coop.tg',
        'telephone' => '+228 94 56 78 90',
        'montant' => '180 000 000 FCFA',
        'guichet' => 'Agriculture durable',
        'date_soumission' => '2 Janvier 2025',
        'statut' => 'en_attente_etude',
        'etape' => 0,
        'description' => 'Formation de 200 agriculteurs en agroécologie et gestion durable des sols.',
        'documents' => array(
            'Statuts' => 'statuts_yagoua.pdf',
            'Budget' => 'budget_formation_2025.xlsx'
        )
    ),
);

// Traitement des actions
$message = '';
$message_type = '';

if (isset($_POST['action']) && isset($_POST['soumission_id'])) {
    $soumission_id = intval($_POST['soumission_id']);
    $action = sanitize_text_field($_POST['action']);
    
    if (!wp_verify_nonce($_POST['fvt_admin_nonce'], 'fvt_admin_action')) {
        $message = 'Erreur de sécurité. Veuillez réessayer.';
        $message_type = 'error';
    } else {
        switch ($action) {
            case 'etude':
                $message = '✅ Le dossier a été marqué comme "Étude terminée".';
                $message_type = 'success';
                break;
            case 'validation':
                $message = '✅ Le dossier a été marqué comme "Validation terminée".';
                $message_type = 'success';
                break;
            case 'mail':
                $message = '📧 Un email de notification a été envoyé au porteur de projet.';
                $message_type = 'success';
                break;
            case 'rejeter':
                $message = '⚠️ Le projet a été rejeté.';
                $message_type = 'warning';
                break;
            default:
                $message = 'Action non reconnue.';
                $message_type = 'error';
        }
    }
}

// Modal de détails du projet
$selected_soumission = null;
if (isset($_GET['details']) && !empty($_GET['details'])) {
    $details_id = intval($_GET['details']);
    foreach ($soumissions as $s) {
        if ($s['id'] === $details_id) {
            $selected_soumission = $s;
            break;
        }
    }
}

// Fonctions helper
function get_statut_label($statut) {
    $labels = array(
        'en_attente_etude' => 'En attente d\'étude',
        'etude_terminee' => 'Étude terminée',
        'validation_terminee' => 'Validation terminée',
        'mail_envoye' => 'Mail envoyé',
        'rejete' => 'Rejeté'
    );
    return isset($labels[$statut]) ? $labels[$statut] : $statut;
}

function get_statut_class($statut) {
    $classes = array(
        'en_attente_etude' => 'status-pending',
        'etude_terminee' => 'status-etude',
        'validation_terminee' => 'status-validation',
        'mail_envoye' => 'status-mail',
        'rejete' => 'status-rejected'
    );
    return isset($classes[$statut]) ? $classes[$statut] : 'status-default';
}

function get_statut_icon($statut) {
    $icons = array(
        'en_attente_etude' => 'fa-clock',
        'etude_terminee' => 'fa-check-circle',
        'validation_terminee' => 'fa-check-double',
        'mail_envoye' => 'fa-envelope',
        'rejete' => 'fa-times-circle'
    );
    return isset($icons[$statut]) ? $icons[$statut] : 'fa-question-circle';
}
?>

<!-- ============================================================
     STYLES AVEC MENU DÉROULANT ACTIONS
     ============================================================ -->
<style>
/* ============================================================
   ADMIN SOUMISSIONS - STYLES AVEC DROPDOWN
   ============================================================ */
:root {
    --vert-fvt: #0a6e3e;
    --vert-fvt-fonce: #063d24;
    --vert-light: #eaf6ee;
    --jaune-fvt: #FFCE00;
    --rouge-fvt: #D21034;
    --bleu: #2196F3;
    --gris-fond: #f6faf7;
    --blanc: #ffffff;
    --gris-texte: #5a6a5f;
    --border-color: #e7f0ea;
    --shadow: 0 2px 12px rgba(6,61,36,0.06);
    --shadow-lg: 0 8px 32px rgba(6,61,36,0.12);
}

/* ===== EN-TÊTE ===== */
.admin-header {
    background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 30px 0 35px;
    border-bottom: 1px solid var(--border-color);
    position: relative;
}
.admin-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.admin-header__content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}
.admin-header__left h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--vert-fvt-fonce);
    font-size: 2.2rem;
    margin: 0;
}
.admin-header__left .subtitle {
    font-family: 'Kumbh Sans', sans-serif;
    color: var(--gris-texte);
    font-size: 0.95rem;
    margin: 4px 0 0;
}
.admin-header__stats {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}
.stat-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 30px;
    background: var(--blanc);
    border: 1px solid var(--border-color);
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.8rem;
}
.stat-badge .number {
    font-weight: 700;
    color: var(--vert-fvt-fonce);
}

/* ===== MESSAGES ===== */
.admin-message {
    padding: 16px 24px;
    border-radius: 12px;
    margin-bottom: 24px;
    font-family: 'Kumbh Sans', sans-serif;
    display: flex;
    align-items: center;
    gap: 12px;
}
.admin-message.success { background: #e8f5e9; border-left: 4px solid #4CAF50; color: #2e7d32; }
.admin-message.error { background: #fce4ec; border-left: 4px solid var(--rouge-fvt); color: #c62828; }
.admin-message.warning { background: #fff3e0; border-left: 4px solid #FF9800; color: #e65100; }

/* ===== TABLEAU ===== */
.admin-content { padding: 30px 0 60px; background: #ffffff; }
.table-container {
    background: var(--blanc);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow);
}
.table-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 24px;
    border-bottom: 1px solid var(--border-color);
    flex-wrap: wrap;
    gap: 12px;
}
.table-toolbar .search-box {
    display: flex;
    gap: 10px;
    align-items: center;
}
.table-toolbar .search-box input {
    padding: 8px 16px;
    border: 1px solid var(--border-color);
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    min-width: 250px;
    transition: all 0.3s;
}
.table-toolbar .search-box input:focus {
    border-color: var(--vert-fvt);
    outline: none;
    box-shadow: 0 0 0 3px rgba(10, 110, 62, 0.1);
}
.table-toolbar .search-box button {
    padding: 8px 20px;
    border: none;
    border-radius: 30px;
    background: var(--vert-fvt);
    color: #fff;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}
.table-toolbar .search-box button:hover { background: var(--vert-fvt-fonce); }
.table-toolbar .filter-box {
    display: flex;
    gap: 10px;
}
.table-toolbar .filter-box select {
    padding: 8px 16px;
    border: 1px solid var(--border-color);
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    background: var(--blanc);
    cursor: pointer;
}

/* ===== TABLE ===== */
.admin-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Kumbh Sans', sans-serif;
}
.admin-table thead { background: var(--gris-fond); }
.admin-table th {
    padding: 14px 16px;
    text-align: left;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--gris-texte);
    border-bottom: 2px solid var(--border-color);
}
.admin-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-color);
    font-size: 0.9rem;
    color: #2c3e34;
    vertical-align: middle;
}
.admin-table tbody tr:hover { background: var(--gris-fond); }
.admin-table .reference { font-weight: 700; color: var(--vert-fvt-fonce); }
.admin-table .nom-projet { font-weight: 600; }
.admin-table .porteur { font-size: 0.85rem; }
.admin-table .contact { font-size: 0.8rem; color: var(--gris-texte); }
.admin-table .montant { font-weight: 600; color: var(--vert-fvt); }
.admin-table .guichet {
    font-size: 0.75rem;
    background: var(--vert-light);
    padding: 2px 12px;
    border-radius: 20px;
    display: inline-block;
}
.admin-table .date { font-size: 0.85rem; color: var(--gris-texte); }

/* ===== STATUT ===== */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 14px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
.status-pending { background: #fff3e0; color: #e65100; }
.status-etude { background: #e3f2fd; color: #1565c0; }
.status-validation { background: #e8f5e9; color: #2e7d32; }
.status-mail { background: #f3e5f5; color: #7b1fa2; }
.status-rejected { background: #fce4ec; color: #c62828; }

/* ===== ACTION DROPDOWN - STYLE PRINCIPAL ===== */
.actions-cell {
    position: relative;
}
.dropdown-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 18px;
    background: var(--vert-fvt);
    color: #fff;
    border: none;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}
.dropdown-btn:hover {
    background: var(--vert-fvt-fonce);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(10, 110, 62, 0.3);
}
.dropdown-btn i { font-size: 0.8rem; }
.dropdown-btn .arrow { 
    transition: transform 0.3s ease;
    margin-left: 4px;
}
.dropdown-btn.active .arrow { transform: rotate(180deg); }

/* ===== MENU DÉROULANT ===== */
.dropdown-menu {
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    min-width: 220px;
    background: var(--blanc);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    box-shadow: var(--shadow-lg);
    padding: 6px 0;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px) scale(0.95);
    transition: all 0.25s ease;
    transform-origin: top right;
}
.dropdown-menu.open {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}
.dropdown-menu .menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 18px;
    color: #2c3e34;
    text-decoration: none;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    font-weight: 500;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    transition: all 0.2s ease;
}
.dropdown-menu .menu-item:hover {
    background: var(--gris-fond);
}
.dropdown-menu .menu-item i {
    width: 20px;
    text-align: center;
    font-size: 0.95rem;
    color: var(--gris-texte);
}
.dropdown-menu .menu-item .icon-details { color: var(--bleu); }
.dropdown-menu .menu-item .icon-etude { color: #2196F3; }
.dropdown-menu .menu-item .icon-validation { color: #4CAF50; }
.dropdown-menu .menu-item .icon-mail { color: #9C27B0; }
.dropdown-menu .menu-item .icon-rejeter { color: var(--rouge-fvt); }
.dropdown-menu .menu-divider {
    height: 1px;
    background: var(--border-color);
    margin: 4px 12px;
}
.dropdown-menu .menu-item .shortcut {
    margin-left: auto;
    font-size: 0.7rem;
    color: var(--gris-texte);
    background: var(--gris-fond);
    padding: 1px 8px;
    border-radius: 12px;
}

/* ===== MODAL DÉTAILS ===== */
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(6, 61, 36, 0.6);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    padding: 20px;
}
.modal-overlay.open {
    opacity: 1;
    visibility: visible;
}
.modal-container {
    background: var(--blanc);
    border-radius: 20px;
    max-width: 800px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    padding: 0;
    box-shadow: 0 24px 64px rgba(0,0,0,0.2);
    transform: translateY(30px) scale(0.95);
    transition: all 0.4s ease;
}
.modal-overlay.open .modal-container {
    transform: translateY(0) scale(1);
}
.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 30px;
    border-bottom: 1px solid var(--border-color);
    position: sticky;
    top: 0;
    background: var(--blanc);
    border-radius: 20px 20px 0 0;
    z-index: 10;
}
.modal-header h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    font-size: 1.4rem;
    margin: 0;
}
.modal-close {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    background: var(--gris-fond);
    font-size: 1.4rem;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}
.modal-close:hover { background: var(--rouge-fvt); color: #fff; }
.modal-body { padding: 30px; }
.modal-body .detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px 30px;
    margin-bottom: 24px;
}
.modal-body .detail-item {
    display: flex;
    flex-direction: column;
    padding: 8px 0;
    border-bottom: 1px solid #f0f5f2;
}
.modal-body .detail-item .label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--gris-texte);
}
.modal-body .detail-item .value {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--vert-fvt-fonce);
    margin-top: 2px;
}
.modal-body .description {
    background: var(--gris-fond);
    padding: 16px 20px;
    border-radius: 12px;
    margin: 16px 0;
    border-left: 4px solid var(--vert-fvt);
}
.modal-body .description p {
    margin: 0;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    color: #2c3e34;
}
.modal-body .documents-list {
    margin-top: 16px;
}
.modal-body .documents-list h4 {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 0 0 12px;
}
.modal-body .doc-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 16px;
    background: var(--gris-fond);
    border-radius: 8px;
    margin-bottom: 8px;
}
.modal-body .doc-item i { color: var(--vert-fvt); font-size: 1.2rem; }
.modal-body .doc-item .doc-name { font-size: 0.9rem; color: #2c3e34; }
.modal-body .doc-item .doc-size { font-size: 0.75rem; color: var(--gris-texte); margin-left: auto; }
.modal-footer {
    padding: 16px 30px 24px;
    border-top: 1px solid var(--border-color);
    display: flex;
    gap: 12px;
    justify-content: flex-end;
}
.modal-footer .btn-mail {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 24px;
    background: #9C27B0;
    color: #fff;
    border: none;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s;
}
.modal-footer .btn-mail:hover {
    background: #7B1FA2;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(156, 39, 176, 0.3);
}
.modal-footer .btn-close-modal {
    padding: 10px 24px;
    background: var(--gris-fond);
    border: 1px solid var(--border-color);
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s;
}
.modal-footer .btn-close-modal:hover { background: var(--border-color); }

/* ===== RESPONSIVE ===== */
@media (max-width: 992px) {
    .admin-header__content { flex-direction: column; align-items: flex-start; }
    .admin-header__left h1 { font-size: 1.8rem; }
    .admin-table { display: block; overflow-x: auto; white-space: nowrap; }
    .table-toolbar { flex-direction: column; align-items: stretch; }
    .table-toolbar .search-box input { min-width: 100%; }
    .modal-body .detail-grid { grid-template-columns: 1fr; }
}
@media (max-width: 768px) {
    .admin-header__left h1 { font-size: 1.5rem; }
    .stat-badge { font-size: 0.7rem; padding: 4px 10px; }
    .admin-table th, .admin-table td { padding: 8px 10px; font-size: 0.75rem; }
    .dropdown-menu { min-width: 200px; right: -10px; }
    .modal-body { padding: 20px; }
    .modal-header { padding: 16px 20px; }
    .modal-footer { flex-direction: column; }
    .modal-footer .btn-mail, .modal-footer .btn-close-modal { justify-content: center; }
}
@media (max-width: 576px) {
    .admin-header__left h1 { font-size: 1.2rem; }
    .dropdown-btn { font-size: 0.7rem; padding: 6px 12px; }
    .dropdown-menu { min-width: 180px; }
    .dropdown-menu .menu-item { font-size: 0.8rem; padding: 8px 14px; }
}
</style>

<!-- ============================================================
     EN-TÊTE
     ============================================================ -->
<section class="admin-header">
    <div class="container">
        <div class="admin-header__content">
            <div class="admin-header__left">
                <h1><i class="fas fa-file-alt" style="color:var(--vert-fvt);"></i> Gestion des soumissions</h1>
                <p class="subtitle"><?php echo count($soumissions); ?> projets soumis · <?php echo date_i18n('d F Y'); ?></p>
            </div>
            <div class="admin-header__stats">
                <span class="stat-badge"><i class="fas fa-clock" style="color:#FF9800;"></i> En attente : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'en_attente_etude'; })); ?></span></span>
                <span class="stat-badge"><i class="fas fa-check-circle" style="color:#4CAF50;"></i> Étudiés : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'etude_terminee'; })); ?></span></span>
                <span class="stat-badge"><i class="fas fa-check-double" style="color:#2196F3;"></i> Validés : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'validation_terminee'; })); ?></span></span>
                <span class="stat-badge"><i class="fas fa-envelope" style="color:#9C27B0;"></i> Mail : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'mail_envoye'; })); ?></span></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="admin-content">
    <div class="container">
        
        <?php if (!empty($message)) : ?>
            <div class="admin-message <?php echo esc_attr($message_type); ?>">
                <i class="fas fa-<?php echo $message_type == 'success' ? 'check-circle' : ($message_type == 'error' ? 'exclamation-circle' : 'info-circle'); ?>"></i>
                <?php echo esc_html($message); ?>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <div class="table-toolbar">
                <div class="search-box">
                    <input type="text" id="search-input" placeholder="🔍 Rechercher..." onkeyup="filterTable()">
                    <button onclick="filterTable()"><i class="fas fa-search"></i></button>
                </div>
                <div class="filter-box">
                    <select id="filter-status" onchange="filterTable()">
                        <option value="">Tous les statuts</option>
                        <option value="en_attente_etude">En attente d'étude</option>
                        <option value="etude_terminee">Étude terminée</option>
                        <option value="validation_terminee">Validation terminée</option>
                        <option value="mail_envoye">Mail envoyé</option>
                        <option value="rejete">Rejeté</option>
                    </select>
                    <select id="filter-guichet" onchange="filterTable()">
                        <option value="">Tous les guichets</option>
                        <option value="Agriculture durable">Agriculture durable</option>
                        <option value="Forêts et biodiversité">Forêts et biodiversité</option>
                        <option value="Eau et assainissement">Eau et assainissement</option>
                        <option value="Énergies et infrastructures durables">Énergies et infrastructures durables</option>
                    </select>
                </div>
            </div>

            <table class="admin-table" id="soumissions-table">
                <thead>
                    <tr>
                        <th>Réf.</th>
                        <th>Projet</th>
                        <th>Porteur</th>
                        <th>Montant</th>
                        <th>Guichet</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th style="text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($soumissions as $soumission) : ?>
                    <tr data-statut="<?php echo esc_attr($soumission['statut']); ?>" 
                        data-guichet="<?php echo esc_attr($soumission['guichet']); ?>"
                        data-recherche="<?php echo esc_attr(strtolower($soumission['nom_projet'] . ' ' . $soumission['porteur'] . ' ' . $soumission['reference'])); ?>">
                        
                        <td class="reference"><?php echo esc_html($soumission['reference']); ?></td>
                        <td class="nom-projet"><?php echo esc_html($soumission['nom_projet']); ?></td>
                        <td>
                            <div class="porteur"><?php echo esc_html($soumission['porteur']); ?></div>
                            <div class="contact"><?php echo esc_html($soumission['email']); ?></div>
                        </td>
                        <td class="montant"><?php echo esc_html($soumission['montant']); ?></td>
                        <td><span class="guichet"><?php echo esc_html($soumission['guichet']); ?></span></td>
                        <td class="date"><?php echo esc_html($soumission['date_soumission']); ?></td>
                        <td>
                            <span class="status-badge <?php echo get_statut_class($soumission['statut']); ?>">
                                <i class="fas <?php echo get_statut_icon($soumission['statut']); ?>"></i>
                                <?php echo get_statut_label($soumission['statut']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="actions-cell">
                                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                                    <i class="fas fa-cog"></i> Actions 
                                    <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                                </button>
                                <div class="dropdown-menu">
                                    <!-- 1 - Détails du projet -->
                                    <a href="?details=<?php echo $soumission['id']; ?>" class="menu-item" onclick="event.preventDefault(); openModal(<?php echo $soumission['id']; ?>)">
                                        <i class="fas fa-eye icon-details"></i> 
                                        Détails du projet
                                        <span class="shortcut">Ctrl+D</span>
                                    </a>
                                    
                                    <div class="menu-divider"></div>
                                    
                                    <!-- 2 - Étude de dossier -->
                                    <?php if ($soumission['statut'] == 'en_attente_etude') : ?>
                                    <form method="post" style="display:contents;">
                                        <?php wp_nonce_field('fvt_admin_action', 'fvt_admin_nonce'); ?>
                                        <input type="hidden" name="soumission_id" value="<?php echo $soumission['id']; ?>">
                                        <input type="hidden" name="action" value="etude">
                                        <button type="submit" class="menu-item">
                                            <i class="fas fa-search icon-etude"></i> 
                                            Étude de dossier
                                            <span class="shortcut">Ctrl+E</span>
                                        </button>
                                    </form>
                                    <?php else : ?>
                                    <span class="menu-item" style="opacity:0.5;cursor:not-allowed;">
                                        <i class="fas fa-search" style="color:#9e9e9e;"></i> 
                                        Étude de dossier
                                        <span class="shortcut" style="background:#e0e0e0;">✔</span>
                                    </span>
                                    <?php endif; ?>
                                    
                                    <!-- 3 - Validation -->
                                    <?php if ($soumission['statut'] == 'etude_terminee') : ?>
                                    <form method="post" style="display:contents;">
                                        <?php wp_nonce_field('fvt_admin_action', 'fvt_admin_nonce'); ?>
                                        <input type="hidden" name="soumission_id" value="<?php echo $soumission['id']; ?>">
                                        <input type="hidden" name="action" value="validation">
                                        <button type="submit" class="menu-item">
                                            <i class="fas fa-check-double icon-validation"></i> 
                                            Validation
                                            <span class="shortcut">Ctrl+V</span>
                                        </button>
                                    </form>
                                    <?php else : ?>
                                    <span class="menu-item" style="opacity:0.5;cursor:not-allowed;">
                                        <i class="fas fa-check-double" style="color:#9e9e9e;"></i> 
                                        Validation
                                        <span class="shortcut" style="background:#e0e0e0;"><?php echo $soumission['etape'] >= 2 ? '✔' : '⏳'; ?></span>
                                    </span>
                                    <?php endif; ?>
                                    
                                    <!-- 4 - Mail -->
                                    <?php if ($soumission['statut'] == 'validation_terminee' || $soumission['statut'] == 'mail_envoye') : ?>
                                    <form method="post" style="display:contents;">
                                        <?php wp_nonce_field('fvt_admin_action', 'fvt_admin_nonce'); ?>
                                        <input type="hidden" name="soumission_id" value="<?php echo $soumission['id']; ?>">
                                        <input type="hidden" name="action" value="mail">
                                        <button type="submit" class="menu-item">
                                            <i class="fas fa-envelope icon-mail"></i> 
                                            <?php echo $soumission['statut'] == 'mail_envoye' ? 'Renvoyer le mail' : 'Mail envoyé'; ?>
                                            <span class="shortcut">Ctrl+M</span>
                                        </button>
                                    </form>
                                    <?php else : ?>
                                    <span class="menu-item" style="opacity:0.5;cursor:not-allowed;">
                                        <i class="fas fa-envelope" style="color:#9e9e9e;"></i> 
                                        Mail envoyé
                                        <span class="shortcut" style="background:#e0e0e0;">⏳</span>
                                    </span>
                                    <?php endif; ?>
                                    
                                    <div class="menu-divider"></div>
                                    
                                    <!-- Rejeter -->
                                    <?php if ($soumission['statut'] != 'rejete') : ?>
                                    <form method="post" style="display:contents;" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter ce projet ? Cette action est définitive.');">
                                        <?php wp_nonce_field('fvt_admin_action', 'fvt_admin_nonce'); ?>
                                        <input type="hidden" name="soumission_id" value="<?php echo $soumission['id']; ?>">
                                        <input type="hidden" name="action" value="rejeter">
                                        <button type="submit" class="menu-item" style="color:var(--rouge-fvt);">
                                            <i class="fas fa-times icon-rejeter"></i> 
                                            Rejeter le projet
                                            <span class="shortcut">Ctrl+R</span>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="table-pagination">
                <span>Affichage de <?php echo count($soumissions); ?> soumissions</span>
                <div class="pagination-buttons">
                    <button onclick="prevPage()">‹ Précédent</button>
                    <button class="active">1</button>
                    <button onclick="nextPage()">Suivant ›</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     MODAL DÉTAILS DU PROJET
     ============================================================ -->
<?php if ($selected_soumission) : ?>
<div class="modal-overlay open" id="detailsModal" onclick="if(event.target===this) closeModal()">
    <div class="modal-container">
        <div class="modal-header">
            <h2><i class="fas fa-file-alt" style="color:var(--vert-fvt);"></i> Détails du projet</h2>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body">
            <div class="detail-grid">
                <div class="detail-item">
                    <span class="label">Référence</span>
                    <span class="value"><?php echo esc_html($selected_soumission['reference']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="label">Statut</span>
                    <span class="value">
                        <span class="status-badge <?php echo get_statut_class($selected_soumission['statut']); ?>" style="font-size:0.75rem;">
                            <i class="fas <?php echo get_statut_icon($selected_soumission['statut']); ?>"></i>
                            <?php echo get_statut_label($selected_soumission['statut']); ?>
                        </span>
                    </span>
                </div>
                <div class="detail-item">
                    <span class="label">Nom du projet</span>
                    <span class="value"><?php echo esc_html($selected_soumission['nom_projet']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="label">Guichet</span>
                    <span class="value"><?php echo esc_html($selected_soumission['guichet']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="label">Porteur de projet</span>
                    <span class="value"><?php echo esc_html($selected_soumission['porteur']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="label">Contact</span>
                    <span class="value"><?php echo esc_html($selected_soumission['email']); ?> · <?php echo esc_html($selected_soumission['telephone']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="label">Montant demandé</span>
                    <span class="value" style="color:var(--vert-fvt);font-size:1.1rem;"><?php echo esc_html($selected_soumission['montant']); ?></span>
                </div>
                <div class="detail-item">
                    <span class="label">Date de soumission</span>
                    <span class="value"><?php echo esc_html($selected_soumission['date_soumission']); ?></span>
                </div>
            </div>

            <div class="description">
                <h4 style="font-family:'Kumbh Sans',sans-serif;font-size:0.85rem;color:var(--vert-fvt-fonce);margin:0 0 8px;">
                    <i class="fas fa-align-left" style="color:var(--vert-fvt);"></i> Description du projet
                </h4>
                <p><?php echo esc_html($selected_soumission['description']); ?></p>
            </div>

            <?php if (!empty($selected_soumission['documents'])) : ?>
            <div class="documents-list">
                <h4><i class="fas fa-paperclip" style="color:var(--vert-fvt);"></i> Documents joints</h4>
                <?php foreach ($selected_soumission['documents'] as $nom => $fichier) : ?>
                <div class="doc-item">
                    <i class="fas fa-file-pdf"></i>
                    <span class="doc-name"><?php echo esc_html($nom); ?></span>
                    <span class="doc-size"><?php echo esc_html($fichier); ?></span>
                    <a href="#" style="color:var(--vert-fvt);text-decoration:none;font-size:0.8rem;margin-left:auto;">
                        <i class="fas fa-download"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="modal-footer">
            <button class="btn-close-modal" onclick="closeModal()">Fermer</button>
            <a href="mailto:<?php echo esc_attr($selected_soumission['email']); ?>?subject=Suivi de votre soumission - <?php echo urlencode($selected_soumission['reference']); ?>&body=Bonjour <?php echo urlencode($selected_soumission['porteur']); ?>,%0D%0A%0D%0ANous faisons suite à votre soumission de projet intitulée '%0D%0A<?php echo urlencode($selected_soumission['nom_projet']); ?>'%0D%0Areference <?php echo urlencode($selected_soumission['reference']); ?>.%0D%0A%0D%0A%0D%0A%0D%0ACordialement,%0D%0A%0D%0A%0D%0A---%0D%0ATogo Green Fund%0D%0ATél : +228 22 22 22 22%0D%0AEmail : contact@togogreenfund.tg" 
               class="btn-mail" target="_blank">
                <i class="fas fa-envelope"></i> Envoyer un mail au porteur
            </a>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- ============================================================
     JAVASCRIPT
     ============================================================ -->
<script>
// ===== GESTION DU DROPDOWN =====
function toggleDropdown(btn) {
    event.stopPropagation();
    const cell = btn.closest('.actions-cell');
    const menu = cell.querySelector('.dropdown-menu');
    const isOpen = menu.classList.contains('open');
    
    // Fermer tous les autres menus
    document.querySelectorAll('.dropdown-menu.open').forEach(m => {
        if (m !== menu) {
            m.classList.remove('open');
            m.closest('.actions-cell').querySelector('.dropdown-btn').classList.remove('active');
        }
    });
    
    if (isOpen) {
        menu.classList.remove('open');
        btn.classList.remove('active');
    } else {
        menu.classList.add('open');
        btn.classList.add('active');
    }
}

// Fermer le dropdown en cliquant ailleurs
document.addEventListener('click', function(e) {
    if (!e.target.closest('.actions-cell')) {
        document.querySelectorAll('.dropdown-menu.open').forEach(menu => {
            menu.classList.remove('open');
            menu.closest('.actions-cell').querySelector('.dropdown-btn').classList.remove('active');
        });
    }
});

// ===== MODAL DÉTAILS =====
function openModal(id) {
    const url = new URL(window.location);
    url.searchParams.set('details', id);
    window.location.href = url.toString();
}

function closeModal() {
    const url = new URL(window.location);
    url.searchParams.delete('details');
    window.location.href = url.toString();
}

// ===== FILTRE ET RECHERCHE =====
function filterTable() {
    const searchInput = document.getElementById('search-input');
    const filterStatus = document.getElementById('filter-status');
    const filterGuichet = document.getElementById('filter-guichet');
    const rows = document.querySelectorAll('#soumissions-table tbody tr');
    
    const searchTerm = searchInput.value.toLowerCase().trim();
    const statusFilter = filterStatus.value;
    const guichetFilter = filterGuichet.value;
    
    let visibleCount = 0;
    
    rows.forEach(row => {
        const recherche = row.getAttribute('data-recherche') || '';
        const statut = row.getAttribute('data-statut') || '';
        const guichet = row.getAttribute('data-guichet') || '';
        
        let show = true;
        if (searchTerm && !recherche.includes(searchTerm)) show = false;
        if (show && statusFilter && statut !== statusFilter) show = false;
        if (show && guichetFilter && guichet !== guichetFilter) show = false;
        
        row.style.display = show ? '' : 'none';
        if (show) visibleCount++;
    });
    
    document.querySelector('.table-pagination span').textContent = 'Affichage de ' + visibleCount + ' soumissions';
}

// Recherche en temps réel
let searchTimeout;
document.getElementById('search-input').addEventListener('keyup', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(filterTable, 300);
});

// ===== PAGINATION =====
function prevPage() { alert('Fonctionnalité à implémenter avec la base de données.'); }
function nextPage() { alert('Fonctionnalité à implémenter avec la base de données.'); }

// ===== RACCOURCIS CLAVIER =====
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'd') {
        e.preventDefault();
        const firstDetails = document.querySelector('.menu-item .icon-details');
        if (firstDetails) firstDetails.closest('.menu-item').click();
    }
});

// Fermer la modale avec Échap
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modal = document.getElementById('detailsModal');
        if (modal) closeModal();
    }
});
</script>