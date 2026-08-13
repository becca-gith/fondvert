<?php
/**
 * Template pour la page "Resultat"
 * Nom du fichier : page-resultat.php
 */

// Ajouter une classe CSS personnalisée au body pour faciliter le style
add_filter('body_class', function($classes) {
    $classes[] = 'resultat';
    return $classes;
});

get_header(); ?>

<main>
    <?php get_template_part('template-parts/pages/resultat'); ?>
</main>

<?php get_footer(); ?>