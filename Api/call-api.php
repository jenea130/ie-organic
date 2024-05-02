<?php
function callAPI($url, $method = 'get', $data = '')
{
	$curl = curl_init();
	if (strtolower($method) == 'post') {
		curl_setopt($curl, CURLOPT_POST, 1);
		if ($data <> '' && $data <> null) {
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
	}
	// OPTIONS:
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_HEADER, 0);  // DO NOT RETURN HTTP HEADERS
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/x-www-form-urlencoded',
		//'Content-Type: application/json',
		'authkey: ' . get_auth_key(),
		'appkey: ' . get_app_key(),
	));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	// EXECUTE:
	$result = curl_exec($curl);
	if (!$result) {
		die("Connection Failure");
	}
	curl_close($curl);
	return $result;
}
function GetAgents($data)
{
	$post_data = [];
	if (isset($data->name) && $data->name != '') {
		array_push($post_data, 'name=' . $data->name);
	}
	if (isset($data->agency) && $data->agency != '') {
		array_push($post_data, 'id_agenzia=' . $data->agency);
	}
	$post_data = implode('&', $post_data);
	$data      = callAPI('https://api.bludelego.it/api/realestate/v1/agenti', 'post', $post_data);
	return json_encode($data);
}
function GetSinglePageData($id)
{
	$data = callAPI('https://api.bludelego.it/api/realestate/v1/immobili/' . $id);
	return $data;
}
function GetEvidenceData($id)
{
	$post_data = 'requested_number=2&id=' . $id;
	$data      = callAPI('https://api.bludelego.it/api/realestate/v1/immobili/evidenza', 'post', $post_data);
	return $data;
}
function GetAgenzie()
{
	$data = callAPI('https://api.bludelego.it/api/realestate/v1/agenzie', 'get');
	return json_encode($data);
}
function GetLocations()
{
	$data = callAPI('https://api.bludelego.it/api/realestate/v1/comuni', 'post');
	return json_encode($data);
}
function GetTypeImmobile()
{
	$data = callAPI('https://api.bludelego.it/api/realestate/v1/tipologie', 'post');
	return json_encode($data);
}
function GetFilteredProperties($page, $comuni, $tipologie, $tipo_contratto, $numero_locali, $mq_min, $mq_max, $prezzo_min, $prezzo_max)
{
	$pageQ           = "page=" . $page;
	$comuniQ         = "&id_comune=" . $comuni;
	$id_tipologie    = "&id_tipologia=" . $tipologie;
	$tipo_contrattoQ = "&tipo_contratto=" . $tipo_contratto;
	$numero_localiQ  = "&numero_locali=" . $numero_locali;
	$mq_minQ = "&mq_min=" . $mq_min;
	$mq_maxQ = "&mq_max=" . $mq_max;
	$prezzo_minQ = "&prezzo_min=" . $prezzo_min;
	$prezzo_maxQ = "&prezzo_max=" . $prezzo_max;
	$post_data       = $pageQ . $comuniQ . $id_tipologie . $tipo_contrattoQ . $numero_localiQ . $mq_minQ . $mq_maxQ . $prezzo_minQ . $prezzo_maxQ;


	return callAPI('https://api.bludelego.it/api/realestate/v1/immobili', 'post', $post_data);
}

function GetProperties($page)
{
	$post_data = 'page=' . $page;
	return callAPI('https://api.bludelego.it/api/realestate/v1/immobili', 'post', $post_data);
}

function getPropertiesId()
{

	$result = [];
	$api_result = callAPI('https://api.bludelego.it/api/realestate/v1/immobili/all', 'get');
	// $api_result_all = callAPI('https://api.bludelego.it/api/realestate/v1/all');
	$list_json = json_decode($api_result);
	$result = $list_json->data;
	// foreach ($list as $item) {
	// 	$result[] = $item->id;
	// }

	return $result;
}


//function GetProperties( $page ) {
//	$post_data = 'page=' . $page;
//	return callAPI( 'https://api.bludelego.it/api/realestate/v1/immobili', 'post', $post_data );
//}