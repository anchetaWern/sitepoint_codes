<?php
require 'vendor/autoload.php';

define("CLIENT_ID", "YOUR INSTAGRAM APP CLIENT ID");
define("CLIENT_SECRET", "YOUR INSTAGRAM APP CLIENT SECRET");
define("REDIRECT_URL", "YOUR INSTAGRAM APP REDIRECT URL");


use MetzWeb\Instagram\Instagram;

$client = new GuzzleHttp\Client();

$user_id = 'YOUR INSTAGRAM USER ID';
$access_token = 'YOUR INSTAGRAM ACCESS TOKEN';


$instagram = new Instagram(array(
    'apiKey' => CLIENT_ID,
    'apiSecret' => CLIENT_SECRET,
    'apiCallback' => REDIRECT_URL
));

$app = new \Slim\Slim(array(
	'view' => new \Slim\Views\Twig()
));

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);


$app->get('/login', function () use ($app, $client) {

	$data = array();
	$login_url = '';
	
	if($app->request->get('code')){

	    $code = $app->request->get('code');

	    $response = $client->post('https://api.instagram.com/oauth/access_token', array('body' => array(
	        'client_id' => CLIENT_ID,
	        'client_secret' => CLIENT_SECRET,
	        'grant_type' => 'authorization_code',
	        'redirect_uri' => REDIRECT_URL,
	        'code' => $code
	    )));

	    $data = $response->json();

	}else{

		$login_url = "https://api.instagram.com/oauth/authorize?client_id={$client_id}&redirect_uri={$redirect_url}&scope=basic&response_type=code";

	}
	

    $app->render('home.php', array('data' => $data, 'login_url' => $login_url));

});

$app->get('/login2', function () use ($app, $instagram) {

	$login_url = $instagram->getLoginUrl(array('basic', 'likes'));

	if(!empty($_GET['code'])){

	    $code = $_GET['code'];
	    $data = $instagram->getOAuthToken($code); //get access token using the authorization code

	    $instagram->setAccessToken($data);

	    $access_token = $instagram->getAccessToken();

	    //do anything you want with the access token

	}else{
	   $app->render('login.php', array('login_url' => $login_url));
	}

});

$app->get('/user', function() use($app, $instagram, $user_id) {

	$results = $instagram->getUser($user_id);

	$app->render('user.php', array('user' => $results->data));
});

$app->get('/tags/search', function() use($app, $client, $access_token) {
	
	$tag = 'niagaraFalls';
	$response = $client->get("https://api.instagram.com/v1/tags/{$tag}/media/recent?access_token={$access_token}");
	$results = $response->json();

	$app->render('images.php', array('results' => $results));

});

$app->get('/tags/search-with-tagvalidation', function() use($app, $client, $access_token) {

	$query = 'Niagara Falls';
	$response = $client->get("https://api.instagram.com/v1/tags/search?access_token={$access_token}&q={$query}");
	$result = $response->json();

	if(!empty($result['data'])){
	    $tag = $result['data'][0]['name'];

		$response = $client->get("https://api.instagram.com/v1/tags/{$tag}/media/recent?access_token={$access_token}");
		$results = $response->json();
		$app->render('images.php', array('results' => $results));
	}else{
		echo 'no results';
	}

});

$app->get('/user/feed', function() use($app, $client, $access_token) {

	$response = $client->get("https://api.instagram.com/v1/users/self/feed?access_token={$access_token}");
	$results = $response->json();

	print_r($results);

});

$app->get('/user/search', function() use($app, $client, $access_token) {

	$query = 'Ash Ketchum';
	$response = $client->get("https://api.instagram.com/v1/users/search?q={$query}&access_token={$access_token}");
	$results = $response->json();

	print_r($results);

});

$app->get('/geo/search', function() use($app, $client, $access_token) {

	$query = 'banaue rice terraces';

	//make a request to the Google Geocoding API
	$place_response = $client->get("http://maps.googleapis.com/maps/api/geocode/json?address={$query}&sensor=false");
	$place_result = $place_response->json();

	if($place_result['status'] == 'OK'){

	    //extract the lat and lng values 
	    $lat = $place_result['results'][0]['geometry']['location']['lat'];
	    $lng = $place_result['results'][0]['geometry']['location']['lng'];

	    //make a request to the Instagram API using the lat and lng
	    $response = $client->get("https://api.instagram.com/v1/media/search?access_token={$access_token}&lat={$lat}&lng={$lng}");

	    $results = $response->json();

	    if(!empty($results['data'])){   
	      	
	      	$app->render('images.php', array('results' => $results));

	    }else{
	        echo 'no photos found';
	    }

	}else{
	    echo 'place not found';
	}

});

$app->run();