<?php
/**
 * Template part : Page "Projets" – dynamique
 * Utilise le CPT "projet" avec ses métadonnées (statut, localisation)
 *
 * @package TogoGreenFund
 */

// Paramètres de la requête
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'      => 'projet',
    'posts_per_page' => 9,
    'post_status'    => 'publish',
    'paged'          => $paged,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

// Filtre par statut (meta query)
$statut_filter = isset( $_GET['statut'] ) ? sanitize_text_field( $_GET['statut'] ) : '';
if ( ! empty( $statut_filter ) ) {
    $args['meta_query'][] = array(
        'key'   => '_projet_statut',
        'value' => $statut_filter,
    );
}

// Filtre par catégorie (taxonomie 'projet_categorie' – si vous l'avez créée)
$cat_slug = isset( $_GET['categorie'] ) ? sanitize_text_field( $_GET['categorie'] ) : '';
if ( ! empty( $cat_slug ) && taxonomy_exists( 'projet_categorie' ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'projet_categorie',
            'field'    => 'slug',
            'terms'    => $cat_slug,
        ),
    );
}

// Recherche
$search_query = isset( $_GET['recherche'] ) ? sanitize_text_field( $_GET['recherche'] ) : '';
if ( ! empty( $search_query ) ) {
    $args['s'] = $search_query;
}

$projets_query = new WP_Query( $args );
$total_projets = $projets_query->found_posts;

// Récupérer les catégories pour le filtre (si la taxonomie existe)
$categories = array();
if ( taxonomy_exists( 'projet_categorie' ) ) {
    $categories = get_terms( array(
        'taxonomy'   => 'projet_categorie',
        'hide_empty' => true,
    ) );
}

// Statuts disponibles
$statuts_disponibles = array(
    'en-cours' => 'En cours',
    'termine'  => 'Terminé',
    'bientot'  => 'À venir',
);
?>

<!-- ===== EN‑TÊTE ===== -->
<section class="projets-header">
    <div class="container">
        <nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
            <ol>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li class="current">Nos projets</li>
            </ol>
        </nav>
        <span class="projets-header__badge"><i class="fas fa-folder-open"></i> Togo Green Fund</span>
        <h1>Nos projets</h1>
        <div class="title-underline"></div>
        <p class="projets-header__sub">Découvrez l'ensemble des initiatives soutenues par le Togo Green Fund.</p>
    </div>
</section>

