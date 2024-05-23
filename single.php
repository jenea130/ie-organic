<?php get_header(); ?>


<?php
$page_intro = get_field('page_intro');
// $title = $page_intro['title'];
// $title = get_the_title(get_the_ID());
pageIntroComponent($page_intro, '', 'page-intro--single-news');
?>

<div class="container">
  <?php get_template_part('template-parts/single-news/news-info'); ?>


  <div class="news-block">
    <?php if (have_posts()) : ?>
      <?php the_post(); ?>
      <?php the_content(); ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>



  <?php get_template_part('template-parts/home/subscribe'); ?>
</div>

<?php get_footer(); ?>