<?php
/**
 * Template pour la page "Activites"
 * Nom du fichier : page-activites.php
 */

// Ajouter une classe CSS personnalisée au body pour faciliter le style
add_filter('body_class', function($classes) {
    $classes[] = 'objectifs';
    return $classes;
});

get_header(); ?>

<main>
    <?php get_template_part('template-parts/pages/infos-pratiques'); ?>
</main>

<?php get_footer(); ?>