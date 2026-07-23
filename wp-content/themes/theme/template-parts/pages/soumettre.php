<?php
/**
 * Template part : Page "Soumettre un projet" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Types de projet (pour le champ select)
$types_projet = array(
	'Agriculture durable',
	'Énergie renouvelable',
	'Gestion forestière',
	'Eau et assainissement',
	'Économie circulaire',
	'Adaptation côtière',
	'Autre',
);

// Informations de soumission
$infos_soumission = array(
	'Les projets doivent être alignés sur les objectifs climatiques du Togo.',
	'Les dossiers de candidature doivent être complets et signés.',
	'Une équipe technique examine chaque proposition sous 30 jours.',
	'Les projets financés font l\'objet d\'un suivi-évaluation rigoureux.',
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="soumission-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li class="current">Soumettre un projet</li>
			</ol>
		</nav>
		<span class="soumission-header__badge"><i class="fas fa-file-signature"></i> Fonds Vert Togo</span>
		<h1>Soumettre un projet</h1>
		<div class="title-underline"></div>
		<p class="soumission-header__sub">Vous portez une initiative climatique ? Soumettez votre projet pour un financement du Fonds Vert.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="soumission-content">
	<div class="container">
		<div class="soumission-grid">

			<!-- ===== COLONNE GAUCHE : INFORMATIONS ===== -->
			<div class="soumission-info">
				<h2>Conditions de soumission</h2>
				<p>Avant de soumettre votre projet, assurez‑vous de respecter les critères suivants :</p>
				<ul class="soumission-info__list">
					<?php foreach ( $infos_soumission as $info ) : ?>
						<li><i class="fas fa-check-circle"></i> <?php echo esc_html( $info ); ?></li>
					<?php endforeach; ?>
				</ul>

				<div class="soumission-info__contact">
					<h3><i class="fas fa-headset"></i> Besoin d'aide ?</h3>
					<p>Contactez notre équipe d'accompagnement :</p>
					<a href="mailto:projets@fondsverttogo.tg"><i class="fas fa-envelope"></i> projets@fondsverttogo.tg</a>
					<a href="tel:+228XXXXXXXX"><i class="fas fa-phone-alt"></i> +228 XX XX XX XX</a>
				</div>

				<div class="soumission-info__download">
					<h3><i class="fas fa-file-pdf"></i> Téléchargez le guide</h3>
					<p>Consultez le guide complet du soumissionnaire.</p>
					<a href="#" class="soumission-info__btn">
						<i class="fas fa-download"></i> Télécharger le PDF
					</a>
				</div>
			</div>

			<!-- ===== COLONNE DROITE : FORMULAIRE ===== -->
			<div class="soumission-form">
				<h2>Formulaire de soumission</h2>
				<p>Remplissez tous les champs obligatoires (<span class="required">*</span>).</p>

				<form id="soumission-form" method="post" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group">
							<label for="nom">Nom complet <span class="required">*</span></label>
							<input type="text" id="nom" name="nom" placeholder="Votre nom" required>
						</div>
						<div class="form-group">
							<label for="prenom">Prénom <span class="required">*</span></label>
							<input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group">
							<label for="email">Adresse e-mail <span class="required">*</span></label>
							<input type="email" id="email" name="email" placeholder="exemple@domaine.tg" required>
						</div>
						<div class="form-group">
							<label for="telephone">Téléphone <span class="required">*</span></label>
							<input type="tel" id="telephone" name="telephone" placeholder="+228 XX XX XX XX" required>
						</div>
					</div>
					<div class="form-group">
						<label for="type_projet">Type de projet <span class="required">*</span></label>
						<select id="type_projet" name="type_projet" required>
							<option value="">Sélectionnez un type</option>
							<?php foreach ( $types_projet as $type ) : ?>
								<option value="<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $type ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="description">Description du projet <span class="required">*</span></label>
						<textarea id="description" name="description" rows="5" placeholder="Décrivez votre projet, ses objectifs, son impact attendu..." required></textarea>
					</div>
					<div class="form-group">
						<label for="fichier">Fichier de présentation (PDF, max 5 Mo)</label>
						<input type="file" id="fichier" name="fichier" accept=".pdf">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" id="consent" name="consent" required>
						<label for="consent">J’atteste que les informations fournies sont exactes et j’accepte le traitement de mes données. <span class="required">*</span></label>
					</div>
					<button type="submit" class="soumission-submit">
						<i class="fas fa-paper-plane"></i> Soumettre le projet
					</button>
				</form>

				<!-- Message de confirmation (caché par défaut) -->
				<div id="soumission-success" style="display:none;">
					<i class="fas fa-check-circle"></i>
					<h3>Votre projet a été soumis avec succès !</h3>
					<p>Nous vous recontacterons sous 30 jours ouvrés pour vous informer de la suite donnée.</p>
					<button class="soumission-reset" onclick="resetForm()">Soumettre un autre projet</button>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION (facultatif)
     ============================================================ -->
<section class="soumission-cta">
	<div class="container">
		<h2>Vous avez des questions sur la soumission ?</h2>
		<div class="cta-divider"></div>
		<p>Consultez notre guide du soumissionnaire ou contactez notre équipe d'accompagnement.</p>
		<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="cta-btn">
			Nous contacter <i class="fas fa-arrow-right"></i>
		</a>
	</div>
</section>

<!-- ============================================================
     STYLES CSS (intégrés)
     ============================================================ -->
<style>
/* ============================================================
   PAGE SOUMISSION – CHARTE FONDS VERT TOGO
   ============================================================ */
