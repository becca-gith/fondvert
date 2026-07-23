<?php
/**
 * header-atc.php
 * ─────────────────────────────────────────────────────────────────────────────
 * Header complet ATC — topbar + barre drapeau + navbar responsive
 * Intègre le sélecteur de langue TranslatePress (avec fallback)
 * Couleurs logo ATC : bleu #011875 · rouge #B92F29
 * Couleurs drapeau togolais : vert #006B3F · jaune #FFCC00 · rouge #B92F29
 * ─────────────────────────────────────────────────────────────────────────────
 */

// ── URLs WordPress ─────────────────────────────────────────────────────────
$atc_home       = home_url('/');
$atc_historique = home_url('/historique');
$atc_directeur  = home_url('/mot-du-directeur');
$atc_objectifs  = home_url('/objectifs');
$atc_mission    = home_url('/mission');
$atc_activites  = home_url('/activites');
$atc_infos      = home_url('/infos-pratiques');
$atc_photos     = home_url('/photos');
$atc_videos     = home_url('/videos');
$atc_contact    = home_url('/contact');
$atc_adhesion   = home_url('/adhesion');
$atc_alerter    = home_url('/alerter');

// ── Page active ─────────────────────────────────────────────────────────────
$slug = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
function atc_active( $page_slug ) {
    global $slug;
    return ( $slug === $page_slug ) ? ' active' : '';
}

// ── Langues (TranslatePress ou fallback) ──────────────────────────────────
$languages = array();
$current_lang_code = 'fr'; // fallback
if ( function_exists( 'trp_get_languages' ) ) {
    $languages = trp_get_languages();
    $current_lang = function_exists( 'trp_get_current_language' ) ? trp_get_current_language() : 'fr_FR';
    $current_lang_code = substr( $current_lang, 0, 2 );
} else {
    // Fallback si TranslatePress désactivé
    $languages = array(
        'fr_FR' => array( 'language_code' => 'fr', 'language_name' => 'Français' ),
        'en_US' => array( 'language_code' => 'en', 'language_name' => 'English' ),
    );
    $current_lang_code = 'fr';
}

// URL des drapeaux (TranslatePress fournit les images dans /assets/images/flags/)
function atc_flag_url( $code ) {
    $path = WP_PLUGIN_URL . '/translatepress-multilingual/assets/images/flags/' . $code . '.png';
    return $path;
}

// URL de changement de langue (TranslatePress)
function atc_switch_lang_url( $code ) {
    if ( function_exists( 'trp_get_add_language_to_url' ) ) {
        return trp_get_add_language_to_url( $code );
    }
    return '#';
}
?>

<!-- =====================================================
     STYLES HEADER ATC — préfixe .atc-h__
===================================================== -->
<style id="atc-header-styles">
/* ── Reset scopé ── */
.atc-h__topbar,
.atc-h__topbar *,
.atc-h__nav,
.atc-h__nav * {
  box-sizing: border-box;
}

/* ── Tokens couleurs logo ATC ── */
:root {
  --atc-h-blue:       #011875;   /* Bleu logo */
  --atc-h-blue-dk:    #010f52;
  --atc-h-blue-md:    #0a2a9e;
  --atc-h-blue-lt:    rgba(1,24,117,.07);
  --atc-h-blue-glow:  rgba(1,24,117,.22);
  --atc-h-red:        #B92F29;   /* Rouge logo */
  --atc-h-red-dk:     #8f1f1a;
  --atc-h-red-lt:     rgba(185,47,41,.08);
  --atc-h-green:      #006B3F;
  --atc-h-green-dk:   #005030;
  --atc-h-yellow:     #FFCC00;
  --atc-h-white:      #ffffff;
  --atc-h-gray:       #e4e9f4;
  --atc-h-off:        #f4f6fb;
  --atc-h-muted:      #5a6e9a;
  --atc-h-t: all .25s cubic-bezier(.4,0,.2,1);
}

