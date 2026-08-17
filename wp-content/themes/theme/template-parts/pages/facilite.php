<?php
/**
 * Template part : Page "Facilité" générique – version améliorée
 * Récupère le contenu, les chiffres clés et les projets depuis la page (slug facilite-*)
 *
 * @package TogoGreenFund
 */

$page = get_queried_object();
if ( ! $page || strpos( $page->post_name, 'facilite-' ) !== 0 ) {
    echo '<div class="container" style="padding:80px 0; text-align:center;"><p>Page non trouvée.</p></div>';
    return;
}

$page_id = $page->ID;
$page_title = get_the_title( $page );
$page_content = apply_filters( 'the_content', get_post_field( 'post_content', $page ) );

// Préfixe dynamique
$prefix = str_replace( 'facilite-', '', $page->post_name );
$prefix = str_replace( '-', '_', $prefix );

// Récupération des chiffres clés
$chiffres = get_post_meta( $page_id, '_fvt_' . $prefix . '_chiffres', true );
if ( empty( $chiffres ) || ! is_array( $chiffres ) ) {
    $chiffres = array( '100+' => 'Bénéficiaires', '25' => 'Projets financés' );
}

// Récupération des projets
$projets = get_post_meta( $page_id, '_fvt_' . $prefix . '_projets', true );
if ( empty( $projets ) || ! is_array( $projets ) ) {
    $projets = array();
}

// Déterminer l'icône, la couleur et une image de fond pour l'en-tête
$icon = 'fa-handshake';
$color = '#0a6e3e';
$pattern = 'url("data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")';
if ( strpos( $page->post_name, 'prive' ) !== false || strpos( $page->post_name, 'prive' ) !== false ) {
    $icon = 'fa-building';
    $color = '#1a5276';
}
if ( strpos( $page->post_name, 'collectivite' ) !== false || strpos( $page->post_name, 'territoriale' ) !== false ) {
    $icon = 'fa-city';
    $color = '#6c3483';
}
?>
<style>
/* ============================================================
   PAGE FACILITÉ – STYLE AMÉLIORÉ
   ============================================================ */
:root {
    --facilite-color: <?php echo $color; ?>;
    --facilite-light: <?php echo $color; ?>22;
    --facilite-dark: <?php echo $color; ?>cc;
    --facilite-shadow: 0 8px 32px rgba(0,0,0,0.08);
}

.facilite-header {
    background: linear-gradient(145deg, #f6faf7 0%, #ffffff 100%);
    padding: 50px 0 55px;
    border-bottom: 1px solid #e0ebe6;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.facilite-header::before {
    content: '';
    position: absolute;
    top: -60%;
    right: -20%;
    width: 80%;
    height: 200%;
    background: radial-gradient(circle at 70% 30%, var(--facilite-light) 0%, transparent 70%);
    pointer-events: none;
    opacity: 0.6;
}
.facilite-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--facilite-color) 0 33%, #ffce00 33% 66%, #d21034 66% 100%);
}
.breadcrumb-wrapper {
    margin-bottom: 20px;
}
.breadcrumb-wrapper ol {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    list-style: none;
    padding: 0;
    margin: 0;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    flex-wrap: wrap;
    background: rgba(255,255,255,0.55);
    padding: 10px 24px;
    border-radius: 40px;
    box-shadow: 0 2px 12px rgba(6,61,36,0.06);
    display: inline-flex;
}
.breadcrumb-wrapper ol li a {
    color: #4d6a59;
    text-decoration: none;
    transition: color 0.2s;
}
.breadcrumb-wrapper ol li a:hover {
    color: var(--facilite-color);
}
.breadcrumb-wrapper ol li a i {
    margin-right: 6px;
    font-size: 0.85rem;
    color: var(--facilite-color);
}
.breadcrumb-wrapper .separator {
    color: #ffce00;
    font-weight: 300;
    font-size: 1.1rem;
}
.breadcrumb-wrapper .current {
    color: var(--facilite-color);
    font-weight: 700;
}
.facilite-header__badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 20px;
    border-radius: 30px;
    background: var(--facilite-light);
    color: var(--facilite-color);
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 18px;
}
.facilite-header__badge i {
    color: var(--facilite-color);
    font-size: 14px;
}
.facilite-header h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: #063d24;
    text-transform: uppercase;
    font-size: 3.2rem;
    letter-spacing: -0.5px;
    margin: 0;
}
.title-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--facilite-color), #ffce00);
    margin: 16px auto 0;
    border-radius: 4px;
}
.facilite-header__sub {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.1rem;
    color: #5a6a5f;
    max-width: 600px;
    margin: 18px auto 0;
}