:root {
	--vert-fvt:        #0a6e3e;
	--vert-fvt-fonce:  #063d24;
	--jaune-fvt:       #FFCE00;
	--rouge-fvt:       #D21034;
	--gris-fond:       #f6faf7;
	--blanc:           #ffffff;
	--erreur:          #d21034;
	--succes:          #0a6e3e;
}

/* ===== EN‑TÊTE ===== */
.soumission-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.soumission-header::after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	height: 4px;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
}
.soumission-header__badge {
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
.soumission-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.soumission-header h1 {
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
.soumission-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU PRINCIPAL ===== */
.soumission-content {
	padding: 60px 0 40px;
	background: #ffffff;
}
.soumission-grid {
	display: grid;
	grid-template-columns: 1fr 2fr;
	gap: 50px;
	align-items: start;
}

/* ===== COLONNE GAUCHE : INFO ===== */
.soumission-info {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	padding: 34px 28px;
}
.soumission-info h2 {
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	font-size: 1.6rem;
	margin: 0 0 12px;
}
.soumission-info p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	line-height: 1.6;
	margin-bottom: 20px;
}
.soumission-info__list {
	list-style: none;
	padding: 0;
	margin: 0 0 28px;
}
.soumission-info__list li {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	padding: 8px 0;
	font-family: 'Kumbh Sans', sans-serif;
	color: #2c3e34;
	border-bottom: 1px solid #e7f0ea;
}
.soumission-info__list li i {
	color: var(--vert-fvt);
	font-size: 18px;
	margin-top: 2px;
}
.soumission-info__contact,
.soumission-info__download {
	margin-top: 24px;
	padding-top: 20px;
	border-top: 1px solid #dce8e0;
}
.soumission-info__contact h3,
.soumission-info__download h3 {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.05rem;
	color: var(--vert-fvt-fonce);
	margin: 0 0 10px;
}
.soumission-info__contact a {
	display: inline-flex;
	align-items: center;
	gap: 10px;
	font-family: 'Kumbh Sans', sans-serif;
	color: var(--vert-fvt);
	text-decoration: none;
	margin-bottom: 8px;
	transition: color 0.2s;
}
.soumission-info__contact a:hover {
	color: var(--vert-fvt-fonce);
}
.soumission-info__contact a i {
	width: 18px;
}
.soumission-info__btn {
	display: inline-flex;
	align-items: center;
	gap: 10px;
	padding: 10px 24px;
	background: var(--vert-fvt);
	color: #fff;
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	text-decoration: none;
	transition: background 0.3s;
}
.soumission-info__btn:hover {
	background: var(--vert-fvt-fonce);
}

/* ===== COLONNE DROITE : FORMULAIRE ===== */
.soumission-form {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	padding: 34px 32px;
	box-shadow: 0 8px 24px rgba(6,61,36,0.04);
}
.soumission-form h2 {
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 6px;
}
.soumission-form p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	margin-bottom: 24px;
}
.required {
	color: var(--rouge-fvt);
	font-weight: 700;
}

