<?php
/**
 * Template part : Page "Grands projets climatiques" – avec filtrage par catégorie de financement
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Catégories de financement avec leurs tranches
$categories_financement = array(
    'micro' => array(
        'label' => 'Micro-projet',
        'tranche' => '10 000 000 - 20 000 000 FCFA',
        'min' => 10000000,
        'max' => 20000000,
        'color' => '#4CAF50'
    ),
    'petit' => array(
        'label' => 'Petit projet',
        'tranche' => '20 000 001 - 50 000 000 FCFA',
        'min' => 20000001,
        'max' => 50000000,
        'color' => '#2196F3'
    ),
    'moyen' => array(
        'label' => 'Projet moyen',
        'tranche' => '50 000 001 - 100 000 000 FCFA',
        'min' => 50000001,
        'max' => 100000000,
        'color' => '#FF9800'
    ),
    'grand' => array(
        'label' => 'Grand projet / stratégique',
        'tranche' => '> 100 000 000 FCFA',
        'min' => 100000001,
        'max' => null,
        'color' => '#D21034'
    ),
);

// Données des projets
$grands_projets = array(
    array(
        'id'          => 1,
        'titre'       => 'Agriculture résiliente dans les Savanes',
        'localisation'=> 'Région des Savanes',
        'statut'      => 'en_cours',
        'categorie'   => 'grand',
        'image'       => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=800&h=500&fit=crop',
        'description' => "Projet d'envergure visant à renforcer la résilience de 5 000 agriculteurs face aux chocs climatiques. Il combine l'introduction de variétés résistantes, l'irrigation durable et la formation aux pratiques agroécologiques.",
        'impact'      => array(
            '5000'       => 'Agriculteurs formés',
            '2000'       => 'Hectares réhabilités',
            '30%'        => 'Augmentation des rendements',
            '15'         => 'Villages bénéficiaires',
        ),
        'partenaires' => 'PNUD, FAO, Ministère de l\'Agriculture',
        'budget_fcfa' => 5000000000,
        'periode'     => '2024 - 2027',
        'beneficiaires' => 5000,
    ),
    array(
        'id'          => 2,
        'titre'       => 'Énergie solaire pour les communautés rurales',
        'localisation'=> 'Région Maritime',
        'statut'      => 'termine',
        'categorie'   => 'grand',
        'image'       => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=800&h=500&fit=crop',
        'description' => "Installation de mini-réseaux solaires dans 30 villages de la région Maritime, permettant l'accès à l'électricité propre pour 15 000 ménages et le développement d'activités économiques.",
        'impact'      => array(
            '15000'      => 'Ménages électrifiés',
            '30'         => 'Villages équipés',
            '80%'        => 'Réduction des émissions',
            '200'        => 'Emplois créés',
        ),
        'partenaires' => 'GIZ, Banque Mondiale, Agence Togolaise d\'Électrification',
        'budget_fcfa' => 12000000000,
        'periode'     => '2023 - 2025',
        'beneficiaires' => 15000,
    ),
    array(
        'id'          => 3,
        'titre'       => 'Gestion durable des forêts des Plateaux',
        'localisation'=> 'Région des Plateaux',
        'statut'      => 'en_cours',
        'categorie'   => 'grand',
        'image'       => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=800&h=500&fit=crop',
        'description' => 'Projet de restauration et de gestion participative de 10 000 hectares de forêts communautaires. Il associe reboisement, agroforesterie et création de filières durables.',
        'impact'      => array(
            '10000'      => 'Hectares restaurés',
            '3000'       => 'Ménages bénéficiaires',
            '40%'        => 'Réduction de la déforestation',
            '500'        => 'Emplois verts',
        ),
        'partenaires' => 'UICN, AFD, Ministère de l\'Environnement',
        'budget_fcfa' => 8000000000,
        'periode'     => '2024 - 2028',
        'beneficiaires' => 8000,
    ),
    array(
        'id'          => 4,
        'titre'       => 'Adaptation des zones côtières',
        'localisation'=> 'Littoral Togolais',
        'statut'      => 'en_cours',
        'categorie'   => 'grand',
        'image'       => 'https://images.unsplash.com/photo-1544552861-1f2c946a75f4?w=800&h=500&fit=crop',
        'description' => "Protection des 50 km de côtes togolaises contre l'érosion et les inondations par des solutions fondées sur la nature : reboisement de mangrove, épis, et restauration des dunes.",
        'impact'      => array(
            '50'         => 'Km de côtes protégés',
            '20000'      => 'Personnes protégées',
            '70%'        => 'Réduction des inondations',
            '100'        => 'Hectares de mangrove restaurés',
        ),
        'partenaires' => 'PNUE, Banque Africaine de Développement, Ministère des Transports',
        'budget_fcfa' => 15000000000,
        'periode'     => '2025 - 2029',
        'beneficiaires' => 20000,
    ),
    array(
        'id'          => 5,
        'titre'       => 'Économie circulaire et déchets',
        'localisation'=> 'Grand Lomé',
        'statut'      => 'bientot',
        'categorie'   => 'grand',
        'image'       => 'https://images.unsplash.com/photo-1532996129724-e7b8f0b99d88?w=800&h=500&fit=crop',
        'description' => "Projet pilote d'économie circulaire dans le Grand Lomé, visant à valoriser 60% des déchets urbains par le recyclage, le compostage et la production d'énergie.",
        'impact'      => array(
            '60%'        => 'Taux de valorisation',
            '1000'       => 'Emplois créés',
            '50'         => 'Tonnes de CO2 évitées/an',
            '200'        => 'Entreprises accompagnées',
        ),
        'partenaires' => 'UE, AFD, Mairie de Lomé',
        'budget_fcfa' => 10000000000,
        'periode'     => '2026 - 2029',
        'beneficiaires' => 10000,
    ),
    // Micro-projets
    array(
        'id'          => 6,
        'titre'       => 'Puits à eau communautaires',
        'localisation'=> 'Région Centrale',
        'statut'      => 'termine',
        'categorie'   => 'micro',
        'image'       => 'https://images.unsplash.com/photo-1543216472-6f82e4595d6f?w=800&h=500&fit=crop',
        'description' => 'Installation de 20 puits à eau potable dans les villages isolés de la Région Centrale, améliorant l\'accès à l\'eau pour 5 000 personnes et réduisant les maladies hydriques.',
        'impact'      => array(
            '20'         => 'Puits installés',
            '5000'       => 'Personnes bénéficiaires',
            '70%'        => 'Réduction des maladies',
            '10'         => 'Villages touchés',
        ),
        'partenaires' => 'UNICEF, Croix-Rouge, Ministère de l\'Hydraulique',
        'budget_fcfa' => 15000000,
        'periode'     => '2024 - 2025',
        'beneficiaires' => 5000,
    ),
    array(
        'id'          => 7,
        'titre'       => 'Fermes solaires villageoises',
        'localisation'=> 'Région des Savanes',
        'statut'      => 'en_cours',
        'categorie'   => 'petit',
        'image'       => 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?w=800&h=500&fit=crop',
        'description' => 'Déploiement de 15 mini-fermes solaires pour alimenter les marchés ruraux et les centres de santé de la région des Savanes.',
        'impact'      => array(
            '15'         => 'Fermes solaires',
            '3000'       => 'Personnes alimentées',
            '120'        => 'PME soutenues',
            '45'         => 'Emplois créés',
        ),
        'partenaires' => 'GIZ, PNUD, Agence Togolaise d\'Électrification',
        'budget_fcfa' => 35000000,
        'periode'     => '2025 - 2026',
        'beneficiaires' => 3000,
    ),
    array(
        'id'          => 8,
        'titre'       => 'Formation en agroécologie',
        'localisation'=> 'Région des Plateaux',
        'statut'      => 'en_cours',
        'categorie'   => 'micro',
        'image'       => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=800&h=500&fit=crop',
        'description' => 'Programme de formation de 200 jeunes agriculteurs aux techniques d\'agroécologie durable et de gestion des sols.',
        'impact'      => array(
            '200'        => 'Jeunes formés',
            '50'         => 'Femmes leaders',
            '85%'        => 'Taux d\'adoption',
            '30'         => 'Villages couverts',
        ),
        'partenaires' => 'FAO, Ministère de l\'Agriculture, ONG locales',
        'budget_fcfa' => 18000000,
        'periode'     => '2025 - 2026',
        'beneficiaires' => 200,
    ),
    array(
        'id'          => 9,
        'titre'       => 'Micro-crédits verts',
        'localisation'=> 'Grand Lomé',
        'statut'      => 'bientot',
        'categorie'   => 'petit',
        'image'       => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&h=500&fit=crop',
        'description' => 'Fonds de micro-crédit pour soutenir 100 petites entreprises dans le développement de solutions écologiques et durables.',
        'impact'      => array(
            '100'        => 'Entreprises financées',
            '400'        => 'Emplois créés',
            '200'        => 'Femmes bénéficiaires',
            '75%'        => 'Taux de remboursement',
        ),
        'partenaires' => 'BOAD, BIDC, Ministère de l\'Économie',
        'budget_fcfa' => 45000000,
        'periode'     => '2026 - 2027',
        'beneficiaires' => 400,
    ),
    array(
        'id'          => 10,
        'titre'       => 'Centre d\'innovation climatique',
        'localisation'=> 'Région Maritime',
        'statut'      => 'en_cours',
        'categorie'   => 'moyen',
        'image'       => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800&h=500&fit=crop',
        'description' => 'Construction et équipement d\'un centre d\'innovation dédié aux solutions climatiques et à la recherche appliquée.',
        'impact'      => array(
            '500'        => 'Chercheurs formés',
            '25'         => 'Projets incubés',
            '150'        => 'Emplois qualifiés',
            '10'         => 'Startups soutenues',
        ),
        'partenaires' => 'BAD, GIZ, Université de Lomé',
        'budget_fcfa' => 75000000,
        'periode'     => '2025 - 2028',
        'beneficiaires' => 150,
    ),
    array(
        'id'          => 11,
        'titre'       => 'Systèmes d\'irrigation durable',
        'localisation'=> 'Région Centrale',
        'statut'      => 'termine',
        'categorie'   => 'moyen',
        'image'       => 'https://images.unsplash.com/photo-1531092825789-d6c86af9fa52?w=800&h=500&fit=crop',
        'description' => 'Installation de systèmes d\'irrigation goutte-à-goutte alimentés par l\'énergie solaire pour 500 agriculteurs.',
        'impact'      => array(
            '500'        => 'Agriculteurs équipés',
            '300'        => 'Hectares irrigués',
            '60%'        => 'Économie d\'eau',
            '200'        => 'Emplois créés',
        ),
        'partenaires' => 'AFD, PNUD, Ministère de l\'Agriculture',
        'budget_fcfa' => 70000000,
        'periode'     => '2024 - 2026',
        'beneficiaires' => 200,
    ),
);

// Calcul des statistiques pour le tableau de bord
function calculer_statistiques($projets, $categories) {
    $stats = array(
        'total' => count($projets),
        'total_beneficiaires' => 0,
        'total_budget' => 0,
        'par_categorie' => array()
    );
    
    foreach ($categories as $slug => $cat) {
        $stats['par_categorie'][$slug] = array(
            'label' => $cat['label'],
            'count' => 0,
            'budget' => 0,
            'beneficiaires' => 0
        );
    }
    
    foreach ($projets as $projet) {
        $stats['total_beneficiaires'] += $projet['beneficiaires'];
        $stats['total_budget'] += $projet['budget_fcfa'];
        
        $cat_slug = $projet['categorie'];
        if (isset($stats['par_categorie'][$cat_slug])) {
            $stats['par_categorie'][$cat_slug]['count']++;
            $stats['par_categorie'][$cat_slug]['budget'] += $projet['budget_fcfa'];
            $stats['par_categorie'][$cat_slug]['beneficiaires'] += $projet['beneficiaires'];
        }
    }
    
    return $stats;
}

$stats = calculer_statistiques($grands_projets, $categories_financement);

// Fonction pour formater les montants en FCFA
function format_fcfa($montant) {
    return number_format($montant, 0, ',', ' ') . ' FCFA';
}

// Fonction pour raccourcir les grands nombres
function format_big_number($nombre) {
    if ($nombre >= 1000000000) {
        return number_format($nombre / 1000000000, 1) . ' Md';
    } elseif ($nombre >= 1000000) {
        return number_format($nombre / 1000000, 1) . ' M';
    } elseif ($nombre >= 1000) {
        return number_format($nombre / 1000, 1) . ' k';
    }
    return number_format($nombre, 0, ',', ' ');
}
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="grands-projets-header">
    <div class="container">
        <nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
            <ol>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li><a href="<?php echo esc_url( home_url( '/projets' ) ); ?>">Projets</a></li>
                <li class="separator">›</li>
                <li class="current">Grands projets climatiques</li>
            </ol>
        </nav>
        <span class="grands-projets-header__badge"><i class="fas fa-globe-africa"></i> Fonds Vert Togo</span>
        <h1>Les projets Financés par le TGF</h1>
        <div class="title-underline"></div>
        <p class="grands-projets-header__sub">Découvrez les initiatives majeures soutenues par le Fonds Vert pour un Togo résilient et durable.</p>
    </div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="grands-projets-content">
    <div class="container">

        <!-- ===== TABLEAU DE BORD ===== -->
        <div class="dashboard-section">
            <!--<h3 class="dashboard-title"><i class="fas fa-chart-pie"></i> Tableau de bord des projets</h3> -->
            
            <!-- Carte récapitulative globale -->
            <div class="dashboard-summary">
                <div class="summary-card">
                    <div class="summary-card__icon"><i class="fas fa-project-diagram"></i></div>
                    <div class="summary-card__content">
                        <span class="summary-card__value"><?php echo $stats['total']; ?></span>
                        <span class="summary-card__label">Projets au total</span>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-card__icon"><i class="fas fa-coins"></i></div>
                    <div class="summary-card__content">
                        <span class="summary-card__value"><?php echo format_big_number($stats['total_budget']); ?></span>
                        <span class="summary-card__label">Budget total mobilisé</span>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-card__icon"><i class="fas fa-users"></i></div>
                    <div class="summary-card__content">
                        <span class="summary-card__value"><?php echo format_big_number($stats['total_beneficiaires']); ?></span>
                        <span class="summary-card__label">Bénéficiaires touchés</span>
                    </div>
                </div>
            </div>

            <!-- Détail par catégorie -->
            <div class="dashboard-categories">
                <?php 
                $categorie_order = array('micro', 'petit', 'moyen', 'grand');
                foreach ($categorie_order as $slug) :
                    if (!isset($stats['par_categorie'][$slug])) continue;
                    $cat = $stats['par_categorie'][$slug];
                    $cat_info = $categories_financement[$slug];
                    $pourcentage = ($stats['total'] > 0) ? round(($cat['count'] / $stats['total']) * 100) : 0;
                ?>
                <div class="category-card" style="border-left-color: <?php echo esc_attr($cat_info['color']); ?>;">
                    <div class="category-card__header">
                        <span class="category-card__badge" style="background: <?php echo esc_attr($cat_info['color']); ?>;">
                            <?php echo esc_html($cat_info['label']); ?>
                        </span>
                        <span class="category-card__tranche"><?php echo esc_html($cat_info['tranche']); ?></span>
                    </div>
                    <div class="category-card__stats">
                        <div class="category-stat">
                            <span class="category-stat__value"><?php echo $cat['count']; ?></span>
                            <span class="category-stat__label">Projets (<?php echo $pourcentage; ?>%)</span>
                        </div>
                        <div class="category-stat">
                            <span class="category-stat__value"><?php echo format_big_number($cat['budget']); ?></span>
                            <span class="category-stat__label">Budget mobilisé</span>
                        </div>
                        <div class="category-stat">
                            <span class="category-stat__value"><?php echo format_big_number($cat['beneficiaires']); ?></span>
                            <span class="category-stat__label">Bénéficiaires</span>
                        </div>
                    </div>
                    <!-- Barre de progression -->
                    <div class="category-progress">
                        <div class="category-progress__bar" style="width: <?php echo $pourcentage; ?>%; background: <?php echo esc_attr($cat_info['color']); ?>;"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ===== FILTRE PAR CATÉGORIE ===== -->
        <div class="filter-section">
            <h4 class="filter-section__title"><i class="fas fa-filter"></i> Filtrer par catégorie</h4>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Tous les projets</button>
                <?php foreach ( $categories_financement as $slug => $cat ) : ?>
                    <button class="filter-btn" data-filter="<?php echo esc_attr( $slug ); ?>" style="border-color: <?php echo esc_attr($cat['color']); ?>;">
                        <span class="filter-dot" style="background: <?php echo esc_attr($cat['color']); ?>;"></span>
                        <?php echo esc_html( $cat['label'] ); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ===== COMPTEUR DE RÉSULTATS ===== -->
        <div class="results-counter" id="results-counter">
            <span id="result-count"><?php echo $stats['total']; ?></span> projet(s) trouvé(s)
        </div>

        <!-- ===== GRILLE DES PROJETS ===== -->
        <div class="grands-projets-grid" id="projects-grid">
            <?php foreach ( $grands_projets as $projet ) :
                $statut_label = '';
                $statut_class = '';
                switch ( $projet['statut'] ) {
                    case 'en_cours':
                        $statut_label = 'En cours';
                        $statut_class = 'statut--encours';
                        break;
                    case 'termine':
                        $statut_label = 'Terminé';
                        $statut_class = 'statut--termine';
                        break;
                    case 'bientot':
                        $statut_label = 'À venir';
                        $statut_class = 'statut--bientot';
                        break;
                }
                
                // Récupérer les infos de la catégorie
                $cat_info = $categories_financement[ $projet['categorie'] ];
                $categorie_label = $cat_info['label'];
                $categorie_color = $cat_info['color'];
                $categorie_tranche = $cat_info['tranche'];
            ?>
                <article class="grand-projet-card" data-categorie="<?php echo esc_attr( $projet['categorie'] ); ?>">
                    <div class="grand-projet-card__image">
                        <img src="<?php echo esc_url( $projet['image'] ); ?>" alt="<?php echo esc_attr( $projet['titre'] ); ?>" loading="lazy">
                        <span class="grand-projet-card__statut <?php echo esc_attr( $statut_class ); ?>"><?php echo esc_html( $statut_label ); ?></span>
                        <span class="grand-projet-card__categorie-badge" style="background: <?php echo esc_attr($categorie_color); ?>;">
                            <?php echo esc_html( $categorie_label ); ?>
                        </span>
                        <span class="grand-projet-card__budget-badge">
                            <i class="fas fa-coins"></i> <?php echo esc_html( $categorie_tranche ); ?>
                        </span>
                    </div>
                    <div class="grand-projet-card__content">
                        <div class="grand-projet-card__meta">
                            <span class="grand-projet-card__localisation"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $projet['localisation'] ); ?></span>
                            <span class="grand-projet-card__periode"><i class="fas fa-calendar-alt"></i> <?php echo esc_html( $projet['periode'] ); ?></span>
                        </div>
                        <h3 class="grand-projet-card__titre"><?php echo esc_html( $projet['titre'] ); ?></h3>
                        <p class="grand-projet-card__desc"><?php echo esc_html( $projet['description'] ); ?></p>
                        
                        <!-- Indicateurs d'impact -->
                        <div class="grand-projet-card__impact">
                            <?php foreach ( $projet['impact'] as $valeur => $label ) : ?>
                                <div class="impact-item">
                                    <span class="impact-item__valeur"><?php echo esc_html( $valeur ); ?></span>
                                    <span class="impact-item__label"><?php echo esc_html( $label ); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="grand-projet-card__infos">
                            <div class="grand-projet-card__partenaires">
                                <i class="fas fa-handshake"></i>
                                <span><?php echo esc_html( $projet['partenaires'] ); ?></span>
                            </div>
                            <div class="grand-projet-card__budget">
                                <i class="fas fa-money-bill-wave"></i>
                                <span><?php echo format_fcfa( $projet['budget_fcfa'] ); ?></span>
                            </div>
                            <div class="grand-projet-card__beneficiaires">
                                <i class="fas fa-user-friends"></i>
                                <span><?php echo number_format($projet['beneficiaires'], 0, ',', ' '); ?> bénéficiaires</span>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- ===== PAS DE RÉSULTATS ===== -->
        <div class="no-results" id="no-results" style="display: none;">
            <i class="fas fa-search"></i>
            <h3>Aucun projet trouvé</h3>
            <p>Aucun projet ne correspond à cette catégorie. Essayez de sélectionner une autre catégorie.</p>
        </div>

    </div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="grands-projets-cta">
    <div class="container">
        <h2>Vous avez un projet d'envergure ?</h2>
        <div class="cta-divider"></div>
        <p>Le Fonds Vert accompagne les initiatives à fort impact. Soumettez votre projet dès maintenant.</p>
        <a href="<?php echo esc_url( home_url( '/soumettre-un-projet' ) ); ?>" class="cta-btn">
            Soumettre un projet <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- ============================================================
     STYLES CSS (intégrés)
     ============================================================ -->
<style>
/* ============================================================
   PAGE GRANDS PROJETS – CHARTE FONDS VERT TOGO
   ============================================================ */
