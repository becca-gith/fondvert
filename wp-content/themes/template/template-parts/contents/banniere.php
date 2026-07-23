<?php
/**
 * section-hero-atc.php — Hero ATC Version Finale Premium Élargie
 * Palette : bleu #011875 · rouge #B92F29 · jaune #FFCC00 · vert #006B3F
 */

$args = array(
    'post_type'      => 'slide',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
);
$slides = new WP_Query( $args );
?>

<section class="atc-hero" id="accueil">

    <div class="atc-hero__bg" aria-hidden="true">
        <div class="atc-hero__bg-orb atc-hero__bg-orb--1"></div>
        <div class="atc-hero__bg-orb atc-hero__bg-orb--2"></div>
        <div class="atc-hero__bg-orb atc-hero__bg-orb--3"></div>
        <div class="atc-hero__bg-lines">
            <?php for($i=0;$i<6;$i++): ?>
            <div class="atc-hero__bg-line"></div>
            <?php endfor; ?>
        </div>
        <div class="atc-hero__bg-dots">
            <?php for($i=0;$i<35;$i++): ?>
            <span></span>
            <?php endfor; ?>
        </div>
    </div>

    <div class="atc-hero__shell">
        <div class="atc-hero__grid">

            <div class="atc-hero__left">

                <div class="atc-hero__eyebrow">
                    <span class="atc-hero__live" aria-hidden="true"></span>
                    Depuis 1999 à vos côtés
                </div>

                <div class="atc-hero__brand">
                    <div class="atc-hero__brand-lines">
                        <span class="atc-hero__brand-line2">Association Togolaise</span>
                        <span class="atc-hero__brand-line2">des Consommateurs</span>
                    </div>
                    <div class="atc-hero__brand-sigil">
                        <span class="atc-hero__brand-a">A</span>
                        <span class="atc-hero__brand-t">T</span>
                        <span class="atc-hero__brand-c">C</span>
                    </div>
                    <div class="atc-hero__brand-rainbow" aria-hidden="true">
                        <span></span><span></span><span></span><span></span><span></span>
                    </div>
                </div>

                <div class="atc-hero__slogan-wrap">
                    <div class="atc-hero__flag-bar" aria-hidden="true">
                        <span></span><span></span><span></span>
                    </div>
                    <div class="atc-hero__slogan-texts">
                        <p class="atc-hero__slogan-main">
                            La protection et l'intérêt du consommateur<br>
                            au cœur de nos actions.
                        </p>
                        <p class="atc-hero__slogan-sub">
                            Ensemble pour une consommation équitable et responsable.
                        </p>
                    </div>
                </div>

                <div class="atc-hero__cta">
                    <a href="<?php echo esc_url( home_url('/adhesion') ); ?>" class="atc-hero__btn-primary">
                        <span class="atc-hero__btn-icon"><i class="fas fa-user-plus" aria-hidden="true"></i></span>
                        <span>Nous rejoindre</span>
                    </a>
                    <a href="<?php echo esc_url( home_url('/mission') ); ?>" class="atc-hero__btn-ghost">
                        <span>Nos missions</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
                
            </div>

            <div class="atc-hero__right">

               

                <div class="atc-hero__counter" id="atcCounter" aria-hidden="true">
                    <span id="atcCountCur">01</span>
                    <span class="atc-hero__counter-sep"></span>
                    <span id="atcCountTotal">01</span>
                </div>

                <?php if ( $slides->have_posts() ) : ?>
                <div class="atc-hero__slider-wrap">

                    <div class="atc-hero__deco-frame" aria-hidden="true">
                        <div class="atc-hero__deco-corner atc-hero__deco-corner--tl"></div>
                        <div class="atc-hero__deco-corner atc-hero__deco-corner--br"></div>
                    </div>

                    <div class="atc-hero__slider-box" id="atcHeroBox">
                        <div class="atc-hero__track" id="atcHeroTrack">
                            <?php
                            $idx = 0;
                            while ( $slides->have_posts() ) :
                                $slides->the_post();
                                $img  = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                                if ( ! $img ) continue;
                                $ttl  = get_the_title();
                                $desc = get_the_excerpt() ?: wp_trim_words( get_the_content(), 14, '…' );
                            ?>
                            <div class="atc-hero__slide <?php echo $idx === 0 ? 'is-on' : ''; ?>" data-index="<?php echo $idx; ?>">
                                <img src="<?php echo esc_url($img); ?>"
                                     alt="<?php echo esc_attr($ttl); ?>"
                                     class="atc-hero__slide-img">
                                <div class="atc-hero__slide-grad" aria-hidden="true"></div>
                                <div class="atc-hero__slide-cap">
                                    <div class="atc-hero__slide-tag">
                                        <span><?php echo str_pad($idx+1,2,'0',STR_PAD_LEFT); ?></span>
                                        <span class="atc-hero__slide-tag-line"></span>
                                        Activité ATC
                                    </div>
                                    <h4><?php echo esc_html($ttl); ?></h4>
                                    <p><?php echo esc_html($desc); ?></p>
                                </div>
                            </div>
                            <?php $idx++; endwhile; wp_reset_postdata(); ?>
                        </div>

                        <div class="atc-hero__controls">
                            <button class="atc-hero__arrow" id="atcPrev" aria-label="Précédent">
                                <i class="fas fa-chevron-left" aria-hidden="true"></i>
                            </button>
                            <div class="atc-hero__dots" id="atcDots"></div>
                            <button class="atc-hero__arrow" id="atcNext" aria-label="Suivant">
                                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="atc-hero__progress" aria-hidden="true">
                            <div class="atc-hero__progress-bar" id="atcProgress"></div>
                        </div>
                    </div>
                </div>

                <?php else : ?>
                <div class="atc-hero__slider-wrap">
                    <div class="atc-hero__slider-box atc-hero__slider-empty">
                        <i class="fas fa-images"></i>
                        <p>Ajoutez des slides dans l'administration (menu "Slides")</p>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<style id="atc-hero-styles">

