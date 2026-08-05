<?php
/**
 * Template part : Page "Médiathèque" – version dynamique corrigée
 * Récupère les médias depuis le Custom Post Type "media"
 *
 * @package TogoGreenFund
 */

// ---------- FONCTION DE CONVERSION YOUTUBE ----------
function fvt_convert_youtube_url( $url ) {
    // Si c'est déjà une URL embed, on la retourne
    if ( strpos( $url, 'youtube.com/embed' ) !== false ) {
        return $url;
    }
    // Extraire l'ID vidéo depuis une URL standard
    parse_str( parse_url( $url, PHP_URL_QUERY ), $query );
    if ( isset( $query['v'] ) ) {
        return 'https://www.youtube.com/embed/' . $query['v'];
    }
    // Fallback : retourner l'URL inchangée
    return $url;
}
// ----------------------------------------------------

// Récupération des médias (CPT 'media')
$medias_query = new WP_Query( array(
    'post_type'      => 'media',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

// Construction du tableau des médias
$medias = array();
if ( $medias_query->have_posts() ) {
    while ( $medias_query->have_posts() ) {
        $medias_query->the_post();
        $post_id = get_the_ID();
        
        // Récupération des métadonnées
        $type       = get_post_meta( $post_id, '_fvt_media_type', true );
        $format     = get_post_meta( $post_id, '_fvt_media_format', true );
        $date       = get_post_meta( $post_id, '_fvt_media_date', true ) ?: get_the_date( 'd F Y' );
        $url        = get_post_meta( $post_id, '_fvt_media_url', true ) ?: '#';
        $mini_url   = get_post_meta( $post_id, '_fvt_media_mini', true );
        $desc       = get_post_meta( $post_id, '_fvt_media_description', true );
        
        // ---- CONVERSION YOUTUBE (si vidéo) ----
        if ( $type === 'video' ) {
            $url = fvt_convert_youtube_url( $url );
        }
        // ---- FIN CONVERSION ----
        
        // Fallback pour la miniature
        if ( empty( $mini_url ) ) {
            if ( $type === 'video' ) {
                // Extraire l'ID YouTube pour la miniature
                preg_match( '/embed\/([^?]+)/', $url, $matches );
                $video_id = $matches[1] ?? 'dQw4w9WgXcQ';
                $mini_url = 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';
            } else {
                $mini_url = 'https://via.placeholder.com/300x200/e8f5ec/0a6e3e?text=' . ucfirst( $type );
            }
        }
        
        $medias[] = array(
            'id'     => $post_id,
            'titre'  => get_the_title(),
            'type'   => $type,
            'format' => $format ?: ( $type === 'photo' ? 'jpg' : ( $type === 'video' ? 'youtube' : 'pdf' ) ),
            'date'   => $date,
            'url'    => $url,   // URL maintenant convertie
            'mini'   => $mini_url,
            'desc'   => $desc ?: '',
        );
    }
    wp_reset_postdata();
}

// Fallback si aucun média n'est trouvé
if ( empty( $medias ) ) {
    $medias = array(
        // Photos
        array(
            'id'     => 1,
            'titre'  => 'Agriculture résiliente dans les Savanes',
            'type'   => 'photo',
            'format' => 'jpg',
            'date'   => '15 janvier 2025',
            'url'    => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=600&h=400&fit=crop',
            'mini'   => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=300&h=200&fit=crop',
            'desc'   => 'Visite de terrain dans la région des Savanes pour le projet agricole.',
        ),
        array(
            'id'     => 2,
            'titre'  => 'Panneaux solaires installés',
            'type'   => 'photo',
            'format' => 'jpg',
            'date'   => '12 février 2025',
            'url'    => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=600&h=400&fit=crop',
            'mini'   => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=300&h=200&fit=crop',
            'desc'   => 'Installation de panneaux solaires dans un village de la région Maritime.',
        ),
        array(
            'id'     => 3,
            'titre'  => 'Atelier de formation des agriculteurs',
            'type'   => 'photo',
            'format' => 'jpg',
            'date'   => '20 mars 2025',
            'url'    => 'https://images.unsplash.com/photo-1544552861-1f2c946a75f4?w=600&h=400&fit=crop',
            'mini'   => 'https://images.unsplash.com/photo-1544552861-1f2c946a75f4?w=300&h=200&fit=crop',
            'desc'   => 'Formation sur les techniques agricoles durables.',
        ),
        // Vidéos (avec URLs à convertir)
        array(
            'id'     => 5,
            'titre'  => 'Présentation du Togo Green Fund du Togo',
            'type'   => 'video',
            'format' => 'youtube',
            'date'   => '8 janvier 2025',
            'url'    => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // URL standard
            'mini'   => 'https://img.youtube.com/vi/dQw4w9WgXcq/hqdefault.jpg',
            'desc'   => 'Vidéo institutionnelle présentant la mission et les actions du Togo Green Fund.',
        ),
        // Documents
        array(
            'id'     => 7,
            'titre'  => 'Brochure institutionnelle',
            'type'   => 'document',
            'format' => 'pdf',
            'date'   => '15 décembre 2024',
            'url'    => '#',
            'mini'   => 'https://via.placeholder.com/300x200/e8f5ec/0a6e3e?text=PDF',
            'desc'   => 'Présentation du Togo Green Fund (PDF, 3.2 Mo)',
        ),
    );
    // Convertir aussi les fallbacks si nécessaire
    foreach ( $medias as &$media ) {
        if ( $media['type'] === 'video' ) {
            $media['url'] = fvt_convert_youtube_url( $media['url'] );
        }
    }
}

// Types pour le filtre
$types_medias = array(
    'tous'    => 'Tous',
    'photo'   => 'Photos',
    'video'   => 'Vidéos',
    'document' => 'Documents',
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE (inchangé)
     ============================================================ -->
<section class="mediatheque-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/ressources' ) ); ?>">Ressources</a></li>
				<li class="separator">›</li>
				<li class="current">Médiathèque</li>
			</ol>
		</nav>
		<span class="mediatheque-header__badge"><i class="fas fa-photo-video"></i> Togo Green Fund</span>
		<h1>Médiathèque</h1>
		<div class="title-underline"></div>
		<p class="mediatheque-header__sub">Photos, vidéos et documents – explorez toutes les ressources du Togo Green Fund.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="mediatheque-content">
	<div class="container">

		<!-- ===== BARRE DE FILTRES ===== -->
		<div class="mediatheque-filters">
			<div class="mediatheque-filters__group">
				<label for="filtrer-type">Filtrer par type</label>
				<select id="filtrer-type">
					<?php foreach ( $types_medias as $slug => $label ) : ?>
						<option value="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="mediatheque-filters__count" id="mediatheque-count">
				<?php echo count( $medias ); ?> ressource(s)
			</div>
		</div>

		<!-- ===== GRILLE ===== -->
		<div class="mediatheque-grid" id="mediatheque-grid">
			<?php foreach ( $medias as $media ) : ?>
				<article class="media-card" data-type="<?php echo esc_attr( $media['type'] ); ?>">
					<div class="media-card__image">
						<img src="<?php echo esc_url( $media['mini'] ); ?>" alt="<?php echo esc_attr( $media['titre'] ); ?>" loading="lazy">
						<span class="media-card__type">
							<?php if ( $media['type'] === 'photo' ) : ?>
								<i class="fas fa-camera"></i> Photo
							<?php elseif ( $media['type'] === 'video' ) : ?>
								<i class="fas fa-play-circle"></i> Vidéo
							<?php else : ?>
								<i class="fas fa-file-pdf"></i> Document
							<?php endif; ?>
						</span>
					</div>
					<div class="media-card__content">
						<h3 class="media-card__titre"><?php echo esc_html( $media['titre'] ); ?></h3>
						<p class="media-card__desc"><?php echo esc_html( $media['desc'] ); ?></p>
						<div class="media-card__meta">
							<span class="media-card__date"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $media['date'] ); ?></span>
							<span class="media-card__format"><i class="fas fa-tag"></i> <?php echo esc_html( $media['format'] ); ?></span>
						</div>
						<?php if ( $media['type'] === 'photo' ) : ?>
							<a href="<?php echo esc_url( $media['url'] ); ?>" class="media-card__btn" target="_blank" rel="lightbox">
								<i class="fas fa-eye"></i> Voir
							</a>
						<?php elseif ( $media['type'] === 'video' ) : ?>
							<a href="#" class="media-card__btn media-card__btn--video" data-video="<?php echo esc_url( $media['url'] ); ?>">
								<i class="fas fa-play"></i> Regarder
							</a>
						<?php else : ?>
							<a href="<?php echo esc_url( $media['url'] ); ?>" class="media-card__btn" download>
								<i class="fas fa-download"></i> Télécharger
							</a>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- ===== MESSAGE SI AUCUN MÉDIA ===== -->
		<div class="mediatheque-empty" id="mediatheque-empty" style="display:none;">
			<i class="fas fa-search"></i>
			<h3>Aucune ressource trouvée</h3>
			<p>Essayez de modifier votre filtre pour afficher plus de résultats.</p>
		</div>

	</div>
</section>

<!-- ============================================================
     MODALE VIDÉO (avec attributs allow)
     ============================================================ -->
<div class="video-modal" id="videoModal">
	<div class="video-modal__overlay" id="videoModalOverlay"></div>
	<div class="video-modal__content">
		<button class="video-modal__close" id="videoModalClose">&times;</button>
		<div class="video-modal__embed">
			<iframe id="videoIframe" src="" frameborder="0" 
			        allow="autoplay; encrypted-media; fullscreen" 
			        allowfullscreen></iframe>
		</div>
	</div>
</div>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="mediatheque-cta">
	<div class="container">
		<h2>Vous souhaitez partager des ressources ?</h2>
		<div class="cta-divider"></div>
		<p>Si vous avez des photos, vidéos ou documents à partager, contactez-nous.</p>
		<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="cta-btn">
			Nous contacter <i class="fas fa-arrow-right"></i>
		</a>
	</div>
</section>

<!-- ============================================================
     STYLES CSS (inchangés)
     ============================================================ -->
<style>
/* ============================================================
   PAGE MÉDIATHÈQUE – CHARTE Togo Green Fund TOGO
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
.mediatheque-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.mediatheque-header::after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	height: 4px;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.breadcrumb-wrapper ol {
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 12px;
	list-style: none;
	padding: 0;
	margin: 0 0 18px;
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
.mediatheque-header__badge {
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
.mediatheque-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.mediatheque-header h1 {
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
.mediatheque-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU ===== */
.mediatheque-content {
	padding: 50px 0 30px;
	background: #ffffff;
}

/* ===== FILTRES ===== */
.mediatheque-filters {
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
.mediatheque-filters__group {
	display: flex;
	align-items: center;
	gap: 16px;
	flex-wrap: wrap;
}
.mediatheque-filters__group label {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	color: var(--vert-fvt-fonce);
	text-transform: uppercase;
	letter-spacing: 0.3px;
}
.mediatheque-filters__group select {
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
.mediatheque-filters__group select:focus {
	border-color: var(--vert-fvt);
	outline: none;
}
.mediatheque-filters__count {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
}

/* ===== GRILLE ===== */
.mediatheque-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 30px;
}

/* ===== CARTE ===== */
.media-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}
.media-card:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.media-card__image {
	position: relative;
	height: 200px;
	overflow: hidden;
	background: #dce8e0;
}
.media-card__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.media-card:hover .media-card__image img {
	transform: scale(1.05);
}
.media-card__type {
	position: absolute;
	top: 12px;
	right: 12px;
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
.media-card__type i {
	margin-right: 6px;
}
.media-card__content {
	padding: 18px 20px 24px;
}
.media-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.15rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0 0 6px;
}
.media-card__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.92rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 12px;
}
.media-card__meta {
	display: flex;
	flex-wrap: wrap;
	gap: 14px;
	margin-bottom: 16px;
}
.media-card__date,
.media-card__format {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.8rem;
	color: #7a8a7f;
}
.media-card__date i,
.media-card__format i {
	color: var(--vert-fvt);
	font-size: 0.85rem;
}
.media-card__btn {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	padding: 8px 20px;
	background: var(--vert-fvt);
	color: #fff;
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.9rem;
	text-decoration: none;
	transition: background 0.3s, transform 0.2s;
}
.media-card__btn:hover {
	background: var(--vert-fvt-fonce);
	transform: translateY(-2px);
}

/* ===== EMPTY STATE ===== */
.mediatheque-empty {
	text-align: center;
	padding: 60px 20px;
	display: none;
}
.mediatheque-empty i {
	font-size: 48px;
	color: #dce8e0;
	display: block;
	margin-bottom: 16px;
}
.mediatheque-empty h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
.mediatheque-empty p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1rem;
}

