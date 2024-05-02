<?php
// MAIN FILTER ADDS

// add_shortcode('vue-search', 'my_shortcode_cost_vue_search');

// function my_shortcode_cost_vue_search($atts, $content = null)
// {
//   $site_url = get_site_url();

//   return "<div id='vueSearch'>
//   <main-search site-url='{$site_url}' />
//   </div>";
// }



add_shortcode('simple-comp', 'my_shortcode_cost_vue_search');

function my_shortcode_cost_vue_search($atts, $content = null)
{
  $site_url = get_site_url();

  return "<div id='myId' data-url='{$site_url}'>
  </div>";
}

add_shortcode('main-app', 'mainApp');
function mainApp($atts, $content = null)
{
    $site_url = get_site_url();
    $authKey = get_auth_key();
    $appKey = get_app_key();

    return "<div id='mainApp' data-url='{$site_url}' auth-key='{$authKey}' app-key='{$appKey}'>
  </div>";
}

add_shortcode('single-add', 'singleAdd');

function singleAdd($atts, $content = null)
{

    $site_url = get_site_url();
    $authKey = get_auth_key();
    $appKey = get_app_key();
    global $wp;

    $myId = explode('-', basename(home_url($wp->request)))[0];
    $response = json_decode(GetSinglePageData($myId));
    $data = $response->data[0];
    $data = htmlentities(json_encode($data), ENT_QUOTES);

    return "<div id='singleAdd' auth-key='{$authKey}' app-key='{$appKey}'></div>";
}
