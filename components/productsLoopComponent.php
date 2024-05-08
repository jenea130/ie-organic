<?php function productsLoopComponent($products)
{ ?>
  <div class="products-loop">
    <?php foreach ($products as $product) : ?>

      <?php
      $id = $product->ID;
      $permalink = get_the_permalink($id);
      $image = get_the_post_thumbnail_url($id);
      $title = get_the_title($id);
      $products_info = get_field('products_info', $id);
      $previous_price = $products_info['previous_price'];
      $current_price = $products_info['current_price'];
      $rating = $products_info['rating'];
      $terms = get_the_terms($id, 'product-category');
      $cat = $terms[0]->name;
      ?>
      <a href="<?php echo $permalink; ?>" class="products-loop__item">
        <div class="products-loop__img">
          <img src="<?php echo $image; ?>" alt="">
        </div>
        <div class="products-loop__body">
          <div class="products-loop__cat">
            <span><?php echo $cat; ?></span>
          </div>
          <h4 class="products-loop__subtitle"><?php echo $title; ?></h4>
          <div class="products-loop__footer">
            <span class="products-loop__previous-price"><?php echo $previous_price; ?></span>
            <span class="products-loop__current-price"><?php echo $current_price; ?></span>
            <div class="products-loop__rating">
              <?php ratingComponent($rating); ?>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
<?php } ?>