/* ===== CONTENU ===== */
.facilite-content {
    padding: 50px 0 30px;
    background: #ffffff;
}

/* Introduction */
.facilite-intro {
    margin: 0 0 50px;
}
.facilite-intro__card {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    background: #fff;
    border-radius: 24px;
    box-shadow: var(--facilite-shadow);
    overflow: hidden;
    border: 1px solid #e7f0ea;
    transition: transform 0.3s, box-shadow 0.3s;
}
.facilite-intro__card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.10);
}
.facilite-intro__texte {
    padding: 40px 36px;
}
.facilite-intro__texte .first-paragraph {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.12rem;
    font-weight: 500;
    color: #063d24;
    margin-bottom: 16px;
}
.facilite-intro__texte .first-paragraph::first-letter {
    font-size: 3.8rem;
    font-weight: 800;
    font-family: 'Playfair Display', serif;
    color: var(--facilite-color);
    float: left;
    line-height: 0.75;
    margin-right: 14px;
    margin-top: 6px;
}
.facilite-intro__texte p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.05rem;
    line-height: 1.8;
    color: #2c3e34;
    margin: 0 0 16px;
}
.facilite-intro__texte p:last-child {
    margin-bottom: 0;
}
.facilite-intro__image {
    overflow: hidden;
}
.facilite-intro__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s;
}
.facilite-intro__card:hover .facilite-intro__image img {
    transform: scale(1.05);
}

/* Chiffres clés */
.facilite-chiffres {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin: 50px 0;
}
.chiffre-item {
    background: #ffffff;
    border: 1px solid #e7f0ea;
    border-radius: 20px;
    padding: 28px 16px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
    position: relative;
    overflow: hidden;
}
.chiffre-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--facilite-color), #ffce00);
    opacity: 0;
    transition: opacity 0.3s;
}
.chiffre-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.08);
    border-color: var(--facilite-color);
}
.chiffre-item:hover::before {
    opacity: 1;
}
.chiffre-item__nombre {
    display: block;
    font-family: 'Playfair Display', serif;
    font-size: 2.4rem;
    font-weight: 800;
    color: var(--facilite-color);
}
.chiffre-item__label {
    display: block;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    color: #5a6a5f;
    margin-top: 4px;
}

