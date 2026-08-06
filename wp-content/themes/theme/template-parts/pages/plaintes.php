<?php
/**
 * Template part : Page "Plainte" – dynamique
 *
 * @package TogoGreenFund
 */

$types_plainte = array(
    'Mauvaise gestion de projet',
    'Fraude ou corruption',
    'Non-respect des normes environnementales',
    'Non-respect des normes sociales',
    'Harcèlement ou discrimination',
    'Conflit d\'intérêts',
    'Autre',
);

$infos_plainte = array(
    'Toute plainte est traitée avec confidentialité et rigueur.',
    'Vous pouvez déposer une plainte de manière anonyme.',
    'Un accusé de réception vous sera envoyé sous 48 heures (si vous laissez vos coordonnées).',
    'Une enquête indépendante est menée par notre comité d\'éthique.',
    'Aucune mesure de rétorsion ne sera prise contre le plaignant de bonne foi.',
);

$success_ref = isset( $_GET['plainte_success'] ) ? sanitize_text_field( $_GET['plainte_success'] ) : '';
$error_code  = isset( $_GET['plainte_error'] ) ? intval( $_GET['plainte_error'] ) : 0;
?>

<style>
/* ============================================================
   PAGE PLAINTE – CHARTE TOGO GREEN FUND
   ============================================================ */
:root {
    --vert-fvt:        #0a6e3e;
    --vert-fvt-fonce:  #063d24;
    --jaune-fvt:       #FFCE00;
    --rouge-fvt:       #D21034;
    --gris-fond:       #f6faf7;
    --blanc:           #ffffff;
}

.plainte-header {
    background: linear-gradient(145deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 50px 0 55px;
    border-bottom: 1px solid #e0ebe6;
    text-align: center;
    position: relative;
}
.plainte-header::after {
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
.plainte-header__badge {
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
.plainte-header__badge i {
    color: var(--vert-fvt);
    font-size: 14px;
}
.plainte-header h1 {
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
.plainte-header__sub {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.1rem;
    color: #5a6a5f;
    max-width: 600px;
    margin: 18px auto 0;
}

.plainte-content {
    padding: 60px 0 40px;
    background: #ffffff;
}
.plainte-grid {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 50px;
    align-items: start;
}
.plainte-info {
    background: var(--gris-fond);
    border: 1px solid #e7f0ea;
    border-radius: 24px;
    padding: 34px 28px;
}
.plainte-info h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    font-size: 1.6rem;
    margin: 0 0 12px;
}
.plainte-info p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5a6a5f;
    line-height: 1.6;
    margin-bottom: 20px;
}
.plainte-info__list {
    list-style: none;
    padding: 0;
    margin: 0 0 28px;
}
.plainte-info__list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 8px 0;
    font-family: 'Kumbh Sans', sans-serif;
    color: #2c3e34;
    border-bottom: 1px solid #e7f0ea;
}
.plainte-info__list li i {
    color: var(--vert-fvt);
    font-size: 18px;
    margin-top: 2px;
}
.plainte-info__contact,
.plainte-info__download {
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid #dce8e0;
}
.plainte-info__contact h3,
.plainte-info__download h3 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    font-size: 1.05rem;
    color: var(--vert-fvt-fonce);
    margin: 0 0 10px;
}
.plainte-info__contact a {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Kumbh Sans', sans-serif;
    color: var(--vert-fvt);
    text-decoration: none;
    margin-bottom: 8px;
    transition: color 0.2s;
}
.plainte-info__contact a:hover {
    color: var(--vert-fvt-fonce);
}
.plainte-info__contact a i {
    width: 18px;
}
.plainte-info__btn {
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
.plainte-info__btn:hover {
    background: var(--vert-fvt-fonce);
}

.plainte-form {
    background: #fff;
    border: 1px solid #e7f0ea;
    border-radius: 24px;
    padding: 34px 32px;
    box-shadow: 0 8px 24px rgba(6,61,36,0.04);
}
.plainte-form h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--vert-fvt-fonce);
    font-size: 1.8rem;
    margin: 0 0 6px;
}
.plainte-form p {
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
.plainte-submit {
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
.plainte-submit:hover {
    background: var(--vert-fvt-fonce);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(10,110,62,0.25);
}

#plainte-success {
    text-align: center;
    padding: 30px 10px;
}
#plainte-success i {
    font-size: 56px;
    color: var(--vert-fvt);
    margin-bottom: 16px;
}
#plainte-success h3 {
    font-family: 'Playfair Display', serif;
    color: var(--vert-fvt-fonce);
    font-size: 1.8rem;
    margin: 0 0 10px;
}
#plainte-success p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5a6a5f;
    font-size: 1.05rem;
    margin-bottom: 20px;
}
.plainte-reset {
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
    text-decoration: none;
}
.plainte-reset:hover {
    background: var(--vert-fvt);
    color: #fff;
}

