<?php
/**
 * Template part : Page "Documents" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Tableau des documents
$documents = array(
	array(
		'titre'       => 'Rapport d\'activité 2024',
		'description' => 'Bilan des projets financés, des résultats atteints et des perspectives pour l\'année à venir.',
		'type'        => 'rapport',
		'format'      => 'PDF',
		'taille'      => '2.4 Mo',
		'date'        => 'Janvier 2025',
		'url'         => '#',
		'icone'       => 'fa-file-pdf',
	),
	array(
		'titre'       => 'Guide du soumissionnaire',
		'description' => 'Document complet pour préparer et soumettre un projet de financement climatique.',
		'type'        => 'guide',
		'format'      => 'PDF',
		'taille'      => '1.8 Mo',
		'date'        => 'Septembre 2024',
		'url'         => '#',
		'icone'       => 'fa-file-alt',
	),
	array(
		'titre'       => 'Plan stratégique 2025-2030',
		'description' => 'Orientations stratégiques du Fonds Vert pour la prochaine décennie.',
		'type'        => 'rapport',
		'format'      => 'PDF',
		'taille'      => '3.1 Mo',
		'date'        => 'Décembre 2024',
		'url'         => '#',
		'icone'       => 'fa-file-pdf',
	),
	array(
		'titre'       => 'Infographie : Financement climatique au Togo',
		'description' => 'Synthèse visuelle des flux financiers et des projets soutenus.',
		'type'        => 'publication',
		'format'      => 'PNG',
		'taille'      => '5.2 Mo',
		'date'        => 'Octobre 2024',
		'url'         => '#',
		'icone'       => 'fa-file-image',
	),
	array(
		'titre'       => 'Rapport d\'évaluation des projets 2023',
		'description' => 'Évaluation de l\'impact des projets climatiques sur les communautés.',
		'type'        => 'rapport',
		'format'      => 'PDF',
		'taille'      => '4.0 Mo',
		'date'        => 'Mars 2024',
		'url'         => '#',
		'icone'       => 'fa-file-pdf',
	),
	array(
		'titre'       => 'Fiche technique : Agriculture durable',
		'description' => 'Bonnes pratiques agricoles pour la résilience climatique.',
		'type'        => 'guide',
		'format'      => 'PDF',
		'taille'      => '1.2 Mo',
		'date'        => 'Août 2024',
		'url'         => '#',
		'icone'       => 'fa-file-alt',
	),
	array(
		'titre'       => 'Brochure institutionnelle',
		'description' => 'Présentation du Fonds Vert du Togo, sa mission et ses actions.',
		'type'        => 'publication',
		'format'      => 'PDF',
		'taille'      => '3.5 Mo',
		'date'        => 'Juin 2024',
		'url'         => '#',
		'icone'       => 'fa-file-pdf',
	),
	array(
		'titre'       => 'Tableau de bord des indicateurs climatiques',
		'description' => 'Suivi des indicateurs clés de performance environnementale.',
		'type'        => 'publication',
		'format'      => 'XLSX',
		'taille'      => '1.6 Mo',
		'date'        => 'Novembre 2024',
		'url'         => '#',
		'icone'       => 'fa-file-excel',
	),
);

// Types de documents pour le filtre
$types_doc = array(
	'tous'       => 'Tous',
	'rapport'    => 'Rapports',
	'guide'      => 'Guides',
	'publication' => 'Publications',
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="documents-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/ressources' ) ); ?>">Ressources</a></li>
				<li class="separator">›</li>
				<li class="current">Documents</li>
			</ol>
		</nav>
		<span class="documents-header__badge"><i class="fas fa-folder-open"></i> Fonds Vert Togo</span>
		<h1>Documents</h1>
		<div class="title-underline"></div>
		<p class="documents-header__sub">Consultez et téléchargez nos rapports, guides et publications.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="documents-content">
	<div class="container">

		<!-- ===== BARRE DE FILTRES ===== -->
		<div class="documents-filters">
			<div class="documents-filters__group">
				<label for="filtrer-type">Filtrer par type</label>
				<select id="filtrer-type">
					<?php foreach ( $types_doc as $slug => $label ) : ?>
						<option value="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="documents-filters__count" id="documents-count">
				<?php echo count( $documents ); ?> document(s)
			</div>
		</div>

		<!-- ===== GRILLE DES DOCUMENTS ===== -->
		<div class="documents-grid" id="documents-grid">
			<?php foreach ( $documents as $doc ) : ?>
				<article class="document-card" data-type="<?php echo esc_attr( $doc['type'] ); ?>">
					<div class="document-card__icon">
						<i class="fas <?php echo esc_attr( $doc['icone'] ); ?>" aria-hidden="true"></i>
					</div>
					<div class="document-card__content">
						<h3 class="document-card__titre"><?php echo esc_html( $doc['titre'] ); ?></h3>
						<p class="document-card__desc"><?php echo esc_html( $doc['description'] ); ?></p>
						<div class="document-card__meta">
							<span class="document-card__meta-item"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $doc['date'] ); ?></span>
							<span class="document-card__meta-item"><i class="fas fa-file"></i> <?php echo esc_html( $doc['format'] ); ?></span>
							<span class="document-card__meta-item"><i class="fas fa-weight-hanging"></i> <?php echo esc_html( $doc['taille'] ); ?></span>
						</div>
						<a href="<?php echo esc_url( $doc['url'] ); ?>" class="document-card__btn" download>
							<i class="fas fa-download"></i> Télécharger
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- ===== MESSAGE SI AUCUN DOCUMENT ===== -->
		<div class="documents-empty" id="documents-empty" style="display:none;">
			<i class="fas fa-search"></i>
			<h3>Aucun document trouvé</h3>
			<p>Essayez de modifier votre filtre pour afficher plus de résultats.</p>
		</div>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="documents-cta">
	<div class="container">
		<h2>Vous souhaitez contribuer à notre bibliothèque ?</h2>
		<div class="cta-divider"></div>
		<p>Si vous avez un document à partager avec la communauté, contactez-nous.</p>
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
   PAGE DOCUMENTS – CHARTE FONDS VERT TOGO
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
.documents-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.documents-header::after {
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
.documents-header__badge {
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
.documents-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.documents-header h1 {
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
.documents-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU ===== */
.documents-content {
	padding: 50px 0 30px;
	background: #ffffff;
}

