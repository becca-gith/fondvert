<!-- ============================================================
    FOOTER – TOGO GREEN FUND
    ============================================================ -->
<style>
    /* =============================================
       FOOTER – Togo Green Fund
       ============================================= */
    .main-footer {
        --ft-green:       #0a6e3e;
        --ft-green-dark:  #063d24;
        --ft-green-deep:  #042a19;
        --ft-yellow:      #ffce00;
        --ft-red:         #d21034;
        --ft-white:       #ffffff;
        --ft-text-light:  #b9d3c3;
        font-family: 'Kumbh Sans', sans-serif;
        background: var(--ft-green-deep) !important;
        position: relative;
        overflow: hidden;
        padding-top: 10px;
    }
    .main-footer::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--ft-green) 0 33%, var(--ft-yellow) 33% 66%, var(--ft-red) 66% 100%);
        z-index: 2;
    }
    .main-footer__bg {
        opacity: 0.05;
    }

    .main-footer__top {
        padding: 70px 0 40px;
        position: relative;
        z-index: 1;
    }

    /* ---------- COLONNE 1 : IDENTITÉ ---------- */
    .footer-widget--about {
        padding-right: 10px;
    }
    .footer-widget__brand {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
    }
    .footer-widget__brand-badge {
        flex-shrink: 0;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        border: 2px solid var(--ft-yellow);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--ft-yellow);
        font-size: 22px;
    }
    .footer-widget__brand-name {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
        color: var(--ft-white);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        line-height: 1.25;
    }
    .footer-widget__brand-name span {
        display: block;
        font-family: 'Kumbh Sans', sans-serif;
        font-size: 11.5px;
        font-weight: 600;
        color: #9fd6b3;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 3px;
    }

    .footer-widget__text {
        font-size: 14.5px;
        line-height: 1.8;
        color: var(--ft-text-light);
        margin-bottom: 24px;
    }

    .footer-widget__info {
        margin: 0 0 22px;
        padding: 0;
    }
    .footer-widget__info li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
        color: #cfe6d8;
        margin-bottom: 13px;
        line-height: 1.5;
    }
    .footer-widget__info li a {
        color: #cfe6d8;
        text-decoration: none;
        transition: color .25s ease;
    }
    .footer-widget__info li a:hover { color: var(--ft-yellow); }
    .footer-widget__info__icon {
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: var(--ft-yellow);
        font-size: 13px;
    }

    .footer-widget__social {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .footer-widget__social a {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.07);
        color: var(--ft-white);
        font-size: 14px;
        text-decoration: none;
        transition: all .25s ease;
    }
    .footer-widget__social a:hover {
        background: var(--ft-yellow);
        color: var(--ft-green-deep);
        transform: translateY(-3px);
    }

    /* ---------- COLONNES 2 & 3 : LIENS ---------- */
    .footer-widget__title {
        font-family: 'Kumbh Sans', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: var(--ft-white);
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin: 0 0 26px;
        position: relative;
        padding-bottom: 14px;
    }
    .footer-widget__title::after {
        content: '';
        position: absolute;
        left: 0; bottom: 0;
        width: 34px;
        height: 3px;
        border-radius: 3px;
        background: var(--ft-yellow);
    }
    .footer-widget__links {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .footer-widget__links li {
        margin-bottom: 12px;
    }
    .footer-widget__links li a {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-size: 14.5px;
        color: #cfe6d8;
        text-decoration: none;
        transition: color .25s ease, padding-left .25s ease;
    }
    .footer-widget__links li a::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--ft-yellow);
        opacity: 0.7;
        flex-shrink: 0;
        transition: transform .25s ease;
    }
    .footer-widget__links li a:hover {
        color: var(--ft-white);
        padding-left: 3px;
    }
    .footer-widget__links li a:hover::before {
        transform: scale(1.3);
    }

    /* ---------- COLONNE 4 : NEWSLETTER + ACTUALITÉS ---------- */
    .footer-widget--newsletter .footer-widget__text {
        margin-bottom: 16px;
        font-size: 14px;
    }
    .footer-newsletter-form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 24px;
    }
    .footer-newsletter-form input[type="email"] {
        flex: 1;
        min-width: 160px;
        padding: 12px 16px;
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 30px;
        background: rgba(255,255,255,0.06);
        color: var(--ft-white);
        font-family: 'Kumbh Sans', sans-serif;
        font-size: 14px;
        transition: border .3s;
        outline: none;
    }
    .footer-newsletter-form input[type="email"]::placeholder {
        color: #8aaa9b;
    }
    .footer-newsletter-form input[type="email"]:focus {
        border-color: var(--ft-yellow);
    }
    .footer-newsletter-form button {
        padding: 12px 28px;
        border: none;
        border-radius: 30px;
        background: var(--ft-yellow);
        color: var(--ft-green-deep);
        font-family: 'Kumbh Sans', sans-serif;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all .25s ease;
        white-space: nowrap;
    }
    .footer-newsletter-form button:hover {
        background: var(--ft-white);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255,206,0,0.25);
    }

    .footer-widget__post {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .footer-widget__post li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }
    .footer-widget__post li:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    .footer-widget__post img {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        flex-shrink: 0;
    }
    .footer-widget__post__date {
        display: block;
        font-size: 11px;
        font-weight: 600;
        color: var(--ft-yellow);
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 4px;
    }
    .footer-widget__post__title {
        margin: 0;
        font-size: 14px;
        line-height: 1.4;
    }
    .footer-widget__post__title a {
        color: #e7f3ec;
        text-decoration: none;
        font-weight: 600;
        transition: color .25s ease;
    }
    .footer-widget__post__title a:hover {
        color: var(--ft-yellow);
    }

    /* ---------- BAS DE PAGE ---------- */
    .main-footer__bottom {
        background: rgba(0, 0, 0, 0.25);
        border-top: 1px solid rgba(255, 255, 255, 0.06);
        padding: 18px 0;
        position: relative;
        z-index: 1;
    }
    .main-footer__bottom__inner {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }
    .main-footer__copyright {
        margin: 0;
        font-size: 13.5px;
        color: #a9c7b7;
        text-align: center;
        flex: 1;
    }
    .main-footer__copyright a {
        color: var(--ft-white);
        font-weight: 700;
        text-decoration: none;
        transition: color .25s;
    }
    .main-footer__copyright a:hover { color: var(--ft-yellow); }
    .footer-bottom-links {
        display: flex;
        gap: 16px;
        font-size: 13px;
        color: #8aaa9b;
    }
    .footer-bottom-links a {
        color: #8aaa9b;
        text-decoration: none;
        transition: color .25s;
    }
    .footer-bottom-links a:hover {
        color: var(--ft-yellow);
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 991px) {
        .main-footer__top { padding: 50px 0 20px; }
        .footer-widget--about,
        .footer-widget--links,
        .footer-widget--newsletter {
            margin-bottom: 40px;
        }
        .main-footer__bottom__inner {
            flex-direction: column;
            text-align: center;
        }
        .footer-bottom-links {
            justify-content: center;
            flex-wrap: wrap;
        }
    }
    @media (max-width: 576px) {
        .footer-newsletter-form {
            flex-direction: column;
        }
        .footer-newsletter-form button {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- ============================================================
    FOOTER
    ============================================================ -->
<footer class="main-footer background-black">
    <div class="main-footer__bg" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/assets/images/backgrounds/footer-bg-1-2.webp' ); ?>);"></div>
    <!-- /.main-footer__bg -->

    <div class="main-footer__top">
        <div class="container">
            <div class="row">

                <!-- COLONNE 1 : Identité + coordonnées + réseaux sociaux -->
                <div class="col-md-6 col-xl-4">
                    <div class="footer-widget footer-widget--about">

                        <!-- Identité : badge armoirie + nom institutionnel -->
                        <div class="footer-widget__brand">
                            <span class="footer-widget__brand-badge">
                                <i class="fas fa-seedling"></i>
                            </span>
                            <span class="footer-widget__brand-name">
                                <?php bloginfo( 'name' ); ?>
                                <span><?php _e( 'République Togolaise', 'alefox' ); ?></span>
                            </span>
                        </div>

                        <p class="footer-widget__text">
                            <?php _e( 'Le Togo Green Fund mobilise des financements pour des projets climatiques et de développement durable au Togo.', 'alefox' ); ?>
                        </p>

                        <ul class="list-unstyled footer-widget__info">
                            <li>
                                <span class="footer-widget__info__icon"><i class="icofont-clock-time"></i></span>
                                <?php _e( 'Horaires : Lun - Ven : 8h00 - 18h00', 'alefox' ); ?>
                            </li>
                            <li>
                                <span class="footer-widget__info__icon"><i class="icofont-location-pin"></i></span>
                                <?php _e( 'BP : 4825 – Lomé, Togo', 'alefox' ); ?>
                            </li>
                            <li>
                                <span class="footer-widget__info__icon"><i class="icofont-phone"></i></span>
                                <a href="tel:+22820223040">+228 20 22 30 40</a>
                            </li>
                            <li>
                                <span class="footer-widget__info__icon"><i class="icofont-email"></i></span>
                                <a href="mailto:contact@togogreenfund.tg">contact@togogreenfund.tg</a>
                            </li>
                        </ul>

                        <div class="footer-widget__social">
                            <a href="https://facebook.com/" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/" target="_blank" aria-label="X"><i class="fab fa-twitter"></i></a>
                            <a href="https://linkedin.com/" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://youtube.com/" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <!-- COLONNE 2 : Services -->
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget footer-widget--links">
                        <h3 class="footer-widget__title"><?php _e( 'Nos Services', 'alefox' ); ?></h3>
                        <ul class="list-unstyled footer-widget__links">
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'financement-climatique' ) ) ); ?>"><?php _e( 'Financement climatique', 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'projets-programmes' ) ) ); ?>"><?php _e( 'Projets & Programmes', 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'appels-a-projets' ) ) ); ?>"><?php _e( 'Appels à projets', 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'publications' ) ) ); ?>"><?php _e( 'Publications', 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'mediatheque' ) ) ); ?>"><?php _e( 'Médiathèque', 'alefox' ); ?></a></li>
                        </ul>
                    </div>
                </div>

                <!-- COLONNE 3 : Liens utiles -->
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget footer-widget--links footer-widget--links-two">
                        <h3 class="footer-widget__title"><?php _e( 'Liens utiles', 'alefox' ); ?></h3>
                        <ul class="list-unstyled footer-widget__links">
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'ministère-de-lenvironnement' ) ) ); ?>"><?php _e( 'Ministère de l\'Environnement', 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'green-fund-climat' ) ) ); ?>"><?php _e( 'Green Fund Climat', 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'fonds-dadaptation-climat' ) ) ); ?>"><?php _e( "Fonds d'Adaptation", 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'mentions-legales' ) ) ); ?>"><?php _e( 'Mentions légales', 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'politique-de-confidentialite' ) ) ); ?>"><?php _e( 'Politique de confidentialité', 'alefox' ); ?></a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>"><?php _e( 'Contact', 'alefox' ); ?></a></li>
                        </ul>
                    </div>
                </div>

                <!-- COLONNE 4 : NEWSLETTER + DERNIÈRES ACTUALITÉS -->
                <div class="col-md-6 col-xl-4">
                    <div class="footer-widget footer-widget--newsletter">
                        <h3 class="footer-widget__title"><?php _e( 'Newsletter', 'alefox' ); ?></h3>
                        <p class="footer-widget__text">
                            <?php _e( 'Recevez nos actualités et appels à projets par e-mail.', 'alefox' ); ?>
                        </p>
                        <form class="footer-newsletter-form" method="post" action="#">
                            <input type="email" name="email" placeholder="<?php esc_attr_e( 'Votre adresse e-mail', 'alefox' ); ?>" required>
                            <button type="submit"><?php _e( "S'inscrire", 'alefox' ); ?></button>
                        </form>

                        <!-- Derniers articles (actualités) -->
                        <h3 class="footer-widget__title" style="margin-top:12px; border-top:1px solid rgba(255,255,255,0.06); padding-top:18px;"><?php _e( 'Dernières actualités', 'alefox' ); ?></h3>
                        <?php
                        $recent_posts = wp_get_recent_posts( array(
                            'numberposts' => 2,
                            'post_status' => 'publish'
                        ) );
                        if ( ! empty( $recent_posts ) ) : ?>
                            <ul class="list-unstyled footer-widget__post">
                                <?php foreach ( $recent_posts as $post ) : setup_postdata( $post ); ?>
                                    <li>
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/blog/w-1.jpg' ); ?>" alt="<?php _e( 'Image par défaut', 'alefox' ); ?>">
                                        <?php endif; ?>
                                        <div>
                                            <span class="footer-widget__post__date"><?php echo get_the_date( 'd M Y' ); ?></span>
                                            <h6 class="footer-widget__post__title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h6>
                                        </div>
                                    </li>
                                <?php endforeach; wp_reset_postdata(); ?>
                            </ul>
                        <?php else : ?>
                            <p class="footer-widget__text" style="margin-bottom:0;"><?php _e( 'Aucun article récent.', 'alefox' ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-footer__top -->

    <!-- BAS DE PAGE (copyright) -->
    <div class="main-footer__bottom">
        <div class="container">
            <div class="main-footer__bottom__inner">
                <p class="main-footer__copyright">
                    &copy; <?php echo date('Y'); ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
                    <?php _e( 'Tous droits réservés.', 'alefox' ); ?>
                </p>
                <div class="footer-bottom-links">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'mentions-legales' ) ) ); ?>"><?php _e( 'Mentions légales', 'alefox' ); ?></a>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'politique-de-confidentialite' ) ) ); ?>"><?php _e( 'Confidentialité', 'alefox' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Accueil', 'alefox' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- fin footer -->


<!-- ============================================================
MOBILE NAV (à conserver)
============================================================ -->
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
        <div class="logo-box">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="logo image">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-light.png' ); ?>" width="155" alt="<?php bloginfo( 'name' ); ?>" />
            </a>
        </div>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'mobile_menu',
            'container'      => false,
            'menu_class'     => 'mobile-nav__menu',
            'fallback_cb'    => false,
        ) );
        ?>
        <ul class="mobile-nav__contact list-unstyled">
            <li><i class="fa fa-envelope"></i> <a href="mailto:contact@togogreenfund.tg">contact@togogreenfund.tg</a></li>
            <li><i class="fa fa-phone-alt"></i> <a href="tel:+22820223040">+228 20 22 30 40</a></li>
        </ul>
        <div class="mobile-nav__social">
            <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>


