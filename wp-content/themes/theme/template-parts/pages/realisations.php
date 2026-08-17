<?php
/**
 * Template part : Page "Nos réalisations" – Version avec 4 guichets
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// ============================================================
// 1. DONNÉES DES RÉALISATIONS PAR GUICHET
// ============================================================
$guichets = array(
	'agriculture' => array(
		'nom'        => 'Agriculture durable',
		'icone'      => 'fa-seedling',
		'couleur'    => '#0a6e3e',
		'projets'    => array(
			array(
				'titre'       => 'Agriculture résiliente dans les Savanes',
				'image'       => 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?w=600&h=400&fit=crop',
				'description' => 'Formation de 5 000 agriculteurs aux techniques agroécologiques et installation de systèmes d\'irrigation durable.',
				'impact'      => array(
					'5000'  => 'Agriculteurs formés',
					'2000'  => 'Hectares réhabilités',
					'30%'   => 'Augmentation des rendements',
				),
				'statut'      => 'termine',
				'beneficiaires' => 5000,
			),
			array(
				'titre'       => 'Agroforesterie dans la Région Centrale',
				'image'       => 'https://images.unsplash.com/photo-1523348837708-15c5f3c9e7b7?w=600&h=400&fit=crop',
				'description' => 'Association de cultures vivrières et d\'arbres fruitiers pour restaurer la fertilité des sols.',
				'impact'      => array(
					'1200'  => 'Agriculteurs formés',
					'800'   => 'Hectares traités',
					'40%'   => 'Augmentation des rendements',
				),
				'statut'      => 'termine',
				'beneficiaires' => 1200,
			),
			array(
				'titre'       => 'Filière mangue durable',
				'image'       => 'https://images.unsplash.com/photo-1553279768-865429fa0078?w=600&h=400&fit=crop',
				'description' => 'Appui à la production et à la transformation de mangues bio pour l\'exportation.',
				'impact'      => array(
					'800'   => 'Producteurs accompagnés',
					'300'   => 'Hectares de vergers',
					'3'     => 'Unités de transformation',
				),
				'statut'      => 'encours',
				'beneficiaires' => 800,
			),
		),
	),
	'foret' => array(
		'nom'        => 'Forêt et biodiversité',
		'icone'      => 'fa-tree',
		'couleur'    => '#1a7a3e',
		'projets'    => array(
			array(
				'titre'       => 'Restauration des forêts des Plateaux',
				'image'       => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=600&h=400&fit=crop',
				'description' => 'Reboisement participatif de 10 000 hectares de forêts communautaires et création de 500 emplois verts.',
				'impact'      => array(
					'10000' => 'Hectares restaurés',
					'3000'  => 'Ménages bénéficiaires',
					'500'   => 'Emplois créés',
				),
				'statut'      => 'termine',
				'beneficiaires' => 3000,
			),
			array(
				'titre'       => 'Protection des aires protégées de la Kara',
				'image'       => 'https://images.unsplash.com/photo-1544552861-1f2c946a75f4?w=600&h=400&fit=crop',
				'description' => 'Renforcement des dispositifs de surveillance et restauration des habitats naturels.',
				'impact'      => array(
					'50000' => 'Hectares protégés',
					'50'    => 'Agents formés',
					'20'    => 'Espèces suivies',
				),
				'statut'      => 'termine',
				'beneficiaires' => 2000,
			),
			array(
				'titre'       => 'Corridors écologiques du Sud-Togo',
				'image'       => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600&h=400&fit=crop',
				'description' => 'Création de couloirs de migration pour la faune entre les parcs nationaux.',
				'impact'      => array(
					'3000'  => 'Hectares connectés',
					'200'   => 'Emplois créés',
					'15'    => 'Espèces protégées',
				),
				'statut'      => 'encours',
				'beneficiaires' => 1500,
			),
		),
	),
	'eau' => array(
		'nom'        => 'Eau et assainissement',
		'icone'      => 'fa-water',
		'couleur'    => '#0077be',
		'projets'    => array(
			array(
				'titre'       => 'Adduction d\'eau potable dans les Savanes',
				'image'       => 'https://images.unsplash.com/photo-1544902376-3f7a86c2b4b3?w=600&h=400&fit=crop',
				'description' => 'Construction de 15 forages équipés de pompes solaires pour 20 000 personnes.',
				'impact'      => array(
					'20000' => 'Personnes desservies',
					'15'    => 'Forages solaires',
					'5'     => 'Villages équipés',
				),
				'statut'      => 'termine',
				'beneficiaires' => 20000,
			),
			array(
				'titre'       => 'Assainissement des zones périurbaines de Lomé',
				'image'       => 'https://images.unsplash.com/photo-1588969687421-9c1c6b0b9e3f?w=600&h=400&fit=crop',
				'description' => 'Construction de latrines publiques et sensibilisation à l\'hygiène.',
				'impact'      => array(
					'25000' => 'Personnes sensibilisées',
					'200'   => 'Latrines construites',
					'50'    => 'Emplois locaux',
				),
				'statut'      => 'termine',
				'beneficiaires' => 25000,
			),
			array(
				'titre'       => 'Micro-irrigation dans la Région Maritime',
				'image'       => 'https://images.unsplash.com/photo-1571599851153-3eb04d8c48a8?w=600&h=400&fit=crop',
				'description' => 'Installation de systèmes goutte-à-goutte pour les maraîchers en saison sèche.',
				'impact'      => array(
					'600'   => 'Hectares irrigués',
					'3000'  => 'Maraîchers bénéficiaires',
					'50%'   => 'Réduction de la pénurie d\'eau',
				),
				'statut'      => 'encours',
				'beneficiaires' => 3000,
			),
		),
	),
	'energie' => array(
		'nom'        => 'Énergie et infrastructure durable',
		'icone'      => 'fa-solar-panel',
		'couleur'    => '#f39c12',
		'projets'    => array(
			array(
				'titre'       => 'Électrification solaire des villages',
				'image'       => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=600&h=400&fit=crop',
				'description' => 'Installation de mini-réseaux solaires dans 30 villages de la région Maritime, bénéficiant à 15 000 ménages.',
				'impact'      => array(
					'15000' => 'Ménages électrifiés',
					'30'    => 'Villages équipés',
					'200'   => 'Emplois créés',
				),
				'statut'      => 'termine',
				'beneficiaires' => 15000,
			),
			array(
				'titre'       => 'Plateformes multifonctionnelles dans les Plateaux',
				'image'       => 'https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=600&h=400&fit=crop',
				'description' => 'Installation de mini-centrales solaires pour la transformation des produits agricoles.',
				'impact'      => array(
					'100'   => 'Plateformes installées',
					'5000'  => 'Personnes bénéficiaires',
					'300'   => 'Emplois créés',
				),
				'statut'      => 'termine',
				'beneficiaires' => 5000,
			),
			array(
				'titre'       => 'Infrastructures vertes en milieu urbain',
				'image'       => 'https://images.unsplash.com/photo-1581092335879-86f7bdd34b3b?w=600&h=400&fit=crop',
				'description' => 'Construction de bâtiments publics à faible empreinte énergétique.',
				'impact'      => array(
					'5'     => 'Bâtiments publics équipés',
					'20000' => 'Usagers bénéficiaires',
					'40%'   => 'Économie d\'énergie',
				),
				'statut'      => 'encours',
				'beneficiaires' => 20000,
			),
		),
	),
);

// ============================================================
// 2. TÉMOIGNAGES (inchangés)
// ============================================================
$temoignages = array(
	array(
		'nom'    => 'Komi AGBOKLI',
		'fonction' => 'Agriculteur, Région des Savanes',
		'photo'  => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face',
		'texte'  => 'Grâce au Fonds Vert, j\'ai pu former ma communauté aux techniques agricoles résilientes. Nos rendements ont augmenté de 30% et nous avons accès à l\'eau toute l\'année.',
	),
	array(
		'nom'    => 'Afi DOSSOU',
		'fonction' => 'Bénéficiaire énergie solaire, Région Maritime',
		'photo'  => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&h=100&fit=crop&crop=face',
		'texte'  => 'L\'installation de panneaux solaires a changé notre vie. Mes enfants peuvent étudier le soir et nous avons pu lancer une petite activité de transformation de produits locaux.',
	),
);

// ============================================================
// 3. CALCUL DES STATISTIQUES PAR GUICHET
// ============================================================
$stats_guichets = array();
$total_projets = 0;
$total_beneficiaires = 0;
$total_acheves = 0;

foreach ($guichets as $cle => $guichet) {
	$nb_projets = count($guichet['projets']);
	$nb_acheves = 0;
	$nb_benef = 0;
	
	foreach ($guichet['projets'] as $projet) {
		if ($projet['statut'] === 'termine') {
			$nb_acheves++;
		}
		$nb_benef += $projet['beneficiaires'];
	}
	
	$stats_guichets[$cle] = array(
		'projets' => $nb_projets,
		'acheves' => $nb_acheves,
		'beneficiaires' => $nb_benef,
	);
	
	$total_projets += $nb_projets;
	$total_beneficiaires += $nb_benef;
	$total_acheves += $nb_acheves;
}
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="realisations-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/projets' ) ); ?>">Projets</a></li>
				<li class="separator">›</li>
				<li class="current">Réalisations</li>
			</ol>
		</nav>
		<span class="realisations-header__badge"><i class="fas fa-trophy"></i> Fonds Vert Togo</span>
		<h1>Nos réalisations</h1>
		<div class="title-underline"></div>
		<p class="realisations-header__sub">Découvrez les résultats concrets des projets financés par le Fonds Vert, organisés par guichet d'intervention.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="realisations-content">
	<div class="container">

		<!-- ===== STATISTIQUES GLOBALES ===== -->
		<div class="realisations-stats-globales">
			<div class="stat-item">
				<span class="stat-item__nombre"><?php echo $total_projets; ?></span>
				<span class="stat-item__label">Projets totaux</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre"><?php echo $total_acheves; ?></span>
				<span class="stat-item__label">Projets achevés</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre"><?php echo number_format($total_beneficiaires, 0, ',', ' '); ?>+</span>
				<span class="stat-item__label">Bénéficiaires</span>
			</div>
			<div class="stat-item">
				<span class="stat-item__nombre">4</span>
				<span class="stat-item__label">Guichets d'intervention</span>
			</div>
		</div>

		<!-- ===== FILTRES PAR GUICHET ===== -->
		<div class="realisations-filtres" id="filtres-guichets">
			<button class="filtre-btn actif" data-guichet="tous">
				<i class="fas fa-th-large"></i> Tous
			</button>
			<?php foreach ($guichets as $cle => $guichet) : ?>
				<button class="filtre-btn" data-guichet="<?php echo esc_attr($cle); ?>">
					<i class="fas <?php echo esc_attr($guichet['icone']); ?>"></i>
					<?php echo esc_html($guichet['nom']); ?>
					<span class="filtre-badge"><?php echo count($guichet['projets']); ?></span>
				</button>
			<?php endforeach; ?>
		</div>

		<!-- ===== STATISTIQUES PAR GUICHET ===== -->
		<div class="realisations-stats-guichets" id="stats-guichets">
			<?php foreach ($guichets as $cle => $guichet) : 
				$stats = $stats_guichets[$cle];
			?>
				<div class="stat-guichet" data-guichet="<?php echo esc_attr($cle); ?>">
					<div class="stat-guichet__header">
						<i class="fas <?php echo esc_attr($guichet['icone']); ?>" style="color: <?php echo esc_attr($guichet['couleur']); ?>;"></i>
						<span class="stat-guichet__nom"><?php echo esc_html($guichet['nom']); ?></span>
					</div>
					<div class="stat-guichet__chiffres">
						<div class="stat-guichet__item">
							<span class="stat-guichet__valeur"><?php echo $stats['projets']; ?></span>
							<span class="stat-guichet__label">Projets</span>
						</div>
						<div class="stat-guichet__item">
							<span class="stat-guichet__valeur"><?php echo $stats['acheves']; ?></span>
							<span class="stat-guichet__label">Achevés</span>
						</div>
						<div class="stat-guichet__item">
							<span class="stat-guichet__valeur"><?php echo number_format($stats['beneficiaires'], 0, ',', ' '); ?></span>
							<span class="stat-guichet__label">Bénéficiaires</span>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- ===== GRILLE DES RÉALISATIONS ===== -->
		<div class="realisations-grid" id="realisations-grid">
			<?php foreach ($guichets as $cle_guichet => $guichet) : ?>
				<?php foreach ($guichet['projets'] as $projet) : ?>
					<article class="realisation-card" data-guichet="<?php echo esc_attr($cle_guichet); ?>">
						<div class="realisation-card__image">
							<img src="<?php echo esc_url($projet['image']); ?>" alt="<?php echo esc_attr($projet['titre']); ?>" loading="lazy">
							<span class="realisation-card__statut <?php echo esc_attr($projet['statut']); ?>">
								<?php echo $projet['statut'] === 'termine' ? '✔ Achevé' : '🔄 En cours'; ?>
							</span>
						</div>
						<div class="realisation-card__content">
							<span class="realisation-card__guichet" style="background-color: <?php echo esc_attr($guichet['couleur']); ?>;">
								<i class="fas <?php echo esc_attr($guichet['icone']); ?>"></i>
								<?php echo esc_html($guichet['nom']); ?>
							</span>
							<h3 class="realisation-card__titre"><?php echo esc_html($projet['titre']); ?></h3>
							<p class="realisation-card__desc"><?php echo esc_html($projet['description']); ?></p>
							<div class="realisation-card__impact">
								<?php foreach ($projet['impact'] as $valeur => $label) : ?>
									<div class="impact-item">
										<span class="impact-item__valeur"><?php echo esc_html($valeur); ?></span>
										<span class="impact-item__label"><?php echo esc_html($label); ?></span>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</div>

		<!-- ===== TÉMOIGNAGES ===== -->
		<div class="realisations-temoignages">
			<h3 class="realisations-temoignages__title"><i class="fas fa-quote-left"></i> Ce qu'ils disent</h3>
			<div class="temoignages-grid">
				<?php foreach ($temoignages as $temoignage) : ?>
					<div class="temoignage-card">
						<div class="temoignage-card__header">
							<img src="<?php echo esc_url($temoignage['photo']); ?>" alt="<?php echo esc_attr($temoignage['nom']); ?>" loading="lazy">
							<div>
								<span class="temoignage-card__nom"><?php echo esc_html($temoignage['nom']); ?></span>
								<span class="temoignage-card__fonction"><?php echo esc_html($temoignage['fonction']); ?></span>
							</div>
						</div>
						<p class="temoignage-card__texte">« <?php echo esc_html($temoignage['texte']); ?> »</p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="realisations-cta">
	<div class="container">
		
	</div>
</section>

<!-- ============================================================
     STYLES CSS (intégrés)
     ============================================================ -->
<style>
/* ============================================================
   PAGE RÉALISATIONS – CHARTE FONDS VERT TOGO (version guichets)
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
.realisations-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.realisations-header::after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	height: 4px;
	background: linear-gradient(90deg, var(--vert-fvt) 0 25%, #1a7a3e 25% 50%, #0077be 50% 75%, #f39c12 75% 100%);
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
.realisations-header__badge {
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
.realisations-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.realisations-header h1 {
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
.realisations-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== STATISTIQUES GLOBALES ===== */
.realisations-stats-globales {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 20px;
	margin-bottom: 40px;
}
.stat-item {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 28px 20px;
	text-align: center;
	transition: transform 0.3s, box-shadow 0.3s;
}
.stat-item:hover {
	transform: translateY(-4px);
	box-shadow: 0 8px 20px rgba(6,61,36,0.08);
}
.stat-item__nombre {
	display: block;
	font-family: 'Playfair Display', serif;
	font-size: 2.4rem;
	font-weight: 800;
	color: var(--vert-fvt);
}
.stat-item__label {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	color: #5a6a5f;
	margin-top: 4px;
}

