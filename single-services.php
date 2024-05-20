<?php get_header() ?>

<?php
$page_intro = get_field('page_intro');
// $title = $page_intro['title'];
$title = get_the_title(get_the_ID());
pageIntroComponent($page_intro, $title, '');
?>

<?php get_footer() ?>