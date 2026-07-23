<?php
/**
 * Template part : Page "Projets" – version statique avec filtres en JS
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Données statiques des projets
$projets_data = array(
	array(
		'id'          => 1,
		'titre'       => 'Agriculture résiliente au climat',
		'extrait'     => 'Soutien à 500 agriculteurs pour l\'adoption de pratiques agricoles durables et résilientes face aux changements climatiques.',
		'statut'      => 'en-cours',
		'categorie'   => 'agriculture',
		'localisation'=> 'Région des Savanes',
		'image'       => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=400&h=300&fit=crop',
		'lien'        => '#',
	),
	array(
		'id'          => 2,
		'titre'       => 'Énergie solaire pour les communautés rurales',
		'extrait'     => 'Installation de panneaux solaires dans 20 villages pour fournir de l\'électricité propre et durable.',
		'statut'      => 'termine',
		'categorie'   => 'energie',
		'localisation'=> 'Région Maritime',
		'image'       => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=400&h=300&fit=crop',
		'lien'        => '#',
	),
	array(
		'id'          => 3,
		'titre'       => 'Gestion durable des forêts',
		'extrait'     => 'Projet de reboisement et de gestion participative des forêts communautaires pour lutter contre la déforestation.',
		'statut'      => 'en-cours',
		'categorie'   => 'foret',
		'localisation'=> 'Région des Plateaux',
		'image'       => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=400&h=300&fit=crop',
		'lien'        => '#',
	),
	array(
		'id'          => 4,
		'titre'       => 'Adaptation des zones côtières',
		'extrait'     => 'Protection des côtes togolaises contre l\'érosion et les inondations par des solutions naturelles.',
		'statut'      => 'en-cours',
		'categorie'   => 'cotier',
		'localisation'=> 'Littoral Togolais',
		'image'       => 'https://images.unsplash.com/photo-1544552861-1f2c946a75f4?w=400&h=300&fit=crop',
		'lien'        => '#',
	),
	array(
		'id'          => 5,
		'titre'       => 'Économie circulaire et déchets',
		'extrait'     => 'Promotion du recyclage et de la valorisation des déchets pour créer des emplois verts.',
		'statut'      => 'termine',
		'categorie'   => 'dechet',
		'localisation'=> 'Grand Lomé',
		'image'       => 'https://images.unsplash.com/photo-1532996129724-e7b8f0b99d88?w=400&h=300&fit=crop',
		'lien'        => '#',
	),
	array(
		'id'          => 6,
		'titre'       => 'Accès à l\'eau potable en zones rurales',
		'extrait'     => 'Construction de forages et de systèmes d\'adduction d\'eau pour 15 villages.',
		'statut'      => 'bientot',
		'categorie'   => 'eau',
		'localisation'=> 'Région Centrale',
		'image'       => 'https://images.unsplash.com/photo-1548839141-73fd1da4baab?w=400&h=300&fit=crop',
		'lien'        => '#',
	),
);

// Liste des statuts et catégories pour les filtres
$statuts_disponibles = array(
	'en-cours' => 'En cours',
	'termine'  => 'Terminé',
	'bientot'  => 'À venir',
);
$categories_disponibles = array(
	'agriculture' => 'Agriculture',
	'energie'     => 'Énergie',
	'foret'       => 'Forêt',
	'cotier'      => 'Littoral',
	'dechet'      => 'Déchets',
	'eau'         => 'Eau',
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="projets-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li class="current">Nos projets</li>
			</ol>
		</nav>
		<span class="projets-header__badge"><i class="fas fa-folder-open"></i> Fonds Vert Togo</span>
		<h1>Nos projets</h1>
		<div class="title-underline"></div>
		<p class="projets-header__sub">Découvrez l'ensemble des initiatives soutenues par le Fonds Vert du Togo pour un avenir durable.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="projets-content">
	<div class="container">

		<!-- ===== BARRE DE FILTRES ET RECHERCHE ===== -->
		<div class="projets-filters">
			<form class="projets-filters__form" id="filtres-projets">
				<div class="projets-filters__group">
					<label for="filtrer-statut">Statut</label>
					<select id="filtrer-statut">
						<option value="">Tous les statuts</option>
						<?php foreach ( $statuts_disponibles as $slug => $label ) : ?>
							<option value="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $label ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="projets-filters__group">
					<label for="filtrer-categorie">Catégorie</label>
					<select id="filtrer-categorie">
						<option value="">Toutes les catégories</option>
						<?php foreach ( $categories_disponibles as $slug => $label ) : ?>
							<option value="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $label ); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="projets-filters__group projets-filters__group--search">
					<label for="recherche-projets">Recherche</label>
					<input type="text" id="recherche-projets" placeholder="Rechercher un projet..." />
				</div>
				<div class="projets-filters__actions">
					<button type="reset" class="filter-btn filter-btn--reset" id="reset-filtres">
						<i class="fas fa-undo"></i> Réinitialiser
					</button>
				</div>
			</form>
			<div class="projets-filters__count" id="projets-count">
				<?php echo count( $projets_data ); ?> projet(s) trouvé(s)
			</div>
		</div>

		<!-- ===== GRILLE DES PROJETS ===== -->
		<div class="projets-grid" id="projets-grid">
			<?php foreach ( $projets_data as $projet ) :
				$statut_label = $statuts_disponibles[ $projet['statut'] ] ?? $projet['statut'];
				$classe_statut = 'statut--' . $projet['statut'];
			?>
			<article class="projet-card" data-statut="<?php echo esc_attr( $projet['statut'] ); ?>" data-categorie="<?php echo esc_attr( $projet['categorie'] ); ?>" data-titre="<?php echo esc_attr( strtolower( $projet['titre'] ) ); ?>" data-extrait="<?php echo esc_attr( strtolower( $projet['extrait'] ) ); ?>">
				<div class="projet-card__image">
					<img src="<?php echo esc_url( $projet['image'] ); ?>" alt="<?php echo esc_attr( $projet['titre'] ); ?>" loading="lazy">
					<span class="projet-card__status <?php echo esc_attr( $classe_statut ); ?>"><?php echo esc_html( $statut_label ); ?></span>
					<a href="<?php echo esc_url( $projet['lien'] ); ?>" class="projet-card__link-overlay"><span class="sr-only"><?php echo esc_html( $projet['titre'] ); ?></span></a>
				</div>
				<div class="projet-card__content">
					<div class="projet-card__location"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $projet['localisation'] ); ?></div>
					<span class="projet-card__cat"><?php echo esc_html( $categories_disponibles[ $projet['categorie'] ] ?? $projet['categorie'] ); ?></span>
					<h3 class="projet-card__title"><a href="<?php echo esc_url( $projet['lien'] ); ?>"><?php echo esc_html( $projet['titre'] ); ?></a></h3>
					<p class="projet-card__excerpt"><?php echo esc_html( $projet['extrait'] ); ?></p>
					<a href="<?php echo esc_url( $projet['lien'] ); ?>" class="projet-card__btn">Voir le projet <i class="fas fa-arrow-right"></i></a>
				</div>
			</article>
			<?php endforeach; ?>
		</div>

		<!-- ===== MESSAGE SI AUCUN PROJET ===== -->
		<div class="projets-empty" id="projets-empty" style="display:none;">
			<i class="fas fa-search"></i>
			<h3>Aucun projet trouvé</h3>
			<p>Essayez de modifier vos filtres ou de lancer une nouvelle recherche.</p>
		</div>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="projets-cta">
	<div class="container">
		<h2>Vous portez un projet climatique ?</h2>
		<div class="cta-divider"></div>
		<p>Rejoignez les acteurs qui construisent, avec le Fonds Vert Togo, un avenir résilient et durable.</p>
		<a href="<?php echo esc_url( home_url( '/soumettre-un-projet' ) ); ?>" class="cta-btn">
			Soumettre un projet <i class="fas fa-arrow-right"></i>
		</a>
	</div>
</section>

<!-- ============================================================
     STYLES CSS (intégrés)
     ============================================================ -->
<style>
/* ============================================================
   PAGE PROJETS STATIQUE – CHARTE FONDS VERT TOGO
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
.projets-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.projets-header::after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	height: 4px;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.projets-header__badge {
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
.projets-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.projets-header h1 {
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
.projets-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU ===== */
.projets-content {
	padding: 50px 0 30px;
	background: #ffffff;
}

