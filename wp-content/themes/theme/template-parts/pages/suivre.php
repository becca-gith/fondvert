<?php
/**
 * Template part : Page "Suivi de soumission" – dynamique
 * Récupère les soumissions depuis le CPT "soumission"
 *
 * @package TogoGreenFund
 */

// Si une référence est passée en GET (lien direct), on la récupère
$ref_to_search = isset( $_GET['ref'] ) ? sanitize_text_field( $_GET['ref'] ) : '';
$soumission_trouvee = null;

if ( ! empty( $ref_to_search ) ) {
    $args = array(
        'post_type'      => 'soumission',
        'posts_per_page' => 1,
        'meta_query'     => array(
            array(
                'key'   => '_soumission_reference',
                'value' => strtoupper( $ref_to_search ),
            ),
        ),
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        $query->the_post();
        $post_id = get_the_ID();
        $soumission_trouvee = array(
            'id'       => $post_id,
            'reference'=> get_post_meta( $post_id, '_soumission_reference', true ),
            'projet'   => get_the_title(),
            'type'     => get_post_meta( $post_id, '_soumission_type_projet', true ),
            'date'     => get_the_date( 'd F Y' ),
            'statut'   => get_post_meta( $post_id, '_soumission_statut', true ) ?: 'en_attente',
            'nom'      => get_post_meta( $post_id, '_soumission_nom', true ),
            'prenom'   => get_post_meta( $post_id, '_soumission_prenom', true ),
            'email'    => get_post_meta( $post_id, '_soumission_email', true ),
            'telephone'=> get_post_meta( $post_id, '_soumission_telephone', true ),
            'montant'  => get_post_meta( $post_id, '_soumission_montant', true ),
        );
    }
    wp_reset_postdata();
}

// Si une référence est trouvée, on redirige vers la page de résultat
// Le porteur de projet verra la page avec les 2 étapes
$show_result = $soumission_trouvee !== null;

// Statuts pour l'affichage
$statuts_display = array(
    'en_attente' => array(
        'label' => 'En attente',
        'class' => 'statut--attente',
        'icon' => 'fa-clock',
        'etapes' => array( 
            'etude' => array(
                'label' => 'Étude de dossier',
                'status' => 'encours',
                'message' => 'Votre dossier est en attente d\'étude par le comité technique.',
                'detail' => 'Le comité technique examinera la recevabilité et la conformité de votre dossier.'
            ),
            'validation' => array(
                'label' => 'Validation',
                'status' => 'bloque',
                'message' => 'En attente de l\'étude du dossier.',
                'detail' => 'Cette étape débutera après l\'étude du dossier.'
            )
        ),
        'progress' => 20,
    ),
    'en_cours' => array(
        'label' => 'En cours d\'instruction',
        'class' => 'statut--encours',
        'icon' => 'fa-spinner fa-spin',
        'etapes' => array(
            'etude' => array(
                'label' => 'Étude de dossier',
                'status' => 'termine',
                'message' => 'Votre dossier a été étudié par le comité technique.',
                'detail' => 'Le comité technique a examiné la recevabilité et la conformité de votre dossier.'
            ),
            'validation' => array(
                'label' => 'Validation',
                'status' => 'encours',
                'message' => 'Votre dossier est en attente de validation finale.',
                'detail' => 'La commission de validation se réunit prochainement pour statuer sur votre projet.'
            )
        ),
        'progress' => 50,
    ),
    'approuve' => array(
        'label' => 'Projet validé ✅',
        'class' => 'statut--approuve',
        'icon' => 'fa-check-circle',
        'etapes' => array(
            'etude' => array(
                'label' => 'Étude de dossier',
                'status' => 'termine',
                'message' => 'Votre dossier a été étudié par le comité technique.',
                'detail' => 'Le comité technique a validé la conformité de votre dossier.'
            ),
            'validation' => array(
                'label' => 'Validation',
                'status' => 'termine',
                'message' => '✅ Félicitations ! Votre projet a été validé par le comité de validation.',
                'detail' => 'Une convention de partenariat vous sera envoyée par email. Veuillez consulter votre boîte mail pour les détails.'
            )
        ),
        'progress' => 100,
    ),
    'rejete' => array(
        'label' => 'Projet non retenu ❌',
        'class' => 'statut--rejete',
        'icon' => 'fa-times-circle',
        'etapes' => array(
            'etude' => array(
                'label' => 'Étude de dossier',
                'status' => 'termine',
                'message' => 'Votre dossier a été étudié par le comité technique.',
                'detail' => 'Le comité technique a examiné la recevabilité de votre dossier.'
            ),
            'validation' => array(
                'label' => 'Validation',
                'status' => 'termine',
                'message' => '❌ Votre projet n\'a pas été retenu pour cette session.',
                'detail' => 'Veuillez consulter votre boîte mail pour obtenir les détails et les recommandations.'
            )
        ),
        'progress' => 100,
    ),
);

