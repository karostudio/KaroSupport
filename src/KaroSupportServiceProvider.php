<?php

namespace Karo\Support;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class KaroSupportServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('karosupport', function () {
            return new KS();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes(
            [
                __DIR__ . '/config/karosupport.php' => config_path('karosupport.php'),
            ], 'config'
        );
        Artisan::call('vendor:publish', ['--tag' => 'config']);
    }
}
