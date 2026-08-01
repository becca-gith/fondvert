<?php
/**
 * Template part : Page "Nos réalisations" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Données des réalisations
$realisations = array(
	array(
		'id'          => 1,
		'titre'       => 'Agriculture résiliente dans les Savanes',
		'categorie'   => 'Agriculture',
		'image'       => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=600&h=400&fit=crop',
		'description' => 'Formation de 5 000 agriculteurs aux techniques agroécologiques et installation de systèmes d\'irrigation durable.',
		'impact'      => array(
			'5000' => 'Agriculteurs formés',
			'2000' => 'Hectares réhabilités',
			'30%'  => 'Augmentation des rendements',
		),
		'statut'      => 'termine',
	),
	array(
		'id'          => 2,
		'titre'       => 'Électrification solaire des villages',
		'categorie'   => 'Énergie',
		'image'       => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=600&h=400&fit=crop',
		'description' => 'Installation de mini-réseaux solaires dans 30 villages de la région Maritime, bénéficiant à 15 000 ménages.',
		'impact'      => array(
			'15000' => 'Ménages électrifiés',
			'30'    => 'Villages équipés',
			'200'   => 'Emplois créés',
		),
		'statut'      => 'termine',
	),
	array(
		'id'          => 3,
		'titre'       => 'Restauration des forêts des Plateaux',
		'categorie'   => 'Forêt',
		'image'       => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=600&h=400&fit=crop',
		'description' => 'Reboisement participatif de 10 000 hectares de forêts communautaires et création de 500 emplois verts.',
		'impact'      => array(
			'10000' => 'Hectares restaurés',
			'3000'  => 'Ménages bénéficiaires',
			'500'   => 'Emplois créés',
		),
		'statut'      => 'termine',
	),
	array(
		'id'          => 4,
		'titre'       => 'Protection des côtes togolaises',
		'categorie'   => 'Littoral',
		'image'       => 'https://images.unsplash.com/photo-1544552861-1f2c946a75f4?w=600&h=400&fit=crop',
		'description' => 'Restauration de mangroves et construction d\'ouvrages de protection contre l\'érosion côtière.',
		'impact'      => array(
			'50'    => 'Km de côtes protégés',
			'20000' => 'Personnes protégées',
			'100'   => 'Hectares de mangrove',
		),
		'statut'      => 'termine',
	),
);

// Témoignages de bénéficiaires
$temoignages = array(
	array(
		'nom'    => 'Komi AGBOKLI',
		'fonction' => 'Agriculteur, Région des Savanes',
		'photo'  => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face',
		'texte'  => 'Grâce au Fonds Vert, j\'ai pu former ma communauté aux techniques agricoles résilientes. Nos rendements ont augmenté de 30% et nous avons accès à l\'eau toute l\'année.',
	),
	array(
		'nom'    => 'Afi DOSSOU',
		'fonction' => 'Bénéficiaire énergie solaire, Région Maritime',
		'photo'  => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&h=100&fit=crop&crop=face',
		'texte'  => 'L\'installation de panneaux solaires a changé notre vie. Mes enfants peuvent étudier le soir et nous avons pu lancer une petite activité de transformation de produits locaux.',
	),
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="realisations-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/projets' ) ); ?>">Projets</a></li>
				<li class="separator">›</li>
				<li class="current">Réalisations</li>
			</ol>
		</nav>
		<span class="realisations-header__badge"><i class="fas fa-trophy"></i> Fonds Vert Togo</span>
		<h1>Nos réalisations</h1>
		<div class="title-underline"></div>
		<p class="realisations-header__sub">Découvrez les résultats concrets des projets financés par le Fonds Vert.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="realisations-content">
	<div class="container">

		<!-- ===== CHIFFRES CLÉS ===== -->
		<div class="realisations-stats">
			<div class="stat-item">
				<span class="stat-item__nombre">12</span>
				<span class="stat-item__label">Projets achevés</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre">45 000+</span>
				<span class="stat-item__label">Bénéficiaires</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre">25</span>
				<span class="stat-item__label">Partenaires mobilisés</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre">30%</span>
				<span class="stat-item__label">Amélioration moyenne des rendements</span>
			</div>
		</div>

		<!-- ===== GRILLE DES RÉALISATIONS ===== -->
		<div class="realisations-grid">
			<?php foreach ( $realisations as $realisation ) : ?>
				<article class="realisation-card">
					<div class="realisation-card__image">
						<img src="<?php echo esc_url( $realisation['image'] ); ?>" alt="<?php echo esc_attr( $realisation['titre'] ); ?>" loading="lazy">
						<span class="realisation-card__categorie"><?php echo esc_html( $realisation['categorie'] ); ?></span>
					</div>
					<div class="realisation-card__content">
						<h3 class="realisation-card__titre"><?php echo esc_html( $realisation['titre'] ); ?></h3>
						<p class="realisation-card__desc"><?php echo esc_html( $realisation['description'] ); ?></p>
						<div class="realisation-card__impact">
							<?php foreach ( $realisation['impact'] as $valeur => $label ) : ?>
								<div class="impact-item">
									<span class="impact-item__valeur"><?php echo esc_html( $valeur ); ?></span>
									<span class="impact-item__label"><?php echo esc_html( $label ); ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- ===== TÉMOIGNAGES ===== -->
		<div class="realisations-temoignages">
			<h3 class="realisations-temoignages__title"><i class="fas fa-quote-left"></i> Ce qu'ils disent</h3>
			<div class="temoignages-grid">
				<?php foreach ( $temoignages as $temoignage ) : ?>
					<div class="temoignage-card">
						<div class="temoignage-card__header">
							<img src="<?php echo esc_url( $temoignage['photo'] ); ?>" alt="<?php echo esc_attr( $temoignage['nom'] ); ?>" loading="lazy">
							<div>
								<span class="temoignage-card__nom"><?php echo esc_html( $temoignage['nom'] ); ?></span>
								<span class="temoignage-card__fonction"><?php echo esc_html( $temoignage['fonction'] ); ?></span>
							</div>
						</div>
						<p class="temoignage-card__texte">« <?php echo esc_html( $temoignage['texte'] ); ?> »</p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="realisations-cta">
	<div class="container">
		<h2>Vous souhaitez soutenir nos actions ?</h2>
		<div class="cta-divider"></div>
		<p>Devenez partenaire du Fonds Vert et contribuez à un Togo résilient.</p>
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
   PAGE RÉALISATIONS – CHARTE FONDS VERT TOGO
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
.realisations-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.realisations-header::after {
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
.realisations-header__badge {
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
.realisations-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.realisations-header h1 {
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
.realisations-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CHIFFRES CLÉS ===== */
.realisations-stats {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 20px;
	margin-bottom: 50px;
}
.stat-item {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 28px 20px;
	text-align: center;
	transition: transform 0.3s, box-shadow 0.3s;
}
.stat-item:hover {
	transform: translateY(-4px);
	box-shadow: 0 8px 20px rgba(6,61,36,0.08);
}
.stat-item__nombre {
	display: block;
	font-family: 'Playfair Display', serif;
	font-size: 2.4rem;
	font-weight: 800;
	color: var(--vert-fvt);
}
.stat-item__label {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
	margin-top: 4px;
}

