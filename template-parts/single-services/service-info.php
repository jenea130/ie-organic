<?php
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
  </div>
</div>