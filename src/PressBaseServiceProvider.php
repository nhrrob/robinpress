<?php

namespace Nhrrob\Robinpress;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Nhrrob\Robinpress\Facades\Robinpress;

class PressBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerResources();

        $this->registerFacades();

        $this->registerRoutes();

        $this->registerFields();

    }

    public function register()
    {
        $this->commands([
            Console\ProcessCommand::class,
        ]);
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'robinpress');
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../config/robinpress.php' => config_path('robinpress.php'),
        ], 'robinpress-config');

        $this->publishes([
            __DIR__ . '/Console/stubs/RobinpressServiceProvider.stub' => app_path('Providers/RobinpressServiceProvider.php'),
        ], 'robinpress-provider');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => Robinpress::path(),
            'namespace' => '\Nhrrob\Robinpress\Http\Controllers', //couldnt make it work with laravel 8
        ];
    }
    
    protected function registerFacades()
    {
        $this->app->singleton('Robinpress',function($app){
            return new \Nhrrob\Robinpress\Robinpress();
        });
    }
    
    protected function registerFields()
    {
        Robinpress::fields([
            Fields\Body::class,
            Fields\Date::class,
            Fields\Description::class,
            Fields\Extra::class,
            Fields\Title::class,
        ]);
    }
}
