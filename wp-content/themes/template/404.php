<?php
/**
 * Page d'erreur 404 – Fichier : 404.php
 * Charte graphique : vert, jaune, rouge (drapeau togolais)
 */

get_header(); ?>

<div class="error-404-page" style="background: #ffffff; min-height: 70vh; display: flex; align-items: center; justify-content: center; padding: 80px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div class="error-content" style="text-align: center;">
            <!-- Code 404 stylisé -->
            <div class="error-code" style="font-family: 'Playfair Display', serif; font-size: 8rem; font-weight: 800; color: #006A4E; line-height: 1; margin-bottom: 20px;">404</div>
            <div style="width: 80px; height: 4px; background: linear-gradient(90deg, #FCD116, #CE1126); margin: 0 auto 30px;"></div>
            <h1 style="font-family: 'Playfair Display', serif; font-size: 2.2rem; font-weight: 700; color: #006A4E; margin-bottom: 20px;">Page non trouvée</h1>
            <p style="font-family: 'Kumbh Sans', sans-serif; font-size: 1.1rem; color: #5b6e8c; max-width: 500px; margin: 0 auto 30px;">
                Oups ! La page que vous recherchez semble introuvable. Elle a peut-être été déplacée ou supprimée.
            </p>
            <div class="error-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-home" style="display: inline-flex; align-items: center; gap: 10px; background: linear-gradient(135deg, #CE1126, #9e0b1f); color: white; padding: 12px 32px; border-radius: 50px; font-weight: 700; text-decoration: none; transition: 0.3s;">
                    <i class="fas fa-home"></i> Retour à l'accueil
                </a>
            </div>
            <!-- Option : champ de recherche -->
            <div class="error-search" style="margin-top: 50px;">
                <p style="font-family: 'Kumbh Sans', sans-serif; color: #5b6e8c; margin-bottom: 15px;">Ou rechercher sur le site :</p>
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>" style="max-width: 400px; margin: 0 auto;">
                    <div style="display: flex; gap: 10px;">
                        <input type="search" class="search-field" placeholder="Rechercher..." value="" name="s" style="flex: 1; padding: 12px 18px; border: 1px solid #e2e8f0; border-radius: 50px; font-family: 'Kumbh Sans', sans-serif; background: #f8fafc;">
                        <button type="submit" class="search-submit" style="background: #006A4E; border: none; border-radius: 50px; padding: 0 20px; color: white; cursor: pointer; transition: 0.3s;"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-home:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(206,17,38,0.3);
    }
    .search-submit:hover {
        background: #FCD116;
        color: #004d2e;
    }
    @media (max-width: 768px) {
        .error-code {
            font-size: 5rem !important;
        }
        h1 {
            font-size: 1.8rem !important;
        }
    }
</style>

<?php get_footer(); ?>