<!-- ===== CONTENU ===== -->
<section class="projets-content">
    <div class="container">

        <!-- Filtres -->
        <form class="projets-filters" method="get" action="<?php echo esc_url( get_permalink() ); ?>">
            <div class="projets-filters__row">
                <div class="projets-filters__group">
                    <label for="statut">Statut</label>
                    <select name="statut" id="statut">
                        <option value="">Tous les statuts</option>
                        <?php foreach ( $statuts_disponibles as $slug => $label ) : ?>
                            <option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $statut_filter, $slug ); ?>>
                                <?php echo esc_html( $label ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
                <div class="projets-filters__group">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie">
                        <option value="">Toutes les catégories</option>
                        <?php foreach ( $categories as $cat ) : ?>
                            <option value="<?php echo esc_attr( $cat->slug ); ?>" <?php selected( $cat_slug, $cat->slug ); ?>>
                                <?php echo esc_html( $cat->name ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>

                <div class="projets-filters__group projets-filters__group--search">
                    <label for="recherche">Recherche</label>
                    <input type="text" name="recherche" id="recherche" placeholder="Rechercher un projet..." value="<?php echo esc_attr( $search_query ); ?>">
                </div>

                <div class="projets-filters__actions">
                    <button type="submit" class="filter-btn">
                        <i class="fas fa-filter"></i> Filtrer
                    </button>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="filter-btn filter-btn--reset">
                        <i class="fas fa-undo"></i> Réinitialiser
                    </a>
                </div>
            </div>
            <div class="projets-filters__count"><?php echo $total_projets; ?> projet(s) trouvé(s)</div>
        </form>

        <?php if ( $projets_query->have_posts() ) : ?>
            <div class="projets-grid">
                <?php while ( $projets_query->have_posts() ) : $projets_query->the_post();
                    $post_id = get_the_ID();
                    $statut   = get_post_meta( $post_id, '_projet_statut', true );
                    $location = get_post_meta( $post_id, '_projet_location', true );
                    $image_url = get_the_post_thumbnail_url( $post_id, 'medium' );
                    if ( empty( $image_url ) ) {
                        $image_url = get_template_directory_uri() . '/assets/images/default-project.jpg';
                    }
                    $title = get_the_title();
                    $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 15, '…' );
                    $link = get_permalink();

                    $status_label = '';
                    $status_class = '';
                    switch ( $statut ) {
                        case 'en-cours':
                            $status_label = 'En cours';
                            $status_class = 'statut--encours';
                            break;
                        case 'termine':
                            $status_label = 'Terminé';
                            $status_class = 'statut--termine';
                            break;
                        case 'bientot':
                            $status_label = 'À venir';
                            $status_class = 'statut--bientot';
                            break;
                        default:
                            $status_label = '';
                            $status_class = '';
                    }

                    $cat_names = array();
                    if ( taxonomy_exists( 'projet_categorie' ) ) {
                        $terms = get_the_terms( $post_id, 'projet_categorie' );
                        if ( $terms && ! is_wp_error( $terms ) ) {
                            foreach ( $terms as $term ) {
                                $cat_names[] = $term->name;
                            }
                        }
                    }
                    $cat_label = ! empty( $cat_names ) ? implode( ', ', $cat_names ) : '';
                ?>
                    <article class="projet-card">
                        <div class="projet-card__image">
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
                            <?php if ( ! empty( $status_label ) ) : ?>
                                <span class="projet-card__status <?php echo esc_attr( $status_class ); ?>"><?php echo esc_html( $status_label ); ?></span>
                            <?php endif; ?>
                            <a href="<?php echo esc_url( $link ); ?>" class="projet-card__link-overlay"><span class="sr-only"><?php echo esc_html( $title ); ?></span></a>
                        </div>
                        <div class="projet-card__content">
                            <?php if ( ! empty( $location ) ) : ?>
                                <div class="projet-card__location"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $location ); ?></div>
                            <?php endif; ?>
                            <?php if ( ! empty( $cat_label ) ) : ?>
                                <span class="projet-card__cat"><?php echo esc_html( $cat_label ); ?></span>
                            <?php endif; ?>
                            <h3 class="projet-card__title"><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a></h3>
                            <p class="projet-card__excerpt"><?php echo esc_html( $excerpt ); ?></p>
                            <a href="<?php echo esc_url( $link ); ?>" class="projet-card__btn">Voir le projet <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="projets-pagination">
                <?php
                echo paginate_links( array(
                    'total'     => $projets_query->max_num_pages,
                    'current'   => max( 1, $paged ),
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Précédent',
                    'next_text' => 'Suivant <i class="fas fa-chevron-right"></i>',
                ) );
                ?>
            </div>

        <?php else : ?>
            <div class="projets-empty">
                <i class="fas fa-search"></i>
                <h3>Aucun projet trouvé</h3>
                <p>Aucun projet ne correspond à vos critères. Essayez de modifier vos filtres.</p>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="filter-btn filter-btn--reset" style="display:inline-flex;margin-top:8px;">
                    <i class="fas fa-undo"></i> Voir tous les projets
                </a>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

    </div>
</section>

<!-- ===== CTA ===== -->
<section class="projets-cta">
    <div class="container">
        <h2>Vous portez un projet climatique ?</h2>
        <div class="cta-divider"></div>
        <p>Rejoignez les acteurs qui construisent, avec le Togo Green Fund, un avenir résilient et durable.</p>
        <a href="<?php echo esc_url( home_url( '/soumettre-un-projet' ) ); ?>" class="cta-btn">
            Soumettre un projet <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- ===== STYLES CSS (intégrés) ===== -->
