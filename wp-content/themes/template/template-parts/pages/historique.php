<?php
/**
 * Template part pour la page "Historique" – version design harmonisé avec le header ATC
 * Récupère le contenu de la page dont le slug est 'historique'
 */

$historique_page = get_page_by_path('historique');
if (!$historique_page) {
    echo '<div class="container" style="padding: 80px 0; text-align: center;"><p>Aucune page "Historique" trouvée. Veuillez créer une page avec le slug <strong>historique</strong>.</p></div>';
    return;
}

$page_title = get_the_title($historique_page);
$page_content = apply_filters('the_content', get_post_field('post_content', $historique_page));
?>

<!-- ===== BREADCRUMB & TITRE CENTRÉ ===== -->
<section class="historique-header">
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

<!-- ===== CONTENU PRINCIPAL ===== -->
<section class="historique-content">
    <div class="container">
        <div class="historique-card">
            <div class="historique-texte">
                <?php 
                // Ajout d'une classe pour la première lettre (drop cap)
                $content = $page_content;
                if (preg_match('/<p>(.*?)<\/p>/', $content, $matches)) {
                    $first_para = '<p class="first-paragraph">' . $matches[1] . '</p>';
                    $content = preg_replace('/<p>(.*?)<\/p>/', $first_para, $content, 1);
                }
                echo $content; 
                ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== APPEL À L'ACTION ===== -->
<section class="historique-cta">
    <div class="container">
        <h2>Vous aussi, participez à notre histoire</h2>
        <div class="cta-divider"></div>
        <p>Rejoignez des milliers de consommateurs engagés et faites entendre votre voix.</p>
        <a href="<?php echo esc_url(home_url('/adhesion')); ?>" class="cta-btn">
            Devenir membre <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<style>
/* ============================================================
   PAGE HISTORIQUE – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
   ============================================================ */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
}

/* --- En-tête (breadcrumb + titre) --- */
.historique-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    border-bottom: 1px solid #eef2f7;
    text-align: center;
    position: relative;
}
.historique-header::after {
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
.historique-header h1 {
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
    margin: 20px auto 0;
    border-radius: 4px;
}

/* --- Contenu --- */
.historique-content {
    padding: 70px 0;
    background: #ffffff;
}
.historique-card {
    max-width: 960px;
    margin: 0 auto;
    background: #fff;
    border-radius: 32px;
    box-shadow: 0 20px 35px -10px rgba(1,24,117,0.08);
    padding: 50px 45px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgba(1,24,117,0.04);
}
.historique-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 30px 45px -12px rgba(1,24,117,0.15);
}

/* --- Typographie du contenu --- */
.historique-texte {
    font-family: 'Kumbh Sans', sans-serif;
    color: #2c3e50;
    font-size: 1.05rem;
    line-height: 1.8;
    text-align: justify;          /* ← Justification */
    text-justify: inter-word;
    hyphens: auto;
}
.historique-texte h1,
.historique-texte h2,
.historique-texte h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--bleu-atc);
    margin-top: 2rem;
    margin-bottom: 1rem;
}
.historique-texte h2 {
    font-size: 1.8rem;
    border-left: 4px solid var(--rouge-atc);
    padding-left: 20px;
    text-align: left;             /* Sous-titres alignés à gauche pour lisibilité */
}
.historique-texte h3 {
    font-size: 1.4rem;
}
.historique-texte p {
    margin-bottom: 1.3rem;
}
.historique-texte .first-paragraph {
    font-size: 1.1rem;
    font-weight: 500;
    color: var(--bleu-atc);
}
.historique-texte .first-paragraph::first-letter {
    font-size: 3.5rem;
    font-weight: 800;
    font-family: 'Playfair Display', serif;
    color: var(--rouge-atc);
    float: left;
    line-height: 0.8;
    margin-right: 12px;
    margin-top: 5px;
}
.historique-texte ul,
.historique-texte ol {
    margin-left: 1.8rem;
    margin-bottom: 1.3rem;
}
.historique-texte li {
    margin-bottom: 0.6rem;
}
.historique-texte strong {
    color: var(--rouge-atc);
    font-weight: 700;
}
.historique-texte img {
    border-radius: 24px;
    margin: 1.5rem 0;
    max-width: 100%;
    height: auto;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

/* --- CTA --- */
.historique-cta {
    background: linear-gradient(105deg, var(--bleu-atc) 0%, #010f52 100%);
    padding: 70px 0;
    text-align: center;
    margin-top: 20px;
}
.historique-cta h2 {
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
.historique-cta p {
    font-family: 'Kumbh Sans', sans-serif;
    color: rgba(255,255,255,0.85);
    font-size: 1.1rem;
    margin-bottom: 30px;
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
    .historique-header h1 {
        font-size: 2.2rem;
    }
    .historique-card {
        padding: 30px 25px;
        border-radius: 24px;
    }
    .historique-texte h2 {
        font-size: 1.4rem;
        padding-left: 12px;
    }
    .historique-texte .first-paragraph::first-letter {
        font-size: 2.5rem;
    }
    .historique-cta h2 {
        font-size: 1.6rem;
    }
}
</style>