<?php
$products = get_field('products');
$label = $products['label'];
$title = $products['title'];
$button_text = $products['button_text'];

$product_posts = new WP_Query([
  'post_type' => 'products',
  'posts_per_page' => 8
]);
?>

<div class="products">
  <div class="products__content">
    <div class="products__label label"><?php echo $label; ?></div>
    <h2 class="products__title title"><?php echo $title; ?></h2>
  </div>
  <div class="products__wrap">
    <?php if ($product_posts->have_posts()) : ?>
      <?php while ($product_posts->have_posts()) : ?>
        <?php $product_posts->the_post(); ?>
        <?php
        $image = get_the_post_thumbnail_url();
        $title = get_the_title();
        $permalink = get_the_permalink();
        ?>
        <a href="#" class="products__item">
          <div class="products__img">
            <img src="<?php echo $image; ?>" alt="">
          </div>
          <div class="products__body">
            <div class="products__cat">
              <span>Label</span>
            </div>
            <h4 class="products__subtitle"><?php echo $title; ?></h4>
            <div class="products__footer">
              <span class="products__previous-price">20.00$</span>
              <span class="products__current-price">13.00$</span>
              <div class="products__rating">
                <?php ratingComponent(4); ?>
              </div>
            </div>
          </div>
        </a>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>

  <div class="products__align">
    <?php btnComponent('#', $button_text, ''); ?>
    </button></div>
</div>