/* ══════════════════════════════════════════
   VARIABLES & PALETTE OFFICIELLE
══════════════════════════════════════════ */
.atc-hero {
    --blue:     #011875;
    --blue-dk:  #010f52;
    --blue-md:  #0a2a9e;
    --blue-lt:  rgba(1,24,117,.06);
    --red:      #B92F29;
    --red-dk:   #8f1f1a;
    --green:    #006B3F;
    --yellow:   #FFCC00;
    --white:    #fff;
    --off:      #f4f6fb;
    --gray:     #e4e9f4;
    --muted:    #5a6e9a;
    --font-atc: 'Kumbh Sans', system-ui, -apple-system, sans-serif;
    --t: all .35s cubic-bezier(.4, 0, .2, 1);
}

/* ══════════════════════════════════════════
   SECTION DESIGN
══════════════════════════════════════════ */
.atc-hero {
    position: relative;
    background: linear-gradient(148deg, #e8edf8 0%, #f0f4fc 35%, #f8f9fe 65%, #fff 100%);
    padding: 80px 0 90px;
    overflow: hidden;
    isolation: isolate;
    min-height: 85vh;
    display: flex;
    align-items: center;
}

/* Fond décoratif */
.atc-hero__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
}
.atc-hero__bg-orb {
    position: absolute;
    border-radius: 50%;
}
.atc-hero__bg-orb--1 {
    width: 650px; height: 650px;
    top: -200px; right: -150px;
    background: radial-gradient(circle, rgba(1,24,117,.07) 0%, transparent 65%);
}
.atc-hero__bg-orb--2 {
    width: 450px; height: 450px;
    bottom: -120px; left: -100px;
    background: radial-gradient(circle, rgba(185,47,41,.06) 0%, transparent 65%);
}
.atc-hero__bg-orb--3 {
    width: 300px; height: 300px;
    top: 55%; right: 35%;
    background: radial-gradient(circle, rgba(255,204,0,.06) 0%, transparent 65%);
}

