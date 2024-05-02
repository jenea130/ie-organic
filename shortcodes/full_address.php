<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function full_address() {
	ob_start();
	?>
<?php 
$footer = get_field('footer', 'option');
$full_address = $footer['full_address'];
?>
	<?php $full_address = $full_address ? $full_address : '<span class="red">Add full_address from Admin -> Acf settings</span>'; ?>
	<?php return $full_address; ?>
	<?php
}
add_shortcode( 'full_address', 'full_address' );
?>
