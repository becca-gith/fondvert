<?php
/**
 * Template part : Page "Événements" – dynamique
 * Récupère les événements depuis le Custom Post Type "evenement"
 *
 * @package TogoGreenFund
 */

// Récupération des événements (CPT 'evenement')
$args = array(
    'post_type'      => 'evenement',
    'posts_per_page' => 9,
    'post_status'    => 'publish',
    'orderby'        => 'meta_value',
    'meta_key'       => '_fvt_evenement_date',
    'order'          => 'ASC',
    'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
);

// Filtre par type d'événement (optionnel)
$type_slug = isset( $_GET['type'] ) ? sanitize_text_field( $_GET['type'] ) : '';
if ( ! empty( $type_slug ) ) {
    $args['meta_query'][] = array(
        'key'   => '_fvt_evenement_type',
        'value' => $type_slug,
    );
}

$evenements_query = new WP_Query( $args );

$evenements = array();
if ( $evenements_query->have_posts() ) {
    while ( $evenements_query->have_posts() ) {
        $evenements_query->the_post();
        $post_id = get_the_ID();

        $date_evenement = get_post_meta( $post_id, '_fvt_evenement_date', true );
        $lieu           = get_post_meta( $post_id, '_fvt_evenement_lieu', true );
        $type           = get_post_meta( $post_id, '_fvt_evenement_type', true );
        $image_url      = get_the_post_thumbnail_url( $post_id, 'medium' );

        $evenements[] = array(
            'id'        => $post_id,
            'titre'     => get_the_title(),
            'date'      => $date_evenement ?: get_the_date( 'd F Y' ),
            'lieu'      => $lieu ?: 'Lieu à définir',
            'type'      => $type ?: 'Événement',
            'extrait'   => has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 20, '…' ),
            'image_url' => $image_url ?: get_template_directory_uri() . '/assets/images/default-evenement.jpg',
            'lien'      => get_permalink(),
        );
    }
    wp_reset_postdata();
}

