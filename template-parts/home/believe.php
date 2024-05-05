<?php
$believe = get_field('believe');
$image = $believe['image'];
$label = $believe['label'];
$title = $believe['title'];
$text = $believe['text'];
$items = $believe['items'];
$button_text = $believe['button_text'];
?>

<div class="believe">
  <img src="<?php echo $image; ?>" alt="">
  <div class="container">
    <div class="believe__content">
      <div class="believe__label label"><?php echo $label; ?></div>
      <h2 class="believe__title title"><?php echo $title; ?></h2>
      <div class="believe__text text"><?php echo $text; ?></div>
      <div class="believe__flex">
        <?php foreach ($items as $item) : ?>
          <?php
          $icon = $item['icon'];
          $title = $item['title'];
          $text = $item['text'];
          ?>

          <div class="believe__item">
            <div class="believe__icon">
              <?php echo $icon; ?>
            </div>
            <div class="believe__body">
              <h4 class="believe__subtitle"><?php echo $title; ?></h4>
              <div class="believe__desc text"><?php echo $text; ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php btnComponent('#', $button_text, ''); ?>
    </div>
  </div>
</div>