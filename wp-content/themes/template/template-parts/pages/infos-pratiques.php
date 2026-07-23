<?php
/**
 * Template part pour la page "Infos pratiques" – version harmonisée avec le header ATC
 * Affiche les articles de la catégorie 'infos-pratiques' sous forme de cartes stylisées
 * Couleurs : bleu #011875, rouge #B92F29, jaune #FFCC00
 */

$category_slug = 'infos-pratiques';
$category = get_category_by_slug($category_slug);
if (!$category) {
    echo '<div class="container" style="padding: 80px 0; text-align: center;"><p>⚠️ La catégorie <strong>' . esc_html($category_slug) . '</strong> n\'existe pas. Veuillez la créer dans l\'administration.</p></div>';
    return;
}

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'cat'            => $category->term_id,
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$infos_query = new WP_Query($args);

$page_title = single_cat_title('', false);
if (empty($page_title)) $page_title = 'Infos pratiques';
?>

<!-- ===== BREADCRUMB + TITRE CENTRÉ ===== -->
<section class="infos-header">
    <div class="container">
        <nav class="breadcrumb-wrapper">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li class="current"><?php echo esc_html($page_title); ?></li>
            </ul>
        </nav>
        <h1><?php echo esc_html($page_title); ?></h1>
        <div class="title-underline"></div>
        
    
    </div>
</section>

<!-- ===== GRILLE DES INFOS PRATIQUES ===== -->
<section class="infos-grid-section">
    <div class="container">
        <?php if ($infos_query->have_posts()) : ?>
            <div class="infos-grid">
                <?php $counter = 1; while ($infos_query->have_posts()) : $infos_query->the_post(); 
                    $post_id = get_the_ID();
                    $title = get_the_title();
                    $excerpt = get_the_excerpt();
                    $date = get_the_date('d/m/Y');
                    
                    // Icône dynamique (selon le contenu ou aléatoire)
                    $icons = array('fa-info-circle', 'fa-lightbulb', 'fa-file-alt', 'fa-map-signs', 'fa-question-circle', 'fa-check-circle', 'fa-clock', 'fa-phone-alt');
                    $icon = $icons[($counter - 1) % count($icons)];
                ?>
                    <div class="info-card">
                        <div class="card-header">
                            <div class="card-icon"><i class="fas <?php echo esc_attr($icon); ?>"></i></div>
                            <div class="card-number"><?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?></div>
                        </div>
                        <div class="card-body">
                            <div class="card-date">
                                <i class="far fa-calendar-alt"></i> <?php echo esc_html($date); ?>
                            </div>
                            <h3><?php echo esc_html($title); ?></h3>
                            <p class="card-excerpt"><?php echo esc_html(wp_trim_words($excerpt, 22, '…')); ?></p>
                            <a href="<?php the_permalink(); ?>" class="card-link">
                                Lire la suite <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php $counter++; endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="no-infos">
                <i class="far fa-file-alt"></i>
                <h3>Aucune information pour le moment</h3>
                <p>Revenez bientôt pour découvrir nos guides et conseils pratiques.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-home">Retour à l'accueil</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ===== APPEL À L'ACTION ===== -->
<section class="infos-cta">
    <div class="container">
        <h2>Besoin d’aide personnalisée ?</h2>
        <div class="cta-divider"></div>
        <p>Contactez notre équipe pour toute question ou litige.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-btn">
            Nous contacter <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<style>
/* ============================================================
   PAGE INFOS PRATIQUES – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
   ============================================================ */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
}

/* --- En-tête --- */
.infos-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.infos-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--bleu-atc), var(--jaune-atc), var(--rouge-atc), var(--jaune-atc), var(--bleu-atc));
}
.breadcrumb-wrapper ul {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
}
.breadcrumb-wrapper ul li a {
    color: #5b6e8c;
    text-decoration: none;
    transition: color 0.2s;
}
.breadcrumb-wrapper ul li a:hover {
    color: var(--rouge-atc);
}
.breadcrumb-wrapper ul li a i {
    margin-right: 5px;
    font-size: 0.8rem;
}
.breadcrumb-wrapper .separator {
    color: var(--rouge-atc);
    font-weight: 300;
}
.breadcrumb-wrapper .current {
    color: var(--bleu-atc);
    font-weight: 600;
}
.infos-header h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--bleu-atc);
    font-size: 3rem;
    letter-spacing: -0.5px;
    margin: 10px 0 0 0;
}
.title-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--jaune-atc), var(--rouge-atc));
    margin: 20px auto 10px;
    border-radius: 4px;
}
.subtitle {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5b6e8c;
    font-size: 1rem;
    margin: 0;
}

