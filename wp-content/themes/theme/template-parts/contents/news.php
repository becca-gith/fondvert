<?php
/**
 * Template part : Dernières actualités (dynamique)
 * Récupère les derniers articles du blog WordPress
 *
 * @package TogoGreenFund
 */

// Récupération des 6 derniers articles publiés
$news_query = new WP_Query( array(
    'post_type'           => 'post',
    'posts_per_page'      => 6,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'orderby'             => 'date',
    'order'               => 'DESC',
) );

// Fallback si aucun article n'est trouvé
if ( ! $news_query->have_posts() ) {
    echo '<div class="container" style="padding:60px 0; text-align:center;"><p>Aucune actualité pour le moment.</p></div>';
    return;
}

// Définition des icônes aléatoires pour varier le visuel
$icons = array( 'icon-leaf', 'icon-sustainability', 'icon-management', 'icon-agronomy', 'icon-energy', 'icon-diploma' );
?>

<style>
    /* ========== EN-TÊTE DE SECTION ========== */
    .service-three .sec-title { margin-bottom: 50px; }
    .service-three .sec-title__tagline {
        font-family: 'Kumbh Sans', sans-serif;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.6px;
        color: #d21034;
    }
    .service-three .sec-title__title {
        font-family: 'Playfair Display', serif;
        font-size: 34px;
        font-weight: 700;
        color: #063d24;
        margin-top: 10px;
    }

    /* ========== CARTE ACTUALITÉ ========== */
    .service-three__item {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(6, 61, 36, 0.08);
        border: 1px solid rgba(6, 61, 36, 0.06);
        transition: transform .35s ease, box-shadow .35s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .service-three__item:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 48px rgba(6, 61, 36, 0.16);
    }

    .service-three__item__image {
        position: relative;
        height: 210px;
        overflow: hidden;
        background: #dce8e0;
    }
    .service-three__item__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }
    .service-three__item:hover .service-three__item__image img {
        transform: scale(1.08);
    }
    .service-three__item__image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(6,61,36,0) 55%, rgba(6,61,36,0.55) 100%);
    }

    .service-three__item__icon {
        position: absolute;
        bottom: -24px;
        left: 24px;
        z-index: 2;
        width: 54px;
        height: 54px;
        border-radius: 50%;
        background: #0a6e3e;
        border: 4px solid #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 22px rgba(6, 61, 36, 0.25);
    }
    .service-three__item__icon span {
        color: #ffce00;
        font-size: 22px;
    }

    .service-three__item__content {
        padding: 40px 26px 26px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    /* ========== STYLE DE LA DATE ========== */
    .fvt-news-date {
        display: inline-flex;
        align-items: center;
        align-self: flex-start;
        font-family: 'Kumbh Sans', sans-serif;
        font-size: 12.5px;
        font-weight: 700;
        color: #0a6e3e;
        background: #e8f5ec;
        padding: 5px 14px;
        border-radius: 20px;
        margin-bottom: 14px;
        letter-spacing: 0.3px;
    }
    .fvt-news-date i {
        margin-right: 7px;
        font-size: 11.5px;
        color: #0a6e3e;
    }

    .service-three__item__title {
        font-family: 'Playfair Display', serif;
        font-size: 19px;
        font-weight: 700;
        line-height: 1.4;
        margin: 0 0 12px;
    }
    .service-three__item__title a {
        color: #063d24;
        text-decoration: none;
        transition: color .25s ease;
        background-image: linear-gradient(#0a6e3e, #0a6e3e);
        background-size: 0% 2px;
        background-repeat: no-repeat;
        background-position: left bottom;
        padding-bottom: 2px;
        transition: background-size .3s ease, color .25s ease;
    }
    .service-three__item__title a:hover {
        color: #0a6e3e;
        background-size: 100% 2px;
    }

    .service-three__item__text {
        font-family: 'Kumbh Sans', sans-serif;
        font-size: 14.5px;
        line-height: 1.7;
        color: #5a6a5f;
        margin-bottom: 22px;
        flex: 1;
    }

    /* ========== BOUTON ========== */
    .fvt-btn-news {
        display: inline-flex;
        align-items: center;
        align-self: flex-start;
        gap: 8px;
        padding: 10px 22px;
        background: #0a6e3e;
        color: #ffffff;
        font-family: 'Kumbh Sans', sans-serif;
        font-size: 13px;
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
        font-size: 13px;
        transition: transform 0.3s ease;
    }
    .fvt-btn-news:hover i {
        transform: translateX(4px);
    }

    /* ========== CARROUSEL : PUCES ========== */
    .service-three__carousel { padding-bottom: 10px; }
    .service-three__carousel .owl-dots {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        margin-top: 34px;
    }
    .service-three__carousel .owl-dot span {
        display: block;
        width: 8px; height: 8px;
        margin: 0;
        border-radius: 50%;
        background: #d8e6dc;
        transition: all .3s ease;
    }
    .service-three__carousel .owl-dot:hover span { background: #9cc4ab; }
    .service-three__carousel .owl-dot.active span {
        width: 26px;
        border-radius: 6px;
        background: #0a6e3e;
    }

    @media (max-width: 576px) {
        .service-three .sec-title__title { font-size: 26px; }
        .service-three__item__content { padding: 36px 20px 22px; }
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

            <?php
            $delay = 0;
            while ( $news_query->have_posts() ) : $news_query->the_post();
                // Récupération des données
                $post_id     = get_the_ID();
                $title       = get_the_title();
                $excerpt     = has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 20, '…' );
                $link        = get_permalink();
                $date        = get_the_date( 'd F Y' );
                $thumbnail   = get_the_post_thumbnail_url( $post_id, 'large' );
                $icon        = $icons[ $delay % count( $icons ) ];

                // Fallback pour l'image
                if ( empty( $thumbnail ) ) {
                    $thumbnail = get_template_directory_uri() . '/assets/images/resources/service-3-1.jpg';
                }
            ?>
                <div class="item">
                    <div class="service-three__item wow fadeInUp" data-wow-delay="<?php echo esc_attr( $delay * 100 ); ?>ms">
                        <div class="service-three__item__image">
                            <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
                            <div class="service-three__item__icon">
                                <span class="<?php echo esc_attr( $icon ); ?>"></span>
                            </div>
                        </div>
                        <div class="service-three__item__content">
                            <!-- Date -->
                            <span class="fvt-news-date">
                                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                <?php echo esc_html( $date ); ?>
                            </span>
                            <h3 class="service-three__item__title">
                                <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
                            </h3>
                            <p class="service-three__item__text">
                                <?php echo esc_html( $excerpt ); ?>
                            </p>
                            <a href="<?php echo esc_url( $link ); ?>" class="fvt-btn-news">
                                <?php esc_html_e( 'Lire la suite', 'alefox' ); ?>
                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                $delay++;
            endwhile;
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>