<?php
/**
 * Template part : Page "Manifestation d’intérêt" – version statique
 * Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

// Types d'organisation
$types_org = array(
	'Association / ONG',
	'Entreprise privée',
	'Collectivité locale',
	'Institution publique',
	'Groupement de producteurs',
	'Autre',
);

// Domaines d'intérêt
$domaines = array(
	'Agriculture durable',
	'Énergie renouvelable',
	'Gestion forestière',
	'Eau et assainissement',
	'Économie circulaire',
	'Adaptation côtière',
	'Éducation environnementale',
	'Recherche et innovation',
);

// Informations contextuelles
$infos_mi = array(
	'La manifestation d’intérêt est une étape préliminaire pour exprimer votre souhait de collaborer avec le Fonds Vert.',
	'Elle permet à notre équipe de mieux comprendre votre projet et d’évaluer sa pertinence avant un dépôt de dossier complet.',
	'Un retour vous sera fait dans un délai de 15 jours ouvrés.',
	'La soumission de ce formulaire ne constitue pas un engagement de financement.',
);
?>

<!-- ============================================================
     EN‑TÊTE : BREADCRUMB + TITRE
     ============================================================ -->
<section class="manifestation-header">
	<div class="container">
		<nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
				<li class="separator">›</li>
				<li class="current">Manifestation d'intérêt</li>
			</ol>
		</nav>
		<span class="manifestation-header__badge"><i class="fas fa-hand-paper"></i> Fonds Vert Togo</span>
		<h1>Manifestation d'intérêt</h1>
		<div class="title-underline"></div>
		<p class="manifestation-header__sub">Vous souhaitez collaborer avec le Fonds Vert ? Exprimez votre intérêt pour un futur projet.</p>
	</div>
</section>

<!-- ============================================================
     CONTENU PRINCIPAL
     ============================================================ -->
<section class="manifestation-content">
	<div class="container">
		<div class="manifestation-grid">

			<!-- ===== COLONNE GAUCHE : INFORMATIONS ===== -->
			<div class="manifestation-info">
				<h2>Pourquoi manifester son intérêt ?</h2>
				<ul class="manifestation-info__list">
					<?php foreach ( $infos_mi as $info ) : ?>
						<li><i class="fas fa-check-circle"></i> <?php echo esc_html( $info ); ?></li>
					<?php endforeach; ?>
				</ul>

				<div class="manifestation-info__contact">
					<h3><i class="fas fa-headset"></i> Besoin d'accompagnement ?</h3>
					<p>Notre équipe est à votre disposition :</p>
					<a href="mailto:partenariat@fondsverttogo.tg"><i class="fas fa-envelope"></i> partenariat@fondsverttogo.tg</a>
					<a href="tel:+228XXXXXXXX"><i class="fas fa-phone-alt"></i> +228 XX XX XX XX</a>
				</div>

				<div class="manifestation-info__download">
					<h3><i class="fas fa-file-pdf"></i> Guide de soumission</h3>
					<p>Téléchargez le guide pour préparer votre dossier.</p>
					<a href="#" class="manifestation-info__btn">
						<i class="fas fa-download"></i> Télécharger le PDF
					</a>
				</div>
			</div>

			<!-- ===== COLONNE DROITE : FORMULAIRE ===== -->
			<div class="manifestation-form">
				<h2>Formulaire d'intérêt</h2>
				<p>Remplissez ce formulaire pour manifester votre intérêt. Les champs marqués <span class="required">*</span> sont obligatoires.</p>

				<form id="manifestation-form" method="post" enctype="multipart/form-data">
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
					<div class="form-group">
						<label for="organisation">Organisation / Structure <span class="required">*</span></label>
						<input type="text" id="organisation" name="organisation" placeholder="Nom de votre organisation" required>
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
						<label for="type_organisation">Type d'organisation <span class="required">*</span></label>
						<select id="type_organisation" name="type_organisation" required>
							<option value="">Sélectionnez un type</option>
							<?php foreach ( $types_org as $type ) : ?>
								<option value="<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $type ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="domaine_interet">Domaine d'intérêt <span class="required">*</span></label>
						<select id="domaine_interet" name="domaine_interet" required>
							<option value="">Sélectionnez un domaine</option>
							<?php foreach ( $domaines as $domaine ) : ?>
								<option value="<?php echo esc_attr( $domaine ); ?>"><?php echo esc_html( $domaine ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="message">Présentation succincte de votre projet / motivation <span class="required">*</span></label>
						<textarea id="message" name="message" rows="4" placeholder="Décrivez en quelques phrases votre projet ou votre motivation à collaborer avec le Fonds Vert..." required></textarea>
					</div>
					<div class="form-group">
						<label for="fichier">Fichier complémentaire (PDF, max 5 Mo)</label>
						<input type="file" id="fichier" name="fichier" accept=".pdf">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" id="consent" name="consent" required>
						<label for="consent">J’atteste que les informations fournies sont exactes et j’accepte le traitement de mes données. <span class="required">*</span></label>
					</div>
					<button type="submit" class="manifestation-submit">
						<i class="fas fa-paper-plane"></i> Envoyer ma manifestation
					</button>
				</form>

				<!-- Message de confirmation -->
				<div id="manifestation-success" style="display:none;">
					<i class="fas fa-check-circle"></i>
					<h3>Votre manifestation a été envoyée !</h3>
					<p>Nous vous recontacterons dans les meilleurs délais pour échanger sur la suite.</p>
					<button class="manifestation-reset" onclick="resetManifestationForm()">Soumettre une autre demande</button>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- ============================================================
     APPEL À L'ACTION
     ============================================================ -->
<section class="manifestation-cta">
	<div class="container">
		<h2>Vous avez un projet déjà bien avancé ?</h2>
		<div class="cta-divider"></div>
		<p>Si votre projet est déjà mature, vous pouvez directement soumettre un projet complet.</p>
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
   PAGE MANIFESTATION D'INTÉRÊT – CHARTE FONDS VERT TOGO
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
.manifestation-header {
	background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
	padding: 50px 0 55px;
	border-bottom: 1px solid #e0ebe6;
	text-align: center;
	position: relative;
}
.manifestation-header::after {
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
.manifestation-header__badge {
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
.manifestation-header__badge i {
	color: var(--vert-fvt);
	font-size: 14px;
}
.manifestation-header h1 {
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
.manifestation-header__sub {
	font-family: 'Kumbh Sans', sans-serif;
	font-size: 1.1rem;
	color: #5a6a5f;
	max-width: 600px;
	margin: 18px auto 0;
}

/* ===== CONTENU PRINCIPAL ===== */
.manifestation-content {
	padding: 60px 0 40px;
	background: #ffffff;
}
.manifestation-grid {
	display: grid;
	grid-template-columns: 1fr 2fr;
	gap: 50px;
	align-items: start;
}