/* ===== FILTRES ===== */
.projets-filters {
	background: var(--gris-fond);
	border-radius: 20px;
	padding: 28px 30px;
	margin-bottom: 40px;
	border: 1px solid #e7f0ea;
}
.projets-filters__form {
	display: flex;
	flex-wrap: wrap;
	align-items: flex-end;
	gap: 18px 24px;
}
.projets-filters__group {
	flex: 1 1 180px;
	min-width: 140px;
}
.projets-filters__group--search {
	flex: 2 1 240px;
	min-width: 180px;
}
.projets-filters__group label {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.85rem;
	color: var(--vert-fvt-fonce);
	margin-bottom: 4px;
	text-transform: uppercase;
	letter-spacing: 0.3px;
}
.projets-filters__group select,
.projets-filters__group input {
	width: 100%;
	padding: 10px 14px;
	border: 1px solid #dce8e0;
	border-radius: 10px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #2c3e34;
	background: #fff;
	transition: border 0.2s;
}
.projets-filters__group select:focus,
.projets-filters__group input:focus {
	border-color: var(--vert-fvt);
	outline: none;
}
.projets-filters__actions {
	display: flex;
	gap: 10px;
	flex-wrap: wrap;
	align-items: center;
}
.filter-btn--reset {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	padding: 10px 22px;
	background: transparent;
	color: var(--vert-fvt);
	border: 2px solid var(--vert-fvt);
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	text-decoration: none;
	transition: all 0.3s ease;
	cursor: pointer;
}
.filter-btn--reset:hover {
	background: var(--vert-fvt);
	color: #fff;
}
.projets-filters__count {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
	margin-top: 16px;
	padding-top: 16px;
	border-top: 1px solid #e7f0ea;
}

