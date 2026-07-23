<?php
/**
 * Template part : Nos projets
 * Togo Green Fund du Togo
 *
 * @package FondsVertTogo
 */

$projects = array(
	array(
		'image'    => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=600&h=400&fit=crop&crop=center',
		'title'    => __( 'Agriculture résiliente au climat', 'alefox' ),
		'excerpt'  => __( 'Soutien à 500 agriculteurs pour l\'adoption de pratiques agricoles durables et résilientes face aux changements climatiques.', 'alefox' ),
		'location' => __( 'Région des Savanes', 'alefox' ),
		'status'   => 'en-cours',
		'link'     => '#',
	),
	array(
		'image'    => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=600&h=400&fit=crop&crop=center',
		'title'    => __( 'Énergie solaire pour les communautés rurales', 'alefox' ),
		'excerpt'  => __( 'Installation de panneaux solaires dans 20 villages pour fournir de l\'électricité propre et durable.', 'alefox' ),
		'location' => __( 'Région Maritime', 'alefox' ),
		'status'   => 'termine',
		'link'     => '#',
	),
	array(
		'image'    => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=600&h=400&fit=crop&crop=center',
		'title'    => __( 'Gestion durable des forêts', 'alefox' ),
		'excerpt'  => __( 'Projet de reboisement et de gestion participative des forêts communautaires pour lutter contre la déforestation.', 'alefox' ),
		'location' => __( 'Région des Plateaux', 'alefox' ),
		'status'   => 'en-cours',
		'link'     => '#',
	),
	
	
);
?>

