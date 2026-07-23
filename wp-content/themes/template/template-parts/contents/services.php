<?php
/**
 * Section "Activités" – affichage dynamique avec résumés courts
 * Harmonisée avec header.php : réutilise directement les variables
 * --bleu / --rouge / --vert / --jaune / --gris-* déclarées sur :root.
 * (Des valeurs de repli sont fournies via var(--x, #fallback) au cas
 * où la section serait rendue sans header.php chargé.)
 */

$category_slug = 'activites';
$category = get_category_by_slug( $category_slug );

if ( ! $category ) {
    echo '<div class="container" style="padding: 80px 0; text-align: center;"><p>⚠️ Catégorie "' . esc_html( $category_slug ) . '" introuvable. Veuillez la créer dans l\'administration.</p></div>';
    return;
}

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'cat'            => $category->term_id,
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$activites_query = new WP_Query( $args );

if ( ! $activites_query->have_posts() ) {
    echo '<div class="container" style="padding: 80px 0; text-align: center;"><p>Aucune activité pour le moment.</p></div>';
    return;
}
?>

<section id="activites" class="activites-section">
    <div class="container">
        <div class="section-head reveal">
            <div class="tag">Ce que nous faisons</div>
            <h2>Nos <span class="u-accent">dernières activités</span></h2>
            <p>L'ATC mène des actions concrètes sur le terrain pour informer, former et défendre les consommateurs togolais.</p>
        </div>
        <div class="activites-grid">
            <?php $delay = 1; while ( $activites_query->have_posts() ) : $activites_query->the_post();
                $title = get_the_title();

                // --- RÉSUMÉ COURT ---
                if ( has_excerpt() ) {
                    $excerpt = get_the_excerpt();
                } else {
                    $raw_content = strip_shortcodes( get_the_content() );
                    $raw_content = wp_strip_all_tags( $raw_content );
                    $excerpt = wp_trim_words( $raw_content, 20, '…' );
                }
                // --- FIN RÉSUMÉ ---

                // --- DATE DE PUBLICATION (toujours affichée, avec ou sans image) ---
                $date = get_the_date( 'j F Y' );
                // --- FIN DATE ---

                $link = get_permalink();
                $image_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

                $icons = array( 'fas fa-chalkboard-user', 'fas fa-microphone-alt', 'fas fa-file-signature', 'fas fa-handshake', 'fas fa-users' );
                $icon_index = ( get_the_ID() % count( $icons ) );
                $icon_class = $icons[ $icon_index ];
            ?>
            <div class="act-card reveal reveal-delay-<?php echo $delay; ?>">
                <?php if ( $image_url ) : ?>
                <div class="act-img">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                    <div class="act-date"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $date ); ?></div>
                    <div class="act-img-overlay"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></div>
                </div>
                <?php endif; ?>
                <div class="act-body">
                    <div class="act-top">
                        <div class="act-icon"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></div>
                        <?php if ( ! $image_url ) : ?>
                        <div class="act-meta"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $date ); ?></div>
                        <?php endif; ?>
                    </div>
                    <h3><?php echo esc_html( $title ); ?></h3>
                    <p><?php echo esc_html( $excerpt ); ?></p>
                    <a href="<?php echo esc_url( $link ); ?>" class="act-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <?php $delay++; endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<style>
/* ========== STYLES SECTION ACTIVITÉS — harmonisé avec header.php ========== */
.activites-section {
    padding: 80px 0;
    background: #ffffff;
}
.container { max-width: 1280px; margin: 0 auto; padding: 0 28px; }

