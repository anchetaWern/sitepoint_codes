<?php
class Admin {

	public static function import() {

		$client = PredictionIOClient::factory(array("appkey" => "YOUR_PREDICTIONIO_APP_KEY"));

		$index = 0;
		for($x = 3; $x <= 100; $x++){

			$movies_url = 'https://api.themoviedb.org/3/movie/popular?api_key=YOUR_TMDB_API_KEY&page=' . $x;
	
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

					$moviedetails_url = 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=YOUR_TMDB_API_KEY';

					$moviedetails_response = Flight::guzzle()->get($moviedetails_url);
					$movie_details_body = $moviedetails_response->getBody();

					$movie = json_decode($movie_details_body, true);
					
					$overview = $movie['overview'];
					$release_date = $movie['release_date'];

					$command = $client->getCommand('create_item', array('pio_iid' => $index, 'pio_itypes' => 1));
					$command->set('tmdb_id', $id);
					$command->set('title', $title);
					$command->set('poster_path', $poster_path);
					$command->set('overview', $overview);
					$command->set('release_date', $release_date);

					$client_response = $client->execute($command);
					print_r($client_response);
					echo "<br><br>";
					$index++;
				}
			}
		}
	}

}