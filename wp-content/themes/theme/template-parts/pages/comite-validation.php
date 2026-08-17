<?php
/**
 * Template part : Administration des soumissions de projets
 * Page réservée aux administrateurs et validateurs
 * 
 * @package TogoGreenFund
 */

// Vérification des droits d'accès
if (!current_user_can('administrator') && !current_user_can('editor')) {
    wp_redirect(home_url());
    exit;
}

// Simulation des données de soumissions (à remplacer par des données réelles de la base de données)
// Dans la réalité, ces données seraient récupérées depuis une table personnalisée
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
        'statut' => 'en_attente_etude', // en_attente_etude, etude_terminee, validation_terminee, mail_envoye, rejete
        'etape' => 0 // 0 = non commencé, 1 = étude en cours, 2 = étude terminée, 3 = validation terminée, 4 = mail envoyé
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
        'etape' => 2
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
        'etape' => 3
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
        'etape' => 4
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
        'etape' => 0
    ),
);

// Traitement des actions
$message = '';
$message_type = '';

if (isset($_POST['action']) && isset($_POST['soumission_id'])) {
    $soumission_id = intval($_POST['soumission_id']);
    $action = sanitize_text_field($_POST['action']);
    
    // Vérification du nonce
    if (!wp_verify_nonce($_POST['fvt_admin_nonce'], 'fvt_admin_action')) {
        $message = 'Erreur de sécurité. Veuillez réessayer.';
        $message_type = 'error';
    } else {
        // Traitement de l'action
        switch ($action) {
            case 'etude':
                // Passer le statut à "étude terminée" -> l'étape devient 2
                // Dans la réalité : mettre à jour la base de données
                $message = 'Le dossier a été marqué comme "Étude terminée". Le porteur verra l\'étape 1 terminée.';
                $message_type = 'success';
                break;
            case 'validation':
                // Passer le statut à "validation terminée" -> l'étape devient 3
                $message = 'Le dossier a été marqué comme "Validation terminée". Le porteur verra l\'étape 2 terminée.';
                $message_type = 'success';
                break;
            case 'mail':
                // Passer le statut à "mail envoyé" -> l'étape devient 4
                $message = 'Un email de notification a été envoyé au porteur de projet.';
                $message_type = 'success';
                break;
            case 'rejeter':
                // Passer le statut à "rejete" -> l'étape devient 3 (rejeté)
                $message = 'Le projet a été rejeté. Le porteur en sera informé.';
                $message_type = 'warning';
                break;
            default:
                $message = 'Action non reconnue.';
                $message_type = 'error';
        }
        
        // Dans la réalité, mettre à jour la base de données ici
    }
}

// Déterminer les actions disponibles en fonction de l'état du dossier
function get_available_actions($statut, $etape) {
    $actions = array();
    switch ($statut) {
        case 'en_attente_etude':
            $actions[] = array('value' => 'etude', 'label' => 'Étude de dossier', 'class' => 'btn-etude');
            break;
        case 'etude_terminee':
            $actions[] = array('value' => 'validation', 'label' => 'Validation', 'class' => 'btn-validation');
            break;
        case 'validation_terminee':
            $actions[] = array('value' => 'mail', 'label' => 'Mail envoyé', 'class' => 'btn-mail');
            break;
        case 'mail_envoye':
            $actions[] = array('value' => 'mail', 'label' => 'Renvoyer mail', 'class' => 'btn-mail');
            break;
        case 'rejete':
            // Aucune action disponible pour les projets rejetés
            break;
    }
    return $actions;
}

// Fonction pour obtenir le libellé du statut
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

// Fonction pour obtenir la classe CSS du statut
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

// Fonction pour obtenir l'icône du statut
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
     EN-TÊTE ADMIN
     ============================================================ -->
