<?php
$portfolio_info = get_field('portfolio_info');
$text = $portfolio_info['text'];
$items = $portfolio_info['items'];
$title = get_the_title();
?>

<div class="portfolio-info">
  <div class="portfolio-info__wrap">
    <div class="portfolio-info__content">
      <h2 class="portfolio-info__title title"><?php echo $title; ?></h2>
      <div class="portfolio-info__text text"><?php echo $text ?></div>
    </div>
    <div class="portfolio-info__data">
      <table>
        <?php foreach ($items as $item) : ?>
          <?php
          $type = $item['type'];
          $text = $item['text'];
          ?>
          <tr>
            <?php if ($type === 'Date') : ?>
              <td><?php echo $type ?></td>
            <?php else : ?>
              <td><?php echo $type ?></td>
            <?php endif; ?>
            <td>:</td>
            <td><?php echo $text; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>