<style>
	/* ============================================================
	   SECTION PROJETS – FOND ÉLÉGANT
	   ============================================================ */
	.fvt-projects {
		padding: 80px 0 70px;
		background: #f4f9f6;
		position: relative;
		overflow: hidden;
	}
	.fvt-projects::before {
		content: '';
		position: absolute;
		top: -120px;
		right: -120px;
		width: 400px;
		height: 400px;
		border-radius: 50%;
		background: radial-gradient(circle, rgba(10,110,62,0.08) 0%, rgba(10,110,62,0) 70%);
		pointer-events: none;
	}
	.fvt-projects::after {
		content: '';
		position: absolute;
		bottom: -80px;
		left: -80px;
		width: 300px;
		height: 300px;
		border-radius: 50%;
		background: radial-gradient(circle, rgba(255,206,0,0.06) 0%, rgba(255,206,0,0) 70%);
		pointer-events: none;
	}

	/* ===== STATUT ===== */
	.fvt-project-status {
		position: absolute;
		top: 16px;
		right: 16px;
		padding: 4px 14px;
		border-radius: 20px;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 11px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: 0.5px;
		backdrop-filter: blur(4px);
		z-index: 2;
	}
	.fvt-project-status--en-cours {
		background: rgba(10,110,62,0.85);
		color: #fff;
	}
	.fvt-project-status--termine {
		background: rgba(210,16,52,0.85);
		color: #fff;
	}
	.fvt-project-status--bientot {
		background: rgba(255,206,0,0.85);
		color: #063d24;
	}

	/* ===== LOCALISATION ===== */
	.fvt-project-location {
		display: inline-flex;
		align-items: center;
		gap: 6px;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 13px;
		font-weight: 500;
		color: #0a6e3e;
		margin-bottom: 6px;
	}
	.fvt-project-location i {
		font-size: 14px;
		color: #ffce00;
	}

	/* ===== CARTE ===== */
	.blog-card {
		position: relative;
		background: #fff;
		border-radius: 16px;
		overflow: hidden;
		box-shadow: 0 4px 20px rgba(6, 61, 36, 0.06);
		transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.4s ease;
		height: 100%;
	}
	.blog-card:hover {
		transform: translateY(-10px);
		box-shadow: 0 20px 50px rgba(6, 61, 36, 0.14);
	}
	.blog-card__image {
		position: relative;
		overflow: hidden;
		height: 230px;
		background: #dce8e0; /* couleur de fond pendant le chargement */
	}
	.blog-card__image img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: transform 0.6s ease;
		display: block;
		loading: eager; /* on force le chargement immédiat */
	}
	.blog-card:hover .blog-card__image img {
		transform: scale(1.08);
	}
	.blog-card__content {
		padding: 22px 24px 28px;
		position: relative;
	}
	.blog-card__title {
		font-family: 'Playfair Display', serif;
		font-size: 20px;
		font-weight: 700;
		margin: 0 0 8px;
		line-height: 1.3;
	}
	.blog-card__title a {
		color: #063d24;
		text-decoration: none;
		transition: color 0.3s;
	}
	.blog-card__title a:hover {
		color: #0a6e3e;
	}
	.blog-card__text {
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 14px;
		line-height: 1.7;
		color: #5a6a5f;
		margin: 0 0 18px;
	}
	.blog-card__link {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		font-family: 'Kumbh Sans', sans-serif;
		font-weight: 700;
		font-size: 14px;
		color: #0a6e3e;
		text-decoration: none;
		padding: 8px 0;
		border-bottom: 2px solid transparent;
		transition: all 0.3s ease;
	}
	.blog-card__link i {
		font-size: 13px;
		transition: transform 0.3s;
	}
	.blog-card__link:hover {
		color: #d21034;
		border-bottom-color: #d21034;
		gap: 14px;
	}
	.blog-card__link:hover i {
		transform: translateX(4px);
	}
	.blog-card__meta {
		display: none;
	}

	/* Bande décorative en bas de la carte */
	.blog-card::after {
		content: '';
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		height: 4px;
		background: linear-gradient(90deg, #0a6e3e 0%, #ffce00 50%, #d21034 100%);
		transform: scaleX(0);
		transform-origin: left;
		transition: transform 0.5s ease;
	}
	.blog-card:hover::after {
		transform: scaleX(1);
	}

	/* ===== TITRES SECTION ===== */
	.sec-title__tagline {
		display: inline-block;
		color: #d21034;
		font-weight: 700;
		font-size: 14px;
		letter-spacing: 2px;
		text-transform: uppercase;
		background: rgba(210,16,52,0.08);
		padding: 4px 18px;
		border-radius: 30px;
		margin-bottom: 12px;
	}
	.sec-title__title {
		font-family: 'Playfair Display', serif;
		font-size: 36px;
		font-weight: 700;
		color: #063d24;
		margin: 0;
	}
	.sec-title__sub {
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 16px;
		color: #5a6a5f;
		max-width: 600px;
		margin: 10px auto 0;
	}

	/* Force l'affichage du carrousel dès le départ */
	.blog-one__carousel .owl-stage-outer {
		overflow: visible;
	}
	.blog-one__carousel .owl-item {
		opacity: 1 !important;
		visibility: visible !important;
	}

	@media (max-width: 576px) {
		.sec-title__title {
			font-size: 28px;
		}
		.blog-card__title {
			font-size: 18px;
		}
	}
</style>

<section class="fvt-projects blog-one">
	<div class="container">
		<div class="sec-title text-center">
			<h6 class="sec-title__tagline bw-split-in-right">
				<span class="sec-title__tagline__left-leaf" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/shapes/leaf.png' ); ?>);"></span>
				<?php esc_html_e( 'Nos projets', 'alefox' ); ?>
				<span class="sec-title__tagline__right-leaf" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/shapes/leaf.png' ); ?>);"></span>
			</h6>
			<h3 class="sec-title__title bw-split-in-left">
				<?php esc_html_e( 'Projets financés par le Togo Green Fund', 'alefox' ); ?>
			</h3>
			<p class="sec-title__sub">
				<?php esc_html_e( 'Découvrez les initiatives que nous soutenons pour un Togo plus résilient et durable.', 'alefox' ); ?>
			</p>
		</div>

		<div class="blog-one__carousel alefox-owl__carousel alefox-owl__carousel--with-shadow alefox-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": false,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"icofont-bubble-left\"></span>","<span class=\"icofont-bubble-righ\"></span>"],
			"dots": false,
			"autoplay": false,
			"responsive": {
				"0": { "items": 1 },
				"768": { "items": 2 },
				"992": { "items": 3 }
			}
		}'>

			<?php foreach ( $projects as $index => $project ) : 
				$status_label = '';
				$status_class = '';
				switch ( $project['status'] ) {
					case 'en-cours':
						$status_label = __( 'En cours', 'alefox' );
						$status_class = 'fvt-project-status--en-cours';
						break;
					case 'termine':
						$status_label = __( 'Terminé', 'alefox' );
						$status_class = 'fvt-project-status--termine';
						break;
					case 'bientot':
						$status_label = __( 'À venir', 'alefox' );
						$status_class = 'fvt-project-status--bientot';
						break;
					default:
						$status_label = '';
						$status_class = '';
				}
			?>
				<div class="item">
					<div class="blog-card wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="<?php echo esc_attr( $index * 100 ); ?>ms">
						<div class="blog-card__image">
							<img src="<?php echo esc_url( $project['image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>" loading="eager">
							<?php if ( ! empty( $status_label ) ) : ?>
								<span class="fvt-project-status <?php echo esc_attr( $status_class ); ?>">
									<?php echo esc_html( $status_label ); ?>
								</span>
							<?php endif; ?>
							<a href="<?php echo esc_url( $project['link'] ); ?>" class="blog-card__image__link">
								<span class="sr-only"><?php echo esc_html( $project['title'] ); ?></span>
							</a>
						</div>
						<div class="blog-card__content">
							<?php if ( ! empty( $project['location'] ) ) : ?>
								<div class="fvt-project-location">
									<i class="fas fa-map-marker-alt" aria-hidden="true"></i>
									<?php echo esc_html( $project['location'] ); ?>
								</div>
							<?php endif; ?>
							<h3 class="blog-card__title">
								<a href="<?php echo esc_url( $project['link'] ); ?>"><?php echo esc_html( $project['title'] ); ?></a>
							</h3>
							<p class="blog-card__text">
								<?php echo esc_html( $project['excerpt'] ); ?>
							</p>
							<a href="<?php echo esc_url( $project['link'] ); ?>" class="blog-card__link">
								<?php esc_html_e( 'Voir le projet', 'alefox' ); ?>
								<i class="fas fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
</section>