<style>
/* ============================================================
   ADMIN SOUMISSIONS - STYLES
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
    --shadow-lg: 0 8px 32px rgba(6,61,36,0.10);
}

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
    gap: 20px;
    flex-wrap: wrap;
}
.stat-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 30px;
    background: var(--blanc);
    border: 1px solid var(--border-color);
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
}
.stat-badge i {
    font-size: 1rem;
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
.admin-message.success {
    background: #e8f5e9;
    border-left: 4px solid #4CAF50;
    color: #2e7d32;
}
.admin-message.error {
    background: #fce4ec;
    border-left: 4px solid var(--rouge-fvt);
    color: #c62828;
}
.admin-message.warning {
    background: #fff3e0;
    border-left: 4px solid #FF9800;
    color: #e65100;
}
.admin-message i {
    font-size: 1.4rem;
}

/* ===== TABLEAU ===== */
.admin-content {
    padding: 30px 0 60px;
    background: #ffffff;
}
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
.table-toolbar .search-box button:hover {
    background: var(--vert-fvt-fonce);
}
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
    transition: all 0.3s;
}
.table-toolbar .filter-box select:focus {
    border-color: var(--vert-fvt);
    outline: none;
}

/* ===== TABLE ===== */
.admin-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Kumbh Sans', sans-serif;
}
.admin-table thead {
    background: var(--gris-fond);
}
.admin-table th {
    padding: 14px 16px;
    text-align: left;
    font-size: 0.8rem;
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
.admin-table tbody tr:hover {
    background: var(--gris-fond);
}
.admin-table .reference {
    font-weight: 700;
    color: var(--vert-fvt-fonce);
}
.admin-table .nom-projet {
    font-weight: 600;
}
.admin-table .porteur {
    font-size: 0.85rem;
}
.admin-table .contact {
    font-size: 0.8rem;
    color: var(--gris-texte);
}
.admin-table .montant {
    font-weight: 600;
    color: var(--vert-fvt);
}
.admin-table .guichet {
    font-size: 0.8rem;
    background: var(--vert-light);
    padding: 2px 12px;
    border-radius: 20px;
    display: inline-block;
}
.admin-table .date {
    font-size: 0.85rem;
    color: var(--gris-texte);
}

/* ===== STATUT ===== */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 14px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
.status-pending {
    background: #fff3e0;
    color: #e65100;
}
.status-etude {
    background: #e3f2fd;
    color: #1565c0;
}
.status-validation {
    background: #e8f5e9;
    color: #2e7d32;
}
.status-mail {
    background: #f3e5f5;
    color: #7b1fa2;
}
.status-rejected {
    background: #fce4ec;
    color: #c62828;
}
.status-default {
    background: #f5f5f5;
    color: #616161;
}

/* ===== ACTIONS ===== */
.actions-cell {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.btn-action {
    padding: 6px 16px;
    border: none;
    border-radius: 20px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}
.btn-action:hover {
    transform: translateY(-2px);
}
.btn-etude {
    background: var(--bleu);
    color: #fff;
}
.btn-etude:hover {
    background: #1976D2;
    box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
}
.btn-validation {
    background: #4CAF50;
    color: #fff;
}
.btn-validation:hover {
    background: #388E3C;
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
}
.btn-mail {
    background: #9C27B0;
    color: #fff;
}
.btn-mail:hover {
    background: #7B1FA2;
    box-shadow: 0 4px 12px rgba(156, 39, 176, 0.3);
}
.btn-rejeter {
    background: var(--rouge-fvt);
    color: #fff;
}
.btn-rejeter:hover {
    background: #b71c1c;
    box-shadow: 0 4px 12px rgba(210, 16, 52, 0.3);
}
.btn-action:disabled {
    opacity: 0.4;
    cursor: not-allowed;
    transform: none !important;
    box-shadow: none !important;
}
.btn-action i {
    font-size: 0.8rem;
}
.no-actions {
    font-size: 0.75rem;
    color: var(--gris-texte);
    font-style: italic;
}

/* ===== ETAPE INDICATOR ===== */
.etape-indicator {
    display: flex;
    gap: 6px;
    align-items: center;
}
.etape-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #dce8e0;
    transition: all 0.3s;
}
.etape-dot.done {
    background: #4CAF50;
}
.etape-dot.active {
    background: var(--bleu);
    animation: pulse 1.5s infinite;
}
@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(33, 150, 243, 0.4); }
    70% { box-shadow: 0 0 0 8px rgba(33, 150, 243, 0); }
    100% { box-shadow: 0 0 0 0 rgba(33, 150, 243, 0); }
}
.etape-dot.rejected {
    background: var(--rouge-fvt);
}

