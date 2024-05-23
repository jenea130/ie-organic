<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
$title = $page_intro['title'];
pageIntroComponent($page_intro, $title, '');
?>

<div class="container">
  <?php get_template_part('template-parts/team/our-team'); ?>
  <?php get_template_part('template-parts/home/subscribe'); ?>
</div>

<?php get_footer(); ?>