<!-- ============================================================
RECHERCHE POPUP
============================================================ -->
<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <div class="search-popup__content">
        <?php get_search_form(); ?>
    </div>
</div>


<!-- ============================================================
SIDEBAR (off-canvas) – facultatif
============================================================ -->
<aside class="sidebar-one">
    <div class="sidebar-one__overlay"></div>
    <div class="sidebar-one__content">
        <div class="sidebar-one__close"><i class="icofont-close-line"></i></div>
        <div class="sidebar-one__logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="logo image">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-light.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="147">
            </a>
        </div>
        <p class="sidebar-one__text">
            <?php _e( 'Le Togo Green Fund accompagne les projets durables pour la lutte contre le changement climatique.', 'alefox' ); ?>
        </p>
        <h4 class="sidebar-one__title"><?php _e( 'Contact', 'alefox' ); ?></h4>
        <ul class="sidebar-one__info">
            <li><span class="fas fa-map-marker-alt"></span> <?php _e( 'BP : 4825 – Lomé, Togo', 'alefox' ); ?></li>
            <li><span class="fas fa-envelope"></span> <a href="mailto:contact@togogreenfund.tg">contact@togogreenfund.tg</a></li>
            <li><span class="fas fa-phone-alt"></span> <a href="tel:+22820223040">+228 20 22 30 40</a></li>
        </ul>
        <div class="sidebar-one__social">
            <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</aside>


<!-- ============================================================
BOUTON RETOUR EN HAUT
============================================================ -->
<a href="#" class="scroll-top">
    <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</a>

</div><!-- /.page-wrapper (ouvert dans header.php) -->

<?php wp_footer(); ?>
</body>
</html>