<?php
/**
 * Template part : Nos partenaires (dynamique)
 * Récupère les partenaires depuis le Custom Post Type "partenaire"
 *
 * @package TogoGreenFund
 */

// Récupération des partenaires (CPT 'partenaire')
$partners_query = new WP_Query( array(
    'post_type'      => 'partenaire',
    'posts_per_page' => -1,               // tous les partenaires
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

// Si aucun partenaire n'est trouvé, utiliser les données statiques par défaut
if ( ! $partners_query->have_posts() ) {
    $partners = array(
        array(
            'name' => 'Ministère de l\'Environnement',
            'logo' => 'logomerf.png',
        ),
        array(
            'name' => 'Green fund Togo',
            'logo' => 'fvc.webp',
        ),
        array(
            'name' => 'Banque Mondiale',
            'logo' => 'banque-mondiale.png',
        ),
        array(
            'name' => 'Union Européenne',
            'logo' => 'ue.webp',
        ),
        array(
            'name' => 'GIZ Togo',
            'logo' => 'giz.jpg',
        ),
        array(
            'name' => 'GIZ2',
            'logo' => 'giz2.webp',
        ),
        array(
            'name' => 'GEF',
            'logo' => 'gef.jpg',
        ),
        array(
            'name' => 'PNUD',
            'logo' => 'pnud.jpg',
        ),
        array(
            'name' => 'BOAD',
            'logo' => 'boad.jpg',
        ),
        array(
            'name' => 'BIDC',
            'logo' => 'bidc.webp',
        ),
        array(
            'name' => 'BAD',
            'logo' => 'bad.png',
        ),
        array(
            'name' => 'GGGI',
            'logo' => 'gggitg.jpg',
        ),
    );
} else {
    // Construction du tableau à partir des articles du CPT
    $partners = array();
    while ( $partners_query->have_posts() ) {
        $partners_query->the_post();
        $logo_id = get_post_thumbnail_id( get_the_ID() );
        $logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'medium' ) : '';
        
        // Si l'image à la une est définie, on l'utilise
        if ( ! empty( $logo_url ) ) {
            $partners[] = array(
                'name' => get_the_title(),
                'logo' => $logo_url,   // On stocke directement l'URL complète
            );
        }
    }
    wp_reset_postdata();
}
?>

<style>
    /* =============================================
       SECTION PARTENAIRES – TOGO GREEN FUND
       ============================================= */
    .client-carousel {
        --pc-green:       #0a6e3e;
        --pc-green-dark:  #063d24;
        --pc-green-light: #eaf6ee;
        --pc-yellow:      #ffce00;
        font-family: 'Kumbh Sans', sans-serif;
        padding: 90px 0 80px;
        background: linear-gradient(180deg, #ffffff 0%, #f4faf6 50%, #ffffff 100%);
        position: relative;
        overflow: hidden;
    }
    .client-carousel::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--pc-green) 0 33%, var(--pc-yellow) 33% 66%, #d21034 66% 100%);
        opacity: 0.5;
    }
    .client-carousel::after {
        content: '';
        position: absolute;
        bottom: -140px;
        right: -140px;
        width: 360px;
        height: 360px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(10,110,62,0.06) 0%, rgba(10,110,62,0) 70%);
        pointer-events: none;
    }

    .partners-header {
        text-align: center;
        max-width: 620px;
        margin: 0 auto 50px;
        position: relative;
        z-index: 1;
    }
    .partners-header .sec-title__icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: var(--pc-green-light);
        color: var(--pc-green);
        font-size: 20px;
        margin-bottom: 18px;
    }
    .partners-header .sec-title__title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(28px, 3.2vw, 36px);
        font-weight: 700;
        color: var(--pc-green-dark);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0 0 14px;
    }
    .partners-header .sec-title__title span {
        color: var(--pc-green);
    }
    .partners-header .sec-title__sub {
        font-size: 15.5px;
        line-height: 1.7;
        color: #5a6a5f;
        margin: 0;
    }
    .partners-header .sec-title__divider {
        width: 64px;
        height: 3px;
        background: var(--pc-yellow);
        border-radius: 3px;
        margin: 20px auto 0;
    }

    .client-carousel__one {
        position: relative;
        z-index: 1;
    }
    .client-carousel__one__item {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: #ffffff;
        border: 1px solid #eef3ef;
        border-radius: 14px;
        box-shadow: 0 3px 16px rgba(6, 61, 36, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        height: 108px;
    }
    .client-carousel__one__item:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 30px rgba(6, 61, 36, 0.13);
        border-color: rgba(10, 110, 62, 0.2);
    }
    .client-carousel__one__item img {
        max-height: 58px;
        max-width: 85%;
        width: auto;
        filter: grayscale(35%);
        opacity: 0.85;
        transition: filter 0.3s ease, opacity 0.3s ease, transform 0.3s ease;
    }
    .client-carousel__one__item:hover img {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.04);
    }

    @media (max-width: 576px) {
        .client-carousel { padding: 60px 0 55px; }
        .partners-header .sec-title__title { letter-spacing: 0.2px; }
        .client-carousel__one__item {
            height: 84px;
            padding: 14px;
        }
        .client-carousel__one__item img {
            max-height: 42px;
        }
    }
</style>

<!-- =============================================
     SECTION PARTENAIRES
     ============================================= -->
<div class="client-carousel client-carousel--two">
    <div class="container">

        <!-- En‑tête -->
        <div class="partners-header">
            <span class="sec-title__icon"><i class="fas fa-handshake"></i></span>
            <h2 class="sec-title__title">
                <?php esc_html_e( 'Nos', 'alefox' ); ?> <span><?php esc_html_e( 'Partenaires', 'alefox' ); ?></span>
            </h2>
            <p class="sec-title__sub">
                <?php esc_html_e( 'Le Togo Green Fund du Togo travaille aux côtés d\'institutions nationales et internationales engagées pour le climat.', 'alefox' ); ?>
            </p>
            <div class="sec-title__divider"></div>
        </div>

        <!-- Carrousel -->
        <div class="client-carousel__one alefox-owl__carousel owl-theme owl-carousel" data-owl-options='{
            "items": 5,
            "margin": 65,
            "smartSpeed": 700,
            "loop": true,
            "autoplay": 6000,
            "nav": false,
            "dots": false,
            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
            "responsive": {
                "0": { "items": 1, "margin": 0 },
                "360": { "items": 2, "margin": 0 },
                "575": { "items": 3, "margin": 30 },
                "768": { "items": 3, "margin": 40 },
                "992": { "items": 4, "margin": 40 },
                "1200": { "items": 5 }
            }
        }'>
            <?php foreach ( $partners as $partner ) : ?>
                <div class="client-carousel__one__item">
                    <?php
                    // Si le logo est déjà une URL complète (cas dynamique) ou un nom de fichier (cas statique)
                    $logo_src = ( filter_var( $partner['logo'], FILTER_VALIDATE_URL ) ) 
                        ? $partner['logo'] 
                        : get_template_directory_uri() . '/assets/images/brand/' . $partner['logo'];
                    ?>
                    <img src="<?php echo esc_url( $logo_src ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>">
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>