:root {
    --vert-fvt:        #0a6e3e;
    --vert-fvt-fonce:  #063d24;
    --jaune-fvt:       #FFCE00;
    --rouge-fvt:       #D21034;
    --gris-fond:       #f6faf7;
    --blanc:           #ffffff;
}

/* ===== EN‑TÊTE ===== */
.grands-projets-header {
    background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 50px 0 55px;
    border-bottom: 1px solid #e0ebe6;
    text-align: center;
    position: relative;
}
.grands-projets-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.breadcrumb-wrapper {
    margin-bottom: 20px;
}
.breadcrumb-wrapper ol {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    list-style: none;
    padding: 0;
    margin: 0;
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
.grands-projets-header__badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 20px;
    border-radius: 30px;
    background: rgba(10, 110, 62, 0.08);
    color: var(--vert-fvt-fonce);
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 18px;
}
.grands-projets-header__badge i {
    color: var(--vert-fvt);
    font-size: 14px;
}
.grands-projets-header h1 {
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
.grands-projets-header__sub {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.1rem;
    color: #5a6a5f;
    max-width: 600px;
    margin: 18px auto 0;
}

/* ===== TABLEAU DE BORD ===== */
.dashboard-section {
    margin-bottom: 45px;
    background: #ffffff;
    border: 1px solid #e7f0ea;
    border-radius: 24px;
    padding: 30px 34px 34px;
    box-shadow: 0 2px 12px rgba(6,61,36,0.04);
}
.dashboard-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 0 0 24px;
}
.dashboard-title i {
    color: var(--vert-fvt);
    margin-right: 10px;
}
.dashboard-summary {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}
.summary-card {
    display: flex;
    align-items: center;
    gap: 18px;
    background: var(--gris-fond);
    border-radius: 16px;
    padding: 20px 24px;
    transition: transform 0.3s;
}
.summary-card:hover {
    transform: translateY(-2px);
}
.summary-card__icon {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: rgba(10, 110, 62, 0.10);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: var(--vert-fvt);
    flex-shrink: 0;
}
.summary-card__content {
    display: flex;
    flex-direction: column;
}
.summary-card__value {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    font-weight: 800;
    color: var(--vert-fvt-fonce);
    line-height: 1.2;
}
.summary-card__label {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    color: #5a6a5f;
}

