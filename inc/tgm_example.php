<?php

/* http://vps5.bludelego.com/plugins/acf-for-woocommerce-v5.2.0.zip */
/* http://vps5.bludelego.com/plugins/acf-to-rest-api.3.3.2.zip */
/* http://vps5.bludelego.com/plugins/admin-columns-pro-5.4.3-package.zip */
/* http://vps5.bludelego.com/plugins/advanced-bulk-edit-v1.3.zip */
/*  http://vps5.bludelego.com/plugins/advanced-custom-fields-pro-6_0_6.zip */
/* http://vps5.bludelego.com/plugins/all-in-one-wp-migration-7.56.zip */
/* http://vps5.bludelego.com/plugins/all-in-one-wp-migration-7-79.zip */
/* http://vps5.bludelego.com/plugins/kama-thumbnail.zip */
/* http://vps5.bludelego.com/plugins/wc_wpglobus.zip */
/* http://vps5.bludelego.com/plugins/woocommerce-advanced-bulk-edit-4.5.zip */
/* http://vps5.bludelego.com/plugins/woocommerce-product-search-v2.17.0.zip */
/* http://vps5.bludelego.com/plugins/wpglobus-plus-1.5.1.zip */
/* http://vps5.bludelego.com/plugins/seo-by-rank-math.zip */
add_action('tgmpa_register', 'bsv_eccommerce_register_required_plugins');
function bsv_eccommerce_register_required_plugins()
{
  $plugins = array(
    array( 
      'name' => 'Safe SVG', 
      'slug' => 'safe-svg', 
      'required' => true, 
      'force_activation' => true 
    ), 
    /* /1* array( *1/ */
    /* /1*   'name' => 'Wpglobus', *1/ */
    /* /1*   'slug' => 'wpglobus', *1/ */
    /* /1*   'source' => 'http://vps5.bludelego.com/plugins/wc_wpglobus.zip', *1/ */
    /* /1*   'required' => true, *1/ */
    /* /1*   'external_url' => 'http://vps5.bludelego.com/plugins/wc_wpglobus.zip' *1/ */
    /* /1* ), *1/ */
    /* /1* array( *1/ */
    /* /1*   'name' => 'Wpglobus Plus', *1/ */
    /* /1*   'slug' => 'wpglobus-plus', *1/ */
    /* /1*   'source' => 'http://vps5.bludelego.com/plugins/wpglobus-plus-1.5.1.zip', *1/ */
    /* /1*   'required' => true, *1/ */
    /* /1*   'external_url' => 'http://vps5.bludelego.com/plugins/wpglobus-plus-1.5.1.zip' *1/ */
    /* /1* ), *1/ */
    /* /1* array( *1/ */
    /* /1*   'name'             => 'Rank Math – SEO Plugin for WordPress', *1/ */
    /* /1*   'slug'             => 'seo-by-rank-math', *1/ */
    /* /1*   'source' => 'http://vps5.bludelego.com/plugins/seo-by-rank-math.zip', *1/ */
    /* /1*   'required' => true, *1/ */
    /* /1*   'external_url' => 'http://vps5.bludelego.com/plugins/seo-by-rank-math.zip' *1/ */
    /* /1* ), *1/ */
    /* /1* array( *1/ */
    /* /1*   'name'             => 'WebP Express', *1/ */
    /* /1*   'slug'             => 'webp-express', *1/ */
    /* /1* ), *1/ */
    /* // array( */
    /* //     'name' => 'Wp Mail Smtp', */
    /* //     'slug' => 'wp-mail-smtp', */
    /* // ), */
    /* /1* array( *1/ */
    /* /1*     'name' => 'Advanced bulk edit', *1/ */
    /* /1*     'slug' => 'advanced-bulk-edit', *1/ */
    /* /1*     'source' => 'http://vps5.bludelego.com/plugins/advanced-bulk-edit-v1.3.zip', *1/ */
    /* /1*     'required' => true, *1/ */
    /* /1*     'external_url' => 'http://vps5.bludelego.com/plugins/advanced-bulk-edit-v1.3.zip' *1/ */
    /* /1* ), *1/ */
    /* array( */
    /*   'name' => 'All-in-One WP Migration', */
    /*   'slug' => 'all-in-one-wp-migration', */
    /*   'source' => 'http://vps5.bludelego.com/plugins/all-in-one-wp-migration-7-79.zip', */
    /*   'required' => true, */
    /*   'external_url' => 'http://vps5.bludelego.com/plugins/all-in-one-wp-migration-7-79.zip' */
    /* ), */
    array( 
      'name' => 'Advanced custom fields', 
      'slug' => 'advanced-custom-fields', 
      'source' => 'http://vps5.bludelego.com/plugins/advanced-custom-fields-pro-6_0_6.zip', 
      'required' => true, 
      'external_url' => 'http://vps5.bludelego.com/plugins/advanced-custom-fields-pro-6_0_6.zip' 
    ), 
    /* // array( */
    /* //   'name'             => 'PDF Flipbook', */
    /* //   'slug'             => '3d-flipbook-dflip-lite', */
    /* // ), */
    /* /1* array( *1/ */
    /* /1*     'name' => 'Error Log Monitor', *1/ */
    /* /1*     'slug' => 'error-log-monitor', *1/ */
    /* /1* ), *1/ */
    /* // array( */
    /* //   'name'             => 'Flow-Flow Social Feed Stream', */
    /* //   'slug'             => 'flow-flow-social-streams', */
    /* // ), */
    /* // array( */
    /* //   'name'             => 'AddToAny Share Buttons', */
    /* //   'slug'             => 'add-to-any', */
    /* // ), */
    /* array( */
    /*   'name' => 'Tiny Mc Advanced', */
    /*   'slug' => 'tinymce-advanced', */
    /*   'required' => true, */
    /*   'force_activation' => true */
    /* ), */
    /* //    array( */
    /* //      'name'             => 'WP-PageNavi', */
    /* //      'slug'             => 'wp-pagenavi', */
    /* //      'required'         => true, */
    /* //    ), */
    /* //		array( */
    /* //			'name'             => 'Honey pot contact form 7', */
    /* //			'slug'             => 'contact-form-7-honeypot', */
    /* //			'required'         => true, */
    /* //		), */
    /* //		array( */
    /* //			'name'             => 'Woo ajax mini cart', */
    /* //			'slug'             => 'woo-ajax-mini-cart', */
    /* //			'required'         => true, */
    /* //			'force_activation' => true */
    /* //		), */
    array( 
      'name' => 'Classic Editor', 
      'slug' => 'classic-editor', 
      'required' => true, 
      'force_activation' => true 
    ), 
    array( 
      'name' => 'Easy Updates Manager', 
      'slug' => 'stops-core-theme-and-plugin-updates', 
      'required' => true, 
      'force_activation' => true 
    ), 
    /* //    array( */
    /* //      'name'             => 'Post Duplicator', */
    /* //      'slug'             => 'post-duplicator', */
    /* //      'required'         => true, */
    /* //      'force_activation' => true */
    /* //    ), */
    /* //		array( */
    /* //			'name'             => 'Kama Thumbnail', */
    /* //			'slug'             => 'kama-thumbnail', */
    /* //		), */
    /* //		array( */
    /* //			'name'             => 'Contact Form 7', */
    /* //			'slug'             => 'contact-form-7', */
    /* //			'required'         => true, */
    /* //			'force_activation' => true */
    /* //		), */
    /* //		array( */
    /* //			'name'             => 'Woocommerce', */
    /* //			'slug'             => 'woocommerce' */
    /* //		), */
    /* //    array( */
    /* //      'name'             => 'WPS Hide Login', */
    /* //      'slug'             => 'wps-hide-login' */
    /* //    ), */
    /* //		array( */
    /* //			'name'             => 'Easy Auto SKU Generator', */
    /* //			'slug'             => 'easy-woocommerce-auto-sku-generator' */
    /* //		), */
    /* //		array( */
    /* //			'name'             => 'Query Monitor', */
    /* //			'slug'             => 'query-monitor', */
    /* //			'required'         => true, */
    /* //			'force_activation' => true */
    /* //		), */
    /* //		array( */
    /* //			'name'             => 'Cookie Notice', */
    /* //			'slug'             => 'cookie-notice' */
    /* //		), */
    /* //		array( */
    /* //			'name'             => 'WP Fastest Cache', */
    /* //			'slug'             => 'wp-fastest-cache', */
    /* //			'required'         => true, */
    /* //		), */
    /* //		array( */
    /* //			'name'             => 'Rank Math – SEO Plugin for WordPress', */
    /* //			'slug'             => 'seo-by-rank-math' */
    /* //		), */
    /* //		array( */
    /* //			'name'             => 'WC Fields Factory', */
    /* //			'slug'             => 'wc-fields-factory', */
    /* //		), */
    /* //		array( */
    /* //			'name' => 'Wp smoosh', */
    /* //			'slug' => 'wp-smushit', */
    /* //			'required'         => true, */
    /* //			'force_activation' => true, */
    /* ////			'external_url' => 'http://wc-base-ecommerce.host1670806.hostland.pro/wp-content/uploads/2021/02/wp-smush-pro-3.8.1.zip' */
    /* //		), */
  );
  $config = array(
    'id' => 'bs-vite',
    // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',
    // Default absolute path to bundled plugins.
    'menu' => 'tgmpa-install-plugins',
    // Menu slug.
    'has_notices' => true,
    // Show admin notices or not.
    'dismissable' => false,
    // If false, a user cannot dismiss the nag message.
    'dismiss_msg' => false,
    // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => true,
    // Automatically activate plugins after installation or not.
    'message' => '',
  );
  tgmpa($plugins, $config);
}