/* ===== PAGINATION ===== */
.table-pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 24px;
    border-top: 1px solid var(--border-color);
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    color: var(--gris-texte);
}
.table-pagination .pagination-buttons {
    display: flex;
    gap: 6px;
}
.table-pagination .pagination-buttons button {
    padding: 6px 14px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    background: var(--blanc);
    cursor: pointer;
    transition: all 0.3s;
}
.table-pagination .pagination-buttons button:hover {
    background: var(--vert-fvt);
    color: #fff;
}
.table-pagination .pagination-buttons button.active {
    background: var(--vert-fvt);
    color: #fff;
    border-color: var(--vert-fvt);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1200px) {
    .admin-table {
        font-size: 0.8rem;
    }
    .admin-table th,
    .admin-table td {
        padding: 10px 12px;
    }
}
@media (max-width: 992px) {
    .admin-header__content {
        flex-direction: column;
        align-items: flex-start;
    }
    .admin-header__left h1 {
        font-size: 1.8rem;
    }
    .admin-table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
    .table-toolbar {
        flex-direction: column;
        align-items: stretch;
    }
    .table-toolbar .search-box {
        flex-wrap: wrap;
    }
    .table-toolbar .search-box input {
        min-width: 100%;
    }
    .table-toolbar .filter-box {
        flex-wrap: wrap;
    }
}
@media (max-width: 768px) {
    .admin-header__left h1 {
        font-size: 1.5rem;
    }
    .stat-badge {
        font-size: 0.75rem;
        padding: 6px 12px;
    }
    .admin-table th,
    .admin-table td {
        padding: 8px 10px;
        font-size: 0.75rem;
    }
    .btn-action {
        font-size: 0.65rem;
        padding: 4px 10px;
    }
    .actions-cell {
        gap: 4px;
    }
    .table-pagination {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }
}
@media (max-width: 576px) {
    .admin-header__left h1 {
        font-size: 1.2rem;
    }
    .admin-header__stats {
        gap: 10px;
    }
    .stat-badge {
        font-size: 0.65rem;
        padding: 4px 10px;
    }
    .admin-table th,
    .admin-table td {
        padding: 6px 8px;
        font-size: 0.7rem;
    }
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
                <span class="stat-badge">
                    <i class="fas fa-clock" style="color:#FF9800;"></i>
                    En attente : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'en_attente_etude'; })); ?></span>
                </span>
                <span class="stat-badge">
                    <i class="fas fa-check-circle" style="color:#4CAF50;"></i>
                    Étudiés : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'etude_terminee'; })); ?></span>
                </span>
                <span class="stat-badge">
                    <i class="fas fa-check-double" style="color:#2196F3;"></i>
                    Validés : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'validation_terminee'; })); ?></span>
                </span>
                <span class="stat-badge">
                    <i class="fas fa-envelope" style="color:#9C27B0;"></i>
                    Mail envoyé : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'mail_envoye'; })); ?></span>
                </span>
                <span class="stat-badge">
                    <i class="fas fa-times-circle" style="color:var(--rouge-fvt);"></i>
                    Rejetés : <span class="number"><?php echo count(array_filter($soumissions, function($s) { return $s['statut'] == 'rejete'; })); ?></span>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="admin-content">
    <div class="container">
        
        <!-- Message d'alerte -->
        <?php if (!empty($message)) : ?>
            <div class="admin-message <?php echo esc_attr($message_type); ?>">
                <i class="fas fa-<?php echo $message_type == 'success' ? 'check-circle' : ($message_type == 'error' ? 'exclamation-circle' : 'info-circle'); ?>"></i>
                <?php echo esc_html($message); ?>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <!-- Barre d'outils -->
            <div class="table-toolbar">
                <div class="search-box">
                    <input type="text" id="search-input" placeholder="🔍 Rechercher par projet, porteur, référence..." onkeyup="filterTable()">
                    <button onclick="filterTable()"><i class="fas fa-search"></i> Rechercher</button>
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

            <!-- Tableau -->
            <table class="admin-table" id="soumissions-table">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Projet</th>
                        <th>Porteur</th>
                        <th>Montant</th>
                        <th>Guichet</th>
                        <th>Date</th>
                        <th>Avancement</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($soumissions as $soumission) : 
                        $actions = get_available_actions($soumission['statut'], $soumission['etape']);
                        $has_actions = !empty($actions);
                    ?>
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
                            <div class="etape-indicator">
                                <?php for ($i = 1; $i <= 4; $i++) : 
                                    $class = '';
                                    if ($soumission['etape'] >= $i) {
                                        $class = 'done';
                                    } elseif ($soumission['etape'] == $i - 1) {
                                        $class = 'active';
                                    }
                                    if ($soumission['statut'] == 'rejete') {
                                        $class = 'rejected';
                                    }
                                ?>
                                <span class="etape-dot <?php echo $class; ?>" title="Étape <?php echo $i; ?>"></span>
                                <?php endfor; ?>
                            </div>
                        </td>
                        <td>
                            <span class="status-badge <?php echo get_statut_class($soumission['statut']); ?>">
                                <i class="fas <?php echo get_statut_icon($soumission['statut']); ?>"></i>
                                <?php echo get_statut_label($soumission['statut']); ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($has_actions) : ?>
                                <div class="actions-cell">
                                    <?php foreach ($actions as $action) : ?>
                                        <form method="post" style="display:inline;">
                                            <?php wp_nonce_field('fvt_admin_action', 'fvt_admin_nonce'); ?>
                                            <input type="hidden" name="soumission_id" value="<?php echo $soumission['id']; ?>">
                                            <input type="hidden" name="action" value="<?php echo $action['value']; ?>">
                                            <button type="submit" class="btn-action <?php echo $action['class']; ?>">
                                                <i class="fas fa-<?php echo $action['value'] == 'etude' ? 'search' : ($action['value'] == 'validation' ? 'check-double' : 'envelope'); ?>"></i>
                                                <?php echo $action['label']; ?>
                                            </button>
                                        </form>
                                    <?php endforeach; ?>
                                    <?php if ($soumission['statut'] != 'rejete') : ?>
                                        <form method="post" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter ce projet ?');">
                                            <?php wp_nonce_field('fvt_admin_action', 'fvt_admin_nonce'); ?>
                                            <input type="hidden" name="soumission_id" value="<?php echo $soumission['id']; ?>">
                                            <input type="hidden" name="action" value="rejeter">
                                            <button type="submit" class="btn-action btn-rejeter">
                                                <i class="fas fa-times"></i> Rejeter
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php else : ?>
                                <span class="no-actions">Aucune action</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
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
     JAVASCRIPT
     ============================================================ -->
<script>
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
        
        // Filtre recherche
        if (searchTerm && !recherche.includes(searchTerm)) {
            show = false;
        }
        
        // Filtre statut
        if (show && statusFilter && statut !== statusFilter) {
            show = false;
        }
        
        // Filtre guichet
        if (show && guichetFilter && guichet !== guichetFilter) {
            show = false;
        }
        
        row.style.display = show ? '' : 'none';
        if (show) visibleCount++;
    });
    
    // Mise à jour du compteur
    const pagination = document.querySelector('.table-pagination span');
    if (pagination) {
        pagination.textContent = 'Affichage de ' + visibleCount + ' soumissions';
    }
}

function prevPage() {
    // Simulation de pagination (à implémenter avec une vraie pagination)
    alert('Fonctionnalité de pagination à implémenter avec la base de données.');
}

function nextPage() {
    alert('Fonctionnalité de pagination à implémenter avec la base de données.');
}

// Recherche en temps réel avec délai
let searchTimeout;
document.getElementById('search-input').addEventListener('keyup', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(filterTable, 300);
});
</script>