<style>
:root {
    --vert-fvt: #0a6e3e;
    --vert-fvt-fonce: #063d24;
    --jaune-fvt: #FFCE00;
    --rouge-fvt: #D21034;
    --gris-fond: #f6faf7;
    --blanc: #ffffff;
}
.projets-header {
    background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 50px 0 55px;
    border-bottom: 1px solid #e0ebe6;
    text-align: center;
    position: relative;
}
.projets-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.breadcrumb-wrapper ol {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    list-style: none;
    padding: 0;
    margin: 0 0 18px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    flex-wrap: wrap;
    background: rgba(255,255,255,0.55);
    padding: 10px 24px;
    border-radius: 40px;
    box-shadow: 0 2px 12px rgba(6,61,36,0.06);
    display: inline-flex;
}
.breadcrumb-wrapper ol li a {
    color: #4d6a59;
    text-decoration: none;
    transition: color 0.2s;
}
.breadcrumb-wrapper ol li a:hover {
    color: var(--vert-fvt);
}
.breadcrumb-wrapper ol li a i {
    margin-right: 6px;
    font-size: 0.85rem;
    color: var(--vert-fvt);
}
.breadcrumb-wrapper .separator {
    color: var(--jaune-fvt);
    font-weight: 300;
    font-size: 1.1rem;
}
.breadcrumb-wrapper .current {
    color: var(--vert-fvt-fonce);
    font-weight: 700;
}
.projets-header__badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 20px;
    border-radius: 30px;
    background: rgba(10,110,62,0.08);
    color: var(--vert-fvt-fonce);
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 18px;
}
.projets-header__badge i { color: var(--vert-fvt); font-size: 14px; }
.projets-header h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--vert-fvt-fonce);
    text-transform: uppercase;
    font-size: 3.2rem;
    letter-spacing: -0.5px;
    margin: 0;
}
.title-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--jaune-fvt), var(--vert-fvt));
    margin: 16px auto 0;
    border-radius: 4px;
}
.projets-header__sub {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.1rem;
    color: #5a6a5f;
    max-width: 600px;
    margin: 18px auto 0;
}
.projets-content { padding: 50px 0 30px; background: #ffffff; }
.projets-filters {
    background: var(--gris-fond);
    border: 1px solid #e7f0ea;
    border-radius: 20px;
    padding: 24px 28px;
    margin-bottom: 40px;
}
.projets-filters__row {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-end;
    gap: 18px 24px;
}
.projets-filters__group {
    flex: 1 1 150px;
    min-width: 120px;
}
.projets-filters__group--search { flex: 2 1 200px; min-width: 160px; }
.projets-filters__group label {
    display: block;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    font-size: 0.85rem;
    color: var(--vert-fvt-fonce);
    margin-bottom: 4px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
.projets-filters__group select,
.projets-filters__group input {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #dce8e0;
    border-radius: 10px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    color: #2c3e34;
    background: #fff;
    transition: border 0.2s;
}
.projets-filters__group select:focus,
.projets-filters__group input:focus {
    border-color: var(--vert-fvt);
    outline: none;
}
.projets-filters__actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    align-items: center;
}
.filter-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 22px;
    background: var(--vert-fvt);
    color: #fff;
    border: none;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s;
    cursor: pointer;
}
.filter-btn:hover {
    background: var(--vert-fvt-fonce);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(10,110,62,0.25);
}
.filter-btn--reset {
    background: transparent;
    color: var(--vert-fvt);
    border: 2px solid var(--vert-fvt);
}
.filter-btn--reset:hover {
    background: var(--vert-fvt);
    color: #fff;
}
.projets-filters__count {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    color: #5a6a5f;
    margin-top: 16px;
    padding-top: 16px;
    border-top: 1px solid #e7f0ea;
}
.projets-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.projet-card {
    background: #fff;
    border: 1px solid #e7f0ea;
    border-radius: 20px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}
