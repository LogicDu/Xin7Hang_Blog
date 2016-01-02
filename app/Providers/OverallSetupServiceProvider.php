<?php

namespace App\Providers;
use App\Services\OverallSetup;
use Illuminate\Support\ServiceProvider;

class OverallSetupServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('overallsetup',function(){
            return new OverallSetup();
        });

        $this->app->bind('App\Services\OverallSetupInterface',function(){
            return new OverallSetup();
        });
    }
}
