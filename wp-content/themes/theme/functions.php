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
// 7. OPTION STATISTIQUES (Chiffres clés)
// ======================================================

/**
 * Initialise les valeurs par défaut des statistiques si l'option n'existe pas
 */
function fvt_stats_default() {
    if ( false === get_option( 'fvt_stats' ) ) {
        $default = array(
            array( 'icon' => 'icon-agronomy', 'number' => '12', 'suffix' => 'M+', 'label' => 'FCFA mobilisés' ),
            array( 'icon' => 'icon-management', 'number' => '45', 'suffix' => '+', 'label' => 'Projets financés' ),
            array( 'icon' => 'icon-sustainability', 'number' => '1500', 'suffix' => '+', 'label' => 'Bénéficiaires directs' ),
            array( 'icon' => 'icon-save-energy', 'number' => '18', 'suffix' => '', 'label' => 'Partenaires techniques' ),
        );
        update_option( 'fvt_stats', $default );
    }
}
add_action( 'after_switch_theme', 'fvt_stats_default' );

/**
 * Ajoute une page d'options pour les chiffres clés
 */
function fvt_stats_menu() {
    add_options_page(
        'Chiffres clés',
        'Chiffres clés',
        'manage_options',
        'fvt-stats',
        'fvt_stats_page'
    );
}
add_action( 'admin_menu', 'fvt_stats_menu' );

/**
 * Enregistre les options
 */
function fvt_stats_register() {
    register_setting( 'fvt_stats_group', 'fvt_stats', 'fvt_stats_sanitize' );
}
add_action( 'admin_init', 'fvt_stats_register' );

/**
 * Sanitisation des données
 */
function fvt_stats_sanitize( $input ) {
    $sanitized = array();
    if ( is_array( $input ) ) {
        foreach ( $input as $stat ) {
            $sanitized[] = array(
                'icon'   => isset( $stat['icon'] ) ? sanitize_text_field( $stat['icon'] ) : '',
                'number' => isset( $stat['number'] ) ? sanitize_text_field( $stat['number'] ) : '',
                'suffix' => isset( $stat['suffix'] ) ? sanitize_text_field( $stat['suffix'] ) : '',
                'label'  => isset( $stat['label'] ) ? sanitize_text_field( $stat['label'] ) : '',
            );
        }
    }
    return $sanitized;
}

/**
 * Affichage de la page d'options
 */
function fvt_stats_page() {
    $stats = get_option( 'fvt_stats', array() );
    if ( empty( $stats ) ) {
        $stats = array(
            array( 'icon' => 'icon-agronomy', 'number' => '12', 'suffix' => 'M+', 'label' => 'FCFA mobilisés' ),
            array( 'icon' => 'icon-management', 'number' => '45', 'suffix' => '+', 'label' => 'Projets financés' ),
            array( 'icon' => 'icon-sustainability', 'number' => '1500', 'suffix' => '+', 'label' => 'Bénéficiaires directs' ),
            array( 'icon' => 'icon-save-energy', 'number' => '18', 'suffix' => '', 'label' => 'Partenaires techniques' ),
        );
    }
    ?>
    <div class="wrap">
        <h1>Chiffres clés</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'fvt_stats_group' ); ?>
            <table class="form-table" id="stats-table">
                <thead>
                    <tr>
                        <th>Icône (classe)</th>
                        <th>Nombre</th>
                        <th>Suffixe</th>
                        <th>Libellé</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $stats as $index => $stat ) : ?>
                        <tr class="stat-row">
                            <td><input type="text" name="fvt_stats[<?php echo $index; ?>][icon]" value="<?php echo esc_attr( $stat['icon'] ); ?>" placeholder="icon-agronomy" /></td>
                            <td><input type="text" name="fvt_stats[<?php echo $index; ?>][number]" value="<?php echo esc_attr( $stat['number'] ); ?>" /></td>
                            <td><input type="text" name="fvt_stats[<?php echo $index; ?>][suffix]" value="<?php echo esc_attr( $stat['suffix'] ); ?>" placeholder="M+" /></td>
                            <td><input type="text" name="fvt_stats[<?php echo $index; ?>][label]" value="<?php echo esc_attr( $stat['label'] ); ?>" /></td>
                            <td><button type="button" class="button remove-row">Supprimer</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><button type="button" class="button" id="add-stats-row">Ajouter une statistique</button></p>
            <?php submit_button(); ?>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('stats-table').querySelector('tbody');
            const addBtn = document.getElementById('add-stats-row');

            addBtn.addEventListener('click', function() {
                const row = document.createElement('tr');
                row.className = 'stat-row';
                const index = table.children.length;
                row.innerHTML = `
                    <td><input type="text" name="fvt_stats[${index}][icon]" placeholder="icon-agronomy" /></td>
                    <td><input type="text" name="fvt_stats[${index}][number]" /></td>
                    <td><input type="text" name="fvt_stats[${index}][suffix]" placeholder="M+" /></td>
                    <td><input type="text" name="fvt_stats[${index}][label]" /></td>
                    <td><button type="button" class="button remove-row">Supprimer</button></td>
                `;
                table.appendChild(row);
            });

            table.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-row')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
    <?php
}