/* Sections */
.facilite-section {
    margin-top: 50px;
}
.facilite-section__title {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    font-weight: 700;
    color: #063d24;
    margin: 0 0 24px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.facilite-section__title i {
    color: var(--facilite-color);
    font-size: 1.6rem;
}

/* Projets */
.facilite-projets {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}
.projet-item {
    background: #fff;
    border: 1px solid #e7f0ea;
    border-radius: 20px;
    overflow: hidden;
    transition: transform 0.4s, box-shadow 0.4s;
}
.projet-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 32px rgba(0,0,0,0.08);
}
.projet-item__image {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #dce8e0;
}
.projet-item__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s;
}
.projet-item:hover .projet-item__image img {
    transform: scale(1.06);
}
.projet-item__statut {
    position: absolute;
    top: 14px;
    right: 14px;
    padding: 4px 14px;
    border-radius: 20px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    backdrop-filter: blur(4px);
    background: rgba(0,0,0,0.6);
    color: #fff;
}
.statut--encours {
    background: rgba(10,110,62,0.85);
    color: #fff;
}
.statut--termine {
    background: rgba(210,16,52,0.85);
    color: #fff;
}
.statut--finance {
    background: rgba(26,82,118,0.85);
    color: #fff;
}
.projet-item__content {
    padding: 22px 24px 26px;
}
.projet-item__meta {
    display: flex;
    gap: 16px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    color: #5a6a5f;
    margin-bottom: 8px;
}
.projet-item__meta i {
    color: var(--facilite-color);
    margin-right: 4px;
}
.projet-item__titre {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    font-weight: 700;
    color: #063d24;
    margin: 0 0 8px;
}
.projet-item__desc {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    line-height: 1.6;
    color: #5a6a5f;
    margin: 0 0 16px;
}
.projet-item__impact {
    display: flex;
    flex-wrap: wrap;
    gap: 12px 20px;
    padding-top: 14px;
    border-top: 1px solid #e7f0ea;
}
.projet-item__impact .impact-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    flex: 1 1 auto;
    min-width: 50px;
}
.projet-item__impact .impact-item__valeur {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--facilite-color);
}
.projet-item__impact .impact-item__label {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.75rem;
    color: #7a8a7f;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* ===== CTA ===== */
.facilite-cta {
    background: linear-gradient(105deg, #063d24 0%, #042a19 100%);
    padding: 76px 0;
    text-align: center;
    margin-top: 60px;
    position: relative;
    overflow: hidden;
}
.facilite-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, var(--facilite-color) 0 33%, #ffce00 33% 66%, #d21034 66% 100%);
    opacity: 0.06;
}
.facilite-cta h2 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 800;
    color: #fff;
    font-size: 2.2rem;
    margin: 0 0 12px;
    position: relative;
    z-index: 1;
}
.cta-divider {
    width: 60px;
    height: 3px;
    background: #ffce00;
    margin: 10px auto 22px;
    position: relative;
    z-index: 1;
}
.facilite-cta p {
    font-family: 'Kumbh Sans', sans-serif;
    color: rgba(255,255,255,0.85);
    font-size: 1.15rem;
    margin-bottom: 32px;
    position: relative;
    z-index: 1;
}
.cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: #ffce00;
    color: #063d24;
    padding: 16px 44px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    position: relative;
    z-index: 1;
}
.cta-btn:hover {
    background: #ffffff;
    color: #063d24;
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.25);
}
.cta-btn i {
    transition: transform 0.3s;
}
.cta-btn:hover i {
    transform: translateX(4px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 992px) {
    .facilite-intro__card {
        grid-template-columns: 1fr;
    }
    .facilite-intro__texte {
        padding: 30px 24px;
    }
    .facilite-intro__image {
        height: 250px;
    }
    .facilite-chiffres {
        grid-template-columns: repeat(2, 1fr);
    }
    .facilite-projets {
        grid-template-columns: 1fr;
    }
}
@media (max-width: 768px) {
    .facilite-header h1 {
        font-size: 2.4rem;
    }
    .facilite-cta h2 {
        font-size: 1.8rem;
    }
    .facilite-chiffres {
        gap: 12px;
    }
    .chiffre-item__nombre {
        font-size: 2rem;
    }
}
@media (max-width: 576px) {
    .facilite-header h1 {
        font-size: 2rem;
    }
    .facilite-header__sub {
        font-size: 1rem;
    }
    .facilite-chiffres {
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }
    .chiffre-item {
        padding: 20px 10px;
    }
    .chiffre-item__nombre {
        font-size: 1.6rem;
    }
    .facilite-intro__texte .first-paragraph::first-letter {
        font-size: 2.8rem;
    }
}
</style>

<!-- ============================================================
     EN‑TÊTE
     ============================================================ -->
<section class="facilite-header" style="--facilite-color: <?php echo $color; ?>;">
    <div class="container">
        <nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
            <ol>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li><a href="<?php echo esc_url( home_url( '/instrument-financier' ) ); ?>">Instrument Financier</a></li>
                <li class="separator">›</li>
                <li><a href="<?php echo esc_url( home_url( '/facilite' ) ); ?>">Facilité</a></li>
                <li class="separator">›</li>
                <li class="current"><?php echo esc_html( $page_title ); ?></li>
            </ol>
        </nav>
        <span class="facilite-header__badge"><i class="fas <?php echo $icon; ?>"></i> Togo Green Fund – Facilité</span>
        <h1><?php echo esc_html( $page_title ); ?></h1>
        <div class="title-underline"></div>
        <p class="facilite-header__sub"><?php echo esc_html( get_post_meta( $page_id, '_facilite_subtitle', true ) ?: 'Découvrez les solutions financières adaptées à vos besoins.' ); ?></p>
    </div>
</section>

<!-- ============================================================
     CONTENU
     ============================================================ -->
<section class="facilite-content">
    <div class="container">
        <!-- Introduction -->
        <div class="facilite-intro">
            <div class="facilite-intro__card">
                <div class="facilite-intro__texte">
                    <?php echo $page_content ?: '<p class="first-paragraph">La Facilité du Togo Green Fund propose des solutions financières sur mesure pour accompagner vos projets de développement durable.</p>'; ?>
                </div>
                <div class="facilite-intro__image">
                    <?php
                    $image_url = get_the_post_thumbnail_url( $page_id, 'large' );
                    if ( empty( $image_url ) ) {
                        $image_url = 'https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?w=600&h=400&fit=crop';
                    }
                    ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $page_title ); ?>" loading="lazy">
                </div>
            </div>
        </div>

        <!-- Chiffres clés -->
        <div class="facilite-chiffres">
            <?php foreach ( $chiffres as $valeur => $label ) : ?>
                <div class="chiffre-item">
                    <span class="chiffre-item__nombre"><?php echo esc_html( $valeur ); ?></span>
                    <span class="chiffre-item__label"><?php echo esc_html( $label ); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Projets (si existants) -->
        <?php if ( ! empty( $projets ) ) : ?>
        <div class="facilite-section">
            <h2 class="facilite-section__title"><i class="fas fa-hand-holding-heart"></i> Projets accompagnés</h2>
            <div class="facilite-projets">
                <?php foreach ( $projets as $projet ) :
                    $statut_label = ( $projet['statut'] === 'en_cours' ) ? 'En cours' : 
                                   ( ( $projet['statut'] === 'finance' ) ? 'Financé' : 'Terminé' );
                    $statut_class = ( $projet['statut'] === 'en_cours' ) ? 'statut--encours' : 
                                   ( ( $projet['statut'] === 'finance' ) ? 'statut--finance' : 'statut--termine' );
                ?>
                    <article class="projet-item">
                        <div class="projet-item__image">
                            <img src="<?php echo esc_url( $projet['image'] ?: 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=600&h=400&fit=crop' ); ?>" alt="<?php echo esc_attr( $projet['titre'] ); ?>" loading="lazy">
                            <span class="projet-item__statut <?php echo esc_attr( $statut_class ); ?>"><?php echo esc_html( $statut_label ); ?></span>
                        </div>
                        <div class="projet-item__content">
                            <div class="projet-item__meta">
                                <span><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $projet['localisation'] ?? 'Togo' ); ?></span>
                                <span><i class="fas fa-tag"></i> <?php echo esc_html( $projet['categorie'] ?? 'Durable' ); ?></span>
                            </div>
                            <h3 class="projet-item__titre"><?php echo esc_html( $projet['titre'] ); ?></h3>
                            <p class="projet-item__desc"><?php echo esc_html( $projet['description'] ); ?></p>
                            <?php if ( ! empty( $projet['impact'] ) ) : ?>
                            <div class="projet-item__impact">
                                <?php foreach ( $projet['impact'] as $valeur => $label ) : ?>
                                    <div class="impact-item">
                                        <span class="impact-item__valeur"><?php echo esc_html( $valeur ); ?></span>
                                        <span class="impact-item__label"><?php echo esc_html( $label ); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>

<!-- ============================================================
     CTA
     ============================================================ -->
<section class="facilite-cta">
    <div class="container">
        <h2>Bénéficiez de la Facilité TGF</h2>
        <div class="cta-divider"></div>
        <p>Que vous soyez du secteur privé ou d'une collectivité territoriale, nous vous accompagnons.</p>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="cta-btn">
            Demander une facilitation <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>