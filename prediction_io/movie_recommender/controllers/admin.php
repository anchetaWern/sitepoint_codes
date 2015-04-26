<?php
class Admin {

	public static function test(){

		$client = Flight::prediction_client();
		$response = $client->setUser(8);
		echo "<pre>";
		print_r($response);	
		echo "</pre>";
	}

	public static function import(){

		//$client = PredictionIOClient::factory(array("appkey" => "YOUR_PREDICTIONIO_APP_KEY"));
		//$accessKey = 'PZATchzAcnbZTzP12WgA1e4sZQGcQLtDJ1CKUlrOVHs7s7zocXbOb1XQAlZnlkSu';
		//$client = new EventClient($accessKey, 'http://localhost:7070');
		
		$client = Flight::prediction_client();

		$index = 0;
		for($x = 1; $x <= 1; $x++){

			$movies_url = 'https://api.themoviedb.org/3/movie/popular?api_key=b119b6067ef52d84c667d86bd6bab5c3&page=' . $x;
	
			$movies_response = Flight::guzzle()->get($movies_url);
			$movies_body = $movies_response->getBody();
			
			$movies_result = json_decode($movies_body, true);
			$movies = $movies_result['results'];
			
			if(!empty($movies)){

				foreach($movies as $row){

					$id = $row['id'];
					$title = $row['title'];
					$poster_path = '';
					if(!empty($row['poster_path'])){
						$poster_path = $row['poster_path'];
					}

					$moviedetails_url = 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=b119b6067ef52d84c667d86bd6bab5c3';

					$moviedetails_response = Flight::guzzle()->get($moviedetails_url);
					$movie_details_body = $moviedetails_response->getBody();

					$movie = json_decode($movie_details_body, true);
					
					$overview = $movie['overview'];
					$release_date = $movie['release_date'];

					
					$client_response = $client->setItem($index, array(
							'itypes' => 1,
							'tmdb_id' => $id,
							'title' => $title,
							'poster_path' => $poster_path,
							'overview' => $overview,
							'release_date' => $release_date
						)
					); 

					echo "<pre>";
					print_r($client_response);
					echo "</pre>";
					echo "<br><br>";
					
					$index++;
				}
			}
		}
	}

}