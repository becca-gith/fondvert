<?php
/**
 * Fonds Vert du Togo - fonctions du thème
 *
 * @package FondsVertTogo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ======================================================
// 1. CONSTANTES
// ======================================================
define( 'FVT_THEME_DIR', get_template_directory() );
define( 'FVT_THEME_URI', get_template_directory_uri() );

// ======================================================
// 2. SUPPORT DU THÈME
// ======================================================
function fvt_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    register_nav_menus( array(
        'primary' => __( 'Menu principal', 'alefox' ),
        'footer'  => __( 'Menu pied de page', 'alefox' ),
    ) );
}
add_action( 'after_setup_theme', 'fvt_theme_setup' );

// ======================================================
// 3. CHARGEMENT DES POLICES GOOGLE
// ======================================================
function fvt_enqueue_fonts() {
    wp_enqueue_style(
        'fvt-google-fonts',
        'https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;600;700;800&family=Playfair+Display:ital,wght@0,400;0,700;1,700&display=swap',
        array(),
        null
    );
}
add_action( 'wp_enqueue_scripts', 'fvt_enqueue_fonts', 5 );

// ======================================================
// 4. CHARGEMENT DES SCRIPTS ET STYLES
// ======================================================
function fvt_enqueue_scripts() {
    // Vérifier si Owl Carousel est déjà chargé par le thème
    if ( ! wp_script_is( 'owl-carousel', 'registered' ) && ! wp_script_is( 'owl-carousel', 'enqueued' ) ) {
        wp_enqueue_style( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '2.3.4' );
        wp_enqueue_style( 'owl-theme-default', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', array(), '2.3.4' );
        wp_enqueue_script( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
    }

    // Initialisation de TOUS les carrousels utilisés dans le thème
    wp_add_inline_script( 'jquery', '
        jQuery(document).ready(function($) {
            // 1. Slider principal (main-slider-three)
            $(".main-slider-three__carousel").each(function() {
                var $this = $(this);
                var options = $this.data("owl-options");
                if (options) {
                    $this.owlCarousel(options);
                }
            });
            // 2. Carrousel des actualités (service-three)
            $(".service-three__carousel").each(function() {
                var $this = $(this);
                var options = $this.data("owl-options");
                if (options) {
                    $this.owlCarousel(options);
                }
            });
            // 3. Carrousel des partenaires (client-carousel)
            $(".client-carousel__one").each(function() {
                var $this = $(this);
                var options = $this.data("owl-options");
                if (options) {
                    $this.owlCarousel(options);
                }
            });
            // 4. Carrousel des projets (blog-one)
            $(".blog-one__carousel").each(function() {
                var $this = $(this);
                var options = $this.data("owl-options");
                if (options) {
                    $this.owlCarousel(options);
                }
            });
        });
    ' );
}
add_action( 'wp_enqueue_scripts', 'fvt_enqueue_scripts' );

// ======================================================
// 5. FONCTIONS UTILITAIRES
// ======================================================
function fvt_get_page_url_by_slug( $slug ) {
    $page = get_page_by_path( $slug );
    return $page ? get_permalink( $page->ID ) : '#';
}

// ======================================================
// 6. OPTION POUR LE BADGE "ACTIF" (Appels à projets)
// ======================================================
function fvt_is_appel_actif() {
    return (bool) get_option( 'fvt_appel_actif', true );
}

// ======================================================
// FIN DU FICHIER
// ======================================================
?>