<?php function btnComponent($url, $text, $class_name)
{ ?>
  <a href="<?php echo $url; ?>" class="btn <?php echo $class_name; ?>">
    <span><?php echo $text; ?></span>
    <?php get_template_part('template-parts/icons/icon-arrow'); ?>
  </a>
<? } ?>