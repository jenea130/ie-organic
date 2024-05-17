<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
pageIntroComponent($page_intro, '');
?>

<div class="container">
  <?php get_template_part('template-parts/single-product/product-block'); ?>
  <?php get_template_part('template-parts/home/subscribe'); ?>
</div>

<?php get_footer(); ?>