<?php
/**
 * Template part : Page "Équipe" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Données des membres de l'équipe
$equipe = array(
	// Direction générale
	'direction' => array(
		'titre' => 'Direction Générale',
		'membres' => array(
			array(
				'nom'         => 'Dr. Komi AGBOKLI',
				'fonction'    => 'Directeur Général',
				'photo'       => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&h=200&fit=crop&crop=face',
				'description' => 'Expert en finance climatique, avec plus de 20 ans d\'expérience dans les politiques de développement durable.',
				'social'      => array(
					'linkedin' => '#',
					'twitter'  => '#',
				),
			),
			array(
				'nom'         => 'Mme Afi DOSSOU',
				'fonction'    => 'Directrice Générale Adjointe',
				'photo'       => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&h=200&fit=crop&crop=face',
				'description' => 'Spécialiste en gestion de projets et en suivi-évaluation, elle pilote les opérations terrain.',
				'social'      => array(
					'linkedin' => '#',
					'twitter'  => '#',
				),
			),
		),
	),
	// Comité de gestion
	'comite' => array(
		'titre' => 'Comité de Gestion',
		'membres' => array(
			array(
				'nom'         => 'M. Tétévi KPODZRO',
				'fonction'    => 'Président du Comité',
				'photo'       => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&crop=face',
				'description' => 'Expert en gouvernance et en gestion des fonds, il assure la supervision stratégique.',
				'social'      => array(
					'linkedin' => '#',
					'twitter'  => '#',
				),
			),
			array(
				'nom'         => 'Mme Yawa AMEGNON',
				'fonction'    => 'Secrétaire du Comité',
				'photo'       => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200&h=200&fit=crop&crop=face',
				'description' => 'Juriste et spécialiste en conformité, elle veille à la transparence des processus.',
				'social'      => array(
					'linkedin' => '#',
					'twitter'  => '#',
				),
			),
		),
	),
	// Directions techniques
	'directions' => array(
		'titre' => 'Directions Techniques',
		'membres' => array(
			array(
				'nom'         => 'M. Yao KOUASSI',
				'fonction'    => 'Directeur des Opérations',
				'photo'       => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&h=200&fit=crop&crop=face',
				'description' => 'Ingénieur agronome, il coordonne les projets sur le terrain et les partenariats techniques.',
				'social'      => array(
					'linkedin' => '#',
					'twitter'  => '#',
				),
			),
			array(
				'nom'         => 'M. Koffi AHOUNOU',
				'fonction'    => 'Directeur du Suivi-Évaluation',
				'photo'       => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop&crop=face',
				'description' => 'Statisticien, il assure le suivi des indicateurs de performance et l\'évaluation d\'impact.',
				'social'      => array(
					'linkedin' => '#',
					'twitter'  => '#',
				),
			),
			array(
				'nom'         => 'Mme Grace AMEWO',
				'fonction'    => 'Directrice Administrative et Financière',
				'photo'       => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=200&h=200&fit=crop&crop=face',
				'description' => 'Experte en finances publiques, elle gère le budget, la comptabilité et les ressources humaines.',
				'social'      => array(
					'linkedin' => '#',
					'twitter'  => '#',
				),
			),
			array(
				'nom'         => 'M. Komlan ADJOVI',
				'fonction'    => 'Directeur des Partenariats et Mobilisation',
				'photo'       => 'https://images.unsplash.com/photo-1566492031773-4f4e44671857?w=200&h=200&fit=crop&crop=face',
				'description' => 'Spécialiste en communication et mobilisation des ressources, il développe les partenariats.',
				'social'      => array(
					'linkedin' => '#',
					'twitter'  => '#',
				),
			),
		),
	),
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="equipe-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/a-propos' ) ); ?>">À propos</a></li>
				<li class="separator">›</li>
				<li class="current">Équipe</li>
			</ol>
		</nav>

		<span class="equipe-header__badge"><i class="fas fa-users"></i> Fonds Vert Togo</span>
		<h1>Notre Équipe</h1>
		<div class="title-underline"></div>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="equipe-content">
	<div class="container">
		<div class="equipe-card">
			<div class="equipe-texte">
				<p class="first-paragraph">
					Le Fonds Vert du Togo s'appuie sur une équipe pluridisciplinaire et engagée, composée de professionnels expérimentés dans les domaines du climat, de la finance, de l'agriculture et de la gouvernance.
				</p>
				<p>
					Chaque membre apporte son expertise pour garantir la mise en œuvre efficace des projets, la transparence dans la gestion des ressources et l'impact durable des actions menées.
				</p>
			</div>
		</div>

		<!-- ===== MEMBRES DE L'ÉQUIPE ===== -->
		<?php foreach ( $equipe as $section ) : ?>
			<div class="equipe-section">
				<h2 class="equipe-section__title"><?php echo esc_html( $section['titre'] ); ?></h2>
				<div class="equipe-grid">
					<?php foreach ( $section['membres'] as $membre ) : ?>
						<div class="equipe-card-member">
							<div class="equipe-card-member__photo">
								<img src="<?php echo esc_url( $membre['photo'] ); ?>" alt="<?php echo esc_attr( $membre['nom'] ); ?>" loading="lazy">
							</div>
							<div class="equipe-card-member__content">
								<h3 class="equipe-card-member__nom"><?php echo esc_html( $membre['nom'] ); ?></h3>
								<p class="equipe-card-member__fonction"><?php echo esc_html( $membre['fonction'] ); ?></p>
								<p class="equipe-card-member__desc"><?php echo esc_html( $membre['description'] ); ?></p>
								<?php if ( ! empty( $membre['social'] ) ) : ?>
									<div class="equipe-card-member__social">
										<?php if ( ! empty( $membre['social']['linkedin'] ) ) : ?>
											<a href="<?php echo esc_url( $membre['social']['linkedin'] ); ?>" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
										<?php endif; ?>
										<?php if ( ! empty( $membre['social']['twitter'] ) ) : ?>
											<a href="<?php echo esc_url( $membre['social']['twitter'] ); ?>" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="equipe-cta">
	<div class="container">
		<h2>Vous souhaitez rejoindre l'équipe du Fonds Vert ?</h2>
		<div class="cta-divider"></div>
		<p>Consultez nos offres d'emploi et devenez acteur du changement climatique au Togo.</p>
		<a href="<?php echo esc_url( home_url( '/carrieres' ) ); ?>" class="cta-btn">
			Voir les offres <i class="fas fa-arrow-right"></i>
		</a>
	</div>
</section>

<!-- ============================================================
     STYLES CSS (intégrés)
     ============================================================ -->
<style>
/* ============================================================
   PAGE ÉQUIPE – CHARTE FONDS VERT TOGO
   ============================================================ */