/* --- Grille --- */
.infos-grid-section {
    padding: 60px 0 80px;
    background: #ffffff;
}
.infos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

/* --- Carte --- */
.info-card {
    background: #ffffff;
    border-radius: 24px;
    box-shadow: 0 8px 24px rgba(1,24,117,0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    border: 1px solid #eef2f7;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    position: relative;
}
.info-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(1,24,117,0.12);
    border-color: var(--bleu-atc);
}
.card-header {
    padding: 20px 24px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.card-icon {
    width: 48px;
    height: 48px;
    background: rgba(1,24,117,0.08);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s, transform 0.3s;
}
.card-icon i {
    font-size: 1.4rem;
    color: var(--bleu-atc);
    transition: color 0.3s;
}
.info-card:hover .card-icon {
    background: var(--bleu-atc);
    transform: scale(1.05) rotate(-2deg);
}
.info-card:hover .card-icon i {
    color: #ffffff;
}
.card-number {
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    font-weight: 800;
    color: rgba(1,24,117,0.06);
    line-height: 1;
}
.card-body {
    padding: 16px 24px 28px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.card-date {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.7rem;
    font-weight: 700;
    color: var(--rouge-atc);
    background: rgba(185,47,41,0.08);
    padding: 4px 14px;
    border-radius: 40px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-bottom: 14px;
    align-self: flex-start;
}
.card-date i {
    font-size: 0.7rem;
    color: var(--jaune-atc);
}
.card-body h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--bleu-atc);
    font-size: 1.3rem;
    margin: 0 0 12px 0;
    line-height: 1.3;
}
.card-excerpt {
    font-family: 'Kumbh Sans', sans-serif;
    color: #4b5563;
    font-size: 0.9rem;
    line-height: 1.65;
    margin: 0 0 20px 0;
    flex: 1;
    text-align: justify;
    text-justify: inter-word;
    hyphens: auto;
}
.card-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    font-size: 0.85rem;
    color: var(--rouge-atc);
    text-decoration: none;
    transition: all 0.2s ease;
    align-self: flex-start;
    border-bottom: 2px solid transparent;
    padding-bottom: 2px;
}
.card-link i {
    font-size: 0.7rem;
    transition: transform 0.2s ease;
}
.info-card:hover .card-link {
    border-bottom-color: var(--rouge-atc);
    gap: 12px;
}
.info-card:hover .card-link i {
    transform: translateX(4px);
}

/* --- Message "aucune information" --- */
.no-infos {
    text-align: center;
    padding: 60px 20px;
    background: var(--gris-fond);
    border-radius: 32px;
}
.no-infos i {
    font-size: 4rem;
    color: var(--jaune-atc);
    opacity: 0.5;
    margin-bottom: 20px;
}
.no-infos h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--bleu-atc);
    margin: 0 0 10px;
}
.no-infos p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5b6e8c;
    margin-bottom: 25px;
}
.btn-home {
    display: inline-block;
    background: var(--rouge-atc);
    color: #fff;
    padding: 10px 28px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-family: 'Kumbh Sans', sans-serif;
    transition: background 0.3s;
}
.btn-home:hover {
    background: #8f1f1a;
}

/* --- CTA --- */
.infos-cta {
    background: linear-gradient(105deg, var(--bleu-atc) 0%, #010f52 100%);
    padding: 70px 0;
    text-align: center;
}
.infos-cta h2 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 800;
    color: #fff;
    font-size: 2rem;
    margin: 0 0 10px 0;
}
.cta-divider {
    width: 60px;
    height: 3px;
    background: var(--jaune-atc);
    margin: 10px auto 20px;
}
.infos-cta p {
    font-family: 'Kumbh Sans', sans-serif;
    color: rgba(255,255,255,0.85);
    font-size: 1.1rem;
    margin-bottom: 30px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}
.cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: var(--jaune-atc);
    color: var(--bleu-atc);
    padding: 14px 40px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.cta-btn:hover {
    background: #ffffff;
    color: var(--bleu-atc);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}
.cta-btn i {
    transition: transform 0.3s;
}
.cta-btn:hover i {
    transform: translateX(4px);
}

/* --- Responsive --- */
@media (max-width: 768px) {
    .infos-header h1 {
        font-size: 2.2rem;
    }
    .infos-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .card-body {
        padding: 14px 18px 22px;
    }
    .card-body h3 {
        font-size: 1.1rem;
    }
    .infos-cta h2 {
        font-size: 1.6rem;
    }
}
</style>