<?php
$juice = get_field('juice');
$items = $juice['items'];
?>
<div class="juice">
  <div class="juice__wrap">
    <?php foreach ($items as $item) : ?>
      <?php
      $image = $item['image'];
      $title = $item['title'];
      ?>
      <div class="juice__item">
        <img src="<?php echo $image; ?>" alt="">
        <div class="juice__content">
          <h3 class="juice__title"><?php echo $title; ?></h3>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>