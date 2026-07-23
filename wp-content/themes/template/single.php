<?php
/**
 * Template pour l'affichage d'une activité (single post de la catégorie 'activites')
 * Version adaptée à la charte togolaise (vert, jaune, rouge)
 */

// Vérifier que l'article est bien dans la catégorie 'activites'
$categories = get_the_category();
$is_activite = false;
foreach ($categories as $cat) {
    if ($cat->slug === 'activites') {
        $is_activite = true;
        break;
    }
}
if (!$is_activite) {
    include(get_template_directory() . '/single.php');
    exit;
}

get_header(); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<style>
    /* ========== CHARTE TOGOLAISE ========== */
    :root {
        --vert: #006A4E;
        --vert-fonce: #004d2e;
        --jaune: #FCD116;
        --rouge: #CE1126;
        --rouge-fonce: #9e0b1f;
        --blanc: #FFFFFF;
        --gris-clair: #F8FAFC;
        --gris-moyen: #E2E8F0;
        --gris-texte: #4A5568;
    }

    .single-activite-page {
        font-family: 'Kumbh Sans', sans-serif;
        background: var(--blanc);
        color: #1e293b;
        line-height: 1.6;
    }
    .single-activite-page .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    .single-activite-page .container-sm {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* ========== BREADCRUMB ========== */
    .sp-breadcrumb-area {
        background: var(--gris-clair);
        padding: 28px 0 26px;
        border-bottom: 1px solid var(--gris-moyen);
    }
    .sp-bc-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        flex-wrap: wrap;
    }
    .sp-bc-left {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .sp-bc-nav {
        display: flex;
        align-items: center;
        gap: 4px;
        list-style: none;
    }
    .sp-bc-nav li {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .sp-bc-nav a {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 12px;
        font-weight: 500;
        color: var(--vert);
        text-decoration: none;
        transition: color 0.2s;
    }
    .sp-bc-nav a:hover { color: var(--jaune); }
    .sp-bc-nav a i { font-size: 13px; }
    .sp-bc-sep {
        color: #94a3b8;
        display: flex;
        align-items: center;
    }
    .sp-bc-sep i { font-size: 13px; }
    .sp-bc-current {
        font-size: 12px;
        font-weight: 600;
        color: var(--rouge);
        max-width: 280px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .sp-bc-heading {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sp-bc-accent-v {
        width: 3px;
        height: 28px;
        background: var(--jaune);
        border-radius: 2px;
        flex-shrink: 0;
    }
    .sp-bc-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--vert);
        line-height: 1.15;
        letter-spacing: -0.01em;
    }
    .sp-bc-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 8px;
    }
    .sp-bc-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--blanc);
        border: 1px solid var(--gris-moyen);
        border-radius: 50px;
        padding: 4px 14px;
        font-size: 11px;
        font-weight: 600;
        color: var(--gris-texte);
    }
    .sp-bc-badge i {
        font-size: 13px;
        color: var(--jaune);
    }
    .sp-bc-back {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 500;
        color: var(--vert);
        text-decoration: none;
        transition: color 0.2s;
    }
    .sp-bc-back:hover { color: var(--jaune); }
    .sp-bc-back i { font-size: 14px; }

    /* ========== HERO ========== */
    .sp-hero {
        background: linear-gradient(135deg, var(--vert) 0%, var(--vert-fonce) 100%);
        padding: 64px 0 56px;
        position: relative;
        overflow: hidden;
    }
    .sp-hero::after {
        content: '';
        position: absolute;
        top: -60px;
        right: -60px;
        width: 300px;
        height: 300px;
        border: 40px solid rgba(255,255,255,0.04);
        border-radius: 50%;
        pointer-events: none;
    }
    .sp-hero::before {
        content: '';
        position: absolute;
        bottom: -40px;
        left: -40px;
        width: 200px;
        height: 200px;
        border: 30px solid rgba(252,209,22,0.12);
        border-radius: 50%;
        pointer-events: none;
    }
    .sp-hero-inner {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: flex-start;
        gap: 32px;
    }
    .sp-hero-icon {
        width: 72px;
        height: 72px;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.18);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .sp-hero-icon i {
        font-size: 32px;
        color: var(--blanc);
    }
    .sp-hero-content {
        flex: 1;
    }
    .sp-hero-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        background: rgba(252,209,22,0.25);
        color: var(--jaune);
        padding: 4px 12px;
        border-radius: 50px;
        margin-bottom: 14px;
        border: 1px solid rgba(252,209,22,0.3);
    }
    .sp-hero-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--blanc);
        line-height: 1.2;
        margin-bottom: 16px;
        letter-spacing: -0.01em;
    }
    .sp-hero-accent {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 18px;
    }
    .sp-hero-line {
        width: 32px;
        height: 3px;
        background: var(--jaune);
        border-radius: 2px;
    }
    .sp-hero-dot {
        width: 6px;
        height: 6px;
        background: var(--jaune);
        border-radius: 50%;
    }
    .sp-hero-excerpt {
        font-size: 15px;
        font-weight: 400;
        color: rgba(255,255,255,0.75);
        max-width: 620px;
        line-height: 1.7;
        text-align: justify;
    }

    /* ========== CONTENU PRINCIPAL ========== */
    .sp-body {
        padding: 64px 0 80px;
    }
    .sp-layout {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 48px;
        align-items: flex-start;
    }
    .sp-featured-img {
        width: 100%;
        height: 380px;
        object-fit: cover;
        border-radius: 16px;
        margin-bottom: 36px;
        display: block;
    }
    .sp-content {
        font-family: 'Kumbh Sans', sans-serif;
    }
    .sp-content h2 {
        font-size: 1.45rem;
        font-weight: 700;
        color: var(--vert);
        margin-bottom: 14px;
        margin-top: 36px;
        line-height: 1.3;
    }
    .sp-content h2:first-child { margin-top: 0; }
    .sp-content h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--rouge);
        margin-bottom: 10px;
        margin-top: 24px;
    }
    .sp-content p {
        font-size: 15px;
        color: var(--gris-texte);
        line-height: 1.8;
        margin-bottom: 18px;
        text-align: justify;
    }
    .sp-content ul, .sp-content ol {
        padding-left: 20px;
        margin-bottom: 18px;
    }
    .sp-content li {
        font-size: 15px;
        color: var(--gris-texte);
        line-height: 1.75;
        margin-bottom: 6px;
    }
    .sp-content ul li::marker { color: var(--jaune); }
    .sp-content ol li::marker { color: var(--vert); font-weight: 600; }
    .sp-content a {
        color: var(--rouge);
        text-decoration: underline;
        text-underline-offset: 2px;
    }
    .sp-content blockquote {
        border-left: 3px solid var(--jaune);
        background: #fefaf3;
        padding: 16px 20px;
        margin: 24px 0;
        border-radius: 0 8px 8px 0;
        font-size: 15px;
        color: var(--gris-texte);
        font-style: italic;
        line-height: 1.7;
    }
    .sp-content img {
        max-width: 100%;
        border-radius: 10px;
        margin: 16px 0;
    }

    /* ========== SIDEBAR ========== */
    .sp-sidebar {
        display: flex;
        flex-direction: column;
        gap: 24px;
        position: sticky;
        top: 24px;
    }
    .sp-sidebar-card {
        background: var(--blanc);
        border: 1px solid var(--gris-moyen);
        border-radius: 16px;
        padding: 24px 20px;
    }
    .sp-sidebar-card-title {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--vert);
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f0f5fb;
        display: flex;
        align-items: center;
        gap: 7px;
    }
    .sp-sidebar-card-title i {
        font-size: 16px;
        color: var(--jaune);
    }
    .sp-meta-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .sp-meta-list li {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: var(--gris-texte);
    }
    .sp-meta-list li i {
        font-size: 16px;
        color: var(--vert);
        flex-shrink: 0;
        width: 20px;
        text-align: center;
    }
    .sp-meta-list li strong {
        font-weight: 600;
        color: #1e293b;
    }

    /* ========== BOUTONS DE PARTAGE ========== */
    .share-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 16px;
    }
    .share-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        border: 1px solid var(--gris-moyen);
        background: var(--gris-clair);
        color: #1e293b;
    }
    .share-btn i {
        font-size: 16px;
    }
    .share-btn:hover {
        transform: translateY(-2px);
        background: var(--blanc);
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }
    .share-btn.facebook:hover { border-color: #1877f2; color: #1877f2; }
    .share-btn.twitter:hover { border-color: #1da1f2; color: #1da1f2; }
    .share-btn.whatsapp:hover { border-color: #25d366; color: #25d366; }
    .share-btn.linkedin:hover { border-color: #0077b5; color: #0077b5; }
    .share-btn.email:hover { border-color: #ea4335; color: #ea4335; }
    .share-bottom {
        margin-top: 48px;
        padding-top: 32px;
        border-top: 1px solid var(--gris-moyen);
        text-align: center;
    }
    .share-bottom .share-buttons {
        justify-content: center;
    }
    .share-bottom p {
        color: var(--vert);
    }

    /* ========== CTA CARD ========== */
    .sp-cta-card {
        background: var(--vert);
        border-radius: 16px;
        padding: 24px 20px;
        text-align: center;
    }
    .sp-cta-card i {
        font-size: 32px;
        color: rgba(255,255,255,0.5);
        margin-bottom: 12px;
        display: block;
    }
    .sp-cta-card h4 {
        font-size: 15px;
        font-weight: 700;
        color: var(--blanc);
        margin-bottom: 8px;
    }
    .sp-cta-card p {
        font-size: 13px;
        color: rgba(255,255,255,0.6);
        line-height: 1.55;
        margin-bottom: 18px;
    }
    .sp-cta-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        width: 100%;
        padding: 11px 16px;
        background: var(--jaune);
        color: var(--vert-fonce);
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        border-radius: 10px;
        transition: background 0.2s, transform 0.15s;
    }
    .sp-cta-btn:hover {
        background: var(--blanc);
        color: var(--vert);
        transform: translateY(-1px);
    }
    .sp-cta-btn i { font-size: 16px; }

    /* ========== AUTRES ACTIVITÉS ========== */
    .sp-related-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0;
    }
    .sp-related-list li {
        border-bottom: 1px solid #f1f5f9;
    }
    .sp-related-list li:last-child { border-bottom: none; }
    .sp-related-list a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        padding: 10px 0;
        font-size: 13px;
        font-weight: 500;
        color: var(--gris-texte);
        text-decoration: none;
        transition: color 0.2s;
    }
    .sp-related-list a:hover { color: var(--vert); }
    .sp-related-list a i {
        font-size: 15px;
        color: var(--jaune);
        flex-shrink: 0;
        transition: transform 0.2s;
    }
    .sp-related-list a:hover i { transform: translateX(3px); }

    /* ========== NAVIGATION PREV/NEXT ========== */
    .sp-nav-bottom {
        padding: 32px 0;
        border-top: 1px solid var(--gris-moyen);
        background: var(--gris-clair);
    }
    .sp-nav-bottom-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }
    .sp-nav-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 13px;
        font-weight: 600;
        color: var(--vert);
        text-decoration: none;
        padding: 9px 18px;
        border: 1px solid #dde8f4;
        border-radius: 8px;
        background: var(--blanc);
        transition: background 0.2s, border-color 0.2s, color 0.2s;
    }
    .sp-nav-btn:hover {
        background: var(--vert);
        border-color: var(--vert);
        color: var(--blanc);
    }
    .sp-nav-btn i { font-size: 15px; }
    .sp-nav-center {
        font-size: 13px;
        color: #94a3b8;
    }
    .sp-nav-center a {
        color: #94a3b8;
        text-decoration: none;
    }
    .sp-nav-center a:hover {
        color: var(--vert);
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 900px) {
        .sp-layout {
            grid-template-columns: 1fr;
        }
        .sp-sidebar {
            position: static;
        }
    }
    @media (max-width: 768px) {
        .sp-bc-inner {
            flex-direction: column;
            align-items: flex-start;
        }
        .sp-bc-right {
            align-items: flex-start;
        }
        .sp-hero-inner {
            flex-direction: column;
            gap: 20px;
        }
        .sp-hero-title {
            font-size: 1.7rem;
        }
        .sp-featured-img {
            height: 240px;
        }
        .sp-body {
            padding: 40px 0 56px;
        }
        .share-buttons {
            justify-content: center;
        }
    }