/* ─────────────────────────────────────────────────────
   TOPBAR
───────────────────────────────────────────────────── */
.atc-h__topbar {
  background: var(--atc-h-blue);
  padding: 9px 0;
  position: relative;
  overflow: hidden;
}
.atc-h__topbar::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg,
    rgba(10,42,158,.4) 0%,
    transparent 60%,
    rgba(185,47,41,.15) 100%);
  pointer-events: none;
}
.atc-h__topbar::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg,
    var(--atc-h-green)  0%,  var(--atc-h-green)  33%,
    var(--atc-h-yellow) 33%, var(--atc-h-yellow) 66%,
    var(--atc-h-red)    66%, var(--atc-h-red)   100%);
}
.atc-h__top-inner {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 28px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
  position: relative;
  z-index: 1;
}
.atc-h__top-infos {
  display: flex;
  gap: 22px;
  flex-wrap: wrap;
  align-items: center;
}
.atc-h__top-info {
  display: flex;
  align-items: center;
  gap: 7px;
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .78rem;
  font-weight: 500;
  color: rgba(255,255,255,.65);
  transition: color .2s;
  cursor: default;
}
.atc-h__top-info:hover { color: #fff; }
.atc-h__top-info i       { color: var(--atc-h-yellow); font-size: .82rem; }
.atc-h__top-info strong  { color: var(--atc-h-yellow); font-weight: 700; }
.atc-h__top-right {
  display: flex;
  align-items: center;
  gap: 14px;
}
.atc-h__socials { display: flex; gap: 8px; }
.atc-h__socials a {
  width: 30px; height: 30px;
  border-radius: 50%;
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.15);
  color: rgba(255,255,255,.65);
  font-size: .78rem;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  transition: var(--atc-h-t);
}
.atc-h__socials a:hover {
  background: var(--atc-h-red);
  border-color: var(--atc-h-red);
  color: #fff;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(185,47,41,.4);
}

/* ── Sélecteur de langue ── */
.atc-h__lang-switcher {
  display: flex;
  align-items: center;
}
.atc-h__lang-list {
  display: flex;
  gap: 4px;
  list-style: none;
  margin: 0;
  padding: 0;
}
.atc-h__lang-item {
  display: inline-flex;
  align-items: center;
}
.atc-h__lang-item a {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 4px 10px;
  border-radius: 30px;
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .72rem;
  font-weight: 700;
  text-decoration: none;
  text-transform: uppercase;
  color: rgba(255,255,255,.5);
  border: 1px solid transparent;
  transition: var(--atc-h-t);
  background: transparent;
  line-height: 1.2;
}
.atc-h__lang-item a:hover {
  color: #fff;
  border-color: rgba(255,255,255,.15);
  background: rgba(255,255,255,.05);
}
.atc-h__lang-item.active a {
  color: #fff;
  background: rgba(255,255,255,.12);
  border-color: var(--atc-h-yellow);
}
.atc-h__flag-icon {
  width: 18px;
  height: 12px;
  object-fit: contain;
  border-radius: 2px;
  box-shadow: 0 1px 3px rgba(0,0,0,.15);
}
.atc-h__lang-code {
  letter-spacing: .5px;
}

/* ─────────────────────────────────────────────────────
   BARRE DRAPEAU
───────────────────────────────────────────────────── */
.atc-h__flag {
  display: flex;
  height: 5px;
}
.atc-h__flag-g { flex: 1; background: var(--atc-h-green); }
.atc-h__flag-y { flex: 1; background: var(--atc-h-yellow); }
.atc-h__flag-r { flex: 1; background: var(--atc-h-red); }

/* ─────────────────────────────────────────────────────
   NAVBAR
───────────────────────────────────────────────────── */
.atc-h__nav {
  background: var(--atc-h-white);
  border-bottom: 2px solid var(--atc-h-gray);
  box-shadow: 0 2px 18px var(--atc-h-blue-glow);
  position: sticky;
  top: 0;
  z-index: 9000;
  transition: box-shadow .3s ease;
}
.atc-h__nav.scrolled {
  box-shadow: 0 4px 32px rgba(1,24,117,.18);
  border-bottom-color: rgba(1,24,117,.15);
}
.atc-h__nav-inner {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 74px;
  gap: 8px;
}

