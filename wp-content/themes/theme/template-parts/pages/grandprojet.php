<?php
/**
 * Template part : Page "Grands projets climatiques" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Données des grands projets
$grands_projets = array(
	array(
		'id'          => 1,
		'titre'       => 'Agriculture résiliente dans les Savanes',
		'localisation'=> 'Région des Savanes',
		'statut'      => 'en_cours',
		'image'       => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=800&h=500&fit=crop',
		'description' => 'Projet d\'envergure visant à renforcer la résilience de 5 000 agriculteurs face aux chocs climatiques. Il combine l\'introduction de variétés résistantes, l\'irrigation durable et la formation aux pratiques agroécologiques.',
		'impact'      => array(
			'5000'       => 'Agriculteurs formés',
			'2000'       => 'Hectares réhabilités',
			'30%'        => 'Augmentation des rendements',
			'15'         => 'Villages bénéficiaires',
		),
		'partenaires' => 'PNUD, FAO, Ministère de l\'Agriculture',
		'budget'      => '5 millions USD',
		'periode'     => '2024 - 2027',
	),
	array(
		'id'          => 2,
		'titre'       => 'Énergie solaire pour les communautés rurales',
		'localisation'=> 'Région Maritime',
		'statut'      => 'termine',
		'image'       => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=800&h=500&fit=crop',
		'description' => 'Installation de mini-réseaux solaires dans 30 villages de la région Maritime, permettant l\'accès à l\'électricité propre pour 15 000 ménages et le développement d\'activités économiques.',
		'impact'      => array(
			'15000'      => 'Ménages électrifiés',
			'30'         => 'Villages équipés',
			'80%'        => 'Réduction des émissions',
			'200'        => 'Emplois créés',
		),
		'partenaires' => 'GIZ, Banque Mondiale, Agence Togolaise d\'Électrification',
		'budget'      => '12 millions USD',
		'periode'     => '2023 - 2025',
	),
	array(
		'id'          => 3,
		'titre'       => 'Gestion durable des forêts des Plateaux',
		'localisation'=> 'Région des Plateaux',
		'statut'      => 'en_cours',
		'image'       => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=800&h=500&fit=crop',
		'description' => 'Projet de restauration et de gestion participative de 10 000 hectares de forêts communautaires. Il associe reboisement, agroforesterie et création de filières durables.',
		'impact'      => array(
			'10000'      => 'Hectares restaurés',
			'3000'       => 'Ménages bénéficiaires',
			'40%'        => 'Réduction de la déforestation',
			'500'        => 'Emplois verts',
		),
		'partenaires' => 'UICN, AFD, Ministère de l\'Environnement',
		'budget'      => '8 millions USD',
		'periode'     => '2024 - 2028',
	),
	array(
		'id'          => 4,
		'titre'       => 'Adaptation des zones côtières',
		'localisation'=> 'Littoral Togolais',
		'statut'      => 'en_cours',
		'image'       => 'https://images.unsplash.com/photo-1544552861-1f2c946a75f4?w=800&h=500&fit=crop',
		'description' => 'Protection des 50 km de côtes togolaises contre l\'érosion et les inondations par des solutions fondées sur la nature : reboisement de mangrove, épis, et restauration des dunes.',
		'impact'      => array(
			'50'         => 'Km de côtes protégés',
			'20000'      => 'Personnes protégées',
			'70%'        => 'Réduction des inondations',
			'100'        => 'Hectares de mangrove restaurés',
		),
		'partenaires' => 'PNUE, Banque Africaine de Développement, Ministère des Transports',
		'budget'      => '15 millions USD',
		'periode'     => '2025 - 2029',
	),
	array(
		'id'          => 5,
		'titre'       => 'Économie circulaire et déchets',
		'localisation'=> 'Grand Lomé',
		'statut'      => 'bientot',
		'image'       => 'https://images.unsplash.com/photo-1532996129724-e7b8f0b99d88?w=800&h=500&fit=crop',
		'description' => 'Projet pilote d\'économie circulaire dans le Grand Lomé, visant à valoriser 60% des déchets urbains par le recyclage, le compostage et la production d\'énergie.',
		'impact'      => array(
			'60%'        => 'Taux de valorisation',
			'1000'       => 'Emplois créés',
			'50'         => 'Tonnes de CO2 évitées/an',
			'200'        => 'Entreprises accompagnées',
		),
		'partenaires' => 'UE, AFD, Mairie de Lomé',
		'budget'      => '10 millions USD',
		'periode'     => '2026 - 2029',
	),
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="grands-projets-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/projets' ) ); ?>">Projets</a></li>
				<li class="separator">›</li>
				<li class="current">Grands projets climatiques</li>
			</ol>
		</nav>
		<span class="grands-projets-header__badge"><i class="fas fa-globe-africa"></i> Fonds Vert Togo</span>
		<h1>Grands projets climatiques</h1>
		<div class="title-underline"></div>
		<p class="grands-projets-header__sub">Découvrez les initiatives majeures soutenues par le Fonds Vert pour un Togo résilient et durable.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="grands-projets-content">
	<div class="container">

		<!-- ===== STATISTIQUES RAPIDES ===== -->
		<div class="grands-projets-stats">
			<div class="stat-item">
				<span class="stat-item__nombre">5</span>
				<span class="stat-item__label">Projets majeurs</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre">50M+</span>
				<span class="stat-item__label">USD mobilisés</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre">10</span>
				<span class="stat-item__label">Partenaires internationaux</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre">200K+</span>
				<span class="stat-item__label">Bénéficiaires</span>
			</div>
		</div>

		<!-- ===== GRILLE DES PROJETS ===== -->
		<div class="grands-projets-grid">
			<?php foreach ( $grands_projets as $projet ) :
				$statut_label = '';
				$statut_class = '';
				switch ( $projet['statut'] ) {
					case 'en_cours':
						$statut_label = 'En cours';
						$statut_class = 'statut--encours';
						break;
					case 'termine':
						$statut_label = 'Terminé';
						$statut_class = 'statut--termine';
						break;
					case 'bientot':
						$statut_label = 'À venir';
						$statut_class = 'statut--bientot';
						break;
				}
			?>
				<article class="grand-projet-card">
					<div class="grand-projet-card__image">
						<img src="<?php echo esc_url( $projet['image'] ); ?>" alt="<?php echo esc_attr( $projet['titre'] ); ?>" loading="lazy">
						<span class="grand-projet-card__statut <?php echo esc_attr( $statut_class ); ?>"><?php echo esc_html( $statut_label ); ?></span>
					</div>
					<div class="grand-projet-card__content">
						<div class="grand-projet-card__meta">
							<span class="grand-projet-card__localisation"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $projet['localisation'] ); ?></span>
							<span class="grand-projet-card__periode"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $projet['periode'] ); ?></span>
						</div>
						<h3 class="grand-projet-card__titre"><?php echo esc_html( $projet['titre'] ); ?></h3>
						<p class="grand-projet-card__desc"><?php echo esc_html( $projet['description'] ); ?></p>
						
						<!-- Indicateurs d'impact -->
						<div class="grand-projet-card__impact">
							<?php foreach ( $projet['impact'] as $valeur => $label ) : ?>
								<div class="impact-item">
									<span class="impact-item__valeur"><?php echo esc_html( $valeur ); ?></span>
									<span class="impact-item__label"><?php echo esc_html( $label ); ?></span>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="grand-projet-card__infos">
							<div class="grand-projet-card__partenaires">
								<i class="fas fa-handshake"></i>
								<span><?php echo esc_html( $projet['partenaires'] ); ?></span>
							</div>
							<div class="grand-projet-card__budget">
								<i class="fas fa-coins"></i>
								<span><?php echo esc_html( $projet['budget'] ); ?></span>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="grands-projets-cta">
	<div class="container">
		<h2>Vous avez un projet d'envergure ?</h2>
		<div class="cta-divider"></div>
		<p>Le Fonds Vert accompagne les initiatives à fort impact. Soumettez votre projet dès maintenant.</p>
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
   PAGE GRANDS PROJETS – CHARTE FONDS VERT TOGO
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
.grands-projets-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.grands-projets-header::after {
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
.grands-projets-header__badge {
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
.grands-projets-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.grands-projets-header h1 {
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
.grands-projets-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== STATISTIQUES RAPIDES ===== */
.grands-projets-stats {
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
.grands-projets-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 40px;
}

