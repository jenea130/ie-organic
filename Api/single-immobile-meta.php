<?php

function SinglePageMeta($data)
{
	global $title, $image, $site_title, $description, $url;

	$title = isset($data->titolo) ? $data->titolo : '';
	$image = $data->foto_list[0]->nome;
	$site_title = isset($data->titolo) ? get_bloginfo('name') . ' | ' . $data->titolo : get_bloginfo('name');
	$description = isset($data->disposizione_interna) ? $title . ' | ' . $data->disposizione_interna : '';
	$url = (site_url() . '/ads/?id=' . strval($data->id));

	add_filter('rank_math/frontend/title', function () {
		global $title;
		return $title;
	});
	add_filter('rank_math/frontend/description', function () {
		global $description;
		return $description;
	});
	add_filter('rank_math/frontend/canonical', function () {
		global $url;
		return $url;
	});
	add_filter('rank_math/opengraph/url', function () {
		global $url;
		return $url;
	});
	add_filter("rank_math/opengraph/facebook/og_title", function ($title) {
		global $title;
		return $title . ' | Immobiliare Brava';
	});
	add_filter("rank_math/opengraph/twitter/og_title", function ($title) {
		global $title;
		return $title . ' | Immobiliare Brava';
	});
	add_filter("rank_math/opengraph/facebook/og_description", function ($description) {
		global $description;
		return $description;
	});
	add_filter("rank_math/opengraph/twitter/og_description", function ($description) {
		global $description;
		return $description;
	});
	add_filter("rank_math/opengraph/facebook/image", function ($image) {
		global $image;
		return $image;
	});
	add_filter("rank_math/opengraph/twitter/image", function ($image) {
		global $image;
		return $image;
	});
}