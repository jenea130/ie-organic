<?php
$future = get_field('future');
$label = $future['label'];
$title = $future['title'];
$image = $future['image'];
$items_1 = $future['items_1'];
$items_2 = $future['items_2'];
$button_text = $future['button_text'];

$service_posts1 = new WP_Query([
  'post_type' => 'services',
  'posts_per_page' => 3
])

?>
<div class="future">
  <img src="<?php echo $image; ?>" alt="" class="future__img">
  <div class="container">
    <div class="future__content">
      <div class="future__label label"><?php echo $label; ?></div>
      <h2 class="future__title title"><?php echo $title; ?></h2>
    </div>
    <div class="future__wrap">
      <div class="future__col future__col1">
        <?php if ($service_posts1->have_posts()) : ?>
          <?php while ($service_posts1->have_posts()) : ?>
            <?php $service_posts1->the_post(); ?>
            <?php
            $icon = get_field('icon');
            $title = get_the_title();
            $text = get_the_excerpt();
            $permalink = get_the_permalink();
            ?>
            <div class="future__item">
              <div class="future__icon">
                <?php echo $icon; ?>
              </div>
              <a href="<?php echo $permalink; ?>" class="future__subtitle"><?php echo $title; ?></a>
              <div class="future__text text"><?php echo $text; ?></div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
      <div class="future__col future__col2">
        <?php foreach ($items_2 as $item) : ?>
          <?php
          $icon = $item['icon'];
          $title = $item['title'];
          $text = $item['text'];
          ?>
          <div class="future__item">
            <div class="future__icon">
              <?php echo $icon; ?>
            </div>
            <h4 class="future__subtitle"><?php echo $title; ?></h4>
            <div class="future__text text"><?php echo $text; ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="future__align">
      <?php btnComponent('#', $button_text, 'btn--transparent'); ?>
    </div>
  </div>
</div>