/* ===== FILTRES ===== */
.realisations-filtres {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	gap: 12px;
	margin-bottom: 30px;
}
.filtre-btn {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	padding: 10px 22px;
	border: 2px solid #e0ebe6;
	border-radius: 40px;
	background: #fff;
	color: #4d6a59;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	font-size: 0.95rem;
	cursor: pointer;
	transition: all 0.3s ease;
}
.filtre-btn:hover {
	border-color: var(--vert-fvt);
	color: var(--vert-fvt);
}
.filtre-btn.actif {
	background: var(--vert-fvt);
	border-color: var(--vert-fvt);
	color: #fff;
}
.filtre-btn.actif .filtre-badge {
	background: rgba(255,255,255,0.3);
	color: #fff;
}
.filtre-badge {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-width: 22px;
	height: 22px;
	padding: 0 8px;
	border-radius: 20px;
	background: #e7f0ea;
	color: var(--vert-fvt-fonce);
	font-size: 0.75rem;
	font-weight: 700;
}

/* ===== STATISTIQUES PAR GUICHET ===== */
.realisations-stats-guichets {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 16px;
	margin-bottom: 40px;
}
.stat-guichet {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 16px;
	padding: 18px 20px;
	transition: all 0.3s ease;
}
.stat-guichet:hover {
	box-shadow: 0 4px 16px rgba(6,61,36,0.08);
}
.stat-guichet__header {
	display: flex;
	align-items: center;
	gap: 10px;
	margin-bottom: 12px;
}
.stat-guichet__header i {
	font-size: 1.4rem;
}
.stat-guichet__nom {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 0.9rem;
	color: var(--vert-fvt-fonce);
}
.stat-guichet__chiffres {
	display: flex;
	justify-content: space-between;
	gap: 8px;
}
.stat-guichet__item {
	text-align: center;
	flex: 1;
}
.stat-guichet__valeur {
	display: block;
	font-family: 'Playfair Display', serif;
	font-weight: 800;
	font-size: 1.2rem;
	color: var(--vert-fvt);
}
.stat-guichet__label {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.7rem;
	color: #7a8a7f;
	text-transform: uppercase;
	letter-spacing: 0.3px;
}

