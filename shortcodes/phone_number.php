<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
function phone_number() {
  ob_start();
?>
<?php 
  $footer = get_field('footer', 'option');
  $phone_number = $footer['phone_number'];
?>
  <?php if($phone_number): ?>
    <?php $phone_clear = clear_phone($phone_number);?>
    <?php return '<a target="_blank" href="tel:'.$phone_clear.'">'.$phone_number.'</a>'; ?>
  <?php else: ?>
    <?php return '<span class="red">Add phone_number from Admin -> Acf settings</span>';?>
  <?php endif; ?>
<?php
}
add_shortcode( 'phone_number', 'phone_number' );
?>
