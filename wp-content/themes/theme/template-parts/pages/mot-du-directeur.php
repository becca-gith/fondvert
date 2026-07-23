<?php
/**
 * Template part pour la page "Mot du Directeur" – version épurée sans photo
 * Récupère la page dont le slug est 'mot-du-directeur'
 */

$director_page = get_page_by_path('mot-du-directeur');
if (!$director_page) {
    echo '<div class="container" style="padding: 80px 0; text-align: center;"><p>Aucune page "Mot du Directeur" trouvée. Veuillez créer une page avec le slug <strong>mot-du-directeur</strong>.</p></div>';
    return;
}

$page_title = get_the_title($director_page);
$page_content = apply_filters('the_content', get_post_field('post_content', $director_page));
?>

<!-- ===== BREADCRUMB + TITRE CENTRÉ ===== -->
<section class="director-header">
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

<!-- ===== MESSAGE CENTRÉ ===== -->
<section class="director-content">
    <div class="container">
        <div class="director-message-box">
            <span class="quote-icon">"</span>
            <div class="director-text">
                <?php echo $page_content; ?>
            </div>
            
            
        </div>
    </div>
</section>

<!-- ===== VALEURS (3 cartes) ===== -->
<section class="director-values">
    <div class="container">
        <div class="section-head center">
            <span class="tag">Nos valeurs</span>
            <h2>Ce qui nous anime</h2>
            <div class="divider"></div>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <i class="fas fa-shield-alt"></i>
                <h4>Indépendance</h4>
                <p>Sans affiliation politique ou commerciale, nous défendons l'intérêt général.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-hand-holding-heart"></i>
                <h4>Solidarité</h4>
                <p>Accompagner chaque citoyen face aux difficultés de consommation.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-balance-scale"></i>
                <h4>Équité</h4>
                <p>Lutter contre les abus et pratiques déloyales sur le marché.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== APPEL À L'ACTION ===== -->
<section class="director-cta">
    <div class="container">
        <h2>Soyez acteur du changement</h2>
        <div class="cta-divider"></div>
        <p>Votre adhésion renforce notre capacité à défendre vos droits.</p>
        <a href="<?php echo esc_url(home_url('/adhesion')); ?>" class="cta-btn">
            Adhérer maintenant <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<style>
/* ============================================================
   PAGE MOT DU DIRECTEUR – SANS PHOTO – CHARTE ATC
   ============================================================ */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
}

/* --- En-tête --- */
.director-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.director-header::after {
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
.director-header h1 {
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

/* --- Contenu principal (message centré) --- */
.director-content {
    padding: 70px 0;
    background: #ffffff;
}
.director-message-box {
    max-width: 820px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    text-align: center;
}
.quote-icon {
    font-family: 'Playfair Display', serif;
    font-size: 5rem;
    line-height: 1;
    color: var(--rouge-atc);
    opacity: 0.2;
    display: block;
    margin-bottom: -20px;
}
.director-text {
    font-family: 'Kumbh Sans', sans-serif;
    color: #2c3e50;
    font-size: 1.05rem;
    line-height: 1.8;
    text-align: justify;          /* ← Texte justifié */
    text-justify: inter-word;
    hyphens: auto;
}
.director-text p {
    margin-bottom: 1.2rem;
}
.director-text h1,
.director-text h2,
.director-text h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--bleu-atc);
    margin-top: 1.5rem;
    margin-bottom: 1rem;
    text-align: left;            /* Les sous-titres restent alignés à gauche pour lisibilité */
}
.director-text strong {
    color: var(--rouge-atc);
    font-weight: 700;
}
.director-text ul,
.director-text ol {
    margin-left: 1.8rem;
    margin-bottom: 1.2rem;
    text-align: left;
}
.director-text li {
    margin-bottom: 0.6rem;
}

/* Signature centrée */
.director-signature {
    margin-top: 40px;
    text-align: center;
}
.sig-avatar {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--bleu-atc), #010f52);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    color: white;
    font-size: 1.8rem;
    font-weight: 800;
    font-family: 'Kumbh Sans', sans-serif;
}
.director-signature h3 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 800;
    color: var(--bleu-atc);
    margin: 0;
}
.director-signature p {
    color: var(--rouge-atc);
    font-weight: 600;
    margin-top: 5px;
    font-family: 'Kumbh Sans', sans-serif;
}

.btn-join {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, var(--rouge-atc), #8f1f1a);
    color: white;
    padding: 14px 36px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    margin-top: 30px;
    box-shadow: 0 6px 18px rgba(185,47,41,0.3);
}
.btn-join:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(185,47,41,0.4);
    background: linear-gradient(135deg, #e03a2a, var(--rouge-atc));
}

/* --- Valeurs --- */
.director-values {
    background: var(--gris-fond);
    padding: 80px 0;
}
.section-head.center {
    text-align: center;
    margin-bottom: 50px;
}
.section-head .tag {
    display: inline-block;
    background: rgba(185,47,41,0.10);
    color: var(--rouge-atc);
    padding: 6px 20px;
    border-radius: 60px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 16px;
}
.section-head h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2.3rem;
    font-weight: 800;
    color: var(--bleu-atc);
    margin-bottom: 15px;
}
.section-head .divider {
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--jaune-atc), var(--rouge-atc));
    margin: 0 auto;
}
.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 20px;
}
.value-card {
    background: #ffffff;
    border-radius: 24px;
    padding: 35px 25px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #eef2f7;
    box-shadow: 0 4px 12px rgba(1,24,117,0.05);
}
.value-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 35px rgba(1,24,117,0.10);
    border-color: var(--bleu-atc);
}
.value-card i {
    font-size: 2.5rem;
    color: var(--rouge-atc);
    transition: color 0.3s;
}
.value-card:hover i {
    color: var(--bleu-atc);
}
.value-card h4 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 800;
    color: var(--bleu-atc);
    margin: 20px 0 10px;
}
.value-card p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5b6e8c;
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0;
}

/* --- CTA final --- */
.director-cta {
    background: linear-gradient(105deg, var(--bleu-atc) 0%, #010f52 100%);
    padding: 70px 0;
    text-align: center;
}
.director-cta h2 {
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
.director-cta p {
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
    .director-header h1 {
        font-size: 2.2rem;
    }
    .section-head h2 {
        font-size: 1.8rem;
    }
    .director-cta h2 {
        font-size: 1.6rem;
    }
    .director-text {
        font-size: 0.95rem;
    }
    .values-grid {
        grid-template-columns: 1fr;
    }
    .director-message-box {
        padding: 0 10px;
    }
}
</style>