.atc-hero__bg-lines {
    position: absolute;
    inset: 0;
    overflow: hidden;
}
.atc-hero__bg-line {
    position: absolute;
    left: 50%; top: -20%;
    width: 1px; height: 140%;
    background: linear-gradient(180deg, transparent, rgba(1,24,117,.04), transparent);
    transform-origin: top center;
}
.atc-hero__bg-line:nth-child(1) { transform: rotate(-25deg) translateX(-360px); }
.atc-hero__bg-line:nth-child(2) { transform: rotate(-25deg) translateX(-180px); }
.atc-hero__bg-line:nth-child(3) { transform: rotate(-25deg) translateX(0px); }
.atc-hero__bg-line:nth-child(4) { transform: rotate(-25deg) translateX(180px); }
.atc-hero__bg-line:nth-child(5) { transform: rotate(-25deg) translateX(360px); }
.atc-hero__bg-line:nth-child(6) { transform: rotate(-25deg) translateX(540px); }

.atc-hero__bg-dots {
    position: absolute;
    inset: 0;
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    grid-template-rows: repeat(5, 1fr);
    padding: 40px;
}
.atc-hero__bg-dots span {
    width: 3px; height: 3px;
    background: rgba(1,24,117,.06);
    border-radius: 50%;
    align-self: center;
    justify-self: center;
}

/* ══════════════════════════════════════════
   GRILLE STRUCTURELLE ÉLARGIE POUR LE SLIDER
══════════════════════════════════════════ */
.atc-hero__shell {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 40px;
    position: relative;
    z-index: 1;
    width: 100%;
}
.atc-hero__grid {
    display: grid;
    /* Largeur ajustée : Gauche réduite à 42%, Droite (Slider) élargie à 58% */
    grid-template-columns: 42% 58%;
    gap: 56px;
    align-items: center;
}

/* ══════════════════════════════════════════
   COLONNE GAUCHE CONTENT
══════════════════════════════════════════ */
.atc-hero__left {
    animation: atcSlideUp .75s cubic-bezier(.22, 1, .36, 1) both;
}

.atc-hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--blue-lt);
    border: 1px solid rgba(1,24,117,.12);
    border-radius: 40px;
    padding: 8px 20px;
    font-family: var(--font-atc);
    font-size: .75rem;
    font-weight: 800;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--blue);
    margin-bottom: 32px;
}
.atc-hero__live {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--red);
    flex-shrink: 0;
    animation: atcPulse 2s ease infinite;
}
@keyframes atcPulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(185,47,41,.6); }
    50%      { box-shadow: 0 0 0 6px rgba(185,47,41,0); }
}

.atc-hero__brand {
    margin-bottom: 32px;
}
.atc-hero__brand-lines {
    display: flex;
    flex-direction: column;
    font-family: var(--font-atc);
    line-height: 1.2;
    margin-bottom: 6px;
}
.atc-hero__brand-line1 {
    font-size: clamp(1rem, 1.8vw, 1.25rem);
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: 3.5px;
    font-weight: 700;
}
.atc-hero__brand-line2 {
    font-size: clamp(1.25rem, 2.3vw, 1.65rem);
    color: var(--blue);
    text-transform: uppercase;
    letter-spacing: 2.5px;
    font-weight: 800;
}