/* Logo */
.atc-h__logo {
  display: flex;
  align-items: center;
  gap: 13px;
  text-decoration: none;
  flex-shrink: 0;
  transition: transform .25s;
}
.atc-h__logo:hover { transform: scale(1.02); }
.atc-h__logo-img {
  width: 52px; height: 52px;
  border-radius: 50%;
  overflow: hidden;
  border: 2px solid var(--atc-h-red);
  box-shadow: 0 3px 14px rgba(185,47,41,.25),
              0 0 0 4px rgba(1,24,117,.08);
  flex-shrink: 0;
  background: #fff;
}
.atc-h__logo-img img {
  width: 100%; height: 100%;
  object-fit: cover;
  display: block;
}
.atc-h__logo-words strong {
  display: block;
  font-family: 'Playfair Display', Georgia, serif;
  font-size: 1.35rem;
  font-weight: 900;
  letter-spacing: -.5px;
  color: var(--atc-h-blue);
  line-height: 1;
}
.atc-h__logo-words strong span { color: var(--atc-h-red); }
.atc-h__logo-words small {
  display: block;
  margin-top: 3px;
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .58rem;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  color: var(--atc-h-green);
  max-width: 210px;
  line-height: 1.3;
}

/* Liens nav */
.atc-h__links {
  display: flex;
  align-items: center;
  gap: 2px;
  list-style: none;
  margin: 0 auto;
  padding: 0 12px;
}
.atc-h__links > li { position: relative; }
.atc-h__links > li > a {
  display: flex;
  align-items: center;
  gap: 5px;
  padding: 8px 12px;
  border-radius: 8px;
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .75rem;
  font-weight: 800;
  letter-spacing: .9px;
  text-transform: uppercase;
  color: var(--atc-h-blue);
  text-decoration: none;
  white-space: nowrap;
  transition: var(--atc-h-t);
}
.atc-h__links > li > a:hover,
.atc-h__links > li > a.active {
  color: var(--atc-h-red);
  background: var(--atc-h-red-lt);
}
.atc-h__links > li > a.active::after {
  content: '';
  position: absolute;
  bottom: 0; left: 12px; right: 12px;
  height: 2px;
  background: var(--atc-h-red);
  border-radius: 2px;
}
.atc-h__chev {
  font-size: .58rem;
  opacity: .4;
  transition: transform .25s;
}
.atc-h__links > li:hover .atc-h__chev { transform: rotate(180deg); }

/* Dropdown */
.atc-h__dropdown {
  position: absolute;
  top: calc(100% + 7px);
  left: 0;
  background: var(--atc-h-white);
  border: 1px solid var(--atc-h-gray);
  border-top: 3px solid var(--atc-h-blue);
  border-radius: 0 0 16px 16px;
  min-width: 224px;
  padding: 8px;
  box-shadow: 0 18px 44px rgba(1,24,117,.13);
  opacity: 0;
  visibility: hidden;
  transform: translateY(8px);
  transition: var(--atc-h-t);
  z-index: 200;
  list-style: none;
}
.atc-h__links > li:hover .atc-h__dropdown {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}
.atc-h__dropdown li a {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 14px;
  border-radius: 10px;
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .84rem;
  font-weight: 600;
  color: var(--atc-h-blue);
  text-decoration: none;
  transition: var(--atc-h-t);
}
.atc-h__dropdown li a:hover {
  background: var(--atc-h-off);
  color: var(--atc-h-red);
  padding-left: 18px;
}
.atc-h__dropdown li a i {
  width: 17px;
  color: var(--atc-h-blue-md);
  font-size: .85rem;
  flex-shrink: 0;
  transition: color .2s;
}
.atc-h__dropdown li a:hover i { color: var(--atc-h-red); }
.atc-h__drop-sep {
  height: 1px;
  background: var(--atc-h-gray);
  margin: 5px 10px;
}

