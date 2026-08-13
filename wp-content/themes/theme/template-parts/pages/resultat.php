<?php
/**
 * Template part : Résultat du suivi de soumission
 * Page affichée après la vérification du code
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Simulation des données (à remplacer par les données réelles de la base de données)
// Dans la réalité, ces données seraient récupérées via une requête SQL avec le code de vérification
$verification_code = isset($_POST['reference']) ? sanitize_text_field($_POST['reference']) : '';

// Simulation de données pour l'exemple
$dossier_info = array(
    'statut' => 'en_cours', // 'en_cours', 'valide', 'rejete'
    'nom_projet' => 'Agriculture résiliente dans les Savanes',
    'date_soumission' => '15 Janvier 2025',
    'numero_dossier' => 'SOU-2025-0042',
    'categorie' => 'Grand projet / stratégique',
    'montant_demande' => '500 000 000 FCFA',
    'porteur_nom' => 'M. Kodjo AGBEME',
    'porteur_email' => 'k.agbeme@email.com',
    'porteur_telephone' => '+228 90 12 34 56',
    'etapes' => array(
        'etude' => array(
            'statut' => 'termine', // 'encours', 'termine', 'bloque'
            'date_debut' => '20 Janvier 2025',
            'date_fin' => '15 Février 2025',
            'message' => 'Votre dossier a été étudié par le comité technique.',
            'detail' => 'Le comité technique a examiné la recevabilité et la conformité de votre dossier.'
        ),
        'validation' => array(
            'statut' => 'encours', // 'encours', 'termine', 'bloque'
            'date_debut' => '16 Février 2025',
            'date_fin' => '',
            'message' => 'Votre dossier est en attente de validation finale.',
            'detail' => 'La commission de validation se réunit prochainement pour statuer sur votre projet.'
        )
    )
);

// Déterminer le statut global pour l'affichage
$statut_global = $dossier_info['statut'];
$statut_label = '';
$statut_class = '';
$statut_icon = '';
$statut_color = '';

switch ($statut_global) {
    case 'en_cours':
        $statut_label = 'En cours d\'instruction';
        $statut_class = 'statut-encours';
        $statut_icon = 'fa-spinner fa-spin';
        $statut_color = '#2196F3';
        break;
    case 'valide':
        $statut_label = 'Projet validé';
        $statut_class = 'statut-valide';
        $statut_icon = 'fa-check-circle';
        $statut_color = '#4CAF50';
        break;
    case 'rejete':
        $statut_label = 'Projet non retenu';
        $statut_class = 'statut-rejete';
        $statut_icon = 'fa-times-circle';
        $statut_color = '#D21034';
        break;
}
?>

<!-- ============================================================
     EN-TÊTE
     ============================================================ -->
<section class="suivi-result-header">
    <div class="container">
        <nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
            <ol>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li><a href="<?php echo esc_url( home_url( '/suivi-de-soumission' ) ); ?>">Suivi de soumission</a></li>
                <li class="separator">›</li>
                <li class="current">Résultat</li>
            </ol>
        </nav>
        
        <div class="result-header-content">
            <span class="suivi-header__badge"><i class="fas fa-file-alt"></i> Porteur de projet</span>
            <h1>Suivi de votre soumission</h1>
            <div class="title-underline"></div>
            <p class="suivi-header__sub">Retrouvez ici l'état d'avancement de votre dossier de projet.</p>
        </div>
    </div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="suivi-result-content">
    <div class="container">

        <!-- ===== ALERTE STATUT GLOBAL ===== -->
        <div class="suivi-alert <?php echo esc_attr($statut_class); ?>">
            <div class="alert-icon" style="background: <?php echo esc_attr($statut_color); ?>;">
                <i class="fas <?php echo esc_attr($statut_icon); ?>"></i>
            </div>
            <div class="suivi-alert__content">
                <div class="alert-title">Statut de votre dossier</div>
                <div class="alert-status"><?php echo esc_html($statut_label); ?></div>
                <div class="alert-ref">Référence : <strong><?php echo esc_html($dossier_info['numero_dossier']); ?></strong></div>
            </div>
        </div>

        <!-- ===== INFOS PROJET ===== -->
        <div class="suivi-card infos-projet">
            <h3 class="suivi-card__title"><i class="fas fa-info-circle"></i> Informations du projet</h3>
            <div class="suivi-grid">
                <div class="suivi-grid__item">
                    <span class="suivi-grid__label">📌 Nom du projet</span>
                    <span class="suivi-grid__value"><?php echo esc_html($dossier_info['nom_projet']); ?></span>
                </div>
                <div class="suivi-grid__item">
                    <span class="suivi-grid__label">📋 Numéro de dossier</span>
                    <span class="suivi-grid__value"><?php echo esc_html($dossier_info['numero_dossier']); ?></span>
                </div>
                <div class="suivi-grid__item">
                    <span class="suivi-grid__label">📅 Date de soumission</span>
                    <span class="suivi-grid__value"><?php echo esc_html($dossier_info['date_soumission']); ?></span>
                </div>
                <div class="suivi-grid__item">
                    <span class="suivi-grid__label">📂 Catégorie</span>
                    <span class="suivi-grid__value"><?php echo esc_html($dossier_info['categorie']); ?></span>
                </div>
                <div class="suivi-grid__item">
                    <span class="suivi-grid__label">💰 Montant demandé</span>
                    <span class="suivi-grid__value"><?php echo esc_html($dossier_info['montant_demande']); ?></span>
                </div>
                <div class="suivi-grid__item">
                    <span class="suivi-grid__label">👤 Porteur de projet</span>
                    <span class="suivi-grid__value"><?php echo esc_html($dossier_info['porteur_nom']); ?></span>
                </div>
            </div>
        </div>

        <!-- ===== ÉTAPES DE TRAITEMENT ===== -->
        <div class="suivi-timeline">
            <h3 class="suivi-timeline__title"><i class="fas fa-tasks"></i> Étapes de traitement</h3>
            
            <!-- Étape 1 : Étude de dossier -->
            <div class="timeline-step <?php echo ($dossier_info['etapes']['etude']['statut'] == 'termine') ? 'step-termine' : 'step-encours'; ?>">
                <div class="timeline-step__marker">
                    <div class="step-number <?php echo ($dossier_info['etapes']['etude']['statut'] == 'termine') ? 'step-done' : 'step-active'; ?>">
                        <?php if ($dossier_info['etapes']['etude']['statut'] == 'termine') : ?>
                            <i class="fas fa-check"></i>
                        <?php else : ?>
                            1
                        <?php endif; ?>
                    </div>
                    <?php if ($dossier_info['etapes']['etude']['statut'] == 'termine') : ?>
                        <div class="step-line step-line-done"></div>
                    <?php else : ?>
                        <div class="step-line step-line-active"></div>
                    <?php endif; ?>
                </div>
                <div class="timeline-step__content">
                    <div class="step-header">
                        <h4 class="step-title">
                            <i class="fas fa-search" style="color: var(--vert-fvt);"></i> Étape 1 : Étude de dossier
                        </h4>
                        <span class="step-status">
                            <?php if ($dossier_info['etapes']['etude']['statut'] == 'termine') : ?>
                                <span class="status-badge status-done"><i class="fas fa-check-circle"></i> Terminé</span>
                            <?php else : ?>
                                <span class="status-badge status-progress"><i class="fas fa-spinner fa-spin"></i> En cours</span>
                            <?php endif; ?>
                        </span>
                    </div>
                    
                    <div class="step-message-box">
                        <p class="step-message"><?php echo esc_html($dossier_info['etapes']['etude']['message']); ?></p>
                    </div>
                    
                    <div class="step-detail">
                        <i class="fas fa-info-circle"></i>
                        <span><?php echo esc_html($dossier_info['etapes']['etude']['detail']); ?></span>
                    </div>
                    
                    <div class="step-dates">
                        <span><i class="far fa-calendar-alt"></i> Début : <?php echo esc_html($dossier_info['etapes']['etude']['date_debut']); ?></span>
                        <?php if (!empty($dossier_info['etapes']['etude']['date_fin'])) : ?>
                            <span><i class="far fa-calendar-check"></i> Fin : <?php echo esc_html($dossier_info['etapes']['etude']['date_fin']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Étape 2 : Validation -->
            <div class="timeline-step <?php 
                if ($statut_global == 'valide' || $statut_global == 'rejete') {
                    echo 'step-termine';
                } elseif ($dossier_info['etapes']['validation']['statut'] == 'encours') {
                    echo 'step-encours';
                } else {
                    echo 'step-bloque';
                }
            ?>">
                <div class="timeline-step__marker">
                    <div class="step-number <?php 
                        if ($statut_global == 'valide' || $statut_global == 'rejete') {
                            echo 'step-done';
                        } elseif ($dossier_info['etapes']['validation']['statut'] == 'encours') {
                            echo 'step-active';
                        } else {
                            echo 'step-pending';
                        }
                    ?>">
                        <?php if ($statut_global == 'valide') : ?>
                            <i class="fas fa-check" style="color: #4CAF50;"></i>
                        <?php elseif ($statut_global == 'rejete') : ?>
                            <i class="fas fa-times" style="color: #D21034;"></i>
                        <?php elseif ($dossier_info['etapes']['validation']['statut'] == 'encours') : ?>
                            2
                        <?php else : ?>
                            2
                        <?php endif; ?>
                    </div>
                </div>
                <div class="timeline-step__content">
                    <div class="step-header">
                        <h4 class="step-title">
                            <i class="fas fa-check-double" style="color: var(--vert-fvt);"></i> Étape 2 : Validation
                        </h4>
                        <span class="step-status">
                            <?php if ($statut_global == 'valide') : ?>
                                <span class="status-badge status-valid"><i class="fas fa-check-circle"></i> Validé ✅</span>
                            <?php elseif ($statut_global == 'rejete') : ?>
                                <span class="status-badge status-rejected"><i class="fas fa-times-circle"></i> Rejeté ❌</span>
                            <?php elseif ($dossier_info['etapes']['validation']['statut'] == 'encours') : ?>
                                <span class="status-badge status-progress"><i class="fas fa-spinner fa-spin"></i> En attente</span>
                            <?php else : ?>
                                <span class="status-badge status-pending"><i class="fas fa-clock"></i> En attente</span>
                            <?php endif; ?>
                        </span>
                    </div>
                    
                    <div class="step-message-box <?php 
                        if ($statut_global == 'valide') echo 'step-valid';
                        elseif ($statut_global == 'rejete') echo 'step-rejected';
                        else echo 'step-pending';
                    ?>">
                        <p class="step-message">
                            <?php if ($statut_global == 'valide') : ?>
                                ✅ <strong>Félicitations !</strong> Votre projet a été validé par le comité de validation.
                            <?php elseif ($statut_global == 'rejete') : ?>
                                ❌ <strong>Information importante :</strong> Votre projet n'a pas été retenu pour cette session.
                            <?php else : ?>
                                <?php echo esc_html($dossier_info['etapes']['validation']['message']); ?>
                            <?php endif; ?>
                        </p>
                    </div>
                    
                    <div class="step-detail">
                        <i class="fas fa-info-circle"></i>
                        <span>
                            <?php if ($statut_global == 'valide') : ?>
                                Une convention de partenariat vous sera envoyée par email. 
                                <strong>Veuillez consulter votre boîte mail</strong> pour les prochaines étapes.
                            <?php elseif ($statut_global == 'rejete') : ?>
                                <strong>Veuillez consulter votre boîte mail</strong> pour obtenir les détails 
                                et les recommandations pour améliorer votre projet.
                            <?php else : ?>
                                <?php echo esc_html($dossier_info['etapes']['validation']['detail']); ?>
                            <?php endif; ?>
                        </span>
                    </div>
                    
                    <div class="step-dates">
                        <span><i class="far fa-calendar-alt"></i> Début : <?php echo esc_html($dossier_info['etapes']['validation']['date_debut']); ?></span>
                        <?php if (!empty($dossier_info['etapes']['validation']['date_fin'])) : ?>
                            <span><i class="far fa-calendar-check"></i> Fin : <?php echo esc_html($dossier_info['etapes']['validation']['date_fin']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Message spécifique pour la validation finale -->
                    <?php if ($statut_global == 'valide' || $statut_global == 'rejete') : ?>
                        <div class="step-notification">
                            <div class="notification-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="notification-content">
                                <strong>📧 Email envoyé</strong>
                                <span>Un email récapitulatif a été envoyé à <strong><?php echo esc_html($dossier_info['porteur_email']); ?></strong></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- ===== RAPPEL CONTACT ===== -->
        <div class="suivi-contact">
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="contact-card__content">
                    <h4>Besoin d'aide ?</h4>
                    <p>Pour toute question concernant votre dossier, contactez notre équipe d'assistance.</p>
                    <div class="contact-card__infos">
                        <span><i class="fas fa-phone"></i> +228 22 22 22 22</span>
                        <span><i class="fas fa-envelope"></i> soumission@fondsvert.tg</span>
                        <span><i class="fas fa-clock"></i> Lun - Ven : 08h - 17h</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== BOUTONS D'ACTION ===== -->
        <div class="suivi-actions">
            <button onclick="window.print()" class="btn-print">
                <i class="fas fa-print"></i> Imprimer cette page
            </button>
            <a href="<?php echo esc_url( home_url( '/suivi-de-soumission' ) ); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Retour au suivi
            </a>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-home">
                <i class="fas fa-home"></i> Accueil
            </a>
        </div>

    </div>
</section>

<!-- ============================================================
     STYLES CSS
     ============================================================ -->
<style>
/* ============================================================
   PAGE RÉSULTAT SUIVI DE SOUMISSION
   ============================================================ */