</style>

<?php
// Données de l'activité
$post_id      = get_the_ID();
$post_title   = get_the_title();
$post_content = get_the_content();
$post_excerpt = get_the_excerpt();
$post_date    = get_the_date('d/m/Y');
$featured_img = get_the_post_thumbnail_url($post_id, 'large');
$permalink    = get_permalink();

// Catégorie
$categories = get_the_category();
$cat_name = (!empty($categories)) ? $categories[0]->name : 'Activité';
$cat_slug = (!empty($categories)) ? $categories[0]->slug : 'activites';

// Icône
$icon_class = 'ri-calendar-event-line';

// Champs personnalisés
$lieu = get_post_meta($post_id, 'lieu', true);
$horaire = get_post_meta($post_id, 'horaire', true);

// Autres activités
$related_args = [
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'post__not_in'   => [$post_id],
    'category__in'   => wp_list_pluck($categories, 'term_id'),
    'orderby'        => 'date',
    'order'          => 'DESC'
];
$related_activites = new WP_Query($related_args);

// Navigation prev/next
$prev_post = get_previous_post(true, '', 'category');
$next_post = get_next_post(true, '', 'category');

// URLs de partage
$share_url = urlencode($permalink);
$share_title = urlencode($post_title . ' - ATC Togo');
$share_summary = urlencode(wp_trim_words(wp_strip_all_tags($post_excerpt ?: $post_content), 30, '…'));
?>

