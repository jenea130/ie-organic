<?php
$offer = get_field('offer');
$label = $offer['label'];
$title = $offer['title'];
$items = $offer['items'];
?>
<div class="offer">
  <div class="container">
    <div class="offer__label label"><?php echo $label; ?></div>
    <h2 class="offer__title title title--light"><?php echo $title; ?></h2>
    <div class="offer__wrap">
      <?php foreach ($items as $item) : ?>
        <?php
        $image = $item['image'];
        $title = $item['title'];
        ?>
        <div class="offer__item">
          <div class="offer__img">
            <img src="<?php echo $image; ?>" alt="">
          </div>
          <h4 class="offer__subtitle"><?php echo $title; ?></h4>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>