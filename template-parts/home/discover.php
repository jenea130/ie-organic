  <?php
  $discover = get_field('discover');
  $label = $discover['label'];
  $title = $discover['title'];
  $button_text = $discover['button_text'];

  $posts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 2
  ]);
  ?>
  <div class="discover">
    <div class="discover__header">
      <div class="discover__body">
        <div class="discover__label label"><?php echo $label; ?></div>
        <h2 class="discover__title title"><?php echo $title; ?></h2>
      </div>
      <?php btnComponent('#', $button_text, 'btn--transparent'); ?>
    </div>
    <div class="discover__wrap">
      <?php if ($posts->have_posts()) : ?>
        <?php while ($posts->have_posts()) : ?>
          <?php $posts->the_post(); ?>
          <?php
          $title = get_the_title();
          $excerpt = get_the_excerpt();
          $permalink = get_the_permalink();
          $image = get_the_post_thumbnail_url();
          ?>

          <div class="discover__item">
            <div class="discover__img">
              <img src="<?php echo $image; ?>" alt="">
            </div>
            <div class="discover__date">
              <span><strong>25</strong>Nov</span>
            </div>
            <div class="discover__content">
              <div class="discover__author">
                <div class="discover__logo">
                  <?php get_template_part('template-parts/icons/icon-man'); ?>
                </div>
                <span>By Rachi Card</span>
              </div>
              <h4 class="discover__subtitle"><?php echo $title; ?></h4>
              <div class="discover__text text"><?php echo $excerpt; ?></div>
              <?php btnComponent('#', $button_text, 'btn--accent'); ?>
            </div>
          </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>