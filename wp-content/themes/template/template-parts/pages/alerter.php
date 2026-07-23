<?php
/**
 * Template part pour la page "Nous alerter" – signalement de problèmes de consommation
 * Version harmonisée avec le header ATC
 * Couleurs : bleu #011875, rouge #B92F29, jaune #FFCC00
 */

// Traitement du formulaire d'alerte
$success = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alerte_submit'])) {
    $fullname = sanitize_text_field($_POST['fullname']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $alert_type = sanitize_text_field($_POST['alert_type']);
    $description = sanitize_textarea_field($_POST['description']);
    $company = sanitize_text_field($_POST['company']);

    // Validation
    if (empty($fullname)) $errors[] = 'Veuillez saisir votre nom complet.';
    if (empty($email) || !is_email($email)) $errors[] = 'Veuillez saisir un email valide.';
    if (empty($phone)) $errors[] = 'Veuillez saisir votre numéro de téléphone.';
    if (empty($alert_type)) $errors[] = 'Veuillez sélectionner le type d\'alerte.';
    if (empty($description)) $errors[] = 'Veuillez décrire le problème en détail.';

    if (empty($errors)) {
        $to = get_option('admin_email');
        $subject = '🛑 Nouvelle alerte consommateur - ATC';
        $body = "Nom complet : $fullname\n";
        $body .= "Email : $email\n";
        $body .= "Téléphone : $phone\n";
        $body .= "Type d'alerte : $alert_type\n";
        if (!empty($company)) $body .= "Entreprise / produit concerné : $company\n";
        $body .= "\n--- DESCRIPTION DU PROBLÈME ---\n$description\n\n";
        $body .= "---\nÀ traiter par l'équipe juridique de l'ATC.";

        $headers = ['Reply-To: ' . $email];
        if (wp_mail($to, $subject, $body, $headers)) {
            $success = true;
        } else {
            $errors[] = 'Une erreur technique est survenue. Veuillez réessayer plus tard ou nous contacter par téléphone.';
        }
    }
}
?>

<!-- ===== BREADCRUMB + TITRE CENTRÉ ===== -->
<section class="alerte-header">
    <div class="container">
        <nav class="breadcrumb-wrapper">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li class="current">Nous alerter</li>
            </ul>
        </nav>
        <h1>Nous alerter</h1>
        <div class="title-underline"></div>
       
    </div>
</section>

<!-- ===== SECTION ALERTE (2 COLONNES) ===== -->
<section class="alerte-main">
    <div class="container">
        <div class="alerte-intro">
            <i class="fas fa-shield-alt"></i>
            <p>Votre signalement est essentiel pour protéger les consommateurs togolais. L’ATC s’engage à traiter chaque alerte avec la plus grande confidentialité et à vous accompagner dans la résolution de votre litige.</p>
        </div>

        <div class="alerte-grid">
            <!-- Colonne gauche : types d'alertes + informations -->
            <div class="alerte-infos-col">
                <div class="alerte-infos-card">
                    <h3>Types de signalement</h3>
                    <ul class="alerte-types-list">
                        <li>
                            <span class="type-icon"><i class="fas fa-store-alt"></i></span>
                            <div>
                                <strong>Arnaque commerciale</strong>
                                <span>Publicité mensongère, vente forcée, faux sites de vente</span>
                            </div>
                        </li>
                        <li>
                            <span class="type-icon"><i class="fas fa-box-open"></i></span>
                            <div>
                                <strong>Produit défectueux</strong>
                                <span>Article cassé, non conforme, date de péremption dépassée</span>
                            </div>
                        </li>
                        <li>
                            <span class="type-icon"><i class="fas fa-file-invoice"></i></span>
                            <div>
                                <strong>Facturation abusive</strong>
                                <span>Surcoût injustifié, frais cachés, non-respect des tarifs affichés</span>
                            </div>
                        </li>
                        <li>
                            <span class="type-icon"><i class="fas fa-phone-alt"></i></span>
                            <div>
                                <strong>Démarchage abusif</strong>
                                <span>Appels intempestifs, SMS frauduleux, harcèlement téléphonique</span>
                            </div>
                        </li>
                        <li>
                            <span class="type-icon"><i class="fas fa-handshake"></i></span>
                            <div>
                                <strong>Service non rendu</strong>
                                <span>Prestation payée non exécutée, retard anormal, mauvaise exécution</span>
                            </div>
                        </li>
                    </ul>
                    <div class="alerte-confidentialite">
                        <i class="fas fa-lock"></i>
                        <p>Toutes les informations restent <strong>strictement confidentielles</strong>. L’ATC ne divulgue jamais l’identité des plaignants sans leur consentement.</p>
                    </div>
                </div>
            </div>

            <!-- Colonne droite : formulaire d'alerte -->
            <div class="alerte-form-col">
                <div class="alerte-form-card">
                    <h3>Formulaire de signalement</h3>
                    <p>Remplissez ce formulaire, nous vous recontacterons sous 72h maximum.</p>

                    <?php if ($success) : ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> Votre alerte a bien été enregistrée. L’équipe de l’ATC vous recontactera rapidement. Merci pour votre vigilance !
                        </div>
                    <?php elseif (!empty($errors)) : ?>
                        <div class="alert alert-error">
                            <?php foreach ($errors as $error) : ?>
                                <div><i class="fas fa-exclamation-circle"></i> <?php echo esc_html($error); ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="fullname" class="form-control" placeholder="Votre nom complet" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Adresse email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Téléphone (WhatsApp / Mobile)" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="company" class="form-control" placeholder="Entreprise ou produit concerné (optionnel)">
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="alert_type" class="form-control" required>
                                <option value="">Sélectionnez le type d'alerte</option>
                                <option value="Arnaque commerciale">Arnaque commerciale</option>
                                <option value="Produit défectueux">Produit défectueux</option>
                                <option value="Facturation abusive">Facturation abusive</option>
                                <option value="Démarchage abusif">Démarchage abusif</option>
                                <option value="Service non rendu">Service non rendu</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="6" class="form-control" placeholder="Décrivez précisément le problème (date, lieu, montant, etc.)" required></textarea>
                        </div>
                        <button type="submit" name="alerte_submit" class="btn-submit">
                            <i class="fas fa-exclamation-triangle"></i> Envoyer l'alerte
                        </button>
                    </form>
                    <p class="form-footer"><i class="fas fa-info-circle"></i> Tous les champs marqués d'un astérisque (*) sont obligatoires.</p>
                </div>
            </div>
        </div>

        <!-- Ligne supplémentaire : conseils avant signalement -->
        <div class="alerte-conseils">
            <div class="conseil-item">
                <i class="fas fa-save"></i>
                <div>
                    <h4>Conservez les preuves</h4>
                    <p>Gardez vos tickets, captures d’écran, emails et tout document utile.</p>
                </div>
            </div>
            <div class="conseil-item">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <h4>Contactez d'abord le professionnel</h4>
                    <p>Nous vous conseillons d’abord de contacter le vendeur pour un règlement amiable.</p>
                </div>
            </div>
            <div class="conseil-item">
                <i class="fas fa-clock"></i>
                <div>
                    <h4>Délai de traitement</h4>
                    <p>Notre équipe s’engage à vous répondre dans les 72 heures suivant votre signalement.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== APPEL À L'ACTION ===== -->
