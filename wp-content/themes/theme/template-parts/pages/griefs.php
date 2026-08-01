<?php
/**
 * Template part : Page "Griefs projet" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Liste des projets (en dur)
$projets_griefs = array(
	'Agriculture résiliente au climat',
	'Énergie solaire pour les communautés rurales',
	'Gestion durable des forêts',
	'Adaptation des zones côtières',
	'Économie circulaire et déchets',
	'Accès à l\'eau potable en zones rurales',
);

// Types de griefs
$types_grief = array(
	'Retard dans l\'exécution',
	'Problème de qualité / non-conformité',
	'Utilisation inappropriée des fonds',
	'Impact environnemental négatif',
	'Non-respect des engagements',
	'Autre',
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="griefs-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li><a href="<?php echo esc_url( home_url( '/projets' ) ); ?>">Projets</a></li>
				<li class="separator">›</li>
				<li class="current">Griefs</li>
			</ol>
		</nav>
		<span class="griefs-header__badge"><i class="fas fa-exclamation-triangle"></i> TOGO GREEN FUND</span>
		<h1>Griefs liés à un projet</h1>
		<div class="title-underline"></div>
		<p class="griefs-header__sub">Vous souhaitez signaler un problème concernant un projet ? Utilisez ce formulaire pour déposer votre grief.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="griefs-content">
	<div class="container">
		<div class="griefs-grid">

			<!-- ===== COLONNE GAUCHE : INFORMATIONS ===== -->
			<div class="griefs-info">
				<h2>Comment fonctionne le processus ?</h2>
				<ul class="griefs-info__list">
					<li><i class="fas fa-check-circle"></i> Votre grief sera transmis à l’équipe de suivi-évaluation.</li>
					<li><i class="fas fa-check-circle"></i> Un accusé de réception vous sera envoyé sous 48 heures.</li>
					<li><i class="fas fa-check-circle"></i> Une enquête sera menée et des mesures correctives seront proposées.</li>
					<li><i class="fas fa-check-circle"></i> Vous serez informé de l’avancement et des décisions prises.</li>
				</ul>

				<div class="griefs-info__contact">
					<h3><i class="fas fa-headset"></i> Besoin d'assistance ?</h3>
					<p>Notre équipe est disponible pour vous accompagner :</p>
					<a href="mailto:griefs@fondsverttogo.tg"><i class="fas fa-envelope"></i> griefs@togogreen.tg</a>
					<a href="tel:+228 20 22 30 40"><i class="fas fa-phone-alt"></i> +228 20 22 30 40</a>
				</div>

				<div class="griefs-info__download">
					<h3><i class="fas fa-file-pdf"></i> Charte de traitement des griefs</h3>
					<p>Téléchargez notre procédure interne pour plus d'informations.</p>
					<a href="#" class="griefs-info__btn">
						<i class="fas fa-download"></i> Télécharger la charte (PDF)
					</a>
				</div>
			</div>

			<!-- ===== COLONNE DROITE : FORMULAIRE ===== -->
			<div class="griefs-form">
				<h2>Formulaire de dépôt de grief</h2>
				<p>Les champs marqués <span class="required">*</span> sont obligatoires.</p>

				<form id="griefs-form" method="post" enctype="multipart/form-data">

					<!-- Sélection du projet -->
					<div class="form-group">
						<label for="projet">Projet concerné <span class="required">*</span></label>
						<select id="projet" name="projet" required>
							<option value="">Sélectionnez un projet</option>
							<?php foreach ( $projets_griefs as $projet ) : ?>
								<option value="<?php echo esc_attr( $projet ); ?>"><?php echo esc_html( $projet ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<!-- Type de grief -->
					<div class="form-group">
						<label for="type_grief">Type de grief <span class="required">*</span></label>
						<select id="type_grief" name="type_grief" required>
							<option value="">Sélectionnez un type</option>
							<?php foreach ( $types_grief as $type ) : ?>
								<option value="<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $type ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<!-- Description -->
					<div class="form-group">
						<label for="description">Description du grief <span class="required">*</span></label>
						<textarea id="description" name="description" rows="5" placeholder="Décrivez le problème rencontré, les faits, les dates, les personnes impliquées..." required></textarea>
					</div>

					<!-- Date de l'incident -->
					<div class="form-group">
						<label for="date_incident">Date de l'incident <span class="required">*</span></label>
						<input type="date" id="date_incident" name="date_incident" required>
					</div>

					<!-- Pièce jointe -->
					<div class="form-group">
						<label for="fichier">Pièce(s) jointe(s) (PDF, image, doc, max 10 Mo)</label>
						<input type="file" id="fichier" name="fichier" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" multiple>
					</div>

					<hr style="border-color:#e7f0ea; margin: 24px 0;">

					<!-- Identité du déclarant -->
					<h3 style="font-family:'Playfair Display',serif; font-size:1.3rem; color:var(--vert-fvt-fonce); margin:0 0 16px;">Votre identité</h3>
					<div class="form-row">
						<div class="form-group">
							<label for="nom">Nom <span class="required">*</span></label>
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
							<label for="telephone">Téléphone</label>
							<input type="tel" id="telephone" name="telephone" placeholder="+228 XX XX XX XX">
						</div>
					</div>
					<div class="form-group">
						<label for="organisation">Organisation / Structure (facultatif)</label>
						<input type="text" id="organisation" name="organisation" placeholder="Nom de votre organisation">
					</div>

					<div class="form-group form-check">
						<input type="checkbox" id="consent" name="consent" required>
						<label for="consent">Je certifie que les informations fournies sont exactes et j’accepte le traitement de mes données personnelles dans le cadre de ce signalement. <span class="required">*</span></label>
					</div>

					<button type="submit" class="griefs-submit">
						<i class="fas fa-paper-plane"></i> Envoyer le grief
					</button>
				</form>

				<!-- Message de confirmation -->
				<div id="griefs-success" style="display:none;">
					<i class="fas fa-check-circle"></i>
					<h3>Votre grief a été enregistré</h3>
					<p>Nous vous remercions pour votre signalement. Vous recevrez un accusé de réception sous 48 heures.</p>
					<button class="griefs-reset" onclick="resetGriefsForm()">Déposer un autre grief</button>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="griefs-cta">
	<div class="container">
		<h2>Vous préférez nous contacter directement ?</h2>
		<div class="cta-divider"></div>
		<p>Notre équipe est à votre écoute pour toute question ou assistance.</p>
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
   PAGE GRIEFS PROJET – CHARTE TOGO GREEN FUND
   ============================================================ */
