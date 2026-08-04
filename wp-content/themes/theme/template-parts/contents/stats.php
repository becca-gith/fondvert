<?php
/**
 * Template part : Chiffres clés (depuis l'option WordPress)
 *
 * Récupère les données depuis l'option 'fvt_stats' gérée via la page d'options.
 * Fallback intégré.
 *
 * @package TogoGreenFund
 */

// Récupération des données
$stats = get_option( 'fvt_stats', array() );

// Fallback si aucune donnée n'est enregistrée
if ( empty( $stats ) || ! is_array( $stats ) ) {
    $stats = array(
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
}

// Filtrer les entrées invalides (sans nombre ou sans label)
$stats = array_filter( $stats, function( $item ) {
    return ! empty( $item['number'] ) && ! empty( $item['label'] );
} );
?>

<style>
    /* =============================================
       CHIFFRES CLÉS – TOGO GREEN FUND
       ============================================= */

    .funfact-one {
        padding: 50px 0;
        background: #f7fbf8;
        position: relative;
    }

    .funfact-one__list {
        display: flex;
        flex-wrap: nowrap;          /* ← Forcer une ligne sur desktop */
        justify-content: center;
        align-items: stretch;
        gap: 30px 20px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .funfact-one__list li {
        display: flex;
        align-items: center;
        gap: 16px;
        flex: 1 1 0;              /* ← Chaque élément prend une part égale */
        min-width: 0;              /* ← Évite les débordements */
        max-width: 100%;
        padding: 16px 10px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .funfact-one__list li:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(6, 61, 36, 0.10);
    }

    .funfact-one__list__icon {
        flex-shrink: 0;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #e8f5ec;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
    }

    .funfact-one__list li:hover .funfact-one__list__icon {
        background: #0a6e3e;
    }

    .funfact-one__list__icon span {
        font-size: 26px;
        color: #0a6e3e;
        transition: color 0.3s ease;
    }

    .funfact-one__list li:hover .funfact-one__list__icon span {
        color: #ffffff;
    }

    .funfact-one__list__icon img {
        max-width: 32px;
        max-height: 32px;
        display: block;
    }

    .funfact-one__list__content {
        flex: 1;
        text-align: left;
    }

    .funfact-one__list__number {
        display: flex;
        align-items: baseline;
        gap: 2px;
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 700;
        color: #063d24;
        line-height: 1.2;
    }

    .funfact-one__list__text {
        margin: 0;
        font-family: 'Kumbh Sans', sans-serif;
        font-size: 13px;
        color: #5a6a5f;
        line-height: 1.4;
    }

    /* === Responsive === */

    /* Tablette : 2 par ligne */
    @media (max-width: 992px) {
        .funfact-one__list {
            flex-wrap: wrap;
            gap: 20px;
        }
        .funfact-one__list li {
            flex: 0 1 calc(50% - 20px);
            min-width: 0;
        }
    }

    /* Mobile : 1 par ligne */
    @media (max-width: 576px) {
        .funfact-one__list li {
            flex: 0 1 100%;
            flex-direction: column;
            text-align: center;
            padding: 20px 16px;
        }
        .funfact-one__list__content {
            text-align: center;
        }
        .funfact-one__list__number {
            justify-content: center;
        }
        .funfact-one__list__icon {
            width: 48px;
            height: 48px;
        }
        .funfact-one__list__icon span {
            font-size: 22px;
        }
        .funfact-one__list__number {
            font-size: 24px;
        }
    }
</style>

<section class="funfact-one">
    <div class="container">
        <ul class="list-unstyled funfact-one__list">
            <?php foreach ( $stats as $stat ) : ?>
                <li>
                    <div class="funfact-one__list__icon">
                        <?php
                        // Détection automatique : si l'icône contient '.', on considère que c'est une image
                        if ( ! empty( $stat['icon'] ) && strpos( $stat['icon'], '.' ) !== false ) : ?>
                            <img src="<?php echo esc_url( $stat['icon'] ); ?>" alt="<?php echo esc_attr( $stat['label'] ); ?>" loading="lazy">
                        <?php else : ?>
                            <span class="<?php echo esc_attr( $stat['icon'] ?? 'icon-agronomy' ); ?>"></span>
                        <?php endif; ?>
                    </div>
                    <div class="funfact-one__list__content">
                        <h5 class="funfact-one__list__number count-box">
                            <span class="count-text"
                                  data-stop="<?php echo esc_attr( $stat['number'] ?? '0' ); ?>"
                                  data-speed="1500">
                                <?php echo esc_html( $stat['number'] ?? '0' ); ?>
                            </span>
                            <?php if ( ! empty( $stat['suffix'] ) ) : ?>
                                <?php echo esc_html( $stat['suffix'] ); ?>
                            <?php endif; ?>
                        </h5>
                        <p class="funfact-one__list__text">
                            <?php echo esc_html( $stat['label'] ?? '' ); ?>
                        </p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<!-- fin funfact -->