// Si aucune référence n'est trouvée, afficher un message
$not_found = isset( $_GET['ref'] ) && $soumission_trouvee === null;
?>

<!-- ===== STYLES CSS ===== -->
<style>
/* ============================================================
   PAGE SUIVI – CHARTE TOGO GREEN FUND
   ============================================================ */
:root {
    --vert-fvt:        #0a6e3e;
    --vert-fvt-fonce:  #063d24;
    --jaune-fvt:       #FFCE00;
    --rouge-fvt:       #D21034;
    --gris-fond:       #f6faf7;
    --blanc:           #ffffff;
    --gris-texte:      #5a6a5f;
    --border-color:    #e7f0ea;
    --shadow:          0 2px 12px rgba(6,61,36,0.06);
}

.suivi-header {
    background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 50px 0 55px;
    border-bottom: 1px solid #e0ebe6;
    text-align: center;
    position: relative;
}
.suivi-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.breadcrumb-wrapper {
    margin-bottom: 20px;
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
    box-shadow: 0 2px 12px rgba(6,61,36,0.06);
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
    font-size: 14px;
}
.suivi-header h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--vert-fvt-fonce);
    text-transform: uppercase;
    font-size: 3.2rem;
    letter-spacing: -0.5px;
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
    color: #5a6a5f;
    max-width: 600px;
    margin: 18px auto 0;
}

.suivi-content {
    padding: 50px 0 30px;
    background: #ffffff;
}