.atc-hero__brand-sigil {
    display: flex;
    align-items: baseline;
    line-height: .95;
    font-family: 'Playfair Display', Georgia, serif;
    font-weight: 900;
    letter-spacing: -3px;
    margin-bottom: 12px;
    gap: 3px;
}
.atc-hero__brand-a,
.atc-hero__brand-t,
.atc-hero__brand-c {
    font-size: clamp(4.5rem, 9vw, 8.5rem);
    display: inline-block;
}
.atc-hero__brand-a { color: var(--blue); animation: atcLetterIn .6s .1s cubic-bezier(.22,1,.36,1) both; }
.atc-hero__brand-t { 
    background: linear-gradient(135deg, var(--red) 0%, #d44040 50%, var(--red-dk) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: atcLetterIn .6s .2s cubic-bezier(.22,1,.36,1) both;
    font-style: italic;
}
.atc-hero__brand-c { color: var(--blue); animation: atcLetterIn .6s .3s cubic-bezier(.22,1,.36,1) both; }

@keyframes atcLetterIn {
    from { opacity: 0; transform: translateY(15px); }
    to   { opacity: 1; transform: translateY(0); }
}

.atc-hero__brand-rainbow {
    display: flex;
    height: 5px;
    border-radius: 5px;
    overflow: hidden;
    max-width: 320px;
    gap: 3px;
}
.atc-hero__brand-rainbow span:nth-child(1) { flex: 1; background: var(--blue); }
.atc-hero__brand-rainbow span:nth-child(2) { flex: 1; background: var(--red); }
.atc-hero__brand-rainbow span:nth-child(3) { flex: 1; background: var(--yellow); }
.atc-hero__brand-rainbow span:nth-child(4) { flex: 1; background: var(--green); }
.atc-hero__brand-rainbow span:nth-child(5) { flex: 1; background: var(--blue); }

.atc-hero__slogan-wrap {
    display: flex;
    align-items: stretch;
    gap: 18px;
    margin-bottom: 40px;
    max-width: 540px;
}
.atc-hero__flag-bar {
    display: flex;
    flex-direction: column;
    width: 5px;
    border-radius: 5px;
    overflow: hidden;
    flex-shrink: 0;
}
.atc-hero__flag-bar span { flex: 1; }
.atc-hero__flag-bar span:nth-child(1) { background: var(--green); }
.atc-hero__flag-bar span:nth-child(2) { background: var(--yellow); }
.atc-hero__flag-bar span:nth-child(3) { background: var(--red); }

.atc-hero__slogan-texts { display: flex; flex-direction: column; gap: 8px; }
.atc-hero__slogan-main {
    font-family: var(--font-atc);
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--blue);
    line-height: 1.6;
    margin: 0;
}
.atc-hero__slogan-sub {
    font-family: var(--font-atc);
    font-size: .92rem;
    font-weight: 500;
    font-style: italic;
    color: var(--muted);
    line-height: 1.5;
    margin: 0;
}

.atc-hero__cta {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}
.atc-hero__btn-primary {
    display: inline-flex;
    align-items: center;
    background: var(--red);
    color: #fff;
    font-family: var(--font-atc);
    font-weight: 800;
    font-size: .85rem;
    letter-spacing: .8px;
    text-transform: uppercase;
    text-decoration: none;
    border-radius: 50px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(185,47,41,.25);
    transition: var(--t);
}
.atc-hero__btn-primary:hover {
    background: var(--red-dk);
    transform: translateY(-2px);
    box-shadow: 0 10px 26px rgba(185,47,41,.38);
    color: #fff;
}
.atc-hero__btn-icon {
    background: rgba(0,0,0,.12);
    width: 48px; height: 48px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.atc-hero__btn-primary span:last-child {
    padding: 0 24px 0 16px;
}

.atc-hero__btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: transparent;
    color: var(--blue);
    font-family: var(--font-atc);
    font-weight: 700;
    font-size: .85rem;
    padding: 12px 26px;
    border-radius: 50px;
    text-decoration: none;
    border: 2px solid var(--blue);
    transition: var(--t);
}
.atc-hero__btn-ghost i { transition: transform .25s ease; }
.atc-hero__btn-ghost:hover {
    background: var(--blue);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(1,24,117,.2);
}
.atc-hero__btn-ghost:hover i { transform: translateX(4px); }


