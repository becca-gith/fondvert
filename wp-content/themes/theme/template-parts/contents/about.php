<?php
/**
 * Template part : Mot du Directeur (dynamique)
 * Récupère les données depuis une page personnalisée "Mot du Directeur" avec ACF
 * Le bouton redirige vers la page "Mot du Directeur" avec le texte "Lire la suite"
 *
 * @package TogoGreenFund
 */

// Récupérer la page "mot-du-directeur" par son slug
$director_page = get_page_by_path( 'mot-du-directeur' );
if ( ! $director_page ) {
	echo '<div class="container" style="padding:60px 0; text-align:center;"><p>Veuillez créer une page avec le slug <strong>mot-du-directeur</strong> et y ajouter les champs ACF.</p></div>';
	return;
}
$page_id = $director_page->ID;

// ----- IMAGE : priorité à la vignette de la page, sinon ACF, sinon fallback -----
$director_image = get_the_post_thumbnail_url( $page_id, 'large' );
if ( ! $director_image ) {
	$director_image = get_field( 'director_image', $page_id ) ? wp_get_attachment_image_url( get_field( 'director_image', $page_id ), 'large' ) : FVT_THEME_URI . '/assets/images/resources/about-4-1.png';
}

// ----- BOUTON : texte et URL fixes -----
$director_btn_text = __( 'Lire la suite', 'alefox' );
$director_btn_url  = get_permalink( $page_id );

// ----- AUTRES CHAMPS ACF avec fallbacks -----
$director_title   = get_field( 'director_title', $page_id ) ?: __( 'Un engagement sincère<br>pour un Togo résil<span>i</span>ent', 'alefox' );
$director_message = get_field( 'director_message', $page_id ) ?: __( 'Le Togo Green Fund du Togo est né d\'une conviction : celle qu\'un développement durable et inclusif est possible pour notre pays. Chaque jour, notre équipe travaille aux côtés des communautés, des porteurs de projets et de nos partenaires pour transformer cette conviction en résultats concrets sur le terrain.', 'alefox' );
$director_quote   = get_field( 'director_quote', $page_id ) ?: __( '« Le Togo Green Fund du Togo n\'est pas seulement un mécanisme de financement : c\'est un pont entre l\'ambition climatique de notre nation et les réalités vécues par nos communautés. »', 'alefox' );
$director_points  = get_field( 'director_points', $page_id ) ?: array(
	__( 'Une gouvernance rigoureuse, au service de la transparence', 'alefox' ),
	__( 'Un accompagnement de proximité pour chaque porteur de projet', 'alefox' ),
	__( 'Un engagement constant envers les générations futures', 'alefox' ),
);
$director_name    = get_field( 'director_name', $page_id ) ?: __( '[Nom du Directeur Général]', 'alefox' );
$director_role    = get_field( 'director_role', $page_id ) ?: __( 'Directeur Général, Togo Green Fund du Togo', 'alefox' );
?>

