<?php
session_start();
require 'vendor/autoload.php';

use predictionio\EventClient;


Flight::register('mdb', 'Mongo', array('mongodb://localhost'));
//Flight::register('prediction', 'predictionio\EventClient');
Flight::register('guzzle', 'GuzzleHttp\Client');


Flight::map('prediction_client', function(){
	
	//$accessKey = 'GJBuFYODWTwFBVQ2D2nbBFW5C0iKClNLEMbYGGhDGoZGEtLre62BLwLJlioTEeJP';
	//$client = new EventClient($accessKey, 'http://localhost:7070');
	
	$predictionio_appkey = "sD13KDmvVn8RVWaxlkuVUS0wxropKJTdUPbm6vWD7BvheZsqmrW0FJHdZa2y7wR2";
	$predictionio_eventserver = "http://127.0.0.1:7070";

	$client = new EventClient($predictionio_appkey, $predictionio_eventserver);
	return $client;
});


Flight::route('GET /', array('Home', 'index'));
Flight::route('GET /movies/recommended', array('Home', 'recommended'));
Flight::route('POST /movie/random', array('Home', 'random'));

Flight::route('/movies/import', array('Admin', 'import'));

Flight::route('/test', function(){

	$accessKey = 'sD13KDmvVn8RVWaxlkuVUS0wxropKJTdUPbm6vWD7BvheZsqmrW0FJHdZa2y7wR2';
	$client = new EventClient($accessKey, 'http://127.0.0.1:7070');

	$response = $client->setUser(2);
	echo 'a';
	print_r($response);
});

Flight::start();