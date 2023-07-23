<?php

namespace Hero\HelloComposer\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use App\Utils\HiveUtil;
use Illuminate\Support\ServiceProvider;
use Hero\HelloComposer\Middleware\HiComposerMiddleware;

class HelloProvider extends ServiceProvider
{

    protected $middlewareGroups = [];
    protected $routeMiddleware = [
        "hi-composer.hi" => HiComposerMiddleware::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // reg config file
        $this->mergeConfigFrom(__DIR__.'/../Config/hi-composer.php', "hi-composer");
        // reg routes
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');

        $this->publishConfigFiles();
    }

    protected function publishConfigFiles()
    {
        // php artisan vendor:publish --provider="Hero\HelloComposer\Providers\HelloProvider" --tag=laravel-pay
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Config/hi-composer.php' => config_path("hi-composer.php")
            ], "hi-composer");
        }
    }

    /**
     * Sync the current state of the middleware to the router.
     *
     * @return void
     */
    protected function syncMiddlewareToRouter()
    {
        $router = $this->app->get("router");
        foreach ($this->middlewareGroups as $key => $middleware) {
            $router->middlewareGroup($key, $middleware);
        }

        foreach ($this->routeMiddleware as $key => $middleware) {
            $router->aliasMiddleware($key, $middleware);
        }
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->syncMiddlewareToRouter();

//        dump("hello");
//        dump(config('h-composer.hello'));
    }
}
