<?php
/**
 * Template part : Page "Infos" – dynamique
 * Affiche les articles du blog WordPress (post_type = 'post')
 *
 * @package TogoGreenFund
 */

// Paramètres de la requête
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 9,
    'post_status'    => 'publish',
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

// Filtre par catégorie (optionnel)
$cat_slug = isset( $_GET['categorie'] ) ? sanitize_text_field( $_GET['categorie'] ) : '';
if ( ! empty( $cat_slug ) ) {
    $args['category_name'] = $cat_slug;
}

$infos_query = new WP_Query( $args );
$infos = array();
if ( $infos_query->have_posts() ) {
    while ( $infos_query->have_posts() ) {
        $infos_query->the_post();
        $categories = get_the_category();
        $cat_names = array();
        foreach ( $categories as $cat ) {
            $cat_names[] = $cat->name;
        }
        $infos[] = array(
            'id'          => get_the_ID(),
            'titre'       => get_the_title(),
            'extrait'     => has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 20, '…' ),
            'date'        => get_the_date( 'd F Y' ),
            'image_url'   => get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ?: get_template_directory_uri() . '/assets/images/default-info.jpg',
            'lien'        => get_permalink(),
            'categories'  => $cat_names,
        );
    }
    wp_reset_postdata();
}

// Récupérer toutes les catégories pour le filtre
$categories_list = get_categories( array( 'hide_empty' => true ) );
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="infos-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li class="current">Infos</li>
			</ol>
		</nav>
		<span class="infos-header__badge"><i class="fas fa-newspaper"></i> Togo Green Fund</span>
		<h1>Infos & Actualités</h1>
		<div class="title-underline"></div>
		<p class="infos-header__sub">Retrouvez toutes les informations et actualités du Togo Green Fund.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="infos-content">
	<div class="container">

		<!-- ===== BARRE DE FILTRES (par catégorie) ===== -->
		<?php if ( ! empty( $categories_list ) ) : ?>
		<div class="infos-filters">
			<div class="infos-filters__group">
				<label for="filtrer-categorie">Filtrer par catégorie</label>
				<select id="filtrer-categorie" onchange="window.location.href=this.value;">
					<option value="<?php echo esc_url( get_permalink() ); ?>">Toutes les catégories</option>
					<?php foreach ( $categories_list as $cat ) : ?>
						<option value="<?php echo esc_url( add_query_arg( 'categorie', $cat->slug, get_permalink() ) ); ?>" <?php selected( $cat_slug, $cat->slug ); ?>>
							<?php echo esc_html( $cat->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="infos-filters__count" id="infos-count">
				<?php echo $infos_query->found_posts; ?> article(s)
			</div>
		</div>
		<?php endif; ?>

		<?php if ( $infos_query->have_posts() ) : ?>

		<!-- ===== GRILLE ===== -->
		<div class="infos-grid" id="infos-grid">
			<?php foreach ( $infos as $info ) : ?>
				<article class="info-card">
					<div class="info-card__image">
						<img src="<?php echo esc_url( $info['image_url'] ); ?>" alt="<?php echo esc_attr( $info['titre'] ); ?>" loading="lazy">
					</div>
					<div class="info-card__content">
						<span class="info-card__date"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $info['date'] ); ?></span>
						<?php if ( ! empty( $info['categories'] ) ) : ?>
							<span class="info-card__categories">
								<?php echo esc_html( implode( ', ', $info['categories'] ) ); ?>
							</span>
						<?php endif; ?>
						<h3 class="info-card__titre">
							<a href="<?php echo esc_url( $info['lien'] ); ?>"><?php echo esc_html( $info['titre'] ); ?></a>
						</h3>
						<p class="info-card__extrait"><?php echo esc_html( $info['extrait'] ); ?></p>
						<a href="<?php echo esc_url( $info['lien'] ); ?>" class="info-card__btn">
							Lire la suite <i class="fas fa-arrow-right"></i>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- ===== PAGINATION ===== -->
		<div class="infos-pagination">
			<?php
			echo paginate_links( array(
				'total'     => $infos_query->max_num_pages,
				'current'   => max( 1, $paged ),
				'mid_size'  => 2,
				'prev_text' => '<i class="fas fa-chevron-left"></i> Précédent',
				'next_text' => 'Suivant <i class="fas fa-chevron-right"></i>',
			) );
			?>
		</div>

		<?php else : ?>

		<!-- ===== MESSAGE QUAND AUCUN ARTICLE ===== -->
		<div class="infos-empty">
			<i class="fas fa-newspaper"></i>
			<h3>Aucun article</h3>
			<p>Aucune information n’a encore été publiée.</p>
		</div>

		<?php endif; ?>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="infos-cta">
	<div class="container">
		<h2>Vous souhaitez partager une information ?</h2>
		<div class="cta-divider"></div>
		<p>Contactez notre équipe communication pour toute demande.</p>
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
   PAGE INFOS – CHARTE TOGO GREEN FUND
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
.infos-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.infos-header::after {
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
.infos-header__badge {
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
.infos-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.infos-header h1 {
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
.infos-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU ===== */
.infos-content {
	padding: 50px 0 30px;
	background: #ffffff;
}

/* ===== FILTRES ===== */
.infos-filters {
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
.infos-filters__group {
	display: flex;
	align-items: center;
	gap: 16px;
	flex-wrap: wrap;
}
.infos-filters__group label {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	color: var(--vert-fvt-fonce);
	text-transform: uppercase;
	letter-spacing: 0.3px;
}
.infos-filters__group select {
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
.infos-filters__group select:focus {
	border-color: var(--vert-fvt);
	outline: none;
}
.infos-filters__count {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
}

/* ===== GRILLE ===== */
.infos-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 30px;
}

/* ===== CARTE ===== */
.info-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}
.info-card:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.info-card__image {
	height: 180px;
	overflow: hidden;
	background: #dce8e0;
}
.info-card__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.info-card:hover .info-card__image img {
	transform: scale(1.05);
}
.info-card__content {
	padding: 20px 22px 26px;
}
.info-card__date {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: var(--vert-fvt);
	margin-bottom: 4px;
}
.info-card__categories {
	display: inline-block;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.75rem;
	color: #7a8a7f;
	background: rgba(10,110,62,0.08);
	padding: 2px 10px;
	border-radius: 20px;
	margin-bottom: 8px;
}
.info-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.2rem;
	font-weight: 700;
	margin: 0 0 8px;
}
.info-card__titre a {
	color: var(--vert-fvt-fonce);
	text-decoration: none;
}
.info-card__titre a:hover {
	color: var(--vert-fvt);
}
.info-card__extrait {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.92rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 16px;
}
.info-card__btn {
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
.info-card__btn:hover {
	background: var(--vert-fvt-fonce);
	transform: translateY(-2px);
}

/* ===== PAGINATION ===== */
.infos-pagination {
	margin: 40px 0 20px;
	text-align: center;
}
.infos-pagination .page-numbers {
	display: inline-block;
	padding: 8px 16px;
	margin: 0 4px;
	border-radius: 8px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.95rem;
	color: var(--vert-fvt);
	background: transparent;
	text-decoration: none;
	transition: all 0.3s;
}
.infos-pagination .page-numbers.current {
	background: var(--vert-fvt);
	color: #fff;
}
.infos-pagination .page-numbers:hover:not(.current) {
	background: var(--gris-fond);
}

/* ===== EMPTY STATE ===== */
.infos-empty {
	text-align: center;
	padding: 60px 20px;
}
.infos-empty i {
	font-size: 48px;
	color: #dce8e0;
	display: block;
	margin-bottom: 16px;
}
.infos-empty h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
.infos-empty p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1rem;
}

/* ===== CTA ===== */
.infos-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.infos-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.infos-cta h2 {
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
.infos-cta p {
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
	.infos-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.infos-filters {
		flex-direction: column;
		align-items: stretch;
	}
}
@media (max-width: 768px) {
	.infos-header h1 {
		font-size: 2.4rem;
	}
	.infos-cta h2 {
		font-size: 1.8rem;
	}
}
@media (max-width: 576px) {
	.infos-header h1 {
		font-size: 2rem;
	}
	.infos-header__sub {
		font-size: 1rem;
	}
	.infos-grid {
		grid-template-columns: 1fr;
	}
}
</style>