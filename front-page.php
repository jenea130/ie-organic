<?php

/**
 * Template Name: Front page
 */
get_header();
?>
<?php get_template_part('template-parts/home/home-intro'); ?>
<div class="container">
  <?php get_template_part('template-parts/home/natural'); ?>
</div>
<?php get_template_part('template-parts/home/believe'); ?>
<div class="container">
  <?php get_template_part('template-parts/home/products'); ?>
</div>
<?php get_template_part('template-parts/home/customer'); ?>
<?php get_template_part('template-parts/home/organic'); ?>


<?php get_footer(); ?>