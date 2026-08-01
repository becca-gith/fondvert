<?php
/**
 * Template part : Page "Présentation du ministère" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Données du ministère
$ministere = array(
	'nom'          => 'Ministère de l\'Environnement, de l\'Économie Verte et du Changement Climatique',
	'sigle'        => 'MEEVCC',
	'description'  => 'Le Ministère de l\'Environnement, de l\'Économie Verte et du Changement Climatique est le département ministériel chargé de la mise en œuvre des politiques nationales en matière de protection de l\'environnement, de développement durable et de lutte contre les changements climatiques. Il assure la coordination et le suivi des actions du Fonds Vert du Togo.',
	'email'        => 'contact@environnement.tg',
	'telephone'    => '+228 20 22 30 40',
	'adresse'      => 'Lomé, Togo',
	'site'         => 'https://environnement.tg',
);

// Missions
$missions = array(
	'Élaborer et mettre en œuvre les politiques nationales de protection de l\'environnement.',
	'Coordonner les actions de lutte contre les changements climatiques.',
	'Promouvoir l\'économie verte et les énergies renouvelables.',
	'Assurer le suivi-évaluation des projets environnementaux.',
	'Renforcer les capacités des acteurs locaux en matière de développement durable.',
	'Faciliter l\'accès aux financements climatiques internationaux.',
);

// Organisation
$organisation = array(
	array(
		'nom'    => 'Cabinet du Ministre',
		'fonction' => 'Direction politique',
	),
	array(
		'nom'    => 'Secrétariat Général',
		'fonction' => 'Coordination administrative',
	),
	array(
		'nom'    => 'Direction Générale de l\'Environnement',
		'fonction' => 'Gestion des politiques environnementales',
	),
	array(
		'nom'    => 'Direction Générale de l\'Économie Verte',
		'fonction' => 'Promotion de l\'économie durable',
	),
	array(
		'nom'    => 'Direction du Changement Climatique',
		'fonction' => 'Coordination climatique',
	),
	array(
		'nom'    => 'Direction des Finances et des Ressources',
		'fonction' => 'Gestion budgétaire et des ressources',
	),
);

// Orientations stratégiques
$orientations = array(
	'Renforcer la résilience des écosystèmes face aux changements climatiques.',
	'Promouvoir une économie verte et inclusive.',
	'Accélérer la transition énergétique au Togo.',
	'Renforcer la gouvernance environnementale et la transparence.',
	'Mobiliser les financements climatiques internationaux.',
	'Impliquer les communautés locales dans la gestion durable des ressources.',
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="ministere-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/a-propos' ) ); ?>">À propos</a></li>
				<li class="separator">›</li>
				<li class="current">Ministère</li>
			</ol>
		</nav>
		<span class="ministere-header__badge"><i class="fas fa-landmark"></i> Togo Green Fund </span>
		<h1>Présentation du ministère</h1>
		<div class="title-underline"></div>
		<p class="ministere-header__sub">Découvrez le ministère de tutelle du Fonds Vert du Togo.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="ministere-content">
	<div class="container">

		<!-- ===== PRÉSENTATION GÉNÉRALE ===== -->
		<div class="ministere-card">
			<div class="ministere-card__header">
				<div class="ministere-card__icon"><i class="fas fa-leaf"></i></div>
				<div>
					<h2 class="ministere-card__titre"><?php echo esc_html( $ministere['nom'] ); ?></h2>
					<p class="ministere-card__sigle"><?php echo esc_html( $ministere['sigle'] ); ?></p>
				</div>
			</div>
			<div class="ministere-card__body">
				<p><?php echo esc_html( $ministere['description'] ); ?></p>
				<div class="ministere-card__infos">
					<span><i class="fas fa-envelope"></i> <?php echo esc_html( $ministere['email'] ); ?></span>
					<span><i class="fas fa-phone-alt"></i> <?php echo esc_html( $ministere['telephone'] ); ?></span>
					<span><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $ministere['adresse'] ); ?></span>
					<span><i class="fas fa-globe"></i> <a href="<?php echo esc_url( $ministere['site'] ); ?>" target="_blank"><?php echo esc_html( $ministere['site'] ); ?></a></span>
				</div>
			</div>
		</div>

		<!-- ===== MISSIONS ===== -->
		<div class="ministere-section">
			<h3 class="ministere-section__title"><i class="fas fa-bullseye"></i> Nos missions</h3>
			<ul class="ministere-section__list">
				<?php foreach ( $missions as $mission ) : ?>
					<li><i class="fas fa-check-circle"></i> <?php echo esc_html( $mission ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<!-- ===== ORGANISATION ===== -->
		<div class="ministere-section">
			<h3 class="ministere-section__title"><i class="fas fa-sitemap"></i> Organisation</h3>
			<div class="ministere-grid">
				<?php foreach ( $organisation as $entite ) : ?>
					<div class="ministere-grid__item">
						<div class="ministere-grid__item__icon"><i class="fas fa-building"></i></div>
						<h4 class="ministere-grid__item__titre"><?php echo esc_html( $entite['nom'] ); ?></h4>
						<p class="ministere-grid__item__desc"><?php echo esc_html( $entite['fonction'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- ===== ORIENTATIONS STRATÉGIQUES ===== -->
		<div class="ministere-section">
			<h3 class="ministere-section__title"><i class="fas fa-rocket"></i> Orientations stratégiques</h3>
			<div class="ministere-orientations">
				<?php foreach ( $orientations as $orientation ) : ?>
					<div class="ministere-orientation">
						<i class="fas fa-chevron-circle-right"></i>
						<span><?php echo esc_html( $orientation ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="ministere-cta">
	<div class="container">
		<h2>Vous souhaitez en savoir plus ?</h2>
		<div class="cta-divider"></div>
		<p>Consultez les autres pages ou contactez-nous pour toute question.</p>
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
   PAGE PRÉSENTATION MINISTÈRE – CHARTE FONDS VERT TOGO
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
.ministere-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.ministere-header::after {
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
.ministere-header__badge {
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
.ministere-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.ministere-header h1 {
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
.ministere-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU ===== */
.ministere-content {
	padding: 50px 0 30px;
	background: #ffffff;
}

