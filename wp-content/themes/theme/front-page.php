<?php
/**
 * Page d'accueil - Fonds Vert du Togo
 *
 * @package FondsVertTogo
 */

get_header();
?>

<main id="fvt-main-content">

	<?php get_template_part( 'template-parts/contents/banniere' );  ?>

<?php get_template_part( 'template-parts/contents/about' ); ?>

<?php get_template_part( 'template-parts/contents/stats' ); ?>

<?php get_template_part( 'template-parts/contents/news' ); ?>



<?php get_template_part( 'template-parts/contents/projets' ); ?>

<?php get_template_part( 'template-parts/contents/faq' ); ?>

<?php get_template_part( 'template-parts/contents/partners' ); ?>




</main>

<?php get_footer(); ?>