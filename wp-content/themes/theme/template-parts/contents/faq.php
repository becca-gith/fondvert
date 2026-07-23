<?php
/**
 * Template part : Foire aux questions (FAQ)
 * Togo Green Fund du Togo
 *
 * @package FondsVertTogo
 */

$faq_items = array(
	array(
		'numero'   => '01',
		'question' => __( 'Qu\'est-ce que le Togo Green Fund du Togo ?', 'alefox' ),
		'reponse'  => __( 'Le Togo Green Fund du Togo est un mécanisme national de financement climatique qui mobilise des ressources pour soutenir des projets d\'adaptation et d\'atténuation des effets du changement climatique au Togo.', 'alefox' ),
	),
	array(
		'numero'   => '02',
		'question' => __( 'Quels types de projets sont financés ?', 'alefox' ),
		'reponse'  => __( 'Nous finançons des projets dans les domaines de l\'agriculture résiliente, des énergies renouvelables, de la gestion durable des forêts, de l\'adaptation des zones côtières, et de l\'économie circulaire.', 'alefox' ),
	),
	array(
		'numero'   => '03',
		'question' => __( 'Comment soumettre un projet ?', 'alefox' ),
		'reponse'  => __( 'Les appels à projets sont publiés régulièrement sur notre site. Vous pouvez consulter la page "Appels à projets" pour connaître les critères d\'éligibilité et la procédure de soumission.', 'alefox' ),
	),
	array(
		'numero'   => '04',
		'question' => __( 'Qui peut bénéficier des financements ?', 'alefox' ),
		'reponse'  => __( 'Les collectivités locales, les organisations de la société civile, les entreprises privées et les institutions publiques peuvent soumettre des projets, sous réserve de remplir les critères d\'éligibilité.', 'alefox' ),
	),
	array(
		'numero'   => '05',
		'question' => __( 'Comment sont évalués les projets ?', 'alefox' ),
		'reponse'  => __( 'Les projets sont évalués selon des critères de pertinence climatique, d\'impact environnemental et social, de viabilité financière et de durabilité. Un comité technique indépendant assure la sélection.', 'alefox' ),
	),
	array(
		'numero'   => '06',
		'question' => __( 'Où trouver les rapports d\'activité du Fonds ?', 'alefox' ),
		'reponse'  => __( 'Nos rapports d\'activité et nos états financiers sont disponibles dans la section "Publications" de notre site, conformément à notre engagement de transparence.', 'alefox' ),
	),
);
?>

