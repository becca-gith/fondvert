<?php
/**
 * Template part pour la page "Vidéos" – version harmonisée avec le header ATC
 * Affiche les vidéos du Custom Post Type 'video' sous forme de grille
 * Couleurs : bleu #011875, rouge #B92F29, jaune #FFCC00
 */

// Requête pour le CPT 'video'
$args = array(
    'post_type'      => 'video',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$videos_query = new WP_Query($args);

$page_title = 'Nos vidéos';
?>

<!-- ===== BREADCRUMB + TITRE CENTRÉ ===== -->
<section class="videos-header">
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

<!-- ===== GRILLE DES VIDÉOS ===== -->
<section class="videos-gallery">
    <div class="container">
        <?php if ($videos_query->have_posts()) : ?>
            <div class="videos-grid">
                <?php while ($videos_query->have_posts()) : $videos_query->the_post();
                    $video_title = get_the_title();
                    $video_desc  = get_the_excerpt() ?: wp_trim_words(get_the_content(), 20, '…');
                    $video_url   = get_post_meta(get_the_ID(), '_atc_video_url', true);
                    if (empty($video_url)) continue;

                    // Extraction de l'ID YouTube
                    parse_str(parse_url($video_url, PHP_URL_QUERY), $query_params);
                    $youtube_id = $query_params['v'] ?? '';
                    if (empty($youtube_id)) continue;

                    $thumbnail_url = "https://img.youtube.com/vi/{$youtube_id}/maxresdefault.jpg";
                    $embed_url = "https://www.youtube.com/embed/{$youtube_id}";
                ?>
                    <div class="video-card" data-embed="<?php echo esc_url($embed_url); ?>">
                        <div class="video-thumbnail">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($video_title); ?>" loading="lazy">
                            <div class="video-overlay">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                                <div class="video-title">
                                    <h3><?php echo esc_html($video_title); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="video-info">
                            <p><?php echo esc_html($video_desc); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="no-videos">
                <i class="fas fa-video"></i>
                <h3>Aucune vidéo pour le moment</h3>
                <p>Revenez bientôt pour découvrir nos contenus.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-home">Retour à l'accueil</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ===== APPEL À L'ACTION ===== -->
<section class="videos-cta">
    <div class="container">
        <h2>Abonnez-vous à notre chaîne</h2>
        <div class="cta-divider"></div>
        <p>Suivez-nous sur YouTube pour ne rien manquer de nos actualités et actions.</p>
        <a href="#" target="_blank" class="cta-btn">
            <i class="fab fa-youtube"></i> Voir la chaîne
        </a>
    </div>
</section>

<!-- Script pour l'ouverture en modal (lightbox) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.video-card');
        cards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Ne pas déclencher si on clique sur un lien ou un bouton à l'intérieur
                if (e.target.closest('a')) return;
                const embedUrl = this.dataset.embed;
                if (!embedUrl) return;
                // Ouvrir dans une nouvelle fenêtre ou en modal
                // On peut aussi utiliser Fancybox avec un iframe
                // On va utiliser un simple window.open pour l'exemple
                window.open(embedUrl, '_blank');
            });
        });
    });
</script>

<style>
/* ============================================================
   PAGE VIDÉOS – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
   ============================================================ */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
}

/* --- En-tête --- */
.videos-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.videos-header::after {
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
.videos-header h1 {
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
.videos-gallery {
    padding: 60px 0 80px;
    background: #ffffff;
}
.videos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

/* --- Carte vidéo --- */
.video-card {
    background: #ffffff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(1,24,117,0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #eef2f7;
    cursor: pointer;
}
.video-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(1,24,117,0.12);
    border-color: var(--bleu-atc);
}
.video-thumbnail {
    position: relative;
    overflow: hidden;
    background: #1a1a2e;
}
.video-thumbnail img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}
.video-card:hover .video-thumbnail img {
    transform: scale(1.05);
}
.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(1,24,117,0.4);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.video-card:hover .video-overlay {
    opacity: 1;
}
.play-button {
    width: 64px;
    height: 64px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}
.play-button i {
    font-size: 1.6rem;
    color: var(--rouge-atc);
    margin-left: 4px;
}
.video-card:hover .play-button {
    background: var(--jaune-atc);
    transform: scale(1.1);
}
.video-card:hover .play-button i {
    color: var(--bleu-atc);
}
.video-title {
    margin-top: 12px;
    text-align: center;
    padding: 0 16px;
}
.video-title h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: #ffffff;
    font-size: 1.1rem;
    margin: 0;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
}
.video-info {
    padding: 18px 20px 22px;
}
.video-info p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #4b5563;
    font-size: 0.9rem;
    line-height: 1.6;
    margin: 0;
    text-align: justify;
    text-justify: inter-word;
    hyphens: auto;
}

/* --- Message "aucune vidéo" --- */
.no-videos {
    text-align: center;
    padding: 60px 20px;
    background: var(--gris-fond);
    border-radius: 32px;
}
.no-videos i {
    font-size: 4rem;
    color: var(--jaune-atc);
    opacity: 0.5;
    margin-bottom: 20px;
}
.no-videos h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--bleu-atc);
    margin: 0 0 10px;
}
.no-videos p {
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
.videos-cta {
    background: linear-gradient(105deg, var(--bleu-atc) 0%, #010f52 100%);
    padding: 70px 0;
    text-align: center;
}
.videos-cta h2 {
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
.videos-cta p {
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
    .videos-header h1 {
        font-size: 2.2rem;
    }
    .videos-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .video-thumbnail img {
        height: 180px;
    }
    .video-title h3 {
        font-size: 1rem;
    }
    .videos-cta h2 {
        font-size: 1.6rem;
    }
}
</style>