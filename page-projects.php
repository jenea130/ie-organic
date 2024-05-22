<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
$title = $page_intro['title'];
pageIntroComponent($page_intro, $title, 'page-intro--portfolio');
?>

<div class="container">
  <?php get_template_part('template-parts/portfolio/portfolio-set'); ?>
</div>

<?php get_footer(); ?>