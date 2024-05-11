  <?php
  $discover = get_field('discover');
  $label = $discover['label'];
  $title = $discover['title'];
  $button_text = $discover['button_text'];
  ?>
  <div class="discover">
    <div class="discover__content">
      <div class="discover__body">
        <div class="discover__label label"><?php echo $label; ?></div>
        <h2 class="discover__title title"><?php echo $title; ?></h2>
      </div>
      <?php btnComponent('#', $button_text, ''); ?>
    </div>
  </div>