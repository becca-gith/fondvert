<?php
/**
 * Togo Green Fund - fonctions du thème
 *
 * @package TogoGreenFund
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

function fvt_stats_register() {
    register_setting( 'fvt_stats_group', 'fvt_stats', 'fvt_stats_sanitize' );
}
add_action( 'admin_init', 'fvt_stats_register' );

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

// ======================================================
// 9. CUSTOM POST TYPE : FAQ
// ======================================================
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
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-editor-help',
        'supports'            => array( 'title', 'editor', 'page-attributes' ),
        'menu_position'       => 25,
    );
    register_post_type( 'faq', $args );
}
add_action( 'init', 'fvt_cpt_faq' );

// ======================================================
// 10. CUSTOM POST TYPE : PARTENAIRE
// ======================================================
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
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-groups',
        'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
        'menu_position'       => 26,
    );
    register_post_type( 'partenaire', $args );
}
add_action( 'init', 'fvt_cpt_partenaire' );

// ======================================================
// 11. METABOX : Domaines d'action (page "Champs")
// ======================================================
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
            table.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-domain-row')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
    <?php
}

function fvt_save_domaines_meta( $post_id ) {
    if ( ! isset( $_POST['fvt_domaines_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_domaines_nonce'], 'fvt_domaines_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

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
// 12. CUSTOM POST TYPE : DOCUMENT (unifié)
// ======================================================
function fvt_cpt_document() {
    $labels = array(
        'name'               => 'Documents',
        'singular_name'      => 'Document',
        'add_new'            => 'Ajouter un document',
        'add_new_item'       => 'Ajouter un nouveau document',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau document',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun document',
        'not_found_in_trash' => 'Aucun document dans la corbeille',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-media-document',
        'supports'            => array( 'title', 'page-attributes' ),
        'menu_position'       => 27,
    );
    register_post_type( 'document', $args );
}
add_action( 'init', 'fvt_cpt_document' );

function fvt_document_metaboxes() {
    add_meta_box(
        'fvt_document_fields',
        __( 'Détails du document', 'alefox' ),
        'fvt_document_metabox_callback',
        'document',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'fvt_document_metaboxes' );

function fvt_document_metabox_callback( $post ) {
    wp_nonce_field( 'fvt_document_nonce', 'fvt_document_nonce' );
    
    // Champs pour "Politiques et stratégies"
    $categorie   = get_post_meta( $post->ID, '_fvt_doc_categorie', true );
    // Champs pour "Documents"
    $type        = get_post_meta( $post->ID, '_fvt_doc_type', true );
    // Champs communs
    $format      = get_post_meta( $post->ID, '_fvt_doc_format', true );
    $taille      = get_post_meta( $post->ID, '_fvt_doc_taille', true );
    $date        = get_post_meta( $post->ID, '_fvt_doc_date', true );
    $url         = get_post_meta( $post->ID, '_fvt_doc_url', true );
    $description = get_post_meta( $post->ID, '_fvt_doc_description', true );
    
    $categories_list = array(
        'plan'      => 'Plan stratégique',
        'politique' => 'Politique',
        'decret'    => 'Décret',
        'arreté'    => 'Arrêté',
        'note'    => 'Note',
        'organigramme' => 'Organigramme',
        'mecanisme' => 'Mécanisme',
        'manuel' => 'Manuel',
        'charte' => 'charte',
    );
    $types_list = array(
        'rapport'    => 'Rapport',
        'guide'      => 'Guide',
        'publication' => 'Publication',
    );
    ?>
    <p>
        <label for="fvt_doc_categorie"><?php _e( 'Catégorie (Politiques) :', 'alefox' ); ?></label><br>
        <select name="fvt_doc_categorie" id="fvt_doc_categorie" style="width:100%;">
            <option value=""><?php _e( 'Aucune', 'alefox' ); ?></option>
            <?php foreach ( $categories_list as $slug => $label ) : ?>
                <option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $categorie, $slug ); ?>>
                    <?php echo esc_html( $label ); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="fvt_doc_type"><?php _e( 'Type (Documents) :', 'alefox' ); ?></label><br>
        <select name="fvt_doc_type" id="fvt_doc_type" style="width:100%;">
            <option value=""><?php _e( 'Aucun', 'alefox' ); ?></option>
            <?php foreach ( $types_list as $slug => $label ) : ?>
                <option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $type, $slug ); ?>>
                    <?php echo esc_html( $label ); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="fvt_doc_description"><?php _e( 'Description :', 'alefox' ); ?></label><br>
        <textarea name="fvt_doc_description" id="fvt_doc_description" rows="2" style="width:100%;"><?php echo esc_textarea( $description ); ?></textarea>
    </p>
    <p>
        <label for="fvt_doc_format"><?php _e( 'Format :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_doc_format" id="fvt_doc_format" value="<?php echo esc_attr( $format ?: 'PDF' ); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="fvt_doc_taille"><?php _e( 'Taille :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_doc_taille" id="fvt_doc_taille" value="<?php echo esc_attr( $taille ?: '1 Mo' ); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="fvt_doc_date"><?php _e( 'Date :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_doc_date" id="fvt_doc_date" value="<?php echo esc_attr( $date ?: date_i18n( 'F Y' ) ); ?>" style="width:100%;" placeholder="Janvier 2025" />
    </p>
    <p>
        <label for="fvt_doc_url"><?php _e( 'URL de téléchargement :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_doc_url" id="fvt_doc_url" value="<?php echo esc_url( $url ); ?>" style="width:100%;" placeholder="https://... ou /wp-content/uploads/..." />
    </p>
    <?php
}

function fvt_save_document_meta( $post_id ) {
    if ( ! isset( $_POST['fvt_document_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_document_nonce'], 'fvt_document_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = array(
        'fvt_doc_categorie'   => 'sanitize_text_field',
        'fvt_doc_type'        => 'sanitize_text_field',
        'fvt_doc_format'      => 'sanitize_text_field',
        'fvt_doc_taille'      => 'sanitize_text_field',
        'fvt_doc_date'        => 'sanitize_text_field',
        'fvt_doc_url'         => 'esc_url_raw',
        'fvt_doc_description' => 'sanitize_textarea_field',
    );

    foreach ( $fields as $field => $sanitize_callback ) {
        if ( isset( $_POST[ $field ] ) ) {
            $value = call_user_func( $sanitize_callback, $_POST[ $field ] );
            update_post_meta( $post_id, '_' . $field, $value );
        }
    }
}
add_action( 'save_post', 'fvt_save_document_meta' );


// ======================================================
// CPT : MEDIA (Médiathèque)
// ======================================================

/**
 * Enregistrement du Custom Post Type "media"
 */