/* Catégories du dashboard */
.dashboard-categories {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}
.category-card {
    background: var(--gris-fond);
    border-radius: 16px;
    padding: 18px 20px 16px;
    border-left: 4px solid var(--vert-fvt);
    transition: transform 0.3s, box-shadow 0.3s;
}
.category-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(6,61,36,0.08);
}
.category-card__header {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px 12px;
    margin-bottom: 12px;
}
.category-card__badge {
    padding: 3px 14px;
    border-radius: 20px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.75rem;
    font-weight: 700;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
.category-card__tranche {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.75rem;
    color: #5a6a5f;
}
.category-card__stats {
    display: flex;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 10px;
}
.category-stat {
    text-align: center;
    flex: 1;
}
.category-stat__value {
    display: block;
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
}
.category-stat__label {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.65rem;
    color: #5a6a5f;
    text-transform: uppercase;
    letter-spacing: 0.2px;
}
.category-progress {
    height: 4px;
    background: #e7f0ea;
    border-radius: 4px;
    overflow: hidden;
}
.category-progress__bar {
    height: 100%;
    border-radius: 4px;
    transition: width 0.6s ease;
}

/* ===== FILTRE ===== */
.filter-section {
    background: var(--gris-fond);
    border: 1px solid #e7f0ea;
    border-radius: 20px;
    padding: 20px 28px;
    margin-bottom: 25px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 16px 30px;
}
.filter-section__title {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}
.filter-section__title i {
    color: var(--vert-fvt);
}
.filter-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.filter-btn {
    padding: 8px 20px;
    border: 2px solid #dce8e0;
    border-radius: 30px;
    background: #fff;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    font-weight: 600;
    color: #4d6a59;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}
.filter-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
}
.filter-btn:hover {
    border-color: var(--vert-fvt);
    color: var(--vert-fvt);
}
.filter-btn.active {
    background: var(--vert-fvt);
    border-color: var(--vert-fvt);
    color: #fff;
}
.filter-btn.active .filter-dot {
    background: #fff !important;
}
.filter-btn.active:hover {
    background: var(--vert-fvt-fonce);
    border-color: var(--vert-fvt-fonce);
}

/* ===== COMPTEUR ===== */
.results-counter {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    color: #5a6a5f;
    margin-bottom: 25px;
    padding: 8px 0;
    border-bottom: 1px solid #e7f0ea;
}
.results-counter #result-count {
    font-weight: 700;
    color: var(--vert-fvt);
}

