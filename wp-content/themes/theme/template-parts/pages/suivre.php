<?php
/**
 * Template part : Page "Suivi de soumission" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Données simulées de soumissions
$soumissions = array(
	'FVT-2025-001' => array(
		'projet'    => 'Agriculture résiliente au climat',
		'type'      => 'Projet complet',
		'date'      => '15 janvier 2025',
		'statut'    => 'en_cours',
		'etapes'    => array(
			'Déposé'       => '15 janvier 2025',
			'Validation'   => '20 janvier 2025',
			'En expertise' => '5 février 2025',
		),
	),
	'FVT-2025-002' => array(
		'projet'    => 'Énergie solaire pour les communautés rurales',
		'type'      => 'Manifestation d\'intérêt',
		'date'      => '22 février 2025',
		'statut'    => 'approuve',
		'etapes'    => array(
			'Déposé'       => '22 février 2025',
			'Validation'   => '28 février 2025',
			'En expertise' => '10 mars 2025',
			'Approuvé'     => '25 mars 2025',
		),
	),
	'FVT-2025-003' => array(
		'projet'    => 'Gestion durable des forêts',
		'type'      => 'Projet complet',
		'date'      => '5 mars 2025',
		'statut'    => 'rejete',
		'etapes'    => array(
			'Déposé'       => '5 mars 2025',
			'Validation'   => '10 mars 2025',
			'En expertise' => '20 mars 2025',
			'Rejeté'       => '5 avril 2025',
		),
	),
	'FVT-2025-004' => array(
		'projet'    => 'Adaptation des zones côtières',
		'type'      => 'Projet complet',
		'date'      => '10 avril 2025',
		'statut'    => 'en_attente',
		'etapes'    => array(
			'Déposé'       => '10 avril 2025',
		),
	),
);

// Définition des statuts pour l'affichage
$statuts_display = array(
	'en_attente' => array(
		'label' => 'En attente',
		'class' => 'statut--attente',
	),
	'en_cours' => array(
		'label' => 'En cours d\'instruction',
		'class' => 'statut--encours',
	),
	'approuve' => array(
		'label' => 'Approuvé',
		'class' => 'statut--approuve',
	),
	'rejete' => array(
		'label' => 'Rejeté',
		'class' => 'statut--rejete',
	),
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="suivi-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li class="current">Suivi de soumission</li>
			</ol>
		</nav>
		<span class="suivi-header__badge"><i class="fas fa-search"></i> Togo Green Fund </span>
		<h1>Suivi de soumission</h1>
		<div class="title-underline"></div>
		<p class="suivi-header__sub">Entrez votre numéro de référence pour suivre l’état de votre dossier.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="suivi-content">
	<div class="container">

		<!-- ===== FORMULAIRE DE RECHERCHE ===== -->
		<div class="suivi-search">
			<form id="suivi-form" class="suivi-search__form">
				<div class="suivi-search__input-group">
					<input type="text" id="ref-input" placeholder="Ex: FVT-2025-001" required>
					<button type="submit"><i class="fas fa-search"></i> Suivre</button>
				</div>
				<p class="suivi-search__hint">Entrez le numéro de référence reçu lors de votre soumission.</p>
			</form>
		</div>

		<!-- ===== RÉSULTAT (caché par défaut) ===== -->
		<div class="suivi-result" id="suivi-result" style="display:none;">
			<!-- Contenu injecté par JS -->
		</div>

		<!-- ===== MESSAGE D'ERREUR (caché par défaut) ===== -->
		<div class="suivi-error" id="suivi-error" style="display:none;">
			<i class="fas fa-exclamation-circle"></i>
			<h3>Aucun dossier trouvé</h3>
			<p>Vérifiez votre numéro de référence et réessayez.</p>
		</div>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
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

<!-- ============================================================
     STYLES CSS (intégrés)
     ============================================================ -->
<style>
/* ============================================================
   PAGE SUIVI – CHARTE FONDS VERT TOGO
   ============================================================ */
:root {
	--vert-fvt:        #0a6e3e;
	--vert-fvt-fonce:  #063d24;
	--jaune-fvt:       #FFCE00;
	--rouge-fvt:       #D21034;
	--gris-fond:       #f6faf7;
	--blanc:           #ffffff;
}

/* ===== EN‑TÊTE ===== */
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

/* ===== CONTENU ===== */
.suivi-content {
	padding: 50px 0 30px;
	background: #ffffff;
}