// ======================================================
// 8. CUSTOM POST TYPE : PROJET
// ======================================================
function fvt_cpt_projet() {
    $labels = array(
        'name'               => 'Projets',
        'singular_name'      => 'Projet',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter un projet',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau projet',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun projet',
        'not_found_in_trash' => 'Aucun projet dans la corbeille',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => 'projets',
        'rewrite'             => array( 'slug' => 'projet' ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'           => 'dashicons-portfolio',
        'menu_position'       => 20,
    );
    register_post_type( 'projet', $args );
}
add_action( 'init', 'fvt_cpt_projet' );

// ======================================================
// 9. MÉTABOXES POUR LE CPT PROJET
// ======================================================
function fvt_projet_metaboxes() {
    add_meta_box(
        'fvt_projet_details',
        'Détails du projet',
        'fvt_projet_metabox_callback',
        'projet',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'fvt_projet_metaboxes' );

function fvt_projet_metabox_callback( $post ) {
    wp_nonce_field( 'fvt_projet_nonce', 'fvt_projet_nonce_field' );
    $statut   = get_post_meta( $post->ID, '_projet_statut', true );
    $location = get_post_meta( $post->ID, '_projet_location', true );
    ?>
    <p>
        <label for="projet_statut">Statut :</label>
        <select name="projet_statut" id="projet_statut">
            <option value="en-cours" <?php selected( $statut, 'en-cours' ); ?>>En cours</option>
            <option value="termine" <?php selected( $statut, 'termine' ); ?>>Terminé</option>
            <option value="bientot" <?php selected( $statut, 'bientot' ); ?>>À venir</option>
        </select>
    </p>
    <p>
        <label for="projet_location">Localisation :</label>
        <input type="text" name="projet_location" id="projet_location" value="<?php echo esc_attr( $location ); ?>" style="width:100%;" />
    </p>
    <?php
}

function fvt_save_projet_meta( $post_id ) {
    if ( ! isset( $_POST['fvt_projet_nonce_field'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['fvt_projet_nonce_field'], 'fvt_projet_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['projet_statut'] ) ) {
        update_post_meta( $post_id, '_projet_statut', sanitize_text_field( $_POST['projet_statut'] ) );
    }
    if ( isset( $_POST['projet_location'] ) ) {
        update_post_meta( $post_id, '_projet_location', sanitize_text_field( $_POST['projet_location'] ) );
    }
}
add_action( 'save_post', 'fvt_save_projet_meta' );


function fvt_cpt_faq() {
    $labels = array(
        'name'               => 'FAQ',
        'singular_name'      => 'Question',
        'add_new_item'       => 'Ajouter une question',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouvelle question',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucune question',
        'not_found_in_trash' => 'Aucune question dans la corbeille',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => false,          // non visible sur le front
        'show_ui'             => true,           // visible dans l'admin
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-editor-help',
        'supports'            => array( 'title', 'editor', 'page-attributes' ), // pour l'ordre
        'menu_position'       => 25,
    );
    register_post_type( 'faq', $args );
}
add_action( 'init', 'fvt_cpt_faq' );


function fvt_cpt_partenaire() {
    $labels = array(
        'name'               => 'Partenaires',
        'singular_name'      => 'Partenaire',
        'add_new'            => 'Ajouter un partenaire',
        'add_new_item'       => 'Ajouter un nouveau partenaire',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau partenaire',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher des partenaires',
        'not_found'          => 'Aucun partenaire trouvé',
        'not_found_in_trash' => 'Aucun partenaire dans la corbeille',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => false,          // non visible sur le front
        'show_ui'             => true,           // visible dans l'admin
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-groups',
        'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
        'menu_position'       => 26,
    );
    register_post_type( 'partenaire', $args );
}
add_action( 'init', 'fvt_cpt_partenaire' );

/**
 * Ajouter une metabox pour les domaines d'action
 */
function fvt_domaines_metabox() {
    add_meta_box(
        'fvt_domaines_fields',
        __( 'Domaines d\'intervention', 'alefox' ),
        'fvt_domaines_metabox_callback',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'fvt_domaines_metabox' );

/**
 * Affichage des champs dans la metabox
 */
function fvt_domaines_metabox_callback( $post ) {
    wp_nonce_field( 'fvt_domaines_nonce', 'fvt_domaines_nonce' );
    $domaines = get_post_meta( $post->ID, '_fvt_domaines', true );
    if ( empty( $domaines ) || ! is_array( $domaines ) ) {
        $domaines = array(
            array( 'icon' => 'fa-seedling', 'title' => 'Agriculture durable', 'desc' => 'Promotion de pratiques agricoles résilientes.', 'link' => '#' ),
        );
    }
    ?>
    <div id="fvt-domaines-wrapper">
        <table class="widefat" id="fvt-domaines-table">
            <thead>
                <tr>
                    <th style="width:15%;">Icône (FontAwesome)</th>
                    <th style="width:20%;">Titre</th>
                    <th style="width:35%;">Description</th>
                    <th style="width:25%;">Lien</th>
                    <th style="width:5%;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $domaines as $index => $domaine ) : ?>
                    <tr class="domaine-row">
                        <td><input type="text" name="fvt_domaines[<?php echo $index; ?>][icon]" value="<?php echo esc_attr( $domaine['icon'] ); ?>" placeholder="fa-seedling" style="width:100%;" /></td>
                        <td><input type="text" name="fvt_domaines[<?php echo $index; ?>][title]" value="<?php echo esc_attr( $domaine['title'] ); ?>" style="width:100%;" /></td>
                        <td><input type="text" name="fvt_domaines[<?php echo $index; ?>][desc]" value="<?php echo esc_attr( $domaine['desc'] ); ?>" style="width:100%;" /></td>
                        <td><input type="text" name="fvt_domaines[<?php echo $index; ?>][link]" value="<?php echo esc_url( $domaine['link'] ); ?>" placeholder="https://..." style="width:100%;" /></td>
                        <td><button type="button" class="button remove-domain-row">Supprimer</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><button type="button" class="button" id="add-domain-row">Ajouter un domaine</button></p>
        <p class="description">Les icônes doivent utiliser les classes FontAwesome 5 (ex: fa-seedling, fa-solar-panel, etc.).</p>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('fvt-domaines-table').querySelector('tbody');
            const addBtn = document.getElementById('add-domain-row');

            // Ajouter une ligne
            addBtn.addEventListener('click', function() {
                const row = document.createElement('tr');
                row.className = 'domaine-row';
                const index = table.children.length;
                row.innerHTML = `
                    <td><input type="text" name="fvt_domaines[${index}][icon]" placeholder="fa-seedling" style="width:100%;" /></td>
                    <td><input type="text" name="fvt_domaines[${index}][title]" style="width:100%;" /></td>
                    <td><input type="text" name="fvt_domaines[${index}][desc]" style="width:100%;" /></td>
                    <td><input type="text" name="fvt_domaines[${index}][link]" placeholder="https://..." style="width:100%;" /></td>
                    <td><button type="button" class="button remove-domain-row">Supprimer</button></td>
                `;
                table.appendChild(row);
            });

            // Supprimer une ligne
            table.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-domain-row')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
    <?php
}

/**
 * Sauvegarde des domaines d'action
 */
function fvt_save_domaines_meta( $post_id ) {
    if ( ! isset( $_POST['fvt_domaines_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_domaines_nonce'], 'fvt_domaines_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['fvt_domaines'] ) && is_array( $_POST['fvt_domaines'] ) ) {
        $domaines = array();
        foreach ( $_POST['fvt_domaines'] as $domaine ) {
            if ( ! empty( $domaine['title'] ) ) {
                $domaines[] = array(
                    'icon'  => isset( $domaine['icon'] ) ? sanitize_text_field( $domaine['icon'] ) : 'fa-seedling',
                    'title' => sanitize_text_field( $domaine['title'] ),
                    'desc'  => isset( $domaine['desc'] ) ? sanitize_textarea_field( $domaine['desc'] ) : '',
                    'link'  => isset( $domaine['link'] ) ? esc_url_raw( $domaine['link'] ) : '#',
                );
            }
        }
        update_post_meta( $post_id, '_fvt_domaines', $domaines );
    } else {
        delete_post_meta( $post_id, '_fvt_domaines' );
    }
}
add_action( 'save_post', 'fvt_save_domaines_meta' );

// ======================================================
// FIN DU FICHIER
// ======================================================
?>