/* ===== GRILLE ===== */
.grands-projets-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
}

/* ===== PAS DE RÉSULTATS ===== */
.no-results {
    text-align: center;
    padding: 60px 20px;
    display: none;
}
.no-results i {
    font-size: 3rem;
    color: #b0c8b8;
    margin-bottom: 16px;
}
.no-results h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    color: var(--vert-fvt-fonce);
    margin: 0 0 10px;
}
.no-results p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5a6a5f;
    margin: 0;
}

/* ===== CARTE PROJET ===== */
.grand-projet-card {
    background: #fff;
    border: 1px solid #e7f0ea;
    border-radius: 24px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s, opacity 0.4s ease;
}
.grand-projet-card.hidden {
    display: none;
}
.grand-projet-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 32px rgba(6,61,36,0.10);
}
.grand-projet-card__image {
    position: relative;
    height: 320px;
    overflow: hidden;
    background: #dce8e0;
}
.grand-projet-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s;
}
.grand-projet-card:hover .grand-projet-card__image img {
    transform: scale(1.05);
}
.grand-projet-card__statut {
    position: absolute;
    top: 16px;
    right: 16px;
    padding: 6px 18px;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    backdrop-filter: blur(4px);
    z-index: 2;
}
.statut--encours {
    background: rgba(10,110,62,0.85);
    color: #fff;
}
.statut--termine {
    background: rgba(210,16,52,0.85);
    color: #fff;
}
.statut--bientot {
    background: rgba(255,206,0,0.85);
    color: #063d24;
}

