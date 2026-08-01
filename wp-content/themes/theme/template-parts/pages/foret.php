<?php
/**
 * Template part : Page "Forêt et biodiversité" – version statique
 * Togo Green Fund
 *
 * @package TogoGreenFund
 */

// Données des projets agricoles
$projets_agricoles = array(
	array(
		'id'          => 1,
		'titre'       => 'Agriculture résiliente dans les Savanes',
		'localisation'=> 'Région des Savanes',
		'statut'      => 'en_cours',
		'image'       => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=600&h=400&fit=crop',
		'description' => 'Soutien à 5 000 agriculteurs pour l\'adoption de pratiques agroécologiques et l\'installation de systèmes d\'irrigation durable.',
		'impact'      => array(
			'5000' => 'Agriculteurs formés',
			'2000' => 'Hectares réhabilités',
			'30%'  => 'Augmentation des rendements',
		),
	),
	array(
		'id'          => 2,
		'titre'       => 'Agroforesterie dans les Plateaux',
		'localisation'=> 'Région des Plateaux',
		'statut'      => 'en_cours',
		'image'       => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=600&h=400&fit=crop',
		'description' => 'Intégration d\'arbres dans les exploitations agricoles pour améliorer la fertilité des sols et diversifier les revenus.',
		'impact'      => array(
			'3000' => 'Agriculteurs bénéficiaires',
			'500'  => 'Hectares agroforestiers',
			'40%'  => 'Augmentation de la biodiversité',
		),
	),
);

