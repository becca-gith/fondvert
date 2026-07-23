<?php
/**
 * Fonctions de base du thème ATC
 */

// 1. Activer les images mises en avant (post thumbnails)
add_theme_support('post-thumbnails');

// 2. (Optionnel) Créer un type de contenu personnalisé pour les photos
// Décommentez le bloc ci-dessous si vous préférez un CPT dédié.
/*
function atc_custom_post_photo() {
    register_post_type('photo',
        array(
            'labels'      => array(
                'name'          => __('Photos'),
                'singular_name' => __('Photo'),
                'add_new'       => __('Ajouter'),
                'add_new_item'  => __('Ajouter une photo'),
                'edit_item'     => __('Modifier'),
                'new_item'      => __('Nouvelle photo'),
                'view_item'     => __('Voir'),
                'search_items'  => __('Rechercher'),
                'not_found'     => __('Aucune photo'),
            ),
            'public'      => true,
            'has_archive' => false,
            'supports'    => array('title', 'thumbnail', 'editor'),
            'menu_icon'   => 'dashicons-format-gallery',
            'menu_position'=> 20,
        )
    );
}
add_action('init', 'atc_custom_post_photo');
*/

// 1. Déclarer le type de contenu "Vidéos"
function atc_cpt_video() {
    $labels = array(
        'name'               => 'Vidéos',
        'singular_name'      => 'Vidéo',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter une vidéo',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouvelle vidéo',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucune vidéo',
        'not_found_in_trash' => 'Aucune vidéo dans la corbeille',
    );
    $args = array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => false,
        'supports'     => array( 'title', 'editor' ),   // le titre + description
        'menu_icon'    => 'dashicons-format-video',
        'menu_position'=> 21,
    );
    register_post_type( 'video', $args );
}
add_action( 'init', 'atc_cpt_video' );

