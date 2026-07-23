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
		'image'    => FVT_THEME_URI . '/assets/images/backgrounds/slider-3-1.jpg',
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
		'image'    => FVT_THEME_URI . '/assets/images/backgrounds/slider-3-2.jpg',
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
		'image'    => FVT_THEME_URI . '/assets/images/backgrounds/slider-3-3.jpg',
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
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

<style>
	/* ============ FOND & SUPERPOSITION ============ */
	/* alefox.css met un énorme padding-top/bottom sur .main-slider-three__item (315px/220px) :
	   c'est LA vraie cause du slider géant. On l'écrase ici avec !important. */
	.main-slider-three__item {
		position: relative;
		padding-top: 140px !important;
		padding-bottom: 120px !important;
	}
	.main-slider-three__bg { position: absolute; inset: 0; background-position: center; background-size: cover; }

	.main-slider-three__bg__color:nth-child(1) { background: linear-gradient(180deg, rgba(6,61,36,0.65) 0%, rgba(6,61,36,0.35) 45%, rgba(6,61,36,0.75) 100%); }
	.main-slider-three__bg__color:nth-child(2) { background: rgba(10, 110, 62, 0.15); }
	.main-slider-three__bg__color:nth-child(3) { background: linear-gradient(120deg, rgba(255,206,0,0.10) 0%, transparent 40%); }
	.main-slider-three__bg__color:nth-child(4) { background: linear-gradient(300deg, rgba(210,16,52,0.12) 0%, transparent 35%); }
	.main-slider-three__bg__color:nth-child(5),
	.main-slider-three__bg__color:nth-child(6) { background: rgba(0,0,0,0.18); }

	/* Liseré tricolore discret en bas de chaque diapositive */
	.main-slider-three__item::after {
		content: '';
		position: absolute;
		left: 0; right: 0; bottom: 0;
		height: 5px;
		background: linear-gradient(90deg, #0a6e3e 0%, #ffce00 50%, #d21034 100%);
		z-index: 3;
	}

	/* ============ POSITION DU TEXTE — resserré, proche du haut ============ */
	.main-slider-three__item .container { height: 100%; }
	.main-slider-three__content {
		position: relative;
		z-index: 3;
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	/* Les décorations (fleurs/arbres) sont calées par défaut sur bottom:220px dans alefox.css,
	   pensé pour l'ancien padding géant. On les fait descendre pour qu'elles restent bien
	   positionnées avec notre slider plus compact. */
	.main-slider-three__shape-one,
	.main-slider-three__shape-two {
		bottom: 20px !important;
	}

	/* ============ TYPOGRAPHIE ============ */
	.main-slider-three__sub-title {
		display: inline-flex;
		align-items: center;
		gap: 6px;
		background: rgba(255, 206, 0, 0.14);
		border: 1px solid rgba(255, 206, 0, 0.5);
		color: #ffce00;
		font-size: 11px;
		font-weight: 700;
		letter-spacing: 1px;
		text-transform: uppercase;
		padding: 4px 14px;
		border-radius: 30px;
		margin-bottom: 8px;
	}
	.main-slider-three__sub-title::before {
		content: '';
		width: 6px; height: 6px;
		border-radius: 50%;
		background: #ffce00;
		display: inline-block;
	}

	.main-slider-three__title {
		font-family: 'Playfair Display', serif !important;
		color: #ffffff;
		font-size: 38px !important;
		line-height: 1.3 !important;
		font-weight: 700;
		text-shadow: 0 4px 18px rgba(0,0,0,0.25);
		margin: 0 0 14px !important;
	}
	.main-slider-three__title span { color: #ffce00; }

	.main-slider-three__text {
		margin: 0 0 16px !important;
	}
	.main-slider-three__text__one {
		color: #eef7f0;
		font-size: 14px !important;
		line-height: 1.55 !important;
		max-width: 520px;
		margin: 0 auto;
	}

	/* ============ BOUTONS ============ */
	.main-slider-three__btn { display: flex; align-items: center; justify-content: center; gap: 18px; flex-wrap: wrap; }

	.main-slider-three__btn .alefox-btn {
		background: #0a6e3e;
		border: 2px solid #0a6e3e;
		color: #fff;
		font-weight: 700;
		font-size: 13px;
		padding: 9px 20px;
		border-radius: 40px;
		transition: all 0.3s ease;
		box-shadow: 0 8px 18px rgba(10, 110, 62, 0.3);
	}
	.main-slider-three__btn .alefox-btn:hover {
		background: #ffce00;
		border-color: #ffce00;
		color: #063d24;
		transform: translateY(-3px);
		box-shadow: 0 12px 22px rgba(255, 206, 0, 0.35);
	}
	.main-slider-three__btn__two .alefox-btn {
		background: transparent;
		border: 2px solid rgba(255,255,255,0.7);
		color: #ffffff;
		font-weight: 700;
		font-size: 13px;
		padding: 9px 20px;
		border-radius: 40px;
		transition: all 0.3s ease;
	}
	.main-slider-three__btn__two .alefox-btn:hover {
		background: #d21034;
		border-color: #d21034;
		color: #ffffff;
		transform: translateY(-3px);
		box-shadow: 0 14px 30px rgba(210, 16, 52, 0.35);
	}

	@media (max-width: 767px) {
		.main-slider-three__item {
			padding-top: 90px !important;
			padding-bottom: 70px !important;
		}
		.main-slider-three__title { font-size: 24px !important; }
		.main-slider-three__text__one { font-size: 13px !important; }
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
							<h2 class="main-slider-three__title" style="font-family: 'Playfair Display', serif;"><?php echo wp_kses_post( $slide['title'] ); ?></h2>
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