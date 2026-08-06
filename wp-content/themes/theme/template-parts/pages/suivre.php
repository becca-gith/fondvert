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
        );
    }
    wp_reset_postdata();
}

// Statuts pour l'affichage
$statuts_display = array(
    'en_attente' => array(
        'label' => 'En attente',
        'class' => 'statut--attente',
        'etapes' => array( 'Déposé' ),
        'progress' => 20,
    ),
    'en_cours' => array(
        'label' => 'En cours d\'instruction',
        'class' => 'statut--encours',
        'etapes' => array( 'Déposé', 'Validation', 'En expertise' ),
        'progress' => 50,
    ),
    'approuve' => array(
        'label' => 'Approuvé',
        'class' => 'statut--approuve',
        'etapes' => array( 'Déposé', 'Validation', 'En expertise', 'Approuvé' ),
        'progress' => 100,
    ),
    'rejete' => array(
        'label' => 'Rejeté',
        'class' => 'statut--rejete',
        'etapes' => array( 'Déposé', 'Validation', 'En expertise', 'Rejeté' ),
        'progress' => 100,
    ),
);

// Si aucune référence n'est trouvée, afficher un message
$not_found = isset( $_GET['ref'] ) && $soumission_trouvee === null;
?>

<!-- ===== STYLES CSS (inchangés) ===== -->
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

.suivi-result {
	max-width: 800px;
	margin: 0 auto;
	padding: 30px 0;
}

.suivi-result-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	padding: 32px 36px;
	box-shadow: 0 8px 24px rgba(6,61,36,0.06);
}
.suivi-result-card__header {
	display: flex;
	justify-content: space-between;
	align-items: flex-start;
	flex-wrap: wrap;
	gap: 12px;
	margin-bottom: 16px;
}
.suivi-result-card__ref {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: #7a8a7f;
}
.suivi-result-card__ref strong {
	color: var(--vert-fvt-fonce);
}
.suivi-result-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.6rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0;
}
.suivi-result-card__meta {
	display: flex;
	flex-wrap: wrap;
	gap: 16px 24px;
	margin: 8px 0 18px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #4d6a59;
}
.suivi-result-card__meta span i {
	color: var(--vert-fvt);
	margin-right: 6px;
	width: 18px;
}
.suivi-result-card__statut {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	padding: 6px 18px;
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 0.9rem;
	text-transform: uppercase;
	letter-spacing: 0.3px;
}
.statut--attente {
	background: #fff3cd;
	color: #856404;
}
.statut--encours {
	background: #cce5ff;
	color: #004085;
}
.statut--approuve {
	background: #d4edda;
	color: #155724;
}
.statut--rejete {
	background: #f8d7da;
	color: #721c24;
}

.suivi-timeline {
	margin-top: 24px;
	position: relative;
	padding-left: 28px;
}
.suivi-timeline::before {
	content: '';
	position: absolute;
	left: 6px;
	top: 8px;
	bottom: 8px;
	width: 3px;
	background: #dce8e0;
}
.suivi-timeline__item {
	position: relative;
	padding-bottom: 20px;
	padding-left: 20px;
}
.suivi-timeline__item:last-child {
	padding-bottom: 0;
}
.suivi-timeline__item::before {
	content: '';
	position: absolute;
	left: -24px;
	top: 6px;
	width: 14px;
	height: 14px;
	border-radius: 50%;
	background: #dce8e0;
	border: 2px solid #fff;
}
.suivi-timeline__item.active::before {
	background: var(--vert-fvt);
	border-color: var(--vert-fvt);
}
.suivi-timeline__item.done::before {
	background: var(--vert-fvt);
	border-color: var(--vert-fvt);
}
.suivi-timeline__item .suivi-timeline__label {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	color: var(--vert-fvt-fonce);
}
.suivi-timeline__item .suivi-timeline__date {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: #7a8a7f;
	margin-left: 10px;
}
.suivi-timeline__item .suivi-timeline__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #4d6a59;
	margin-top: 2px;
}

.suivi-progress {
	margin-top: 24px;
}
.suivi-progress__bar {
	height: 8px;
	background: #e7f0ea;
	border-radius: 4px;
	overflow: hidden;
}
.suivi-progress__bar-inner {
	height: 100%;
	background: linear-gradient(90deg, var(--vert-fvt), var(--jaune-fvt));
	width: 0%;
	border-radius: 4px;
	transition: width 0.5s;
}
.suivi-progress__label {
	display: flex;
	justify-content: space-between;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: #5a6a5f;
	margin-top: 6px;
}

