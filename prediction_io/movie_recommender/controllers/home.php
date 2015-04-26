<?php
class Home {


	public static function index() {

		$user_id = uniqid();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['movies_viewed'] = 0;

		$client = Flight::prediction_client();
		
		$response = $client->setUser($user_id);
		
		Flight::render('index', array('response' => $response), 'content');
		Flight::render('layout', array('title' => 'Home', 'base_path' => '/movie_recommender'));
	}


	public static function random() {

		$request = Flight::request();

		if(!empty($_SESSION['user_id'])){

			$movies_viewed = $_SESSION['movies_viewed'];

			$dbname = 'predictionio_appdata';
		   	$mdb = Flight::mdb();
		   	$db = $mdb->$dbname;

		   	$skip = mt_rand(1, 2000);

			$items = $db->items;
			$cursor = $items->find(array('itypes' => '1'))->skip($skip)->limit(1);
			$data = array_values(iterator_to_array($cursor));
			$movie = $data[0];

			if(!empty($request->data['movie_id'])){
				
				$params = $request->data;
				$client = Flight::prediction_client();

				$user_id = $_SESSION['user_id'];
				$movie_id = substr($params['movie_id'], strpos($params['movie_id'], '_') + 1);
				$action = $params['action'];
				
				$user_action = $client->recordUserActionOnItem($action, $user_id, $movie_id);

				$movies_viewed += 1;
				if($movies_viewed == 20){
					$movie['has_recommended'] = true;			
				}

				
				$_SESSION['movies_viewed'] = $movies_viewed;
			}

			Flight::json($movie);
		}

	}


	public static function recommended() {

		$dbname = 'predictionio_appdata';

	   	$mdb = Flight::mdb();
	   	$db = $mdb->$dbname;

		$items = $db->items;

		$client = Flight::prediction_client();
		$recommended_movies = array();

		try{
			$user_id = $_SESSION['user_id'];

			
			$client = new EngineClient('http://localhost:8000');

			$recommended_movies_raw = $client->sendQuery(array('user' => $user_id, 'num' => 9));
					   
			$movie_iids = array_map(function($item){
				return $item['item'];
			}, $recommended_movies_raw['itemScores']);   

			$cursor = $items->find(array('itypes' => '1', '_id' => array('$in' => $movie_iids)));
			$recommended_movies = array_values(iterator_to_array($cursor));	
		

		}catch(Exception $e){
		    echo 'Caught exception: ', $e->getMessage(), "\n";
		}

		$_SESSION['movies_viewed'] = 0;
		$_SESSION['user_id'] = '';

		Flight::render('recommended', array('recommended_movies' => $recommended_movies), 'content');
		Flight::render('layout', array('title' => 'Recommended', 'base_path' => '/movie_recommender'));

	}

}