// Récupérer les types d'événements distincts pour le filtre
$types_list = array();
if ( ! empty( $evenements ) ) {
    $types = array_unique( array_column( $evenements, 'type' ) );
    foreach ( $types as $t ) {
        $types_list[] = array(
            'slug' => sanitize_title( $t ),
            'name' => $t,
        );
    }
}
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="evenements-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li class="current">Événements</li>
			</ol>
		</nav>
		<span class="evenements-header__badge"><i class="fas fa-calendar-alt"></i> Togo Green Fund</span>
		<h1>Événements</h1>
		<div class="title-underline"></div>
		<p class="evenements-header__sub">Retrouvez tous les événements organisés ou soutenus par le Togo Green Fund.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="evenements-content">
	<div class="container">

		<?php if ( ! empty( $evenements ) ) : ?>

		<!-- ===== BARRE DE FILTRES (par type) ===== -->
		<?php if ( count( $types_list ) > 1 ) : ?>
		<div class="evenements-filters">
			<div class="evenements-filters__group">
				<label for="filtrer-type">Filtrer par type</label>
				<select id="filtrer-type" onchange="window.location.href=this.value;">
					<option value="<?php echo esc_url( get_permalink() ); ?>">Tous les types</option>
					<?php foreach ( $types_list as $type ) : ?>
						<option value="<?php echo esc_url( add_query_arg( 'type', $type['slug'], get_permalink() ) ); ?>" <?php selected( $type_slug, $type['slug'] ); ?>>
							<?php echo esc_html( $type['name'] ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="evenements-filters__count">
				<?php echo $evenements_query->found_posts; ?> événement(s)
			</div>
		</div>
		<?php endif; ?>

		<!-- ===== GRILLE ===== -->
		<div class="evenements-grid">
			<?php foreach ( $evenements as $evenement ) : ?>
				<article class="evenement-card">
					<div class="evenement-card__image">
						<img src="<?php echo esc_url( $evenement['image_url'] ); ?>" alt="<?php echo esc_attr( $evenement['titre'] ); ?>" loading="lazy">
					</div>
					<div class="evenement-card__content">
						<div class="evenement-card__meta">
							<span class="evenement-card__date"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $evenement['date'] ); ?></span>
							<span class="evenement-card__lieu"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $evenement['lieu'] ); ?></span>
						</div>
						<h3 class="evenement-card__titre">
							<a href="<?php echo esc_url( $evenement['lien'] ); ?>"><?php echo esc_html( $evenement['titre'] ); ?></a>
						</h3>
						<p class="evenement-card__extrait"><?php echo esc_html( $evenement['extrait'] ); ?></p>
						<a href="<?php echo esc_url( $evenement['lien'] ); ?>" class="evenement-card__btn">
							En savoir plus <i class="fas fa-arrow-right"></i>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- ===== PAGINATION ===== -->
		<div class="evenements-pagination">
			<?php
			echo paginate_links( array(
				'total'     => $evenements_query->max_num_pages,
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'mid_size'  => 2,
				'prev_text' => '<i class="fas fa-chevron-left"></i> Précédent',
				'next_text' => 'Suivant <i class="fas fa-chevron-right"></i>',
			) );
			?>
		</div>

		<?php else : ?>

		<!-- ===== MESSAGE QUAND AUCUN ÉVÉNEMENT ===== -->
		<div class="evenements-empty">
			<i class="fas fa-calendar-times"></i>
			<h3>Aucun événement</h3>
			<p>Aucun événement à venir ou passé n’a encore été publié.</p>
		</div>

		<?php endif; ?>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="evenements-cta">
	<div class="container">
		<h2>Vous organisez un événement ?</h2>
		<div class="cta-divider"></div>
		<p>Contactez-nous pour faire connaître votre événement en lien avec le climat.</p>
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
   PAGE ÉVÉNEMENTS – CHARTE TOGO GREEN FUND
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
.evenements-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.evenements-header::after {
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
.evenements-header__badge {
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
.evenements-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.evenements-header h1 {
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
.evenements-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU ===== */
.evenements-content {
	padding: 50px 0 30px;
	background: #ffffff;
}

/* ===== FILTRES ===== */
.evenements-filters {
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
.evenements-filters__group {
	display: flex;
	align-items: center;
	gap: 16px;
	flex-wrap: wrap;
}
.evenements-filters__group label {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	color: var(--vert-fvt-fonce);
	text-transform: uppercase;
	letter-spacing: 0.3px;
}
.evenements-filters__group select {
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
.evenements-filters__group select:focus {
	border-color: var(--vert-fvt);
	outline: none;
}
.evenements-filters__count {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
}

/* ===== GRILLE ===== */
.evenements-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 30px;
}

/* ===== CARTE ===== */
.evenement-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}
.evenement-card:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.evenement-card__image {
	height: 180px;
	overflow: hidden;
	background: #dce8e0;
}
.evenement-card__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.evenement-card:hover .evenement-card__image img {
	transform: scale(1.05);
}
.evenement-card__content {
	padding: 20px 22px 26px;
}
.evenement-card__meta {
	display: flex;
	flex-wrap: wrap;
	gap: 12px 16px;
	margin-bottom: 8px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: var(--vert-fvt);
}
.evenement-card__meta i {
	margin-right: 4px;
}
.evenement-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.2rem;
	font-weight: 700;
	margin: 0 0 8px;
}
.evenement-card__titre a {
	color: var(--vert-fvt-fonce);
	text-decoration: none;
}
.evenement-card__titre a:hover {
	color: var(--vert-fvt);
}
.evenement-card__extrait {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.92rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 16px;
}
.evenement-card__btn {
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
.evenement-card__btn:hover {
	background: var(--vert-fvt-fonce);
	transform: translateY(-2px);
}

/* ===== PAGINATION ===== */
.evenements-pagination {
	margin: 40px 0 20px;
	text-align: center;
}
.evenements-pagination .page-numbers {
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
.evenements-pagination .page-numbers.current {
	background: var(--vert-fvt);
	color: #fff;
}
.evenements-pagination .page-numbers:hover:not(.current) {
	background: var(--gris-fond);
}

/* ===== EMPTY STATE ===== */
.evenements-empty {
	text-align: center;
	padding: 60px 20px;
}
.evenements-empty i {
	font-size: 48px;
	color: #dce8e0;
	display: block;
	margin-bottom: 16px;
}
.evenements-empty h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
.evenements-empty p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1rem;
}

/* ===== CTA ===== */
.evenements-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.evenements-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.evenements-cta h2 {
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
.evenements-cta p {
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
	.evenements-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.evenements-filters {
		flex-direction: column;
		align-items: stretch;
	}
}
@media (max-width: 768px) {
	.evenements-header h1 {
		font-size: 2.4rem;
	}
	.evenements-cta h2 {
		font-size: 1.8rem;
	}
}
@media (max-width: 576px) {
	.evenements-header h1 {
		font-size: 2rem;
	}
	.evenements-header__sub {
		font-size: 1rem;
	}
	.evenements-grid {
		grid-template-columns: 1fr;
	}
}
</style>