<?php
global $wp;
$myId = explode('-', basename(home_url($wp->request)))[0];
// // $id = $_GET['id'];
$response = json_decode(GetSinglePageData($myId));
$data = $response->data[0];

if (!isset($data) && count($data) == 0) {
    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();
}
add_filter('pre_get_document_title', 'change_title', 50);
function change_title()
{
    global $data;
    return isset($data->titolo) ? $data->titolo . " | BlueRe" : "BlueRe";
}

SinglePageMeta($data);
// $evidence_response = json_decode(GetEvidenceData($myId));
// $evidence_data = $evidence_response->data->immobili_list;

$featuresList = array();
foreach ($data->features_list as $feature) {
    $featuresList[$feature->label] = $feature;
}

get_header();
// vardump($data);
?>
<?php echo do_shortcode('[single-add]'); ?>
<?php get_footer(); ?>