:root {
    --vert-fvt:        #0a6e3e;
    --vert-fvt-fonce:  #063d24;
    --vert-light:      #eaf6ee;
    --jaune-fvt:       #FFCE00;
    --rouge-fvt:       #D21034;
    --gris-fond:       #f6faf7;
    --blanc:           #ffffff;
    --gris-texte:      #5a6a5f;
    --border-color:    #e7f0ea;
    --shadow:          0 2px 12px rgba(6,61,36,0.06);
}

/* ===== EN-TÊTE ===== */
.suivi-result-header {
    background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 45px;
    border-bottom: 1px solid var(--border-color);
    text-align: center;
    position: relative;
}
.suivi-result-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.result-header-content {
    position: relative;
    z-index: 1;
}
.suivi-header__badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 20px;
    border-radius: 30px;
    background: rgba(10, 110, 62, 0.08);
    color: var(--vert-fvt-fonce);
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 18px;
}
.suivi-header__badge i {
    color: var(--vert-fvt);
}
.suivi-result-header h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--vert-fvt-fonce);
    font-size: 2.8rem;
    margin: 0;
}
.title-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--jaune-fvt), var(--vert-fvt));
    margin: 16px auto 0;
    border-radius: 4px;
}
.suivi-header__sub {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.1rem;
    color: var(--gris-texte);
    max-width: 600px;
    margin: 18px auto 0;
}

