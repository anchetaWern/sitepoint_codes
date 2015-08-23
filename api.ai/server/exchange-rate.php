<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$query = $_POST['query'];

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


$currencylayer_apikey = 'your currencylayer api key';

if(!empty($result['result'])){

	$currency_from = $result['result']['parameters']['fromcurrency'];
	$currency_to = $result['result']['parameters']['tocurrency'];
	$amount = $result['result']['parameters']['number'];

	$conversion_response = $client->get("http://apilayer.net/api/live?access_key={$currencylayer_apikey}&source={$currency_from}&currencies={$currency_to}");
	$conversion_result = $conversion_response->json();
	
	$rate = $conversion_result['quotes'][$currency_from . $currency_to];
	
	$converted_amount = $amount * $rate;
	
	$speech = "{$amount} {$currency_from} is equivalent to {$converted_amount} {$currency_to}";
	echo $speech;
	
}
?>
