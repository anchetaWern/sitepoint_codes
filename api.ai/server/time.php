<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$google_api_key = '';
$apiai_key = '';
$apiai_subscription_key = '';

$query = "What's the current time in Barcelona Spain?";

$response = $client->post('https://api.api.ai/v1/query', array(
	'headers' => array(
		'Authorization' => "Bearer {$apiai_key}",
		'ocp-apim-subscription-key' => $apiai_subscription_key,
		'Content-Type' => 'application/json; charset=utf-8'
	),
	'json' => array(
		"query" => $query,
		"lang" => "en"
	)
));

$result = $response->json();

if(!empty($result['result']) && !empty($result['result']['parameters']['location'])){

	$location = $result['result']['parameters']['location'];

	$place_response = $client->get("http://maps.googleapis.com/maps/api/geocode/json?address={$location}&sensor=false");
	$place_result = $place_response->json();

	if($place_result['status'] == 'OK'){

		$lat = $place_result['results'][0]['geometry']['location']['lat'];
		$lng = $place_result['results'][0]['geometry']['location']['lng'];

		$timestamp = time();

		$time_response = $client->get("https://maps.googleapis.com/maps/api/timezone/json?location={$lat},{$lng}&timestamp={$timestamp}&key={$google_api_key}");

		$time_result = $time_response->json();
		
		if($time_result['status'] == 'OK'){
			$timezone = $time_result['timeZoneId'];

			date_default_timezone_set($timezone);

			echo 'its currently ' . date('l, F j, Y g:i A') . ' in ' . $location;
		}

	}

}else{
	echo "sorry I could not find that location";
}