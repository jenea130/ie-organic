<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

$vite_dev = true;

define('IS_VITE_DEVELOPMENT', $vite_dev);

include "inc/inc.vite.php";
require_once __DIR__ . '/src/vue/vue-functions.php';

require_once __DIR__ . '/Api/call-api.php';
require_once __DIR__ . '/Api/single-immobile-meta.php';
require_once __DIR__ . '/inc/class-tgm-plugin-activation.php';
require_once __DIR__ . '/inc/tgm_example.php';
require_once __DIR__ . '/inc/urls-add-rewrite-rules.php';
require_once __DIR__ . '/inc/ar-setup.php';
require_once __DIR__ . '/inc/acf.php';
require_once __DIR__ . '/inc/func.php';
require_once __DIR__ . '/inc/ar-widgets.php';
require_once __DIR__ . '/inc/ar-styles.php';
require_once __DIR__ . '/inc/project-variables.php';
require_once __DIR__ . '/shortcodes/short_company_name.php';
require_once __DIR__ . '/shortcodes/full_company_name.php';
require_once __DIR__ . '/shortcodes/full_address.php';
require_once __DIR__ . '/shortcodes/vat.php';
require_once __DIR__ . '/shortcodes/phone_number.php';
require_once __DIR__ . '/shortcodes/email.php';
/* require_once __DIR__ . '/inc/ar-post-type.php'; */
/* require_once __DIR__ . '/inc/ar-taxonomy.php'; */
/* require_once __DIR__ . '/inc/activate-plugin.php'; */

require_once __DIR__ . '/shortcodes/privacy.php';add_filter( 'acfwpcli_fieldgroup_paths', 'add_plugin_path' );
function add_plugin_path( $paths ) {
    $paths['my_plugin'] = get_template_directory() . '/acf/';
    return $paths;
  }
