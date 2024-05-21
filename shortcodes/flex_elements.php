<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
function flexElements($atts, $content)
{
  ob_start();
  $image_url = wp_get_attachment_image_url((int)$atts['image-id']);

?>
	<?php return '
      <div class="service-info__wrap">
        <div class="service-info__picture">
          <img src="' . $image_url . '" alt="">
        </div>
        <div class="service-info__body">
          <h4 class="service-info__subtitle">' . $atts["title"] . '</h4>
          <div class="service-info__text">' . $content . '</div>
        </div>
      </div>
	'; ?>

	<?php
}
add_shortcode('flex-elements', 'flexElements');
  ?>