.suivi-error {
	text-align: center;
	padding: 60px 20px;
	max-width: 600px;
	margin: 0 auto;
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
	.suivi-result-card {
		padding: 24px 18px;
	}
	.suivi-result-card__header {
		flex-direction: column;
	}
}
@media (max-width: 576px) {
	.suivi-header h1 {
		font-size: 2rem;
	}
	.suivi-header__sub {
		font-size: 1rem;
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
        <p class="suivi-header__sub">Entrez votre numéro de référence pour suivre l’état de votre dossier.</p>
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

        <!-- AFFICHAGE DU RÉSULTAT -->
        <?php if ( $soumission_trouvee ) : ?>
            <?php
            $statut_info = $statuts_display[ $soumission_trouvee['statut'] ] ?? $statuts_display['en_attente'];
            $etapes = $statut_info['etapes'] ?? array( 'Déposé' );
            $progress = $statut_info['progress'] ?? 20;
            $date_soumission = $soumission_trouvee['date'];
            $nom_complet = ( $soumission_trouvee['prenom'] ? $soumission_trouvee['prenom'] . ' ' : '' ) . $soumission_trouvee['nom'];
            ?>
            <div class="suivi-result" id="suivi-result" style="display:block;">
                <div class="suivi-result-card">
                    <div class="suivi-result-card__header">
                        <div>
                            <span class="suivi-result-card__ref"><strong>Référence :</strong> <?php echo esc_html( $soumission_trouvee['reference'] ); ?></span>
                            <h3 class="suivi-result-card__titre"><?php echo esc_html( $soumission_trouvee['projet'] ); ?></h3>
                        </div>
                        <span class="suivi-result-card__statut <?php echo esc_attr( $statut_info['class'] ); ?>">
                            <i class="fas fa-circle"></i> <?php echo esc_html( $statut_info['label'] ); ?>
                        </span>
                    </div>
                    <div class="suivi-result-card__meta">
                        <span><i class="fas fa-tag"></i> <?php echo esc_html( $soumission_trouvee['type'] ); ?></span>
                        <span><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $date_soumission ); ?></span>
                        <?php if ( ! empty( $nom_complet ) ) : ?>
                            <span><i class="fas fa-user"></i> <?php echo esc_html( $nom_complet ); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Timeline -->
                    <div class="suivi-timeline">
                        <?php
                        $total = count( $etapes );
                        $active_index = 0;
                        if ( $soumission_trouvee['statut'] === 'en_attente' ) {
                            $active_index = 0;
                        } elseif ( $soumission_trouvee['statut'] === 'en_cours' ) {
                            $active_index = 2; // dernière étape active
                        } elseif ( $soumission_trouvee['statut'] === 'approuve' || $soumission_trouvee['statut'] === 'rejete' ) {
                            $active_index = $total - 1;
                        }
                        ?>
                        <?php foreach ( $etapes as $index => $etape ) : ?>
                            <?php
                            $is_done = $index < $active_index;
                            $is_active = $index === $active_index;
                            $li_class = $is_done ? 'done' : ( $is_active ? 'active' : '' );
                            $date_etape = '';
                            if ( $is_done || $is_active ) {
                                // Simuler une date approximative (en jours)
                                $jours = $index * 15;
                                $date_etape = date_i18n( 'd F Y', strtotime( $date_soumission . " + $jours days" ) );
                            }
                            ?>
                            <div class="suivi-timeline__item <?php echo esc_attr( $li_class ); ?>">
                                <span class="suivi-timeline__label"><?php echo esc_html( $etape ); ?></span>
                                <?php if ( $date_etape ) : ?>
                                    <span class="suivi-timeline__date"><?php echo esc_html( $date_etape ); ?></span>
                                <?php endif; ?>
                                <?php if ( $is_active && $soumission_trouvee['statut'] === 'en_attente' ) : ?>
                                    <div class="suivi-timeline__desc">En attente de validation</div>
                                <?php endif; ?>
                                <?php if ( $is_active && $soumission_trouvee['statut'] === 'en_cours' ) : ?>
                                    <div class="suivi-timeline__desc">En cours d'expertise</div>
                                <?php endif; ?>
                                <?php if ( $is_active && $soumission_trouvee['statut'] === 'approuve' ) : ?>
                                    <div class="suivi-timeline__desc">Projet approuvé !</div>
                                <?php endif; ?>
                                <?php if ( $is_active && $soumission_trouvee['statut'] === 'rejete' ) : ?>
                                    <div class="suivi-timeline__desc">Dossier non retenu</div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Barre de progression -->
                    <div class="suivi-progress">
                        <div class="suivi-progress__bar">
                            <div class="suivi-progress__bar-inner" style="width: <?php echo esc_attr( $progress ); ?>%;"></div>
                        </div>
                        <div class="suivi-progress__label">
                            <span>Progression du dossier</span>
                            <span><?php echo esc_html( $progress ); ?>%</span>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ( $not_found ) : ?>
            <!-- MESSAGE D'ERREUR -->
            <div class="suivi-error" id="suivi-error" style="display:block;">
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
        <p>Contactez notre équipe d’assistance pour obtenir de l’aide.</p>
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
});
</script>