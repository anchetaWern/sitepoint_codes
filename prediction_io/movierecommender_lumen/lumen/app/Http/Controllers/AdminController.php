<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    

    public function importMovies(){
    	
    	global $app;

    	$index = 1;
    	$http_client = new \GuzzleHttp\Client();
    	$pio_eventclient = $app->make('PioEventClient');
    	$es_client = new \Elasticsearch\Client();
    	
		for($x = 1; $x <= 100; $x++){

			$movies_url = 'https://api.themoviedb.org/3/movie/popular?api_key=YOUR_TMDB_API_KEY&page=' . $x;
	
			$movies_response = $http_client->get($movies_url);
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

					$moviedetails_response = $http_client->get($moviedetails_url);
					$movie_details_body = $moviedetails_response->getBody();

					$movie = json_decode($movie_details_body, true);
					
					$overview = $movie['overview'];
					$release_date = $movie['release_date'];

					$genre = '';
					if(!empty($movie['genres'][0])){
						$genre = $movie['genres'][0]['name'];
					}

					$popularity = $movie['popularity'];

		
					$movie_data = array(
						'itypes' => 1,
						'tmdb_id' => $id,
						'title' => $title,
						'poster_path' => $poster_path,
						'overview' => $overview,
						'release_date' => $release_date,
						'genre' => $genre,
						'popularity' => $popularity
					);

					$pio_response = $pio_eventclient->setItem($index, $movie_data); 					

					//create elasticsearch index
					$params = array();
					$params['body']  = $movie_data;
					$params['index'] = 'movierecommendation_app';
					$params['type']  = 'movie';
					$params['id']    = $index;
					$es_res = $es_client->index($params);

					

					
					echo "<pre>";
					print_r($pio_response);
					echo "</pre>";
					echo "---";
					echo "<pre>";
					print_r($es_res);
					echo "</pre>";
					echo "<br><br>";
					
					$index++;
				}
			}
		}
		


    }

}
