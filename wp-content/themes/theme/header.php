<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php if ( is_singular() ) : ?>
        <meta name="description" content="<?php echo esc_attr( get_the_excerpt() ); ?>" />
    <?php endif; ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicons/apple-touch-icon.png' ); ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicons/favicon-32x32.png' ); ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicons/favicon-16x16.png' ); ?>" />
    <link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicons/site.webmanifest' ); ?>" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;600;700;800&family=Playfair+Display:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Feuilles de style du thème -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/bootstrap/css/bootstrap.min.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/bootstrap-select/bootstrap-select.min.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/animate/animate.min.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/icofont/icofont.min.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/jquery-ui/jquery-ui.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/jarallax/jarallax.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/nouislider/nouislider.min.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/nouislider/nouislider.pips.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/tiny-slider/tiny-slider.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/slick/slick.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/alefox-icons/style.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/owl-carousel/css/owl.carousel.min.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/vendors/owl-carousel/css/owl.theme.default.min.css' ); ?>" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/css/alefox.css' ); ?>" />

    <style>
        /* ========== VARIABLES ========== */
        :root {
            --fvt-green:       #0a6e3e;
            --fvt-green-dark:  #063d24;
            --fvt-green-light: #e8f5ec;
            --fvt-yellow:      #ffce00;
            --fvt-red:         #d21034;
            --fvt-text:        #1c2b22;
            --fvt-white:       #ffffff;
            --fvt-shadow:      0 4px 24px rgba(6, 61, 36, 0.10);
            --fvt-shadow-lg:   0 20px 45px rgba(6, 61, 36, 0.16);
            --fvt-font-body:   'Playfair Display', sans-serif;
            --fvt-font-title:  'Playfair Display', serif;
        }

        /* Utilitaire pour les grands titres de section */
        .fvt-title,
        .fvt-title-serif {
            font-family: var(--fvt-font-title) !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ========== POLICE PAR DÉFAUT ========== */
        html { font-family: 'Playfair Display', sans-serif; }
        body,
        button, input, select, textarea,
        h1, h2, h3, h4, h5, h6,
        p, a, span, li, ul, div,
        .main-menu__list, .fvt-mobile-nav, .topbar-two, .fvt-cta-btn {
            font-family: 'Playfair Display', sans-serif !important;
            color: var(--fvt-text);
        }
        body { font-weight: 400; }

        * { box-sizing: border-box; }

        /* ========== LISERÉ DRAPEAU ========== */
        .fvt-flag-strip {
            display: flex;
            width: 100%;
            height: 5px;
        }
        .fvt-flag-strip span { flex: 1; }
        .fvt-flag-strip span:nth-child(1) { background: var(--fvt-green); }
        .fvt-flag-strip span:nth-child(2) { background: var(--fvt-yellow); }
        .fvt-flag-strip span:nth-child(3) { background: var(--fvt-red); }

        /* ========== TOPBAR ========== */
        .topbar-two {
            background: #0a6e3e;   /* ← vert foncé */
            margin-bottom: 0;                    /* ← supprime l'espace sous le topbar */
            padding-bottom: 0;
            position: relative;
            border-bottom: 2px solid var(--fvt-yellow); /* séparation élégante */
        }
        .topbar-two__inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 13px;
            color: #dcf0e3;
            flex-wrap: wrap;
            gap: 8px 20px;
        }
        .fvt-topbar__contacts {
            display: flex;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }
        .fvt-topbar__contacts a,
        .fvt-topbar__contacts .fvt-topbar__item {
            display: inline-flex;
            align-items: center;
            color: #dcf0e3;
            font-weight: 500;
            transition: color .2s ease;
            text-decoration: none;
        }
        .fvt-topbar__contacts a:hover { color: var(--fvt-yellow); }
        .fvt-topbar__contacts i {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px; height: 24px;
            margin-right: 8px;
            border-radius: 50%;
            background: rgba(255, 206, 0, 0.14);
            color: var(--fvt-yellow);
            font-size: 11.5px;
        }
        .fvt-topbar__divider {
            width: 1px;
            height: 14px;
            background: rgba(255,255,255,0.18);
        }

        .fvt-topbar__right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .fvt-topbar__social {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .fvt-topbar__social a {
            width: 28px; height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255,255,255,0.10);
            color: #dcf0e3;
            font-size: 12.5px;
            transition: all .25s ease;
            text-decoration: none;
        }
        .fvt-topbar__social a:hover {
            background: var(--fvt-yellow);
            color: var(--fvt-green-dark);
            transform: translateY(-2px);
        }

        @media (max-width: 767px) {
            .fvt-hide-mobile { display: none !important; }
            .topbar-two__inner { justify-content: center; text-align: center; }
        }

        /* ========== HEADER PRINCIPAL ========== */
        .main-header--three {
            background: var(--fvt-green-dark);   /* ← même vert foncé que le topbar */
            margin-top: 0;                       /* ← supprime l'espace au-dessus du header */
            padding-top: 0;
            box-shadow: var(--fvt-shadow);
            position: relative;
            z-index: 200;
            width: 100%;
        }
        .main-header--three.sticky-header--active {
            box-shadow: var(--fvt-shadow-lg);
        }
        .main-header__inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 10px 22px;
            width: 100%;
            max-width: none;
            margin: 0;
        }

        /* ========== LOGO (Armoiries du Togo) ========== */
        .main-header__logo {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
        }
        .main-header__logo-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: var(--fvt-white);
            border: 3px solid var(--fvt-yellow);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
            padding: 6px;
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .main-header__logo:hover .main-header__logo-badge {
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.3);
        }
        .main-header__logo-badge img,
        .main-header__logo-badge .custom-logo {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        /* ========== MENU PRINCIPAL ========== */
        .main-header__nav { flex: 1; display: flex; justify-content: center; min-width: 0; }
        .main-menu__list {
            display: flex;
            align-items: center;
            gap: 8px;                        /* ← espace entre les éléments du menu */
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .main-menu__list > li { position: relative; }
        .main-menu__list > li > a {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 12px 22px;              /* ← padding horizontal augmenté */
            font-size: 12.5px;
            font-weight: 700;
            text-transform: uppercase;       /* ← LETTRES CAPITALES */
            letter-spacing: 0.5px;
            color: var(--fvt-white);
            white-space: nowrap;
            position: relative;
            transition: color .25s ease;
            text-decoration: none;
        }
        .main-menu__list > li.dropdown > a::before {
            content: '';
            width: 6px;
            height: 6px;
            border-right: 2px solid currentColor;
            border-bottom: 2px solid currentColor;
            transform: rotate(45deg);
            margin-left: 2px;
            margin-top: -3px;
            opacity: 0.75;
            transition: transform .25s ease, opacity .25s ease;
        }
        .main-menu__list > li.dropdown:hover > a::before {
            transform: rotate(225deg);
            margin-top: 3px;
            opacity: 1;
        }
        .main-menu__list > li > a::after {
            content: '';
            position: absolute;
            left: 22px; right: 22px; bottom: 4px; /* aligné avec le nouveau padding */
            height: 3px;
            background: var(--fvt-yellow);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border-radius: 2px;
        }
        .main-menu__list > li > a:hover,
        .main-menu__list > li.current > a,
        .main-menu__list > li.current-menu-item > a,
        .main-menu__list > li:hover > a {
            color: var(--fvt-yellow);
        }
        .main-menu__list > li > a:hover::after,
        .main-menu__list > li.current > a::after,
        .main-menu__list > li.current-menu-item > a::after {
            transform: scaleX(1);
        }

        /* ========== SOUS-MENUS (Dropdown) ========== */
        .main-menu__list .sub-menu {
            position: absolute;
            top: 100%; left: 50%;
            transform: translate(-50%, 10px);
            min-width: 240px;
            background: var(--fvt-white);
            border-top: 3px solid var(--fvt-green);
            box-shadow: var(--fvt-shadow-lg);
            border-radius: 0 0 12px 12px;
            padding: 8px 0;
            margin: 0;
            list-style: none;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity .25s ease, transform .25s ease, visibility .25s ease;
            z-index: 99;
        }
        .main-menu__list .dropdown:hover > .sub-menu {
            opacity: 1;
            visibility: visible;
            transform: translate(-50%, 0);
            pointer-events: auto;
        }
        .main-menu__list .sub-menu li a {
            display: block;
            padding: 10px 22px;
            font-size: 13.5px;
            font-weight: 600;
            color: #35443a;
            border-left: 3px solid transparent;
            transition: all .2s ease;
            text-decoration: none;
            text-transform: none;
            letter-spacing: 0;
        }
        .main-menu__list .sub-menu li a:hover {
            background: var(--fvt-green-light);
            border-left-color: var(--fvt-yellow);
            color: var(--fvt-green-dark);
            padding-left: 28px;
        }

        /* ========== BADGE "ACTIF" ========== */
        .badge-actif {
            background: var(--fvt-red);
            color: #fff;
            font-size: 9.5px;
            font-weight: 800;
            padding: 2px 9px;
            border-radius: 20px;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            box-shadow: 0 0 0 0 rgba(210, 16, 52, 0.5);
            animation: fvt-pulse 2s infinite;
            display: inline-block;
            line-height: 1.5;
        }
        .badge-actif.attention {
            background: var(--fvt-yellow);
            color: var(--fvt-green-dark);
            box-shadow: 0 0 0 0 rgba(255, 206, 0, 0.5);
        }
        @keyframes fvt-pulse {
            0%   { box-shadow: 0 0 0 0 rgba(210, 16, 52, 0.4); }
            70%  { box-shadow: 0 0 0 8px rgba(210, 16, 52, 0); }
            100% { box-shadow: 0 0 0 0 rgba(210, 16, 52, 0); }
        }

        /* ========== ACTIONS DROITE (header) ========== */
        .main-header__right {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .fvt-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--fvt-yellow);
            color: var(--fvt-green-dark) !important;
            font-size: 12px;
            font-weight: 700;
            padding: 9px 18px;
            border-radius: 30px;
            border: 2px solid var(--fvt-yellow);
            transition: all .3s ease;
            text-decoration: none;
            white-space: nowrap;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .fvt-cta-btn:hover {
            background: var(--fvt-white);
            border-color: var(--fvt-white);
            color: var(--fvt-green-dark) !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .fvt-cta-btn i { font-size: 14px; }

        /* Variante compacte du CTA pour le topbar */
        .fvt-cta-btn--topbar {
            font-size: 11px;
            padding: 7px 16px;
            background: var(--fvt-yellow);
            border-color: var(--fvt-yellow);
        }
        .fvt-cta-btn--topbar:hover {
            background: var(--fvt-white);
            border-color: var(--fvt-white);
        }

        /* ========== BURGER MENU (mobile) ========== */
        .mobile-nav__btn {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 8px;
            background: rgba(255, 255, 255, 0.14);
            border: none;
            border-radius: 8px;
        }
        .mobile-nav__btn span {
            width: 24px;
            height: 3px;
            border-radius: 2px;
            background: var(--fvt-white);
            transition: all .25s ease;
        }
        .mobile-nav__btn.is-active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
        .mobile-nav__btn.is-active span:nth-child(2) { opacity: 0; }
        .mobile-nav__btn.is-active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }

        /* ========== OFF-CANVAS MOBILE ========== */
        .fvt-mobile-nav {
            position: fixed;
            top: 0; right: -320px;
            width: 300px;
            max-width: 85vw;
            height: 100vh;
            background: var(--fvt-white);
            box-shadow: -10px 0 40px rgba(0,0,0,0.18);
            z-index: 999;
            padding: 26px 24px;
            overflow-y: auto;
            transition: right .35s ease;
        }
        .fvt-mobile-nav.is-open { right: 0; }
        .fvt-mobile-nav__close {
            width: 36px; height: 36px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%;
            background: var(--fvt-green-light);
            color: var(--fvt-green-dark);
            border: none;
            font-size: 18px;
            margin-left: auto;
            margin-bottom: 20px;
            cursor: pointer;
        }
        .fvt-mobile-nav ul { list-style: none; margin: 0; padding: 0; }
        .fvt-mobile-nav > ul > li { border-bottom: 1px solid #eef3f0; }
        .fvt-mobile-nav > ul > li > a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 4px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: var(--fvt-text);
            text-decoration: none;
        }
        .fvt-mobile-nav .sub-menu {
            display: none;
            padding-left: 14px;
            padding-bottom: 8px;
        }
        .fvt-mobile-nav .sub-menu li a {
            display: block;
            padding: 9px 4px;
            font-size: 13.5px;
            font-weight: 500;
            color: #4a5a4f;
            text-decoration: none;
        }
        .fvt-mobile-nav-overlay {
            position: fixed;
            inset: 0;
            background: rgba(6, 61, 36, 0.45);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transition: opacity .3s ease, visibility .3s ease;
        }
        .fvt-mobile-nav-overlay.is-open {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 1199px) {
            .main-header__nav { display: none; }
            .mobile-nav__btn { display: flex; }
            .main-header__inner { padding: 12px 20px; }
            .main-header__logo-badge { width: 52px; height: 52px; }
        }

        @media (max-width: 575px) {
            .fvt-cta-btn--topbar { display: none; }
        }

        @media (max-width: 480px) {
            .main-header__right { gap: 10px; }
        }

        /* ==========================================================
           SURCHARGE FORCÉE pour neutraliser les règles d'alefox.css
           ========================================================== */
        .main-header.main-header--three {
            background: var(--fvt-green-dark) !important;
            width: 100% !important;
        }
        .main-header--three .main-header__inner {
            padding: 10px 22px !important;
            width: 100% !important;
            max-width: none !important;
        }
        .main-header--three .main-header__logo,
        .main-header__logo {
            position: static !important;
            top: 0 !important;
            width: auto !important;
            flex: 0 0 auto !important;
            order: 0 !important;
            justify-content: flex-start !important;
            margin: 0 !important;
        }
        .main-menu .main-menu__list,
        .main-menu .main-menu__list ul.sub-menu {
            margin: 0 !important;
            padding: 0 !important;
        }
        .main-header--three .main-menu .main-menu__list {
            display: flex !important;
            gap: 8px !important;             /* ← espace entre les items */
            flex: 1 1 auto !important;
            justify-content: center !important;
            order: 1 !important;
        }
        .main-menu .main-menu__list > li {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin-left: 0 !important;
        }
        .main-header--three .main-menu .main-menu__list > li > a {
            font-family: var(--fvt-font-body) !important;
            color: var(--fvt-white) !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            font-weight: 900 !important;
            font-size: 15.5px !important;
            padding: 12px 22px !important;    /* ← padding augmenté */
            text-shadow: none !important;
        }
        .main-header--three .main-menu .main-menu__list > li.current > a,
        .main-header--three .main-menu .main-menu__list > li:hover > a {
            color: var(--fvt-yellow) !important;
        }
        .main-header--three .main-menu .main-menu__list > li.dropdown > a::after {
            content: '' !important;
        }
        .main-menu .main-menu__list li ul.sub-menu {
            background-color: var(--fvt-white) !important;
            box-shadow: var(--fvt-shadow-lg) !important;
            padding: 8px 0 !important;
            border-top: 3px solid var(--fvt-green) !important;
            border-radius: 0 0 12px 12px !important;
        }
        .main-menu .main-menu__list li ul.sub-menu li > a {
            font-family: var(--fvt-font-body) !important;
            color: #35443a !important;
            text-transform: none !important;
            font-weight: 600 !important;
            font-size: 13.5px !important;
            padding: 10px 22px !important;
            margin-bottom: 0 !important;
        }
        .main-menu .main-menu__list li ul.sub-menu li > a::after {
            content: '' !important;
        }
        .main-menu .main-menu__list li ul.sub-menu li.current > a,
        .main-menu .main-menu__list li ul.sub-menu li:hover > a {
            background-color: var(--fvt-green-light) !important;
            color: var(--fvt-green-dark) !important;
        }
        .topbar-two .fvt-cta-btn--topbar {
            text-transform: uppercase !important;
        }
        .main-header--three .main-header__right {
            padding: 0 !important;
            margin-left: 0 !important;
            order: 2 !important;
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Curseurs personnalisés (optionnels) -->
<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>

<div class="page-wrapper">

    <!-- Liseré drapeau -->
    <div class="fvt-flag-strip"><span></span><span></span><span></span></div>

    <!-- Topbar -->
    <div class="topbar-two">
        <div class="container">
            <div class="topbar-two__inner">
                <div class="fvt-topbar__contacts">
                    <a href="tel:+22820223040"><i class="fas fa-phone-alt"></i>+228 20 22 30 40</a>
                    <span class="fvt-hide-mobile fvt-topbar__divider"></span>
                    <a href="mailto:contact@togogreenfund.tg" class="fvt-hide-mobile"><i class="fas fa-envelope"></i>contact@togogreenfund.tg</a>
                    <span class="fvt-hide-mobile fvt-topbar__divider"></span>
                    <span class="fvt-topbar__item fvt-hide-mobile"><i class="fas fa-map-marker-alt"></i>Lomé, Togo</span>
                </div>
                <div class="fvt-topbar__right">
                   <!-- <a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'soumettre' ) ); ?>" class="fvt-cta-btn fvt-cta-btn--topbar">
                        <i class="fas fa-file-signature"></i> Soumettre un projet
                    </a> -->
                    <div class="fvt-topbar__social">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                     
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="main-header main-header--three sticky-header sticky-header--normal">
        <div class="main-header__inner">

            <!-- LOGO : Armoiries du Togo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="main-header__logo">
                <span class="main-header__logo-badge">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/armoirie-togo.png' ); ?>"
                             alt="Armoiries du Togo - <?php bloginfo( 'name' ); ?>" />
                    <?php endif; ?>
                </span>
            </a>

            <!-- MENU -->
            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">

                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a></li>

                    <li class="dropdown">
                        <a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'a-propos' ) ); ?>">À propos</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'mission' ) ); ?>">Mission</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'champs' ) ); ?>">Champ d'action</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'organigramme' ) ); ?>">Organigramme</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'equipe' ) ); ?>">Équipe</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'opportunite' ) ); ?>">Opportunités</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'projets' ) ); ?>">Projets</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'soumettre' ) ); ?>">Soumettre un projet</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'manifester' ) ); ?>">Manifestation d'intérêt</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'guichet' ) ); ?>">Guichets</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'agriculture-durable' ) ); ?>">Agriculture Durable</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'foret-et-biodiversite' ) ); ?>">Forêt et Biodiversité</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'eau-et-assainissement' ) ); ?>">Eau et Assainissement</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'energie-et-infrastructure-durable' ) ); ?>">Énergie et Infrastructures Durables</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'projet-realise' ) ); ?>">Projets</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'grand-projet-realise' ) ); ?>">Grands Projets réalisés</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'projet-approuve' ) ); ?>">Projets Approuvés</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Actualités</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'communique-officiel' ) ); ?>">Communiqués Officiels</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'infos' ) ); ?>">Infos</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'evenement' ) ); ?>">Évènements</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'ressources' ) ); ?>">Ressources</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'documents' ) ); ?>">Documents</a></li>
                            <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'mediatheque' ) ); ?>">Médiathèque</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'liens-utiles' ) ); ?>">Liens utiles</a>
                        <ul class="sub-menu">
                            <li><a href="#" target="_blank" rel="noopener">Ministère de l'Environnement</a></li>
                            <li><a href="#" target="_blank" rel="noopener">Présidence de la République</a></li>
                            <li><a href="#" target="_blank" rel="noopener">Autres structures partenaires</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>

            <!-- DROITE : menu mobile uniquement -->
            <div class="main-header__right">
                <button class="mobile-nav__btn" id="fvtMobileNavToggle" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
            </div>

        </div>
    </header>

    <!-- OFF-CANVAS MOBILE MENU -->
    <div class="fvt-mobile-nav-overlay" id="fvtMobileNavOverlay"></div>
    <div class="fvt-mobile-nav" id="fvtMobileNav">
        <button class="fvt-mobile-nav__close" id="fvtMobileNavClose" aria-label="Fermer">&times;</button>
        <ul>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a></li>
            <li>
                <a href="#" class="fvt-mobile-nav__parent">À propos</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'mission' ) ); ?>">Mission</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'champ-daction' ) ); ?>">Champ d'action</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'organigramme' ) ); ?>">Organigramme</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'equipe' ) ); ?>">Équipe</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="fvt-mobile-nav__parent">Opportunité</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'projet' ) ); ?>">Projet</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'soumettre-un-projet' ) ); ?>">Soumettre un projet</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'manifestation-dinteret' ) ); ?>">Manifestation d'intérêt</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="fvt-mobile-nav__parent">Guichet</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'agriculture-durable' ) ); ?>">Agriculture Durable</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'foret-et-biodiversite' ) ); ?>">Forêt et Biodiversité</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'eau-et-assainissement' ) ); ?>">Eau et Assainissement</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'energie-et-infrastructure-durable' ) ); ?>">Énergie et Infrastructure Durable</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="fvt-mobile-nav__parent">Projet</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'grand-projet-realise' ) ); ?>">Grand Projet réalisé</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'projet-approuve' ) ); ?>">Projet Approuvé</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="fvt-mobile-nav__parent">Actualité</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'communique-officiel' ) ); ?>">Communiqué Officiel</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'infos' ) ); ?>">Infos</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'evenement' ) ); ?>">Évènement</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="fvt-mobile-nav__parent">Ressources</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'document' ) ); ?>">Document</a></li>
                    <li><a href="<?php echo esc_url( fvt_get_page_url_by_slug( 'mediatheque' ) ); ?>">Médiathèque</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="fvt-mobile-nav__parent">Liens utiles</a>
                <ul class="sub-menu">
                    <li><a href="#" target="_blank" rel="noopener">Ministère de l'Environnement</a></li>
                    <li><a href="#" target="_blank" rel="noopener">Présidence de la République</a></li>
                    <li><a href="#" target="_blank" rel="noopener">Autres structures partenaires</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <script>
        (function () {
            var toggleBtn  = document.getElementById('fvtMobileNavToggle');
            var closeBtn   = document.getElementById('fvtMobileNavClose');
            var overlay    = document.getElementById('fvtMobileNavOverlay');
            var nav        = document.getElementById('fvtMobileNav');
            var parents    = document.querySelectorAll('.fvt-mobile-nav__parent');

            function openNav() {
                nav.classList.add('is-open');
                overlay.classList.add('is-open');
                toggleBtn.classList.add('is-active');
                document.body.style.overflow = 'hidden';
            }
            function closeNav() {
                nav.classList.remove('is-open');
                overlay.classList.remove('is-open');
                toggleBtn.classList.remove('is-active');
                document.body.style.overflow = '';
            }

            if (toggleBtn) toggleBtn.addEventListener('click', openNav);
            if (closeBtn)  closeBtn.addEventListener('click', closeNav);
            if (overlay)   overlay.addEventListener('click', closeNav);

            parents.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    var subMenu = this.nextElementSibling;
                    var isOpen = subMenu.style.display === 'block';
                    document.querySelectorAll('.fvt-mobile-nav .sub-menu').forEach(function (sm) {
                        sm.style.display = 'none';
                    });
                    subMenu.style.display = isOpen ? 'none' : 'block';
                });
            });
        })();
    </script>