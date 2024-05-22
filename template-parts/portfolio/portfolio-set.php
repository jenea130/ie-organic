<?php
$posts = new WP_Query([
  'post_type' => 'portfolio',
  'posts_per_page' => 6
])
?>

<div class="portfolio-set">
  <div class="portfolio-set__wrap">
    <?php if ($posts->have_posts()) : ?>
      <?php while ($posts->have_posts()) : ?>
        <?php $posts->the_post(); ?>
        <?php
        $title = get_the_title();
        $image = get_the_post_thumbnail_url();
        $terms = get_the_terms(get_the_ID(), 'portfolio-category');
        $cat = $terms[0]->name;
        ?>

        <div class="portfolio-set__item">
          <div class="portfolio-set__img">
            <img src="<?php echo $image; ?>" alt="">
            <div class="portfolio-set__over">
              <div class="portfolio-set__circle">
                <?php get_template_part('template-parts/icons/icon-arrow-2'); ?>
              </div>
            </div>
          </div>
          <h4 class="portfolio-set__title"><?php echo $title; ?></h4>
          <div class="portfolio-set__label"><?php echo $cat; ?></div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</div>