/* ===== FILTRES ===== */
.documents-filters {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 24px 28px;
	margin-bottom: 40px;
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: space-between;
	gap: 18px;
}
.documents-filters__group {
	display: flex;
	align-items: center;
	gap: 16px;
	flex-wrap: wrap;
}
.documents-filters__group label {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	color: var(--vert-fvt-fonce);
	text-transform: uppercase;
	letter-spacing: 0.3px;
}
.documents-filters__group select {
	padding: 8px 18px;
	border: 1px solid #dce8e0;
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #2c3e34;
	background: #fff;
	transition: border 0.2s;
	cursor: pointer;
}
.documents-filters__group select:focus {
	border-color: var(--vert-fvt);
	outline: none;
}
.documents-filters__count {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
}

/* ===== GRILLE ===== */
.documents-grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 30px;
}

/* ===== CARTE DOCUMENT ===== */
.document-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 28px 26px 30px;
	display: flex;
	gap: 20px;
	transition: transform 0.3s, box-shadow 0.3s;
	align-items: flex-start;
}
.document-card:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.document-card__icon {
	flex-shrink: 0;
	width: 56px;
	height: 56px;
	display: flex;
	align-items: center;
	justify-content: center;
	border-radius: 50%;
	background: rgba(10,110,62,0.08);
	color: var(--vert-fvt);
	font-size: 24px;
}
.document-card__content {
	flex: 1;
}
.document-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.2rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0 0 6px;
}
.document-card__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.92rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 12px;
}
.document-card__meta {
	display: flex;
	flex-wrap: wrap;
	gap: 14px;
	margin-bottom: 16px;
}
.document-card__meta-item {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.8rem;
	color: #7a8a7f;
}
.document-card__meta-item i {
	color: var(--vert-fvt);
	font-size: 0.85rem;
}
.document-card__btn {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	padding: 8px 20px;
	background: var(--vert-fvt);
	color: #fff;
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	text-decoration: none;
	transition: background 0.3s, transform 0.2s;
}
.document-card__btn:hover {
	background: var(--vert-fvt-fonce);
	transform: translateY(-2px);
}

/* ===== EMPTY STATE ===== */
.documents-empty {
	text-align: center;
	padding: 60px 20px;
	display: none;
}
.documents-empty i {
	font-size: 48px;
	color: #dce8e0;
	display: block;
	margin-bottom: 16px;
}
.documents-empty h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
.documents-empty p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1rem;
}

/* ===== CTA ===== */
.documents-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.documents-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.documents-cta h2 {
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
.documents-cta p {
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
	.documents-grid {
		grid-template-columns: 1fr;
		gap: 20px;
	}
	.documents-filters {
		flex-direction: column;
		align-items: stretch;
	}
}
@media (max-width: 768px) {
	.documents-header h1 {
		font-size: 2.4rem;
	}
	.documents-cta h2 {
		font-size: 1.8rem;
	}
	.document-card {
		flex-direction: column;
		align-items: center;
		text-align: center;
	}
	.document-card__meta {
		justify-content: center;
	}
	.document-card__btn {
		justify-content: center;
	}
}
@media (max-width: 576px) {
	.documents-header h1 {
		font-size: 2rem;
	}
	.documents-header__sub {
		font-size: 1rem;
	}
}
</style>

<!-- ============================================================
     SCRIPT DE FILTRAGE
     ============================================================ -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const grid = document.getElementById('documents-grid');
		const emptyMsg = document.getElementById('documents-empty');
		const countDisplay = document.getElementById('documents-count');
		const typeSelect = document.getElementById('filtrer-type');

		const cards = Array.from(grid.querySelectorAll('.document-card'));

		function filterDocuments() {
			const type = typeSelect.value;
			let visibleCount = 0;

			cards.forEach(function(card) {
				const cardType = card.dataset.type;
				let match = true;
				if (type !== 'tous' && cardType !== type) {
					match = false;
				}
				if (match) {
					card.style.display = 'flex';
					visibleCount++;
				} else {
					card.style.display = 'none';
				}
			});

			countDisplay.textContent = visibleCount + ' document(s)';
			if (visibleCount === 0) {
				emptyMsg.style.display = 'block';
			} else {
				emptyMsg.style.display = 'none';
			}
		}

		typeSelect.addEventListener('change', filterDocuments);
		filterDocuments();
	});
</script>