/* ===== GRILLE ===== */
.projets-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 30px;
}

/* ===== CARTE PROJET ===== */
.projet-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.projet-card:hover {
	transform: translateY(-8px);
	box-shadow: 0 16px 32px rgba(6,61,36,0.10);
}
.projet-card__image {
	position: relative;
	height: 200px;
	overflow: hidden;
	background: #dce8e0;
}
.projet-card__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.projet-card:hover .projet-card__image img {
	transform: scale(1.05);
}
.projet-card__status {
	position: absolute;
	top: 14px;
	right: 14px;
	padding: 4px 14px;
	border-radius: 20px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 11px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	backdrop-filter: blur(4px);
	z-index: 2;
}
.statut--en-cours {
	background: rgba(10,110,62,0.85);
	color: #fff;
}
.statut--termine {
	background: rgba(210,16,52,0.85);
	color: #fff;
}
.statut--bientot {
	background: rgba(255,206,0,0.85);
	color: #063d24;
}
.projet-card__link-overlay {
	position: absolute;
	inset: 0;
	z-index: 1;
}

.projet-card__content {
	padding: 20px 22px 26px;
}
.projet-card__location {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 13px;
	font-weight: 500;
	color: #0a6e3e;
	margin-bottom: 6px;
}
.projet-card__location i {
	font-size: 14px;
	color: #ffce00;
}
.projet-card__cat {
	display: inline-block;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 11px;
	font-weight: 600;
	color: var(--vert-fvt);
	background: rgba(10,110,62,0.08);
	padding: 2px 12px;
	border-radius: 20px;
	margin-bottom: 8px;
}
.projet-card__title {
	font-family: 'Playfair Display', serif;
	font-size: 1.2rem;
	font-weight: 700;
	margin: 0 0 8px;
}
.projet-card__title a {
	color: var(--vert-fvt-fonce);
	text-decoration: none;
}
.projet-card__title a:hover {
	color: var(--vert-fvt);
}
.projet-card__excerpt {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.92rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 16px;
}
.projet-card__btn {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	color: var(--vert-fvt);
	text-decoration: none;
	transition: gap 0.3s, color 0.3s;
}
.projet-card__btn i {
	font-size: 0.85rem;
	transition: transform 0.3s;
}
.projet-card__btn:hover {
	color: var(--rouge-fvt);
	gap: 12px;
}
.projet-card__btn:hover i {
	transform: translateX(4px);
}