/* ===== GRILLE ===== */
.realisations-grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 30px;
}

/* ===== CARTE RÉALISATION ===== */
.realisation-card {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}
.realisation-card:hover {
	transform: translateY(-6px);
	box-shadow: 0 12px 28px rgba(6,61,36,0.10);
}
.realisation-card__image {
	position: relative;
	height: 220px;
	overflow: hidden;
	background: #dce8e0;
}
.realisation-card__image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	transition: transform 0.5s;
}
.realisation-card:hover .realisation-card__image img {
	transform: scale(1.05);
}
.realisation-card__statut {
	position: absolute;
	top: 14px;
	right: 14px;
	padding: 4px 14px;
	border-radius: 20px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 11px;
	font-weight: 600;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	background: rgba(0,0,0,0.6);
	color: #fff;
	backdrop-filter: blur(4px);
}
.realisation-card__statut.termine {
	background: rgba(10, 110, 62, 0.85);
}
.realisation-card__statut.encours {
	background: rgba(243, 156, 18, 0.85);
}
.realisation-card__guichet {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	padding: 2px 14px;
	border-radius: 20px;
	color: #fff;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 11px;
	font-weight: 600;
	text-transform: uppercase;
	letter-spacing: 0.3px;
	margin-bottom: 10px;
}
.realisation-card__content {
	padding: 22px 24px 28px;
}
.realisation-card__titre {
	font-family: 'Playfair Display', serif;
	font-size: 1.3rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	margin: 0 0 10px;
}
.realisation-card__desc {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.95rem;
	line-height: 1.6;
	color: #5a6a5f;
	margin: 0 0 16px;
}
.realisation-card__impact {
	display: flex;
	flex-wrap: wrap;
	gap: 12px 20px;
	padding-top: 14px;
	border-top: 1px solid #e7f0ea;
}
.impact-item {
	display: flex;
	flex-direction: column;
	align-items: center;
	text-align: center;
	flex: 1 1 auto;
	min-width: 50px;
}
.impact-item__valeur {
	font-family: 'Playfair Display', serif;
	font-size: 1.2rem;
	font-weight: 700;
	color: var(--vert-fvt);
}
.impact-item__label {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.75rem;
	color: #7a8a7f;
	text-transform: uppercase;
	letter-spacing: 0.3px;
}

