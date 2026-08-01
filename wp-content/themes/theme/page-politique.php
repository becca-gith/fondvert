<?php
/**
 * Template pour la page "Mission"
 * Nom du fichier : page-mission.php
 */

// Ajouter une classe CSS personnalisée au body pour faciliter le style
add_filter('body_class', function($classes) {
    $classes[] = 'politique';
    return $classes;
});

get_header(); ?>

<main>
    <?php get_template_part('template-parts/pages/politique'); ?>
</main>

<?php get_footer(); ?>