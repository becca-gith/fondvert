<?php
/**
 * Template pour la page "Historique"
 * Nom du fichier : page-historique.php
 */

// Ajouter une classe CSS personnalisée au body pour faciliter le style
add_filter('body_class', function($classes) {
    $classes[] = 'page-mot-du-directeur';
    return $classes;
});

get_header(); ?>

<main>
    <?php get_template_part('template-parts/pages/mot-du-directeur'); ?>
</main>

<?php get_footer(); ?>