/* ===== GRILLE ===== */
.realisations-grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 30px;
}

/* ===== CARTE RÉALISATION ===== */
.realisation-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}
.realisation-card:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.realisation-card__image {
	position: relative;
	height: 220px;
	overflow: hidden;
	background: #dce8e0;
}
.realisation-card__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.realisation-card:hover .realisation-card__image img {
	transform: scale(1.05);
}
.realisation-card__categorie {
	position: absolute;
	top: 14px;
	right: 14px;
	padding: 4px 14px;
	border-radius: 20px;
	background: rgba(0,0,0,0.6);
	color: #fff;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 11px;
	font-weight: 600;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	backdrop-filter: blur(4px);
}
.realisation-card__content {
	padding: 22px 24px 28px;
}
.realisation-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.3rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0 0 10px;
}
.realisation-card__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 16px;
}
.realisation-card__impact {
	display: flex;
	flex-wrap: wrap;
	gap: 12px 20px;
	padding-top: 14px;
	border-top: 1px solid #e7f0ea;
}
.impact-item {
	display: flex;
	flex-direction: column;
	align-items: center;
	text-align: center;
	flex: 1 1 auto;
	min-width: 50px;
}
.impact-item__valeur {
	font-family: 'Playfair Display', serif;
	font-size: 1.2rem;
	font-weight: 700;
	color: var(--vert-fvt);
}
.impact-item__label {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.75rem;
	color: #7a8a7f;
	text-transform: uppercase;
	letter-spacing: 0.3px;
}

/* ===== TÉMOIGNAGES ===== */
.realisations-temoignages {
	margin-top: 60px;
}
.realisations-temoignages__title {
	font-family: 'Playfair Display', serif;
	font-size: 2rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	text-align: center;
	margin: 0 0 36px;
}
.realisations-temoignages__title i {
	color: var(--vert-fvt);
	margin-right: 12px;
}
.temoignages-grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 30px;
}
.temoignage-card {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 26px 28px;
}
.temoignage-card__header {
	display: flex;
	align-items: center;
	gap: 16px;
	margin-bottom: 14px;
}
.temoignage-card__header img {
	width: 56px;
	height: 56px;
	border-radius: 50%;
	object-fit: cover;
}
.temoignage-card__nom {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
}
.temoignage-card__fonction {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: #5a6a5f;
}
.temoignage-card__texte {
	font-family: 'Playfair Display', serif;
	font-size: 1.05rem;
	line-height: 1.6;
	color: #2c3e34;
	margin: 0;
	font-style: italic;
}

/* ===== CTA ===== */
.realisations-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.realisations-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.realisations-cta h2 {
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
.realisations-cta p {
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
	.realisations-grid {
		grid-template-columns: 1fr;
	}
	.realisations-stats {
		grid-template-columns: repeat(2, 1fr);
	}
	.temoignages-grid {
		grid-template-columns: 1fr;
	}
}
@media (max-width: 768px) {
	.realisations-header h1 {
		font-size: 2.4rem;
	}
	.realisations-cta h2 {
		font-size: 1.8rem;
	}
}
@media (max-width: 576px) {
	.realisations-header h1 {
		font-size: 2rem;
	}
	.realisations-header__sub {
		font-size: 1rem;
	}
	.realisations-stats {
		grid-template-columns: 1fr 1fr;
		gap: 12px;
	}
	.stat-item__nombre {
		font-size: 1.8rem;
	}
	.realisation-card__impact {
		gap: 8px 12px;
	}
	.impact-item__valeur {
		font-size: 1rem;
	}
}
</style>