/* ===== BREADCRUMB ===== */
.breadcrumb-wrapper {
    margin-bottom: 25px;
}
.breadcrumb-wrapper ol {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    list-style: none;
    padding: 0;
    margin: 0;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    flex-wrap: wrap;
    background: rgba(255,255,255,0.55);
    padding: 10px 24px;
    border-radius: 40px;
    box-shadow: var(--shadow);
    display: inline-flex;
}
.breadcrumb-wrapper ol li a {
    color: #4d6a59;
    text-decoration: none;
    transition: color 0.2s;
}
.breadcrumb-wrapper ol li a:hover {
    color: var(--vert-fvt);
}
.breadcrumb-wrapper ol li a i {
    margin-right: 6px;
    font-size: 0.85rem;
    color: var(--vert-fvt);
}
.breadcrumb-wrapper .separator {
    color: var(--jaune-fvt);
    font-weight: 300;
    font-size: 1.1rem;
}
.breadcrumb-wrapper .current {
    color: var(--vert-fvt-fonce);
    font-weight: 700;
}

/* ===== CONTENU ===== */
.suivi-result-content {
    padding: 40px 0 60px;
    background: #ffffff;
}

/* ===== ALERTE STATUT ===== */
.suivi-alert {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 22px 30px;
    border-radius: 16px;
    margin-bottom: 35px;
    background: var(--gris-fond);
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow);
}
.alert-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.alert-icon i {
    font-size: 2rem;
    color: #fff;
}
.suivi-alert__content {
    flex: 1;
}
.alert-title {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    color: var(--gris-texte);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.alert-status {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 4px 0;
}
.alert-ref {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    color: var(--gris-texte);
}
.alert-ref strong {
    color: var(--vert-fvt-fonce);
}

/* ===== CARTE INFOS PROJET ===== */
.suivi-card {
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 28px 32px;
    margin-bottom: 35px;
    box-shadow: var(--shadow);
}
.suivi-card__title {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 0 0 20px;
}
.suivi-card__title i {
    color: var(--vert-fvt);
    margin-right: 10px;
}
.suivi-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px 30px;
}
.suivi-grid__item {
    display: flex;
    flex-direction: column;
    padding: 8px 0;
    border-bottom: 1px solid #f0f5f2;
}
.suivi-grid__item:last-child,
.suivi-grid__item:nth-last-child(2) {
    border-bottom: none;
}
.suivi-grid__label {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.8rem;
    color: var(--gris-texte);
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
.suivi-grid__value {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    font-weight: 600;
    color: var(--vert-fvt-fonce);
    margin-top: 2px;
}

/* ===== TIMELINE ===== */
.suivi-timeline {
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 28px 32px;
    margin-bottom: 35px;
    box-shadow: var(--shadow);
}
.suivi-timeline__title {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 0 0 25px;
}
.suivi-timeline__title i {
    color: var(--vert-fvt);
    margin-right: 10px;
}

/* Étape individuelle */
.timeline-step {
    display: flex;
    gap: 24px;
    padding: 20px 0;
    position: relative;
}
.timeline-step:not(:last-child) {
    border-bottom: 1px solid #f0f5f2;
}
.timeline-step__marker {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex-shrink: 0;
    width: 50px;
}
.step-number {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    font-weight: 700;
    border: 3px solid var(--border-color);
    background: #fff;
    color: var(--gris-texte);
    transition: all 0.3s ease;
    z-index: 2;
}
.step-active {
    border-color: #2196F3;
    background: #2196F3;
    color: #fff;
}
.step-done {
    border-color: #4CAF50;
    background: #4CAF50;
    color: #fff;
}
.step-pending {
    border-color: #FF9800;
    background: #FF9800;
    color: #fff;
}
.step-line {
    flex: 1;
    width: 3px;
    background: var(--border-color);
    min-height: 30px;
    margin-top: 4px;
}
.step-line-done {
    background: #4CAF50;
}
.step-line-active {
    background: #2196F3;
}

.timeline-step__content {
    flex: 1;
    padding-top: 2px;
}
.step-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 12px;
}
.step-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 0;
}
.step-title i {
    margin-right: 8px;
}
.step-status {
    flex-shrink: 0;
}
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 14px;
    border-radius: 20px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
}
.status-done {
    background: #e8f5e9;
    color: #2e7d32;
}
.status-progress {
    background: #e3f2fd;
    color: #1565c0;
}
.status-valid {
    background: #e8f5e9;
    color: #2e7d32;
}
.status-rejected {
    background: #fce4ec;
    color: #c62828;
}
.status-pending {
    background: #fff3e0;
    color: #e65100;
}

