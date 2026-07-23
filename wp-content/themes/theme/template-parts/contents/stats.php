<?php
/**
 * Template part : Chiffres clés (statistiques)
 * Togo Green Fund du Togo
 *
 * @package FondsVertTogo
 */

// Données statistiques (à remplacer par ACF ultérieurement)
$fvt_stats = array(
	array(
		'icon'   => 'icon-agronomy',
		'number' => '12',
		'suffix' => 'M+',
		'label'  => __( 'FCFA mobilisés', 'alefox' ),
	),
	array(
		'icon'   => 'icon-management',
		'number' => '45',
		'suffix' => '+',
		'label'  => __( 'Projets financés', 'alefox' ),
	),
	array(
		'icon'   => 'icon-sustainability',
		'number' => '1500',
		'suffix' => '+',
		'label'  => __( 'Bénéficiaires directs', 'alefox' ),
	),
	array(
		'icon'   => 'icon-save-energy',
		'number' => '18',
		'suffix' => '',
		'label'  => __( 'Partenaires techniques', 'alefox' ),
	),
);
?>

<style>
	/* Icônes vertes sur fond blanc, alignées à côté des chiffres */
	.funfact-one__list {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		gap: 30px;
		list-style: none;
		margin: 0;
		padding: 0;
	}
	.funfact-one__list li {
		display: flex;
		align-items: center;
		gap: 16px;
	}
	.funfact-one__list__icon {
		flex-shrink: 0;
		width: 60px;
		height: 60px;
		border-radius: 50%;
		background: #ffffff;
		display: flex;
		align-items: center;
		justify-content: center;
		box-shadow: 0 4px 14px rgba(0,0,0,0.08);
	}
	.funfact-one__list__icon span {
		font-size: 26px;
		color: #0a6e3e;
	}
	.funfact-one__list__content { text-align: left; }
	.funfact-one__list__number {
		display: flex;
		align-items: baseline;
		gap: 2px;
		margin: 0;
		font-weight: 700;
		color: #063d24;
	}
	.funfact-one__list__text {
		margin: 0;
		color: #5a6a5f;
		font-size: 14px;
	}
</style>

<section class="funfact-one">
	<div class="container">
		<ul class="list-unstyled funfact-one__list">
			<?php foreach ( $fvt_stats as $stat ) : ?>
				<li>
					<div class="funfact-one__list__icon">
						<span class="<?php echo esc_attr( $stat['icon'] ); ?>"></span>
					</div>
					<div class="funfact-one__list__content">
						<h5 class="funfact-one__list__number count-box">
							<span class="count-text" data-stop="<?php echo esc_attr( $stat['number'] ); ?>" data-speed="1500"><?php echo esc_html( $stat['number'] ); ?></span>
							<?php if ( ! empty( $stat['suffix'] ) ) : ?>
								<?php echo esc_html( $stat['suffix'] ); ?>
							<?php endif; ?>
						</h5>
						<p class="funfact-one__list__text"><?php echo esc_html( $stat['label'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<!-- fin funfact -->