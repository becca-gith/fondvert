<?php
/**
 * Template part pour la page "Photos" – version harmonisée avec le header ATC
 * Affiche les articles du Custom Post Type 'photo' sous forme de galerie
 * Couleurs : bleu #011875, rouge #B92F29, jaune #FFCC00
 * Photos agrandies : hauteur 320px, colonnes min 340px
 */

// Paramètres de la requête pour le Custom Post Type 'photo'
$args = array(
    'post_type'      => 'photo',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$photos_query = new WP_Query($args);

$page_title = 'Galerie photos';
?>

<!-- ===== BREADCRUMB + TITRE CENTRÉ ===== -->
<section class="photos-header">
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

<!-- ===== GALERIE PHOTOS (AGRANDIE) ===== -->
<section class="photos-gallery">
    <div class="container">
        <?php if ($photos_query->have_posts()) : ?>
            <div class="photos-grid">
                <?php while ($photos_query->have_posts()) : $photos_query->the_post();
                    $photo_title = get_the_title();
                    $photo_desc = get_the_excerpt() ?: wp_trim_words(get_the_content(), 20, '…');
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$image_url) continue;
                ?>
                    <div class="photo-item">
                        <a href="<?php echo esc_url($image_url); ?>" class="photo-link" data-fancybox="gallery" data-caption="<?php echo esc_attr($photo_title . ' – ' . strip_tags($photo_desc)); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($photo_title); ?>" loading="lazy">
                            <div class="photo-overlay">
                                <h3><?php echo esc_html($photo_title); ?></h3>
                                <?php if (!empty($photo_desc)) : ?>
                                    <p><?php echo esc_html(wp_trim_words($photo_desc, 10, '…')); ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="no-photos">
                <i class="fas fa-images"></i>
                <h3>Aucune photo pour le moment</h3>
                <p>Revenez bientôt pour découvrir nos albums.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-home">Retour à l'accueil</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ===== APPEL À L'ACTION ===== -->
<section class="photos-cta">
    <div class="container">
        <h2>Partagez vos souvenirs</h2>
        <div class="cta-divider"></div>
        <p>Vous avez participé à nos événements ? Envoyez-nous vos photos pour enrichir la galerie.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-btn">
            Nous contacter <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- Fancybox lightbox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: true,
            Thumbs: false,
            Toolbar: true,
            closeButton: true,
        });
    });
</script>

<style>
/* ============================================================
   PAGE PHOTOS – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
   ============================================================ */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
}

/* --- En-tête --- */
.photos-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.photos-header::after {
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
.photos-header h1 {
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

/* --- Galerie agrandie --- */
.photos-gallery {
    padding: 60px 0 80px;
    background: #ffffff;
}
.photos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); /* ← agrandi */
    gap: 30px; /* ← espacement augmenté */
    max-width: 1200px;
    margin: 0 auto;
}

.photo-item {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(1,24,117,0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: var(--gris-fond);
}
.photo-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 30px rgba(1,24,117,0.12);
}
.photo-link {
    display: block;
    text-decoration: none;
    position: relative;
}
.photo-link img {
    width: 100%;
    height: 320px; /* ← agrandi (était 260px) */
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}
.photo-item:hover img {
    transform: scale(1.03);
}

.photo-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px 16px;
    background: linear-gradient(0deg, rgba(1,24,117,0.85) 0%, transparent 100%);
    transform: translateY(100%);
    transition: transform 0.35s ease;
}
.photo-item:hover .photo-overlay {
    transform: translateY(0);
}
.photo-overlay h3 {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: #ffffff;
    margin: 0 0 4px 0;
}
.photo-overlay p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.8);
    margin: 0;
}

/* --- Message "aucune photo" --- */
.no-photos {
    text-align: center;
    padding: 60px 20px;
    background: var(--gris-fond);
    border-radius: 32px;
}
.no-photos i {
    font-size: 4rem;
    color: var(--jaune-atc);
    opacity: 0.5;
    margin-bottom: 20px;
}
.no-photos h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--bleu-atc);
    margin: 0 0 10px;
}
.no-photos p {
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
.photos-cta {
    background: linear-gradient(105deg, var(--bleu-atc) 0%, #010f52 100%);
    padding: 70px 0;
    text-align: center;
}
.photos-cta h2 {
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
.photos-cta p {
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
    .photos-header h1 {
        font-size: 2.2rem;
    }
    .photos-grid {
        grid-template-columns: 1fr !important;
        gap: 20px;
    }
    .photo-link img {
        height: 280px !important; /* agrandi pour mobile également */
    }
    .photos-cta h2 {
        font-size: 1.6rem;
    }
}
</style>