<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use predictionio\EventClient;

class PredictionIOEventClientServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    	$pio_accesskey = 'sD13KDmvVn8RVWaxlkuVUS0wxropKJTdUPbm6vWD7BvheZsqmrW0FJHdZa2y7wR2';
    	$pio_eventserver = 'http://127.0.0.1:7070';
    	
       
        $this->app->singleton(
            'PredictionIOEventClient',
            function($app){
                return new EventClient($pio_accesskey, $pio_eventserver);
            }
        );
            
       
        
    }
}