/* ===== CARTE PROJET ===== */
.grand-projet-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}
.grand-projet-card:hover {
	transform: translateY(-6px);
	box-shadow: 0 16px 32px rgba(6,61,36,0.10);
}
.grand-projet-card__image {
	position: relative;
	height: 320px;
	overflow: hidden;
	background: #dce8e0;
}
.grand-projet-card__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.6s;
}
.grand-projet-card:hover .grand-projet-card__image img {
	transform: scale(1.05);
}
.grand-projet-card__statut {
	position: absolute;
	top: 16px;
	right: 16px;
	padding: 6px 18px;
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 12px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	backdrop-filter: blur(4px);
	z-index: 2;
}
.statut--encours {
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

.grand-projet-card__content {
	padding: 30px 34px 34px;
}
.grand-projet-card__meta {
	display: flex;
	flex-wrap: wrap;
	gap: 16px 24px;
	margin-bottom: 10px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.9rem;
	color: #5a6a5f;
}
.grand-projet-card__meta i {
	color: var(--vert-fvt);
	margin-right: 6px;
}
.grand-projet-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.8rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0 0 12px;
}
.grand-projet-card__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.05rem;
	line-height: 1.7;
	color: #2c3e34;
	margin: 0 0 20px;
}

/* Impact */
.grand-projet-card__impact {
	display: flex;
	flex-wrap: wrap;
	gap: 16px 24px;
	margin-bottom: 20px;
	padding: 16px 20px;
	background: var(--gris-fond);
	border-radius: 16px;
}
.impact-item {
	display: flex;
	flex-direction: column;
	align-items: center;
	text-align: center;
	flex: 1 1 auto;
	min-width: 60px;
}
.impact-item__valeur {
	font-family: 'Playfair Display', serif;
	font-size: 1.4rem;
	font-weight: 700;
	color: var(--vert-fvt);
}
.impact-item__label {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.8rem;
	color: #5a6a5f;
	text-transform: uppercase;
	letter-spacing: 0.3px;
}