:root {
	--vert-fvt:        #0a6e3e;
	--vert-fvt-fonce:  #063d24;
	--jaune-fvt:       #FFCE00;
	--rouge-fvt:       #D21034;
	--gris-fond:       #f6faf7;
	--blanc:           #ffffff;
	--succes:          #0a6e3e;
}

/* ===== EN‑TÊTE ===== */
.griefs-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.griefs-header::after {
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
.griefs-header__badge {
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
.griefs-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.griefs-header h1 {
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
.griefs-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU PRINCIPAL ===== */
.griefs-content {
	padding: 60px 0 40px;
	background: #ffffff;
}
.griefs-grid {
	display: grid;
	grid-template-columns: 1fr 2fr;
	gap: 50px;
	align-items: start;
}

/* ===== COLONNE GAUCHE : INFO ===== */
.griefs-info {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	padding: 34px 28px;
}
.griefs-info h2 {
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	font-size: 1.6rem;
	margin: 0 0 12px;
}
.griefs-info p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	line-height: 1.6;
	margin-bottom: 20px;
}
.griefs-info__list {
	list-style: none;
	padding: 0;
	margin: 0 0 28px;
}
.griefs-info__list li {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	padding: 8px 0;
	font-family: 'Kumbh Sans', sans-serif;
	color: #2c3e34;
	border-bottom: 1px solid #e7f0ea;
}
.griefs-info__list li i {
	color: var(--vert-fvt);
	font-size: 18px;
	margin-top: 2px;
}
.griefs-info__contact,
.griefs-info__download {
	margin-top: 24px;
	padding-top: 20px;
	border-top: 1px solid #dce8e0;
}
.griefs-info__contact h3,
.griefs-info__download h3 {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.05rem;
	color: var(--vert-fvt-fonce);
	margin: 0 0 10px;
}
.griefs-info__contact a {
	display: inline-flex;
	align-items: center;
	gap: 10px;
	font-family: 'Kumbh Sans', sans-serif;
	color: var(--vert-fvt);
	text-decoration: none;
	margin-bottom: 8px;
	transition: color 0.2s;
}
.griefs-info__contact a:hover {
	color: var(--vert-fvt-fonce);
}
.griefs-info__contact a i {
	width: 18px;
}
.griefs-info__btn {
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
.griefs-info__btn:hover {
	background: var(--vert-fvt-fonce);
}

/* ===== COLONNE DROITE : FORMULAIRE ===== */
.griefs-form {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	padding: 34px 32px;
	box-shadow: 0 8px 24px rgba(6,61,36,0.04);
}
.griefs-form h2 {
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 6px;
}
.griefs-form p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	margin-bottom: 24px;
}
.required {
	color: var(--rouge-fvt);
	font-weight: 700;
}
hr {
	border: 0;
	border-top: 1px solid #e7f0ea;
	margin: 24px 0;
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

.griefs-submit {
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
.griefs-submit:hover {
	background: var(--vert-fvt-fonce);
	transform: translateY(-2px);
	box-shadow: 0 8px 20px rgba(10,110,62,0.25);
}

/* ===== MESSAGE DE CONFIRMATION ===== */
#griefs-success {
	text-align: center;
	padding: 30px 10px;
}
#griefs-success i {
	font-size: 56px;
	color: var(--succes);
	margin-bottom: 16px;
}
#griefs-success h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
#griefs-success p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1.05rem;
	margin-bottom: 20px;
}
.griefs-reset {
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
.griefs-reset:hover {
	background: var(--vert-fvt);
	color: #fff;
}

/* ===== CTA ===== */
.griefs-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 40px;
	position: relative;
	overflow: hidden;
}
.griefs-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.griefs-cta h2 {
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
.griefs-cta p {
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
	.griefs-grid {
		grid-template-columns: 1fr;
		gap: 30px;
	}
	.griefs-info {
		order: 2;
	}
	.griefs-form {
		order: 1;
	}
	.form-row {
		grid-template-columns: 1fr;
		gap: 0;
	}
}
@media (max-width: 768px) {
	.griefs-header h1 {
		font-size: 2.4rem;
	}
	.griefs-cta h2 {
		font-size: 1.8rem;
	}
	.griefs-form {
		padding: 24px 18px;
	}
	.griefs-info {
		padding: 24px 18px;
	}
}
@media (max-width: 576px) {
	.griefs-header h1 {
		font-size: 2rem;
	}
	.griefs-header__sub {
		font-size: 1rem;
	}
}
</style>

<!-- ============================================================
     SCRIPT DE GESTION DU FORMULAIRE (simulation)
     ============================================================ -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const form = document.getElementById('griefs-form');
		const successDiv = document.getElementById('griefs-success');

		form.addEventListener('submit', function(e) {
			e.preventDefault();

			if (!form.checkValidity()) {
				form.reportValidity();
				return;
			}

			const submitBtn = form.querySelector('.griefs-submit');
			submitBtn.disabled = true;
			submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';

			setTimeout(function() {
				form.style.display = 'none';
				successDiv.style.display = 'block';
				submitBtn.disabled = false;
				submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Envoyer le grief';
			}, 2000);
		});
	});

	function resetGriefsForm() {
		document.getElementById('griefs-form').reset();
		document.getElementById('griefs-form').style.display = 'block';
		document.getElementById('griefs-success').style.display = 'none';
		document.querySelector('.griefs-form').scrollIntoView({ behavior: 'smooth' });
	}
</script>