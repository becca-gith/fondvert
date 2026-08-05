<?php
/**
 * Template part : Page "Communiqués officiels" – version dynamique
 * Récupère les communiqués depuis le Custom Post Type "communique"
 *
 * @package TogoGreenFund
 */

// Récupération des communiqués (CPT 'communique')
$args = array(
    'post_type'      => 'communique',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);
$communiques_query = new WP_Query( $args );

$communiques = array();
if ( $communiques_query->have_posts() ) {
    while ( $communiques_query->have_posts() ) {
        $communiques_query->the_post();
        $post_id = get_the_ID();

        // Récupération des métadonnées
        $date_publication = get_post_meta( $post_id, '_fvt_communique_date', true );
        $resume           = get_post_meta( $post_id, '_fvt_communique_resume', true );
        $document_url     = get_post_meta( $post_id, '_fvt_communique_document', true );
        $image_url        = get_the_post_thumbnail_url( $post_id, 'medium' );

        $communiques[] = array(
            'id'              => $post_id,
            'titre'           => get_the_title(),
            'resume'          => $resume ?: wp_trim_words( get_the_content(), 20, '…' ),
            'date_publication'=> $date_publication ?: get_the_date( 'd F Y' ),
            'document_url'    => $document_url ?: '#',
            'image_url'       => $image_url ?: get_template_directory_uri() . '/assets/images/default-communique.jpg',
            'lien'            => get_permalink(),
        );
    }
    wp_reset_postdata();
}

// Récupérer les années disponibles pour le filtre (seulement si des communiqués existent)
$annees = array();
if ( ! empty( $communiques ) ) {
    $annees = array_unique( array_map( function( $item ) {
        return date( 'Y', strtotime( $item['date_publication'] ) );
    }, $communiques ) );
    sort( $annees );
}
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="communiques-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/actualites' ) ); ?>">Actualités</a></li>
				<li class="separator">›</li>
				<li class="current">Communiqués officiels</li>
			</ol>
		</nav>
		<span class="communiques-header__badge"><i class="fas fa-bullhorn"></i> Togo Green Fund</span>
		<h1>Communiqués officiels</h1>
		<div class="title-underline"></div>
		<p class="communiques-header__sub">Retrouvez l'ensemble des communiqués et déclarations officielles du Togo Green Fund.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="communiques-content">
	<div class="container">

		<?php if ( ! empty( $communiques ) ) : ?>

		<!-- ===== BARRE DE FILTRES (par année) ===== -->
		<?php if ( count( $annees ) > 1 ) : ?>
		<div class="communiques-filters">
			<div class="communiques-filters__group">
				<label for="filtrer-annee">Filtrer par année</label>
				<select id="filtrer-annee">
					<option value="tous">Toutes les années</option>
					<?php foreach ( $annees as $annee ) : ?>
						<option value="<?php echo esc_attr( $annee ); ?>"><?php echo esc_html( $annee ); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="communiques-filters__count" id="communiques-count">
				<?php echo count( $communiques ); ?> communiqué(s)
			</div>
		</div>
		<?php endif; ?>

		<!-- ===== GRILLE ===== -->
		<div class="communiques-grid" id="communiques-grid">
			<?php foreach ( $communiques as $communique ) : ?>
				<article class="communique-card" data-annee="<?php echo esc_attr( date( 'Y', strtotime( $communique['date_publication'] ) ) ); ?>">
					<div class="communique-card__image">
						<img src="<?php echo esc_url( $communique['image_url'] ); ?>" alt="<?php echo esc_attr( $communique['titre'] ); ?>" loading="lazy">
					</div>
					<div class="communique-card__content">
						<span class="communique-card__date"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $communique['date_publication'] ); ?></span>
						<h3 class="communique-card__titre">
							<a href="<?php echo esc_url( $communique['lien'] ); ?>"><?php echo esc_html( $communique['titre'] ); ?></a>
						</h3>
						<p class="communique-card__resume"><?php echo esc_html( $communique['resume'] ); ?></p>
						<div class="communique-card__actions">
							<a href="<?php echo esc_url( $communique['lien'] ); ?>" class="communique-card__btn">
								Lire la suite <i class="fas fa-arrow-right"></i>
							</a>
							<?php if ( ! empty( $communique['document_url'] ) && $communique['document_url'] !== '#' ) : ?>
								<a href="<?php echo esc_url( $communique['document_url'] ); ?>" class="communique-card__btn communique-card__btn--download" download>
									<i class="fas fa-download"></i> Télécharger
								</a>
							<?php endif; ?>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- ===== MESSAGE SI AUCUN COMMUNIQUÉ APRÈS FILTRE ===== -->
		<div class="communiques-empty" id="communiques-empty" style="display:none;">
			<i class="fas fa-search"></i>
			<h3>Aucun communiqué trouvé</h3>
			<p>Essayez de modifier votre filtre pour afficher plus de résultats.</p>
		</div>

		<?php else : ?>

		<!-- ===== MESSAGE QUAND AUCUN COMMUNIQUÉ N'EXISTE ===== -->
		<div class="communiques-empty" style="text-align:center; padding:60px 20px;">
			<i class="fas fa-bullhorn" style="font-size:48px; color:#dce8e0; display:block; margin-bottom:16px;"></i>
			<h3 style="font-family:'Playfair Display',serif; color:var(--vert-fvt-fonce); font-size:1.8rem; margin:0 0 10px;">Aucun communiqué</h3>
			<p style="font-family:'Kumbh Sans',sans-serif; color:#5a6a5f; font-size:1rem;">Aucun communiqué officiel n’a encore été publié.</p>
		</div>

		<?php endif; ?>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="communiques-cta">
	<div class="container">
		<h2>Vous souhaitez publier un communiqué ?</h2>
		<div class="cta-divider"></div>
		<p>Contactez notre service de communication pour toute demande.</p>
		<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="cta-btn">
			Nous contacter <i class="fas fa-arrow-right"></i>
		</a>
	</div>
