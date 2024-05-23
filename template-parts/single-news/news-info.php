<?php 
$for_loop = get_field('for_loop');
$text = $for_loop['text'];
$title = get_the_title();
$date = get_the_date();
?>
<div class="news-info">
  <header class="news-info__header">
    <div class="news-info__date">

      <span><strong>Posted On: </strong><?php echo $date; ?></span>
    </div>
    <div class="news-info__author">
      <div class="news-info__logo">
        <?php get_template_part('template-parts/icons/icon-man'); ?>
      </div>
      <span>By Rachi Card</span>
    </div>
  </header>
  <h1 class="news-info__title title-intro"><?php echo $title ?></h1>
  <div class="news-info__text text"><?php echo $text ?></div>
</div>