.form-row {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 20px;
}
.form-group {
	margin-bottom: 20px;
}
.form-group label {
	display: block;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	color: var(--vert-fvt-fonce);
	margin-bottom: 4px;
	font-size: 0.95rem;
}
.form-group input,
.form-group select,
.form-group textarea {
	width: 100%;
	padding: 12px 16px;
	border: 1px solid #dce8e0;
	border-radius: 12px;
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1rem;
	color: #2c3e34;
	transition: border 0.2s;
}
.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
	border-color: var(--vert-fvt);
	outline: none;
}
.form-group textarea {
	resize: vertical;
}
.form-group input[type="file"] {
	padding: 8px;
	border: 1px dashed #dce8e0;
	background: var(--gris-fond);
}
.form-check {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	margin-top: 8px;
}
.form-check input[type="checkbox"] {
	width: 20px;
	height: 20px;
	margin-top: 2px;
	flex-shrink: 0;
}
.form-check label {
	font-weight: 400;
	font-size: 0.95rem;
	color: #4d6a59;
}

.soumission-submit {
	display: inline-flex;
	align-items: center;
	gap: 10px;
	padding: 14px 36px;
	background: var(--vert-fvt);
	color: #fff;
	border: none;
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.05rem;
	cursor: pointer;
	transition: all 0.3s;
	margin-top: 8px;
}
.soumission-submit:hover {
	background: var(--vert-fvt-fonce);
	transform: translateY(-2px);
	box-shadow: 0 8px 20px rgba(10,110,62,0.25);
}

/* ===== MESSAGE DE CONFIRMATION ===== */
#soumission-success {
	text-align: center;
	padding: 30px 10px;
}
#soumission-success i {
	font-size: 56px;
	color: var(--succes);
	margin-bottom: 16px;
}
#soumission-success h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
#soumission-success p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1.05rem;
	margin-bottom: 20px;
}
.soumission-reset {
	display: inline-block;
	padding: 10px 28px;
	background: transparent;
	color: var(--vert-fvt);
	border: 2px solid var(--vert-fvt);
	border-radius: 30px;
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 600;
	cursor: pointer;
	transition: all 0.3s;
}
.soumission-reset:hover {
	background: var(--vert-fvt);
	color: #fff;
}

/* ===== CTA ===== */
.soumission-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 40px;
	position: relative;
	overflow: hidden;
}
.soumission-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.soumission-cta h2 {
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
.soumission-cta p {
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
	.soumission-grid {
		grid-template-columns: 1fr;
		gap: 30px;
	}
	.soumission-info {
		order: 2;
	}
	.soumission-form {
		order: 1;
	}
	.form-row {
		grid-template-columns: 1fr;
		gap: 0;
	}
}
@media (max-width: 768px) {
	.soumission-header h1 {
		font-size: 2.4rem;
	}
	.soumission-cta h2 {
		font-size: 1.8rem;
	}
	.soumission-form {
		padding: 24px 18px;
	}
	.soumission-info {
		padding: 24px 18px;
	}
}
@media (max-width: 576px) {
	.soumission-header h1 {
		font-size: 2rem;
	}
	.soumission-header__sub {
		font-size: 1rem;
	}
}
</style>

<!-- ============================================================
     SCRIPT DE GESTION DU FORMULAIRE (simulation)
     ============================================================ -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const form = document.getElementById('soumission-form');
		const successDiv = document.getElementById('soumission-success');

		form.addEventListener('submit', function(e) {
			e.preventDefault();

			// Validation simple (les attributs required sont déjà actifs)
			if (!form.checkValidity()) {
				form.reportValidity();
				return;
			}

			// Simuler l'envoi (désactiver le bouton, afficher un loader)
			const submitBtn = form.querySelector('.soumission-submit');
			submitBtn.disabled = true;
			submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';

			setTimeout(function() {
				// Cacher le formulaire, afficher le message de succès
				form.style.display = 'none';
				successDiv.style.display = 'block';
				// Réactiver le bouton pour un éventuel reset
				submitBtn.disabled = false;
				submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Soumettre le projet';
			}, 1800); // Simule un délai d'envoi
		});
	});

	// Fonction pour réinitialiser le formulaire (réafficher le formulaire)
	function resetForm() {
		document.getElementById('soumission-form').reset();
		document.getElementById('soumission-form').style.display = 'block';
		document.getElementById('soumission-success').style.display = 'none';
		// Remonter en haut de la section formulaire
		document.querySelector('.soumission-form').scrollIntoView({ behavior: 'smooth' });
	}
</script>