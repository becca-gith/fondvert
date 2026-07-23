<?php
/**
 * Template part pour la page Adhésion – version harmonisée avec le header ATC
 * Couleurs : bleu #011875, rouge #B92F29, jaune #FFCC00
 */

// Traitement du formulaire d'adhésion
$success = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adhesion_submit'])) {
    $fullname = sanitize_text_field($_POST['fullname']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $city = sanitize_text_field($_POST['city']);
    $motivation = sanitize_textarea_field($_POST['motivation']);
    
    if (empty($fullname)) $errors[] = 'Veuillez saisir votre nom complet.';
    if (empty($email) || !is_email($email)) $errors[] = 'Veuillez saisir un email valide.';
    if (empty($phone)) $errors[] = 'Veuillez saisir votre téléphone.';
    
    if (empty($errors)) {
        $to = get_option('admin_email');
        $subject = 'Nouvelle demande d’adhésion - ATC';
        $body = "Nom complet : $fullname\nEmail : $email\nTéléphone : $phone\nVille : $city\n\nMessage / Motivation :\n$motivation\n\n---\nÀ traiter par le responsable adhésion.";
        $headers = ['Reply-To: ' . $email];
        if (wp_mail($to, $subject, $body, $headers)) {
            $success = true;
        } else {
            $errors[] = 'Une erreur technique est survenue. Veuillez réessayer plus tard.';
        }
    }
}
?>

<!-- ===== BREADCRUMB + TITRE CENTRÉ ===== -->
<section class="adhesion-header">
    <div class="container">
        <nav class="breadcrumb-wrapper">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li class="current">Adhésion</li>
            </ul>
        </nav>
        <h1>Devenir membre</h1>
        <div class="title-underline"></div>
       
    </div>
</section>

<!-- ===== SECTION ADHÉSION ===== -->
<section class="adhesion-main">
    <div class="container">
        <div class="adhesion-grid">
            
            <!-- Colonne avantages -->
            <div class="adhesion-benefits">
                <div class="benefits-card">
                    <h3>Pourquoi adhérer ?</h3>
                    <ul class="benefits-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Assistance juridique incluse dès le premier jour</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Accès à nos revues et guides d’achat exclusifs</span>
                        </li>
                       
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Réseau de 1 000+ consommateurs engagés</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Participation aux instances de décision</span>
                        </li>
                    </ul>
                    <div class="benefits-footer">
                        <p>Cotisation mensuelle : <strong>2 000 FCFA</strong></p>
                    </div>
                </div>
            </div>

            <!-- Colonne formulaire -->
            <div class="adhesion-form-col">
                <div class="adhesion-form-card">
                    <h3>Formulaire d’inscription</h3>
                    <p>Remplissez ce formulaire, nous vous recontacterons dans les 48h.</p>

                    <?php if ($success) : ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> Votre demande d’adhésion a bien été enregistrée. Merci !
                        </div>
                    <?php elseif (!empty($errors)) : ?>
                        <div class="alert alert-error">
                            <?php foreach ($errors as $error) : ?>
                                <div><i class="fas fa-exclamation-circle"></i> <?php echo esc_html($error); ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <div class="form-group">
                            <input type="text" name="fullname" class="form-control" placeholder="Nom complet" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Adresse email" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Téléphone (WhatsApp)" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="city" class="form-control" placeholder="Ville de résidence">
                        </div>
                        <div class="form-group">
                            <textarea name="motivation" rows="5" class="form-control" placeholder="Pourquoi souhaitez-vous adhérer ? (optionnel)"></textarea>
                        </div>
                        <button type="submit" name="adhesion_submit" class="btn-submit">
                            Je m’inscris <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                    <p class="form-footer">Vos informations sont confidentielles et ne seront jamais partagées.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECTION CTA ===== -->
<section class="adhesion-cta">
    <div class="container">
        <h3>Vous avez des questions ?</h3>
        <p>Contactez-nous directement par téléphone ou email.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-outline">
            Nous contacter <i class="fas fa-phone-alt"></i>
        </a>
    </div>
</section>

<style>
/* ============================================================
   PAGE ADHÉSION – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
   ============================================================ */
:root {
    --bleu-atc:   #011875;
    --rouge-atc:  #B92F29;
    --jaune-atc:  #FFCC00;
    --gris-fond:  #f8fafc;
    --gris-texte: #4b5563;
    --gris-clair: #e2e8f0;
}

