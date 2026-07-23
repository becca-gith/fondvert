<?php
/**
 * Section FAQ – dynamique avec Custom Post Type 'faq'
 */

// Récupération des questions/réponses
$faq_args = array(
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
);
$faq_query = new WP_Query( $faq_args );
?>

<section class="faq-section">
    <div class="container">
        <div class="section-head center reveal">
            <div class="tag">Questions fréquentes</div>
            <h2 style="color: #011875;">Foire aux <span class="u-accent">questions</span></h2>
            <p>Tout ce que vous devez savoir sur l'ATC et vos droits.</p>
        </div>

        <?php if ( $faq_query->have_posts() ) : ?>
        <div class="faq-grid">
            <?php while ( $faq_query->have_posts() ) : $faq_query->the_post();
                $question = get_the_title();
                $answer = apply_filters( 'the_content', get_the_content() );
                if ( empty( $question ) || empty( $answer ) ) continue;
            ?>
            <div class="faq-card">
                <div class="faq-question">
                    <h3><?php echo esc_html( $question ); ?></h3>
                    <div class="faq-icon"><i class="fas fa-plus"></i></div>
                </div>
                <div class="faq-answer">
                    <?php echo wp_kses_post( $answer ); ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <?php else : ?>
        <div class="no-faq" style="text-align: center; padding: 40px;">
            <p>Aucune question/réponse pour le moment. Ajoutez des FAQ dans l’administration.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
/* ========== FAQ – CHARTE ATC (BLEU #011875 / ROUGE #B92F29) ========== */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
}

.faq-section {
    padding: 80px 0;
    background: linear-gradient(145deg, #f8fafc 0%, #ffffff 100%);
    position: relative;
}
.faq-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #006B3F, var(--jaune-atc), var(--rouge-atc), var(--jaune-atc), #006B3F);
}
.section-head.center {
    text-align: center;
    margin-bottom: 50px;
}
.tag {
    display: inline-block;
    background: rgba(185,47,41,0.10);
    color: var(--rouge-atc);
    padding: 6px 18px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 15px;
}

/* ═══ TITRE PRINCIPAL EN #011875 ═══ */
.section-head h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2.3rem;
    font-weight: 800;
    color: #011875;  /* ← Couleur demandée */
    margin-bottom: 15px;
}
.u-accent {
    position: relative;
    display: inline-block;
}
.u-accent::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, var(--jaune-atc), var(--rouge-atc));
    border-radius: 3px;
}
.section-head p {
    max-width: 600px;
    margin: 0 auto;
    color: #4b5563;
    font-size: 1rem;
}
.faq-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(480px, 1fr));
    gap: 24px;
    margin-top: 20px;
}
.faq-card {
    background: #ffffff;
    border-radius: 24px;
    box-shadow: 0 12px 24px -10px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid #eef2f7;
    overflow: hidden;
}
.faq-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 30px -12px rgba(1,24,117,0.15);
    border-color: var(--bleu-atc);
}
.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    cursor: pointer;
    background: #ffffff;
    transition: background 0.2s;
}
.faq-question:hover {
    background: rgba(185,47,41,0.03);
}
.faq-question h3 {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: var(--bleu-atc);
    margin: 0;
    flex: 1;
    padding-right: 16px;
    line-height: 1.4;
}
.faq-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(185,47,41,0.10);
    border-radius: 50%;
    color: var(--rouge-atc);
    font-size: 0.9rem;
    transition: all 0.3s;
    flex-shrink: 0;
}
.faq-card.active .faq-icon {
    background: var(--rouge-atc);
    color: white;
    transform: rotate(45deg);
}
.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), padding 0.3s;
    padding: 0 24px;
    background: #fefbf6;
    border-top: 1px solid transparent;
}
.faq-card.active .faq-answer {
    max-height: 300px;
    padding: 20px 24px 24px 24px;
    border-top-color: #eef2f7;
}
.faq-answer p {
    margin: 0 0 0.75rem;
    color: #4b5563;
    line-height: 1.7;
    font-size: 0.9rem;
}
.faq-answer p:last-child {
    margin-bottom: 0;
}
.faq-answer strong {
    color: var(--rouge-atc);
    font-weight: 700;
}
.faq-answer ul, .faq-answer ol {
    margin: 0.75rem 0 0.75rem 1.5rem;
    color: #4b5563;
}
/* Responsive */
@media (max-width: 992px) {
    .faq-grid {
        grid-template-columns: 1fr;
    }
}
@media (max-width: 768px) {
    .faq-section {
        padding: 60px 0;
    }
    .section-head h2 {
        font-size: 1.8rem;
    }
    .faq-question h3 {
        font-size: 0.9rem;
    }
    .faq-question {
        padding: 16px 18px;
    }
    .faq-card.active .faq-answer {
        padding: 16px 18px 18px;
    }
}
</style>

<script>
// Accordéon FAQ – une seule question ouverte à la fois
document.addEventListener('DOMContentLoaded', function() {
    const faqCards = document.querySelectorAll('.faq-card');
    if (faqCards.length === 0) return;
    
    // Fermer toutes et ouvrir la première par défaut
    faqCards.forEach((card, idx) => {
        if (idx === 0) card.classList.add('active');
        else card.classList.remove('active');
        
        const question = card.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const isActive = card.classList.contains('active');
            // Fermer toutes les autres
            faqCards.forEach(c => c.classList.remove('active'));
            if (!isActive) {
                card.classList.add('active');
            }
        });
    });
});
</script>