<div class="single-activite-page">

    <!-- Breadcrumb -->
    <section class="sp-breadcrumb-area">
        <div class="container">
            <div class="sp-bc-inner">
                <div class="sp-bc-left">
                    <nav aria-label="Fil d'ariane">
                        <ul class="sp-bc-nav">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="ri-home-4-line"></i> Accueil</a></li>
                            <li><span class="sp-bc-sep"><i class="ri-arrow-right-s-line"></i></span><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($cat_name); ?></a></li>
                            <li><span class="sp-bc-sep"><i class="ri-arrow-right-s-line"></i></span><span class="sp-bc-current"><?php echo esc_html($post_title); ?></span></li>
                        </ul>
                    </nav>
                    <div class="sp-bc-heading">
                        <div class="sp-bc-accent-v"></div>
                        <h1 class="sp-bc-title"><?php echo esc_html($post_title); ?></h1>
                    </div>
                </div>
                <div class="sp-bc-right">
                    <span class="sp-bc-badge"><i class="ri-calendar-event-line"></i> ATC – Activité</span>
                    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="sp-bc-back"><i class="ri-arrow-left-line"></i> Retour aux activités</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero -->
    <section class="sp-hero">
        <div class="container">
            <div class="sp-hero-inner">
                <div class="sp-hero-icon"><i class="<?php echo esc_attr($icon_class); ?>"></i></div>
                <div class="sp-hero-content">
                    <span class="sp-hero-tag"><?php echo esc_html($cat_name); ?></span>
                    <h2 class="sp-hero-title"><?php echo esc_html($post_title); ?></h2>
                    <div class="sp-hero-accent"><div class="sp-hero-line"></div><div class="sp-hero-dot"></div><div class="sp-hero-line"></div></div>
                    <?php if (!empty($post_excerpt)) : ?>
                        <p class="sp-hero-excerpt"><?php echo esc_html(wp_trim_words(wp_strip_all_tags($post_excerpt), 40, '…')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenu principal -->
    <section class="sp-body">
        <div class="container">
            <div class="sp-layout">
                <main class="sp-main">
                    <?php if ($featured_img) : ?>
                        <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr($post_title); ?>" class="sp-featured-img">
                    <?php endif; ?>
                    <div class="sp-content"><?php the_content(); ?></div>

                    <!-- Partager après le contenu -->
                    <div class="share-bottom">
                        <p style="font-size: 13px; font-weight: 600; color: var(--vert); margin-bottom: 12px;">Partager cette activité :</p>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="share-btn facebook"><i class="ri-facebook-fill"></i> Facebook</a>
                            <a href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&url=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="share-btn twitter"><i class="ri-twitter-fill"></i> Twitter</a>
                            <a href="https://api.whatsapp.com/send?text=<?php echo $share_title . ' - ' . $share_url; ?>" target="_blank" rel="noopener noreferrer" class="share-btn whatsapp"><i class="ri-whatsapp-fill"></i> WhatsApp</a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>&summary=<?php echo $share_summary; ?>" target="_blank" rel="noopener noreferrer" class="share-btn linkedin"><i class="ri-linkedin-fill"></i> LinkedIn</a>
                            <a href="mailto:?subject=<?php echo $share_title; ?>&body=<?php echo $share_url; ?>" class="share-btn email"><i class="ri-mail-line"></i> E-mail</a>
                        </div>
                    </div>
                </main>

                <aside class="sp-sidebar">
                    <!-- Informations -->
                    <div class="sp-sidebar-card">
                        <p class="sp-sidebar-card-title"><i class="ri-information-line"></i> Informations</p>
                        <ul class="sp-meta-list">
                            <li><i class="ri-price-tag-3-line"></i> <span>Catégorie : <strong><?php echo esc_html($cat_name); ?></strong></span></li>
                            <li><i class="ri-calendar-line"></i> <span>Date : <strong><?php echo esc_html($post_date); ?></strong></span></li>
                            <?php if ($lieu) : ?>
                            <li><i class="ri-map-pin-line"></i> <span>Lieu : <strong><?php echo esc_html($lieu); ?></strong></span></li>
                            <?php endif; ?>
                            <?php if ($horaire) : ?>
                            <li><i class="ri-time-line"></i> <span>Horaire : <strong><?php echo esc_html($horaire); ?></strong></span></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- Partager dans la sidebar -->
                    <div class="sp-sidebar-card">
                        <p class="sp-sidebar-card-title"><i class="ri-share-line"></i> Partager</p>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" class="share-btn facebook"><i class="ri-facebook-fill"></i></a>
                            <a href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&url=<?php echo $share_url; ?>" target="_blank" class="share-btn twitter"><i class="ri-twitter-fill"></i></a>
                            <a href="https://api.whatsapp.com/send?text=<?php echo $share_title . ' - ' . $share_url; ?>" target="_blank" class="share-btn whatsapp"><i class="ri-whatsapp-fill"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" target="_blank" class="share-btn linkedin"><i class="ri-linkedin-fill"></i></a>
                            <a href="mailto:?subject=<?php echo $share_title; ?>&body=<?php echo $share_url; ?>" class="share-btn email"><i class="ri-mail-line"></i></a>
                        </div>
                    </div>

                    <!-- Appel à l'action -->
                    <div class="sp-cta-card">
                        <i class="ri-customer-service-2-line"></i>
                        <h4>Participez à nos actions</h4>
                        <p>Rejoignez l’ATC pour soutenir nos initiatives et défendre vos droits.</p>
                        <a href="<?php echo esc_url(home_url('/adhesion')); ?>" class="sp-cta-btn"><i class="ri-user-add-line"></i> Devenir membre</a>
                    </div>

                    <!-- Autres activités -->
                    <?php if ($related_activites->have_posts()) : ?>
                    <div class="sp-sidebar-card">
                        <p class="sp-sidebar-card-title"><i class="ri-stack-line"></i> Autres activités</p>
                        <ul class="sp-related-list">
                            <?php while ($related_activites->have_posts()) : $related_activites->the_post(); ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <i class="ri-arrow-right-line"></i></a></li>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </aside>
            </div>
        </div>
    </section>

    <!-- Navigation prev/next -->
    <div class="sp-nav-bottom">
        <div class="container">
            <div class="sp-nav-bottom-inner">
                <?php if ($prev_post) : ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="sp-nav-btn"><i class="ri-arrow-left-line"></i> <?php echo esc_html(get_the_title($prev_post->ID)); ?></a>
                <?php else : ?><span></span><?php endif; ?>
                <span class="sp-nav-center"><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">← Toutes les activités</a></span>
                <?php if ($next_post) : ?>
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="sp-nav-btn"><?php echo esc_html(get_the_title($next_post->ID)); ?> <i class="ri-arrow-right-line"></i></a>
                <?php else : ?><span></span><?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>