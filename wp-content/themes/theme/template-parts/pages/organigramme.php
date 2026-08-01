<?php
/**
 * Template part : Page "Organigramme" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Structure hiérarchique de l'organigramme

?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="org-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/a-propos' ) ); ?>">À propos</a></li>
				<li class="separator">›</li>
				<li class="current">Organigramme</li>
			</ol>
		</nav>

		<span class="org-header__badge"><i class="fas fa-sitemap"></i> Fonds Vert Togo</span>
		<h1>Organigramme</h1>
		<div class="title-underline"></div>
			<p class="documents-header__sub">
		    Le Fonds Vert du Togo est gouverné par une équipe de direction et des comités spécialisés qui assurent la mise en œuvre, le suivi et la transparence de ses actions.
			L’organigramme ci-dessous présente la structure hiérarchique du Fonds, avec les responsabilités clés pour chaque niveau. Cette organisation garantit une gestion efficace et une prise de décision participative.
			</p>
	</div>
	
			<!--<div class="org-texte">
				<p class="first-paragraph">
					Le Fonds Vert du Togo est gouverné par une équipe de direction et des comités spécialisés qui assurent la mise en œuvre, le suivi et la transparence de ses actions.
				</p>
				<p>
					L’organigramme ci-dessous présente la structure hiérarchique du Fonds, avec les responsabilités clés pour chaque niveau. Cette organisation garantit une gestion efficace et une prise de décision participative.
				</p>
			</div> -->
		
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="org-content">
	<div class="container">
		
		<!-- ===== ORGANIGRAMME VISUEL ===== -->
			<div class="organigramme__image">	
				<img src="http://localhost/fondvert/wp-content/uploads/2026/08/Organigramme_TGF.png" alt="organigramme" loading="lazy">
			</div>
	
	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="org-cta">
	<div class="container">
		<h2>Vous souhaitez rejoindre l'équipe du Fonds Vert ?</h2>
		<div class="cta-divider"></div>
		<p>Consultez nos offres d'emploi et rejoignez une équipe engagée pour le climat au Togo.</p>
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
   PAGE ORGANIGRAMME – CHARTE FONDS VERT TOGO
   ============================================================ */
:root {
	--vert-fvt:        #0a6e3e;
	--vert-fvt-fonce:  #063d24;
	--jaune-fvt:       #FFCE00;
	--rouge-fvt:       #D21034;
	--gris-fond:       #f6faf7;
	--blanc:           #ffffff;
}
/*CSS ORGANIGRAMME*/
.organigramme__image {
    display: flex;
    justify-content: center;
}

.organigramme__image img {
    max-width: 1000px;
    width: 200%;
    height: auto;
}

