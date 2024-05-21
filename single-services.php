<?php get_header() ?>

<?php
$page_intro = get_field('page_intro');
// $title = $page_intro['title'];
$title = get_the_title(get_the_ID());
pageIntroComponent($page_intro, $title, 'page-intro--single-services');
?>

<div class="container">
  <?php get_template_part('template-parts/single-services/service-info'); ?>
</div>

<?php get_footer() ?>