.projet-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.projet-card__image {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #dce8e0;
}
.projet-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
}
.projet-card:hover .projet-card__image img { transform: scale(1.05); }
.projet-card__status {
    position: absolute;
    top: 14px;
    right: 14px;
    padding: 4px 14px;
    border-radius: 20px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    backdrop-filter: blur(4px);
}
.statut--encours { background: rgba(10,110,62,0.85); color: #fff; }
.statut--termine { background: rgba(210,16,52,0.85); color: #fff; }
.statut--bientot { background: rgba(255,206,0,0.85); color: #063d24; }
.projet-card__link-overlay { position: absolute; inset: 0; z-index: 1; }
.projet-card__content { padding: 20px 22px 26px; }
.projet-card__location {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #0a6e3e;
    margin-bottom: 6px;
}
.projet-card__location i { font-size: 14px; color: #ffce00; }
.projet-card__cat {
    display: inline-block;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 11px;
    font-weight: 600;
    color: var(--vert-fvt);
    background: rgba(10,110,62,0.08);
    padding: 2px 12px;
    border-radius: 20px;
    margin-bottom: 8px;
}
.projet-card__title {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 700;
    margin: 0 0 8px;
}
.projet-card__title a {
    color: var(--vert-fvt-fonce);
    text-decoration: none;
}
.projet-card__title a:hover { color: var(--vert-fvt); }
.projet-card__excerpt {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.92rem;
    line-height: 1.6;
    color: #5a6a5f;
    margin: 0 0 16px;
}
.projet-card__btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--vert-fvt);
    text-decoration: none;
    transition: gap 0.3s, color 0.3s;
}
.projet-card__btn i {
    font-size: 0.85rem;
    transition: transform 0.3s;
}
.projet-card__btn:hover {
    color: var(--rouge-fvt);
    gap: 12px;
}
.projet-card__btn:hover i { transform: translateX(4px); }
.projets-pagination {
    margin: 40px 0 20px;
    text-align: center;
}
.projets-pagination .page-numbers {
    display: inline-block;
    padding: 8px 16px;
    margin: 0 4px;
    border-radius: 8px;
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 600;
    font-size: 0.95rem;
    color: var(--vert-fvt);
    background: transparent;
    text-decoration: none;
    transition: all 0.3s;
}
.projets-pagination .page-numbers.current {
    background: var(--vert-fvt);
    color: #fff;
}
.projets-pagination .page-numbers:hover:not(.current) { background: var(--gris-fond); }
.projets-empty {
    text-align: center;
    padding: 60px 20px;
}
.projets-empty i {
    font-size: 48px;
    color: #dce8e0;
    display: block;
    margin-bottom: 16px;
}
.projets-empty h3 {
    font-family: 'Playfair Display', serif;
    color: var(--vert-fvt-fonce);
    font-size: 1.8rem;
    margin: 0 0 10px;
}
.projets-empty p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5a6a5f;
    font-size: 1rem;
}
.projets-cta {
    background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
    padding: 76px 0;
    text-align: center;
    margin-top: 60px;
    position: relative;
    overflow: hidden;
}
.projets-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
    opacity: 0.06;
}
.projets-cta h2 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 800;
    color: #fff;
    font-size: 2.2rem;
    margin: 0 0 12px;
    position: relative;
    z-index: 1;
}
.cta-divider {
    width: 60px;
    height: 3px;
    background: var(--jaune-fvt);
    margin: 10px auto 22px;
    position: relative;
    z-index: 1;
}
.projets-cta p {
    font-family: 'Kumbh Sans', sans-serif;
    color: rgba(255,255,255,0.85);
    font-size: 1.15rem;
    margin-bottom: 32px;
    position: relative;
    z-index: 1;
}
.cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: var(--jaune-fvt);
    color: var(--vert-fvt-fonce);
    padding: 16px 44px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    position: relative;
    z-index: 1;
}
.cta-btn:hover {
    background: #ffffff;
    color: var(--vert-fvt-fonce);
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.25);
}
.cta-btn i {
    transition: transform 0.3s;
}
.cta-btn:hover i { transform: translateX(4px); }

@media (max-width: 992px) {
    .projets-grid { grid-template-columns: repeat(2, 1fr); }
    .projets-filters__row { flex-direction: column; align-items: stretch; }
    .projets-filters__group { flex: 1 1 auto; min-width: 0; }
}
@media (max-width: 768px) {
    .projets-header h1 { font-size: 2.4rem; }
    .projets-cta h2 { font-size: 1.8rem; }
}
@media (max-width: 576px) {
    .projets-header h1 { font-size: 2rem; }
    .projets-header__sub { font-size: 1rem; }
    .projets-grid { grid-template-columns: 1fr; }
}
</style>