<?php
$fresh = get_field('fresh');
$label = $fresh['label'];
$title = $fresh['title'];
$text = $fresh['text'];
$image = $fresh['image'];
?>
<div class="fresh">
  <img class="fresh__img" src="<?php echo $image; ?>" alt="">
  <div class="fresh__content">
    <div class="fresh__label label"><?php echo $label; ?></div>
    <h2 class="fresh__title title"><?php echo $title; ?></h2>
    <div class="fresh__text text"><?php echo $text; ?></div>
    <div class="fresh__circle">
      <?php get_template_part('template-parts/icons/icon-video'); ?>
    </div>
  </div>
</div>