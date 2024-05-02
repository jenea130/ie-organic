<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function vat() {
	ob_start();
	?>
<?php 
$footer = get_field('footer', 'option');
$vat = $footer['vat'];
?>
	<?php $vat = $vat ? $vat : '<span class="red">Add vat from Admin -> Acf settings</span>'; ?>
	<?php return $vat; ?>
	<?php
}
add_shortcode( 'vat', 'vat' );
?>
