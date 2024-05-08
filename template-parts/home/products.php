<?php
$products = get_field('products');
$label = $products['label'];
$title = $products['title'];
$button_text = $products['button_text'];

$product_posts = new WP_Query([
  'post_type' => 'products',
  'posts_per_page' => 8
]);
// vardump($product_posts->posts);
?>

<div class="products">
  <div class="products__content">
    <div class="products__label label"><?php echo $label; ?></div>
    <h2 class="products__title title"><?php echo $title; ?></h2>
  </div>
  <?php productsLoopComponent($product_posts->posts); ?>
  <div class="products__align">
    <?php btnComponent('#', $button_text, ''); ?>
    </button></div>
</div>