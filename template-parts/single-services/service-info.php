<?php
$service_info = get_field('service_info');
$image = get_the_post_thumbnail_url();
?>

<div class="service-info">
  <div class="service-info__img">
    <img src="<?php echo $image; ?>" alt="">
  </div>
  <div class="service-info__content">
    <?php if (have_posts()) : ?>
      <?php the_post(); ?>
      <?php the_content(); ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <div class="service-info__flex">
      <div class="service-info__item">
        <div class="service-info__circle">01</div>
        <span class="service-info__desc">Best quality support</span>
      </div>
      <div class="service-info__item">
        <div class="service-info__circle">02</div>
        <span class="service-info__desc">Money back guarantee</span>
      </div>
    </div>
  </div>
</div>