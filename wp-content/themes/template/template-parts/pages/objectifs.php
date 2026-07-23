<?php
/**
 * Template part pour la page "Objectifs" – version harmonisée avec le header ATC
 * Récupère le contenu de la page dont le slug est 'objectifs'
 */

$objectifs_page = get_page_by_path('objectifs');
if (!$objectifs_page) {
    echo '<div class="container" style="padding: 80px 0; text-align: center;"><p>Aucune page "Objectifs" trouvée. Veuillez créer une page avec le slug <strong>objectifs</strong>.</p></div>';
    return;
}

$page_title = get_the_title($objectifs_page);
$page_content = apply_filters('the_content', get_post_field('post_content', $objectifs_page));

// Fonction pour extraire les éléments d'une liste HTML (<ul>, <ol> ou <li>)
function extract_list_items($html) {
    $items = [];
    if (preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $html, $matches)) {
        foreach ($matches[1] as $match) {
            $items[] = trim(strip_tags($match));
        }
    }
    return $items;
}

$list_items = extract_list_items($page_content);

// Si pas de liste HTML, on tente de séparer par les retours à la ligne
if (empty($list_items)) {
    $lines = explode("\n", strip_tags($page_content));
    foreach ($lines as $line) {
        $line = trim($line);
        if (!empty($line) && !preg_match('/^[0-9]+\./i', $line)) {
            $list_items[] = $line;
        }
    }
}
?>

<!-- ===== BREADCRUMB + TITRE CENTRÉ ===== -->
<section class="objectifs-header">
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

<!-- ===== GRILLE DES OBJECTIFS ===== -->
<section class="objectifs-grid-section">
    <div class="container">
        <?php if (!empty($list_items)) : ?>
            <div class="objectifs-grid">
                <?php 
                $icons = [
                    'fa-graduation-cap',
                    'fa-star-of-life',
                    'fa-flask',
                    'fa-leaf',
                    'fa-handshake',
                    'fa-shield-alt',
                    'fa-balance-scale',
                    'fa-users',
                    'fa-lightbulb',
                    'fa-rocket'
                ];
                $i = 0;
                foreach ($list_items as $item) : 
                ?>
                <div class="objectif-card">
                    <div class="objectif-icon">
                        <i class="fas <?php echo esc_attr($icons[$i % count($icons)]); ?>"></i>
                    </div>
                    <p><?php echo esc_html($item); ?></p>
                </div>
                <?php $i++; endforeach; ?>
            </div>
        <?php else : ?>
            <div class="no-objectifs">
                <p>Aucun objectif défini pour le moment. Veuillez renseigner le contenu de la page "Objectifs" (liste à puces ou texte par ligne).</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ===== APPEL À L'ACTION ===== -->
<section class="objectifs-cta">
    <div class="container">
        <h2>Partagez notre vision</h2>
        <div class="cta-divider"></div>
        <p>Rejoignez l'ATC pour transformer ces objectifs en réalités concrètes pour tous les consommateurs togolais.</p>
        <a href="<?php echo esc_url(home_url('/adhesion')); ?>" class="cta-btn">
            Adhérer maintenant <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<style>
/* ============================================================
   PAGE OBJECTIFS – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
   ============================================================ */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
}

/* --- En-tête --- */
.objectifs-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.objectifs-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #006B3F, var(--jaune-atc), var(--rouge-atc), var(--jaune-atc), #006B3F);
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
.objectifs-header h1 {
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

/* --- Grille des objectifs --- */
.objectifs-grid-section {
    padding: 80px 0;
    background: #ffffff;
}
.objectifs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}
.objectif-card {
    background: var(--gris-fond);
    border-radius: 28px;
    padding: 35px 28px;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    box-shadow: 0 4px 12px rgba(1,24,117,0.04);
}
.objectif-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 35px rgba(1,24,117,0.10);
    background: #ffffff;
    border-color: var(--bleu-atc);
}
.objectif-icon {
    width: 70px;
    height: 70px;
    background: rgba(1,24,117,0.08);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
    transition: all 0.3s ease;
}
.objectif-icon i {
    font-size: 1.8rem;
    color: var(--bleu-atc);
    transition: color 0.3s ease;
}
.objectif-card:hover .objectif-icon {
    background: var(--bleu-atc);
}
.objectif-card:hover .objectif-icon i {
    color: #ffffff;
}
.objectif-card p {
    font-family: 'Kumbh Sans', sans-serif;
    color: var(--bleu-atc);
    font-size: 1rem;
    line-height: 1.6;
    font-weight: 500;
    margin: 0;
    text-align: justify;          /* ← Texte justifié */
    text-justify: inter-word;
    hyphens: auto;
}

/* Message si aucun objectif */
.no-objectifs {
    text-align: center;
    padding: 60px 0;
}
.no-objectifs p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5b6e8c;
}

/* --- CTA final --- */
.objectifs-cta {
    background: linear-gradient(105deg, var(--bleu-atc) 0%, #010f52 100%);
    padding: 70px 0;
    text-align: center;
}
.objectifs-cta h2 {
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
.objectifs-cta p {
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
    .objectifs-header h1 {
        font-size: 2.2rem;
    }
    .objectifs-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .objectif-card {
        padding: 28px 20px;
    }
    .objectifs-cta h2 {
        font-size: 1.6rem;
    }
}
</style>