/* ===== FORMULAIRE DE RECHERCHE ===== */
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
	max-width: 800px;
	margin: 0 auto;
	padding: 30px 0;
}

/* Carte de statut */
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

/* Timeline */
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

/* Barre de progression (pour statut en cours) */
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

/* ===== ERREUR ===== */
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

<!-- ============================================================
     SCRIPT DE GESTION (recherche et affichage)
     ============================================================ -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Données des soumissions (injectées depuis PHP)
		var soumissions = <?php echo json_encode($soumissions); ?>;
		var statuts = <?php echo json_encode($statuts_display); ?>;

		var form = document.getElementById('suivi-form');
		var refInput = document.getElementById('ref-input');
		var resultDiv = document.getElementById('suivi-result');
		var errorDiv = document.getElementById('suivi-error');

		function afficherResultat(ref) {
			var data = soumissions[ref];
			if (!data) {
				resultDiv.style.display = 'none';
				errorDiv.style.display = 'block';
				return;
			}
			errorDiv.style.display = 'none';

			// Récupérer le libellé et la classe du statut
			var statutInfo = statuts[data.statut] || { label: 'Inconnu', class: '' };

			// Construction du HTML du résultat
			var html = '';
			html += '<div class="suivi-result-card">';
			html += '<div class="suivi-result-card__header">';
			html += '<div>';
			html += '<span class="suivi-result-card__ref"><strong>Référence :</strong> ' + ref + '</span>';
			html += '<h3 class="suivi-result-card__titre">' + data.projet + '</h3>';
			html += '</div>';
			html += '<span class="suivi-result-card__statut ' + statutInfo.class + '"><i class="fas fa-circle"></i> ' + statutInfo.label + '</span>';
			html += '</div>';
			html += '<div class="suivi-result-card__meta">';
			html += '<span><i class="fas fa-tag"></i> ' + data.type + '</span>';
			html += '<span><i class="fas fa-calendar-alt"></i> ' + data.date + '</span>';
			html += '</div>';

			// Timeline des étapes
			html += '<div class="suivi-timeline">';
			var etapes = data.etapes;
			var keys = Object.keys(etapes);
			var total = keys.length;
			var done = 0;
			var active = false;
			keys.forEach(function(key, index) {
				var isLast = (index === total - 1);
				var isDone = false;
				var isActive = false;
				if (data.statut === 'en_attente' && index === 0) {
					isActive = true;
				} else if (data.statut === 'en_cours' && index < total - 1) {
					isDone = true;
				} else if (data.statut === 'en_cours' && index === total - 1) {
					isActive = true;
				} else if (data.statut === 'approuve' || data.statut === 'rejete') {
					isDone = true;
				}
				var liClass = '';
				if (isDone) liClass = 'done';
				if (isActive) liClass = 'active';
				html += '<div class="suivi-timeline__item ' + liClass + '">';
				html += '<span class="suivi-timeline__label">' + key + '</span>';
				html += '<span class="suivi-timeline__date">' + etapes[key] + '</span>';
				if (isLast && data.statut === 'en_attente') {
					html += '<div class="suivi-timeline__desc">En attente de validation</div>';
				} else if (isLast && data.statut === 'rejete') {
					html += '<div class="suivi-timeline__desc">Dossier non retenu</div>';
				}
				html += '</div>';
			});
			html += '</div>';

			// Barre de progression pour les statuts en cours ou en attente
			if (data.statut === 'en_attente' || data.statut === 'en_cours') {
				var progress = 0;
				if (data.statut === 'en_attente') progress = 20;
				else if (data.statut === 'en_cours') progress = 50;
				html += '<div class="suivi-progress">';
				html += '<div class="suivi-progress__bar">';
				html += '<div class="suivi-progress__bar-inner" style="width:' + progress + '%;"></div>';
				html += '</div>';
				html += '<div class="suivi-progress__label">';
				html += '<span>Progression du dossier</span>';
				html += '<span>' + progress + '%</span>';
				html += '</div>';
				html += '</div>';
			}

			html += '</div>';

			resultDiv.innerHTML = html;
			resultDiv.style.display = 'block';
		}

		form.addEventListener('submit', function(e) {
			e.preventDefault();
			var ref = refInput.value.trim();
			if (ref === '') return;
			// Normaliser : mettre en majuscules (optionnel)
			ref = ref.toUpperCase();
			afficherResultat(ref);
		});

		// Si l'utilisateur tape "Entrée" dans le champ, le formulaire est soumis via le submit
	});
</script>