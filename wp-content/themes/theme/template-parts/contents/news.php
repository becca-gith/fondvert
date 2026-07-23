<?php
/**
 * Template part : Dernières actualités (avec dates)
 * Togo Green Fund du Togo
 *
 * @package FondsVertTogo
 */

$news_items = array(
	array(
		'image' => 'service-3-1.jpg',
		'icon'  => 'icon-leaf',
		'date'  => '15 juin 2025',
		'title' => __( 'Lancement du Togo Green Fund du Togo', 'alefox' ),
		'excerpt' => __( 'Le Togo Green Fund du Togo a été officiellement lancé pour mobiliser des financements climatiques.', 'alefox' ),
		'link'  => '#',
	),
	array(
		'image' => 'service-3-2.jpg',
		'icon'  => 'icon-sustainability',
		'date'  => '28 mai 2025',
		'title' => __( 'Appel à projets pour l\'agriculture durable', 'alefox' ),
		'excerpt' => __( 'Un appel à projets est ouvert pour soutenir des initiatives agricoles résilientes au climat.', 'alefox' ),
		'link'  => '#',
	),
	array(
		'image' => 'service-3-3.jpg',
		'icon'  => 'icon-management',
		'date'  => '10 avril 2025',
		'title' => __( 'Atelier de formation sur la gouvernance climatique', 'alefox' ),
		'excerpt' => __( 'Un atelier a réuni les parties prenantes pour renforcer la transparence.', 'alefox' ),
		'link'  => '#',
	),
	array(
		'image' => 'service-3-1.jpg',
		'icon'  => 'icon-agronomy',
		'date'  => '22 mars 2025',
		'title' => __( 'Projet de reboisement communautaire', 'alefox' ),
		'excerpt' => __( 'Un projet de reboisement participatif a été lancé dans la région des Plateaux.', 'alefox' ),
		'link'  => '#',
	),
	array(
		'image' => 'service-3-2.jpg',
		'icon'  => 'icon-energy',
		'date'  => '5 février 2025',
		'title' => __( 'Énergie solaire pour les zones rurales', 'alefox' ),
		'excerpt' => __( 'Installation de panneaux solaires dans 20 villages pour un accès à l\'électricité propre.', 'alefox' ),
		'link'  => '#',
	),
	array(
		'image' => 'service-3-3.jpg',
		'icon'  => 'icon-diploma',
		'date'  => '18 janvier 2025',
		'title' => __( 'Rapport d\'activité 2024 disponible', 'alefox' ),
		'excerpt' => __( 'Le rapport d\'activité annuel est en ligne, présentant les résultats et les projets financés.', 'alefox' ),
		'link'  => '#',
	),
);
?>

<style>
	/* ========== STYLE DE LA DATE ========== */
	.fvt-news-date {
		display: inline-block;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 13px;
		font-weight: 600;
		color: #0a6e3e;
		background: #e8f5ec;
		padding: 4px 12px;
		border-radius: 20px;
		margin-bottom: 10px;
		letter-spacing: 0.3px;
	}
	.fvt-news-date i {
		margin-right: 6px;
		font-size: 12px;
		color: #0a6e3e;
	}

	/* ========== NOUVEAU BOUTON ========== */
	.fvt-btn-news {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		padding: 10px 24px;
		background: #0a6e3e;
		color: #ffffff;
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 14px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: 0.5px;
		border-radius: 30px;
		border: 2px solid #0a6e3e;
		transition: all 0.3s ease;
		text-decoration: none;
	}
	.fvt-btn-news:hover {
		background: #ffce00;
		border-color: #ffce00;
		color: #063d24;
		transform: translateY(-3px);
		box-shadow: 0 8px 20px rgba(255, 206, 0, 0.35);
	}
	.fvt-btn-news i {
		font-size: 14px;
		transition: transform 0.3s ease;
	}
	.fvt-btn-news:hover i {
		transform: translateX(4px);
	}
</style>

<section class="service-three">
	<div class="service-three__bg" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/shapes/service-bg-3-shape.png' ); ?>);"></div>
	<div class="service-three__shape" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources/service-2-shape-2.png' ); ?>);"></div>
	<div class="container">
		<div class="sec-title text-center">
			<h6 class="sec-title__tagline bw-split-in-right">
				<span class="sec-title__tagline__left-leaf" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/shapes/leaf.png' ); ?>);"></span>
				<?php esc_html_e( 'Nos dernières actualités', 'alefox' ); ?>
				<span class="sec-title__tagline__right-leaf" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/shapes/leaf.png' ); ?>);"></span>
			</h6>
			<h3 class="sec-title__title bw-split-in-left"><?php esc_html_e( 'Ce qu\'il se passe au Togo Green Fund', 'alefox' ); ?></h3>
		</div>

		<div class="service-three__carousel alefox-owl__carousel alefox-owl__carousel--with-shadow alefox-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": false,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"icofont-bubble-left\"></span>","<span class=\"icofont-bubble-righ\"></span>"],
			"dots": true,
			"autoplay": false,
			"responsive": {
				"0": { "items": 1 },
				"768": { "items": 2 },
				"992": { "items": 3 }
			}
		}'>

			<?php foreach ( $news_items as $index => $item ) : ?>
				<div class="item">
					<div class="service-three__item wow fadeInUp" data-wow-delay="<?php echo esc_attr( $index * 100 ); ?>ms">
						<div class="service-three__item__image">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources/' . $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
						</div>
						<div class="service-three__item__content">
							<div class="service-three__item__icon">
								<span class="<?php echo esc_attr( $item['icon'] ); ?>"></span>
							</div>
							<!-- Affichage de la date -->
							<span class="fvt-news-date">
								<i class="fas fa-calendar-alt" aria-hidden="true"></i>
								<?php echo esc_html( $item['date'] ); ?>
							</span>
							<h3 class="service-three__item__title">
								<a href="<?php echo esc_url( $item['link'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
							</h3>
							<p class="service-three__item__text">
								<?php echo esc_html( $item['excerpt'] ); ?>
							</p>
							<a href="<?php echo esc_url( $item['link'] ); ?>" class="fvt-btn-news">
								<?php esc_html_e( 'Lire la suite', 'alefox' ); ?>
								<i class="fas fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div>
						<div class="service-three__item__shape" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/shapes/service-3-shape.png' ); ?>);"></div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
</section>