<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
pageIntroComponent($page_intro, 'page-intro--shop');
?>

<div class="container">
  <?php get_template_part('template-parts/shop/producs-all'); ?>
  <?php get_template_part('template-parts/home/subscribe'); ?>
</div>

<?php get_footer(); ?>