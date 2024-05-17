<?php
$post = get_post();
$title = get_the_title();
$image = get_the_post_thumbnail_url();
$products_info = get_field('products_info');
$previous_price = $products_info['previous_price'];
$current_price = $products_info['current_price'];
$rating = $products_info['rating'];
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
      <span class="product-block__price"><?php echo $previous_price; ?><strong><?php echo $current_price; ?></strong></span>
      <div class="product-block__text text">Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</div>
      <footer class="product-block__footer">
        <span class="product-block__quantity">Quantity:</span>
        <div class="product-block__counter">
          <span>1</span>
        </div>
        <?php btnComponent('#', 'Add To Card', ''); ?>
      </footer>
    </div>
  </div>
  <div class="product-block__tabs tabs-product">
    <div class="tabs-product__navs">
      <div class="tabs-product__nav">Tab 1</div>
      <div class="tabs-product__nav">Tab 2</div>
    </div>
    <div class="tabs-product__body">
      <div class="tabs-product__tab">Welcome to the world of natural and organic. Here you can discover the bounty of nature. We have grown on the principles of health, ecology, and care. We aim to give our customers a healthy chemical-free meal for perfect nutrition. It offers about 8–10% carbs. Simple sugars — such as glucose and fructose — make up 70% and 80% of the carbs in raw.</div>
      <div class="tabs-product__tab">Welcome to the world of natural and organic. Here you can discover the bounty of nature. We have grown on the principles of health, ecology, and care. We aim to give our customers a healthy chemical-free meal for perfect nutrition. It offers about 8–10% carbs.</div>
    </div>
  </div>
</div>