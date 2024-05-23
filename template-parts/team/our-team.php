<?php 
$our_team = get_field('our_team');
$label = $our_team['label'];
$title = $our_team['title'];
$text = $our_team['text'];


$experts_posts = new WP_Query([
  'post_type' => 'our-experts',
  'posts_per_page' => -1
]);
?>
<div class="our-team">
  <div class="our-team__header">
    <div class="our-team__label label"><?php echo $label ?></div>
    <h2 class="our-team__title title"><?php echo $title ?></h2>
    <div class="our-team__text text"><?php echo $text ?></div>
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
        $for_loop = get_field('for_loop');
        $socials = $for_loop['socials'];
        ?>

        <div class="experts__item">
          <div class="experts__img">
            <img src="<?php echo $image; ?>" alt="">
          </div>
          <div class="experts__body">
            <h4 class="experts__subtitle"><?php echo $title; ?></h4>
            <div class="experts__footer">
              <div class="experts__job"><?php echo $job; ?></div>
              <?php if ($socials) : ?>

                <ul class="experts__socials">
                  <?php foreach ($socials as $item) : ?>
                    <?php
                    $type = $item['type'];
                    $icon_url = 'template-parts/icons/icon-' . $type;
                    ?>
                    <li class="experts__icon">
                      <a href="<?php echo $url; ?>" class="experts__link">
                        <?php get_template_part($icon_url); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  </div>
</div>