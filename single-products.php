<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
// $title = $page_intro['title'];
$title = get_the_title(get_the_ID());
pageIntroComponent($page_intro, $title, '');
?>

<div class="container">
  <?php get_template_part('template-parts/single-product/product-block'); ?>
  <?php get_template_part('template-parts/shop/related'); ?>
  <?php get_template_part('template-parts/home/subscribe'); ?>
</div>

<?php get_footer(); ?>