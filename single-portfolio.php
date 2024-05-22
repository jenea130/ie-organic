<?php get_header() ?>

<?php
$page_intro = get_field('page_intro');
// $title = $page_intro['title'];
// $title = get_the_title(get_the_ID());
pageIntroComponent($page_intro, '', 'page-intro--single-portfolio');
?>

<div class="container">
  <?php get_template_part('template-parts/single-portfolio/portfolio-info'); ?>
  <?php get_template_part('template-parts/single-portfolio/farm'); ?>
  <?php get_template_part('template-parts/home/subscribe'); ?>
</div>

<?php get_footer() ?>