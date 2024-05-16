<?php
$experts = get_field('experts');
$label = $experts['label'];
$title = $experts['title'];
$text = $experts['text'];


$experts_posts = new WP_Query([
  'post_type' => 'our-experts',
  'posts_per_page' => 3
]);
?>
<div class="experts">
  <div class="experts__content">
    <div class="experts__label label"><?php echo $label; ?></div>
    <h3 class="experts__title title"><?php echo $title; ?></h3>
    <div class="experts__text text"><?php echo $text; ?></div>
  </div>
  <div class="experts__wrap">
    <?php if ($experts_posts->have_posts()) : ?>
      <?php while ($experts_posts->have_posts()) : ?>
        <?php $experts_posts->the_post(); ?>
        <?php
        $title = get_the_title();
        $image = get_the_post_thumbnail_url();
        $terms = get_the_terms(get_the_ID(), 'job-experts');
        $job = $terms[0]->name;
        ?>

        <a href="#" class="experts__item">
          <div class="experts__img">
            <img src="<?php echo $image; ?>" alt="">
          </div>
          <div class="experts__body">
            <h4 class="experts__subtitle"><?php echo $title; ?></h4>
            <div class="experts__footer">
              <div class="experts__job"><?php echo $job; ?></div>
              <div class="experts__socials">
              </div>
            </div>
          </div>
        </a>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  </div>
</div>