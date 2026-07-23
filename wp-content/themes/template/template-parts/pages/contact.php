<?php
/**
 * Template part pour la page Contact – version harmonisée avec le header ATC
 * Couleurs : bleu #011875, rouge #B92F29, jaune #FFCC00
 */

// Traitement du formulaire
$success = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);
    
    if (empty($name)) $errors[] = 'Veuillez saisir votre nom.';
    if (empty($email) || !is_email($email)) $errors[] = 'Veuillez saisir un email valide.';
    if (empty($message)) $errors[] = 'Veuillez saisir votre message.';
    
    if (empty($errors)) {
        $to = get_option('admin_email');
        $subject = 'Message depuis le formulaire de contact - ATC';
        $body = "Nom : $name\nEmail : $email\nTéléphone : $phone\n\nMessage :\n$message";
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
<section class="contact-header">
    <div class="container">
        <nav class="breadcrumb-wrapper">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="separator">›</li>
                <li class="current">Contact</li>
            </ul>
        </nav>
        <h1>Nous contacter</h1>
        <div class="title-underline"></div>
       
    
    </div>
</section>

<!-- ===== SECTION CONTACT (2 COLONNES) ===== -->
<section class="contact-main">
    <div class="container">
        <div class="contact-grid">
            
            <!-- Colonne informations -->
            <div class="contact-infos-col">
                <div class="contact-infos-card">
                    <h3>Coordonnées</h3>
                    <ul class="contact-list">
                        <li>
                            <span class="contact-icon"><i class="fas fa-map-marker-alt"></i></span>
                            <div>
                                <strong>Adresse :</strong>
                                <span>76 Boulevard du 13 Janvier, Lomé – Togo</span>
                            </div>
                        </li>
                        <li>
                            <span class="contact-icon"><i class="fas fa-phone-alt"></i></span>
                            <div>
                                <strong>Téléphone :</strong>
                                <span>+228 90 04 35 10</span>
                            </div>
                        </li>
                        <li>
                            <span class="contact-icon"><i class="fas fa-envelope"></i></span>
                            <div>
                                <strong>Email :</strong>
                                <span>atctogo@yahoo.fr</span>
                            </div>
                        </li>
                        <li>
                            <span class="contact-icon"><i class="fas fa-clock"></i></span>
                            <div>
                                <strong>Horaires :</strong>
                                <span>Lundi – Vendredi : 8h – 17h</span>
                            </div>
                        </li>
                    </ul>
                    <div class="contact-social">
                        <p>Suivez-nous</p>
                        <div class="social-icons">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne formulaire -->
            <div class="contact-form-col">
                <div class="contact-form-card">
                    <h3>Envoyez-nous un message</h3>
                    <p>Nous vous répondrons dans les meilleurs délais.</p>

                    <?php if ($success) : ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> Votre message a bien été envoyé. Merci !
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
                                <input type="text" name="name" class="form-control" placeholder="Votre nom complet" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Adresse email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Téléphone (optionnel)">
                        </div>
                        <div class="form-group">
                            <textarea name="message" rows="6" class="form-control" placeholder="Votre message..." required></textarea>
                        </div>
                        <button type="submit" name="contact_submit" class="btn-submit">
                            Envoyer le message <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Carte Google Maps -->
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63456.589125245!2d1.2032!3d6.1319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1023f6e4b3b8f8c1%3A0x3f5b1f8c8b2c1a5!2sLom%C3%A9%2C%20Togo!5e0!3m2!1sfr!2sfr!4v1644345678901!5m2!1sfr!2sfr" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" title="Carte ATC"></iframe>
        </div>
    </div>
</section>

<style>
/* ============================================================
   PAGE CONTACT – CHARTE ATC (BLEU #011875, ROUGE #B92F29, JAUNE #FFCC00)
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
.contact-header {
    background: linear-gradient(135deg, var(--gris-fond) 0%, #ffffff 100%);
    padding: 40px 0 50px;
    text-align: center;
    border-bottom: 1px solid #eef2f7;
    position: relative;
}
.contact-header::after {
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
.contact-header h1 {
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
.contact-main {
    padding: 60px 0 80px;
    background: #ffffff;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
}
.contact-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    margin-bottom: 50px;
}

/* Colonne informations */
.contact-infos-col {
    flex: 1.2;
    min-width: 280px;
}
.contact-infos-card {
    background: var(--gris-fond);
    border-radius: 28px;
    padding: 40px 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border: 1px solid rgba(1,24,117,0.04);
}
.contact-infos-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--bleu-atc);
    margin: 0 0 25px 0;
}
.contact-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.contact-list li {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 25px;
}
.contact-list li:last-child {
    margin-bottom: 0;
}
.contact-icon {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
    background: rgba(185,47,41,0.08);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: var(--rouge-atc);
    transition: background 0.3s, color 0.3s;
}
.contact-list li:hover .contact-icon {
    background: var(--bleu-atc);
    color: #ffffff;
}
.contact-list li div {
    font-family: 'Kumbh Sans', sans-serif;
    color: #475569;
    font-size: 0.95rem;
}
.contact-list li strong {
    display: block;
    color: var(--bleu-atc);
    font-weight: 700;
    margin-bottom: 2px;
}
.contact-list li span {
    display: block;
}

/* Réseaux sociaux */
.contact-social {
    margin-top: 40px;
}
.contact-social p {
    font-family: 'Kumbh Sans', sans-serif;
    font-weight: 700;
    color: var(--bleu-atc);
    margin: 0 0 12px 0;
}
.social-icons {
    display: flex;
    gap: 12px;
}
.social-icons a {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--bleu-atc);
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    text-decoration: none;
}
.social-icons a:hover {
    background: var(--jaune-atc);
    color: var(--bleu-atc);
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(1,24,117,0.2);
}

/* Colonne formulaire */
.contact-form-col {
    flex: 2;
    min-width: 320px;
}
.contact-form-card {
    background: #ffffff;
    border: 1px solid var(--gris-clair);
    border-radius: 28px;
    padding: 40px 35px;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 8px 24px rgba(1,24,117,0.04);
}
.contact-form-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--bleu-atc);
    margin: 0 0 10px 0;
}
.contact-form-card > p {
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
textarea.form-control {
    border-radius: 24px;
    resize: vertical;
}
.btn-submit {
    display: inline-flex;
    align-items: center;
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
    margin-top: 8px;
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

/* Carte Google Maps */
.contact-map {
    border-radius: 28px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(1,24,117,0.06);
    border: 1px solid var(--gris-clair);
}
.contact-map iframe {
    display: block;
}

/* --- Responsive --- */
@media (max-width: 768px) {
    .contact-header h1 {
        font-size: 2.2rem;
    }
    .contact-grid {
        flex-direction: column;
        gap: 30px;
    }
    .contact-form-card {
        padding: 30px 20px !important;
    }
    .contact-infos-card {
        padding: 30px 20px !important;
    }
    .form-row .form-group {
        flex: 1 1 100%;
    }
}
</style>