<?php
/**
 * Template part : Slider principal de la page d'accueil
 * Togo Green Fund du Togo
 *
 * @package FondsVertTogo
 */

// Repli sûr : si la page ciblée n'existe pas encore (pas créée dans l'admin),
// on renvoie '#' au lieu d'un href vide.
if ( ! function_exists( 'fvt_page_url' ) ) {
	function fvt_page_url( $slug ) {
		$page = get_page_by_path( $slug );
		if ( ! $page ) {
			return '#';
		}
		$url = get_permalink( $page );
		return $url ? $url : '#';
	}
}

// Contenu des diapositives — à terme, remplacer par un champ ACF Repeater
// ("Diapositives d'accueil") pour que ce soit modifiable depuis l'admin.
$fvt_slides = array(
	array(
		'image'    => FVT_THEME_URI . '/assets/images/backgrounds/slider-4-4.jpg',
		'subtitle' => __( 'Financer la résilience climatique', 'alefox' ),
		'title'    => __( 'Un Togo Green Fund au service<br>d\'un Togo dur<span>a</span>ble', 'alefox' ),
		'text'     => __( 'Le Togo Green Fund du Togo mobilise et canalise des financements climatiques<br>pour soutenir des projets à fort impact environnemental et social.', 'alefox' ),
		'btn_one'  => array(
			'label' => __( 'Découvrir nos projets', 'alefox' ),
			'url'   => fvt_page_url( 'projets-programmes' ),
		),
		'btn_two'  => array(
			'label' => __( 'Soumettre un projet', 'alefox' ),
			'url'   => fvt_page_url( 'appels-a-projets' ),
		),
	),
	array(
		'image'    => FVT_THEME_URI . '/assets/images/backgrounds/slider-4-1.jpg',
		'subtitle' => __( 'Financer la résilience climatique', 'alefox' ),
		'title'    => __( 'Un Togo Green Fund au service<br>d\'un Togo dur<span>a</span>ble', 'alefox' ),
		'text'     => __( 'Le Togo Green Fund du Togo mobilise et canalise des financements climatiques<br>pour soutenir des projets à fort impact environnemental et social.', 'alefox' ),
		'btn_one'  => array(
			'label' => __( 'Découvrir nos projets', 'alefox' ),
			'url'   => fvt_page_url( 'projets-programmes' ),
		),
		'btn_two'  => array(
			'label' => __( 'Soumettre un projet', 'alefox' ),
			'url'   => fvt_page_url( 'appels-a-projets' ),
		),
	),
	array(
		'image'    => FVT_THEME_URI . '/assets/images/backgrounds/slider-4-3.jpg',
		'subtitle' => __( 'Agir pour les communautés togolaises', 'alefox' ),
		'title'    => __( 'Des projets verts, des<br>emplois et une éco<span>n</span>omie durable', 'alefox' ),
		'text'     => __( 'De l\'agriculture résiliente à l\'énergie propre, nous accompagnons<br>les porteurs de projets qui construisent le Togo de demain.', 'alefox' ),
		'btn_one'  => array(
			'label' => __( 'Nos domaines d\'action', 'alefox' ),
			'url'   => fvt_page_url( 'presentation' ),
		),
		'btn_two'  => array(
			'label' => __( 'Nous contacter', 'alefox' ),
			'url'   => fvt_page_url( 'contact' ),
		),
	),
	array(
		'image'    => FVT_THEME_URI . '/assets/images/backgrounds/slider-4-2-1.jpg',
		'subtitle' => __( 'Transparence et gouvernance', 'alefox' ),
		'title'    => __( 'Ensemble pour un<br>avenir clima<span>t</span>ique sûr', 'alefox' ),
		'text'     => __( 'Découvrez notre gouvernance, nos mécanismes de financement<br>et nos rapports d\'activité en toute transparence.', 'alefox' ),
		'btn_one'  => array(
			'label' => __( 'Notre gouvernance', 'alefox' ),
			'url'   => fvt_page_url( 'gouvernance' ),
		),
		'btn_two'  => array(
			'label' => __( 'Publications', 'alefox' ),
			'url'   => fvt_page_url( 'publications' ),
		),
	),
);
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;600;700&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&display=swap" rel="stylesheet">