/* ===== CARTE PRINCIPALE ===== */
.ministere-card {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	padding: 34px 36px;
	margin-bottom: 40px;
	transition: box-shadow 0.3s;
}
.ministere-card:hover {
	box-shadow: 0 8px 24px rgba(6,61,36,0.08);
}
.ministere-card__header {
	display: flex;
	align-items: center;
	gap: 20px;
	margin-bottom: 18px;
}
.ministere-card__icon {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 64px;
	height: 64px;
	border-radius: 50%;
	background: rgba(10,110,62,0.10);
	color: var(--vert-fvt);
	font-size: 28px;
	flex-shrink: 0;
}
.ministere-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.6rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0;
}
.ministere-card__sigle {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.95rem;
	color: var(--vert-fvt);
	margin: 0;
}
.ministere-card__body p {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.05rem;
	line-height: 1.7;
	color: #2c3e34;
	margin: 0 0 18px;
}
.ministere-card__infos {
	display: flex;
	flex-wrap: wrap;
	gap: 16px 24px;
	padding-top: 16px;
	border-top: 1px solid #dce8e0;
}
.ministere-card__infos span {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #4d6a59;
}
.ministere-card__infos span i {
	color: var(--vert-fvt);
	width: 18px;
}
.ministere-card__infos span a {
	color: var(--vert-fvt);
	text-decoration: none;
	transition: color 0.2s;
}
.ministere-card__infos span a:hover {
	color: var(--vert-fvt-fonce);
}

/* ===== SECTIONS ===== */
.ministere-section {
	margin-top: 40px;
}
.ministere-section__title {
	font-family: 'Playfair Display', serif;
	font-size: 1.6rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0 0 20px;
	display: flex;
	align-items: center;
	gap: 12px;
}
.ministere-section__title i {
	color: var(--vert-fvt);
	font-size: 1.4rem;
}

/* Liste des missions */
.ministere-section__list {
	list-style: none;
	padding: 0;
	margin: 0;
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 12px 24px;
}
.ministere-section__list li {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.98rem;
	color: #2c3e34;
	padding: 8px 0;
	border-bottom: 1px solid #f0f5f2;
}
.ministere-section__list li i {
	color: var(--vert-fvt);
	font-size: 18px;
	margin-top: 2px;
	flex-shrink: 0;
}

/* Grille organisation */
.ministere-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 20px;
}
.ministere-grid__item {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 16px;
	padding: 22px 20px;
	text-align: center;
	transition: transform 0.3s, box-shadow 0.3s;
}
.ministere-grid__item:hover {
	transform: translateY(-4px);
	box-shadow: 0 8px 20px rgba(6,61,36,0.08);
}
.ministere-grid__item__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 48px;
	height: 48px;
	border-radius: 50%;
	background: rgba(10,110,62,0.08);
	color: var(--vert-fvt);
	font-size: 20px;
	margin-bottom: 12px;
}
.ministere-grid__item__titre {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.05rem;
	color: var(--vert-fvt-fonce);
	margin: 0 0 4px;
}
.ministere-grid__item__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.88rem;
	color: #5a6a5f;
	margin: 0;
}

/* Orientations stratégiques */
.ministere-orientations {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 12px 24px;
}
.ministere-orientation {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.98rem;
	color: #2c3e34;
	padding: 8px 0;
	border-bottom: 1px solid #f0f5f2;
}
.ministere-orientation i {
	color: var(--jaune-fvt);
	font-size: 18px;
	margin-top: 2px;
	flex-shrink: 0;
}
.ministere-orientation span {
	line-height: 1.5;
}

/* ===== CTA ===== */
.ministere-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.ministere-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.ministere-cta h2 {
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
.ministere-cta p {
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
	.ministere-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.ministere-section__list {
		grid-template-columns: 1fr;
	}
	.ministere-orientations {
		grid-template-columns: 1fr;
	}
}
@media (max-width: 768px) {
	.ministere-header h1 {
		font-size: 2.4rem;
	}
	.ministere-cta h2 {
		font-size: 1.8rem;
	}
	.ministere-card {
		padding: 24px 18px;
	}
	.ministere-card__header {
		flex-direction: column;
		text-align: center;
	}
	.ministere-card__titre {
		font-size: 1.3rem;
	}
	.ministere-grid {
		grid-template-columns: 1fr;
	}
}
@media (max-width: 576px) {
	.ministere-header h1 {
		font-size: 2rem;
	}
	.ministere-header__sub {
		font-size: 1rem;
	}
	.ministere-card__infos {
		flex-direction: column;
		gap: 8px;
	}
}
</style>