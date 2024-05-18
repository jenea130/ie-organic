<?php
$related = get_field('related', 18);
$title = $related['title'];


$product_posts = new WP_Query([
  'post_type' => 'products',
  'posts_per_page' => 4,
]);
?>
<div class="related">
  <h2 class="related__title title"><?php echo $title; ?></h2>
  <?php productsLoopComponent($product_posts->posts); ?>
</div>