.suivi-search {
    max-width: 640px;
    margin: 0 auto 40px;
}
.suivi-search__form {
    background: var(--gris-fond);
    border: 1px solid #e7f0ea;
    border-radius: 20px;
    padding: 32px 30px;
    box-shadow: 0 8px 24px rgba(6,61,36,0.04);
}
.suivi-search__input-group {
    display: flex;
    gap: 12px;
}
.suivi-search__input-group input {
    flex: 1;
    padding: 14px 18px;
    border: 1px solid #dce8e0;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    color: #2c3e34;
    transition: border 0.2s;
}
.suivi-search__input-group input:focus {
    border-color: var(--vert-fvt);
    outline: none;
}
.suivi-search__input-group button {
    padding: 14px 30px;
    background: var(--vert-fvt);
    color: #fff;
    border: none;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.suivi-search__input-group button:hover {
    background: var(--vert-fvt-fonce);
    transform: translateY(-2px);
}
.suivi-search__hint {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    color: #7a8a7f;
    margin: 12px 0 0;
    text-align: center;
}

/* ===== RÉSULTAT ===== */
.suivi-result {
    max-width: 900px;
    margin: 0 auto;
    padding: 30px 0;
    display: <?php echo $show_result ? 'block' : 'none'; ?>;
}

/* ===== ALERTE STATUT ===== */
.suivi-alert {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 22px 30px;
    border-radius: 16px;
    margin-bottom: 30px;
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
    margin-bottom: 30px;
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
    margin-bottom: 30px;
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
.step-bloque {
    border-color: #9e9e9e;
    background: #e0e0e0;
    color: #757575;
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
.step-line-bloque {
    background: #e0e0e0;
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
    color: var(--vert-fvt);
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
.status-bloque {
    background: #f5f5f5;
    color: #757575;
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
.step-message-box.step-bloque {
    background: #f5f5f5;
    border-left: 4px solid #9e9e9e;
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
    margin-bottom: 30px;
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
    margin-top: 20px;
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

/* ===== ERREUR ===== */
.suivi-error {
    text-align: center;
    padding: 60px 20px;
    max-width: 600px;
    margin: 0 auto;
    display: <?php echo $not_found ? 'block' : 'none'; ?>;
}
.suivi-error i {
    font-size: 48px;
    color: var(--rouge-fvt);
    display: block;
    margin-bottom: 16px;
}
.suivi-error h3 {
    font-family: 'Playfair Display', serif;
    color: var(--vert-fvt-fonce);
    font-size: 1.8rem;
    margin: 0 0 10px;
}
.suivi-error p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5a6a5f;
    font-size: 1rem;
}

/* ===== CTA ===== */
.suivi-cta {
    background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
    padding: 76px 0;
    text-align: center;
    margin-top: 40px;
    position: relative;
    overflow: hidden;
}
.suivi-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
    opacity: 0.06;
}
.suivi-cta h2 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 800;
    color: #fff;
    font-size: 2.2rem;
    margin: 0 0 12px;
    position: relative;
    z-index: 1;
}
.cta-divider {
    width: 60px;
    height: 3px;
    background: var(--jaune-fvt);
    margin: 10px auto 22px;
    position: relative;
    z-index: 1;
}
.suivi-cta p {
    font-family: 'Kumbh Sans', sans-serif;
    color: rgba(255,255,255,0.85);
    font-size: 1.15rem;
    margin-bottom: 32px;
    position: relative;
    z-index: 1;
}
.cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: var(--jaune-fvt);
    color: var(--vert-fvt-fonce);
    padding: 16px 44px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    position: relative;
    z-index: 1;
}
.cta-btn:hover {
    background: #ffffff;
    color: var(--vert-fvt-fonce);
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.25);
}
.cta-btn i {
    transition: transform 0.3s;
}
.cta-btn:hover i {
    transform: translateX(4px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 992px) {
    .suivi-grid {
        grid-template-columns: 1fr 1fr;
    }
}
@media (max-width: 768px) {
    .suivi-header h1 {
        font-size: 2.4rem;
    }
    .suivi-cta h2 {
        font-size: 1.8rem;
    }
    .suivi-search__input-group {
        flex-direction: column;
    }
    .suivi-search__input-group button {
        width: 100%;
        justify-content: center;
    }
    .suivi-card {
        padding: 20px;
    }
    .suivi-timeline {
        padding: 20px;
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
    .suivi-alert {
        flex-direction: column;
        text-align: center;
        padding: 20px;
    }
    .alert-status {
        font-size: 1.3rem;
    }
}
@media (max-width: 576px) {
    .suivi-header h1 {
        font-size: 2rem;
    }
    .suivi-header__sub {
        font-size: 1rem;
    }
    .suivi-result {
        padding: 15px 0;
    }
    .step-title {
        font-size: 1rem;
    }
    .status-badge {
        font-size: 0.7rem;
        padding: 3px 10px;
    }
    .step-notification {
        flex-direction: column;
        text-align: center;
    }
}

/* ===== PRINT ===== */
@media print {
    .suivi-header {
        padding: 20px 0;
    }
    .suivi-header::after {
        display: none;
    }
    .breadcrumb-wrapper,
    .suivi-actions,
    .suivi-search,
    .suivi-cta {
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
    .suivi-result {
        padding: 10px 0;
        display: block !important;
    }
    .step-notification {
        background: #f0f0f0 !important;
        border-color: #ccc !important;
    }
}
</style>

<!-- ===== EN‑TÊTE ===== -->
<section class="suivi-header">
    <div class="container">
        <nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
            <ol>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li class="current">Suivi de soumission</li>
            </ol>
        </nav>
        <span class="suivi-header__badge"><i class="fas fa-search"></i> Togo Green Fund</span>
        <h1>Suivi de soumission</h1>
        <div class="title-underline"></div>
        <p class="suivi-header__sub">Entrez votre numéro de référence pour suivre l'état de votre dossier.</p>
    </div>
</section>

<!-- ===== CONTENU ===== -->
<section class="suivi-content">
    <div class="container">

        <!-- FORMULAIRE DE RECHERCHE -->
        <div class="suivi-search">
            <form id="suivi-form" class="suivi-search__form" method="get" action="<?php echo esc_url( get_permalink() ); ?>">
                <div class="suivi-search__input-group">
                    <input type="text" id="ref-input" name="ref" placeholder="Ex: SOU-2025-0001" value="<?php echo esc_attr( $ref_to_search ); ?>" required>
                    <button type="submit"><i class="fas fa-search"></i> Suivre</button>
                </div>
                <p class="suivi-search__hint">Entrez le numéro de référence reçu lors de votre soumission.</p>
            </form>
        </div>

        <!-- ===== RÉSULTAT ===== -->
        <?php if ( $soumission_trouvee ) : ?>
            <?php
            $statut_info = $statuts_display[ $soumission_trouvee['statut'] ] ?? $statuts_display['en_attente'];
            $etapes = $statut_info['etapes'] ?? array();
            $progress = $statut_info['progress'] ?? 20;
            $nom_complet = ( $soumission_trouvee['prenom'] ? $soumission_trouvee['prenom'] . ' ' : '' ) . $soumission_trouvee['nom'];
            
            // Couleur du statut
            $status_color = '#2196F3';
            if ($soumission_trouvee['statut'] == 'approuve') $status_color = '#4CAF50';
            elseif ($soumission_trouvee['statut'] == 'rejete') $status_color = '#D21034';
            elseif ($soumission_trouvee['statut'] == 'en_attente') $status_color = '#FF9800';
            ?>
            <div class="suivi-result" id="suivi-result">
                
                <!-- ALERTE STATUT -->
                <div class="suivi-alert">
                    <div class="alert-icon" style="background: <?php echo esc_attr($status_color); ?>;">
                        <i class="fas <?php echo esc_attr($statut_info['icon']); ?>"></i>
                    </div>
                    <div class="suivi-alert__content">
                        <div class="alert-title">Statut de votre dossier</div>
                        <div class="alert-status"><?php echo esc_html($statut_info['label']); ?></div>
                        <div class="alert-ref">Référence : <strong><?php echo esc_html($soumission_trouvee['reference']); ?></strong></div>
                    </div>
                </div>

                <!-- INFOS PROJET -->
                <div class="suivi-card">
                    <h3 class="suivi-card__title"><i class="fas fa-info-circle"></i> Informations du projet</h3>
                    <div class="suivi-grid">
                        <div class="suivi-grid__item">
                            <span class="suivi-grid__label">📌 Nom du projet</span>
                            <span class="suivi-grid__value"><?php echo esc_html($soumission_trouvee['projet']); ?></span>
                        </div>
                        <div class="suivi-grid__item">
                            <span class="suivi-grid__label">📋 Numéro de dossier</span>
                            <span class="suivi-grid__value"><?php echo esc_html($soumission_trouvee['reference']); ?></span>
                        </div>
                        <div class="suivi-grid__item">
                            <span class="suivi-grid__label">📅 Date de soumission</span>
                            <span class="suivi-grid__value"><?php echo esc_html($soumission_trouvee['date']); ?></span>
                        </div>
                        <div class="suivi-grid__item">
                            <span class="suivi-grid__label">📂 Catégorie</span>
                            <span class="suivi-grid__value"><?php echo esc_html($soumission_trouvee['type']); ?></span>
                        </div>
                        <?php if (!empty($soumission_trouvee['montant'])) : ?>
                        <div class="suivi-grid__item">
                            <span class="suivi-grid__label">💰 Montant demandé</span>
                            <span class="suivi-grid__value"><?php echo esc_html($soumission_trouvee['montant']); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="suivi-grid__item">
                            <span class="suivi-grid__label">👤 Porteur de projet</span>
                            <span class="suivi-grid__value"><?php echo esc_html($nom_complet); ?></span>
                        </div>
                        <?php if (!empty($soumission_trouvee['email'])) : ?>
                        <div class="suivi-grid__item">
                            <span class="suivi-grid__label">📧 Email</span>
                            <span class="suivi-grid__value"><?php echo esc_html($soumission_trouvee['email']); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ÉTAPES DE TRAITEMENT -->
                <div class="suivi-timeline">
                    <h3 class="suivi-timeline__title"><i class="fas fa-tasks"></i> Étapes de traitement</h3>
                    
                    <?php $step_index = 0; ?>
                    <?php foreach ( $etapes as $step_key => $step ) : 
                        $step_index++;
                        $is_done = $step['status'] == 'termine';
                        $is_active = $step['status'] == 'encours';
                        $is_bloque = $step['status'] == 'bloque';
                        
                        $step_class = $is_done ? 'step-done' : ($is_active ? 'step-active' : 'step-bloque');
                        $line_class = $is_done ? 'step-line-done' : ($is_active ? 'step-line-active' : 'step-line-bloque');
                        $message_class = $is_done ? 'step-valid' : ($is_active ? 'step-pending' : 'step-bloque');
                        
                        $status_label = $is_done ? 'Terminé' : ($is_active ? 'En cours' : 'En attente');
                        $status_class = $is_done ? 'status-done' : ($is_active ? 'status-progress' : 'status-bloque');
                        $status_icon = $is_done ? 'fa-check-circle' : ($is_active ? 'fa-spinner fa-spin' : 'fa-clock');
                    ?>
                        <div class="timeline-step">
                            <div class="timeline-step__marker">
                                <div class="step-number <?php echo esc_attr($step_class); ?>">
                                    <?php if ($is_done) : ?>
                                        <i class="fas fa-check"></i>
                                    <?php elseif ($is_active) : ?>
                                        <?php echo $step_index; ?>
                                    <?php else : ?>
                                        <i class="fas fa-lock" style="font-size: 0.9rem;"></i>
                                    <?php endif; ?>
                                </div>
                                <?php if ($step_index < count($etapes)) : ?>
                                    <div class="step-line <?php echo esc_attr($line_class); ?>"></div>
                                <?php endif; ?>
                            </div>
                            <div class="timeline-step__content">
                                <div class="step-header">
                                    <h4 class="step-title">
                                        <i class="fas <?php echo $step_index == 1 ? 'fa-search' : 'fa-check-double'; ?>"></i>
                                        Étape <?php echo $step_index; ?> : <?php echo esc_html($step['label']); ?>
                                    </h4>
                                    <span class="step-status">
                                        <span class="status-badge <?php echo esc_attr($status_class); ?>">
                                            <i class="fas <?php echo esc_attr($status_icon); ?>"></i> <?php echo esc_html($status_label); ?>
                                        </span>
                                    </span>
                                </div>
                                
                                <div class="step-message-box <?php echo esc_attr($message_class); ?>">
                                    <p class="step-message"><?php echo esc_html($step['message']); ?></p>
                                </div>
                                
                                <div class="step-detail">
                                    <i class="fas fa-info-circle"></i>
                                    <span><?php echo esc_html($step['detail']); ?></span>
                                </div>
                                
                                <div class="step-dates">
                                    <span><i class="far fa-calendar-alt"></i> Début : <?php echo esc_html($soumission_trouvee['date']); ?></span>
                                    <?php if ($is_done) : ?>
                                        <span><i class="far fa-calendar-check"></i> Fin : <?php echo esc_html($soumission_trouvee['date']); ?></span>
                                    <?php elseif ($is_active) : ?>
                                        <span><i class="fas fa-spinner"></i> En cours...</span>
                                    <?php else : ?>
                                        <span><i class="far fa-clock"></i> En attente</span>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Notification email pour la validation -->
                                <?php if ($step_key == 'validation' && ($soumission_trouvee['statut'] == 'approuve' || $soumission_trouvee['statut'] == 'rejete')) : ?>
                                    <div class="step-notification">
                                        <div class="notification-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="notification-content">
                                            <strong>📧 Email envoyé</strong>
                                            <span>Un email récapitulatif a été envoyé à <strong><?php echo esc_html($soumission_trouvee['email']); ?></strong></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- CONTACT -->
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

                <!-- ACTIONS -->
                <div class="suivi-actions">
                    <button onclick="window.print()" class="btn-print">
                        <i class="fas fa-print"></i> Imprimer cette page
                    </button>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Nouvelle recherche
                    </a>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-home">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </div>

            </div>

        <?php elseif ( $not_found ) : ?>
            <!-- MESSAGE D'ERREUR -->
            <div class="suivi-error" id="suivi-error">
                <i class="fas fa-exclamation-circle"></i>
                <h3>Aucun dossier trouvé</h3>
                <p>Vérifiez votre numéro de référence et réessayez.</p>
            </div>
        <?php endif; ?>

    </div>
</section>

<!-- ===== CTA ===== -->
<section class="suivi-cta">
    <div class="container">
        <h2>Vous avez perdu votre numéro de référence ?</h2>
        <div class="cta-divider"></div>
        <p>Contactez notre équipe d'assistance pour obtenir de l'aide.</p>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="cta-btn">
            Nous contacter <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- ===== JS ===== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sélection automatique du champ de recherche
    const refInput = document.getElementById('ref-input');
    if ( refInput && refInput.value === '' ) {
        refInput.focus();
    }
    
    // Si un résultat est trouvé, scroller vers le résultat
    const resultElement = document.getElementById('suivi-result');
    if ( resultElement && resultElement.style.display !== 'none' ) {
        setTimeout(function() {
            resultElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 300);
    }
});
</script>