<?php
$home_intro = get_field('home_intro');
$title=$home_intro['title'];
$label=$home_intro['label'];
$background = $home_intro['background'];
$image=$home_intro['image'];
$button_text =$home_intro['button_text'];
?>

<div class="home-intro">
  <img class="home-intro__bg" src="<?php echo $background; ?>" alt="">
  <img class="home-intro__img" src="<?php echo $image; ?>" alt="">
  <div class="container">
    <div class="home-intro__content">
      <div class="home-intro__label label"><?php echo $label; ?></div>
      <h1 class="home-intro__title"><?php echo $title; ?></h1>
      <?php btnComponent('#', $button_text, 'btn--accent'); ?>
    </div>
  </div>
</div>
