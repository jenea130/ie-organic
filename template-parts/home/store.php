<?php
$store = get_field('store');
$label = $store['label'];
$title = $store['title'];
$image = $store['image'];
$items = $store['items'];
?>
<div class="store">
    <div class="store__wrap">
      <div class="store__img">
        <img src="<?php echo $image; ?>" alt="">
      </div>
      <div class="store__content">
        <div class="store__label label"><?php echo $label; ?></div>
        <h2 class="store__title title"><?php echo $title; ?></h2>
        <ul class="store__list">
          <?php foreach ($items as $item) : ?>
            <?php
            $title = $item['title'];
            $text = $item['text'];
            ?>
            <li>
              <h4 class="store__subtitle"><?php echo $title; ?></h4>
              <div class="store__text"><?php echo $text; ?></div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
</div>