.plainte-cta {
    background: linear-gradient(105deg, var(--vert-fvt-fonce) 0%, #042a19 100%);
    padding: 76px 0;
    text-align: center;
    margin-top: 40px;
    position: relative;
    overflow: hidden;
}
.plainte-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, var(--vert-fvt) 0 33%, var(--jaune-fvt) 33% 66%, var(--rouge-fvt) 66% 100%);
    opacity: 0.06;
}
.plainte-cta h2 {
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
.plainte-cta p {
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

@media (max-width: 992px) {
    .plainte-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    .plainte-info {
        order: 2;
    }
    .plainte-form {
        order: 1;
    }
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
}
@media (max-width: 768px) {
    .plainte-header h1 {
        font-size: 2.4rem;
    }
    .plainte-cta h2 {
        font-size: 1.8rem;
    }
    .plainte-form {
        padding: 24px 18px;
    }
    .plainte-info {
        padding: 24px 18px;
    }
}
@media (max-width: 576px) {
    .plainte-header h1 {
        font-size: 2rem;
    }
    .plainte-header__sub {
        font-size: 1rem;
    }
}
</style>

<!-- ===== EN‑TÊTE ===== -->
<section class="plainte-header">
    <div class="container">
        <nav class="breadcrumb-wrapper" aria-label="Fil d'Ariane">
            <ol>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li class="current">Plainte</li>
            </ol>
        </nav>
        <span class="plainte-header__badge"><i class="fas fa-gavel"></i> Togo Green Fund</span>
        <h1>Déposer une plainte</h1>
        <div class="title-underline"></div>
        <p class="plainte-header__sub">Utilisez ce formulaire pour signaler un manquement, une irrégularité ou tout comportement contraire à nos valeurs.</p>
    </div>
</section>

<!-- ===== CONTENU ===== -->
<section class="plainte-content">
    <div class="container">
        <div class="plainte-grid">

            <!-- COLONNE GAUCHE : INFOS -->
            <div class="plainte-info">
                <h2>Traitement des plaintes</h2>
                <ul class="plainte-info__list">
                    <?php foreach ( $infos_plainte as $info ) : ?>
                        <li><i class="fas fa-check-circle"></i> <?php echo esc_html( $info ); ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="plainte-info__contact">
                    <h3><i class="fas fa-headset"></i> Assistance et confidentialité</h3>
                    <p>Pour toute question concernant le processus, contactez notre référent éthique :</p>
                    <a href="mailto:ethique@togogreenfund.tg"><i class="fas fa-envelope"></i> ethique@togogreenfund.tg</a>
                    <a href="tel:+228XXXXXXXX"><i class="fas fa-phone-alt"></i> +228 20 22 30 40</a>
                </div>

                <div class="plainte-info__download">
                    <h3><i class="fas fa-file-pdf"></i> Charte éthique</h3>
                    <p>Téléchargez notre charte éthique pour connaître nos engagements.</p>
                    <a href="#" class="plainte-info__btn">
                        <i class="fas fa-download"></i> Télécharger la charte (PDF)
                    </a>
                </div>
            </div>

            <!-- COLONNE DROITE : FORMULAIRE -->
            <div class="plainte-form">
                <h2>Formulaire de plainte</h2>
                <p>Les champs marqués <span class="required">*</span> sont obligatoires.</p>

                <?php if ( ! empty( $success_ref ) ) : ?>
                    <div id="plainte-success" style="display:block;">
                        <i class="fas fa-check-circle"></i>
                        <h3>Votre plainte a été enregistrée</h3>
                        <p>Votre numéro de référence est : <strong><?php echo esc_html( $success_ref ); ?></strong></p>
                        <p>Nous vous remercions pour votre signalement. Un accusé de réception vous sera envoyé sous 48 heures.</p>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="plainte-reset">Déposer une autre plainte</a>
                    </div>
                <?php else : ?>
                    <?php if ( $error_code ) : ?>
                        <div style="background:#f8d7da; color:#721c24; padding:12px 20px; border-radius:8px; margin-bottom:20px;">
                            <strong>Erreur :</strong>
                            <?php if ( $error_code === 1 ) : ?>
                                Tous les champs obligatoires doivent être remplis.
                            <?php elseif ( $error_code === 2 ) : ?>
                                Vous devez accepter les conditions de traitement des données.
                            <?php elseif ( $error_code === 3 ) : ?>
                                Une erreur technique est survenue. Veuillez réessayer.
                            <?php else : ?>
                                Une erreur inattendue s'est produite.
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                        <input type="hidden" name="action" value="fvt_plainte">
                        <?php wp_nonce_field( 'fvt_plainte_action', 'fvt_plainte_nonce' ); ?>

                        <!-- Type de plainte -->
                        <div class="form-group">
                            <label for="type_plainte">Type de plainte <span class="required">*</span></label>
                            <select id="type_plainte" name="type_plainte" required>
                                <option value="">Sélectionnez un type</option>
                                <?php foreach ( $types_plainte as $type ) : ?>
                                    <option value="<?php echo esc_attr( $type ); ?>"><?php echo esc_html( $type ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Projet concerné (optionnel) -->
                        <div class="form-group">
                            <label for="projet">Projet concerné (facultatif)</label>
                            <input type="text" id="projet" name="projet" placeholder="Nom du projet concerné (si applicable)">
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description détaillée des faits <span class="required">*</span></label>
                            <textarea id="description" name="description" rows="6" placeholder="Décrivez les faits, les dates, les personnes impliquées, les preuves éventuelles..." required></textarea>
                        </div>

                        <!-- Pièce jointe -->
                        <div class="form-group">
                            <label for="fichier">Pièce(s) jointe(s) (PDF, image, doc, max 10 Mo)</label>
                            <input type="file" id="fichier" name="fichier" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" multiple>
                        </div>

                        <hr>

                        <!-- Identité du plaignant -->
                        <h3 style="font-family:'Playfair Display',serif; font-size:1.3rem; color:var(--vert-fvt-fonce); margin:0 0 16px;">Votre identité</h3>

                        <div class="form-group form-check">
                            <input type="checkbox" id="anonyme" name="anonyme">
                            <label for="anonyme">Je souhaite rester anonyme</label>
                        </div>

                        <div id="identite-fields">
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
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" id="consent" name="consent" required>
                            <label for="consent">Je certifie que les informations fournies sont exactes et j’accepte le traitement de mes données personnelles dans le cadre de cette plainte. <span class="required">*</span></label>
                        </div>

                        <button type="submit" class="plainte-submit">
                            <i class="fas fa-paper-plane"></i> Envoyer la plainte
                        </button>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="plainte-cta">
    <div class="container">
        <h2>Vous préférez nous contacter directement ?</h2>
        <div class="cta-divider"></div>
        <p>Notre référent éthique est à votre écoute en toute confidentialité.</p>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="cta-btn">
            Nous contacter <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- ===== JS ===== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action*="admin-post.php"]');
    if ( form ) {
        form.addEventListener('submit', function() {
            const btn = form.querySelector('.plainte-submit');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
        });
    }

    // Gestion de l'anonymat
    const anonymeCheck = document.getElementById('anonyme');
    const identiteFields = document.getElementById('identite-fields');
    const requiredFields = identiteFields ? identiteFields.querySelectorAll('input[required]') : [];

    if ( anonymeCheck && identiteFields ) {
        anonymeCheck.addEventListener('change', function() {
            if (this.checked) {
                identiteFields.style.display = 'none';
                requiredFields.forEach(function(field) {
                    field.removeAttribute('required');
                });
            } else {
                identiteFields.style.display = 'block';
                requiredFields.forEach(function(field) {
                    field.setAttribute('required', 'required');
                });
            }
        });
    }
});
</script>