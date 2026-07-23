<?php
/**
 * Section Missions & Objectifs – version harmonisée avec le header ATC
 */

// Récupération des pages 'mission' et 'objectifs'
$mission_page = get_page_by_path('mission');
$objectifs_page = get_page_by_path('objectifs');

$mission_content = '';
$mission_title = 'Nos Missions';
$objectifs_items = array();
$objectifs_title = 'Nos Objectifs';

if ( $mission_page ) {
    $mission_content = apply_filters( 'the_content', get_post_field( 'post_content', $mission_page->ID ) );
    $mission_title = get_the_title( $mission_page );
}

if ( $objectifs_page ) {
    $objectifs_raw = apply_filters( 'the_content', get_post_field( 'post_content', $objectifs_page->ID ) );
    $objectifs_items = array();
    if ( preg_match_all( '/<li[^>]*>(.*?)<\/li>/is', $objectifs_raw, $matches ) ) {
        foreach ( $matches[1] as $item ) {
            $objectifs_items[] = trim( strip_tags( $item ) );
        }
    } else {
        $lines = preg_split( '/\r\n|\n|\r|,/', strip_tags( $objectifs_raw ) );
        foreach ( $lines as $line ) {
            $line = trim( $line );
            if ( ! empty( $line ) ) {
                $objectifs_items[] = $line;
            }
        }
    }
    $objectifs_title = get_the_title( $objectifs_page );
}
?>

<section id="missions-objectifs" class="mo-section">
    <div class="container">
        <div class="section-head center reveal">
            <div class="tag">Notre raison d'être</div>
            <h2 style="color: #011875;">Missions & Objectifs stratégiques</h2>
            
        </div>
        <div class="mo-tabs reveal">
            <button class="mo-tab active" data-panel="missions"><?php echo esc_html( $mission_title ); ?></button>
            <button class="mo-tab" data-panel="objectifs"><?php echo esc_html( $objectifs_title ); ?></button>
        </div>
        <div>
            <!-- Panel Missions -->
            <div class="mo-panel active" id="panel-missions">
                <?php if ( ! empty( $mission_content ) ) : ?>
                    <div class="mission-content-card">
                        <?php echo wp_kses_post( wpautop( $mission_content ) ); ?>
                    </div>
                <?php else : ?>
                    <p>Aucune mission définie pour le moment.</p>
                <?php endif; ?>
            </div>

            <!-- Panel Objectifs -->
            <div class="mo-panel" id="panel-objectifs">
                <?php if ( ! empty( $objectifs_items ) ) : ?>
                    <div class="objectifs-grid">
                        <?php 
                        $icons = array( 'fas fa-graduation-cap', 'fas fa-star-of-life', 'fas fa-flask', 'fas fa-leaf', 'fas fa-handshake', 'fas fa-shield-alt', 'fas fa-balance-scale', 'fas fa-users' );
                        $i = 0;
                        foreach ( $objectifs_items as $item ) : 
                        ?>
                        <div class="objectif-card">
                            <div class="objectif-icon">
                                <i class="<?php echo esc_attr( $icons[ $i % count( $icons ) ] ); ?>"></i>
                            </div>
                            <p><?php echo esc_html( $item ); ?></p>
                        </div>
                        <?php $i++; endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>Aucun objectif défini pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
/* ============================================================
   MISSIONS & OBJECTIFS – CHARTE ATC (BLEU / ROUGE / JAUNE)
   ============================================================ */

:root {
    --bleu-atc:   #011875;
    --bleu-fonce: #010f52;
    --rouge-atc:  #B92F29;
    --rouge-fonce:#8f1f1a;
    --jaune-atc:  #FFCC00;
    --gris-clair: #f8fafc;
    --gris-border:#e2e8f0;
}

.mo-section {
    padding: 100px 0;
    background: linear-gradient(160deg, #fcfcfd 0%, #f1f5f9 100%);
    position: relative;
    overflow: hidden;
}

/* Bande drapeau en haut (comme le header) */
.mo-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #006B3F, #FFCC00, #B92F29, #FFCC00, #006B3F);
}

