<?php
/**
 * Section "Mot du Président" – version harmonisée avec le header ATC
 * Récupère le contenu de la page ayant pour slug 'mot-du-directeur'
 */

$president_page = get_page_by_path('mot-du-directeur');
if ( ! $president_page ) {
    echo '<div class="president-section"><div class="president-container"><p>Aucune page "Mot du Président" trouvée. Veuillez créer une page avec le slug <strong>mot-du-directeur</strong>.</p></div></div>';
    return;
}

$president_title = get_the_title( $president_page );
$president_content = apply_filters( 'the_content', get_post_field( 'post_content', $president_page ) );
$excerpt = wp_trim_words( $president_content, 90, '…' );
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;600;700;900&family=Playfair+Display:wght@400;700;800&display=swap" rel="stylesheet">

<style>
/* ============================================================
   SECTION MOT DU PRÉSIDENT – TITRE, BOUTON ET SIGNATURE CENTRÉS
   ============================================================ */

/* Variables reprises du header */
:root {
    --bleu-atc:   #011875;
    --bleu-fonce: #010f52;
    --rouge-atc:  #B92F29;
    --rouge-fonce:#8f1f1a;
    --jaune-atc:  #FFCC00;
}

.president-section {
    width: 100%;
    background: linear-gradient(145deg, #f8fafc 0%, #edf2f7 100%);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

/* Bandes drapeau en haut (comme dans le header) */
.president-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #006B3F, #FFCC00, #B92F29, #FFCC00, #006B3F);
}

.president-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

/* ═══ CARTE EN FLEX COLONNE – TOUT CENTRÉ ═══ */
.president-card {
    background: #ffffff;
    border-radius: 48px;
    padding: 50px 60px;
    box-shadow: 0 30px 50px -20px rgba(1,24,117,0.12);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    position: relative;
    border: 1px solid rgba(1,24,117,0.05);

    display: flex;
    flex-direction: column;
    align-items: center;  /* ← Centre tous les enfants horizontalement */
}

.president-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 40px 60px -20px rgba(1,24,117,0.20);
}

/* Guillemet décoratif (reste en haut à droite) */
.quote-mark {
    position: absolute;
    top: 30px;
    right: 50px;
    font-size: 9rem;
    font-family: 'Playfair Display', serif;
    color: rgba(185,47,41,0.06);
    line-height: 1;
    pointer-events: none;
}

/* Tag "Mot du Président" – centré */
.president-tag {
    display: inline-block;
    background: rgba(185,47,41,0.10);
    color: var(--rouge-atc);
    padding: 6px 20px;
    border-radius: 60px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 24px;
    text-align: center;   /* Sécurité */
}

/* ═══ TITRE – CENTRÉ ═══ */
.president-card h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2.4rem;
    font-weight: 800;
    line-height: 1.2;
    margin: 0 0 24px 0;
    color: var(--bleu-atc);
    text-align: center;   /* ← Centrage explicite */
}

/* ═══ EXTRAIT – JUSTIFIÉ ET PLEINE LARGEUR ═══ */
.president-excerpt {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.05rem;
    line-height: 1.75;
    color: #4b5563;
    margin-bottom: 32px;
    width: 100%;                     /* ← Permet au texte de prendre toute la largeur */
    text-align: justify;             /* ← Justification */
    text-justify: inter-word;
    hyphens: auto;
}
.president-excerpt p {
    margin-bottom: 1rem;
    text-align: justify;
    text-justify: inter-word;
    hyphens: auto;
}

/* ═══ BOUTON – CENTRÉ ═══ */
.btn-more {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(105deg, var(--bleu-atc), var(--bleu-fonce));
    border-radius: 60px;
    padding: 14px 36px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    font-size: 1rem;
    color: #ffffff !important;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 6px 18px rgba(1,24,117,0.30);
    margin-bottom: 40px;             /* Marge basse, centrage géré par le flex parent */
    border: none;
    cursor: pointer;
}
.btn-more:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 24px rgba(1,24,117,0.40);
    gap: 16px;
    background: linear-gradient(105deg, var(--bleu-moyen, #0a2a9e), var(--bleu-atc));
}
.btn-more i {
    font-size: 0.9rem;
}

/* ═══ SIGNATURE – CENTRÉE ═══ */
.president-signature {
    display: flex;
    align-items: center;
    gap: 20px;
    border-top: 1px solid #eef2f7;
    padding-top: 32px;
    /* Le flex parent (president-card) centre déjà cette zone */
}
.sig-avatar {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--bleu-atc), var(--bleu-fonce));
    color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 1.4rem;
    box-shadow: 0 4px 10px rgba(1,24,117,0.15);
}
.sig-name strong {
    display: block;
    font-size: 1.2rem;
    font-weight: 800;
    color: #1f2937;
    text-align: left;     /* Le texte à l'intérieur reste aligné à gauche pour une lisibilité optimale */
}
.sig-name small {
    display: block;
    color: #6b7280;
    font-size: 0.85rem;
    margin-top: 4px;
    text-align: left;
}

/* Animation d'apparition */
.reveal {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s cubic-bezier(0.2, 0.9, 0.3, 1);
}
.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive */
@media (max-width: 768px) {
    .president-section { padding: 60px 0; }
    .president-card {
        padding: 30px 24px;
        border-radius: 32px;
    }
    .president-card h2 { font-size: 1.8rem; }
    .quote-mark {
        font-size: 6rem;
        top: 15px;
        right: 20px;
    }
    .btn-more {
        padding: 10px 24px;
        font-size: 0.9rem;
    }
    .sig-avatar {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
}
</style>

<section id="mot-president" class="president-section">
    <div class="president-container">
        <div class="president-card reveal">
            <div class="quote-mark">"</div>
            <div class="president-tag">Mot du Président</div>
            <h2><?php echo esc_html( $president_title ); ?></h2>
            <div class="president-excerpt">
                <?php echo wp_kses_post( wpautop( $excerpt ) ); ?>
            </div>
            <a href="<?php echo esc_url( get_permalink( $president_page ) ); ?>" class="btn-more">
                <span>Lire la suite</span>
                <i class="fas fa-arrow-right"></i>
            </a>
            <div class="president-signature">
                <div class="sig-avatar">BG</div>
                <div class="sig-name">
                    <strong>  Bénétti GAGALO</strong>
                    <small> Président du CA de l'ATC</small>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Animation au scroll (inchangée)
(function() {
    const card = document.querySelector('.president-card.reveal');
    if (!card) return;
    let animated = false;
    function checkScroll() {
        if (animated) return;
        const triggerBottom = window.innerHeight * 0.85;
        const boxTop = card.getBoundingClientRect().top;
        if (boxTop < triggerBottom) {
            card.classList.add('visible');
            animated = true;
        }
    }
    window.addEventListener('scroll', checkScroll);
    checkScroll();
})();
</script>