/* Boutons CTA */
.atc-h__cta {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
}
.atc-h__btn-alerter {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: linear-gradient(135deg, var(--atc-h-red) 0%, var(--atc-h-red-dk) 100%);
  color: #fff;
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .75rem;
  font-weight: 800;
  letter-spacing: 1px;
  text-transform: uppercase;
  padding: 10px 20px;
  border-radius: 50px;
  text-decoration: none;
  border: none;
  cursor: pointer;
  box-shadow: 0 4px 18px rgba(185,47,41,.38);
  transition: var(--atc-h-t);
  position: relative;
  overflow: hidden;
  white-space: nowrap;
}
.atc-h__btn-alerter::before {
  content: '';
  position: absolute;
  top: 0; left: -100%; width: 100%; height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,.22), transparent);
  transition: left .45s ease;
}
.atc-h__btn-alerter:hover::before { left: 100%; }
.atc-h__btn-alerter:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 26px rgba(185,47,41,.48);
  color: #fff;
}
.atc-h__pulse {
  width: 8px; height: 8px;
  border-radius: 50%;
  background: #fff;
  flex-shrink: 0;
  animation: atcHPulse 1.8s ease infinite;
}
@keyframes atcHPulse {
  0%,100% { box-shadow: 0 0 0 0 rgba(255,255,255,.6); }
  50%      { box-shadow: 0 0 0 5px rgba(255,255,255,0); }
}
.atc-h__btn-adherer {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: var(--atc-h-blue);
  color: #fff;
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .75rem;
  font-weight: 800;
  letter-spacing: 1px;
  text-transform: uppercase;
  padding: 10px 18px;
  border-radius: 50px;
  text-decoration: none;
  box-shadow: 0 3px 16px rgba(1,24,117,.32);
  transition: var(--atc-h-t);
  white-space: nowrap;
}
.atc-h__btn-adherer:hover {
  background: var(--atc-h-blue-dk);
  transform: translateY(-2px);
  box-shadow: 0 7px 22px rgba(1,24,117,.42);
  color: #fff;
}

/* Hamburger */
.atc-h__hamburger {
  display: none;
  background: none;
  border: none;
  cursor: pointer;
  color: var(--atc-h-blue);
  font-size: 1.4rem;
  padding: 6px;
  transition: color .2s;
  line-height: 1;
}
.atc-h__hamburger:hover { color: var(--atc-h-red); }

/* Menu mobile */
.atc-h__mobile {
  display: none;
  flex-direction: column;
  background: var(--atc-h-white);
  border-top: 1px solid var(--atc-h-gray);
  padding: 12px 22px 22px;
}
.atc-h__mobile.open { display: flex; }
.atc-h__mobile a {
  padding: 13px 6px;
  border-bottom: 1px solid var(--atc-h-gray);
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .84rem;
  font-weight: 700;
  letter-spacing: .7px;
  text-transform: uppercase;
  color: var(--atc-h-blue);
  text-decoration: none;
  transition: var(--atc-h-t);
}
.atc-h__mobile a:hover { color: var(--atc-h-red); padding-left: 12px; }
.atc-h__mobile .atc-h__btn-alerter,
.atc-h__mobile .atc-h__btn-adherer {
  margin-top: 14px;
  justify-content: center;
  border-radius: 50px;
}

