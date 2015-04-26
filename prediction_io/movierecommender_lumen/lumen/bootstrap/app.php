<?php

require_once __DIR__.'/../vendor/autoload.php';

use predictionio\EventClient;
use predictionio\EngineClient;
use GuzzleHttp\Client;

Dotenv::load(__DIR__.'/../');

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that servers as the central piece of the framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application;

// $app->withFacades();

// $app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    'Illuminate\Contracts\Debug\ExceptionHandler',
    'App\Exceptions\Handler'
);

$app->singleton(
    'Illuminate\Contracts\Console\Kernel',
    'App\Console\Kernel'
);


$app->singleton('PioEventClient', function($app){

	$pio_accesskey = 'YOUR_PREDICTION_IO_APP_KEY';
	$pio_eventserver = 'http://127.0.0.1:7070';

	return new EventClient($pio_accesskey, $pio_eventserver);
});

$app->singleton('PioPredictionClient', function($app){

	$pio_predictionserver = 'http://127.0.0.1:8000';
    return new EngineClient($pio_predictionserver);
});

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

$app->middleware([
	//'Illuminate\Cookie\Middleware\EncryptCookies',
	//'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
	'Illuminate\Session\Middleware\StartSession',
	//'Illuminate\View\Middleware\ShareErrorsFromSession',
	//'Laravel\Lumen\Http\Middleware\VerifyCsrfToken',
]);

// $app->routeMiddleware([

// ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register('App\Providers\AppServiceProvider');

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

require __DIR__.'/../app/Http/routes.php';

return $app;
