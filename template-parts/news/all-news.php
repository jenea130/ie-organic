  <?php
  $discover = get_field('discover');

  $posts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1
  ]);
  ?>
  <div class="all-news">
    <div class="all-news__wrap">
      <?php if ($posts->have_posts()) : ?>
        <?php while ($posts->have_posts()) : ?>
          <?php $posts->the_post(); ?>
          <?php
          $title = get_the_title();
          $excerpt = get_the_excerpt();
          $permalink = get_the_permalink();
          $image = get_the_post_thumbnail_url();
          $date = get_the_date('d');
          $month = get_the_date('M');
          ?>

          <div class="all-news__item">
            <div class="all-news__img">
              <img src="<?php echo $image; ?>" alt="">
            </div>
            <div class="all-news__date">
              <span><strong><?php echo $date ?></strong><?php echo $month; ?></span>
            </div>
            <div class="all-news__content">
              <div class="all-news__author">
                <div class="all-news__logo">
                  <?php get_template_part('template-parts/icons/icon-man'); ?>
                </div>
                <span>By Rachi Card</span>
              </div>
              <h4 class="all-news__subtitle"><?php echo $title; ?></h4>
              <div class="all-news__text text"><?php echo $excerpt; ?></div>
              <?php btnComponent('#', 'Read More', 'btn--accent'); ?>
            </div>
          </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>