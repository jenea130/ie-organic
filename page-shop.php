<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
$title = $page_intro['title'];
pageIntroComponent($page_intro, $title, 'page-intro--shop');
?>

<div class="container">
  <?php get_template_part('template-parts/shop/products-all'); ?>
  <?php get_template_part('template-parts/home/subscribe'); ?>
</div>

<?php get_footer(); ?>