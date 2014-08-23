<?php
session_start();
require 'vendor/autoload.php';

use PredictionIO\PredictionIOClient;


Flight::register('mdb', 'Mongo', array('mongodb://localhost'));
Flight::register('prediction', 'PredictionIO\PredictionIOClient');
Flight::register('guzzle', 'GuzzleHttp\Client');

Flight::map('prediction_client', function(){
  $client = Flight::prediction()->factory(array("appkey" => "YOUR_PREDICTIONIO_APP_KEY"));
  return $client;
});

Flight::route('GET /', array('Home', 'index'));
Flight::route('GET /movies/recommended', array('Home', 'recommended'));
Flight::route('POST /movie/random', array('Home', 'random'));

Flight::route('/movies/import', array('Admin', 'import'));


Flight::start();