:root {
	--vert-fvt:        #0a6e3e;
	--vert-fvt-fonce:  #063d24;
	--jaune-fvt:       #FFCE00;
	--rouge-fvt:       #D21034;
	--gris-fond:       #f6faf7;
	--blanc:           #ffffff;
}

/* ===== EN‑TÊTE : breadcrumb et titre ===== */
.equipe-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.equipe-header::after {
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
.equipe-header__badge {
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
.equipe-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.equipe-header h1 {
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

/* ===== CONTENU PRINCIPAL ===== */
.equipe-content {
	padding: 70px 0 20px;
	background: #ffffff;
}
.equipe-card {
	max-width: 960px;
	margin: 0 auto;
	background: #fff;
	border-radius: 32px;
	box-shadow: 0 20px 35px -10px rgba(6,61,36,0.08);
	padding: 55px 50px;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
	border: 1px solid rgba(6,61,36,0.05);
}
.equipe-card:hover {
	transform: translateY(-5px);
	box-shadow: 0 30px 45px -12px rgba(6,61,36,0.15);
}
.equipe-texte {
	font-family: 'Kumbh Sans', sans-serif;
	color: #2c3e34;
	font-size: 1.08rem;
	line-height: 1.9;
	text-align: justify;
	text-justify: inter-word;
	hyphens: auto;
}
.equipe-texte .first-paragraph {
	font-size: 1.12rem;
	font-weight: 500;
	color: var(--vert-fvt-fonce);
}
.equipe-texte .first-paragraph::first-letter {
	font-size: 3.8rem;
	font-weight: 800;
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt);
	float: left;
	line-height: 0.75;
	margin-right: 14px;
	margin-top: 6px;
}
.equipe-texte p {
	margin-bottom: 1.5rem;
}

/* ===== SECTIONS DE L'ÉQUIPE ===== */
.equipe-section {
	margin-top: 60px;
}
.equipe-section__title {
	font-family: 'Playfair Display', serif;
	font-size: 2rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	text-align: center;
	margin-bottom: 40px;
	position: relative;
}
.equipe-section__title::after {
	content: '';
	display: block;
	width: 60px;
	height: 3px;
	background: linear-gradient(90deg, var(--jaune-fvt), var(--vert-fvt));
	margin: 12px auto 0;
	border-radius: 4px;
}

/* ===== GRILLE DES MEMBRES ===== */
.equipe-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 28px;
}

/* ===== CARTE MEMBRE ===== */
.equipe-card-member {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
	text-align: center;
}
.equipe-card-member:hover {
	transform: translateY(-8px);
	box-shadow: 0 16px 32px rgba(6,61,36,0.10);
	border-color: rgba(10,110,62,0.3);
}
.equipe-card-member__photo {
	width: 100%;
	height: 220px;
	overflow: hidden;
	background: #dce8e0;
}
.equipe-card-member__photo img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.equipe-card-member:hover .equipe-card-member__photo img {
	transform: scale(1.05);
}
.equipe-card-member__content {
	padding: 22px 20px 26px;
}
.equipe-card-member__nom {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.15rem;
	color: var(--vert-fvt-fonce);
	margin: 0 0 4px;
}
.equipe-card-member__fonction {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	color: var(--vert-fvt);
	margin: 0 0 12px;
}
.equipe-card-member__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.9rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 14px;
}
.equipe-card-member__social {
	display: flex;
	justify-content: center;
	gap: 10px;
}
.equipe-card-member__social a {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 34px;
	height: 34px;
	border-radius: 50%;
	background: #ffffff;
	color: var(--vert-fvt);
	font-size: 14px;
	transition: all 0.3s ease;
	box-shadow: 0 2px 8px rgba(6,61,36,0.06);
	text-decoration: none;
}
.equipe-card-member__social a:hover {
	background: var(--vert-fvt);
	color: #fff;
	transform: translateY(-3px);
	box-shadow: 0 6px 12px rgba(6,61,36,0.15);
}

/* ===== APPEL À L'ACTION ===== */
.equipe-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.equipe-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.equipe-cta h2 {
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
.equipe-cta p {
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
	.equipe-grid {
		grid-template-columns: repeat(2, 1fr);
		gap: 22px;
	}
}
@media (max-width: 768px) {
	.equipe-header h1 {
		font-size: 2.4rem;
	}
	.equipe-card {
		padding: 30px 24px;
		border-radius: 24px;
	}
	.equipe-texte .first-paragraph::first-letter {
		font-size: 2.8rem;
	}
	.equipe-cta h2 {
		font-size: 1.8rem;
	}
	.breadcrumb-wrapper ol {
		font-size: 0.85rem;
		padding: 8px 16px;
		gap: 8px;
	}
}
@media (max-width: 576px) {
	.equipe-header h1 {
		font-size: 2rem;
	}
	.equipe-card {
		padding: 22px 16px;
	}
	.equipe-texte {
		font-size: 1rem;
	}
	.equipe-grid {
		grid-template-columns: 1fr;
		gap: 18px;
	}
	.equipe-section__title {
		font-size: 1.6rem;
	}
}
</style>