<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



$app->get('/', 'App\Http\Controllers\HomeController@index');

$app->get('/movies/import', 'App\Http\Controllers\AdminController@importMovies');

$app->post('/movie/random', 'App\Http\Controllers\HomeController@randomMovie');

$app->get('/movies/recommended', 'App\Http\Controllers\HomeController@recommendedMovies');

$app->get('/test', 'App\Http\Controllers\HomeController@test');

$app->get('/aaa', function(){
	
	$movies_viewed = session('movies_viewed');

	$movies_viewed += 1;
	if($movies_viewed == 20){
		//$movie['has_recommended'] = true;			
	}

	session(array('movies_viewed' => $movies_viewed));
	return $movies_viewed;
});

$app->get('/bbb', function(){
	return $b + $c;
});


$app->get('/es', function(){

	$es_client = new \Elasticsearch\Client();

/*
$response = $client->sendQuery(array('user'=> 1, 'num'=> 3));

$array = array_map(function($item){
	return $item['item'];
}, $response['itemScores']);
*/

	$searchParams['index'] = 'movierecommendation_app';
    $searchParams['type']  = 'movie';
    $searchParams['body']['query']['bool']['must']['terms']['_id'] = array(1, 2, 3, 42, 50, 60, 88, 70, 100);

    $queryResponse = $es_client->search($searchParams);
    return $queryResponse;
});


$app->get('/ya', function() use ($app){

	$user_id = '55358a20dd477';

	$action = 'like';
	$movie_id = 317;
	$pio_eventclient = $app->make('PioEventClient');
	$response = $pio_eventclient->createEvent(
		array(
			'event' => 'like',
			'entityType' => 'user',
			'entityId' => $user_id,
			'targetEntityType' => 'item',
			'targetEntityId' => $movie_id 
		)
	);
	print_r($response);
});

