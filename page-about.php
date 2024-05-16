<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
pageIntroComponent($page_intro, 'page-intro--about');
?>

<div class="container">
  <?php get_template_part('template-parts/about/creative'); ?>
</div>
<?php get_template_part('template-parts/about/market'); ?>
<div class="container">
  <?php get_template_part('template-parts/about/experts'); ?>
</div>

<?php get_footer(); ?>