/* Badges sur l'image */
.grand-projet-card__categorie-badge {
    position: absolute;
    bottom: 16px;
    left: 16px;
    padding: 5px 16px;
    border-radius: 30px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #fff;
    backdrop-filter: blur(4px);
    z-index: 2;
}
.grand-projet-card__budget-badge {
    position: absolute;
    bottom: 16px;
    right: 16px;
    padding: 5px 14px;
    border-radius: 30px;
    background: rgba(0,0,0,0.7);
    color: #fff;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 10px;
    font-weight: 600;
    backdrop-filter: blur(4px);
    z-index: 2;
}
.grand-projet-card__budget-badge i {
    margin-right: 4px;
}

.grand-projet-card__content {
    padding: 30px 34px 34px;
}
.grand-projet-card__meta {
    display: flex;
    flex-wrap: wrap;
    gap: 16px 24px;
    margin-bottom: 10px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    color: #5a6a5f;
}
.grand-projet-card__meta i {
    color: var(--vert-fvt);
    margin-right: 6px;
}
.grand-projet-card__titre {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    margin: 0 0 12px;
}
.grand-projet-card__desc {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.05rem;
    line-height: 1.7;
    color: #2c3e34;
    margin: 0 0 20px;
}

/* Impact */
.grand-projet-card__impact {
    display: flex;
    flex-wrap: wrap;
    gap: 16px 24px;
    margin-bottom: 20px;
    padding: 16px 20px;
    background: var(--gris-fond);
    border-radius: 16px;
}
.impact-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    flex: 1 1 auto;
    min-width: 60px;
}
.impact-item__valeur {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--vert-fvt);
}
.impact-item__label {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.8rem;
    color: #5a6a5f;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.grand-projet-card__infos {
    display: flex;
    flex-wrap: wrap;
    gap: 16px 24px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    color: #4d6a59;
}
.grand-projet-card__infos i {
    color: var(--vert-fvt);
    margin-right: 6px;
}
.grand-projet-card__partenaires {
    flex: 1 1 auto;
}
.grand-projet-card__budget {
    flex-shrink: 0;
}
.grand-projet-card__beneficiaires {
    flex-shrink: 0;
}