/* Mobile : sélecteur de langue */
.atc-h__mobile-lang {
  margin-top: 16px;
  padding-top: 16px;
  border-top: 1px solid var(--atc-h-gray);
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
}
.atc-h__mobile-lang-label {
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .72rem;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--atc-h-muted);
  letter-spacing: .5px;
}
.atc-h__mobile-lang-list {
  display: flex;
  gap: 6px;
}
.atc-h__mobile-lang-list a {
  display: inline-block;
  padding: 4px 12px;
  border-radius: 30px;
  font-family: 'Kumbh Sans', system-ui, sans-serif;
  font-size: .72rem;
  font-weight: 700;
  text-decoration: none;
  text-transform: uppercase;
  color: var(--atc-h-blue);
  background: var(--atc-h-off);
  border: 1px solid transparent;
  transition: var(--atc-h-t);
}
.atc-h__mobile-lang-list a:hover,
.atc-h__mobile-lang-list a.active {
  color: #fff;
  background: var(--atc-h-blue);
  border-color: var(--atc-h-blue);
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .atc-h__links > li > a { padding: 7px 9px; font-size: .7rem; }
  .atc-h__links { padding: 0 6px; }
}
@media (max-width: 900px) {
  .atc-h__links,
  .atc-h__cta   { display: none; }
  .atc-h__hamburger { display: block; }
}
@media (max-width: 600px) {
  .atc-h__top-infos .atc-h__top-info:not(:first-child) { display: none; }
  .atc-h__lang-switcher { margin-left: auto; }
  .atc-h__lang-item a { padding: 2px 6px; font-size: .65rem; }
  .atc-h__flag-icon { width: 14px; height: 10px; }
}
</style>

<!-- =====================================================
     TOPBAR
===================================================== -->
<div class="atc-h__topbar" role="banner">
  <div class="atc-h__top-inner">
    <div class="atc-h__top-infos">
      <span class="atc-h__top-info">
        <i class="fas fa-envelope" aria-hidden="true"></i> atc.togo@gmail.com
      </span>
      <span class="atc-h__top-info">
        <i class="fas fa-phone-alt" aria-hidden="true"></i> +228 90 04 37 10 / 90 29 28 28
      </span>
      <span class="atc-h__top-info">
        <i class="fas fa-map-marker-alt" aria-hidden="true"></i> Lomé, Togo
      </span>
      <span class="atc-h__top-info">
        <i class="fas fa-phone-volume" aria-hidden="true"></i>
        Ligne verte&nbsp;: <strong>8280</strong>
      </span>
    </div>
    <div class="atc-h__top-right">
      <div class="atc-h__socials">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
        <a href="#" aria-label="Twitter / X"><i class="fab fa-x-twitter" aria-hidden="true"></i></a>
        <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
        <a href="#" aria-label="YouTube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
      </div>

      <!-- ═══ SÉLECTEUR DE LANGUE (TranslatePress / fallback) ═══ -->
      <div class="atc-h__lang-switcher" role="navigation" aria-label="Sélecteur de langue">
        <ul class="atc-h__lang-list">
          <?php foreach ( $languages as $locale => $lang ) :
            $code = isset( $lang['language_code'] ) ? $lang['language_code'] : substr( $locale, 0, 2 );
            $name = isset( $lang['language_name'] ) ? $lang['language_name'] : $code;
            $active = ( $code === $current_lang_code ) ? ' active' : '';
            $switch_url = atc_switch_lang_url( $code );
          ?>
            <li class="atc-h__lang-item<?php echo $active; ?>">
              <a href="<?php echo esc_url( $switch_url ); ?>"
                 hreflang="<?php echo esc_attr( $code ); ?>"
                 lang="<?php echo esc_attr( $code ); ?>"
                 title="<?php echo esc_attr( $name ); ?>">
                <img src="<?php echo esc_url( atc_flag_url( $code ) ); ?>"
                     alt="<?php echo esc_attr( $name ); ?>"
                     width="18" height="12"
                     loading="lazy"
                     class="atc-h__flag-icon">
                <span class="atc-h__lang-code"><?php echo strtoupper( $code ); ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <!-- FIN sélecteur de langue -->

    </div>
  </div>
</div>

<!-- =====================================================
     BARRE DRAPEAU TOGOLAIS
