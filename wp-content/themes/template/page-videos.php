<?php
/**
 * Template pour la page "Videos"
 * Nom du fichier : page-videos.php
 */

// Ajouter une classe CSS personnalisée au body pour faciliter le style
add_filter('body_class', function($classes) {
    $classes[] = 'videos';
    return $classes;
});

get_header(); ?>

<main>
    <?php get_template_part('template-parts/pages/videos'); ?>
</main>

<?php get_footer(); ?>