/* ===== CTA ===== */
.grands-projets-cta {
    background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
    padding: 76px 0;
    text-align: center;
    margin-top: 60px;
    position: relative;
    overflow: hidden;
}
.grands-projets-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
    opacity: 0.06;
}
.grands-projets-cta h2 {
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
.grands-projets-cta p {
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
.cta-btn:hover i {
    transform: translateX(4px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 992px) {
    .dashboard-summary {
        grid-template-columns: repeat(3, 1fr);
    }
    .dashboard-categories {
        grid-template-columns: repeat(2, 1fr);
    }
    .grand-projet-card__image {
        height: 240px;
    }
    .filter-section {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
    }
    .filter-buttons {
        justify-content: center;
    }
}
@media (max-width: 768px) {
    .grands-projets-header h1 {
        font-size: 2.4rem;
    }
    .grands-projets-cta h2 {
        font-size: 1.8rem;
    }
    .grand-projet-card__content {
        padding: 24px 18px 26px;
    }
    .grand-projet-card__titre {
        font-size: 1.4rem;
    }
    .grand-projet-card__impact {
        gap: 12px;
        padding: 12px 16px;
    }
    .filter-buttons {
        gap: 8px;
    }
    .filter-btn {
        padding: 6px 16px;
        font-size: 0.8rem;
    }
    .dashboard-section {
        padding: 20px;
    }
    .dashboard-summary {
        grid-template-columns: 1fr 1fr;
    }
    .summary-card {
        padding: 14px 16px;
    }
}
@media (max-width: 576px) {
    .grands-projets-header h1 {
        font-size: 2rem;
    }
    .grands-projets-header__sub {
        font-size: 1rem;
    }
    .dashboard-summary {
        grid-template-columns: 1fr;
    }
    .dashboard-categories {
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }
    .category-card {
        padding: 14px 14px 12px;
    }
    .category-card__stats {
        flex-direction: column;
        gap: 4px;
    }
    .grand-projet-card__image {
        height: 180px;
    }
    .filter-section {
        padding: 16px 18px;
    }
    .filter-buttons {
        flex-wrap: wrap;
        justify-content: center;
    }
    .grand-projet-card__infos {
        flex-direction: column;
        gap: 8px;
    }
}
</style>

<!-- ============================================================
     JAVASCRIPT DE FILTRAGE
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.grand-projet-card');
    const resultsCounter = document.getElementById('result-count');
    const noResults = document.getElementById('no-results');

    filterButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Désactiver tous les boutons
            filterButtons.forEach(function(btn) {
                btn.classList.remove('active');
            });
            // Activer le bouton cliqué
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');
            let visibleCount = 0;

            projectCards.forEach(function(card) {
                const cardCategorie = card.getAttribute('data-categorie');
                
                if (filterValue === 'all' || cardCategorie === filterValue) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            // Mettre à jour le compteur
            resultsCounter.textContent = visibleCount;

            // Afficher/cacher le message "pas de résultats"
            if (visibleCount === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        });
    });
});
</script>