/* ══════════════════════════════════════════
   COLONNE DROITE — GRANDE COMPOSITION DU SLIDER
══════════════════════════════════════════ */
.atc-hero__right {
    position: relative;
    animation: atcSlideRight .75s .15s cubic-bezier(.22, 1, .36, 1) both;
    align-self: stretch;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
}

@keyframes atcSlideRight {
    from { opacity: 0; transform: translateX(30px); }
    to   { opacity: 1; transform: translateX(0); }
}

/* Badge flottant surélevé */
.atc-hero__badge {
    position: absolute;
    top: -12px; left: -20px;
    z-index: 20;
    background: var(--blue);
    color: #fff;
    border-radius: 14px;
    padding: 11px 18px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 8px 30px rgba(1,24,117,.25);
    max-width: 220px;
    border: 1px solid rgba(255,255,255,.1);
}
.atc-hero__badge-icon {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: rgba(255,255,255,.12);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.atc-hero__badge-icon i { color: var(--yellow); font-size: 1.05rem; }
.atc-hero__badge-text {
    display: flex;
    flex-direction: column;
    font-family: var(--font-atc);
    line-height: 1.3;
}
.atc-hero__badge-text strong { font-size: .75rem; font-weight: 800; }
.atc-hero__badge-text span { font-size: .68rem; opacity: .75; }

/* Compteur de slides épuré */
.atc-hero__counter {
    position: absolute;
    bottom: 64px; right: -20px;
    z-index: 20;
    background: var(--white);
    border: 1px solid var(--gray);
    border-radius: 12px;
    padding: 8px 16px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 1.15rem;
    font-weight: 900;
    box-shadow: 0 6px 24px rgba(1,24,117,.1);
}
.atc-hero__counter span:first-child { color: var(--red); }
.atc-hero__counter span:last-child { color: var(--blue); opacity: .35; }
.atc-hero__counter-sep {
    width: 18px; height: 1.5px;
    background: var(--gray);
    transform: rotate(-45deg);
}

/* Conteneur principal */
.atc-hero__slider-wrap {
    position: relative;
    width: 100%;
}

/* Angles déco en arrière plan */
.atc-hero__deco-frame {
    position: absolute;
    inset: -8px;
    z-index: 0;
    pointer-events: none;
}
.atc-hero__deco-corner {
    position: absolute;
    width: 48px; height: 48px;
    border-style: solid;
    border-width: 0;
}
.atc-hero__deco-corner--tl {
    top: 0; left: 0;
    border-top-width: 3px; border-left-width: 3px;
    border-color: var(--red);
    border-radius: 8px 0 0 0;
}
.atc-hero__deco-corner--br {
    bottom: 48px; right: 0;
    border-bottom-width: 3px; border-right-width: 3px;
    border-color: var(--yellow);
    border-radius: 0 0 8px 0;
}

/* Box Slider élargie - Aspect Ratio Paysage Premium (4:3) */
.atc-hero__slider-box {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    width: 100%;
    aspect-ratio: 4 / 3;  /* Donne une largeur généreuse et moderne en harmonie avec la grille */
    box-shadow:
        0 0 0 6px rgba(255,255,255,.75),
        0 25px 60px rgba(1,24,117,.18),
        0 5px 15px rgba(0,0,0,.08);
    z-index: 1;
    background: #010626;
}
.atc-hero__slider-empty {
    background: var(--off);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    font-family: var(--font-atc);
    color: var(--muted);
    text-align: center;
    padding: 40px;
}

/* Rail et Elements */
.atc-hero__track { position: relative; width: 100%; height: 100%; }
.atc-hero__slide {
    position: absolute; inset: 0;
    opacity: 0;
    transition: opacity .8s cubic-bezier(.4,0,.2,1);
}
.atc-hero__slide.is-on { opacity: 1; z-index: 1; }
.atc-hero__slide-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 6s cubic-bezier(.25,1,.5,1);
}
.atc-hero__slide.is-on .atc-hero__slide-img { transform: scale(1.05); }

