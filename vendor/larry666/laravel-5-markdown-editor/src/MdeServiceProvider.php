<?php

namespace Plugins\MarkDownEditor;

use Illuminate\Support\ServiceProvider;

class MdeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/resources/plugins' => base_path('public/plugins'),
            __DIR__.'/resources/views' => base_path('resources/views/common'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