/* ===== COLONNE GAUCHE : INFO ===== */
.manifestation-info {
	background: var(--gris-fond);
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	padding: 34px 28px;
}
.manifestation-info h2 {
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	font-size: 1.6rem;
	margin: 0 0 12px;
}
.manifestation-info p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	line-height: 1.6;
	margin-bottom: 20px;
}
.manifestation-info__list {
	list-style: none;
	padding: 0;
	margin: 0 0 28px;
}
.manifestation-info__list li {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	padding: 8px 0;
	font-family: 'Kumbh Sans', sans-serif;
	color: #2c3e34;
	border-bottom: 1px solid #e7f0ea;
}
.manifestation-info__list li i {
	color: var(--vert-fvt);
	font-size: 18px;
	margin-top: 2px;
}
.manifestation-info__contact,
.manifestation-info__download {
	margin-top: 24px;
	padding-top: 20px;
	border-top: 1px solid #dce8e0;
}
.manifestation-info__contact h3,
.manifestation-info__download h3 {
	font-family: 'Kumbh Sans', sans-serif;
	font-weight: 700;
	font-size: 1.05rem;
	color: var(--vert-fvt-fonce);
	margin: 0 0 10px;
}
.manifestation-info__contact a {
	display: inline-flex;
	align-items: center;
	gap: 10px;
	font-family: 'Kumbh Sans', sans-serif;
	color: var(--vert-fvt);
	text-decoration: none;
	margin-bottom: 8px;
	transition: color 0.2s;
}
.manifestation-info__contact a:hover {
	color: var(--vert-fvt-fonce);
}
.manifestation-info__contact a i {
	width: 18px;
}
.manifestation-info__btn {
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
.manifestation-info__btn:hover {
	background: var(--vert-fvt-fonce);
}

/* ===== COLONNE DROITE : FORMULAIRE ===== */
.manifestation-form {
	background: #fff;
	border: 1px solid #e7f0ea;
	border-radius: 24px;
	padding: 34px 32px;
	box-shadow: 0 8px 24px rgba(6,61,36,0.04);
}
.manifestation-form h2 {
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 6px;
}
.manifestation-form p {
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

.manifestation-submit {
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
.manifestation-submit:hover {
	background: var(--vert-fvt-fonce);
	transform: translateY(-2px);
	box-shadow: 0 8px 20px rgba(10,110,62,0.25);
}

/* ===== MESSAGE DE CONFIRMATION ===== */
#manifestation-success {
	text-align: center;
	padding: 30px 10px;
}
#manifestation-success i {
	font-size: 56px;
	color: var(--succes);
	margin-bottom: 16px;
}
#manifestation-success h3 {
	font-family: 'Playfair Display', serif;
	color: var(--vert-fvt-fonce);
	font-size: 1.8rem;
	margin: 0 0 10px;
}
#manifestation-success p {
	font-family: 'Kumbh Sans', sans-serif;
	color: #5a6a5f;
	font-size: 1.05rem;
	margin-bottom: 20px;
}
.manifestation-reset {
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
.manifestation-reset:hover {
	background: var(--vert-fvt);
	color: #fff;
}

/* ===== CTA ===== */
.manifestation-cta {
	background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
	padding: 76px 0;
	text-align: center;
	margin-top: 40px;
	position: relative;
	overflow: hidden;
}
.manifestation-cta::before {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
	opacity: 0.06;
}
.manifestation-cta h2 {
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
.manifestation-cta p {
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
	.manifestation-grid {
		grid-template-columns: 1fr;
		gap: 30px;
	}
	.manifestation-info {
		order: 2;
	}
	.manifestation-form {
		order: 1;
	}
	.form-row {
		grid-template-columns: 1fr;
		gap: 0;
	}
}
@media (max-width: 768px) {
	.manifestation-header h1 {
		font-size: 2.4rem;
	}
	.manifestation-cta h2 {
		font-size: 1.8rem;
	}
	.manifestation-form {
		padding: 24px 18px;
	}
	.manifestation-info {
		padding: 24px 18px;
	}
}
@media (max-width: 576px) {
	.manifestation-header h1 {
		font-size: 2rem;
	}
	.manifestation-header__sub {
		font-size: 1rem;
	}
}
</style>

<!-- ============================================================
     SCRIPT DE GESTION DU FORMULAIRE (simulation)
     ============================================================ -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const form = document.getElementById('manifestation-form');
		const successDiv = document.getElementById('manifestation-success');

		form.addEventListener('submit', function(e) {
			e.preventDefault();

			if (!form.checkValidity()) {
				form.reportValidity();
				return;
			}

			const submitBtn = form.querySelector('.manifestation-submit');
			submitBtn.disabled = true;
			submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';

			setTimeout(function() {
				form.style.display = 'none';
				successDiv.style.display = 'block';
				submitBtn.disabled = false;
				submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Envoyer ma manifestation';
			}, 1500);
		});
	});

	function resetManifestationForm() {
		document.getElementById('manifestation-form').reset();
		document.getElementById('manifestation-form').style.display = 'block';
		document.getElementById('manifestation-success').style.display = 'none';
		document.querySelector('.manifestation-form').scrollIntoView({ behavior: 'smooth' });
	}
</script>