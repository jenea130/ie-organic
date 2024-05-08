<?php
$organic = get_field('organic');
$label = $organic['label'];
$title = $organic['title'];
$button_text = $organic['button_text'];

$product_posts = new WP_Query([
  'post_type' => 'products',
  'posts_per_page' => 4
]);
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

    <div class="products__wrap">
      <?php if ($product_posts->have_posts()) : ?>
        <?php while ($product_posts->have_posts()) : ?>
          <?php $product_posts->the_post(); ?>
          <?php
          $image = get_the_post_thumbnail_url();
          $title = get_the_title();
          $permalink = get_the_permalink();
          $products_info = get_field('products_info');
          $previous_price = $products_info['previous_price'];
          $current_price = $products_info['current_price'];
          $rating = $products_info['rating'];
          $terms = get_the_terms(get_the_ID(), 'product-category');
          $cat = $terms[0]->name;
          ?>

          <a href="<?php echo $permalink; ?>" class="products__item">
            <div class="products__img">
              <img src="<?php echo $image; ?>" alt="">
            </div>
            <div class="products__body">
              <div class="products__cat">
                <span><?php echo $cat; ?></span>
              </div>
              <h4 class="products__subtitle"><?php echo $title; ?></h4>
              <div class="products__footer">
                <span class="products__previous-price"><?php echo $previous_price; ?></span>
                <span class="products__current-price"><?php echo $current_price; ?></span>
                <div class="products__rating">
                  <?php ratingComponent($rating); ?>
                </div>
              </div>
            </div>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</div>