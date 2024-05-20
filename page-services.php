<?php get_header(); ?>

<?php
$page_intro = get_field('page_intro');
$title = $page_intro['title'];
pageIntroComponent($page_intro, $title, 'page-intro--services');
?>

<?php get_template_part('template-parts/services/future'); ?>
<?php get_template_part('template-parts/services/fresh'); ?>


<?php get_footer(); ?>