.section-head {
    text-align: center;
    margin-bottom: 50px;
}
/* Pill "eyebrow" — même esprit que .btn-alerter / .atc-hero__eyebrow */
.tag {
    display: inline-block;
    background: var(--rouge-lt, rgba(185,47,41,.08));
    color: var(--rouge, #B92F29);
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.8px;
    margin-bottom: 18px;
}
.section-head h2 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 2.5rem;
    font-weight: 900;
    letter-spacing: -1px;
    color: var(--bleu, #011875);
    margin-bottom: 16px;
}
.u-accent {
    position: relative;
    background: linear-gradient(130deg, var(--rouge, #B92F29) 0%, #d44040 50%, var(--rouge-fonce, #8f1f1a) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.u-accent::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, var(--jaune, #FFCC00), var(--rouge, #B92F29));
    border-radius: 3px;
}
.section-head p {
    max-width: 600px;
    margin: 0 auto;
    color: var(--gris-texte, #5a6e9a);
    font-size: 1rem;
    font-family: 'Kumbh Sans', system-ui, sans-serif;
}

.activites-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
}

/* Carte — liseré tricolore en haut, comme le topbar du header */
.act-card {
    position: relative;
    background: #fff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 10px 25px -10px rgba(1,24,117,.10);
    transition: transform .38s cubic-bezier(.4,0,.2,1), box-shadow .38s cubic-bezier(.4,0,.2,1);
    border: 1px solid var(--gris-moyen, #eef2f7);
}
.act-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    z-index: 2;
    background: linear-gradient(90deg,
        var(--vert, #006B3F)  0%,  var(--vert, #006B3F)  33%,
        var(--jaune, #FFCC00) 33%, var(--jaune, #FFCC00) 66%,
        var(--rouge, #B92F29) 66%, var(--rouge, #B92F29) 100%);
}
.act-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 38px -12px rgba(1,24,117,.20);
}

.act-img {
    position: relative;
    height: 220px;
    overflow: hidden;
}
.act-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}
.act-card:hover .act-img img {
    transform: scale(1.06);
}

/* Pill date — même dégradé bleu que .atc-hero__badge / .btn-nav-cta */
.act-date {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 3;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, var(--bleu, #011875) 0%, var(--bleu-fonce, #010f52) 100%);
    color: #fff;
    padding: 6px 14px;
    border-radius: 50px;
    font-family: 'Kumbh Sans', system-ui, sans-serif;
    font-size: 0.72rem;
    font-weight: 700;
    box-shadow: 0 6px 16px rgba(1,24,117,.35);
}

/* Voile au survol — teinté bleu logo, accent jaune */
.act-img-overlay {
    position: absolute;
    inset: 0;
    background: rgba(1,24,117,.75);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity .3s ease;
}
.act-card:hover .act-img-overlay {
    opacity: 1;
}
.act-img-overlay i {
    color: var(--jaune, #FFCC00);
    font-size: 2.2rem;
    transform: scale(0.8);
    transition: transform .25s ease;
}
.act-card:hover .act-img-overlay i {
    transform: scale(1);
}

.act-body {
    padding: 26px 25px 25px;
}
.act-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 20px;
}
.act-icon {
    width: 54px;
    height: 54px;
    flex-shrink: 0;
    background: var(--rouge-lt, rgba(185,47,41,.08));
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.act-icon i {
    font-size: 1.5rem;
    color: var(--rouge, #B92F29);
}
/* Pill date de repli — visible quand l'activité n'a pas d'image */
.act-meta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--gris-clair, #F8FAFC);
    border: 1px solid var(--gris-moyen, #E2E8F0);
    color: var(--gris-texte, #4A5568);
    font-family: 'Kumbh Sans', system-ui, sans-serif;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
    padding: 6px 13px;
    border-radius: 50px;
}
.act-meta i { color: var(--bleu, #011875); }

.act-body h3 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--bleu, #011875);
    line-height: 1.3;
    margin-bottom: 12px;
}
.act-body p {
    color: var(--gris-texte, #5b6e8c);
    line-height: 1.65;
    font-size: 0.9rem;
    font-family: 'Kumbh Sans', system-ui, sans-serif;
    margin-bottom: 22px;
}

/* Lien "En savoir plus" — même bouton ghost que .atc-hero__btn-ghost */
.act-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Kumbh Sans', system-ui, sans-serif;
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: .4px;
    color: var(--bleu, #011875);
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 50px;
    border: 2px solid var(--bleu, #011875);
    transition: all .38s cubic-bezier(.4,0,.2,1);
}
.act-link i { transition: transform .25s ease; }
.act-link:hover {
    background: var(--bleu, #011875);
    color: #fff;
    box-shadow: 0 8px 22px rgba(1,24,117,.28);
}
.act-link:hover i { transform: translateX(4px); }

/* Reveal au scroll */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s ease;
}
.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}
.reveal-delay-1 { transition-delay: 0.1s; }
.reveal-delay-2 { transition-delay: 0.2s; }
.reveal-delay-3 { transition-delay: 0.3s; }

@media (max-width: 768px) {
    .section-head h2 {
        font-size: 2rem;
    }
    .activites-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
// Animation d'apparition au scroll (reveal)
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