<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function short_company_name() {
	ob_start();
	?>
<?php 
  $footer = get_field('footer', 'option');
  $short_company_name = $footer['short_company_name'];
?>
	<?php $short_company_name = $short_company_name ? $short_company_name : '<span class="red">Add short_company_name from Admin -> Acf settings</span>'; ?>
	<?php return $short_company_name; ?>
	<?php
}
add_shortcode( 'short_company_name', 'short_company_name' );
?>
