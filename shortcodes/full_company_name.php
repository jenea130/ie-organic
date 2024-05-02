<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
function full_company_name()
{
  ob_start();
?>
<?php
  $footer = get_field('footer', 'option');
  $full_company_name = $footer['full_company_name'];
?>
	<?php $full_company_name = $full_company_name ? $full_company_name : '<span class="red">Add full_company_name from Admin -> Acf settings</span>'; ?>
	<?php return $full_company_name; ?>
	<?php
}
add_shortcode('full_company_name', 'full_company_name');
  ?>