function fvt_cpt_media() {
    $labels = array(
        'name'               => 'Médias',
        'singular_name'      => 'Média',
        'add_new'            => 'Ajouter un média',
        'add_new_item'       => 'Ajouter un nouveau média',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau média',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun média',
        'not_found_in_trash' => 'Aucun média dans la corbeille',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-format-gallery',
        'supports'            => array( 'title', 'page-attributes' ),
        'menu_position'       => 28,
    );
    register_post_type( 'media', $args );
}
add_action( 'init', 'fvt_cpt_media' );

/**
 * Ajout des métaboxes pour les champs personnalisés du média
 */
function fvt_media_metaboxes() {
    add_meta_box(
        'fvt_media_fields',
        __( 'Détails du média', 'alefox' ),
        'fvt_media_metabox_callback',
        'media',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'fvt_media_metaboxes' );

function fvt_media_metabox_callback( $post ) {
    wp_nonce_field( 'fvt_media_nonce', 'fvt_media_nonce' );
    
    $type       = get_post_meta( $post->ID, '_fvt_media_type', true );
    $format     = get_post_meta( $post->ID, '_fvt_media_format', true );
    $date       = get_post_meta( $post->ID, '_fvt_media_date', true );
    $url        = get_post_meta( $post->ID, '_fvt_media_url', true );
    $mini       = get_post_meta( $post->ID, '_fvt_media_mini', true );
    $desc       = get_post_meta( $post->ID, '_fvt_media_description', true );
    
    $types_list = array(
        'photo'    => 'Photo',
        'video'    => 'Vidéo',
        'document' => 'Document',
    );
    ?>
    <p>
        <label for="fvt_media_type"><?php _e( 'Type de média :', 'alefox' ); ?></label><br>
        <select name="fvt_media_type" id="fvt_media_type" style="width:100%;">
            <?php foreach ( $types_list as $slug => $label ) : ?>
                <option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $type, $slug ); ?>>
                    <?php echo esc_html( $label ); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="fvt_media_description"><?php _e( 'Description :', 'alefox' ); ?></label><br>
        <textarea name="fvt_media_description" id="fvt_media_description" rows="2" style="width:100%;"><?php echo esc_textarea( $desc ); ?></textarea>
    </p>
    <p>
        <label for="fvt_media_format"><?php _e( 'Format :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_media_format" id="fvt_media_format" value="<?php echo esc_attr( $format ?: 'jpg' ); ?>" style="width:100%;" placeholder="jpg, png, youtube, pdf..." />
    </p>
    <p>
        <label for="fvt_media_date"><?php _e( 'Date :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_media_date" id="fvt_media_date" value="<?php echo esc_attr( $date ?: date_i18n( 'd F Y' ) ); ?>" style="width:100%;" placeholder="15 janvier 2025" />
    </p>
    <p>
        <label for="fvt_media_url"><?php _e( 'URL (photo / vidéo / document) :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_media_url" id="fvt_media_url" value="<?php echo esc_url( $url ); ?>" style="width:100%;" placeholder="https://..." />
    </p>
    <p>
        <label for="fvt_media_mini"><?php _e( 'URL de la miniature (optionnel) :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_media_mini" id="fvt_media_mini" value="<?php echo esc_url( $mini ); ?>" style="width:100%;" placeholder="https://... ou laissez vide pour auto-générer" />
        <span class="description"><?php _e( 'Laissez vide pour une miniature automatique (placeholder ou YouTube).', 'alefox' ); ?></span>
    </p>
    <?php
}

/**
 * Sauvegarde des métadonnées du média
 */
function fvt_save_media_meta( $post_id ) {
    if ( ! isset( $_POST['fvt_media_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_media_nonce'], 'fvt_media_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = array(
        'fvt_media_type'        => 'sanitize_text_field',
        'fvt_media_format'      => 'sanitize_text_field',
        'fvt_media_date'        => 'sanitize_text_field',
        'fvt_media_url'         => 'esc_url_raw',
        'fvt_media_mini'        => 'esc_url_raw',
        'fvt_media_description' => 'sanitize_textarea_field',
    );

    foreach ( $fields as $field => $sanitize_callback ) {
        if ( isset( $_POST[ $field ] ) ) {
            $value = call_user_func( $sanitize_callback, $_POST[ $field ] );
            update_post_meta( $post_id, '_' . $field, $value );
        }
    }
}
add_action( 'save_post', 'fvt_save_media_meta' );

// ======================================================
// CPT : COMMUNIQUÉS OFFICIELS
// ======================================================

/**
 * Enregistrement du Custom Post Type "communique"
 */
function fvt_cpt_communique() {
    $labels = array(
        'name'               => 'Communiqués',
        'singular_name'      => 'Communiqué',
        'add_new'            => 'Ajouter un communiqué',
        'add_new_item'       => 'Ajouter un nouveau communiqué',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau communiqué',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun communiqué',
        'not_found_in_trash' => 'Aucun communiqué dans la corbeille',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-megaphone',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'menu_position'       => 29,
    );
    register_post_type( 'communique', $args );
}
add_action( 'init', 'fvt_cpt_communique' );

/**
 * Métaboxes pour les champs personnalisés du communiqué
 */
function fvt_communique_metaboxes() {
    add_meta_box(
        'fvt_communique_fields',
        __( 'Détails du communiqué', 'alefox' ),
        'fvt_communique_metabox_callback',
        'communique',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'fvt_communique_metaboxes' );

function fvt_communique_metabox_callback( $post ) {
    wp_nonce_field( 'fvt_communique_nonce', 'fvt_communique_nonce' );
    
    $date_publication = get_post_meta( $post->ID, '_fvt_communique_date', true );
    $resume           = get_post_meta( $post->ID, '_fvt_communique_resume', true );
    $document_url     = get_post_meta( $post->ID, '_fvt_communique_document', true );
    ?>
    <p>
        <label for="fvt_communique_date"><?php _e( 'Date de publication :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_communique_date" id="fvt_communique_date" value="<?php echo esc_attr( $date_publication ?: date_i18n( 'd F Y' ) ); ?>" style="width:100%;" placeholder="15 janvier 2025" />
    </p>
    <p>
        <label for="fvt_communique_resume"><?php _e( 'Résumé :', 'alefox' ); ?></label><br>
        <textarea name="fvt_communique_resume" id="fvt_communique_resume" rows="2" style="width:100%;"><?php echo esc_textarea( $resume ); ?></textarea>
    </p>
    <p>
        <label for="fvt_communique_document"><?php _e( 'URL du document (PDF, etc.) :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_communique_document" id="fvt_communique_document" value="<?php echo esc_url( $document_url ); ?>" style="width:100%;" placeholder="https://..." />
    </p>
    <?php
}

/**
 * Sauvegarde des métadonnées du communiqué
 */
function fvt_save_communique_meta( $post_id ) {
    if ( ! isset( $_POST['fvt_communique_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_communique_nonce'], 'fvt_communique_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = array(
        'fvt_communique_date'     => 'sanitize_text_field',
        'fvt_communique_resume'   => 'sanitize_textarea_field',
        'fvt_communique_document' => 'esc_url_raw',
    );

    foreach ( $fields as $field => $sanitize_callback ) {
        if ( isset( $_POST[ $field ] ) ) {
            $value = call_user_func( $sanitize_callback, $_POST[ $field ] );
            update_post_meta( $post_id, '_' . $field, $value );
        }
    }
}
add_action( 'save_post', 'fvt_save_communique_meta' );

// ======================================================
// CPT : ÉVÉNEMENTS
// ======================================================

function fvt_cpt_evenement() {
    $labels = array(
        'name'               => 'Événements',
        'singular_name'      => 'Événement',
        'add_new'            => 'Ajouter un événement',
        'add_new_item'       => 'Ajouter un nouvel événement',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouvel événement',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun événement',
        'not_found_in_trash' => 'Aucun événement dans la corbeille',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'evenements' ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
        'menu_icon'           => 'dashicons-calendar-alt',
        'menu_position'       => 30,
    );
    register_post_type( 'evenement', $args );
}
add_action( 'init', 'fvt_cpt_evenement' );

function fvt_evenement_metaboxes() {
    add_meta_box(
        'fvt_evenement_fields',
        __( 'Détails de l\'événement', 'alefox' ),
        'fvt_evenement_metabox_callback',
        'evenement',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'fvt_evenement_metaboxes' );

function fvt_evenement_metabox_callback( $post ) {
    wp_nonce_field( 'fvt_evenement_nonce', 'fvt_evenement_nonce' );
    $date = get_post_meta( $post->ID, '_fvt_evenement_date', true );
    $lieu = get_post_meta( $post->ID, '_fvt_evenement_lieu', true );
    $type = get_post_meta( $post->ID, '_fvt_evenement_type', true );
    ?>
    <p>
        <label for="fvt_evenement_date"><?php _e( 'Date de l\'événement :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_evenement_date" id="fvt_evenement_date" value="<?php echo esc_attr( $date ?: date_i18n( 'd F Y' ) ); ?>" style="width:100%;" placeholder="15 janvier 2025" />
    </p>
    <p>
        <label for="fvt_evenement_lieu"><?php _e( 'Lieu :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_evenement_lieu" id="fvt_evenement_lieu" value="<?php echo esc_attr( $lieu ); ?>" style="width:100%;" placeholder="Lomé, Togo" />
    </p>
    <p>
        <label for="fvt_evenement_type"><?php _e( 'Type d\'événement :', 'alefox' ); ?></label><br>
        <input type="text" name="fvt_evenement_type" id="fvt_evenement_type" value="<?php echo esc_attr( $type ); ?>" style="width:100%;" placeholder="Atelier, Conférence, Formation, etc." />
    </p>
    <?php
}

function fvt_save_evenement_meta( $post_id ) {
    if ( ! isset( $_POST['fvt_evenement_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_evenement_nonce'], 'fvt_evenement_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = array(
        'fvt_evenement_date' => 'sanitize_text_field',
        'fvt_evenement_lieu' => 'sanitize_text_field',
        'fvt_evenement_type' => 'sanitize_text_field',
    );

    foreach ( $fields as $field => $sanitize_callback ) {
        if ( isset( $_POST[ $field ] ) ) {
            $value = call_user_func( $sanitize_callback, $_POST[ $field ] );
            update_post_meta( $post_id, '_' . $field, $value );
        }
    }
}
add_action( 'save_post', 'fvt_save_evenement_meta' );

// ======================================================
// METABOX GÉNÉRIQUE : Chiffres clés & Projets pour les pages "guichet-*"
// ======================================================

function fvt_guichet_metaboxes() {
    add_meta_box(
        'fvt_guichet_fields',
        __( 'Chiffres clés & Projets', 'alefox' ),
        'fvt_guichet_metabox_callback',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'fvt_guichet_metaboxes' );

function fvt_guichet_metabox_callback( $post ) {
    // Ne s'affiche que sur les pages dont le slug commence par "guichet-"
    if ( strpos( $post->post_name, 'guichet-' ) !== 0 ) {
        echo '<p>Cette métabox est réservée aux pages "Guichet".</p>';
        return;
    }
    wp_nonce_field( 'fvt_guichet_nonce', 'fvt_guichet_nonce' );

    // Préfixe dynamique basé sur le slug de la page
    $prefix = str_replace( 'guichet-', '', $post->post_name ); // ex: "agriculture", "forets-biodiversite"
    $prefix = str_replace( '-', '_', $prefix ); // ex: "forets_biodiversite"

    // Récupération des données
    $chiffres = get_post_meta( $post->ID, '_fvt_' . $prefix . '_chiffres', true );
    if ( empty( $chiffres ) || ! is_array( $chiffres ) ) {
        $chiffres = array( '12 000' => 'Bénéficiaires' );
    }

    $projets = get_post_meta( $post->ID, '_fvt_' . $prefix . '_projets', true );
    if ( empty( $projets ) || ! is_array( $projets ) ) {
        $projets = array(
            array(
                'titre'       => '',
                'localisation'=> '',
                'statut'      => 'en_cours',
                'image'       => '',
                'description' => '',
                'impact'      => array(),
            )
        );
    }
    ?>
    <h3><?php _e( 'Chiffres clés', 'alefox' ); ?></h3>
    <div id="fvt-chiffres-wrapper">
        <?php foreach ( $chiffres as $valeur => $label ) : ?>
            <div class="chiffre-row" style="display:flex; gap:8px; margin-bottom:8px;">
                <input type="text" name="fvt_chiffres_valeur[]" value="<?php echo esc_attr( $valeur ); ?>" placeholder="Valeur" style="flex:1;">
                <input type="text" name="fvt_chiffres_label[]" value="<?php echo esc_attr( $label ); ?>" placeholder="Libellé" style="flex:2;">
                <button type="button" class="button remove-chiffre-row">Supprimer</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" class="button" id="add-chiffre-row">Ajouter un chiffre</button>

    <hr style="margin:30px 0;">

    <h3><?php _e( 'Projets', 'alefox' ); ?></h3>
    <div id="fvt-projets-wrapper">
        <?php foreach ( $projets as $index => $projet ) : ?>
            <div class="projet-row" style="border:1px solid #ddd; padding:15px; margin-bottom:15px; border-radius:6px; background:#f9f9f9;">
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    <div style="flex:1 1 200px;">
                        <label>Titre</label>
                        <input type="text" name="fvt_projets[<?php echo $index; ?>][titre]" value="<?php echo esc_attr( $projet['titre'] ); ?>" style="width:100%;">
                    </div>
                    <div style="flex:1 1 150px;">
                        <label>Localisation</label>
                        <input type="text" name="fvt_projets[<?php echo $index; ?>][localisation]" value="<?php echo esc_attr( $projet['localisation'] ); ?>" style="width:100%;">
                    </div>
                    <div style="flex:0 1 120px;">
                        <label>Statut</label>
                        <select name="fvt_projets[<?php echo $index; ?>][statut]" style="width:100%;">
                            <option value="en_cours" <?php selected( $projet['statut'], 'en_cours' ); ?>>En cours</option>
                            <option value="termine" <?php selected( $projet['statut'], 'termine' ); ?>>Terminé</option>
                        </select>
                    </div>
                    <div style="flex:1 1 200px;">
                        <label>Image (URL)</label>
                        <input type="text" name="fvt_projets[<?php echo $index; ?>][image]" value="<?php echo esc_url( $projet['image'] ); ?>" placeholder="https://..." style="width:100%;">
                    </div>
                </div>
                <div style="margin-top:10px;">
                    <label>Description</label>
                    <textarea name="fvt_projets[<?php echo $index; ?>][description]" rows="2" style="width:100%;"><?php echo esc_textarea( $projet['description'] ); ?></textarea>
                </div>
                <div style="margin-top:10px;">
                    <label>Impact (ex: 5000 : Hectares protégés)</label>
                    <div class="impact-wrapper">
                        <?php if ( is_array( $projet['impact'] ) ) : ?>
                            <?php foreach ( $projet['impact'] as $valeur => $label ) : ?>
                                <div class="impact-row" style="display:flex; gap:8px; margin-bottom:4px;">
                                    <input type="text" name="fvt_projets[<?php echo $index; ?>][impact_valeur][]" value="<?php echo esc_attr( $valeur ); ?>" placeholder="Valeur" style="flex:1;">
                                    <input type="text" name="fvt_projets[<?php echo $index; ?>][impact_label][]" value="<?php echo esc_attr( $label ); ?>" placeholder="Libellé" style="flex:2;">
                                    <button type="button" class="button remove-impact-row">Supprimer</button>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="button add-impact-row">Ajouter un indicateur</button>
                </div>
                <button type="button" class="button remove-projet-row" style="margin-top:12px; color:#d63638; border-color:#d63638;">Supprimer ce projet</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" class="button" id="add-projet-row">Ajouter un projet</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ... (même script que précédemment, à conserver)
            // Je le garde identique pour ne pas alourdir ici, mais vous devez le conserver
        });
    </script>
    <?php
}

function fvt_save_guichet_meta( $post_id ) {
    if ( ! isset( $_POST['fvt_guichet_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_guichet_nonce'], 'fvt_guichet_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $post = get_post( $post_id );
    if ( strpos( $post->post_name, 'guichet-' ) !== 0 ) return;

    $prefix = str_replace( 'guichet-', '', $post->post_name );
    $prefix = str_replace( '-', '_', $prefix );

    // Sauvegarde des chiffres clés
    $chiffres = array();
    if ( isset( $_POST['fvt_chiffres_valeur'] ) && isset( $_POST['fvt_chiffres_label'] ) ) {
        for ( $i = 0; $i < count( $_POST['fvt_chiffres_valeur'] ); $i++ ) {
            $valeur = sanitize_text_field( $_POST['fvt_chiffres_valeur'][ $i ] );
            $label  = sanitize_text_field( $_POST['fvt_chiffres_label'][ $i ] );
            if ( ! empty( $valeur ) && ! empty( $label ) ) {
                $chiffres[ $valeur ] = $label;
            }
        }
    }
    update_post_meta( $post_id, '_fvt_' . $prefix . '_chiffres', $chiffres );

    // Sauvegarde des projets
    $projets = array();
    if ( isset( $_POST['fvt_projets'] ) && is_array( $_POST['fvt_projets'] ) ) {
        foreach ( $_POST['fvt_projets'] as $projet ) {
            if ( empty( $projet['titre'] ) ) continue;
            $impact = array();
            if ( isset( $projet['impact_valeur'] ) && isset( $projet['impact_label'] ) ) {
                for ( $i = 0; $i < count( $projet['impact_valeur'] ); $i++ ) {
                    $v = sanitize_text_field( $projet['impact_valeur'][ $i ] );
                    $l = sanitize_text_field( $projet['impact_label'][ $i ] );
                    if ( ! empty( $v ) && ! empty( $l ) ) {
                        $impact[ $v ] = $l;
                    }
                }
            }
            $projets[] = array(
                'titre'       => sanitize_text_field( $projet['titre'] ),
                'localisation'=> sanitize_text_field( $projet['localisation'] ?? '' ),
                'statut'      => sanitize_text_field( $projet['statut'] ?? 'en_cours' ),
                'image'       => esc_url_raw( $projet['image'] ?? '' ),
                'description' => sanitize_textarea_field( $projet['description'] ?? '' ),
                'impact'      => $impact,
            );
        }
    }
    update_post_meta( $post_id, '_fvt_' . $prefix . '_projets', $projets );
}
add_action( 'save_post', 'fvt_save_guichet_meta' );


// ======================================================
// CPT : SOUMISSIONS DE PROJETS
// ======================================================
// ======================================================
// CPT : SOUMISSIONS DE PROJETS
// ======================================================

function fvt_cpt_soumission() {
    $labels = array(
        'name'               => 'Soumissions de projets',
        'singular_name'      => 'Soumission',
        'add_new'            => 'Ajouter une soumission',
        'add_new_item'       => 'Ajouter une nouvelle soumission',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouvelle soumission',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucune soumission',
        'not_found_in_trash' => 'Aucune soumission dans la corbeille',
        'all_items'          => 'Toutes les soumissions',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-feedback',
        'supports'            => array( 'title', 'editor' ),
        'menu_position'       => 35,
        'capability_type'     => 'post',
        'capabilities'        => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap'        => true,
    );
    register_post_type( 'soumission', $args );
}
add_action( 'init', 'fvt_cpt_soumission' );

// ===== COLONNES ADMIN =====
function fvt_soumission_admin_columns( $columns ) {
    $new_columns = array();
    foreach ( $columns as $key => $value ) {
        if ( $key === 'title' ) {
            $new_columns['reference'] = 'Référence';
        }
        $new_columns[ $key ] = $value;
        if ( $key === 'date' ) {
            $new_columns['nom'] = 'Nom';
            $new_columns['email'] = 'Email';
            $new_columns['type_projet'] = 'Type de projet';
            $new_columns['document'] = 'Document';
        }
    }
    return $new_columns;
}
add_filter( 'manage_soumission_posts_columns', 'fvt_soumission_admin_columns' );

function fvt_soumission_admin_column_content( $column, $post_id ) {
    $meta = get_post_meta( $post_id );
    switch ( $column ) {
        case 'reference':
            echo esc_html( get_post_meta( $post_id, '_soumission_reference', true ) );
            break;
        case 'nom':
            echo esc_html( ( $meta['_soumission_prenom'][0] ?? '' ) . ' ' . ( $meta['_soumission_nom'][0] ?? '' ) );
            break;
        case 'email':
            echo esc_html( $meta['_soumission_email'][0] ?? '' );
            break;
        case 'type_projet':
            echo esc_html( $meta['_soumission_type_projet'][0] ?? '' );
            break;
        case 'document':
            $file_id = get_post_meta( $post_id, '_soumission_fichier', true );
            if ( $file_id ) {
                $file_url = wp_get_attachment_url( $file_id );
                if ( $file_url ) {
                    echo '<a href="' . esc_url( $file_url ) . '" target="_blank" class="button button-small">Télécharger</a>';
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
            break;
    }
}
add_action( 'manage_soumission_posts_custom_column', 'fvt_soumission_admin_column_content', 10, 2 );

// ===== LIEN DE TÉLÉCHARGEMENT DANS LA PAGE D'ÉDITION =====
add_filter( 'the_content', 'fvt_soumission_content_document_link' );
function fvt_soumission_content_document_link( $content ) {
    if ( is_admin() && get_post_type() === 'soumission' ) {
        $file_id = get_post_meta( get_the_ID(), '_soumission_fichier', true );
        if ( $file_id ) {
            $file_url = wp_get_attachment_url( $file_id );
            if ( $file_url ) {
                $content .= '<p><strong>📎 Document soumis :</strong> <a href="' . esc_url( $file_url ) . '" target="_blank" class="button">Télécharger le document</a></p>';
            }
        }
    }
    return $content;
}

// ===== TRAITEMENT DU FORMULAIRE =====
function fvt_handle_soumission() {
    if ( ! isset( $_POST['fvt_soumission_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_soumission_nonce'], 'fvt_soumission_action' ) ) {
        wp_redirect( add_query_arg( 'soumission_error', '4', wp_get_referer() ) );
        exit;
    }

    $required = array( 'nom', 'prenom', 'email', 'telephone', 'type_projet', 'description' );
    foreach ( $required as $field ) {
        if ( empty( $_POST[ $field ] ) ) {
            wp_redirect( add_query_arg( 'soumission_error', '1', wp_get_referer() ) );
            exit;
        }
    }

    if ( empty( $_POST['consent'] ) ) {
        wp_redirect( add_query_arg( 'soumission_error', '2', wp_get_referer() ) );
        exit;
    }

    $nom         = sanitize_text_field( $_POST['nom'] );
    $prenom      = sanitize_text_field( $_POST['prenom'] );
    $email       = sanitize_email( $_POST['email'] );
    $telephone   = sanitize_text_field( $_POST['telephone'] );
    $type_projet = sanitize_text_field( $_POST['type_projet'] );
    $description = sanitize_textarea_field( $_POST['description'] );

    $reference = 'SOU-' . date('Y') . '-' . str_pad( mt_rand( 1, 9999 ), 4, '0', STR_PAD_LEFT );

    $post_id = wp_insert_post( array(
        'post_title'   => 'Soumission ' . $reference,
        'post_content' => $description,
        'post_status'  => 'publish',
        'post_type'    => 'soumission',
    ) );

    if ( is_wp_error( $post_id ) ) {
        wp_redirect( add_query_arg( 'soumission_error', '3', wp_get_referer() ) );
        exit;
    }

    update_post_meta( $post_id, '_soumission_reference', $reference );
    update_post_meta( $post_id, '_soumission_nom', $nom );
    update_post_meta( $post_id, '_soumission_prenom', $prenom );
    update_post_meta( $post_id, '_soumission_email', $email );
    update_post_meta( $post_id, '_soumission_telephone', $telephone );
    update_post_meta( $post_id, '_soumission_type_projet', $type_projet );
    update_post_meta( $post_id, '_soumission_consent', 1 );

    // Upload du fichier
    if ( isset( $_FILES['fichier'] ) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK ) {
        $upload = wp_handle_upload( $_FILES['fichier'], array( 'test_form' => false ) );
        if ( ! isset( $upload['error'] ) ) {
            $attachment_id = wp_insert_attachment( array(
                'post_title'     => 'Fichier soumission ' . $reference,
                'post_content'   => '',
                'post_status'    => 'inherit',
                'post_mime_type' => $upload['type'],
            ), $upload['file'], $post_id );
            if ( ! is_wp_error( $attachment_id ) ) {
                require_once ABSPATH . 'wp-admin/includes/image.php';
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload['file'] );
                wp_update_attachment_metadata( $attachment_id, $attachment_data );
                update_post_meta( $post_id, '_soumission_fichier', $attachment_id );
            }
        }
    }

    // Email de confirmation
    wp_mail( $email, 'Confirmation de soumission - Togo Green Fund',
        "Bonjour $prenom $nom,\n\nNous avons bien reçu votre soumission de projet.\nVotre numéro de référence est : $reference\n\nNotre équipe examinera votre proposition et vous recontactera sous 30 jours ouvrés.\n\nCordialement,\nL'équipe du Togo Green Fund" );

    wp_redirect( add_query_arg( 'soumission_success', $reference, wp_get_referer() ) );
    exit;
}
add_action( 'admin_post_nopriv_fvt_soumission', 'fvt_handle_soumission' );
add_action( 'admin_post_fvt_soumission', 'fvt_handle_soumission' );


// ======================================================
// CPT : GRIEFS (Plaintes)
// ======================================================

function fvt_cpt_grief() {
    $labels = array(
        'name'               => 'Griefs / Plaintes',
        'singular_name'      => 'Grief',
        'add_new'            => 'Ajouter un grief',
        'add_new_item'       => 'Ajouter un nouveau grief',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau grief',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun grief',
        'not_found_in_trash' => 'Aucun grief dans la corbeille',
        'all_items'          => 'Tous les griefs',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-warning',
        'supports'            => array( 'title', 'editor' ),
        'menu_position'       => 36,
        'capability_type'     => 'post',
        'capabilities'        => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap'        => true,
    );
    register_post_type( 'grief', $args );
}
add_action( 'init', 'fvt_cpt_grief' );

// ===== COLONNES ADMIN =====
function fvt_grief_admin_columns( $columns ) {
    $new_columns = array();
    foreach ( $columns as $key => $value ) {
        if ( $key === 'title' ) {
            $new_columns['reference'] = 'Référence';
        }
        $new_columns[ $key ] = $value;
        if ( $key === 'date' ) {
            $new_columns['nom'] = 'Nom';
            $new_columns['email'] = 'Email';
            $new_columns['type_grief'] = 'Type de grief';
            $new_columns['statut_grief'] = 'Statut';
            $new_columns['document'] = 'Document';
        }
    }
    return $new_columns;
}
add_filter( 'manage_grief_posts_columns', 'fvt_grief_admin_columns' );

function fvt_grief_admin_column_content( $column, $post_id ) {
    $meta = get_post_meta( $post_id );
    switch ( $column ) {
        case 'reference':
            echo esc_html( get_post_meta( $post_id, '_grief_reference', true ) );
            break;
        case 'nom':
            echo esc_html( ( $meta['_grief_prenom'][0] ?? '' ) . ' ' . ( $meta['_grief_nom'][0] ?? '' ) );
            break;
        case 'email':
            echo esc_html( $meta['_grief_email'][0] ?? '' );
            break;
        case 'type_grief':
            echo esc_html( $meta['_grief_type'][0] ?? '' );
            break;
        case 'statut_grief':
            $statut = $meta['_grief_statut'][0] ?? 'en_attente';
            $labels = array(
                'en_attente' => 'En attente',
                'en_cours'   => 'En cours',
                'traite'     => 'Traité',
                'rejete'     => 'Rejeté',
            );
            $class = 'statut-' . $statut;
            echo '<span class="' . esc_attr( $class ) . '" style="padding:3px 12px; border-radius:12px; font-size:11px; font-weight:600; display:inline-block; background:#e0e0e0; color:#333;">' . esc_html( $labels[ $statut ] ?? $statut ) . '</span>';
            break;
        case 'document':
            $file_id = get_post_meta( $post_id, '_grief_fichier', true );
            if ( $file_id ) {
                $file_url = wp_get_attachment_url( $file_id );
                if ( $file_url ) {
                    echo '<a href="' . esc_url( $file_url ) . '" target="_blank" class="button button-small">Télécharger</a>';
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
            break;
    }
}
add_action( 'manage_grief_posts_custom_column', 'fvt_grief_admin_column_content', 10, 2 );

// ===== STYLES POUR LE STATUT DANS L'ADMIN =====
add_action( 'admin_head', 'fvt_grief_admin_styles' );
function fvt_grief_admin_styles() {
    echo '<style>
        .statut-en_attente { background: #fff3cd !important; color: #856404 !important; }
        .statut-en_cours { background: #cce5ff !important; color: #004085 !important; }
        .statut-traite { background: #d4edda !important; color: #155724 !important; }
        .statut-rejete { background: #f8d7da !important; color: #721c24 !important; }
    </style>';
}

// ===== LIEN DE TÉLÉCHARGEMENT DANS LA PAGE D'ÉDITION =====
add_filter( 'the_content', 'fvt_grief_content_document_link' );
function fvt_grief_content_document_link( $content ) {
    if ( is_admin() && get_post_type() === 'grief' ) {
        $file_id = get_post_meta( get_the_ID(), '_grief_fichier', true );
        if ( $file_id ) {
            $file_url = wp_get_attachment_url( $file_id );
            if ( $file_url ) {
                $content .= '<p><strong>📎 Document joint :</strong> <a href="' . esc_url( $file_url ) . '" target="_blank" class="button">Télécharger le document</a></p>';
            }
        }
        // Ajout du statut actuel
        $statut = get_post_meta( get_the_ID(), '_grief_statut', true );
        $labels = array(
            'en_attente' => 'En attente',
            'en_cours'   => 'En cours',
            'traite'     => 'Traité',
            'rejete'     => 'Rejeté',
        );
        if ( $statut ) {
            $content .= '<p><strong>Statut :</strong> ' . esc_html( $labels[ $statut ] ?? $statut ) . '</p>';
        }
    }
    return $content;
}

// ===== TRAITEMENT DU FORMULAIRE DE GRIEF =====
function fvt_handle_grief() {
    if ( ! isset( $_POST['fvt_grief_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_grief_nonce'], 'fvt_grief_action' ) ) {
        wp_redirect( add_query_arg( 'grief_error', '4', wp_get_referer() ) );
        exit;
    }

    $required = array( 'nom', 'prenom', 'email', 'telephone', 'type_grief', 'description' );
    foreach ( $required as $field ) {
        if ( empty( $_POST[ $field ] ) ) {
            wp_redirect( add_query_arg( 'grief_error', '1', wp_get_referer() ) );
            exit;
        }
    }

    if ( empty( $_POST['consent'] ) ) {
        wp_redirect( add_query_arg( 'grief_error', '2', wp_get_referer() ) );
        exit;
    }

    $nom         = sanitize_text_field( $_POST['nom'] );
    $prenom      = sanitize_text_field( $_POST['prenom'] );
    $email       = sanitize_email( $_POST['email'] );
    $telephone   = sanitize_text_field( $_POST['telephone'] );
    $type_grief  = sanitize_text_field( $_POST['type_grief'] );
    $description = sanitize_textarea_field( $_POST['description'] );
    $statut      = 'en_attente';

    // Vérifier si l'utilisateur souhaite rester anonyme
    $anonyme = isset( $_POST['anonyme'] ) ? true : false;
    if ( $anonyme ) {
        $nom    = 'Anonyme';
        $prenom = '';
        $email  = '';
    }

    $reference = 'GRI-' . date('Y') . '-' . str_pad( mt_rand( 1, 9999 ), 4, '0', STR_PAD_LEFT );

    $post_id = wp_insert_post( array(
        'post_title'   => 'Grief ' . $reference,
        'post_content' => $description,
        'post_status'  => 'publish',
        'post_type'    => 'grief',
    ) );

    if ( is_wp_error( $post_id ) ) {
        wp_redirect( add_query_arg( 'grief_error', '3', wp_get_referer() ) );
        exit;
    }

    update_post_meta( $post_id, '_grief_reference', $reference );
    update_post_meta( $post_id, '_grief_nom', $nom );
    update_post_meta( $post_id, '_grief_prenom', $prenom );
    update_post_meta( $post_id, '_grief_email', $email );
    update_post_meta( $post_id, '_grief_telephone', $telephone );
    update_post_meta( $post_id, '_grief_type', $type_grief );
    update_post_meta( $post_id, '_grief_statut', $statut );
    update_post_meta( $post_id, '_grief_anonyme', $anonyme );
    update_post_meta( $post_id, '_grief_consent', 1 );

    // Upload du fichier
    if ( isset( $_FILES['fichier'] ) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK ) {
        $upload = wp_handle_upload( $_FILES['fichier'], array( 'test_form' => false ) );
        if ( ! isset( $upload['error'] ) ) {
            $attachment_id = wp_insert_attachment( array(
                'post_title'     => 'Fichier grief ' . $reference,
                'post_content'   => '',
                'post_status'    => 'inherit',
                'post_mime_type' => $upload['type'],
            ), $upload['file'], $post_id );
            if ( ! is_wp_error( $attachment_id ) ) {
                require_once ABSPATH . 'wp-admin/includes/image.php';
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload['file'] );
                wp_update_attachment_metadata( $attachment_id, $attachment_data );
                update_post_meta( $post_id, '_grief_fichier', $attachment_id );
            }
        }
    }

    // Email de confirmation (si non anonyme)
    if ( ! $anonyme && ! empty( $email ) ) {
        wp_mail( $email, 'Confirmation de dépôt de grief - Togo Green Fund',
            "Bonjour $prenom $nom,\n\nNous avons bien reçu votre dépôt de grief.\nVotre numéro de référence est : $reference\n\nNotre équipe examinera votre dossier et vous recontactera dans les meilleurs délais.\n\nCordialement,\nL'équipe du Togo Green Fund" );
    }

    wp_redirect( add_query_arg( 'grief_success', $reference, wp_get_referer() ) );
    exit;
}
add_action( 'admin_post_nopriv_fvt_grief', 'fvt_handle_grief' );
add_action( 'admin_post_fvt_grief', 'fvt_handle_grief' );

// ======================================================
// CPT : PLAINTES
// ======================================================

function fvt_cpt_plainte() {
    $labels = array(
        'name'               => 'Plaintes',
        'singular_name'      => 'Plainte',
        'add_new'            => 'Ajouter une plainte',
        'add_new_item'       => 'Ajouter une nouvelle plainte',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouvelle plainte',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucune plainte',
        'not_found_in_trash' => 'Aucune plainte dans la corbeille',
        'all_items'          => 'Toutes les plaintes',
    );
    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-warning',
        'supports'            => array( 'title', 'editor' ),
        'menu_position'       => 36,
        'capability_type'     => 'post',
        'capabilities'        => array(
            'create_posts' => 'do_not_allow', // empêche la création manuelle
        ),
        'map_meta_cap'        => true,
    );
    register_post_type( 'plainte', $args );
}
add_action( 'init', 'fvt_cpt_plainte' );

// ===== COLONNES ADMIN =====
function fvt_plainte_admin_columns( $columns ) {
    $new_columns = array();
    foreach ( $columns as $key => $value ) {
        if ( $key === 'title' ) {
            $new_columns['reference'] = 'Référence';
        }
        $new_columns[ $key ] = $value;
        if ( $key === 'date' ) {
            $new_columns['nom'] = 'Nom';
            $new_columns['email'] = 'Email';
            $new_columns['type_plainte'] = 'Type de plainte';
            $new_columns['statut_plainte'] = 'Statut';
            $new_columns['document'] = 'Document';
        }
    }
    return $new_columns;
}
add_filter( 'manage_plainte_posts_columns', 'fvt_plainte_admin_columns' );

function fvt_plainte_admin_column_content( $column, $post_id ) {
    $meta = get_post_meta( $post_id );
    switch ( $column ) {
        case 'reference':
            echo esc_html( get_post_meta( $post_id, '_plainte_reference', true ) );
            break;
        case 'nom':
            echo esc_html( ( $meta['_plainte_prenom'][0] ?? '' ) . ' ' . ( $meta['_plainte_nom'][0] ?? '' ) );
            break;
        case 'email':
            echo esc_html( $meta['_plainte_email'][0] ?? '' );
            break;
        case 'type_plainte':
            echo esc_html( $meta['_plainte_type'][0] ?? '' );
            break;
        case 'statut_plainte':
            $statut = $meta['_plainte_statut'][0] ?? 'en_attente';
            $labels = array(
                'en_attente' => 'En attente',
                'en_cours'   => 'En cours',
                'traite'     => 'Traité',
                'rejete'     => 'Rejeté',
            );
            $class = 'statut-' . $statut;
            echo '<span class="' . esc_attr( $class ) . '" style="padding:3px 12px; border-radius:12px; font-size:11px; font-weight:600; display:inline-block; background:#e0e0e0; color:#333;">' . esc_html( $labels[ $statut ] ?? $statut ) . '</span>';
            break;
        case 'document':
            $file_id = get_post_meta( $post_id, '_plainte_fichier', true );
            if ( $file_id ) {
                $file_url = wp_get_attachment_url( $file_id );
                if ( $file_url ) {
                    echo '<a href="' . esc_url( $file_url ) . '" target="_blank" class="button button-small">Télécharger</a>';
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
            break;
    }
}
add_action( 'manage_plainte_posts_custom_column', 'fvt_plainte_admin_column_content', 10, 2 );

// ===== STYLES POUR LE STATUT =====
add_action( 'admin_head', 'fvt_plainte_admin_styles' );
function fvt_plainte_admin_styles() {
    echo '<style>
        .statut-en_attente { background: #fff3cd !important; color: #856404 !important; }
        .statut-en_cours { background: #cce5ff !important; color: #004085 !important; }
        .statut-traite { background: #d4edda !important; color: #155724 !important; }
        .statut-rejete { background: #f8d7da !important; color: #721c24 !important; }
    </style>';
}

// ===== LIEN DE TÉLÉCHARGEMENT DANS LA PAGE D'ÉDITION =====
add_filter( 'the_content', 'fvt_plainte_content_document_link' );
function fvt_plainte_content_document_link( $content ) {
    if ( is_admin() && get_post_type() === 'plainte' ) {
        $file_id = get_post_meta( get_the_ID(), '_plainte_fichier', true );
        if ( $file_id ) {
            $file_url = wp_get_attachment_url( $file_id );
            if ( $file_url ) {
                $content .= '<p><strong>📎 Document joint :</strong> <a href="' . esc_url( $file_url ) . '" target="_blank" class="button">Télécharger le document</a></p>';
            }
        }
        $statut = get_post_meta( get_the_ID(), '_plainte_statut', true );
        $labels = array(
            'en_attente' => 'En attente',
            'en_cours'   => 'En cours',
            'traite'     => 'Traité',
            'rejete'     => 'Rejeté',
        );
        if ( $statut ) {
            $content .= '<p><strong>Statut :</strong> ' . esc_html( $labels[ $statut ] ?? $statut ) . '</p>';
        }
    }
    return $content;
}

// ===== TRAITEMENT DU FORMULAIRE =====
function fvt_handle_plainte() {
    if ( ! isset( $_POST['fvt_plainte_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_plainte_nonce'], 'fvt_plainte_action' ) ) {
        wp_redirect( add_query_arg( 'plainte_error', '4', wp_get_referer() ) );
        exit;
    }

    $required = array( 'type_plainte', 'description', 'nom', 'prenom', 'email' );
    foreach ( $required as $field ) {
        if ( empty( $_POST[ $field ] ) ) {
            wp_redirect( add_query_arg( 'plainte_error', '1', wp_get_referer() ) );
            exit;
        }
    }

    if ( empty( $_POST['consent'] ) ) {
        wp_redirect( add_query_arg( 'plainte_error', '2', wp_get_referer() ) );
        exit;
    }

    $type_plainte = sanitize_text_field( $_POST['type_plainte'] );
    $projet       = isset( $_POST['projet'] ) ? sanitize_text_field( $_POST['projet'] ) : '';
    $description  = sanitize_textarea_field( $_POST['description'] );
    $nom          = sanitize_text_field( $_POST['nom'] );
    $prenom       = sanitize_text_field( $_POST['prenom'] );
    $email        = sanitize_email( $_POST['email'] );
    $telephone    = isset( $_POST['telephone'] ) ? sanitize_text_field( $_POST['telephone'] ) : '';
    $organisation = isset( $_POST['organisation'] ) ? sanitize_text_field( $_POST['organisation'] ) : '';

    $reference = 'PLA-' . date('Y') . '-' . str_pad( mt_rand( 1, 9999 ), 4, '0', STR_PAD_LEFT );

    $post_id = wp_insert_post( array(
        'post_title'   => 'Plainte ' . $reference,
        'post_content' => $description,
        'post_status'  => 'publish',
        'post_type'    => 'plainte',
    ) );

    if ( is_wp_error( $post_id ) ) {
        wp_redirect( add_query_arg( 'plainte_error', '3', wp_get_referer() ) );
        exit;
    }

    update_post_meta( $post_id, '_plainte_reference', $reference );
    update_post_meta( $post_id, '_plainte_type', $type_plainte );
    update_post_meta( $post_id, '_plainte_projet', $projet );
    update_post_meta( $post_id, '_plainte_nom', $nom );
    update_post_meta( $post_id, '_plainte_prenom', $prenom );
    update_post_meta( $post_id, '_plainte_email', $email );
    update_post_meta( $post_id, '_plainte_telephone', $telephone );
    update_post_meta( $post_id, '_plainte_organisation', $organisation );
    update_post_meta( $post_id, '_plainte_statut', 'en_attente' );
    update_post_meta( $post_id, '_plainte_consent', 1 );

    // Upload du fichier
    if ( isset( $_FILES['fichier'] ) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK ) {
        $upload = wp_handle_upload( $_FILES['fichier'], array( 'test_form' => false ) );
        if ( ! isset( $upload['error'] ) ) {
            $attachment_id = wp_insert_attachment( array(
                'post_title'     => 'Fichier plainte ' . $reference,
                'post_content'   => '',
                'post_status'    => 'inherit',
                'post_mime_type' => $upload['type'],
            ), $upload['file'], $post_id );
            if ( ! is_wp_error( $attachment_id ) ) {
                require_once ABSPATH . 'wp-admin/includes/image.php';
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload['file'] );
                wp_update_attachment_metadata( $attachment_id, $attachment_data );
                update_post_meta( $post_id, '_plainte_fichier', $attachment_id );
            }
        }
    }

    // Email de confirmation
    wp_mail( $email, 'Confirmation de dépôt de plainte - Togo Green Fund',
        "Bonjour $prenom $nom,\n\nNous avons bien reçu votre plainte.\nVotre numéro de référence est : $reference\n\nNotre équipe examinera votre dossier et vous recontactera dans les meilleurs délais.\n\nCordialement,\nL'équipe du Togo Green Fund" );

    wp_redirect( add_query_arg( 'plainte_success', $reference, wp_get_referer() ) );
    exit;
}
add_action( 'admin_post_nopriv_fvt_plainte', 'fvt_handle_plainte' );
add_action( 'admin_post_fvt_plainte', 'fvt_handle_plainte' );


// ======================================================
// AJOUT DU STATUT AU CPT SOUMISSION
// ======================================================

// Ajouter une metabox pour le statut dans l'administration
function fvt_soumission_statut_metabox() {
    add_meta_box(
        'fvt_soumission_statut',
        'Statut de la soumission',
        'fvt_soumission_statut_metabox_callback',
        'soumission',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'fvt_soumission_statut_metabox' );

function fvt_soumission_statut_metabox_callback( $post ) {
    wp_nonce_field( 'fvt_soumission_statut_nonce', 'fvt_soumission_statut_nonce' );
    $statut = get_post_meta( $post->ID, '_soumission_statut', true ) ?: 'en_attente';
    $statuts = array(
        'en_attente' => 'En attente',
        'en_cours'   => 'En cours d\'instruction',
        'approuve'   => 'Approuvé',
        'rejete'     => 'Rejeté',
    );
    ?>
    <p>
        <label for="fvt_soumission_statut">Statut :</label>
        <select name="fvt_soumission_statut" id="fvt_soumission_statut" style="width:100%;">
            <?php foreach ( $statuts as $key => $label ) : ?>
                <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $statut, $key ); ?>>
                    <?php echo esc_html( $label ); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php
}

function fvt_save_soumission_statut( $post_id ) {
    if ( ! isset( $_POST['fvt_soumission_statut_nonce'] ) || ! wp_verify_nonce( $_POST['fvt_soumission_statut_nonce'], 'fvt_soumission_statut_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['fvt_soumission_statut'] ) ) {
        update_post_meta( $post_id, '_soumission_statut', sanitize_text_field( $_POST['fvt_soumission_statut'] ) );
    }
}
add_action( 'save_post', 'fvt_save_soumission_statut' );

// Ajouter une colonne "Statut" dans l'admin
function fvt_soumission_admin_columns_statut( $columns ) {
    $new_columns = array();
    foreach ( $columns as $key => $value ) {
        $new_columns[ $key ] = $value;
        if ( $key === 'type_projet' ) {
            $new_columns['statut'] = 'Statut';
        }
    }
    return $new_columns;
}
add_filter( 'manage_soumission_posts_columns', 'fvt_soumission_admin_columns_statut' );

function fvt_soumission_admin_column_content_statut( $column, $post_id ) {
    if ( $column === 'statut' ) {
        $statut = get_post_meta( $post_id, '_soumission_statut', true ) ?: 'en_attente';
        $labels = array(
            'en_attente' => 'En attente',
            'en_cours'   => 'En cours',
            'approuve'   => 'Approuvé',
            'rejete'     => 'Rejeté',
        );
        $classes = array(
            'en_attente' => 'statut--attente',
            'en_cours'   => 'statut--encours',
            'approuve'   => 'statut--approuve',
            'rejete'     => 'statut--rejete',
        );
        echo '<span class="' . esc_attr( $classes[ $statut ] ) . '" style="padding:3px 12px; border-radius:12px; font-size:11px; font-weight:600; display:inline-block;">' . esc_html( $labels[ $statut ] ) . '</span>';
    }
}
add_action( 'manage_soumission_posts_custom_column', 'fvt_soumission_admin_column_content_statut', 10, 2 );

// Ajouter les styles pour les statuts dans l'admin
add_action( 'admin_head', 'fvt_soumission_statut_styles' );
function fvt_soumission_statut_styles() {
    echo '<style>
        .statut--attente { background: #fff3cd; color: #856404; }
        .statut--encours { background: #cce5ff; color: #004085; }
        .statut--approuve { background: #d4edda; color: #155724; }
        .statut--rejete { background: #f8d7da; color: #721c24; }
    </style>';
}
// ======================================================
// FIN DU FICHIER
// ======================================================
?>