/* ===== MODALE VIDÉO ===== */
.video-modal {
	display: none;
	position: fixed;
	inset: 0;
	z-index: 999;
}
.video-modal.is-open {
	display: block;
}
.video-modal__overlay {
	position: absolute;
	inset: 0;
	background: rgba(0,0,0,0.75);
}
.video-modal__content {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 90%;
	max-width: 800px;
	background: #000;
	border-radius: 16px;
	overflow: hidden;
}
.video-modal__close {
	position: absolute;
	top: 10px;
	right: 16px;
	font-size: 28px;
	color: #fff;
	background: none;
	border: none;
	cursor: pointer;
	z-index: 10;
}
.video-modal__embed {
	position: relative;
	padding-bottom: 56.25%;
	height: 0;
}
.video-modal__embed iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

/* ===== CTA ===== */
.mediatheque-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.mediatheque-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.mediatheque-cta h2 {
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
.mediatheque-cta p {
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
	.mediatheque-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	.mediatheque-filters {
		flex-direction: column;
		align-items: stretch;
	}
}
@media (max-width: 768px) {
	.mediatheque-header h1 {
		font-size: 2.4rem;
	}
	.mediatheque-cta h2 {
		font-size: 1.8rem;
	}
}
@media (max-width: 576px) {
	.mediatheque-header h1 {
		font-size: 2rem;
	}
	.mediatheque-header__sub {
		font-size: 1rem;
	}
	.mediatheque-grid {
		grid-template-columns: 1fr;
	}
}
</style>

<!-- ============================================================
     SCRIPTS (filtrage + modale vidéo corrigée)
     ============================================================ -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const grid = document.getElementById('mediatheque-grid');
		const emptyMsg = document.getElementById('mediatheque-empty');
		const countDisplay = document.getElementById('mediatheque-count');
		const typeSelect = document.getElementById('filtrer-type');

		const cards = Array.from(grid.querySelectorAll('.media-card'));

		function filterMedias() {
			const type = typeSelect.value;
			let visibleCount = 0;

			cards.forEach(function(card) {
				const cardType = card.dataset.type;
				let match = true;
				if (type !== 'tous' && cardType !== type) {
					match = false;
				}
				if (match) {
					card.style.display = '';
					visibleCount++;
				} else {
					card.style.display = 'none';
				}
			});

			countDisplay.textContent = visibleCount + ' ressource(s)';
			if (visibleCount === 0) {
				emptyMsg.style.display = 'block';
			} else {
				emptyMsg.style.display = 'none';
			}
		}

		typeSelect.addEventListener('change', filterMedias);
		filterMedias();

		// ---- MODALE VIDÉO (corrigée) ----
		const modal = document.getElementById('videoModal');
		const overlay = document.getElementById('videoModalOverlay');
		const closeBtn = document.getElementById('videoModalClose');
		const iframe = document.getElementById('videoIframe');

		const videoBtns = document.querySelectorAll('.media-card__btn--video');
		videoBtns.forEach(function(btn) {
			btn.addEventListener('click', function(e) {
				e.preventDefault();
				let videoSrc = this.dataset.video;
				// Si l'URL contient déjà des paramètres, ajouter &autoplay=1, sinon ?autoplay=1
				const separator = videoSrc.includes('?') ? '&' : '?';
				iframe.src = videoSrc + separator + 'autoplay=1&rel=0';
				modal.classList.add('is-open');
				document.body.style.overflow = 'hidden';
			});
		});

		function closeModal() {
			modal.classList.remove('is-open');
			// Arrêter la vidéo en vidant la source
			iframe.src = '';
			document.body.style.overflow = '';
		}

		overlay.addEventListener('click', closeModal);
		closeBtn.addEventListener('click', closeModal);

		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && modal.classList.contains('is-open')) {
				closeModal();
			}
		});
	});
</script>