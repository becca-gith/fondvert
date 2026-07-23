<?php
/**
 * Section Partenaires – affichage dynamique des logos
 */

$args = array(
    'post_type'      => 'partenaire',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
);
$partenaires = new WP_Query( $args );

// Si aucun partenaire, on n'affiche rien
if ( ! $partenaires->have_posts() ) {
    return;
}

// Collecte des URLs des logos
$logos = array();
while ( $partenaires->have_posts() ) {
    $partenaires->the_post();
    $logo_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
    if ( $logo_url ) {
        $logos[] = $logo_url;
    }
}
wp_reset_postdata();

// Dupliquer les logos pour un défilement continu (au moins 2 jeux)
$logos_loop = array_merge( $logos, $logos );
?>

<section class="partenaires">
    <div class="container">
        <div class="section-head center reveal">
            <div class="tag">Ils nous font confiance</div>
            <h2 style="color: #011875;">Nos <span class="u-accent">partenaires</span></h2>
        </div>
        <div class="partner-marquee">
            <div class="partner-track" id="partnerTrack">
                <?php foreach ( $logos_loop as $logo_url ) : ?>
                <div class="partner-item">
                    <div class="partner-badge">
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="Logo partenaire" style="max-width: 100%; max-height: 50px; width: auto; height: auto;">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<style>
/* ========== PARTENAIRES – CHARTE TOGOLAISE ========== */
.partenaires {
    padding: 60px 0;
    background: #ffffff;
    border-top: 1px solid #eef2f7;
    border-bottom: 1px solid #eef2f7;
}
.section-head.center {
    text-align: center;
    margin-bottom: 40px;
}
.tag {
    display: inline-block;
    background: rgba(206,17,38,0.1);
    color: #CE1126;
    padding: 6px 18px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 15px;
}
.section-head h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    font-weight: 800;
    color: #006A4E;
    margin-bottom: 10px;
}
.u-accent {
    position: relative;
    display: inline-block;
}
.u-accent::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #FCD116, #CE1126);
    border-radius: 3px;
}
.partner-marquee {
    overflow: hidden;
    position: relative;
    width: 100%;
}
.partner-marquee::before,
.partner-marquee::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 100px;
    z-index: 2;
    pointer-events: none;
}
.partner-marquee::before {
    left: 0;
    background: linear-gradient(90deg, #ffffff, transparent);
}
.partner-marquee::after {
    right: 0;
    background: linear-gradient(270deg, #ffffff, transparent);
}
.partner-track {
    display: flex;
    gap: 40px;
    animation: marquee 30s linear infinite;
    width: max-content;
}
.partner-track:hover {
    animation-play-state: paused;
}
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.partner-item {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    height: 80px;
}
.partner-badge {
    background: #f9fafb;
    border-radius: 16px;
    padding: 12px 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
    border: 1px solid #eef2f7;
    height: 70px;
}
.partner-badge:hover {
    background: #ffffff;
    border-color: #FCD116;
    box-shadow: 0 6px 14px rgba(0,0,0,0.05);
    transform: scale(1.02);
}
@media (max-width: 768px) {
    .partenaires {
        padding: 40px 0;
    }
    .section-head h2 {
        font-size: 1.8rem;
    }
    .partner-item {
        height: 60px;
    }
    .partner-badge {
        padding: 8px 16px;
        height: 55px;
    }
    .partner-badge img {
        max-height: 40px;
    }
    .partner-track {
        gap: 25px;
    }
}
</style>

<script>
// L'animation est gérée via CSS, aucun script supplémentaire nécessaire
</script>