// 2. Ajouter un champ personnalisé pour l'URL YouTube
function atc_video_metabox() {
    add_meta_box(
        'atc_video_url',
        'Lien YouTube',
        'atc_video_metabox_callback',
        'video',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'atc_video_metabox' );

function atc_video_metabox_callback( $post ) {
    wp_nonce_field( 'atc_video_nonce', 'atc_video_nonce_field' );
    $value = get_post_meta( $post->ID, '_atc_video_url', true );
    echo '<label for="atc_video_url">URL de la vidéo YouTube :</label>';
    echo '<input type="url" id="atc_video_url" name="atc_video_url" value="' . esc_attr( $value ) . '" style="width:100%;" placeholder="https://www.youtube.com/watch?v=...">';
}

function atc_save_video_meta( $post_id ) {
    if ( ! isset( $_POST['atc_video_nonce_field'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['atc_video_nonce_field'], 'atc_video_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    if ( isset( $_POST['atc_video_url'] ) ) {
        update_post_meta( $post_id, '_atc_video_url', esc_url_raw( $_POST['atc_video_url'] ) );
    }
}
add_action( 'save_post', 'atc_save_video_meta' );

// 1. Création du Custom Post Type "slide"
// Enregistrement du Custom Post Type 'slide' pour le slider
function atc_cpt_slide() {
    $labels = array(
        'name'               => 'Slides',
        'singular_name'      => 'Slide',
        'add_new'            => 'Ajouter un slide',
        'add_new_item'       => 'Ajouter un nouveau slide',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau slide',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun slide',
        'not_found_in_trash' => 'Aucun slide dans la corbeille',
    );
    $args = array(
        'labels'       => $labels,
        'public'       => false,          // non visible sur le front
        'show_ui'      => true,           // visible dans l'admin
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-slideshow',
        'supports'     => array( 'title', 'editor', 'thumbnail' ),
        'menu_position'=> 22,
    );
    register_post_type( 'slide', $args );
}
add_action( 'init', 'atc_cpt_slide' );


// ==================================================
// SECTION STATISTIQUES – ADMINISTRATION
// ==================================================

// 1. Ajouter la page d'options
function atc_stats_menu() {
    add_options_page(
        'Statistiques ATC',
        'Statistiques ATC',
        'manage_options',
        'atc-stats',
        'atc_stats_page'
    );
}
add_action( 'admin_menu', 'atc_stats_menu' );

// 2. Enregistrer les options
function atc_stats_register_settings() {
    register_setting( 'atc_stats_group', 'atc_stats_data', 'atc_stats_sanitize' );
}
add_action( 'admin_init', 'atc_stats_register_settings' );

function atc_stats_sanitize( $input ) {
    $defaults = array(
        'adherents' => '5 000+',
        'adherents_label' => 'Adhérents actifs',
        'years' => '30+',
        'years_label' => 'Années d\'expérience',
        'resolution' => '80%',
        'resolution_label' => 'Litiges résolus à l\'amiable',
        'antennes' => '6',
        'antennes_label' => 'Antennes régionales'
    );
    $output = array();
    foreach ( $defaults as $key => $val ) {
        $output[ $key ] = isset( $input[ $key ] ) ? sanitize_text_field( $input[ $key ] ) : $val;
    }
    return $output;
}

// 3. Interface de la page d'options
function atc_stats_page() {
    $stats = get_option( 'atc_stats_data', array() );
    $defaults = array(
        'adherents' => '5 000+',
        'adherents_label' => 'Adhérents actifs',
        'years' => '30+',
        'years_label' => 'Années d\'expérience',
        'resolution' => '80%',
        'resolution_label' => 'Litiges résolus à l\'amiable',
        'antennes' => '6',
        'antennes_label' => 'Antennes régionales'
    );
    $stats = wp_parse_args( $stats, $defaults );
    ?>
    <div class="wrap">
        <h1>Statistiques de l’ATC</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'atc_stats_group' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Adhérents</th>
                    <td>
                        <input type="text" name="atc_stats_data[adherents]" value="<?php echo esc_attr( $stats['adherents'] ); ?>" class="regular-text" />
                        <p class="description">Ex: 5 000+</p>
                        <input type="text" name="atc_stats_data[adherents_label]" value="<?php echo esc_attr( $stats['adherents_label'] ); ?>" class="regular-text" />
                        <p class="description">Libellé (ex: Adhérents actifs)</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Années d’expérience</th>
                    <td>
                        <input type="text" name="atc_stats_data[years]" value="<?php echo esc_attr( $stats['years'] ); ?>" class="regular-text" />
                        <input type="text" name="atc_stats_data[years_label]" value="<?php echo esc_attr( $stats['years_label'] ); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Litiges résolus</th>
                    <td>
                        <input type="text" name="atc_stats_data[resolution]" value="<?php echo esc_attr( $stats['resolution'] ); ?>" class="regular-text" />
                        <input type="text" name="atc_stats_data[resolution_label]" value="<?php echo esc_attr( $stats['resolution_label'] ); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Antennes régionales</th>
                    <td>
                        <input type="text" name="atc_stats_data[antennes]" value="<?php echo esc_attr( $stats['antennes'] ); ?>" class="regular-text" />
                        <input type="text" name="atc_stats_data[antennes_label]" value="<?php echo esc_attr( $stats['antennes_label'] ); ?>" class="regular-text" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// ==================================================
// CUSTOM POST TYPE : FAQ
// ==================================================
function atc_cpt_faq() {
    $labels = array(
        'name'               => 'FAQ',
        'singular_name'      => 'Question',
        'add_new'            => 'Ajouter une question',
        'add_new_item'       => 'Ajouter une nouvelle question',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouvelle question',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucune question',
        'not_found_in_trash' => 'Aucune question dans la corbeille',
    );
    $args = array(
        'labels'       => $labels,
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-editor-help',
        'supports'     => array( 'title', 'editor' ),
        'menu_position'=> 23,
    );
    register_post_type( 'faq', $args );
}
add_action( 'init', 'atc_cpt_faq' );


// ==================================================
// CUSTOM POST TYPE : PARTENAIRES
// ==================================================
function atc_cpt_partenaire() {
    $labels = array(
        'name'               => 'Partenaires',
        'singular_name'      => 'Partenaire',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter un partenaire',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau partenaire',
        'view_item'          => 'Voir',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun partenaire',
        'not_found_in_trash' => 'Aucun partenaire dans la corbeille',
    );
    $args = array(
        'labels'       => $labels,
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => array( 'title', 'thumbnail' ),
        'menu_position'=> 24,
    );
    register_post_type( 'partenaire', $args );
}
add_action( 'init', 'atc_cpt_partenaire' );


/**
 * Enregistrement du Custom Post Type "photo"
 * Pour la galerie d'images de l'ATC
 */
function atc_register_photo_cpt() {
    $labels = array(
        'name'               => 'Photos',
        'singular_name'      => 'Photo',
        'menu_name'          => 'Photos',
        'add_new'            => 'Ajouter une photo',
        'add_new_item'       => 'Ajouter une nouvelle photo',
        'edit_item'          => 'Modifier la photo',
        'new_item'           => 'Nouvelle photo',
        'view_item'          => 'Voir la photo',
        'search_items'       => 'Rechercher des photos',
        'not_found'          => 'Aucune photo trouvée',
        'not_found_in_trash' => 'Aucune photo dans la corbeille',
        'all_items'          => 'Toutes les photos',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-format-gallery',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'photos' ),
        'capability_type'     => 'post',
    );

    register_post_type( 'photo', $args );
}
add_action( 'init', 'atc_register_photo_cpt' );

/**
 * Ajout de la colonne "Image" dans l'administration
 */
function atc_photo_custom_columns( $columns ) {
    $new_columns = array();
    foreach ( $columns as $key => $value ) {
        if ( $key === 'title' ) {
            $new_columns['thumbnail'] = 'Aperçu';
        }
        $new_columns[$key] = $value;
    }
    return $new_columns;
}
add_filter( 'manage_photo_posts_columns', 'atc_photo_custom_columns' );

function atc_photo_custom_column_content( $column, $post_id ) {
    if ( $column === 'thumbnail' ) {
        if ( has_post_thumbnail( $post_id ) ) {
            echo get_the_post_thumbnail( $post_id, array( 60, 60 ) );
        } else {
            echo '—';
        }
    }
}
add_action( 'manage_photo_posts_custom_column', 'atc_photo_custom_column_content', 10, 2 );

?>

