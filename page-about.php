<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
$title = $page_intro['title'];
pageIntroComponent($page_intro, $title, 'page-intro--about');
?>

<div class="container">
  <?php get_template_part('template-parts/about/creative'); ?>
</div>
<?php get_template_part('template-parts/about/market'); ?>
<div class="container">
  <?php get_template_part('template-parts/about/experts'); ?>
</div>
<?php get_template_part('template-parts/about/offer'); ?>
<div class="container">
  <?php get_template_part('template-parts/home/subscribe'); ?>
</div>

<?php get_footer(); ?>