.grand-projet-card__infos {
	display: flex;
	flex-wrap: wrap;
	gap: 16px 24px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #4d6a59;
}
.grand-projet-card__infos i {
	color: var(--vert-fvt);
	margin-right: 6px;
}
.grand-projet-card__partenaires {
	flex: 1 1 auto;
}
.grand-projet-card__budget {
	flex-shrink: 0;
}

/* ===== CTA ===== */
.grands-projets-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.grands-projets-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.grands-projets-cta h2 {
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
.grands-projets-cta p {
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
	.grands-projets-stats {
		grid-template-columns: repeat(2, 1fr);
	}
	.grand-projet-card__image {
		height: 240px;
	}
}
@media (max-width: 768px) {
	.grands-projets-header h1 {
		font-size: 2.4rem;
	}
	.grands-projets-cta h2 {
		font-size: 1.8rem;
	}
	.grand-projet-card__content {
		padding: 24px 18px 26px;
	}
	.grand-projet-card__titre {
		font-size: 1.4rem;
	}
	.grand-projet-card__impact {
		gap: 12px;
		padding: 12px 16px;
	}
}
@media (max-width: 576px) {
	.grands-projets-header h1 {
		font-size: 2rem;
	}
	.grands-projets-header__sub {
		font-size: 1rem;
	}
	.grands-projets-stats {
		grid-template-columns: 1fr 1fr;
		gap: 12px;
	}
	.stat-item__nombre {
		font-size: 1.8rem;
	}
	.grand-projet-card__image {
		height: 180px;
	}
}
</style>