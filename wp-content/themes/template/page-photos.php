<?php
/**
 * Template pour la page "Photos"
 * Nom du fichier : page-photos.php
 */

// Ajouter une classe CSS personnalisée au body pour faciliter le style
add_filter('body_class', function($classes) {
    $classes[] = 'photos';
    return $classes;
});

get_header(); ?>

<main>
    <?php get_template_part('template-parts/pages/photos'); ?>
</main>

<?php get_footer(); ?>