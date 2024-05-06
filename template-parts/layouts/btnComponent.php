<?php function btnComponent($url, $text, $class_name)
{ ?>
  <a href="<?php echo $url; ?>" class="btn <?php echo $class_name; ?>">
    <span><?php echo $text; ?></span>
    <div class="btn__circle">
      <?php get_template_part('template-parts/icons/icon-arrow'); ?>
    </div>
  </a>
<?php } ?>