</section>

<!-- ============================================================
     STYLES CSS (intégrés – inchangés)
     ============================================================ -->
<style>
/* ============================================================
   PAGE COMMUNIQUÉS – CHARTE TOGO GREEN FUND
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
.communiques-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.communiques-header::after {
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
.communiques-header__badge {
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
.communiques-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.communiques-header h1 {
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
.communiques-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU ===== */
.communiques-content {
	padding: 50px 0 30px;
	background: #ffffff;
}

/* ===== FILTRES ===== */
.communiques-filters {
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
.communiques-filters__group {
	display: flex;
	align-items: center;
	gap: 16px;
	flex-wrap: wrap;
}
.communiques-filters__group label {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	color: var(--vert-fvt-fonce);
	text-transform: uppercase;
	letter-spacing: 0.3px;
}
.communiques-filters__group select {
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
.communiques-filters__group select:focus {
	border-color: var(--vert-fvt);
	outline: none;
}
.communiques-filters__count {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
}

/* ===== GRILLE ===== */
.communiques-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 30px;
}

/* ===== CARTE ===== */
.communique-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}
.communique-card:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.communique-card__image {
	height: 180px;
	overflow: hidden;
	background: #dce8e0;
}
.communique-card__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.communique-card:hover .communique-card__image img {
	transform: scale(1.05);
}
.communique-card__content {
	padding: 20px 22px 26px;
}
.communique-card__date {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: var(--vert-fvt);
	margin-bottom: 8px;
}
.communique-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.2rem;
	font-weight: 700;
	margin: 0 0 8px;
}
.communique-card__titre a {
	color: var(--vert-fvt-fonce);
	text-decoration: none;
}
.communique-card__titre a:hover {
	color: var(--vert-fvt);
}
.communique-card__resume {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.92rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 16px;
}
.communique-card__actions {
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
}
.communique-card__btn {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	padding: 8px 18px;
	background: var(--vert-fvt);
	color: #fff;
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.85rem;
	text-decoration: none;
	transition: background 0.3s, transform 0.2s;
}
.communique-card__btn:hover {
	background: var(--vert-fvt-fonce);
	transform: translateY(-2px);
}
.communique-card__btn--download {
	background: transparent;
	color: var(--vert-fvt);
	border: 2px solid var(--vert-fvt);
}
.communique-card__btn--download:hover {
	background: var(--vert-fvt);
	color: #fff;
}

/* ===== EMPTY STATE ===== */
.communiques-empty {
	text-align: center;
	padding: 60px 20px;
}
.communiques-empty i {
	font-size: 48px;
	color: #dce8e0;
	display: block;
	margin-bottom: 16px;
}
.communiques-empty h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
.communiques-empty p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1rem;
}

/* ===== CTA ===== */
.communiques-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.communiques-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.communiques-cta h2 {
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
.communiques-cta p {
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
	.communiques-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.communiques-filters {
		flex-direction: column;
		align-items: stretch;
	}
}
@media (max-width: 768px) {
	.communiques-header h1 {
		font-size: 2.4rem;
	}
	.communiques-cta h2 {
		font-size: 1.8rem;
	}
}
@media (max-width: 576px) {
	.communiques-header h1 {
		font-size: 2rem;
	}
	.communiques-header__sub {
		font-size: 1rem;
	}
	.communiques-grid {
		grid-template-columns: 1fr;
	}
}
</style>

<!-- ============================================================
     SCRIPT DE FILTRAGE (par année)
     ============================================================ -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const grid = document.getElementById('communiques-grid');
		const emptyMsg = document.getElementById('communiques-empty');
		const countDisplay = document.getElementById('communiques-count');
		const filtreAnnee = document.getElementById('filtrer-annee');

		// Si le filtre n'existe pas (moins de 2 années), on sort
		if (!filtreAnnee || !grid) return;

		const cards = Array.from(grid.querySelectorAll('.communique-card'));

		function filterCommuniques() {
			const annee = filtreAnnee.value;
			let visibleCount = 0;

			cards.forEach(function(card) {
				const cardAnnee = card.dataset.annee;
				let match = true;
				if (annee !== 'tous' && cardAnnee !== annee) {
					match = false;
				}
				if (match) {
					card.style.display = '';
					visibleCount++;
				} else {
					card.style.display = 'none';
				}
			});

			countDisplay.textContent = visibleCount + ' communiqué(s)';
			if (visibleCount === 0) {
				emptyMsg.style.display = 'block';
			} else {
				emptyMsg.style.display = 'none';
			}
		}

		filtreAnnee.addEventListener('change', filterCommuniques);
		filterCommuniques();
	});
</script>