/* --- En-tête --- */
.adhesion-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.adhesion-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--bleu-atc), var(--jaune-atc), var(--rouge-atc), var(--jaune-atc), var(--bleu-atc));
}
.breadcrumb-wrapper ul {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
}
.breadcrumb-wrapper ul li a {
    color: #5b6e8c;
    text-decoration: none;
    transition: color 0.2s;
}
.breadcrumb-wrapper ul li a:hover {
    color: var(--rouge-atc);
}
.breadcrumb-wrapper ul li a i {
    margin-right: 5px;
    font-size: 0.8rem;
}
.breadcrumb-wrapper .separator {
    color: var(--rouge-atc);
    font-weight: 300;
}
.breadcrumb-wrapper .current {
    color: var(--bleu-atc);
    font-weight: 600;
}
.adhesion-header h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--bleu-atc);
    font-size: 3rem;
    letter-spacing: -0.5px;
    margin: 10px 0 0 0;
}
.title-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--jaune-atc), var(--rouge-atc));
    margin: 20px auto 10px;
    border-radius: 4px;
}
.subtitle {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5b6e8c;
    font-size: 1rem;
    margin: 0;
}

/* --- Corps principal --- */
.adhesion-main {
    padding: 60px 0 80px;
    background: #ffffff;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}
.adhesion-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
}

/* Colonne avantages */
.adhesion-benefits {
    flex: 1.2;
    min-width: 280px;
}
.benefits-card {
    background: linear-gradient(145deg, var(--bleu-atc), #010f52);
    border-radius: 32px;
    padding: 40px 30px;
    color: #ffffff;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 10px 30px rgba(1,24,117,0.15);
}
.benefits-card h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    font-size: 1.8rem;
    margin: 0 0 25px 0;
}
.benefits-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.benefits-list li {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 20px;
}
.benefits-list li:last-child {
    margin-bottom: 0;
}
.benefits-list i {
    font-size: 1.3rem;
    color: var(--jaune-atc);
    flex-shrink: 0;
    margin-top: 2px;
}
.benefits-list span {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    line-height: 1.5;
}
.benefits-list strong {
    color: var(--jaune-atc);
}
.benefits-footer {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.15);
}
.benefits-footer p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    opacity: 0.8;
    margin: 0;
}
.benefits-footer strong {
    color: var(--jaune-atc);
    font-size: 1.1rem;
}

/* Colonne formulaire */
.adhesion-form-col {
    flex: 2;
    min-width: 320px;
}
.adhesion-form-card {
    background: #ffffff;
    border: 1px solid var(--gris-clair);
    border-radius: 32px;
    padding: 45px 40px;
    box-shadow: 0 8px 24px rgba(1,24,117,0.04);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.adhesion-form-card h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    color: var(--bleu-atc);
    font-size: 1.8rem;
    margin: 0 0 10px 0;
}
.adhesion-form-card > p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5b6e8c;
    margin-bottom: 30px;
}

/* Alertes */
.alert {
    padding: 16px 20px;
    border-radius: 16px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    margin-bottom: 25px;
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.alert-success {
    background: #e6f4ea;
    border-left: 4px solid #2e7d32;
    color: #1e4620;
}
.alert-error {
    background: #fce8e6;
    border-left: 4px solid #c62828;
    color: #b71c1c;
}
.alert i {
    margin-right: 8px;
}

/* Formulaire */
.form-group {
    width: 100%;
    margin-bottom: 16px;
}
.form-row {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}
.form-row .form-group {
    flex: 1 1 calc(50% - 16px);
    min-width: 200px;
}
.form-control {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid var(--gris-clair);
    border-radius: 50px;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    transition: border-color 0.2s, box-shadow 0.2s;
    background: #fcfcfd;
}
.form-control:focus {
    border-color: var(--jaune-atc);
    outline: none;
    box-shadow: 0 0 0 3px rgba(255,204,0,0.15);
}
textarea.form-control {
    border-radius: 24px;
    resize: vertical;
}
.btn-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(135deg, var(--bleu-atc), #010f52);
    color: #ffffff;
    padding: 14px 36px;
    border-radius: 50px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(1,24,117,0.25);
    width: 100%;
}
.btn-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(1,24,117,0.35);
    background: linear-gradient(135deg, #0a2a9e, var(--bleu-atc));
}
.btn-submit i {
    transition: transform 0.3s;
}
.btn-submit:hover i {
    transform: translateX(4px);
}
.form-footer {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.75rem;
    color: #8aa4bc;
    text-align: center;
    margin-top: 20px;
}

/* --- CTA final --- */
.adhesion-cta {
    background: var(--gris-fond);
    padding: 50px 0;
    text-align: center;
}
.adhesion-cta h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--bleu-atc);
    font-size: 1.6rem;
    margin: 0 0 10px 0;
}
.adhesion-cta p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5b6e8c;
    margin-bottom: 20px;
}
.btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: transparent;
    border: 2px solid var(--rouge-atc);
    color: var(--rouge-atc);
    padding: 12px 32px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
}
.btn-outline:hover {
    background: var(--rouge-atc);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(185,47,41,0.25);
}

/* --- Responsive --- */
@media (max-width: 768px) {
    .adhesion-header h1 {
        font-size: 2.2rem;
    }
    .adhesion-grid {
        flex-direction: column;
        gap: 30px;
    }
    .adhesion-form-card {
        padding: 30px 20px !important;
    }
    .benefits-card {
        padding: 30px 20px !important;
    }
    .form-row .form-group {
        flex: 1 1 100%;
    }
}
</style>