/* Cercles décoratifs */
.mo-section::after {
    content: '';
    position: absolute;
    top: -200px;
    right: -200px;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(1,24,117,0.04) 0%, transparent 70%);
    border-radius: 50%;
}
.mo-section .container {
    position: relative;
    z-index: 1;
}

/* En‑tête */
.section-head.center {
    text-align: center;
    margin-bottom: 50px;
}
.mo-section .tag {
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

/* ═══ TITRE EN #011875 (EXPLICITE) ═══ */
.mo-section h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2.6rem;
    font-weight: 800;
    color: #011875;  /* ← Couleur demandée */
    margin-bottom: 12px;
}
.mo-section .section-head p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.05rem;
    color: #4b5563;
    max-width: 600px;
    margin: 0 auto;
}

/* Onglets – bleu/rouge */
.mo-tabs {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}
.mo-tab {
    background: transparent;
    border: 2px solid #011875;  /* Bleu logo */
    padding: 12px 32px;
    border-radius: 60px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    font-size: 0.9rem;
    color: #011875;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.mo-tab.active,
.mo-tab:hover {
    background: #B92F29;  /* Rouge logo */
    border-color: #B92F29;
    color: white;
    box-shadow: 0 6px 18px rgba(185,47,41,0.30);
}

/* Panneaux */
.mo-panel {
    display: none;
    animation: fadeIn 0.5s ease;
}
.mo-panel.active {
    display: block;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Carte Mission – fond blanc */
.mission-content-card {
    background: #ffffff;
    border-radius: 28px;
    padding: 40px 50px;
    box-shadow: 0 10px 30px rgba(1,24,117,0.08);
    border: 1px solid rgba(1,24,117,0.06);
}
.mission-content-card p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.05rem;
    line-height: 1.8;
    color: #1e293b;
    margin-bottom: 1.2rem;
}
.mission-content-card p:last-child {
    margin-bottom: 0;
}

/* Grille Objectifs – cartes blanches */
.objectifs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 30px;
}
.objectif-card {
    background: #ffffff;
    border-radius: 24px;
    padding: 30px 25px;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 12px rgba(1,24,117,0.05);
    text-align: center;
}
.objectif-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(1,24,117,0.10);
    border-color: #011875;
}
.objectif-icon {
    width: 70px;
    height: 70px;
    background: rgba(1,24,117,0.08);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    transition: 0.3s;
}
.objectif-icon i {
    font-size: 1.8rem;
    color: #011875;
}
.objectif-card:hover .objectif-icon {
    background: #B92F29;
}
.objectif-card:hover .objectif-icon i {
    color: #ffffff;
}
.objectif-card p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #334155;
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0;
}

/* Responsive */
@media (max-width: 992px) {
    .objectifs-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 768px) {
    .mo-section {
        padding: 60px 0;
    }
    .mo-section h2 {
        font-size: 2rem;
    }
    .mo-tab {
        padding: 8px 24px;
        font-size: 0.8rem;
    }
    .objectifs-grid {
        grid-template-columns: 1fr;
    }
    .mission-content-card {
        padding: 25px;
    }
}

/* Animation reveal */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s ease;
}
.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
// Gestion des onglets
document.querySelectorAll('.mo-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.mo-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.mo-panel').forEach(p => p.classList.remove('active'));
        this.classList.add('active');
        const panelId = 'panel-' + this.dataset.panel;
        document.getElementById(panelId).classList.add('active');
    });
});

// Animation au scroll
document.addEventListener('DOMContentLoaded', function() {
    const reveals = document.querySelectorAll('.reveal');
    function revealCheck() {
        for (let i = 0; i < reveals.length; i++) {
            const el = reveals[i];
            const windowHeight = window.innerHeight;
            const revealTop = el.getBoundingClientRect().top;
            if (revealTop < windowHeight - 100) {
                el.classList.add('visible');
            }
        }
    }
    window.addEventListener('scroll', revealCheck);
    revealCheck();
});
</script>