/* Dégradé cinématique pour lisibilité du texte */
.atc-hero__slide-grad {
    position: absolute; inset: 0;
    background: linear-gradient(to top,
        rgba(1,5,40,.92) 0%,
        rgba(1,5,40,.55) 35%,
        rgba(1,5,40,.1) 70%,
        rgba(1,5,40,0) 100%);
    pointer-events: none;
    z-index: 2;
}

/* Légendes / Captions du slider */
.atc-hero__slide-cap {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    padding: 70px 32px 36px;
    z-index: 3;
    color: #fff;
}
.atc-hero__slide-tag {
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: var(--font-atc);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--yellow);
    margin-bottom: 12px;
}
.atc-hero__slide-tag-line {
    width: 24px; height: 1px;
    background: var(--yellow);
    opacity: .6;
}
.atc-hero__slide-cap h4 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(1.2rem, 2.2vw, 1.55rem);
    font-weight: 700;
    line-height: 1.35;
    margin: 0 0 10px 0;
    text-shadow: 0 2px 10px rgba(1, 5, 40, 0.8); /* Ombre premium protectrice */
}
.atc-hero__slide-cap p {
    font-family: var(--font-atc);
    font-size: .88rem;
    opacity: .85;
    margin: 0;
    line-height: 1.6;
    max-width: 600px;
    text-shadow: 0 1px 6px rgba(1, 5, 40, 0.8);
}

/* Navigation & Flèches minimales */
.atc-hero__controls {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    padding: 16px;
    background: linear-gradient(0deg, rgba(1,5,40,.4) 0%, transparent 100%);
    z-index: 5;
}
.atc-hero__arrow {
    width: 38px; height: 38px;
    border-radius: 50%;
    background: rgba(255,255,255,.15);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border: 1px solid rgba(255,255,255,.2);
    cursor: pointer;
    color: #fff;
    font-size: .85rem;
    display: flex; align-items: center; justify-content: center;
    transition: var(--t);
}
.atc-hero__arrow:hover {
    background: var(--red);
    border-color: var(--red);
    transform: scale(1.08);
}
.atc-hero__dots {
    display: flex;
    gap: 8px;
    align-items: center;
}
.atc-hdot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: rgba(255,255,255,.35);
    border: none;
    cursor: pointer;
    transition: var(--t);
    padding: 0;
}
.atc-hdot.on {
    background: var(--yellow);
    width: 26px;
    border-radius: 6px;
}

/* Autoplay Progress Bar */
.atc-hero__progress {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: rgba(255,255,255,.1);
    z-index: 6;
}
.atc-hero__progress-bar {
    height: 100%;
    background: linear-gradient(90deg, var(--yellow), var(--red));
    width: 0%;
    transition: width .1s linear;
}

/* ══════════════════════════════════════════
   RESPONSIVE DESIGN ADAPTATIF
══════════════════════════════════════════ */
@media (max-width: 1200px) {
    .atc-hero__grid { gap: 40px; }
}

@media (max-width: 960px) {
    .atc-hero { padding: 50px 0 70px; }
    .atc-hero__grid { grid-template-columns: 1fr; gap: 44px; }
    .atc-hero__left { text-align: center; }
    .atc-hero__brand-sigil { justify-content: center; }
    .atc-hero__brand-lines { align-items: center; }
    .atc-hero__brand-rainbow { margin: 0 auto; }
    .atc-hero__eyebrow { margin: 0 auto 28px; }
    .atc-hero__slogan-wrap { max-width: 100%; }
    .atc-hero__flag-bar { display: none; }
    .atc-hero__slogan-main, .atc-hero__slogan-sub { text-align: center; }
    .atc-hero__cta { justify-content: center; }
    .atc-hero__badge { left: 50%; transform: translateX(-50%); top: -14px; }
    .atc-hero__counter { display: none; }
    /* Sur tablette, réduction légère du ratio pour ne pas occuper tout l'écran verticalement */
    .atc-hero__slider-box { aspect-ratio: 16 / 10; }
}

