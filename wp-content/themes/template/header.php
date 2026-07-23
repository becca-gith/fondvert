<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>ATC – Association Togolaise des Consommateurs</title>
  <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;0,900;1,400;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* ===== PALETTE LOGO ATC : BLEU #011875 · ROUGE #B92F29 ===== */
    :root {
      /* — Bleu logo (primaire) — */
      --bleu:           #011875;
      --bleu-fonce:     #010f52;
      --bleu-moyen:     #0a2a9e;
      --bleu-clair:     rgba(1,24,117,0.07);

      /* — Rouge logo (accent) — */
      --rouge:          #B92F29;
      --rouge-fonce:    #8f1f1a;
      --rouge-lt:       rgba(185,47,41,0.08);

      /* — Drapeau togolais (bandes uniquement) — */
      --vert:           #006B3F;
      --vert-clair:     #009E60;
      --vert-fonce:     #004d2e;
      --jaune:          #FFCC00;
      --jaune-dore:     #E6A800;

      /* — Neutres — */
      --blanc:          #FFFFFF;
      --gris-clair:     #F8FAFC;
      --gris-moyen:     #E2E8F0;
      --gris-texte:     #4A5568;
      --texte-fonce:    #1A202C;
      --t: all 0.38s cubic-bezier(.4,0,.2,1);
    }

    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; font-size: 16px; }

    body {
      font-family: 'Kumbh Sans', sans-serif;
      background: var(--blanc);
      color: var(--texte-fonce);
      line-height: 1.7;
      overflow-x: hidden;
    }

    h1, h2, h3 { font-family: 'Playfair Display', serif; line-height: 1.2; }
    .kumbh { font-family: 'Kumbh Sans', sans-serif; }
    .container { max-width: 1280px; margin: 0 auto; padding: 0 28px; }

    /* ─────────────────────────────────────────
       TOPBAR  — fond bleu logo
    ───────────────────────────────────────── */
    .topbar {
      background: var(--bleu);
      color: rgba(255,255,255,0.70);
      font-size: 0.82rem;
      font-weight: 500;
      padding: 12px 0;
      position: relative;
      overflow: hidden;
    }
    .topbar::before {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg,
        rgba(10,42,158,.35) 0%,
        transparent 55%,
        rgba(185,47,41,.12) 100%);
      pointer-events: none;
    }
    .topbar::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg,
        var(--vert)  0%,  var(--vert)  33%,
        var(--jaune) 33%, var(--jaune) 66%,
        var(--rouge) 66%, var(--rouge) 100%);
    }
    .topbar .inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
      position: relative; z-index: 1;
    }
    .topbar .infos { display: flex; gap: 28px; flex-wrap: wrap; }
    .topbar .infos span {
      display: flex; align-items: center; gap: 8px;
      transition: var(--t);
    }
    .topbar .infos span:hover { color: var(--blanc); }
    .topbar .infos i { color: var(--jaune); font-size: 0.85rem; }
    .topbar .socials { display: flex; gap: 10px; }
    .topbar .socials a {
      width: 30px; height: 30px;
      border-radius: 50%;
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.14);
      color: rgba(255,255,255,0.65);
      display: inline-flex; align-items: center; justify-content: center;
      font-size: 0.8rem;
      transition: var(--t);
      text-decoration: none;
    }
    .topbar .socials a:hover {
      background: var(--rouge);
      border-color: var(--rouge);
      color: var(--blanc);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(185,47,41,.4);
    }

    /* Bouton Alerter — rouge logo */
    .btn-alerter {
      background: var(--rouge);
      color: var(--blanc) !important;
      padding: 6px 16px;
      border-radius: 40px;
      font-weight: 700;
      font-size: 0.75rem;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: var(--t);
      box-shadow: 0 3px 12px rgba(185,47,41,.35);
      position: relative;
      overflow: hidden;
    }
    .btn-alerter::before {
      content: '';
      position: absolute;
      top: 0; left: -100%; width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,.2), transparent);
      transition: left .4s ease;
    }
    .btn-alerter:hover::before { left: 100%; }
    .btn-alerter:hover {
      background: var(--rouge-fonce);
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(185,47,41,.45);
    }

    /* ─────────────────────────────────────────
       NAVBAR  — fond blanc, texte bleu logo
    ───────────────────────────────────────── */
    .navbar {
      background: rgba(255,255,255,0.98);
      backdrop-filter: blur(24px);
      position: sticky; top: 0; z-index: 9999;
      border-bottom: 2px solid var(--gris-moyen);
      transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }
    .navbar.scrolled {
      box-shadow: 0 4px 30px rgba(1,24,117,0.14);
      border-bottom-color: rgba(1,24,117,0.12);
    }
    .navbar .inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 28px;
    }

    /* ── Logo centré (image) ── */
    .nav-center a {
      display: inline-flex;
      align-items: center;
      text-decoration: none;
      transition: var(--t);
    }
    .nav-center a:hover { transform: scale(1.03); }
    .logo-img {
      height: 52px;
      width: auto;
      display: block;
      filter: drop-shadow(0 2px 6px rgba(1,24,117,.18));
    }

    /* ── Liens nav — texte bleu logo ── */
    .nav-links {
      display: flex; align-items: center; gap: 4px;
      list-style: none;
    }
    .nav-links > li { position: relative; }
    .nav-links > li > a {
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.82rem; font-weight: 700;
      color: var(--bleu);
      text-decoration: none;
      padding: 9px 14px;
      border-radius: 30px;
      display: flex; align-items: center; gap: 5px;
      transition: var(--t);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      white-space: nowrap;
    }
    .nav-links > li > a:hover,
    .nav-links > li > a.active {
      color: var(--rouge);
      background: var(--rouge-lt);
    }
    .nav-links > li > a i.chevron {
      font-size: 0.6rem;
      opacity: .45;
      transition: transform 0.3s ease;
    }
    .nav-links > li:hover > a i.chevron { transform: rotate(180deg); }

    /* ── Dropdown — bordure supérieure bleu logo ── */
    .dropdown-panel {
      position: absolute; top: calc(100% + 8px); left: 0;
      background: var(--blanc);
      border: 1px solid var(--gris-moyen);
      border-top: 3px solid var(--bleu);
      border-radius: 0 0 18px 18px;
      min-width: 230px;
      padding: 10px;
      box-shadow: 0 20px 50px rgba(1,24,117,0.12);
      opacity: 0; visibility: hidden;
      transform: translateY(10px);
      transition: var(--t);
      z-index: 100;
      list-style: none;
    }
    .nav-links > li:hover .dropdown-panel {
      opacity: 1; visibility: visible; transform: translateY(0);
    }
    .dropdown-panel li a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 11px 16px;
      border-radius: 12px;
      font-size: 0.8rem; font-weight: 600;
      color: var(--bleu);
      text-decoration: none;
      transition: var(--t);
      text-transform: uppercase;
      letter-spacing: 0.2px;
    }
    .dropdown-panel li a:hover {
      background: var(--gris-clair);
      color: var(--rouge);
      padding-left: 22px;
    }

    /* ── Bouton Adhérer — bleu logo ── */
    .btn-nav-cta {
      font-family: 'Kumbh Sans', sans-serif !important;
      background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 100%) !important;
      color: #fff !important;
      border-radius: 50px !important;
      padding: 10px 22px !important;
      margin-left: 6px;
      box-shadow: 0 5px 18px rgba(1,24,117,0.32) !important;
      font-weight: 700 !important;
      font-size: 0.82rem !important;
      text-transform: uppercase !important;
    }
    .btn-nav-cta:hover {
      transform: translateY(-2px) !important;
      box-shadow: 0 9px 24px rgba(1,24,117,0.42) !important;
      background: linear-gradient(135deg, var(--bleu-moyen) 0%, var(--bleu) 100%) !important;
      color: #fff !important;
    }

    /* ── Hamburger ── */
    .hamburger {
      display: none;
      align-items: center;
      justify-content: center;
      width: 44px;
      height: 44px;
      background: none;
      border: none;
      cursor: pointer;
      color: var(--bleu);
      font-size: 1.4rem;
      border-radius: 50%;
      transition: var(--t);
      line-height: 1;
      flex-shrink: 0;
    }
    .hamburger:hover,
    .hamburger[aria-expanded="true"] {
      color: var(--rouge);
      background: var(--rouge-lt);
    }

    /* ── Menu mobile (panneau déroulant) ── */
    .mobile-nav {
      display: flex;
      flex-direction: column;
      max-height: 0;
      overflow: hidden;
      opacity: 0;
      background: var(--blanc);
      border-top: 0 solid var(--gris-moyen);
      padding: 0 20px;
      transition: max-height .42s cubic-bezier(.4,0,.2,1), opacity .3s ease;
    }
    .mobile-nav.open {
      max-height: min(80vh, 640px);
      opacity: 1;
      overflow-y: auto;
      border-top-width: 1px;
      padding: 10px 20px 24px;
    }
    .mobile-nav .mnav-label {
      margin-top: 10px;
      padding: 10px 4px 4px;
      font-size: 0.72rem;
      font-weight: 800;
      letter-spacing: 0.6px;
      text-transform: uppercase;
      color: var(--rouge);
      opacity: .8;
    }
    .mobile-nav a {
      padding: 14px 4px;
      border-bottom: 1px solid var(--gris-moyen);
      font-weight: 700; color: var(--bleu); text-decoration: none;
      font-size: 0.92rem; transition: var(--t);
      text-transform: uppercase;
      display: flex;
      align-items: center;
      gap: 10px;
      min-height: 44px;
    }
    .mobile-nav a.sub-link {
      padding-left: 18px;
      font-size: 0.85rem;
      color: var(--gris-texte);
    }
    .mobile-nav a:hover,
    .mobile-nav a:active { color: var(--rouge); padding-left: 12px; }
    .mobile-nav a.sub-link:hover,
    .mobile-nav a.sub-link:active { padding-left: 26px; }
    .mobile-nav a i { width: 18px; text-align: center; color: var(--rouge); font-size: .85rem; }
    .mobile-nav .mnav-cta {
      margin-top: 16px;
      justify-content: center;
      background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 100%);
      color: #fff !important;
      border-radius: 50px;
      border-bottom: none;
      padding: 14px;
    }
    .mobile-nav .mnav-cta i { color: #fff; }

    /* ── Responsive ── */
    @media (max-width: 1100px) {
      .nav-links > li > a { padding: 8px 10px; font-size: .76rem; }
    }
    @media (max-width: 992px) {
      .nav-left, .nav-right { display: none !important; }
      .hamburger { display: flex; }
      .navbar .inner { justify-content: space-between; }
      .logo-img { height: 46px; }
    }
    @media (max-width: 600px) {
      .topbar .infos span:not(:first-child) { display: none; }
    }
    @media (max-width: 420px) {
      .logo-img { height: 40px; }
      .navbar .inner { padding: 12px 18px; }
    }
  </style>
</head>
<body>

<!-- ═══════ TOPBAR ═══════ -->
<div class="topbar">
  <div class="container inner">
    <div class="infos">
      <span><i class="fas fa-envelope"></i> atctogo@yahoo.fr</span>
      <span><i class="fas fa-phone-alt"></i> +228 90 04 35 10</span>
      
    </div>
    <div style="display: flex; gap: 16px; align-items: center;">
      <a href="<?php echo esc_url(home_url('/alerter')); ?>" class="btn-alerter">
        <i class="fas fa-exclamation-triangle"></i> Nous alerter
      </a>
      <div class="socials">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" aria-label="Twitter/X"><i class="fab fa-x-twitter"></i></a>
        <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </div>
</div>

<?php
$home_url        = home_url('/');
$historique_url  = home_url('/historique');
$mot_directeur_url = home_url('/mot-du-directeur');
$objectifs_url   = home_url('/objectifs');
$missions_url    = home_url('/mission');
$activites_url   = home_url('/activites');
$infos_url       = home_url('/infos-pratiques');
$contact_url     = home_url('/contact');
$adhesion_url    = home_url('/adhesion');
$alerter_url     = home_url('/alerter');
$photos_url      = home_url('/photos');
$videos_url      = home_url('/videos');

$current_slug    = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$is_home         = ($current_slug === '');
$is_activites    = ($current_slug === 'activites');
$is_infos        = ($current_slug === 'infos-pratiques');
$is_contact      = ($current_slug === 'contact');
$is_adhesion     = ($current_slug === 'adhesion');
?>

<!-- ═══════ NAVBAR ═══════ -->
<nav class="navbar" id="mainNav">
  <div class="container inner">

    <!-- GAUCHE (desktop uniquement) -->
    <div class="nav-left">
      <ul class="nav-links">
        <li>
          <a href="<?php echo esc_url($home_url); ?>"
             class="<?php echo $is_home ? 'active' : ''; ?>">Accueil</a>
        </li>
        <li class="dropdown">
          <a href="#">Qui sommes-nous <i class="fas fa-chevron-down chevron"></i></a>
          <ul class="dropdown-panel">
            <li><a href="<?php echo esc_url($historique_url); ?>">Historique</a></li>
            <li><a href="<?php echo esc_url($mot_directeur_url); ?>">Mot du Président</a></li>
            <li><a href="<?php echo esc_url($objectifs_url); ?>">Objectifs</a></li>
            <li><a href="<?php echo esc_url($missions_url); ?>">Mission</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo esc_url($activites_url); ?>"
             class="<?php echo $is_activites ? 'active' : ''; ?>">Activités</a>
        </li>
      </ul>
    </div>

    <!-- CENTRE : Logo image (toujours visible, desktop + mobile) -->
    <div class="nav-center">
      <a href="<?php echo esc_url($home_url); ?>" aria-label="ATC – Accueil">
        <img
          src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo_atc.png'); ?>"
          alt="Logo ATC – Association Togolaise des Consommateurs"
          class="logo-img"
        >
      </a>
    </div>

    <!-- DROITE (desktop uniquement) -->
    <div class="nav-right">
      <ul class="nav-links">
        <li>
          <a href="<?php echo esc_url($infos_url); ?>"
             class="<?php echo $is_infos ? 'active' : ''; ?>">Infos pratiques</a>
        </li>
        <li class="dropdown">
          <a href="#">Galerie <i class="fas fa-chevron-down chevron"></i></a>
          <ul class="dropdown-panel">
            <li><a href="<?php echo esc_url($photos_url); ?>">Photos</a></li>
            <li><a href="<?php echo esc_url($videos_url); ?>">Vidéos</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo esc_url($contact_url); ?>"
             class="<?php echo $is_contact ? 'active' : ''; ?>">Contact</a>
        </li>
        <li>
          <a href="<?php echo esc_url($adhesion_url); ?>"
             class="btn-nav-cta <?php echo $is_adhesion ? 'active' : ''; ?>">
            <i class="fas fa-id-card"></i> Adhérer
          </a>
        </li>
      </ul>
    </div>

    <!-- Hamburger (mobile uniquement) -->
    <button class="hamburger" id="atcHamburger" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="atcMobileNav">
      <i class="fas fa-bars"></i>
    </button>

  </div>

  <!-- Navigation mobile -->
  <div class="mobile-nav" id="atcMobileNav" aria-label="Navigation mobile">
    <a href="<?php echo esc_url($home_url); ?>"><i class="fas fa-house"></i> Accueil</a>

    <div class="mnav-label">Qui sommes-nous</div>
    <a class="sub-link" href="<?php echo esc_url($historique_url); ?>"><i class="fas fa-clock-rotate-left"></i> Historique</a>
    <a class="sub-link" href="<?php echo esc_url($mot_directeur_url); ?>"><i class="fas fa-comment"></i> Mot du Président</a>
    <a class="sub-link" href="<?php echo esc_url($objectifs_url); ?>"><i class="fas fa-bullseye"></i> Objectifs</a>
    <a class="sub-link" href="<?php echo esc_url($missions_url); ?>"><i class="fas fa-flag"></i> Mission</a>

    <a href="<?php echo esc_url($activites_url); ?>"><i class="fas fa-calendar-days"></i> Activités</a>
    <a href="<?php echo esc_url($infos_url); ?>"><i class="fas fa-circle-info"></i> Infos pratiques</a>

    <div class="mnav-label">Galerie</div>
    <a class="sub-link" href="<?php echo esc_url($photos_url); ?>"><i class="fas fa-image"></i> Photos</a>
    <a class="sub-link" href="<?php echo esc_url($videos_url); ?>"><i class="fas fa-video"></i> Vidéos</a>

    <a href="<?php echo esc_url($contact_url); ?>"><i class="fas fa-envelope"></i> Contact</a>
    <a class="mnav-cta" href="<?php echo esc_url($adhesion_url); ?>"><i class="fas fa-id-card"></i> Adhérer</a>
  </div>
</nav>

<!-- ═══════ JS ═══════ -->
<script>
function atcInitHeaderMenu() {
  try {
    var hb  = document.getElementById('atcHamburger');
    var mob = document.getElementById('atcMobileNav');

    if (!hb || !mob) {
      // Les éléments n'existent pas encore (ou plus) dans le DOM.
      console.warn('[ATC menu] Bouton ou panneau mobile introuvable.', { hb: !!hb, mob: !!mob });
      return;
    }

    // Évite un double-attachement si le script est chargé/exécuté deux fois
    // (fréquent avec certains plugins de cache/minification).
    if (hb.dataset.atcBound === '1') return;
    hb.dataset.atcBound = '1';

    function toggleIcon(open) {
      var ico = hb.querySelector('i');
      if (ico) ico.className = open ? 'fas fa-times' : 'fas fa-bars';
    }

    function closeMenu() {
      mob.classList.remove('open');
      hb.setAttribute('aria-expanded', 'false');
      hb.setAttribute('aria-label', 'Ouvrir le menu');
      toggleIcon(false);
    }

    function openMenu() {
      mob.classList.add('open');
      hb.setAttribute('aria-expanded', 'true');
      hb.setAttribute('aria-label', 'Fermer le menu');
      toggleIcon(true);
    }

    hb.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      if (mob.classList.contains('open')) {
        closeMenu();
      } else {
        openMenu();
      }
    }, false);

    document.addEventListener('click', function (e) {
      if (mob.classList.contains('open') && !hb.contains(e.target) && !mob.contains(e.target)) {
        closeMenu();
      }
    }, false);

    Array.prototype.forEach.call(mob.querySelectorAll('a'), function (link) {
      link.addEventListener('click', closeMenu, false);
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth > 992 && mob.classList.contains('open')) {
        closeMenu();
      }
    }, false);

    console.log('[ATC menu] Initialisé avec succès.');
  } catch (err) {
    console.error('[ATC menu] Erreur d\'initialisation :', err);
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', atcInitHeaderMenu);
} else {
  // Le DOM est déjà prêt (script chargé en différé/async par un plugin) :
  // on initialise tout de suite.
  atcInitHeaderMenu();
}

// Filet de sécurité : si un plugin de cache déplace/duplique ce script,
// ou si le DOM n'était pas encore stable, on retente une fois au "load".
window.addEventListener('load', atcInitHeaderMenu);

/* Ombre navbar au scroll */
window.addEventListener('scroll', function () {
  var nav = document.getElementById('mainNav');
  if (nav) nav.classList.toggle('scrolled', window.scrollY > 20);
}, { passive: true });
</script>
