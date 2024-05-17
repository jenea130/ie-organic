<?php

$product_posts = new WP_Query([
  'post_type' => 'products',
  'posts_per_page' => 12,
]);
?>

<div class="products-all">
  <?php productsLoopComponent($product_posts->posts); ?>
</div>