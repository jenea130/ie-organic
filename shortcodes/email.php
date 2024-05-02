<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function email() {
	ob_start();
	?>
  <?php 
  $footer = get_field('footer', 'option');
  $email = $footer['email'];
?>
	<?php if($email): ?>
		<?php return '<a target="_blank" href="mailto:'.$email.'">'.$email.'</a>'; ?>
	<?php else: ?>
		<?php return '<span class="red">Add email from Admin -> Acf settings</span>';?>
	<?php endif; ?>
	<?php
}
add_shortcode( 'email', 'email' );
?>