<section class="alerte-cta">
    <div class="container">
        <h2>Besoin d’une assistance urgente ?</h2>
        <div class="cta-divider"></div>
       
        <div class="cta-buttons">
            <a href="tel:+22890043510" class="cta-btn phone">
                <i class="fas fa-phone-alt"></i> Appeler le 90 04 35 10
            </a>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-btn outline">
                <i class="fas fa-envelope"></i> Nous contacter
            </a>
        </div>
    </div>
</section>

<style>
/* ============================================================
   PAGE ALERTER – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
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
.alerte-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.alerte-header::after {
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
.alerte-header h1 {
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
.alerte-main {
    padding: 50px 0 70px;
    background: #ffffff;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}

.alerte-intro {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    background: var(--gris-fond);
    border-radius: 20px;
    padding: 24px 28px;
    margin-bottom: 40px;
    border-left: 4px solid var(--rouge-atc);
}
.alerte-intro i {
    font-size: 2rem;
    color: var(--rouge-atc);
    flex-shrink: 0;
    margin-top: 4px;
}
.alerte-intro p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1.05rem;
    line-height: 1.7;
    color: #1e293b;
    margin: 0;
}

.alerte-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
}

/* Colonne informations */
.alerte-infos-col {
    flex: 1.2;
    min-width: 280px;
}
.alerte-infos-card {
    background: var(--gris-fond);
    border-radius: 28px;
    padding: 35px 28px;
    height: 100%;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(1,24,117,0.04);
}
.alerte-infos-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--bleu-atc);
    margin: 0 0 20px 0;
}
.alerte-types-list {
    list-style: none;
    padding: 0;
    margin: 0 0 25px 0;
}
.alerte-types-list li {
    display: flex;
    gap: 14px;
    padding: 14px 0;
    border-bottom: 1px solid rgba(0,0,0,0.04);
}
.alerte-types-list li:last-child {
    border-bottom: none;
}
.type-icon {
    flex-shrink: 0;
    width: 38px;
    height: 38px;
    background: rgba(185,47,41,0.08);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    color: var(--rouge-atc);
    transition: background 0.3s, color 0.3s;
}
.alerte-types-list li:hover .type-icon {
    background: var(--bleu-atc);
    color: #ffffff;
}
.alerte-types-list li div {
    flex: 1;
}
.alerte-types-list li strong {
    display: block;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--bleu-atc);
    margin-bottom: 2px;
}
.alerte-types-list li span {
    display: block;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.85rem;
    color: #64748b;
    line-height: 1.4;
}
.alerte-confidentialite {
    display: flex;
    gap: 14px;
    background: rgba(1,24,117,0.05);
    border-radius: 16px;
    padding: 18px 20px;
    margin-top: auto;
}
.alerte-confidentialite i {
    font-size: 1.4rem;
    color: var(--jaune-atc);
    flex-shrink: 0;
    margin-top: 2px;
}
.alerte-confidentialite p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    color: #475569;
    margin: 0;
    line-height: 1.5;
}
.alerte-confidentialite p strong {
    color: var(--bleu-atc);
}