<style>
	/* =============================================
	   SECTION MOT DU DIRECTEUR – TOGO GREEN FUND
	   ============================================= */

	.director-msg {
		padding: 110px 0 100px;
		position: relative;
		background: #f7fbf8;
		overflow: hidden;
	}
	.director-msg::before {
		content: '';
		position: absolute;
		top: -180px;
		right: -160px;
		width: 480px;
		height: 480px;
		border-radius: 50%;
		background: radial-gradient(circle at 30% 30%, rgba(10,110,62,0.08), transparent 70%);
		pointer-events: none;
	}
	.director-msg::after {
		content: '';
		position: absolute;
		left: -120px;
		bottom: -120px;
		width: 320px;
		height: 320px;
		border-radius: 50%;
		background: radial-gradient(circle at 60% 40%, rgba(255,206,0,0.10), transparent 70%);
		pointer-events: none;
	}
	.director-msg__dots {
		position: absolute;
		top: 60px;
		left: 40px;
		width: 90px;
		height: 90px;
		background-image: radial-gradient(rgba(10,110,62,0.18) 1.6px, transparent 1.6px);
		background-size: 14px 14px;
		opacity: 0.6;
		pointer-events: none;
	}

	/* ============ PORTRAIT ============ */
	.director-msg__image {
		position: relative;
		z-index: 1;
	}
	.director-msg__image::before {
		content: '';
		position: absolute;
		top: -18px;
		left: -18px;
		width: 100%;
		height: 100%;
		border: 3px solid #ffce00;
		border-radius: 20px;
		z-index: -1;
	}
	.director-msg__image img {
		width: 100%;
		border-radius: 20px;
		box-shadow: 0 20px 45px rgba(6, 61, 36, 0.18);
	}
	.director-msg__image__quote {
		position: absolute;
		bottom: -26px;
		right: -26px;
		width: 64px;
		height: 64px;
		border-radius: 50%;
		background: #0a6e3e;
		display: flex;
		align-items: center;
		justify-content: center;
		box-shadow: 0 14px 30px rgba(6, 61, 36, 0.3);
		border: 4px solid #f7fbf8;
	}
	.director-msg__image__quote i {
		color: #ffce00;
		font-size: 22px;
	}
	.director-msg__image__ribbon {
		position: absolute;
		top: 22px;
		left: -14px;
		background: #d21034;
		color: #fff;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 11px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: 0.6px;
		padding: 7px 16px 7px 20px;
		border-radius: 0 30px 30px 0;
		box-shadow: 0 8px 18px rgba(210, 16, 52, 0.3);
	}

	.director-msg__content {
		padding-left: 40px;
		position: relative;
		z-index: 1;
	}

	/* En-tête de section */
	.director-msg__tagline {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 13px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: 1.8px;
		color: #d21034;
		margin-bottom: 16px;
	}
	.director-msg__tagline::before {
		content: '';
		width: 28px;
		height: 2px;
		background: #d21034;
		display: inline-block;
	}
	.director-msg__tagline::after {
		content: '';
		width: 6px;
		height: 6px;
		border-radius: 50%;
		background: #ffce00;
		display: inline-block;
	}

	.director-msg__title {
		font-family: 'Playfair Display', serif;
		font-size: 38px;
		font-weight: 700;
		color: #063d24;
		line-height: 1.25;
		margin: 0 0 22px;
	}
	.director-msg__title span { color: #0a6e3e; font-style: italic; }

	.director-msg__text {
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 16px;
		line-height: 1.8;
		color: #5a6a5f;
		margin-bottom: 28px;
	}

	.director-msg__quote {
		font-family: 'Playfair Display', serif;
		font-size: 19px;
		font-style: italic;
		color: #063d24;
		line-height: 1.55;
		padding: 26px 30px 24px;
		background: #ffffff;
		border-left: 4px solid #ffce00;
		border-radius: 4px 16px 16px 4px;
		box-shadow: 0 12px 30px rgba(6, 61, 36, 0.08);
		margin-bottom: 28px;
		position: relative;
	}
	.director-msg__quote::before {
		content: '\201C';
		position: absolute;
		top: -18px;
		left: 20px;
		font-family: Georgia, serif;
		font-size: 76px;
		font-style: normal;
		line-height: 1;
		color: #ffce00;
		opacity: 0.55;
	}

	.director-msg__list {
		list-style: none;
		padding: 0;
		margin: 0 0 32px;
	}
	.director-msg__list li {
		display: flex;
		align-items: flex-start;
		gap: 14px;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 15px;
		font-weight: 500;
		color: #14261a;
		margin-bottom: 14px;
	}
	.director-msg__list li .director-msg__list__icon {
		flex-shrink: 0;
		width: 26px;
		height: 26px;
		border-radius: 50%;
		background: rgba(10,110,62,0.10);
		display: inline-flex;
		align-items: center;
		justify-content: center;
		margin-top: 1px;
	}
	.director-msg__list li .director-msg__list__icon i {
		color: #0a6e3e;
		font-size: 12px;
	}

	/* Bloc signature */
	.director-msg__signature {
		display: flex;
		align-items: center;
		gap: 18px;
		margin-bottom: 32px;
		padding-top: 24px;
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
		gap: 10px;
		justify-content: center;
		padding: 15px 32px 15px 36px;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 14.5px;
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
	.director-msg .alefox-btn::after {
		content: '\f061';
		font-family: 'Font Awesome 5 Free';
		font-weight: 900;
		font-size: 12px;
		transition: transform .3s ease;
	}
	.director-msg .alefox-btn:hover {
		background: #ffce00;
		border-color: #ffce00;
		color: #063d24;
		transform: translateY(-3px);
		box-shadow: 0 14px 32px rgba(255, 206, 0, 0.38);
	}
	.director-msg .alefox-btn:hover::after {
		transform: translateX(4px);
	}

	/* Responsive */
	@media (max-width: 992px) {
		.director-msg__content { padding-left: 0; margin-top: 50px; }
		.director-msg__title { font-size: 30px; }
	}
	@media (max-width: 576px) {
		.director-msg { padding: 60px 0 50px; }
		.director-msg__title { font-size: 25px; }
		.director-msg__quote { font-size: 16px; padding: 22px 20px 20px; }
		.director-msg__image { margin-bottom: 10px; }
		.director-msg__image::before { top: -12px; left: -12px; }
	}
</style>

<!-- =============================================
     SECTION MOT DU DIRECTEUR
     ============================================= -->
<section class="director-msg">
	<div class="director-msg__dots"></div>
	<div class="container">
		<div class="row align-items-center">

			<!-- Portrait -->
			<div class="col-lg-5">
				<div class="director-msg__image wow fadeInLeft" data-wow-delay="200ms">
					<span class="director-msg__image__ribbon"><?php esc_html_e( 'Direction Générale', 'alefox' ); ?></span>
					<img src="<?php echo esc_url( $director_image ); ?>" alt="<?php echo esc_attr( $director_name ); ?>">
					<div class="director-msg__image__quote">
						<i class="fas fa-quote-right" aria-hidden="true"></i>
					</div>
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
						<?php echo esc_html( $director_quote ); ?>
					</div>

					<ul class="director-msg__list">
						<?php foreach ( $director_points as $point ) : ?>
							<li>
								<span class="director-msg__list__icon"><i class="fas fa-check" aria-hidden="true"></i></span>
								<?php echo esc_html( $point ); ?>
							</li>
						<?php endforeach; ?>
					</ul>

					<div class="director-msg__signature">
						<div class="director-msg__signature__mark"></div>
						<div>
							<p class="director-msg__signature__name"><?php echo esc_html( $director_name ); ?></p>
							<p class="director-msg__signature__role"><?php echo esc_html( $director_role ); ?></p>
						</div>
					</div>

					<!-- Bouton modifié : texte et URL fixes -->
					<a href="<?php echo esc_url( $director_btn_url ); ?>" class="alefox-btn">
						<?php echo esc_html( $director_btn_text ); ?>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- fin mot-du-directeur -->