.step-message-box {
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 12px;
    background: var(--gris-fond);
}
.step-message-box.step-valid {
    background: #e8f5e9;
    border-left: 4px solid #4CAF50;
}
.step-message-box.step-rejected {
    background: #fce4ec;
    border-left: 4px solid #D21034;
}
.step-message-box.step-pending {
    background: #fff3e0;
    border-left: 4px solid #FF9800;
}
.step-message {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    color: #2c3e34;
    margin: 0;
}
.step-detail {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    color: var(--gris-texte);
    margin-bottom: 10px;
    padding: 10px 14px;
    background: #f8faf9;
    border-radius: 8px;
}
.step-detail i {
    color: var(--vert-fvt);
    margin-top: 2px;
}
.step-dates {
    display: flex;
    flex-wrap: wrap;
    gap: 16px 24px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    color: var(--gris-texte);
}
.step-dates i {
    color: var(--vert-fvt);
    margin-right: 4px;
}

/* Notification email */
.step-notification {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-top: 16px;
    padding: 14px 20px;
    background: #e3f2fd;
    border-radius: 10px;
    border: 1px solid #bbdefb;
}
.notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #2196F3;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.notification-icon i {
    color: #fff;
    font-size: 1.2rem;
}
.notification-content {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    color: #0d47a1;
}
.notification-content strong {
    display: block;
    margin-bottom: 2px;
}

