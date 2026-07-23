<?php
/**
 * Template part pour la page "Champ d'actions" – design harmonisé avec le header Fonds Vert Togo
 * Récupère le contenu de la page dont le slug est 'champ-dactions'
 */

$champ_page = get_page_by_path('champs');
if ( ! $champ_page ) {
	echo '<div class="container" style="padding: 80px 0; text-align: center;"><p>Aucune page "Champ d\'actions" trouvée. Veuillez créer une page avec le slug <strong>champ-dactions</strong>.</p></div>';
	return;
}

$page_title   = get_the_title( $champ_page );
$page_content = apply_filters( 'the_content', get_post_field( 'post_content', $champ_page ) );

// Domaines d'action (statiques ou à récupérer depuis ACF plus tard)
$domaines = array(
	array(
		'icon'  => 'fa-seedling',
		'title' => __( 'Agriculture durable', 'alefox' ),
		'desc'  => __( 'Promotion de pratiques agricoles résilientes et durables pour assurer la sécurité alimentaire.', 'alefox' ),
		'link'  => home_url( '/agriculture-durable' ),
	),
	array(
		'icon'  => 'fa-solar-panel',
		'title' => __( 'Énergies renouvelables', 'alefox' ),
		'desc'  => __( 'Accélération de la transition énergétique via des projets solaires, éoliens et biomasse.', 'alefox' ),
		'link'  => home_url( '/energies-renouvelables' ),
	),
	array(
		'icon'  => 'fa-tree',
		'title' => __( 'Gestion des forêts', 'alefox' ),
		'desc'  => __( 'Protection et restauration des écosystèmes forestiers, reboisement et lutte contre la déforestation.', 'alefox' ),
		'link'  => home_url( '/gestion-forets' ),
	),
	array(
		'icon'  => 'fa-water',
		'title' => __( 'Eau et assainissement', 'alefox' ),
		'desc'  => __( 'Amélioration de l\'accès à l\'eau potable et à l\'assainissement dans les zones rurales.', 'alefox' ),
		'link'  => home_url( '/eau-assainissement' ),
	),
	array(
		'icon'  => 'fa-recycle',
		'title' => __( 'Économie circulaire', 'alefox' ),
		'desc'  => __( 'Soutien à des initiatives de recyclage, de réduction des déchets et de création d\'emplois verts.', 'alefox' ),
		'link'  => home_url( '/economie-circulaire' ),
	),
	array(
		'icon'  => 'fa-umbrella-beach',
		'title' => __( 'Zones côtières', 'alefox' ),
		'desc'  => __( 'Protection des littoraux togolais contre l\'érosion et les inondations.', 'alefox' ),
		'link'  => home_url( '/zones-cotieres' ),
	),
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="champ-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/a-propos' ) ); ?>">À propos</a></li>
				<li class="separator">›</li>
				<li class="current"><?php echo esc_html( $page_title ); ?></li>
			</ol>
		</nav>

		<span class="champ-header__badge"><i class="fas fa-bullseye"></i> Fonds Vert Togo</span>
		<h1><?php echo esc_html( $page_title ); ?></h1>
		<div class="title-underline"></div>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="champ-content">
	<div class="container">
		<div class="champ-card">
			<div class="champ-texte">
				<?php
				// Ajout d'une classe pour la première lettre (drop cap) sur le premier paragraphe
				$content = $page_content;
				if ( preg_match( '/<p>(.*?)<\/p>/', $content, $matches ) ) {
					$first_para = '<p class="first-paragraph">' . $matches[1] . '</p>';
					$content    = preg_replace( '/<p>(.*?)<\/p>/', $first_para, $content, 1 );
				}
				echo $content;
				?>
			</div>
		</div>

		<!-- ===== DOMAINES D'ACTION ===== -->
		<div class="champ-domaines">
			<h2 class="domaines-title"><?php esc_html_e( 'Nos domaines d\'intervention', 'alefox' ); ?></h2>
			<div class="domaines-grid">
				<?php foreach ( $domaines as $domaine ) : ?>
					<div class="domaine-card">
						<div class="domaine-card__icon">
							<i class="fas <?php echo esc_attr( $domaine['icon'] ); ?>" aria-hidden="true"></i>
						</div>
						<h3 class="domaine-card__title"><?php echo esc_html( $domaine['title'] ); ?></h3>
						<p class="domaine-card__desc"><?php echo esc_html( $domaine['desc'] ); ?></p>
						<a href="<?php echo esc_url( $domaine['link'] ); ?>" class="domaine-card__link">
							<?php esc_html_e( 'En savoir plus', 'alefox' ); ?>
							<i class="fas fa-arrow-right" aria-hidden="true"></i>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="champ-cta">
	<div class="container">
		<h2>Vous souhaitez agir avec nous ?</h2>
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
   PAGE CHAMP D'ACTIONS – CHARTE FONDS VERT TOGO
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
.champ-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.champ-header::after {
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
.champ-header__badge {
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
.champ-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.champ-header h1 {
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
.champ-content {
	padding: 70px 0 30px;
	background: #ffffff;
}
.champ-card {
	max-width: 960px;
	margin: 0 auto;
	background: #fff;
	border-radius: 32px;
	box-shadow: 0 20px 35px -10px rgba(6,61,36,0.08);
	padding: 55px 50px;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
	border: 1px solid rgba(6,61,36,0.05);
}
.champ-card:hover {
	transform: translateY(-5px);
	box-shadow: 0 30px 45px -12px rgba(6,61,36,0.15);
}
.champ-texte {
	font-family: 'Kumbh Sans', sans-serif;
	color: #2c3e34;
	font-size: 1.08rem;
	line-height: 1.9;
	text-align: justify;
	text-justify: inter-word;
	hyphens: auto;
}
.champ-texte h1,
.champ-texte h2,
.champ-texte h3 {
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin-top: 2rem;
	margin-bottom: 1rem;
}
.champ-texte h2 {
	font-size: 1.9rem;
	border-left: 4px solid var(--jaune-fvt);
	padding-left: 22px;
	text-align: left;
}
.champ-texte h3 {
	font-size: 1.5rem;
}
.champ-texte p {
	margin-bottom: 1.5rem;
}
.champ-texte .first-paragraph {
	font-size: 1.12rem;
	font-weight: 500;
	color: var(--vert-fvt-fonce);
}
.champ-texte .first-paragraph::first-letter {
	font-size: 3.8rem;
	font-weight: 800;
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt);
	float: left;
	line-height: 0.75;
	margin-right: 14px;
	margin-top: 6px;
}
.champ-texte ul,
.champ-texte ol {
	margin-left: 1.8rem;
	margin-bottom: 1.5rem;
}
.champ-texte li {
	margin-bottom: 0.7rem;
}
.champ-texte strong {
	color: var(--vert-fvt);
	font-weight: 700;
}
.champ-texte img {
	border-radius: 24px;
	margin: 1.8rem 0;
	max-width: 100%;
	height: auto;
	box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

/* ===== DOMAINES D'ACTION ===== */
.champ-domaines {
	max-width: 1100px;
	margin: 60px auto 0;
}
.domaines-title {
	font-family: 'Playfair Display', serif;
	font-size: 2rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	text-align: center;
	margin-bottom: 40px;
	position: relative;
}
.domaines-title::after {
	content: '';
	display: block;
	width: 60px;
	height: 3px;
	background: linear-gradient(90deg, var(--jaune-fvt), var(--vert-fvt));
	margin: 12px auto 0;
	border-radius: 4px;
}
.domaines-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 28px;
}
.domaine-card {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 32px 24px 30px;
	text-align: center;
	transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}
.domaine-card:hover {
	transform: translateY(-8px);
	box-shadow: 0 16px 32px rgba(6,61,36,0.10);
	border-color: rgba(10,110,62,0.3);
}
.domaine-card__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 64px;
	height: 64px;
	border-radius: 50%;
	background: #ffffff;
	color: var(--vert-fvt);
	font-size: 28px;
	box-shadow: 0 6px 16px rgba(6,61,36,0.08);
	margin-bottom: 18px;
	transition: background 0.3s, color 0.3s;
}
.domaine-card:hover .domaine-card__icon {
	background: var(--vert-fvt);
	color: #fff;
}
.domaine-card__title {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.1rem;
	color: var(--vert-fvt-fonce);
	margin: 0 0 10px;
	text-transform: uppercase;
	letter-spacing: 0.5px;
}
.domaine-card__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 18px;
}
.domaine-card__link {
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
.domaine-card__link i {
	font-size: 0.85rem;
	transition: transform 0.3s;
}
.domaine-card__link:hover {
	color: var(--rouge-fvt);
	gap: 12px;
}
.domaine-card__link:hover i {
	transform: translateX(4px);
}

/* ===== APPEL À L'ACTION ===== */
.champ-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.champ-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.champ-cta h2 {
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
.champ-cta p {
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
	.domaines-grid {
		grid-template-columns: repeat(2, 1fr);
		gap: 22px;
	}
}
@media (max-width: 768px) {
	.champ-header h1 {
		font-size: 2.4rem;
	}
	.champ-card {
		padding: 30px 24px;
		border-radius: 24px;
	}
	.champ-texte h2 {
		font-size: 1.5rem;
		padding-left: 14px;
	}
	.champ-texte .first-paragraph::first-letter {
		font-size: 2.8rem;
	}
	.champ-cta h2 {
		font-size: 1.8rem;
	}
	.breadcrumb-wrapper ol {
		font-size: 0.85rem;
		padding: 8px 16px;
		gap: 8px;
	}
}
@media (max-width: 576px) {
	.champ-header h1 {
		font-size: 2rem;
	}
	.champ-card {
		padding: 22px 16px;
	}
	.champ-texte {
		font-size: 1rem;
	}
	.domaines-grid {
		grid-template-columns: 1fr;
		gap: 18px;
	}
	.domaines-title {
		font-size: 1.6rem;
	}
}
</style>