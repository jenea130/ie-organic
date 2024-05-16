<?php
$market = get_field('market');
$label = $market['label'];
$title = $market['title'];
$text = $market['text'];
$image = $market['image'];
$items = $market['items'];
$cards = $market['cards'];
?>
<div class="market">
  <div class="container">
    <div class="market__wrap">
      <div class="market__content">
        <div class="market__label label"><?php echo $label ?></div>
        <h2 class="market__title title"><?php echo $title ?></h2>
        <div class="market__text text"><?php echo $text ?></div>
        <ul class="market__list">
          <?php foreach ($items as $item) : ?>
            <?php
            $title = $item['title'];
            $text = $item['text'];
            ?>
            <li class="market__item">
              <div class="market__body">
                <?php get_template_part('template-parts/icons/icon-circle'); ?>
                <div class="market__subtitle"><?php echo $title; ?></div>
              </div>
              <span class="market__desc"><?php echo $text; ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
        </h2>
      </div>
      <div class="market__img">
        <img src="<?php echo $image; ?>" alt="">
      </div>
    </div>
    <div class="market__flex">
      <?php foreach ($cards as $card) : ?>
        <?php
        $icon = $card['icon'];
        $title = $card['title'];
        $text = $card['text'];
        ?>
        <div class="market__card">
          <div class="market__icon">
            <?php echo $icon; ?>
          </div>
          <h3 class="market__heading"><?php echo $title; ?></h3>
          <div class="market__about text"><?php echo $text; ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>