<?php
class Home {


	public static function index() {

		$user_id = uniqid();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['movies_viewed'] = 0;

		$client = Flight::prediction_client();
		
		$command = $client->getCommand('create_user', array('pio_uid' => $user_id));
		$response = $client->execute($command);
		
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
				

				$client->identify($user_id);
				$user_action = $client->getCommand('record_action_on_item', array('pio_action' => $action, 'pio_iid' => $movie_id));
				$client->execute($user_action);


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

		    $client->identify($user_id);
		    $command = $client->getCommand('itemrec_get_top_n', array('pio_engine' => 'movie-recommender', 'pio_n' => 9));
		    $recommended_movies_raw = $client->execute($command);
		    
		    $movie_iids = $recommended_movies_raw['pio_iids'];

			array_walk($movie_iids, function(&$movie_iid){
			  $movie_iid = '4_' . $movie_iid;
			});	    

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
