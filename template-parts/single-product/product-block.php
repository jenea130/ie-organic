<?php
$post = get_post();
$title = get_the_title();
$image = get_the_post_thumbnail_url();
$products_info = get_field('products_info');
$previous_price = $products_info['previous_price'];
$current_price = $products_info['current_price'];
$rating = $products_info['rating'];
$text = $products_info['text'];
$button_text = $products_info['button_text'];
$items = $products_info['items'];
$terms = get_the_terms($id, 'product-category');
$cat = $terms[0]->name;
?>
<div class="product-block">
  <div class="product-block__wrap">
    <div class="product-block__img">
      <img src="<?php echo $image; ?>" alt="">
      <div class="product-block__cat">
        <span><?php echo $cat; ?></span>
      </div>
    </div>
    <div class="product-block__content">
      <h3 class="product-block__title"><?php echo $title; ?></h3>
      <?php ratingComponent($rating); ?>
      <div class="product-block__price">
        <span class="product-block__price-prev"><?php echo $previous_price; ?></span>
        <div class="product-block__price-next"><?php echo $current_price; ?></div>
      </div>
      <div class="product-block__text text"><?php echo $text; ?></div>
      <footer class="product-block__footer">
        <span class="product-block__quantity">Quantity:</span>
        <div class="product-block__counter">
          <span>1</span>
        </div>
        <?php btnComponent('#', $button_text, ''); ?>
      </footer>
    </div>
  </div>
  <div class="product-block__tabs tabs-product">
    <div class="tabs-product__navs">
      <?php foreach ($items as $item) : ?>
        <?php
        $title = $item['title'];
        // vardump($title);
        ?>
        <div class="tabs-product__nav"><?php echo $title; ?></div>
      <?php endforeach; ?>
    </div>
    <div class="tabs-product__body">
      <?php foreach ($items as $item) : ?>
        <?php
        $text = $item['text'];
        ?>
        <div class="tabs-product__tab"><?php echo $text; ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</div>