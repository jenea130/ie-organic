<?php
$natural = get_field('natural');
$items = $natural['items'];
?>

<div class="natural">
  <div class="natural__wrap">
    <?php foreach ($items as $key => $item) : ?>
      <?php
      $label = $item['label'];
      $title = $item['title'];
      $image = $item['image'];
      $class_label = ($key === 0) ? 'label--light' : '';
      $class_title = ($key === 0) ? 'natural__title--light' : '';
      ?>
      <div class="natural__item">
        <img class="natural__img" src="<?php echo $image; ?>" alt="">
        <div class="natural__content">
          <div class="natural__label label <?php echo $class_label; ?>"><?php echo $label; ?></div>
          <h2 class="natural__title <?php echo $class_title; ?>"><?php echo $title; ?></h2>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>