/* ===== CONTACT ===== */
.suivi-contact {
    margin-bottom: 35px;
}
.contact-card {
    display: flex;
    align-items: center;
    gap: 24px;
    padding: 24px 30px;
    background: linear-gradient(145deg, var(--gris-fond), #ffffff);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    box-shadow: var(--shadow);
}
.contact-icon {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: var(--vert-fvt);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.contact-icon i {
    color: #fff;
    font-size: 1.6rem;
}
.contact-card__content {
    flex: 1;
}
.contact-card__content h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 0 0 4px;
}
.contact-card__content p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    color: var(--gris-texte);
    margin: 0 0 10px;
}
.contact-card__infos {
    display: flex;
    flex-wrap: wrap;
    gap: 16px 24px;
}
.contact-card__infos span {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    color: var(--gris-texte);
}
.contact-card__infos i {
    color: var(--vert-fvt);
    margin-right: 6px;
}

/* ===== BOUTONS ===== */
.suivi-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: center;
}
.suivi-actions a,
.suivi-actions button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 28px;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-print {
    background: var(--vert-fvt);
    color: #fff;
}
.btn-print:hover {
    background: var(--vert-fvt-fonce);
    transform: translateY(-2px);
}
.btn-back {
    background: var(--gris-fond);
    color: var(--vert-fvt-fonce);
    border: 1px solid var(--border-color);
}
.btn-back:hover {
    background: var(--border-color);
    transform: translateY(-2px);
}
.btn-home {
    background: var(--jaune-fvt);
    color: var(--vert-fvt-fonce);
}
.btn-home:hover {
    background: #e6b800;
    transform: translateY(-2px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 992px) {
    .suivi-result-header h1 {
        font-size: 2.4rem;
    }
    .suivi-grid {
        grid-template-columns: 1fr 1fr;
    }
}
@media (max-width: 768px) {
    .suivi-result-header h1 {
        font-size: 2rem;
    }
    .suivi-alert {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    .alert-status {
        font-size: 1.3rem;
    }
    .suivi-grid {
        grid-template-columns: 1fr;
    }
    .suivi-grid__item:last-child {
        border-bottom: none;
    }
    .timeline-step {
        flex-direction: column;
        gap: 12px;
    }
    .timeline-step__marker {
        flex-direction: row;
        width: 100%;
        gap: 12px;
    }
    .step-line {
        display: none;
    }
    .step-header {
        flex-direction: column;
        align-items: flex-start;
    }
    .suivi-card {
        padding: 20px;
    }
    .suivi-timeline {
        padding: 20px;
    }
    .contact-card {
        flex-direction: column;
        text-align: center;
    }
    .contact-card__infos {
        justify-content: center;
    }
    .suivi-actions {
        flex-direction: column;
        align-items: stretch;
    }
    .suivi-actions a,
    .suivi-actions button {
        justify-content: center;
    }
}
@media (max-width: 576px) {
    .suivi-result-header h1 {
        font-size: 1.6rem;
    }
    .suivi-header__sub {
        font-size: 0.95rem;
    }
    .suivi-result-content {
        padding: 20px 0 40px;
    }
    .step-title {
        font-size: 1rem;
    }
    .status-badge {
        font-size: 0.7rem;
        padding: 3px 10px;
    }
    .alert-status {
        font-size: 1.1rem;
    }
    .step-notification {
        flex-direction: column;
        text-align: center;
    }
}

/* ===== PRINT ===== */
@media print {
    .suivi-result-header {
        padding: 20px 0;
    }
    .suivi-result-header::after {
        display: none;
    }
    .breadcrumb-wrapper,
    .suivi-actions {
        display: none !important;
    }
    .suivi-card,
    .suivi-timeline,
    .contact-card,
    .suivi-alert {
        box-shadow: none;
        border-color: #ddd;
    }
    .suivi-alert {
        background: #f9f9f9 !important;
    }
    .suivi-result-content {
        padding: 20px 0;
    }
    .step-notification {
        background: #f0f0f0 !important;
        border-color: #ccc !important;
    }
}
</style>