===================================================== -->
<div class="atc-h__flag" aria-hidden="true">
  <div class="atc-h__flag-g"></div>
  <div class="atc-h__flag-y"></div>
  <div class="atc-h__flag-r"></div>
  <div class="atc-h__flag-g"></div>
  <div class="atc-h__flag-y"></div>
  <div class="atc-h__flag-r"></div>
  <div class="atc-h__flag-g"></div>
  <div class="atc-h__flag-y"></div>
  <div class="atc-h__flag-r"></div>
</div>

<!-- =====================================================
     NAVBAR PRINCIPALE
===================================================== -->
<nav class="atc-h__nav" id="atcHNav" role="navigation" aria-label="Navigation principale">
  <div class="atc-h__nav-inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( $atc_home ); ?>" class="atc-h__logo" aria-label="ATC – Accueil">
      <div class="atc-h__logo-img">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/atc-logo.jpg' ); ?>"
          alt="Logo ATC"
          width="52" height="52"
          loading="eager"
        >
      </div>
      <div class="atc-h__logo-words">
        <strong>A<span>T</span>C</strong>
        <small>Association Togolaise des Consommateurs</small>
      </div>
    </a>

    <!-- Liens -->
    <ul class="atc-h__links">

      <li>
        <a href="<?php echo esc_url( $atc_home ); ?>"
           class="<?php echo atc_active(''); ?>">
          Accueil
        </a>
      </li>

      <li>
        <a href="#">
          Qui sommes-nous
          <i class="fas fa-chevron-down atc-h__chev" aria-hidden="true"></i>
        </a>
        <ul class="atc-h__dropdown">
          <li>
            <a href="<?php echo esc_url( $atc_historique ); ?>"
               class="<?php echo atc_active('historique'); ?>">
              <i class="fas fa-history" aria-hidden="true"></i> Historique
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( $atc_directeur ); ?>"
               class="<?php echo atc_active('mot-du-directeur'); ?>">
              <i class="fas fa-user-tie" aria-hidden="true"></i> Mot du Directeur
            </a>
          </li>
          <div class="atc-h__drop-sep"></div>
          <li>
            <a href="<?php echo esc_url( $atc_objectifs ); ?>"
               class="<?php echo atc_active('objectifs'); ?>">
              <i class="fas fa-bullseye" aria-hidden="true"></i> Objectifs
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( $atc_mission ); ?>"
               class="<?php echo atc_active('mission'); ?>">
              <i class="fas fa-gavel" aria-hidden="true"></i> Mission
            </a>
          </li>
        </ul>
      </li>

      <li>
        <a href="<?php echo esc_url( $atc_activites ); ?>"
           class="<?php echo atc_active('activites'); ?>">
          Activités
        </a>
      </li>

      <li>
        <a href="<?php echo esc_url( $atc_infos ); ?>"
           class="<?php echo atc_active('infos-pratiques'); ?>">
          Infos pratiques
        </a>
      </li>

      <li>
        <a href="#">
          Galerie
          <i class="fas fa-chevron-down atc-h__chev" aria-hidden="true"></i>
        </a>
        <ul class="atc-h__dropdown">
          <li>
            <a href="<?php echo esc_url( $atc_photos ); ?>"
               class="<?php echo atc_active('photos'); ?>">
              <i class="fas fa-images" aria-hidden="true"></i> Photos
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url( $atc_videos ); ?>"
               class="<?php echo atc_active('videos'); ?>">
              <i class="fas fa-video" aria-hidden="true"></i> Vidéos
            </a>
          </li>
        </ul>
      </li>

      <li>
        <a href="<?php echo esc_url( $atc_contact ); ?>"
           class="<?php echo atc_active('contact'); ?>">
          Contact
        </a>
      </li>

    </ul>

    <!-- CTA : Alerter + Adhérer -->
    <div class="atc-h__cta">

      <a href="<?php echo esc_url( $atc_alerter ); ?>"
         class="atc-h__btn-alerter"
         aria-label="Signaler un problème">
        <span class="atc-h__pulse" aria-hidden="true"></span>
        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
        Alerter
      </a>

      <a href="<?php echo esc_url( $atc_adhesion ); ?>"
         class="atc-h__btn-adherer">
        <i class="fas fa-id-card" aria-hidden="true"></i>
        Adhérer
      </a>

    </div>

    <!-- Hamburger (mobile) -->
    <button
      class="atc-h__hamburger"
      id="atcHamburger"
      aria-label="Ouvrir le menu"
      aria-expanded="false"
      aria-controls="atcMobileNav"
    >
      <i class="fas fa-bars" aria-hidden="true"></i>
    </button>

  </div>

  <!-- Menu mobile -->
  <nav class="atc-h__mobile" id="atcMobileNav" aria-label="Navigation mobile">
    <a href="<?php echo esc_url( $atc_home ); ?>">Accueil</a>
    <a href="<?php echo esc_url( $atc_historique ); ?>">Historique</a>
    <a href="<?php echo esc_url( $atc_directeur ); ?>">Mot du Directeur</a>
    <a href="<?php echo esc_url( $atc_objectifs ); ?>">Objectifs</a>
    <a href="<?php echo esc_url( $atc_mission ); ?>">Mission</a>
    <a href="<?php echo esc_url( $atc_activites ); ?>">Activités</a>
    <a href="<?php echo esc_url( $atc_infos ); ?>">Infos pratiques</a>
    <a href="<?php echo esc_url( $atc_photos ); ?>">Photos</a>
    <a href="<?php echo esc_url( $atc_videos ); ?>">Vidéos</a>
    <a href="<?php echo esc_url( $atc_contact ); ?>">Contact</a>

    <!-- Sélecteur de langue en mobile -->
    <div class="atc-h__mobile-lang">
      <span class="atc-h__mobile-lang-label">Langue</span>
      <div class="atc-h__mobile-lang-list">
        <?php foreach ( $languages as $locale => $lang ) :
          $code = isset( $lang['language_code'] ) ? $lang['language_code'] : substr( $locale, 0, 2 );
          $active = ( $code === $current_lang_code ) ? ' active' : '';
          $switch_url = atc_switch_lang_url( $code );
        ?>
          <a href="<?php echo esc_url( $switch_url ); ?>"
             class="<?php echo $active; ?>"
             hreflang="<?php echo esc_attr( $code ); ?>">
            <?php echo strtoupper( $code ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <a href="<?php echo esc_url( $atc_alerter ); ?>" class="atc-h__btn-alerter">
      <span class="atc-h__pulse" aria-hidden="true"></span>
      <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
      Alerter
    </a>
    <a href="<?php echo esc_url( $atc_adhesion ); ?>" class="atc-h__btn-adherer">
      <i class="fas fa-id-card" aria-hidden="true"></i>
      Adhérer
    </a>
  </nav>

</nav>

<!-- =====================================================
     JS HEADER — IIFE scopée
===================================================== -->
<script>
(function () {
  'use strict';

  /* Hamburger */
  var hb  = document.getElementById('atcHamburger');
  var mob = document.getElementById('atcMobileNav');
  if (hb && mob) {
    hb.addEventListener('click', function () {
      var open = mob.classList.toggle('open');
      hb.setAttribute('aria-expanded', open ? 'true' : 'false');
      var ico = hb.querySelector('i');
      if (ico) ico.className = open ? 'fas fa-times' : 'fas fa-bars';
    });
    /* Fermer en cliquant en dehors */
    document.addEventListener('click', function (e) {
      if (!hb.contains(e.target) && !mob.contains(e.target)) {
        mob.classList.remove('open');
        hb.setAttribute('aria-expanded', 'false');
        var ico = hb.querySelector('i');
        if (ico) ico.className = 'fas fa-bars';
      }
    });
  }

  /* Ombre navbar au scroll */
  var nav = document.getElementById('atcHNav');
  if (nav) {
    window.addEventListener('scroll', function () {
      nav.classList.toggle('scrolled', window.scrollY > 20);
    }, { passive: true });
  }

})();
</script>