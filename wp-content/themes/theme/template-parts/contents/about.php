<?php
/**
 * Template part : Mot du Directeur (page d'accueil / page Gouvernance)
 * Togo Green Fund du Togo
 *
 * @package Togo Green Fund
 */

// Données statiques (remplaçables par ACF ultérieurement)
$director_image     = FVT_THEME_URI . '/assets/images/resources/about-4-1.jpg'; // portrait du directeur
//$director_shape     = FVT_THEME_URI . '/assets/images/resources/about-3-shape-1.png';
//$director_signature = FVT_THEME_URI . '/assets/images/shapes/about-3-brand.png'; // remplacer par une image de signature scannée si disponible

$director_title   = __( 'Un engagement sincère<br>pour un Togo résil<span>i</span>ent', 'alefox' );
$director_message = __( 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.', 'alefox' );
$director_quote    = __( '« Le Togo Green Fund du Togo n\'est pas seulement un mécanisme de financement : c\'est un pont entre l\'ambition climatique de notre nation et les réalités vécues par nos communautés. »', 'alefox' );
$director_points   = array(
	__( 'Une gouvernance rigoureuse, au service de la transparence', 'alefox' ),
	__( 'Un accompagnement de proximité pour chaque porteur de projet', 'alefox' ),
	__( 'Un engagement constant envers les générations futures', 'alefox' ),
);

// À remplacer par le vrai nom et la fonction exacte du signataire.
$director_name = __( '[Nom du Directeur Général]', 'alefox' );
$director_role = __( 'Directeur Général, Togo Green Fund du Togo', 'alefox' );

$director_btn_text = __( 'Découvrir notre gouvernance', 'alefox' );
$director_btn_url  = function_exists( 'fvt_page_url' ) ? fvt_page_url( 'gouvernance' ) : '#';
?>

<style>
	/* =============================================
	   SECTION MOT DU DIRECTEUR – Togo Green Fund TOGO
	   ============================================= */

	.director-msg {
		padding: 100px 0 90px;
		position: relative;
		background: #f7fbf8;
		overflow: hidden;
	}
	.director-msg__shape {
		position: absolute;
		top: 0;
		right: 0;
		width: 200px;
		height: 200px;
		background-size: contain;
		background-repeat: no-repeat;
		opacity: 0.06;
		pointer-events: none;
	}

	.director-msg__image {
		position: relative;
	}
	.director-msg__image img {
		width: 100%;
		border-radius: 20px;
		box-shadow: 0 15px 40px rgba(6, 61, 36, 0.12);
	}
	.director-msg__image__badge {
		position: absolute;
		bottom: -20px;
		right: -20px;
		background: #fff;
		padding: 14px 22px;
		border-radius: 12px;
		box-shadow: 0 8px 25px rgba(0,0,0,0.08);
		text-align: center;
	}
	.director-msg__image__badge img {
		max-height: 40px;
		width: auto;
		border-radius: 0;
		box-shadow: none;
		margin-bottom: 4px;
	}
	.director-msg__image__badge span {
		display: block;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 11px;
		font-weight: 700;
		color: #0a6e3e;
		text-transform: uppercase;
		letter-spacing: 0.5px;
	}

	.director-msg__content {
		padding-left: 30px;
	}

	/* En-tête de section */
	.director-msg__tagline {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 14px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: 1.5px;
		color: #d21034;
		margin-bottom: 15px;
	}
	.director-msg__tagline::before,
	.director-msg__tagline::after {
		content: '';
		width: 24px;
		height: 2px;
		background: #d21034;
		display: inline-block;
	}

	.director-msg__title {
		font-family: 'Playfair Display', serif;
		font-size: 36px;
		font-weight: 700;
		color: #063d24;
		line-height: 1.25;
		margin: 0 0 20px;
	}
	.director-msg__title span { color: #0a6e3e; }

	.director-msg__text {
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 16px;
		line-height: 1.75;
		color: #5a6a5f;
		margin-bottom: 25px;
	}

	.director-msg__quote {
		font-family: 'Playfair Display', serif;
		font-size: 19px;
		font-style: italic;
		color: #0a6e3e;
		line-height: 1.5;
		padding: 20px 25px;
		background: rgba(10,110,62,0.05);
		border-left: 4px solid #ffce00;
		border-radius: 8px;
		margin-bottom: 25px;
		position: relative;
	}
	.director-msg__quote i {
		display: block;
		font-size: 26px;
		color: #ffce00;
		margin-bottom: 8px;
	}

	.director-msg__list {
		list-style: none;
		padding: 0;
		margin: 0 0 30px;
	}
	.director-msg__list li {
		display: flex;
		align-items: flex-start;
		gap: 12px;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 15px;
		font-weight: 400;
		color: #14261a;
		margin-bottom: 10px;
	}
	.director-msg__list li i {
		color: #0a6e3e;
		font-size: 16px;
		flex-shrink: 0;
		margin-top: 3px;
	}

	/* Bloc signature */
	.director-msg__signature {
		display: flex;
		align-items: center;
		gap: 18px;
		margin-bottom: 30px;
		padding-top: 20px;
		border-top: 1px solid rgba(10, 110, 62, 0.15);
	}
	.director-msg__signature__name {
		font-family: 'Playfair Display', serif;
		font-size: 19px;
		font-weight: 700;
		color: #063d24;
		margin: 0;
	}
	.director-msg__signature__role {
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 13.5px;
		color: #5a6a5f;
		margin: 2px 0 0;
	}
	.director-msg__signature__mark {
		width: 4px;
		align-self: stretch;
		background: linear-gradient(180deg, #0a6e3e, #ffce00, #d21034);
		border-radius: 2px;
		flex-shrink: 0;
	}

	/* Bouton */
	.director-msg .alefox-btn {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		padding: 14px 34px;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 15px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: 0.8px;
		border-radius: 50px;
		border: 2px solid #0a6e3e;
		background: #0a6e3e;
		color: #fff;
		transition: all 0.3s ease;
		text-decoration: none;
	}
	.director-msg .alefox-btn:hover {
		background: #ffce00;
		border-color: #ffce00;
		color: #063d24;
		transform: translateY(-3px);
		box-shadow: 0 12px 30px rgba(255, 206, 0, 0.35);
	}

	/* Responsive */
	@media (max-width: 992px) {
		.director-msg__content { padding-left: 0; margin-top: 30px; }
		.director-msg__title { font-size: 30px; }
	}
	@media (max-width: 576px) {
		.director-msg { padding: 60px 0 40px; }
		.director-msg__title { font-size: 26px; }
		.director-msg__quote { font-size: 16px; padding: 15px; }
	}
</style>

<!-- =============================================
     SECTION MOT DU DIRECTEUR
     ============================================= -->
<section class="director-msg">
	<div class="director-msg__shape" style="background-image: url(<?php echo esc_url( $director_shape ); ?>);"></div>
	<div class="container">
		<div class="row align-items-center">

			<!-- Portrait -->
			<div class="col-lg-5">
				<div class="director-msg__image wow fadeInLeft" data-wow-delay="200ms">
					<img src="<?php echo esc_url( $director_image ); ?>" alt="<?php echo esc_attr( $director_name ); ?>">
					<!-- <div class="director-msg__image__badge">
						<img src="<?php echo esc_url( $director_signature ); ?>" alt="<?php esc_attr_e( 'Signature', 'alefox' ); ?>">
						<span><?php esc_html_e( 'Togo Green Fund Togo', 'alefox' ); ?></span>
					</div> -->
				</div>
			</div>

			<!-- Contenu -->
			<div class="col-lg-7 wow fadeInRight" data-wow-delay="300ms">
				<div class="director-msg__content">

					<h6 class="director-msg__tagline">
						<?php esc_html_e( 'Mot du Directeur', 'alefox' ); ?>
					</h6>

					<h3 class="director-msg__title">
						<?php echo wp_kses_post( $director_title ); ?>
					</h3>

					<p class="director-msg__text">
						<?php echo esc_html( $director_message ); ?>
					</p>

					<div class="director-msg__quote">
						<i class="fas fa-quote-left" aria-hidden="true"></i>
						<?php echo esc_html( $director_quote ); ?>
					</div>

					<ul class="director-msg__list">
						<?php foreach ( $director_points as $point ) : ?>
							<li><i class="fas fa-check-circle" aria-hidden="true"></i> <?php echo esc_html( $point ); ?></li>
						<?php endforeach; ?>
					</ul>

					<div class="director-msg__signature">
						<div class="director-msg__signature__mark"></div>
						<div>
							<p class="director-msg__signature__name"><?php echo esc_html( $director_name ); ?></p>
							<p class="director-msg__signature__role"><?php echo esc_html( $director_role ); ?></p>
						</div>
					</div>

					<a href="<?php echo esc_url( $director_btn_url ); ?>" class="alefox-btn">
						<?php echo esc_html( $director_btn_text ); ?>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- fin mot-du-directeur -->