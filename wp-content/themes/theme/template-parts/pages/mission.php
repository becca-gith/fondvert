<?php
/**
 * Template part : Page "Mission" – version simple
 * Affiche le contenu exact de la page WordPress (slug 'mission')
 *
 * @package TogoGreenFund
 */

// Récupérer la page "mission"
$mission_page = get_page_by_path( 'mission' );
if ( ! $mission_page ) {
	echo '<div class="container" style="padding: 80px 0; text-align: center;"><p>Aucune page "Mission" trouvée. Veuillez créer une page avec le slug <strong>mission</strong>.</p></div>';
	return;
}

$page_title   = get_the_title( $mission_page );
$page_content = apply_filters( 'the_content', get_post_field( 'post_content', $mission_page ) );
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="mission-header">
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

		<span class="mission-header__badge"><i class="fas fa-seedling"></i> Togo Green Fund</span>
		<h1><?php echo esc_html( $page_title ); ?></h1>
		<div class="title-underline"></div>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="mission-content">
	<div class="container">
		<div class="mission-card">
			<div class="mission-texte">
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
	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION (optionnel – peut être supprimé si non souhaité)
     ============================================================ -->
<section class="mission-cta">
	<div class="container">
		<h2>Vous portez un projet climatique ?</h2>
		<div class="cta-divider"></div>
		<p>Rejoignez les acteurs qui construisent, avec le Togo Green Fund, un avenir résilient et durable.</p>
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
   PAGE MISSION – CHARTE Togo Green Fund
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
.mission-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}

/* Bande décorative en bas (dégradé aux couleurs du Togo) */
.mission-header::after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	height: 4px;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}

/* Breadcrumb */
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

/* Badge et titre */
.mission-header__badge {
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
.mission-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.mission-header h1 {
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
.mission-content {
	padding: 70px 0 40px;
	background: #ffffff;
}
.mission-card {
	max-width: 960px;
	margin: 0 auto;
	background: #fff;
	border-radius: 32px;
	box-shadow: 0 20px 35px -10px rgba(6,61,36,0.08);
	padding: 55px 50px;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
	border: 1px solid rgba(6,61,36,0.05);
}
.mission-card:hover {
	transform: translateY(-5px);
	box-shadow: 0 30px 45px -12px rgba(6,61,36,0.15);
}

/* Typographie du contenu */
.mission-texte {
	font-family: 'Kumbh Sans', sans-serif;
	color: #2c3e34;
	font-size: 1.08rem;
	line-height: 1.9;
	text-align: justify;
	text-justify: inter-word;
	hyphens: auto;
}
.mission-texte h1,
.mission-texte h2,
.mission-texte h3 {
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin-top: 2rem;
	margin-bottom: 1rem;
}
.mission-texte h2 {
	font-size: 1.9rem;
	border-left: 4px solid var(--jaune-fvt);
	padding-left: 22px;
	text-align: left;
}
.mission-texte h3 {
	font-size: 1.5rem;
}
.mission-texte p {
	margin-bottom: 1.5rem;
}
.mission-texte .first-paragraph {
	font-size: 1.12rem;
	font-weight: 500;
	color: var(--vert-fvt-fonce);
}
.mission-texte .first-paragraph::first-letter {
	font-size: 3.8rem;
	font-weight: 800;
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt);
	float: left;
	line-height: 0.75;
	margin-right: 14px;
	margin-top: 6px;
}
.mission-texte ul,
.mission-texte ol {
	margin-left: 1.8rem;
	margin-bottom: 1.5rem;
}
.mission-texte li {
	margin-bottom: 0.7rem;
}
.mission-texte strong {
	color: var(--vert-fvt);
	font-weight: 700;
}
.mission-texte img {
	border-radius: 24px;
	margin: 1.8rem 0;
	max-width: 100%;
	height: auto;
	box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

/* ===== APPEL À L'ACTION ===== */
.mission-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 30px;
	position: relative;
	overflow: hidden;
}
.mission-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.mission-cta h2 {
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
.mission-cta p {
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
	.mission-header h1 {
		font-size: 2.4rem;
	}
	.mission-card {
		padding: 30px 24px;
		border-radius: 24px;
	}
	.mission-texte h2 {
		font-size: 1.5rem;
		padding-left: 14px;
	}
	.mission-texte .first-paragraph::first-letter {
		font-size: 2.8rem;
	}
	.mission-cta h2 {
		font-size: 1.8rem;
	}
	.breadcrumb-wrapper ol {
		font-size: 0.85rem;
		padding: 8px 16px;
		gap: 8px;
	}
}
@media (max-width: 576px) {
	.mission-header h1 {
		font-size: 2rem;
	}
	.mission-card {
		padding: 22px 16px;
	}
	.mission-texte {
		font-size: 1rem;
	}
}
</style>