// Chiffres clés
$chiffres_foret = array(
	'3 500'      => 'Hectares reboisés',
	'1,2 million'=> 'Arbres plantés',
	'15'         => 'Aires protégées soutenues',
	'20%'        => 'Réduction de la déforestation',
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="agriculture-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/guichet' ) ); ?>">Guichet</a></li>
				<li class="separator">›</li>
				<li class="current">forêt et biodiversité</li>
			</ol>
		</nav>
		<span class="agriculture-header__badge"><i class="fas fa-seedling"></i> Togo Green Fund</span>
		<h1>Guichet Forêt et Biodiversité</h1>
		<div class="title-underline"></div>
		<p class="agriculture-header__sub">Promouvoir des pratiques agricoles résilientes pour la sécurité alimentaire et la lutte contre le changement climatique.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL 
     ============================================================ -->
<section class="agriculture-content">
	<div class="container">

		<!-- ===== INTRODUCTION ===== -->
		<div class="agriculture-intro">
			<div class="agriculture-intro__card">
				<div class="agriculture-intro__texte">
					<p class="first-paragraph">
					Dédié au financement des actions et projets relatifs à la protection de l'environnement, à la protection côtière, à la gestion durable des forêts, des ressources naturelles et de la diversité biologique.</p>
					<p>
						Nos interventions visent à renforcer la sécurité alimentaire, à préserver les ressources naturelles et à améliorer les conditions de vie des communautés rurales. Nous soutenons des projets qui intègrent l’agroécologie, l’irrigation durable, l’agroforesterie et la formation des producteurs.
					</p>
				</div>
				<!--<div class="agriculture-intro__image">
					<img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=600&h=400&fit=crop" alt="Agriculture durable au Togo" loading="lazy">
				</div> -->
				<div class="agriculture-intro__image">
					<img src="http://localhost/fondvert/wp-content/uploads/2026/07/foret.jpg?w=600&h=400&fit=crop" alt="Agriculture durable au Togo" loading="lazy">
				</div>
			</div>
		</div>

		<!-- ===== CHIFFRES CLÉS ===== -->
		<div class="agriculture-chiffres">
			<?php foreach ( $chiffres_foret as $valeur => $label ) : ?>
				<div class="chiffre-item">
					<span class="chiffre-item__nombre"><?php echo esc_html( $valeur ); ?></span>
					<span class="chiffre-item__label"><?php echo esc_html( $label ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- ===== ENJEUX ===== -->
		<div class="agriculture-section">
			<h2 class="agriculture-section__title"><i class="fas fa-bullseye"></i> Pourquoi Forêt et Biodiversité ?</h2>
			<div class="agriculture-enjeux">
				<div class="enjeu-item">
					<i class="fas fa-water"></i>
					<h3>Résilience climatique</h3>
					<p>Des pratiques adaptées pour faire face aux sécheresses et aux inondations.</p>
				</div>
				<div class="enjeu-item">
					<i class="fas fa-leaf"></i>
					<h3>Préservation des sols</h3>
					<p>Réduction de l’érosion, amélioration de la fertilité et stockage de carbone.</p>
				</div>
				<div class="enjeu-item">
					<i class="fas fa-utensils"></i>
					<h3>Sécurité alimentaire</h3>
					<p>Production locale suffisante pour nourrir les populations et réduire les importations.</p>
				</div>
				<div class="enjeu-item">
					<i class="fas fa-hand-holding-heart"></i>
					<h3>Développement rural</h3>
					<p>Création d’emplois et amélioration des revenus des agriculteurs.</p>
				</div>
			</div>
		</div>

		<!-- ===== NOS ACTIONS ===== -->
		<div class="agriculture-section">
			<h2 class="agriculture-section__title"><i class="fas fa-hands-helping"></i> Nos actions</h2>
			<div class="agriculture-actions">
				<div class="action-item">
					<div class="action-item__icon"><i class="fas fa-graduation-cap"></i></div>
					<h3>Formation</h3>
					<p>Ateliers de terrain sur les techniques agroécologiques, la gestion de l’eau et la diversification des cultures.</p>
				</div>
				<div class="action-item">
					<div class="action-item__icon"><i class="fas fa-tint"></i></div>
					<h3>Irrigation durable</h3>
					<p>Installation de systèmes d’irrigation goutte-à-goutte et de forages solaires.</p>
				</div>
				<div class="action-item">
					<div class="action-item__icon"><i class="fas fa-tree"></i></div>
					<h3>Agroforesterie</h3>
					<p>Intégration d’arbres dans les exploitations pour améliorer la fertilité et diversifier les revenus.</p>
				</div>
				<div class="action-item">
					<div class="action-item__icon"><i class="fas fa-file-invoice"></i></div>
					<h3>Accès aux financements</h3>
					<p>Facilitation de l’accès aux crédits agricoles et aux subventions pour les producteurs.</p>
				</div>
			</div>
		</div>

		<!-- ===== PROJETS EMBLÉMATIQUES ===== -->
		<div class="agriculture-section">
			<h2 class="agriculture-section__title"><i class="fas fa-rocket"></i> Projets emblématiques</h2>
			<div class="agriculture-projets">
				<?php foreach ( $projets_agricoles as $projet ) :
					$statut_label = ( $projet['statut'] === 'en_cours' ) ? 'En cours' : 'Terminé';
					$statut_class = ( $projet['statut'] === 'en_cours' ) ? 'statut--encours' : 'statut--termine';
				?>
					<article class="projet-agricole">
						<div class="projet-agricole__image">
							<img src="<?php echo esc_url( $projet['image'] ); ?>" alt="<?php echo esc_attr( $projet['titre'] ); ?>" loading="lazy">
							<span class="projet-agricole__statut <?php echo esc_attr( $statut_class ); ?>"><?php echo esc_html( $statut_label ); ?></span>
						</div>
						<div class="projet-agricole__content">
							<div class="projet-agricole__meta">
								<span><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $projet['localisation'] ); ?></span>
							</div>
							<h3 class="projet-agricole__titre"><?php echo esc_html( $projet['titre'] ); ?></h3>
							<p class="projet-agricole__desc"><?php echo esc_html( $projet['description'] ); ?></p>
							<div class="projet-agricole__impact">
								<?php foreach ( $projet['impact'] as $valeur => $label ) : ?>
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
		</div>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="agriculture-cta">
	<div class="container">
		<h2>Vous souhaitez soutenir l’agriculture durable ?</h2>
		<div class="cta-divider"></div>
		<p>Rejoignez le Togo Green Fund pour accompagner les agriculteurs vers un avenir résilient.</p>
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
   PAGE AGRICULTURE DURABLE – CHARTE TOGO GREEN FUND
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
.agriculture-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.agriculture-header::after {
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
.agriculture-header__badge {
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
.agriculture-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.agriculture-header h1 {
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
.agriculture-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== INTRODUCTION ===== */
.agriculture-intro {
	margin: 50px 0 0;
}
.agriculture-intro__card {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 40px;
	background: #fff;
	border-radius: 24px;
	box-shadow: 0 8px 24px rgba(6,61,36,0.06);
	overflow: hidden;
	border: 1px solid #e7f0ea;
}
.agriculture-intro__texte {
	padding: 40px 36px;
}
.agriculture-intro__texte .first-paragraph {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.12rem;
	font-weight: 500;
	color: var(--vert-fvt-fonce);
	margin-bottom: 16px;
}
.agriculture-intro__texte .first-paragraph::first-letter {
	font-size: 3.8rem;
	font-weight: 800;
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt);
	float: left;
	line-height: 0.75;
	margin-right: 14px;
	margin-top: 6px;
}
.agriculture-intro__texte p {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.05rem;
	line-height: 1.8;
	color: #2c3e34;
	margin: 0 0 16px;
}
.agriculture-intro__texte p:last-child {
	margin-bottom: 0;
}
.agriculture-intro__image {
	overflow: hidden;
}
.agriculture-intro__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

/* ===== CHIFFRES CLÉS ===== */
.agriculture-chiffres {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 20px;
	margin: 50px 0;
}
.chiffre-item {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 28px 16px;
	text-align: center;
	transition: transform 0.3s, box-shadow 0.3s;
}
.chiffre-item:hover {
	transform: translateY(-4px);
	box-shadow: 0 8px 20px rgba(6,61,36,0.08);
}
.chiffre-item__nombre {
	display: block;
	font-family: 'Playfair Display', serif;
	font-size: 2.2rem;
	font-weight: 800;
	color: var(--vert-fvt);
}
.chiffre-item__label {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
	margin-top: 4px;
}

/* ===== SECTIONS ===== */
.agriculture-section {
	margin-top: 50px;
}
.agriculture-section__title {
	font-family: 'Playfair Display', serif;
	font-size: 1.8rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0 0 24px;
	display: flex;
	align-items: center;
	gap: 12px;
}
.agriculture-section__title i {
	color: var(--vert-fvt);
	font-size: 1.6rem;
}

/* ===== ENJEUX ===== */
.agriculture-enjeux {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 20px;
}
.enjeu-item {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 28px 20px;
	text-align: center;
	transition: transform 0.3s, box-shadow 0.3s;
}
.enjeu-item:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.08);
}
.enjeu-item i {
	font-size: 32px;
	color: var(--vert-fvt);
	margin-bottom: 12px;
	display: block;
}
.enjeu-item h3 {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.1rem;
	color: var(--vert-fvt-fonce);
	margin: 0 0 8px;
}
.enjeu-item p {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.92rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0;
}

/* ===== ACTIONS ===== */
.agriculture-actions {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 20px;
}
.action-item {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 28px 20px;
	text-align: center;
	transition: transform 0.3s, box-shadow 0.3s;
}
.action-item:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.08);
}
.action-item__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 56px;
	height: 56px;
	border-radius: 50%;
	background: rgba(10,110,62,0.08);
	color: var(--vert-fvt);
	font-size: 24px;
	margin-bottom: 12px;
}
.action-item h3 {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.05rem;
	color: var(--vert-fvt-fonce);
	margin: 0 0 8px;
}
.action-item p {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.92rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0;
}

