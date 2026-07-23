<?php get_header(); ?>

<main>

  <?php get_template_part('template-parts/contents/banniere'); ?>
  <?php get_template_part('template-parts/contents/presentation'); ?>
  <?php get_template_part('template-parts/contents/services'); ?>

  <?php get_template_part('template-parts/contents/marches'); ?>
  <?php get_template_part('template-parts/contents/chiffres'); ?>
  <?php get_template_part('template-parts/contents/faq'); ?>

  <?php get_template_part('template-parts/contents/partenaires'); // Liste des partenaires, juste avant le footer ?>

</main>

<?php get_footer(); ?>