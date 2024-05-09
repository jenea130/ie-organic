<?php
$customer = get_field('customer');
$label = $customer['label'];
$title = $customer['title'];
$background = $customer['background'];
$items = $customer['items'];
$items_slider = $customer['items_slider'];
?>
<div class="customer">
  <img class="customer__img" src="<?php echo $background; ?>" alt="">
  <div class="container">
    <div class="customer__content">
      <div class="customer__label label"><?php echo $label; ?></div>
      <h2 class="customer__title title"><?php echo $title ?></h2>
      <div class="customer__slider">
        <?php foreach ($items_slider as $item) : ?>
          <?php
          $photo = $item['photo'];
          $rating = $item['rating'];
          $text = $item['text'];
          $name = $item['name'];
          $description = $item['description'];
          ?>
          <div class="customer__body">
            <div class="customer__photo">
              <img src="<?php echo $photo; ?>" alt="">
            </div>
            <div class="customer__rating">
              <?php ratingCustomer($rating); ?>
            </div>
            <div class="customer__text text"><?php echo $text ?></div>
            <h4 class="customer__name"><?php echo $name ?></h4>
            <div class="customer__desc"><?php echo $description ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="customer__wrap">
      <?php foreach ($items as $item) : ?>
        <?php
        $title = $item['title'];
        $text = $item['text'];
        ?>
        <div class="customer__item">
          <div class="customer__fon">
          </div>
          <h4 class="customer__number"><?php echo $title; ?></h4>
          <div class="customer__about"><?php echo $text; ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>