/* ===== EMPTY STATE ===== */
.projets-empty {
	text-align: center;
	padding: 60px 20px;
	display: none;
}
.projets-empty i {
	font-size: 48px;
	color: #dce8e0;
	display: block;
	margin-bottom: 16px;
}
.projets-empty h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
.projets-empty p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1rem;
}

/* ===== CTA ===== */
.projets-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.projets-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.projets-cta h2 {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 800;
	color: #fff;
	font-size: 2.2rem;
	margin: 0 0 12px 0;
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
.projets-cta p {
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
	.projets-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.projets-filters__form {
		flex-direction: column;
		align-items: stretch;
	}
	.projets-filters__group {
		flex: 1 1 auto;
		min-width: 0;
	}
}
@media (max-width: 768px) {
	.projets-header h1 {
		font-size: 2.4rem;
	}
	.projets-cta h2 {
		font-size: 1.8rem;
	}
	.projets-filters {
		padding: 20px;
	}
	.projets-grid {
		grid-template-columns: 1fr;
		gap: 20px;
	}
}
@media (max-width: 576px) {
	.projets-header h1 {
		font-size: 2rem;
	}
	.projets-header__sub {
		font-size: 1rem;
	}
}
</style>

<!-- ============================================================
     SCRIPT DE FILTRAGE (JavaScript)
     ============================================================ -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const grid = document.getElementById('projets-grid');
		const emptyMsg = document.getElementById('projets-empty');
		const countDisplay = document.getElementById('projets-count');
		const statutSelect = document.getElementById('filtrer-statut');
		const categorieSelect = document.getElementById('filtrer-categorie');
		const rechercheInput = document.getElementById('recherche-projets');
		const resetBtn = document.getElementById('reset-filtres');

		const cards = Array.from(grid.querySelectorAll('.projet-card'));

		function filterProjects() {
			const statut = statutSelect.value;
			const categorie = categorieSelect.value;
			const recherche = rechercheInput.value.toLowerCase().trim();

			let visibleCount = 0;

			cards.forEach(function(card) {
				const cardStatut = card.dataset.statut;
				const cardCategorie = card.dataset.categorie;
				const titre = card.dataset.titre;
				const extrait = card.dataset.extrait;

				let match = true;

				if (statut && cardStatut !== statut) match = false;
				if (categorie && cardCategorie !== categorie) match = false;
				if (recherche) {
					const text = titre + ' ' + extrait;
					if (!text.includes(recherche)) match = false;
				}

				if (match) {
					card.style.display = '';
					visibleCount++;
				} else {
					card.style.display = 'none';
				}
			});

			// Mise à jour du compteur
			countDisplay.textContent = visibleCount + ' projet(s) trouvé(s)';

			// Affichage du message "aucun résultat"
			if (visibleCount === 0) {
				emptyMsg.style.display = 'block';
			} else {
				emptyMsg.style.display = 'none';
			}
		}

		// Écouteurs d'événements
		statutSelect.addEventListener('change', filterProjects);
		categorieSelect.addEventListener('change', filterProjects);
		rechercheInput.addEventListener('input', filterProjects);

		// Réinitialisation
		resetBtn.addEventListener('click', function(e) {
			e.preventDefault();
			statutSelect.value = '';
			categorieSelect.value = '';
			rechercheInput.value = '';
			filterProjects();
		});

		// Filtrage initial
		filterProjects();
	});
</script>