/* ===== EN‑TÊTE : breadcrumb et titre ===== */
.org-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.org-header::after {
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
.org-header__badge {
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
.org-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.org-header h1 {
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
.org-content {
	padding: 70px 0 30px;
	background: #ffffff;
}
.org-card {
	max-width: 960px;
	margin: 0 auto;
	background: #fff;
	border-radius: 32px;
	box-shadow: 0 20px 35px -10px rgba(6,61,36,0.08);
	padding: 55px 50px;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
	border: 1px solid rgba(6,61,36,0.05);
}
.org-card:hover {
	transform: translateY(-5px);
	box-shadow: 0 30px 45px -12px rgba(6,61,36,0.15);
}
.org-texte {
	font-family: 'Kumbh Sans', sans-serif;
	color: #2c3e34;
	font-size: 1.08rem;
	line-height: 1.9;
	text-align: justify;
	text-justify: inter-word;
	hyphens: auto;
}
.org-texte .first-paragraph {
	font-size: 1.12rem;
	font-weight: 500;
	color: var(--vert-fvt-fonce);
}
.org-texte .first-paragraph::first-letter {
	font-size: 3.8rem;
	font-weight: 800;
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt);
	float: left;
	line-height: 0.75;
	margin-right: 14px;
	margin-top: 6px;
}
.org-texte p {
	margin-bottom: 1.5rem;
}

/* ===== ORGANIGRAMME VISUEL ===== */
.org-tree {
	max-width: 1100px;
	margin: 60px auto 0;
	display: flex;
	flex-direction: column;
	align-items: center;
	gap: 10px;
}

/* Niveaux */
.org-level {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	gap: 30px;
	width: 100%;
}
.org-level--top { margin-bottom: 5px; }
.org-level--second { margin-bottom: 5px; }
.org-level--third { gap: 20px; }

/* Nœuds */
.org-node {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 24px 28px 22px;
	text-align: center;
	transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
	min-width: 180px;
	flex: 1 1 auto;
	max-width: 260px;
}
.org-node:hover {
	transform: translateY(-6px);
	box-shadow: 0 16px 32px rgba(6,61,36,0.10);
	border-color: rgba(10,110,62,0.3);
}

/* Directeur Général */
.org-node--dg {
	background: linear-gradient(135deg, var(--vert-fvt-fonce) 0%, #0a3d28 100%);
	border-color: var(--vert-fvt);
	min-width: 240px;
	max-width: 320px;
}
.org-node--dg .org-node__nom {
	color: #fff;
	font-size: 1.3rem;
}
.org-node--dg .org-node__fonction {
	color: var(--jaune-fvt);
	font-weight: 600;
	font-size: 0.95rem;
}
.org-node--dg .org-node__icon {
	color: var(--jaune-fvt);
	background: rgba(255,255,255,0.12);
	border-color: var(--jaune-fvt);
}

/* Comité de Gestion */
.org-node--comite {
	background: #ffffff;
	border-color: var(--jaune-fvt);
	min-width: 240px;
	max-width: 320px;
}
.org-node--comite .org-node__icon {
	background: rgba(255,206,0,0.15);
	color: var(--jaune-fvt);
}
.org-node--comite .org-node__titre {
	color: var(--vert-fvt-fonce);
	font-size: 1.1rem;
}

/* Directions */
.org-node--direction {
	background: var(--blanc);
	border-color: #e7f0ea;
	min-width: 160px;
	max-width: 220px;
}
.org-node--direction .org-node__icon {
	background: rgba(10,110,62,0.08);
	color: var(--vert-fvt);
}
.org-node--direction .org-node__titre {
	color: var(--vert-fvt-fonce);
	font-size: 1rem;
}

/* Icônes */
.org-node__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 50px;
	height: 50px;
	border-radius: 50%;
	background: #ffffff;
	color: var(--vert-fvt);
	font-size: 22px;
	box-shadow: 0 6px 16px rgba(6,61,36,0.08);
	margin-bottom: 14px;
	border: 2px solid var(--vert-fvt);
}
.org-node__nom,
.org-node__titre {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	margin: 0 0 4px;
}
.org-node__fonction {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.9rem;
	color: #5a6a5f;
	margin: 0;
}
.org-node__membres {
	list-style: none;
	padding: 0;
	margin: 6px 0 0;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: #4d6a59;
}
.org-node__membres li {
	margin-bottom: 4px;
}
.org-node__membres li strong {
	color: var(--vert-fvt-fonce);
}

/* Lignes de connexion */
.org-connectors {
	display: flex;
	justify-content: center;
	gap: 10px;
	width: 100%;
	max-width: 500px;
	margin: 2px 0;
}
.org-connectors span {
	display: block;
	width: 4px;
	height: 30px;
	background: linear-gradient(to bottom, var(--vert-fvt), var(--jaune-fvt));
	border-radius: 2px;
}
.org-connectors--four {
	max-width: 700px;
	gap: 40px;
}
.org-connectors--four span {
	height: 35px;
}

/* ===== APPEL À L'ACTION ===== */
.org-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.org-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.org-cta h2 {
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
.org-cta p {
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
	.org-level--third {
		gap: 16px;
	}
	.org-node--direction {
		min-width: 140px;
		max-width: 200px;
	}
}
@media (max-width: 768px) {
	.org-header h1 {
		font-size: 2.4rem;
	}
	.org-card {
		padding: 30px 24px;
		border-radius: 24px;
	}
	.org-texte .first-paragraph::first-letter {
		font-size: 2.8rem;
	}
	.org-cta h2 {
		font-size: 1.8rem;
	}
	.breadcrumb-wrapper ol {
		font-size: 0.85rem;
		padding: 8px 16px;
		gap: 8px;
	}
	.org-level {
		flex-direction: column;
		align-items: center;
		gap: 16px;
	}
	.org-level--third {
		flex-direction: column;
	}
	.org-node {
		min-width: unset;
		max-width: 320px;
		width: 100%;
	}
	.org-connectors {
		max-width: 100%;
	}
	.org-connectors--four {
		max-width: 100%;
		gap: 20px;
	}
	.org-connectors--four span {
		height: 25px;
	}
	.org-node--dg {
		min-width: unset;
		max-width: 320px;
	}
	.org-node--comite {
		min-width: unset;
		max-width: 320px;
	}
}
@media (max-width: 576px) {
	.org-header h1 {
		font-size: 2rem;
	}
	.org-card {
		padding: 22px 16px;
	}
	.org-texte {
		font-size: 1rem;
	}
	.org-node__nom,
	.org-node__titre {
		font-size: 1rem;
	}
	.org-node--dg .org-node__nom {
		font-size: 1.1rem;
	}
}
</style>