/* ===== PROJETS ===== */
.agriculture-projets {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 30px;
}
.projet-agricole {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}
.projet-agricole:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.projet-agricole__image {
	position: relative;
	height: 200px;
	overflow: hidden;
}
.projet-agricole__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.projet-agricole:hover .projet-agricole__image img {
	transform: scale(1.05);
}
.projet-agricole__statut {
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
}
.statut--encours {
	background: rgba(10,110,62,0.85);
	color: #fff;
}
.statut--termine {
	background: rgba(210,16,52,0.85);
	color: #fff;
}
.projet-agricole__content {
	padding: 22px 24px 26px;
}
.projet-agricole__meta {
	display: flex;
	gap: 16px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: #5a6a5f;
	margin-bottom: 8px;
}
.projet-agricole__meta i {
	color: var(--vert-fvt);
	margin-right: 4px;
}
.projet-agricole__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.3rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0 0 8px;
}
.projet-agricole__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 16px;
}
.projet-agricole__impact {
	display: flex;
	flex-wrap: wrap;
	gap: 12px 20px;
	padding-top: 14px;
	border-top: 1px solid #e7f0ea;
}
.projet-agricole__impact .impact-item {
	display: flex;
	flex-direction: column;
	align-items: center;
	text-align: center;
	flex: 1 1 auto;
	min-width: 50px;
}
.projet-agricole__impact .impact-item__valeur {
	font-family: 'Playfair Display', serif;
	font-size: 1.1rem;
	font-weight: 700;
	color: var(--vert-fvt);
}
.projet-agricole__impact .impact-item__label {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.75rem;
	color: #7a8a7f;
	text-transform: uppercase;
	letter-spacing: 0.3px;
}

/* ===== CTA ===== */
.agriculture-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.agriculture-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.agriculture-cta h2 {
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
.agriculture-cta p {
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
	.agriculture-intro__card {
		grid-template-columns: 1fr;
	}
	.agriculture-intro__texte {
		padding: 30px 24px;
	}
	.agriculture-intro__image {
		height: 250px;
	}
	.agriculture-chiffres {
		grid-template-columns: repeat(2, 1fr);
	}
	.agriculture-enjeux {
		grid-template-columns: repeat(2, 1fr);
	}
	.agriculture-actions {
		grid-template-columns: repeat(2, 1fr);
	}
	.agriculture-projets {
		grid-template-columns: 1fr;
	}
}
@media (max-width: 768px) {
	.agriculture-header h1 {
		font-size: 2.4rem;
	}
	.agriculture-cta h2 {
		font-size: 1.8rem;
	}
}
@media (max-width: 576px) {
	.agriculture-header h1 {
		font-size: 2rem;
	}
	.agriculture-header__sub {
		font-size: 1rem;
	}
	.agriculture-chiffres {
		grid-template-columns: 1fr 1fr;
		gap: 12px;
	}
	.chiffre-item__nombre {
		font-size: 1.8rem;
	}
	.agriculture-enjeux {
		grid-template-columns: 1fr;
	}
	.agriculture-actions {
		grid-template-columns: 1fr;
	}
	.agriculture-intro__texte .first-paragraph::first-letter {
		font-size: 2.8rem;
	}
}
</style>