<?php
$creative = get_field('creative');
$image = $creative['image'];
$label = $creative['label'];
$title = $creative['title'];
$text = $creative['text'];
$items = $creative['items'];
$button_text = $creative['button_text'];
?>
<div class="creative">
  <div class="creative__wrap">
    <div class="creative__img">
      <img src="<?php echo $image; ?>" alt="">
    </div>
    <div class="creative__content">
      <div class="creative__label label"><?php echo $label; ?></div>
      <h2 class="creative__title title"><?php echo $title; ?></h2>
      <p>Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
      <p>Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
      <div class="creative__flex">
        <?php foreach ($items as $item) : ?>
          <?php
          $icon = $item['icon'];
          $title = $item['title'];
          ?>
          <div class="creative__item">
            <div class="creative__icon">
              <?php echo $icon; ?>
            </div>
            <h4 class="creative__subtitle"><?php echo $title; ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
      <?php btnComponent('#', $button_text, ''); ?>
    </div>
  </div>
</div>