/* ===== TÉMOIGNAGES ===== */
.realisations-temoignages {
	margin-top: 60px;
}
.realisations-temoignages__title {
	font-family: 'Playfair Display', serif;
	font-size: 2rem;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	text-align: center;
	margin: 0 0 36px;
}
.realisations-temoignages__title i {
	color: var(--vert-fvt);
	margin-right: 12px;
}
.temoignages-grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 30px;
}
.temoignage-card {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 20px;
	padding: 26px 28px;
}
.temoignage-card__header {
	display: flex;
	align-items: center;
	gap: 16px;
	margin-bottom: 14px;
}
.temoignage-card__header img {
	width: 56px;
	height: 56px;
	border-radius: 50%;
	object-fit: cover;
}
.temoignage-card__nom {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
}
.temoignage-card__fonction {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 0.85rem;
	color: #5a6a5f;
}
.temoignage-card__texte {
	font-family: 'Playfair Display', serif;
	font-size: 1.05rem;
	line-height: 1.6;
	color: #2c3e34;
	margin: 0;
	font-style: italic;
}

/* ===== CTA ===== */
.realisations-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 60px;
	position: relative;
	overflow: hidden;
}
.realisations-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 25%, #1a7a3e 25% 50%, #0077be 50% 75%, #f39c12 75% 100%);
	opacity: 0.06;
}
.realisations-cta h2 {
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
.realisations-cta p {
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
	.realisations-grid {
		grid-template-columns: 1fr;
	}
	.realisations-stats-globales {
		grid-template-columns: repeat(2, 1fr);
	}
	.realisations-stats-guichets {
		grid-template-columns: repeat(2, 1fr);
	}
	.temoignages-grid {
		grid-template-columns: 1fr;
	}
}
@media (max-width: 768px) {
	.realisations-header h1 {
		font-size: 2.4rem;
	}
	.realisations-cta h2 {
		font-size: 1.8rem;
	}
	.realisations-stats-guichets {
		grid-template-columns: 1fr;
	}
}
@media (max-width: 576px) {
	.realisations-header h1 {
		font-size: 2rem;
	}
	.realisations-header__sub {
		font-size: 1rem;
	}
	.realisations-stats-globales {
		grid-template-columns: 1fr 1fr;
		gap: 12px;
	}
	.stat-item__nombre {
		font-size: 1.8rem;
	}
	.realisation-card__impact {
		gap: 8px 12px;
	}
	.impact-item__valeur {
		font-size: 1rem;
	}
	.realisations-filtres {
		gap: 8px;
	}
	.filtre-btn {
		font-size: 0.8rem;
		padding: 8px 14px;
	}
}
</style>

<!-- ============================================================
     JAVASCRIPT : FILTRAGE DYNAMIQUE
     ============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
	const filtres = document.querySelectorAll('.filtre-btn');
	const cartes = document.querySelectorAll('.realisation-card');
	const statsGuichets = document.querySelectorAll('.stat-guichet');

	filtres.forEach(filtre => {
		filtre.addEventListener('click', function() {
			// Désactiver tous les filtres
			filtres.forEach(f => f.classList.remove('actif'));
			this.classList.add('actif');

			const guichet = this.dataset.guichet;

			// Filtrer les cartes
			cartes.forEach(carte => {
				if (guichet === 'tous' || carte.dataset.guichet === guichet) {
					carte.style.display = 'block';
					carte.style.opacity = '0';
					setTimeout(() => { carte.style.opacity = '1'; }, 50);
				} else {
					carte.style.display = 'none';
				}
			});

			// Filtrer les statistiques par guichet
			statsGuichets.forEach(stat => {
				if (guichet === 'tous' || stat.dataset.guichet === guichet) {
					stat.style.display = 'block';
				} else {
					stat.style.display = 'none';
				}
			});
		});
	});
});
</script>