/* Colonne formulaire */
.alerte-form-col {
    flex: 2;
    min-width: 320px;
}
.alerte-form-card {
    background: #ffffff;
    border: 1px solid var(--gris-clair);
    border-radius: 28px;
    padding: 40px 35px;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 8px 24px rgba(1,24,117,0.04);
}
.alerte-form-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--bleu-atc);
    margin: 0 0 10px 0;
}
.alerte-form-card > p {
    font-family: 'Kumbh Sans', sans-serif;
    color: #5b6e8c;
    margin-bottom: 25px;
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
.form-row {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 16px;
}
.form-group {
    flex: 1 1 100%;
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
select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23475569' stroke-width='1.5' fill='none'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 18px center;
    padding-right: 44px;
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
    width: 100%;
    background: linear-gradient(135deg, var(--rouge-atc), #8f1f1a);
    color: #ffffff;
    padding: 16px 36px;
    border-radius: 50px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    box-shadow: 0 4px 15px rgba(185,47,41,0.25);
    margin-top: 8px;
}
.btn-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(185,47,41,0.35);
    background: linear-gradient(135deg, #e03a2a, var(--rouge-atc));
}
.btn-submit i {
    transition: transform 0.3s;
}
.btn-submit:hover i {
    transform: translateX(4px);
}
.form-footer {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.8rem;
    color: #94a3b8;
    margin-top: 16px;
    text-align: center;
}
.form-footer i {
    margin-right: 6px;
    color: var(--rouge-atc);
}

/* Conseils supplémentaires */
.alerte-conseils {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 24px;
    margin-top: 50px;
}
.conseil-item {
    display: flex;
    gap: 16px;
    background: var(--gris-fond);
    border-radius: 20px;
    padding: 22px 24px;
    transition: transform 0.3s, box-shadow 0.3s;
    border: 1px solid rgba(1,24,117,0.04);
}
.conseil-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(1,24,117,0.06);
}
.conseil-item i {
    font-size: 1.6rem;
    color: var(--bleu-atc);
    flex-shrink: 0;
    margin-top: 4px;
}
.conseil-item h4 {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: var(--bleu-atc);
    margin: 0 0 4px 0;
}
.conseil-item p {
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 0.9rem;
    color: #64748b;
    margin: 0;
    line-height: 1.5;
}

/* --- CTA final --- */
.alerte-cta {
    background: linear-gradient(105deg, var(--bleu-atc) 0%, #010f52 100%);
    padding: 70px 0;
    text-align: center;
}
.alerte-cta h2 {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 800;
    color: #fff;
    font-size: 2rem;
    margin: 0 0 10px 0;
}
.cta-divider {
    width: 60px;
    height: 3px;
    background: var(--jaune-atc);
    margin: 10px auto 20px;
}
.alerte-cta p {
    font-family: 'Kumbh Sans', sans-serif;
    color: rgba(255,255,255,0.85);
    font-size: 1.1rem;
    margin-bottom: 30px;
}
.alerte-cta p strong {
    color: var(--jaune-atc);
}
.cta-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 16px;
}
.cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 32px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    font-family: 'Kumbh Sans', sans-serif;
    font-size: 1rem;
}
.cta-btn.phone {
    background: var(--jaune-atc);
    color: var(--bleu-atc);
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}
.cta-btn.phone:hover {
    background: #ffffff;
    color: var(--bleu-atc);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}
.cta-btn.outline {
    background: transparent;
    color: #ffffff;
    border: 2px solid rgba(255,255,255,0.3);
}
.cta-btn.outline:hover {
    background: rgba(255,255,255,0.1);
    border-color: var(--jaune-atc);
    transform: translateY(-3px);
}

/* --- Responsive --- */
@media (max-width: 768px) {
    .alerte-header h1 {
        font-size: 2.2rem;
    }
    .alerte-grid {
        flex-direction: column;
        gap: 30px;
    }
    .alerte-form-card {
        padding: 30px 20px !important;
    }
    .alerte-infos-card {
        padding: 28px 20px !important;
    }
    .form-row .form-group {
        flex: 1 1 100%;
    }
    .alerte-conseils {
        grid-template-columns: 1fr;
    }
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    .cta-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>