<?php
$organic = get_field('organic');
$label = $organic['label'];
$title = $organic['title'];
$button_text = $organic['button_text'];

$args = array(
  'post_type' => 'products',
  'posts_per_page' => 4,
  'tax_query' => array(
    array(
      'taxonomy' => 'product-category',
      'field' => 'slug',
      'terms' => 'vegetable',
    ),
  ),
);
$product_posts = new WP_Query($args);

?>
<div class="organic">
  <div class="container">
    <div class="organic__content">
      <div class="organic__body">
        <div class="organic__label label"><?php echo $label ?></div>
        <h2 class="organic__title title title--light"><?php echo $title ?></h2>
      </div>
      <?php btnComponent('#', $button_text, 'btn--accent'); ?>
    </div>
    <?php productsLoopComponent($product_posts->posts); ?>
  </div>
</div>