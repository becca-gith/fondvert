<?php
/**
 * Template part pour la page "Activités" – version harmonisée avec le header ATC
 * Affiche les articles de la catégorie 'activites' sous forme de cartes
 * avec date de publication mise en avant
 */

$category_slug = 'activites';
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
$activities_query = new WP_Query($args);

$page_title = single_cat_title('', false);
if (empty($page_title)) $page_title = 'Nos activités';
?>

<!-- ===== BREADCRUMB + TITRE CENTRÉ ===== -->
<section class="activites-header">
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

<!-- ===== GRILLE DES ACTIVITÉS ===== -->
<section class="activites-grid-section">
    <div class="container">
        <?php if ($activities_query->have_posts()) : ?>
            <div class="activites-grid">
                <?php $counter = 1; while ($activities_query->have_posts()) : $activities_query->the_post(); 
                    $post_id = get_the_ID();
                    $title = get_the_title();
                    $excerpt = get_the_excerpt();
                    $date = get_the_date('d/m/Y');
                ?>
                    <div class="activite-card">
                        <div class="card-header">
                            <div class="card-date">
                                <i class="far fa-calendar-alt"></i> <?php echo esc_html($date); ?>
                            </div>
                            <div class="card-number"><?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?></div>
                        </div>
                        <div class="card-body">
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
            <div class="no-activities">
                <i class="far fa-calendar-times"></i>
                <h3>Aucune activité pour le moment</h3>
                <p>Revenez bientôt pour découvrir nos prochaines actions et événements.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-home">Retour à l'accueil</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ===== APPEL À L'ACTION ===== -->
<section class="activites-cta">
    <div class="container">
        <h2>Soutenez nos actions</h2>
        <div class="cta-divider"></div>
        <p>Rejoignez l’ATC pour contribuer à la protection des consommateurs.</p>
        <a href="<?php echo esc_url(home_url('/adhesion')); ?>" class="cta-btn">
            Devenir membre <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<style>
/* ============================================================
   PAGE ACTIVITÉS – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
   ============================================================ */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
}

/* --- En-tête --- */
.activites-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.activites-header::after {
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
.activites-header h1 {
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
.activites-grid-section {
    padding: 60px 0 80px;
    background: #ffffff;
}
.activites-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 35px;
    max-width: 1200px;
    margin: 0 auto;
}

/* --- Carte activité --- */
.activite-card {
    background: #ffffff;
    border-radius: 28px;
    box-shadow: 0 10px 30px -8px rgba(1,24,117,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    border: 1px solid #eef2f7;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    position: relative;
}
.activite-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -12px rgba(1,24,117,0.15);
    border-color: var(--bleu-atc);
}
.card-header {
    padding: 18px 25px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(1,24,117,0.04);
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
}
.card-date i {
    font-size: 0.7rem;
    color: var(--jaune-atc);
}
.card-number {
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    font-weight: 800;
    color: rgba(1,24,117,0.06);
    line-height: 1;
}
.card-body {
    padding: 20px 25px 28px;
    flex: 1;
    display: flex;
    flex-direction: column;
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
.activite-card:hover .card-link {
    border-bottom-color: var(--rouge-atc);
    gap: 12px;
}
.activite-card:hover .card-link i {
    transform: translateX(4px);
}

/* --- Message "aucune activité" --- */
.no-activities {
    text-align: center;
    padding: 60px 20px;
    background: var(--gris-fond);
    border-radius: 32px;
}
.no-activities i {
    font-size: 4rem;
    color: var(--jaune-atc);
    opacity: 0.5;
    margin-bottom: 20px;
}
.no-activities h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--bleu-atc);
    margin: 0 0 10px;
}
.no-activities p {
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
.activites-cta {
    background: linear-gradient(105deg, var(--bleu-atc) 0%, #010f52 100%);
    padding: 70px 0;
    text-align: center;
}
.activites-cta h2 {
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
.activites-cta p {
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
    .activites-header h1 {
        font-size: 2.2rem;
    }
    .activites-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    .card-body {
        padding: 18px 20px 24px;
    }
    .activites-cta h2 {
        font-size: 1.6rem;
    }
}
</style>