@media (max-width: 600px) {
    .atc-hero__shell { padding: 0 24px; }
    .atc-hero__brand-a, .atc-hero__brand-t, .atc-hero__brand-c { font-size: 4.8rem; }
    .atc-hero__brand-line1 { font-size: .85rem; }
    .atc-hero__brand-line2 { font-size: 1.15rem; }
    .atc-hero__slider-box { aspect-ratio: 16 / 11; }
    .atc-hero__slide-cap { padding: 40px 20px 24px; }
    .atc-hero__btn-icon { width: 42px; height: 42px; }
}
</style>

<script>
(function () {
    'use strict';

    var track    = document.getElementById('atcHeroTrack');
    if (!track) return;

    var slides   = track.querySelectorAll('.atc-hero__slide');
    var dotsW    = document.getElementById('atcDots');
    var prev     = document.getElementById('atcPrev');
    var next     = document.getElementById('atcNext');
    var bar      = document.getElementById('atcProgress');
    var curEl    = document.getElementById('atcCountCur');
    var totEl    = document.getElementById('atcCountTotal');
    var cur      = 0;
    var timer;
    var DELAY    = 5500;
    var n        = slides.length;

    function pad(n){ return n < 10 ? '0'+n : ''+n; }

    if (totEl) totEl.textContent = pad(n);

    if (n <= 1) {
        if (prev) prev.style.display = 'none';
        if (next) next.style.display = 'none';
        return;
    }

    function buildDots() {
        if (!dotsW) return;
        for (var i = 0; i < n; i++) {
            var b = document.createElement('button');
            b.className = 'atc-hdot' + (i === 0 ? ' on' : '');
            b.setAttribute('aria-label', 'Slide ' + (i+1));
            (function(idx){ b.addEventListener('click', function(){ go(idx); reset(); }); })(i);
            dotsW.appendChild(b);
        }
    }
    
    function syncDots() {
        if (!dotsW) return;
        dotsW.querySelectorAll('.atc-hdot').forEach(function(d,i){
            d.classList.toggle('on', i === cur);
        });
    }
    
    function syncCounter() {
        if (curEl) curEl.textContent = pad(cur + 1);
    }

    function startProgress() {
        if (!bar) return;
        bar.style.transition = 'none';
        bar.style.width = '0%';
        requestAnimationFrame(function(){
            requestAnimationFrame(function(){
                bar.style.transition = 'width ' + DELAY + 'ms linear';
                bar.style.width = '100%';
            });
        });
    }

    function go(idx) {
        slides[cur].classList.remove('is-on');
        cur = (idx + n) % n;
        slides[cur].classList.add('is-on');
        syncDots();
        syncCounter();
        startProgress();
    }
    
    function start() {
        clearInterval(timer);
        timer = setInterval(function(){ go(cur + 1); }, DELAY);
    }
    
    function reset() { clearInterval(timer); start(); }

    buildDots();
    startProgress();
    start();

    if (prev) prev.addEventListener('click', function(){ go(cur-1); reset(); });
    if (next) next.addEventListener('click', function(){ go(cur+1); reset(); });

    var box = document.getElementById('atcHeroBox');
    if (box) {
        box.addEventListener('mouseenter', function(){
            clearInterval(timer);
            if (bar) { bar.style.transition = 'none'; }
        });
        box.addEventListener('mouseleave', function(){
            start(); startProgress();
        });
    }

    var sx = null;
    track.addEventListener('touchstart', function(e){ sx = e.touches[0].clientX; }, {passive:true});
    track.addEventListener('touchend', function(e){
        if (sx === null) return;
        var dx = sx - e.changedTouches[0].clientX;
        if (Math.abs(dx) > 40) { go(cur + (dx > 0 ? 1 : -1)); reset(); }
        sx = null;
    });

})();
</script>