<style>
	/* ============ FOND & SUPERPOSITION ============ */
	/* alefox.css met un énorme padding-top/bottom sur .main-slider-three__item (315px/220px) :
	   c'est LA vraie cause du slider géant. On l'écrase ici avec !important. */
	.main-slider-three__item {
		position: relative;
		padding-top: 150px !important;
		padding-bottom: 130px !important;
		overflow: hidden;
	}
	.main-slider-three__bg {
		position: absolute;
		inset: 0;
		background-position: center;
		background-size: cover;
		transform: scale(1.06);
		transition: transform 8s ease;
	}
	.owl-item.active .main-slider-three__bg { transform: scale(1); }

	.main-slider-three__bg__color:nth-child(1) { background: linear-gradient(180deg, rgba(4,37,24,0.78) 0%, rgba(6,61,36,0.42) 45%, rgba(4,37,24,0.85) 100%); }
	.main-slider-three__bg__color:nth-child(2) { background: rgba(10, 110, 62, 0.15); }
	.main-slider-three__bg__color:nth-child(3) { background: linear-gradient(120deg, rgba(255,206,0,0.12) 0%, transparent 40%); }
	.main-slider-three__bg__color:nth-child(4) { background: linear-gradient(300deg, rgba(210,16,52,0.14) 0%, transparent 35%); }
	.main-slider-three__bg__color:nth-child(5),
	.main-slider-three__bg__color:nth-child(6) { background: rgba(0,0,0,0.22); }

	/* Liseré tricolore en bas de chaque diapositive */
	.main-slider-three__item::after {
		content: '';
		position: absolute;
		left: 0; right: 0; bottom: 0;
		height: 5px;
		background: linear-gradient(90deg, #0a6e3e 0%, #ffce00 50%, #d21034 100%);
		z-index: 3;
	}

	/* ============ POSITION DU TEXTE ============ */
	.main-slider-three__item .container { height: 100%; }
	.main-slider-three__content {
		position: relative;
		z-index: 3;
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.main-slider-three__shape-one,
	.main-slider-three__shape-two {
		bottom: 20px !important;
		opacity: 0.85;
	}

	/* ============ ANIMATION D'ENTRÉE ============ */
	@keyframes fvtFadeUp {
		from { opacity: 0; transform: translateY(22px); }
		to   { opacity: 1; transform: translateY(0); }
	}
	.owl-item.active .main-slider-three__sub-title  { animation: fvtFadeUp .7s ease .15s both; }
	.owl-item.active .main-slider-three__title      { animation: fvtFadeUp .7s ease .30s both; }
	.owl-item.active .main-slider-three__text        { animation: fvtFadeUp .7s ease .45s both; }
	.owl-item.active .main-slider-three__btn         { animation: fvtFadeUp .7s ease .60s both; }

	/* ============ TYPOGRAPHIE ============ */
	.main-slider-three__sub-title {
		font-family: 'Kumbh Sans', sans-serif !important;
		display: inline-flex;
		align-items: center;
		gap: 8px;
		background: rgba(255, 206, 0, 0.14);
		border: 1px solid rgba(255, 206, 0, 0.5);
		color: #ffce00;
		font-size: 11.5px;
		font-weight: 700;
		letter-spacing: 1.2px;
		text-transform: uppercase;
		padding: 6px 18px;
		border-radius: 30px;
		margin-bottom: 18px;
	}
	.main-slider-three__sub-title::before {
		content: '';
		width: 7px; height: 7px;
		border-radius: 50%;
		background: #ffce00;
		box-shadow: 0 0 0 4px rgba(255, 206, 0, 0.22);
		display: inline-block;
	}

	.main-slider-three__title {
		font-family: 'Playfair Display', serif !important;
		color: #ffffff;
		font-size: 42px !important;
		line-height: 1.28 !important;
		font-weight: 700;
		letter-spacing: 0.2px;
		text-shadow: 0 4px 22px rgba(0,0,0,0.35);
		margin: 0 0 18px !important;
	}
	.main-slider-three__title span {
		color: #ffce00;
		font-style: italic;
	}

	.main-slider-three__text { margin: 0 0 26px !important; }
	.main-slider-three__text__one {
		font-family: 'Kumbh Sans', sans-serif !important;
		color: #eaf5ee;
		font-size: 15px !important;
		line-height: 1.65 !important;
		max-width: 560px;
		margin: 0 auto;
	}

	/* ============ BOUTONS ============ */
	.main-slider-three__btn { display: flex; align-items: center; justify-content: center; gap: 18px; flex-wrap: wrap; }

	.main-slider-three__btn .alefox-btn {
		font-family: 'Kumbh Sans', sans-serif !important;
		position: relative;
		overflow: hidden;
		background: #0a6e3e;
		border: 2px solid #0a6e3e;
		color: #fff;
		font-weight: 700;
		font-size: 13.5px;
		letter-spacing: 0.2px;
		padding: 11px 26px;
		border-radius: 40px;
		transition: all 0.3s ease;
		box-shadow: 0 10px 22px rgba(10, 110, 62, 0.35);
	}
	.main-slider-three__btn .alefox-btn:hover {
		background: #ffce00;
		border-color: #ffce00;
		color: #063d24;
		transform: translateY(-3px);
		box-shadow: 0 14px 28px rgba(255, 206, 0, 0.4);
	}
	.main-slider-three__btn__two .alefox-btn {
		font-family: 'Kumbh Sans', sans-serif !important;
		background: rgba(255,255,255,0.06);
		backdrop-filter: blur(2px);
		border: 2px solid rgba(255,255,255,0.75);
		color: #ffffff;
		font-weight: 700;
		font-size: 13.5px;
		letter-spacing: 0.2px;
		padding: 11px 26px;
		border-radius: 40px;
		transition: all 0.3s ease;
	}
	.main-slider-three__btn__two .alefox-btn:hover {
		background: #d21034;
		border-color: #d21034;
		color: #ffffff;
		transform: translateY(-3px);
		box-shadow: 0 16px 32px rgba(210, 16, 52, 0.4);
	}

	/* ============ PUCES DE NAVIGATION (owl dots) ============ */
	.main-slider-three .owl-dots {
		position: absolute;
		left: 0; right: 0; bottom: 24px;
		z-index: 4;
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 10px;
	}
	.main-slider-three .owl-dot span {
		display: block;
		width: 9px; height: 9px;
		margin: 0;
		border-radius: 50%;
		background: rgba(255,255,255,0.4);
		transition: all .3s ease;
	}
	.main-slider-three .owl-dot:hover span { background: rgba(255,255,255,0.75); }
	.main-slider-three .owl-dot.active span {
		width: 28px;
		border-radius: 6px;
		background: #ffce00;
		box-shadow: 0 0 0 3px rgba(255,206,0,0.2);
	}

	@media (max-width: 767px) {
		.main-slider-three__item {
			padding-top: 96px !important;
			padding-bottom: 76px !important;
		}
		.main-slider-three__title { font-size: 25px !important; }
		.main-slider-three__text__one { font-size: 13.5px !important; }
		.main-slider-three .owl-dots { bottom: 14px; }
	}
</style>

<!-- main-slider-start -->
<section class="main-slider-three">
	<div class="main-slider-three__carousel alefox-owl__carousel owl-carousel" data-owl-options='{
		"loop": true,
		"animateOut": "fadeOut",
		"animateIn": "fadeIn",
		"items": 1,
		"autoplay": true,
		"autoplayTimeout": 7000,
		"smartSpeed": 1000,
		"nav": false,
		"navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
		"dots": true,
		"margin": 0
	}'>

		<?php foreach ( $fvt_slides as $slide ) : ?>
			<div class="item">
				<div class="main-slider-three__item">
					<div class="main-slider-three__bg" style="background-image: url(<?php echo esc_url( $slide['image'] ); ?>);">
						<div class="main-slider-three__bg__color"></div>
						<div class="main-slider-three__bg__color"></div>
						<div class="main-slider-three__bg__color"></div>
						<div class="main-slider-three__bg__color"></div>
						<div class="main-slider-three__bg__color"></div>
						<div class="main-slider-three__bg__color"></div>
					</div>
					<div class="main-slider-three__shape-one">
						<img src="<?php echo esc_url( FVT_THEME_URI . '/assets/images/shapes/slider-3-shape-1.png' ); ?>" alt="Togo Green Fund du Togo">
					</div>
					<div class="main-slider-three__shape-two">
						<img src="<?php echo esc_url( FVT_THEME_URI . '/assets/images/shapes/slider-3-shape-2.png' ); ?>" alt="Togo Green Fund du Togo">
					</div>
					<div class="container">
						<div class="main-slider-three__content text-center">
							<h5 class="main-slider-three__sub-title"><?php echo esc_html( $slide['subtitle'] ); ?></h5>
							<h2 class="main-slider-three__title"><?php echo wp_kses_post( $slide['title'] ); ?></h2>
							<div class="main-slider-three__text">
								<p class="main-slider-three__text__one"><?php echo wp_kses_post( $slide['text'] ); ?></p>
							</div>
							<div class="main-slider-three__btn">
								<a href="<?php echo esc_url( $slide['btn_one']['url'] ); ?>" class="alefox-btn">
									<span class="alefox-btn__item"></span>
									<span class="alefox-btn__item"></span>
									<span class="alefox-btn__item"></span>
									<span class="alefox-btn__item"></span>
									<?php echo esc_html( $slide['btn_one']['label'] ); ?>
								</a>
								<div class="main-slider-three__btn__two">
									<a href="<?php echo esc_url( $slide['btn_two']['url'] ); ?>" class="alefox-btn">
										<span class="alefox-btn__item"></span>
										<span class="alefox-btn__item"></span>
										<span class="alefox-btn__item"></span>
										<span class="alefox-btn__item"></span>
										<?php echo esc_html( $slide['btn_two']['label'] ); ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</section>
<!-- main-slider-end -->