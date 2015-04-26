<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use predictionio\EventClient;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        $app->bind('Acme\Product\Anvil\AnvilInterface', 'Acme\Product\Anvil\AnvilHeavy');
    }
}