<style>
	/* =============================================
	   SECTION FAQ – Togo Green Fund TOGO
	   ============================================= */
	.fvt-faq {
		--faq-green:       #0a6e3e;
		--faq-green-dark:  #063d24;
		--faq-green-light: #eaf6ee;
		--faq-yellow:      #ffce00;
		--faq-text:        #1c2b22;
		--faq-text-muted:  #5a6a5f;
		font-family: 'Kumbh Sans', sans-serif;
		padding: 100px 0 100px;
		background: linear-gradient(180deg, #f6faf7 0%, #ffffff 40%);
		position: relative;
		overflow: hidden;
	}

	/* Décor en fond : cercles doux + liseré drapeau vertical à peine visible */
	.fvt-faq::before {
		content: '';
		position: absolute;
		top: -120px;
		right: -120px;
		width: 380px;
		height: 380px;
		border-radius: 50%;
		background: radial-gradient(circle, rgba(10,110,62,0.07) 0%, rgba(10,110,62,0) 70%);
		pointer-events: none;
	}
	.fvt-faq::after {
		content: '';
		position: absolute;
		bottom: -100px;
		left: -100px;
		width: 300px;
		height: 300px;
		border-radius: 50%;
		background: radial-gradient(circle, rgba(255,206,0,0.10) 0%, rgba(255,206,0,0) 70%);
		pointer-events: none;
	}

	/* ---------- EN-TÊTE DE SECTION ---------- */
	.fvt-faq__header {
		max-width: 720px;
		margin: 0 auto 56px;
		text-align: center;
		position: relative;
		z-index: 1;
	}
	.fvt-faq__badge {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		padding: 7px 18px;
		border-radius: 30px;
		background: var(--faq-green-light);
		color: var(--faq-green-dark);
		font-size: 12.5px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: 0.8px;
		margin-bottom: 18px;
	}
	.fvt-faq__badge i { color: var(--faq-green); font-size: 11px; }

	.fvt-faq__title {
		font-family: 'Kumbh Sans', sans-serif;
		font-size: clamp(28px, 3.4vw, 40px);
		font-weight: 800;
		color: var(--faq-green-dark);
		line-height: 1.2;
		margin: 0 0 16px;
	}
	.fvt-faq__title span {
		position: relative;
		display: inline-block;
		color: var(--faq-green);
	}
	.fvt-faq__title span::after {
		content: '';
		position: absolute;
		left: 0; right: 0; bottom: 2px;
		height: 10px;
		background: rgba(255, 206, 0, 0.4);
		z-index: -1;
		border-radius: 3px;
	}

	.fvt-faq__sub {
		font-size: 16px;
		line-height: 1.7;
		color: var(--faq-text-muted);
		margin: 0;
	}

	/* ---------- ACCORDÉON ---------- */
	.faq-accordion {
		max-width: 880px;
		margin: 0 auto;
		position: relative;
		z-index: 1;
	}

	.faq-accordion .accordion-item {
		display: flex;
		align-items: flex-start;
		gap: 4px;
		background: #ffffff;
		border: 1px solid #e9f1ec;
		border-radius: 16px;
		margin-bottom: 14px;
		overflow: hidden;
		box-shadow: 0 2px 10px rgba(6, 61, 36, 0.04);
		transition: box-shadow .3s ease, border-color .3s ease, transform .3s ease;
	}
	.faq-accordion .accordion-item:hover {
		box-shadow: 0 10px 30px rgba(6, 61, 36, 0.09);
		border-color: rgba(10, 110, 62, 0.18);
	}
	.faq-accordion .accordion-item.is-active {
		border-color: var(--faq-green);
		box-shadow: 0 12px 32px rgba(6, 61, 36, 0.12);
	}

	.faq-accordion .accordion-main {
		flex: 1;
		min-width: 0;
	}

	.faq-accordion .accordion-header { margin: 0; }

	.faq-accordion .accordion-button {
		font-family: 'Kumbh Sans', sans-serif;
		font-weight: 700;
		font-size: 16.5px;
		color: var(--faq-text);
		background: transparent;
		padding: 22px 26px 22px 6px;
		border: none;
		box-shadow: none;
		transition: color 0.25s ease;
		text-decoration: none;
		width: 100%;
		text-align: left;
		display: flex;
		align-items: center;
		gap: 18px;
		cursor: pointer;
		position: relative;
	}
	.faq-accordion .accordion-button .num {
		flex-shrink: 0;
		width: 38px;
		height: 38px;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		background: var(--faq-green-light);
		color: var(--faq-green);
		font-family: 'Kumbh Sans', sans-serif;
		font-weight: 800;
		font-size: 13px;
		transition: background .3s ease, color .3s ease, transform .3s ease;
	}
	.faq-accordion .accordion-button.active .num {
		background: var(--faq-green);
		color: #fff;
		transform: scale(1.06);
	}

	.faq-accordion .accordion-button .label {
		flex: 1;
	}

	.faq-accordion .accordion-button.active {
		color: var(--faq-green-dark);
	}
	.faq-accordion .accordion-button:focus { outline: none; }

	.faq-accordion .accordion-button .icon {
		flex-shrink: 0;
		width: 30px;
		height: 30px;
		border-radius: 50%;
		background: var(--faq-green-light);
		display: flex;
		align-items: center;
		justify-content: center;
		transition: background .3s ease, transform 0.35s ease;
	}
	.faq-accordion .accordion-button .icon::before,
	.faq-accordion .accordion-button .icon::after {
		content: '';
		position: absolute;
		background: var(--faq-green);
		border-radius: 2px;
		transition: transform .3s ease, opacity .3s ease;
	}
	.faq-accordion .accordion-button .icon {
		position: relative;
	}
	.faq-accordion .accordion-button .icon::before {
		width: 12px; height: 2px;
	}
	.faq-accordion .accordion-button .icon::after {
		width: 2px; height: 12px;
	}
	.faq-accordion .accordion-button.active .icon {
		background: var(--faq-yellow);
		transform: rotate(180deg);
	}
	.faq-accordion .accordion-button.active .icon::after {
		transform: scaleY(0);
	}
	.faq-accordion .accordion-button.active .icon::before {
		background: var(--faq-green-dark);
	}

	.faq-accordion .accordion-body {
		font-family: 'Kumbh Sans', sans-serif;
		font-size: 15px;
		line-height: 1.75;
		color: var(--faq-text-muted);
		padding: 0 26px 0 64px;
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.35s ease, padding 0.35s ease;
	}
	.faq-accordion .accordion-body.open {
		max-height: 800px;
		padding: 0 26px 24px 64px;
	}

	/* ---------- BLOC CONTACT (bas de section) ---------- */
	.fvt-faq__contact {
		max-width: 880px;
		margin: 48px auto 0;
		padding: 28px 32px;
		border-radius: 18px;
		background: var(--faq-green-dark);
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 20px;
		flex-wrap: wrap;
		position: relative;
		z-index: 1;
		overflow: hidden;
	}
	.fvt-faq__contact::before {
		content: '';
		position: absolute;
		inset: 0;
		background: linear-gradient(90deg, var(--faq-green) 0 33%, var(--faq-yellow) 33% 66%, #d21034 66% 100%);
		opacity: 0.06;
	}
	.fvt-faq__contact-text {
		position: relative;
		z-index: 1;
	}
	.fvt-faq__contact-text strong {
		display: block;
		color: #ffffff;
		font-size: 18px;
		font-weight: 800;
		margin-bottom: 4px;
	}
	.fvt-faq__contact-text span {
		display: block;
		color: #cfe6d8;
		font-size: 14px;
	}
	.fvt-faq__contact-btn {
		position: relative;
		z-index: 1;
		display: inline-flex;
		align-items: center;
		gap: 8px;
		background: var(--faq-yellow);
		color: var(--faq-green-dark);
		font-weight: 700;
		font-size: 13.5px;
		text-transform: uppercase;
		letter-spacing: 0.4px;
		padding: 13px 26px;
		border-radius: 30px;
		text-decoration: none;
		white-space: nowrap;
		transition: all .3s ease;
	}
	.fvt-faq__contact-btn:hover {
		background: #ffffff;
		color: var(--faq-green-dark);
		transform: translateY(-2px);
		box-shadow: 0 10px 24px rgba(0,0,0,0.18);
	}

	@media (max-width: 576px) {
		.fvt-faq { padding: 70px 0 70px; }
		.faq-accordion .accordion-button {
			font-size: 14.5px;
			padding: 18px 18px 18px 4px;
			gap: 12px;
		}
		.faq-accordion .accordion-button .num {
			width: 32px; height: 32px; font-size: 11.5px;
		}
		.faq-accordion .accordion-body {
			font-size: 14px;
			padding: 0 18px 0 54px;
		}
		.faq-accordion .accordion-body.open {
			padding: 0 18px 20px 54px;
		}
		.fvt-faq__contact {
			flex-direction: column;
			text-align: center;
			padding: 26px 22px;
		}
	}
</style>

<!-- =============================================
     SECTION FAQ
     ============================================= -->
<section class="fvt-faq">
	<div class="container">

		<div class="fvt-faq__header">
			<span class="fvt-faq__badge"><i class="fas fa-leaf"></i><?php esc_html_e( 'Questions fréquentes', 'alefox' ); ?></span>
			<h3 class="fvt-faq__title">
				<?php esc_html_e( 'Tout ce qu\'il faut savoir sur le', 'alefox' ); ?> <span><?php esc_html_e( 'Togo Green Fund du Togo', 'alefox' ); ?></span>
			</h3>
			<p class="fvt-faq__sub">
				<?php esc_html_e( 'Retrouvez ci-dessous les réponses aux questions les plus courantes. Vous ne trouvez pas ce que vous cherchez ? Contactez notre équipe.', 'alefox' ); ?>
			</p>
		</div>

		<div class="faq-accordion" id="faqAccordion">

			<?php foreach ( $faq_items as $index => $item ) :
				$is_first = ( $index === 0 );
			?>
				<div class="accordion-item <?php echo $is_first ? 'is-active' : ''; ?>">
					<div class="accordion-main">
						<div class="accordion-header">
							<button class="accordion-button <?php echo $is_first ? 'active' : ''; ?>" data-target="faq-body-<?php echo $index; ?>">
								<span class="num"><?php echo esc_html( $item['numero'] ); ?></span>
								<span class="label"><?php echo esc_html( $item['question'] ); ?></span>
								<span class="icon"></span>
							</button>
						</div>
						<div id="faq-body-<?php echo $index; ?>" class="accordion-body <?php echo $is_first ? 'open' : ''; ?>">
							<?php echo esc_html( $item['reponse'] ); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>

		<!-- Bloc contact -->
		<div class="fvt-faq__contact">
			<div class="fvt-faq__contact-text">
				<strong><?php esc_html_e( 'Une autre question ?', 'alefox' ); ?></strong>
				<span><?php esc_html_e( 'Notre équipe vous répond sous 48h ouvrées.', 'alefox' ); ?></span>
			</div>
			<a href="<?php echo esc_url( function_exists( 'fvt_get_page_url_by_slug' ) ? fvt_get_page_url_by_slug( 'contact' ) : home_url( '/contact' ) ); ?>" class="fvt-faq__contact-btn">
				<i class="fas fa-paper-plane"></i> <?php esc_html_e( 'Nous contacter', 'alefox' ); ?>
			</a>
		</div>

	</div>
</section>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		var accordion = document.getElementById('faqAccordion');
		if (!accordion) return;

		var buttons = accordion.querySelectorAll('.accordion-button');
		buttons.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var targetId = this.getAttribute('data-target');
				var body = document.getElementById(targetId);
				var item = this.closest('.accordion-item');
				var wasOpen = body.classList.contains('open');

				// Fermer tous les items
				accordion.querySelectorAll('.accordion-body').forEach(function (b) {
					b.classList.remove('open');
				});
				accordion.querySelectorAll('.accordion-button').forEach(function (b) {
					b.classList.remove('active');
				});
				accordion.querySelectorAll('.accordion-item').forEach(function (i) {
					i.classList.remove('is-active');
				});

				// Rouvrir celui cliqué si il n'était pas déjà ouvert
				if (!wasOpen) {
					body.classList.add('open');
					this.classList.add('active');
					item.classList.add('is-active');
				}
			});
		});
	});
</script>